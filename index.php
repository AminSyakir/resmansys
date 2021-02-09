<!DOCTYPE html>
<html>

<head>
	<title>Restaurant Management System</title>
	<link rel="stylesheet" href="style.css">

	<style>
		body {
			height: 100%;
			background: #0466c8;
		}

		h1 {
			text-align: center;
			color: #e9ecef;
			font-weight: bold;
			font-size: 50px;
		}

		.div_login {
			width: 400px;
			background: #edf2fb;
			margin: 80px auto;
			padding: 30px 20px;
			box-shadow: 0px 0px 30px 0px #343a40;

		}

		.login_title {
			text-align: center;
			font-size: large;
			text-transform: uppercase;
			font-weight: bolder;
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

		.alert {
			background: #d00000;
			color: white;
			padding: 10px;
			text-align: center;
			border: 1px solid #b32929;
		}

		.close {
			cursor: pointer;
			float: right;
			font-size: 1.5rem;
			font-weight: 700;
			line-height: 1;
			color: #f8edeb;
			text-shadow: 0 1px 0 #fff;
			opacity: .5;
		}
	</style>
</head>

<body>

	<h1>Restaurant Management System</h1>

	<?php
	if (isset($_GET['message'])) {
		if ($_GET['message'] == "fail") {
			echo "<div class='alert'>Wrong Username or Password!<span class='close'>&times;</span></div>";
		}
	}
	?>

	<div class="div_login">
		<p class="login_title">Login</p>

		<form action="cek_login.php" method="post">
			<label class="login_label">Username</label>
			<input type="text" name="username" class="login_input" placeholder="Username .." required="required">

			<label class="login_label">Password</label>
			<input type="password" name="password" class="login_input" placeholder="Password .." required="required">

			<button type="submit" class="button_login">LOGIN</button>

		</form>

	</div>


</body>
<script>
	var closebtns = document.getElementsByClassName("close");
	var i;

	for (i = 0; i < closebtns.length; i++) {
		closebtns[i].addEventListener("click", function() {
			this.parentElement.style.display = 'none';
		});
	}
</script>

</html>