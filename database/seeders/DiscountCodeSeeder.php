<?php

namespace Database\Seeders;

use Database\Factories\DiscountCodeFactory;
use Illuminate\Database\Seeder;

class DiscountCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiscountCodeFactory::new()
            ->count(10)
            ->create();
    }
}
