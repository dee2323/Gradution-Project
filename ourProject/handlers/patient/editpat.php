<?php
include('connect.php');
session_start();
include('selpat.php');
if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
    $patdata=getByName('patients',$name);
    $id= $patdata['patinet_id'];
}
$name=$_POST['name'];
$username=$_POST['username'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$password=password_hash($_POST['password1'],PASSWORD_DEFAULT);
$edit="UPDATE patients SET `name`='$name',username='$username',`password`='$password',phone='$phone',`address`='$address' WHERE patinet_id=$id";
if(mysqli_query($conn,$edit)){
    $_SESSION['edit']="Edited successfully";
    $q="SELECT * FROM patients WHERE username = '$username' ";
    $q=mysqli_query($conn,$q);
    $dbpatdataa=mysqli_fetch_assoc($q);
    $_SESSION['name']=$dbpatdataa['username'];
   
 
    header('location:../../patient_profile.php');
}else{
    $_SESSION['notedit']="The data has not been updated, username must be unique";
    header('location:../../patient_profile.php');
}

?>