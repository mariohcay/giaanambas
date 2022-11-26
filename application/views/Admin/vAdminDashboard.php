<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <?= $this->session->flashdata('welcome'); ?>
  <?= $this->session->flashdata('message'); ?>

  <div class="row">
    <div class="col-lg-4 mb-4">
      <div class="card border-left-dark shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Jemaat</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= sizeof($jemaat) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
            <?php if ($this->session->userdata('username') === "superadmin") { ?>
              <a href="<?= base_url('Admin/daftarJemaat') ?>" class="stretched-link"></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 mb-4">
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

    <div class="col-lg-4 mb-4">
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
  </div>

  <!-- <div class="card shadow mb-4 <?php if (empty($ibadahMingguIni)) {
                                      echo "d-none";
                                    } ?>">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Ibadah Onsite Minggu Ini</h6>
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
            ?>
            <h6>Kuota: <?= $terisi . "/" . $data['kuota'] ?></h6>
            <a href="<?= base_url('Admin/scanQRCodeIbadah/') . $data['kodeIbadah'] ?>" class="btn btn-primary btn-sm p-2 my-1 mr-1">SCAN QR CODE</a>
            <a href="<?= base_url('Admin/jemaatTerdaftar/') . $data['kodeIbadah'] ?>" class="btn btn-success btn-sm p-2 my-1 mr-1">JEMAAT TERDAFTAR</a>
            <a href="<?= base_url('Admin/detailIbadah/') . $data['kodeIbadah'] ?>" class="btn btn-info btn-sm p-2 my-1 mr-1">DETAIL</a>
            <br>
            <a href="<?= base_url('Admin/tutupDaftarOnsite/') . $data['kodeIbadah'] ?>" class="btn btn-danger btn-sm p-2 my-1 mr-1">TUTUP PENDAFTARAN</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  
