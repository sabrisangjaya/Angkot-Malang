<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>List Jalur Angkot</title>
    <?php include "header.php"; ?>
    <style>
    .card{
    min-height: 300px;
    }
    </style>
  </head>
  <body>
    <?php include "navbar.php"; ?>
    <div class="container containerbody">
      <br/>
      <div class="row">
        <div class="span12 text-center">
          <h2>List Jalur Angkot</h2>
        </div>
        <div class="span12">
          <ul class="breadcrumb">
            <li><a href="./">Home</a> <span class="divider">/</span></li>
            <li class="active">List Jalur</li>
          </ul>
          <h4>Cari berdasarkan jalan</h4>
    <form class="form-search" method="GET" action ="">
      <input type="text" class="input-large search-query" name="query">
      <button type="submit" class="btn">
         <i class="fa fa-search"></i>
      </button>
    </form>
          </div>
        </div>
        <div class="row">
          <?php
          include 'koneksi.php';
          $sql="SELECT * FROM  angkot";
          if(isset($_GET['query'])){
            $q=$_GET['query'];
            $sql.=" WHERE info like '%".$q."%' or Ket_masuk_angkot like '%".$q."%' or Ket_luar_angkot like '%".$q."%'";
          }
          $query = mysqli_query($con, $sql);
          if($query!=null&&mysqli_num_rows($query)>0){
            if(isset($_GET['query'])){
              echo "<div class='span12'><h3>".mysqli_num_rows($query)." Jalur Ditemukan berdasarkan kata '".$q."'</h3></div></div><div class='row'>";
            }
          while($data = mysqli_fetch_array($query)) {
          ?>
          <div class="span3">
            <div class="card">
              <h2 class="card-heading simple"><?php echo $data['kode_angkot'];?></h2>
              <div class="card-body">
                <img src="gambarjalur/<?php echo $data['urlgambar'].".jpg";?>" alt="..." href="#myModal<?php echo $data['kode_angkot'];?>"  data-toggle="modal">
                <p><?php echo $data['nama_angkot']; ?></p>
                <p>
                  <a class="btn btn-info" href="#myModal<?php echo $data['kode_angkot'];?>" role="button" class="btn" data-toggle="modal">Info</a>
                  <a class="btn" target="_BLANK" href="detail.php?kodeangkot=<?php echo $data['urljalur_angkot']; ?>">Lihat Jalur »</a></p>
                </div>
              </div>
            </div>
            <?php
            }
            }
            ?>
          </div>
          <?php
          $sql="SELECT * FROM  angkot";
          $query = mysqli_query($con, $sql);
          if($query!=null&&mysqli_num_rows($query)>0){
          while($data = mysqli_fetch_array($query)) {
          ?>
          <div id="myModal<?php echo $data['kode_angkot'];?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3 id="myModalLabel"><?php echo $data['kode_angkot'];?></h3>
              
            </div>
            <div class="modal-body">
              <ul class="breadcrumb">
                <li><a href="./">Home</a> <span class="divider">/</span></li>
                <li><a href="list.php" data-dismiss="modal">List jalur</a> <span class="divider">/</span></li>
                <li class="active"><?php echo $data['kode_angkot'];?></li>
              </ul>
              <img src="gambarjalur/<?php echo $data['urlgambar'].".jpg";?>" alt="...">
              <?php
              if(isset($_GET['query'])){
                $a1=$data['info'];
              $a1=preg_replace("/\w*?".preg_quote($_GET['query'])."\w*/i", "<span style='background:orange;'>$0</span>", $a1);
              echo "<p>asu<br/>".$a1."</p>";}

              else{
              ?>
              <p><br/><?php echo $data['info'];?></p>
              <?php
              }
              ?>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
              <a class="btn btn-primary" target="_BLANK" href="detail.php?kodeangkot=<?php echo $data['urljalur_angkot']; ?>">Lihat Jalur »</a>
            </div>
          </div>
          <?php
          }
          }
          ?>
        </div>
        <?php include "footer.php"; ?>
      </body>
    </html>