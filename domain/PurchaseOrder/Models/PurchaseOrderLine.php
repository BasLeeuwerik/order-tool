<?php

namespace Domain\PurchaseOrder\Models;

use Database\Factories\PurchaseOrderLineFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderLine extends Model
{
    use HasFactory;
    use HasUuids;

    protected static function newFactory(): PurchaseOrderLineFactory
    {
        return PurchaseOrderLineFactory::new();
    }
}
