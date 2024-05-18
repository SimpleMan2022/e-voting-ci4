<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<section>
  <section class="section">
    <div class="section-header">
      <h1>Voters</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Voters</div>
      </div>
    </div>

    <div class="col-12">
      <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#create">Add Voter <i class="fas fa-plus"></i></button>

      <div class="card card-statistic-2">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Class</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($voters as $key => $value) : ?>
              <tr>
                <th scope="row"><?= $key + 1 ?></th>
                <td><?= $value['name']; ?></td>
                <td><?= $value['email']; ?></td>
                <td><?= $value['class_name']; ?></td>
                <td>
                  <button class="btn btn-primary btn-sm edit-data" data-id="<?= $value['id']; ?>" data-name="<?= $value['name']; ?>" data-email="<?= $value['email']; ?>" data-class="<?= $value['class_name']; ?>" data-class_id="<?= $value['class_id']; ?>" data-toggle="modal" data-target="#edit"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-primary btn-sm delete-data" data-id="<?= $value['id']; ?>" data-toggle="modal" data-target="#delete"><i class="fas fa-trash"></i></button>
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
          <h5 class="modal-title" id="exampleModalLabel">Add new voter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url(); ?>dashboard/voters/store" method="post">
            <div class="form-group">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Fullname</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="mb-3">
                <label for="class_id" class="form-label">Kelas</label>
                <select name="class_id" id="" class="form-control">
                  <option value="" disabled selected>Select Class</option>
                  <?php foreach ($classes as $key => $class) : ?>
                    <option value="<?= $class['id'] ?>"><?= $class['name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>
        </div>

        <div class="modal-footer d-flex justify-content-between">
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
          <h5 class="modal-title" id="exampleModalLabel">Add new voter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url(); ?>dashboard/voters/update" method="post">
            <div class="form-group">
              <div class="mb-3">
                <input type="text" name="id" id="id">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Fullname</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="mb-3">
                <label for="class_id" class="form-label">Kelas</label>
                <select name="class_id" id="class_id" class="form-control">
                  <?php foreach ($classes as $key => $class) : ?>
                    <option value="<?= $class['id'] ?>" id="<?= $class['id'] ?>"><?= $class['name'] ?></option>
                  <?php endforeach; ?>
                </select>

              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>
        </div>

        <div class="modal-footer d-flex justify-content-between">
          <button type="button" class="btn btn-transparent" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit <i class="fas fa-save"></i></button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <?= $this->endSection(); ?>

  <?= $this->section('scripts'); ?>

  <script>
    $(document).ready(function() {
      $(document).ready(function() {
        $(document).on('click', '.edit-data', function() {
          var id = $(this).data('id');
          var name = $(this).data('name');
          var email = $(this).data('email');
          var class_id = $(this).data('class_id');
          console.log(class_id);

          $('#edit .modal-body #id').val(id);
          $('#edit .modal-body #name').val(name);
          $('#edit .modal-body #email').val(email);
          $('#edit .modal-body #class_id').val(class_id);
        });
      });

    });
  </script>
  <?= $this->endSection(); ?>


  <?= $this->section('swal'); ?>
  <script>
    $(document).ready(function() {

      $(document).on('click', '.delete-data', function() {
        Swal.fire({
          title: "Do you want to delete this data?",
          showCancelButton: true,
          confirmButtonText: "Delete",
        }).then((result) => {
          if (result.isConfirmed) {
            var id = $(this).data('id');
            var group_image = $(this).data('group_image');
            $('#form-id input[name="id"]').val(id);
            $('#form-id input[name="old_group_image"]').val(group_image);
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