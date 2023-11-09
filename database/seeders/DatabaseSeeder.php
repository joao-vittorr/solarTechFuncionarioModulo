<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            PacotesSeeder::class,
            UsersTableSeeder::class,
            VendasSeeder::class,
            VisitaTecnicaSeeder::class,
            CategoriasSeeder::class,
        ]);
    }
}