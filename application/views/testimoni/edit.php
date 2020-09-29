

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
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Input nama" value="<?= $testimoni['nama']; ?>">
              <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="jabatan" class="col-sm-2 col-form-label">jabatan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Input jabatan" value="<?= $testimoni['jabatan']; ?>">
              <?= form_error('jabatan','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Pilih Gambar</label>
            <div class="col-sm-10">
              <input type="file" id="file_name" name="file_name">  
            </div>
        </div>
        <div class="form-group row">
            <label for="detail" class="col-sm-2 col-form-label">Isi Kontent</label>
            <div class="col-sm-10">
              <textarea class="form-control" placeholder="Max 225 karakter" maxlength="225" id="exampleFormControlTextarea1" name="detail" rows="3"><?= $testimoni['detail']; ?></textarea>
              <?= form_error('detail','<small class="text-danger pl-3">','</small>'); ?>  
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

