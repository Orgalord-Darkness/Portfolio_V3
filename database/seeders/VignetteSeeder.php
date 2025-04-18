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
                'nom'=>'HTMLCSS',
                'chemin' => '/resources/vignettes/HTMLCSS.png',
                'extension'=>'png',
                'taille'=>1022,
            ],
            [
                'id'=>2,
                'nom'=>'python',
                'chemin' => '/resources/vignettes/python.png',
                'extension'=>'png',
                'taille'=>175,
            ],
            [
                'id'=>3,
                'nom'=>'shellscript',
                'chemin' => '/resources/vignettes/shellscript.png',
                'extension'=>'png',
                'taille'=>175,
            ],
            [
                'id'=>4,
                'nom'=>'MySql',
                'chemin' => '/resources/vignettes/MySQL.png',
                'extension'=>'png',
                'taille'=>175,
            ],
            [
                'id'=>5,
                'nom'=>'C#',
                'chemin' => '/resources/vignettes/Logo_C_sharp.svg.png',
                'extension'=>'png',
                'taille'=>175,
            ],
            [
                'id'=>6,
                'nom'=>'php',
                'chemin' => '/resources/vignettes/php.png',
                'extension'=>'png',
                'taille'=>79,
            ],
            [
                'id'=>7,
                'nom'=>'figma',
                'chemin' => '/resources/vignettes/figma.png',
                'extension'=>'png',
                'taille'=>4,
            ],
            [
                'id'=>8,
                'nom'=>'wordpress',
                'chemin' => '/resources/vignettes/wordpress.png',
                'extension'=>'png',
                'taille'=>6,
            ],
            [
                'id'=>9,
                'nom'=>'MVC',
                'chemin' => '/resources/vignettes/MVC.jpeg',
                'extension'=>'jpeg',
                'taille'=>99,
            ],
            [
                'id'=>10,
                'nom'=>'Symfony',
                'chemin' => '/resources/vignettes/symfony.png',
                'extension'=>'png',
                'taille'=>9,
            ],
            [
                'id'=>11,
                'nom'=>'Laravel',
                'chemin' => '/resources/vignettes/laravel.png',
                'extension'=>'png',
                'taille'=>9,
            ],
            [
                'id'=>12,
                'nom'=>'Filament',
                'chemin' => '/resources/vignettes/filament.png',
                'extension'=>'png',
                'taille'=>32,
            ],
            [
                'id'=>13,
                'nom'=>'Sun',
                'chemin' => '/resources/vignettes/projet_integration.png',
                'extension'=>'png',
                'taille'=>572,
            ],
            [
                'id'=>14,
                'nom'=>'Vet X',
                'chemin' => '/resources/vignettes/projet_integration.png',
                'extension'=>'png',
                'taille'=>536,
            ],
            [
                'id'=>15,
                'nom'=>'MathIndex',
                'chemin' => '/resources/vignettes/MathIndex_Illustration.png',
                'extension'=>'png',
                'taille'=>572,
            ]
            
        ]);
    }
}
