<?php
session_start();
include_once("../include/connection.php");

if (!isset($_SESSION['userid'])) {
    header("Location: ../site/login.php");
    exit();
}

$userid = $_SESSION['userid'];

// Get all cart items with stock info
$query = "SELECT o.id AS order_id, o.PID, o.qty AS cart_qty, 
                 p.qty AS stock_qty, p.Pname, p.Unitprice
          FROM ordertable o 
          JOIN production p ON o.PID = p.PID 
          WHERE o.userid='$userid'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    $notAvailable = false;

    // ✅ Check availability
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['cart_qty'] > $row['stock_qty']) {
            $notAvailable = true;
            $notAvailableItem = $row['Pname'];
            break;
        }
    }

    if ($notAvailable) {
        echo "<script>
                alert('Item \"{$notAvailableItem}\" not available in desired quantity!');
                window.location.href='../site/production1.php';
              </script>";
        exit();
    }

    // Reset pointer
    mysqli_data_seek($result, 0);

    $total_price = 0;
    $orderdetail = "";

    // ✅ Process purchase
    while ($row = mysqli_fetch_assoc($result)) {
        $order_id = $row['order_id'];
        $PID = $row['PID'];
        $cart_qty = $row['cart_qty'];

        // Deduct stock
        mysqli_query($con, "UPDATE production 
                            SET qty = qty - $cart_qty 
                            WHERE PID='$PID'");

        // Collect order summary
        $item_price = $row['Unitprice'] * $cart_qty;
        $total_price += $item_price;
        $orderdetail .= $row['Pname']." x".$cart_qty.", ";

        // Delete from cart
        mysqli_query($con, "DELETE FROM ordertable WHERE id=$order_id");
    }

    // Remove last comma & space
    $orderdetail = rtrim($orderdetail, ", ");

    // ✅ Save one record for whole order in history
    mysqli_query($con, "INSERT INTO orderhistory (userid, totalprice, orderdetail, date) 
                        VALUES ('$userid', $total_price, '$orderdetail', NOW())");

    // Redirect with success
    header("Location: ../site/production1.php?buy=success");
    exit();

} else {
    // Cart empty
    header("Location: ../site/production1.php?buy=empty");
    exit();
}
?>
