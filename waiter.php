<?php
require 'functions.php';
$users = query("SELECT * FROM user WHERE level_ ='waiter'");
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="style.css">
	<title>My Profile</title>

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

		.card {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			max-width: 400px;
			margin: auto;
			text-align: center;
		}

		.title {
			color: grey;
			font-size: 18px;
		}

		button {
			border: none;
			outline: 0;
			display: inline-block;
			padding: 8px;
			color: white;
			background-color: #000;
			text-align: center;
			cursor: pointer;
			width: 100%;
			font-size: 18px;
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

		<h1>My Profile</h1>

		<div class="card">
			<?php foreach ($users as $u) : ?>
				<img src="img/<?= $u["gambar"]; ?>" width="200">
				<h1><?= $u['name']; ?></h1>
				<p><?= $u['level_']; ?></p>
				<p><?= $u['contact_no']; ?></p>
				<p><?= $u['address_']; ?></p>
				<br>
			<?php endforeach; ?>
		</div>
	</div>



</body>

</html>