<?php

namespace Domain\Company\Controllers;

use App\Http\Controllers\Controller;
use Domain\Company\Requests\UserShowRequest;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function index(Request $request): Response
    {
        $user = Auth::user();

        $users = User::query()
            ->where('company_id', $user->company_id)
            ->paginate(10);

        return Inertia::render('Client/Company/User/Index', [
            'users' => $users,
        ]);
    }

    public function show(UserShowRequest $request, User $user): Response
    {
        return Inertia::render('Client/Company/User/Show', [
            'user' => $user,
        ]);
    }
}
