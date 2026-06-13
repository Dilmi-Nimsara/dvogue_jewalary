<?php
include("../include/header.php");
?>

<style>
  /* Images responsive */
  img {
    max-width: 100%;
    height: auto;
  }

  /* Flexbox wrap for small screens */
  .d-flex {
    flex-wrap: wrap;
  }

  /* Headings & paragraphs responsive size */
  h1 {
    font-size: clamp(22px, 4vw, 55px);
  }

  p {
    font-size: clamp(14px, 2.2vw, 20px);
  }

  /* Column responsiveness */
  .p-2, .p-3 {
    flex: 1 1 300px;
    margin: 10px;
  }

  /* Hero section fix for mobile */
  @media (max-width: 768px) {
    .hero-section {
      height: auto !important;
      padding: 50px 0 !important;
      text-align: center;
    }
  }
</style>

<div class="hero-section" style="background-color:#F3F7D2; height:450px;">
    <div class="container">
        <h1 style="padding-top:200px;">About Us</h1>
        <p>Vogue, a trusted name for over six decades, is one of Sri Lanka's most</p>
        <p>recognised fine jewellers, renowned for our bespoke jewellery. We take pride in</p>
        <p>our commitment to excellence, offering the purest 22-karat gold jewellery.</p>
    </div>
</div>

<div class="container" style="margin-top:30px;">
    <h1>Our Story</h1>
    <p style="color:gray;">For generations, brides have returned to Vogue Jewellers with their daughters and grand daughters, choosing their bridal jewellery from a brand synonymous with tradition, quality, and timeless elegance.</p>
</div>

<div class="container" style="margin-top:30px;">
    <h1>Our Heritage</h1>
    <p style="color:gray;">In 1962, Vogue Jewellers embarked on a journey to bring exceptional jewellery to Ceylon, the former name of Sri Lanka. The visionary Chairman, the late Mr. Sarath Hemachandra, driven by a passion for exquisite jewellery and a commitment to ethical practices, first opened his doors in Colombo 11. This wasn't just a retail space; it was a testament to the enduring allure of handcrafted jewellery and a promise of trust. The name Vogue quickly became synonymous with exquisite design, vibrant genuine gemstones, meticulous attention to detail, and most importantly, unwavering reliability.</p>
    <p style="color:gray;">Recognizing the need for greater accessibility, Vogue Jewellers made a bold move by relocating our primary showroom to Colpetty. Though an unconventional choice at the time, it positioned us closer to our clientele, further solidifying our commitment to convenience and ease of service. Since our inception, Vogue Jewellers remained a family-run business, where each piece is imbued with generations of expertise and a deep passion for quality. The founding Chairman, himself a maestro of the craft, instilled this very value in the company's ethos – a dedication to using only the finest, 22 karat gold and genuine gemstones.</p>
    <p style="color:gray;">Today, the legacy continues with the third generation joining the management team, bringing fresh perspectives and innovative ideas to the table. However, our core values remain steadfast: a commitment to trust, exceptional craftsmanship, and the enduring beauty of every Vogue creation.</p>
    <p style="color:gray;">At Vogue, we believe that jewellery transcends mere adornment. It serves as a tangible reminder of life's most cherished moments. We create pieces designed to be treasured for generations, becoming heirlooms that carry a rich legacy and the enduring trust placed in our brand.</p>
    <p style="color:gray;">Customer satisfaction is paramount to Vogue experience. Our team of internationally award-winning specialists is dedicated to guiding you towards finding the perfect piece that reflects your unique style and complements your budget. We invite you to visit our showroom and immerse yourself in the world of Vogue Jewellers, where timeless elegance meets artistry that has endured for over six decades, and where trust is a cornerstone of every exquisite creation.</p>
</div>

<div class="container d-flex">
  <div class="p-2">
    <img src="../images/o1.jpg" alt="" style="border-radius:10px;">
    <h1 style="font-size:30px; padding:15px;">Design</h1>
    <p style="color:gray; margin-left:5px;">Vogue Jewellers' design philosophy emphasizes a fusion of contemporary and traditional local concepts with international styles, resulting in innovative, often iconic and timeless, pieces characterized by their lasting appeal.</p>
  </div>
  <div class="p-2" style="border-radius:10px;">
    <img src="../images/o2.jpg" alt="" style="border-radius:10px;">
    <h1 style="font-size:30px; padding:15px;">Craftsmanship</h1>
    <p style="color:gray; margin-left:5px;">Vogue Jewellers' craftsmanship is defined by master artisans who combine traditional techniques with modern aesthetics to create high-quality, lasting jewelry. </p>
  </div>
  <div class="p-2" style="border-radius:10px;">
    <img src="../images/o3.jpg" alt="" style="border-radius:10px;">
    <h1 style="font-size:30px; padding:15px;">Quality</h1>
    <p style="color:gray; margin-left:5px;">Vogue Jewellers prioritizes premium quality and trust by using fine metals and top-tier gemstones, which are certified by the Sri Lanka Gem and Jewellery Authority. Their craftsmanship meets strict international standards, and they offer a lifetime guarantee.</p>
  </div>
</div>

<div style="background-color:#F3F7D2;">
    <h1 class="container" style="padding-top:30px; padding-left:50px;">Golden Milestones</h1><hr>
    <div class="container d-flex">
      <div class="p-3">
        <h1 style="color:#CFAC0C;">Early Years</h1>
        <p style="padding-top:20px;">The term "golden milestone" in reference to Vogue Jewellers likely refers to a specific significant anniversary or achievement, such as the launch of their Tusker Collection, their ISO 9001 certification, or their 60th anniversary, which was marked by lavish events and the introduction of several new collections like the Royal Majestic Collection and the Vogue Lace Collection.</p>
      </div>
      <div class="p-3">
          <img src="../images/e.jpg" alt="">
      </div>
    </div>
</div>

<?php
include("../include/footer.php");
?>
