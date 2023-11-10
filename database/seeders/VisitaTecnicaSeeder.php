<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisitaTecnica;
use Illuminate\Support\Facades\DB;


class VisitaTecnicaSeeder extends Seeder
{
    public function run()
    {

        for ($i = 1; $i <= 20; $i++) {
            DB::table('visita_tecnicas')->insert([
                'user_id' => 1,
                'detalhes' => 'Reparo na rede elétrica',
                'data_agendada' => now()->addDays(5),
                'necessita_visita' => true,
            ]);
        }
       
    }
}


