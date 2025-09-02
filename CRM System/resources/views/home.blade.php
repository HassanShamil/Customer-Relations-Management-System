<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRM Login/Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <!-- Login Form -->
            <div class="col-md-6 col-lg-5 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header  text-white" style="background-color: #1E2A38">Log In</div>
                    <div class="card-body">
                        <form action="/login" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="loginname" class="form-label">Username</label>
                                <input name="loginname" type="text" class="form-control" id="loginname" required>
                                @if ($errors->has('loginname'))
                                    <div class="text-danger mt-1">{{ $errors->first('loginname') }}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="loginpassword" class="form-label">Password</label>
                                <input name="loginpassword" type="password" class="form-control" id="loginpassword" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" style="background-color: #1E2A38; color: white">Log In</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Register Form -->
            <div class="col-md-6 col-lg-5 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header text-white" style="background-color: #165534">Sign Up</div>
                    <div class="card-body">
                        <form action="/register" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Username</label>
                                <input name="name" type="text" class="form-control" id="name" required>
                                @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" id="email" required>
                                @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="password" required>
                                @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input name="confirm_password" type="password" class="form-control" id="confirm_password" required>
                                @error('confirm_password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success w-100" style="background-color: #165534; color: white">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 


