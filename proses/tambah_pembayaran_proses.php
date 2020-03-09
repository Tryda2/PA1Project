<?php 
	include_once('functions.php');
	session_start();
	$db = connect_database();
	if (isset($_SESSION['is_logged_in'])) {
		
	$username = $_SESSION['username'];
	$nama = $_SESSION['name'];
	$id_user = $_SESSION['id_user'];
}

	$query1 = 'SELECT * FROM pengorderan WHERE id_pembeli = ' . $id_user . ' AND status = "Bayar"' ;
	$query1_q = mysqli_query($db, $query1);
	$total_harga = 0;

	if(isset($_POST['bayar'])){

		
				while($tessi=mysqli_fetch_assoc($query1_q)){
					$total_harga+=$tessi['total_harga_produk'];
				}

				$id_pembayaran = '11417' . $id_user.rand(1, 99999);
				$status = 'Belum Melakukan Konfirmasi';
				$id_metode = $_POST['metode_pembayaran'];

				$query_input = 'INSERT INTO pembayaran (`id_pembayaran`,`total_harga`,`status_pembayaran`,`id_metode`,`id_pembeli`) VALUES (?,?,?,?,?)';
				$sttm = $db->prepare($query_input);
				$sttm->bind_param('sisii' , $id_pembayaran, $total_harga, $status,$id_metode, $id_user);
				$sttm->execute();
				$id_pembayaran2 = $id_pembayaran;

				$query_input2 = 'UPDATE pengorderan SET id_pembayaran = ? WHERE id_pembeli = ' . $id_user . ' AND status = "Bayar"';
				$sttm2 = $db->prepare($query_input2);
				$sttm2->bind_param('s', $id_pembayaran2);
				$sttm2->execute();

				$status2 = 'Menunggu Pembayaran';
				$query_input3 = 'UPDATE pengorderan SET status = ? WHERE id_pembeli = ' . $id_user . ' AND status = "Bayar"';
				$sttm3 = $db->prepare($query_input3);
				$sttm3->bind_param('s', $status2);
				$sttm3->execute();
				redirect('../pembayaran.php?id_pembayaran=' . $id_pembayaran);
		}

 ?>