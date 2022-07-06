    
    
    <?PHP 
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
    </head>
    <script>

        $(document).ready(function(){
            document.getElementById("myButton").click();
        });

    </script>
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
        max-width: 1050px;
        width: 100%;
        background-color: #fff;
        padding: 25px 30px;
        border-radius: 5px;
        position: absolute;
        top: 25;
        left: 307;
        margin-right: 93px;
        margin-left: auto;
        height: 578px;

        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
    }
    .button{
        padding: 0px;
    }
    div .myalt{
        width: 35%;
        margin: auto;
        height: 47px;
        padding-top:5px
        
    }
    .fine{
        color: green;
        margin-right: 0;
    }
    </style>

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
                <i class="fa-solid fa-vials"></i><a href="#">Test Yourself</a></div>
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
            <div class="container">

            <?php
       
        if (isset($_SESSION['noattack'])) {
        ?> 
        <div class="alert alert-info myalt" role="alert">
            <i class="fas fa-regular fa-seedling fine"></i>
            No need to worry everything is fine !
         </div> 
         <?php unset($_SESSION['noattack']);
        }?>
        <?php
        if (isset($_SESSION['attack'])) {
        ?> 
        
        <div class="alert alert-danger myalt" role="alert" style="width:100%;text-align:center">
        <i class="fas fa-phone fine" style="color: #cd4444;margin-right:3px;font-size:small"></i>Calling now ...
         <a href="tel:<?=$_SESSION['phone']?>" id="myButton"><?=$_SESSION['cname']?></a> 
        </div> 
         <?php unset($_SESSION['attack']);
        }?>
                <div class="title">Test Yourself</div>
                <div class="content">
                    <form action="heartattack.php" method="post">
                        <div class="user-details">
                            <div class="input-box">
                                <label for="cp"><span class="details">Chest Pain Type</span> </label>
                                <select id="cp" name="cp" required>
                                    <option disabled selected value> -- Select an Option -- </option>
                                    <option value="0">Typical Angina</option>
                                    <option value="1">Atypical Angina</option>
                                    <option value="2">Non-anginal Pain</option>
                                    <option value="3">Asymptomatic</option>
                                </select>
                            </div>
                            <div class="input-box">
                                <label for="trestbps"><span class="details">Resting Blood Pressure mmHg</span> </label>
                                <input type="number" class="form-control" id="trestbps" name="trestbps" required min=100 >
                            </div>
                            <div class="input-box">

                                <label for="chol"><span class="details">Serum Cholestoral in mg/dl</span></label>
                                <input type="number" class="form-control" id="chol" name="chol" required min=150>
                            </div>
                            <div class="input-box">
                                <label for="fbs"><span class="details">Fasting Blood Sugar> 120 mg/dl</span></label>
                                <select class="form-control" id="fbs" name="fbs" required>
                                    <option disabled selected value> -- Select an Option -- </option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="input-box">

                                <label for="restecg"><span class="details">Resting ECG Results</span> </label>
                                <select class="form-control" id="restecg" name="restecg" required>
                                    <option disabled selected value> -- Select an Option -- </option>
                                    <option value="0">Normal</option>
                                    <option value="1">Having ST-T wave abnormality </option>
                                    <option value="2"> Probable or definite left ventricular hypertrophy </option>
                                </select>
                            </div>
                            <div class="input-box">

                                <label for="thalach"><span class="details">Maximum Heart Rate</span></label>
                                <input type="number" class="form-control" id="thalach" name="thalach" required min=100>
                            </div>
                            <div class="input-box">

                                <label for="exang"> <span class="details">ST Depression Induced</span></label>
                                <input type="number"  class="form-control" id="oldpeak" name="oldpeak" required step="0.1" max=3 min=0 >
                            </div>
                            <div class="input-box">

                                <label for="exang"> <span class="details">Exercise Induced Angina</span> </label>
                                <select class="form-control" id="exang" name="exang" required >
                                    <option disabled selected value> -- Select an Option -- </option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="input-box">

                                <label for="slope"><span class="details">Slope of the Peak Exercise ST Segment</span>
                                </label>
                                <select class="form-control" id="slope" name="slope" required>
                                    <option disabled selected value> -- Select an Option -- </option>
                                    <option value="0">Upsloping</option>
                                    <option value="1">Flat</option>
                                    <option value="2">Downsloping</option>
                                </select>
                            </div>
                            <div class="input-box">

                                <label for="ca"><span class="details">Number of Vessels Colored by
                                        Flourosopy</span></label>
                                <select class="form-control" id="ca" name="ca" required>
                                    <option disabled selected value> -- Select an Option -- </option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="input-box">
                                <label for="thal"><span class="details">Thalassemia</span></label>
                                <select class="form-control" id="thal" name="thal" required>
                                    <option disabled selected value> -- Select an Option -- </option>
                                    <option value="1">Normal</option>
                                    <option value="2">Fixed defect</option>
                                    <option value="3">Reversable defect</option>
                                </select>
                            </div>
                            <div class="input-box"></div>
                        </div>
                        <div class="button">
                            <input type="submit" value="Test" name="test">
                        </div>
                        <input type="hidden" name="id" value="">
                    </form>
                </div>
            </div>
            
            
        </div>
    </body>

    </html>