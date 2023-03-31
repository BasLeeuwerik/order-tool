<?php

namespace Domain\Company\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CompanyUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return (bool)Auth::user()?->company_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [];
        $rules['name'] = ['required', 'string', 'max:255'];
        $rules['email'] = ['required', 'email', 'max:255'];
        $rules['phone_country_code'] = ['required', 'string', 'max:255'];
        $rules['phone_number'] = ['required', 'string', 'max:255'];
        $rules['website'] = ['required', 'string', 'max:255'];
        $rules['legal_owner'] = ['required', 'string', 'max:255'];
        $rules['vat_number'] = ['required', 'string', 'max:255'];
        $rules['coc_number'] = ['required', 'string', 'max:255'];
        $rules['iban_number'] = ['required', 'string', 'max:255'];
        $rules['bic_number'] = ['nullable', 'string', 'max:255'];

        return $rules;
    }
}
