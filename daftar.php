<?php
if(!isset($_SESSION)) session_start();
if (isset($_SESSION['level'])){
?>
<script> location.replace("index.php"); </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Daftar</title>
		<?php include "header.php"; ?>
		<style>
		/*//body{background:#fff;}*/
		body { padding: 2em; }
		/* Shared */
		.loginBtn {
		box-sizing: border-box;
		position: relative;
		/* width: 13em;  - apply for fixed size */
		margin: 0.2em;
		padding: 0 15px 0 46px;
		border: none;
		text-align: left;
		line-height: 34px;
		white-space: nowrap;
		border-radius: 0.2em;
		font-size: 16px;
		width:100%;
		color: #FFF;
		}
		.loginBtn:before {
		content: "";
		box-sizing: border-box;
		position: absolute;
		top: 0;
		left: 0;
		width: 34px;
		height: 100%;
		}
		.loginBtn:focus {
		outline: none;
		}
		.loginBtn:active {
		box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
		}
		/* Facebook */
		.loginBtn--facebook {
		background-color: #4C69BA;
		background-image: linear-gradient(#4C69BA, #3B55A0);
		/*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
		text-shadow: 0 -1px 0 #354C8C;
		}
		.loginBtn--facebook:before {
		border-right: #364e92 1px solid;
		background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
		}
		.loginBtn--facebook:hover,
		.loginBtn--facebook:focus {
		background-color: #5B7BD5;
		background-image: linear-gradient(#5B7BD5, #4864B1);
		}
		/* Google */
		.loginBtn--google {
		/*font-family: "Roboto", Roboto, arial, sans-serif;*/
		background: #DD4B39;
		}
		.loginBtn--google:before {
		border-right: #BB3F30 1px solid;
		background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
		}
		.loginBtn--google:hover,
		.loginBtn--google:focus {
		background: #E74B37;
		}
		</style>
		<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-3182578-9']);
		_gaq.push(['_trackPageview']);
		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
		</script>
	</head>
	<body>
		<?php include "navbar.php"; ?>
		<!-- Subhead
		================================================== -->
		<div class="container">
			<div class="well row"  style="margin-top:50px">
				<div class="span3">
					<div style="text-align:center;color:#4387f5;margin-top:50px">
						<span class="iconn-rpl" style="font-size: 10em;"></span>
						<h2 class="form-signin-heading">Daftar</h2>
						<p>Daftar sebagai user untuk angkot malang</p>
					</div>
					<button class="loginBtn loginBtn--facebook">
					Sign up with Facebook
					</button>
					<button class="loginBtn loginBtn--google">
					Sign up with Google
					</button>
					<p><br/>Sudah punya akun? <a href="login.php">login disini</a> </p>
				</div>
				<div class="span8">
					<h2 class="form-signin-heading">Buat akun anda</h2>
					<hr/>
					<?php
					include 'koneksi.php';
					if (isset($_POST['submit'])){
					if(preg_match("/^[a-zA-Z\s]*$/", $_POST['namadepan'])||preg_match("/^[a-zA-Z\s]*$/", $_POST['namabelakang'])){
					if(strlen($_POST['password'])>=6){
					if($_POST['password']==$_POST['password_two']){
						$a=$_POST['email'];
						$b=md5($_POST['password']);
						$c=$_POST['namadepan'];
						$d=$_POST['namabelakang'];
						$e=$_POST['jeniskelamin'];
						$f=$_POST['telp'];
					$sql = "INSERT INTO user(username,password,nama,namabelakang,jenis_kelamin,telp,level) VALUES('$a','$b','$c','$d','$e','$f',2)";
					if ($result = mysqli_query($con, $sql)) {
					echo "<div class='alert alert-info'>";
							echo "Pendaftaran berhasil ".$_POST['namadepan']." silahkan konfirmasi email anda di ".$_POST['email']." lihat detail pendaftaran anda <a href='#modalinfo'  data-toggle='modal'> disini </a>";
					echo "</div>";
					?>
					<div id="modalinfo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h3 id="myModalLabel">Info pendaftaran</h3>
						</div>
						<div class="modal-body">
							<table><?php
								echo "<tr><td style='width:50%'>Nama</td><td style='width:50%'> : ".$_POST['namadepan']." ".$_POST['namabelakang']."</td></tr>";
								echo "<tr><td>Jenis Kelamin</td><td> : ".$_POST['jeniskelamin']."</td></tr>";
								echo "<tr><td>Email </td><td> : ".$_POST['email']."</td></tr>";
								echo "<tr><td>Password </td><td> : ".$_POST['password']."</td></tr>";
								echo "<tr><td>Telepon </td><td> : +62".$_POST['telp']."</td></tr>";
							?></table>
						</div>
						<div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						</div>
					</div>
					<?php
					}else $error="Email sudah terdaftar ";
					}else $error="Passsword tidak sama";
					}else $error="Password kurang dari 6 karakter";
					}else $error="Input nama hanya boleh alphabet saja";
					echo $error!=""?"<div class='alert alert-danger'><a class='close' data-dismiss='alert' href='#''>&times;</a>".$error."</div>":"";
					}
					?>
					<form class="form-horizontal" method="POST" action="">
						<div class="control-group">
							<label class="control-label" >Nama Depan</label>
							<div class="controls">
								<input class="input-medium" type="text" id="namadepan" name="namadepan" placeholder="Nama depan" pattern="[a-zA-Z\s]*" required="required">
								<span style="margin:0 20px"> Nama Belakang</span>
								<input class="input-medium" type="text" id="namabelakang" name="namabelakang" placeholder="Nama belakang" pattern="[a-zA-Z\s]*" required="required">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="jeniskelamin">Jenis Kelamin</label>
							<div class="controls">
								<label class="radio">
									<input type="radio" name="jeniskelamin"  value="Laki-laki" checked> Laki-laki
								</label>
								<label class="radio">
									<input type="radio" name="jeniskelamin" value="Perempuan"> Perempuan
								</label>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputEmail">Email</label>
							<div class="controls">
								<input class="input-xxlarge" type="email" name="email"  id="inputEmail" placeholder="Email">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="password">Password</label>
							<div class="controls">
								<input class="input-xxlarge" id="password" name="password" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Password" required>
								<span class="help-block">Minimal 6 karakter</span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="password_two">Ketik ulang Password</label>
							<div class="controls">
								<input class="input-xxlarge" id="password_two" name="password_two" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Verify Password" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="telp">Telp</label>
							<div class="controls">
								<div class="input-prepend">
									<span class="add-on">+62</span>
									<input class="span2" id="prependedInput" type="text" name="telp" placeholder="Nomor Telepon" pattern="^[0-9]*$">
								</div>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button type="submit" class="btn" name="submit">Daftar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			
			</div> <!-- /container -->
			<?php include "footer.php"; ?>
		</body>
	</html>