<?= $this->include('web/layout/header'); ?>

<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero__slider owl-carousel">
        <div class="hero__item set-bg" data-setbg="<?= base_url() ?>web/img/hero/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <h5>Mudah, Cepat, dan Aman</h5>
                            <h2>Selamat Datang di<br /> Platform eVoting</h2>
                            <a href="#token" class="primary-btn">Mulai Sekarang</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero__img">
                            <img src="<?= base_url() ?>web/img/vote.svg" alt="eVoting">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__item set-bg" data-setbg="<?= base_url() ?>web/img/hero/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <h5>Partisipasi dalam Demokrasi Kampus</h5>
                            <h2>Vote untuk Ketua dan<br /> Wakil Ketua Himpunan</h2>
                            <a href="#token" class="primary-btn">Ayo Mulai</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero__img">
                            <img src="<?= base_url() ?>web/img/vote.svg" alt="eVoting">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="register-token spad" id="token">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="register__text">
                    <div class="section-title">
                        <h3>Masukkan Token Anda!</h3>
                    </div>
                    <div class="register__form <?= empty($user['vote_token']) ? 'd-flex justify-content-center' : ''; ?>">
                        <?php if (session()->get('is_login')) : ?>
                            <?php if (empty($user['vote_token'])) : ?>
                                <form action="/token" method="post" class="d-inline">
                                    <button type="submit" class="btn btn-primary">Dapatkan Token</button>
                                </form>
                            <?php else : ?>
                                <form action="/verify-token" method="post">
                                    <input type="text" name="token" placeholder="Masukkan token Anda" required>
                                    <button type="submit" class="site-btn">Verifikasi</button>
                                </form>
                            <?php endif; ?>
                        <?php else : ?>
                            <a href="<?= base_url('login'); ?>" class="btn btn-primary">Login</a>
                        <?php endif; ?>

                    </div>
                    <?php if (session()->get('is_login')) : ?>
                        <div class="register__info">
                            <p>Token telah dikirim ke email Anda. Masukkan token untuk memverifikasi identitas Anda dan melanjutkan.</p>
                        </div>
                        <p>Pastikan Anda memeriksa folder spam jika tidak menemukan email token di kotak masuk utama Anda.</p>
                    <?php else : ?>
                        <p class="text-center">Anda harus login terlebih dahulu untuk mendapatkan token</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="services-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>Daftar Paslon Calon Ketua dan Wakil Ketua Himpunan</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($candidateList as $c) : ?>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="">
                            <img src="<?= base_url() ?>uploads/group/<?= $c['group_image'] ?>" alt="">
                            <div class="label" style="font-weight: bold; font-size: 20px;">Paslon <?= $c['group_number'] ?></div>
                        </div>
                        <div class="">
                            <h5>Calon Ketua: <?= $c['ketua'] ?></h5>
                            <h5>Calon Wakil Ketua: <?= $c['wakil'] ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="services-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>Visi dan Misi</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($candidateList as $c) : ?>
                <div class="col-lg-6">
                    <div class="about__text text-justify">
                        <h2>Calon <?= $c['group_number']; ?></h2>
                        <p>Visi: <?= $c['vision'] ?></p>
                        <p>Misi: <?= $c['mission'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>



<section class="candidate-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7">
                <div class="section-title normal-title">
                    <h3>Daftar Calon Ketua dan Wakil Ketua</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="about__img">
                    <img style="width: 200px;" src="<?= base_url() ?>uploads/candidate/<?= $candidate[0]['image'] ?>" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__text">
                    <h2 class="mb-5"><?= $candidate[0]['name']; ?> - <?= $candidate[0]['role']; ?></h2>
                    <div class="about__achievement">
                        <div class="about__achieve__item">
                            <span class="fa fa-id-badge"></span>
                            <h4 class="achieve-counter"><?= $candidate[0]['nim']; ?></h4>
                            <p>Nomor Induk Mahasiswa</p>
                        </div>
                        <div class="about__achieve__item">
                            <span class="fa fa-birthday-cake"></span>
                            <h4 class="achieve-counter"><?= $candidate[0]['age']; ?></h4>
                            <p>Usia</p>
                        </div>
                        <div class="about__achieve__item">
                            <span class="fa fa-marker"></span>
                            <h4 class=""><?= $candidate[0]['place_of_birth']; ?></h4>
                            <p>Tempat Lahir</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="about__text">
                    <h2 class="mb-5"><?= $candidate[1]['name']; ?> - <?= $candidate[1]['role']; ?></h2>
                    <div class="about__achievement">
                        <div class="about__achieve__item">
                            <span class="fa fa-id-badge"></span>
                            <h4 class="achieve-counter"><?= $candidate[1]['nim']; ?></h4>
                            <p>Nomor Induk Mahasiswa</p>
                        </div>
                        <div class="about__achieve__item">
                            <span class="fa fa-birthday-cake"></span>
                            <h4 class="achieve-counter"><?= $candidate[1]['age']; ?></h4>
                            <p>Usia</p>
                        </div>
                        <div class="about__achieve__item">
                            <span class="fa fa-map-marker"></span>
                            <h4 class=""><?= $candidate[1]['place_of_birth']; ?></h4>
                            <p>Tempat Lahir</p>
                        </div>
                    </div>
                </div>
                <a href="#" class="primary-btn">Lihat Selengkapnya</a>
            </div>
            <div class="col-lg-6">
                <div class="about__img">
                    <img style="width: 300px;" src="<?= base_url() ?>uploads/candidate/<?= $candidate[1]['image'] ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section End -->

<!-- Achievement Section Begin -->
<section class="achievement-section set-bg spad" data-setbg="<?= base_url() ?>web/img/achievement-bg.jpg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="achievement__item">
                    <span class="fa fa-users"></span>
                    <h2 class="achieve-counter"><?= $classCount; ?></h2>
                    <p>Jumlah Kelas</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="achievement__item">
                    <span class="fa fa-user"></span>
                    <h2 class="achieve-counter"><?= $candidateCount; ?></h2>
                    <p>Jumlah Kandidat</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="achievement__item">
                    <span class="fa fa-check-square"></span>
                    <h2 class="achieve-counter"><?= $voterCount; ?></h2>
                    <p>Jumlah Pemilih</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="work-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>Pengalaman Kandidat</h3>
                </div>
                <div class="work__text">
                    <div class="splide" id="candidate-slide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php foreach ($candidateExperiences as $ce) : ?>
                                    <li class="splide__slide">
                                        <div class="work__item">
                                            <i class="fa fa-briefcase"></i>
                                            <span>Pengalaman Organisasi</span>
                                            <h3><?= $ce['name']; ?></h3>
                                            <p><?= $ce['description']; ?></p>
                                            <p><strong>Mulai: </strong><?= $ce['start_month_year']; ?></p>
                                            <p><strong>Selesai: </strong><?= $ce['end_month_year']; ?></p>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?= $this->section('swal'); ?>
<script>
    $(document).ready(function() {

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