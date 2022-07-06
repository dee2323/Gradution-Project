    <?php
    require_once('connect.php');
    session_start();
    include('selpat.php');
    if(isset($_SESSION['name'])){
        $name=$_SESSION['name'];
        
        $patdata=getByName('patients',$name);
        $id=$patdata['patinet_id'];
        
    }
    if(isset($_POST['addContact'])){

        global $conn;
        $name=$_POST['fullname'];
        $phone=$_POST['phone'];
        $addcont="INSERT INTO `emergency_contact`(`name`, phone,`patient_id`) VALUES ('$name','$phone','$id')";
        if(mysqli_query($conn,$addcont)){
            header("location:../../addContact.php");
            $_SESSION['added']="Added successfully";
        }
        else{
            header("location:../../addContact.php");
            $_SESSION['error']="duplicated phone number ,please enter another one";
        }
        }
        if(isset($_POST['selectContact'])){

            global $conn;
            $conid=$_POST['cont'];
            
            $selcont="SELECT phone FROM `emergency_contact` WHERE emergency_contact.contact_id=$conid";
            $selcont=mysqli_query($conn,$selcont);
            $selcont=mysqli_fetch_assoc($selcont);
            $_SESSION['phone']=$selcont['phone'];
            $_SESSION['cname']=$selcont['name'];
            header("location:../../addContact.php");
                
            
            }


    ?>