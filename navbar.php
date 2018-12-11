<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="brand" href="./"><span class="iconn-text" style="color:#4387f5;"></span></a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li <?php echo basename($_SERVER['PHP_SELF'])=="index.php"?"class='active'":""; ?>><a href="./">Beranda</a></li>
          <li <?php echo basename($_SERVER['PHP_SELF'])=="list.php"?"class='active'":""; ?>><a href="list.php">Jalur</a></li>
          <li <?php echo basename($_SERVER['PHP_SELF'])=="listwisata.php"?"class='active'":""; ?>><a href="listwisata.php">Wisata</a></li>
          <li <?php echo basename($_SERVER['PHP_SELF'])=="gallery.php"?"class='active'":""; ?>><a href="gallery.php">Galeri</a></li>
          <li <?php echo basename($_SERVER['PHP_SELF'])=="faq.php"?"class='active'":""; ?>><a href="faq.php">Bantuan</a></li>
        <li class='dropdown <?php echo basename($_SERVER['PHP_SELF'])=="about.php"||basename($_SERVER['PHP_SELF'])=="team.php"?" active":""; ?>'><a href=# class='dropdown-toggle' data-toggle='dropdown'>Tentang <b class='caret'></b></a>
        <ul class="dropdown-menu">
          <li><a href="about.php">Aplikasi</a></li>
          <li><a href="team.php">Team</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav pull-right">
      <?php
      if(isset($_SESSION['username'])){
      echo "<li><a href=#>Welcome ".$_SESSION['username'].($_SESSION['level']=="1"?" <span class='label label-info'>Admin</span>":"")."</a></li>";
        if($_SESSION['level']=="1"){
        echo "<li><a href='admin.php'>Admin Page</a></li>";
        }
        ?>
        <li><a href="logout.php">Logout</a></li>
      <?php
      }
      else{
      ?>
      <a class="btn btn-primary" href="login.php">Masuk</a>
      <a class="btn btn-default" href="daftar.php">Daftar</a>
      <?php }
      ?>
    </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
</div>
<div class="jarak"></div>