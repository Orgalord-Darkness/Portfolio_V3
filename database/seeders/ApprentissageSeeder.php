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
                'id_vignette'=>16, 
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
        ]);
    }
}
