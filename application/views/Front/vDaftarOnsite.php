<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $title ?></title>
    <link href="<?= base_url() ?>/assets/img/logo-black.png" rel="icon" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url() ?>front/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="<?= base_url('Fronts') ?>">
                GKI Kebonagung
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0 align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('Fronts/') ?>#ibadah">Ibadah</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('Fronts/') ?>#galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('Fronts/') ?>#download">Download</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('Fronts/') ?>#kontak">Kontak</a></li>
                    <?php if (!empty($this->session->userdata('username'))) { ?>
                        <li class="nav-item"><a class="btn btn-primary px-4 mx-lg-2" style="border-radius: 10rem; font-size: 11pt" href="<?= base_url() ?>Dashboard"><b>AKUN ANDA</b></a></li>
                    <?php } else { ?>
                        <li class="nav-item"><a class="btn btn-primary px-4 mx-lg-2" style="border-radius: 10rem; font-size: 11pt" href="<?= base_url() ?>Auth"><b>LOGIN</b></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 justify-content-center mt-5">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0 text-white">Pendaftaran Ibadah <i>On-site</i><br><?= tgl_indo($ibadah['tanggalIbadah'], true) ?></h2>
                    <hr class="divider" />
                    <p class="text-white mb-5">Silahkan Anda memasukkan data yang benar-benar valid</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                    <?= $this->session->flashdata('message'); ?>
                    <form method="POST" name="daftarOnsite" action="<?= base_url('Fronts/submitDaftarOnsite/' . $kodeIbadah) ?>">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="nama" type="text" placeholder="Nama" required value="<?= $this->session->flashdata('nama'); ?>" />
                            <label for="name">Nama lengkap</label>
                        </div>
                        <div class="form-floating mb-3">
                            <div class="form-group">
                                <select class="form-control" name="jk" required>
                                    <option value="" disabled selected>Jenis Kelamin...</option>
                                    <option value="Laki-laki" <?php if ($this->session->flashdata('jenisKelamin') == "Laki-laki") echo "selected"; ?>>Laki-laki</option>
                                    <option value="Perempuan" <?php if ($this->session->flashdata('jenisKelamin') == "Perempuan") echo "selected"; ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <div class="form-group">
                                <select class="form-control" name="lingkungan" required>
                                    <option value="" disabled selected>Lingkungan...</option>
                                    <option value="A" <?php if ($this->session->flashdata('lingkungan') == "A") echo "selected"; ?>>A</option>
                                    <option value="B" <?php if ($this->session->flashdata('lingkungan') == "B") echo "selected"; ?>>B</option>
                                    <option value="C" <?php if ($this->session->flashdata('lingkungan') == "C") echo "selected"; ?>>C</option>
                                    <option value="D" <?php if ($this->session->flashdata('lingkungan') == "D") echo "selected"; ?>>D</option>
                                    <option value="E" <?php if ($this->session->flashdata('lingkungan') == "E") echo "selected"; ?>>E</option>
                                    <option value="Simpatisan">Simpatisan</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-floating mb-3">
                            <input class="form-control" name="tanggalLahir" type="date" placeholder="tanggal Lahir" max="<?= date('Y-m-d'); ?>" required value="<?= $this->session->flashdata('tanggalLahir'); ?>" />
                            <label for="tanggal Lahir">Tanggal Lahir</label>
                        </div> -->
                        <!-- <div class="form-floating mb-3">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="tanggal" required>
                                            <option value="" disabled selected>Tanggal Lahir</option>
                                            <?php for ($tgl = 1; $tgl <= 31; $tgl++) { ?>
                                                <option value="<?= $tgl ?>" <?php if ($this->session->flashdata('lingkungan') == "A") echo "selected"; ?>><?= $tgl ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="bulan" required>
                                            <option value="" disabled selected>Bulan</option>
                                            <?php
                                            $bulan = array("1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli", "8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember");
                                            for ($i = 1; $i <= 12; $i++) { ?>
                                                <option value="<?= $bulan[$i] ?>" <?php if ($this->session->flashdata('lingkungan') == "A") echo "selected"; ?>><?= $bulan[$i] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="tahun" required>
                                            <option value="" disabled selected>Tahun</option>
                                            <?php for ($tahun = 1900; $tahun <= date('Y'); $tahun++) { ?>
                                                <option value="<?= $tahun ?>" <?php if ($this->session->flashdata('lingkungan') == "A") echo "selected"; ?>><?= $tahun ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-floating mb-3">
                            <div class="form-group">
                                <select class="form-control" name="vaksin" required>
                                    <option value="" disabled selected>Status vaksin...</option>
                                    <option value="Belum vaksin" <?php if ($this->session->flashdata('vaksin') == "Belum vaksin") echo "selected"; ?>>Belum vaksin</option>
                                    <option value="Sudah 1x" <?php if ($this->session->flashdata('vaksin') == "Sudah 1x") echo "selected"; ?>>Sudah 1x</option>
                                    <option value="Sudah 2x" <?php if ($this->session->flashdata('vaksin') == "Sudah 2x") echo "selected"; ?>>Sudah 2x</option>
                                    <option value="Sudah 3x" <?php if ($this->session->flashdata('vaksin') == "Sudah 3x") echo "selected"; ?>>Sudah 3x</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">DAFTAR</button></div>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Footer-->
    <footer class="bg-dark py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-light">Copyright &copy; 2022 - GKI Kebonagung Web Services</div>
        </div>
    </footer>

    <script>
        $('.scroll').on('click', function(e) {
            e.preventDefault();
            var offset = 0;
            var target = this.hash;
            if ($(this).data('offset') != undefined) offset = $(this).data('offset');
            $('html, body').stop().animate({
                'scrollTop': $(target).offset().top - offset
            }, 0, '', function() {});
        });
    </script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?= base_url() ?>front/js/scripts.js"></script>
</body>

</html>