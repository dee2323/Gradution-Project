<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heart Attack</title>
    <link rel="shortcut icon" href="assets/image/img1.png">
    <link rel="stylesheet" href="assets/style/Slogin.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="sess1">
   
        <form autocomplete="off" action="handlers/patient/loginpat.php" method="post" >
            <h2>Log In</h2>
            <input type="text" name="username" placeholder="User name" class="input"><br>
            <input type="password" name="password" placeholder="Password" class="input"><br>
            <input type="submit" value="Log In" class="btn">

        </form>
      
        <?php
        if(isset($_SESSION['error'])){
            ?><div class="alert alert-danger" style="width: 80%; margin:auto;margin-top:15px" >
            <?=$_SESSION['error']?>
          </div><?php
            unset($_SESSION['error']);
        }
        ?>

    </div>
</body>

</html>