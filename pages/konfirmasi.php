<?php 
    include_once('../proses/functions.php');
    session_start();
    if (!isset($_SESSION['admin'])) {
        redirect('../login.php');
    }
    $nama = $_SESSION['name'];
    $username = $_SESSION['username'];
    $id = $_SESSION['id_user'];
    $db = connect_database();
 ?>
 <?php include('need/header.php'); ?>

 <!-- awal konten -->
 <table class="table table-stripped">
 			<tr>
 				<thead class="thead-light">
 					<th>Nomor Pembayaran</th>
 					<th>Nama Pembeli</th>
 					<th>Alamat Tujuan</th>
 					<th>Total Pembayaran</th>
 					<th>Foto Bukti</th>
					<th>Keterangan</th>
					<th colspan="2" style="padding-left:60px">Aksi</th> 
 				</thead>
 			</tr>
		 	<?php 
		 		$query = 'SELECT * FROM data_pembelian WHERE status = "Request"';
		 		$tessi = mysqli_query($db, $query);
		 		while ($tes = mysqli_fetch_assoc($tessi)) {

		 		$query2 = 'SELECT * FROM pembayaran WHERE id_pembayaran = ' . $tes['id_pembayaran'];
		 		$tessi2 = mysqli_query($db, $query2);
		 		$tes2 = $tessi2->fetch_assoc();

				$query4 = 'SELECT * FROM metode_pembayaran WHERE id_metode = ' . $tes2['id_metode'];
		 		$tessi4= mysqli_query($db, $query4);
				$tes4 = $tessi4->fetch_assoc();
				 
		 		$query7 = 'SELECT * FROM pembeli WHERE id_pembeli = ' . $tes['id_pembeli'];
		 		$tessi7 = mysqli_query($db, $query7);
		 		$tes7 = $tessi7->fetch_assoc();

		 	?>
 			<tr>
 				<tbody class="table-hover">
 					<td><?=$tes['id_pembayaran']?></td>
					<td><?=$tes7['nama_depan']?></td>
 					<td><?=$tes['alamat']?></td>
 					<td>Rp. <?=number_format($tes2['total_harga']+30000)?></td>
 					<td><a href="../images/bukti/<?=$tes['foto_bukti']?>"><?=$tes['foto_bukti']?></a></td>
 					<td><?=$tes['keterangan_bukti']?></td>
 					<td><a href="../proses/tolak_proses.php?id=<?=$tes['id_pembeli']?>&id_pembayaran=<?=$tes['id_pembayaran']?>" class="btn btn-danger">Tolak</a></td>
 					<td><a href="../proses/terima_proses.php?id=<?=$tes['id_pembeli']?>&id_pembayaran=<?=$tes['id_pembayaran']?>" class="btn btn-success">Konfirmasi</a></td>
 				</tbody>
 			</tr>
 		<?php } ?>

 		</table>
 	 
 <!-- akhir konten -->

 <?php include('need/footer.php'); ?>