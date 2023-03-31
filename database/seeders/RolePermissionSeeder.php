<?php

namespace Database\Seeders;

use Domain\User\Enums\PermissionType;
use Domain\User\Enums\RoleType;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => RoleType::ADMIN]);
        $adminPermissions = [
            Permission::create(['name' => PermissionType::ADMIN_DASHBOARD]),

            Permission::create(['name' => PermissionType::ADMIN_COMPANY_LIST]),
            Permission::create(['name' => PermissionType::ADMIN_COMPANY_READ]),

            Permission::create(['name' => PermissionType::ADMIN_PURCHASE_ORDER_LIST]),
            Permission::create(['name' => PermissionType::ADMIN_PURCHASE_ORDER_READ]),

            Permission::create(['name' => PermissionType::ADMIN_QUOTATION_LIST]),
            Permission::create(['name' => PermissionType::ADMIN_QUOTATION_READ]),

            Permission::create(['name' => PermissionType::ADMIN_INVOICE_LIST]),
            Permission::create(['name' => PermissionType::ADMIN_INVOICE_READ]),

            Permission::create(['name' => PermissionType::ADMIN_DISCOUNT_CODE_LIST]),
            Permission::create(['name' => PermissionType::ADMIN_DISCOUNT_CODE_READ]),

            Permission::create(['name' => PermissionType::ADMIN_PRODUCT_LIST]),
            Permission::create(['name' => PermissionType::ADMIN_PRODUCT_READ]),
            Permission::create(['name' => PermissionType::ADMIN_PRODUCT_UPDATE]),
        ];

        $adminRole->syncPermissions($adminPermissions);

        $superAdminRole = Role::create(['name' => RoleType::SUPER_ADMIN]);
        $superAdminPermissions = [
            Permission::create(['name' => PermissionType::ADMIN_USER_LIST]),
            Permission::create(['name' => PermissionType::ADMIN_USER_READ]),
        ];

        $superAdminRole->syncPermissions($superAdminPermissions);

        $clientRole = Role::create(['name' => RoleType::CLIENT]);
        $clientPermissions = [
            Permission::create(['name' => PermissionType::CLIENT_COMPANY_READ]),
            Permission::create(['name' => PermissionType::CLIENT_COMPANY_UPDATE]),

            Permission::create(['name' => PermissionType::CLIENT_PURCHASE_ORDER_LIST]),
            Permission::create(['name' => PermissionType::CLIENT_PURCHASE_ORDER_READ]),

            Permission::create(['name' => PermissionType::CLIENT_QUOTATION_CREATE]),
            Permission::create(['name' => PermissionType::CLIENT_QUOTATION_LIST]),
            Permission::create(['name' => PermissionType::CLIENT_QUOTATION_READ]),
            Permission::create(['name' => PermissionType::CLIENT_USER_LIST]),
            Permission::create(['name' => PermissionType::CLIENT_USER_READ]),
            Permission::create(['name' => PermissionType::CLIENT_INVOICE_LIST]),
        ];

        $clientRole->syncPermissions($clientPermissions);
    }
}
