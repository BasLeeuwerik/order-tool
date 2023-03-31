<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $seeders = [];
        $seeders[] = RolePermissionSeeder::class;
        $seeders[] = DummyDataSeeder::class;
        $seeders[] = CompanySeeder::class;
        $seeders[] = PurchaseOrderSeeder::class;
        $seeders[] = UserSeeder::class;
        $seeders[] = QuotationSeeder::class;
        $seeders[] = DiscountCodeSeeder::class;
        $seeders[] = InvoiceSeeder::class;
        $seeders[] = ProductSeeder::class;

        $this->call($seeders);
    }
}
