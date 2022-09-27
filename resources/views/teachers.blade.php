<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Details</title>
    <style>
    * {
        font-size: 20px;
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <form action="{{url('/')}}/submit-teacher-form" method="post">

        @csrf
        <h5>Teacher Details Form</h5>

        <label for="">main id: </label>
        <input type="text" name="main_id" value="{{session()->get('t_user_id')}}"><br>

        <label for="">Experience: </label>
        <input type="number" name="experience"><br>

        <label for="">Expertise Subjects: </label>
        <input type="text" name="expertise_subjects"><br>

        <button type="submit" name="submit">submit</button>

    </form>

</body>

</html>