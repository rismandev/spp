<?php  

require_once 'Siswa.php';

require_once 'header.php';

$id = $_SESSION["siswa"]['id_siswa'];

?>

<div class="card mt-3">
	<div class="card-header">
		<h2 class="text-center">LAPORAN PEMBAYARAN SPP</h2>
	</div>
	<div class="card-body">
		<table class="table table-striped table-bordered mt-3">
			<tr class="text-center">
				<th>No</th>
				<th>Nama</th>
				<th>Kelas</th>
				<th>Bulan</th>
				<th>Keterangan</th>
			</tr>
			<?php 
			$no = 1;
			foreach (tampilSiswaId($id) as $row) : ?>
			<tr class="text-center">
				<td><?= $no++; ?></td>
				<td><?= $row['nama'] ?></td>
				<td><?= $row['kelas'] ?></td>
				<td><?= $row['bulan'] ?></td>
				<td>
					<?php if($row['keterangan'] == 'BL') : ?>
						BELUM BAYAR
					<?php else : ?>
						LUNAS
					<?php endif; ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div class="card-footer text-center">
		Pembayaran oleh Admin
	</div>
</div>