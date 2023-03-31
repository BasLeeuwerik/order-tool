<?php

namespace Domain\Invoice\Models;

use Database\Factories\InvoiceFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected static function newFactory(): InvoiceFactory
    {
        return InvoiceFactory::new();
    }

    public function lines(): HasMany
    {
        return $this->hasMany(InvoiceLine::class, 'invoice_id', 'id');
    }
}
