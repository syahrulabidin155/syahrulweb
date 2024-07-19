<?php
include "templates/header.php";
include "templates/sidebar-bukutamu.php"
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Buku Tamu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Buku Tamu</li>
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
                <th>Kode Tamu</th>
                <th>Tujuan Kunjuungan</th>
                <th>Nama Lengkap Pengunjung</th>
                <th>Jenis Kelamin</th>
                <th>Nomor Telepon</th>
                <th>Jenis Identitas Pengunjung</th>
                <th>Nomor Identitas Pengunjung</th>
                <th>Asal Instansi/Perusahaan/Lembaga Pengunjung</th>
                <th>Petugas Pelayanan</th>
                <th>Catatan Kunjungan</th>
                <th>Tanggal Tamu</th>
                <th>Action</th>
              </thead>
              <tbody align="center">
                <?php
                $data = query("SELECT * FROM buku_tamu");
                foreach ($data as $d) :
                ?>
                <tr>
                  <td><?= $d['kd_tamu']; ?></td>
                  <td><?= $d['tujuan_tamu']; ?></td>
                  <td><?= $d['nama_tamu']; ?></td>
                  <td><?= $d['jenis_kelamin']; ?></td>
                  <td><?= $d['nomor_tamu']; ?></td>
                  <td><?= $d['identitas_tamu']; ?></td>
                  <td><?= $d['noident_tamu']; ?></td>
                  <td><?= $d['asal_tamu']; ?></td>
                  <td><?= $d['petugas_tamu']; ?></td>
                  <td><?= $d['catatan_tamu']; ?></td>
                  <td><?= $d['tgl_tamu']; ?></td>
                  <td><a href="edit-bukutamu.php?kd_tamu=<?= $d['kd_tamu']; ?>" class="btn btn-sm btn-outline-info mr-2" style="font-size: 15px; width: 80px;"><i class="fas fa-search mr-1"></i>Edit</a>
                      <a href="delete-bukutamu.php?kd_tamu=<?= $d['kd_tamu']; ?>" class="btn btn-sm btn-outline-danger" style="font-size: 15px; width: 80px;"><i class="fas fa-trash-alt mr-1"></i>Delete</a>
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
