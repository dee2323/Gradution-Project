

<?php
session_start();
include('connect.php');
$id=$_GET['id'];
$status=1;
echo $status;
$edit= "UPDATE doctors SET `status`= $status WHERE doctor_id=$id";
if(mysqli_query($conn,$edit)){
    ?>
    <?php
    $_SESSION['ready']="doctor account  is active now";
    $_SESSION['acc']=true;
    ?>
    
    <?php
    header('location:../users.php');
}
?>
