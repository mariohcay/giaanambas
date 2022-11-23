        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="row mb-4">
            <div class="col">
              <h3 class="h3 text-gray-800 mb-1"><?= $ibadah['nama'];
                                                echo "\n"; ?>
                <h5><?= tgl_indo($ibadah['tanggal'], true) ?></h5>
            </div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-body mr-4 px-4">
              <div class="row">
                <div class="col-lg">
                  <?php $this->load->model('m_kehadiran');
                  $hadir = count($this->m_kehadiran->jemaatHadir($ibadah['kode']));
                  ?>
                  <h5 class="text-dark" style="line-height: 1.6"><?= $ibadah['nama'] ?><br>"<?= $ibadah['tema'] ?>"</h5>
                  <h6><?= tgl_indo($ibadah['tanggal'], true) . " - " . time_indo($ibadah['jam']) . " WIB" ?></h6>
                  <h6>Jumlah jemaat yang hadir: <?= $hadir ?> orang</h6>
                  <!-- <?php if ($ibadah['status'] === "SELESAI" and $hadir > 0) { ?>
                    <a href="<?= base_url('Admin/daftarKehadiranOnsite/') . $ibadah['kode'] ?>" class="btn btn-success btn-sm p-2 my-1 mr-1">DAFTAR KEHADIRAN JEMAAT</a>
                  <?php } ?> -->
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
          <?= $this->session->flashdata('message'); ?>
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
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->