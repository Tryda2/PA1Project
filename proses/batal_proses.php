<?php 
	include_once('functions.php');
	session_start();

	$id_pengorderan = $_GET['id_pengorderan'];
	$username = $_SESSION['username'];
	$nama = $_SESSION['name'];
	$id_user = $_SESSION['id_user'];
	$db = connect_database();

	$query = 'DELETE FROM pengorderan WHERE id_pengorderan =' . $id_pengorderan;
	$tes = mysqli_query($db, $query);
	redirect('../pemesanan.php');
 ?>