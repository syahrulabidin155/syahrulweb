<?php
include 'templates/header-coba.php';
require 'function.php';
// get data
// ambil data total
$get1 = mysqli_query($conn, "SELECT * FROM `surat_masuk`");
$count1 = mysqli_num_rows($get1);

// Kueri untuk tanggal terkecil
$getEarliest = mysqli_query($conn, "SELECT * FROM `surat_masuk` WHERE tanggal <> '' ORDER BY tanggal ASC LIMIT 1");
$countEarliest = mysqli_num_rows($getEarliest);

// Ambil data pertama dari hasil kueri yang sudah diurutkan
$rowEarliest = mysqli_fetch_assoc($getEarliest);
$earliestDate = ($rowEarliest && isset($rowEarliest['tanggal'])) ? $rowEarliest['tanggal'] : 'Data tidak tersedia';


// Kueri untuk tanggal terbesar
$getLatest = mysqli_query($conn, "SELECT * FROM `surat_masuk` WHERE tanggal <> '' ORDER BY tanggal DESC LIMIT 1");
$countLatest = mysqli_num_rows($getLatest);

// Ambil data pertama dari hasil kueri yang sudah diurutkan
$rowLatest = mysqli_fetch_assoc($getLatest);
$latestDate = ($rowLatest && isset($rowLatest['tanggal'])) ? $rowLatest['tanggal'] : 'Data tidak tersedia';


$get2 = mysqli_query($conn, "SELECT * FROM `buku_tamu`");
$count2 = mysqli_num_rows($get2);

// Kueri untuk tanggal terkecil
$getEarliest2 = mysqli_query($conn, "SELECT * FROM `buku_tamu` WHERE tgl_tamu <> '' ORDER BY tgl_tamu ASC LIMIT 1");
$countEarliest2 = mysqli_num_rows($getEarliest2);

// Ambil data pertama dari hasil kueri yang sudah diurutkan
$rowEarliest2 = mysqli_fetch_assoc($getEarliest2);
$earliestDate2 = ($rowEarliest2 && isset($rowEarliest2['tgl_tamu'])) ? $rowEarliest2['tgl_tamu'] : 'Data tidak tersedia';

// Kueri untuk tanggal terbesar
$getLatest2 = mysqli_query($conn, "SELECT * FROM `buku_tamu` WHERE tgl_tamu <> '' ORDER BY tgl_tamu DESC LIMIT 1");
$countLatest2 = mysqli_num_rows($getLatest2);

// Ambil data pertama dari hasil kueri yang sudah diurutkan
$rowLatest2 = mysqli_fetch_assoc($getLatest2);
$latestDate2 = ($rowLatest2 && isset($rowLatest2['tgl_tamu'])) ? $rowLatest2['tgl_tamu'] : 'Data tidak tersedia';

$get3 = mysqli_query($conn, "SELECT * FROM `pengaduan` WHERE status='Sedang diajukan'");
$count3 = mysqli_num_rows($get3);

$get4 = mysqli_query($conn, "SELECT * FROM `pengaduan` WHERE status='Sedang diproses'");
$count4 = mysqli_num_rows($get4);

$get5 = mysqli_query($conn, "SELECT * FROM `pengaduan` WHERE status='Selesai diproses'");
$count5 = mysqli_num_rows($get5);

// Kueri untuk tanggal terkecil
$getEarliest1 = mysqli_query($conn, "SELECT * FROM `pengaduan` WHERE tgl_lapor <> '' ORDER BY tgl_lapor ASC LIMIT 1");
$countEarliest1 = mysqli_num_rows($getEarliest1);

// Ambil data pertama dari hasil kueri yang sudah diurutkan
$rowEarliest1 = mysqli_fetch_assoc($getEarliest1);
$earliestDate1 = ($rowEarliest1 && isset($rowEarliest1['tgl_lapor'])) ? $rowEarliest1['tgl_lapor'] : 'Data tidak tersedia';


// Kueri untuk tanggal terbesar
$getLatest1 = mysqli_query($conn, "SELECT * FROM `pengaduan` WHERE tgl_lapor <> '' ORDER BY tgl_lapor DESC LIMIT 1");
$countLatest1 = mysqli_num_rows($getLatest1);

