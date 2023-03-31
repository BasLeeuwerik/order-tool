<?php

namespace Domain\User\Requests;

use Domain\User\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = [];
        $rules['email'] = ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)];
        $rules['first_name'] = ['string', 'max:255'];
        $rules['last_name'] = ['string', 'max:255'];

        return $rules;
    }
}
