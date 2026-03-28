<?php

namespace App\Http\Controllers;

use App\Models\ContactLead;
use Illuminate\Http\Request;

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

        ContactLead::create([
            ...$validated,
            'source_page' => 'homepage',
            'ip_address' => $request->ip(),
        ]);

        return response()->json(['success' => true, 'message' => 'Votre demande a été envoyée avec succès.']);
    }
}
