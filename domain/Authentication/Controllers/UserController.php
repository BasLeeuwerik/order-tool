<?php

namespace Domain\Authentication\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Domain\Authentication\Requests\UserCreateRequest;
use Domain\Company\Enums\CompanyType;
use Domain\Company\Models\Company;
use Domain\Company\Models\CompanyLocation;
use Domain\User\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param UserCreateRequest $request
     * @return RedirectResponse
     *
     */
    public function store(UserCreateRequest $request): RedirectResponse
    {
        $validated = (object)$request->validated();

        $user = DB::transaction(function () use ($validated, $request) {
            $user = new User();
            $user->email = $validated->email;
            $user->first_name = $validated->first_name;
            $user->last_name = $validated->last_name;
            $user->locale = $validated->locale;
            $user->password = Hash::make($validated->password);
            $user->save();

            $company = new Company();
            $company->type = CompanyType::CLIENT;
            $company->name = $request->company_name;
            $company->email = $validated->email;
            $company->phone_number = $request->phone_number;
            $company->website = $request->website;
            $company->vat_number = $request->vat_number;
            $company->coc_number = $request->coc_number;
            $company->save();

            $companyLocation = new CompanyLocation();
            $companyLocation->name = $request->company_name;
            $companyLocation->company_id = $company->id;
            $companyLocation->address_line_1 = $request->address_line_1;
            $companyLocation->zip_code = $request->zip_code;
            $companyLocation->city = $request->city;
            $companyLocation->region = $request->region;
            $companyLocation->country = $request->country;
            $companyLocation->save();

            $user->attachCompany($company);

            return $user;
        });

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
