        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Protokol Kesehatan Mengikuti Ibadah Onsite GKI Kebonagung</h1>
            <div class="card shadow mb-4">
              <div class="card-body mr-4">
                Sebelum mendaftarkan diri untuk mengikuti Ibadah Onsite, Jemaat dimohon untuk memperhatikan terlebih dahulu Protokol Kesehatan Mengikuti Ibadah Onsite GKI Kebonagung berikut ini: <br><br>
                1.&ensp; Sudah mendapatkan vaksin <br>
                2.&ensp; Berusia minimal 13 tahun <br>
                3.&ensp; Kondisi sehat (Tidak sedang sakit dalam waktu 2 hari sebelumnya) <br>
                4.&ensp; Hadir tepat waktu <br>
                5.&ensp; Bersedia melakukan pengecekan suhu tubuh <br>
                6.&ensp; Cuci tangan sebelum masuk gereja <br>
                7.&ensp; Wajib mengenakan masker <br>
                8.&ensp; Duduk sesuai tempat yang telah diberi tanda guna menjaga jarak.
              </div>
            </div>

            <h1 class="h3 mb-4 text-gray-800"><?= $ibadah['namaIbadah']?></h1>
            <div class="card shadow mb-4">
              <div class="card-body mr-4">
                  <div class="row">
                    <div class="col-lg-4">
                      
                      <img class="img-fluid mx-3 my-3 shadow" style="width: 25rem;" src="<?= base_url('assets/img/thumbnail/').$ibadah['image']?>" alt="">
                    </div>
                    <div class="col-lg mx-3 my-3">
                      <h5 class="text-dark"><?= $ibadah['namaIbadah']?><br>"<?= $ibadah['temaIbadah']?>"</h5>
                      <h6><?= tgl_indo($ibadah['tanggalIbadah'], true)." - ".time_indo($ibadah['jamIbadah'])." WIB"?></h6>
                      <pre><span style="font-family:nunito; font-size:13pt" class="text-gray-600"><?= $ibadah['deskripsi']?></span></pre>
                      <!-- <h6>Kuota: <?=$terisi."/".$ibadah['kuota']?></h6> -->
                      <a href="#" class="btn btn-primary btn-sm p-2" data-toggle="modal" data-target="#daftarIbadahModal">DAFTAR</a>
                      
                    </div>
                  </div>
              </div>
            </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->