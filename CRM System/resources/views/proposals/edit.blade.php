@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Proposal</h2>

    <form action="{{ route('proposals.update', $proposal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Customer</label>
            <select class="form-select" name="customer_id" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $proposal->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input class="form-control" name="title" value="{{ old('title', $proposal->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Content</label>
            <textarea class="form-control" name="content">{{ old('content', $proposal->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Estimate</label>
            <input class="form-control" type="number" name="estimate" value="{{ old('estimate', $proposal->estimate) }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select class="form-select" name="status" required>
                @foreach(['draft', 'sent', 'accepted', 'rejected'] as $status)
                    <option value="{{ $status }}" {{ $proposal->status == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('proposals.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
