@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Customer</h2>

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Name</label>
            <input class="form-control" name="name" value="{{ old('name', $customer->name) }}" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" value="{{ old('email', $customer->email) }}" required>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="phone">Phone</label>
            <input class="form-control" name="phone" value="{{ old('phone', $customer->phone) }}">
        </div>

        <div class="mb-3">
            <label for="address">Address</label>
            <input class="form-control" name="address" value="{{ old('address', $customer->address) }}" required>
             @error('address') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="status">Status</label>
            <select class="form-select" name="status" required>
                <option value="active" {{ $customer->status === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $customer->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
