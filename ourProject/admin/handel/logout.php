<?php 
session_start();
unset($session['login']);
session_destroy();
header('location:../login.php');

?>