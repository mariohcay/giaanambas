<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="card shadow mb-4" id="cardProfile">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ubah Profile</h6>
            </div>
            <div class="card-body">
              <?= $this->session->flashdata('message'); ?>
              <form action="<?= base_url('Profile/simpanUbah') ?>" method="POST">
              <ul class="list-group">
                <li class="list-group-item">
                  <label for="Id" class="font-weight-bold">Id Jemaat</label>
                  <input type="text" class="form-control d-block" value="<?= $jemaat['id']; ?>" id="id" name="id" disabled="true">
                </li>
                <li class="list-group-item">
                  <label for="Username" class="font-weight-bold">Username</label>
                  <input type="text" class="form-control d-block" value="<?= $jemaat['username']; ?>" id="username" name="username" autocomplete="off" required>
                </li>
                <li class="list-group-item">
                  <label for="Email" class="font-weight-bold">Email</label>
                  <input type="email" class="form-control d-block" value="<?= $jemaat['email']; ?>" id="email" name="email" autocomplete="off" required>  
                </li>
                <li class="list-group-item">
                  <label for="Nama" class="font-weight-bold">Nama</label>
                  <input type="text" class="form-control d-block" value="<?= $jemaat['nama']; ?>" id="nama" name="nama" autocomplete="off" required>
                </li>
                <li class="list-group-item">
                  <label for="Alamat" class="font-weight-bold">Alamat</label>
                  <input type="text" class="form-control d-block" value="<?= $jemaat['alamat']; ?>" id="alamat" name="alamat" autocomplete="off" required>
                </li>
                <li class="list-group-item">
                  <label for="Jenis Kelamin" class="font-weight-bold">Jenis Kelamin</label>
                  <select class="custom-select" name="jenisKelamin">
                    <option value="Laki-laki" class="d-block" <?php if($jemaat['jenisKelamin'] === "Laki-laki" ){ echo "selected"; }; ?>>Laki-laki</option>
                    <option value="Perempuan" class="d-block" <?php if($jemaat['jenisKelamin'] === "Perempuan" ){ echo "selected"; }; ?>>Perempuan</option>
                  </select>
                </li>
                <li class="list-group-item">
                  <label for="Tempat Lahir" class="font-weight-bold">Tempat Lahir</label>
                  <input type="text" class="form-control d-block" value="<?= $jemaat['tempatLahir']; ?>" id="tempatLahir" name="tempatLahir" autocomplete="off" required>
                </li>
                <li class="list-group-item">
                  <label for="Tanggal Lahir" class="font-weight-bold">Tanggal Lahir</label>
                  <input type="date" class="form-control d-block" value="<?= $jemaat['tanggalLahir']; ?>" id="tanggalLahir" name="tanggalLahir" required>
                </li>
                <li class="list-group-item">
                  <label for="Telepon" class="font-weight-bold">Telepon</label>
                  <input type="number" class="form-control d-block" value="<?= $jemaat['telepon']; ?>" id="telepon" name="telepon" autocomplete="off" required>
                </li>
                <li class="list-group-item">
                  <label for="Lingkungan" class="font-weight-bold">Lingkungan</label>
                  <select class="custom-select" name="lingkungan">
                    <option value="A" class="d-block" <?php if($jemaat['lingkungan'] === "A" ){ echo "selected"; }; ?>>A</option>
                    <option value="B" class="d-block" <?php if($jemaat['lingkungan'] === "B" ){ echo "selected"; }; ?>>B</option>
                    <option value="C" class="d-block" <?php if($jemaat['lingkungan'] === "C" ){ echo "selected"; }; ?>>C</option>
                    <option value="D" class="d-block" <?php if($jemaat['lingkungan'] === "D" ){ echo "selected"; }; ?>>D</option>
                    <option value="E" class="d-block" <?php if($jemaat['lingkungan'] === "E" ){ echo "selected"; }; ?>>E</option>
                    <option value="Simpatisan" class="d-block" <?php if($jemaat['lingkungan'] === "Simpatisan" ){ echo "selected"; }; ?>>Simpatisan</option>
                  </select>
                </li>
                <li class="list-group-item">
                  <label for="Status Vaksin Covid-19" class="font-weight-bold">Status Vaksin Covid-19</label>
                  <select class="custom-select" name="vaksin">
                    <option value="" class="d-block" <?php if($jemaat['vaksin'] === "" ){ echo "selected"; }; ?> disabled>Pilih...</option>
                    <option value="Belum vaksin" class="d-block" <?php if($jemaat['vaksin'] === "Belum vaksin" ){ echo "selected"; }; ?>>Belum vaksin</option>
                    <option value="Sudah 1x" class="d-block" <?php if($jemaat['vaksin'] === "Sudah 1x" ){ echo "selected"; }; ?>>Sudah 1x</option>
                    <option value="Sudah 2x" class="d-block" <?php if($jemaat['vaksin'] === "Sudah 2x" ){ echo "selected"; }; ?>>Sudah 2x</option>
                  </select>
                </li>
              </ul>
              <hr>
              <div class="d-inline float-right align-items-center">
                <a href="<?= base_url('Dashboard')?>" class="mr-4 text-secondary" id="batal"><small>BATAL</small></a>
                <button type="submit" class="btn btn-success btn-sm" id="simpan">SIMPAN
                </button>
              </div>
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->