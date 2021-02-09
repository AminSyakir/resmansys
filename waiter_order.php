<?php
require 'functions.php';
$orders = query("SELECT * FROM order_list");
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Order</title>

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
            box-shadow: 0px 0px 30px 0px #343a40;

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

        .add:link,
        .add:visited {
            background-color: #023e7d;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .add:hover,
        .add:active {
            background-color: #002855;
            color: white;
        }

        .complete_button {
            background: #2b9348;
            color: white;
            font-size: 11pt;
            width: 100%;
            border: none;
            padding: 14px 20px;
            margin: 8px 0;
            border-radius: 4px;
        }

        .inprocess_button {
            background: #ffd500;
            color: white;
            font-size: 11pt;
            width: 100%;
            border: none;
            padding: 14px 20px;
            margin: 8px 0;
            border-radius: 4px;
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
        <a href="waiter.php">My Profile</a>
        <a href="waiter_update_profile.php">Update Profile</a>

        <a href="waiter_order.php">Order</a>

        <a href="logout.php" onclick="return confirm('Are you sure to end your current session?');">Sign Out</a>
    </div>

    <!-- Page content -->
    <div class="content">
        <h1>Order</h1>
        <br>
        <a class="add" href="waiter_add_order.php">Add Order</a>
        <br><br>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Product Name</th>
                <th>Order Quantity</th>
                <th>Table Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach ($orders as $order) : ?>
                <tr>
                    <td><?= $i; ?></td>

                    <td><?= $order["product_name"]; ?></td>
                    <td><?= $order["order_quantity"]; ?></td>
                    <td><?= $order["table_name"]; ?></td>
                    <td>
                        <?php if ($order['status'] == "Complete") : ?>
                            <button type="" class="complete_button">Complete</button>
                        <?php else : ?>
                            <button type="" class="inprocess_button">In Process</button>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="delete_order.php?id=<?= $order["id"]; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>

    </div>



</body>

</html>