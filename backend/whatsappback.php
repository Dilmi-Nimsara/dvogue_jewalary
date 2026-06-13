<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $message = $_POST['message'];

    // WhatsApp number (with country code, no + sign)
    $phone = "94775795286"; // Example Sri Lanka number

    // Message
    $msg = "Hello, I am $name.%0AEmail: $address%0AMessage: $message";

    // Redirect to WhatsApp
    header("Location: https://wa.me/$phone?text=$msg");
    exit();
}
?>