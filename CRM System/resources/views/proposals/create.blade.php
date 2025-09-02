@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Create Proposal</h2>

    <form action="{{ route('proposals.store') }}" method="POST">
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
            <label>Content</label>
            <textarea class="form-control" name="content">{{ old('content') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Estimate</label>
            <input class="form-control" type="number" name="estimate" value="{{ old('estimate') }}" required>
            @error('estimate') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select class="form-select" name="status" required>
                <option value="draft">Draft</option>
                <option value="sent">Sent</option>
                <option value="accepted">Accepted</option>
                <option value="rejected">Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('proposals.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
