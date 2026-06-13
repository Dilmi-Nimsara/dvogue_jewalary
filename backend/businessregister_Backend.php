<?php
include_once("../include/connection.php");
session_start();
$userid1=$_SESSION['userid'];
$name=$_SESSION['name'];
?>


<?php
    if(isset($_POST["register"])){
        
        $Bname=$_POST['Bname'];
        $Bemail=$_POST['Bemail'];
        $Bdate=$_POST['Bdate'];
        $Bregid=$_POST['Bregid'];
        $Bfile=$_FILES['Bfile']['name'];
        $tem_name=$_FILES['Bfile']['tmp_name'];
        $size=$_FILES['Bfile']['size'];
        $folder="../images/";
        $Blogo=$_FILES['Blogo']['name'];
        $tem_name=$_FILES['Blogo']['tmp_name'];
        $size=$_FILES['Blogo']['size'];
        $folder="../images/";

    $query="SELECT * FROM businessregistration where Bemail='$Bemail'";
        $result=mysqli_query($con, $query);

        if( $Bname==''){
            header("Location:../site/businessRegistration.php?error=Bname");
            exit();
        }
         if( $Bemail==''){
            header("Location:../site/businessRegistration.php?error=Bemail");
            exit();
        }
        if( $Bdate==''){
            header("Location:../site/businessRegistration.php?error=Bdate");
             exit();
        }
        if( $Bregid==''){
            header("Location:../site/businessRegistration.php?error=Bregid");
             exit();
        }
        // if( $address==''){
        //     header("Location:../site/businessRegistration.php?error=address");
        //      exit();
        // }
        // if( $contact==''){
        //     header("Location:../site/businessRegistration.php?error=contact");
        //      exit();
        // }
        if( $size>1000000){
            header("Location:../site/businessRegistration.php?error=large");
             exit();
        }if( mysqli_num_rows($result)>0){
            header("Location:../site/businessRegistration.php?error=userExit");
             exit();
        }
        
            $query2="INSERT  INTO businessregistration(userid,Bname,Bemail,Bdate,Bregid,Bfile,Blogo) VALUES('$userid1','$Bname','$Bemail','$Bdate','$Bregid','$Bfile','$Blogo');";
            $result2=mysqli_query($con,$query2);
            if($result2){
                move_uploaded_file($tem_name,$folder.$Blogo);
                header("Location:../site/businessRegistration.php?error=loginError2");
            }
        

    }


?>    