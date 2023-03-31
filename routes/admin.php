<?php

use Domain\Admin\Controllers\CompanyController;
use Domain\Admin\Controllers\CompanyLocationController;
use Domain\Admin\Controllers\DashboardController;
use Domain\Admin\Controllers\DiscountCodeController;
use Domain\Admin\Controllers\InvoiceController;
use Domain\Admin\Controllers\PurchaseOrderController;
use Domain\Admin\Controllers\QuotationController;
use Domain\Admin\Controllers\UserController;
use Domain\Product\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'admin'])->prefix('/admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, '__invoke'])->name('admin.home');

    Route::get('/users', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.user.show');

    Route::get('/companies/create', [CompanyController::class, 'create'])->name('admin.company.create');
    Route::get('/companies', [CompanyController::class, 'index'])->name('admin.company.index');
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('admin.company.show');
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('admin.company.edit');
    Route::patch('/companies/{company}', [CompanyController::class, 'update'])->name('admin.company.update');
    Route::post('/companies', [CompanyController::class, 'store'])->name('admin.company.store');

    Route::get('/purchase-orders', [PurchaseOrderController::class, 'index'])->name('admin.purchase_order.index');
    Route::get('/purchase-orders/{purchaseOrder}/edit', [PurchaseOrderController::class, 'edit'])->name('admin.purchase_order.edit');
    Route::get('/purchase-orders/{purchaseOrder}', [PurchaseOrderController::class, 'show'])->name('admin.purchase_order.show');
    Route::patch('/purchase-orders/{purchaseOrder}', [PurchaseOrderController::class, 'update'])->name('admin.purchase_order.update');

    Route::get('/locations/{company}/create', [CompanyLocationController::class, 'create'])->name('admin.location.create');
    Route::post('/locations/{company}', [CompanyLocationController::class, 'store'])->name('admin.location.store');
    Route::get('/locations/{companyLocation}/edit', [CompanyLocationController::class, 'edit'])->name('admin.location.edit');
    Route::patch('/locations/{companyLocation}', [CompanyLocationController::class, 'update'])->name('admin.location.update');

    Route::get('/quotations/create', [QuotationController::class, 'create'])->name('admin.quotation.create');
    Route::get('/quotations', [QuotationController::class, 'index'])->name('admin.quotation.index');
    Route::get('/quotations/{quotation}', [QuotationController::class, 'show'])->name('admin.quotation.show');
    Route::post('/quotations', [QuotationController::class, 'store'])->name('admin.quotation.store');
    Route::get('/quotations/{quotation}/edit', [QuotationController::class, 'edit'])->name('admin.quotation.edit');
    Route::patch('/quotations/{quotation}', [QuotationController::class, 'update'])->name('admin.quotation.update');

    Route::get('/invoices', [InvoiceController::class, 'index'])->name('admin.invoice.index');
    Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('admin.invoice.create');
    Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('admin.invoice.show');
    Route::get('/invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('admin.invoice.edit');
    Route::patch('/invoices/{invoice}', [InvoiceController::class, 'update'])->name('admin.invoice.update');
    Route::post('/invoices', [InvoiceController::class, 'store'])->name('admin.invoice.store');

    Route::get('/discount-codes/create', [DiscountCodeController::class, 'create'])->name('admin.discount_code.create');
    Route::get('/discount-codes', [DiscountCodeController::class, 'index'])->name('admin.discount_code.index');
    Route::get('/discount-codes/{discountCode}', [DiscountCodeController::class, 'show'])->name('admin.discount_code.show');
    Route::get('/discount-codes/{discountCode}/edit', [DiscountCodeController::class, 'edit'])->name('admin.discount_code.edit');
    Route::patch('/discount-codes/{discountCode}', [DiscountCodeController::class, 'update'])->name('admin.discount_code.update');
    Route::post('/discount-codes', [DiscountCodeController::class, 'store'])->name('admin.discount_code.store');

    Route::get('/products', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('admin.product.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::patch('/products/{product}', [ProductController::class, 'update'])->name('admin.product.update');
});
