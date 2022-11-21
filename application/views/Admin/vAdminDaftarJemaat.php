        <!-- Custom styles for this page -->
        <link href="<?= base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        
        <!-- Page level plugins -->
        <script src="<?= base_url()?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url()?>assets/js/demo/datatables-demo.js"></script>
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Daftar Jemaat GIA Anambas Malang</h1>

            <!-- DataTales Example -->
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow mb-4">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($jemaat as $data):?>
                      <tr>
                        <td><?= $data['id']?></td>
                        <td><?= $data['nama']?></td>
                        <td><?= $data['alamat']?></td>
                        <td><a href="<?= base_url('Admin/detailJemaat/').$data['id']?>" class="btn btn-info btn-sm p-2">DETAIL</a></td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->