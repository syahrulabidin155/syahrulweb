<?php
include 'templates/header.php';

?>      
  <h1 class="display-5">Pendataan surat masuk</h1>
  <div class="jumbotron-search">
    <form action="search-suratmasuk.php" method="POST">
      <p class="lead" style="margin-bottom: -1px;">Silahkan cek apakah surat sudah terdaftar!</p>
    <input type="text" name="keyword" id="keyword" placeholder="Masukkan nomor surat disini">
    <button type="submit" class="btn btn-primary search-button" value="cari"><span class="fas fa-search mr-2"></span>Cek</button>
    </form>
    <p class="lead mt-2">atau masukkan surat</p>
    <a href="surat-masuk.php" class="btn btn-primary sub-button"><span class="fas fa-chevron-right mr-2"></span>Disini</a>
  </div>
<?php
include 'templates/footer.php';
?>
