<?php
    session_start();
    include_once("../include/connection.php");
    
    if(isset($_POST['update'])){
         $userid=$_SESSION['userid'];

        
        $name=$_POST['name'];
        $email=$_POST['email'];
        $type=$_POST['type'];

        $Updateimage=$_FILES['Updateimage']['name'];
        $tempName=$_FILES['Updateimage']['tmp_name'];
        $folder="../images/";

        $oldpassword=$_POST['oldpassword'];
        $oldPasswordEnter=md5($_POST['oldPasswordEnter']);
        $newpassword=md5($_POST['newpassword']);
        $comfirmpassword=md5($_POST['comfirmpassword']);

        $query3="SELECT * FROM users where email='$email' AND userid != '$userid'";
        $result3=mysqli_query($con, $query3);
         if( mysqli_num_rows($result3)>0){
            header("Location:profile_update.php?error=userExit");
            exit();
         }else{
            $query1="UPDATE users set name='$name',email='$email',type='$type' where userid='$userid'";
            $result=mysqli_query($con,$query1);
            if($result){
            //change SESSION
            $_SESSION['name']=$name;
            $_SESSION['email']=$email;
            $_SESSION['type']=$type; 
            header("Location:profile_update.php");
            
        }
        }

        //update basic details
        $query1="UPDATE users set name='$name',email='$email',type='$type' where userid='$userid'";
        $result=mysqli_query($con,$query1);

        

        //update password
        if(!empty($oldPasswordEnter) || !empty($newpassword) || !empty($comfirmpassword)){
            if($oldpassword==$oldPasswordEnter){
                if($newpassword==$comfirmpassword){
                    $query2="UPDATE users set password='$newpassword' where userid='$userid'";
                    $result=mysqli_query($con,$query2);

                     header("Location:profile_update.php");
                }
            }
        }
         //update image
        if(!empty($Updateimage)){
            $query3="UPDATE users set image='$Updateimage' where userid='$userid' ";
             $result=mysqli_query($con,$query3);
            move_uploaded_file($tempName,$folder.$Updateimage);
            //change SESSION
             $_SESSION['image']=$Updateimage;

              header("Location:profile_update.php");

        }
    }

?>