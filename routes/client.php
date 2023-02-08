<?php

use Domain\Company\Controllers\CompanyController;
use Domain\Company\Controllers\CompanyLocationController;
use Domain\Company\Controllers\UserController;
use Domain\Invoice\Controllers\InvoiceController;
use Domain\PurchaseOrder\Controllers\PurchaseOrderController;
use Domain\Quotation\Controllers\QuotationController;
use Domain\User\Controllers\DashboardController;
use Domain\User\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/quotation', [QuotationController::class, 'create'])->name('quotation.create');

Route::middleware('auth')->group(function () {
    Route::post('/quotation', [QuotationController::class, 'store'])->name('quotation.store');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('verified')->group(function () {
        Route::get('/dashboard', [DashboardController::class, '__invoke'])->name('dashboard');
    });

    Route::get('/purchase-orders', [PurchaseOrderController::class, 'index'])->name('client.purchase_order.index');
    Route::get('/purchase-orders/{purchaseOrder}', [PurchaseOrderController::class, 'show'])->name('client.purchase_order.show');

    Route::get('/company', [CompanyController::class, 'show'])->name('client.company.show');
    Route::get('/company/edit', [CompanyController::class, 'edit'])->name('client.company.edit');
    Route::patch('/company', [CompanyController::class, 'update'])->name('client.company.update');

    Route::get('/quotations', [QuotationController::class, 'index'])->name('client.quotation.index');
    Route::get('/quotations/{quotation}', [QuotationController::class, 'show'])->name('client.quotation.show');

    Route::get('/locations/create', [CompanyLocationController::class, 'create'])->name('client.location.create');
    Route::post('/locations', [CompanyLocationController::class, 'store'])->name('client.location.store');
    Route::get('/locations/{companyLocation}/edit', [CompanyLocationController::class, 'edit'])->name('client.location.edit');
    Route::patch('/locations/{companyLocation}', [CompanyLocationController::class, 'update'])->name('client.location.update');

    Route::get('/users', [UserController::class, 'index'])->name('client.user.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('client.user.show');

    Route::get('/invoices', [InvoiceController::class, 'index'])->name('client.invoice.index');
});
