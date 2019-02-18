<?php 

	require_once 'login.php';

	if (isset($_SESSION["admin"])) {
		alert("Silahkan Logout Dulu!","index.php");
	}

	// enkripsi password
	// echo password_hash('admin', PASSWORD_DEFAULT);

	if(isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (!login($username, $password)) {
			alert("Username atau Password salah", "home.php");
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body class="bg-dark">
	<div class="container">
		<div class="row mt-5 justify-content-center">
			<div class="col-sm-6 p-5 rounded" style="background: #d3f8ff;">
				<form action="" method="POST">
					<div class="form-group">
						<h2>Login Into Your Account</h2>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<button tyoe="submit" name="login" class="btn btn-primary">LOGIN</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>