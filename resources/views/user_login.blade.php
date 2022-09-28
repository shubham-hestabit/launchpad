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

    span {
        color: red;
        font-size: 20px;
    }
    h3{
        color: red;
    }
    </style>
</head>

<body>
    <form action="{{url('/')}}/user-login-form" method="post">
        @csrf
        <h1>User Login Form</h1>

        <label for="">Email: </label>
        <input type="email" name="email"><span>@error('email') {{$message}} @enderror </span><br>
        
        <label for="">Password: </label>
        <input type="password" name="password"><span>@error('password') {{$message}} @enderror</span><br>

        <label for="">Confirm Password: </label>
        <input type="password" name="confirm_password"><span>@error('confirm_password') {{$message}} @enderror</span><br>

        <button type="submit" name="submit">submit</button>

        <h3>{{$error ?? ''}}</h3>

    </form>

</body>

</html>