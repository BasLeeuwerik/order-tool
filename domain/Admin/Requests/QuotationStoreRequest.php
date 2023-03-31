<?php

namespace Domain\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuotationStoreRequest extends FormRequest
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
        $rules['company_id'] = ['required', 'string', 'max:255'];
        $rules['user_id'] = ['nullable', 'string', 'max:255'];

        return $rules;
    }
}
