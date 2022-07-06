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

    <link rel="stylesheet" href="css/SInfo.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Heart Attack</title>
    <link rel="shortcut icon" href="assets/image/img1.png">
    <style>
        .sidebar .body-text,
        .title {
            color: white;
            margin-top: -27px;
            font-weight: bold;
            font-size: x-large;
            margin-bottom: 13px;}

            /* sidebare */
            .sidebar {
                height: 100%;
                width: 300px;
                /* position: absolute; */
                left: 0;
                top: 0;
                padding-top: 40px;
                background-color: hsl(195, 53%, 79%, 0.7);
                position: fixed;
            }

            .sidebar div {
                padding: 8px;
                font-size: 24px;
                display: block;
                position: relative;
                font-size: 20px;
                text-align: left;
                padding-left: 50px;
                padding-bottom: 18px;
                color: rgb(102, 100, 100);
            }

            .first_item {
                margin-top: 35px;
            }

            .sidebar .body-text {
                color: white;
                margin-top: -27px;
                font-weight: bold;
                font-size: x-large;
                margin-bottom: 13px;
            }

            .body-text::after {
                content: "";
                position: absolute;
                left: 0;
                bottom: 0;
                height: 3px;
                width: 100%;
                background: linear-gradient(-135deg, hsl(204, 70%, 67%, .7), hsl(283, 39%, 53%, 0.5));
            }

            .item:hover {
                background-color: rgba(255, 255, 255, 0.767);
                cursor: pointer;
                text-decoration: none;
                color: rgb(102, 100, 100);

            }

            .item a:link,
            .item a:visited,
            .item a:checked,
            .item a:hover {
                text-decoration: none;
                color: rgb(102, 100, 100);
            }

            /* end of sidebare */
            /* start icon */
            i {
                margin-right: 20px;
                color: hsl(204, 70%, 67%, .9);
                font-size: x-large;
            }

            /* end icon */

        
    </style>

</head>

<body>

    <div class="sidebar" style="width: 290px;">


        <div class="body-text">
            <span class="title" style="font-size:18px"><i class="fa-solid fa-hospital-user"></i><?=$patdata['name']?></span>
        </div>
        <div class="first_item item">
            <i class="fa-solid fa-house"></i><a href="#">Home</a>
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
    <div class="out">
        <h1>
            Heart Attack</h1>
        <div class="container">

            <div id="def">
                <h3 id="headDef">Overview</h3>
                <diV id="parDef">
                    <p>
                        A heart attack occurs when the blood flow to the heart is blocked. The blockage is
                        often the result of a buildup of fat, cholesterol and other substances that form
                        plaque in the arteries that supply the heart (coronary arteries).
                        Sometimes, the plaque can rupture and form a clot that blocks blood flow.
                        The interrupted blood flow damages or destroys all or part of the heart muscle.
                        A heart attack, also called a myocardial infarction, can be fatal, but treatment
                        has greatly improved over the years. <br>
                        <br>

                    </p>
                </diV>


                <div class="clr"></div>
            </div>
            <iframe width="860" height="400" src="https://www.youtube.com/embed/bw_Vv2WRG-A?autoplay=1">
            </iframe>
            <br>
            <br>
            <br>
            <div id="sym">
                <h3 id="headSym">Symptoms</h3>
                <span>Common signs and symptoms of a heart attack include:</span>
                <br>
                <br>
                <img src="assets/image/img21.png" id="img21">

                <div id="parSym">

                    <ul>
                        <li>Pressure, tightness, pain, or a squeezing or aching sensation in the chest or arms that
                            may spread to the neck, jaw, or back</li>
                        <li>Nausea, indigestion, heartburn, or abdominal pain</li>
                        <li>Shortness of breath</li>
                        <li>Cold sweat</li>
                        <li>Fatigue</li>
                        <li>Dizziness or sudden dizziness</li>
                    </ul>
                </div>

                <div class="clr"></div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <h3>Factors</h3>
            <p>
                <img src="assets/image/img24.png" id="img24">
            </p>
            <br>
            <br>
            <br>
            <br>
            <h3>Prevent Heart Attack</h3>
            <div id="parPro">
                <p>It's never too late to take precautions to prevent a heart attack
                    ,even if you've already had a heart attack. Here are some ways to avoid a heart attack.</p>
                <ul>
                    <li>pharmaceutical, Regularly taking medications reduces your chance of having a heart attack
                        later on and helps make your damaged heart more efficient.
                        Take the medications your doctor prescribes regularly, and ask them how many follow-up visits you need.</li>
                    <li>
                        Lifestyle factors, You know the bottom line: maintain a healthy weight and a heart-healthy diet, quit
                        smoking, exercise regularly, control stressors and diseases that might cause a heart attack,
                        such as high blood pressure, high cholesterol, or diabetes.
                    </li>
                </ul>
            </div>
            <div class="clr"></div>
            <p>
                <img src="assets/image/img23.png" id="img24">
            </p>
        </div>
    </div>


    </div>

</body>


</html>