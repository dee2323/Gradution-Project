<?php
  session_start();
  include('connect.php'); 
  $id=$_GET['id'];
 
$deleteUser="DELETE FROM emergency_contact where contact_id=$id";
if(mysqli_query($conn,$deleteUser)){
    $_SESSION['action']='contact is deleted';
     header("location:../../show-contact.php");
}else {
    echo mysqli_error($conn);
}

?>
<!-- صفحة للتعامل مع الحذف سلة المهملات 
في 
show history  -->