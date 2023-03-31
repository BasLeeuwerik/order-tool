<?php

namespace Domain\Company\Controllers;

use App\Http\Controllers\Controller;
use Domain\Company\Models\Company;
use Domain\Company\Requests\CompanyReadRequest;
use Domain\Company\Requests\CompanyUpdateRequest;
use Domain\Company\Services\CompanyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class CompanyController extends Controller
{
    /**
     * Display the user's company.
     *
     * @param CompanyReadRequest $request
     * @param Company $company
     * @return Response
     */
    public function show(CompanyReadRequest $request, Company $company): Response
    {
        $companyId = Auth::user()->company_id;

        $company = Company::query()
            ->where('id', $companyId)
            ->first();

        $company->load('locations');

        return Inertia::render('Client/Company/Show', [
            'company' => $company,
        ]);
    }

    /**
     * Display the user's company edit form.
     *
     * @param CompanyReadRequest $request
     * @return Response
     */
    public function edit(CompanyReadRequest $request): Response
    {
        $companyId = Auth::user()->company_id;

        $company = Company::query()
            ->where('id', $companyId)
            ->first();

        return Inertia::render('Client/Company/Edit', [
            'company' => $company,
        ]);
    }

    /**
     * Update the user's company information.
     *
     * @param CompanyUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(CompanyUpdateRequest $request): RedirectResponse
    {
        $validated = (object)$request->validated();

        $company = Company::query()
            ->where('id', Auth::user()->company_id)
            ->first();

        $company = CompanyService::update($company, $validated);

        $company->save();

        return redirect()
            ->route('client.company.show')
            ->with('message', 'Company updated!');
    }
}
