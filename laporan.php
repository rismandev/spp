<?php  

require_once 'Model_Bayar.php';

require_once 'header.php';

if(!isset($_SESSION["admin"])){
	alert("Silahkan Login Dulu!", "home.php");
}

if(isset($_GET['mulai'])){
	$mulai = $_GET['mulai'];
	$akhir = $_GET['akhir'];
	$data = filter($mulai, $akhir);
}

?>

<form action="" method="GET" class="mt-3">
	<div class="col-sm-6 m-auto">
		<div class="form-group">
			<label for="mulai">Mulai</label>
			<input type="date" name="mulai" class="form-control">
		</div>
		<div class="form-group">
			<label for="akhir">Akhir</label>
			<input type="date" name="akhir" class="form-control">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-success btn-block">Mulai</button>
		</div>
	</div>
</form>

<?php if(!empty($_GET['mulai']) && !empty($_GET['akhir'])) : ?>

<div class="card">
	<div class="card-header">
		<h2 class="text-center">LAPORAN PEMBAYARAN SPP</h2>
	</div>
	<div class="card-body">
		<table class="table table-striped table-bordered mt-3">
			<tr class="text-center">
				<th>No</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Bulan</th>
				<th>Keterangan</th>
			</tr>
			<?php 
			$no = 1;
			foreach ($data as $row) : ?>
			<tr class="text-center">
				<td><?= $no++; ?></td>
				<td><?= $row['nis'] ?></td>
				<td><?= $row['nama'] ?></td>
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
<?php else : ?>

	<h2 class="text-center"> Data Tidak Ditemukan</h2>

<?php endif; ?>






