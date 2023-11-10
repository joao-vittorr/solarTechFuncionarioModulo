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
        for ($i = 1; $i <= 11; $i++) {
            DB::table('users')->insert([
                'name' => 'Usuário ' . $i,
                'email' => 'usuario' . $i . '@example.com',
                'cep' => '00000000',
                'sub' => '1234567890' . $i,
                'access_level' => 'user',
                'cpf' => 'CPF' . $i . $i . $i . $i . $i . $i . $i . $i,
            ]);
        }
        DB::table('users')->insert([
            'name' => 'João Vitor',
            'email' => 'ribeiro.alexandre@escolar.ifrn.edu.br',
            'cep' => '00000000',
            'sub' => '110955377050310839557',
            'access_level' => 'admin',
            'cpf' => '11111111111',
        ]);
        DB::table('users')->insert([
            'name' => 'John',
            'email' => 'johnwendel.wendel@gmail.com',
            'cep' => '00000000',
            'sub' => '110546966188464350338',
            'access_level' => 'admin',
            'cpf' => '2222222222',
        ]);
        
    }
}
