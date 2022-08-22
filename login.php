<?php
session_start();
include 'koneksi.php';
 ?>
 <?php include 'menu.php'; ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta>
     <title>Login Pelanggan</title>
     <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
   </head>
   <body>


     <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading" align=center>
              <h3 class="panel-title"><strong>Login Pelanggan</strong></h3>
          </div>
          <div class="panel-body">
            <form method="post">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Masukkan Email Anda">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan Password Anda">
              </div>
              <button class="btn btn-primary" name="login">Login</button>
            </form>
          </div>
          </div>
        </div>
      </div>
     </div>


<?php
if(isset($_POST['login']))
{
  $email=$_POST['email'];
  $password=$_POST['password'];
  $ambil=$koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
  $akunyangcocok=$ambil->num_rows;
  if ($akunyangcocok==1)
  {
    $akun=$ambil->fetch_assoc();
    $_SESSION['pelanggan'] = $akun;
    echo"<script>alert('Anda Berhasil Login!');</script>";

    if (isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang']))
    {
      echo"<script>location='checkout.php';</script>";
    }
    else
    {
      echo"<script>location='home.php';</script>";
    }
  }
  else {
    echo"<script>alert('Anda Gagal Login!');</script>";
    echo"<script>location='login.php';</script>";
  }
}

 ?>

   </body>
 </html>
