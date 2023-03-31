<?php

namespace Database\Factories;

use Domain\PurchaseOrder\Models\PurchaseOrderLine;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseOrderLineFactory extends Factory
{
    protected $model = PurchaseOrderLine::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->realText(10),
            'quantity' => fake()->randomNumber(2),
            'unit_price' => fake()->randomNumber(2),
        ];
    }
}
