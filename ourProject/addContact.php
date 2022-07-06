<?php
session_start();
require_once('handlers/patient/selcon.php');
$contacts = getC('emergency_contact');
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
    <style>
        form .user-details .input-box{
            margin-bottom: 15px;
            width: calc(100% / 2 - 10px);
        }
        .ds{
            display: block;
            margin-top: 1px;
        }
    </style>
   <script>
          
            
          function check(form) {
            
              phone=form.phone.value;
              name=form.fullname.value;
              if(fullName(name)==false){
                  return false;
              }
              if(phonenumber(phone)==false){
                  return false;
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
          return  confirm('Are you sure you want to add contact?');
          }  
      </script>
     
</head>


<body>


    <div class="sidebar">
        <div class="body-text">
            <span class="title" style="font-size:18px"><i class="fa-solid fa-hospital-user"></i><?=$patdata['name']?></span>
        </div>
        <div class="first_item item">
            <i class="fa-solid fa-house"></i><a href="patientHome.php">Home </a>
        </div>
        <div class="item">
            <i class="fa-solid fa-user-pen"></i> <a href="patient_profile.php">Edit Profile</a></div>
        <div class="item">
            <i class="fa-solid fa-vials"></i><a href="attackPredictionTest.php">Test Yourself</a></div>
        <div class="item">
            <i class="fa-solid fa-file-waveform"></i><a href="show-history.php">Show History</a></div>
        <div class="item">
            <i class="fa-solid fa-address-book"></i><a href="addContact.php">Add Contact</a></div>
            <div class="item">
        <i class="fa-solid fa-address-card"></i><a href="show-contact.php">Show Contact</a></div>      

        <div class="item">
            <i class="fa-solid fa-right-from-bracket"></i> <a onclick="return  confirm('Are you sure you want to logout?')" href="handlers/patient/logoutpat.php">Logout</a></div>
    </div>


    <div class="body-text">
        <!-- body content -->
    </div>
    <div class="out">
        <div class="container" >
            <div class="title" style="padding-bottom: 20px;"><i class="fa-solid fa-phone"></i>Add Contact </div>
            <div class="content">
                <?php
                if(isset($_SESSION['error'])){
                    ?>
                <div class="alert alert-danger"  role="alert">
                <?=$_SESSION['error']?>
                
                </div> 
                <?php unset($_SESSION['error']); 
                }
                if(isset($_SESSION['added'])){
                    ?>
                <div class="alert alert-success"  role="alert">
                <?=$_SESSION['added']?>
                
                </div> 
                <?php unset($_SESSION['added']); 
                }
               
                ?>
                
                <form autocomplete="off" action="handlers/patient/addcont.php" method="POST" onSubmit = "return check(this)">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text" placeholder="Enter name" name="fullname" required>
                        </div>


                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="text" placeholder="Enter number" name="phone" required>
                        </div>




                        <div class="input-box"></div>

                    </div>
                    <div class="button" style="margin-top: -10px">
                        <input type="submit" value="Add" name="addContact">
                    </div>
                </form>
                <hr>
                    <div class="title" style="padding-bottom: 20px;"><i class="fa-solid fa-phone"></i>Choose Contact </div>
            <div class="content">
                <form action="handlers/patient/addcont.php" method="POST">
                    <label for="slope"><span class="details ds" style="padding: 0px;margin-top:20px;">Choose your current contact </span>
            </label>
            <select class="form-control" id="cont" name="cont" required >
            <?php foreach ($contacts as $index => $contact) : ?>
                
                <option value="<?=$contact['contact_id']?>"><?php echo $contact['name'] ?></option>
                <?php endforeach; ?>
            </select>
            </div>
            
            
            <input type="submit"  name="selectContact"class="button btn btn-primary float-end" value="Select" style="margin-top: 10px">
                    

            </form>
                
            </div>
        </div>
        </div>

    </body>

</html>