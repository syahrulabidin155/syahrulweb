<?php
include "templates/header-reportsm.php";
include "templates/sidebar-report.php";
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Report Harian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Report</a></li>
              <li class="breadcrumb-item active">Report Harian</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="card">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-book mr-3"></i>Data Surat Masuk</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="table-report" width="100%">
              <thead align="center">
              <th>Kode Surat</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Nama Pengirim</th>
                <th>Perihal</th>
                <th>Catatan</th>
              </thead>
              <tbody align="center">
                <?php
                if ($_POST['tgl1'] == '') {
                  echo "<script>alert('Anda belum menentukan tanggal awal'); window.location='filter-suratmasuk.php';</script>";
                } else if ($_POST['tgl2'] == '') {
                  echo "<script>alert('Anda belum menentukan tanggal akhir'); window.location='filter-suratmasuk.php';</script>";
                } else {
                $tgl1 = $_POST['tgl1'];
                $tgl2 = $_POST['tgl2'];
                $data = query("SELECT * FROM surat_masuk WHERE tanggal BETWEEN '$tgl1' AND '$tgl2'");
                }
                foreach ($data as $d) :
                ?>
                <tr>
                  <td><?= $d['kd_surat']; ?></td>
                  <td><?= $d['no_surat']; ?></td>
                  <td><?= $d['tanggal']; ?></td>
                  <td><?= $d['nama_pengirim']; ?></td>
                  <td><?= $d['perihal']; ?></td>
                  <td><?= $d['catatan']; ?></td>
                </tr>
                <?php
                endforeach;
                ?>
              </tbody>
              <tfoot align="center">
                <th>Kode Surat</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Nama Pengirim</th>
                <th>Perihal</th>
                <th>Catatan</th>
              </tfoot>
            </table>
          </div>
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