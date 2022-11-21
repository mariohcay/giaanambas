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
                    <h2 class="mt-0 text-white">Anda telah terdaftar pada Ibadah <i>On-site </i><?= tgl_indo($ibadah['tanggalIbadah'], true) ?></h2>
                    <hr class="divider" />
                    <p class="text-white mb-4">Silahkan <b><i>screenshoot</i> QR Code</b> di bawah ini untuk ditunjukkan kepada petugas sebelum mengikuti ibadah. <br> Agar memudahkan, harap datang 15 menit sebelum ibadah dimulai. Tuhan Yesus memberkati :)</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-4">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <h5>Ibadah <?= tgl_indo($ibadah['tanggalIbadah'], true) ?> </h5>
                            </div>
                            <div class="text-center">
                                <img src="<?php echo base_url('Ibadah/renderQRCode/'. $jemaat['id']) ?>" alt="" class="">
                            </div>
                            <div class="text-center">
                                <h5><?= $jemaat['id'] ?></h5>
                                <h5><?= $jemaat['nama'] ?></h5>
                                <h5>Lingkungan <?= $jemaat['lingkungan'] ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">

                        <a href="<?= base_url('Fronts/pilihOnsite') ?>" class="btn mb-2 px-5 btn-primary mt-4" style="border-radius: 10rem; font-size: 11pt">DAFTAR LAGI?</a>
                    </div>
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