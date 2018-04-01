<?php

$valid = false;
$error = [];
$states = array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota',
    'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming');

if (isset($_POST['validation'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $stat = $_POST['states'];
    $aboutUs=$_POST['aboutUs'];

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
        $error['phoneNumber'] = "Phone must be 000-000-0000 ";
        $valid = false;
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $valid = true;
    } else {
        $error['Email'] = "Email format only";
        $valid = false;
    }
    if (!empty($gender)) {
        $valid = true;
    } else {
        $valid = false;
        $error['gender'] = "Please select gender";
    }
    if (!isset($stat)) {
        $valid = true;
    } else {
        $valid = false;
        $error['stat'] = "Please select state";
    }

    if(!empty($aboutUs)){
        $valid=true;
    }else{
        $valid=false;
        $error['about']="Please write your self";
    }
}


?>

<html>
<head>
    <title>
        Form Validation
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


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

<nav class="navbar navbar-expand-lg navbar-light"
     style="background:linear-gradient(to left,green,yellow)">
    <a class="navbar-brand" href="#">Form</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Profile</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Friends</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<div class="container row">
    <div class="col-sm-2">
    </div>

    <div class="col-sm-10 mt-5">
        <form class="pl-5 " action="#" method="post" name="form">
            <div class="form-row ">
                <div class="col-md-5">
                    <label class="form-group " for="firstName"> First Name: </label>
                    <span id="firstname"><?php echo $error['firstName']; ?></span>
                    <input class="form-control " type="text" name="firstName" id="firstName"
                           value="<?php echo $firstName ?>">

                </div>
                <div class="col-md-5">
                    <label class="form-group" for="lastName">Last Name: </label>
                    <span id="lastname"><?php echo $error['lastName']; ?></span>
                    <input class="form-control" type="text" name="lastName" id="lastName"
                           value="<?php echo $lastName ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-5">
                    <label class="form-group" for="phoneNumber">PhoneNumber: </label>
                    <span id="phonenumber"><?php echo $error['phoneNumber']; ?></span>
                    <input class="form-control" type="text" name="phoneNumber" id="phoneNumber"
                           value="<?php echo $phoneNumber ?>">
                </div>

                <div class="col-md-5">
                    <label class="form-group" for="email">Email</label>
                    <span id="Email"><?php echo $error['Email']; ?></span>
                    <input class="form-control" id="email" type="email" name="email">
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-5">
                    <label class="form-group" for="gender">Gender:</label>
                    <span id="gender"><?php echo $error['gender']; ?></span><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male"
                               value="male"
                            <?php if (isset($gender) && $gender == "male") echo "checked='checked'" ?>>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female"
                               value="female"
                            <?php if (isset($gender) && $gender == "female") echo "checked='checked'" ?>>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>

                <div class="col-sm-5">
                    <label class="mr-sm-2" for="states">States: </label>
                    <span id="states"><?php echo $error['stat']; ?></span>

                    <select class="custom-select mr-sm-2" name="states">
                        <option value="state">Choose..</option>

                        <?php foreach ($states

                        as $state)
                        { ?>
                        <option value="<?php echo $state; ?>"
                            <?php if ($stat == $state) echo "selected='selected'" ?>
                        >
                            <?php echo $state;
                            } ?></option>
                    </select>


                </div>

                <div class="col-sm-10">
                    <label class="form-group"></label>
                    <textarea id="aboutUs" name="aboutUs" class="form-control" placeholder="Please write your self.." rows="5"></textarea>
                    <span><?php echo $error['about'];?></span>

                </div>

            </div>
            <br>
            <div class="col-sm-10">
                <button class="btn btn-block btn-success" type="submit" name="validation">Submit</button>
            </div>

        </form>
    </div>


    <div class="col-sm-12">
        <?php
        echo "<pre>";
        print_r($error);
        echo "</br>";
        print_r($_POST);
        ?>
    </div>

</div>

<script>

    var lastNames = document.getElementById("lastName");
    var firstNames = document.getElementById("firstName");
    var phoneNumbers = document.getElementById("phoneNumber");
    var emails = document.getElementById("email");


    firstNames.onkeyup = validate_firstname;
    lastNames.onkeyup = validate_lastname;
    phoneNumbers.onkeyup = validate_phonenumber;
    emails.onkeyup = validate_email;


    function validate_email() {
        var email = emails.value;
        var emailreg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!emailreg.test(email)) {
            document.getElementById("Email").innerHTML = "Email only ";
            return false;
        } else {
            document.getElementById("Email").innerHTML = "";

        }
    }

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
            var first = $("#firstName").val();
            if (!first.match(/[a-z]/i)) {
                $(":").nextAll().hide();
            } else {
                $(":").nextAll().show();
            }
        });

        $("#lastName").focusout(function () {
            var last = $("#lastName").val();
            if (!last.match(/[a-z]/i)) {
                $(":input").nextAll().hide();
            } else {
                $(":input").nextAll().show();
            }
        });

        $("#phoneNumber").focusout(function () {
            var phone = $("#phoneNumber").val();
            if (!phone.match(/^[0-9]{3}[-][0-9]{3}[-][0-9]{4}/)) {
                $(":input").nextAll().hide();
            } else {
                $(":input").nextAll().show();
            }
        });

        $("#email").focusout(function () {
            var emails = $("#email").val();
            if (!emails.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/i)) {
                $(":input").nextAll().hide();
            } else {
                $(":input").nextAll().show();
            }
        });

    });
</script>
</body>
</html>
