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
        DB::table('users')->insert([
            'name' => 'John',
            'email' => 'comentadortt@gmail.com',
            'cep' => '00000000',
            'sub' => '114460432847193081813',
            'access_level' => 'admin',
            'cpf' => '33333333333',
        ]);
        
    }
}
