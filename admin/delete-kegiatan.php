<?php
require '../function.php';
$kd_k = $_GET['kd_kegiatan'];
    if (deleteKegiatan($kd_k) > 0) {
        echo "<script>alert('Data dengan kode kegiatan $kd_k berhasil dihapus.'); document.location.href='data-kegiatan.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus.'); document.location.href='data-kegiatan.php';</script>";
    }

?>