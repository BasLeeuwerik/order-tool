<?php

namespace Domain\Quotation\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class QuotationStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return (bool)Auth::user()->company_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [];
        $rules['first_option'] = ['required', 'string', 'max:255'];
        $rules['second_option'] = ['required', 'string', 'max:255'];
        $rules['third_option'] = ['required', 'string', 'max:255'];
        $rules['quantity'] = ['required', 'int'];
        $rules['has_extra'] = ['required', 'bool'];
        $rules['has_speed'] = ['required', 'bool'];

        return $rules;
    }
}
