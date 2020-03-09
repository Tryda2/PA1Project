<?php 
	$id_kategori = $_GET['id_kategori'];
?>
 
<?php include('need/header.php');if($_GET['id_kategori']!=''){?>
<div class="mens">
  <div class="main">
     <div class="wrap">
		<div class="cont span_2_of_3">
		  	<h2 class="head">Produk </h2>
		  	
			<div class="top-box">
				<div class="row">
				<?php
					$id_kategori = $_GET['id_kategori'];
                    $db=connect_database();
                  	$query = 'SELECT * FROM produk WHERE id_kategori = ' . $id_kategori . ' ORDER BY id_produk ASC LIMIT 8';
                    $data=mysqli_query($db,$query);
                    while ($tes=mysqli_fetch_assoc($data)){
                    echo '<div class="col-md-3">';
                    echo '<div class="col_1_of_3">';
                   if (isset($_SESSION['is_logged_in'])){
                    	echo '<a href="single.php?id=' . $tes['id_produk'] . '">';
                    }
                    else{
                    echo '<a href="single.php?id=' . $tes['id_produk'] . '">';}
                    echo '<div class="inner_content clearfix">';
                    echo '<div class="product_image">';
                    echo '<img src="images/pupuk/' . $tes['foto_produk'] . '" width="200" height="299">';
                    echo '</div>';
                    //echo '<div class="sale-box"><span class="on_sale title_shop">New</span></div>';
                    echo '<div class="price">';
                    echo '<div class="cart-left">';
                    echo '<p class="title">' . $tes['nama_produk'] . '</p>';
                    echo '<div class="price1">';
                    echo '<span class="actual">Rp ' . number_format($tes['harga_produk']) .'</span>';
                    echo '</div>';
                    echo '</div> <div class="cart-right"> </div> <div class="clear"></div>';
                    echo ' </div> </div> </a> </div></div>';
                   }
				 ?>
				</div>
				<div class="clear"></div>

			</div>
			<?php } else { ?>
				<hr>
				<h3 class="ml-5 mb-5 mt-5">Maaf,Tidak ada produk untuk kategori yang anda cari</h3>
			<?php } ?>		 							 			    		    
		  </div>
			  <div class="clear"></div>
			</div>
		   </div>
		</div>
		   <?php include('need/footer.php'); ?>