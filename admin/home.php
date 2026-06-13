<?php
include("../admin/index.php");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
/* Headings */
h1, h5 {
    color: #CFAC0C;
    font-weight: bold;
}

/* Card adjustments */
.card {
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s;
}

.card:hover {
    transform: scale(1.05);
}

.card-img-top {
    height: 220px;
    object-fit: cover;
}

/* Section spacing */
.section {
    padding: 60px 0;
}

/* Banner images */
.banner-img {
    border-radius: 20px;
    width: 100%;
    height: auto;
}

/* Small images in the product showcase */
.small-img {
    border-radius: 10px;
    width: 100%;
    height: auto;
    object-fit: cover;
}

/* Responsive flex containers */
@media (max-width: 992px) {
    .d-flex-home {
        flex-direction: column;
        gap: 30px;
    }
}

</style>

<!-- Carousel -->
<div id="carouselExample" class="carousel slide mb-5">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../images/p1.jpg" class="d-block w-100" alt="Banner 1">
    </div>
    <div class="carousel-item">
      <img src="../images/w.jpg" class="d-block w-100" alt="Banner 2">
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
<div class="container section">
    <h1 class="mb-4">Our Best Sellers</h1>
    <div class="row g-4">
        <div class="col-md-6 col-lg-3">
            <div class="card h-100">
                <img src="../images/c1.jpg" class="card-img-top" alt="">
                <div class="card-body text-center">
                    <h5 class="card-title">Pendant</h5>
                    <p class="card-text">Diamond Pendants</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card h-100">
                <img src="../images/c2.jpg" class="card-img-top" alt="">
                <div class="card-body text-center">
                    <h5 class="card-title">Ear Studs/Earrings</h5>
                    <p class="card-text">Ruby Earrings</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card h-100">
                <img src="../images/c3.jpg" class="card-img-top" alt="">
                <div class="card-body text-center">
                    <h5 class="card-title">Ring</h5>
                    <p class="card-text">Ladies Rings</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card h-100">
                <img src="../images/c4.jpg" class="card-img-top" alt="">
                <div class="card-body text-center">
                    <h5 class="card-title">Necklace</h5>
                    <p class="card-text">Diamond Necklaces</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Vogue Jewellers Info -->
<div class="container section d-flex d-flex-home gap-4">
    <div class="flex-fill text-center">
        <h1 style="font-size:55px;">Vogue Jewellers</h1>
        <h1 style="font-size:55px;">Pvt Ltd</h1>
    </div>
    <div class="flex-fill">
        <h1 style="font-size:30px;">Legacy of Trust, A Promise of Quality</h1>
        <p style="font-size:20px; color:gray; margin-top:20px;">
            Discover the unparalleled elegance of Vogue Jewellers, one of the best jewellers in Sri Lanka, and a pioneering name in the jewellery industry since 1962. Renowned for exquisite craftsmanship and premium quality, Vogue Jewellers has captivated customers with luxury jewellery and timeless designs for over six decades.
        </p>
        <p style="font-size:20px; color:gray; margin-top:20px;">
            Explore our online store and experience the epitome of elegance with Vogue Jewellers, where tradition meets modernity to adorn you with timeless beauty.
        </p>
    </div>
</div>

<!-- Banner Image -->
<div class="container my-5 text-center">
    <img src="../images/pic.jpg" class="banner-img">
</div>

<!-- Product Highlights -->
<div class="container section d-flex d-flex-home gap-4">
    <div class="flex-fill text-center">
        <img src="../images/u1.jpg" class="small-img" alt="">
        <h1 style="font-size:30px; padding-top:15px;">Bangles</h1>
        <p style="font-size:20px; color:gray;">Timeless wrist elegance</p>
    </div>
    <div class="flex-fill text-center">
        <img src="../images/u2.jpg" class="small-img" alt="">
        <h1 style="font-size:30px; padding-top:15px;">Bracelets</h1>
        <p style="font-size:20px; color:gray;">Bold, refined luxury</p>
    </div>
    <div class="flex-fill text-center">
        <img src="../images/u3.jpg" class="small-img" alt="">
        <h1 style="font-size:30px; padding-top:15px;">Where trust shines bright</h1>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<?php
include("../include/footer.php");
?>
