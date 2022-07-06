<?php
session_start();
include('handlers/patient/selpat.php');
if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
    
    $patdata=getByName('patients',$name);

    
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Heart Attack</title>
    <link rel="shortcut icon" href="assets/image/img1.png">
    <script>
          
            
            function check(form) {
                password1 = form.password1.value;
                password2 = form.password2.value;
                phone=form.phone.value;
                name=form.name.value;
                if(fullName(name)==false){
                    return false;
                }
                if(phonenumber(phone)==false){
                    return false;
                }
                if (password1 == '')
                    alert ("Please enter Password");
                      
               
                else if (password2 == '')
                    alert ("Please enter confirm password");
                      
                  
                else if (password1 != password2) {
                    alert ("\nPassword did not match: Please try again...")
                    return false;
                }
  
                
                else{
                    if(CheckPa(password1)==true){
                        var result = confirm("Are you sure to edit?");
                     if(result){
                        return true;
                    }
                    else return false;   
                    }
                    else 
                    return false
                   
                }
            }
  
            function CheckPa(password) 
            { 
               var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
               if(password.match(passw)) 
               { 

                   return true;
                }
               else
                { 
                 alert('invalid password!!')
                 return false;
                }
            }
            
            function phonenumber(phone)
            {
                 var phoneno = /^\d{10}$/;
                if(phone.match(phoneno))
                   {
                     return true;
                }
                 else
                  {
                 alert("invalid phone number!");
                 return false;
                  }
            }
            function fullName(name){
                var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
               
                if(!regName.test(name)){
                    alert('Please enter your full name (first & last name).');
                    return false;
                }else{
                   return true;
                }
            }
            
        </script>
</head>

<body>
<div class="sidebar">
        <div class="body-text">
            <span class="title" style="font-size:18px"><i class="fa-solid fa-hospital-user"></i><?=$patdata['name']?></span>
        </div>
        <div class="first_item item">
            <i class="fa-solid fa-house"></i>
            <a href="patientHome.php">Home</a>
        </div>
        <div class="item">
            <i class="fa-solid fa-user-pen"></i>
            <a href="#">Edit Profile</a>
        </div>
        <div class="item">
            <i class="fa-solid fa-vials"></i>
            <a href="attackPredictionTest.php">Test Yourself</a>
        </div>
        <div class="item">
            <i class="fa-solid fa-file-waveform"></i> <a href="show-history.php">Show History</a>
        </div>
        <div class="item">
            <i class="fa-solid fa-address-book"></i><a href="addContact.php">Add Contact</a></div>

            <div class="item">
        <i class="fa-solid fa-address-card"></i><a href="show-contact.php">Show Contact</a></div>   

        <div class="item">
            <i class="fa-solid fa-right-from-bracket"></i><a onclick="return  confirm('Are you sure you want to logout?')" href="handlers/patient/logoutpat.php">Logout</a>
        </div>
    </div>
        <div class="out">
            <div class="container">
                <div class="title">Patient Profile</div>
                <div class="content">
                <?php if(isset($_SESSION['notedit'])){
                        ?>
                    <div class="alert alert-danger " role="alert">
                     <?=$_SESSION['notedit']?>
            
                    </div>
                    <?php unset($_SESSION['notedit']);}?>

                    <?php if(isset($_SESSION['edit'])){
                        ?>
                    <div class="alert alert-success" role="alert">
                     <?=$_SESSION['edit']?>
            
                    </div>
                    <?php unset($_SESSION['edit']);}?>
                    <form autocomplete="off" action="handlers/patient/editpat.php"method="post"onSubmit = "return check(this)">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Full Name</span>
                                <input type="text" name="name" value="<?=$patdata['name']?>" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Username</span>
                                <input type="text" name="username"value="<?=$patdata['username']?>" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Address</span>
                                <input type="text" name="address"value="<?=$patdata['address']?>" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Phone Number</span>
                                <input type="text" name="phone"value="<?=$patdata['phone']?>" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Password</span>
                                <input type="password" name="password1"placeholder="Enter your new password" required>
                                <p style="color:red;font-size:10px;">** Password must have 6 to 20 characters contain [numeric digit,uppercase and  lowercase letter]
                            </p>
                            </div>
                            <div class="input-box">
                                <span class="details">Confirm Password</span>
                                <input type="password" name="password2" placeholder="Confirm your password" required>
                                
                            </div>
                            
                        </div>
                        
                        <div class="button">
                            <input type="submit" value="Edit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>