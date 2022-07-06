<?php
session_start();
$_SESSION['phone']=101;
if(isset($_SESSION['name'])){
    unset($_SESSION['name']);
    header('location:../../index.php');
}
?>