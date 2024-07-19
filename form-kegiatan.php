<?php
require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM BPS</title>

    <!-- icon bps -->
    <link rel="icon" href="assets/dist/img/bps-logo.jpg">
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
    <h2 style="margin-top: -40px;">Data Laporan Kegiatan Pegawai</h2>
    <div class="form-row p-3">
      <table class="table table-hover" id="table" width="100%">
              <thead>
                <th>No</th>
                <th>NIP</th>
                <th>Nama Pegawai</th>
              </thead>
              <tbody>
                <?php
                $data = mysqli_query($conn, "SELECT * FROM pegawai JOIN laporan_kegiatan ON pegawai.nipbps = laporan_kegiatan.nipbps");
                $count = 1;
                while($d = mysqli_fetch_array($data)){
                echo "<tr>
                  <td>$count</td>
                  <td>$d[nipbps] </td>
                  <td>$d[nama] </td>
                </tr>";
                $count++;
                }
                ?>
              </tbody>
            </table>
    </div><br><br><br>
            
<?php

function tambahLaporanKegiatan($kd_kegiatan, $nipbps, $file)
{
    global $conn;

    $uploadDirectory = "admin/uploud/"; 
    $uploadedFilePath = $uploadDirectory . basename($file['name']);
    
    if (move_uploaded_file($file['tmp_name'], $uploadedFilePath)) {
        $tanggal = date('Y-m-d'); // Tanggal saat ini
        $query = "INSERT INTO laporan_kegiatan (kd_kegiatan, nipbps, file_kegiatan, tanggal) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
    
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssss", $kd_kegiatan, $nipbps, $uploadedFilePath, $tanggal);
            $result = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
    
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}


// Usage example:
if (isset($_POST['submit'])) {
    $kd_kegiatan = $_POST['kd_kegiatan'];
    $nipbps = $_POST['nipbps'];
    $file = $_FILES['file'];

    if (tambahLaporanKegiatan($kd_kegiatan, $nipbps, $file)) {
        echo "<script>alert('Data laporan kegiatan berhasil tersimpan.'); window.location='form-kegiatan.php';</script>";
    } else {
        echo "<script>alert('Data laporan kegiatan gagal tersimpan.'); window.location='form-kegiatan.php';</script>";
    }
}

$queryy = mysqli_query($conn, "SELECT max(kd_kegiatan) as kodeTerbesar FROM laporan_kegiatan");
$r = mysqli_fetch_array($queryy);
$kode = $r['kodeTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
// $urutan = (int) substr($kode, 4, 4);

// // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
// $urutan++;
$urutan = (int) substr($kode, 2) + 1;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "KL";
$kodeb = $huruf . sprintf("%04s", $urutan);
?>
<h1 style="margin-top: -40px;">Form Laporan Kegiatan Pegawai</h1>
      <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
              <label for="kd">Kode Kegiatan</label>
              <input type="text" name="kd_kegiatan" id="kd_kegiatan" class="form-control" value="<?= $kodeb; ?>" style="cursor: default; width: 700px;" readonly>
              <p class="text-sm">
          <div>
          <div class="form-group">
              <label for="nip">NIP</label>
              <select class="form-control" name="nipbps"style="cursor: default; width: 700px;">
				<option value="" selected>- Pilih NIP Pegawai -</option>
				<?php
				$sqlnipbps = mysqli_query($conn, "SELECT * FROM pegawai ORDER BY nipbps ASC");
				while($p = mysqli_fetch_array($sqlnipbps)){
					echo "<option value='$p[nipbps]'>$p[nipbps]</option>";
				}
				?>	
				</select>
          <div>
          <div class="form-group">
              <label for="file">File Kegiatan</label>
                          
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" id="file">
                    <label class="custom-file-label" style="cursor: default; width: 700px;" for="file">Pilih file...</label>
                </div>
                       
            </div>         
          <button class="btn btn-outline-success mt-3 mr-3" type="submit" name="submit" style="width: 100px;"><span class="fas fa-paper-plane mr-2"></span>Kirim</button>
          <button class="btn btn-outline-danger mt-3" type="reset" name="reset" style="width: 130px;"><span class="fas fa-undo mr-2"></span>Reset Form</button>
        
      </form>
      
<?php
include 'templates/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</body>
</html>