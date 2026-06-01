<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Vignette;
use App\Models\Apprentissage;
use App\Models\Fichier;
use App\Models\Certification;
use App\Models\Documentation;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'projets'                    => Projet::all(),
            'ppe'                        => Projet::getPPE(),
            'ms'                         => Projet::getMS(),
            'pp'                         => Projet::getPP(),
            'apprentissages'             => Apprentissage::all(),
            'vignettes'                  => Vignette::all(),
            'avatar'                     => Fichier::getAvatar(),
            'projets_has_apprentissages' => Projet::getProjetWithApprentissage(),
            'certifications'             => Certification::all(),
            'fichiers'                   => Fichier::all(),
            'documentations'             => Documentation::all(),
        ]);
    }

    public function getProjetWithApprentissage(): JsonResponse
    {
        return response()->json(Projet::getProjetWithApprentissage());
    }
}
