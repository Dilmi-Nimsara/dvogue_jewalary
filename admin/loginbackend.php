<?php
    session_start();
   include_once("../include/connection.php");

    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=md5($_POST['password']);

    if($email==''){
        header("Location:login.php?error=logUsernameError");
        exit();
    } else if($password==''){
        header("Location:login.php?error=logPasswordError");
        exit();
    }
    $query="SELECT * FROM users where password='$password' and (email='$email');";
    $result=mysqli_query($con, $query);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);

        $_SESSION['userid'] =  $row['userid'];
        $_SESSION['name'] =  $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['type'] =$row['type'];
        $_SESSION['image']= $row['image'];
        $_SESSION['approve']= $row['approve'];

        if($row["type"] == 'Admin'){
        header("Location:index.php");
        exit();
        
        }else {
           header("Location:login.php?error=Invalid");
           exit(); 
        }

        

    }
}
?>