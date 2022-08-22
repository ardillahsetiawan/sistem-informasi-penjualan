<nav class="navbar navbar-default">
  <div class="container">
    <ul class="nav navbar-nav">
      <li><a href="home.php">Home</a></li>
      <li><a href="index.php">Produk</a></li>
      <?php if (isset($_SESSION['pelanggan'])): ?>
        <li><a href="keranjang.php">Keranjang</a></li>
        <li><a href="riwayat.php">Riwayat</a></li>
        <li><a href="logout.php">Logout</a></li>
      <?php else: ?>
        <li><a href="login.php">Login</a></li>
        <li><a href="daftar.php">Daftar</a></li>
      <?php endif ?>
    </ul>
    <?php if (isset($_SESSION['pelanggan'])): ?>
    <form class="navbar-form navbar-right" action="pencarian.php" method="get">
      <input type="text" class="form-control" name="keyword">
      <button class="btn btn-primary">Cari</button>
    <?php endif ?>
    </form>
  </div>
</nav>
