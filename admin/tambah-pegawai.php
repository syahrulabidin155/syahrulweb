<?php

include "templates/header.php";
include "templates/sidebar-pegawai.php";

  if (isset($_POST['submit'])) {
    if (insertpegawai($_POST) > 0) {
        echo "<script>
                alert('Pendaftaran berhasil'); window.location='data-pegawai.php';
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
            <h1>Tambah Data Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="data-pegawai.php">Data Pegawai</a></li>
            <li class="breadcrumb-item active">Tambah Data Pegawai</li>
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
            <div class="row">
              <div class="col-md-7">
              <label for="nipbps">NIP BPS :</label>
              <input type="text" name="nipbps" id="nipbps" class="form-control mb-3 bg-transparent" style="cursor: default;" placeholder="Masukkan NIP BPS">
              </div>
            </div>
            <div class="row">
              <div class="col-md-7">
              <label for="nip">NIP :</label>
              <input type="text" name="nip" id="nip" class="form-control mb-3 bg-transparent" style="cursor: default;" placeholder="Masukkan NIP">
              </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                  <label for="nama">Nama Lengkap :</label>
                  <input type="text" name="nama" id="nama" class="form-control mb-3 bg-transparent" style="cursor: default;" placeholder="Masukkan Nama Lengkap">
                </div>
            </div>
            <div class="row">
              <div class="col-md-7">
              <label for="kode">Kode Orang :</label>
              <input type="text" name="kode" id="kode" class="form-control mb-3 bg-transparent" style="cursor: default;" placeholder="Masukkan Kode Orang">
              </div>
            </div>
            <div class="row">
              <div class="col-md-7">
              <label for="jabatan">Jabatan :</label>
              <input type="text" name="jabatan" id="jabatan" class="form-control mb-3 bg-transparent" style="cursor: default;" placeholder="Masukkan Jabatan">
              </div>
            </div>
            <div class="row">
              <div class="col-md-7">
              <label for="wilayah">Wilayah :</label>
              <input type="text" name="wilayah" id="wilayah" class="form-control mb-3 bg-transparent" style="cursor: default;" placeholder="Masukkan Wilayah">
              </div>
            </div>
            <div class="row">
              <div class="col-md-7">
              <label for="gol">Golongan Akhir :</label>
              <input type="text" name="gol" id="gol" class="form-control mb-3 bg-transparent" style="cursor: default;" placeholder="Masukkan Golongan Akhir">
              </div>
            </div>
            <div class="row">
              <div class="col-md-7">
              <label for="status">Status :</label>
              <input type="text" name="status" id="status" class="form-control mb-3 bg-transparent" style="cursor: default;" placeholder="Masukkan Status">
              </div>
            </div>
              <div class="row">
                <div class="col-md-8 mt-2">
                  <button type="submit" value="submit" name="submit" class="btn btn-outline-success mr-2" style="width: 110px;">
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