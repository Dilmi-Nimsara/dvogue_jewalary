<?php
include_once("../include/header.php");
?>

<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light p-3">
  <div class="card shadow-lg p-4" style="max-width: 100%; width: 450px; border-radius: 20px;">

    <h2 class="text-center mb-4 text-warning fw-bold text-decoration-underline">
      Registration
    </h2>

    <form action="../backend/register_Backend.php" method="POST" enctype="multipart/form-data">

      <!-- Name -->
      <div class="mb-3">
        <label class="form-label fw-bold">Name*</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label class="form-label fw-bold">Email*</label>
        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
      </div>

      <!-- Type -->
      <div class="mb-3">
        <label class="form-label fw-bold">Type*</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="type" value="Client" required>
          <label class="form-check-label">Client</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="type" value="Supplier">
          <label class="form-check-label">Supplier</label>
        </div>
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label class="form-label fw-bold">Password*</label>
        <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
      </div>

      <!-- Confirm Password -->
      <div class="mb-3">
        <label class="form-label fw-bold">Confirm Password*</label>
        <input type="password" name="confirm" class="form-control" placeholder="Confirm Password" required>
      </div>

      <!-- Image -->
      <div class="mb-3">
        <label class="form-label fw-bold">Image*</label>
        <input type="file" name="image" class="form-control" accept="image/jpg,image/jpeg,image/png" required>
      </div>

      <!-- Register Button -->
      <div class="d-grid mb-3">
        <button type="submit" class="btn btn-warning fw-bold text-white py-2" name="register">
          Register
        </button>
      </div>

      <!-- Login Link -->
      <p class="text-center mb-0">
        Already have an account? 
        <a href="login.php" class="fw-bold text-warning text-decoration-none">Login here</a>
      </p>

      <!-- Error Messages -->
      <?php
      if(isset($_GET['error'])){
          $errorMsg = "";
          switch($_GET['error']){
              case "name": $errorMsg="! Name is empty"; break;
              case "email": $errorMsg="! Email is empty"; break;
              case "type": $errorMsg="! Type is empty"; break;
              case "notMatch": $errorMsg="! Password not same"; break;
              case "large": $errorMsg="! File size should be lower than 1MB"; break;
              case "userExit": $errorMsg="! This User already exists"; break;
              case "loginError2": $errorMsg="Login OK"; break;
          }
          $color = ($_GET['error']=="loginError2") ? "text-success" : "text-danger";
          echo '<div class="text-center mt-3 '.$color.'">'.$errorMsg.'</div>';
      }
      ?>
    </form>
  </div>
</div>

<?php
include_once("../include/footer.php");
?>
