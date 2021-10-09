<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        User::create([
            'name' => 'Salah eddine Bendyab',
            'email' => 'salahhusa9@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('salahhusa9'),
        ]);

        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);
    }
}
