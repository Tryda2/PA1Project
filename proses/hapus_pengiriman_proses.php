<?php 
	include_once('functions.php');
	session_start();

	$nama = $_GET['name'];
    $username = $_GET['username'];
    $id = $_GET['id'];
    $id_perusahaan = $_GET['id_perusahaan'];
    $db = connect_database();

    $query2 = 'DELETE FROM perusahaan_pengiriman WHERE id_perusahaan =' . $id_perusahaan;
    $tes2 = mysqli_query($db, $query2);
    
    if(!$tes2){
        echo "<script>alert('Ada Produk Yang Menggunakan Jasa  Ini, Ganti Terlebih Dahulu')</script>";
    }
    redirect('../pages/pengiriman.php?name=' . $nama . '&username=' . $username . '&id=' . $id . '&halaman=1');

 ?>