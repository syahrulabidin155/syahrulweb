<?php
require '../function.php';
$nip = $_GET['nipbps'];
    if (deletePegawai($nip) > 0) {
        echo "<script>alert('Data dengan NIP $nip berhasil dihapus.'); document.location.href='data-pegawai.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus.'); document.location.href='data-pegawai.php';</script>";
    }

?>