
<?php include('need/header.php'); ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-"></div>
				<div class="col-md-12">
		  		<h2 class="head">Data Pembelian</h2>
		  		<hr>
					<div class="" align="center">
						<?php 
							$query = 'SELECT * FROM pembayaran WHERE id_pembeli = ' . $id_user;
							$tessi = mysqli_query($db, $query);
							if($tessi->num_rows > 0){
						?>

						<table class="table tabel-bordered">
							<tr>
								<thead class="thead-light">
								<th>Nomor Pembayaran</th>
								<th>Metode Pembayaran</th>
								<th>Tarif Pengiriman</th>
								<th>Total Pembayaran</th>
								<th>Status</th>
								<th></th>
								</thead>
							</tr>
						
							
							<?php

							while($tes = mysqli_fetch_assoc($tessi)){

							$query5 = 'SELECT * FROM metode_pembayaran WHERE id_metode = ' . $tes['id_metode'];
							$tessi_metode = mysqli_query($db, $query5);
							$tes_metode = $tessi_metode->fetch_assoc();

							if($tes['status_pembayaran'] == 'Belum Melakukan Konfirmasi'){
									$badge2 = 'table-dark';
								}		
							else if($tes['status_pembayaran'] == 'Ditolak oleh penjual'){
									$badge2 = 'table-danger';
								}
							else if($tes['status_pembayaran'] == 'Barang telah dikirim'){
									$badge2 = 'table-success';
								}
							else{
									$badge2 = 'table-light';
								}
						?>
							<tr class="<?=$badge2?>">
								<td><?=$tes['id_pembayaran']?></td>
								<td><?=$tes_metode['nama_metode']?></td>
								<td>Rp. <?= '30000'?></td>
								<td>Rp. <?=number_format($tes['total_harga']+30000)?></td>
								<?php
								if($tes['status_pembayaran'] == 'Belum Melakukan Konfirmasi'){
									$badge = 'badge badge-dark';
									}		
								else if($tes['status_pembayaran'] == 'Ditolak oleh penjual'){
									$badge = 'badge badge-danger';
									}
								else if($tes['status_pembayaran'] == 'Barang telah dikirim'){
									$badge = 'badge badge-success';
								}
								else{
									$badge = 'badge badge-primary';
								}
									$status = "Belum Melakukan Konfirmasi";
									if($status == $tes['status_pembayaran']){?>
										<td><h5><span class="<?=$badge?>"><?=$tes['status_pembayaran']?></span></td>
										<td><a href="pembayaran.php?id_pembayaran=<?=$tes['id_pembayaran']?>" class="btn btn-sm btn-primary">Konfirmasi Pembayaran</a></h5></td>
								
								<?php } else {?>
								 
								<td><h5><span class="<?=$badge?>"><?=$tes['status_pembayaran']?></h5></span></td>
								<?php 	} ?>
								
							</tr>

						<?php } } else { ?>
							<h4 class="mt-5 mb-5">Anda Belum Pernah Melakukan Pembelian pilih <a href="index.php">produk disini</a> </h4>
						<?php } ?>
						</table>
					</div>
			</div>
		</div>
	</div>
	
   <?php include('need/footer.php'); ?>