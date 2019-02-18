<?php  

require_once 'Siswa.php';

require_once 'header.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(tampilIdSiswa($id));

if(isset($_POST['ubah'])){

	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$jk = $_POST['jk'];

	if(ubahSiswa($id,$nis, $nama, $kelas, $jk)){
		alert("Data Berhasil diubah","data_siswa.php");
	}else{
		alert("Data Gagal diubah","data_siswa.php");
	}
}

?>

 	<div class="col-sm-6 m-auto">
		<form action="" method="POST" class="mt-3">
			<div class="form-group">
				<label for="nis">NIS</label>
				<input type="number" class="form-control" name="nis" value="<?= $data['nis'] ?>">
			</div>
			<div class="form-group">
				<label for="nama">Nama Lengkap</label>
				<input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>">
			</div>
			<div class="form-group">
				<label for="kelas">Kelas</label>
				<select name="kelas" class="form-control" id="kelas">
					<option value="<?= $data['id_kelas'] ?>"><?= $data['kelas'] ?></option>
					<?php foreach (tampilKelas() as $row) : ?>
						<?php var_dump($row) ?>
						<option value="<?= $row['id_kelas'] ?>">
							<?= $row ['kelas'] ?>		
						</option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<?php if($data['jk'] == 'laki-laki') : ?>
				<div class="input-group-prepend">
				    <div class="input-group-text">
				      <input type="radio" aria-label="Laki-Laki" name="jk" value="<?= $data['jk'] ?>" checked>&nbsp;Laki-Laki
				    </div>
				    <div class="input-group-text ml-2">
				      <input type="radio" aria-label="Perempuan" name="jk" value="Perempuan">&nbsp;Perempuan
				    </div>
			    </div>
			    <?php else : ?>
			    <div class="input-group-prepend">
				    <div class="input-group-text">
				      <input type="radio" aria-label="Laki-Laki" name="jk" value="Laki-Laki">&nbsp;Laki-Laki
				    </div>
				    <div class="input-group-text ml-2">
				      <input type="radio" aria-label="Perempuan" name="jk" value="<?= $data['jk'] ?>" checked>&nbsp;Perempuan
				    </div>
			    </div>
				<?php endif; ?>
			</div>
			<button type="submit" name="ubah" class="btn btn-success btn-block">Ubah Data</button>
			<button type="submit" name="kembali" class="btn btn-danger btn-block">Kembali</button>
		</form>
	</div>