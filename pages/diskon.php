<?php 
    include_once('../proses/functions.php');
    session_start();
    if (!isset($_SESSION['admin'])) {
        redirect('../login.php');
    }
    $db = connect_database();
    $nama = $_GET['name'];
    $username = $_GET['username'];
    $id = $_GET['id'];
    $i = 1;
 ?>
 <?php include('need/header.php'); ?>
 <div class="container-fluid">
    <div class="row">
    <table class="table">
        <tr>
            <th>#</th>
            <th>Nama Event Diskon</th>
            <th>Jumlah Potongan Harga</th>
            <th></th>
        </tr>
    
    <?php 
        $query_show = 'SELECT * FROM event_diskon';
        $tessi_show = mysqli_query($db, $query_show);
        $tessi_show2 = mysqli_query($db, $query_show);

        $query_kategori = 'SELECT * FROM kategori';
        $tessi_kategori = mysqli_query($db, $query_kategori);

        while($tes = mysqli_fetch_assoc($tessi_show)){?>
            <tr>
            <td><?=$i?></td>
            <td><?=$tes['nama_event']?></td>
            <td><?=$tes['jumlah_diskon']?>%</td>
            <?php if($tes['jumlah_diskon']!=0) {?>
            <td><td><a href="../proses/hapus_event_proses.php?name=<?=$nama?>&username=<?=$username?>&id=<?=$id?>&id_event=<?=$tes["id_event"]?>"><i class="fa fa-trash fa-2x"></i></a></td></td>
            <?php } ?>
            </tr>
        <?php $i++; } ?>
      </table>
    </div>


      <hr>


    <div class="row m-atas m-bawah">
      <h4><b><u>Beri Diskon Berdasarkan Kategori</u></b></h4>
        <form method="post" action="../proses/beri_diskon_proses.php?name=<?=$nama?>&username=<?=$username?>&id=<?=$id?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="kategori">Nama Kategori</label>
                    <select id="kategori" name="kategori" class="form-control">
                    <?php
                        while($tes_kategori = mysqli_fetch_assoc($tessi_kategori)){?>
                            <option value="<?=$tes_kategori['id_kategori']?>"><?=$tes_kategori['nama_kategori']?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="event">Pilih Event Diskon</label>
                    <select id="event" name="events" class="form-control">
                    <?php
                        while($tes_show = mysqli_fetch_assoc($tessi_show2)){?>
                            <option value="<?=$tes_show['id_event']?>"><?=$tes_show['nama_event']?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <button type="submit" name="edit" class="btn btn-primary">Beri Diskon</button>
                </div>
            </div>
        </form>
    </div>


        <hr>


    <div class="row m-atas m-bawah">
         <h4><b><u>Tambah Event Diskon Baru</u></b></h4>
     	<form method="post" action="../proses/tambah_event_diskon_proses.php?name=<?=$nama?>&username=<?=$username?>&id=<?=$id?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="judul">Nama Event Diskon</label>
                    <input type="text" class="form-control" id="judul" required="required" name="nama">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="jumlah">Jumlah Diskon</label>
                    <select id="jumlah" name="jumlah" class="form-control">
                    <?php
                        $i = 0;
                        while($i<=100){?>
                        <option value="<?=$i?>"><?=$i?>%</option>
                     <?php  $i+=5; } ?>
                     </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <button type="submit" name="edit" class="btn btn-primary">Tambah Event Diskon</button>
                </div>
            </div>
        </form>
    </div>
   </div>

 <?php include('need/footer.php'); ?>