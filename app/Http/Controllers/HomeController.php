<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Vignette; 
use App\Models\Apprentissage; 
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // Récupère des données (exemple avec des utilisateurs)
        $data = Projet::getProjetWithApprentissage();
        // Retourne les données en réponse JSON
        return response()->json($data);
    }

    public function blade()
    {
        // Récupère les projets avec les apprentissages associés
        $projets = Projet::getPPE();  // Appel de ta méthode dans le modèle
        $ms = Projet::getMS();
        $pp = Projet::getPP();
        $projets_has_apprentissages = Projet::getProjetWithApprentissage();
        $apprentissages = Apprentissage::all();
        // Retourne la vue et passe la variable $projets
        $vignettes = Vignette::all();
        // dd($projets_has_apprentissages);
        return view('projets', compact('projets','vignettes','projets_has_apprentissages','apprentissages','ms','pp'));
    }

    
}
