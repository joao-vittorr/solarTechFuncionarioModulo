<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendasSeeder extends Seeder
{
    public function run()
    {
        // Inserir dados de exemplo na tabela 'vendas'
        DB::table('vendas')->insert([
            [
                'name' => 'Cliente 1',
                'email' => 'cliente1@example.com',
                'cpf' => '123.456.789-00',
                'cep' => '12345-678',
                'numero_casa' => '123',
                'logradouro' => 'Rua Exemplo, 123',
                'bairro' => 'Bairro Teste',
                'cidade' => 'Cidade A',
                'estado' => 'UF',
                'access_level' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cliente 2',
                'email' => 'cliente2@example.com',
                'cpf' => '987.654.321-00',
                'cep' => '54321-876',
                'numero_casa' => '456',
                'logradouro' => 'Avenida Teste, 456',
                'bairro' => 'Outro Bairro',
                'cidade' => 'Cidade B',
                'estado' => 'UF',
                'access_level' => 2,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
