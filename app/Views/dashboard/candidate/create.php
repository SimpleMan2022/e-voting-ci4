<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<section>
  <section class="section">
    <div class="section-header">
      <h1>Create Candidate</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url(); ?>/dashboard/candidates">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="<?= base_url(); ?>/dashboard/candidates">Candidate</a></div>
        <div class="breadcrumb-item">Create</div>
      </div>
    </div>


    <div class="col-12">
      <a href="<?= base_url(); ?>dashboard/candidate" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Back to candidates</a>

      <div class="card p-3">
        <form action="<?= base_url(); ?>dashboard/candidates/create" method="post">
          <div class="form-group">
            <div class="mb-3">
              <label for="name" class="form-label">Fullname</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
              <label for="nim" class="form-label">Nim</label>
              <input type="number" class="form-control" id="nim" name="nim">
            </div>
            <div class="mb-3">
              <label for="place_of_birth" class="form-label">Place of birth</label>
              <input type="text" class="form-control" id="place_of_birth" name="place_of_birth">
            </div>
            <div class="mb-3">
              <label for="birth_of_date" class="form-label">Birth of date</label>
              <input type="date" class="form-control" id="birth_of_date" name="birth_of_date">
            </div>
            <div class="mb-3">
              <label for="birth_of_date" class="form-label">Role</label>
              <select name="role" id="role" class="form-control">
                <option value="#" selected disabled>Select Role</option>
                <option value="ketua">Ketua</option>
                <option value="wakil ketua">Wakil Ketua</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Image</label>
              <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    </div>

  </section>


  <?= $this->endSection(); ?>