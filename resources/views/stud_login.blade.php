<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
    * {
        font-size: 20px;
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <form action="{{url('/')}}/submit-student-form" method="post">
        @csrf
        <h1>Student details form</h1>

        <label for="">Email: </label>
        <input type="text" name="main_id" value="{{session()->get('s_user_id')}}"><br>

        <label for="">Password: </label>
        <input type="password" name="password"><br>

        <label for="">Confirm Password: </label>
        <input type="password" name="password"><br>

        <button type="submit" name="submit">submit</button>

    </form>

</body>

</html>