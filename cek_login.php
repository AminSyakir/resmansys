<?php
session_start();

include 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];


$login = mysqli_query($connect, "select * from user where username='$username' and password='$password'");

$cek = mysqli_num_rows($login);


if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if ($data['level_'] == "admin") {


		$_SESSION['username'] = $username;
		$_SESSION['level_'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin.php");

		// cek jika user login sebagai Cashier
	} else if ($data['level_'] == "Cashier") {

		$_SESSION['username'] = $username;
		$_SESSION['level_'] = "Cashier";
		// alihkan ke halaman dashboard Cashier
		header("location:cashier.php");

		// cek jika user login sebagai Waiter
	} else if ($data['level_'] == "Waiter") {

		$_SESSION['username'] = $username;
		$_SESSION['level_'] = "Waiter";
		// alihkan ke halaman dashboard Waiter
		header("location:waiter.php");
	} else {

		// alihkan ke halaman login kembali
		header("location:index.php?message=fail");
	}
} else {
	header("location:index.php?message=fail");
}
