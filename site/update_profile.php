<?php
include_once("../include/header.php");
include_once("../include/connection.php");

$userid = $_SESSION['userid'];      
$query = "SELECT * FROM users WHERE userid='$userid'";
$result = mysqli_query($con, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
/* Profile card */
.form-container {
    max-width: 500px;
    margin: 50px auto;
    background: #fff;
    padding: 40px 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    text-align: center;
    font-family: Arial, sans-serif;
}

.profile-image {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 20px;
    box-shadow: 0 0 10px 2px rgba(255, 215, 0, 0.3);
}

.profile-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.form-control {
    margin-bottom: 15px;
    border-radius: 8px;
}

input[type="submit"] {
    background-color: #DEB927;
    color: #fff;
    font-weight: bold;
    border-radius: 10px;
    transition: 0.3s;
}

input[type="submit"]:hover {
    background-color: #c49e1f;
}

.LoginE {
    color: red;
    font-weight: bold;
    margin-top: 10px;
}

@media (max-width: 576px) {
    .form-container {
        padding: 30px 20px;
    }
}
</style>

<div class="container">
    <div class="form-container shadow-lg">
        <h2 class="text-center text-warning fw-bold mb-4 text-decoration-underline">Update Profile</h2>

        <form action="../backend/Update_Backend.php" method="POST" enctype="multipart/form-data">

            <div class="profile-image mb-3">
                <?php
                if($row['image']==''){
                    echo '<img src="../images/logos.jpg" alt="Profile">';
                } else {
                    echo '<img src="../images/'.$row['image'].'" alt="Profile">';
                }
                ?>
            </div>

            <input type="text" name="name" value="<?php echo $row['name']?>" class="form-control" placeholder="Full Name" required>
            <input type="email" name="email" value="<?php echo $row['email']?>" class="form-control" placeholder="Email" required>
            <input type="text" name="type" value="<?php echo $row['type']?>" class="form-control" readonly>
            <input type="file" name="Updateimage" class="form-control">

            <input type="hidden" name="oldpassword" value="<?php echo $row['password']?>">
            <input type="password" name="oldPasswordEnter" class="form-control" placeholder="Old Password">
            <input type="password" name="newpassword" class="form-control" placeholder="New Password">
            <input type="password" name="comfirmpassword" class="form-control" placeholder="Confirm New Password">

            <input type="submit" name="update" class="form-control btn fw-bold" value="Update">

            <?php
            if(isset($_GET['error'])){
                $msg = "";
                if($_GET['error'] == "userExit"){
                    $msg = "! This User already exists";
                } else if($_GET['error'] == "username"){
                    $msg = "! Username is empty";
                }
                if($msg != ""){
                    echo '<div class="LoginE">'.$msg.'</div>';
                }
            }
            ?>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<?php
include_once("../include/footer.php");
?>
