<?php
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data anime berdasarkan id
$table = query("SELECT * FROM table_list WHERE id = $id")[0];
$capacity = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];


// check apakah button submit sudah ditekan atau belum
if (isset($_POST["submit"])) {



    // check adakah data berhasil diubah atau tidak
    if (updateTable($_POST) > 0) {
        echo "
            <script>
                alert('Update Successful!');
                document.location.href = 'table.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Update Fail!');
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
    <title>Update Table</title>

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
        <h1>Update Table</h1>
        <div class="div_login">
            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $table["id"]; ?>">

                <label class="login_label" for="table_name">Table Name</label>
                <input class="login_input" type="text" name="table_name" id="table_name" value="<?= $table["table_name"]; ?>">

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