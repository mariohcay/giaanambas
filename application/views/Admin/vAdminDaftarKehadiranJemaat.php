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
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="row">
                    <div class="col">
                        <h3 class="h3 text-gray-800 mb-1"><?= $ibadah['namaIbadah'];
                                                            echo "\n"; ?>
                            <h5><?= tgl_indo($ibadah['tanggalIbadah'], true) ?></h5>
                    </div>
                </div>
                <a href="<?= base_url('Admin/exportExcel/' . $ibadah['kodeIbadah']) ?>" class="btn btn-success shadow-sm"><i class="fas fa-file-excel fa-sm text-white mr-1"></i> Export Excel</a>
            </div>

            <!-- DataTales Example -->
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Kehadiran Jemaat</h6>
                </div>
                <div class="card-body" id="daftarHadir">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Lingkungan</th>
                                    <th>Status</th>
                                    <th>Waktu Daftar</th>
                                    <th>Waktu Hadir</th>
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
                                        <td><?= $data['jenisKelamin'] ?></td>
                                        <td><?= $data['lingkungan'] ?></td>
                                        <td><?= $data['status'] ?></td>
                                        <?php
                                        $waktuDaftar = new DateTime($data['timeDaftar']);
                                        ?>
                                        <td><?= tgl_indo($waktuDaftar->format('Y-m-d')) . " - " . time_indo($waktuDaftar->format('H:i')) ?> WIB</td>
                                        <td><?= time_indo($data['timeHadir']) ?> WIB</td>
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