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
            ],
            [
                'id'=>2,
                'nom'=>'python',
                'chemin' => '/storage/vignettes/python.png',
                'extension'=>'png',
                'taille'=>175,
            ],
            [
                'id'=>3,
                'nom'=>'shellscript',
                'chemin' => '/storage/vignettes/shellscript.png',
                'extension'=>'png',
                'taille'=>175,
            ],
            [
                'id'=>4,
                'nom'=>'MySql',
                'chemin' => '/storage/vignettes/MySQL.png',
                'extension'=>'png',
                'taille'=>175,
            ],
            [
                'id'=>5,
                'nom'=>'C#',
                'chemin' => '/storage/vignettes/Logo_C_sharp.svg.png',
                'extension'=>'png',
                'taille'=>175,
            ],
            [
                'id'=>6,
                'nom'=>'php',
                'chemin' => '/storage/vignettes/php.png',
                'extension'=>'png',
                'taille'=>79,
            ],
            [
                'id'=>7,
                'nom'=>'figma',
                'chemin' => '/storage/vignettes/figma.png',
                'extension'=>'png',
                'taille'=>4,
            ],
            [
                'id'=>8,
                'nom'=>'wordpress',
                'chemin' => '/storage/vignettes/wordpress.png',
                'extension'=>'png',
                'taille'=>6,
            ],
            [
                'id'=>9,
                'nom'=>'MVC',
                'chemin' => '/storage/vignettes/MVC.jpeg',
                'extension'=>'jpeg',
                'taille'=>99,
            ],
            [
                'id'=>10,
                'nom'=>'Symfony',
                'chemin' => '/storage/vignettes/symfony.png',
                'extension'=>'png',
                'taille'=>9,
            ],
            [
                'id'=>11,
                'nom'=>'Laravel',
                'chemin' => '/storage/vignettes/laravel.png',
                'extension'=>'png',
                'taille'=>9,
            ],
            [
                'id'=>12,
                'nom'=>'Filament',
                'chemin' => '/storage/vignettes/filament.png',
                'extension'=>'png',
                'taille'=>32,
            ],
            [
                'id'=>13,
                'nom'=>'Sun',
                'chemin' => '/storage/vignettes/projet_integration.png',
                'extension'=>'png',
                'taille'=>572,
            ],
            [
                'id'=>14,
                'nom'=>'Vet X',
                'chemin' => '/storage/vignettes/projet_integration.png',
                'extension'=>'png',
                'taille'=>536,
            ],
            [
                'id'=>15,
                'nom'=>'MathIndex',
                'chemin' => '/storage/vignettes/MathIndex_Illustration.png',
                'extension'=>'png',
                'taille'=>572,
            ]
            
        ]);
    }
}
