@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pay Invoice</h2>
    
    <p><strong>Customer:</strong> {{ $invoice->customer->name }}</p>
    <p><strong>Title:</strong> {{ $invoice->title }}</p>
    <p><strong>Amount Due:</strong> ${{ number_format($invoice->due_amount, 2) }}</p>

    {{-- Stripe button goes here later --}}
    <form action="{{ route('stripe.checkout', $invoice->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Pay with Stripe</button>
    </form>
    {{-- @if ($invoice->status === 'paid')
    <button class="btn btn-success" disabled>Already Paid</button>
    @else
    <a href="{{ route('invoices.pay', $invoice->id) }}" class="btn btn-primary">Pay Now</a>
    @endif --}}
</div>
@endsection
