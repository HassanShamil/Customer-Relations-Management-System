@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Invoices</h2>

    <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3">+ Create Invoice</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Customer</th>
                <th>Title</th>
                <th>Due amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->customer->name }}</td>
                    <td>{{ $invoice->title }}</td>
                    <td>Rs. {{ $invoice->due_amount }}</td>
                    <td><span class="badge bg-secondary">{{ ucfirst($invoice->status) }}</span></td>
                    <td>
                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this invoice?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('invoices.send', $invoice->id) }}" class="btn btn-sm btn-primary">
                            Send Invoice
                        </a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">No Invoices yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection