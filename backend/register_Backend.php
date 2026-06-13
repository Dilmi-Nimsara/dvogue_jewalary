<?php
include_once("../include/connection.php");
session_start();
?>


<?php
    if(isset($_POST["register"])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $type=$_POST['type']; 
        if($type== 'Client'){
            $userid="C".random_int(0,10000);
        }else if($type== 'Supplyer'){
            $userid="S".random_int(0,10000);
        }
        $password=md5($_POST['password']);
        $confirm=md5($_POST['confirm']);

        $image=$_FILES['image']['name'];
        $tem_name=$_FILES['image']['tmp_name'];
        $size=$_FILES['image']['size'];
        $folder="../images/";

$query="SELECT * FROM users where email='$email'";
        $result=mysqli_query($con, $query);

        if( $name==''){
            header("Location:../site/Register.php?error=name");
            exit();
        }
         if( $email==''){
            header("Location:../site/Register.php?error=email");
            exit();
        }
        if( $type==''){
            header("Location:../site/Register.php?error=type");
             exit();
        }
        if( $password!=$confirm){
            header("Location:../site/Register.php?error=notMatch");
             exit();
        }
        if( $size>1000000){
            header("Location:../site/Register.php?error=large");
             exit();
        }if( mysqli_num_rows($result)>0){
            header("Location:../site/Register.php?error=userExit");
             exit();
        }
        
            $query2="INSERT  INTO users(userid,name,email,password,image,type) VALUES('$userid','$name','$email','$password','$image','$type');";
            $result2=mysqli_query($con,$query2);
            if($result2){
                move_uploaded_file($tem_name,$folder.$image);
                header("Location:../site/Register.php?error=loginError2");
            }
            header("Location:../site/login.php");
        

    }


?>    