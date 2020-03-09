
<?php include('need/header.php'); ?>

<div class="aside" style="background-color: #EEEFEA; width: 100%; height: 60%;">
		<br><br>
            <div class="wow zoomIn">
            <form class="container well form-group form-horizontal" action="proses/login_proses.php" method="POST" role="form" style="max-width: 400px; text-align: center;background: #fff; border-radius:10px" >
                <br><fieldset>
                    <legend class="lead"><h2>Login</h2></legend><br>
                        <div class="form-group" class="col-md-12">
                            <label class="control-label col-md-0" style="float:left; margin-left:-10;margin-top:5px">Username</label>
                            <div class="col-md-9" style="float:right">
                                <input id="modlgn_username" type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                        </div><br><br>
                        <div class="form-group">
                            <label class="control-label col-md-0" style="float:left; margin-left:-10;margin-top:5px">Password</label>
                            <div class="col-md-9" style="float:right; margin-left:-5px">
                                <input id="modlgn_passwd" type="password" name="password" class="form-control" placeholder="Password" required> 
                            </div>
                        </div><br><br>
					<input type='submit' class='input btn btn-default' name="login" class="button" value='Login' style="margin-left: 270px;">
					<div class="remember" style="float:right">
					<p id="login-form-remember">
						<label for="modlgn_remember"><a href="register.php">Buat Akun Baru ?</a></label>
				 </p>
                </fieldset>
                
            </form>
            </div><br><br>
        </div>
<?php include('need/footer.php'); ?>