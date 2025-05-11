<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact'); // Assurez-vous que le fichier Blade est dans resources/views/contact.blade.php
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email',
            'societe' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:1000',
        ]);

        // Traitement, par exemple : Contact::create($data);
        Contact::create($data);
        
        return redirect()->back()->with('success', 'Message envoyé avec succès!');
    }
}
