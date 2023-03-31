<?php

namespace Domain\Invoice\Models;

use Database\Factories\InvoiceLineFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceLine extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected static function newFactory(): InvoiceLineFactory
    {
        return InvoiceLineFactory::new();
    }
}