</div> -->
  <?php
  $username = $this->session->userdata('username');
  if ($username === "superadmin" || $username === "admin1") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah Umum 1</h6>
          </div>
          <div class="card-body text-center">
            <?php
            // var_dump($kehadiranUmum1); die;
            if ($cekKehadiranUmum1 !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartUmum1"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranUmum1) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "admin2") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah Umum 2</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranUmum2 !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartUmum2"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranUmum2) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminkamis") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah Kamis</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranKamis !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartKamis"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranKamis) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminabakris") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah Abakris - Bethlehem</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranAbakrisBethlehem !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartAbakrisBethlehem"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranAbakrisBethlehem) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminabakris") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah Abakris - Bethel</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranAbakrisBethel !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartAbakrisBethel"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranAbakrisBethel) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminabakris") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah Abakris - Pniel</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranAbakrisPniel !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartAbakrisPniel"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranAbakrisPniel) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminabakris") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah Abakris - Sion</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranAbakrisSion !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartAbakrisSion"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranAbakrisSion) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminabakris") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah Abakris - Tunas Remaja</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranAbakrisTunasRemaja !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartAbakrisTunasRemaja"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranAbakrisTunasRemaja) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminprbk") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah PRBK - Remaja</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranPRBKremaja !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartPRBKremaja"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranPRBKremaja) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminprbk") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah PRBK - Pemuda</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranPRBKpemuda !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartPRBKpemuda"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranPRBKpemuda) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminprbk") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah PRBK - Dewasa Muda</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranPRBKdewasaMuda !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartPRBKdewasaMuda"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranPRBKdewasaMuda) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminpria") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah Kaum Pria</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranKaumPria !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartKaumPria"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranKaumPria) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminwanita") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah Kaum Wanita</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranKaumWanita !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartKaumWanita"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranKaumWanita) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminsamaria") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah Persekutuan Samaria</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranPSamaria !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartPSamaria"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranPSamaria) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminfilipi") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah Persekutuan Filipi</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranPFilipi !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartPFilipi"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranPFilipi) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminfiladelfia") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah Persekutuan Filadelfia</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranPFiladelfia !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartPFiladelfia"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranPFiladelfia) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminkana") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah Persekutuan Kana</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranPKana !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartPKana"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranPKana) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminbethlehem") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah Persekutuan Bethlehem</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranPBethlehem !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartPBethlehem"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranPBethlehem) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminTPI") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah TPI</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranTPI !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartTPI"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranTPI) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <?php if ($username === "superadmin" || $username === "adminKhusus") { ?>
    <div class="row">
      <div class="col-md">
        <div class="card shadow mb-4 h-auto">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kehadiran Jemaat Ibadah Khusus</h6>
          </div>
          <div class="card-body text-center">
            <?php if ($cekKehadiranKhusus !== "empty") { ?>
              <div class="row my-3">
                <div class="col-lg-10">
                  <div class="chart-area" style="height: 250px">
                    <canvas id="chartKhusus"></canvas>
                  </div>
                </div>
                <div class="col-lg-2 mt-sm-4 visible-xs" style="margin-top: 24px">
                  <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">RATA-RATA KEHADIRAN JEMAAT</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= round($avgKehadiranKhusus) ?></div><br>
                </div>
              </div>
            <?php } else {
            ?>
              <h6>Belum ada data kehadiran</h6>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
  function datas(ctx, cData, jenisIbadah, ) {
    var chartX = new Chart(ctx, {
      type: 'line',
      data: {
        labels: cData.label,
        datasets: [{
          data: cData.data,
          label: "Total",
          lineTension: 0.3,
          backgroundColor: "rgba(90, 92, 105, 0.05)",
          borderColor: "rgba(90, 92, 105, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(90, 92, 105, 1)",
          pointBorderColor: "rgba(90, 92, 105, 1)",
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(90, 92, 105, 1)",
          pointHoverBorderColor: "rgba(90, 92, 105, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          pointStyle: 'circle',
        }]
      },
      options: {
        hover: {
          events: ['mousemove', 'click'],
          onHover: (event, chartElement) => {
            event.target.style.cursor = chartElement[0] ? 'pointer' : 'default';
          }
        },
        onClick: function(e) {
          var activePoints = chartX.getElementsAtEventForMode(e, 'point', chartX.options);
          var firstPoint = activePoints[0];
          var xLabel = chartX.data.labels[firstPoint._index];
          window.location.href = window.location + '/detailIbadah/' + convertTgl(xLabel, jenisIbadah);
        },
        responsive: true,
        maintainAspectRatio: false,
        layout: {
          autoPadding: true
        },
        scales: {
          xAxes: [{
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              padding: 15,
              maxTicksLimit: 7,
              maxRotation: 90
            }
          }],
          yAxes: [{
            ticks: {
              beginAtZero: true,
              maxTicksLimit: 5,
              padding: 15
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false,
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
            }
          }
        },
      }
    });
    return chartX;
  }

  if ("<?php echo $cekKehadiranUmum1 ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "admin1")) {
    var ctxUmum1 = document.getElementById('chartUmum1').getContext('2d');
    var cDataUmum1 = JSON.parse('<?php echo $kehadiranUmum1; ?>');
    datas(ctxUmum1, cDataUmum1, "Umum 1");
  }

  if ("<?php echo $cekKehadiranUmum2 ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "admin2")) {
    var ctxUmum2 = document.getElementById('chartUmum2').getContext('2d');
    var cDataUmum2 = JSON.parse('<?php echo $kehadiranUmum2; ?>');
    datas(ctxUmum2, cDataUmum2, "Umum 2");
  }

  if ("<?php echo $cekKehadiranKamis ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "adminkamis")) {
    var ctxKamis = document.getElementById('chartKamis').getContext('2d');
    var cDataKamis = JSON.parse('<?php echo $kehadiranKamis; ?>');
    datas(ctxKamis, cDataKamis, "Kamis");
  }

  if ("<?php echo $cekKehadiranAbakrisBethlehem ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "adminabakris")) {
    var ctxAbakrisBethlehem = document.getElementById('chartAbakrisBethlehem').getContext('2d');
    var cDataAbakrisBethlehem = JSON.parse('<?php echo $kehadiranAbakrisBethlehem; ?>');
    datas(ctxAbakrisBethlehem, cDataAbakrisBethlehem, "Abakris - Bethlehem");
  }

  if ("<?php echo $cekKehadiranAbakrisBethel ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "adminabakris")) {
    var ctxAbakrisBethel = document.getElementById('chartAbakrisBethel').getContext('2d');
    var cAbakrisBethel = JSON.parse('<?php echo $kehadiranAbakrisBethel; ?>');
    var chartAbakrisBethel = new Chart(ctxAbakrisBethel,
      datas(cAbakrisBethel, "Abakris - Bethel")
    );
  }

  if ("<?php echo $cekKehadiranAbakrisPniel ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "adminabakris")) {
    var ctxAbakrisPniel = document.getElementById('chartAbakrisPniel').getContext('2d');
    var cAbakrisPniel = JSON.parse('<?php echo $kehadiranAbakrisPniel; ?>');
    var chartAbakrisPniel = new Chart(ctxAbakrisPniel,
      datas(cAbakrisPniel, "Abakris - Pniel")
    );
  }

  if ("<?php echo $cekKehadiranAbakrisSion ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "adminabakris")) {
    var ctxAbakrisSion = document.getElementById('chartAbakrisSion').getContext('2d');
    var cAbakrisSion = JSON.parse('<?php echo $kehadiranAbakrisSion; ?>');
    var chartAbakrisSion = new Chart(ctxAbakrisSion,
      datas(cAbakrisSion, "Abakris - Sion")
    );
  }

  if ("<?php echo $cekKehadiranAbakrisTunasRemaja ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "adminabakris")) {
    var ctxAbakrisTunasRemaja = document.getElementById('chartAbakrisTunasRemaja').getContext('2d');
    var cAbakrisTunasRemaja = JSON.parse('<?php echo $kehadiranAbakrisTunasRemaja; ?>');
    var chartAbakrisTunasRemaja = new Chart(ctxAbakrisTunasRemaja,
      datas(cAbakrisTunasRemaja, "Abakris - TunasRemaja")
    );
  }

  if ("<?php echo $cekKehadiranPRBKremaja ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "adminprbk")) {
    var ctxPRBKremaja = document.getElementById('chartPRBKremaja').getContext('2d');
    var cPRBKremaja = JSON.parse('<?php echo $kehadiranPRBKremaja; ?>');
    var chartPRBKremaja = new Chart(ctxPRBKremaja,
      datas(cPRBKremaja, "PRBK - Remaja")
    );
  }

  if ("<?php echo $cekKehadiranPRBKpemuda ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "adminprbk")) {
    var ctxPRBKpemuda = document.getElementById('chartPRBKpemuda').getContext('2d');
    var cPRBKpemuda = JSON.parse('<?php echo $kehadiranPRBKpemuda; ?>');
    var chartPRBKpemuda = new Chart(ctxPRBKpemuda,
      datas(cPRBKpemuda, "PRBK - Pemuda")
    );
  }

  if ("<?php echo $cekKehadiranPRBKdewasaMuda ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "adminprbk")) {
    var ctxPRBKdewasaMuda = document.getElementById('chartPRBKdewasaMuda').getContext('2d');
    var cPRBKdewasaMuda = JSON.parse('<?php echo $kehadiranPRBKdewasaMuda; ?>');
    var chartPRBKdewasaMuda = new Chart(ctxPRBKdewasaMuda,
      datas(cPRBKdewasaMuda, "PRBK - DewasaMuda")
    );
  }

  if ("<?php echo $cekKehadiranKaumPria ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "adminpria")) {
    var ctxKaumPria = document.getElementById('chartKaumPria').getContext('2d');
    var cKaumPria = JSON.parse('<?php echo $kehadiranKaumPria; ?>');
    var chartKaumPria = new Chart(ctxKaumPria,
      datas(cKaumPria, "Kaum Pria")
    );
  }

  if ("<?php echo $cekKehadiranKaumWanita ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "adminwanita")) {
    var ctxKaumWanita = document.getElementById('chartKaumWanita').getContext('2d');
    var cKaumWanita = JSON.parse('<?php echo $kehadiranKaumWanita; ?>');
    var chartKaumWanita = new Chart(ctxKaumWanita,
      datas(cKaumWanita, "Kaum Wanita")
    );
  }

  if ("<?php echo $cekKehadiranPSamaria ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "adminsamaria")) {
    var ctxPSamaria = document.getElementById('chartPSamaria').getContext('2d');
    var cPSamaria = JSON.parse('<?php echo $kehadiranPSamaria; ?>');
    var chartPSamaria = new Chart(ctxPSamaria,
      datas(cPSamaria, "Persekutuan - Samaria")
    );
  }

  if ("<?php echo $cekKehadiranPFilipi ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "adminfilipi")) {
    var ctxPFilipi = document.getElementById('chartPFilipi').getContext('2d');
    var cPFilipi = JSON.parse('<?php echo $kehadiranPFilipi; ?>');
    var chartPFilipi = new Chart(ctxPFilipi,
      datas(cPFilipi, "Persekutuan - Filipi")
    );
  }

  if ("<?php echo $cekKehadiranPFiladelfia ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "adminfiladelfia")) {
    var ctxPFiladelfia = document.getElementById('chartPFiladelfia').getContext('2d');
    var cPFiladelfia = JSON.parse('<?php echo $kehadiranPFiladelfia; ?>');
    var chartPFiladelfia = new Chart(ctxPFiladelfia,
      datas(cPFiladelfia, "Persekutuan - Filadelfia")
    );
  }

  if ("<?php echo $cekKehadiranPKana ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "adminkana")) {
    var ctxPKana = document.getElementById('chartPKana').getContext('2d');
    var cPKana = JSON.parse('<?php echo $kehadiranPKana; ?>');
    var chartPKana = new Chart(ctxPKana,
      datas(cPKana, "Persekutuan - Kana")
    );
  }

  if ("<?php echo $cekKehadiranPBethlehem ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "adminbethlehem")) {
    var ctxPBethlehem = document.getElementById('chartPBethlehem').getContext('2d');
    var cPBethlehem = JSON.parse('<?php echo $kehadiranPBethlehem; ?>');
    var chartPBethlehem = new Chart(ctxPBethlehem,
      datas(cPBethlehem, "Persekutuan - Bethlehem")
    );
  }

  if ("<?php echo $cekKehadiranTPI ?>" != "empty" && ("<?php echo $username ?>" == "superadmin" || "<?php echo $username ?>" == "admintpi")) {
    var ctxTPI = document.getElementById('chartTPI').getContext('2d');
    var cTPI = JSON.parse('<?php echo $kehadiranTPI; ?>');
    var chartTPI = new Chart(ctxTPI,
      datas(cTPI, "TPI")
    );
  }

  if ("<?php echo $cekKehadiranKhusus ?>" != "empty" && "<?php echo $username ?>" == "superadmin") {
    var ctxKhusus = document.getElementById('chartKhusus').getContext('2d');
    var cKhusus = JSON.parse('<?php echo $kehadiranKhusus; ?>');
    var chartKhusus = new Chart(ctxKhusus,
      datas(cKhusus, "Khusus")
    );
  }

  function convertTgl(tgl, jenisIbadah) {
    const convert = tgl.split(" ");
    var bulan = "0";
    if (convert[1] == "Januari") {
      bulan = "01";
    } else if (convert[1] == "Februari") {
      bulan = "02";
    } else if (convert[1] == "Maret") {
      bulan = "03";
    } else if (convert[1] == "April") {
      bulan = "04";
    } else if (convert[1] == "Mei") {
      bulan = "05";
    } else if (convert[1] == "Juni") {
      bulan = "06";
    } else if (convert[1] == "Juli") {
      bulan = "07";
    } else if (convert[1] == "Agustus") {
      bulan = "08";
    } else if (convert[1] == "September") {
      bulan = "09";
    } else if (convert[1] == "Oktober") {
      bulan = "10";
    } else if (convert[1] == "November") {
      bulan = "11";
    } else if (convert[1] == "Desember") {
      bulan = "12";
    }
    if (parseInt(convert[0]) < 10) {
      convert[0] = "0" + convert[0];
    }

    var kodeIbadah;
    if (jenisIbadah === "Umum 1") {
      kodeIbadah = "UM1-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "Umum 2") {
      kodeIbadah = "UM2-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "Kamis") {
      kodeIbadah = "KMS-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "Abakris - Bethlehem") {
      kodeIbadah = "ABK-BET-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "Abakris - Bethel") {
      kodeIbadah = "ABK-BTL-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "Abakris - Pniel") {
      kodeIbadah = "ABK-PNL-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "Abakris - Sion") {
      kodeIbadah = "ABK-SION-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "Abakris - Tunas Remaja") {
      kodeIbadah = "ABK-TR-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "PRBK - Remaja") {
      kodeIbadah = "PRBK-RMJ-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "PRBK - Pemuda") {
      kodeIbadah = "PRBK-PMD-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "PRBK - Dewasa Muda") {
      kodeIbadah = "PRBK-DM-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "Kaum Pria") {
      kodeIbadah = "PRIA-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "Kaum Wanita") {
      kodeIbadah = "WNTA-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "Persekutuan Samaria") {
      kodeIbadah = "P-SMR-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "Persekutuan Filipi") {
      kodeIbadah = "P-FLP-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "Persekutuan Fiadelfia") {
      kodeIbadah = "P-FIA-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "Persekutuan Kana") {
      kodeIbadah = "P-KNA-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "Persekutuan Bethlehem") {
      kodeIbadah = "P-BET-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "TPI") {
      kodeIbadah = "TPI-" + convert[0] + bulan + convert[2];
    } else if (jenisIbadah === "Khusus") {
      kodeIbadah = "KHU-" + convert[0] + bulan + convert[2];
    }
    return kodeIbadah;
  }
</script>
<script src="<?= base_url() ?>/assets/js/demo/chart-area-demo.js"></script>