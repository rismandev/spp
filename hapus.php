<?php 

require_once 'siswa.php';

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	if (hapus($id)) {
		alert("Data berhasil dihapus !", 'data_siswa.php');
	}else{
		var_dump(mysqli_error($link));
	}
}
 ?>
