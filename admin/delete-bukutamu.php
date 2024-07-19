<?php
require '../function.php';
$kd_tamu = $_GET['kd_tamu'];
    if (deleteBukutamu($kd_tamu) > 0) {
        echo "<script>alert('Data dengan kode tamu $kd_tamu berhasil dihapus.'); document.location.href='data-bukutamu.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus.'); document.location.href='data-bukutamu.php';</script>";
    }

?>