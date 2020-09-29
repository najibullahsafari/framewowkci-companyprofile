

   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <div class="row">
          	<div class="col-lg-18">
				
				<?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>'); ?>
				<?= $this->session->flashdata('message'); ?>

          		<a href="<?= base_url('user/add'); ?>" class="btn btn-primary mb-3">Add Admin</a>
          		<table class="table table-hover">
          		  <thead>
          		    <tr>
          		      <th scope="col">#</th>
          		      <th scope="col">Username</th>
          		      <th scope="col">Fullname</th>
                    <th scope="col">Akses</th>
                    <th scope="col">Action</th>
          		    </tr>
          		  </thead>
          		  <tbody>
          		  	<?php 
          		  	$i = 1;
          		  	foreach($dataadmin as $admin) :
          		  	?>
          		    <tr>
          		      <th scope="row"><?= $i; ?></th>
          		      <td><?= $admin['username']; ?></td>
                     <td><?= $admin['fullname']; ?></td>
                     <td>
                       <?php
                        if($admin['role'] == 1) {
                          echo "Operator";
                        } else {
                          echo "Administrator";
                        }
                       ?>
                     </td>
          		      <td>
          		      	
          		      	<a href="<?= base_url('user/editdata/') . $admin['id']; ?>" class="badge badge-warning tombol-edit">Edit</a>
                      <a href="<?= base_url('user/delete/') . $admin['id']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
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
