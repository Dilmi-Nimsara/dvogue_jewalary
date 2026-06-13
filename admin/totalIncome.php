<?php
include("../admin/index.php");
include_once("../include/connection.php");

// Get selected date filters (if any)
$startDate = $_GET['start_date'] ?? '';
$endDate = $_GET['end_date'] ?? '';

// Base query
$query = "SELECT * FROM orderhistory WHERE 1=1";

// Apply filters
if (!empty($startDate)) {
    $query .= " AND date >= '$startDate'";
}
if (!empty($endDate)) {
    $query .= " AND date <= '$endDate'";
}

$query .= " ORDER BY date DESC";
$result = mysqli_query($con, $query);

// Calculate total income for filtered results
$totalQuery = "SELECT SUM(totalprice) AS total_income FROM orderhistory WHERE 1=1";
if (!empty($startDate)) {
    $totalQuery .= " AND date >= '$startDate'";
}
if (!empty($endDate)) {
    $totalQuery .= " AND date <= '$endDate'";
}
$totalResult = mysqli_query($con, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalIncome = $totalRow['total_income'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vogue Jewelry - Order History</title>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #FFF1D1;
    }
    .main {
        padding: 30px 15px;
        min-height: 100vh;
    }

    .filter-form {
        text-align: center;
        margin-bottom: 25px;
    }

    .filter-form label {
        font-weight: bold;
        margin-right: 5px;
    }

    .filter-form input[type="date"] {
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-right: 10px;
        font-size: 14px;
    }

    .filter-form button {
        background-color: #FF7F50;
        color: white;
        border: none;
        padding: 8px 15px;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s;
        font-size: 14px;
    }

    .filter-form button:hover {
        background-color: #e86b3a;
    }

    .table-container {
        overflow-x: auto;
    }

    table {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        min-width: 600px;
    }

    thead {
        background-color: #FF7F50;
        color: #fff;
    }

    thead th {
        padding: 12px;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    tbody td {
        padding: 12px;
        text-align: center;
        font-size: 14px;
        border-bottom: 1px solid #ddd;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tbody tr:hover {
        background-color: #ffe5b4;
    }

    .total-row {
        background-color: #27ae60;
        color: black;
        font-weight: bold;
        font-size: 16px;
    }

    .total-row td {
        border-top: 2px solid #333;
    }
    .total-row:hover {
        background-color: #27ae60;
    }
</style>
</head>
<body>
<div class="main">

    <!-- 🔍 Filter Form -->
    <form class="filter-form" method="GET" action="">
        <label>Start Date:</label>
        <input type="date" name="start_date" value="<?php echo htmlspecialchars($startDate); ?>">
        <label>End Date:</label>
        <input type="date" name="end_date" value="<?php echo htmlspecialchars($endDate); ?>">
        <button type="submit">Search</button>
        <!-- <button type="button" onclick="window.location.href='orderhistory.php'">Reset</button> -->
    </form>

    <!-- 🧾 Table -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Total Price</th>
                    <th>Order Details</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['userid']; ?></td>
                        <td>Rs. <?php echo number_format($row['totalprice'], 2); ?></td>
                        <td><?php echo $row['orderdetail']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                    </tr>
                    <?php } ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No orders found for selected date range.</td>
                    </tr>
                <?php endif; ?>

                <tr class="total-row">
                    <td colspan="3">Total Income</td>
                    <td>Rs. <?php echo number_format($totalIncome, 2); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

<?php include_once("../include/footer.php"); ?>