// Ambil data pertama dari hasil kueri yang sudah diurutkan
$rowLatest1 = mysqli_fetch_assoc($getLatest1);
$latestDate1 = $rowLatest1['tgl_lapor'];
$latestDate1 = ($rowLatest1 && isset($rowLatest1['tgl_lapor'])) ? $rowLatest1['tgl_lapor'] : 'Data tidak tersedia';

$get6 = mysqli_query($conn, "SELECT * FROM `pegawai`");
$count6 = mysqli_num_rows($get6);

// Kueri untuk tanggal terkecil
$getEarliest3 = mysqli_query($conn, "SELECT * FROM `laporan_kegiatan` WHERE tanggal <> '' ORDER BY tanggal ASC LIMIT 1");
$countEarliest3 = mysqli_num_rows($getEarliest3);

// Ambil data pertama dari hasil kueri yang sudah diurutkan
$rowEarliest3 = mysqli_fetch_assoc($getEarliest3);
$earliestDate3 = ($rowEarliest3 && isset($rowEarliest3['tanggal'])) ? $rowEarliest3['tanggal'] : 'Data tidak tersedia';


// Kueri untuk tanggal terbesar
$getLatest3 = mysqli_query($conn, "SELECT * FROM `laporan_kegiatan` WHERE tanggal <> '' ORDER BY tanggal DESC LIMIT 1");
$countLatest3 = mysqli_num_rows($getLatest3);

// Ambil data pertama dari hasil kueri yang sudah diurutkan
$rowLatest3 = mysqli_fetch_assoc($getLatest3);
$latestDate3 = ($rowLatest3 && isset($rowLatest3['tanggal'])) ? $rowLatest3['tanggal'] : 'Data tidak tersedia';

$get7 = mysqli_query($conn, "SELECT * FROM `laporan_kegiatan`");
$count7 = mysqli_num_rows($get7);



?>      
<div class="row my-4">
<div class="col-12 col-md-6 col-lg-6 mb-6 mb-lg-4">
    <div class="card bg-danger text-white">
    <h5 class="card-header">📧 Data Surat Masuk</h5>
        <div class="card-body">
            <h5 class="card-title">Total Surat Masuk : <?= $count1; ?></h5> <br>
            <h5 class="card-title" style="font-size: smaller;">Tangga Awal: <?= $earliestDate; ?></h5>
            <h5 class="card-title" style="font-size: smaller;">Tanggal Akhir: <?= $latestDate; ?></h5>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-6 mb-6 mb-lg-4">
    <div class="card bg-warning text-white">
    <h5 class="card-header">🫂 Data Tamu</h5>
        <div class="card-body">
            <h5 class="card-title">Total Tamu : <?= $count2; ?></h5> <br>
            <h5 class="card-title" style="font-size: smaller;">Tanggal Awal: <?= $earliestDate2; ?></h5>
            <h5 class="card-title" style="font-size: smaller;">Tanggal Akhir: <?= $latestDate2; ?></h5>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-6 mb-6 mb-lg-4">
    <div class="card bg-success text-white"> <!-- Tambahkan kelas warna bg-warning dan text-white -->
    <h5 class="card-header">📇 Data Pengaduan Barang</h5>
        <div class="card-body">
            <h5 class="card-title">Sedang Diajukan : <?= $count3; ?></h5>
            <h5 class="card-title">Sedang Diproses : <?= $count4; ?></h5>
            <h5 class="card-title">Selesai Diproses : <?= $count5; ?></h5> <br>
            <h5 class="card-title" style="font-size: smaller;">Tanggal Awal: <?= $earliestDate1; ?></h5>
            <h5 class="card-title" style="font-size: smaller;">Tanggal Akhir: <?= $latestDate1; ?></h5>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-6 mb-6 mb-lg-4">
    <div class="card bg-info text-white"> <!-- Tambahkan kelas warna bg-warning dan text-white -->
    <h5 class="card-header">🎫 Data Laporan Kegiatan</h5>
        <div class="card-body">
            <h5 class="card-title">Jumlah Pegawai : <?= $count6; ?></h5>
            <h5 class="card-title">Laporan yang Teruploud : <?= $count7; ?></h5>
            <h5 class="card-title" style="font-size: smaller;">Tanggal Awal: <?= $earliestDate3; ?></h5>
            <h5 class="card-title" style="font-size: smaller;">Tanggal Akhir: <?= $latestDate3; ?></h5>
        </div>
    </div>
</div>

<?php
include 'templates/footer.php';
?>
