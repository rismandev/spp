<?php  

require_once 'Model_Bayar.php';

require_once 'header.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(tampilBayarId($id));

?>

<div class="card mt-4">
  <div class="card-header text-center">
    <?= $data['nama']; ?>
  </div>
  <div class="card-body">
    <table class="table table-striped text-center">
    	<thead>
    		<tr>
    			<th>No</th>
    			<th>Bulan</th>
    			<th>Jumlah</th>
    			<th>Status</th>
    			<th>Aksi</th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php $no = 1; ?>
    		<?php foreach (tampilBayarId($id) as $row) : ?>
    		<tr>
    			<td><?= $no++; ?></td>
    			<td><?= $row['bulan']; ?></td>
    			<td><?= $row['jumlah']; ?></td>
    			<td><?= $row['keterangan']; ?></td>
    			<td>
    				<?php if($row['keterangan'] == 'BL') : ?>
    				<a href="proses_bayar.php?id=<?= $row['id_spp']; ?>&siswa=<?= $row['id_siswa']; ?>" class="btn btn-primary" onclick="return confirm('Anda akan melakukan Pembayaran, Klik Ok untuk Lanjut!');">Bayar</a>
    				<?php else : ?>
    				-
    				<?php endif; ?>
    			</td>
    		</tr>
    		<?php endforeach; ?>
    	</tbody>
    </table>
  </div>
  <div class="card-footer text-muted text-center">
    2 days ago
  </div>
</div>



<?php require_once 'footer.php'; ?>