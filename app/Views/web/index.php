<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem eVoting</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="web.css">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-transparent fixed-top" id="navbar">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">eVoting</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav gap-3 fw-semibold">
          <li class="nav-item">
            <a class="nav-link" href="#">Kandidat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pengalaman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Hasil Vote</a>
          </li>
        </ul>
      </div>
      <div class="d-flex">
        <a class="nav-link fw-semibold" href="#">Logout</a>
      </div>
    </div>
  </nav>

  <!-- Content -->
  <div class="container-fluid content-center content-full">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-6">
        <h1>Welcome to eVoting System</h1>
        <p>This system allows you to cast your vote easily and securely. Join us in making the voting process more efficient and accessible for everyone.</p>
      </div>
      <div class="col-md-6">
        <img src="https://via.placeholder.com/300" alt="eVoting Image" class="img-fluid img-fluid-custom">
      </div>
    </div>
  </div><svg id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 240" version="1.1" xmlns="http://www.w3.org/2000/svg">
    <defs>
      <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
        <stop stop-color="rgba(52, 152, 219, 1)" offset="0%"></stop>
        <stop stop-color="rgba(142, 68, 173, 1)" offset="100%"></stop>
      </linearGradient>
    </defs>
    <path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,168L15,156C30,144,60,120,90,124C120,128,150,160,180,160C210,160,240,128,270,116C300,104,330,112,360,116C390,120,420,120,450,112C480,104,510,88,540,104C570,120,600,168,630,172C660,176,690,136,720,132C750,128,780,160,810,148C840,136,870,80,900,60C930,40,960,56,990,68C1020,80,1050,88,1080,108C1110,128,1140,160,1170,160C1200,160,1230,128,1260,116C1290,104,1320,112,1350,100C1380,88,1410,56,1440,56C1470,56,1500,88,1530,108C1560,128,1590,136,1620,120C1650,104,1680,64,1710,60C1740,56,1770,88,1800,104C1830,120,1860,120,1890,108C1920,96,1950,72,1980,64C2010,56,2040,64,2070,68C2100,72,2130,72,2145,72L2160,72L2160,240L2145,240C2130,240,2100,240,2070,240C2040,240,2010,240,1980,240C1950,240,1920,240,1890,240C1860,240,1830,240,1800,240C1770,240,1740,240,1710,240C1680,240,1650,240,1620,240C1590,240,1560,240,1530,240C1500,240,1470,240,1440,240C1410,240,1380,240,1350,240C1320,240,1290,240,1260,240C1230,240,1200,240,1170,240C1140,240,1110,240,1080,240C1050,240,1020,240,990,240C960,240,930,240,900,240C870,240,840,240,810,240C780,240,750,240,720,240C690,240,660,240,630,240C600,240,570,240,540,240C510,240,480,240,450,240C420,240,390,240,360,240C330,240,300,240,270,240C240,240,210,240,180,240C150,240,120,240,90,240C60,240,30,240,15,240L0,240Z"></path>
  </svg>
  <!-- Candidate Cards -->
  <section id="card-section">
    <div class="container">
      <div class="row justify-content-center gap-5">
        <h2 class="text-center">Daftar Kandidat</h2>
        <div class="card p-0" style="width: 18rem;">
          <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
        <div class="card p-0" style="width: 18rem;">
          <img src="https://via.placeholder.com/150" class="card-img-top p-0" alt="...">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <svg id="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 240" version="1.1" xmlns="http://www.w3.org/2000/svg">
    <defs>
      <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
        <stop stop-color="rgba(52, 152, 219, 1)" offset="0%"></stop>
        <stop stop-color="rgba(142, 68, 173, 1)" offset="100%"></stop>
      </linearGradient>
    </defs>
    <path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,168L15,156C30,144,60,120,90,124C120,128,150,160,180,160C210,160,240,128,270,116C300,104,330,112,360,116C390,120,420,120,450,112C480,104,510,88,540,104C570,120,600,168,630,172C660,176,690,136,720,132C750,128,780,160,810,148C840,136,870,80,900,60C930,40,960,56,990,68C1020,80,1050,88,1080,108C1110,128,1140,160,1170,160C1200,160,1230,128,1260,116C1290,104,1320,112,1350,100C1380,88,1410,56,1440,56C1470,56,1500,88,1530,108C1560,128,1590,136,1620,120C1650,104,1680,64,1710,60C1740,56,1770,88,1800,104C1830,120,1860,120,1890,108C1920,96,1950,72,1980,64C2010,56,2040,64,2070,68C2100,72,2130,72,2145,72L2160,72L2160,240L2145,240C2130,240,2100,240,2070,240C2040,240,2010,240,1980,240C1950,240,1920,240,1890,240C1860,240,1830,240,1800,240C1770,240,1740,240,1710,240C1680,240,1650,240,1620,240C1590,240,1560,240,1530,240C1500,240,1470,240,1440,240C1410,240,1380,240,1350,240C1320,240,1290,240,1260,240C1230,240,1200,240,1170,240C1140,240,1110,240,1080,240C1050,240,1020,240,990,240C960,240,930,240,900,240C870,240,840,240,810,240C780,240,750,240,720,240C690,240,660,240,630,240C600,240,570,240,540,240C510,240,480,240,450,240C420,240,390,240,360,240C330,240,300,240,270,240C240,240,210,240,180,240C150,240,120,240,90,240C60,240,30,240,15,240L0,240Z"></path>
  </svg>
  <section id="experience" style="margin: 0; padding: 0;">
    <div style="margin: 0; padding: 0; background-color: #3498db;">
      <h2 class="m-0 p-0">Experience</h2>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script>
    const navbar = document.getElementById('navbar');

    window.addEventListener('scroll', function() {
      if (window.scrollY > 100) {
        navbar.classList.add('navbar-scrolled');
      } else {
        navbar.classList.remove('navbar-scrolled');
      }
    });
  </script>
</body>

</html>