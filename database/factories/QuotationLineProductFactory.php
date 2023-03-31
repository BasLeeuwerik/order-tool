<?php

namespace Database\Factories;

use Domain\Product\Enums\FirstOption;
use Domain\Product\Enums\SecondFirstOptions;
use Domain\Product\Enums\SecondSecondOptions;
use Domain\Product\Enums\ThirdOption;
use Domain\Quotation\Models\QuotationLineProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuotationLineProductFactory extends Factory
{
    protected $model = QuotationLineProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstOption = fake()->randomElement(FirstOption::cases())->value;

        return [
            'first_option' => $firstOption,
            'second_option' => fake()->randomElement($firstOption === FirstOption::OPTION_1_1 ? SecondSecondOptions::cases() : SecondFirstOptions::cases())->value,
            'third_option' => fake()->randomElement(ThirdOption::cases())->value,
            'has_extra' => fake()->boolean,
            'has_speed' => fake()->boolean,
        ];
    }
}
