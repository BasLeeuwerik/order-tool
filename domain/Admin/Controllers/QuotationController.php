<?php

namespace Domain\Admin\Controllers;

use App\Http\Controllers\Controller;
use Domain\Admin\Requests\QuotationStoreRequest;
use Domain\Admin\Requests\QuotationUpdateRequest;
use Domain\Company\Enums\CompanyType;
use Domain\Company\Models\Company;
use Domain\Quotation\Enums\QuotationStatusType;
use Domain\Quotation\Models\Quotation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class QuotationController extends Controller
{
    public function index(): Response
    {
        $quotations = Quotation::query()
            ->orderByDesc('id')
            ->with('company')
            ->paginate(10);

        return Inertia::render('Admin/Quotation/Index', [
            'quotations' => $quotations,
        ]);
    }

    public function show(Request $request, Quotation $quotation): Response
    {
        $quotation->load([
            'company',
            'lines',
        ]);

        return Inertia::render('Admin/Quotation/Show', [
            'quotation' => $quotation,
        ]);
    }

    public function create(): Response
    {
        $companies = Company::query()
            ->where('type', CompanyType::CLIENT)
            ->select('id', 'name')
            ->get();

        $parsedCompanies = $companies->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        });

        return Inertia::render('Admin/Quotation/Create', [
            'companies' => $parsedCompanies,
        ]);
    }

    public function store(QuotationStoreRequest $request): RedirectResponse
    {
        $validated = (object)$request->validated();

        $quotation = new Quotation();
        $quotation->company_id = $validated->company_id;
        $quotation->user_id = Auth::user()->id;
        $quotation->status = QuotationStatusType::OPEN;
        $quotation->save();

        return redirect()
            ->route('admin.quotation.index')
            ->with('message', 'The quotation is saved!');
    }

    public function edit(Quotation $quotation): Response
    {
        return Inertia::render('Admin/Quotation/Edit', [
            'quotation' => $quotation,
        ]);
    }

    public function update(QuotationUpdateRequest $request, Quotation $quotation): RedirectResponse
    {
        $validated = (object)$request->validated();

        $quotation->status = $validated->status;
        $quotation->accepted_at = $validated->accepted_at;
        $quotation->save();

        return redirect()
            ->route('admin.quotation.show', $quotation)
            ->with('message', 'Quotation updated!');
    }
}
