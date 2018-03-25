<?php

$valid = false;
$error = [];
if (isset($_POST['validation'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];

    if (ctype_alpha($firstName)) {
        $valid = true;
    } else {
        $error['firstName'] = "First Name must be Alphabet";
        $valid = false;
    }
    if (ctype_alpha($lastName)) {
        $valid = true;
    } else {
        $error['lastName'] = "Last Name must be Alphabet";
        $valid = false;
    }
    if (preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phoneNumber)) {
        $valid = true;
    } else {
        $error['phoneNumber'] = "Phone Number must be 000-000-0000 ";
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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>


    <style>
        form {
            background: linear-gradient(to left, greenyellow, lightgoldenrodyellow);
        }

        body {
            background: linear-gradient(to right, greenyellow, lightgoldenrodyellow);
        }
    </style>

</head>

<body>
<div class="container row">
    <div class="col-sm-2">
    </div>

    <div class="col-sm-10 mt-5">
        <form class="pl-5 text-left" action="#" method="post" name="form">

            <div class="col-sm-8">
                <label class="form-group " for="firstName"> First Name: </label>
                <span id="firstname"><?php echo $error['firstName']; ?></span>
                <input class="form-control " type="text" name="firstName" id="firstName"
                       value="<?php echo $firstName ?>">
            </div>

            <div class="col-sm-8">
                <label class="form-group" for="lastName">Last Name: </label>
                <span id="lastname"><?php echo $error['lastName']; ?></span>
                <input class="form-control" type="text" name="lastName" id="lastName"
                       value="<?php echo $lastName ?>">
            </div>

            <div class="col-sm-8">
                <label class="form-group" for="phoneNumber">PhoneNumber: </label>
                <span id="phonenumber"><?php echo $error['phoneNumber']; ?></span>
                <input class="form-control" type="text" name="phoneNumber" id="phoneNumber"
                       value="<?php echo $phoneNumber ?>">
            </div>

            <br>

            <div class="col-sm-8">
                <button class="btn btn-block btn-basic" type="submit" name="validation">Submit</button>
            </div>
            <br>
        </form>


    </div>
    <div class="col-sm-2">
        <?php
        print_r($error);
        ?>
    </div>

</div>

<script>

    var lastNames = document.getElementById("lastName");
    var firstNames = document.getElementById("firstName");
    var phoneNumbers = document.getElementById("phoneNumber");

    firstNames.onkeyup = validate_firstname;
    lastNames.onkeyup = validate_lastname;
    phoneNumbers.onkeyup = validate_phonenumber;

    function validate_firstname() {
        var text = firstNames.value;
        if (!text.match(/[a-z]/i)) {
            document.getElementById("firstname").innerHTML = "Please use Alphabet ";
            return false;
        } else {
            document.getElementById("firstname").innerHTML = "";
            return true;
        }
    }

    function validate_lastname() {
        var text = lastNames.value;
        if (!text.match(/[a-z]/i)) {
            document.getElementById("lastname").innerHTML = "Please Use Alphabet ";
            return false;
        } else {
            document.getElementById("lastname").innerHTML = "";
            return true;
        }
    }

    function validate_phonenumber() {
        var phone = phoneNumbers.value;
        var reg = /^[0-9]{3}[-][0-9]{3}[-][0-9]{4}/;
        if (!reg.test(phone)) {
            document.getElementById("phonenumber").innerHTML = "Please Use 000-000-0000";
            return false;
        } else {
            document.getElementById("phonenumber").innerHTML = "";
            return true;
        }
    }

    $(document).ready(function () {
        $("#firstName").focusout(function () {
            var f = $("#firstName").val();
            if (!f.match(/[a-z]/i)) {
                $(":input").nextAll().hide();
            } else {
                $(":input").nextAll().show();
            }
        });

        $("#lastName").focusout(function () {
            var f = $("#lastName").val();
            if (!f.match(/[a-z]/i)) {
                $(":input").nextAll().hide();
            } else {
                $(":input").nextAll().show();
            }
        });

        $("#phoneNumber").focusout(function () {
            var f = $("#phoneNumber").val();
            if (!f.match(/^[0-9]{3}[-][0-9]{3}[-][0-9]{4}/)) {
                $(":input").nextAll().hide();
            } else {
                $(":input").nextAll().show();
            }
        });
    });


</script>
</body>
</html>
