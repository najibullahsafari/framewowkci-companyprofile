

   

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <div class="row">
          	<div class="col-lg-18">
				
				<?= form_error('menu','<div class="alert alert-danger" role="alert">','</div>'); ?>
				<?= $this->session->flashdata('message'); ?>
              <a href="<?= base_url('kontak/add'); ?>" class="btn btn-primary mb-3">Add Kontak</a>
          		<table class="table table-hover">
          		  <thead>
          		    <tr>
          		      <th scope="col">#</th>
          		      <th scope="col">kategori</th>
          		      <th scope="col">Deskripsi</th>
                    <th scope="col">Action</th>
          		    </tr>
          		  </thead>
          		  <tbody>
          		  	<?php 
          		  	$i = 1;
          		  	foreach($kontak as $contact) :
          		  	?>
          		    <tr>
          		      <th scope="row"><?= $i; ?></th>
          		      <td><?= $contact['kategori']; ?></td>
                     <td><?= $contact['deskripsi']; ?></td>
                     </td>
          		      <td>
          		      	
          		      	<a href="<?= base_url('kontak/edit/') . $contact['id']; ?>" class="badge badge-warning tombol-edit">Edit</a>
                      <a href="<?= base_url('kontak/delete/') . $contact['id']; ?>" class="badge badge-warning tombol-edit">Delete</a>
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
