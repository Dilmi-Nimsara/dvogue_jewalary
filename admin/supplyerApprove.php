<?php
include("../admin/index.php");
include_once("../include/connection.php");

// Search functionality
$search_userid = "";
if (isset($_POST['search'])) {
    $search_userid = mysqli_real_escape_string($con, $_POST['userid']);
    $query = "SELECT * FROM users WHERE type='Supplyer' AND userid LIKE '%$search_userid%'";
} else {
    $query = "SELECT * FROM users WHERE type='Supplyer'";
}
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vogue Jewelry - Suppliers</title>
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
        max-width: 1100px;
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
        max-width: 1100px;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        border-radius: 10px;
        overflow: hidden;
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
        font-size: 14px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }
    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tbody tr:hover {
        background-color: #ffe5b4;
    }
    .imgS {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #ccc;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }
    .approveS {
        padding: 6px 12px;
        border-radius: 5px;
        font-weight: bold;
        font-size: 14px;
        text-decoration: none;
        transition: 0.3s;
        color: #fff;
    }
    .approveS.not-approved {
        background-color: #e74c3c;
    }
    .approveS.approved {
        background-color: #27ae60;
    }
    .approveS:hover {
        opacity: 0.85;
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
            width: 40px;
            height: 40px;
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
            min-width: 500px;
        }
    }
    @media (max-width: 576px) {
        table {
            min-width: 400px;
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
            <input type="text" name="userid" placeholder="Search by UserID" value="<?php echo $search_userid; ?>">
            <button type="submit" name="search">Search</button>
        </form>
    </div>

    <!-- Table -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Profile</th>
                    <th>Approve</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($result) > 0) { ?>
                    <?php while($row=mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['userid']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <img class="imgS" src="../images/<?php echo $row['image']; ?>" alt="Profile">
                        </td>
                        <td>
                            <?php if($row['approve']==0){ ?>
                                <a class="approveS not-approved" href="approvebackend.php?id=<?php echo $row['id']; ?>&&ap2=no">Not Approved</a>
                            <?php } else { ?>
                                <a class="approveS approved" href="approvebackend.php?id=<?php echo $row['id']; ?>&&ap2=yes">Approved</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="5">No supplier found with this UserID</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>

<?php include_once("../include/footer.php"); ?>
