<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('documentations')->insert([
            [
                'id'=>1,
                'nom'=>'Cahier des charges MathIndex',
                'chemin' => '/documentations/CDC_MathIndex_Light.pdf',
                'extension'=>'pdf',
                'taille'=>248,
                'id_projet' => 5, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>2,
                'nom'=>'Dictionnaire de données MathIndex',
                'chemin' => '/documentations/DICTIONNAIRE_DE_DONNEES_Math_Index.pdf',
                'extension'=>'pdf',
                'taille'=>393,
                'id_projet' => 5, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>3,
                'nom'=>'Guide utilisateur MathIndex',
                'chemin' => '/documentations/Guide_utilisateur_MathIndex.pdf',
                'extension'=>'pdf',
                'taille'=>1493,
                'id_projet' => 5, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>4,
                'nom'=>'Kit Ui MathIndex',
                'chemin' => '/documentations/KIT_UI_MathIndex.pdf',
                'extension'=>'pdf',
                'taille'=>1493,
                'id_projet' => 5, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>5,
                'nom'=>'Script SQL MathIndex',
                'chemin' => '/documentations/SCRIPT_SQL_MathIndex.pdf',
                'extension'=>'pdf',
                'taille'=>743,
                'id_projet' => 5, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>6,
                'nom'=>'Backlog MathIndex',
                'chemin' => '/documentations/BACKLOG_MathIndex.pdf',
                'extension'=>'pdf',
                'taille'=>226,
                'id_projet' => 5, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>7,
                'nom'=>'Spécifications Fonctionnelles GestionTheatre',
                'chemin' => '/documentations/Spécifications_Fonctionnelles_ProjetC#.pdf',
                'extension'=>'pdf',
                'taille'=>540,
                'id_projet' => 7, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>8,
                'nom'=>'Spécifications Techniques GestionTheatre',
                'chemin' => '/documentations/Spécifications_Techniques_ProjetC#.pdf',
                'extension'=>'pdf',
                'taille'=>447,
                'id_projet' => 7, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>9,
                'nom'=>'Guide utilisateur GestionTheatre',
                'chemin' => '/documentations/Guide_Utilisateur_ProjetC#_Gestion_Théâtre.pdf',
                'extension'=>'pdf',
                'taille'=>540,
                'id_projet' => 7, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>10,
                'nom'=>'Cahier de recette GestionTheatre',
                'chemin' => '/documentations/Cahier_de_recette_Projet_GestionTheatres.pdf',
                'extension'=>'pdf',
                'taille'=>72,
                'id_projet' => 7, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>11,
                'nom'=>'Cahier des charges CongeFacile',
                'chemin' => '/documentations/CDC_CongeFacile.pdf',
                'extension'=>'pdf',
                'taille'=>503,
                'id_projet' => 8, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            
        ]);
    }
}
