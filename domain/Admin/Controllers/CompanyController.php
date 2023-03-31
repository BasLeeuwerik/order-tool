<?php

namespace Domain\Admin\Controllers;

use App\Http\Controllers\Controller;
use Domain\Admin\Requests\CompanyStoreRequest;
use Domain\Admin\Requests\CompanyUpdateRequest;
use Domain\Company\Models\Company;
use Domain\Company\Services\CompanyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CompanyController extends Controller
{
    public function index(): Response
    {
        $companies = Company::query()
            ->orderByDesc('id')
            ->paginate(10);

        return Inertia::render('Admin/Company/Index', [
            'companies' => $companies,
        ]);
    }

    public function show(Request $request, Company $company): Response
    {
        $company->load('locations');

        return Inertia::render('Admin/Company/Show', [
            'company' => $company,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Company/Create');
    }

    public function edit(Company $company): Response
    {
        return Inertia::render('Admin/Company/Edit', [
            'company' => $company,
        ]);
    }

    public function store(CompanyStoreRequest $request): RedirectResponse
    {
        $validated = (object)$request->validated();

        $company = new Company();

        $company = CompanyService::update($company, $validated);

        $company->type = $validated->type;
        $company->discount_percentage = $validated->discount_percentage;
        $company->discount_amount = $validated->discount_amount;
        $company->save();

        return redirect()
            ->route('admin.company.index')
            ->with('message', 'Company saved!');
    }

    public function update(CompanyUpdateRequest $request, Company $company): RedirectResponse
    {
        $validated = (object)$request->validated();

        $company = CompanyService::update($company, $validated);

        $company->type = $validated->type;
        $company->discount_percentage = $validated->discount_percentage;
        $company->discount_amount = $validated->discount_amount;
        $company->save();

        return redirect()
            ->route('admin.company.show', $company)
            ->with('message', 'Company updated!');
    }
}
