<?php 
    include_once('../proses/functions.php');
    session_start();
    if (!isset($_SESSION['admin'])) {
        redirect('../login.php');
    }
    //  $nama = $_GET['name'];
    //  $username = $_GET['username'];
    $id = $_GET['id'];
    $id_pembayaran = $_GET['id_pembayaran'];
    $db = connect_database();

    $query = 'UPDATE data_pembelian SET status = "Ditolak" WHERE id_pembayaran = ' . $id_pembayaran;
    $tessi = mysqli_query($db, $query);

    $query2 = 'UPDATE pembayaran SET status_pembayaran = "Ditolak oleh penjual" WHERE id_pembayaran = ' . $id_pembayaran;
    $tessi2 = mysqli_query($db, $query2);

    $query3 = 'UPDATE pengorderan SET status = "Ditolak" WHERE id_pembayaran = ' . $id_pembayaran;
    $tessi3 = mysqli_query($db, $query3);

    redirect('../pages/konfirmasi.php');
 ?>