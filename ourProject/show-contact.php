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
        td ,tr {
            padding: 20px;
            text-align: center;
        }

        thead tr th {
            color: hsl(204, 70%, 67%, .9);
            text-align:center;
            
        }

        h3 {
            position: relative;
        }

        h3.hLine::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -4px;
            height: 3px;
            width: 30px;
            border-radius: 5px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        body {
            height: auto;
            /* display: flex;
  justify-content: top;
  align-items: center; */
            padding: 0px;
            background: white;
            position: relative;

        }

        .sidebare div {
            padding-left: 50px;
        }

        .container {
            max-width: 1010px;
            width: 100%;
            background-color: #fff;
            padding: 25px 30px;
            border-radius: 5px;
            position: absolute;
            top: 35;
            left: 315;
            margin-right: 93px;
            margin-left: auto;

            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<!-- ضايل اعمل انه انحذف المرضى ب alert 
position للفورم  -->

<body>
<div class="sidebar" style="width: 290px;">


        <div class="body-text">
            <span class="title" style="font-size:18px"><i class="fa-solid fa-hospital-user"></i><?=$patdata['name']?></span>
        </div>
        <div class="first_item item">
            <i class="fa-solid fa-house"></i><a href="patientHome.php">Home</a>
        </div>
        <div class="item">
            <i class="fa-solid fa-user-pen"></i> <a href="patient_profile.php">Edit Profile</a>
        </div>
        <div class="item">
            <i class="fa-solid fa-vials"></i><a href="attackPredictionTest.php">Test Yourself</a>
        </div>
        <div class="item">
            <i class="fa-solid fa-file-waveform"></i><a href="show-history.php">Show History</a>
        </div>
        <div class="item">
            <i class="fa-solid fa-address-book"></i><a href="addContact.php">Add Contact</a>
        </div>

        <div class="item">
        <i class="fa-solid fa-address-card"></i><a href="show-contact.php">Show Contact</a></div>  

        <div class="item">
            <i class="fa-solid fa-right-from-bracket"></i> <a onclick="return  confirm('Are you sure you want to logout?')" href="handlers/patient/logoutpat.php">Logout</a>
        </div>

    </div>

    <div class="out" style="margin-right: 80px;">
        <div class="container">
        <?php if(isset($_SESSION['action'])){
                        ?>
                    <div class="alert alert-success" role="alert">
                     <?=$_SESSION['action']?>
            
                    </div>
                    <?php unset($_SESSION['action']);}?>
            <div class="title">Contacts</div>

            <table class="table table-hover">
                <thead>
                    <tr class="table-info">
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">phone</th>
                        <th scope="col">call</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $index => $contact) : ?>
                  
                        <tr>
                            <td scope="row"><?php echo $index + 1 ?></td>
                            <td><?php echo $contact['name'] ?></td>
                            <td><?php 
                            echo $contact['phone'] ?></td>
                             <td><a href="tel:+$contact['phone']"><i class="fa-solid fa-phone"></i></a></td>
                            <td>
                            <a onclick="return  confirm('Are you sure you want to delete this contact?')" href="handlers/patient/deleteCon.php?id=<?php echo $contact['contact_id'] ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
           
        </div>


        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>