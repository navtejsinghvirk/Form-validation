<?php

$valid = false;

if (isset($_POST['validation'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    if (!empty($firstName) && ctype_alpha($firstName)) {
        $valid = true;
    } else {
        $error = "Please Use Alphabet";
        $valid = false;
    }
    if (!empty($lastName) && ctype_alpha($lastName)) {
        $valid = true;
    } else {
        $error = "Please Use Alphabet";
        $valid = false;
    }
}


?>

<html>
<head>
    <title>
        Form Validation
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <style>
        form {
            background: linear-gradient(to left, purple, whitesmoke);
        }
    </style>

</head>
<body>
<div class="container row">
    <div class="col-4">
    </div>

    <div class="col-6 mt-5">
        <form action="#" method="post">
            <p class="display-4 text-center ">Form Validation</p>
            <label class="form-group"> First Name: </label> <span><?php echo $error; ?></span>
            <input class="form-control " type="text" name="firstName" id="fistName" value="<?php echo $firstName ?>">
            <label class="form-group">Last Name: </label> <span><?php echo $error; ?></span>
            <input class="form-control" type="text" name="lastName" id="lastName" value="<?php echo $lastName ?>"><br>
            <label>PhoneNumber: </label>
            <div class="text-center">
                <button class="btn btn-basic" type="submit" name="validation">Submit</button>
            </div>
            <br>
        </form>

    </div>
    <div class="col-3"></div>
</div>
</body>
</html>
