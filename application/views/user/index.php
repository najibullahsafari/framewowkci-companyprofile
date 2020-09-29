

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6">
                 <?= $this->session->flashdata('message'); ?>
              </div>
          </div>
          <!-- Page Heading -->
         <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $user['username']; ?></h5>
                  <p class="card-text">Fullname : <?= $user['fullname'];?></p>
                  <p class="card-text"> Akses : 
                    <?php 
                      if($user['role'] == 1) { 
                          echo "User"; 
                      } else { 
                          echo "Administrator"; 
                      }
                      ?>
                  </p>
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     