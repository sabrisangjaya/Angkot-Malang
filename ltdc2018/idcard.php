<html>
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<script src="js/jquery-3.2.1.slim.min.js"></script>
		<script src="js/html2canvas.js"></script>
		<style>
		.frameidcard{
		width:7.3cm;
		height:10.5cm;
		border:1px solid black;
		background-color:black;
		background:url('img/idcard.png')no-repeat;
		background-size: contain;
		position: relative;
		margin:1px;
		font-weight: bold;
		}
		.frameidcard2{
		width:7.3cm;
		height:10.5cm;
		border:1px solid black;
		background-color:black;
		background:url('img/idcard2.jpg')no-repeat;
		background-size: contain;
		position: relative;
		margin:1px;
		}
		.foto1{
		width:3cm;
		height:4cm;
		position: absolute;
		top:4.5cm;
		left:0.5cm;
		}

		</style>
	</head>
	<body>
		<?php date_default_timezone_set("Asia/Jakarta");
		function katarandom($panjang){
		$kemungkinan=explode(" ","a b c d e f g h i j k l m n o p q r s t u v w x y z");
		$kata="";
		for ($i=0; $i <$panjang ; $i++) {
		$kata .= $kemungkinan[random_int(0,sizeof($kemungkinan)-1)];
		}
		return $kata;
		}
		?>
		<div id="input" style="width:50%;display:inline;float:left;">
		<?php
		for ($i=0; $i <10 ; $i++) { 
		?>

		<div class="frameidcard" >
			<div class="foto1" style="background:url('<?php echo "img/foto (".random_int(1,20).").jpg"?>');background-size: cover;">
				<div style="width:100%;height:100%;background:linear-gradient(to bottom, rgba(<?php echo random_int(0,255).",".random_int(0,255).",".random_int(0,255)?>,0.5) 0%, rgba(<?php echo random_int(0,255).",".random_int(0,255).",".random_int(0,255)?>,0.5) 100%);"></div>
			</div>
			<div class="nama"><?php echo katarandom(10)?></div>
			<div class="tim"><?php echo katarandom(10)?></div>
			<div class="instansi"><?php echo katarandom(10)?></div>
			<div class="kategori"><?php echo random_int(0, 1)?"Micro":"Analog";?></div>
		</div>
		<?php
		}

		?>
		</div>
		<style>
		.nama{
		width:3cm;
		height:0.75cm;
		border: 1px solid red;
		position: absolute;
		top:4.7cm;
		left:3.8cm;
		}
		.tim{
		width:3cm;
		height:0.75cm;
		border: 1px solid red;
		position: absolute;
		top:5.8cm;
		left:3.8cm;
		}
		.instansi{
		width:3cm;
		height:0.75cm;
		border: 1px solid red;
		position: absolute;
		top:6.9cm;
		left:3.8cm;
		}
		.kategori{
		width:3cm;
		height:0.75cm;
		border: 1px solid red;
		position: absolute;
		top:8cm;
		left:3.8cm;
		}
		</style>

		<div id="hasil" style="width:50%;display:inline;float:left;"></div>
		<script>
		var elements = document.getElementsByClassName('frameidcard');
		for (var i = 0; i < 10; i++) {
			html2canvas(elements[i]).then(canvas => {
		document.getElementById('hasil').appendChild(canvas);
		var image = canvas.toDataURL("image/png").replace(/^data:image\/[^;]+/, 'data:application/octet-stream');;
		var link = document.createElement('a');
		link.download = "<?php echo "gambar".random_int(0,255)."-".date("d-m-Y-His") ?>.png";
		link.href = image; 
		link.text="Download";
		document.getElementById('hasil').appendChild(link);
		document.getElementById('hasil').appendChild(document.createElement('br'));
		//link.click();
		//document.getElementById('hasil').removeChild(link);
		});
		}
		</script>
	</body>
</html>