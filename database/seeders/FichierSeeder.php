<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FichierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('fichiers')->insert([
            [
                'id'=>1,
                'nom'=>'CV_Heddy_Mameri',
                'chemin' => '/storage/fichiers/CV_Heddy_Mameri.pdf',
                'extension'=>'pdf',
                'taille'=>130,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>2,
                'nom'=>'Avatar',
                'chemin' => '/storage/fichiers/AutoPhoto.png',
                'extension'=>'pdf',
                'taille'=>130,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>3,
                'nom'=>'TypeScript',
                'chemin' => '/storage/fichiers/certification_TypeScript.png',
                'extension'=>'png',
                'taille'=>130,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>4,
                'nom'=>'VueJS',
                'chemin' => '/storage/fichiers/certification_VueJS.png',
                'extension'=>'png',
                'taille'=>130,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>5,
                'nom'=>'Symfony',
                'chemin' => '/storage/fichiers/certification_Symfony.png',
                'extension'=>'png',
                'taille'=>130,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>6,
                'nom'=>'Pix',
                'chemin' => '/storage/fichiers/certification-pix-Heddy-Mameri.png',
                'extension'=>'png',
                'taille'=>130,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            
            
        ]);
    }
}
