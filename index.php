<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>ILNoise</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet">
  </head>
  <body>
  <?php include 'menu.php'; ?>

<!-- Konten -->
  <section class="konten">
    <div class="container">
      <h1 align=center>Produk Terbaru</h1>
      <br>
      <div class="row">

        <?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
        <?php while ($perproduk=$ambil->fetch_assoc()){; ?>

        <div class="col-md-3">
          <div class="thumbnail">
            <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>">
              <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt=""></a>
            <div class="caption">
              <h3><?php echo $perproduk['nama_produk']; ?></h3>
              <h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
              <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Beli</a>
              <a href="detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-default">Detail</a>
            </div>
          </div>
        </div>
        <?php } ?>

      </div>
    </div>
  </section>

  </body>
</html>
