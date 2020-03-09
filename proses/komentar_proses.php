<?php 
 
session_start(); 
include_once('functions.php');
	if (!isset($_SESSION['is_logged_in'])) {  

		redirect('form_login.php');

	}
	else if(isset($_SESSION['is_logged_in'])){

	if ($_POST['submit']) {
		$subjek = $_POST['pilihan_komentar']; 
		$pesan = $_POST['pesan'];
		$nama = $_GET['name'];	
		$ussn = $_SESSION['username'];
		$id = $_SESSION['id_user'];
		$database = connect_database();
		$statement = $database->prepare('INSERT INTO komentar(`id_customer`, `subjek_komentar`, `isi_komentar`, `nama_user`, `waktu_komentar`)VALUES(?,?,?,?,NOW())');
		$statement->bind_param('isss', $id, $subjek, $pesan, $nama);
		$statement->execute();
		redirect('index.php');
	}
}
?> 