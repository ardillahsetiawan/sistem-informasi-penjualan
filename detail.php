<?php session_start(); ?>
<?php
include 'koneksi.php'
?>

<?php
$id_produk = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();
?>

<?php
$fotoproduk = array();
$ambilfoto = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$id_produk'");
while ($tiap = $ambilfoto->fetch_assoc())
{
  $fotoproduk[] = $tiap;
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Detail Produk</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
  </head>
  <body>

   <?php include 'menu.php'; ?>

        <section class="konten">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <img src="foto_produk/<?php echo $detail['foto_produk']; ?>" alt="" class="img-responsive">
                <div class="row">
                  <br>
                  <?php foreach ($fotoproduk as $key => $value): ?>
                    <div class="col-md-3 text-center">
                      <a href="foto_produk/<?php echo $value['nama_produk_foto'] ?>" target="_blank"><img src="foto_produk/<?php echo $value['nama_produk_foto'] ?>" alt="" class="img-responsive"></a>
                      <br>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="col-md-6">
                <h2><?php echo $detail['nama_produk'] ?></h2>
                <h4>Rp. <?php echo number_format($detail['harga_produk']); ?></h4>
                <h5>Stock : <?php echo $detail['stok_produk'] ?></h5>


                <form method="post">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" min="1" class="form-control" name="jumlah" max=<?php echo $detail['stok_produk']; ?> placeholder="Masukkan jumlah barang yang ingin dibeli">
                      <div class="input-group-btn">
                        <button class="btn btn-primary" name="beli">Beli</button>
                      </div>
                    </div>
                  </div>
                </form>



                <?php
                if(isset($_POST['beli']))
                {
                  $jumlah=$_POST['jumlah'];
                  $_SESSION['keranjang'][$id_produk] = $jumlah;

                  echo "<script>alert('Produk Telah Masuk Ke Keranjang');</script>";
                  echo "<script>location='keranjang.php';</script>";
                }
                 ?>

                <p><?php echo $detail['deskripsi_produk']; ?></p>
              </div>
            </div>
          </div>
        </section>

  </body>
</html>
