<?php
include('connect.php');
include('selpat.php');
session_start();

function add($table,$cols,$values){
    global $conn;
  $ins = "insert into $table ($cols) values ($values)";
 if(mysqli_query($conn,$ins)){
$ID= getIDByEmail('doctors',$_POST['emailS']);
$_SESSION['id']= $ID;
    header("location:../../docSign.php");
    $_SESSION['added']="Please wait for admin to accept you ,your id is $ID ";

 }
 else{
    header("location:../../docSign.php");
    $_SESSION['Dnotadded']="Duplicate email, please try to login";
      //echo mysqli_error($conn);
  }
 }


if(isset($_POST['doctorsign'])){
   $name = $_POST['nameS'];
   $address =$_POST['addressS'];
   $email =$_POST['emailS'];
   $pass1 =$_POST['passwordS1'];
   $password=password_hash($pass1,PASSWORD_DEFAULT);
   $phone  =$_POST['phoneS'];

   add("doctors","name,email,address,phone,password",
                 "'$name','$email','$address','$phone','$password'");

}
?>