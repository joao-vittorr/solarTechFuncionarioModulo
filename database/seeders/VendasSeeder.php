<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Venda;
use App\Models\User;

class VendasSeeder extends Seeder
{
    public function run()
    {
        // Busque um usuário existente para associar à venda
        $users = User::first(); // Isso busca o primeiro usuário. Adapte conforme necessário

        // Crie algumas vendas de teste
        Venda::create([
            'nomePacote' => 'Pacote Teste 1',
            'quantidadePlacas' => 5,
            'valorFinal' => 100.50,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);


                Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);
        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);

        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);
        Venda::create([
            'nomePacote' => 'Pacote Teste 2',
            'quantidadePlacas' => 3,
            'valorFinal' => 75.25,
            'users_id' => $users->id
        ]);


        // Adicione mais dados de teste conforme necessário
    }
}

