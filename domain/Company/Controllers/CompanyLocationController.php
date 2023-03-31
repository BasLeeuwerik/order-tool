<?php

namespace Domain\Company\Controllers;

use App\Http\Controllers\Controller;
use Domain\Admin\Requests\CompanyLocationUpdateRequest;
use Domain\Company\Models\Company;
use Domain\Company\Models\CompanyLocation;
use Domain\Company\Requests\CompanyLocationStoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class CompanyLocationController extends Controller
{
    public function create(Company $company): Response
    {
        return Inertia::render('Client/Company/Location/Create', [
            'company' => $company,
        ]);
    }

    public function store(CompanyLocationStoreRequest $request): RedirectResponse
    {
        $company = Company::where('id', Auth::user()->company_id)->first();

        $validated = (object)$request->validated();

        $companyLocation = new CompanyLocation();
        $companyLocation->company_id = $company->id;
        $companyLocation->name = $validated->name;
        $companyLocation->address_line_1 = $validated->address_line_1;
        $companyLocation->address_line_2 = $validated->address_line_2;
        $companyLocation->zip_code = $validated->zip_code;
        $companyLocation->city = $validated->city;
        $companyLocation->region = $validated->region;
        $companyLocation->country = $validated->country;
        $companyLocation->save();

        return redirect()->route('client.company.show')
            ->with('message', 'The location is saved!');
    }

    public function edit(CompanyLocation $companyLocation): Response
    {
        return Inertia::render('Client/Company/Location/Edit', [
            'companyLocation' => $companyLocation,
        ]);
    }

    public function update(CompanyLocationUpdateRequest $request, CompanyLocation $companyLocation): RedirectResponse
    {
        $validated = (object)$request->validated();

        $companyLocation->name = $validated->name;
        $companyLocation->address_line_1 = $validated->address_line_1;
        $companyLocation->address_line_2 = $validated->address_line_2;
        $companyLocation->zip_code = $validated->zip_code;
        $companyLocation->city = $validated->city;
        $companyLocation->region = $validated->region;
        $companyLocation->country = $validated->country;
        $companyLocation->save();

        $company = Company::where('id', $companyLocation->company_id)->first();

        return redirect()
            ->route('client.company.show', $company)
            ->with('message', 'Location updated!');
    }
}
