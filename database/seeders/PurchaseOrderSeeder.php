<?php

namespace Database\Seeders;

use Database\Factories\PurchaseOrderFactory;
use Database\Factories\PurchaseOrderLineFactory;
use Domain\Company\Enums\CompanyType;
use Domain\Company\Models\Company;
use Illuminate\Database\Seeder;

class PurchaseOrderSeeder extends Seeder
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

        foreach ($clientCompanies as $clientCompany) {
            PurchaseOrderFactory::new()
                ->forCompany($clientCompany)
                ->count(3)
                ->has(
                    PurchaseOrderLineFactory::new()
                        ->count(3), 'lines')
                ->create();
        }
    }
}
