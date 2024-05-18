<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<section>
  <section class="section">
    <div class="section-header">
      <h1>Create Candidate Experience</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url(); ?>/dashboard/candidates/experiences">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="<?= base_url(); ?>/dashboard/candidates/experiences">Candidate</a></div>
        <div class="breadcrumb-item">Create</div>
      </div>
    </div>

    <div class="col-12">
      <a href="<?= base_url(); ?>dashboard/candidates/experiences" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Back to candidates</a>

      <div class="card p-3">
        <form action="<?= base_url(); ?>dashboard/candidates/experiences/store" method="post">
          <div class="form-group">
            <div class="mb-3">
              <label for="name" class="form-label">Candidate Name</label>
              <select name="candidate_id" id="candidate_id" class="form-control">
                <option value="#" selected disabled>Select Candidate</option>
                <?php foreach ($candidates as $key => $value) : ?>
                  <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div id="dynamicInputs"></div>
            <div class="mb-3 d-flex justify-content-end">
              <button class="btn btn-primary btn-sm" type="button" id="addButton">Add <i class="fas fa-plus"></i></button>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </div>
        </form>
      </div>
    </div>

  </section>


  <?= $this->endSection(); ?>
  <?= $this->section('scripts'); ?>
  <script>
    document.getElementById('addButton').addEventListener('click', function() {
      // Membuat elemen-elemen baru
      var newExperienceInput = document.createElement('textarea');
      var newDescriptionInput = document.createElement('textarea');
      var newStartInput = document.createElement('input');
      var newEndInput = document.createElement('input');

      // Menentukan atribut-atribut elemen baru
      newExperienceInput.setAttribute('cols', '30');
      newExperienceInput.setAttribute('rows', '10');
      newExperienceInput.setAttribute('class', 'form-control mb-3');
      newExperienceInput.setAttribute('name', 'experience[]');

      newDescriptionInput.setAttribute('cols', '30');
      newDescriptionInput.setAttribute('rows', '5');
      newDescriptionInput.setAttribute('class', 'form-control mb-3');
      newDescriptionInput.setAttribute('name', 'description[]');

      newStartInput.setAttribute('type', 'date');
      newStartInput.setAttribute('class', 'form-control mb-3');
      newStartInput.setAttribute('name', 'start[]');

      newEndInput.setAttribute('type', 'date');
      newEndInput.setAttribute('class', 'form-control mb-3');
      newEndInput.setAttribute('name', 'end[]');

      // Membuat label baru
      var newLabel = document.createElement('label');
      newLabel.setAttribute('class', 'form-label');
      newLabel.textContent = 'Experience';

      // Membuat div baru untuk mengelompokkan label dan input baru
      var newInputsDiv = document.createElement('div');
      newInputsDiv.setAttribute('class', 'mb-3');

      // Menambahkan label dan elemen-elemen input ke dalam div baru
      newInputsDiv.appendChild(newLabel);
      newInputsDiv.appendChild(newExperienceInput);
      newInputsDiv.appendChild(document.createElement('br'));

      newLabel = document.createElement('label');
      newLabel.setAttribute('class', 'form-label');
      newLabel.textContent = 'Description';

      newInputsDiv.appendChild(newLabel);
      newInputsDiv.appendChild(newDescriptionInput);
      newInputsDiv.appendChild(document.createElement('br'));

      newLabel = document.createElement('label');
      newLabel.setAttribute('class', 'form-label');
      newLabel.textContent = 'Start';

      newInputsDiv.appendChild(newLabel);
      newInputsDiv.appendChild(newStartInput);
      newInputsDiv.appendChild(document.createElement('br'));

      newLabel = document.createElement('label');
      newLabel.setAttribute('class', 'form-label');
      newLabel.textContent = 'End';

      newInputsDiv.appendChild(newLabel);
      newInputsDiv.appendChild(newEndInput);
      newInputsDiv.appendChild(document.createElement('br'));

      // Menemukan div dengan id 'dynamicInputs'
      var dynamicInputsDiv = document.getElementById('dynamicInputs');

      // Menambahkan elemen baru ke dalam div 'dynamicInputs'
      dynamicInputsDiv.appendChild(newInputsDiv);
    });
  </script>



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