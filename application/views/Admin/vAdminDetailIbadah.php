        <!-- Custom styles for this page -->
        <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- Page level plugins -->
        <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="row">
              <div class="col">
                <h3 class="h3 text-gray-800 mb-1"><?= $ibadah['nama'];
                                                  echo "\n"; ?>
                  <h5><?= tgl_indo($ibadah['tanggal'], true) ?></h5>
              </div>
            </div>
            <?php if ($ibadah['jenis'] === "Umum 1") { ?>
              <a href="<?= base_url('Admin/exportExcel/' . $ibadah['kode'] . '/UM2-' . substr($ibadah['kode'], -8)) ?>" class="btn btn-success shadow-sm"><i class="fas fa-file-excel fa-sm text-white mr-1"></i> Export Excel</a>
            <?php } else if ($ibadah['jenis'] === "Umum 2") { ?>
              <a href="<?= base_url('Admin/exportExcel/' . 'UM1-' . substr($ibadah['kode'], -8) ."/". $ibadah['kode']) ?>" class="btn btn-success shadow-sm"><i class="fas fa-file-excel fa-sm text-white mr-1"></i> Export Excel</a>
            <?php } else { ?>
              <a href="<?= base_url('Admin/exportExcel/' . $ibadah['kode']."/none") ?>" class="btn btn-success shadow-sm"><i class="fas fa-file-excel fa-sm text-white mr-1"></i> Export Excel</a>
            <?php } ?>
          </div>

          <?= $this->session->flashdata('message'); ?>
          <div class="card shadow mb-4">
            <div class="card-body mr-4 px-4">
              <div class="row">
                <div class="col-lg">
                  <?php $this->load->model('m_kehadiran');
                  $hadir = count($this->m_kehadiran->jemaatHadir($ibadah['kode'], FALSE));
                  ?>
                  <h5 class="text-dark" style="line-height: 1.6"><?= $ibadah['nama'] ?><br>"<?= $ibadah['tema'] ?>"</h5>
                  <h6><?= tgl_indo($ibadah['tanggal'], true) . " - " . time_indo($ibadah['jam']) . " WIB" ?></h6>
                  <h6>Jumlah jemaat yang hadir: <?= $hadir ?> orang</h6>
                  <!-- <?php if ($ibadah['status'] === "SELESAI" and $hadir > 0) { ?>
                    <a href="<?= base_url('Admin/daftarKehadiranOnsite/') . $ibadah['kode'] ?>" class="btn btn-success btn-sm p-2 my-1 mr-1">DAFTAR KEHADIRAN JEMAAT</a>
                  <?php } ?> -->
                </div>
              </div>
              <div class="row">
                <div class="col-lg">
                  <?php if ($ibadah['jenis'] === "Umum 1") {
                    if ($ibadah['link'] !== "-") { ?>
                      <a href="<?= $ibadah['link'] ?>" target="_blank" class="btn btn-danger btn-sm p-2 my-1 mr-2"><i class="fa fa-youtube-play fa-sm text-white mr-2"></i>LINK YOUTUBE</a>
                  <?php }
                  } ?>
                  <a href="<?= base_url('Admin/ubahIbadah/') . $ibadah['kode'] ?>" class="btn btn-info btn-sm p-2 my-1 mr-2"><i class="fa fa-pencil-square-o fa-sm text-white mr-2"></i>EDIT</a>
                </div>
              </div>
              <!-- <div class="row">
                <div class="col">
                  <div class="d-inline float-right align-items-center">
                    <a href="<?= base_url('Admin/ubahIbadah/') . $ibadah['kode'] ?>" class="btn btn-primary btn-sm" id="simpan">UBAH</a>
                  </div>
                </div>
              </div> -->
            </div>
          </div>

          <!-- DataTales Example -->
          <?php if ($ibadah['status'] === "SELESAI") { ?>
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Kehadiran Jemaat</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th style="width: 5%">No</th>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Alamat</th>
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
                        </tr>
                      <?php
                        $i++;
                      endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->