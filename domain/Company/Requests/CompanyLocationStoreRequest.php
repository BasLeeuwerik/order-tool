<?php

namespace Domain\Company\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyLocationStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = [];
        $rules['name'] = ['required', 'string', 'max:255'];
        $rules['address_line_1'] = ['required', 'string', 'max:255'];
        $rules['address_line_2'] = ['nullable', 'string', 'max:255'];
        $rules['zip_code'] = ['required', 'string', 'max:255'];
        $rules['city'] = ['required', 'string', 'max:255'];
        $rules['region'] = ['nullable', 'string', 'max:255'];
        $rules['country'] = ['required', 'string', 'max:255'];

        return $rules;
    }
}
