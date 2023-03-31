<?php

namespace Domain\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(): Application|RedirectResponse|Redirector|Response
    {
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.home');
        }

        return Inertia::render('Dashboard');
    }
}
