<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nom'      => 'required|string|max:100',
            'prenom'   => 'required|string|max:100',
            'email'    => 'required|email:rfc,dns|max:255',
            'societe'  => 'nullable|string|max:255',
            'telephone'=> 'nullable|string|max:20|regex:/^[0-9\+\-\s\(\)]{7,20}$/',
            'message'  => 'required|string|min:10|max:2000',
        ]);

        Contact::create($validated);

        return response()->json(['message' => 'Votre message a bien été envoyé.'], 201);
    }
}
