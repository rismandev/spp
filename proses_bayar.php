<?php  

require_once 'Model_Bayar.php';

if (isset($_GET['id'])) {
	bayar($_GET['id']);
	$siswa = $_GET['siswa'];
	alert("Pembayaran Berhasil!","bayar.php?id=$siswa");
}else{
	var_dump(mysqli_error());
}


?>