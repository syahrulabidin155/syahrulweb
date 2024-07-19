<?php
include "templates/header.php";
include "templates/sidebar-suratmasuk.php"
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Surat Masuk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Surat Masuk</li>
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
                <th>Kode Surat</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Nama Pengirim</th>
                <th>Perihal</th>
                <th>Catatan</th>
                <th>Action</th>
              </thead>
              <tbody align="center">
                <?php
                $data = query("SELECT * FROM surat_masuk");
                foreach ($data as $d) :
                ?>
                <tr>
                  <td><?= $d['kd_surat']; ?></td>
                  <td><?= $d['no_surat']; ?></td>
                  <td><?= $d['tanggal']; ?></td>
                  <td><?= $d['nama_pengirim']; ?></td>
                  <td><?= $d['perihal']; ?></td>
                  <td><?= $d['catatan']; ?></td>
                  <td><a href="edit-suratmasuk.php?kd_surat=<?= $d['kd_surat']; ?>" class="btn btn-sm btn-outline-info mr-2" style="font-size: 15px; width: 80px;"><i class="fas fa-search mr-1"></i>Edit</a>
                      <a href="delete-suratmasuk.php?kd_surat=<?= $d['kd_surat']; ?>" class="btn btn-sm btn-outline-danger" style="font-size: 15px; width: 80px;"><i class="fas fa-trash-alt mr-1"></i>Delete</a>
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
