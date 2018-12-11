<!doctype html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Wisata</title>
    <?php include "header.php"; ?>
  </head>
  <body>
    <?php 
    include "navbar.php";
                    function html_cut($text, $max_length)
                {
                $tags   = array();
                $result = "";
                $is_open   = false;
                $grab_open = false;
                $is_close  = false;
                $in_double_quotes = false;
                $in_single_quotes = false;
                $tag = "";
                $i = 0;
                $stripped = 0;
                $stripped_text = strip_tags($text);
                while ($i < strlen($text) && $stripped < strlen($stripped_text) && $stripped < $max_length)
                {
                $symbol  = $text{$i};
                $result .= $symbol;
                switch ($symbol)
                {
                case '<':
                $is_open   = true;
                $grab_open = true;
                break;
                case '"':
                if ($in_double_quotes)
                $in_double_quotes = false;
                else
                $in_double_quotes = true;
                break;
                case "'":
                if ($in_single_quotes)
                $in_single_quotes = false;
                else
                $in_single_quotes = true;
                break;
                case '/':
                if ($is_open && !$in_double_quotes && !$in_single_quotes)
                {
                $is_close  = true;
                $is_open   = false;
                $grab_open = false;
                }
                break;
                case ' ':
                if ($is_open)
                $grab_open = false;
                else
                $stripped++;
                break;
                case '>':
                if ($is_open)
                {
                $is_open   = false;
                $grab_open = false;
                array_push($tags, $tag);
                $tag = "";
                }
                else if ($is_close)
                {
                $is_close = false;
                array_pop($tags);
                $tag = "";
                }
                break;
                default:
                if ($grab_open || $is_close)
                $tag .= $symbol;
                if (!$is_open && !$is_close)
                $stripped++;
                }
                $i++;
                }
                while ($tags)
                $result .= "</".array_pop($tags).">";
                return $result;
                }

    ?>
    <div class="container">
      <br/>
      <div class="row">
        <?php
        include 'koneksi.php';

        $kodewisata = isset($_GET['id_wisata'])?$_GET['id_wisata']:"demo";
        $stmt = mysqli_prepare($con, "SELECT * FROM wisata");
        if (!$stmt) {
        die('Query Error : '.mysqli_errno($con).' - '.mysqli_error($con));
        }
        mysqli_stmt_execute($stmt);
        $query=mysqli_stmt_get_result($stmt);
        if($query!=null&&mysqli_num_rows($query)>0){
           $axyz=1;
        while($data = mysqli_fetch_array($query)) {
        ?>
        <div class="span8">
          <div class="card">
            <a href="<?php echo "wisata.php?id_wisata=".$data['id_wisata'];?>"><h2 class="card-heading simple"> <?php echo $data['nama_wisata'];?></h2></a>
            <div class="card-body">
              <ul class="breadcrumb">
                <li><a href="./">Home</a> <span class="divider">/</span></li>
                <li><a href="listwisata.php">List Wisata</a> <span class="divider">/</span></li>
                <li class="active"><?php echo $data['nama_wisata'];?></li>
              </ul>
              
              <p style="text-align:justify;"><?php
              echo substr(strip_tags($data['desc_wisata']),0,400)."... <br/><br/>";
              ?>
              </p>
              <p style="text-align:right;">
                 <a href="<?php echo "wisata.php?id_wisata=".$data['id_wisata'];?>" class="btn btn-info">Baca selengkapnya</a>
              </p>
            </div>
          </div>
        </div>
        <?php
        if($axyz===1){
          ?>
              <div class="span4">
        
           <div class="card">
            <h2 class="card-heading simple">Iklan</h2>
            <div class="card-body">
            <p>
            <img src="https://dummyimage.com/600x400/000000/ffffff&text=Taruh+iklan+anda+disini"></p>
            </div>
          </div>          
        </div>

          <?php
          $axyz++;
        }
        }
        }
        ?>
      </div>
    </div>
    <?php include "footer.php"; ?>
  </body>
</html>