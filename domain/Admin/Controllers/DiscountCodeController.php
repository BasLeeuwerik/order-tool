<?php

namespace Domain\Admin\Controllers;

use App\Http\Controllers\Controller;
use Domain\Admin\Requests\DiscountCodeStoreRequest;
use Domain\Admin\Requests\DiscountCodeUpdateRequest;
use Domain\PurchaseOrder\Models\DiscountCode;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DiscountCodeController extends Controller
{
    public function index(): Response
    {
        $discountCodes = DiscountCode::query()
            ->orderByDesc('id')
            ->paginate(10);

        return Inertia::render('Admin/DiscountCode/Index', [
            'discountCodes' => $discountCodes,
        ]);
    }

    public function show(Request $request, DiscountCode $discountCode): Response
    {
        return Inertia::render('Admin/DiscountCode/Show', [
            'discountCode' => $discountCode,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/DiscountCode/Create');
    }

    public function edit(DiscountCode $discountCode): Response
    {
        return Inertia::render('Admin/DiscountCode/Edit', [
            'discountCode' => $discountCode,
        ]);
    }

    public function update(DiscountCodeUpdateRequest $request, DiscountCode $discountCode): RedirectResponse
    {
        $validated = (object)$request->validated();

        $discountCode->discount_code = $validated->discount_code;
        $discountCode->discount_amount = $validated->discount_amount;
        $discountCode->discount_percentage = $validated->discount_percentage;
        $discountCode->max_usage = $validated->max_usage;
        $discountCode->end_date = $validated->end_date;
        $discountCode->status = $validated->status;
        $discountCode->save();

        return redirect()
            ->route('admin.discount_code.show', $discountCode)
            ->with('message', 'Discount code updated!');
    }

    public function store(DiscountCodeStoreRequest $request): RedirectResponse
    {
        $validated = (object)$request->validated();

        $discountCode = new DiscountCode();
        $discountCode->discount_code = $validated->discount_code;
        $discountCode->discount_amount = $validated->discount_amount;
        $discountCode->discount_percentage = $validated->discount_percentage;
        $discountCode->max_usage = $validated->max_usage;
        $discountCode->end_date = $validated->end_date;
        $discountCode->status = $validated->status;
        $discountCode->save();

        return redirect()
            ->route('admin.discount_code.index')
            ->with('message', 'Discount code saved!');
    }
}
