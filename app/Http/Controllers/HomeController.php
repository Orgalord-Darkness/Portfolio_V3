<?php

namespace App\Http\Controllers;

use App\Models\Projet; 
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // Récupère des données (exemple avec des utilisateurs)
        $data = Projet::all();
        // Retourne les données en réponse JSON
        return response()->json($data);
    }
    
}
