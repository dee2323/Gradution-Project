<?php

require_once('handlers/patient/addpat.php');
include('handlers/patient/selpat.php');
if(isset($_SESSION['id'])){
    $id=$_SESSION['id']; // id=1 now
    
    $docdata=getById('doctors',$id);
  
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Heart Attack</title>
    <link rel="shortcut icon" href="assets/image/img1.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
        function check(form) {
            password1 = form.password.value;
            password2 = form.confirmpass.value;
            phone = form.phone.value;
            name = form.fullname.value;

            if (fullName(name) == false) {
                return false;
            }
            if (phonenumber(phone) == false) {
                return false;
            }
            if (password1 == '')
                alert("Please enter Password");


            else if (password2 == '')
                alert("Please enter confirm password");


            else if (password1 != password2) {
                alert("\nPassword did not match: Please try again...")
                return false;
            } else {
                if (CheckPa(password1) == true) {
                    var result = confirm("Are you sure to add patient?");
                    if (result) {
                        return true;
                    } else return false;
                } else
                    return false

            }
        }

        function CheckPa(password) {
            var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
            if (password.match(passw)) {

                return true;
            } else {
                alert(' Invalid password! \n your password needs to: \n * include both lower and upper case characters. \n * Include at least one number. \n * Be at least 6 character long.')
                return false;
            }
        }

        function phonenumber(phone) {
            var phoneno = /^\d{10}$/;
            if (phone.match(phoneno)) {
                return true;
            } else {
                alert("invalid phone number!");
                return false;
            }
        }

        function fullName(name) {
            var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;

            if (!regName.test(name)) {
                alert('Please enter your full name (first & last name).');
                return false;
            } else {
                return true;
            }
        }
    </script>
</head>
<style>
    .out {
        margin-right: 40px;
        margin-left: auto;
    }
</style>

<body>

    <div class="sidebar">
        <div class="body-text">
            <span class="title" style="font-size:21px;"><i class="fa-solid fa-user-doctor"></i>Dr. <?=$docdata['name']?></span>
        </div>

        <div class="first_item item">
            <i class="fa-solid fa-user-pen"></i>
            <a href="doctor_profile.php">Edit Profile</a>
        </div>
        <div class="item">
            <i class="fa-solid fa-user-plus"></i>
            <a href="#">Add Patient</a>
        </div>
        <div class="item">
            <i class="fa-solid fa-eye"></i>
            <a href="show-patient.php">Show Patient</a>
        </div>

        <div class="item">
            <i class="fa-solid fa-right-from-bracket"></i>
            <a onclick="return  confirm('Are you sure you want to logout?')" href="handlers/patient/logoutdoc.php">Logout</a>
        </div>
    </div>

    <div class="body-text">
        <!-- body content -->
    </div>
    <div class="out">
        <div class="container">

            <div class="title">Add Patient</div>
            <div class="content">
                <?php
                if (isset($_SESSION['notadded'])) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_SESSION['notadded'] ?>

                    </div>
                <?php unset($_SESSION['notadded']);
                } ?>
                <?php if (isset($_SESSION['added'])) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_SESSION['added'] ?>

                    </div>
                <?php unset($_SESSION['added']);
                } ?>
                <form autocomplete="off" action="handlers/patient/addpat.php" method="POST" onSubmit="return check(this)">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text" placeholder="Enter patient's name" name="fullname" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Username</span>
                            <input type="text" placeholder="Enter username" name="username" required>
                            <p style="color:red;font-size:10px;">**user name must be unique</p>
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" placeholder="Enter patient's email" name="email" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="text" placeholder="Enter phone number" name="phone" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" placeholder="Enter password" name="password" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Confirm Password</span>
                            <input type="password" placeholder="Confirm password" name="confirmpass" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Address</span>
                            <input type="text" placeholder="Enter patient's address" name="address" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Birthdate</span>
                            <input type="date" placeholder="Enter patient's birthdate" name="birthdate" required>
                        </div>
                        <div class="input-box"></div>
                    </div>
                    <div class="gender-details">
                        <input type="radio" name="gender" id="dot-1" value="1">
                        <input type="radio" name="gender" id="dot-2" value="0">
                        <input type="radio" name="gender" id="dot-3">
                        <span class="gender-title">Gender</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gender">Male</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender">Female</span>
                            </label>

                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="Add" name="addPatient">
                    </div>
                </form>


            </div>
        </div>
    </div>
</body>

</html>