<?php

namespace Database\Factories;

use App\Models\Estoque;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Despesas>
 */
class EstoqueFactory extends Factory
{
    protected $model = Estoque::class;

    public function definition()
    {
        return [
            'valor' => $this->faker->randomFloat(2, 10, 1000),
            'descricao' => $this->faker->sentence(4),
            'data_compra' => $this->faker->date,
            'quantidade' => $this->faker->numberBetween(0,1000),
            'user_id' => $this->faker->numberBetween(1,2,3),
        ];
    }
    
}