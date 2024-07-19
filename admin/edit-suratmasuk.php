<?php
include "templates/header.php";
include "templates/sidebar-suratmasuk.php";

if (isset($_POST['submit'])) {
  if (updateSuratmasuk($_POST) > 0) {
    echo "<script>alert('Data berhasil terupdate!'); window.location='data-suratmasuk.php';</script>";
    } else {
        echo "<script>alert('Data gagal diupdate!'); window.location='data-suratmasuk.php';</script>";
    }
  }

$kd = $_GET['kd_surat'];
$data = query("SELECT * FROM surat_masuk WHERE kd_surat = '$kd'");
foreach ($data as $d) :

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Data Surat Masuk <?= $d['kd_surat']; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="data-suratmasuk.php">Data Surat Masuk</a></li>
            <li class="breadcrumb-item active">Edit Data Surat Masuk</li>
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
              <label for="id">Kode Surat :</label>
              <input type="text" name="kd" id="kd" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['kd_surat']; ?>" readonly>
              </div>
              <div class="col-md-2">
              <label for="no_surat">Nomer Surat :</label>
              <input type="text" name="no_surat" id="no_surat" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['no_surat']; ?>">
              </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label for="tgl">Tanggal :</label>
                  <input type="text" name="tgl" id="tgl" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['tanggal']; ?>" readonly>
                </div>
                <div class="col-md-4">
                  <label for="nama_p">Nama Pengirim :</label>
                  <input type="text" name="nama_p" id="nama_p" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['nama_pengirim']; ?>" >
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <label for="pr">Perihal :</label>
                  <input type="text" name="pr" id="pr" class="form-control mb-3 bg-transparent" style="cursor: default;" value="<?= $d['perihal']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 mt-2">
                  <label for="ctt">Catatan :</label>
                  <textarea name="ctt" id="ctt" class="form-control mb-2"><?= $d['catatan']; ?></textarea>
                </div>
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