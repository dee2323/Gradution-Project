<?php
session_start();
include('handlers/patient/selpat.php');
if(isset($_SESSION['id'])){
    $id=$_SESSION['id']; // id=1 now
    
    $docdata=getById('doctors',$id);
  
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
    <style>
    h3{
        color:white;
        background: linear-gradient(-135deg, hsl(204, 70%, 67%,.7), hsl(283, 39%, 53%,0.5)); ;
        text-align: center;
        font-weight: 300;
        border-radius: 25px;
        border: 2px solid 		#87CEFA;
        padding: 20px;
        width: 200px;
        height: 62px;
        margin: 20px auto;
        font-size: 18px;

    }
    </style>
   <script>
          
            
          function check(form) {
              password1 = form.password1D.value;
              password2 = form.password2D.value;
              phone=form.phoneD.value;
              name=form.fullnameD.value;
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
        <div class="body-text ">


            <span class="title" style="font-size:21px;"><i class="fa-solid fa-user-doctor"></i>Dr. <?=$docdata['name']?></span>
        </div>
       
        <div class=" first_item item">
            <i class="fa-solid fa-user-pen"></i>
            <a href="#">Edit Profile</a>
        </div>
        <div class="item">
            <i class="fa-solid fa-user-plus"></i>
            <a href="add-patient.php">Add Patient</a>
        </div>
        <div class="item">
            <i class="fa-solid fa-eye"></i>
            <a href="show-patient.php">Show Patient</a>
        </div>
        <!-- <div class="item">
            <i class="fa-solid fa-bed-pulse"></i>
            <a href="#">Notification</a>
        </div> -->
        <div class="item">
            <i class="fa-solid fa-right-from-bracket"></i>
            <a onclick="return  confirm('Are you sure you want to logout?')" href="handlers/patient/logoutdoc.php">Logout</a>
        </div>
    </div>
    <div class="out">
    <div class="container">

      <?php
    if(isset($_SESSION['id'])){ ?>
        <h3>
        <?php echo "Your ID : " .$_SESSION['id']; }?>  </h3>
    
        <div class="title">Doctor Profile</div>
        <div class="content">
        <?php if(isset($_SESSION['edit'])){
                        ?>
                    <div class="alert alert-success" role="alert">
                     <?=$_SESSION['edit']?>
            
                    </div>
                    <?php unset($_SESSION['edit']);}?>
            <form autocomplete="off" action="handlers/patient/editdoc.php" method="post" onSubmit = "return check(this)">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" value="<?=$docdata['name']?>" name="fullnameD" required>
                    </div>
                    <!-- <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" placeholder="Enter your username" name="usernameD" required>
                    </div> -->
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" value="<?=$docdata['email']?>" name="emailD" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" value="<?=$docdata['phone']?>" name="phoneD" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" placeholder="Enter new password" name="password1D" required>
                        <p style="color:red;font-size:10px;">** Password must have 6 to 20 characters contain [numeric digit,uppercase and  lowercase letter]
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" placeholder="Confirm new password" name="password2D" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <input type="text" value="<?=$docdata['address']?>" name="addressD" required>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" value="Edit">
                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>