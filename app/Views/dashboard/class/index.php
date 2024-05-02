<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<section>
  <section class="section">
    <div class="section-header">
      <h1>Classes</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Classes</div>
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#create">Add Class <i class="fas fa-plus"></i></button>
      <div class="card card-statistic-2">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Generation</th>
              <th scope="col">Total</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($classes as $key => $value) : ?>
              <tr>
                <th scope="row"><?= $key + 1 ?></th>
                <td><?= $value['name']; ?></td>
                <td><?= $value['generation']; ?></td>
                <td><?= $value['total']; ?></td>
                <td>
                  <button class="btn btn-primary btn-sm edit-data" data-id="<?= $value['id']; ?>" data-name="<?= $value['name']; ?>" data-generation="<?= $value['generation']; ?>" data-total="<?= $value['total']; ?>" data-toggle="modal" data-target="#edit"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-primary btn-sm delete-data" data-id="<?= $value['id']; ?>"><i class="fas fa-trash"></i></button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>


  <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add new class</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url(); ?>dashboard/classes/store" method="post">
            <?= csrf_field(); ?>
            <div class="form-group">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control <?= isset(session('validationErrors')['name']) ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?= old('name') ?? ''; ?>">
                <div class="invalid-feedback">
                  <p><?= session('validationErrors')['name'] ?? ''; ?></p>
                </div>
              </div>
              <div class="mb-3">
                <label for="generation" class="form-label">Generation</label>
                <input type="text" class="form-control <?= isset(session('validationErrors')['generation']) ? 'is-invalid' : ''; ?>" id="generation" name="generation" value="<?= old('generation'); ?>">
                <div class="invalid-feedback">
                  <p><?= session('validationErrors')['generation'] ?? ''; ?></p>
                </div>
              </div>
              <div class=" mb-3">
                <label for="total" class="form-label">Total</label>
                <input type="number" class="form-control <?= isset(session('validationErrors')['total']) ? 'is-invalid' : ''; ?>" id="total" name="total" min=0 max=30 value="<?= old('total'); ?>">
                <div class="invalid-feedback">
                  <p><?= session('validationErrors')['total'] ?? ''; ?></p>
                </div>
              </div>
            </div>
        </div>

        <div class=" modal-footer d-flex justify-content-between">
          <button type="button" class="btn btn-transparent" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit <i class="fas fa-save"></i></button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit class</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url(); ?>dashboard/classes/update" method="post">
            <div class="form-group">
              <input type="hidden" name="id" id="id">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control <?= isset(session('validationErrors')['name']) ? 'is-invalid' : ''; ?>" id="name" name="name">
                <div class="invalid-feedback">
                  <p><?= session('validationErrors')['name'] ?? ''; ?></p>
                </div>
              </div>
              <div class="mb-3">
                <label for="generation" class="form-label">Generation</label>
                <input type="text" class="form-control" id="generation" name="generation">
              </div>
              <div class="mb-3">
                <label for="total" class="form-label">Total</label>
                <input type="number" class="form-control" id="total" name="total" min=0 max=30>
              </div>
            </div>
        </div>

        <div class="modal-footer d-flex justify-content-between">
          <button type="button" class="btn btn-transparent" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Edit <i class="fas fa-edit"></i></button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <form id="form-id" action="<?= base_url(); ?>dashboard/classes/delete" method="POST">
    <input type="hidden" name="id">
  </form>


  <?= $this->endSection(); ?>

  <?= $this->section('scripts'); ?>

  <script>
    $(document).ready(function() {
      $(document).on('click', '.edit-data', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var generation = $(this).data('generation');
        var total = $(this).data('total');

        $('#edit .modal-body #id').val(id);
        $('#edit .modal-body #name').val(name);
        $('#edit .modal-body #generation').val(generation);
        $('#edit .modal-body #total').val(total);

      });
    });
  </script>
  <?= $this->endSection(); ?>

  <?= $this->section('swal'); ?>
  <script>
    $(document).ready(function() {

      $(document).on('click', '.delete-data', function() {
        console.log($(this).data('id'));
        Swal.fire({
          title: "Do you want to save the changes?",
          showCancelButton: true,
          confirmButtonText: "Delete",
        }).then((result) => {
          if (result.isConfirmed) {
            var id = $(this).data('id');
            $('#form-id input[name="id"]').val(id);
            $('#form-id').submit();
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