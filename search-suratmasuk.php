<?php
include 'templates/header.php';
require 'function.php';
?>      
  <h1 class="display-4" style="margin-top: -50px;">Status Surat Masuk</h1>

  <div class="row">
    <div class="col">
        <?php
          $keyword = $_POST['keyword'];
          $data = query("SELECT * FROM surat_masuk WHERE no_surat = '$keyword'");
          if ($data) {
          foreach ($data as $d) :
        ?>
          <p>Kode Surat : <?= $d['kd_surat']; ?></p>
          <p>Nomor Surat : <?= $d['no_surat']; ?></p>
          <p>Tanggal : <?= $d['tanggal']; ?></p>
          <p>Nama Pengirim : <?= $d['nama_pengirim']; ?></p>
          <p>Perihal : <?= $d['perihal']; ?></p>
          <p>Catatan : <?= $d['catatan']; ?></p>
          
        <?php
        endforeach;
        } else {
            echo"<p>Data surat masuk tidak ditemukan.</p>";
        }
        ?>
        <br>
          <a href="cek-suratmasuk.php" class="btn btn-sm btn-primary" style="width: 100px;"><span class="fas fa-arrow-left mr-2"></span>Kembali</a>
    </div>
    
  </div>
<?php
include 'templates/footer.php';
?>
