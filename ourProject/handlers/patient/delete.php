<?php
  session_start();
  include('connect.php'); 
  $id=$_GET['id'];
 
$deleteUser="DELETE FROM patients where patinet_id=$id";
if(mysqli_query($conn,$deleteUser)){
    $_SESSION['action']='patient is deleted';
     header("location:../../show-patient.php");
}else {
    echo mysqli_error($conn);
}

?>
<!-- صفحة للتعامل مع الحذف سلة المهملات 
في 
show history  -->