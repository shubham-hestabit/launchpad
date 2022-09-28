<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
    * {
        font-size: 20px;
        margin-top: 10px;
    }

    span {
        color: red;
        font-size: 20px;
    }
    </style>
</head>

<body>
    <form action="{{url('/')}}/submit-admin-form" method="post">
        @csrf
        <h5>Admin Login</h5>

        <label for="name">Name: </label>
        <input type="text" name="name"><span>@error('name') {{$message}} @enderror </span><br>

        <label for="email">Email: </label>
        <input type="email" name="email"><span>@error('email') {{$message}} @enderror </span><br>

        <label for="password">Password: </label>
        <input type="password" name="password"><span>@error('password') {{$message}} @enderror </span><br>

        <button type="submit" name="submit">submit</button>

    </form>

</body>

</html>