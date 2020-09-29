

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
        <?php echo form_open_multipart('portfolio/add');?>
        <div class="form-group">
            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Kode Kategori</label>
            <select class="form-control col-sm-10" name="kategori" id="kategori">
              <?php foreach ($services as $service) { ?>
              <option value="<?= $service['nama']; ?>"><?= $service['nama']; ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nama" class="col-sm-2 col-form-label">nama Portfolio</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Input nama" value="">
              <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 col-form-label">Pilih Gambar</label>
            <div class="col-sm-10">
              <input type="file" id="file_name" name="file_name">  
            </div>
        </div>  
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Save Data</button>
          </div>
        </div>
        </form>
      </div>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

