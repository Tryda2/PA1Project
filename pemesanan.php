<?php include('need/header.php'); ?>

<div class="mens">    
  <div class="main">
     <div class="wrap">
		  	<h2 class="head">Orderan</h2>
			<div class="top-box">
					<?php 
						$query = 'SELECT * FROM pengorderan WHERE id_pembeli = ' . $id_user . ' AND status = "Bayar"';
						$myy = mysqli_query($db, $query);
						$total=0;
						$ada=0;
						while ($tes=mysqli_fetch_assoc($myy)) {							
							if(!empty($tes)){
								$ada=1;
								$query2 = 'SELECT * FROM produk WHERE id_produk = ' . $tes['id_produk'];
								$myyy = mysqli_query($db, $query2);
								
								while ($tess=mysqli_fetch_assoc($myyy)) {
									echo '<div class="row m-atas">';
									echo '<div class = "col-md-4"><img src="images/pupuk/' . $tess['foto_produk'] . '" width="200" height="250"></div>';
									echo '<div class = "col-md-6">';
									echo '<table>';
									echo '<tr>';
									echo '<td>Nama Produk</td>';
									echo '<td>&nbsp:&nbsp</td>';
									echo '<td> ' . $tess['nama_produk'] . '</td>';
									echo '</tr>';
								
										echo '<tr>';
										echo '<td>Harga Produk</td>';
										echo '<td>&nbsp:&nbsp</td>';
										echo '<td> Rp. ' . number_format($tess['harga_produk']) . '</td>';
										echo '</tr>';
								
									echo '<tr>';
									echo '<td>Jumlah Produk</td>';
									echo '<td>&nbsp:&nbsp</td>';
									echo '<td> ' . $tes['jumlah_produk'] . '</td>';
									echo '</tr>';
									
									echo '<tr>';
									echo '<td>Total Harga</td>';
									echo '<td>&nbsp:&nbsp</td>';

									
										echo '<td> Rp. ' . number_format($tess['harga_produk']*$tes['jumlah_produk']) . '</td>';
										$total+=($tess['harga_produk']*$tes['jumlah_produk']);
									
									echo '</tr>';
									echo '</table>';
									echo '<a href="proses/batal_proses.php?id_pengorderan=' . $tes['id_pengorderan'] . '"<button class="btn btn-danger m-atas" name="batal" width="300px">Hapus Dari Keranjang</button></a>';
									echo '<br/>';
									echo '</div>';
									echo '</div>';
								}
							}
							
						}
					 ?>
				</table>
				<hr>
				<?php 
				if ($ada!=1) {
					echo '<h4 align="center" class="mt-5">Tidak ada produk dalam keranjang, pilih <a href="index.php">produk disini</a></h4>';
				}else{	
				 ?>
				<h2 align="left">Total Harga : Rp. <?=number_format($total)?></h2>
				<?php
				
					echo '<form method="post" action="proses/tambah_pembayaran_proses.php?id_pengorderan=' . $tes['id_pengorderan'] . '" class="m-atas">';
					echo '<div class="row">';
					echo '<div class="form-group col-md-6">';
					echo '<label for="metode_pembayaran">Pilih Metode Pembayaran</label><br>';
							echo '<select name="metode_pembayaran" id="metode_pembayaran" class="form-control" style="color:black">';
							$query_pembayaran = 'SELECT * FROM metode_pembayaran';
							$the_pembayaran = mysqli_query($db, $query_pembayaran);
							echo '<option>None</option>';
						while($tessi = mysqli_fetch_assoc($the_pembayaran)){
							echo '<option value="' . $tessi['id_metode'] . '">' . $tessi['nama_metode'] . '</option>';
						}
					echo '</select></div>';
					echo '<div class="row mt-5">';
					echo '<div class="col-md-5">';
					echo '<input type="submit" name="bayar" value="Bayar" class="btn btn-primary">';
					echo '</div></form>';
					echo '</div>';
					echo '</div>';
					}
				?>

			</div>
				<div class="clear"></div>
			</div>
			
			  <div class="clear"></div>
			</div>
		   </div>
		</div>
      <?php include('need/footer.php'); ?>