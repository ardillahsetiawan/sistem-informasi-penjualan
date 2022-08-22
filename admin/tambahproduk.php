<?php
$datakategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc())
{
  $datakategori[]=$tiap;
}
 ?>

<h2>Tambah Produk</h2>
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Kategori</label>
    <select class="form-control" name="id_kategori">
      <option value="">- Pilih Kategori-</option>
      <?php foreach ($datakategori as $key => $value): ?>
        <option value="<?php echo $value['id_kategori'] ?>"><?php echo $value['nama_kategori'] ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control">
  </div>
  <div class="form-group">
      <label>Stok</label>
      <input type="number" name="stok" class="form-control">
    </div>
  <div class="form-group">
      <label>Berat (Gr)</label>
      <input type="number" name="berat" class="form-control">
  </div>
  <div class="form-group">
    <label>Harga</label>
    <input type="number" name="harga" class="form-control">
  </div>
    <div class="form-group">
      <label>Foto</label>
      <div class="letak-input" style="margin-bottom: 10px;">
        <input type="file" class="form-control" name="foto[]">
      </div>
      <span class="btn btn-primary btn-tambah">
        <i class="fa fa-plus"></i>
      </span>
  </div>
  <div class="form-group">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" rows="10"></textarea>
  </div>

  <button class="btn btn-primary" name="save"><i class="glyphicon glyphicon-saved"></i>Simpan</button>
  </div>
</form>
<?php
if (isset($_POST['save']))
{
  $namanamafoto = $_FILES['foto']['name'];
  $lokasilokasifoto = $_FILES['foto']['tmp_name'];
  move_uploaded_file($lokasilokasi[0],"../foto_produk/".$namanamafoto[0]);
  $koneksi->query("INSERT INTO produk (nama_produk,harga_produk,foto_produk,deskripsi_produk,stok_produk,berat_produk,id_kategori)
  VALUES ('$_POST[nama]','$_POST[harga]','$namanamafoto[0]','$_POST[deskripsi]','$_POST[stok]','$_POST[berat]','$_POST[id_kategori]')");

  $id_produk_barusan=$koneksi->insert_id;
  foreach ($namanamafoto as $key => $tiap_nama)
  {
    $tiap_lokasi = $lokasilokasifoto[$key];
    move_uploaded_file($tiap_lokasi, "../foto_produk/".$tiap_nama);
    $koneksi->query("INSERT INTO produk_foto (id_produk,nama_produk_foto)
    VALUES ('$id_produk_barusan','$tiap_nama')");
  }

  echo "<div class='alert alert-info'>Data Tersimpan</div>";
  echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
 ?>

 <script>
   $(document).ready(function(){
     $(".btn-tambah").on("click",function(){
       $(".letak-input").append("<input type='file' class='form-control' name='foto[]'>");
     })
   })
 </script>
