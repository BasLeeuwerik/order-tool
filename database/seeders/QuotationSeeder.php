<?php

namespace Database\Seeders;

use Database\Factories\QuotationFactory;
use Database\Factories\QuotationLineFactory;
use Database\Factories\QuotationLineProductFactory;
use Domain\Company\Enums\CompanyType;
use Domain\Company\Models\Company;
use Domain\User\Models\User;
use Illuminate\Database\Seeder;

class QuotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $clientCompanies = Company::query()
            ->where('type', CompanyType::CLIENT)
            ->get();

        $superAdmin = User::query()
            ->where('email', 'super_admin@testcompany.com')
            ->first();

        foreach ($clientCompanies as $clientCompany) {
            QuotationFactory::new()
                ->forCompany($clientCompany)
                ->forUser($superAdmin)
                ->count(3)
                ->has(
                    QuotationLineFactory::new()
                        ->count(1)
                        ->has(
                            QuotationLineProductFactory::new()
                                ->count(1), 'product'
                        ),
                    'lines'
                )
                ->create();
        }
    }
}
