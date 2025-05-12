<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Vignette; 
use App\Models\Apprentissage; 
use App\Models\Fichier; 
use App\Models\Certification; 
use App\Models\Documentation; 
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // Récupère des données (exemple avec des utilisateurs)
        $projets = Projet::all();
        $ppe = Projet::getPPE();  // Appel de ta méthode dans le modèle
        $ms = Projet::getMS();
        $pp = Projet::getPP();
        $avatar = Fichier::getAvatar();
        $apprentissages = Apprentissage::all();
        $projets_has_apprentissages = Projet::getProjetWithApprentissage();
        $avatar = Fichier::getAvatar();
        $fichiers = Fichier::all();
        // Retourne la vue et passe la variable $projets
        $vignettes = Vignette::all();
        $certifications = Certification::all();
        $documentations = Documentation::all();
        // Retourne les données en réponse JSON
        return response()->json([
            'projets' => $projets,
            'ppe' => $ppe,
            'ms' => $ms, 
            'pp' => $pp,
            'apprentissages' => $apprentissages,
            'vignettes' => $vignettes,
            'avatar' => $avatar,
            'projets_has_apprentissages' => $projets_has_apprentissages,
            'certifications' => $certifications,
            'fichiers' => $fichiers,
            'documentations' => $documentations, 

        ]);
    }

    public function blade()
    {
        // Récupère les projets avec les apprentissages associés
        $projets = Projet::getPPE();  // Appel de ta méthode dans le modèle
        $ms = Projet::getMS();
        $pp = Projet::getPP();
        $projets_has_apprentissages = Projet::getProjetWithApprentissage();
        $apprentissages = Apprentissage::all();
        $avatar = Fichier::getAvatar();
        // Retourne la vue et passe la variable $projets
        $vignettes = Vignette::all();
        // dd($projets_has_apprentissages);
        return view('projets', compact('projets','vignettes','projets_has_apprentissages','apprentissages','ms','pp','avatar'));
    }

    
}
