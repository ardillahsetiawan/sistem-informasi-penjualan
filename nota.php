<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Nota Pembelian</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
  </head>
  <body>

   <?php include 'menu.php'; ?>

  <section class="konten">
    <div class="container">

      <h2>Detail Pembelian</h2>
      <?php
      $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
        ON pembelian.id_pelanggan=pelanggan.id_pelanggan
        WHERE pembelian.id_pembelian='$_GET[id]'");
        $detail=$ambil->fetch_assoc();
      ?>

      <?php
      $idpelangganyangbeli = $detail ['id_pelanggan'];
      $idpelangganyanglogin = $_SESSION ['pelanggan']['id_pelanggan'];

      if ($idpelangganyangbeli!==$idpelangganyanglogin)
      {
        echo"<script>location='riwayat.php';</script>";
        exit();
      }
       ?>

      <div class="row">
        <div class="col-md-4">
          <h3>Pelanggan</h3>
          <strong>Nama : <?php echo $detail['nama_pelanggan']; ?></strong><br>
          No.Telepon : <?php echo $detail['telepon_pelanggan']; ?><br>
          Email : <?php echo $detail['email_pelanggan']; ?>
          </p>
        </div>
        <div class="col-md-4">
          <h3>Pembelian</h3>
          <strong>No. Pembelian : <?php echo $detail['id_pembelian']; ?></strong><br>
          Tanggal : <?php echo date("d F Y",strtotime($detail['tanggal_pembelian'])); ?><br>
          Total Pembelian : Rp. <?php echo number_format($detail['total_pembelian']); ?><br>
          Ongkos Kirim : Rp. <?php echo number_format($detail['ongkir']); ?><br>
          <strong>Subtotal : Rp. <?php echo  number_format($detail['total_pembelian']); ?></strong>
        </div>

        <div class="col-md-4">
          <h3>Pengiriman</h3>
          <strong>
          <?php echo $detail['provinsi']; ?>,
          <?php echo $detail['tipe']; ?> <?php echo $detail['distrik']; ?>
          </strong><br>
          Alamat : <?php echo $detail['alamat_pengiriman']; ?><br>
          Ekspedisi : <?php echo $detail['ekspedisi'] ?> <?php echo $detail['paket'] ?> <?php echo $detail['estimasi'] ?><br>
          KodePos : <?php echo $detail['kodepos']; ?> <br>
        </div>
      </div>
      <br>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Jumlah</th>
            <th>Total Berat</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomor=1; ?>
          <?php $totalberat=0; ?>
          <?php $totalbelanja=0; ?>

          <?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'");
           ?>
            <?php while($pecah=$ambil->fetch_assoc()){ ?>
              <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $pecah['nama']; ?></td>
                <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                <td><?php echo number_format($pecah['berat_produk']); ?> Gr</td>
                <td><?php echo $pecah['jumlah']; ?></td>
                <td><?php echo number_format($pecah['subberat']); ?> Gr</td>
                <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
              </tr>

              <?php $nomor++;
              $subberat = $pecah['subberat'];
              $totalberat+=$subberat;

              $subharga = $pecah['subharga'];
              $totalbelanja+=$subharga;
              ?>
            <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="6">Ongkir</th>
            <th>Rp. <?php echo number_format($detail['ongkir']) ?></th>
          </tr>
          <tr>
            <th colspan="5">Total Pembelian</th>
            <th><?php echo number_format($totalberat) ?> Gr</th>
            <th>Rp. <?php echo  number_format($detail['total_pembelian']); ?></th>
          </tr>
        </tfoot>
      </table>
      <div class="row">
        <div class="col-md-5">
          <div class="alert alert-info">
            <p>
              Silahkan melakukan pembayaran <strong>Rp. <?php echo  number_format($detail['total_pembelian']); ?></strong> ke <br>
              <strong>BANK BCA 7215076873 A.N ILNoise</strong><br><br>
              <a href="pembayaran.php?id=<?php echo $detail['id_pembelian']; ?>" class="btn btn-success">Lakukan Pembayaran</a>
            </p>
          </div>
        </div>
      </div>
    </body>
</html>
