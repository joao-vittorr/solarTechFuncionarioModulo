<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'ADMIN',
            'email' => 'admin@admin.com',
            'cep' => '00000000',
            'sub' => '11',
            'access_level' => 'master',
            'name' => 'John Wendel',
            'email' => 'wendel.john@escolar.ifrn.edu.br',
            'cep' => '00000000',
            'sub' => '13',
            'access_level' => 'master',
            'name' => 'Vitor',
            'email' => 'ribeiro.alexandre@escolar.ifrn.edu.br',
            'cep' => '00000000',
            'sub' => '1234534',
            'access_level' => 'master',
        ]);
    }
}
