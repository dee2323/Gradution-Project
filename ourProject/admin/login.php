<?php
session_start();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin</title>
    <style>
        td {
            padding: 20px;
            text-align: center;
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
            top: 80;
            left: 120;
            margin-right: 93px;
            margin-left: auto;

            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>


<body>

    <div class="container" style="padding:50px ; ">
        <h1 style="padding-bottom: 20px;"> Admin</h1>
        <form action="handel/login.php" method="POST">
            <div class="mb-3">

                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name='password' class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-primary">login</button>
        </form>

        <?php
        if (isset($_SESSION['error'])) {
        ?>
            <div class="alert alert-danger" role="alert" style="margin-top:90px">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php

        } ?>
    </div>
</body>

</html>