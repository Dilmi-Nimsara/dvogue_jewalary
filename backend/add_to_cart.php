<?php
session_start();
include_once("../include/connection.php");

if (!isset($_SESSION['userid'])) {
    header("Location: ../site/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid = $_SESSION['userid'];
    $PID = $_POST['PID'];
    $qty = intval($_POST['qty']);

    if ($qty > 0) {
        // OrderId unique generate (eg: O12345)
        $Orderid = "O" . rand(10000, 99999);
        $OrderDate = date("Y-m-d H:i:s");

        // check product already in cart
        $check = mysqli_query($con, "SELECT * FROM ordertable WHERE userid='$userid' AND PID='$PID'");
        if (mysqli_num_rows($check) > 0) {
            // update qty
            mysqli_query($con, "UPDATE ordertable SET qty = qty + $qty WHERE userid='$userid' AND PID='$PID'");
        } else {
            // insert new record
            mysqli_query($con, "INSERT INTO ordertable (Orderid, userid, PID, qty, OrderDate) 
                                VALUES ('$Orderid', '$userid', '$PID', '$qty', '$OrderDate')");
        }
    }
}
?>

<?php
if (!isset($_SESSION['userid'])) {
    header("Location: ../site/login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $userid = $_SESSION['userid'];

    // delete only if belongs to current user
    $delete = mysqli_query($con, "DELETE FROM ordertable WHERE id='$id' AND userid='$userid'");
}

header("Location: ../site/production1.php");
exit();



header("Location: ../site/production1.php");
exit();
?>
