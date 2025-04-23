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
                'bilan'=>'Le responsive est réussi à part quelques détails sur les divs en absolute',
                'type'=>'PPE',
                'ordre'=>2,
                'id_vignette'=>14, 
                'created_at'=>now(),
                'updated_at'=>now(),
                
            ],
        ]);
    }
}
