<?php
session_start();
include_once("../include/connection.php");

if (!isset($_SESSION['userid'])) {
    header("Location: ../site/login.php");
    exit();
}

$userid = $_SESSION['userid'];

// Fetch cart again
$query = "SELECT o.id as cart_id, o.PID, o.qty, p.Pname, p.Unitprice, p.qty as stock 
          FROM ordertable o 
          JOIN production p ON o.PID = p.PID 
          WHERE o.userid='$userid'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 0) {
    header("Location: ../site/production1.php?buy=empty");
    exit();
}

$total_price = 0;
$orderdetail = "";

// Process each item
while ($row = mysqli_fetch_assoc($result)) {
    $cart_id = $row['cart_id'];
    $PID = $row['PID'];
    $cart_qty = $row['qty'];

    // Deduct stock
    mysqli_query($con, "UPDATE production SET qty = qty - $cart_qty WHERE PID='$PID'");

    // Calculate totals
    $total_price += $row['Unitprice'] * $cart_qty;
    $orderdetail .= $row['Pname'] . " x" . $cart_qty . ", ";

    // Clear cart item
    mysqli_query($con, "DELETE FROM ordertable WHERE id=$cart_id");
}

// Trim last comma
$orderdetail = rtrim($orderdetail, ", ");

// Save to orderhistory
mysqli_query($con, "INSERT INTO orderhistory (userid, totalprice, orderdetail, date)
                    VALUES ('$userid', $total_price, '$orderdetail', NOW())");

// Redirect with success message
header("Location: ../site/production1.php?buy=success");
exit();
?>
