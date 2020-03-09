<?php 
session_start(); 
include_once('functions.php');

if ($_POST['tambah']) {

$nama = $_GET['nama'];
$id_user = $_GET['id_user'];
$username = $_GET['username'];
$id_produk = $_GET['id_produk'];
$isi = $_POST['review'];
$db = connect_database();


	$query = 'INSERT INTO review(`id_produk`,`isi_review`,`nama`) VALUES(?,?,?)';
	$sttm = $db->prepare($query);
	$sttm->bind_param('iss', $id_produk, $isi, $nama );
	$sttm->execute();
echo "<script>alert('Review Berhasil Ditambahkan')</script>";
redirect('../single.php?id=' . $id_produk . '&name=' . $nama . '&username=' . $username . '&id_user=' . $id_user );
}
?> 