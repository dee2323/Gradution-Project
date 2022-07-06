<?php
include ('connect.php');
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
$login="SELECT * FROM patients WHERE username = '$username' ";
$login=mysqli_query($conn,$login);
$dbpatdata=mysqli_fetch_assoc($login);
$count=mysqli_num_rows($login);
$passworddb=$dbpatdata['password']; 

    if(password_verify($password,$passworddb)){
       $_SESSION['login']=true;
       $_SESSION['name']=$dbpatdata['username'];
       header('location:../../patientHome.php');

    }
    elseif(empty($username) and empty($password)){
        header('location:../../patLogin.php');
        $_SESSION['error']='You must enter an user name and password';
    }
    elseif(empty($username)){
        header('location:../../patLogin.php');
        $_SESSION['error']='You must enter an user name';
    }
    elseif(empty($password)){
        header('location:../../patLogin.php');
        $_SESSION['error']='You must enter an password';
    }

else{
    header('location:../../patLogin.php');
    $_SESSION['error']='user name or password is invalid';
}
?>
