<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Sign Up Form</title>
    <style>
    * {
        font-size: 20px;
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <form action="{{url('/')}}/submit-user-form" method="post" enctype="multipart/form-data">
        @csrf
        <h1>User Sign Up Form</h1>

        <label for="">Name: </label>
        <input type="text" name="name"><br>

        <label for="">Email: </label>
        <input type="email" name="email"><br>

        <label for="">Address: </label>
        <input type="text" name="address"><br>

        <label for="">Select any one: </label>
        <label for=""><input type="radio" name="title" value="student">Student</label>
        <label for=""><input type="radio" name="title" value="teacher">Teacher</label><br>

        <label for="">Profile Picture: </label>
        <input type="file" name="picture"><br>

        <label for="">Current School: </label>
        <input type="text" name="current_school"><br>

        <label for="">Previous School: </label>
        <input type="text" name="previous_school"><br>

        <label for="">Password: </label>
        <input type="password" name="password"><br>

        <button type="submit" name="submit">submit</button>

    </form>

</body>

</html>