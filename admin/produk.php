<h2>Data Produk</h2>
<div style="color: white;
padding-top: 20px;
font-size: 16px;"> <a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a> </div>
<br>
  <table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Kategori</th>
      <th>Nama</th>
      <th>Stok</th>
      <th>Harga</th>
      <th>Foto</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM produk LEFT JOIN kategori on produk.id_kategori=kategori.id_kategori"); ?>
    <?php while ($pecah=$ambil->fetch_assoc()){ ?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah['nama_kategori'] ?></td>
      <td><?php echo $pecah['nama_produk'] ?></td>
      <td><?php echo $pecah['stok_produk'] ?></td>
      <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
      <td>
          <img src="../foto_produk/<?php echo $pecah['foto_produk'];?>" width="100">
      </td>
      <td>
          <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
          <a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>
          <a href="index.php?halaman=detailproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
      </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>
