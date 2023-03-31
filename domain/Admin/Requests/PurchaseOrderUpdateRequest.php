<?php

namespace Domain\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseOrderUpdateRequest extends FormRequest
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
        $rules['reference'] = ['required', 'string', 'max:255'];
        $rules['status'] = ['required', 'string', 'max:255'];
        $rules['paid_at'] = ['nullable', 'date', 'max:255'];
        $rules['shipped_at'] = ['nullable', 'date', 'max:255'];
        $rules['target_delivery_date_at'] = ['required', 'date'];
        $rules['shipping_email_sent_at'] = ['nullable', 'date'];
        $rules['vat_percentage'] = ['required', 'numeric', 'max:100'];
        $rules['discount_percentage'] = ['nullable', 'numeric', 'max:100'];
        $rules['discount_amount'] = ['nullable', 'numeric'];
        $rules['shipping_address_line_1'] = ['nullable', 'string', 'max:255'];
        $rules['shipping_address_line_2'] = ['nullable', 'string', 'max:255'];
        $rules['shipping_zip_code'] = ['nullable', 'string', 'max:255'];
        $rules['shipping_city'] = ['nullable', 'string', 'max:255'];
        $rules['shipping_region'] = ['nullable', 'string', 'max:255'];
        $rules['shipping_country'] = ['nullable', 'string', 'max:255'];
        $rules['billing_address_line_1'] = ['nullable', 'string', 'max:255'];
        $rules['billing_address_line_2'] = ['nullable', 'string', 'max:255'];
        $rules['billing_zip_code'] = ['nullable', 'string', 'max:255'];
        $rules['billing_city'] = ['nullable', 'string', 'max:255'];
        $rules['billing_region'] = ['nullable', 'string', 'max:255'];
        $rules['billing_country'] = ['nullable', 'string', 'max:255'];

        return $rules;
    }
}
