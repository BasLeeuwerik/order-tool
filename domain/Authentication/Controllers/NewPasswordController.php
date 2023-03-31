<?php

namespace Domain\Authentication\Controllers;

use App\Http\Controllers\Controller;
use Domain\Authentication\Requests\NewPasswordCreateRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        return Inertia::render('Auth/ResetPassword', [
            'email' => $request->email,
            'token' => $request->route('token'),
        ]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @param NewPasswordCreateRequest $request
     * @return RedirectResponse
     *
     * @throws ValidationException
     */
    public function store(NewPasswordCreateRequest $request): RedirectResponse
    {
        $input = (object)$request->validated();

        $status = Password::reset(
            [
                'token' => $input->token,
                'email' => $input->email,
                'password' => $input->password,
                'password_confirmation' => $input->password_confirmation,
            ],
            function ($user) use ($input) {
                $user->password = Hash::make($input->password);
                $user->remember_token = Str::random(60);
                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __($status));
        }

        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
    }
}
