<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="card shadow mb-4" id="cardProfile">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Ubah Data Ibadah</h6>
  </div>
  <div class="card-body">
    <?= $this->session->tempdata('message'); ?>
    <form action="<?= base_url('Admin/simpanUbahIbadah/').$ibadah['kodeIbadah'] ?>" method="POST" enctype="multipart/form-data">
    <ul class="list-group">
      <li class="list-group-item">
        <label for="Nama Ibadah" class="font-weight-bold">Nama Ibadah</label>
        <input type="text" class="form-control d-block" id="namaIbadah" name="namaIbadah" value="<?= $ibadah['namaIbadah']?>" required>
      </li>
      <li class="list-group-item">
        <label for="Tema Ibadah" class="font-weight-bold">Tema Ibadah</label>
        <input type="text" class="form-control d-block" id="temaIbadah" name="temaIbadah" value="<?= $ibadah['temaIbadah']?>" required>
      </li>
      <li class="list-group-item">
        <label for="Tanggal Ibadah" class="font-weight-bold">Tanggal Ibadah</label>
        <input type="date" class="form-control d-block" id="tanggalIbadah" name="tanggalIbadah" value="<?= $ibadah['tanggalIbadah']?>" required>
      </li>
      <li class="list-group-item">
        <label for="Jam Ibadah" class="font-weight-bold">Jam Ibadah</label>
        <div class="d-flex justify-content-between align-items-center">
          <select class="custom-select mr-3" name="jam">
              <?php for ($i=1; $i<=24; $i++){
                  $jam = strval($i);
                  if ($i <= 9){
                      $jam = "0".strval($i);
                  }
                  if(substr($ibadah['jamIbadah'],0,2) == $jam){
                    echo '<option value="'.$jam.'" class="d-block" selected>'.$jam.'</option>';
                  } else {
                    echo '<option value="'.$jam.'" class="d-block" >'.$jam.'</option>';
                  }
              }
              ?>
          </select>
          <b>:</b>
          <select class="custom-select ml-3" name="menit">
              <?php for ($i=0; $i<=55; $i+=5){
                  $menit = strval($i);
                  if ($i <= 9){
                      $menit = "0".strval($i);
                  }
                  if(substr($ibadah['jamIbadah'],-2) == $menit){
                    echo '<option value="'.$menit.'" class="d-block" selected>'.$menit.'</option>';
                  } else {
                    echo '<option value="'.$menit.'" class="d-block" >'.$menit.'</option>';
                  }
              }?>
          </select>
        </div>  
      </li>
      <li class="list-group-item">
        <label for="Kuota" class="font-weight-bold">Kuota</label>
        <input type="number" class="form-control d-block" id="kuota" name="kuota" value="<?= $ibadah['kuota']?>" required>
      </li>
      <li class="list-group-item">
        <label for="Link Youtube" class="font-weight-bold">Link Youtube</label>
        <input type="text" class="form-control d-block" id="link" name="link" value="<?= $ibadah['link']?>" required>
      </li>
      <li class="list-group-item">
        <label for="Thumbnail" class="font-weight-bold">Thumbnail</label><br>
        <img src="<?= base_url('assets/img/thumbnail/').$ibadah['image']?>" class="img-fluid" style="width: 30rem">
        <input type="text" value="<?= $ibadah['image']?>" hidden name="image">
      </li>
      <li class="list-group-item">
        <label for="Deskripsi" class="font-weight-bold">Deskripsi</label><br>
        <textarea name="deskripsi" id="deskripsi" rows="10" required style="width: 100%" class="form-control"><?= $ibadah['deskripsi']?></textarea>
        <!-- <input type="text" class="form-control d-block" id="deskripsi" name="deskripsi" required> -->
      </li>
    </ul>
    <hr>
    <div class="d-inline float-right align-items-center">
      <a href="<?= base_url('Dashboard')?>" class="mr-4 text-secondary" id="batal"><small>BATAL</small></a>
      <button type="submit" class="btn btn-success btn-sm" id="simpan">SIMPAN</button>
    </div>
    </form>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
