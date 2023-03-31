<?php

namespace Domain\Product\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $casts = [
        'base_price' => 'float',
        'multiplier' => 'float',
    ];
}
