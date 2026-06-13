<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vogue Jewelry</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

  <style>
    /* Navbar */
    .navbar {
      background-color: white !important;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      padding: 10px 20px;
    }
    .navbar .nav-link {
      color: black !important;
      font-size: 18px;
      font-weight: 500;
      margin-left: 15px;
      transition: color 0.3s ease;
    }
    .navbar .nav-link:hover,
    .navbar .nav-link.active {
      color: #CFAC0C !important;
      font-weight: bold;
    }
    .navbar img {
      max-height: 70px;
    }
    /* Cart button */
    #cartBtn {
      border: none;
      font-size: 22px;
      background-color: transparent;
      cursor: pointer;
      transition: color 0.3s ease;
    }
    #cartBtn:hover {
      color: #CFAC0C;
    }
    /* Profile image */
    .nav.image {
      border: 2px solid #CFAC0C;
      border-radius: 50%;
      transition: transform 0.3s ease;
    }
    .nav.image:hover {
      transform: scale(1.1);
    }

    /* Cart Dropdown */
    #cartDropdown {
      width: 100%;
      max-width: 350px;
    }

    /* Responsive tweaks */
    @media (max-width: 992px) {
      .navbar img {
        margin-bottom: 10px;
        max-height: 60px;
      }
      .navbar .nav-link {
        margin: 8px 0;
        font-size: 16px;
      }
    }

    @media (max-width: 576px) {
      #cartBtn {
        font-size: 20px;
        margin-top: 10px;
      }
      .navbar .nav-link {
        font-size: 15px;
      }
      #cartDropdown {
        right: 10px !important;
        left: 10px !important;
        max-width: 95%;
      }
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container-fluid">
    <a href="../site/index.php">
      <img src="../images/vogue.webp" alt="Vogue Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="../site/index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="../site/news.php">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="../site/contact.php">Contact Us</a></li>
        <?php
        if (isset($_SESSION['userid'])) {
          echo '<li class="nav-item"><a class="nav-link" href="../site/production1.php">Production</a></li>';
        } else {
          echo '<li class="nav-item"><a class="nav-link" href="../site/production.php">Production</a></li>';
        }
        ?>
      </ul>

      <?php
      if(isset($_SESSION['userid'])){
        $userid=$_SESSION['userid'];
        $name=$_SESSION['name'];    
        $email=$_SESSION['email'];
        $password=$_SESSION['password'];
        $image=$_SESSION['image'];
        $type=$_SESSION['type'];

        echo '<button id="cartBtn">🛒</button>';

        if($type=='Client' || $type=='Admin'){
          echo '<a href="../site/update_profile.php"><img class="nav image ms-3" style="width:50px; height:50px;" src="../images/'.$image.'" alt=""></a>';
          echo '<span class="ms-2 fw-bold text-warning">'.$name.'| </span><br>';
          echo '<span class="fw-bold text-warning">'.$type.'</span>';
          echo '<a href="../backend/loginOut.php" class="ms-3 fw-bold text-dark">Log Out</a>';
        } else {
          echo'<a href="../site/addItem.php" class="nav-link ms-2">Add Items</a>';
          echo'<a href="../site/businessRegistration.php" class="nav-link ms-2">Business Registration</a>';
          echo '<a href="../site/update_profile.php"><img class="nav image ms-3" style="width:50px; height:50px;" src="../images/'.$image.'" alt=""></a>';
          echo '<span class="ms-2 fw-bold text-warning">'.$name.' | </span><br>';
          echo '<span class="fw-bold text-warning"> '.$type.'</span>';
          echo '<a href="../backend/loginOut.php" class="ms-3 fw-bold text-dark">Log Out</a>';   
        }
      } else {
        echo '<a class="nav-link" href="#"><img src="../images/logos.jpg" style=" width:50px; height:50px; border-radius:50%;"></a>';
        echo '<a class="nav-link" href="../site/login.php">Login</a>';
      }
      ?>
    </div>
  </div>
</nav>

<!-- Cart Dropdown -->
<div id="cartDropdown" class="d-none position-absolute end-0 mt-2 bg-white rounded shadow p-3" 
     style="z-index:1050; right:20px;">
  <div class="d-flex justify-content-between align-items-center mb-2 fw-bold">
    <span style="color:#CFAC0C; font-size:18px;">Buying Items</span>
    <button class="btn-close" id="closeCart"></button>
  </div>

  <?php
  if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $query = "SELECT o.id, o.qty, p.Pname, p.Unitprice, p.image 
              FROM ordertable o 
              JOIN production p ON o.PID = p.PID 
              WHERE o.userid='$userid'";
    $result = mysqli_query($con, $query);

    $grandTotal = 0;

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) { 
        $itemTotal = $row['qty'] * $row['Unitprice'];
        $grandTotal += $itemTotal;
        ?>
        <div class="d-flex mb-3 align-items-center">
          <img src="../images/<?= $row['image'] ?>" style="width:60px; height:60px; object-fit:cover;" class="rounded me-2">
          <div class="flex-grow-1">
            <h6 class="mb-1"><?= $row['Pname'] ?></h6>
            <p class="mb-0">Qty: <?= $row['qty'] ?> | LKR. <?= number_format($row['Unitprice'],2) ?></p>
          </div>
          <a href="../backend/cart_delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger">🗑️</a>
        </div>
        <hr>
      <?php } ?>
      <div class="d-flex justify-content-between fw-bold mb-2">
        <span>Total:</span>
        <span>LKR. <?= number_format($grandTotal,2) ?></span>
      </div>
      <div class="d-flex justify-content-between mt-3">
        <a href="../site/buy_now.php" class="btn btn-primary w-45">Buy Now</a>
        <a href="../site/payment.php" class="btn btn-warning w-45">Pay Here</a>
      </div>
    <?php } else {
      echo "<p class='text-muted'>Cart is empty</p>";
    }
  } else {
    echo "<p class='text-muted'>Please login to add items</p>";
  }
  ?>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const cartBtn = document.getElementById('cartBtn');
  const cartDropdown = document.getElementById('cartDropdown');
  const closeCart = document.getElementById('closeCart');

  if (cartBtn && cartDropdown && closeCart) {
    cartBtn.addEventListener('click', () => {
      cartDropdown.classList.toggle('d-none');
    });
    closeCart.addEventListener('click', () => {
      cartDropdown.classList.add('d-none');
    });
    document.addEventListener('click', (e) => {
      if (!cartDropdown.contains(e.target) && e.target !== cartBtn) {
        cartDropdown.classList.add('d-none');
      }
    });
  }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<div class="contain">
