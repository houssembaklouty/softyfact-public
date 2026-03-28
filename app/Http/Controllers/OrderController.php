<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $cleanPhone = preg_replace('/\s+/', '', $request->input('phone', ''));
        $request->merge(['phone' => $cleanPhone]);

        $orderType = $request->input('type', 'offline');
        $isOnline = $orderType === 'online';

        $rules = [
            'name'    => 'nullable|string|max:255',
            'phone'   => ['required', 'string', 'regex:/^[0-9]{8}$/', 'max:8'],
            'type'    => 'nullable|string|in:offline,online',
        ];

        $messages = [
            'phone.regex'    => 'Le numéro de téléphone doit contenir exactement 8 chiffres.',
            'phone.required' => 'Le numéro de téléphone est obligatoire.',
        ];

        if ($isOnline) {
            $rules['email'] = 'required|email|max:255';
            $rules['address'] = 'nullable|string|max:1000';
            $rules['city'] = 'nullable|string|max:100';
            $messages['email.required'] = 'L\'adresse email est obligatoire.';
            $messages['email.email'] = 'Veuillez saisir un email valide.';
        } else {
            $rules['address'] = 'nullable|string|max:1000';
            $rules['city'] = 'required|string|max:100';
            $rules['email'] = 'nullable|email|max:255';
            $messages['city.required'] = 'Veuillez sélectionner votre ville.';
        }

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
                    'type'    => $isOnline ? 'online' : 'offline',
                ]);

            if ($response->successful() && $response->json('success')) {
                $token = $response->json('confirmation_token');

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
            'orderAmount' => config('app.order_amount', 149),
            'coreAppUrl' => config('app.core_app_url', 'https://app.softyfact.tn'),
            'supportPhone' => config('app.support_phone', '55 123 456'),
        ]);
    }
}
