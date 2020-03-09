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
    $i = 1;
 ?>
 <?php include('need/header.php'); ?>
 <div class="container">
    <div class="row">
    	<div class="col-md-6">
		    <table class="table">
		        <tr>
		            <th>#</th>
		            <th>Nama Kategori</th>
		            <th></th>
		        </tr>
		    
		    <?php 
		        $query_show = 'SELECT * FROM kategori';
		        $tessi_show = mysqli_query($db, $query_show);

		        while($tes = mysqli_fetch_assoc($tessi_show)){?>
		            <tr>
		            <td><?=$i?></td>
		            <td><?=$tes['nama_kategori']?></td>
		            <td><a href="../proses/hapus_kategori_proses.php?id_kategori=<?=$tes["id_kategori"]?>"><i class="fa fa-trash fa-2x"></i></a></td>
		            <?php $i++ ; } ?>
		            </tr>
		     </table>
		 </div>
    </div>


      <hr>


    <div class="row m-atas m-bawah">
         <h4><b><u>Tambah Kategori Baru</u></b></h4>
     	<form method="post" action="../proses/tambah_kategori.php?id=<?=$id?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="kategori">Nama Kategori</label>
                    <input type="text" class="form-control" id="kategori" required="required" name="kategori">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <button type="submit" name="edit" class="btn btn-primary">Tambah Kategori</button>
                </div>
            </div>
        </form>
    </div>
   </div>

 <?php include('need/footer.php'); ?>