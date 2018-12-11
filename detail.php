<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Jalur <?php echo isset($_GET['kodeangkot'])?$_GET['kodeangkot']:"demo";?></title>
    <?php include "header.php"; ?>
  </head>
  <body>
    <?php include "navbar.php"; ?>
    <div class="container">
      <br/>
      <div class="row">
        <?php
        include 'koneksi.php';
        $kodeangkot = isset($_GET['kodeangkot'])?$_GET['kodeangkot']:"demo";
        // $sql="SELECT * FROM  angkot where kode_angkot='".$kodeangkot."'";
        //$sql="SELECT * FROM  angkot where kode_angkot='AL' OR 1=1'"; 
        // $query = mysqli_query($con, $sql);
        $stmt = mysqli_prepare($con, "SELECT * FROM angkot WHERE kode_angkot=?");
        if (!$stmt) {
        die('Query Error : '.mysqli_errno($con).
        ' - '.mysqli_error($con));
        }
        mysqli_stmt_bind_param($stmt, "s", $kodeangkot);
        mysqli_stmt_execute($stmt);
        $query=mysqli_stmt_get_result($stmt);
        if($query!=null&&mysqli_num_rows($query)>0){
        while($data = mysqli_fetch_array($query)) {
        ?>
        <div class="span8">
          <div class="card">
            <h2 class="card-heading simple">Peta Jalur <?php echo $data['kode_angkot'];?></h2>
            <div class="card-body">
              <ul class="breadcrumb">
                <li><a href="./">Home</a> <span class="divider">/</span></li>
                <li><a href="list.php">List jalur</a> <span class="divider">/</span></li>
                <li class="active"><?php echo $data['kode_angkot'];?></li>
              </ul>
              <div id="map" style="min-height: 350px;"></div>
              <script>
              function initMap() {
              var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 11
              });
              var ctaLayer = new google.maps.KmlLayer({
              url: 'http://angkotmalang.rf.gd/listjalur/<?php echo $data['urljalur_angkot'];?>.kml',
              map: map
              });
              }
              </script>
              <script async defer
              src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsL1-rERPexpCESrhw6ijXf5n4L2meo8s&callback=initMap">
              </script>
              <p><br/></p>
            </div>
            
          </div>
          
          <div class="card">
            <h2 class="card-heading simple">Jalur Masuk <?php echo $data['kode_angkot'];?></h2>
            <div class="card-body">
              <p><?php echo $data['Ket_masuk_angkot']; ?></p>
            </div>
          </div>
          <div class="card">
            <h2 class="card-heading simple">Jalur keluar <?php echo $data['kode_angkot'];?></h2>
            <div class="card-body">
              <p><?php echo $data['Ket_luar_angkot']; ?></p>
            </div>
          </div>
        </div>
        <div class="span4">
        
           <div class="card">
            <h2 class="card-heading simple">Pesan Angkot <?php echo $data['kode_angkot'];?></h2>
            <div class="card-body">
            <?php
        if(isset($_SESSION['level'])&&$_SESSION['level']==2){ ?>
            <form method="POST" action="">

              Jumlah Tempat duduk
              <input class="input" type="number" min="0" max="7" name="tmpduduk" placeholder="Jumlah tempat duduk"><br/>
              Keterangan<br/>
             <textarea rows="3" style="width:90%" name="Keterangan"></textarea>
             <button class="btn btn-info">Pesan </button>
            <form>
            <?php
          }else echo "<div class='alert alert-info'>Login Terlebih Dahulu untuk Memesan Angkot <a href='login.php'>klik disini</a> untuk login</div>"
        ?>
            </div>
          </div>
          



          <div class="card">
            <h2 class="card-heading simple"><?php echo $data['kode_angkot'];?></h2>
            <div class="card-body">
              <img src="gambarjalur/<?php echo $data['urlgambar'].".jpg";?>" alt="...">
              <p><br/><?php echo $data['nama_angkot'];?>
              <br/></p>
            </div>
          </div>
          
        </div>
        
        <?php
        }
        }
        ?>
      </div>
    </div>
    <?php include "footer.php"; ?>
  </body>
</html>