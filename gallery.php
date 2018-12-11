<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <?php include "header.php"; ?>
    <link rel="stylesheet" href="assets/css/grid12.css">
  </head>
  <body>
    <?php include "navbar.php"; ?>
    <div class="container containerbody">
      <div class="row">
        
        <div class="col-md-12 text-center">
          <h2>Gallery</h2>
        </div>
        <div class="col-md-12">
          <ul class="breadcrumb">
            <li><a href="./">Home</a> <span class="divider">/</span></li>
            <li class="active">Gallery</li>
          </ul></div>
        </div>
        <div class="row">
          <br/><br/>
          <?php
          $a=array("Jalan-jalan bersama angkot","Quote of the day","Indonesia! Ayo kerja!","Hati-hati dijalan! Keselamatanmu lho","Budayakan membaca","Pinky Angkot","Naruto pernah naik angkot","Selfie dulu");
          $jml=sizeof($a);
          for($i=1;$i<=$jml;$i++){
            ?>
            <a class="fancybox" rel="gallery1" href="assets/img/angkotbig (<?php echo $i; ?>).jpg" title="<?php echo $a[$i-1]; ?>">
            <div class="col-md-3">
              <img src="assets/img/angkot (<?php echo $i; ?>).jpg" alt="" class="img-polaroid"/>
            </div>
            </a>
            <?php
          }
          ?>
          <script>
          $(document).ready(function() {
          $(".fancybox").fancybox({
          openEffect  : 'fade',
          closeEffect : 'fade'
          });
          });
          </script>      
        </div>  
      </div>
     <?php include "footer.php"; ?>
    </body>
  </html>