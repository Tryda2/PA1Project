<?php 
	include_once('functions.php');
	session_start();
	$db = connect_database();
	if (isset($_SESSION['is_logged_in'])) {
		
	$username = $_SESSION['username'];
	$nama = $_SESSION['name'];
	$id_user = $_SESSION['id_user'];
	$id_pembayaran = $_GET['id_pembayaran'];

	$query = 'SELECT * FROM pembayaran WHERE id_pembayaran = '. $id_pembayaran;
	$tessi = mysqli_query($db, $query);
	$tes = $tessi->fetch_assoc();

	$alamat = $_POST['alamat'];
	$tanggal = date('Y-m-d');
	$foto_produk = $_FILES['foto_bukti']['name'];
	move_uploaded_file($_FILES['foto_bukti']['tmp_name'], "../images/bukti/" .$foto_produk);
	$keterangan_bukti = $_POST['keterangan_bukti'];
	$status = "Request";

	$query_masukan = 'INSERT INTO data_pembelian (`alamat`,`tanggal_pembelian`,`id_pembayaran`,`id_pembeli`,`foto_bukti`,`keterangan_bukti`,`status`) VALUES (?,?,?,?,?,?,?)';
	$sttm = $db->prepare($query_masukan);
	$sttm->bind_param('sssisss',$alamat, $tanggal, $id_pembayaran, $id_user, $foto_produk, $keterangan_bukti, $status);
	$sttm->execute();
	
	$query_update = 'UPDATE pembayaran SET status_pembayaran = "Menunggu Konfirmasi Penjual" WHERE id_pembayaran = ' . $id_pembayaran;
	$tes_update = mysqli_query($db, $query_update);

	$query_update2 = 'UPDATE pengorderan SET status = "Menunggu Konfirmasi Penjual" WHERE id_pembayaran = ' . $id_pembayaran;
	$tes_update2 = mysqli_query($db, $query_update2);

	redirect('../checkout.php');

}
 ?>