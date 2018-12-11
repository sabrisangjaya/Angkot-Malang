<!doctype html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Detail <?php echo isset($data['nama_wisata'])?$data['nama_wisata']:"Wisata";?></title>
    <?php include "header.php"; ?>
  </head>
  <body>
    <?php include "navbar.php"; ?>
    <div class="container">
      <br/>
      <div class="row">
        <?php
        // include 'koneksi.php';
        // $kodeangkot = isset($_GET['kodeangkot'])?$_GET['kodeangkot']:"demo";
        // // $sql="SELECT * FROM  angkot where kode_angkot='".$kodeangkot."'";
        // //$sql="SELECT * FROM  angkot where kode_angkot='AL' OR 1=1'"; 
        // // $query = mysqli_query($con, $sql);
        // $stmt = mysqli_prepare($con, "SELECT * FROM angkot WHERE kode_angkot=?");
        // if (!$stmt) {
        // die('Query Error : '.mysqli_errno($con).
        // ' - '.mysqli_error($con));
        // }
        // mysqli_stmt_bind_param($stmt, "s", $kodeangkot);
        // mysqli_stmt_execute($stmt);
        // $query=mysqli_stmt_get_result($stmt);
        // if($query!=null&&mysqli_num_rows($query)>0){
        // while($data = mysqli_fetch_array($query)) {
        include 'koneksi.php';
$kodewisata = isset($_GET['id_wisata'])?$_GET['id_wisata']:"demo";
$stmt = mysqli_prepare($con, "SELECT * FROM wisata where id_wisata = ?");
if (!$stmt) {
die('Query Error : '.mysqli_errno($con).' - '.mysqli_error($con));
}
mysqli_stmt_bind_param($stmt, "s", $kodewisata);
mysqli_stmt_execute($stmt);
$query=mysqli_stmt_get_result($stmt);
if($query!=null&&mysqli_num_rows($query)>0){
while($data = mysqli_fetch_array($query)) {
        ?>
        <div class="span8">
          <div class="card">
            <h2 class="card-heading simple"> <?php echo $data['nama_wisata'];?></h2>
            <div class="card-body">
              <ul class="breadcrumb">
                <li><a href="./">Home</a> <span class="divider">/</span></li>
                <li><a href="listwisata.php">List Wisata</a> <span class="divider">/</span></li>
                <li class="active"><?php echo $data['nama_wisata'];?></li>
              </ul>

             
              <p><?php echo $data['desc_wisata']; ?></p>

            </div>
          </div>
        </div>
        <div class="span4">
        
           <div class="card">
            <h2 class="card-heading simple">Angkot Yang melewati <?php echo $data['nama_wisata'];?></h2>
            <div class="card-body">

            <?php
            $lst_rp = explode(',', $data['jalur_angkot']);
foreach($lst_rp as $rp_id) {
    $sql = "SELECT nama_angkot,kode_angkot FROM angkot WHERE kode_angkot='$rp_id'";
    $result1 = mysqli_query($con,$sql);    // THIS AND THE FOLLOWING MUST STAY INSIDE THE LOOP
    $row1 = mysqli_fetch_assoc($result1);
    echo "<a class='btn btn-info' href='detail.php?kodeangkot=".$row1['kode_angkot']."'>Lihat jalur : ".$row1['kode_angkot']."</a> <br/><br/>";
}
            ?>

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



