        <!-- Custom styles for this page -->
        <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- Page level plugins -->
        <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="row">
              <div class="col">
                <h3 class="h3 text-gray-800 mb-1"><?= $ibadah['nama'];
                                                  echo "\n"; ?>
                  <h5><?= tgl_indo($ibadah['tanggal'], true) ?></h5>
              </div>
            </div>
            <a href="<?= base_url('Admin/tutupDaftarOnsite/') . $ibadah['kode'] ?>" class="btn btn-success shadow-sm"><i class="fas fa-times fa-sm text-white mr-1"></i> TUTUP KEHADIRAN</a>
          </div>

          <!-- DataTales Example -->
          <?= $this->session->flashdata('message'); ?>
          <div class="card shadow mb-4">
            <div class="card-body" id="daftarHadir">
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link" href="<?= base_url('Admin/tambahKehadiran/') . $ibadah['kode'] ?>">Tambah Kehadiran</a>
                <a class="nav-item nav-link" href="<?= base_url('Admin/jemaatTerdaftar/') . $ibadah['kode'] ?>">Daftar Kehadiran</a>
                <a class="nav-item nav-link active font-weight-bold" href="#">Kehadiran Simpatisan</a>
              </div>
              <div class="tab-content">
                <div class="tab-pane fade show active">
                  <form action="<?= base_url('Admin/submitTambahSimpatisan/').$ibadah['kode'] ?>" method="POST">
                    <ul class="list-group">
                      <li class="list-group-item">
                        <label for="Nama" class="font-weight-bold">Nama</label>
                        <input type="text" class="form-control d-block" id="nama" name="nama" autocomplete="off" required>
                      </li>
                      <li class="list-group-item">
                        <label for="Alamat" class="font-weight-bold">Alamat</label>
                        <input type="text" class="form-control d-block" id="alamat" name="alamat" autocomplete="off" required>
                      </li>
                      <hr>
                      <!-- <div class="d-inline float-right align-items-center justify-content-end">
                        <a href="<?= base_url('Admin') ?>" class="mr-4 text-secondary" id="batal"><small>BATAL</small></a>
                        <button type="submit" class="btn btn-success btn-sm" id="simpan">TAMBAH KEHADIRAN
                        </button>
                      </div> -->
                      <div class="d-flex justify-content-end">
                        <a href="<?= base_url('Admin/jemaatTerdaftar/').$ibadah['kode'] ?>" class="mr-4 text-secondary" id="batal"><small>BATAL</small></a>
                        <button type="submit" class="btn btn-success btn-sm" id="simpan"><i class="fa fa-plus fa-sm text-white mr-2"></i>TAMBAH KEHADIRAN
                        </button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->