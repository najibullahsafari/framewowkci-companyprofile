

  <!-- Begin Page Content -->
  <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
           
        </div>
      </div>
    <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
      <div class="col-lg-8">
        <?= $this->session->flashdata('message'); ?>
          <form action="" method="post" class="mt-3">
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">New Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="new" name="new" value="<?= set_value('new'); ?>" placeholder="Input Your New Password">
              <?= form_error('new','<small class="text-danger pl-3">','</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-4 col-form-label">Confirm Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm Password">
              <?= form_error('confirm','<small class="text-danger pl-3">','</small>'); ?>
            </div>
          </div>
        <div class="form-group row justify-content-end">
          <div class="col-sm-8">
            <button type="submit" class="btn btn-primary">Change Password</button>
          </div>
        </div>
        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

