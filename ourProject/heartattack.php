    <?php 
    session_start();
   $USER= $_SESSION['name'];
   
require_once('handlers/patient/selcon.php');

require_once('handlers/patient/connect.php');
$contacts = getC('emergency_contact');

function sel($table,$col,$where){
    
        global $conn;
    $sel = "SELECT ($col) FROM `$table` WHERE $where";
    $sel=mysqli_query($conn,$sel);
    $dbpatdata=mysqli_fetch_assoc($sel);
    return $dbpatdata['gender'];

}
function sel22($table,$col,$where){
    
    global $conn;
$sel = "SELECT ($col) FROM `$table` WHERE $where";
$sel=mysqli_query($conn,$sel);
$dbpatdata=mysqli_fetch_assoc($sel);
return $dbpatdata['patinet_id'];

}
function sel3($table,$col,$where){
    
    global $conn;
$sel = "SELECT ($col) FROM `$table` WHERE $where";
$sel=mysqli_query($conn,$sel);
$dbpatdata=mysqli_fetch_assoc($sel);
return $dbpatdata['birthdate'];

}

    function add($table,$cols,$values){
        global $conn;
    $ins = "insert into $table ($cols) values ($values)";
    if(mysqli_query($conn,$ins)){
    //  header("location:../../attackPredictionTest.php");
    //     $_SESSION['added']="Added successfully";
        
    }

    }
    function getAge($bod){
        $date = new DateTime($bod);
        $now = new DateTime();
        $interval = $now->diff($date);
        return $interval->y;
    }




    if(isset($_POST['test'])){
    $cp = $_POST['cp'];
    $trestbps = $_POST['trestbps'];
    $chol =$_POST['chol'];
    $fbs =$_POST['fbs'];
    $restecg =$_POST['restecg'];
    $thalach =$_POST['thalach'];
    $exang  =$_POST['exang'];
    $oldpeak =$_POST['oldpeak'];
    $slope =$_POST['slope'];
    $ca =$_POST['ca'];
    $thal=$_POST['thal'];
    $patId=sel22('patients','patinet_id',"patients.username='$USER'");
    $gender=sel('patients','gender',"patients.username='$USER'");
    $birthdate=sel3('patients','birthdate',"patients.username='$USER'");
    echo $birthdate;
    $age=getAge($birthdate);
   $_SESSION['cname']=101;

    add("information","cp,trtbps,chol,fbs,restecg,thalachh,exng,oldpeak,slp,caa,thall,patinet_id",
    "'$cp',' $trestbps',' $chol','$fbs','$restecg','$thalach', '$exang','$oldpeak','$slope','$ca',$thal,'$patId'");

    // `cp`, `trtbps`, `chol`, `fbs`, `restecg`, `thalachh`, `exng`, `oldpeak`, `slp`, `caa`, `thall`

    }
   // $myArray=array(44,1,2,130,233,0,1,179,1,0.4,2,0,2);//مصاب
    $myArray=array(44,1,$cp,$trestbps, $chol ,$fbs,$restecg,$thalach,$exang,$oldpeak,$slope,$ca,$thal);


    // $myArray=array(65,1,0,110,248,0,0,158,0,0.6,2,2,1);//سليم
    // 


        $string2=array('age','sex','cp','trtbps','chol','fbs','restecg','thalachh','exng','oldpeak','slp','caa','thall',"\n");
        $count=0;
        $string="";
        foreach($myArray as $num)
            {
                    if($count!=12)
                    $string=$string.strval($num).",";
                    else {
                        $string=$string.strval($num);
                    }
                    $count++;
            }
            $c=0;
            $string3="";
            $len=sizeof($string2);
            foreach($string2 as $s)
            {
            if($c==$len-1 ||$c==$len-2)
            $string3=$string3.$s;
            else {
                $string3=$string3.$s.",";
            }
            $c++;
            }
            $abc = fopen('heart1.csv',"w");
            fwrite($abc,$string3);
            fwrite($abc,$string);

            echo '<pre>';
            print_r($_POST);
            echo '</pre>';
            
            $out=escapeshellcmd(exec('test.py  2>&1', $output, $ret_code));


            $sql="SELECT max(information.info_id) FROM information WHERE information.patinet_id=$patId";
            $sql=mysqli_query($conn,$sql);
            $sql=mysqli_fetch_assoc($sql);
            $infoId= $sql['max(information.info_id)'];
            $s="UPDATE `information` SET `output`='$out' WHERE information.info_id=$infoId";
            
            if(mysqli_query($conn,$s))
                echo "ddeema done!";
                echo $out;
                
                header("location:attackPredictionTest.php");
#يفحص القيمة ليحدد الاجراء الذي يجب ان يتخذه
                if($out==0){//no disease
                    
                    $_SESSION['noattack']=true;
                    header("location:attackPredictionTest.php");
                }
                else{
                    $_SESSION['attack']=true;
                    header("location:attackPredictionTest.php");
                }
    ?>

