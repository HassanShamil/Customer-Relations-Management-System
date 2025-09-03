@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Welcome, {{ $user->name }} 👋</h1>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Customers</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $customerCount }}</h5>
                    <p class="card-text">Total registered customers</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Proposals</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $proposalCount }}</h5>
                    <p class="card-text">Total proposals created</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Invoices</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $invoiceCount }}</h5>
                    <p class="card-text">{{ $unpaidInvoices }} unpaid</p>
                </div>
            </div>
        </div>
    </div>

    <h3 class="mt-5">Recent Transactions</h3>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Date</th>
                <th>Project</th>
                <th>Customer</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                    <td>{{ $transaction->invoice->title }}</td>
                    <td>{{ $transaction->customer->name ?? 'N/A' }}</td>
                    <td>Rs {{ number_format($transaction->amount, 2) }}</td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="4">No recent transactions.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
