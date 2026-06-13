<?php
    session_start();
   include_once("../include/connection.php");

    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=md5($_POST['password']);

    
    $query="SELECT * FROM users where password='$password' and (email='$email');";
   $result=mysqli_query($con, $query);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){

            if($email==''){
        header("Location:../site/login.php?error=logUsernameError");
        exit();
    } else if($password==''){
        header("Location:../site/login.php?error=logPasswordError");
        exit();
    } else if($row["type"] == 'Supplyer' && $row['approve'] ==0){
        header("Location:../site/login.php?error=Invalid2");
        exit();      
    }else{
        $_SESSION['userid'] =  $row['userid'];
        $_SESSION['name'] =  $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['type'] =$row['type'];
        $_SESSION['image']= $row['image'];
        $_SESSION['approve']= $row['approve'];
         header("Location:../site/index.php");
    }
}
    }else{
        header("Location:../site/login.php?error=Invalid");
        exit();
    }
}
?>