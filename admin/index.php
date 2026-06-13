<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vogue Jewelry</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #FFF1D1;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Navbar Styling */
    .navbar-custom {
        background-color: #fff !important;
        padding: 15px 30px;
    }
    .navbar-brand img {
        height: 80px;
        border-radius: 10px;
    }
    .nav-link {
        color: #000 !important;
        font-size: 18px;
        font-weight: 500;
        margin-left: 15px;
        transition: 0.3s;
    }
    .nav-link:hover {
        color: #FF7F50 !important;
    }
    .user-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .user-info img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #FF7F50;
    }

    /* Footer Styling */
    footer {
        background-color: #fff;
        color: #000;
        text-align: center;
        padding: 20px 0;
        box-shadow: 0 -2px 5px rgba(0,0,0,0.1);
    }
</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom sticky-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">
            <img src="../images/vogue.webp" alt="Vogue Jewelry">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
            </ul>

            <div class="d-flex align-items-center">
                <?php
                if(isset($_SESSION['userid'])){
                    $userid = $_SESSION['userid'];
                    $name = $_SESSION['name'];
                    $image = $_SESSION['image'];
                    $type = $_SESSION['type'];

                    if($type == 'Admin'){
                        echo '<ul class="navbar-nav me-3">';
                        echo '<li class="nav-item"><a class="nav-link" href="supplyerApprove.php">Supplyer Approve</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="approveRegister.php">Registration Approve</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="productDetails.php">Production Details</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="totalIncome.php">Total Income</a></li>';
                        echo '</ul>';
                    }

                    echo '<div class="user-info">';
                    echo '<a href="profile_update.php"><img src="../images/'.$image.'" alt="Profile"></a>';
                    echo '<div>';
                    echo '<a href="profile_update.php" class="fw-bold text-dark">'.$name.'</a><br>';
                    echo '<span class="fw-bold text-warning">'.$userid.' | '.$type.'</span>';
                    echo '</div>';
                    echo '<a href="loginOut.php" class="btn btn-outline-dark btn-sm ms-3">Log Out</a>';
                    echo '</div>';
                } else {
                    echo '<a class="nav-link" href="login.php"><img src="../images/logos.jpg" class="rounded-circle" width="50" height="50"> Login</a>';
                }
                ?>
            </div>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
