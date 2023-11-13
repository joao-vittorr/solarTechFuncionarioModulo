<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DespesasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('despesas')->insert([
                'user_id' => rand(1, 2), // Substitua 5 pelo número total de usuários
                'data_despesa' => now(), // Use a data e hora atual
                'valor' => rand(10, 1000), // Substitua pelos valores reais desejados
                'descricao' => 'Despesa de teste #' . $i,
                'categoria_id' => rand(1, 3), // Substitua 3 pelo número total de categorias
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
