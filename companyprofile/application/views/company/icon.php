

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
      <div class="col-lg-7">
        <?php echo form_open_multipart('company/icon');?>
        <div class="form-group row">
            <label for="iconname" class="col-sm-2 col-form-label">Nama Icon</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="iconname" name="iconname" placeholder="Input Nama Icon">
              <?= form_error('iconname','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Pilih Icon</label>
            <div class="col-sm-10">
              <input type="file" id="file_name" name="file_name">  
            </div>
        </div>
        <div class="form-group row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Update Benner</button>
          </div>
        </div>
        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

