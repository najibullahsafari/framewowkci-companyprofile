

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
        <?php echo form_open_multipart('user/edit/');?>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= $user['username']; ?>" readonly="">
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Full name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" placeholder="Your name" value="<?= $user['fullname']; ?>">
            </div>
            <?= form_error('name','<small class="text-danger pl-3">','</small>'); ?>
        </div>
        <div class="form-group row">
            <div class="col-sm-2 col-form-label">Picture</div>
            <div class="col-sm-10">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <input type="file" id="file_name" name="file_name">
                </div>
              </div>
            </div>
        </div>
        <div class="form-group row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Update Data</button>
          </div>
        </div>
        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

