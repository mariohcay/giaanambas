<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="card shadow mb-4" id="cardProfile">
    <div class="card-body">
      <div class="row p-4">
        <div class="col-lg-2 col-md-2 mb-4">
          <a href="">
            <img class="img-profile rounded-circle shadow w-75" src="<?= base_url() ?>/assets/img/user.png">
          </a>
        </div>
        <div class="col-lg col-md">
          <h3><?= $jemaat['nama']; ?></h3>
          <h5><?= $jemaat['alamat']; ?></h5>
        </div>
      </div>
    </div>
  </div>

  <?php if ($this->session->userdata('username') === "superadmin") { ?>
  <div class="card shadow mb-4" id="cardProfile">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Jumlah Kehadiran Ibadah</h6>
    </div>
    <div class="card-body">
      <!-- <div class="row my-3">
        <div class="col-lg-10">
          <div class="chart-area" style="height: 250px">
            <canvas id="chartKehadiran"></canvas>
          </div>
        </div>
      </div> -->
      <div class="row">
        <?php
        // var_dump($kehadiran); die;
        foreach ($kehadiran as $jmlHadir) { ?>
          <div class="col-lg-2 col-md-3 mb-4">
            <div class="card shadow">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"><?= $jmlHadir['jenis'] ?></div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlHadir['jml'] ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php } ?>

  <!-- Page Heading -->
  <div class="card shadow mb-4" id="cardProfile">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Ubah Profile</h6>
    </div>
    <div class="card-body">
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('Admin/simpanUbahJemaat') ?>" method="POST">
        <ul class="list-group">
          <li class="list-group-item">
            <label for="Id" class="font-weight-bold">Id Jemaat</label>
            <input type="text" class="form-control d-block" value="<?= $jemaat['id']; ?>" id="id" name="id" readonly>
          </li>
          <li class="list-group-item">
            <label for="Nama" class="font-weight-bold">Nama</label>
            <input type="text" class="form-control d-block" value="<?= $jemaat['nama']; ?>" id="nama" name="nama" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="Username" class="font-weight-bold">Username</label>
            <input type="text" class="form-control d-block" value="<?= $jemaat['username']; ?>" id="username" name="username" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="Telepon" class="font-weight-bold">Telepon</label>
            <input type="telepon" class="form-control d-block" value="<?= $jemaat['telepon']; ?>" id="telepon" name="telepon" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="Alamat" class="font-weight-bold">Alamat</label>
            <input type="text" class="form-control d-block" value="<?= $jemaat['alamat']; ?>" id="alamat" name="alamat" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="Jenis Kelamin" class="font-weight-bold">Jenis Kelamin</label>
            <select class="custom-select" name="jenisKelamin">
              <option value="Laki-laki" class="d-block" <?php if ($jemaat['jenisKelamin'] === "Laki-laki") {
                                                          echo "selected";
                                                        }; ?>>Laki-laki</option>
              <option value="Perempuan" class="d-block" <?php if ($jemaat['jenisKelamin'] === "Perempuan") {
                                                          echo "selected";
                                                        }; ?>>Perempuan</option>
            </select>
          </li>
          <li class="list-group-item">
            <label for="Tanggal Lahir" class="font-weight-bold">Tanggal Lahir</label>
            <input type="date" class="form-control d-block" value="<?= $jemaat['tanggalLahir']; ?>" id="tanggalLahir" name="tanggalLahir" required>
          </li>
          <li class="list-group-item">
            <label for="Status Pendidikan/Pekerjaan" class="font-weight-bold">Status Pendidikan/Pekerjaan</label>
            <input type="text" class="form-control d-block" value="<?= $jemaat['statusPendidikan']; ?>" id="statusPendidikan" name="statusPendidikan" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="Status Baptis" class="font-weight-bold">Status Baptis</label>
            <select class="custom-select" name="statusBaptis">
              <option value="Sudah" class="d-block" <?php if ($jemaat['statusBaptis'] === "Sudah") {
                                                      echo "selected";
                                                    }; ?>>Sudah</option>
              <option value="Belum" class="d-block" <?php if ($jemaat['statusBaptis'] === "Belum") {
                                                      echo "selected";
                                                    }; ?>>Belum</option>
            </select>
          </li>
          <li class="list-group-item">
            <label for="Tanggal Atestasi Masuk" class="font-weight-bold">Tanggal Atestasi Masuk</label>
            <input type="date" class="form-control d-block" value="<?= $jemaat['tanggalAtestasiMasuk']; ?>" id="tanggalAtestasiMasuk" name="tanggalAtestasiMasuk">
          </li>
          <li class="list-group-item">
            <label for="Tanggal Atestasi Keluar" class="font-weight-bold">Tanggal Atestasi Keluar</label>
            <input type="date" class="form-control d-block" value="<?= $jemaat['tanggalAtestasiKeluar']; ?>" id="tanggalAtestasiKeluar" name="tanggalAtestasiKeluar">
          </li>
          <li class="list-group-item">
            <label for="Tanggal Meninggal" class="font-weight-bold">Tanggal Meninggal</label>
            <input type="date" class="form-control d-block" value="<?= $jemaat['tanggalMeninggal']; ?>" id="tanggalMeninggal" name="tanggalMeninggal">
          </li>
        </ul>
        <hr>
        <div class="d-inline float-right align-items-center">
          <a href="<?= base_url('Admin/daftarJemaat') ?>" class="mr-4 text-secondary" id="batal"><small>BATAL</small></a>
          <button type="submit" class="btn btn-success btn-sm" id="simpan"><i class="fa fa-floppy-o fa-sm text-white mr-2"></i>SIMPAN
          </button>
        </div>
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->