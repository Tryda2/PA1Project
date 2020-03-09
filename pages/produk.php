<?php 
    include_once('../proses/functions.php');
    session_start();
    if (!isset($_SESSION['admin'])) {
        redirect('../login.php');
    }
    $nama = $_SESSION['name'];
    $username = $_SESSION['username'];
    $id = $_SESSION['id_user'];
    $halaman = $_GET['halaman'];
 ?>

    <?php include('need/header.php'); ?>
            <?php
            if($halaman==1){
                    $db=connect_database();
                    $i=1;
                    $query = 'SELECT * FROM produk ORDER BY id_produk ASC';
                    $data=mysqli_query($db,$query);
                    echo '<div class=""><a href="produk.php?halaman=2"<button class="btn btn-primary">Tambah Produk</button></a></div> ';
                    echo '<table border="1" class="table table-bordered">';
                    echo '<tr>';
                    echo '<thead class="thead-light">';
                    echo '<th>#</th>';
                    echo '<th>Foto Produk </th>';
                    echo '<th>Nama Produk</th>';
                    echo '<th>Kategori Produk </th>';
                    echo '<th>Stok Produk</th>';
                    echo '<th>Deskripsi</th>';

                    echo '<th>Harga Produk</th>';

                    echo '<th>Aksi</th>';
                    echo '</thead>';
                    echo '</tr>';
                    while ($tes=mysqli_fetch_assoc($data)) {
                       $string = $tes['deskripsi_produk'];
                       $deskripsi = limit_words($string, 30);
                       $query_kategori = 'SELECT * FROM kategori WHERE id_kategori = ' . $tes['id_kategori'];
                       $db = connect_database();
                       $tessi = mysqli_query($db, $query_kategori);
                       $tess = $tessi->fetch_assoc();
                       $id_produk = $tes['id_produk'];
                       echo '<tr align="justify" class="m-bawah ">';
                       echo '<td>' . $i . '</td>';
                       echo '<td><img src="../images/pupuk/' . $tes['foto_produk'] . '" width="200" height="299"></td>';
                       echo '<td>' . $tes['nama_produk'] . '</td>';
                       echo '<td>' . $tess['nama_kategori'].'</td>';

                       echo '<td>' . $tes['stok_produk'] . '</td>';

                       echo '<td>' . $deskripsi . '</td>';

                       echo '<td>Rp. ' . number_format($tes['harga_produk']) . '</td>';

                       echo '<td><a href="produk.php?halaman=3 &id_produk=' . $id_produk . '"><i class="fa fa-eye fa-2x"></i></a><a href="produk.php?name=' . $nama . '&username=' . $username . '&id=' . $id . '&halaman=4&id_produk=' . $id_produk . '"><i class="fa fa-pencil fa-2x"></i></a><a href="../proses/hapus_produk_proses.php?name=' . $nama . '&username=' . $username . '&id=' . $id . '&id_produk=' . $id_produk . '"><i class="fa fa-trash fa-2x"></i></a></td>'; 
                       echo '</tr>';
                    
                    $i++;
                   }
                   echo '</table>';
               }
               else if($halaman==2){?>
                <form class="container-fluid" method="post" action="../proses/tambah_produk_proses.php?halaman=1" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="judul">Nama Produk</label>
                            <input type="text" class="form-control" id="judul" placeholder="Nama Produk" required="required" name="judul">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="stok">Stok Produk</label>
                            <input type="text" class="form-control" id="stok" placeholder="Stok(wajib angka)" onkeypress="return hanyaAngka(event)" required="required" name="stok">
                        </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="harga">Harga Produk</label>
                            <input type="text" class="form-control" id="harga" placeholder="Harga(wajib angka)" onkeypress="return hanyaAngka(event)" required="required" name="harga">
                        </div>
                    </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kategori">Kategori Produk</label>
                            <select name="kategori" id="kategori" class="form-control" required="required">
                                <?php 
                                    $query_kategori = 'SELECT * FROM kategori';
                                    $db = connect_database();
                                    $tessi = mysqli_query($db, $query_kategori);
                                    while ($tes=mysqli_fetch_assoc($tessi)) {
                                        echo '<option value="' . $tes['id_kategori'] . '">' . $tes['nama_kategori'] . '</option>';
                                    }
                                 ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="sinopsis">Deskripsi Produk</label>
                            <textarea required="required" id="sinopsis" placeholder="Deskripsi Produk" name="sinopsis" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="foto">Foto Produk</label>
                            <input type="file" class="form-control" id="foto" required="required" name="foto">
                        </div>
                    </div>
                </div>
                    <button type="submit" name="tambah" class="btn btn-primary m-kiri">Tambah</button>
                </form>
                <?php } else if ($halaman==3) {
                    $db=connect_database();
                    $id_produk = $_GET['id_produk'];
                    $query = 'SELECT * FROM produk WHERE id_produk = ' . $id_produk;
                    $data=mysqli_query($db,$query);
                    echo '<div class="m-bawah"><a href="produk.php?halaman=4&id_produk=' . $id_produk . '"<button class="btn btn-primary">Edit Produk</button></a></div> ';
                    echo '<table border="1" class="table">';
                    echo '<tr>';
                    // echo '<th>Nomor</th>';
                    echo '<th>Foto Produk</th>';
                    echo '<th>Nama Produk</th>';
                    echo '<th>Kategori Produk</th>';
                    echo '<th>Stok Produk</th>';
                    echo '<th>Deskripsi</th>';
                    echo '<th>Harga Produk (Rp)</th>';
                    //echo '<th>Aksi</th>';
                    echo '</tr>';
                    if ($tes=mysqli_fetch_assoc($data)) {
                       $string = $tes['deskripsi_produk'];
                       $deskripsi = limit_words($string, 20);

                       $query_kategori = 'SELECT * FROM kategori WHERE id_kategori = ' . $tes['id_kategori'];
                       $db = connect_database();
                       $tessi = mysqli_query($db, $query_kategori);
                       $tess = $tessi->fetch_assoc();

                       $id_produk = $tes['id_produk'];
                       echo '<tr align="center" class="m-bawah">';
                       //echo '<td>' . $i . '</td>';
                       echo '<td><img src="../images/pupuk/' . $tes['foto_produk'] . '" width="200" height="299"></td>';
                       echo '<td>' . $tes['nama_produk'] . '</td>';
                       echo '<td>' . $tess['nama_kategori'];
                       echo '<td>' . $tes['stok_produk'] . '</td>';
                       echo '<td>' . $deskripsi . '</td>';
                       echo '<td>' . number_format($tes['harga_produk']) . '</td>';
                       echo '</tr>';
                   }
                   echo '</table>';

                } else if ($halaman==4) { 
                    $db=connect_database();
                    $id_produk = $_GET['id_produk'];
                    $query = 'SELECT * FROM produk WHERE id_produk = ' . $id_produk;
                    $data=mysqli_query($db,$query);
                    $tes=mysqli_fetch_assoc($data)
                ?>
                    <form class="container-fluid" method="post" action="../proses/edit_produk_proses.php?id_produk=<?=$id_produk?>" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="judul">Nama Produk</label>
                            <input type="text" class="form-control" id="judul" value="<?=$tes['nama_produk']?>" required="required" name="judul">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="stok">Stok Produk</label>
                            <input type="text" class="form-control" id="stok" value="<?=$tes['stok_produk']?>" required="required" name="stok">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="harga">Harga Produk</label>
                            <input type="text" class="form-control" id="harga" value="<?=$tes['harga_produk']?>" required="required" name="harga">
                        </div>
                    </div>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kategori">Pilih Kategori Produk</label>
                            <select name="kategori" id="kategori" class="form-control" required="required">
                               <?php 
                                    $query_kategori = 'SELECT * FROM kategori';
                                    $db = connect_database();
                                    $tessi4 = mysqli_query($db, $query_kategori);
                                    while ($tes4=mysqli_fetch_assoc($tessi4)) {
                                      if($tes4['id_kategori']==$tes['id_kategori']){
                                        echo '<option value="' . $tes4['id_kategori'] . '" selected>' . $tes4['nama_kategori'] . '</option>';
                                      }
                                      else{
                                        echo '<option value="' . $tes4['id_kategori'] . '">' . $tes4['nama_kategori'] . '</option>';
                                      }
                                    }
                                 ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="sinopsis">Deskripsi Produk</label>
                            <textarea  id="sinopsis" name="sinopsis" class="form-control" placeholder="Kosongkan jika tidak ada perubahan"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="foto">Foto Produk</label>
                            <input name="foto" type="file" class="form-control" id="foto">
                        </div>
                    </div>
                </div>
                    <input type="submit" name="edit" class="btn btn-primary m-kiri m-bawah m-atas" value="Simpan Perubahan">
                </form>

                <?php } ?>
            <div> 
            </div>

    <?php include('need/footer.php'); ?>

            