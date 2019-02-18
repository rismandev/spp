<?php 

	require_once 'db.php';
	// Jika tidak ada session admin maka user arahkan ke login
	// if (!isset($_SESSION['admin'])) {
	// 	alert("Anda harus login", "home.php");
	// }

	require_once 'siswa.php';
	require_once 'header.php';
 ?>

<?php if(isset($_SESSION["admin"])) : ?>

<h1> Halo, Selamat Datang <?= $_SESSION["admin"]['namauser']; ?></h1>


<?php elseif(isset($_SESSION["siswa"])) : ?>

	<?php require_once 'siswa/index.php'; ?>

<?php else : ?>

	<?php alert("Anda Belum Login!","home.php"); ?>

<?php endif; ?>

 <?php require_once 'footer.php'; ?>