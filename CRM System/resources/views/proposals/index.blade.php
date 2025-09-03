@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Proposals</h2>

    <a href="{{ route('proposals.create') }}" class="btn btn-primary mb-3">+ Create Proposal</a>

    @if(session('success'))
        <div id="success-alert"  class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Customer</th>
                <th>Title</th>
                <th>estimate</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($proposals as $proposal)
                <tr>
                    <td>{{ $proposal->customer->name }}</td>
                    <td>{{ $proposal->title }}</td>
                    <td>Rs. {{ $proposal->estimate }}</td>
                    <td><span class="badge bg-secondary">{{ ucfirst($proposal->status) }}</span></td>
                    <td>
                        <a href="{{ route('proposals.edit', $proposal->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('proposals.destroy', $proposal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this proposal?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">No proposals yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('#success-alert').delay(3000).fadeOut(500);
    });
</script>