<?php
session_start();
include_once("../include/connection.php");

if (isset($_SESSION['userid']) && isset($_GET['id'])) {
    $userid = $_SESSION['userid'];
    $id     = $_GET['id'];

    $delete = "DELETE FROM ordertable WHERE id='$id' AND userid='$userid'";
    mysqli_query($con, $delete);

    header("Location: ../site/production1.php");
    exit();
} else {
    echo "❌ Error: Cannot delete item!";
}
?>
