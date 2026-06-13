<?php
include_once("../include/connection.php");
session_start();

if(!isset($_SESSION['userid'])){
    header("Location: ../site/login.php");
    exit();
}

$userid1=$_SESSION['userid'];

// ✅ Check approval
$query = "SELECT approve FROM businessregistration WHERE userid='$userid1' LIMIT 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

if(!$row || $row['approve'] != 1){
    header("Location: ../site/addItem.php?error=notApproved");
    exit();
}

if(isset($_POST["register"])){
    $PID="P".random_int(0,100000);
    $Pname=$_POST['Pname'];
    $Pdesc=$_POST['Pdesc'];
    $type=$_POST['type']; 
    $qty=$_POST['qty'];
    $Unitprice=$_POST['Unitprice'];
    $date=$_POST['date'];
    $image=$_FILES['image']['name'];
    $tem_name=$_FILES['image']['tmp_name'];
    $size=$_FILES['image']['size'];
    $folder="../images/";

    if( $Pname==''){
        header("Location:../site/addItem.php?error=Pname"); exit();
    }
    if( $Pdesc==''){
        header("Location:../site/addItem.php?error=Pdesc"); exit();
    }
    if( $type==''){
        header("Location:../site/addItem.php?error=type"); exit();
    }
    if( $qty==''){
        header("Location:../site/addItem.php?error=qty"); exit();
    }
    if( $Unitprice==''){
        header("Location:../site/addItem.php?error=Unitprice"); exit();
    }
    if( $date==''){
        header("Location:../site/addItem.php?error=date"); exit();
    }
    if( $size>1000000){
        header("Location:../site/addItem.php?error=large"); exit();
    }

    $query2="INSERT INTO production(PID,userid,Pname,Pdesc,type,qty,Unitprice,date,image) 
             VALUES('$PID','$userid1','$Pname','$Pdesc','$type','$qty','$Unitprice','$date','$image')";
    $result2=mysqli_query($con,$query2);

    if($result2){
        move_uploaded_file($tem_name,$folder.$image);
        header("Location:../site/addItem.php?error=loginError2");
    }
}
?>
