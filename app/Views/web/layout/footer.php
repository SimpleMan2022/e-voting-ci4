<footer class="footer-section">
  <div class="footer__top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="footer__top-call">
            <h5>Butuh Bantuan?</h5>
            <h2>081234567890</h2>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="footer__top-auth">
            <h5>Ayo vote sekarang!</h5>
            <?php if (!session()->get('is_login')) : ?>
              <a href="/login" class="primary-btn">Masuk</a>
              <a href="/register" class="primary-btn sign-up">Daftar</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer__text set-bg" data-setbg="<?= base_url() ?>web/img/footer-bg.png">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="footer__text-about">
            <div class="footer__logo">
              <p style="font-weight: bold; font-size: large; color: #fff;">eVoting</p>
            </div>
            <p>Evoting adalah platform voting online yang dirancang khusus untuk pemilihan ketua dan wakil ketua himpunan mahasiswa di kampus. Aplikasi ini mempermudah proses pemilihan dengan menyediakan sistem yang aman, transparan, dan efisien.</p>
            <div class="footer__social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-youtube-play"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="footer__text-widget">
            <h5>Halaman</h5>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Vote</a></li>
              <li><a href="#">Hasil Vote</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="footer__text-widget">
            <h5>Hubungi Kami</h5>
            <ul class="footer__widget-info">
              <li><span class="fa fa-map-marker"></span> Jl. Kampus No. 123, Kota ABC, Indonesia</li>
              <li><span class="fa fa-mobile"></span> 081234567890</li>
              <li><span class="fa fa-headphones"></span> support.evoting@example.com</li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
</footer>


<script src="<?= base_url() ?>web/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url() ?>web/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>web/js/jquery.slicknav.js"></script>
<script src="<?= base_url() ?>web/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>web/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.9/dist/js/splide.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    new Splide('#candidate-slide', {
      type: 'loop',
      perPage: 1, // Menampilkan satu slide per halaman
      perMove: 1,
      autoplay: true,
      breakpoints: {
        600: { // Tampilan pada lebar 600px (tampilan mobile)
          perPage: 1, // Menampilkan satu slide per halaman
        }
      }
    }).mount();
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
<?= $this->renderSection('swal'); ?>
</body>

</html>