<?php
$model = new \App\Models\VoteModel();
$data = $model->getVotesWithGroup();

foreach ($data as &$item) {
  $item['group_number'] = (int) $item['group_number'];
  $item['total_votes'] = (int) $item['total_votes'];
}

$jsonData = json_encode($data);
?>

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
  <script src="https://code.highcharts.com/highcharts.js"></script>
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
        <li><a href="/vote">Vote</a></li>
        <li class="active"><a href="/hasil">Hasil Vote</a></li>
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
              <li><a href="/vote">Vote</a></li>
              <li class="active"><a href="/hasil">Hasil Vote</a></li>
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
            <span>Hasil</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section>
    <div id="pie-chart-container" style="width:100%; height:400px;"></div>
  </section>

  <section>
    <div class="container">
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nama Kelas</th>
            <th scope="col">Jumlah Pemilih Kandidat 1</th>
            <th scope="col">Jumlah Pemilih Kandidat 2</th>
            <th scope="col">Total Pemilih</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($votes as $v) : ?>
            <tr>
              <td><?= $v['class_name']; ?></td>
              <td><?= $v['group_1_votes']; ?></td>
              <td><?= $v['group_2_votes']; ?></td>
              <td><?= $v['total_students']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>
  <!-- Footer Section Begin -->
  <script>
    const chartData = <?= $jsonData; ?>;

    const formattedData = chartData.map(item => ({
      name: `Paslon ${item.group_number}`,
      y: item.total_votes,
      votes: item.total_votes
    }));

    document.addEventListener('DOMContentLoaded', function() {
      Highcharts.chart('pie-chart-container', {
        chart: {
          type: 'pie'
        },
        title: {
          text: 'Hasil Voting'
        },
        tooltip: {
          pointFormat: '{series.name}: <b>{point.votes} votes</b>'
        },
        plotOptions: {
          pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
              enabled: true,
              format: '<b>{point.name}</b>: {point.percentage:.1f} %',
              connectorColor: 'silver'
            }
          }
        },
        series: [{
          name: 'Votes',
          data: formattedData
        }]
      });
    });
  </script>
  <?= $this->include('web/layout/footer'); ?>
</body>

</html>