<?php
 session_start();
 include('connect.php'); 
$id=$_GET['id'];
function getal($table)
{
  global $id;
  global $conn;
  $getAll = "select * from $table where patinet_id =$id";
  $getAll = mysqli_query($conn, $getAll);
  $getAllData = mysqli_fetch_all($getAll, MYSQLI_ASSOC);
  
  return $getAllData;
}




?>