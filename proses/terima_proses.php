<?php 
    include_once('../proses/functions.php');
    session_start();
    if (!isset($_SESSION['admin'])) {
        redirect('../login.php');
    }
    $nama = $_SESSION['name'];
    $username = $_SESSION['username'];
    $id = $_SESSION['id_user'];
    $id_pembayaran = $_GET['id_pembayaran'];
    $db = connect_database();

    $query = 'UPDATE data_pembelian SET status = "Diterima" WHERE id_pembayaran = ' . $id_pembayaran;
    $tessi = mysqli_query($db, $query);

    $query2 = 'UPDATE pembayaran SET status_pembayaran = "Barang telah dikirim" WHERE id_pembayaran = ' . $id_pembayaran;
    $tessi2 = mysqli_query($db, $query2);

    $query_mencari = 'SELECT * FROM pembayaran WHERE id_pembayaran = ' . $id_pembayaran;
    $tessi5 = mysqli_query($db, $query_mencari);
    $tes=$tessi5->fetch_assoc();
    $total_harga = $tes['total_harga'];

    $query3 = 'UPDATE pengorderan SET status = "Diterima" WHERE id_pembayaran = ' . $id_pembayaran;
    $tessi3 = mysqli_query($db, $query3);

    redirect('../pages/konfirmasi.php')
 ?>