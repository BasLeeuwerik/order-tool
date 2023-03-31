<?php

namespace Domain\Company\Services;

use Domain\Company\Models\Company;

class CompanyService
{
    public static function update(Company $company, object $data): Company
    {
        $company->name = $data->name;
        $company->email = $data->email;
        $company->phone_country_code = $data->phone_country_code;
        $company->phone_number = $data->phone_number;
        $company->website = $data->website;
        $company->legal_owner = $data->legal_owner;
        $company->vat_number = $data->vat_number;
        $company->coc_number = $data->coc_number;
        $company->iban_number = $data->iban_number;

        return $company;
    }
}
