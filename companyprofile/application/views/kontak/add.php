

  <!-- Begin Page Content -->
  <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
           
        </div>
      </div>
    <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
      <div class="col-lg-6">
        <form action="" method="post">
        <div class="form-group row">
            <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Kategori</label>
            <select class="col-sm-10 form-control" name="kategori" id="exampleFormControlSelect1">
              <option value="email">email</option>
              <option value="nomor">nomor</option>
              <option valuealamat>alamat</option>
            </select>
          </div>
        <div class="form-group row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="isi deskripsi" maxlength="225" ">
            </div>
            <?= form_error('deskripsi','<small class="text-danger pl-3">','</small>'); ?>
        </div>
        <div class="form-group row justify-content-end">
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

