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
          <h1 class="h3 mb-4 text-gray-800">Daftar Ibadah</h1>

          <?= $this->session->flashdata('welcome'); ?>
          <?= $this->session->flashdata('message'); ?>
          <?= $this->session->tempdata('message'); ?>

          <div class="mb-4 <?php
                            $admin = array("superadmin", "adminabakris", "adminprbk");
                            if (!in_array($this->session->userdata('username'), $admin)) {
                              echo "d-none";
                            }
                            ?>">
            <?php
            $activeValue = urldecode($this->uri->segment('3'));
            ?>
            <label for="Nama Ibadah" class="font-weight-bold">Kategori Ibadah</label>
            <?php if (in_array($this->session->userdata('username'), $admin)) { ?>
              <select class="custom-select" name="jenisIbadah" id="jenisIbadah" onchange="document.location.href = '<?= base_url('Admin/daftarIbadah/'); ?>' + this.value">
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
                                                                          } ?>>Persekutuan Filadelfia</option>
                  <option value="Persekutuan Kana" class="d-block" <?php if ($activeValue === "Persekutuan Kana") {
                                                                      echo "selected";
                                                                    } ?>>Persekutuan Kana</option>
                  <option value="Persekutuan Bethlehem" class="d-block" <?php if ($activeValue === "Persekutuan Bethlehem") {
                                                                          echo "selected";
                                                                        } ?>>Persekutuan Bethlehem</option>
                  <option value="TPI" class="d-block" <?php if ($activeValue === "TPI") {
                                                        echo "selected";
                                                      } ?>>TPI</option>
                  <option value="Khusus" class="d-block" <?php if ($activeValue === "Khusus") {
                                                            echo "selected";
                                                          } ?>>Khusus</option>
                <?php } ?>
              </select>
            <?php } ?>
          </div>

          <?php if (empty($ibadahMingguIni)) { ?>
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ibadah Pekan Ini</h6>
              </div>
              <div class="card-body text-center">
                <h6>Belum ada ibadah terbaru dalam pekan ini</h6>
              </div>
            </div>
          <?php } else { ?>
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ibadah Pekan Ini</h6>
              </div>
              <div class="card-body px-5">
                <?php $this->load->model('m_kehadiran');
                foreach ($ibadahMingguIni as $data) : ?>
                  <div class="row">
                    <h5 class="text-dark" style="line-height: 1.6">
                      <?= $data['nama'] ?><br>
                      "<?= $data['tema'] ?>"<br>
                      <?= tgl_indo($data['tanggal'], true) . "<br>
                      Mulai pukul " . time_indo($data['jam']) . " WIB" ?>
                    </h5>
                  </div>
                  <div class="row">
                    <?php if ($activeValue === "Umum 1") {
                      if ($data['link'] !== "-") { ?>
                        <a href="<?= $data['link'] ?>" target="_blank" class="btn btn-danger btn-sm p-2 my-1 mr-2"><i class="fa fa-youtube-play fa-sm text-white mr-2"></i>LINK YOUTUBE</a>
                    <?php }
                    } ?>
                    <a href="<?= base_url('Admin/tambahKehadiran/') . $data['kode'] ?>" class="btn btn-primary btn-sm p-2 my-1 mr-2"><i class="fa fa-list fa-sm text-white mr-2"></i>CEK KEHADIRAN</a>
                    <a href="<?= base_url('Admin/tutupDaftarOnsite/') . $data['kode'] ?>" class="btn btn-success btn-sm p-2 my-1 mr-2" onclick="return confirm('Anda yakin ingin MENUTUP kehadiran ibadah <?= $data['nama'] ?>?')"><i class="fa fa-times fa-sm text-white mr-2"></i>TUTUP KEHADIRAN</a>
                    <a href="<?= base_url('Admin/ubahIbadah/') . $data['kode'] ?>" class="btn btn-info btn-sm p-2 my-1 mr-2"><i class="fa fa-pencil-square-o fa-sm text-white mr-2"></i>EDIT</a>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php } ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Arsip Ibadah</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <!-- <th>No</th> -->
                      <th>Ibadah</th>
                      <th>Tanggal</th>
                      <th>Jemaat Hadir</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ibadah as $data) :
                      $hadir = count($this->m_kehadiran->jemaatHadir($data['kode']));
                    ?>
                      <tr>
                        <!-- <td><img class="img-responsive shadow" style="width: 10rem;" src="<?= base_url('assets/img/thumbnail/') . $data['image'] ?>" alt=""></td> -->
                        <td><?= $data['nama'] ?><br>"<?= $data['tema'] ?>"</td>
                        <td><?= tgl_indo($data['tanggal']) ?></td>
                        <td><?= $hadir ?></td>
                        <td><a href="<?= base_url('Admin/detailIbadah/') . $data['kode'] ?>" class="btn btn-info btn-sm p-2"><i class="fa fa-info-circle fa-sm text-white mr-2"></i>DETAIL</a></td>
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