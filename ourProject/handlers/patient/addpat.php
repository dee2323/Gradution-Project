<?php 
 session_start();
require_once('connect.php');


function add($table,$cols,$values){
    global $conn;
  $ins = "insert into $table ($cols) values ($values)";
 if(mysqli_query($conn,$ins)){
    header("location:../../add-patient.php");
     $_SESSION['added']="Added successfully";
 }
 else{
    header("location:../../add-patient.php");
    $_SESSION['notadded']="The patient was not added, user name is not unique";
     //echo mysqli_error($conn);
 }
}




if(isset($_POST['addPatient'])){
   $name = $_POST['fullname'];
   $username = $_POST['username'];
   $email =$_POST['email'];
   $phone =$_POST['phone'];
   $pass =$_POST['confirmpass'];
   $address =$_POST['address'];
   $bd  =$_POST['birthdate'];
   $gender =$_POST['gender'];
   

   $password=password_hash($pass,PASSWORD_DEFAULT);

   $doctor_ID= $_SESSION['id'];
   add("patients","name,username,password,gender,phone,address,birthdate,status,doctor_id",
                 "'$name','$username','$password','$gender','$phone','$address','$bd',1,$doctor_ID");

}
?>

<!-- صفحة للتعامل مع اضافة المريض من جهة الطبيب -->