<?php
include("../admin/index.php");
include_once("../include/connection.php");

// --- Search functionality ---
$search_pid = "";
if (isset($_POST['search'])) {
    $search_pid = mysqli_real_escape_string($con, $_POST['pid']);
    $query = "SELECT * FROM production WHERE PID LIKE '%$search_pid%'";
} else {
    $query = "SELECT * FROM production";
}
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vogue Jewelry - Production</title>
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

    /* Search Box */
    .search-box {
        width: 95%;
        max-width: 1200px;
        margin: 0 auto 20px auto;
        text-align: right;
    }
    .search-box input[type="text"] {
        padding: 8px 12px;
        width: 250px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }
    .search-box button {
        padding: 8px 15px;
        border: none;
        background-color: #FF7F50;
        color: #fff;
        font-weight: bold;
        border-radius: 6px;
        cursor: pointer;
        margin-left: 5px;
    }
    .search-box button:hover {
        background-color: #e56f3e;
    }

    /* Table */
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
        min-width: 800px; /* ensures scroll on smaller screens */
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
    .imgS {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #ccc;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    /* Responsive */
    @media (max-width: 992px) {
        table {
            font-size: 13px;
        }
        thead th, tbody td {
            padding: 10px;
        }
        .imgS {
            width: 50px;
            height: 50px;
        }
    }
    @media (max-width: 768px) {
        .search-box {
            text-align: center;
        }
        .search-box input[type="text"] {
            width: 70%;
            margin-bottom: 10px;
        }
        .search-box button {
            width: 25%;
            margin-left: 0;
        }
        table {
            min-width: 600px;
        }
    }
    @media (max-width: 576px) {
        table {
            min-width: 500px;
        }
        tbody td {
            padding: 8px;
            font-size: 12px;
        }
        thead th {
            font-size: 12px;
        }
    }
</style>
</head>
<body>
<div class="main">

    <!-- Search Box -->
    <div class="search-box">
        <form method="POST" action="">
            <input type="text" name="pid" placeholder="Search by Production ID" value="<?php echo $search_pid; ?>">
            <button type="submit" name="search">Search</button>
        </form>
    </div>

    <!-- Table -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Production ID</th>
                    <th>User ID</th>
                    <th>Production Name</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Date</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($result) > 0) { ?>
                    <?php while($row=mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['PID']; ?></td>
                        <td><?php echo $row['userid']; ?></td>
                        <td><?php echo $row['Pname']; ?></td>
                        <td><?php echo $row['Pdesc']; ?></td>
                        <td><?php echo $row['type']; ?></td>
                        <td><?php echo $row['qty']; ?></td>
                        <td>Rs. <?php echo number_format($row['Unitprice'], 2); ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td>
                            <img class="imgS" src="../images/<?php echo $row['image']; ?>" alt="Product Image">
                        </td>
                    </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="9">No production found with this PID</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>

<?php
include_once("../include/footer.php");
?>
