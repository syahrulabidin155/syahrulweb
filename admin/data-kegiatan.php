<?php
include "templates/header.php";
include "templates/sidebar-kegiatan.php"
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Kegiatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Kegiatan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
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
            <table class="table table-hover" id="table" width="100%">
              <thead align="center">
                <th>Kode Kegiatan</th>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>File Kegiatan</th>
                <th>Action</th>
              </thead>
              <tbody align="center">
                <?php
                $data = query("SELECT * FROM pegawai JOIN laporan_kegiatan ON pegawai.nipbps = laporan_kegiatan.nipbps");
                foreach ($data as $d) :
                ?>
                <tr>
                  <td><?= $d['kd_kegiatan']; ?></td>
                  <td><?= $d['nipbps']; ?></td>
                  <td><?= $d['nama']; ?></td>
                  <td>
                      <?php
                      $fileUrl = $d['file_kegiatan']; // Ambil URL file dari database
                      if (!empty($fileUrl)) {
                          $fileName = basename($fileUrl); // Ambil nama file dari URL
          
                          echo '<a href="../' . $fileUrl . '" class="btn btn-sm btn-outline-secondary" style="font-size: 15px; width: 120px;" download="' . $fileName . '"><i class="fas fa-download mr-1"></i>Download</a>';
                      } else {
                          echo 'Tidak ada file';
                      }
                      ?>
                  </td>
                  <td>
                      <a href="delete-kegiatan.php?kd_kegiatan=<?= $d['kd_kegiatan']; ?>" class="btn btn-sm btn-outline-danger" style="font-size: 15px; width: 80px;"><i class="fas fa-trash-alt mr-1"></i>Delete</a>
                  </td>
                </tr>
                <?php
                endforeach;
                ?>
              </tbody>
              
            </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      </div> 
      <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<?php
include "templates/footer.php";
?>
