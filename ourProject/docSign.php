<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heart Attack</title>
    <link rel="shortcut icon" href="assets/image/img1.png">
    <link rel="stylesheet" href="assets/style/Sdocsign.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500&family=Poppins&family=Shippori+Antique+B1&family=Syne+Tactile&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        function check(form) {
            password1 = form.passwordS1.value;
            password2 = form.passwordS2.value;
            phone = form.phoneS.value;
            name = form.nameS.value;
           
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
                    var result = confirm("Are you sure?");
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

<body>
    <div class="sess1">
    <?php
        
        if (isset($_SESSION['Dnotadded'])) {
        ?>
            <div class="alert alert-warning" style="width: 80%; margin:auto;margin-top:15px">
                <?= $_SESSION['Dnotadded'] ?>

            </div>
        <?php unset($_SESSION['Dnotadded']);
        }
        if (isset($_SESSION['added'])) {
        ?><div class="alert alert-warning" style="width: 80%; margin:auto;margin-top:15px" >
    <?= $_SESSION['added'] ?>
  </div><?php
            unset($_SESSION['added']);
        } ?>
       
    <form autocomplete="off" action=" handlers/patient/signdoc.php" method="post" onSubmit="return check(this)">
                <h2>Sign Up</h2>
                <!--المقروض هون ايدي للدكتور بس يكون متلا بليبل كل ما يضيف دكتور يزيد 1 لأنه عملناه بالداتا بيس اوتوانكرمنت-->
                <input type="text" name="nameS" placeholder="Full name" class="input" required="required"><br>
                <input type="text" name="addressS" placeholder="Address" class="input"required="required"><br>
                <input type="email" name="emailS" placeholder="Email" class="input"required="required"><br>
                <input type="text" name="phoneS" placeholder="Phone" class="input"required="required"><br>
                <input type="password" name="passwordS1" placeholder="Password" class="input"required="required"><br>
                <input type="password" name="passwordS2" placeholder="Confirm password" class="input"required="required"><br>

                <input type="submit" value="Sign Up" name="doctorsign" class="btn"><br>
                
                <p>Already have account ?</p> <button class="btn"><a href="docLogin.php" class="link" style="margin-bottom:5px;text-decoration:none">Log in</a></button>
                <br>
        
            </form>
     
            </div>
</body>

</html>