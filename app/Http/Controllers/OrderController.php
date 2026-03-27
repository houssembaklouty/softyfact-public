<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

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

        $amount = $isOnline ? config('app.order_amount_online') : config('app.order_amount');

        $order = Order::create([
            'name'    => $validated['name'] ?? '',
            'phone'   => $validated['phone'],
            'email'   => $validated['email'] ?? null,
            'address' => $validated['address'] ?? null,
            'city'    => $validated['city'] ?? null,
            'type'    => $isOnline ? 'online' : 'offline',
            'status'  => 'pending',
            'amount'  => $amount,
        ]);

        return response()->json([
            'success' => true,
            'redirect' => '/order-confirmation/' . $order->confirmation_token,
        ]);
    }

    public function confirmation(Order $order)
    {
        return \Inertia\Inertia::render('OrderConfirmation', [
            'order' => $order->only(['name', 'phone', 'address', 'city', 'amount', 'status', 'created_at']),
        ]);
    }
}
