<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Form</title>
    <style>
    * {
        font-size: 20px;
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <form action="{{url('/')}}/login-form" method="post">
        @csrf
        <h1>User Login Form</h1>

        <h3>{{$error ?? ''}}</h3>

        <label for="">Email: </label>
        <input type="email" name="email"><br>
        <span>@error('email') {{$message}} @enderror </span>

        <label for="">Password: </label>
        <input type="password" name="password"><br>
        <span>@error('password') {{$message}} @enderror</span>

        <label for="">Confirm Password: </label>
        <input type="password" name="confirm_password"><br>
        <span>@error('confirm_password') {{$message}} @enderror</span>

        <button type="submit" name="submit">submit</button>

    </form>

</body>

</html>