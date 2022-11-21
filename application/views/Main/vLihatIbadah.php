        <!-- Begin Page Content -->
        <div class="container-fluid">

          <h1 class="h3 mb-4 text-gray-800"><?= $ibadah['namaIbadah'] ?></h1>
          <div class="card shadow mb-4">
            <div class="card-body mr-4 px-4">
              <div class="row">
                <div class="col-lg-4 mb-4 mr-lg-4">
                  <div class="responsive-container">
                    <iframe class="responsive-iframe" src="<?= $ibadah['link'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                </div>
                <div class="col-lg">
                  <h5 class="text-dark"><?= $ibadah['namaIbadah'] ?><br>"<?= $ibadah['temaIbadah'] ?>"</h5>
                  <h6><?= tgl_indo($ibadah['tanggalIbadah'], true) . " - " . time_indo($ibadah['jamIbadah']) . " WIB" ?></h6>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <hr>
                  <div>
                    <pre><span style="font-family:nunito; font-size:13pt" class="text-gray-600"><?= $ibadah['deskripsi'] ?></span></pre>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->