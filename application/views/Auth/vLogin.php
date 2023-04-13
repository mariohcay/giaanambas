<div class="bg-dark">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center" style="height: 100vh">

            <div class="col-xl-10 col-lg-12 col-md-9 d-flex justify-content-center">
                <div class="card o-hidden border-0 shadow-lg my-5 col-lg-8">
                    <div class="card-body p-0">
                        <div class="my-auto">
                            <div class="p-5">
                                <img src="<?= base_url() ?>/assets/img/logo.png" class="rounded mx-auto d-block w-50">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-0 font-weight-bold mb-4">Selamat Datang di<br>SISTEM PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG</h1>
                                    <p class="mb-4">Silahkan Login terlebih dahulu</p>
                                </div>
                                <div class="d-flex justify-content-center mb-4">
                                    <video id="video" width="320" height="240" autoplay></video>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form action="<?= base_url('Auth') ?>" method="POST" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" autocomplete="off" required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required="required">
                                    </div>
                                    <hr>
                                    <input type="submit" href="index.html" class="btn btn-dark btn-user btn-block font-weight-bold" value="LOGIN">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Access the user's camera and display a video stream
    navigator.mediaDevices.getUserMedia({
            video: true
        })
        .then(function(stream) {
            var video = document.getElementById("video");
            video.srcObject = stream;
            video.onloadedmetadata = function(e) {
                video.play();
            };

            // Set up QuaggaJS to scan for QR codes
            Quagga.init({
                inputStream: {
                    constraints: {
                        width: 640,
                        height: 480,
                    },
                    target: document.querySelector('#video')
                },
                decoder: {
                    readers: ['ean_reader']
                }
            }, function(err) {
                if (err) {
                    console.log(err);
                    return;
                }
                console.log('QuaggaJS ready to start scanning');
                Quagga.start();
            });

            // When a QR code is detected, output the data to an input field
            Quagga.onDetected(function(result) {
                console.log('QR code detected:', result.codeResult.code);
                document.getElementById('username').value = result.codeResult.code;
            });
        })
        .catch(function(err) {
            console.log('Error accessing camera:', err);
        });
</script>