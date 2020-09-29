

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
      <div class="col-lg-10">
        <?php echo form_open_multipart('');?>
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Input nama" value="<?= $team['nama']; ?>">
              <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="jabatan" class="col-sm-2 col-form-label">jabatan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Input jabatan" value="<?= $team['jabatan']; ?>">
              <?= form_error('jabatan','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Input twitter" value="<?= $team['twitter']; ?>">
              <?= form_error('twitter','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Input facebook" value="<?= $team['facebook']; ?>">
              <?= form_error('facebook','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Input instagram" value="<?= $team['instagram']; ?>">
              <?= form_error('instagram','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="linkedin" class="col-sm-2 col-form-label">LinkedIn</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Input linkedin" value="<?= $team['linkedin']; ?>">
              <?= form_error('linkedin','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Pilih Gambar</label>
            <div class="col-sm-10">
              <input type="file" id="file_name" name="file_name">  
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

