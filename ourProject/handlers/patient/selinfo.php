<?php
require_once('connect.php');
session_start();

include('selpat.php');
//id of patients
if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
    
    $patdata=getByName('patients',$name);
    $id= $patdata['patinet_id'];
}
function getal($table)
{
  global $id;
  global $conn;
  $getAll = "select * from $table where patinet_id=$id";
  $getAll = mysqli_query($conn, $getAll);
  $getAllData = mysqli_fetch_all($getAll, MYSQLI_ASSOC);

  return $getAllData;
}


?>
<!--صفحة لل تعامل مع 
show history  -->