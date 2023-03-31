<?php

namespace Domain\Admin\Controllers;

use App\Http\Controllers\Controller;
use Domain\Admin\Requests\InvoiceStoreRequest;
use Domain\Admin\Requests\InvoiceUpdateRequest;
use Domain\Company\Enums\CompanyType;
use Domain\Company\Models\Company;
use Domain\Invoice\Models\Invoice;
use Domain\Invoice\Services\InvoiceService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class InvoiceController extends Controller
{
    public function index(Request $request): Response
    {
        $invoices = Invoice::query()
            ->orderByDesc('id')
            ->paginate(10);

        return Inertia::render('Admin/Invoice/Index', [
            'invoices' => $invoices,
        ]);
    }

    public function show(Request $request, Invoice $invoice): Response
    {
        $invoice->load('lines');

        return Inertia::render('Admin/Invoice/Show', [
            'invoice' => $invoice,
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

        return Inertia::render('Admin/Invoice/Create', [
            'companies' => $parsedCompanies,
        ]);
    }

    public function edit(Invoice $invoice): Response
    {
        return Inertia::render('Admin/Invoice/Edit', [
            'invoice' => $invoice,
        ]);
    }

    public function store(InvoiceStoreRequest $request): RedirectResponse
    {
        $validated = (object)$request->validated();

        $invoice = new Invoice();

        $invoice->receiver_id = $validated->receiver_id;

        $invoice = InvoiceService::update($invoice, $validated);

        $invoice->save();

        return redirect()
            ->route('admin.invoice.index')
            ->with('message', 'Invoice saved!');
    }

    public function update(InvoiceUpdateRequest $request, Invoice $invoice): RedirectResponse
    {
        $validated = (object)$request->validated();

        $invoice = InvoiceService::update($invoice, $validated);

        $invoice->save();

        return redirect()
            ->route('admin.invoice.show', $invoice)
            ->with('message', 'Invoice updated!');
    }
}
