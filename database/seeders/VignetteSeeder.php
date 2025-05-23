<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VignetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('vignettes')->insert([
            [
                'id'=>1,
                'nom'=>'htmlcss',
                'chemin' => '/storage/vignettes/htmlcss.jpg',
                'extension'=>'jpg',
                'taille'=>1022,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>2,
                'nom'=>'python',
                'chemin' => '/storage/vignettes/python.png',
                'extension'=>'png',
                'taille'=>175,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>3,
                'nom'=>'shellscript',
                'chemin' => '/storage/vignettes/shellscript.png',
                'extension'=>'png',
                'taille'=>175,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>4,
                'nom'=>'MySql',
                'chemin' => '/storage/vignettes/MySQL.png',
                'extension'=>'png',
                'taille'=>175,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>5,
                'nom'=>'C#',
                'chemin' => '/storage/vignettes/Logo_C_sharp.svg.png',
                'extension'=>'png',
                'taille'=>175,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>6,
                'nom'=>'php',
                'chemin' => '/storage/vignettes/php.png',
                'extension'=>'png',
                'taille'=>79,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>7,
                'nom'=>'figma',
                'chemin' => '/storage/vignettes/figma.png',
                'extension'=>'png',
                'taille'=>4,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>8,
                'nom'=>'wordpress',
                'chemin' => '/storage/vignettes/wordpress.png',
                'extension'=>'png',
                'taille'=>6,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>9,
                'nom'=>'MVC',
                'chemin' => '/storage/vignettes/MVC.jpeg',
                'extension'=>'jpeg',
                'taille'=>99,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>10,
                'nom'=>'Symfony',
                'chemin' => '/storage/vignettes/symfony.png',
                'extension'=>'png',
                'taille'=>9,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>11,
                'nom'=>'Laravel',
                'chemin' => '/storage/vignettes/laravel.png',
                'extension'=>'png',
                'taille'=>9,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>12,
                'nom'=>'Filament',
                'chemin' => '/storage/vignettes/filament.png',
                'extension'=>'png',
                'taille'=>32,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>13,
                'nom'=>'Sun',
                'chemin' => '/storage/vignettes/projet_integration.png',
                'extension'=>'png',
                'taille'=>572,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>14,
                'nom'=>'Vet X',
                'chemin' => '/storage/vignettes/projet_responsive.png',
                'extension'=>'png',
                'taille'=>536,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>15,
                'nom'=>'MathIndex',
                'chemin' => '/storage/vignettes/MathIndex_Illustration.png',
                'extension'=>'png',
                'taille'=>572,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]
            ,
            [
                'id'=>16,
                'nom'=>'JavaScript',
                'chemin' => '/storage/vignettes/JavaScript.png',
                'extension'=>'png',
                'taille'=>572,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>17,
                'nom'=>'heure_dvt',
                'chemin' => '/storage/vignettes/heure_dvt.png',
                'extension'=>'png',
                'taille'=>111,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>18,
                'nom'=>'GestionTheatre',
                'chemin' => '/storage/vignettes/GestionTheatre.png',
                'extension'=>'png',
                'taille'=>287,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>19,
                'nom'=>'CongeFacile',
                'chemin' => '/storage/vignettes/CongeFacile.png',
                'extension'=>'png',
                'taille'=>572,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>20,
                'nom'=>'Signes',
                'chemin' => '/storage/vignettes/signes.png',
                'extension'=>'png',
                'taille'=>122,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>21,
                'nom'=>'LordStudio',
                'chemin' => '/storage/vignettes/LordStudio.png',
                'extension'=>'png',
                'taille'=>57,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>22,
                'nom'=>'Voltaire',
                'chemin' => '/storage/vignettes/voltaire.png',
                'extension'=>'png',
                'taille'=>572,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>23,
                'nom'=>'Pix',
                'chemin' => '/storage/vignettes/pix.png',
                'extension'=>'png',
                'taille'=>572,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>24,
                'nom'=>'VueJS',
                'chemin' => '/storage/vignettes/vue.png',
                'extension'=>'png',
                'taille'=>2537,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>25,
                'nom'=>'POC_html_css_BTS1',
                'chemin' => '/storage/vignettes/presentation_POC.png',
                'extension'=>'png',
                'taille'=>2537,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>26,
                'nom'=>'POC_html_css_BTS2',
                'chemin' => '/storage/vignettes/Integration_html_css.png',
                'extension'=>'png',
                'taille'=>2537,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>27,
                'nom'=>'typescript',
                'chemin' => '/storage/vignettes/typescript.png',
                'extension'=>'png',
                'taille'=>2537,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            
        ]);
    }
}
