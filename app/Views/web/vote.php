<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Deerhost Template">
  <meta name="keywords" content="Deerhost, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>DEERHOST | Template</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900&display=swap" rel="stylesheet">

  <!-- Css Styles -->
  <link rel="stylesheet" href="<?= base_url() ?>web/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>web/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>web/css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>web/css/flaticon.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>web/css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>web/css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>web/css/style.css" type="text/css">
</head>

<body>
  <!-- Page Preloder -->
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
        <li class=""><a href="/">Beranda</a></li>
        <li class="active"><a href="/vote">Vote</a></li>
        <li><a href="/hasil">Hasil Vote</a></li>
      </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
      <ul>
        <li><a href="#"><span class="icon_chat_alt"></span> Live chat</a></li>
        <li><a href="#"><span class="fa fa-user"></span> Login / Register</a></li>
      </ul>
    </div>
    <div class="offcanvas__info">
      <ul>
        <li><span class="icon_phone"></span> +1 123-456-7890</li>
        <li><span class="fa fa-envelope"></span> Support@gmail.com</li>
      </ul>
    </div>
  </div>
  <!-- Offcanvas Menu End -->

  <!-- Header Section Begin -->
  <header class="header-section header-normal">
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
              <li><a href="/">Beranda</a></li>
              <li class="active"><a href="/vote">Vote</a></li>
              <li><a href="/hasil">Hasil Vote</a></li>
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

  <!-- Breadcrumb Begin -->
  <div class="breadcrumb-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="breadcrumb__option">
            <a href="./index.html"><span class="fa fa-home"></span> Home</a>
            <span>Vote</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="register-token spad" id="token">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <div class="register__text">
            <div class="section-title">
              <h3>AYO BERIKAN SUARAMU!</h3>
            </div>
            <div class="row">
              <?php foreach ($candidateList as $c) : ?>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="blog__item">
                    <div class="text-center">
                      <img src="<?= base_url() ?>uploads/group/<?= $c['group_image'] ?>" alt="">
                      <div class="label" style="font-weight: bold; font-size: 20px;">Paslon <?= $c['group_number'] ?></div>
                    </div>
                    <div class="text-center mb-3">
                      <h5>Calon Ketua: <?= $c['ketua'] ?></h5>
                      <h5>Calon Wakil Ketua: <?= $c['wakil'] ?></h5>
                    </div>
                    <?php if (session()->get('is_login') && $user['is_vote'] == 0) : ?>
                      <form action="/vote" method="post" id="voteForm">
                        <input type="hidden" name="group" value="<?= $c['group_id'] ?>">
                        <button class=" btn btn-primary form-control" id="voteButton">Vote</button>
                      </form>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <?php if (isset($user['is_vote']) && $user['is_vote'] == 1) : ?>
              <button class="btn btn-primary form-control">Anda telah melakukan vote</button>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?= $this->section('swal'); ?>
  <script>
    $(document).ready(function() {

      $(document).on('click', '#voteButton', function() {
        event.preventDefault();
        Swal.fire({
          title: "Apakah anda yakin?",
          showCancelButton: true,
          confirmButtonText: "Vote",
        }).then((result) => {
          if (result.isConfirmed) {
            $('#voteForm').submit();
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
  <?= $this->include('web/layout/footer'); ?>