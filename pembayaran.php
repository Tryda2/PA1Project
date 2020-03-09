<?php 

	$id_pembayaran = $_GET['id_pembayaran'];


 ?>

<?php include('need/header.php'); ?>

		<div class="container">
			<div class="row">
				<div class="col-md-6" style="height:1000px">
					<div class="jumbotron" align="center" >
						<?php 
							$query = "SELECT * FROM pembayaran WHERE id_pembayaran = ". $id_pembayaran;
							$tessi = mysqli_query($db, $query);
							$tes = mysqli_fetch_assoc($tessi);

							$query2 = 'SELECT * FROM pengorderan WHERE id_pembayaran = ' . $id_pembayaran;
							$tessi_pemesanan = mysqli_query($db, $query2);
							$tes_pemesanan = mysqli_fetch_assoc($tessi_pemesanan);

							$query3 = 'SELECT * FROM produk WHERE id_produk = ' . $tes_pemesanan['id_produk'];
							$tessi_produk = mysqli_query($db, $query3);
							$tes_produk = $tessi_produk->fetch_assoc();

							$query5 = 'SELECT * FROM metode_pembayaran WHERE id_metode = ' . $tes['id_metode'];
							$tessi_metode = mysqli_query($db, $query5);
							$tes_metode = $tessi_metode->fetch_assoc();

						?>
						
						<div align="right">
							<small>Nomor Pemesanan : <?=$id_pembayaran?> </small>
						</div>
						<br/><br/>
						<!-- <div align="left"> -->
						<div class="row">
							</div>
							<div class="col-md-12">
								<label for="total"><h6>Total Harga Produk :</h6></label>
								<h4 id="total">Rp. <?=number_format($tes['total_harga'])?></h4>
							</div>
							<hr>
							<div class="col-md-12">
								<label for="judul"><h6>Nomor Rekening :</h6></label>
								<h4><?=$tes_metode['keterangan_metode']?></h4>
							</div>
							<hr>
							<div class="col-md-12">
								<label for="judul"><h6>Atas Nama :</h6></label>
								<h4>UD.Pujianta</h4>
							</div>
							<hr>
							<div class="col-md-12" align="right">
								<h4><b>Total Pembayaran = Rp. <?=number_format($tes['total_harga']+30000)?></b></h4>
							</div>
						</div>
					</div>	
			
				<div class="col-md-5">
					<h3>KONFIRMASI PEMBAYARAN</h3><br>
					<p align="justify">Pembayaran dilakukan paling lambat 24 Jam setelah pemesanan dan harap segera melakukan konfirmasi pembayaran agar pembayaran diproses dengan cara mengupload foto dan mengisi form keterangan di bawah ini</p>
					<form method="post" action="proses/data_pembelian_proses.php?id_pembayaran=<?=$id_pembayaran?>" enctype="multipart/form-data">
					<label for="alamat">Alamat Tujuan</label><br>
					<input type="text" name="alamat" class="form-control" id="alamat">
					<label for="foto_bukti">Upload Foto Bukti</label><br>
					<input type="file" name="foto_bukti" id="foto_bukti"><br><br>
					<label for="keterangan_bukti">Keterangan Bukti</label>
					<textarea id="keterangan_bukti" name="keterangan_bukti" rows="5" cols="60" required="required" placeholder="Wajib diisi untuk mengkonfirmasi"></textarea>
					<input type="submit" name="konfirmasi" class="btn btn-success" value="Konfirmasi">
				</form>
				</div> 
			</div>
		</div>
	</div>
	
         <?php include('need/footer.php'); ?>