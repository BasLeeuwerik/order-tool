<?php

namespace Domain\PurchaseOrder\Controllers;

use App\Http\Controllers\Controller;
use Domain\Company\Requests\CompanyReadRequest;
use Domain\PurchaseOrder\Models\PurchaseOrder;
use Domain\PurchaseOrder\Requests\PurchaseOrderReadRequest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class PurchaseOrderController extends Controller
{
    public function index(CompanyReadRequest $request): Response
    {
        $companyId = Auth::user()->company_id;

        $purchaseOrders = PurchaseOrder::query()
            ->where('company_id', $companyId)
            ->orderByDesc('id')
            ->paginate(10);

        return Inertia::render('Client/PurchaseOrder/Index', [
            'purchaseOrders' => $purchaseOrders,
        ]);
    }

    public function show(PurchaseOrderReadRequest $request, PurchaseOrder $purchaseOrder): Response
    {
        $purchaseOrder->load('lines');

        return Inertia::render('Client/PurchaseOrder/Show', [
            'purchaseOrder' => $purchaseOrder,
        ]);
    }
}
