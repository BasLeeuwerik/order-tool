<?php

namespace Domain\Product\Controllers;

use App\Http\Controllers\Controller;
use Domain\Product\Models\Product;
use Domain\Product\Requests\ProductUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index(Request $request): Response
    {
        $products = Product::query()
            ->paginate(10);

        return Inertia::render('Admin/Product/Index', [
            'products' => $products,
        ]);
    }

    public function show(Request $request, Product $product): Response
    {
        return Inertia::render('Admin/Product/Show', [
            'product' => $product,
        ]);
    }

    public function edit(Product $product): Response
    {
        return Inertia::render('Admin/Product/Edit', [
            'product' => $product,
        ]);
    }

    public function update(ProductUpdateRequest $request, Product $product): RedirectResponse
    {
        $validated = (object)$request->validated();
        $product->base_price = $validated->base_price;
        $product->multiplier = $validated->multiplier;
        $product->save();

        return redirect()
            ->route('admin.product.index', $product)
            ->with('message', 'Product updated!');
    }
}
