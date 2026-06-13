<?php
include_once("../include/header.php");
$userid1 = $_SESSION['userid'];
$name = $_SESSION['name'];
?>

<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #fafafa;
    }

    .form-container {
        max-width: 600px;
        margin: 40px auto;
        padding: 35px 40px;
        background-color: #fff8e1;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
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
        margin-bottom: 6px;
        color: #555;
        font-size: 0.95rem;
    }

    .form-container input[type="text"],
    .form-container input[type="date"],
    .form-container input[type="file"] {
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
        margin-top: 12px;
        font-size: 0.95rem;
    }

    /* Tablet Responsive */
    @media (max-width: 768px) {
        .form-container {
            margin: 20px;
            padding: 25px;
        }
        .form-container h1 {
            font-size: 1.5rem;
        }
        .form-container input,
        .form-container button {
            font-size: 0.95rem;
            padding: 10px;
        }
    }

    /* Mobile Responsive */
    @media (max-width: 480px) {
        .form-container {
            margin: 15px;
            padding: 20px;
        }
        .form-container h1 {
            font-size: 1.3rem;
        }
        .form-container label {
            font-size: 0.85rem;
        }
        .form-container input,
        .form-container button {
            font-size: 0.9rem;
            padding: 9px;
        }
    }
</style>

<div class="form-container">
    <h1>Business Registration</h1>
    <form class="logForms1" action="../backend/businessregister_Backend.php" method="POST" enctype="multipart/form-data">
        <label>Business Name*</label>
        <input type="text" name="Bname" placeholder="Enter Your Business Name">

        <label>Business Email*</label>
        <input type="text" name="Bemail" placeholder="Enter Your Business Email">

        <label>Business Registration Date</label>
        <input type="date" name="Bdate">

        <label>Business Registration Number*</label>
        <input type="text" name="Bregid" placeholder="Enter your Business Registration Number">

        <label>Upload your Business Registration Documents*</label>
        <input type="file" name="Bfile" accept="application/pdf">

        <label>Upload your Business Registration Logo*</label>
        <input type="file" name="Blogo" accept="image/jpg,image/jpeg,image/png">

        <button type="submit" name="register" value="Register">Register</button>

        <?php
        if(isset($_GET['error'])){
            $errors = [
                "Bname" => "!Business Name is empty",
                "Bemail" => "!Business Email is empty",
                "Bdate" => "!Business Registration Date is empty",
                "Bregid" => "!Business Registration Number is empty",
                "large" => "!File size should be lower than 1MB",
                "userExit" => "!This User already exists",
                "loginError2" => "Registration OK"
            ];
            if(isset($errors[$_GET['error']])) {
                echo '<div class="LoginE">'.$errors[$_GET['error']].'</div>';
            }
        }
        ?>
    </form>
</div>

<?php
include_once("../include/footer.php");
?>
