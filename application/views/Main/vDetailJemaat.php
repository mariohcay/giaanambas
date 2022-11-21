        <!-- Custom styles for this page -->
        <link href="<?= base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Detail Jemaat</h1>

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pribadi</h6>
              </div>
              <div class="card-body">
                <?= $this->session->flashdata('alertUbah'); ?>
                <ul class="list-group">
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">No. Induk</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['noinduk']; ?></div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Nama</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['nama']; ?></div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Tempat, Tanggal Lahir</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['ttl']; ?></div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Keanggotaan</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['keanggotaan']; ?></div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Jenis Kelamin</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['jk']; ?></div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Nama Ayah</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['ayah']; ?></div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Nama Ibu</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['ibu']; ?></div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Alamat</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['alamat']; ?></div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Kode Jemaat</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['kodejemaat']; ?></div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Baptis</h6>
              </div>
              <div class="card-body">
                <!-- <?= $this->session->flashdata('alertUbah'); ?> -->
                <ul class="list-group">
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Tanggal Baptis Anak</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['baptisanak']; ?></div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Tanggal Baptis Sidi</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['baptissidi']; ?></div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Tempat Baptis Sidi</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['tempat']; ?></div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Pendeta yang Membaptis</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['pendeta']; ?></div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Tanggal Meninggal Dunia</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['meninggal']; ?></div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Atestasi</h6>
              </div>
              <div class="card-body">
                <!-- <?= $this->session->flashdata('alertUbah'); ?> -->
                <ul class="list-group">
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Tanggal Atestasi Keluar</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['keluar']; ?></div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Gereja Tujuan</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['tujuan']; ?></div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Tanggal Atestasi Masuk</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['masuk']; ?></div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Asal Gereja</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['asal']; ?></div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pernikahan</h6>
              </div>
              <div class="card-body">
                <!-- <?= $this->session->flashdata('alertUbah'); ?> -->
                <ul class="list-group">
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Status Menikah</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['statusmenikah']; ?></div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-md-3">Jumlah Anak</div>:
                      <div class="col-md-8">
                        <div class="font-weight-bold float-left"><?= $jemaat['jumlahanak']; ?></div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>

            <a href="<?= base_url('DetailJemaat/ubah/'. $jemaat['noinduk'])?>" class="btn btn-primary btn-icon-split ml-2 mb-4 float-right">
              <span class="icon"><i class="fas fa-fw fa-pen"></i></span>
              <span class="text">Ubah</span>
            </a>
            <a href="<?= base_url('DetailJemaat/hapus/'. $jemaat['noinduk'])?>" class="btn btn-danger btn-icon-split mx-2 mb-4 float-right">
              <span class="icon"><i class="fas fa-fw fa-trash"></i></span>
              <span class="text">Hapus</span>
            </a>
            <a href="<?= base_url('DetailJemaat/cetak/'. $jemaat['noinduk'])?>" class="btn btn-success btn-icon-split mx-2 mb-4 float-right">
              <span class="icon"><i class="fas fa-fw fa-download"></i></span>
              <span class="text">Download</span>
            </a>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->