<?php 
	include_once('proses/functions.php');
	session_start();
	$db = connect_database();
    
	if (isset($_SESSION['is_logged_in'])) {
		
	$username = $_SESSION['username'];
	$nama = $_SESSION['name'];
	$id_user = $_SESSION['id_user'];
}
 ?>

<!DOCTYPE HTML>
<html>
<head>
<title>UD PUJIANTA</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<link href='css/need.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/jubel.css">
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!--start slider -->
    <link rel="stylesheet" href="css/fwslider.css" media="all">
    <script src="js/jquery-ui.min.js"></script>  
    <script src="js/css3-mediaqueries.js"></script>
    <script src="js/fwslider.js"></script>
<!--end slider -->
<script src="js/jquery.easydropdown.js"></script>

<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>
</head>
<body>
     <div class="header-top" style="background-color: green">
	   <div class="wrap"> 
			 <div class="cssmenu">
				<ul>
					
					<?php if(isset($_SESSION['is_logged_in'])){?>
					<li><a href="index.php">Beranda</a></li>
					<li><a href="checkout.php">Data Pembelian</a></li> |
					<li><a href="proses/logout_proses.php">Log Out (<?=$nama?>)</a></li>
					
					<?php } else{ ?>
					<li><a href="index.php">Beranda</a></li>
					<li><a href="login.php">Login</a></li> |
					<li><a href="register.php">Register</a></li>
					<?php } ?>
				</ul>
			</div>
			<div class="clear"></div>
 		</div>
	</div>
	<div class="header-bottom">
	    <div class="wrap">
			<div class="header-bottom-left">
				<div class="logo">
				<?php if(isset($_SESSION['is_logged_in'])){?>
					<a href="index.php"><img src="images/logoo.png" style="width:160px; height:70px" alt=""/></a>
				<?php } else{ ?>
					<a href="index.php"><img src="images/logoo.png" style="width:160px; height:70px" alt=""/></a>
					<?php } ?>	
				</div>
				<div class="menu">
	            <ul class="megamenu" style="color:black; width:200px; margin-top:-50px">
			<?php if(isset($_SESSION['is_logged_in'])) {?>
 				
			<li style="margin-left:-20px; font-color:black"><a style="color:black; margin-top:50px" href="#">Kategori</a>
				<div class="megapanel">
					<div class="roww">
	
						<?php  
							$query_k = 'SELECT * FROM kategori';
							$data_k = mysqli_query($db, $query_k);
							while ($tes_k = mysqli_fetch_assoc($data_k)) {
								// echo '<div class = "">';
								echo '<div class="">';
								echo '<h4><a style="color:black; margin-top:50px" href="kategori.php?id_kategori=' . $tes_k['id_kategori'] .'&name=' . $nama . '&username=' . $username . '&id_user=' . $id_user . ' ">' . $tes_k['nama_kategori'] .'</a></h4>';
							} 
						 ?>
					  </div>
					</div>
				</li>
				<?php } else { ?>
					<li style="margin-left:-20px; font-color:black"><a style="color:black; margin-top:55px" href="#">Kategori</a>
						<div class="megapanel">
							<div class="row">
			
								<?php 
									$query_k = 'SELECT * FROM kategori';
									$data_k = mysqli_query($db, $query_k);
									while ($tes_k = mysqli_fetch_assoc($data_k)) {
										echo '<div class = "">';
										echo '<div class="">';
										echo '<h4><a style="color:black; margin-top:50px" href="kategori.php?id_kategori=' . $tes_k['id_kategori'] . '">' . $tes_k['nama_kategori'] . '</a></h4>';
									}
								 ?>
							  </div>
							</div>
						</li>
				<?php } ?>
				<!-- <li><a class="color7" href="other.php">Purchase</a></li> -->
			</ul>
			</div>
		</div>
	   <div class="header-bottom-right">
         <div class="search">
         <?php if(isset($_SESSION['is_logged_in'])) {?>
         	<form method="post" action="proses/search_proses.php?name=<?=$nama?>&username=<?=$username?>&id_user=<?=$id_user?>">
         <?php } else {?>
         	<form method="post" action="proses/search_proses.php">
         <?php } ?>
				<input type="text" name="cari1" class="textbox" value="Cari" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Cari berdasarkan Kategori';}">
				<input type="submit" name="cari">
				<div id="response"> </div>
			</form>
		 </div>
	  <div class="tag-list">
		<ul class="icon1 sub-icon1 profile_img">
			<li><a class="active-icon c2" href="#"> </a>
				<ul class="sub-icon1 list">
					<?php if(isset($_SESSION['is_logged_in'])) {
					$i = 0;
					$query3 = 'SELECT * FROM pengorderan WHERE id_pembeli = ' . $id_user . ' AND status = "Bayar" ';
					$tessii = mysqli_query($db, $query3);
						if($tessii->num_rows > 0){
						while($sop = mysqli_fetch_assoc($tessii)){
							$i++;
						}
						echo '<li><h3> ' . $i . ' produk Dalam Keranjang</h3></li>';
						echo '<li><p>Untuk melihat/membayar produk anda silahkan masuk kehalaman pengorderan<br><a href="pemesanan.php?&name=' . $nama . '&username=' .$username . '&id_user=' . $id_user. '">Klik untuk melihat</a></p></li>';
						}

						else{
							echo '<li><h3>Tidak Ada Produk</h3></a></li>';
							echo '<li><p>Untuk memesan produk anda silahkan kehalaman beranda <br><a href="index.php?&name=' . $nama . '&username=' . $username . '&id_user=' . $id_user. '">Klik untuk melihat produk</a></p></li>';
						}
	    			}

	    			else {?>
					<li><h3>Tidak Ada Produk</h3><a href="login.php"></a></li>
					<li><p>Untuk melihat pesanan anda silahkan login terlebih dahulu <a href="login.php">Klik untuk login</a></p></li>
					<?php } ?>
					
				</ul>
			</li>
		</ul>
		<?php if(isset($_SESSION['is_logged_in'])) {
			$i = 0;
		$query3 = 'SELECT * FROM pengorderan WHERE id_pembeli = ' . $id_user . ' AND status = "Bayar" ';
		$tessii = mysqli_query($db, $query3);
			if(!empty($tessii)){
				while($sop = mysqli_fetch_assoc($tessii)){
				$i++;
			}
		}
	    echo '<ul class="last"><li><h5><a href="pemesanan.php?&name=' . $nama . '&username=' .$username . '&id_user=' . $id_user. '" class="badge badge-light">Keranjang(' . $i . ')</a></h5></li></ul>';
	    } ?>
	  </div>
    </div>
     <div class="clear"></div>
     </div>
	</div>