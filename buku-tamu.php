<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM BPS</title>

    <!-- icon bps -->
    <link rel="icon" href="assets/dist/img/bps.jpg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap4/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css"> 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
</nav>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <img src="assets/img/homepage.svg">

<?php
require 'function.php';
if (isset($_POST['submit'])) {
    if (insertBukutamu($_POST) > 0) {
        echo "<script>alert('Data kunjungan berhasil tersimpan.'); window.location='buku-tamu.php';</script>";
    } else {
        echo "<script>alert('Data Kunjungan gagal tersimpan.'); window.location='buku-tamu.php';</script>";
    }
}

$query = mysqli_query($conn, "SELECT max(kd_tamu) as kodeTerbesar FROM buku_tamu");
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
$huruf = "KT";
$kodeBarang = $huruf . sprintf("%04s", $urutan);
?>      
      <h1 style="margin-top: -40px;">Buku Kunjungan</h1>
      <form action="" method="POST">
        <div class="form-row p-3">
          <div class="form-group">
              <label for="kd">Kode Tamu</label>
              <input type="text" name="kd_tamu" id="kd_tamu" class="form-control" value="<?= $kodeBarang; ?>" style="cursor: default;" readonly>
              <p class="text-sm">
          <div>
          <div class="form-group">
              <label for="tujuan">Tujuan Kunjungan</label>
              <input type="text" name="tujuan_tamu" id="tujuan_tamu" class="form-control"  required>
          <div>
          <div class="form-group">
              <label for="nama">Nama Lengkap Pengunjung</label>
              <input type="text" name="nama_tamu" id="nama_tamu" class="form-control" required>
          <div>
          <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <div>
                <input type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki" required>
                <label for="laki-laki">Laki-laki </label>
                
                <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" required>
                <label for="perempuan">Perempuan</label>
            </div>
          <div>
          <div class="form-group">
              <label for="nomor">Nomor Telepon</label>
              <input type="text" name="nomor_tamu" id="nomor_tamu" class="form-control" required>
        
          <div>
          <div class="form-group">
              <label for="identitas">Jenis Identitas Pengunjung</label>
              <input type="text" name="identitas_tamu" id="identitas_tamu" class="form-control" required>

          <div>
          <div class="form-group">
              <label for="nomor_identitas">Nomor Identitas Pengunjung</label>
              <input type="text" name="noident_tamu" id="noident_tamu" class="form-control" required>

          <div>
          <div class="form-group">
              <label for="asal">Asal Instansi/Perusahaan/Lembaga Pengunjung</label>
              <input type="text" name="asal_tamu" id="asal_tamu" class="form-control" required>

          <div>
          <div class="form-group">
              <label for="petugas">Petugas Pelayanan</label>
              <input type="text" name="petugas_tamu" id="petugas_tamu" class="form-control" required>

          <div>
          <div class="form-group">
              <label for="catatan">Catatan Kunjungan</label>
              <textarea name="catatan_tamu" id="catatan_tamu" class="form-control" required></textarea>

        
          <div>
          <button class="btn btn-outline-success mt-3 mr-3" type="submit" name="submit" style="width: 100px;"><span class="fas fa-paper-plane mr-2"></span>Kirim</button>
          <button class="btn btn-outline-danger mt-3" type="reset" name="reset" style="width: 130px;"><span class="fas fa-undo mr-2"></span>Reset Form</button>
        </div>
      </form>
      
<?php
include 'templates/footer.php';
?>
</body>
</html>