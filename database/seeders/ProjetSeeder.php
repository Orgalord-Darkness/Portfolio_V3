<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Projet; 

class ProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('projets')->insert([
            [
                'id'=>1,
                'nom'=>'Sun',
                'description'=>'Projet d\'Intégration en html/css bloc par bloc d\'un faux site corporate pour une association écologique',
                'chef'=>'M. Espargeliere',
                'duree'=>7,
                'stack'=>'html,css',
                'is_github' => false,
                'github' => null, 
                'bilan'=>'L\'intégration est réussi à part quelques petits détails à corriger',
                'type'=>'PPE',
                'ordre'=>1,
                'id_vignette'=>13, 
                'created_at'=>now(),
                'updated_at'=>now(),
                
            ],
            [
                'id'=>2,
                'nom'=>'Vet X',
                'description'=>'Projet d\'Intégration en html/css avec responsive bloc par bloc d\'un faux site corporate de vétérinaire',
                'chef'=>'M. Espargeliere',
                'duree'=>10,
                'stack'=>'html,css',
                'is_github' => false,
                'github' => null, 
                'bilan'=>'Le responsive est réussi à part quelques détails sur les divs en absolute',
                'type'=>'PPE',
                'ordre'=>2,
                'id_vignette'=>14, 
                'created_at'=>now(),
                'updated_at'=>now(),
                
            ],
            [
                'id'=>3,
                'nom'=>'POC html/css',
                'description'=>'(POC) Proof Of Concept de BTS1 de 3 heures de html/css/js d\'un site corporate d\'une menuiserie',
                'chef'=>'M. Espargeliere',
                'duree'=>3,
                'stack'=>'html,css,bootstrap,js',
                'is_github' => false,
                'github' => null, 
                'bilan'=>'Quelques problèmes mineurs avec le responsive',
                'type'=>'PPE',
                'ordre'=>3,
                'id_vignette'=>25, 
                'created_at'=>now(),
                'updated_at'=>now(),
                
            ],
            [
                'id'=>4,
                'nom'=>'Menuiserie',
                'description'=>'(POC) Proof Of Concept de BTS2 de 3 heures de html/css/js d\'un site corporate d\'une menuiserie',
                'chef'=>'M. Espargeliere',
                'duree'=>3,
                'stack'=>'html,css,bootstrap,js',
                'is_github' => false,
                'github' => null, 
                'bilan'=>'Il y a des problèmes avec les shadow box',
                'type'=>'PPE',
                'ordre'=>4,
                'id_vignette'=>26, 
                'created_at'=>now(),
                'updated_at'=>now(),
                
            ],
            [
                'id'=>5,
                'nom'=>'MathIndex',
                'description'=>'Projet Personnel Encadré de fin de première année de BTS réalisé en équipe de 3, hébergé sur github avec une documentation complète à produire. C\'est une bibliothèque d\'exercices de mathématiques où les professeurs peuvent publier et les élèves lire les exercices.',
                'chef'=>'M. Martins',
                'duree'=>50,
                'stack'=>'html, css, php, js, git, github, parsec, discord',
                'is_github' => true,
                'github' => 'https://github.com/Orgalord-Darkness/Math_Index_Groupe4', 
                'bilan'=>'L\'ensemble des fonctionnalités est traité, il y a quelques problèmes d\'intégrations mais sinon tout est fonctionnel.',
                'type'=>'PPE',
                'ordre'=>5,
                'id_vignette'=>15, 
                'created_at'=>now(),
                'updated_at'=>now(),
                
            ],
            [
                'id'=>6,
                'nom'=>'heure_developpement',
                'description'=>'Mission du stage de première année de BTS chez EC2E seul avec maquette figma. Applications de gestion du nombre d\'heures de travail de l\'équipe R&D avec leur occupation et projets en cours.',
                'chef'=>'M. Haller',
                'duree'=>50,
                'stack'=>'html, css, php, js, ajax, figma',
                'is_github' => false,
                'github' => null, 
                'bilan'=>'Les attentes ont été dépassé avec des quelques fonctionnalités d\'ajout et de recherche en AJAX .',
                'type'=>'MS',
                'ordre'=>6,
                'id_vignette'=>17, 
                'created_at'=>now(),
                'updated_at'=>now(),
                
            ],
            [
                'id'=>7,
                'nom'=>'GestionTheatre',
                'description'=>'Projet personnel encadré de C# de BTS2 à réaliser en équipe de 3 avec une documentation complète à produire. C\'est une application dotnet C# avec des windows form de gestion de théâtres, de représentations, de pièces et de réservations.',
                'chef'=>'M. Idasiak',
                'duree'=>50,
                'stack'=>'C#, github, git',
                'is_github' => true,
                'github' => 'https://github.com/nZo95/projet_csharp_gestion_theatre',
                'bilan'=>'Le projet est fonctionnel et tout a été traité .',
                'type'=>'PPE',
                'ordre'=>7,
                'id_vignette'=>18, 
                'created_at'=>now(),
                'updated_at'=>now(),
                
            ],
            [
                'id'=>8,
                'nom'=>'CongéFacile',
                'description'=>'Projet personnel encadré de Symfony de BTS2 à réaliser en équipe de 4 avec une documentation complète à produire. C\'est une application de gestion des demandes de congés.',
                'chef'=>'M. Martins',
                'duree'=>50,
                'stack'=>'C#, github, git',
                'is_github' => true,
                'github'=>'https://github.com/TechnicienDeSurface/Symfony-CongeFacile',
                'bilan'=>'Le projet est fonctionnel et tout a été traité .',
                'type'=>'PPE',
                'ordre'=>8,
                'id_vignette'=>19, 
                'created_at'=>now(),
                'updated_at'=>now(),
                
            ],
            [
                'id'=>9,
                'nom'=>'Signes',
                'description'=>'Mission de stage de deuxième année zu Conseil Départemental du Val d\'Oise. Application de gestion des signalements dans les établissements médicaux.',
                'chef'=>'M. Foiret',
                'duree'=>75,
                'stack'=>'Laravel, bitbucket, filament',
                'is_github' => false,
                'github'=>null,
                'bilan'=>'Le projet est fonctionnel mais il manque les filtres de widgets .',
                'type'=>'MS',
                'ordre'=>9,
                'id_vignette'=>20, 
                'created_at'=>now(),
                'updated_at'=>now(),
                
            ],
            [
                'id'=>10,
                'nom'=>'Lord Studio',
                'description'=>'Projet personnel pour découvrir Laravel avec un crud generator. Application de streaming qui permet de visionner des vidéos mp4 directement sur l\'application.',
                'chef'=>'M. Mameri',
                'duree'=>5,
                'stack'=>'Laravel',
                'is_github' => true,
                'github'=>'https://github.com/Orgalord-Darkness/LordStudio',
                'bilan'=>'Le projet est fonctionnel mais les fichiers mp4 sont trop volumineux pour être téléchargés',
                'type'=>'PP',
                'ordre'=>10,
                'id_vignette'=>21, 
                'created_at'=>now(),
                'updated_at'=>now(),
                
            ],
        ]);
    }
}
