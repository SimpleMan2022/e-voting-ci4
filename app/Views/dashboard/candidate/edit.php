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
      <a href="<?= base_url(); ?>dashboard/candidates" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Back to candidates</a>

      <div class="card p-3">
        <form action="<?= base_url(); ?>dashboard/candidates/update/<?= $candidate['id']; ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="mb-3">
              <label for="name" class="form-label">Fullname</label>
              <input type="text" value="<?= $candidate['name']; ?>" class="form-control <?= isset(session('validationErrors')['name']) ? 'is-invalid' : ''; ?>" id="name" name="name">
              <div class="invalid-feedback">
                <p><?= session('validationErrors')['name'] ?? ''; ?></p>
              </div>
            </div>
            <div class="mb-3">
              <label for="nim" class="form-label">Nim</label>
              <input type="number" value="<?= $candidate['nim']; ?>" class="form-control <?= isset(session('validationErrors')['nim']) ? 'is-invalid' : ''; ?>" id="nim" name="nim">
              <div class="invalid-feedback">
                <p><?= session('validationErrors')['nim'] ?? ''; ?></p>
              </div>
            </div>
            <div class="mb-3">
              <label for="place_of_birth" class="form-label">Place of birth</label>
              <input type="text" value="<?= $candidate['place_of_birth']; ?>" class="form-control <?= isset(session('validationErrors')['place_of_birth']) ? 'is-invalid' : ''; ?>" id="place_of_birth" name="place_of_birth">
              <div class="invalid-feedback">
                <p><?= session('validationErrors')['place_of_birth'] ?? ''; ?></p>
              </div>
            </div>
            <div class="mb-3">
              <label for="birth_of_date" class="form-label">Birth of date</label>
              <input type="date" value="<?= $candidate['birth_of_date']; ?>" class="form-control <?= isset(session('validationErrors')['birth_of_date']) ? 'is-invalid' : ''; ?>" id="birth_of_date" name="birth_of_date">
              <div class="invalid-feedback">
                <p><?= session('validationErrors')['birth_of_date'] ?? ''; ?></p>
              </div>
            </div>
            <div class="mb-3">
              <label for="groupnum">Group Number</label>
              <select name="group_number_id" id="group_number_id" class="form-control <?= isset(session('validationErrors')['group_number_id']) ? 'is-invalid' : ''; ?>">
                <option value="#" selected disabled>Select group</option>
                <?php foreach ($groups as $key => $value) : ?>
                  <?php if ($value['id'] == $candidate['group_number_id']) : ?>
                    <option selected value="<?= $value['id']; ?>"><?= $value['group_number']; ?></option>
                  <?php else : ?>
                    <option selected value="<?= $value['id']; ?>"><?= $value['group_number']; ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
              <div class="invalid-feedback">
                <p><?= session('validationErrors')['group_number_id'] ?? ''; ?></p>
              </div>
            </div>
            <div class="mb-3">
              <label for="birth_of_date" class="form-label">Role</label>
              <select name="role" id="role" class="form-control <?= isset(session('validationErrors')['role']) ? 'is-invalid' : ''; ?>">
                <option value="#" disabled <?= !isset($candidate['role']) ? 'selected' : ''; ?>>Select Role</option>
                <option value="ketua" <?= isset($candidate['role']) && $candidate['role'] == 'ketua' ? 'selected' : ''; ?>>Ketua</option>
                <option value="wakil ketua" <?= isset($candidate['role']) && $candidate['role'] == 'wakil ketua' ? 'selected' : ''; ?>>Wakil Ketua</option>
              </select>

              <div class="invalid-feedback">
                <p><?= session('validationErrors')['role'] ?? ''; ?></p>
              </div>
            </div>
            <div class="mb-3">
              <input type="hidden" name="old_image" value="<?= $candidate['image']; ?>">

              <label for="image" class="form-label">Image</label>
              <input type="file" class="form-control <?= isset(session('validationErrors')['image']) ? 'is-invalid' : ''; ?>" id="image" name="image">
              <div class="invalid-feedback">
                <p><?= session('validationErrors')['image'] ?? ''; ?></p>
              </div>
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