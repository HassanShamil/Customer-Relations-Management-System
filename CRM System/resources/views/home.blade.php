<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>

    @auth
        
    <p>Welcome {{ auth()->user()->name }} !</p>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Log out</button>
    </form>




    @else

    <div style="border: 3px solid black; margin-bottom: 2px">
        <h1>Log in</h1>
        <form action="/login" method="POST">
            @csrf     
            <label for="loginname">username</label>
            <input name="loginname" type="text" id="loginname">
            @if ($errors->has('loginname'))
                <div style="color: red;">{{ $errors->first('loginname') }}</div>
            @endif
            <label for="loginpassword">password</label>
            <input name="loginpassword" type="password" id="loginpassword">
            <button type="submit">Log in</button>
        </form>
    </div>


    <div style="border: 3px solid black">
        <h1>Sign up</h1>
        <form action="/register" method="POST">
            @csrf
            <label for="name">username</label>
            <input name="name" type="text" id="name">
            <label for="email">email</label>
            <input name="email" type="text" id="email">
            <label for="password">password</label>
            <input name="password" type="password" id="password">
            <label for="confirm_password">confirm password</label>
            <input name="confirm_password" type="password" id="confirm_password">
            <button type="submit">Register</button>
        </form>
    </div>


    @endauth



</body>
</html>