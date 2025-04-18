<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
                'chemin' => '/fichiers/CV_Heddy_Mameri.pdf',
                'extension'=>'pdf',
                'taille'=>130,
            ]
        ]);
    }
}
