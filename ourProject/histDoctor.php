
<?php

require_once('handlers/patient/histD.php');
$information = getal('information');

function sel($table,$col,$where){
    
    global $conn;
$sel = "SELECT ($col) FROM `$table` WHERE $where";
$sel=mysqli_query($conn,$sel);
$dbpatdata=mysqli_fetch_assoc($sel);
return $dbpatdata['name'];


}
foreach ($information as $index => $infoo) {}
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
</head>
<!-- هذا كود ال style انسخه كل ما تحول ل 
php -->
<style>
    body {
        height: auto;
        /* display: flex;
  justify-content: top;
  align-items: center; */
        padding: 0px;
        background: white;
        position: relative;

    }

    .container {
        max-width: 1040px;
        width: 100%;
        background-color: #fff;
        padding: 25px 30px;
        border-radius: 5px;
        position: absolute;
        top: 35;
        left: 307;
        margin-right: 93px;
        margin-left: auto;

        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
    }

    th,
    td {
        font-weight: 500;
        font-size: 11px;
        text-align: center;
    }

    td {
        padding: 15px;
    }

    thead tr th {
        color: hsl(204, 70%, 67%, .9);
    }

    h3 {
        position: relative;
    }

    h3.hLine::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -6px;
        height: 3px;
        width: 30px;
        border-radius: 5px;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .sidebare div {
        padding-left: 50px;
    }
</style>

<body>

<div class="sidebar">
        <div class="body-text ">


            <span class="title" style="font-size:21px;"><i class="fa-solid fa-user-doctor"></i>Dr. <?=$docdata['name']?></span>
        </div>

        <div class="first_item item">
            <i class="fa-solid fa-user-pen"></i>
            <a href="doctor_profile.php">Edit Profile</a>
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
    <div class="out" style="margin-right: 0px;">
        <div class="container">
        <?php 
         
    $pid=$infoo["patinet_id"];
    $patName=sel('patients',' patients.name'," patients.patinet_id=$pid");
    ?>
            <div class="title" style="display:inline-block;">All Information <span style="color:#71b7e6 ;"><?=$patName?></span></div>
            <a type="submit" class="btn btn-info float-end" href="show-patient.php" style="display:inline-block;margin-left:620px;">Back</a>
            <table class="table table-hover table-responsive">
                <thead>
                    <tr class="table-info">
                    <th scope="col">#</th>
                        <th scope="col">Chest Pain</th>
                        <th scope="col" style="width:120px">Blood Pressure</th>
                        <th scope="col">Cholestrol</th>
                        <th scope="col"style="width:100px">Blood Sugar</th>
                        <th scope="col">Rest Rcg</th>
                        <th scope="col"style="width:100px">Heart Rate</th>
                        <th scope="col"style="width:100px">ST Depression</th>
                        <th scope="col">Exercise</th>
                        <th scope="col">ST Slope</th>
                        <th scope="col"style="width:120px">Major Vessels</th>
                        <th scope="col">Thalassemia</th>
                        <th scope="col">Result</th> 
                        <!-- <th scope="col">Created At</th> -->

                    </tr>
                </thead>
                <tbody>
                <?php foreach ($information as $index => $info) : ?>

<tr>
    <th scope="row"><?php echo $index + 1 ?></th>
    <td style="width:100px"><?php
        if ($info['cp'] == 0) {
            echo "Typical Angina";
        } else if ($info['cp'] == 1) {
            echo "Atypical Angina";
        } else if ($info['cp'] == 2) {
            echo "Non-anginal Pain";
        } else if ($info['cp'] == 3) {
            echo "Asymptomatic";
        }
        ?></td>
<!-- age,sex,cp,trtbps,chol,fbs,restecg,thalachh,exng,oldpeak,slp,caa,thall -->

    <td><?php echo $info['trtbps'] ?></td>
    <td>
        <?php echo $info['chol'] ?>
    </td>
    <td><?php if ($info['fbs'] == 0) {
            echo "low";
        } else if ($info['fbs'] == 1) {
            echo "high";
        } ?></td>

    <td>
        <?php
        if ($info['restecg'] == 0) {
            echo "Normal";
        } else if ($info['restecg'] == 1) {
            echo "ST-T";
        } else if ($info['restecg'] == 2) {
            echo "definite left ventricular";
        } ?>

    </td>

    <td>
        <?php echo $info['thalachh'] ?>
    </td>

    <td>
        <?php echo $info['oldpeak'] ?>
    </td>


    <td>

        <?php
        if ($info['exng'] == 0) {
            echo "No";
        } else if ($info['exng'] == 1) {
            echo "Yes";
        } ?>
    </td>

    <td>
        <?php
        if ($info['slp'] == 0) {
            echo "Upsloping";
        } else if ($info['slp'] == 1) {
            echo "Flat";
        } else if ($info['slp'] == 2) {
            echo "Downsloping";
        }
        ?>
    </td>

    <td>
        <?php echo $info['caa']; ?>
    </td>

    <td>
        <?php
        if ($info['thall'] == 1) {
            //  قيم الارقام لازم مراجعه بس نعمل المودل 
            echo "Normal";
        } else if ($info['thall'] == 2) {
            echo "Fixed defect";
        } else if ($info['thall'] == 3) {
            echo "Reversable defect";
        }
        ?>
    </td>
    <td>
    <?php if($info['output']==0){
           ?><span style="background-color:639929;padding:4px;border-radius:4px;color:white"> <?php echo "Negative"; ?> </span>
    <?php } 
    else{?>
        <span style="background-color:cb3c3a;padding:4px 7px;border-radius:4px;color:white"> <?php echo "Positive";?> </span>
   <?php }
     ?>
    </td>
</tr>
<?php endforeach; ?>
                    
                </tbody>
                
            </table>
        </div>
        

    </div>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>

