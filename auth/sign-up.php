<?php
require '../function.php';

if (isset($_POST['register'])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('Pendaftaran berhasil'); window.location='login.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | SIM BPS</title>
    <!-- icon bps -->
    <link rel="icon" href="../assets/dist/img/bps-logo.jpg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/plugins/bootstrap4/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="row content">
            <div class="col-md-6 mb-3">
                <img src="../assets/img/login-img.svg" class="img-fluid mb-3" alt="login image">
            </div>
            <div class="col-md-6" style="margin-top: -30px;">
                <a class="btn logo" href="../index.php">SIM BPS</a>
                <img src="../assets/dist/img/bps-logo.jpg" width="40" height="40">
                <p class="lead">Dinas Badan Pusat Statistik SIDOARJO</p>
                <h4 class="signin-text mb-3">Sign Up</h4>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <button class="btn btn-signin" value="register" name="register">Register</button>
                    <hr> 
                    <p>Sudah memiliki akun? Login disini!</p>
                    <a href="login.php" class="btn btn-signup">Sign in</a>
                </form>
            </div>
        </div>
    </div>
<!-- JavaScript -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/bootstrap4/js/bootstrap.min.js"></script>
</body>
</html>