

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
            <label for="tanya" class="col-sm-2 col-form-label">tanya</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="tanya" name="tanya" placeholder="tanya" value="<?= $faq['pertanyaan']; ?>">
              <?= form_error('tanya','<small class="text-danger pl-3">','</small>'); ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="jawab" class="col-sm-2 col-form-label">jawab</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="jawab" name="jawab" placeholder="jawab Kontent" maxlength="225" value="<?= $faq['jawab']; ?>">
            </div>
            <?= form_error('jawab','<small class="text-danger pl-3">','</small>'); ?>
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

