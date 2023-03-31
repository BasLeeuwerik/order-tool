<?php

namespace Database\Factories;

use Domain\Company\Models\Company;
use Domain\Quotation\Enums\QuotationStatusType;
use Domain\Quotation\Models\Quotation;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuotationFactory extends Factory
{
    protected $model = Quotation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first(),
            'status' => fake()->randomElement(QuotationStatusType::cases())->value,
            'accepted_at' => fake()->dateTime,
        ];
    }

    public function forCompany(Company $company): QuotationFactory
    {
        return $this->state([
            'company_id' => $company->id,
        ]);
    }

    public function forUser(User $user): QuotationFactory
    {
        return $this->state([
            'user_id' => $user->id,
        ]);
    }
}
