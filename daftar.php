<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Daftar</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
  </head>
  <body>
    <?php include 'menu.php'; ?>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Daftar Pelanggan</h3>
            </div>
            <div class="panel-body">
              <form class="form-horizontal" method="post">
                <div class="form-group">
                  <label class="control-label col-md-3">Nama</label>
                  <div class="col-md-7">
                    <input type="text" name="nama" class="form-control" required placeholder="Masukkan Nama Anda">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Email</label>
                  <div class="col-md-7">
                    <input type="email" name="email" class="form-control" required placeholder="Masukkan Email Anda">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Password</label>
                  <div class="col-md-7">
                    <input type="text" name="password" class="form-control" required placeholder="Masukkan Password Anda">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Alamat</label>
                  <div class="col-md-7">
                    <textarea name="alamat" class="form-control" required placeholder="Masukkan Alamat Anda"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">No Telepon</label>
                  <div class="col-md-7">
                    <input type="text" name="telepon" class="form-control" required placeholder="Masukkan No.Telepon Anda">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-7 col-md-offset-3">
                    <button class="btn btn-primary" name="daftar">Daftar</button>
                  </div>
                </div>
              </form>
              <?php
              if(isset($_POST['daftar']))
              {
                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $alamat = $_POST['alamat'];
                $telepon = $_POST['telepon'];

                $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");
                $yangcocok = $ambil->num_rows;
                if ($yangcocok==1)
                {
                  echo "<script>alert('Login GAGAL! Email sudah digunakan!');</script>";
                  echo "<script>location='daftar.php';</script>";
                }
                else
                {
                  $koneksi->query("INSERT INTO pelanggan
                  (email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan)
                  VALUES ('$email','$password','$nama','$telepon','$alamat')");

                  echo "<script>alert('Pendaftaran sukses!');</script>";
                  echo "<script>location='login.php';</script>";
                }
              }
               ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
