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
        <h3 class="h3 text-gray-800 mb-1">
          <?= $ibadah['nama'];
          echo "\n"; ?>
          <h5>
            <?= tgl_indo($ibadah['tanggal'], true) ?>
          </h5>
      </div>
    </div>
    <a href="<?= base_url('Admin/tutupDaftarOnsite/') . $ibadah['kode'] ?>" class="btn btn-success shadow-sm"
      onclick="return confirm('Anda yakin ingin MENUTUP kehadiran ibadah <?= $ibadah['nama'] ?>?')"><i
        class="fas fa-times fa-sm text-white mr-1"></i> TUTUP KEHADIRAN</a>
  </div>

  <!-- DataTales Example -->
  <?= $this->session->flashdata('message'); ?>
  <div class="card shadow mb-4">
    <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Jemaat Terdaftar</h6>
            </div> -->
    <div class="card-body" id="daftarHadir">
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active font-weight-bold" href="#">Tambah Kehadiran</a>
        <a class="nav-item nav-link" href="<?= base_url('Admin/jemaatTerdaftar/') . $ibadah['kode'] ?>">Daftar
          Kehadiran</a>
        <a class="nav-item nav-link" href="<?= base_url('Admin/tambahSimpatisan/') . $ibadah['kode'] ?>">Kehadiran
          Simpatisan</a>
      </div>
      <div class="tab-content">
        <div class="tab-pane fade show active">
          <form action="<?= base_url('Admin/submitTambahKehadiranByQrCode/') . $ibadah['kode'] ?>" method="POST">
            <div class="row d-flex mt-4 align-items-center">
              <div class="col">
                <label for="Nama" class="font-weight-bold mb-0">Scan QR</label>
              </div>
              <div class="col-10">
                <input type="text" class="form-control d-block" id="qrCode" name="qrCode" autocomplete="off" required
                  autofocus>
              </div>
              <div class="col">
                <button type="submit" class="btn btn-sm btn-success mr-1" id="submitQRCode"><i
                    class="fa fa-check fa-sm text-white mr-2"></i>
                  HADIR
                </button>
              </div>
            </div>
          </form>
          <div class="table-responsive mt-4">
            <table class="table table-striped" id="tableKehadiran" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="width: 5%">No</th>
                  <th>Id</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th style="width: 10%"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($jemaat as $data): ?>
                  <tr>
                    <td>
                      <?= $i ?>
                    </td>
                    <td>
                      <?= $data['id'] ?>
                    </td>
                    <td>
                      <?= $data['nama'] ?>
                    </td>
                    <td>
                      <?= $data['alamat'] ?>
                    </td>
                    <td>
                      <!-- <a class="btn btn-sm btn-danger mr-1" href="<?= base_url('Admin/hapusJemaatTerdaftarOnsite/') . $data['id'] . "/" . $ibadah['kodeIbadah'] ?>" onclick="return confirm('Yakin ingin menghapus <?= $data['nama'] ?> dari jemaat terdaftar?')">HAPUS</a> -->
                      <a class="btn btn-sm btn-success mr-1"
                        href="<?= base_url('Admin/submitTambahKehadiran/') . $ibadah['kode'] . "/" . $data['id'] ?>"
                        onclick="return confirm('Masukkan <?= $data['nama'] ?> dalam daftar kehadiran jemaat?')"><i
                          class="fa fa-check fa-sm text-white mr-2"></i>HADIR</a>
                    </td>
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
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
  $(document).ready(function () {
    $('#tableKehadiran').DataTable({
      "columnDefs": [
        { "searchable": false, "targets": [0, 1, 3, 4] },
      ]
    });
  });
</script>