<?php
include("../admin/index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Vogue Jewelry</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #FFF1D1;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .form-container {
        max-width: 400px;
        width: 90%;
        margin: 80px auto;
        background: #fff;
        padding: 40px 30px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        box-sizing: border-box;
    }
    .form-container h1 {
        text-align: center;
        color: #CFAC0C;
        font-weight: bold;
        margin-bottom: 30px;
        text-decoration: underline;
        font-size: 28px;
    }
    .form-control {
        border-radius: 10px;
        padding: 12px;
        font-size: 16px;
        transition: 0.3s;
    }
    .form-control:focus {
        border-color: #CFAC0C;
        box-shadow: 0 0 5px rgba(207,172,12,0.5);
        outline: none;
    }
    .btn-warning {
        width: 100%;
        padding: 12px;
        font-weight: bold;
        font-size: 18px;
        border-radius: 10px;
        transition: 0.3s;
    }
    .btn-warning:hover {
        background-color: #b89108;
        color: #fff;
    }
    #LRbtn {
        display: block;
        text-align: center;
        margin-top: 15px;
        color: #CFAC0C;
        font-weight: bold;
        text-decoration: none;
        transition: 0.3s;
    }
    #LRbtn:hover {
        color: #b89108;
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
            margin: 60px auto;
            padding: 30px 20px;
        }
        .form-container h1 {
            font-size: 24px;
        }
        .btn-warning {
            font-size: 16px;
            padding: 10px;
        }
    }

    @media (max-width: 480px) {
        .form-container {
            margin: 40px auto;
            padding: 20px 15px;
        }
        .form-container h1 {
            font-size: 22px;
        }
        .btn-warning {
            font-size: 15px;
            padding: 10px;
        }
        #LRbtn {
            font-size: 14px;
        }
        .form-control {
            font-size: 14px;
            padding: 10px;
        }
    }
</style>
</head>
<body>

<div class="form-container">
    <form class="logForm" action="loginbackend.php" method="POST">
        <h1>Login</h1>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password">
        </div>

        <button type="submit" class="btn btn-warning" value="Login" name="login">Login</button>

        <a id="LRbtn" href="Register.php">Please click here to register.</a>

        <?php
        if(isset($_GET['error'])){
            if($_GET['error']=="logUsernameError"){
                echo '<div class="LoginE">!Username is empty</div>';
            } else if($_GET['error']=="logPasswordError"){
                echo '<div class="LoginE">!Password is empty</div>';
            } else if($_GET['error']=="Invalid"){
                echo '<div class="LoginE">!Invalid Username or Password</div>';
            }
        }
        ?>
    </form>
</div>

<?php
include_once("../include/footer.php");
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
