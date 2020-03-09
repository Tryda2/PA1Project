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

    $nama_kategori = $_POST['kategori'];
   

    $query = 'INSERT INTO kategori (`nama_kategori`) VALUES (?)';
    $tessi = $db->prepare($query);
    $tessi->bind_param('s', $nama_kategori);
    $tessi->execute();

    redirect('../pages/kategori.php');
 ?>