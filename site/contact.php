<?php
include("../include/header.php");
?>

<style>
    /* Hero Section */
    .contact-hero {
        background-color: #F3F7D2;
        min-height: 450px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        flex-direction: column;
        padding: 20px;
    }
    .contact-hero h1 {
        font-size: 2.5rem;
        color: #222;
        margin-bottom: 15px;
    }
    .contact-hero p {
        font-size: 1.1rem;
        color: #333;
        margin: 5px 0;
    }

    /* Content Section */
    .contact-intro {
        margin: 40px auto;
        max-width: 900px;
        text-align: center;
    }
    .contact-intro h1 {
        font-size: 2rem;
        margin-bottom: 15px;
        color: #111;
    }
    .contact-intro p {
        font-size: 1.05rem;
        color: gray;
    }

    /* Contact Section */
    .contact-container {
        display: flex;
        gap: 40px;
        margin: 40px auto;
        max-width: 1100px;
        flex-wrap: wrap;
    }
    .contact-info, .contact-form {
        flex: 1;
        min-width: 300px;
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .contact-info h2,
    .contact-form h2 {
        margin-bottom: 15px;
        color: #CFAC0C;
        font-size: 1.5rem;
        text-decoration: underline;
    }
    .contact-info p {
        margin: 8px 0;
        font-size: 1rem;
    }

    .social-icons img {
        width: 40px;
        margin: 10px 8px 0 0;
        transition: 0.3s;
    }
    .social-icons img:hover {
        transform: scale(1.1);
    }

    /* Form Styling */
    .form-group {
        margin-bottom: 18px;
    }
    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 6px;
    }
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 1rem;
        box-sizing: border-box;
    }
    .form-group textarea {
        resize: none;
    }

    .contact-form button {
        background-color: #000;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 1rem;
        transition: 0.3s;
    }
    .contact-form button:hover {
        background-color: #333;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .contact-hero h1 {
            font-size: 2rem;
        }
        .contact-hero p {
            font-size: 1rem;
        }
        .contact-container {
            flex-direction: column;
            gap: 25px;
            padding: 0 15px;
        }
    }

    @media (max-width: 480px) {
        .contact-hero {
            padding: 15px;
        }
        .contact-hero h1 {
            font-size: 1.7rem;
        }
        .contact-hero p {
            font-size: 0.9rem;
        }
    }
</style>

<!-- Hero Section -->
<div class="contact-hero">
    <h1>Contact Us</h1>
    <p>Our team is committed to providing prompt and helpful responses.</p>
    <p>Please don’t hesitate to reach out to us — we look forward to hearing from you</p>
    <p>and assisting with any inquiries you may have.</p>
</div>

<!-- Intro Section -->
<div class="contact-intro">
    <h1>Get In Touch</h1>
    <p>We are always happy to hear from you and address any questions or concerns you might have. Our team is dedicated to providing you with the best support and information possible, so please don’t hesitate to reach out. Your satisfaction is our priority, and we’re here to help with anything you need.</p>
</div>

<!-- Contact Info + Form -->
<div class="contact-container">
    <!-- Contact Info -->
    <div class="contact-info">
        <h2>Connect with our Team</h2>
        <p>Our team is happy to answer your questions.</p><br>
        <h4>Head Office - Colombo</h4>
        <p><strong>Address:</strong> No.528 Galle Road Colombo 03 Sri Lanka.</p>
        <p><strong>Tel:</strong> +94112414414 / +94112129329</p>
        <p><strong>Email:</strong> info@voguejewellers.com</p><br>
        <div class="social-icons">
            <a href="index.php"><img src="../images/what.png" alt="WhatsApp"></a>
            <a href="index.php"><img src="../images/face.png" alt="Facebook"></a>
            <a href="index.php"><img src="../images/you.png" alt="YouTube"></a>
            <a href="index.php"><img src="../images/s.png" alt="Instagram"></a>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="contact-form">
        <form method="POST" action="../backend/whatsappback.php">
            <h2>Send us a Message</h2>
            <div class="form-group">
                <label for="name">Name*</label>
                <input type="text" id="name" name="name" placeholder="Enter Your Name">
            </div>
            <div class="form-group">
                <label for="email">Email*</label>
                <input type="text" id="email" name="address" placeholder="Enter Your E-Address">
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number*</label>
                <input type="text" id="mobile" name="contact" placeholder="Enter Mobile Number">
            </div>
            <div class="form-group">
                <label for="message">Message*</label>
                <textarea id="message" name="message" rows="5" placeholder="Enter Your Message Here"></textarea>
            </div>
            <button type="submit">Send Message</button>
        </form>
    </div>
</div>

<?php
include("../include/footer.php");
?>
