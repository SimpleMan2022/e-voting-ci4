<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<section>
  <section class="section">
    <div class="section-header">
      <h1>Edit Candidate</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url(); ?>/dashboard/candidates">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="<?= base_url(); ?>/dashboard/candidates">Candidate</a></div>
        <div class="breadcrumb-item">Create</div>
      </div>
    </div>


    <div class="col-12">
      <a href="<?= base_url(); ?>dashboard/candidates/experience" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Back to candidates</a>

      <div class="card p-3">
        <form action="<?= base_url(); ?>dashboard/candidates/experiences/update/<?= $experience['id']; ?>" method="post">
          <div class="form-group">
            <div class="mb-3">
              <label for="experience" class="form-label">Experience</label>
              <textarea name="experience" id="experience" cols="30" rows="10" class="form-control" id=""><?= $experience['experience']; ?></textarea>
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">description</label>
              <textarea name="description" id="description" cols="30" rows="10" class="form-control" id=""><?= $experience['description']; ?></textarea>
            </div>
            <div class="mb-3">
              <label for="start" class="form-label">Start</label>
              <input type="date" name="start" id="start" class="form-control" value="<?= $experience['start']; ?>">
            </div>
            <div class="mb-3">
              <label for="end" class="form-label">End</label>
              <input type="date" name="end" id="end" class="form-control" value="<?= $experience['end']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
      </div>
    </div>
    </div>

  </section>


  <?= $this->endSection(); ?>
  <?= $this->section('swal'); ?>
  <script>
    $(document).ready(function() {
      if ('<?= session()->has('error'); ?>') {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: '<?= session('error'); ?>',
          showConfirmButton: false,
          timer: 2000
        })
      }
    });
  </script>
  <?= $this->endSection(); ?>