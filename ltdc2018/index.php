<html>
	<head>
		<meta charset="UTF-8">
		<title>LTDC 2018</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="js/jquery-3.2.1.slim.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<style>
			body{
				background: rgba(227,233,199,1);
			}
			.isi{
				background: rgba(170,208,169,1);
			}


		</style>
	</head>
	<body>
		<?php
		include "config.php";
		?>
		<div class="container-fluid">
		<h1 style="font-family: Troika;font-size: 5em;color:rgba(140,100,31,1);margin:0" class="text-center">LTDC 2018</h1>
		<h1 style="font-family: Riffic Free Medium;font-size: 2em;color:rgba(47,135,0,1);margin:0" class="text-center">Journey of the Greatest Explorer</h1>
			<br/>
			<div class="row">
				<div class="col-md-6">
					<div class="card isi">
						<div class="card-body">
						<iframe src="<?php echo $alamatanalog;?>" frameborder="0" width="100%" height="300"></iframe>
							<h2 class="card-title text-center" style="font-family: Troika;font-size: 2em;color:rgba(140,100,31,1);" >Analog</h2>
							<p class="card-text text-center"">Some </p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card isi">
						<div class="card-body">
						<iframe src="<?php echo $alamatmikro;?>" frameborder="0" width="100%" height="300"></iframe>
							<h2 class="card-title text-center" style="font-family: Troika;font-size: 2em;color:rgba(140,100,31,1);" >Mikrokontroler</h2>
							<p class="card-text text-center"">Some </p>
						</div>
					</div>
				</div>					
			</div>
			<br/>
			
		</div>
	</body>
</html>