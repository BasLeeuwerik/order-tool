<?php

namespace Domain\Admin\Requests;

use Domain\Quotation\Enums\QuotationStatusType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class QuotationUpdateRequest extends FormRequest
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
        $rules['status'] = ['required', new Enum(QuotationStatusType::class), 'max:255'];
        $rules['accepted_at'] = ['required', 'date'];

        return $rules;
    }
}
