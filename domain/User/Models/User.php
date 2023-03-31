<?php

namespace Domain\User\Models;

use Database\Factories\UserFactory;
use Domain\Company\Models\Company;
use Domain\Quotation\Models\Quotation;
use Domain\User\Enums\PermissionType;
use Domain\User\Enums\RoleType;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use HasUuids;
    use HasRoles;

    protected $with = [
        'roles',
        'roles.permissions',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'full_name'
    ];

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    public function hasLoadedPermission(PermissionType $permissionType): bool
    {
        foreach ($this->getLoadedPermissions() as $permission) {
            if ($permission == $permissionType->value) {
                return true;
            }
        }

        return false;
    }

    public function getLoadedPermissions(): Collection
    {
        $col = [];
        foreach ($this->roles as $role) {
            foreach ($role->permissions as $permission) {
                $col[] = $permission->name;
            }
        }

        return collect($col);
    }

    public function quotations(): HasMany
    {
        return $this->hasMany(Quotation::class, 'company_id', 'id');
    }

    public function attachCompany(Company $company): void
    {
        if ($this->company_id) {
            return;
        }

        $this->company_id = $company->id;
        $this->save();

        $this->assignRole([
            RoleType::CLIENT->value,
        ]);
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->first_name . ' ' . $this->last_name,
        );
    }
}
