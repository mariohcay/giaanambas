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
          <h1 class="h3 mb-4 text-gray-800">Ibadah Umum GKI Kebonagung</h1>

          <?php
          if ($vaksin == '') {
            echo '
                  <div class="alert alert-danger d-flex justify-content-between" role="alert"></i> <small>Anda belum melengkapi data jemaat, <a class="font-weight-bold" href=' . base_url('Profile/ubahProfile') . '>Lengkapi Sekarang</a> untuk memperbaharui data jemaat</small><i class="fa fa-exclamation-circle my-auto"></i></div>
                ';
          }
          ?>

          <div class="card shadow mb-4 <?php if (empty($ibadahMingguIni)) {
                                          echo "d-none";
                                        } ?>">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ibadah On-site Minggu Ini</h6>
            </div>
            <div class="card-body mr-4">
              <?php $this->load->model('m_kehadiran');
              foreach ($ibadahMingguIni as $data) : ?>
                <div class="row">
                  <div class="col-lg-4">
                    <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/44zD2i5FSB4?start=11" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                    <img class="img-fluid mx-3 my-3 shadow" style="width: 25rem;" src="<?= base_url('assets/img/thumbnail/') . $data['image'] ?>" alt="">
                  </div>
                  <div class="col-lg mx-3 my-3">
                    <h5 class="text-dark"><?= $data['namaIbadah'] ?><br>"<?= $data['temaIbadah'] ?>"</h5>
                    <h6><?= tgl_indo($data['tanggalIbadah'], true) . " - " . time_indo($data['jamIbadah']) . " WIB" ?></h6>
                    <?php
                    $terisi = $this->m_kehadiran->cekKuota($data['kodeIbadah']);
                    $id = $this->session->userdata('id');
                    $kehadiran = $this->m_kehadiran->cekStatusKehadiran($id, $data['kodeIbadah']);
                    ?>
                    <!-- <h6>
                      <?php
                      $tersedia = $data['kuota'] - $terisi;
                      if ($vaksin !== "Belum vaksin") { // Jika sudah vaksin
                        if (empty($kehadiran)) {
                          if ($tersedia > 0) { //jika kuota masih ada
                            echo "<b class='text-success'>Tersedia $tersedia kursi lagi</b>";
                          } else { //jika kuota sudah habis
                            echo "<b class='text-danger'>Mohon maaf kuota ibadah on-site sudah habis</b>";
                          }
                        }
                      } else { //jika belum vaksin
                        echo "<b class='text-danger'>Mohon maaf Anda belum mendapatkan vaksin sehingga belum bisa mengikuti ibadah on-site</b>";
                      }
                      ?>
                    </h6> -->
                    <?php
                    if ($vaksin !== "") { //jika data sudah lengkap
                      if ($vaksin !== "Belum vaksin") { //jika sudah vaksin
                        if ($age >= 13) { //jika cukup umur
                          if (!empty($kehadiran)) { //jika sudah mendaftar
                            if ($kehadiran['status'] === "TERDAFTAR") { //jika sudah terdaftar
                              echo '<a href="' . base_url('Ibadah/lihatQRCode/') . $data['kodeIbadah'] . '" class="btn btn-success btn-sm p-2 my-1 mr-1">SUDAH MENDAFTAR, TAMPILKAN QR CODE</a>';
                            } else if ($kehadiran['status'] === "HADIR") { //jika sudah hadir
                              echo '<a href="#" class="btn btn-secondary btn-sm p-2 my-1 mr-1">ANDA SUDAH MENGIKUTI IBADAH</a>';
                              echo '<a href="' . base_url('Ibadah/LihatIbadah/') . $data['kodeIbadah'] . '" class="btn btn-info btn-sm p-2 my-1 mr-1">DETAIL</a>';
                            }
                          } else { //jika belum daftar
                            if ($tersedia > 0) { //jika kuota masih ada
                              echo '<a href="' . base_url('Ibadah/DaftarIbadah/') . $data['kodeIbadah'] . '" class="btn btn-primary btn-sm p-2 my-1 mr-1">DAFTAR</a>';
                              echo '<a href="' . base_url('Ibadah/LihatIbadah/') . $data['kodeIbadah'] . '" class="btn btn-success btn-sm p-2 my-1 mr-1">LIHAT</a>';
                            } else { //jika kuota habis
                              echo '<a href="' . base_url('Ibadah/LihatIbadah/') . $data['kodeIbadah'] . '" class="btn btn-success btn-sm p-2 my-1 mr-1">LIHAT</a>';
                            }
                          }
                        } else { //jika tidak cukup umur
                          echo '<a href="' . base_url('Ibadah/LihatIbadah/') . $data['kodeIbadah'] . '" class="btn btn-success btn-sm p-2 my-1 mr-1">LIHAT</a>';
                        }
                      } else { //jika belum vaksin
                        echo '<a href="' . base_url('Ibadah/LihatIbadah/') . $data['kodeIbadah'] . '" class="btn btn-success btn-sm p-2 my-1 mr-1">LIHAT</a>';
                      }
                    } else { //jika data belum lengkap
                      echo '<a href="' . base_url('Ibadah/LihatIbadah/') . $data['kodeIbadah'] . '" class="btn btn-success btn-sm p-2 my-1 mr-1">LIHAT</a>';
                    }
                    ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- DataTales Example -->
          <?= $this->session->flashdata('message'); ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Arsip Ibadah Online</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Ibadah</th>
                      <th>Tanggal</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ibadah as $data) : ?>
                      <tr>
                        <td><img class="img-responsive shadow" style="width: 10rem;" src="<?= base_url('assets/img/thumbnail/') . $data['image'] ?>" alt=""></td>
                        <td><?= $data['namaIbadah'] ?><br>"<?= $data['temaIbadah'] ?>"</td>
                        <td><?= tgl_indo($data['tanggalIbadah']) ?></td>
                        <td><a href="<?= base_url('Ibadah/lihatIbadah/') . $data['kodeIbadah'] ?>" class="btn btn-info btn-sm p-2">LIHAT</a></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->