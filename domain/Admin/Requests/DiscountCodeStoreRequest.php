<?php

namespace Domain\Admin\Requests;

use Domain\PurchaseOrder\Enums\DiscountCodeStatusType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class DiscountCodeStoreRequest extends FormRequest
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
        $rules['discount_code'] = ['required', 'string', 'max:255'];
        $rules['discount_amount'] = ['nullable', 'numeric'];
        $rules['discount_percentage'] = ['nullable', 'numeric', 'max:100'];
        $rules['end_date'] = ['nullable', 'date'];
        $rules['max_usage'] = ['nullable', 'int'];
        $rules['status'] = ['nullable', new Enum(DiscountCodeStatusType::class)];

        return $rules;
    }
}
