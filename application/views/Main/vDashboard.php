        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>

        <!-- <script src="<?= base_url() ?>/assets/js/demo/chart-area-demo.js"></script> -->

        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <?= $this->session->flashdata('welcome'); ?>
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

          <!-- <div class="row">
            <div class="col mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Jemaat</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= sizeof($jemaat) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Jemaat Laki-laki</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= sizeof($lakiLaki) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-male fa-2x text-gray-300 mr-3"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Jemaat Perempuan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= sizeof($perempuan) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-female fa-2x text-gray-300 mr-3"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->


          <!-- <div class="row">

            <div class="col-md">
              <div class="card shadow mb-4">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-info">Transaksi Iklan Baris</h6>
                </div>
                
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myChart" height="94%"></canvas>
                  </div>
                </div>
              </div>
            </div>

          </div> -->

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var cData = JSON.parse(`<?php echo $iklanBulanan; ?>`);
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: cData.label,
                datasets: [{
                    data: cData.data,
                    borderColor: 'rgba(91,192,222)',
                    pointBackgroundColor: 'rgba(91,192,222)',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                  display: false
                }
            }
        });
      </script> -->