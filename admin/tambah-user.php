<?php

include "templates/header.php";
include "templates/sidebar-user.php";

// if (isset($_POST['submit'])) {
//   if (updateSuratmasuk($_POST) > 0) {
//     echo "<script>alert('Data berhasil terupdate!'); window.location='data-suratmasuk.php';</script>";
//     } else {
//         echo "<script>alert('Data gagal diupdate!'); window.location='data-suratmasuk.php';</script>";
//     }
//   }

  if (isset($_POST['register'])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('Pendaftaran berhasil'); window.location='index.php';
              </script>";
    }
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Tambah User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          <form action="" method="POST">
          <div class="col-md-12">
          <input type="hidden" class="form-control" name="id" id="id" required>
            <div class="row">
              <div class="col-md-7">
              <label for="id">Username :</label>
              <input type="text" name="username" id="username" class="form-control mb-3 bg-transparent" style="cursor: default;" placeholder="Masukkan Username">
              </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                  <label for="tgl">Password :</label>
                  <input type="password" name="password" id="password" class="form-control mb-3 bg-transparent" style="cursor: default;" placeholder="Masukkan Password">
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                  <label for="nama">Nama Lengkap :</label>
                  <input type="text" name="nama" id="nama" class="form-control mb-3 bg-transparent" style="cursor: default;" placeholder="Masukkan Nama Lengkap">
                </div>
            </div>
              <div class="row">
                <div class="col-md-8 mt-2">
                  <button type="submit" value="register" name="register" class="btn btn-outline-success mr-2" style="width: 110px;">
                    <span class="fas fa-check mr-2"></span>
                    Simpan
                  </button>
                  <button type="reset" value="reset" class="btn btn-outline-danger mr-2" style="width: 110px;">
                    <span class="fas fa-times mr-2"></span>
                    Reset
                  </button>
                  <a href="#" class="btn btn-outline-primary" onclick="history.back()" style="width: 110px;">
                    <span class="fas fa-arrow-left mr-2"></span>
                    Kembali
                  </a>
                </div>
              </div>
          </div>
          </form>
        </div>
        <!-- /.card-body -->
        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
<?php
include "templates/footer.php";
?>