

   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <div class="row">
            <div class="col-lg-11">
        
        <?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>'); ?>
        <?= $this->session->flashdata('message'); ?>

              <a href="<?= base_url('client/add'); ?>" class="btn btn-primary mb-3">Add Content</a>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i = 1;
                  foreach($client as $customer) :
                  ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $customer['nama']; ?></td>
                    <td>
                      
                      <a href="<?= base_url('client/edit/') . $customer['id']; ?>" class="badge badge-warning tombol-edit">Edit</a>
                      <a href="<?= base_url('client/delete/') . $customer['id']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
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
