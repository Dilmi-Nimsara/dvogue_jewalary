<?php
include_once("../include/header.php");
include_once("../include/connection.php");

// All Products
$query_all = "SELECT * FROM production";
$result_all = mysqli_query($con, $query_all);

// Types list
$type_list = ['Necklace', 'Rings', 'Earrings', 'Pendant', 'Bracelets'];
$type_results = [];

foreach ($type_list as $type) {
    $sql = "SELECT * FROM production WHERE type='$type'";
    $res = mysqli_query($con, $sql);
    if (!$res) {
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
    /* Container layout */
    .mainDiv {
        display: flex;
        flex-wrap: wrap;
        justify-content: start;
    }

    /* Card style */
    .product-card {
        width: 260px;       /* Card width */
        height: 300px;      /* Card height reduced */
        border-radius: 15px;
        overflow: hidden;
        margin: 15px;
        transition: transform 0.3s, box-shadow 0.3s;
        background-color: #fff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .product-card:hover {
        transform: scale(1.05);
        box-shadow: 0 12px 28px rgba(0,0,0,0.25);
    }

    /* Product image */
    .product-img {
        height: 140px;  /* image height reduced */
        object-fit: cover;
        width: 100%;
    }

    /* Card body */
    .card-body {
        text-align: center;
        padding: 10px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: calc(100% - 140px);
    }

    /* Price and availability badges */
    .price-badge {
        background-color: #ffc107;
        color: #000;
        padding: 5px 10px;
        border-radius: 20px;
        font-weight: bold;
        font-size: 1rem;
    }

    .availability-badge {
        background-color: #dc3545;
        color: #fff;
        padding: 3px 8px;
        border-radius: 15px;
        font-size: 0.85rem;
        margin-left: 5px;
    }

    /* Add to Cart button */
    .add-to-cart-btn {
        background-color: gold;
        color: #000;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        padding: 5px 0;
        font-size: 16px;
        margin-top: 10px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .add-to-cart-btn:hover {
        background-color: #e6c200;
    }

    /* Headings */
    h1, h2 {
        color: #CFAC0C;
        text-decoration: underline;
        padding: 10px;
    }

    body {
        background-color: #f8f9fa;
    }
  </style>
</head>
<body>
<div class="container py-4">

  <!-- All Products -->
  <h1 class="mb-3">All Products</h1>
  <div class="row g-3">
    <?php while ($row = mysqli_fetch_assoc($result_all)) { ?>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="product-card h-100">
          <img src="../images/<?php echo $row['image'] ?>" class="product-img" alt="">
          <div class="card-body d-flex flex-column justify-content-between">
            <div>
              <h5 class="text-warning fw-bold"><?php echo $row['Pname'] ?></h5>
              <p class="text-muted small"><?php echo $row['Pdesc'] ?></p>
              <div class="d-flex justify-content-center align-items-center mb-2">
                <span class="price-badge">LKR.<?php echo $row['Unitprice'] ?>.00</span>
                <span class="availability-badge">Available</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <!-- Type-wise Products -->
  <?php foreach ($type_list as $type) { ?>
    <h2 class="mt-5 mb-3"><?php echo $type ?></h2>
    <div class="row g-3">
      <?php while ($row = mysqli_fetch_assoc($type_results[$type])) { ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
          <div class="product-card h-100">
            <img src="../images/<?php echo $row['image'] ?>" class="product-img" alt="">
            <div class="card-body d-flex flex-column justify-content-between">
              <div>
                <h5 class="text-warning fw-bold"><?php echo $row['Pname'] ?></h5>
                <p class="text-muted small"><?php echo $row['Pdesc'] ?></p>
                <div class="d-flex justify-content-center align-items-center mb-2">
                  <span class="price-badge">LKR.<?php echo $row['Unitprice'] ?>.00</span>
                  <span class="availability-badge">Available</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  <?php } ?>

</div>


</body>
</html>

<?php
include_once("../include/footer.php");
?>
