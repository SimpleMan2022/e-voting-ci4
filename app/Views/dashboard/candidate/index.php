<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<section>
  <section class="section">
    <div class="section-header">
      <h1>Candidates</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Candidate</div>
      </div>
    </div>

    <div class="col-12">
      <a href="<?= base_url(); ?>dashboard/candidates/create" class="btn btn-primary mb-3">Add Candidate <i class="fas fa-plus"></i></a>
      <a href="#" class="btn btn-primary mb-3">Add Experiences <i class="fas fa-plus"></i></a>

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
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>
                <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                <button class="btn btn-primary btn-sm"><i class="fas fa-trash"></i></button>
              </td>
            </tr>
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
          <form action="<?= base_url(); ?>dashboard/Candidate/create" method="post">
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
                <label for="name" class="form-label">Kelas</label>
                <textarea name="" id="" cols="30" rows="10"></textarea>
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