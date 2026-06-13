<?php
include_once("../include/header.php");
include_once("../include/connection.php");

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

$userid1 = $_SESSION['userid'];
$name = $_SESSION['name'];

// Check if business is approved
$query = "SELECT approve FROM businessregistration WHERE userid='$userid1' LIMIT 1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$approved = $row ? $row['approve'] : 0;  // default 0 if not found
?>

<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #fdfdfd;
    }
    .form-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 30px 40px;
        background-color: #fff8e1;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        font-family: 'Arial', sans-serif;
    }
    .form-container h1 {
        text-align: center;
        color: #CFAC0C;
        font-weight: bold;
        margin-bottom: 30px;
        text-decoration: underline;
        font-size: 1.8rem;
    }
    .form-container label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
        color: #555;
        font-size: 0.95rem;
    }
    .form-container input,
    .form-container select {
        width: 100%;
        padding: 12px;
        margin-bottom: 18px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 1rem;
        box-sizing: border-box;
    }
    .form-container button {
        background-color: #CFAC0C;
        color: white;
        font-weight: bold;
        padding: 14px;
        width: 100%;
        border: none;
        border-radius: 10px;
        font-size: 1rem;
        cursor: pointer;
        transition: 0.3s;
    }
    .form-container button:hover {
        background-color: #b89508;
    }
    .LoginE {
        text-align: center;
        color: red;
        font-weight: bold;
        margin-top: 10px;
        font-size: 0.95rem;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .form-container {
            margin: 20px;
            padding: 20px;
        }
        .form-container h1 {
            font-size: 1.5rem;
        }
        .form-container input,
        .form-container select,
        .form-container button {
            font-size: 0.95rem;
            padding: 10px;
        }
    }

    @media (max-width: 480px) {
        .form-container {
            margin: 15px;
            padding: 15px;
        }
        .form-container h1 {
            font-size: 1.3rem;
        }
        .form-container label {
            font-size: 0.85rem;
        }
        .form-container input,
        .form-container select,
        .form-container button {
            font-size: 0.9rem;
            padding: 8px;
        }
    }
</style>

<div class="form-container">
    <?php if ($approved == 1) { ?>
        <h1>Add Productions</h1>
        <form action="../backend/addItembackend.php" method="POST" enctype="multipart/form-data">
            <label>Product Name*</label>
            <input type="text" name="Pname" placeholder="Enter Product Name">

            <label>Description*</label>
            <input type="text" name="Pdesc" placeholder="Enter Short Description about Product">

            <label>Type*</label>
            <select name="type" required>
                <option value="" disabled selected>Select Type</option>
                <option value="Necklace">Necklace</option>
                <option value="Rings">Rings</option>
                <option value="Earrings">Earrings</option>
                <option value="Pendant">Pendant</option>
                <option value="Bracelets">Bracelets</option>
            </select>

            <label>Quantity*</label>
            <input type="text" name="qty" placeholder="Enter Quantity">

            <label>Unit Price (Rs.)*</label>
            <input type="text" name="Unitprice" placeholder="Enter Unit Price">

            <label>Date*</label>
            <input type="date" name="date">

            <label>Image*</label>
            <input type="file" name="image" accept="image/jpg,image/jpeg,image/png">

            <button type="submit" name="register" value="Register">Add Productions</button>

            <?php
            if(isset($_GET['error'])){
                $errors = [
                    "Pname" => "!Product Name is empty",
                    "Pdesc" => "!Description is empty",
                    "type" => "!Type is empty",
                    "qty" => "!Quantity is empty",
                    "Unitprice" => "!Unit Price is empty",
                    "date" => "!Date is empty",
                    "large" => "!File size should be lower than 1MB",
                    "notApproved" => "!Your business is not approved yet",
                    "loginError2" => "Production Add OK"
                ];
                if(isset($errors[$_GET['error']])) {
                    echo '<div class="LoginE">'.$errors[$_GET['error']].'</div>';
                }
            }
            ?>
        </form>
    <?php } else { ?>
        <h1>Business Not Approved</h1>
        <div class="LoginE">
            You cannot add products until your business registration is approved by admin.
        </div>
    <?php } ?>
</div>

<?php include_once("../include/footer.php"); ?>
