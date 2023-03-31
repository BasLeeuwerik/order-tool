<?php

namespace Domain\Admin\Requests;

use Domain\Company\Enums\CompanyType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CompanyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [];
        $rules['type'] = ['required', new Enum(CompanyType::class)];
        $rules['name'] = ['required', 'string', 'max:255'];
        $rules['email'] = ['required', 'email', 'max:255'];
        $rules['phone_country_code'] = ['nullable', 'string', 'max:255'];
        $rules['phone_number'] = ['nullable', 'string', 'max:255'];
        $rules['website'] = ['nullable', 'string', 'max:255'];
        $rules['legal_owner'] = ['nullable', 'string', 'max:255'];
        $rules['vat_number'] = ['nullable', 'string', 'max:255'];
        $rules['coc_number'] = ['nullable', 'string', 'max:255'];
        $rules['iban_number'] = ['nullable', 'string', 'max:255'];
        $rules['bic_number'] = ['nullable', 'string', 'max:255'];
        $rules['discount_percentage'] = ['nullable', 'numeric', 'max:100'];
        $rules['discount_amount'] = ['nullable', 'numeric'];

        return $rules;
    }
}
