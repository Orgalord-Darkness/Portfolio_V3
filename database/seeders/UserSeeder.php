<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $email    = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');
        $name     = env('ADMIN_NAME', 'Admin');

        if (!$email || !$password) {
            $this->command->error('ADMIN_EMAIL et ADMIN_PASSWORD doivent être définis dans .env avant de lancer le seeder.');
            return;
        }

        DB::table('users')->updateOrInsert(
            ['email' => $email],
            [
                'name'       => $name,
                'email'      => $email,
                'password'   => Hash::make($password),
                'is_admin'   => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
