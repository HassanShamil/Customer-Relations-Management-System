@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome, {{ $user->name }} 👋</h1>
        <p>Email: {{ $user->email }}</p>
        <p>You are logged in as Admin.</p>
    </div>
@endsection
