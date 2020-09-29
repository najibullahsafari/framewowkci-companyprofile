

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
      <div class="col-lg-11">
        <?php echo form_open_multipart('company');?>
        
        <div class="form-group row">
            <label for="companyname" class="col-sm-2 col-form-label">Company Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Input companyname" value="<?= $companyInfo['companyname']; ?>">
              <?= form_error('companyname','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="tagline" class="col-sm-2 col-form-label">Tagline</label>
            <div class="col-sm-10">
              <input type="text" maxlength="125" class="form-control" id="tagline" name="tagline" placeholder="Input tagline" value="<?= $companyInfo['tagline']; ?>">
              <?= form_error('tagline','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="subtagline" class="col-sm-2 col-form-label">Sub tagline</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" maxlength="225" id="subtagline" name="subtagline" placeholder="Input subtagline" value="<?= $companyInfo['subtagline']; ?>">
              <?= form_error('subtagline','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Input twitter" value="<?= $companyInfo['twitter']; ?>">
              <?= form_error('twitter','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Input facebook" value="<?= $companyInfo['facebook']; ?>">
              <?= form_error('facebook','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Input instagram" value="<?= $companyInfo['instagram']; ?>">
              <?= form_error('instagram','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="linkedin" class="col-sm-2 col-form-label">LinkedIn</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Input linkedin" value="<?= $companyInfo['linkedin']; ?>">
              <?= form_error('linkedin','<small class="text-danger pl-3">','</small>'); ?>
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

