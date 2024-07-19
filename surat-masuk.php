<?php
include 'templates/header.php';
require 'function.php';
if (isset($_POST['submit'])) {
    if (insertSuratmasuk($_POST) > 0) {
        echo "<script>alert('Surat masuk berhasil tersimpan.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Surat masuk gagal tersimpan.'); window.location='surat-masuk.php';</script>";
    }
}

$query = mysqli_query($conn, "SELECT max(kd_surat) as kodeTerbesar FROM surat_masuk");
$r = mysqli_fetch_array($query);
$kodeBarang = $r['kodeTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeBarang, 4, 4);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "SM";
$kodeBarang = $huruf . sprintf("%04s", $urutan);
?>      
      <h1 style="margin-top: -40px;">Form Surat Masuk</h1>
      <form action="" method="POST">
        <div class="form-row p-3">
          <div class="form-group">
              <label for="id">Kode Surat</label>
              <input type="text" name="kd_surat" id="kd_surat" class="form-control" value="<?= $kodeBarang; ?>" style="cursor: default; width: 600px;" readonly>
          <div>
          <div class="form-group">
              <label for="nama">Nomor Surat</label>
              <input type="text" name="no_surat" id="no_surat" class="form-control"  required>
          <div>
          <div class="form-group">
              <label for="dept">Nama Pengirim</label>
              <input type="text" name="nama" id="nama" class="form-control" required>
          <div>
          <div class="form-group">
              <label for="nama_barang">Perihal</label>
              <input type="text" name="perihal" id="perihal" class="form-control" required>
          <div>
          <div class="form-group">
              <label for="ket">Catatan</label>
              <textarea name="catatan" id="catatan" class="form-control" required></textarea>
          <div>
          <button class="btn btn-outline-success mt-3 mr-3" type="submit" name="submit" style="width: 100px;"><span class="fas fa-paper-plane mr-2"></span>Kirim</button>
          <button class="btn btn-outline-danger mt-3" type="reset" name="reset" style="width: 130px;"><span class="fas fa-undo mr-2"></span>Reset Form</button>
        </div>
      </form>
      
<?php
include 'templates/footer.php';
?>
