<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewLeadMail;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => ['required', 'string', 'max:20', 'regex:/^(\+216)?[0-9\s\-]{8,}$/'],
            'message' => 'nullable|string|max:2000',
        ]);

        try {
            $response = Http::withHeaders([
                'X-Api-Key' => config('app.public_site_api_key'),
                'Accept' => 'application/json',
            ])->timeout(10)->post(config('app.core_app_url') . '/api/leads', [
                ...$validated,
                'source_page' => 'homepage',
                'ip_address' => $request->ip(),
                'ab_variant' => $request->cookie('ab_variant'),
            ]);

            if ($response->successful()) {
                // Notify admin by email
                $adminEmail = config('app.admin_email');
                if ($adminEmail) {
                    try {
                        Mail::to($adminEmail)->send(new NewLeadMail([
                            'name' => $validated['name'],
                            'phone' => $validated['phone'],
                            'company' => $validated['company'] ?? null,
                            'message' => $validated['message'] ?? null,
                            'source_page' => 'homepage',
                        ]));
                    } catch (\Throwable $e) {
                        Log::warning('Failed to send lead notification email', ['error' => $e->getMessage()]);
                    }
                }

                return response()->json(['success' => true, 'message' => 'Votre demande a été envoyée avec succès.']);
            }

            Log::error('Lead API forwarding failed', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);
        } catch (\Throwable $e) {
            Log::error('Lead API forwarding exception', ['error' => $e->getMessage()]);
        }

        return response()->json(['success' => true, 'message' => 'Votre demande a été envoyée avec succès.']);
    }
}
