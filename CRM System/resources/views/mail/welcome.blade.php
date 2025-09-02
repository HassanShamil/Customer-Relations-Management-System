<!DOCTYPE html>
<html>
<head>
    <title>Welcome to CRM App</title>
</head>
<body>
    {{-- <h1>Hello, {{ auth()->user()->name }}!</h1>
    <p>Welcome to the CRM App. Your registration was successful.</p>
    <p>We’re excited to have you on board.</p> --}}
    <h1>Welcome, {{ $user->name }}!</h1>
    <p>Your email is: {{ $user->email }}</p>
</body>
</html>



