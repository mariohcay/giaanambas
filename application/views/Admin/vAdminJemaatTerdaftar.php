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
                <a class="nav-item nav-link active font-weight-bold" href="#">Daftar Kehadiran</a>
                <a class="nav-item nav-link" href="<?= base_url('Admin/tambahSimpatisan/') . $ibadah['kode'] ?>">Kehadiran Simpatisan</a>
              </div>
              <div class="tab-content">
                <div class="tab-pane fade show active">
                  <div class="table-responsive mt-4">
                    <?php
                    $this->load->model('m_kehadiran');
                    $kodeIbadah = $ibadah['kode'];
                    $kehadiran = $this->m_kehadiran->ambilJemaatHadir($kodeIbadah);
                    ?>
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th style="width: 5%">No</th>
                          <th>Id</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th style="width: 10%"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        foreach ($jemaat as $data) : ?>
                          <tr>
                            <td><?= $i ?></td>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td>
                              <a class="btn btn-sm btn-danger mr-1" href="<?= base_url('Admin/hapusJemaatHadir/') . $data['id'] . "/" . $ibadah['kode'] ?>" onclick="return confirm('Yakin ingin menghapus <?= $data['nama'] ?> dari daftar kehadiran jemaat?')"><i class="fa fa-times fa-sm text-white mr-2"></i>HAPUS</a>
                            </td>
                          </tr>
                        <?php
                          $i++;
                        endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->