<?php  

require_once 'Siswa.php';

require_once 'header.php';

$tampil = tampil();

if(isset($_GET['code'])){
	$code = $_GET['code'];
	$tampil = cariSiswa($code);
}

?>

<div class="row">
	<div class="col-sm-10">
		<form method="GET" action="" class="form-inline">	
			<a href="tambah.php" class="btn btn-primary mt-3 mb-4">Tambah Data Siswa</a>
			<div class="form-group ml-auto">
				<input type="text" name="code" class="form-control" placeholder="Cari Siswa ...">
				<button class="btn btn-success float-right" type="submit">Cari</button>
			</div>
		</form>
		<table class="table table-striped table-bordered mt-4 text-center">
			<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Kelas</th>
				<th>Aksi</th>
			</tr>
			</thead>
			<?php $no = 1 ?>
			<?php foreach ($tampil as $row) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $row['nis']  ?></td>
				<td><?= $row['nama']?></td>
				<td><?= $row['jk']?></td>
				<td><?= $row['kelas']?></td>
				<td>
				<a href="bayar.php?id=<?= $row['id_siswa'] ?>" class="btn btn-primary">Bayar SPP</a>
				<a href="ubah.php?id=<?= $row['id_siswa'] ?>" class="btn btn-warning">Edit</a>
				<a href="hapus.php?id=<?= $row['id_siswa'] ?>" onClick="return confirm('Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
			</td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>

<?php require_once 'footer.php'; ?>