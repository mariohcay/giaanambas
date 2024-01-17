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
                                    <h1 class="h4 text-gray-900 mb-0 font-weight-bold mb-4">Selamat Datang di<br>SISTEM
                                        PENGELOLAAN DATA JEMAAT GIA ANAMBAS MALANG</h1>
                                    <p class="mb-4">Silahkan Login terlebih dahulu</p>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form action="<?= base_url('Auth') ?>" method="POST" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username"
                                            name="username" placeholder="Username" autocomplete="off"
                                            required="required">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            placeholder="Password" required="required">
                                    </div>
                                    <hr>
                                    <input type="submit" href="index.html"
                                        class="btn btn-dark btn-user btn-block font-weight-bold" value="LOGIN">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>