<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<section>
  <section class="section">
    <div class="section-header">
      <h1>Group</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Groups</div>
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#create">Add Group <i class="fas fa-plus"></i></button>
      <div class="card card-statistic-2">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Group Number</th>
              <th scope="col">Vision</th>
              <th scope="col">Mission</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($groups as $key => $value) : ?>
              <tr>
                <th scope="row"><?= $key + 1 ?></th>
                <td><?= $value['group_number']; ?></td>
                <td><?= $value['vision']; ?></td>
                <td><?= $value['mission']; ?></td>
                <td>
                  <button class="btn btn-primary btn-sm show-data" data-id="<?= $value['id']; ?>" data-group-number="<?= $value['group_number']; ?>" data-group_image="<?= $value['group_image']; ?>" data-vision="<?= $value['vision']; ?>" data-mission="<?= $value['mission']; ?>" data-toggle="modal" data-target="#edit"><i class="fas fa-eye"></i></button>
                  <button class="btn btn-primary btn-sm edit-data" data-id="<?= $value['id']; ?>" data-group-number="<?= $value['group_number']; ?>" data-group_image="<?= $value['group_image']; ?>" data-vision="<?= $value['vision']; ?>" data-mission="<?= $value['mission']; ?>" data-toggle="modal" data-target="#edit"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-primary btn-sm delete-data" data-id="<?= $value['id']; ?>" data-group_image="<?= $value['group_image']; ?>"><i class="fas fa-trash"></i></button>
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
          <form action="<?= base_url(); ?>dashboard/groups/store" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group">
              <div class="mb-3">
                <label for="group_number" class="form-label">Group Number</label>
                <input type="text" class="form-control <?= isset(session('validationErrors')['group_number']) ? 'is-invalid' : ''; ?>" id="group_number" name="group_number" value="<?= old('group_number') ?? ''; ?>">
                <div class="invalid-feedback">
                  <p><?= session('validationErrors')['name'] ?? ''; ?></p>
                </div>
              </div>
              <div class="mb-3">
                <label for="group_image" class="form-label">Group Image</label>
                <img id="image_preview" src="#" alt="Preview" style="display: none; width: 100px; margin-top: 10px; margin-bottom: 10px">
                <input type="file" class="form-control <?= isset(session('validationErrors')['group_image']) ? 'is-invalid' : ''; ?>" id="group_image" name="group_image" value="<?= old('group_image'); ?>" onchange="previewImage(this)">
                <div class="invalid-feedback">
                  <p><?= session('validationErrors')['group_image'] ?? ''; ?></p>
                </div>
              </div>
              <div class=" mb-3">
                <label for="vision" class="form-label">Vision</label>
                <input type="text" class="form-control <?= isset(session('validationErrors')['vision']) ? 'is-invalid' : ''; ?>" id="vision" name="vision" min=0 max=30 value="<?= old('vision'); ?>">
                <div class="invalid-feedback">
                  <p><?= session('validationErrors')['vision'] ?? ''; ?></p>
                </div>
              </div>
              <div class=" mb-3">
                <label for="mission" class="form-label">Mission</label>
                <input type="text" class="form-control <?= isset(session('validationErrors')['mission']) ? 'is-invalid' : ''; ?>" id="mission" name="mission" min=0 max=30 value="<?= old('mission'); ?>">
                <div class="invalid-feedback">
                  <p><?= session('validationErrors')['mission'] ?? ''; ?></p>
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
          <form action="<?= base_url(); ?>dashboard/groups/update" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div class="mb-3">
                <label for="group_number" class="form-label">Group Number</label>
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="old_group_image" id="old_group_image">
                <input type="text" class="form-control <?= isset(session('validationErrors')['group_number']) ? 'is-invalid' : ''; ?>" id="group_number" name="group_number" value="<?= old('group_number') ?? ''; ?>">
                <div class="invalid-feedback">
                  <p><?= session('validationErrors')['name'] ?? ''; ?></p>
                </div>
              </div>
              <div class="mb-3">
                <label for="group_image" class="form-label">Group Image</label>
                <img id="image_preview" src="#" alt="Preview" style="display: block; width: 100px; margin-top: 10px; margin-bottom: 10px;">
                <input type="file" class="form-control <?= isset(session('validationErrors')['group_image']) ? 'is-invalid' : ''; ?>" id="group_image" name="group_image">
                <div class="invalid-feedback">
                  <p><?= session('validationErrors')['group_image'] ?? ''; ?></p>
                </div>
              </div>
              <div class=" mb-3">
                <label for="vision" class="form-label">Vision</label>
                <input type="text" class="form-control <?= isset(session('validationErrors')['vision']) ? 'is-invalid' : ''; ?>" id="vision" name="vision" min=0 max=30 value="<?= old('vision'); ?>">
                <div class="invalid-feedback">
                  <p><?= session('validationErrors')['vision'] ?? ''; ?></p>
                </div>
              </div>
              <div class=" mb-3">
                <label for="mission" class="form-label">Mission</label>
                <input type="text" class="form-control <?= isset(session('validationErrors')['mission']) ? 'is-invalid' : ''; ?>" id="mission" name="mission" min=0 max=30 value="<?= old('mission'); ?>">
                <div class="invalid-feedback">
                  <p><?= session('validationErrors')['mission'] ?? ''; ?></p>
                </div>
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

  <form id="form-id" action="<?= base_url(); ?>dashboard/groups/delete" method="POST">
    <input type="hidden" name="id">
    <input type="hidden" name="old_group_image" id="old_group_image">
  </form>


  <?= $this->endSection(); ?>

  <?= $this->section('scripts'); ?>

  <script>
    function previewImage(input) {
      var reader = new FileReader();
      reader.onload = function(e) {
        var preview = document.getElementById('image_preview');
        preview.src = e.target.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(input.files[0]);
    }
  </script>
  <script>
    $(document).ready(function() {

      $(document).on('click', '.edit-data', function() {
        var id = $(this).data('id');
        var group_number = $(this).data('group-number');
        var group_image = $(this).data('group_image');
        var vision = $(this).data('vision');
        var mission = $(this).data('mission');
        $('#edit .modal-body #id').val(id);
        $('#edit .modal-body #group_number').val(group_number);
        $('#edit .modal-body #image_preview').attr('src', "<?= base_url(); ?>uploads/group/" + group_image);
        $('#edit .modal-body #old_group_image').val(group_image);
        $('#edit .modal-body #vision').val(vision);
        $('#edit .modal-body #mission').val(mission);

      });
    });
  </script>
  <?= $this->endSection(); ?>

  <?= $this->section('swal'); ?>
  <script>
    $(document).ready(function() {

      $(document).on('click', '.delete-data', function() {
        Swal.fire({
          title: "Do you want to save the changes?",
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