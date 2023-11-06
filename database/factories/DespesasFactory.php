<?php

namespace Database\Factories;

use App\Models\Despesas;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Despesas>
 */
class DespesasFactory extends Factory
{
    protected $model = Despesas::class;

    public function definition()
    {
        return [
            'valor' => $this->faker->randomFloat(2, 10, 1000),
            'descricao' => $this->faker->sentence(4),
            'data_despesa' => $this->faker->date,
            'categoria' => $this->faker->word,
            'user_id' => $this->faker->numberBetween(1,2),
        ];
    }
}
