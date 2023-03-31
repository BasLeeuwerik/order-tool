<?php

namespace Database\Seeders;

use Database\Factories\InvoiceFactory;
use Database\Factories\InvoiceLineFactory;
use Domain\Company\Enums\CompanyType;
use Domain\Company\Models\Company;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientCompanies = Company::query()
            ->where('type', CompanyType::CLIENT)
            ->get();

        $testCompany = Company::query()
            ->where('type', CompanyType::TESTCOMPANY)
            ->first();

        foreach ($clientCompanies as $clientCompany) {
            InvoiceFactory::new()
                ->toCompany($clientCompany)
                ->fromCompany($testCompany)
                ->count(3)
                ->has(
                    InvoiceLineFactory::new()
                        ->count(3), 'lines')
                ->create();
        }
    }
}
