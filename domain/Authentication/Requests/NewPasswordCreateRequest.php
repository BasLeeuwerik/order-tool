<?php

namespace Domain\Authentication\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class NewPasswordCreateRequest extends FormRequest
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
        $rules['token'] = ['required'];
        $rules['email'] = ['required', 'email'];
        $rules['password'] = ['required', 'confirmed', Password::defaults()];
        $rules['password_confirmation'] = ['required'];

        return $rules;
    }
}
