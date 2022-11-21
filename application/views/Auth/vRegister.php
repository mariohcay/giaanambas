<body class="bg-dark">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row d-flex align-items-center">
          <div class="col-lg-5 d-none d-lg-block">
            <img src="<?= base_url('assets/img/1.png') ?>" class="d-block w-100" style="object-fit: cover;">
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar Akun Baru</h1>
              </div>
              <?= $this->session->flashdata('message'); ?>
              <form action="<?= base_url('Auth/register') ?>" method="POST" class="user">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="username" placeholder="Username" required="required" value="<?= $this->session->flashdata('username'); ?>">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Lengkap" required="required" value="<?= $this->session->flashdata('nama'); ?>">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="telepon" placeholder="No. Telepon atau WA" minlength="7" required="required" oninvalid="this.setCustomValidity('Masukkan No. Telepon yang Valid')" oninput="this.setCustomValidity('')" value="<?= $this->session->flashdata('telepon'); ?>">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" placeholder="Email" required="required" value="<?= $this->session->flashdata('email'); ?>">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="pass1" placeholder="Password" minlength="8" required="required" oninvalid="this.setCustomValidity('Password harus terdiri dari minimal 8 karakter')" oninput="this.setCustomValidity('')">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="pass2" placeholder="Konfirmasi Password" required="required">
                </div>
                <hr>
                <input type="submit" href="login.html" class="btn btn-dark btn-user btn-block font-weight-bold" value="DAFTAR">
              </form>
              <div class="text-center mt-4">
                <p class=>Sudah punya akun? <a href="<?= base_url('Auth') ?>" class="text-primary text-decoration-none font-weight-bold">Login Sekarang</a></p>
              </div>
              <div class="text-center">
                <p>Menuju ke <a href="<?= base_url('Fronts') ?>" class="text-danger text-decoration-none font-weight-bold">Halaman utama</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>