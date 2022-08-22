<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['pelanggan']))
{
  echo"<script>alert('Silahkan Login!');</script>";
  echo"<script>location='login.php';</script>";
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Checkout</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <script src="admin/assets/js/jquery.min.js"></script>
  </head>
  <body>

   <?php include 'menu.php'; ?>


        <section class="konten">
          <div class="container">
            <h1>Keranjang Belanja</h1>
            <hr>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Produk</th>
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
                <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
                  <?php
                    $ambil = $koneksi->query("SELECT * FROM produk where id_produk = '$id_produk'");
                    $pecah = $ambil->fetch_assoc();
                    $subharga = $pecah['harga_produk']*$jumlah;
                    $subberat = $pecah['berat_produk']*$jumlah;
                    $totalberat+=$subberat;
                   ?>
                <tr>
                  <td><?php echo $nomor; ?></td>
                  <td><?php echo $pecah['nama_produk']; ?></td>
                  <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                  <td><?php echo number_format($pecah['berat_produk']); ?> Gr</td>
                  <td><?php echo $jumlah; ?></td>
                  <td><?php echo number_format($subberat); ?> Gr</td>
                  <td>Rp. <?php echo number_format($subharga); ?></td>
                </tr>
                <?php $nomor++; ?>
                <?php $totalbelanja+=$subharga; ?>
                <?php endforeach ?>
              </tbody>
              <tfoot>
                <tr>
                  <th colspan="5">Total Belanja</th>
                  <th><?php echo number_format($totalberat) ?> Gr</th>
                  <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                </tr>
              </tfoot>
            </table>

          <form method="post">

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>No. Telepon</label>
                  <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>" class="form-control">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" readonly value="<?php echo $_SESSION['pelanggan']['email_pelanggan'] ?>" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Alamat Lengkap Pengiriman</label>
              <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukkan alamat lengkap pengiriman"></textarea>
            </div>
            <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label>Provinsi</label>
              <select class="form-control" name="nama_provinsi">
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Kota/Kabupaten</label>
              <select class="form-control" name="nama_distrik">
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Ekspedisi</label>
              <select class="form-control" name="nama_ekspedisi">
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Paket</label>
              <select class="form-control" name="nama_paket">
              </select>
            </div>
          </div>
        </div>
        <input type="hidden" name="total_berat" value="<?php echo $totalberat; ?>">
        <input type="hidden" name="provinsi">
        <input type="hidden" name="distrik">
        <input type="hidden" name="tipe">
        <input type="hidden" name="kodepos">
        <input type="hidden" name="ekspedisi">
        <input type="hidden" name="paket">
        <input type="hidden" name="ongkir">
        <input type="hidden" name="estimasi">
            <button class="btn btn-primary" name="checkout">Checkout</button>
          </form>

          <?php
          if (isset($_POST['checkout']))
          {
            $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
            $tanggal_pembelian = date("y-m-d");
            $alamat_pengiriman = $_POST['alamat_pengiriman'];
            $total_berat = $_POST['total_berat'];
            $provinsi = $_POST['provinsi'];
            $distrik = $_POST['distrik'];
            $tipe = $_POST['tipe'];
            $kodepos = $_POST['kodepos'];
            $ekspedisi = $_POST['ekspedisi'];
            $paket = $_POST['paket'];
            $ongkir = $_POST['ongkir'];
            $estimasi = $_POST['estimasi'];


            $total_pembelian = $totalbelanja + $ongkir;

            $koneksi->query("INSERT INTO pembelian
              (id_pelanggan, tanggal_pembelian, total_pembelian, alamat_pengiriman, total_berat, provinsi, distrik, tipe, kodepos, ekspedisi, paket, ongkir, estimasi)
              VALUES ('$id_pelanggan','$tanggal_pembelian','$total_pembelian','$alamat_pengiriman','$total_berat','$provinsi','$distrik','$tipe','$kodepos','$ekspedisi','$paket','$ongkir','$estimasi') ");

            $id_pembelian_barusan = $koneksi->insert_id;
            foreach ($_SESSION['keranjang'] as $id_produk => $jumlah)
            {
              $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
              $perproduk = $ambil->fetch_assoc();

              $nama = $perproduk['nama_produk'];
              $harga = $perproduk['harga_produk'];
              $berat = $perproduk['berat_produk'];
              $subberat = $perproduk['berat_produk']*$jumlah;
              $subharga = $perproduk['harga_produk']*$jumlah;
              $koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah, nama, harga, subharga, berat_produk, subberat)
              VALUES ('$id_pembelian_barusan','$id_produk','$jumlah','$nama','$harga','$subharga','$berat','$subberat')");

              $koneksi->query("UPDATE produk SET stok_produk=stok_produk - $jumlah
                WHERE id_produk='$id_produk'");
            }

            unset($_SESSION['keranjang']);

            echo "<script>alert('Pembelian Sukses');</script>";
            echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";

          }
           ?>

          </div>
        </section>
  </body>
</html>

<script>
      $(document).ready(function(){
        $.ajax({
          type:'post',
          url:'dataprovinsi.php',
          success:function(hasil_provinsi)
          {
            $("select[name=nama_provinsi]").html(hasil_provinsi);
          }
        });
        $("select[name=nama_provinsi]").on("change",function(){
          var id_provinsi_terpilih = $("option:selected",this).attr("id_provinsi");
          $.ajax({
            type:'post',
            url:'datadistrik.php',
            data:'id_provinsi='+id_provinsi_terpilih,
            success:function(hasil_distrik)
            {
              $("select[name=nama_distrik]").html(hasil_distrik);
            }
          });
        });

        $.ajax({
          type:'post',
          url:'dataekspedisi.php',
          success:function(hasil_ekspedisi)
          {
            $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
          }
        });

        $("select[name=nama_ekspedisi]").on("change",function(){
          var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();
          var distrik_terpilih = $("option:selected","select[name=nama_distrik]").attr("id_distrik");
          var total_berat = $("input[name=total_berat]").val();
          $.ajax({
            type:'post',
            url:'datapaket.php',
            data:'ekspedisi='+ekspedisi_terpilih+'&distrik='+distrik_terpilih+'&berat='+total_berat,
            success:function(hasil_paket)
            {
              $("select[name=nama_paket]").html(hasil_paket);
              $("input[name=ekspedisi]").val(ekspedisi_terpilih);
            }
          })
        });

        $("select[name=nama_distrik]").on("change",function(){
          var prov = $("option:selected",this).attr("nama_provinsi");
          var dist = $("option:selected",this).attr("nama_distrik");
          var tipe = $("option:selected",this).attr("tipe_distrik");
          var kodepos = $("option:selected",this).attr("kodepos");
          $("input[name=provinsi]").val(prov);
          $("input[name=distrik]").val(dist);
          $("input[name=tipe]").val(tipe);
          $("input[name=kodepos]").val(kodepos);
        });

        $("select[name=nama_paket]").on("change",function(){
          var paket = $("option:selected",this).attr("paket");
          var ongkir = $("option:selected",this).attr("ongkir");
          var etd = $("option:selected",this).attr("etd");
          $("input[name=paket]").val(paket);
          $("input[name=ongkir]").val(ongkir);
          $("input[name=estimasi]").val(etd);
        })
      });
    </script>
