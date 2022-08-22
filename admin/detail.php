<h2>Detail Pembelian</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
  ON pembelian.id_pelanggan=pelanggan.id_pelanggan
  WHERE pembelian.id_pembelian='$_GET[id]'");
  $detail=$ambil->fetch_assoc();
?>

<strong>Nama Pelanggan : <?php echo $detail['nama_pelanggan']; ?></strong> <br>
No. Telepon : <?php echo $detail['telepon_pelanggan']; ?> <br>
Email : <?php echo $detail['email_pelanggan']; ?>
<p>
  Tanggal : <?php echo date("d F Y",strtotime($detail['tanggal_pembelian']))?> <br>
  Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>
</p>


<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Berat</th>
      <th>Harga</th>
      <th>Jumlah</th>
      <th>Total Berat</th>
      <th>Subtotal</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1; ?>
    <?php $totalberat=0; ?>
    <?php $totalbelanja=0; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON
      pembelian_produk.id_produk=produk.id_produk
      WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
      <?php while($pecah=$ambil->fetch_assoc()){ ?>
        <tr>
          <td><?php echo $nomor; ?></td>
          <td><?php echo $pecah['nama_produk']; ?></td>
          <td><?php echo number_format($pecah['berat_produk']); ?> Gr</td>
          <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
          <td><?php echo $pecah['jumlah']; ?></td>
          <td><?php echo number_format($pecah['berat_produk']*$pecah['jumlah']); ?> Gr</td>
          <td>Rp. <?php echo number_format($pecah['harga_produk']*$pecah['jumlah']); ?></td>
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
      <th colspan="5">Total</th>
      <th><?php echo number_format($totalberat) ?> Gr</th>
      <th>Rp. <?php echo number_format($totalbelanja) ?></th>
    </tr>
  </tfoot>
</table>
