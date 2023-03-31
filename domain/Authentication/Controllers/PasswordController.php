<?php

namespace Domain\Authentication\Controllers;

use App\Http\Controllers\Controller;
use Domain\Authentication\Requests\PasswordUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     *
     * @param PasswordUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(PasswordUpdateRequest $request): RedirectResponse
    {
        $input = (object)$request->validated();

        $user = Auth::user();
        $user->password = Hash::make($input->password);
        $user->save();

        return back();
    }
}
