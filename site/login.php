<?php
include_once("../include/header.php");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
/* Form container */
.form-container {
    max-width: 400px;
    margin: 80px auto;
    background: #fff;
    padding: 40px 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    font-family: Arial, sans-serif;
    text-align: center;
}

/* Form heading */
.form-container h1 {
    color: #CFAC0C;
    font-weight: bold;
    margin-bottom: 30px;
    text-decoration: underline;
}

/* Inputs */
.form-container input[type="email"],
.form-container input[type="password"] {
    width: 90%;
    padding: 12px;
    margin: 12px 0;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 16px;
}

/* Submit button */
.btn-login {
    width: 50%;
    padding: 12px;
    margin-top: 20px;
    background-color: #CFAC0C;
    color: #fff;
    font-weight: bold;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

.btn-login:hover {
    background-color: #b99808;
}

/* Register link */
#LRbtn {
    display: block;
    margin-top: 20px;
    color: #CFAC0C;
    font-weight: bold;
    text-decoration: none;
}

#LRbtn:hover {
    text-decoration: underline;
}

/* Error messages */
.LoginE {
    color: red;
    font-weight: bold;
    margin-top: 15px;
    font-size: 14px;
}

/* Mobile responsiveness */
@media (max-width: 576px) {
    .form-container {
        padding: 30px 20px;
    }

    .form-container input[type="email"],
    .form-container input[type="password"] {
        width: 100%;
    }

    .btn-login {
        width: 70%;
    }
}
</style>

<div class="container">
  <div class="form-container shadow">
    <form action="../backend/login_Backend.php" method="POST">
      <h1>Login</h1>

      <label class="form-label" for="email">Username</label>
      <input type="email" name="email" placeholder="Email" id="email" class="form-control" required>

      <label class="form-label" for="password">Password</label>
      <input type="password" name="password" placeholder="Password" id="password" class="form-control" required>

      <button type="submit" class="btn-login btn" name="login">Login</button>

      <a id="LRbtn" href="Register.php">Please click here to register.</a>

      <?php
      if(isset($_GET['error'])){
          switch($_GET['error']){
              case "logUsernameError":
                  echo '<div class="LoginE">! Username is empty</div>';
                  break;
              case "logPasswordError":
                  echo '<div class="LoginE">! Password is empty</div>';
                  break;
              case "Invalid":
                  echo '<div class="LoginE">! Invalid Username or Password</div>';
                  break;
              case "Invalid2":
                  echo '<div class="LoginE">! You are a Supplier. Need admin approval</div>';
                  break;
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
