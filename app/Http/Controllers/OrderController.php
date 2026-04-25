<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewOrderMail;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $cleanPhone = preg_replace('/\s+/', '', $request->input('phone', ''));
        $request->merge(['phone' => $cleanPhone]);

        $rules = [
            'name'    => 'nullable|string|max:255',
            'phone'   => ['required', 'string', 'regex:/^[0-9]{8}$/', 'max:8'],
            'type'    => 'nullable|string|in:online',
            'email'   => 'required|email|max:255',
            'address' => 'required|string|max:1000',
            'city'    => 'nullable|string|max:100',
        ];

        $messages = [
            'phone.regex'     => 'Le numéro de téléphone doit contenir exactement 8 chiffres.',
            'phone.required'  => 'Le numéro de téléphone est obligatoire.',
            'email.required'  => 'L\'adresse email est obligatoire.',
            'email.email'     => 'Veuillez saisir un email valide.',
            'address.required' => 'L\'adresse complète est obligatoire.',
        ];

        $validated = $request->validate($rules, $messages);

        // Forward order to fetora-pro (app.softyfact.tn)
        $coreAppUrl = rtrim(config('app.core_app_url', 'https://app.softyfact.tn'), '/');
        $apiKey = config('app.public_site_api_key');

        try {
            $response = Http::timeout(15)
                ->withHeaders(['X-Api-Key' => $apiKey])
                ->post("{$coreAppUrl}/api/orders", [
                    'name'    => $validated['name'] ?? '',
                    'phone'   => $validated['phone'],
                    'email'   => $validated['email'] ?? null,
                    'address' => $validated['address'] ?? null,
                    'city'    => $validated['city'] ?? null,
                    'type'    => 'online',
                    'ab_variant' => $request->cookie('ab_variant'),
                ]);

            if ($response->successful() && $response->json('success')) {
                $token = $response->json('confirmation_token');

                // Notify admin by email
                $adminEmail = config('app.admin_email');
                if ($adminEmail) {
                    try {
                        Mail::to($adminEmail)->send(new NewOrderMail([
                            'name' => $validated['name'] ?? '',
                            'phone' => $validated['phone'],
                            'email' => $validated['email'] ?? null,
                            'address' => $validated['address'] ?? null,
                            'city' => $validated['city'] ?? null,
                            'type' => 'online',
                            'ab_variant' => $request->cookie('ab_variant'),
                        ]));
                    } catch (\Throwable $e) {
                        Log::warning('Failed to send order notification email', ['error' => $e->getMessage()]);
                    }
                }

                return response()->json([
                    'success'  => true,
                    'redirect' => '/order-confirmation/' . $token,
                ]);
            }

            // API returned an error
            Log::warning('Order API error from fetora-pro', [
                'status' => $response->status(),
                'body'   => $response->json(),
            ]);

            if ($response->status() === 422 && $response->json('errors')) {
                return response()->json([
                    'success' => false,
                    'message' => $response->json('error', 'Données invalides'),
                    'errors'  => $response->json('errors'),
                ], 422);
            }

            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue. Veuillez réessayer.',
            ], 500);
        } catch (\Throwable $e) {
            Log::error('Failed to forward order to fetora-pro', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Service temporairement indisponible. Veuillez réessayer dans quelques instants.',
            ], 503);
        }
    }

    public function confirmation(string $token)
    {
        // Fetch order details from fetora-pro for display
        return view('pages.order-confirmation', [
            'token' => $token,
            'orderAmount' => config('app.order_amount_online', 119),
            'coreAppUrl' => config('app.core_app_url', 'https://app.softyfact.tn'),
            'supportPhone' => config('app.support_phone', '55 123 456'),
        ]);
    }
}
