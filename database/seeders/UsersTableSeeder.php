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
            'cpf' => '00000000000',
        ]);
        DB::table('users')->insert([
            'name' => 'João Vitor',
            'email' => 'ribeiro.alexandre@escolar.ifrn.edu.br',
            'cep' => '00000000',
            'sub' => '110955377050310839557',
            'access_level' => 'master',
            'cpf' => '11111111111',
        ]);
    }
}