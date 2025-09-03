@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Create Invoice</h2>

    <form action="{{ route('invoices.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Customer</label>
            <select class="form-select" name="customer_id" required>
                <option value="">-- Select Customer --</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
            @error('customer_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input class="form-control" name="title" value="{{ old('title') }}" required>
            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea class="form-control" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Due amount</label>
            <input class="form-control" type="number" name="due_amount" value="{{ old('due_amount') }}" required>
            @error('due_amount') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select class="form-select" name="status" required>
                <option value="pending">pending</option>
                <option value="paid">paid</option>
                <option value="failed">failed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
