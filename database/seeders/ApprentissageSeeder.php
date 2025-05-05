<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApprentissageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('apprentissages')->insert([
            [
                'id'=>1,
                'libelle'=>'python',
                'description'=>'Acquis en spécialité NSI(Numérique et Sciences de l\'Informatique) pour apprendre le langage de programmation',
                'commencement'=>'2021-10-01',
                'fin'=>'2022-05-01',
                'id_vignette'=>2, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>2,
                'libelle'=>'shellscript',
                'description'=>'Appris en spécialité NSI(Numérique et Sciences de l\'Informatique) sur weblinux',
                'commencement'=>'2021-12-01',
                'fin'=>'2022-03-01',
                'id_vignette'=>3, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>3,
                'libelle'=>'htmlcss',
                'description'=>'Acquis en spécialité NSI(Numérique et Sciences de l\'Informatique)',
                'commencement'=>'2022-02-01',
                'fin'=>'2022-03-01',
                'id_vignette'=>1, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>4,
                'libelle'=>'MySQL',
                'description'=>'Acquis en spécialité NSI(Numérique et Sciences de l\'Informatique) pour apprendre à manipuler des données',
                'commencement'=>'2022-02-01',
                'fin'=>'2022-03-01',
                'id_vignette'=>4, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>5,
                'libelle'=>'JavaScript',
                'description'=>'Acquis en spécialité NSI(Numérique et Sciences de l\'Informatique)',
                'commencement'=>'2022-02-01',
                'fin'=>'2024-05-01',
                'id_vignette'=>16, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>6,
                'libelle'=>'C#',
                'description'=>'Appris sur l\'ensemble des deux années de BTS, en première année j\'ai appris les bases du POO et en seconde année le développement en 4 couches et les windows form',
                'commencement'=>'2023-09-01',
                'fin'=>'2024-12-01',
                'id_vignette'=>5, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>7,
                'libelle'=>'php',
                'description'=>'Appris sur l\'ensemble des deux années de BTS, en première année j\'ai appris les bases et en seconde année le développement en framework php',
                'commencement'=>'2024-01-01',
                'fin'=>'2024-12-01',
                'id_vignette'=>6, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>8,
                'libelle'=>'Figma',
                'description'=>'J\'ai découvert Figma pour réaliser la maquette de mon portfolio V1',
                'commencement'=>'2024-02-01',
                'fin'=>'2024-03-01',
                'id_vignette'=>7, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>9,
                'libelle'=>'MVC',
                'description'=>'J\'ai découvert le patron de conception MVC pendant mon stage de 1ere année chez EC2E.',
                'commencement'=>'2024-06-03',
                'fin'=>'2024-06-28',
                'id_vignette'=>9, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>10,
                'libelle'=>'Symfony',
                'description'=>'J\'ai découvert Symfony avec un projet personnel, puis je l\'ai approfondie dans le projet personnel encadré CongeFacile',
                'commencement'=>'2024-08-03',
                'fin'=>'2025-04-28',
                'id_vignette'=>10, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>11,
                'libelle'=>'Laravel',
                'description'=>'J\'ai découvert Laravel pour me préparer à mon stage de 2e année de BTS au Conseil Départemental du Val d\'Oise.',
                'commencement'=>'2024-12-18',
                'fin'=>'2025-03-07',
                'id_vignette'=>12, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>12,
                'libelle'=>'Filament',
                'description'=>'J\'ai découvert Filament dans le cadre de mon stage de 2e année de BTS au Conseil Départemental du Val d\'Oise.',
                'commencement'=>'2025-01-13',
                'fin'=>'2025-03-07',
                'id_vignette'=>12, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>13,
                'libelle'=>'Vue',
                'description'=>'J\'ai découvert VueJS pour me préparer aux POC d\'offres d\'alternances.',
                'commencement'=>'2025-03-13',
                'fin'=>'2025-03-27',
                'id_vignette'=>23, 
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
