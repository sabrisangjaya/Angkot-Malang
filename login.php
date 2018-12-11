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
    <title>Angkot Malang</title>
    <?php include "header.php"; ?>
    <style>
    body {
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #E5E5E5;
    }
    .form-signin {
    border: 1px solid #D8D8D8;
    border-bottom-width: 2px;
    border-top-width: 0;
    background-color: #FFF;
    max-width: 350px;
    padding: 19px 29px 29px;
    margin: 50px auto 20px;
    background-color: #fff;
    border: 1px solid #F5F5F5;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    }
    .form-signin .form-signin-heading {
    font-size: 24px;
    font-weight: 300;
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
    margin-bottom: 10px;
    }
    .form-signin input[type="text"],
    .form-signin input[type="password"] {
    font-size: 16px;
    height: auto;
    margin-bottom: 15px;
    padding: 7px 9px;
    }
    </style>
  </head>
  <body>
    <?php include "navbar.php"; ?>
    <!-- Subhead
    ================================================== -->
    <div class="container">
      <div class="form-signin">
        <form  action="" method="post">
          <div style="text-align:center;color:#4387f5;">
            <span class="iconn-rpl" style="font-size: 10em;"></span>
            <h2 class="form-signin-heading">Silahkan Masuk</h2>
          </div>
          <input type="text" name="username" class="input-block-level" placeholder="Email address" required="required">
          <input type="password" name="password" class="input-block-level" placeholder="Password" required="required">
          <label class="checkbox">
            <input type="checkbox" value="remember-me"> Ingat saya
          </label>
          <button class="btn btn-primary" type="submit" name="submit">
          Masuk
          <i class="icon-circle-arrow-right"></i>
          </button>
        </form>
        <?php
        $error='';
        include "koneksi.php";
        if(isset($_POST['submit']))
        {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $error="";
        $stmt = $con->prepare("SELECT * FROM user WHERE username=? AND  password=? LIMIT 1");
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows == 0)  //To check if the row exists
        {
        $error = "Username atau Password tidak cocok dengan data yang didatabase ";
        }else{
        $sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
        $query = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($query);
        $_SESSION['username']=$row['username'];
        $_SESSION['level'] = $row['level'];
        if($_SESSION['level'] == 1)
        {
        ?>
        <script> location.replace("admin.php"); </script>
        <?php
        }
        else if($_SESSION['level'] == 2)
        {
        ?>
        <script> location.replace("list.php"); </script>
        <?php
        }
        else{
        $error = "Gagal Login";
        }
        }
        // }else $error = "Gagal Login";
        echo "<div class='alert alert-danger'><a class='close' data-dismiss='alert' href='#''>&times;</a>".$error."</div>";
        }
        // if(isset($_SESSION['username'])){
        //        header("Location: index.php");
        //       }
        ?>
        <p><br/>Belum punya akun? <a href="daftar.php">daftar disini</a> </p>
      </div>
      </div> <!-- /container -->
      <?php include "footer.php"; ?>
    </body>
  </html>