<?php
require 'functions.php';
$capacity = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// check apakah button submit sudah ditekan atau belum
if (isset($_POST["submit"])) {



    // check adakah data berhasil ditambahkan atau tidak
    if (addTable($_POST) > 0) {
        echo "
            <script>
                alert('Successful!');
                document.location.href = 'table.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Fail!');
                document.location.href = 'table.php'
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <title>Add Product</title>

    <style>
        body {
            background: #caf0f8;
        }

        /* The side navigation menu */
        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #00296b;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        /* Sidebar links */
        .sidebar a {
            display: block;
            color: white;
            padding: 16px;
            text-decoration: none;
        }

        /* Active/current link */
        .sidebar a.active {
            background-color: #4CAF50;
            color: white;
        }

        /* Links on mouse-over */
        .sidebar a:hover:not(.active) {
            background-color: #caf0f8;
            color: black;
            font-weight: bolder;
            font-size: large;
        }

        /* Page content. The value of the margin-left property should match the value of the sidebar's width property */
        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
        }

        /* On screens that are less than 700px wide, make the sidebar into a topbar */
        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
            }

            div.content {
                margin-left: 0;
            }
        }

        /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }

        .div_login {
            width: 400px;
            background: #edf2fb;
            margin: 80px auto;
            padding: 30px 20px;
            border-radius: 5px;
            border: blue;

        }

        .login_input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        .login_label {
            margin: 0 8px;
        }

        .button_login {
            background: #023e7d;
            color: white;
            font-size: 11pt;
            width: 100%;
            border: none;
            padding: 14px 20px;
            margin: 8px 0;
            border-radius: 4px;
            cursor: pointer;
        }

        .button_login:hover {
            color: #fff;
            background-color: #002855;
            border-color: #2653d4;
        }
    </style>

</head>

<body>
    <?php
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level_'] == "") {
        header("location:index.php?message=fail");
    }

    ?>

    <!-- Side navigation -->
    <div class="sidebar">
        <a href="admin.php">My Profile</a>
        <a href="update_profile.php">Update Profile</a>
        <a href="employee.php">Employee Management</a>
        <a href="product.php">Product Management</a>
        <a href="table.php">Table Management</a>
        <a href="order.php">Order</a>
        <a href="bill.php">Bill</a>
        <a href="logout.php" onclick="return confirm('Are you sure to end your current session?');">Sign Out</a>
    </div>

    <!-- Page content -->
    <div class="content">
        <h1>Add Table</h1>
        <div class="div_login">
            <form method="post" action="" enctype="multipart/form-data">


                <label class="login_label" for="table_name">Table Name</label>
                <input class="login_input" type="text" name="table_name" id="table_name">

                <label class="login_label" for="table_capacity">Table Capacity</label>
                <select class="login_input" id="table_capacity" name="table_capacity">
                    <?php foreach ($capacity as $c) : ?>
                        <option value="<?= $c; ?>"><?= $c; ?></option>
                    <?php endforeach; ?>

                </select>

                <button type="submit" class="button_login" name="submit">Submit!</button>

            </form>
            <br>
            <a href="table.php">Back</a>
        </div>
    </div>



</body>

</html>