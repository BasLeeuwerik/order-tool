<?php

use Domain\Admin\Controllers\CompanyController;
use Domain\Admin\Controllers\CompanyLocationController;
use Domain\Admin\Controllers\DashboardController;
use Domain\Admin\Controllers\DiscountCodeController;
use Domain\Admin\Controllers\InvoiceController;
use Domain\Admin\Controllers\PurchaseOrderController;
use Domain\Admin\Controllers\QuotationController;
use Domain\Admin\Controllers\UserController;
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

    Route::get('/locations/{company}/create', [CompanyLocationController::class, 'create'])->name('admin.location.create');
    Route::post('/locations/{company}', [CompanyLocationController::class, 'store'])->name('admin.location.store');
    Route::get('/locations/{companyLocation}/edit', [CompanyLocationController::class, 'edit'])->name('admin.location.edit');
    Route::patch('/locations/{companyLocation}', [CompanyLocationController::class, 'update'])->name('admin.location.update');
});
