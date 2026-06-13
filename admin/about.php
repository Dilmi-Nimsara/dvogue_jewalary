<?php
include("../admin/index.php");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
h1, h2 {
    color: #CFAC0C;
    font-weight: bold;
}

p {
    font-size: 1.1rem;
    color: gray;
}

img.responsive-img {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

.section-bg {
    background-color: #F3F7D2;
    padding: 60px 0;
}

@media (max-width: 768px) {
    .d-flex > div {
        flex: 1 1 100%;
        margin-bottom: 20px;
    }
}
</style>

<!-- About Us Section -->
<section class="section-bg text-center">
    <div class="container">
        <h1 class="mb-3" style="padding-top:50px;">About Us</h1>
        <p>Vogue, a trusted name for over six decades, is one of Sri Lanka's most recognised fine jewellers, renowned for our bespoke jewellery.</p>
        <p>We take pride in our commitment to excellence, offering the purest 22-karat gold jewellery.</p>
    </div>
</section>

<!-- Our Story -->
<div class="container my-5">
    <h1>Our Story</h1>
    <p>For generations, brides have returned to Vogue Jewellers with their daughters and grand daughters, choosing their bridal jewellery from a brand synonymous with tradition, quality, and timeless elegance.</p>
</div>

<!-- Our Heritage -->
<div class="container my-5">
    <h1>Our Heritage</h1>
    <p>In 1962, Vogue Jewellers embarked on a journey to bring exceptional jewellery to Ceylon, the former name of Sri Lanka...</p>
    <p>Recognizing the need for greater accessibility, Vogue Jewellers relocated our primary showroom to Colpetty...</p>
    <p>Today, the legacy continues with the third generation joining the management team...</p>
    <p>At Vogue, we believe that jewellery transcends mere adornment...</p>
    <p>Customer satisfaction is paramount to Vogue experience...</p>
</div>

<!-- Design, Craftsmanship, Quality -->
<div class="container my-5">
    <div class="row g-4">
        <div class="col-md-4 text-center">
            <img src="../images/o1.jpg" alt="Design" class="responsive-img mb-3">
            <h2>Design</h2>
            <p>Vogue Jewellers' design philosophy emphasizes a fusion of contemporary and traditional local concepts with international styles, resulting in innovative, often iconic and timeless, pieces characterized by their lasting appeal.</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="../images/o2.jpg" alt="Craftsmanship" class="responsive-img mb-3">
            <h2>Craftsmanship</h2>
            <p>Vogue Jewellers' craftsmanship is defined by master artisans who combine traditional techniques with modern aesthetics to create high-quality, lasting jewelry.</p>
        </div>
        <div class="col-md-4 text-center">
            <img src="../images/o3.jpg" alt="Quality" class="responsive-img mb-3">
            <h2>Quality</h2>
            <p>Vogue Jewellers prioritizes premium quality and trust by using fine metals and top-tier gemstones, certified by the Sri Lanka Gem and Jewellery Authority. They offer a lifetime guarantee.</p>
        </div>
    </div>
</div>

<!-- Golden Milestones -->
<section class="section-bg my-5">
    <div class="container">
        <h1>Golden Milestones</h1>
        <hr>
        <div class="row align-items-center g-4">
            <div class="col-md-6">
                <h2>Early Years</h2>
                <p>The term "golden milestone" in reference to Vogue Jewellers likely refers to a specific significant anniversary or achievement, such as the launch of their Tusker Collection, their ISO 9001 certification, or their 60th anniversary, which was marked by lavish events and the introduction of several new collections like the Royal Majestic Collection and the Vogue Lace Collection.</p>
            </div>
            <div class="col-md-6">
                <img src="../images/e.jpg" alt="Early Years" class="responsive-img">
            </div>
        </div>
    </div>
</section>

<?php
include_once("../include/footer.php");
?>
