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

        <h5>Teacher Details Form</h5>

        <label for="">main id: </label>
        <input type="text" name="mainid"><br>

        <label for="experience">Experience: </label>
        <input type="number" name="experience"><br>

        <label for="exp_subject">Expertise Subjects: </label>
        <input type="text" name="exp_subject"><br>

        <button type="submit" name="submit">submit</button>

    </form>

</body>

</html>