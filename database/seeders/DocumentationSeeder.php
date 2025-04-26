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
        DB::table('fichiers')->insert([
            [
                'id'=>1,
                'nom'=>'CV_Heddy_Mameri',
                'chemin' => '/fichiers/CV_Heddy_Mameri.pdf',
                'extension'=>'pdf',
                'taille'=>130,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'id'=>2,
                'nom'=>'Avatar',
                'chemin' => '/fichiers/AutoPhoto.pdf',
                'extension'=>'pdf',
                'taille'=>130,
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
