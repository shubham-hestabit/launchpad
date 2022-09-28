<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data Dashboard</title>
    <style>
    * {
        font-size: 20px;
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <form action="{{url('/')}}/user-details" method="post">
        @csrf
        <h3>Hello Users</h3>

        <!-- <label for="name">Name: </label>
        <input type="text" name="name"><br>

        <label for="email">Email: </label>
        <input type="email" name="email"><br>

        <label for="password">Password: </label>
        <input type="password" name="password"><br>

        <button type="submit" name="submit">submit</button> -->

    </form>

</body>

</html>