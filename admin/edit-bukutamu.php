<?php
include "templates/header.php";
include "templates/sidebar-bukutamu.php";

if (isset($_POST['submit'])) {
  if (updateBukutamu($_POST) > 0) {
    echo "<script>alert('Data berhasil terupdate!'); window.location='data-bukutamu.php';</script>";
    } else {
        echo "<script>alert('Data gagal diupdate!'); window.location='data-bukutamu.php';</script>";
    }
  }

$kt = $_GET['kd_tamu'];
$data = query("SELECT * FROM buku_tamu WHERE kd_tamu = '$kt'");
foreach ($data as $d) :

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Data Buku Tamu <?= $d['kd_tamu']; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="data-bukutamu.php">Data Buku Tamu</a></li>
            <li class="breadcrumb-item active">Edit Data Buku Tamu</li>
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
              <div class="col-md-2">
              <label for="kt">Kode Tamu :</label>
              <input type="text" name="kt" id="kt" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['kd_tamu']; ?>" readonly>
              </div>
              <div class="col-md-2">
              <label for="ttt">Tujuan Kunjungan :</label>
              <input type="text" name="ttt" id="ttt" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['tujuan_tamu']; ?>">
              </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label for="ntt">Nama Lengkap Pengunjung :</label>
                  <input type="text" name="ntt" id="ntt" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['nama_tamu']; ?>">
                </div>
                <div class="col-md-4">
                  <label for="jkt">Jenis Kelamin :</label>
                  <input type="text" name="jkt" id="jkt" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['jenis_kelamin']; ?>" >
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label for="nomortt">Nomor Telepon :</label>
                  <input type="text" name="nomortt" id="nomortt" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['nomor_tamu']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label for="itt">Jenis Identitas Pengunjung :</label>
                  <input type="text" name="itt" id="itt" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['identitas_tamu']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label for="noidenttt">Nomor Identitas Pengunjung :</label>
                  <input type="text" name="noidenttt" id="noidenttt" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['noident_tamu']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label for="att">Asal Instansi/Perusahaan/Lembaga Pengunjung :</label>
                  <input type="text" name="att" id="att" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['asal_tamu']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label for="ptt">Petugas Pelayanan :</label>
                  <input type="text" name="ptt" id="ptt" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['petugas_tamu']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 mt-2">
                  <label for="catatantt">Catatan Kunjungan:</label>
                  <textarea name="catatantt" id="catatantt" class="form-control mb-2"><?= $d['catatan_tamu']; ?></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label for="tglt">Tanggal :</label>
                  <input type="text" name="tglt" id="tglt" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['tgl_tamu']; ?>" readonly>
                </div>
              <div class="row">
                <div class="col-md-8 mt-2">
                  <button type="submit" value="submit" name="submit" class="btn btn-outline-success mr-2" style="width: 100px;">
                    <span class="fas fa-check mr-2"></span>
                    Save
                  </button>
                  <button type="reset" value="reset" class="btn btn-outline-danger mr-2" style="width: 100px;">
                    <span class="fas fa-times mr-2"></span>
                    Reset
                  </button>
                  <a href="#" class="btn btn-outline-primary" onclick="history.back()" style="width: 100px;">
                    <span class="fas fa-arrow-left mr-2"></span>
                    Back
                  </a>
                </div>
              </div>
          </div>
          </form>
        </div>
        <!-- /.card-body -->
        <?php
        endforeach;
        ?>
        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
<?php
include "templates/footer.php";
?>