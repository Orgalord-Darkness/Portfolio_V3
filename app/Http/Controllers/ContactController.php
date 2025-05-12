<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact'); // Assurez-vous que le fichier Blade est dans resources/views/contact.blade.php
    }

   public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email',
            'societe' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        try {
            // Enregistrement dans la base de données
            Contact::create($validatedData);

            // Message de succès
            return redirect()->back()->with('success', 'Votre message a été envoyé avec succès !');
        } catch (\Exception $e) {
            // Message d'erreur si l'enregistrement échoue
            return redirect()->back()->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }

}
