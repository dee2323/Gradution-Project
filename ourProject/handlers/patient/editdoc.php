<?php
include('connect.php');
session_start();
include('selpat.php');
if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    $patdata=getById('doctors',$id);
}
$name=$_POST['fullnameD'];
//$username=$_POST['usernameD'];
$email=$_POST['emailD'];
$address=$_POST['addressD'];
$phone=$_POST['phoneD'];
$password=password_hash($_POST['password1D'],PASSWORD_DEFAULT);
$edit= "UPDATE doctors SET `name`='$name',`email`='$email',`address`='$address',`phone`='$phone', `password`='$password' WHERE doctor_id=$id";
if(mysqli_query($conn,$edit)){
    $_SESSION['edit']="Edited successfully";
    header('location:../../doctor_profile.php');
}

?>