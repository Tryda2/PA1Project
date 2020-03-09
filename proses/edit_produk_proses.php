<?php 
	include_once('functions.php');
	session_start();
		$nama = $_SESSION['name'];
	    $username = $_SESSION['username'];
	    $id = $_SESSION['id_user'];

	if (!isset($_SESSION['admin'])) {
		redirect('../login.php');
		
	}


	else{

		if (isset($_POST['edit'])) {
			$db=connect_database();
			$id_produk = $_GET['id_produk'];
			$tess = mysqli_query($db, 'SELECT * FROM produk WHERE id_produk = ' . $id_produk);
			$else = $tess->fetch_assoc();

			$id_kategori = $_POST['kategori'];
			$judul = $_POST['judul'];
			$stok = $_POST['stok'];
			if(!empty($_POST['sinopsis'])){
				$sinopsis=$_POST['sinopsis'];
			}
			else{$sinopsis = $else['deskripsi_produk'];}

			if(empty($_FILES['foto']['name'])){
				$foto_produk = $else['foto_produk'];
			}

			else{$acak = rand(1,1000);
				$foto_produk = $acak.$_FILES['foto']['name'];
				move_uploaded_file($_FILES['foto']['tmp_name'], "../images/pupuk/" .$foto_produk);}

			$harga = $_POST['harga'];

			$query = 'UPDATE produk SET id_kategori = ?, nama_produk = ?, stok_produk = ?, deskripsi_produk = ?, foto_produk = ?, harga_produk = ? WHERE id_produk = ' . $id_produk;
			$statement = $db->prepare($query);
			$statement->bind_param('isissi', $id_kategori, $judul, $stok, $sinopsis, $foto_produk, $harga);
			$statement->execute();
			
			redirect('../pages/produk.php?halaman=1&id_produk=' . $id_produk);

			
		}

	}

 ?>