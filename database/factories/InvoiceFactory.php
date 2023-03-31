<?php

namespace Database\Factories;

use Domain\Company\Models\Company;
use Domain\Invoice\Enums\InvoiceStatusType;
use Domain\Invoice\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => fake()->randomElement(InvoiceStatusType::cases())->value,
            'number' => fake()->randomNumber(9),
            'number_date' => fake()->randomDigit(),
            'number_count' => fake()->randomNumber(2),
            'vat_percentage' => fake()->randomNumber(2),
            'sender_vat_number' => fake()->creditCardNumber,
            'sender_coc_number' => fake()->creditCardNumber,
            'sender_name' => fake()->company,
            'sender_address' => fake()->address,
            'sender_zip_code' => fake()->postcode,
            'sender_city' => fake()->city,
            'sender_country' => fake()->country,
            'receiver_vat_number' => fake()->creditCardNumber,
            'receiver_coc_number' => fake()->creditCardNumber,
            'receiver_name' => fake()->company,
            'receiver_address' => fake()->address,
            'receiver_zip_code' => fake()->postcode,
            'receiver_city' => fake()->city,
            'receiver_country' => fake()->country,
        ];
    }

    public function toCompany(Company $company): InvoiceFactory
    {
        return $this->state([
            'receiver_id' => $company->id,
        ]);
    }

    public function fromCompany(Company $company): InvoiceFactory
    {
        return $this->state([
            'sender_id' => $company->id,
        ]);
    }
}
