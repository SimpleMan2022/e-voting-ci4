<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<section>
  <section class="section">
    <div class="section-header">
      <h1>Candidates Experience</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Candidate Experience</div>
      </div>
    </div>

    <div class="col-12">
      <a href="<?= base_url(); ?>dashboard/candidates/experiences/create" class="btn btn-primary mb-3">Add Candidate Experience<i class="fas fa-plus"></i></a>

      <div class="card card-statistic-2">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Fullname</th>
              <th scope="col">NIM</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($candidates as $key => $value) : ?>
              <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $value['name']; ?></td>
                <td><?= $value['experience']; ?></td>
                <td>
                  <a href="<?= base_url(); ?>dashboard/candidates/experiences/edit/<?= $value['id']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                  <form id="form-delete" action="<?= base_url(); ?>dashboard/candidates/experiences/delete/<?= $value['id']; ?>" method="post" class="d-inline">
                    <button type="button" class="btn btn-primary btn-sm delete-data"><i class="fas fa-trash"></i></button>
                  </form>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>


  <?= $this->endSection(); ?>
  <?= $this->section('swal'); ?>
  <script>
    $(document).ready(function() {
      $(document).on('click', '.delete-data', function(event) {
        event.preventDefault(); // Menghentikan perilaku default dari tombol close
        console.log($(this).data('id'));
        Swal.fire({
          title: "Do you want to delete this data?",
          showCancelButton: true,
          confirmButtonText: "Delete",
        }).then((result) => {
          if (result.isConfirmed) {
            $("#form-delete").submit();
          }
        });
      });
      if ('<?= session()->has('success') ?>') {
        Swal.fire({
          icon: 'success',
          title: 'Yeayy!',
          text: '<?= session('success') ?>',
          showConfirmButton: false,
          timer: 2000
        })
      } else if ('<?= session()->has('error'); ?>') {
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