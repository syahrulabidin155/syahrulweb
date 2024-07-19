<?php
require '../function.php';
$kd_surat = $_GET['kd_surat'];
    if (deleteSuratmasuk($kd_surat) > 0) {
        echo "<script>alert('Data dengan kode surat $kd_surat berhasil dihapus.'); document.location.href='data-suratmasuk.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus.'); document.location.href='data-suratmasuk.php';</script>";
    }

?>