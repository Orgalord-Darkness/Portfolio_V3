<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(FichierSeeder::class);
        $this->call(VignetteSeeder::class);
        $this->call(ProjetSeeder::class);
        $this->call(ApprentissageSeeder::class);
        $this->call(DocumentationSeeder::class);
    }
}
