<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use App\Mail\SendInvoiceMail;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::with('customer')->latest()->get();
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $customers = Customer::all();
        return view('invoices.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'due_amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,paid,failed',
        ]);

        Invoice::create($request->all());
        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        $customers = Customer::all();
        return view('invoices.edit', compact('invoice', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'due_amount' => 'required|numeric|min:0',
            'status' => 'required|in:pending,paid,failed',
        ]);

        $invoice->update($request->all());
        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted.');
    }

    public function sendEmail(Invoice $invoice)
    {
        Mail::to($invoice->customer->email)->send(new SendInvoiceMail($invoice));
    
        return back()->with('success', 'Invoice sent successfully!');
    }


}
