<?php 
	include_once('functions.php');
	session_start();

	$nama = $_SESSION['name'];
    $username = $_SESSION['username'];
    $id = $_SESSION['id_user'];
    $id_metode = $_GET['id_metode'];
    $db = connect_database();

    $query2 = 'DELETE FROM metode_pembayaran WHERE id_metode =' . $id_metode;
    $tes2 = mysqli_query($db, $query2);
    
    if(!$tes2){
        echo "<script>alert('Ada Data Pembayaran Yang Menggunakan Metode Ini, Hapus Data Terlebih Dahulu')</script>";
    }
    redirect('../pages/metode_pembayaran.php?halaman=1');

 ?>