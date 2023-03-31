<?php

namespace Domain\Invoice\Controllers;

use App\Http\Controllers\Controller;
use Domain\Invoice\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class InvoiceController extends Controller
{
    public function index(Request $request): Response
    {
        $user = Auth::user();

        $invoices = Invoice::query()
            ->where('receiver_id', $user->company_id)
            ->orderByDesc('id')
            ->paginate(10);

        return Inertia::render('Client/Invoice/Index', [
            'invoices' => $invoices,
        ]);
    }
}
