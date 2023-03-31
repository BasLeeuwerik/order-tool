<?php

namespace App\Http\Middleware;

use Closure;
use Domain\User\Enums\PermissionType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AllowAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return JsonResponse|Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): JsonResponse|Response|RedirectResponse
    {
        if (!Auth::user()->hasLoadedPermission(PermissionType::ADMIN_DASHBOARD)) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
