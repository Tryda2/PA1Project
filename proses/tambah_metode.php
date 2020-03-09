<?php 
    include_once('../proses/functions.php');
    session_start();
    if (!isset($_SESSION['admin'])) {
        redirect('../login.php');
    }
    $db = connect_database();
    $nama = $_SESSION['name'];
    $username = $_SESSION['username'];
    $id = $_SESSION['id_user'];

    $nama_metode = $_POST['metode'];
    $keterangan = $_POST['keterangan'];

    $query = 'INSERT INTO metode_pembayaran (`nama_metode`,`keterangan_metode`) VALUES (?,?)';
    $tessi = $db->prepare($query);
    $tessi->bind_param('ss', $nama_metode, $keterangan);
    $tessi->execute();

    redirect('../pages/metode_pembayaran.php');
 ?>