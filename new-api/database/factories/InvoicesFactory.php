<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoices>
 */
class InvoicesFactory extends Factory
{
    /**
     * Defina o estado padrão do modelo.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $paid = $this->faker->boolean(); // Valor booleano aleatório (verdadeiro ou falso)

        return [
            'user_id' => User::all()->random()->id,
            'type' => $this->faker->randomElement(['B','C','P']),
            'paid' => $paid,
            'value'=> $this->faker->numberBetween(1000, 10000),
            'payment_date' => $paid ? $this->faker->dateTimeThisMonth() : null, // Data de pagamento condicional
        ];
    }
}
