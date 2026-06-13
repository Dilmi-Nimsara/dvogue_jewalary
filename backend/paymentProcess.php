<?php
session_start();
include_once("../include/connection.php");

// Check if user is logged in
if(!isset($_SESSION['userid'])){
    http_response_code(401);
    echo json_encode(["error" => "User not logged in"]);
    exit();
}

$userid = $_SESSION['userid'];

// Fetch cart items
$query = "SELECT o.id as cart_id, o.PID, o.qty, p.Pname, p.Unitprice
          FROM ordertable o 
          JOIN production p ON o.PID = p.PID 
          WHERE o.userid='$userid'";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) == 0){
    http_response_code(400);
    echo json_encode(["error" => "Cart is empty"]);
    exit();
}

// Calculate total and prepare items list
$total_price = 0;
$items = [];
while($row = mysqli_fetch_assoc($result)){
    $total_price += $row['qty'] * $row['Unitprice'];
    $items[] = $row['Pname'] . " x" . $row['qty'];
}

// PayHere Sandbox Merchant details
$merchant_id = "1231868"; // Sandbox merchant ID
$merchant_secret = "NjU5NTE5Mzk2Njk5NDM2MDcxMjUzNDI5NTg3NjE4MDIzODI4NjU="; // Sandbox secret

$order_id = uniqid(); // Unique order ID
$amount = number_format($total_price, 2, '.', ''); // 2 decimals
$currency = "LKR";

// Correct hash calculation
$hash_string = $merchant_id . $order_id . $amount . $currency . md5($merchant_secret);
$hash = md5($hash_string);

// Response
$response = [
    "merchant_id" => $merchant_id,
    "order_id" => $order_id,
    "amount" => $amount,
    "currency" => $currency,
    "items" => implode(", ", $items),
    "hash" => $hash,
    "first_name" => $_SESSION['name'] ?? "Customer",
    "last_name" => "",
    "email" => $_SESSION['email'] ?? "",
    "phone" => $_SESSION['phone'] ?? ""
];

header('Content-Type: application/json');
echo json_encode($response);
