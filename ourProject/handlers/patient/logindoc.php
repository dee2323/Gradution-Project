<?php
include ('connect.php');
session_start();
$_SESSION['log']="true";
$id=$_POST['docId'];
$entered_password=$_POST['docpass'];  //from form
$login="SELECT * FROM doctors WHERE doctor_id = '$id'  ";
$login=mysqli_query($conn,$login);
$doc_data=mysqli_fetch_assoc($login);  //from database
$count=mysqli_num_rows($login);
$real_password=$doc_data['password']; 


    if(password_verify($entered_password,$real_password)){
       if($doc_data['status']==1){
        $_SESSION['login']=true;
        $_SESSION['id']=$doc_data['doctor_id'];
        header('location:../../doctor_profile.php');
       }
       else{
           $_SESSION['wait']='Wait for the admin to accept your account';
           header('location:../../docLogin.php');
           
       }
       

    }
    elseif(empty($id) and empty($entered_password)){
        header('location:../../docLogin.php');
        $_SESSION['error']='You must enter an ID and password';
    }
    elseif(empty($id)){
        header('location:../../docLogin.php');
        $_SESSION['error']='You must enter an ID';
    }
    elseif(empty($entered_password)){
        header('location:../../docLogin.php');
        $_SESSION['error']='You must enter an password';
    }

    else{
        header('location:../../docLogin.php');
        $_SESSION['error']='ID or Password is invalid';
    }
    


?>