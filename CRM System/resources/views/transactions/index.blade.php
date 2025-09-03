@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">All Transactions</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($transactions->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Invoice ID</th>
                    <th>Amount</th>
                    <th>Paid At</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->customer->name }}</td>
                        <td>#{{ $transaction->invoice->id }}</td>
                        <td>${{ number_format($transaction->amount, 2) }}</td>
                        <td>{{ $transaction->paid_at ? $transaction->paid_at->format('Y-m-d H:i') : '-' }}</td>
                        <td>{{ $transaction->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No transactions yet.</p>
    @endif
</div>
@endsection


