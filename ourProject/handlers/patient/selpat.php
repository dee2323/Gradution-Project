<?php
  require_once('connect.php');

  function getall($table){
    global $conn;
    $getAll = "select * from $table";
    $getAll = mysqli_query($conn,$getAll);
    $getAllData = mysqli_fetch_all($getAll,MYSQLI_ASSOC);

    return $getAllData;
     
}
function getP($table){
  global $conn;
  $idd = $_SESSION['id'];
  $getAll = "select * from $table where doctor_id=$idd ";
  $getAll = mysqli_query($conn,$getAll);
  $getAllData = mysqli_fetch_all($getAll,MYSQLI_ASSOC);

  return $getAllData;   
}
function getByName($table,$name){
    global $conn;
    $getall="SELECT * FROM $table where username='$name'";
    $getall=mysqli_query($conn,$getall);
    $getalldata=mysqli_fetch_assoc($getall);
    return $getalldata;
}

function getByPhone($table,$phone){
  global $conn;
  $getall="SELECT * FROM $table where phone='$phone'";
  $getall=mysqli_query($conn,$getall);
  $getalldata=mysqli_fetch_assoc($getall);
  return $getalldata;
}

function getById($table,$id){
  global $conn;
  $getall="SELECT * FROM $table where doctor_id='$id' AND `status`=1";
  $getall=mysqli_query($conn,$getall);
  $getalldata=mysqli_fetch_assoc($getall);
  return $getalldata;
}
  

function getIDByEmail($table,$email){
  global $conn;
  $getID="SELECT * FROM $table where email='$email'";
  $getID=mysqli_query($conn,$getID);
  $getalldata=mysqli_fetch_assoc($getID);
  $ID = $getalldata['doctor_id'];
  return $ID;
}

?>
<!-- صفحة للتعامل مع
 show patient -->