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
            <a class="navbar-brand" href="#page-top">
                GKI Kebonagung
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0 align-items-lg-center">
                    <li class="nav-item"><a class="nav-link scroll" href="#ibadah">Ibadah</a></li>
                    <li class="nav-item"><a class="nav-link scroll" href="#galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link scroll" href="#download">Download</a></li>
                    <li class="nav-item"><a class="nav-link scroll" href="#kontak">Kontak</a></li>
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
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <img src="<?= base_url() ?>/assets/img/logo.png" alt="" class="mb-4" width="120rem">
                    <h1 class="text-white font-weight-bold">Selamat Datang <br> di GKI Kebonagung</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Shalom, bagi para Jemaat GKI Kebonagung diharapkan untuk <b class="text-white">membuat akun dan melengkapi data jemaat</b> yang diperlukan untuk <b class="text-white"><i>update</i> data jemaat.</b></p>
                    <a class="btn btn-primary btn-xl" href="<?= base_url() ?>Auth/register">Buat Akun</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Pengumuman-->
    <section class="page-section bg-primary">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">Pengumuman Penting!</h2>
                    <hr class="divider divider-light" />
                    <!-- <p class="text-white-75">
                        Memperhatikan kondisi kesehatan lingkungan terkait penyebaran covid-19 varian Omicron, maka mulai bulan Februari 2022 kehadiran jemaat di gereja ditentukan dengan jadwal berikut: <br><br>
                        <b class="text-white">Minggu, 20 Februari 2022 - lingkungan A dan B</b><br>
                        <b class="text-white">Minggu, 27 Februari 2022 - lingkungan C, D, dan E</b><br><br>
                        Dengan demikian pendaftaran ibadah melalui website akan ditiadakan untuk sementara. <br>
                        Silahkan menghubungi koordinator lingkungan masing-masing untuk konfirmasi kehadiran ibadah.
                    </p>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">
                        Segenap jemaat diundang untuk ambil bagian dalam pelayanan bersama dengan <br><b class="text-white">Tim Multimedia GKI Kebonagung</b>. <br>
                        Bagi jemaat yang berminat untuk bergabung dalam Tim Multimedia dapat mengisi form pendaftaran melalui <i>link</i> di bawah ini Pendaftaran dapat dilakukan mulai tanggal <b class="text-white">27 Februari – 12 Maret 2022.</b>
                    </p>
                    <a class="btn btn-light btn-xl mb-2" target="_blank" href="https://forms.gle/HBjBGKiT6v9GucD6A">PENDAFTARAN TIM MULTIMEDIA</a>
                    <hr class="divider divider-light mb-4" />
                    <p class="text-white-75 mb-5 mt-4">
                        <b class="text-white">Ibadah Rabu Abu tanggal 2 Maret 2022</b> akan dilaksanakan secara <b class="text-white"><i>hybrid (on-site dan online)</i></b> dengan <b class="text-white">kapasitas maksimal 40 jemaat (tempat duduk lesehan)</b> yang hadir di gereja. <br>
                        <b class="text-white">Syarat menghadiri ibadah <i>on-site</i>: berusia 13-59 tahun, mematuhi protokol kesehatan, dan sudah mendapatkan vaksin.</b><br><br>
                        Jemaat yang ingin hadir dalam ibadah <i>on-site</i> di gereja dapat mendaftarkan diri terlebih dahulu melalui <i>link</i> di bawah ini atau dapat juga melalui koordinator lingkungan masing-masing.
                    </p>  -->
                    <p class="text-white-75">
                        Sehubungan dengan penurunan level PPKM maka ibadah <b class="text-white"><i>onsite-online (hybrid)</i></b> dengan kehadiran jemaat dapat dilaksanakan mulai <b class="text-white">3 April 2022</b>. <br><b class="text-white">Syarat: menerapkan protokol kesehatan, sudah mendapatkan vaksin, berusia lebih dari 13 tahun.</b><br><br>

                        Jemaat yang ingin hadir dalam ibadah <i>on-site</i> di gereja dapat mendaftarkan diri terlebih dahulu melalui <i>link</i> di bawah ini atau dapat juga melalui koordinator lingkungan masing-masing.<br><br>
                    </p>

                    <!-- <a class="btn btn-light btn-xl" href="<?= base_url() ?>Fronts/pilihOnsite">DAFTAR IBADAH RABU ABU</a> -->
                    <a class="btn btn-light btn-xl" href="<?= base_url() ?>Fronts/pilihOnsite">DAFTAR IBADAH <i>ON-SITE</i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Ibadah -->
    <section class="page-section" id="ibadah">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Ibadah <i>Online</i> Minggu ini</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-dark-75 mb-0">Seluruh kegiatan Ibadah dilaksanakan secara <b><i>online</i>/daring</b>, dapat diakses melalui link berikut ini.</b></p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-4">
                    <div class="mt-5">
                        <div class="card text-center shadow mx-3">
                            <!-- UBAH -->
                            <a href="https://youtu.be/JqLu2oh6yLE" target="_blank" class="text-decoration-none">
                                <img src="<?= base_url() ?>front/assets/img/umum.jpg" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">Ibadah Umum</h4>
                                <!-- UBAH -->
                                <p class="card-text">"Sabat yang Memerdekakan"<br>Minggu, 21 Agustus 2022 - 07.00 WIB<br>Pdt. Dwi Santoso</p>
                            </div>
                            <div class="card-body">
                                <!-- UBAH -->
                                <a href="<?= base_url() ?>Fronts/pilihOnsite" class="btn btn-primary mb-2 px-5 mx-1" style="border-radius: 10rem; font-size: 11pt">Onsite</a>
                                <a href="https://youtu.be/JqLu2oh6yLE" target="_blank" class="btn btn-primary mb-2 px-5 mx-1" style="border-radius: 10rem; font-size: 11pt">Online</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center d-none">
                    <div class="mt-5">
                        <div class="card text-center shadow mx-3">
                            <a href="#ibadah" class="text-decoration-none">
                                <img src="<?= base_url() ?>front/assets/img/ka.jpg" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">Sekolah Minggu</h4>
                                <!-- UBAH -->
                                <p class="card-text">"Taat Membawa Selamat"<br>Minggu, 14 Agustus 2022 - 07.00 WIB</p>
                            </div>
                            <div class="card-body">
                                <!-- UBAH -->
                                <a href="#ibadah" class="btn btn-primary mb-2 px-5" style="border-radius: 10rem; font-size: 11pt">Onsite</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center d-none">
                    <div class="mt-5">
                        <div class="card text-center shadow mx-3">
                            <!-- UBAH -->
                            <a href="#ibadah" class="text-decoration-none">
                                <img src="<?= base_url() ?>front/assets/img/kpr.jpg" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">Persekutuan KPR</h4>
                                <!-- UBAH -->
                                <p class="card-text">"Berbagi Injil Bukan Kristenisasi"<br>Minggu, 26 Juni 2022 - 16.00 WIB<br>Pnt. Nella Simamora</p>
                            </div>
                            <div class="card-body">
                                <!-- UBAH -->
                                <a href="#ibadah" class="btn btn-primary mb-2 px-5" style="border-radius: 10rem; font-size: 11pt">Onsite di Gereja</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="mt-5">
                        <div class="card text-center shadow mx-3">
                            <!-- UBAH -->
                            <a href="#ibadah" class="text-decoration-none">
                                <img src="<?= base_url() ?>front/assets/img/pa.jpg" class="card-img-top">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">Pemahaman Alkitab</h4>
                                <!-- UBAH -->
                                <p class="card-text">"Kebahagiaan Orang Takut Tuhan"<br>Kamis, 25 Agustus 2022 - 18.00 WIB <br>Pnt. Nella Simamora</p>
                            </div>
                            <div class="card-body">
                                <!-- UBAH -->
                                <a href="#ibadah" class="btn btn-primary mb-2 px-5" style="border-radius: 10rem; font-size: 11pt">Onsite di Gereja</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri -->
    <section class="page-section bg-primary text-light" id="galeri">
        <div class="container px-4">
            <h2 class="text-center mt-0">Galeri</h2>
            <hr class="divider bg-light" />
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-dark-75 mb-0">Beberapa dokumentasi kegiatan Jemaat GKI Kebonagung selama beberapa tahun terakhir</b></p>
                </div>
            </div>
        </div>
        <div id="portfolio">
            <div class="container-fluid mt-5 p-0">
                <div class="row g-0 justify-content-center shadow-lg">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url() ?>front/assets/img/galeri/1.jpg" title="Baptis Dewasa dan SIDI 2021">
                            <img class="img-fluid" src="<?= base_url() ?>front/assets/img/galeri/1.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-name">Baptis Dewasa dan SIDI 2021</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url() ?>front/assets/img/galeri/2.jpg" title="Natal Komisi Anak 2017">
                            <img class="img-fluid" src="<?= base_url() ?>front/assets/img/galeri/2.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-name">Natal Komisi Anak 2017</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url() ?>front/assets/img/galeri/3.jpg" title="Tim Kulintang 2017">
                            <img class="img-fluid" src="<?= base_url() ?>front/assets/img/galeri/3.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-name">Tim Kulintang 2017</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url() ?>front/assets/img/galeri/4.jpg" title="Baptis Anak Sidi dan Dewasa 2017">
                            <img class="img-fluid" src="<?= base_url() ?>front/assets/img/galeri/4.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-name">Baptis Anak Sidi dan Dewasa 2017</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url() ?>front/assets/img/galeri/5.jpg" title="HUT KPR ke 47">
                            <img class="img-fluid" src="<?= base_url() ?>front/assets/img/galeri/5.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-name">HUT KPR ke-47</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?= base_url() ?>front/assets/img/galeri/6.jpg" title="Bulan Keluarga 2015">
                            <img class="img-fluid" src="<?= base_url() ?>front/assets/img/galeri/6.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-name">Bulan Keluarga 2015</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Download -->
    <section class="page-section bg-dark text-white" id="download">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mb-4">Download</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-dark-75 mb-0">Warta Jemaat dan Liturgi Ibadah untuk Minggu ini dapat di-<i>download</i> disini</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-file-earmark-text fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Warta Jemaat</h3>
                        <!-- UBAH -->
                        <a class="text-decoration-none" href="<?= base_url() ?>front/assets/docs/warta.docx" download="Warta Jemaat 14 Agustus 2022">
                            <span class="h6 text-light"><i class="bi bi-download fs-4 mx-1"></i>
                                Download
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-file-earmark-text fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Liturgi Ibadah Umum</h3>
                        <!-- UBAH -->
                        <a class="text-decoration-none" href="<?= base_url() ?>front/assets/docs/liturgi.docx" download="Liturgi Ibadah 14 Agustus 2022">
                            <span class="h6 text-light"><i class="bi bi-download fs-4 mx-1"></i>
                                Download
                            </span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Kontak -->
    <section class="page-section" id="kontak">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">Hubungi Kami</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">Segala bentuk masukan, kritik, dan saran dari Jemaat sekalian dapat disampaikan melalui form berikut ini.</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                    <form method="POST" name="saran" action="<?= base_url('Fronts/submitPesan') ?>">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="nama" type="text" placeholder="Nama" required />
                            <label for="name">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="email" type="email" placeholder="Email" required />
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="subyek" type="text" placeholder="Subyek" required />
                            <label for="subyek">Subyek</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="pesan" type="text" placeholder="Tuliskan pesan Anda..." style="height: 10rem" required></textarea>
                            <label for="message">Pesan</label>
                        </div>
                        <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Kirim</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

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