<?php

namespace Domain\Company\Models;

use Database\Factories\CompanyFactory;
use Domain\Company\Enums\CompanyType;
use Domain\PurchaseOrder\Models\PurchaseOrder;
use Domain\Quotation\Models\Quotation;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $casts = [
        'type' => CompanyType::class,
    ];

    protected static function newFactory(): CompanyFactory
    {
        return CompanyFactory::new();
    }

    public function locations(): HasMany
    {
        return $this->hasMany(CompanyLocation::class, 'company_id', 'id');
    }

    public function purchaseOrders(): HasMany
    {
        return $this->hasMany(PurchaseOrder::class, 'company_id', 'id');
    }

    public function quotations(): HasMany
    {
        return $this->hasMany(Quotation::class, 'company_id', 'id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'company_id', 'id');
    }
}
