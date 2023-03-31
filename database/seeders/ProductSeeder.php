<?php

namespace Database\Seeders;

use Domain\Product\Enums\SecondFirstOptions;
use Domain\Product\Enums\SecondSecondOptions;
use Domain\Product\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $types = array_merge(
            SecondFirstOptions::cases(),
            SecondSecondOptions::cases(),
        );

        foreach ($types as $slug) {
            $product = new Product();
            $product->slug = $slug->value;
            $product->base_price = fake()->randomFloat(8, 0, 9);
            $product->multiplier = fake()->randomFloat(8, 0, 9);
            $product->save();
        }
    }
}
