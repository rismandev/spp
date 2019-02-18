<?php 

	require_once 'db.php';

	function tampil(){
		global $link;
		$sql = "SELECT * FROM siswa JOIN kelas USING(id_kelas) ORDER BY id_siswa DESC";

		return mysqli_query($link, $sql);
	}

	function tampilSiswaId($id){

		global $link;

		$sql = "SELECT * FROM siswa JOIN kelas USING(id_kelas) JOIN spp USING(id_siswa) WHERE id_siswa = $id";

		return mysqli_query($link,$sql);
	}

	function tampilIdSiswa($id){

		global $link;

		$sql = "SELECT * FROM siswa JOIN kelas USING(id_kelas) WHERE id_siswa = $id";

		return mysqli_query($link, $sql);
	}

	function hapus($id){
		global $link;
		$sql = "DELETE FROM siswa WHERE id_siswa = $id";

		return mysqli_query($link, $sql);
	}

	function tampilKelas(){
		global $link;
		$sql = "SELECT * FROM kelas";

		return mysqli_query($link, $sql);
	}
	function tambah($nis, $nama, $kelas, $jk, $password, $tempo){
		global $link;

		// Masukan Data siswa
		mysqli_query($link,"INSERT INTO siswa VALUES('',$nis,'$nama','$kelas','$jk','$password')");

		// Ambil Data Siswa terakhir
		$sql = mysqli_query($link,"SELECT * FROM siswa ORDER BY id_siswa DESC LIMIT 1");
		$last = mysqli_fetch_assoc($sql);

		$idAkhir = $last['id_siswa'];

		for ($i=0; $i <12 ; $i++) { 
			// Membuat Tanggal Pembayaran
			$jatuhtempo = date('Y-m-d', strtotime("+$i month", strtotime($tempo)));
			mysqli_query($link, "INSERT INTO spp (id_siswa, bulan) VALUES('$idAkhir','$jatuhtempo')");
		}

		return true;
	}

	function cariSiswa($code){

		global $link;

		$sql = "SELECT * FROM siswa JOIN kelas USING(id_kelas) WHERE nama LIKE '%$code%' OR nis LIKE '%$code%'";

		return mysqli_query($link, $sql);
	}

	function ubahSiswa($id,$nis, $nama, $kelas, $jk){

		global $link;

		$sql = "UPDATE siswa SET nis = '$nis', nama = '$nama', id_kelas = '$kelas', jk = '$jk' WHERE id_siswa = $id";

		return mysqli_query($link, $sql);

	}

 ?>













