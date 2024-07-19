<?php
include "templates/header.php";
include "templates/sidebar-pegawai.php"
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
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
            <a href="tambah-pegawai.php" class="btn btn-sm btn-outline-info mr-2" style="font-size: 15px; margin-bottom: 10px; width: 100px;"><i class="fas fa-plus mr-1"></i>Tambah</a>
              <thead align="center">
                <th>NIP BPS</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Kode Orang</th>
                <th>Jabatan</th>
                <th>Wilayah</th>
                <th>Golongan Akhir</th>
                <th>Status</th>
                <th>Action</th>
              </thead>
              <tbody align="center">
                <?php
                $data = query("SELECT * FROM pegawai");
                foreach ($data as $d) :
                ?>
                <tr>
                  <td><?= $d['nipbps']; ?></td>
                  <td><?= $d['nip']; ?></td>
                  <td><?= $d['nama']; ?></td>
                  <td><?= $d['kd_org']; ?></td>
                  <td><?= $d['jabatan']; ?></td>
                  <td><?= $d['wilayah']; ?></td>
                  <td><?= $d['gol_akhir']; ?></td>
                  <td><?= $d['status']; ?></td>
                  <td><a href="edit-pegawai.php?nipbps=<?= $d['nipbps']; ?>" class="btn btn-sm btn-outline-info mr-2" style="font-size: 15px; width: 80px;"><i class="fas fa-search mr-1"></i>Edit</a>
                      <a href="delete-pegawai.php?nipbps=<?= $d['nipbps']; ?>" class="btn btn-sm btn-outline-danger" style="font-size: 15px; width: 80px;"><i class="fas fa-trash-alt mr-1"></i>Delete</a>
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
