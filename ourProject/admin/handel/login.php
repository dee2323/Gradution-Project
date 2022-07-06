<?php
include("connect.php");
session_start();

$email=$_POST['email'];
$password=$_POST['password'];
$query="SELECT * FROM admines where email='$email'";
$query=mysqli_query($conn,$query);
$count=mysqli_num_rows($query);
$admin=mysqli_fetch_assoc($query);
if ($count>0) {
    if (password_verify($password,$admin['password'])) {
        $_SESSION['login']='true';
        header('location:../users.php');
    }else {
        $_SESSION['error']='password is invalid';
        header("location:../login.php");
    }
}
else{ $_SESSION['error']='email is invalid';
header("location:../login.php");
}

?>