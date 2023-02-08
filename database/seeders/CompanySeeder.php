<?php

namespace Database\Seeders;

use Database\Factories\CompanyFactory;
use Database\Factories\CompanyLocationFactory;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        CompanyFactory::new()
            ->count(50)
            ->has(
                CompanyLocationFactory::new()
                    ->count(2), 'locations'
            )
            ->create();
    }
}
