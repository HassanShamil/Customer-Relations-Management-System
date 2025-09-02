@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Add New Customer</h2>

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name">Name</label>
            <input class="form-control" name="name" value="{{ old('name') }}" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="phone">Phone</label>
            <input class="form-control" name="phone" value="{{ old('phone') }}">
        </div>

        <div class="mb-3">
            <label for="address">Address</label>
            <input class="form-control" name="address" value="{{ old('address') }}" required>
            @error('address') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="status">Status</label>
            <select class="form-select" name="status" required>
                <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
