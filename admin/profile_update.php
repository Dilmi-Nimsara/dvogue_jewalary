<?php
include_once("../admin/index.php");
include_once("../include/connection.php");

$userid = $_SESSION['userid'];
$query = "SELECT * FROM users WHERE userid='$userid'";
$result = mysqli_query($con, $query);
if($result){
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Profile - Vogue Jewelry</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #FFF1D1;
        margin: 0;
        padding: 0;
    }
    .form-container {
        max-width: 500px;
        width: 90%;
        background: #fff;
        margin: 50px auto;
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    }
    .form-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #DEB927;
        font-size: 28px;
    }
    .profile-img {
        width: 120px;
        height: 120px;
        margin: 0 auto 20px auto;
        border-radius: 50%;
        overflow: hidden;
        border: 3px solid #DEB927;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }
    .profile-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .form-container input[type="text"],
    .form-container input[type="email"],
    .form-container input[type="password"],
    .form-container input[type="file"] {
        width: 100%;
        padding: 12px 15px;
        margin: 10px 0;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 16px;
        transition: 0.3s;
        box-sizing: border-box;
    }
    .form-container input[type="text"]:focus,
    .form-container input[type="email"]:focus,
    .form-container input[type="password"]:focus,
    .form-container input[type="file"]:focus {
        border-color: #DEB927;
        outline: none;
        box-shadow: 0 0 5px rgba(222,185,39,0.5);
    }
    .form-container input[type="submit"] {
        width: 100%;
        padding: 12px;
        margin-top: 20px;
        background-color: #DEB927;
        border: none;
        border-radius: 10px;
        color: white;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }
    .form-container input[type="submit"]:hover {
        background-color: #c89e1f;
    }
    .LoginE {
        color: red;
        margin-top: 10px;
        text-align: center;
        font-weight: bold;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .form-container {
            padding: 30px 20px;
        }
        .form-container h2 {
            font-size: 24px;
        }
        .profile-img {
            width: 100px;
            height: 100px;
        }
    }
    @media (max-width: 480px) {
        .form-container {
            padding: 20px 15px;
        }
        .form-container h2 {
            font-size: 22px;
        }
        .profile-img {
            width: 80px;
            height: 80px;
        }
        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"],
        .form-container input[type="file"] {
            font-size: 14px;
            padding: 10px 12px;
        }
        .form-container input[type="submit"] {
            font-size: 16px;
            padding: 10px;
        }
    }
</style>
</head>
<body>

<div class="form-container">
    <h2>Update Profile</h2>

    <?php
        if($row['image']==''){
            echo '<div class="profile-img"><img src="../images/logos.jpg" alt="Profile"></div>';
        } else {
            echo '<div class="profile-img"><img src="../images/'.$row['image'].'" alt="Profile"></div>';
        }
    ?>

    <form action="updateback.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" value="<?php echo $row['name'] ?>" placeholder="Name">
        <input type="text" name="email" value="<?php echo $row['email'] ?>" placeholder="Email">
        <input type="text" name="type" value="<?php echo $row['type'] ?>" placeholder="Type" readonly>
        <input type="file" name="Updateimage">
        
        <input type="hidden" name="oldpassword" value="<?php echo $row['password'] ?>">
        <input type="password" name="oldPasswordEnter" placeholder="Old Password">
        <input type="password" name="newpassword" placeholder="New Password">
        <input type="password" name="comfirmpassword" placeholder="Confirm New Password">
        
        <input type="submit" name="update" value="Update">
        
        <?php
        if(isset($_GET['error'])){
            if($_GET['error']=="userExit"){
                echo '<div class="LoginE">!This User already exists</div>';
            } else if($_GET['error']=="username"){
                echo '<div class="LoginE">!Username is empty</div>';       
            }
        }
        ?>
    </form>
</div>

<?php include_once("../include/footer.php"); ?>

</body>
</html>
