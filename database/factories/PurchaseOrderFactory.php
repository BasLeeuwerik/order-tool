<?php

namespace Database\Factories;

use Domain\Company\Models\Company;
use Domain\PurchaseOrder\Enums\PurchaseOrderStatusType;
use Domain\PurchaseOrder\Models\PurchaseOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseOrderFactory extends Factory
{
    protected $model = PurchaseOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => fake()->randomElement(PurchaseOrderStatusType::cases())->value,

            'reference' => fake()->creditCardNumber(),

            'paid_at' => fake()->dateTime(),
            'shipped_at' => fake()->dateTime(),
            'shipping_email_sent_at' => fake()->dateTime(),
            'target_delivery_date_at' => fake()->date(),

            'vat_percentage' => fake()->randomNumber(2),
            'discount_percentage' => 0,
            'discount_amount' => fake()->randomNumber(2),

            'shipping_address_line_1' => fake()->streetName(),
            'shipping_address_line_2' => fake()->address(),
            'shipping_zip_code' => fake()->postcode(),
            'shipping_city' => fake()->city(),
            'shipping_region' => fake()->city(),
            'shipping_country' => fake()->country(),

            'billing_address_line_1' => fake()->streetName(),
            'billing_address_line_2' => fake()->address(),
            'billing_zip_code' => fake()->postcode(),
            'billing_city' => fake()->city(),
            'billing_region' => fake()->city(),
            'billing_country' => fake()->country(),
        ];
    }

    public function forCompany(Company $company): PurchaseOrderFactory
    {
        return $this->state([
            'company_id' => $company->id,
        ]);
    }
}
