<?php 

	require_once "siswa.php";
	require_once 'header.php';

	if (isset( $_POST['kirim'])) {

		$nis = $_POST['nis'];
		$nama = $_POST['nama'];
		$kelas = $_POST['kelas'];
		$jk = $_POST['jk'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$tempo = $_POST['tempo'];

		if (tambah($nis, $nama, $kelas, $jk,$password, $tempo)) {
			alert("Data berhasil ditambahkan", "data_siswa.php");

		}else{
			var_dump(mysqli_error($link));
		}
	}

	if (isset($_POST['kembali'])) {
		header('Location:index.php');
	}
 ?>
 	<div class="col-sm-6 m-auto">
		<form action="" method="POST" class="mt-3">
			<div class="form-group">
				<label for="nis">NIS</label>
				<input type="number" class="form-control" name="nis" id="nis">
			</div>
			<div class="form-group">
				<label for="nama">Nama Lengkap</label>
				<input type="text" class="form-control" name="nama" id="nama">
			</div>
			<div class="form-group">
				<label for="kelas">Kelas</label>
				<select name="kelas" class="form-control" id="kelas">
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
				<div class="input-group-prepend">
				    <div class="input-group-text">
				      <input type="radio" aria-label="Laki-Laki" name="jk" value="Laki-Laki">&nbsp;Laki-Laki
				    </div>
				    <div class="input-group-text ml-2">
				      <input type="radio" aria-label="Perempuan" name="jk" value="Perempuan">&nbsp;Perempuan
				    </div>
			    </div>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control">
			</div>
			<input type="hidden" name="tempo" value="2018-07-10">
			<button type="submit" name="kirim" class="btn btn-success btn-block">Tambah Data</button>
			<button type="submit" name="kembali" class="btn btn-danger btn-block">Kembali</button>
		</form>
	</div>

<?php require_once 'footer.php'; ?>