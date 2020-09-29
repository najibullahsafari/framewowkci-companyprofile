

  <!-- Begin Page Content -->
  <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
           
        </div>
      </div>
    <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
      <div class="col-lg-12">
        <form action="" method="post">
        <div class="form-group row">
            <label for="kategori" class="col-sm-2 col-form-label">kategori</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="kategori" readonly="" name="kategori" placeholder="kategori" value="<?= $kontak['kategori']; ?>">
              <?= form_error('kategori','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="deskripsi Kontent" maxlength="225" value="<?= $kontak['deskripsi']; ?>">
            </div>
            <?= form_error('deskripsi','<small class="text-danger pl-3">','</small>'); ?>
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

