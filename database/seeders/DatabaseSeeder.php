<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);

        $user = User::create([
            'name' => 'Salah eddine Bendyab',
            'email' => 'salahhusa9@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('salahhusa9'),
        ]);
        $categories = [
            ['name_categorie' => 'Pneu'],
            ['name_categorie' => 'Filter'],
            ['name_categorie' => 'Batterie'],
            ['name_categorie' => 'Chambrière'],
            ['name_categorie' => 'Huile']
        ];
        DB::table('categories')->insert($categories);

        $stocks = [
            ['name' => 'Stock 1'],
            ['name' => 'Stock 2']
        ];
        DB::table('stocks')->insert($stocks);
        $user->assignRole('admin');
    }
}
