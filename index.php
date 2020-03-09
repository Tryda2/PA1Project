

<?php include('need/header.php'); ?>

  <!-- start slider -->
  <div class="container">
    <div id="fwslider">
        <div class="slider_container">
            <div class="slide"> 
                    <img src="images/pupuk/5.jpg" style="height: 500px" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">  
                        <h4 class="title">UD PUJIANTA</h4>
                        <p class="description">Toko Kami Menjual Banyak Pupuk & Pestisida</p>
                    </div>
                </div>
            </div>
            <div class="slide">
                <img src="images/pupuk/Tsp.jpg" style="height: 500px" alt=""/>
            </div>
             <div class="slide">
                <img src="images/pupuk/7.jpg" style="height: 500px" alt=""/>
                <div class="slide_content">
                    <div class="slide_content_wrap">
                        <h4 class="title">Kualitas Terbaik </h4>
                        <p class="description">Kami Memiliki Produk dengan kualitas yang terjamin</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
    </div>
    </div>
    <!--/slider -->
<div class="main">
	<div class="wrap">
		<div class="section group">
		  	<h2 class="head">Rekomendasi</h2>
			<div class="top-box">
			<div class="container">
			<div class="row">
			<?php 
                    $db=connect_database();
                  	$query = 'SELECT * FROM produk';
                    $data=mysqli_query($db,$query);
                    while ($tes=mysqli_fetch_assoc($data)) {
                    echo '<div class="col-md-3	">';
                    echo '<div class="col_1_of_3">';
                    if (isset($_SESSION['is_logged_in'])) {
                    	echo '<a href="single.php?id=' . $tes['id_produk'] .'">';
                    }
                    else{
                    echo '<a href="single.php?id=' . $tes['id_produk'] . '">';}
                    echo '<div class="inner_content clearfix">';
                    echo '<div class="product_image">';
                    echo '<img src="images/pupuk/' . $tes['foto_produk'] . '" width="200" height="270">';
                    echo '</div>';
                    //echo '<div class="sale-box"><span class="on_sale title_shop">New</span></div>';
                    echo '<div class="price">';
                    echo '<div class="cart-left">';
                    echo '<p class="title" style="font-size: 15px;">' . $tes['nama_produk'] . '</p>';
                    echo '<div class="price1">';
                    echo '<span class="actual">Rp ' . number_format($tes['harga_produk']) .'</span>';
                    
                    
                    echo '</div>';
                    echo '</div> <div class="cart-right"> </div> <div class="clear"></div>';
                    echo ' </div> </div> </a> </div></div>';
                   }
				 ?>
			</div>
			</div>			 						 			    
		  </div>
	   <div class="clear"></div>
	</div>
	</div>
	</div>

   <?php include('need/footer.php'); ?>