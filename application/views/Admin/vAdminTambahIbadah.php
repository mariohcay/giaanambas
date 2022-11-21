<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="card shadow mb-4" id="cardProfile">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Data Ibadah</h6>
    </div>
    <div class="card-body">
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('Admin/simpanTambahIbadah') ?>" method="POST" enctype="multipart/form-data">
        <ul class="list-group">
          <li class="list-group-item <?php
                                      $admin = array("superadmin", "adminabakris", "adminprbk");
                                      if (!in_array($this->session->userdata('username'), $admin)) {
                                        echo "d-none";
                                      }
                                      ?>">
            <?php
            $activeValue = urldecode($this->uri->segment('3'));
            ?>
            <label for="Nama Ibadah" class="font-weight-bold">Pilih Ibadah</label>
            <?php if (in_array($this->session->userdata('username'), $admin)) { ?>
              <select class="custom-select" name="jenisIbadah" id="jenisIbadah">
                <?php if ($this->session->userdata('username') === "superadmin") { ?>
                  <option value="Umum 1" class="d-block" <?php if ($activeValue === "Umum 1") {
                                                            echo "selected";
                                                          } ?>>Umum 1</option>
                  <option value="Umum 2" class="d-block" <?php if ($activeValue === "Umum 2") {
                                                            echo "selected";
                                                          } ?>>Umum 2</option>
                  <option value="Kamis" class="d-block" <?php if ($activeValue === "Kamis") {
                                                          echo "selected";
                                                        } ?>>Kamis</option>
                <?php }
                if ($this->session->userdata('username') === "superadmin" || $this->session->userdata('username') === "adminabakris") { ?>
                  <option value="Abakris - Bethlehem" class="d-block" <?php if ($activeValue === "Abakris - Bethlehem") {
                                                                        echo "selected";
                                                                      } ?>>Abakris - Bethlehem</option>
                  <option value="Abakris - Bethel" class="d-block" <?php if ($activeValue === "Abakris - Bethel") {
                                                                      echo "selected";
                                                                    } ?>>Abakris - Bethel</option>
                  <option value="Abakris - Pniel" class="d-block" <?php if ($activeValue === "Abakris - Pniel") {
                                                                    echo "selected";
                                                                  } ?>>Abakris - Pniel</option>
                  <option value="Abakris - Sion" class="d-block" <?php if ($activeValue === "Abakris - Sion") {
                                                                    echo "selected";
                                                                  } ?>>Abakris - Sion</option>
                  <option value="Abakris - Tunas Remaja" class="d-block" <?php if ($activeValue === "Abakris - Tunas Remaja") {
                                                                            echo "selected";
                                                                          } ?>>Abakris - Tunas Remaja</option>
                <?php }
                if ($this->session->userdata('username') === "superadmin" || $this->session->userdata('username') === "adminprbk") { ?>
                  <option value="PRBK - Remaja" class="d-block" <?php if ($activeValue === "PRBK - Remaja") {
                                                                  echo "selected";
                                                                } ?>>PRBK - Remaja</option>
                  <option value="PRBK - Pemuda" class="d-block" <?php if ($activeValue === "PRBK - Pemuda") {
                                                                  echo "selected";
                                                                } ?>>PRBK - Pemuda</option>
                  <option value="PRBK - Dewasa Muda" class="d-block" <?php if ($activeValue === "Dewasa Muda") {
                                                                        echo "selected";
                                                                      } ?>>PRBK - Dewasa Muda</option>
                <?php }
                if ($this->session->userdata('username') === "superadmin") { ?>
                  <option value="Kaum Pria" class="d-block" <?php if ($activeValue === "Kaum Pria") {
                                                              echo "selected";
                                                            } ?>>Kaum Pria</option>
                  <option value="Kaum Wanita" class="d-block" <?php if ($activeValue === "Kaum Wanita") {
                                                                echo "selected";
                                                              } ?>>Kaum Wanita</option>
                  <option value="Persekutuan Samaria" class="d-block" <?php if ($activeValue === "Persekutuan Samaria") {
                                                                        echo "selected";
                                                                      } ?>>Persekutuan Samaria</option>
                  <option value="Persekutuan Filipi" class="d-block" <?php if ($activeValue === "Persekutuan Filipi") {
                                                                        echo "selected";
                                                                      } ?>>Persekutuan Filipi</option>
                  <option value="Persekutuan Filadelfia" class="d-block" <?php if ($activeValue === "Persekutuan Filadelfia") {
                                                                            echo "selected";
                                                                          } ?>>Persekutuan Samaria</option>
                  <option value="Persekutuan Kana" class="d-block" <?php if ($activeValue === "Persekutuan Kana") {
                                                                      echo "selected";
                                                                    } ?>>Persekutuan Kana</option>
                  <option value="Persekutuan Bethlehem" class="d-block" <?php if ($activeValue === "Persekutuan Bethlehem") {
                                                                          echo "selected";
                                                                        } ?>>Persekutuan Bethlehem</option>
                  <option value="TPI" class="d-block" <?php if ($activeValue === "TPI") {
                                                        echo "selected";
                                                      } ?>>TPI</option>
                <?php } ?>
              </select>
            <?php } ?>
          </li>
          <li class="list-group-item">
            <label for="Nama Ibadah" class="font-weight-bold">Nama Ibadah</label>
            <input type="text" class="form-control d-block" id="namaIbadah" name="namaIbadah" required>
          </li>
          <li class="list-group-item">
            <label for="Tema Ibadah" class="font-weight-bold">Tema Ibadah</label>
            <input type="text" class="form-control d-block" id="temaIbadah" name="temaIbadah" required>
          </li>
          <li class="list-group-item">
            <label for="Tanggal Ibadah" class="font-weight-bold">Tanggal Ibadah</label>
            <input type="date" class="form-control d-block" id="tanggalIbadah" name="tanggalIbadah" required>
          </li>
          <li class="list-group-item">
            <label for="Jam Ibadah" class="font-weight-bold">Jam Ibadah</label>
            <div class="d-flex justify-content-between align-items-center">
              <select class="custom-select mr-3" name="jam">
                <?php for ($i = 0; $i <= 23; $i++) {
                  $jam = strval($i);
                  if ($i <= 9) {
                    $jam = "0" . strval($i);
                  }
                  echo '<option value="' . $jam . '" class="d-block">' . $jam . '</option>';
                } ?>
              </select>
              <b>:</b>
              <select class="custom-select ml-3" name="menit">
                <?php for ($i = 0; $i <= 55; $i += 5) {
                  $menit = strval($i);
                  if ($i <= 9) {
                    $menit = "0" . strval($i);
                  }
                  echo '<option value="' . $menit . '" class="d-block">' . $menit . '</option>';
                } ?>
              </select>
            </div>
          </li>
          <li class="list-group-item">
            <label for="Link Youtube" class="font-weight-bold">Link Youtube</label>
            <input type="text" class="form-control d-block" id="link" name="link" required>
          </li>
        </ul>
        <hr>
        <div class="d-inline float-right align-items-center">
          <a href="<?= base_url('Dashboard') ?>" class="mr-4 text-secondary" id="batal"><small>BATAL</small></a>
          <button type="submit" class="btn btn-success btn-sm" id="simpan">SIMPAN</button>
        </div>
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->