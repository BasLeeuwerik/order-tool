<?php

namespace Database\Factories;

use Domain\Company\Enums\CompanyType;
use Domain\Company\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(CompanyType::cases()),

            'name' => fake()->company(),
            'email' => fake()->safeEmail(),

            'phone_country_code' => '+31',
            'phone_number' => fake()->numerify('########'),

            'website' => fake()->url(),
            'legal_owner' => fake()->name(),

            'vat_number' => fake()->creditCardNumber(),
            'coc_number' => fake()->creditCardNumber(),
            'iban_number' => fake()->iban(),
            'bic_number' => fake()->swiftBicNumber(),

            'vat_number_validated_at' => fake()->dateTime(),

            'discount_percentage' => fake()->randomNumber(2),
            'discount_amount' => fake()->randomNumber(2),
        ];
    }
}
