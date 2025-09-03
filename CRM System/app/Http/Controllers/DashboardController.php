<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Proposal;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Index() {
        $user = auth()->user();
        $customerCount = Customer::count();
        $proposalCount = Proposal::count();
        $invoiceCount = Invoice::count();
        $unpaidInvoices = Invoice::where('status', 'pending')->count();
        $transactions = Transaction::latest()->take(5)->get();

        return view('dashboard.index', compact(
        'user',
        'customerCount',
        'proposalCount',
        'invoiceCount',
        'unpaidInvoices',
        'transactions'
    ));
    }
}
