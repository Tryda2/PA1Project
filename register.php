<?php 
	include_once('proses/functions.php');
 ?>
 
<?php include('need/header.php'); ?>


	<div class="aside" style="background-color: #EEEFEA; width: 100%; height: 60%;">
		<br><br>
            <div class="wow zoomIn">
            <form class="container well form-group form-horizontal" action="proses/registrasi_proses.php" method="POST" role="form" style="max-width: 500px; text-align: center;background: #fff; border-radius:10px" >
                <br><fieldset>
                    <legend class="lead"><h2>Register</h2></legend><br>
                        <div class="form-group" class="col-md-12">
                            <label class="control-label col-md-0" style="float:left; margin-left:-10;margin-top:5px">Nama Depan</label>
                            <div class="col-md-9" style="float:right">
                                <input id="modlgn_username" type="text" name="nama_depan" class="form-control" placeholder="Nama Depan" required>
                            </div>
                        </div><br><br>
                        <div class="form-group">
                            <label class="control-label col-md-0" style="float:left; margin-left:-10;margin-top:5px">Nama Belakang</label>
                            <div class="col-md-9" style="float:right; margin-left:-5px">
                                <input id="modlgn_passwd" type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang" required> 
                            </div>
						</div><br><br>
						<div class="form-group" class="col-md-12">
                            <label class="control-label col-md-0" style="float:left; margin-left:-10;margin-top:5px">Username</label>
                            <div class="col-md-9" style="float:right">
                                <input id="modlgn_username" type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
						</div><br><br>
						<div class="form-group" class="col-md-12">
                            <label class="control-label col-md-0" style="float:left; margin-left:-10;margin-top:5px">Password</label>
                            <div class="col-md-9" style="float:right">
                                <input id="modlgn_username" type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
						</div><br><br>
						<div class="form-group" class="col-md-12">
                            <label class="control-label col-md-0" style="float:left; margin-left:-10;margin-top:5px">Ulang Password</label>
                            <div class="col-md-9" style="float:right">
                                <input id="modlgn_username" type="password" name="ulang_password" class="form-control" placeholder="Ulang Password" required>
                            </div>
						</div><br><br>
						<div class="form-group" class="col-md-12">
                            <label class="control-label col-md-0" style="float:left; margin-left:-10;margin-top:5px;margin-bottom:5px">Alamat</label>
                            <div class="col-md-9" style="float:right">
			                    <textarea class="form-control" name="alamat" placeholder="Alamat" required></textarea>
			                </div>
						</div><br><br>
						<div class="form-group" class="col-md-12">
                            <label class="control-label col-md-0" style="float:left; margin-left:-10;margin-top:15px">No HP</label>
                            <div class="col-md-9" style="float:right">
                                <input id="modlgn_username" type="text" name="no_hp" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="No HP(harus angka)" required>
                            </div>
						</div><br><br>
						
					<input type='submit' class='input btn btn-primary' name="registrasi" class="button" value='Daftar' style="margin-left:340px;width:100px"><br>
                </fieldset>
                <br>
            </form>
            </div><br><br>
        </div>
        <?php include('need/footer.php'); ?>