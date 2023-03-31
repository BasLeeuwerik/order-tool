<?php

namespace Domain\PurchaseOrder\Models;

use Database\Factories\PurchaseOrderFactory;
use Domain\PurchaseOrder\Enums\PurchaseOrderStatusType;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PurchaseOrder extends Model
{
    use HasFactory;
    use HasUuids;

    protected $casts = [
        'status' => PurchaseOrderStatusType::class,
    ];

    protected static function newFactory(): PurchaseOrderFactory
    {
        return PurchaseOrderFactory::new();
    }

    public function lines(): HasMany
    {
        return $this->hasMany(PurchaseOrderLine::class, 'purchase_order_id', 'id');
    }
}
