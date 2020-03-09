<?php 
session_start(); 
include_once('functions.php');

if ($_POST['add']) {

$database = connect_database();
$nama = $_SESSION['name'];
$id_user = $_SESSION['id_user'];
$username = $_SESSION['username'];
$id_produk = $_GET['id'];
$jumlah = $_POST['jumlah'];
$status = "Bayar";

$query_produk = 'SELECT * FROM produk WHERE id_produk = ' . $id_produk;
$queryy = mysqli_query($database, $query_produk);
$tessi = $queryy->fetch_assoc();

$total_harga_produk = $tessi['harga_produk']*$jumlah;
// var_dump($tessi);
// die();

	$query_masukan = 'INSERT INTO pengorderan (`id_pembeli`,`id_produk`,`jumlah_produk`,`total_harga_produk`,`status`) VALUES (?,?,?,?,?)';
	$sttm = $database->prepare($query_masukan);
	$sttm->bind_param('iiiis', $id_user, $id_produk, $jumlah, $total_harga_produk, $status);
	if($sttm->execute()){
		echo "<script>alert('Berhasil Ditambahkan ke Keranjang')</script>";
	redirect('../single.php?id=' . $id_produk );

	}else{
		echo "gagal";
	}

	
}

?> 