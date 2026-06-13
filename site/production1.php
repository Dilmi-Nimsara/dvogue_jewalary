<?php
session_start();
include_once("../include/header.php");
include_once("../include/connection.php");

// All Products
$query_all = "SELECT * FROM production";
$result_all = mysqli_query($con, $query_all);

// Type-wise queries
$type_list = ['Necklace', 'Rings', 'Pendant', 'Bracelets', 'Earrings'];
$type_results = [];

foreach($type_list as $type){
    $sql = "SELECT * FROM production WHERE type='$type'";
    $res = mysqli_query($con, $sql);
    if(!$res){
        die("Query failed for $type: " . mysqli_error($con));
    }
    $type_results[$type] = $res;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vogue Jewelry</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .product-card {
      border-radius: 15px;
      overflow: hidden;
      transition: transform 0.3s, box-shadow 0.3s;
      background-color: #fff;
      height: 100%;
    }
    .product-card:hover {
      transform: scale(1.03);
      box-shadow: 0 12px 28px rgba(0,0,0,0.25);
    }
    .product-img {
      height: 180px;
      object-fit: cover;
      width: 100%;
    }
    .price-badge {
      font-size: 1rem;
      background-color: #ffc107;
      color: #000;
      padding: 5px 10px;
      border-radius: 20px;
      font-weight: bold;
    }
    .availability-badge {
      font-size: 0.85rem;
      padding: 3px 8px;
      border-radius: 15px;
      font-weight: bold;
    }
    h1, h2 {
      color: #CFAC0C;
      text-decoration: underline;
      padding: 10px 0;
    }
    body {
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>

<div class="container py-4">

  <!-- All Products -->
  <h1 class="text-center">All Products</h1>
  <div class="row g-4">
    <?php while($row=mysqli_fetch_assoc($result_all)) { ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card product-card shadow-sm h-100">
          <img src="../images/<?php echo $row['image'] ?>" class="card-img-top product-img" alt="">
          <div class="card-body d-flex flex-column justify-content-between text-center">
            <div>
              <h5 class="text-warning fw-bold"><?= $row['Pname'] ?></h5>
              <p class="text-muted small"><?= $row['Pdesc'] ?></p>
              <div class="d-flex justify-content-center align-items-center mb-2">
                <span class="price-badge">LKR.<?= $row['Unitprice'] ?>.00</span>
                <?php if($row['qty'] > 0){ ?>
                  <span class="availability-badge ms-2" style="background-color:#28a745;">Available</span>
                <?php } else { ?>
                  <span class="availability-badge ms-2" style="background-color:#dc3545;">Not Available</span>
                <?php } ?>
              </div>
            </div>
            <form action="../backend/add_to_cart.php" method="POST">
              <input type="hidden" name="PID" value="<?= $row['PID'] ?>">
              <input type="number" name="qty" value="1" min="1" class="form-control my-2" style="width:80px; margin:auto;">
              <?php if($row['qty'] > 0){ ?>
                <button type="submit" class="btn btn-warning fw-bold w-100">Add to Cart</button>
              <?php } else { ?>
                <button type="button" class="btn btn-secondary fw-bold w-100" disabled>Out of Stock</button>
              <?php } ?>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <!-- Type-wise Products -->
  <?php foreach($type_list as $type){ ?>
    <h2 class="mt-5 text-center"><?= $type ?></h2>
    <div class="row g-4">
      <?php while($row = mysqli_fetch_assoc($type_results[$type])) { ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="card product-card shadow-sm h-100">
            <img src="../images/<?php echo $row['image'] ?>" class="card-img-top product-img" alt="">
            <div class="card-body d-flex flex-column justify-content-between text-center">
              <div>
                <h5 class="text-warning fw-bold"><?= $row['Pname'] ?></h5>
                <p class="text-muted small"><?= $row['Pdesc'] ?></p>
                <div class="d-flex justify-content-center align-items-center mb-2">
                  <span class="price-badge">LKR.<?= $row['Unitprice'] ?>.00</span>
                  <?php if($row['qty'] > 0){ ?>
                    <span class="availability-badge ms-2" style="background-color:#28a745;">Available</span>
                  <?php } else { ?>
                    <span class="availability-badge ms-2" style="background-color:#dc3545;">Not Available</span>
                  <?php } ?>
                </div>
              </div>
              <form action="../backend/add_to_cart.php" method="POST">
                <input type="hidden" name="PID" value="<?= $row['PID'] ?>">
                <input type="number" name="qty" value="1" min="1" class="form-control my-2" style="width:80px; margin:auto;">
                <?php if($row['qty'] > 0){ ?>
                  <button type="submit" class="btn btn-warning fw-bold w-100">Add to Cart</button>
                <?php } else { ?>
                  <button type="button" class="btn btn-secondary fw-bold w-100" disabled>Out of Stock</button>
                <?php } ?>
              </form>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  <?php } ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php include_once("../include/footer.php"); ?>
