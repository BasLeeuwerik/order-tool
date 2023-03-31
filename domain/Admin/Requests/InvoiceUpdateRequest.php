<?php

namespace Domain\Admin\Requests;

use Domain\Invoice\Enums\InvoiceStatusType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class InvoiceUpdateRequest extends FormRequest
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
        $rules['status'] = ['required', new Enum(InvoiceStatusType::class)];
        $rules['number'] = ['required', 'int'];
        $rules['vat_percentage'] = ['required', 'numeric', 'max:100'];
        $rules['sender_vat_number'] = ['required', 'string', 'max:255'];
        $rules['sender_coc_number'] = ['required', 'string', 'max:255'];
        $rules['sender_name'] = ['required', 'string', 'max:255'];
        $rules['sender_address'] = ['required', 'string', 'max:255'];
        $rules['sender_zip_code'] = ['required', 'string', 'max:255'];
        $rules['sender_city'] = ['required', 'string', 'max:255'];
        $rules['sender_country'] = ['required', 'string', 'max:255'];
        $rules['receiver_vat_number'] = ['required', 'string', 'max:255'];
        $rules['receiver_coc_number'] = ['required', 'string', 'max:255'];
        $rules['receiver_name'] = ['required', 'string', 'max:255'];
        $rules['receiver_address'] = ['required', 'string', 'max:255'];
        $rules['receiver_zip_code'] = ['required', 'string', 'max:255'];
        $rules['receiver_city'] = ['required', 'string', 'max:255'];
        $rules['receiver_country'] = ['required', 'string', 'max:255'];

        return $rules;
    }
}
