<?php 

	session_start(); 
	include_once('functions.php');
	if (!isset($_SESSION['admin'])) {
		redirect('../login.php');
	}
	else{
		$nama = $_SESSION['name'];
		$username = $_SESSION['username'];
		$id = $_SESSION['id_user'];
		$db = connect_database();
		
		
		if(isset($_POST['tambah'])){

			$id_kategori = $_POST['kategori'];
			$judul = $_POST['judul'];
			$stok = $_POST['stok'];
			$sinopsis = $_POST['sinopsis'];
			$foto_produk = $_FILES['foto']['name'];
			move_uploaded_file($_FILES['foto']['tmp_name'], "../images/pupuk/" .$foto_produk);
			$harga = $_POST['harga'];

			$query = 'INSERT INTO produk(`id_kategori`,`nama_produk`,`stok_produk`,`deskripsi_produk`,`foto_produk`,`harga_produk`) VALUES (?,?,?,?,?,?)';
			$statement = $db->prepare($query);
			$statement->bind_param('isissi', $id_kategori, $judul,$stok,$sinopsis,$foto_produk,$harga);
			$statement->execute();

			redirect('../pages/produk.php?halaman=1');

		}
	}
	