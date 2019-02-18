<?php 

session_start();

// koneksi database
// host , username , password, nama_db
$link = mysqli_connect("localhost", "root", "", "ujikom");



function alert ($pesan, $lokasi = null){
	echo "
		<script>
			alert('$pesan');
			window.location.href = '$lokasi';
		</script>	
	";
}