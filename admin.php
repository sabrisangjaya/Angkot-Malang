<?php
session_start();
if (!isset($_SESSION['level'])){
  header('location: login.php');
}else{
if($_SESSION['level']!=1){
header("location: 403.php");
}
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <?php include "header.php"; ?>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <script>
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })
    </script>
    <style>
    .results tr[visible='false'],
    .no-result{
    display:none;
    }
    .results tr[visible='true']{
    display:table-row;
    }
    .counter{
    padding:8px;
    color:#ccc;
    /*Created by : Sabri Sangjaya*/
    }
    </style>
    <script>
    $(document).ready(function() {
    $('#angkotku').DataTable();
    } );
    $(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
    if(!$this.hasClass('panel-collapsed')) {
    $this.parents('.panel').find('.panel-body').slideUp();
    $this.addClass('panel-collapsed');
    $this.find('i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
    } else {
    $this.parents('.panel').find('.panel-body').slideDown();
    $this.removeClass('panel-collapsed');
    $this.find('i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
    }
    })
    </script>
    
  </head>
  <body>
    <?php include "navbar.php"; ?>
    <div class="container">
      <br/>
      <div class="row">
        <div class="col-md-6">
          <div class="panel-collapsed panel panel-default">
            <div class="panel-heading">Tambahkan Jalur Angkot <span style="cursor:pointer;" class="pull-right clickable"><i class="fa fa-chevron-up"></i></span></div>
            <div class="panel-body">
              <form method="post" action="">
                <div class="form-group">
                  <label for="namabarang">Kode Angkot</label>
                  <input type="text" name="kode" class="form-control" id="kodeangkot" placeholder="Masukan kode barang" required>
                </div>
                <div class="form-group">
                  <label for="namabarang">Nama Angkot</label>
                  <input type="text" name="nama" class="form-control" id="namaangkot" placeholder="Masukan nama barang" required>
                </div>
                <div class="form-group">
                  <label for="hargabelibarang">Keterangan Jalur Masuk</label>
                  <textarea name="ketjalurmasuk" id="jalurangkotmasuk"  rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label for="hargabelibarang">Keterangan Jalur Keluar</label>
                  <textarea name="ketjalurluar" id="jalurangkotluar"  rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                  <label for="hargabelibarang">URL Jalur</label>
                  <input type="text" name="urljalur" class="form-control" id="urljalur" placeholder="Masukan harga jual barang" required>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Submit</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">Info Website</div>
            <div class="panel-body">
              <?php
              include 'koneksi.php';
              if (isset($_POST['submit'])){
              $kode = $_POST['kode'];
              $nama = $_POST['nama'];
              $ketjalurmasuk = $_POST['ketjalurmasuk'];
              $ketjalurluar = $_POST['ketjalurluar'];
              $urljalur = $_POST['urljalur'];
              $sql = "INSERT INTO angkot(kode_angkot,nama_angkot,ket_masuk_angkot,ket_luar_angkot,urljalur_angkot) VALUES('$kode','$nama','$ketjalurmasuk','$ketjalurluar','$urljalur')";
              if ($result = mysqli_query($con, $sql)) {
              echo "<div class='alert alert-success' role=alert'>Data berhasil ditambahkan!</div><br/>";
              } else {
              echo "<div class='alert alert-danger' role=alert'>Error: ".mysqli_error($con)."</div><br/>";
              }
              }
              ?>
              <div class="col-md-4">
                <div class="panel panel-success text-center">
                  <div class="panel-heading">Jumlah Jalur</div>
                  <div class="panel-body">
                    <?php
                    $sql="SELECT * FROM  angkot";
                    $query = mysqli_query($con, $sql);
                    if($query!=null&&mysqli_num_rows($query)>0){
                    echo mysqli_num_rows($query);
                    }
                    ?>
                  </div></div></div>
                  <div class="col-md-4">
                    <div class="panel panel-warning text-center">
                      <div class="panel-heading">Jumlah User</div>
                      <div class="panel-body">
                        <?php
                        $sql="SELECT * FROM  user";
                        $query = mysqli_query($con, $sql);
                        if($query!=null&&mysqli_num_rows($query)>0){
                        echo mysqli_num_rows($query);
                        }else echo "0";
                        ?>
                      </div></div></div>
                      <div class="col-md-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">Data User</div>
                          <div class="panel-body">
                            <table class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th>Username</th>
                                  <th>Nama</th>
                                  <th>Telp</th>
                                  <th>Hak Akses</th>
                                </tr>
                              </thead>
                              <?php
                              include 'koneksi.php';
                              $sql="SELECT * FROM user";
                              $query = mysqli_query($con, $sql);
                              if($query!=null&&mysqli_num_rows($query)>0){
                              while($data = mysqli_fetch_array($query)) {
                              ?>
                              <tr>
                                <td><?php echo $data['username']; // menampilkan isi field nama ?></td>
                                <td><?php echo $data['nama']." ".$data['namabelakang']; // menampilkan isi field nama ?></td>
                                <td><?php echo $data['telp']; // menampilkan isi field nama ?></td>
                                <td><?php echo $data['level']==1?"Admin":"User"; // menampilkan isi field nama ?></td>
                              </tr>
                              <?php
                              }
                              }
                              ?>
                            </table>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">Data Jalur</div>
                    <div class="panel-body">
                      <table class="table table-bordered table-hover results" id="angkotku">
                        <thead>
                          <tr>
                            <th>Kode Angkot</th>
                            <th>Nama Angkot</th>
                            <th>Jalur Masuk</th>
                            <th>Jalur Keluar</th>
                            <th>Jalur</th><!-- sabri sangjaya -->
                          </tr>
                        </thead>
                        <?php
                        include 'koneksi.php';
                        $sql="SELECT * FROM  angkot";
                        $query = mysqli_query($con, $sql);
                        if($query!=null&&mysqli_num_rows($query)>0){
                        while($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                          <td><?php echo $data['kode_angkot']; // menampilkan isi field nama ?></td>
                          <td><?php echo $data['nama_angkot']; // menampilkan isi field nama ?></td>
                          <td><?php echo $data['Ket_masuk_angkot']; // menampilkan isi field nama ?></td>
                          <td><?php echo $data['Ket_luar_angkot']; // menampilkan isi field nama ?></td>
                          <td><a class="btn" href="detail.php?kodeangkot=<?php echo $data['urljalur_angkot']; ?>">Lihat Jalur »</a></td>
                        </tr>
                        <?php
                        }
                        }
                        ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </body>
        </html>