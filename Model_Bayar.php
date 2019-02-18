<?php  

require_once 'db.php';

function tampilBayarId($id){

	global $link;

	$result = mysqli_query($link,"SELECT * FROM spp JOIN siswa USING(id_siswa) JOIN kelas USING(id_kelas) WHERE id_siswa = $id");

	return $result;
}

function bayar($id){

	global $link;

	$sql = "UPDATE spp SET tgl_bayar = now(), keterangan = 'L' WHERE id_spp = $id";

	return mysqli_query($link, $sql);

}

function filter($mulai, $akhir){

	global $link;

	$sql = "SELECT * FROM spp JOIN siswa USING(id_siswa) JOIN kelas USING(id_kelas) WHERE bulan BETWEEN '$mulai' AND '$akhir' AND keterangan = 'L'";

	return mysqli_query($link, $sql);
}

?>