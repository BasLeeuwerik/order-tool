<?php

namespace Database\Seeders;

use Database\Factories\CompanyFactory;
use Database\Factories\CompanyLocationFactory;
use Database\Factories\UserFactory;
use Domain\Company\Enums\CompanyType;
use Domain\User\Enums\RoleType;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $adminUser = UserFactory::new()->create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'locale' => 'nl_NL',
            'email' => 'admin@transfercompany.com',
        ]);

        $adminUser->assignRole([
            RoleType::ADMIN->value,
        ]);

        $superAdminUser = UserFactory::new()->create([
            'first_name' => 'Super Admin',
            'last_name' => 'User',
            'locale' => 'nl_NL',
            'email' => 'super_admin@transfercompany.com',
        ]);

        $superAdminUser->assignRole([
            RoleType::SUPER_ADMIN->value,
            RoleType::ADMIN->value,
        ]);

        $clientUser = UserFactory::new()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'locale' => 'nl_NL',
            'email' => 'user@transfercompany.com',
        ]);

        $transferCompany = CompanyFactory::new()
            ->has(CompanyLocationFactory::new()
                ->count(1), 'locations')
            ->create([
                'name' => 'Transfercompany',
                'type' => CompanyType::TRANSFERCOMPANY
            ]);

        $clientCompany = CompanyFactory::new()
            ->has(
                CompanyLocationFactory::new()
                    ->count(2), 'locations')
            ->create([
                'name' => 'Client Company',
                'type' => CompanyType::CLIENT
            ]);

        $clientUser->attachCompany($clientCompany);
    }
}
