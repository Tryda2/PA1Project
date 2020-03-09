<?php 
	include_once('functions.php');
	session_start();

	$nama = $_SESSION['name'];
    $username = $_SESSION['username'];
    $id = $_SESSION['id_user'];
    $id_produk = $_GET['id_produk'];
    $db = connect_database();

    $query_hapus_komen = 'DELETE FROM review WHERE id_produk = ' . $id_produk;
    mysqli_query($db, $query_hapus_komen);

    $query_hapus_pengorderan = 'DELETE FROM pengorderan WHERE id_produk = ' . $id_produk;
    mysqli_query($db, $query_hapus_pengorderan);

    $query = 'DELETE FROM produk WHERE id_produk =' . $id_produk;
    $tes = mysqli_query($db, $query);
    redirect('../pages/produk.php');

 ?>