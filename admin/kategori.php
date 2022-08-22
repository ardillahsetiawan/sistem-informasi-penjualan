<h2>Data Kategori</h2>
<br>
<?php
$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc())
{
  $semuadata[] = $tiap;
}

 ?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Kategori</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($semuadata as $key => $value): ?>

    <tr>
      <td><?php echo $key+1 ?></td>
      <td><?php echo $value['nama_kategori'] ?></td>
      <td>
        <a href="" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-edit"></i>Edit</a>
        <a href="" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i>Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<a href="" class="btn btn-primary">Tambah Data</a>
