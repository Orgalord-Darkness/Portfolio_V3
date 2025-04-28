<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Projet_Has_ApprentissageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('projets_has_apprentissages')->insert([
            //Projet 1 Intégration html/css
            [
                'id' => 1, 
                'id_projet' => 1,
                'id_apprentissage' => 3, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Projet 2 Responsive 
            [
                'id' => 2, 
                'id_projet' => 2,
                'id_apprentissage' => 3, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Projet 3 POC html/css
            [
                'id' => 3, 
                'id_projet' => 3,
                'id_apprentissage' => 3, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4, 
                'id_projets' => 3,
                'id_apprentissages' => 5, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Projet 4 Menuiserie
            [
                'id' => 5, 
                'id_projet' => 4,
                'id_apprentissage' => 3, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6, 
                'id_projets' => 4,
                'id_apprentissages' => 5, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Projet 5 MathIndex
            [
                'id' => 7, 
                'id_projet' => 5,
                'id_apprentissage' => 3, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8, 
                'id_projet' => 5,
                'id_apprentissage' => 5, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9, 
                'id_projet' => 5,
                'id_apprentissage' => 4, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10, 
                'id_projet' => 5,
                'id_apprentissage' => 7, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11, 
                'id_projet' => 5,
                'id_apprentissage' => 8, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Projet 6 heure_developpement
            [
                'id' => 12, 
                'id_projet' => 5,
                'id_apprentissage' => 3, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13, 
                'id_projet' => 6,
                'id_apprentissage' => 5, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14, 
                'id_projet' => 6,
                'id_apprentissage' => 4, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15, 
                'id_projet' => 6,
                'id_apprentissage' => 7, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16, 
                'id_projet' => 6,
                'id_apprentissage' => 8, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17, 
                'id_projet' =>6,
                'id_apprentissage' => 9, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Projet 7 GestionTheatre
            [
                'id' => 18, 
                'id_projet' => 7,
                'id_apprentissage' => 6, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 19, 
                'id_projet' => 7,
                'id_apprentissage' => 4, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 20, 
                'id_projet' => 7,
                'id_apprentissage' => 8, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Projet 8 CongeFacile
            [
                'id' => 21, 
                'id_projet' => 8,
                'id_apprentissage' => 3, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 22, 
                'id_projet' => 8,
                'id_apprentissage' => 5, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 23, 
                'id_projet' => 8,
                'id_apprentissage' => 4, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 24, 
                'id_projet' => 8,
                'id_apprentissage' => 7, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 25, 
                'id_projet' => 8,
                'id_apprentissage' => 8, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 26, 
                'id_projet' => 8,
                'id_apprentissage' => 9, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 29, 
                'id_projet' => 8,
                'id_apprentissage' => 10, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Projet 9 Signes
            [
                'id' => 30, 
                'id_projet' => 9,
                'id_apprentissage' => 3, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 31, 
                'id_projet' => 9,
                'id_apprentissage' => 5, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 32, 
                'id_projet' => 9,
                'id_apprentissage' => 4, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 33, 
                'id_projet' =>9,
                'id_apprentissage' => 7, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 34, 
                'id_projet' => 9,
                'id_apprentissage' => 8, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 35, 
                'id_projet' => 9,
                'id_apprentissage' => 9, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 36, 
                'id_projet' => 9,
                'id_apprentissage' => 11, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 37, 
                'id_projet' => 9,
                'id_apprentissage' => 12, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //Projet 10 LordStudio
            [
                'id' => 38, 
                'id_projet' => 9,
                'id_apprentissage' => 3, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 39, 
                'id_projet' => 9,
                'id_apprentissage' => 5, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 40, 
                'id_projet' => 9,
                'id_apprentissage' => 4, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 41, 
                'id_projet' =>9,
                'id_apprentissage' => 7, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 42, 
                'id_projet' => 9,
                'id_apprentissage' => 8, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 43, 
                'id_projet' => 9,
                'id_apprentissage' => 9, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 44, 
                'id_projet' => 9,
                'id_apprentissage' => 11, 
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
