<?php

namespace Domain\Quotation\Controllers;

use App\Http\Controllers\Controller;
use Domain\Company\Requests\CompanyReadRequest;
use Domain\Product\Enums\SecondFirstOptions;
use Domain\Product\Enums\FirstOption;
use Domain\Product\Enums\SecondSecondOptions;
use Domain\Product\Enums\ThirdOption;
use Domain\Product\Models\Product;
use Domain\Quotation\Enums\QuotationStatusType;
use Domain\Quotation\Models\Quotation;
use Domain\Quotation\Models\QuotationLine;
use Domain\Quotation\Models\QuotationLineProduct;
use Domain\Quotation\Requests\QuotationReadRequest;
use Domain\Quotation\Requests\QuotationStoreRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class QuotationController extends Controller
{
    public function index(CompanyReadRequest $request): Response
    {
        $companyId = Auth::user()->company_id;

        $quotations = Quotation::query()
            ->where('company_id', $companyId)
            ->orderByDesc('created_at')
            ->paginate(10);

        return Inertia::render('Client/Quotation/Index', [
            'quotations' => $quotations,
        ]);
    }

    public function show(QuotationReadRequest $request, Quotation $quotation): Response
    {
        $quotation->load('lines');

        return Inertia::render('Client/Quotation/Show', [
            'quotation' => $quotation,
        ]);
    }

    public function create(Request $request): Response
    {
        $firstOptions = FirstOption::convertToDropdownList();
        $secondFirstOptions = SecondFirstOptions::convertToDropdownList();
        $secondSecondOptions = SecondSecondOptions::convertToDropdownList();
        $thirdOptions = ThirdOption::convertToDropdownList();

        if ($request->has('has_extra') && $request->has('quantity') && $request->has('has_speed')) {
            $secondOption = $request->input('second_option');
            $quantity = (int)$request->input('quantity');

            $product = Product::query()
                ->where('slug', $secondOption)
                ->first();

            $totalPrice = ($product->base_price * $quantity) * $product->multiplier;
            $unitPrice = $totalPrice / $quantity;
        }

        return Inertia::render('Quotation/Create', [
            'firstOptions' => $firstOptions,
            'secondFirstOptions' => $secondFirstOptions,
            'secondSecondOptions' => $secondSecondOptions,
            'thirdOptions' => $thirdOptions,
            'totalPrice' => isset($totalPrice) ? round($totalPrice, 2) : null,
            'unitPrice' => isset($unitPrice) ? round($unitPrice, 2) : null,
        ]);
    }

    public function store(QuotationStoreRequest $request): RedirectResponse
    {
        $validated = (object)$request->validated();

        $quotation = DB::transaction(function () use ($validated) {
            $quotation = new Quotation();
            $quotation->company_id = Auth::user()->company_id;
            $quotation->user_id = Auth::user()->id;
            $quotation->status = QuotationStatusType::OPEN;
            $quotation->save();

            $product = new QuotationLineProduct();
            $product->first_option = $validated->first_option;
            $product->second_option = $validated->second_option;
            $product->third_option = $validated->third_option;
            $product->has_extra = $validated->has_extra;
            $product->has_speed = $validated->has_speed;
            $product->save();

            $quotationLine = new QuotationLine();
            $quotationLine->quotation_id = $quotation->id;
            $quotationLine->first_option = $validated->first_option;
            $quotationLine->second_option = $validated->second_option;
            $quotationLine->third_option = $validated->third_option;
            $quotationLine->has_extra = $validated->has_extra;
            $quotationLine->has_speed = $validated->has_speed;
            $quotationLine->description = 'Custom product';
            $quotationLine->quantity = $validated->quantity;
            $quotationLine->quotation_product_id = $product->id;
            $quotationLine->save();

            return $quotation;
        });

        return redirect()
            ->route('client.quotation.show', $quotation)
            ->with('message', 'The quotation was saved!');
    }
}
