<?php 
	include_once('functions.php');
	session_start();

	$nama = $_SESSION['name'];
    $username = $_SESSION['username'];
    $id = $_SESSION['id_user'];
    $id_kategori = $_GET['id_kategori'];
    $db = connect_database();

    $query2 = 'DELETE FROM kategori WHERE id_kategori =' . $id_kategori;
    $tes2 = mysqli_query($db, $query2);
    
    if(!$tes2){
        echo "<script>alert('Ada Data Produk Yang Menggunakan Kategori Ini, Ganti Kategori Terlebih Dahulu')</script>";
    }
    redirect('../pages/kategori.php?halaman=1');

 ?>