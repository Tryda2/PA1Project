<?php 
	include_once('proses/functions.php');
	$id = $_GET['id'];
	$db = connect_database();
	$query = 'SELECT * FROM produk WHERE id_produk =' . $id;
	$te = mysqli_query($db, $query);
	$tes = $te->fetch_assoc();
	if (isset($_SESSION['is_logged_in'])) {
		$username = $_SESSION['username'];
		$nama = $_SESSION['name'];
		$id_user = $_SESSION['id_user'];
	}


 ?>
 
<?php include('need/header.php'); ?>

<div class="mens">    
  <div class="main">
     <div class="wrap">
     	<ul class="breadcrumb breadcrumb__t"><a class="home" href="index.php">Home</a> / <a href="#">Detail</a></ul>
		<div class="cont span_2_of_3">
		  	<div class="grid images_3_of_2">
					<center><img class="" style="margin-top: 50px;" src="images/pupuk/<?= $tes['foto_produk']?>" class="img-responsive" width="200" height="299" title="" /></center>
					<div class="clearfix"></div>
	            </div>
		         <div class="desc1 span_3_of_2">
		         	<h3 class="m_3"><?=$tes['nama_produk']?></h3>
		     
		            <p class="m_5">Rp <?=number_format($tes['harga_produk'])?> </p>
		         	<div class="btn_form">

		         	 	<?php if(isset($_SESSION['is_logged_in'])) {?>
						<form method="post" action="proses/tambah_proses.php?id=<?=$id?>">
							<label for="jumlah">Jumlah Produk</label>
							<select name="jumlah" id="jumlah">
								<?php
								$i = 1;
								$jumlah = $tes['stok_produk'];
									while ($i <= $jumlah) {
										echo '<option value="' . $i . '">' . $i . '</option>';
										$i++;
									}
								 ?>

							</select>
							<br>
							<input type="submit" value="Masukan ke Keranjang" name="add">
						</form>
						<?php } else {?>
						<form action="login.php">
							<input type="submit" value="Login Untuk Membeli" title="">
						</form>
						<?php } ?>
					 </div>
					 
			     </div>
			   <div class="clear"></div>	
	    <div class="clients">
	    <h3>Deskripsi Produk</h3>
	    <p class="m_text2" align="justify" style="text-indent: 60px;"><?=$tes['deskripsi_produk']?></p>
	<script type="text/javascript" src="js/jquery.flexisel.js"></script>
	<hr>
	<hr>
	<h3>Review Produk</h3>
	<div class="row">

		<div class="col-md-12">
			<form method="post" action="proses/tambah_review_proses.php?id_produk=<?=$id?>&id_user=<?=$id_user?>&nama=<?=$nama?>&username=<?=$username?>">
			<div class="form-group">
			  <textarea class="form-control" rows="8" id="review" name="review" placeholder="Masukkan komentar tentang produk ini" required></textarea>
			</div>

			<?php if(isset($_SESSION['is_logged_in'])) {?>
			<div class="form-group">
				<input type="submit" name="tambah" class="btn btn-primary" value="Tambah Review">
			</div>
			<?php } else { ?>
			<div>
				<a href="login.php" class="btn btn-primary">Login Terlebih Dahulu</a>
			</div>
			<?php } ?>

			</form>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<?php 
                $db=connect_database();
                $query = 'SELECT * FROM review WHERE id_review <= (SELECT MAX(id_review) FROM review) AND id_produk = ' . $id . ' ORDER BY id_review DESC LIMIT 5';
                $data=mysqli_query($db,$query);
                                                           
                while ($tes=mysqli_fetch_assoc($data)) { ?>
                	<div class="">
                		
                			<h5><b><?=$tes['nama']?></b></h5>
                		
                			<p align="justify"><small><?=$tes['isi_review']?></small></p>
                		
                	</div>    
                <?php } ?>
		</div>
	</div>
	</div>
     </div>
      </div>
			
		      <div class="clear"></div>
			</div>
			 <div class="clear"></div>
		   </div>
		</div>
		
	      <?php include('need/footer.php'); ?>