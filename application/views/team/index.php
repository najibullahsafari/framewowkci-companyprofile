

   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <div class="row">
            <div class="col-lg-18">
        
        <?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= $this->session->flashdata('message'); ?>

              <a href="<?= base_url('team/add'); ?>" class="btn btn-primary mb-3">Add Content</a>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i = 1;
                  foreach($team as $team) :
                  ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $team['nama']; ?></td>
                    <td><?= $team['jabatan']; ?></td>
                    <td>
                      
                      <a href="<?= base_url('team/edit/') . $team['id']; ?>" class="badge badge-warning tombol-edit">Edit</a>
                      <a href="<?= base_url('team/delete/') . $team['id']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
