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

        <label for="">main id: </label>
        <input type="text" name="main_id" value="{{session()->get('user_id')}}"><br>

        <label for="">Parents Details: </label>
        <input type="text" name="parents_details"><br>

        <button type="submit" name="submit">submit</button>

    </form>

</body>

</html>