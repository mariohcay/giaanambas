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
                <?php if (!empty($ibadah)) { ?>
                    <h2 class="mt-0 text-white">Pilih Ibadah <i>On-site</i></h2>
                    <hr class="divider" />
                    <p class="text-white mb-5">Jika Anda sudah memiliki akun jemaat, Anda dapat mendaftar Ibadah <i>on-site</i> dengan <a href="<?= base_url() ?>Auth/register" class="font-weight-bold text-white">klik di sini</a></p>
                <?php } 
                else { ?>
                    <h2 class="mt-0 text-white">Mohon maaf pendaftaran ibadah <i>on-site </i> belum tersedia hari ini.</h2>
                <?php } ?>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <?php
                $this->load->model('m_kehadiran');
                foreach ($ibadah as $data) { ?>
                    <div class="<?php if (count($ibadah) > 2) {
                                    echo "col-lg-4";
                                } else echo "col-xl-5 col-lg-7" ?>">
                        <div class="card text-center shadow mx-3 mb-sm-4">
                            <?php
                            $terisi = $this->m_kehadiran->cekKuota($data['kodeIbadah']);
                            ?>
                            <!-- UBAH -->
                            <a href="<?= base_url('Fronts/daftarOnsite/' . $data['kodeIbadah']) ?>" target="_blank" class="text-decoration-none">
                                <img src="<?= base_url('assets/img/thumbnail/' . $data['image']) ?>" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title"><?= $data['namaIbadah'] ?></h4>
                                <!-- UBAH -->

                                <p class="card-text">
                                    <!-- <?= tgl_indo($data['tanggalIbadah'], true)?> <br> -->
                                    "<?= $data['temaIbadah'] ?>"<br>
                                    Pukul <?= time_indo($data['jamIbadah']) ?> WIB <br>
                                    <a class="text-black-50 text-decoration-none">(Seluruh jemaat berusia di atas 13 tahun diperbolehkan hadir)</a>
                                    <?php
                                    // $tersedia = $data['kuota'] - $terisi;
                                    // if ($tersedia > 0) {
                                    //     echo "<b class='text-success'>Tersedia $tersedia kursi lagi</b>";
                                    // } else echo "<b class='text-danger'>Maaf kuota sudah habis</b>";
                                    ?>
                                </p>
                            </div>
                            <div class="card-body">
                                <!-- UBAH -->
                                <a href="<?= base_url('Fronts/daftarOnsite/' . $data['kodeIbadah']) ?>" class="btn mb-2 px-5
                                <?php
                                    // if ($tersedia < 1) {
                                    // echo "btn-secondary disabled";
                                    // } 
                                ?>
                                btn-primary" style="border-radius: 10rem; font-size: 11pt">PILIH</a>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
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