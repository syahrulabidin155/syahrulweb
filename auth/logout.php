<?php
session_start();
session_destroy();
echo "<script>alert('Berhasil logout dari SIM-BPS'); window.location='../index.php';</script>";