<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-transparent fixed-top" id="navbar">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Evoting</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav gap-3 fw-semibold">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/paslon'); ?>">Paslon</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/kandidat'); ?>">Kandidat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/pengalaman'); ?>">Pengalaman</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('/hasil'); ?>">Hasil Vote</a>
        </li>
      </ul>
    </div>
    <div class="d-flex">
      <form action="/logout" method="post">
        <button type="submit" class="nav-link fw-semibold">Logout</button>
      </form>
    </div>
  </div>
</nav>