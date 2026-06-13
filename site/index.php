<?php
include("../include/header.php");
?>

<style>
/* Section Titles */
.container h1 {
    font-weight: bold;
}

/* Best Sellers Section */
.best-sellers {
    margin: 40px auto;
    text-align: center;
}
.best-sellers h1 {
    margin-bottom: 30px;
    color: #111;
}

/* Card Styling */
.card {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s ease forwards;
}
.card:hover {
    transform: scale(1.03);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}
.card img {
    height: 220px;
    object-fit: cover;
}

/* About Section */
.about-section {
    display: flex;
    flex-wrap: wrap;
    margin: 50px auto;
    max-width: 1200px;
    gap: 20px;
}
.about-section .left,
.about-section .right {
    flex: 1;
    min-width: 300px;
}
.about-section h1 {
    color: #CFAC0C;
    font-weight: bold;
    font-family: Arial, sans-serif;
}

/* Full Width Banner */
.full-banner img {
    border-radius: 20px;
    width: 100%;
    margin: 40px 0;
}

/* Category Section */
.categories {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin: 30px auto;
    max-width: 1200px;
}
.categories .item {
    flex: 1;
    min-width: 280px;
    text-align: center;
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s ease forwards;
}
.categories img {
    border-radius: 10px;
    width: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}
.categories img:hover {
    transform: scale(1.05);
}

/* Fade In Animation */
@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 768px) {
    .card {
        width: 100% !important;
        margin: 15px 0 !important;
    }
    .about-section {
        flex-direction: column;
        text-align: center;
    }
    .about-section h1 {
        font-size: 2rem;
    }
    .about-section p {
        font-size: 1rem;
    }
    .categories {
        flex-direction: column;
    }
}
@media (max-width: 480px) {
    .best-sellers h1 {
        font-size: 1.6rem;
    }
    .about-section h1 {
        font-size: 1.5rem;
    }
    .categories h1 {
        font-size: 1.3rem;
    }
}
</style>

<!-- Carousel -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../images/p1.jpg" class="d-block w-100" alt="">
    </div>
    <div class="carousel-item">
      <img src="../images/w.jpg" class="d-block w-100" alt="">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Best Sellers -->
<div class="container best-sellers">
    <h1>Our Best Sellers</h1>
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-3">
            <div class="card m-3">
                <img src="../images/c1.jpg" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Pendant</h5>
                    <p class="card-text">Diamond Pendants</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card m-3">
                <img src="../images/c2.jpg" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Ear Studs/Earrings</h5>
                    <p class="card-text">Ruby Earrings</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card m-3">
                <img src="../images/c3.jpg" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Ring</h5>
                    <p class="card-text">Ladies Rings</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card m-3">
                <img src="../images/c4.jpg" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">Necklace</h5>
                    <p class="card-text">Diamond Necklaces</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Section -->
<div class="about-section container">
    <div class="left p-3">
        <h1 style="font-size:55px;">Vogue Jewellers</h1>
        <h1 style="font-size:55px;">Pvt Ltd</h1>
    </div>
    <div class="right p-3">
        <h1 style="font-size:30px;">Legacy of Trust, A Promise of Quality</h1>
        <p style="font-size:18px; color:gray; margin-top:20px;">
            Discover the unparalleled elegance of Vogue Jewellers, one of the best jewellers in Sri Lanka, and a pioneering name in the jewellery industry since 1962. Renowned for exquisite craftsmanship and premium quality, Vogue Jewellers has captivated customers with luxury jewellery and timeless designs for over six decades.
        </p>
        <p style="font-size:18px; color:gray; margin-top:20px;">
            Explore our online store and experience the epitome of elegance with Vogue Jewellers, where tradition meets modernity to adorn you with timeless beauty.
        </p>
    </div>
</div>

<!-- Full Banner -->
<div class="full-banner container">
    <img src="../images/pic.jpg" alt="Banner">
</div>

<!-- Categories -->
<div class="categories container">
    <div class="item">
        <img src="../images/u1.jpg" alt="">
        <h1 style="font-size:28px; padding:15px;">Bangles</h1>
        <p style="font-size:18px; color:gray;">Timeless wrist elegance</p>
    </div>
    <div class="item">
        <img src="../images/u2.jpg" alt="">
        <h1 style="font-size:28px; padding:15px;">Bracelets</h1>
        <p style="font-size:18px; color:gray;">Bold, refined luxury</p>
    </div>
    <div class="item">
        <img src="../images/u3.jpg" alt="" style="border:1px solid gray;">
        <h1 style="font-size:28px; padding:15px;">Where trust shines bright</h1>
    </div>
</div>

<?php
include("../include/footer.php");
?>
