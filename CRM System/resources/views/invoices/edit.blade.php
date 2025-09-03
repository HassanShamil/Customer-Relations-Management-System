@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Invoice</h2>

    <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Customer</label>
            <select class="form-select" name="customer_id" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $invoice->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input class="form-control" name="title" value="{{ old('title', $invoice->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea class="form-control" name="description">{{ old('description', $invoice->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Due amount</label>
            <input class="form-control" type="number" name="due_amount" value="{{ old('due_amount', $invoice->due_amount) }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select class="form-select" name="status" required>
                @foreach(['pending', 'paid', 'failed'] as $status)
                    <option value="{{ $status }}" {{ $invoice->status == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
