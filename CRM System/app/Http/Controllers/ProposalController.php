<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proposals = Proposal::with('customer')->latest()->get();
        return view('proposals.index', compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('proposals.create');
        $customers = Customer::all();
        return view('proposals.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'title' => 'required|string',
            'content' => 'nullable|string',
            'estimate' => 'required|numeric|min:0',
            'status' => 'required|in:draft,sent,accepted,rejected',
        ]);

        Proposal::create($request->all());
        return redirect()->route('proposals.index')->with('success', 'Proposal created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proposal $proposal)
    {
        $customers = Customer::all();
        return view('proposals.edit', compact('proposal', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proposal $proposal)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'title' => 'required|string',
            'content' => 'nullable|string',
            'estimate' => 'required|numeric|min:0',
            'status' => 'required|in:draft,sent,accepted,rejected',
        ]);

        $proposal->update($request->all());
        return redirect()->route('proposals.index')->with('success', 'Proposal updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proposal $proposal)
    {
        $proposal->delete();
        return redirect()->route('proposals.index')->with('success', 'Proposal deleted.');
    }
}
