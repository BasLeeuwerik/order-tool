<?php

namespace Domain\Authentication\Requests;

use Domain\User\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserCreateRequest extends FormRequest
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
        $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:' . User::class];
        $rules['first_name'] = ['required', 'string', 'max:255'];
        $rules['last_name'] = ['required', 'string', 'max:255'];
        $rules['locale'] = ['required', 'string', 'max:255'];
        $rules['password'] = ['required', 'confirmed', Password::defaults()];

        return $rules;
    }
}
