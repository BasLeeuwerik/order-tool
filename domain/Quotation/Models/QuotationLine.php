<?php

namespace Domain\Quotation\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class QuotationLine extends Model
{
    use HasUuids;

    public function product(): HasOne
    {
        return $this->hasOne(QuotationLineProduct::class, 'id', 'quotation_product_id');
    }
}
