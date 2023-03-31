<?php

namespace Database\Factories;

use Domain\PurchaseOrder\Enums\DiscountCodeStatusType;
use Domain\PurchaseOrder\Models\DiscountCode;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountCodeFactory extends Factory
{
    protected $model = DiscountCode::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'discount_code' => fake()->creditCardNumber,
            'discount_amount' => fake()->randomNumber(2),
            'discount_percentage' => fake()->randomNumber(2),
            'end_date' => fake()->date(),
            'max_usage' => fake()->randomNumber(2),
            'status' => fake()->randomElement(DiscountCodeStatusType::cases())->value,
        ];
    }
}
