<?php
session_start();
include('handel/connect.php');

if (!$_SESSION['login']) {
    header('location:login.php');
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Admin</title>
    <script>

$(document).ready(function(){
    document.getElementById("myButton").click();
});

</script>
    <style>
        table ,td,th{
            text-align: center;
        }
        .container{
            position: absolute;
            top: 80;
            left: 120; 
        }
    </style>
     
</head>
<script>

$(document).ready(function(){
    document.getElementById("myBut").click();
});

</script>

<body>
    <?php
    $query = 'select * from doctors where status=0';
    $query = mysqli_query($conn, $query);
    $allUsers = mysqli_fetch_all($query, MYSQLI_ASSOC);

    ?>
    <div class="container" style="padding:50px">
    <h1 style="padding-bottom: 20px;">Doctors</h1>
        <table class="table table-striped">
           
            <thead>
            
                    
                    
                <tr>
                    <th>index</th>
                    <th>name</th>
                    <th>email</th>
                    
                    <th>register at</th>
                    <th>accept</th>
                </tr>
                <?php
                
            if(isset($_SESSION['ready'])){ 
                
                ?>
 <a href="mailto:<?= $_SESSION['mailto']?>" id="myButton"></a>
                
                <div class="alert alert-success" role="alert" style="text-align:center">
                <?=$_SESSION['ready']?>
            </div><?php
            
                unset($_SESSION['ready']);
            }
            ?>
            </thead>
            <tbody>
                <?php foreach ($allUsers as $index => $user) { ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <?php $_SESSION['mailto']=$user['email'];?>
                        <td><?= date('j M Y', strtotime($user['created_at'])) ?></td>
                        <td>
                            
                        <a href="handel/active.php?id=<?=$user['doctor_id'] ?>" class="btn btn-warning">
                        active<i class="fas fa-envelope" style="color: white;padding-left:8px;font-size:17px"></i>
                        
                    </a>
                    
                   
                    

</td>
                    </tr>
                <?php } ?>


            </tbody>

        </table>
        <a type="submit" class="btn btn-primary float-end" href="handel/logout.php">logout</a>
        <?php
        if (isset($_SESSION['action'])) {
        ?>
            <div class="alert alert-danger" role="alert" style="margin-top:90px">
                <?php echo $_SESSION['action'];
                unset($_SESSION['action']); ?>
            </div>
        <?php

        } ?>
      
        


    </div>
</body>

</html>