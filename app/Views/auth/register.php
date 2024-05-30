<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>


<body class="">
  <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card rounded my-5 mx-4 mx-md-0" style="max-width: 800px; width: 90%; height: auto;">
      <div class="row g-0">
        <div class="col-md-6 d-flex justify-content-center align-items-center">
          <img src="<?= base_url('assets/img/vote.gif'); ?>" class="img-fluid h-100 object-fit-cover" alt="">
        </div>
        <div class="col-md-6 p-4">
          <div class="mb-4">
            <h3 class="fw-bold">Halo, Selamat datang!</h3>
            <small class="text-muted fw-semibold">Silahkan data diri anda</small>
          </div>
          <?php if (session()->has('error')) : ?>
            <div class="alert alert-danger" role="alert">
              <?= session('error'); ?>
            </div>
          <?php endif; ?>
          <form action="/register" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input autofocus required id="email" type="email" class="form-control rounded" placeholder="example@gmail.com" name="email">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input autofocus required id="nama" type="text" class="form-control rounded" placeholder="johndoe" name="nama">
            </div>
            <div class="mb-3">
              <label for="kelas" class="form-label">Kelas</label>
              <select name="class_id" id="kelas" class="form-control">
                <option value="#" selected disabled>Pilih kelas</option>
                <?php foreach ($classes as $class) : ?>
                  <option value="<?= $class['id']; ?>"><?= $class['name']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input required id="password" type="password" class="form-control rounded" placeholder="****" name="password">
            </div>
            <div class="">

              <a class="text-decoration-none" href="#"><i class="ri-facebook-circle-fill text-dark" style="font-size: 30px;"></i></a>
              <a class="text-decoration-none mx-3" href="#"><i class="ri-google-fill text-dark" style="font-size: 30px;"></i></a>
              <a class="text-decoration-none" href="#"><i class="ri-github-fill text-dark" style="font-size: 30px;"></i></a>
            </div>
            <p class="fw-semibold">Sudah punya akun? <a href="/login">Login</a></p>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-sm rounded text-white" style="background-color: #3085C3;">

                <span>Daftar <i class="ri-login-box-line"></i></span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>