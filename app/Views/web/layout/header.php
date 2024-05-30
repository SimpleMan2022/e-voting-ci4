<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Deerhost Template">
  <meta name="keywords" content="Deerhost, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Evoting App | Beranda</title>

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url() ?>web/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>web/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>web/css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>web/css/flaticon.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>web/css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>web/css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>web/css/style.css" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.9/dist/css/splide.min.css">
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css">

</head>

<body>
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- Offcanvas Menu Begin -->
  <div class="offcanvas__menu__overlay"></div>
  <div class="offcanvas__menu__wrapper">
    <div class="canvas__close">
      <span class="fa fa-times-circle-o"></span>
    </div>
    <div class="offcanvas__logo">
      <h3><a href="/" class="text-white">Evoting</a></h3>
    </div>
    <nav class="offcanvas__menu mobile-menu">
      <ul>
        <li class="active"><a href="/">Beranda</a></li>
        <li><a href="/vote">Vote</a></li>
        <li><a href="/hasil">Hasil Vote</a></li>
      </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
      <ul>
        <?php if (session()->get('is_login')) : ?>
          <form action="/logout" method="post" class="d-inline">
            <li><button class="bg-transparent border-0 text-white" type="submit">Logout</button></li>
          </form>
        <?php endif; ?>
        <li>
          <?php if (session()->get('is_login')) : ?>
            <p class="text-white">Hi, <?= session()->get('name') ?></p>
          <?php else : ?>
            <a href="/login"><span class="fa fa-user"></span>Masuk</a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
    <div class="offcanvas__info">
      <ul>
        <li><span class="icon_phone"></span> +6281234567890</li>
        <li><span class="fa fa-envelope"></span> Support@gmail.com</li>
      </ul>
    </div>
  </div>
  <!-- Offcanvas Menu End -->

  <!-- Header Section Begin -->
  <header class="header-section">
    <div class="header__info">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="header__info-left">
              <ul>
                <li><span class="icon_phone"></span> +6281234567890</li>
                <li><span class="fa fa-envelope"></span> Support@gmail.com</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="header__info-right">
              <ul>
                <?php if (session()->get('is_login')) : ?>
                  <form action="/logout" method="post" class="d-inline">
                    <li><button class="bg-transparent border-0 text-white" type="submit">Logout</button></li>
                  </form>
                <?php endif; ?>
                <li>
                  <?php if (session()->get('is_login')) : ?>
                    <p class="text-white">Hi, <?= session()->get('name') ?></p>
                  <?php else : ?>
                    <a href="/login"><span class="fa fa-user"></span>Masuk</a>
                  <?php endif; ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="header__logo">
            <h3><a href="/" class="text-white">Evoting</a></h3>
          </div>
        </div>
        <div class="col-lg-9 col-md-9">
          <nav class="header__menu">
            <ul>
              <li class="<?= url_is('') ? 'active' : ''; ?>"><a href="/">Home</a></li>
              <li class="<?= url_is('vote') ? 'active' : ''; ?>"><a href="/vote">Vote</a></li>
              <li class="<?= url_is('hasil') ? 'active' : ''; ?>"><a href="/hasil">Hasil Vote</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="canvas__open">
        <span class="fa fa-bars"></span>
      </div>
    </div>
  </header>
  <!-- Header End -->