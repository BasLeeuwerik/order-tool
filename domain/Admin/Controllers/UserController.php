<?php

namespace Domain\Admin\Controllers;

use App\Http\Controllers\Controller;
use Domain\Admin\Requests\SuperAdminRequest;
use Domain\User\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function index(SuperAdminRequest $request): Response
    {
        $users = User::query()
            ->orderByDesc('id')
            ->paginate(10);

        return Inertia::render('Admin/User/Index', [
            'users' => $users,
        ]);
    }

    public function show(SuperAdminRequest $request, User $user): Response
    {
        return Inertia::render('Admin/User/Show', [
            'user' => $user,
        ]);
    }
}
