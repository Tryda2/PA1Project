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
 <div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
    <table class="table">
        <tr>
            <th>#</th>
            <th>Nama Metode</th>
            <th>Keterangan</th>
            <th></th>
        </tr>
    
    <?php 
        $query_show = 'SELECT * FROM metode_pembayaran';
        $tessi_show = mysqli_query($db, $query_show);

        while($tes = mysqli_fetch_assoc($tessi_show)){?>
            <tr>
            <td><?=$i?></td>
            <td><?=$tes['nama_metode']?></td>
            <td><?=$tes['keterangan_metode']?></td>
            <td><a href="../proses/hapus_metode_proses.php?id=<?=$id?>&id_metode=<?=$tes["id_metode"]?>"><i class="fa fa-trash fa-2x"></i></a></td>
            <?php $i++ ; } ?>
            </tr>
      </table>
    </div>
</div>


      <hr>


    <div class="row m-atas m-bawah">
         <h4><b><u>Tambah Metode Baru</u></b></h4>
     	<form method="post" action="../proses/tambah_metode.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="metode">Nama Metode</label>
                    <input type="text" class="form-control" id="metode" required="required" name="metode">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="No. Rek(Wajib angka)">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <button type="submit" name="edit" class="btn btn-primary">Tambah Metode</button>
                </div>
            </div>
        </form>
    </div>
   </div>

 <?php include('need/footer.php'); ?>