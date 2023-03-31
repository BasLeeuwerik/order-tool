<?php

namespace Domain\Quotation\Models;

use Database\Factories\QuotationFactory;
use Domain\Company\Models\Company;
use Domain\Quotation\Enums\QuotationStatusType;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quotation extends Model
{
    use HasFactory;
    use HasUuids;

    protected $casts = [
        'status' => QuotationStatusType::class,
    ];

    protected static function newFactory(): QuotationFactory
    {
        return QuotationFactory::new();
    }

    public function lines(): HasMany
    {
        return $this->hasMany(QuotationLine::class, 'quotation_id', 'id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
