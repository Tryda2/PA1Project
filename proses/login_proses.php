<?php 
	session_start();
	include_once('functions.php'); 
	if (isset($_SESSION['is_logged_in'])) {
			redirect('index.php'); 
		}

		if (isset($_POST['login'])) 
		{
		$username = $_POST['username']; 
		$password = $_POST['password']; 
		$database = connect_database();
 
		$query = 'SELECT * FROM akun WHERE username=? AND password=?';
		$statement = $database->prepare($query); 
		$statement->bind_param('ss', $username, $password); 
		$statement->execute(); 
		$result_set = $statement->get_result(); 
		if ($result_set->num_rows) { 
			$hasil = $result_set->fetch_assoc();
			if($hasil['role']==1){
				$sttm = $database->prepare('SELECT * FROM pembeli WHERE username=?');
				$sttm->bind_param('s', $username);
				$sttm->execute();
				$last_result = $sttm->get_result();
				$the_assoc = $last_result->fetch_assoc();
				$nama = $the_assoc['nama_depan']; 
				$id = $the_assoc['id_pembeli']; 
				$_SESSION['is_logged_in'] = TRUE;
				$_SESSION['name'] = $nama;
				$_SESSION['username'] = $username;
				$_SESSION['id_user'] = $id;
				redirect('../index.php');
			}
			else if($hasil['role']==2){ 
				$_SESSION['admin'] = TRUE;
				$_SESSION['name'] = "Admin";
				$_SESSION['username'] = "Admin";
				$_SESSION['id_user'] = '';
				redirect('../admin.php');
			}
		} 
		else {
			echo '<script>alert("Login gagal !!!")</script>';
			redirect('../login.php'); 
		}
	}
?>