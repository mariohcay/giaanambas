<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="card shadow mb-4" id="cardProfile">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tambah Data Jemaat</h6>
    </div>
    <div class="card-body">
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('Admin/simpanTambahJemaat') ?>" method="POST">
        <ul class="list-group">
          <li class="list-group-item">
            <label for="Id" class="font-weight-bold">Id Jemaat</label>
            <input type="text" class="form-control d-block" value="<?= $id ?>" id="id" name="id" readonly>
          </li>
          <li class="list-group-item">
            <label for="Nama" class="font-weight-bold">Nama</label>
            <input type="text" class="form-control d-block" id="nama" name="nama" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="Username" class="font-weight-bold">Username</label>
            <input type="text" class="form-control d-block" id="username" name="username" autocomplete="off" required>
            <div id="message" class="mt-2 text-danger">Username telah dipakai</div>
          </li>
          <li class="list-group-item">
            <label for="Password" class="font-weight-bold">Password</label>
            <input type="password" class="form-control d-block" id="password" name="password" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="Konfirmasi Password" class="font-weight-bold">Konfirmasi Password</label>
            <input type="password" class="form-control d-block" id="password2" name="password2" autocomplete="off" required>
            <div id="message2" class="mt-2 text-danger">Password tidak cocok</div>
          </li>
          <li class="list-group-item">
            <label for="Telepon" class="font-weight-bold">Telepon</label>
            <input type="telepon" class="form-control d-block" id="telepon" name="telepon" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="Alamat" class="font-weight-bold">Alamat</label>
            <input type="text" class="form-control d-block" id="alamat" name="alamat" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="Jenis Kelamin" class="font-weight-bold">Jenis Kelamin</label>
            <select class="custom-select" name="jenisKelamin">
              <option value="Laki-laki" class="d-block">Laki-laki</option>
              <option value="Perempuan" class="d-block">Perempuan</option>
            </select>
          </li>
          <li class="list-group-item">
            <label for="Tanggal Lahir" class="font-weight-bold">Tanggal Lahir</label>
            <input type="date" class="form-control d-block" id="tanggalLahir" name="tanggalLahir" required>
          </li>
          <li class="list-group-item">
            <label for="Status Pendidikan/Pekerjaan" class="font-weight-bold">Status Pendidikan/Pekerjaan</label>
            <input type="text" class="form-control d-block" id="statusPendidikan" name="statusPendidikan" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="Status Baptis" class="font-weight-bold">Status Baptis</label>
            <select class="custom-select" name="statusBaptis">
              <option value="Sudah" class="d-block">Sudah</option>
              <option value="Belum" class="d-block">Belum</option>
            </select>
          </li>
          <li class="list-group-item">
            <label for="Tanggal Atestasi Masuk" class="font-weight-bold">Tanggal Atestasi Masuk</label>
            <input type="date" class="form-control d-block" id="tanggalAtestasiMasuk" name="tanggalAtestasiMasuk">
          </li>
          <li class="list-group-item">
            <label for="Tanggal Atestasi Keluar" class="font-weight-bold">Tanggal Atestasi Keluar</label>
            <input type="date" class="form-control d-block" id="tanggalAtestasiKeluar" name="tanggalAtestasiKeluar">
          </li>
          <li class="list-group-item">
            <label for="Tanggal Meninggal" class="font-weight-bold">Tanggal Meninggal</label>
            <input type="date" class="form-control d-block" id="tanggalMeninggal" name="tanggalMeninggal">
          </li>
        </ul>
        <hr>
        <div class="d-inline float-right align-items-center">
          <a href="<?= base_url('Admin') ?>" class="mr-4 text-secondary" id="batal"><small>BATAL</small></a>
          <button type="submit" class="btn btn-success btn-sm" id="simpan"><i class="fa fa-plus fa-sm text-white mr-2"></i>TAMBAH
          </button>
        </div>
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
  $('#message').hide();
  $('#message2').hide();

  let check = 0;
  let check2 = 0;

  function checkk() {
    if (check > 0 || check2 > 0) {
      $('#simpan').hide();
    } else $('#simpan').show();
  }

  $('#username').keyup(function(e) {
    var username = $('#username').val();
    $.ajax({
      url: "<?= base_url('Auth/checkUsername') ?>",
      data: {
        username: username
      },
      type: "POST",
      dataType: "json",
      success: function(result) {
        if (result == "1") {
          $('#message').show();
          check += 1;
        } else {
          $('#message').hide();
          check = 0;
        }
        checkk();
      }
    });
  });

  $('#password2').focusout(function(e) {
    var password = $('#password').val();
    var password2 = $('#password2').val();
    if (password !== password2) {
      $('#message2').show();
      check2 += 1;
    } else {
      $('#message2').hide();
      check2 = 0
    }
    checkk();
  });
</script>