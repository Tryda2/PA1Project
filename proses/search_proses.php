<?php 
session_start(); 
include_once('functions.php');
 if (isset($_SESSION['is_logged_in'])) {
 	$nama = $_SESSION['name'];
 	$id_user= $_SESSION['id_user'];
 	$username = $_SESSION['username'];
 }
 $db = connect_database();
 	if(isset($_POST['cari'])){
 		$cari = $_POST['cari1'];
 		$query = 'SELECT * FROM kategori WHERE nama_kategori LIKE "%' . $cari . '%"';
		$tessi = mysqli_query($db, $query);
		$tes = $tessi->fetch_assoc();

		$id = $tes['id_kategori'];

		if (isset($_SESSION['is_logged_in'])) {
			redirect('../kategori.php?id_kategori=' . $id);
		}
		else{
			redirect('../kategori.php?id_kategori=' . $id);
		}
 	}
 ?>