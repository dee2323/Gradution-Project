<?php
  require_once('connect.php');


  function sel2($table,$col,$where){
    
    global $conn;
$sel = "SELECT ($col) FROM `$table` WHERE $where";
$sel=mysqli_query($conn,$sel);
$dbpatdata=mysqli_fetch_assoc($sel);
return $dbpatdata['patinet_id'];

}


  
  function getC($table){
    global $conn;
    $USER= $_SESSION['name'];
    $patId=sel2('patients','patinet_id',"patients.username='$USER'");
    $idd = $patId;
    $getAll = "select * from $table where patient_id=$idd ";
    $getAll = mysqli_query($conn,$getAll);
    $getAllData = mysqli_fetch_all($getAll,MYSQLI_ASSOC);
  
    return $getAllData;   
  }

  ?>