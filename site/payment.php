<?php
session_start();
include_once("../include/connection.php");

if(!isset($_SESSION['userid'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PayHere - Sandbox</title>
<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body { background-color: #f8f9fa; font-family: Arial, sans-serif; }
.card { margin-top: 50px; }
</style>
</head>
<body>

<div class="container">
    <div class="card shadow-lg p-6 mx-auto" style="max-width:600px;">
        <h3 class="text-warning mb-4 text-center">Checkout - PayHere Sandbox</h3>
        <p class="text-center">Click below to pay for your cart items</p>
        <div class="flex justify-center mt-4">
            <button onclick="paymentGateway()" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-6 rounded-lg">
                Pay with PayHere
            </button>
        </div>
    </div>
</div>

<script>
function paymentGateway() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = () => {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var paymentObject = JSON.parse(xhttp.responseText);

      payhere.onCompleted = function(orderId) {
        alert("Payment completed. OrderID: " + orderId);
        window.location.href = "../site/payment_success.php";
      };

      payhere.onDismissed = function() {
        alert("Payment window closed");
      };

      payhere.onError = function(error) {
        alert("Payment error: " + error);
      };

      var payment = {
        sandbox: true,
        merchant_id: paymentObject.merchant_id,
        return_url: "http://localhost/site/payment_success.php",
        cancel_url: "http://localhost/site/production1.php",
        notify_url: "http://localhost/site/notify.php",
        order_id: paymentObject.order_id,
        items: paymentObject.items,
        amount: paymentObject.amount,
        currency: paymentObject.currency,
        hash: paymentObject.hash,
        first_name: paymentObject.first_name,
        last_name: paymentObject.last_name,
        email: paymentObject.email,
        phone: paymentObject.phone,
        address: "No.1, Street",
        city: "Colombo",
        country: "Sri Lanka",
        delivery_address: "No.1, Street",
        delivery_city: "Colombo",
        delivery_country: "Sri Lanka"
      };

      payhere.startPayment(payment);
    }
  };
  xhttp.open("GET", "../backend/paymentProcess.php", true);
  xhttp.send();
}
</script>

</body>
</html>
