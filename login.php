<?php 

require_once 'db.php';

function login($username, $password)
{
	global $link;

	// mengambil data username di table admin
	if($username == "admin"){
		$cek = mysqli_query($link, "SELECT * FROM admin WHERE username = '$username'");
	}else{
		$cek = mysqli_query($link, "SELECT * FROM siswa WHERE nis = '$username'");
	}
	$pecah = mysqli_fetch_assoc($cek);

	// cek ketersediaan username
	if ( mysqli_num_rows($cek) > 0) {

		if ($username == "admin" && password_verify($password, $pecah['password'])) {
			$_SESSION["admin"] = $pecah;
			alert("Login Admin Succes!","index.php");		
		}elseif($username == $pecah['nis'] && password_verify($password, $pecah['password'])){
			$_SESSION["siswa"] = $pecah;
			alert("Login Siswa Succes!","index.php");
		}else{
			return false;
		}

	}else{
		return false;
	}
}