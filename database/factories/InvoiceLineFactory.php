<?php

namespace Database\Factories;

use Domain\Invoice\Models\InvoiceLine;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceLineFactory extends Factory
{
    protected $model = InvoiceLine::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->realTextBetween(15, 25),
            'unit_price' => fake()->randomNumber(2),
            'quantity' => fake()->randomNumber(3),
        ];
    }
}
