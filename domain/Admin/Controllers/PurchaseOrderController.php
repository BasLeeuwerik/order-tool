<?php

namespace Domain\Admin\Controllers;

use App\Http\Controllers\Controller;
use Domain\Admin\Requests\PurchaseOrderUpdateRequest;
use Domain\PurchaseOrder\Models\PurchaseOrder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PurchaseOrderController extends Controller
{
    public function index(): Response
    {
        $purchaseOrders = PurchaseOrder::query()
            ->orderByDesc('id')
            ->paginate(10);

        return Inertia::render('Admin/PurchaseOrder/Index', [
            'purchaseOrders' => $purchaseOrders,
        ]);
    }

    public function show(Request $request, PurchaseOrder $purchaseOrder): Response
    {
        $purchaseOrder->load('lines');

        return Inertia::render('Admin/PurchaseOrder/Show', [
            'purchaseOrder' => $purchaseOrder,
        ]);
    }

    public function edit(PurchaseOrder $purchaseOrder): Response
    {
        return Inertia::render('Admin/PurchaseOrder/Edit', [
            'purchaseOrder' => $purchaseOrder,
        ]);
    }

    public function update(PurchaseOrderUpdateRequest $request, PurchaseOrder $purchaseOrder): RedirectResponse
    {
        $validated = (object)$request->validated();

        $purchaseOrder->reference = $validated->reference;
        $purchaseOrder->status = $validated->status;
        $purchaseOrder->paid_at = $validated->paid_at;
        $purchaseOrder->shipped_at = $validated->shipped_at;
        $purchaseOrder->target_delivery_date_at = $validated->target_delivery_date_at;
        $purchaseOrder->shipping_email_sent_at = $validated->shipping_email_sent_at;
        $purchaseOrder->vat_percentage = $validated->vat_percentage;
        $purchaseOrder->discount_percentage = $validated->discount_percentage;
        $purchaseOrder->discount_amount = $validated->discount_amount;
        $purchaseOrder->shipping_address_line_1 = $validated->shipping_address_line_1;
        $purchaseOrder->shipping_address_line_2 = $validated->shipping_address_line_2;
        $purchaseOrder->shipping_zip_code = $validated->shipping_zip_code;
        $purchaseOrder->shipping_city = $validated->shipping_city;
        $purchaseOrder->shipping_region = $validated->shipping_region;
        $purchaseOrder->shipping_country = $validated->shipping_country;
        $purchaseOrder->billing_address_line_1 = $validated->billing_address_line_1;
        $purchaseOrder->billing_address_line_2 = $validated->billing_address_line_2;
        $purchaseOrder->billing_zip_code = $validated->billing_zip_code;
        $purchaseOrder->billing_city = $validated->billing_city;
        $purchaseOrder->billing_region = $validated->billing_region;
        $purchaseOrder->billing_country = $validated->billing_country;
        $purchaseOrder->save();

        return redirect()
            ->route('admin.purchase_order.show', $purchaseOrder)
            ->with('message', 'Order updated!');
    }
}
