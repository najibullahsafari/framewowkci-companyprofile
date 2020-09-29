

  <!-- Begin Page Content -->
  <div class="container-fluid">
      <div class="row">
              <div class="col-lg-8">
                 <?= $this->session->flashdata('message'); ?>
              </div>
          </div>
    <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
      <div class="col-lg-8">
        <form method="post" action="">
        <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="username" name="username" placeholder="Input username" value="<?= $user['username']; ?>"readonly>
              <?= form_error('username','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label">Akses</label>
            <div class="col-sm-10">
              <select class="form-control" name="akses" id="exampleFormControlSelect1">
                  <?php
                    if($user['role'] == 1) {
                      $rolename = "Operator";
                    } else {
                      $rolename = "Administrator";
                    }
                  ?>
                  <option selected="" value="<?= $user['role']; ?>"><?= $rolename; ?></option>
                  <option value="2">Administrator</option>
                  <option value="1">Operator</option>
              </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" value="" placeholder="Input Password">
              <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
            </div>
          </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Full name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" placeholder="Input Your name" value="<?= $user['fullname']; ?>">
              <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Edit Data</button>
          </div>
        </div>
        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

