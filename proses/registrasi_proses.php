<?php 
session_start(); 
include_once('functions.php');

if ($_POST['registrasi']) {
	
$nama_depan = $_POST['nama_depan']; 
$nama_belakang = $_POST['nama_belakang']; 
$alamat = $_POST['alamat']; 
$username = $_POST['username']; 
$nomor = $_POST['no_hp'];
$password = $_POST['password'];
$ulpass = $_POST['ulang_password'];
$role = '1';


if(empty($nama_depan) || empty($password) || empty($ulpass))
{
	echo "<script>alert('Data yang diisi belum lengkap'); window.location = '../register.php'</script>";
}
else
{
	if($password == $ulpass){
		
		$database = connect_database();
		$query = mysqli_query($database, "SELECT * FROM pembeli WHERE username='$username'");
		$hasil = mysqli_num_rows($query);
		// var_dump($hasil);
		// die();
		if($hasil == NULL){
			$query_2 = 'INSERT INTO akun(`username`, `password`, `role`) VALUES(?,?,?)';
			$statement_2 = $database->prepare($query_2);
			$statement_2->bind_param('ssi', $username, $password, $role);
			$statement_2->execute();

			//mysqli_query($database, "INSERT INTO pembeli(`nama_depan`, `nama_belakang`, `email`, `no_telephone`, `Alamat`,`jenis_kelamin` ,`username`) VALUES ($nama_depan, $nama_belakang, $email, $nomor, $alamat, $jenis_kelamin, $username)");
			$kaka = 'INSERT INTO pembeli(`nama_depan`, `nama_belakang`, `no_telephone`, `Alamat` ,`username`) VALUES(?, ?, ?, ?, ?)'; 
			$statement = $database->prepare($kaka); 
			$statement->bind_param('sssss', $nama_depan, $nama_belakang, $nomor, $alamat, $username);
			$statement->execute();
			echo "<script>alert('Daftar Berhasil $nama_depan, Silahkan Login'); window.location = '../login.php'</script>";
		}else{
			echo "<script>alert('Nama pengguna sudah terdaftar!'); window.location = '../register.php'</script>";
		}
	}
	else{
		echo "<script>alert('Password tidak sama!'); window.location = '../register.php'</script>";			
	}
}


// $database = connect_database();
// 	$query_2 = 'INSERT INTO akun(`username`, `password`, `role`) VALUES(?,?,?)';
// 	$statement_2 = $database->prepare($query_2);
// 	$statement_2->bind_param('ssi', $username, $password, $role);
// 	$statement_2->execute();
// $query = 'INSERT INTO pembeli(`nama_depan`, `nama_belakang`,`email`, `no_telephone`, `Alamat`,`jenis_kelamin` ,`username`) VALUES(?, ?, ?, ?, ?, ?, ?)'; 
// $statement = $database->prepare($query); 
// $statement->bind_param('sssssss', $nama_depan, $nama_belakang, $email, $nomor, $alamat, $jenis_kelamin , $username);
// $statement->execute();
// redirect('../login.php');
}
?> 