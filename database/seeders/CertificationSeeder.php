<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('certifications')->insert([
            [
                'id'=>1,
                'libelle'=>'Voltaire',
                'source' => 'ministère de l\'éducation nationale',
                'description'=>'Acquis en 1ere année de BTS proposé par ma professeur de culture générale',
                'commencement'=>'2023-09-16',
                'fin'=>'2024-06-11',
                'id_vignette'=>22, 
                'id_fichier'=> 1,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>2,
                'libelle'=>'Pix',
                'source' => 'ministère de l\'éducation nationale',
                'description'=>'Certification pix avec un score de 513',
                'commencement'=>'2024-12-01',
                'fin'=>'2025-01-05',
                'id_vignette'=>23, 
                'id_fichier'=> 6,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>3,
                'libelle'=>'TypeScript',
                'source' => 'Openclassroom',
                'description'=>'J\'ai fait cette certification par curiosité',
                'commencement'=>'2025-01-03',
                'fin'=>'2025-01-05',
                'id_vignette'=>27, 
                'id_fichier'=> 3,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>4,
                'libelle'=>'Symfony',
                'source' => 'Openclassroom',
                'description'=>'J\'ai fait cette certification pour la seconde année de BTS car il y\'a le projet symfony',
                'commencement'=>'2024-07-01',
                'fin'=>'2025-04-29',
                'id_vignette'=>10, 
                'id_fichier'=> 5,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>5,
                'libelle'=>'VueJS',
                'source' => 'Openclassroom',
                'description'=>'J\'ai fait cette certification pour passer un POC dans le cadre de ma candidature en alternance',
                'commencement'=>'2025-03-15',
                'fin'=>'2025-03-24',
                'id_vignette'=>24, 
                'id_fichier'=> 4,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
