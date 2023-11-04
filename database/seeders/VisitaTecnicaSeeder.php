<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisitaTecnica;

class VisitaTecnicaSeeder extends Seeder
{
    public function run()
    {
        VisitaTecnica::create([
            'user_id' => 1,
            'detalhes' => 'Reparo na rede elétrica',
            'data_agendada' => now()->addDays(5),
            'necessita_visita' => true,
        ]);

        VisitaTecnica::create([
            'user_id' => 2,
            'detalhes' => 'Instalação de equipamento de rede',
            'data_agendada' => now()->addDays(8),
            'necessita_visita' => true,
        ]);
    }
}


