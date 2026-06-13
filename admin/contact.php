<?php
include("../admin/index.php");
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.section-bg {
    background-color: #F3F7D2;
    padding: 80px 0;
    text-align: center;
}

.section-bg h1 {
    padding-top: 50px;
    color: #CFAC0C;
    font-weight: bold;
}

.section-bg p {
    font-size: 1.1rem;
    margin: 5px 0;
}

h1, h2, h4 {
    color: #CFAC0C;
    font-weight: bold;
}

p {
    font-size: 1rem;
    color: gray;
}

.contact-info a img {
    width: 40px;
    height: 40px;
    margin-right: 10px;
    transition: transform 0.3s;
}

.contact-info a img:hover {
    transform: scale(1.2);
}

textarea, input[type=text], input[type=email] {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 1rem;
}

.btn-send {
    background-color: black;
    color: white;
    padding: 12px 20px;
    font-weight: bold;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    transition: 0.3s;
}

.btn-send:hover {
    background-color: #333;
}

@media (max-width: 768px) {
    .d-flex-contact {
        flex-direction: column;
        gap: 30px;
    }
}
</style>

<!-- Banner Section -->
<div class="section-bg">
    <div class="container">
        <h1>Contact Us</h1>
        <p>Our team is committed to providing prompt and helpful responses. Please don't hesitate to reach out to us, we look forward to hearing from you and assisting with any inquiries you may have.</p>
    </div>
</div>

<!-- Get in Touch -->
<div class="container my-5">
    <h1>Get In Touch</h1>
    <p>We are always happy to hear from you and address any questions or concerns you might have. Our team is dedicated to providing you with the best support and information possible, so please don’t hesitate to reach out. Your satisfaction is our priority, and we’re here to help with anything you need.</p>
</div>

<!-- Contact Info & Form -->
<div class="container d-flex d-flex-contact my-5 gap-4">
    <!-- Contact Info -->
    <div class="contact-info flex-fill">
        <h2>Connect with our Team</h2>
        <p>Our team is happy to answer your questions.</p>
        <h4>Head Office - Colombo</h4>
        <p>Address: No.528 Galle Road Colombo 03, Sri Lanka</p>
        <p>Tel: +94112414414 / +94112129329</p>
        <p>Email: info@voguejewellers.com</p>
        <div class="mt-3">
            <a href="index.php"><img src="../images/what.png" alt="WhatsApp"></a>
            <a href="index.php"><img src="../images/face.png" alt="Facebook"></a>
            <a href="index.php"><img src="../images/you.png" alt="YouTube"></a>
            <a href="index.php"><img src="../images/s.png" alt="Social"></a>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="flex-fill">
        <form method="POST" action="../backend/whatsappback.php">
            <h2 class="text-primary mb-4" style="text-decoration:underline;">Send us a Message</h2>
            
            <input type="text" name="name" placeholder="Enter Your Name" required>
            <input type="email" name="address" placeholder="Enter E-address" required>
            <input type="text" name="contact" placeholder="Enter Mobile Number" required>
            <textarea name="message" rows="5" placeholder="Enter Your Message Here" required></textarea>
            
            <button type="submit" class="btn-send">Send Message</button>
        </form>
    </div>
</div>

<?php
include_once("../include/footer.php");
?>
