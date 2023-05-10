<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E MAGANG</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('style/landing.css') ?>">
  <script src="<?php echo base_url('js/landing.js'); ?>"></script>
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg fixed-top top-nav-collaps">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" style="color: #7227FE"> <img src="<?= base_url('assets/logo2.png') ?>" alt="Logo" height="30"> E-MAGANG</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#tujuan" style="color: #7227FE;">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#kontakkami" style="color: #7227FE;">Kontak</a>
          </li>
          <li>
          <li class=" d-flex">
            <a href="<?= base_url('/login_view') ?>"><button class="btn btn-purple" type="submit">Masuk</button></a>
          </li>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->

  <!-- HERO/landing -->
  <section class="hore text-ligth text-center text-sm-start" id="home">
    <div class="hero container py-4">
      <div class="d-sm-flex align-items-center justify-content-between py-4">
        <div>
          <p class="judul my-4" style="color: #fff;">E-MAGANG</p>
          <p class="deskripsi lead my-4" style="color: #fff;">E-Magang adalah layanan untuk menunjang sistem administrasi magang di lingkup Pemkab Buleleng.</p>
          <button class="btn-oke btn btn-outline-light" onclick="location.href='<?= base_url('/registrasi') ?>'">Registrasi</button>
          <a class="oke" href="https://play.google.com/store/apps/details?id=com.ss.android.ugc.trill">
            <img src="https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png" height="70" width="160" alt="Get it on Google Play">
          </a>
        </div>
        <a href="">
          <img class="gambarungu img-fluid" src="<?= base_url('assets/HAHA.png') ?>" alt="Logo" height="100" width="600">
        </a>
      </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ffffff" fill-opacity="1" d="M0,256L48,224C96,192,192,128,288,101.3C384,75,480,85,576,101.3C672,117,768,139,864,128C960,117,1056,75,1152,80C1248,85,1344,139,1392,165.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
  </section>
  <!-- Akhir Hero -->

  <!-- Tujuan E MAGANG -->
  <section class="boxtujuan d-sm-flex justify-content-between" id="tujuan">
    <div class="tujuan container">
      <div class="section-tiltle">
        <h2 class="YAHA">Tujuan E-MAGANG</h2>
      </div class="tujuancard">
      <div class="card1 d-sm-flex justify-content-between" style="max-width: 540px;">
        <div class="row">
          <div class="gambarcard col-md-2 d-sm-flex justify-content-between">
            <img class="img-fluid" src="<?= base_url('assets/1.png') ?>" alt="Logo" height="20" width="50">
          </div>
          <div class="text col-md-8 justify-content-between">
            <p class="card-text md-15 d-sm-flex" style="color: #7227FE;">E-magang merupakan platform yang mempertemukan pelajar atau mahasiswa dengan instansi/perusahaan yang menyediakan program magang.</p>
          </div>
        </div>
      </div>
      <div class="card2 d-sm-flex justify-content-between" style="max-width: 540px;">
        <div class="row">
          <div class="text col-md-8">
            <p class="card-text md-15 d-sm-flex" style="color: #7227FE;">Selain itu, website ini juga dapat membantu para calon magang dalam memilih program magang yang sesuai dengan minat dan keahlian mereka.</p>
          </div>
          <div class="gambarcard col-md-2 d-sm-flex justify-content-between">
            <img class="img-fluid" src="<?= base_url('assets/2.png') ?>" alt="Logo" height="20" width="50">
          </div>
        </div>
      </div>
      <div class="card1 d-sm-flex justify-content-between" style="max-width: 540px;">
        <div class="row">
          <div class="gambarcard col-md-2 d-sm-flex justify-content-between">
            <img class="img-fluid" src="<?= base_url('assets/3.png') ?>" alt="Logo" height="20" width="50">
          </div>
          <div class="text col-md-8 justify-content-between">
            <p class="card-text md-15 d-sm-flex" style="color: #7227FE;">Instansi/perusahaan dapat mempublikasikan informasi tentang program magang mereka sekaligus memperkenalkan budaya perusahaan.</p>
          </div>
        </div>
      </div>
  </section>
  <!-- Akhir tujuan EMAGANG -->

  <!-- Kelebihan E MAGANG -->
  <section class="kelebihan" id="tujuan">
    <div class="section-tiltle">
      <h2 class="Yuhu">Kelebihan E-MAGANG</h2>
      <p class="title">Berikut adalah kelebihan platform E-Magang sebagai penghubung instansi/perusahaan dengan peserta magang</p>
    </div>
    <div class="kartu-container">
      <div class="kartu justify-content-beetwen">
        <img src="<?= base_url('assets/checklist.png') ?>" alt="Gambar 1">
        <div class="card-description">
          <h3>Sistem admnistrasi transparant</h3>
          <p>Memungkinkan pengguna untuk memantau dan mengakses informasi terkait program magang yang disediakan.</p>
        </div>
      </div>
      <div class="kartu">
        <img src="<?= base_url('assets/data.png') ?>" alt="Gambar 2">
        <div class="card-description">
          <h3>Data terupdate dan terstruktur </h3>
          <p>Website e-magang dapat memberikan informasi lengkap dan terperinci tentang program magang yang disediakan oleh instansi/perusahaan.</p>
        </div>
      </div>
      <div class="kartu">
        <img src="<?= base_url('assets/subscribe.png') ?>" alt="Gambar 3">
        <div class="card-description">
          <h3>Notifikasi pada setiap kegiatan </h3>
          <p>Instansi/perusahaan dapat memberikan akses kepada calon magang untuk mempelajari dan memahami lebih jauh tentang perusahaan.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- akhir kelebihan E MAGANG -->

  <!-- Mockup E-MAGANG -->
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#7227FE" fill-opacity="1" d="M0,64L120,106.7C240,149,480,235,720,250.7C960,267,1200,213,1320,186.7L1440,160L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
  </svg>
  <section class="mockup">
    <div class="Apss container py-4">
      <div class="d-sm-flex align-items-center justify-content-between py-4">
        <div class="descmockup">
          <h1 class="judul my-7" style="color: #fff;">E-MAGANG Tersedia di Google Playstore</h1>
          <a href="https://play.google.com/store/apps/details?id=com.ss.android.ugc.trill">
            <img src="https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png" height="70" width="190" alt="Get it on Google Play">
          </a>
        </div>
        <a href="">
          <img class="mockup1 img-fluid" src="<?= base_url('assets/mockup1.png') ?>" alt="Logo" height="900" width="1200">
        </a>
        <a href="">
          <img class="mockup2 img-fluid" src="<?= base_url('assets/mockup2.png') ?>" alt="Logo" height="900" width="1200">
        </a>
      </div>
    </div>
  </section>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#7227fe" fill-opacity="1" d="M0,224L80,192C160,160,320,96,480,74.7C640,53,800,75,960,122.7C1120,171,1280,245,1360,282.7L1440,320L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
  </svg>
  <!-- Akhir Mockup E-MAGANG -->

  <!-- Kontak kami -->
  <section class="contact-section" id="kontakkami">
    <div class="container">
      <div class="kontak-tiltle">
        <h2 class="YAHA">Kontak Kami</h2>
        <p class="title">Berikan masukkan pada kami untuk kedepannya. </p>
      </div>
      <form class="contact-form">
        <input type="text" id="name" name="name" required placeholder="Nama">
        <input type="email" id="email" name="Email" required placeholder="Email">
        <textarea id="message" name="message" required placeholder="Tuliskan pesan"></textarea>
        <button type="submit">Kirim</button>
      </form>
    </div>
  </section>
  <!-- akhir kontak kami -->

  <!-- footer -->
  <footer>
    <div class="footer-bottom">
      &copy; 2023 My Website. All rights reserved.
    </div>
    <div class="footer-content">
      <div class="footer-section about">
        <h3>Alamat</h3>
        <p>Jalan Pahlawan 5 81119 Banjar Jawa Bali</p>
      </div>

      <div class="footer-section social">
        <h3>Kontak Kami</h3>
        <ul>
          <li><a href="https://www.facebook.com/pemkabbuleleng/?locale=id_ID"><i class="bi bi-facebook"></i>Pemkab Buleleng</a></li>
          <li><a href="https://instagram.com/pemkab_buleleng?igshid=YmMyMTA2M2Y="><i class="bi bi-instagram"></i>Pemkab Buleleng</a></li>
          <li><a href="https://www.youtube.com/@pemkabbuleleng"><i class="bi bi-youtube"></i>Pemkab Buleleng</a></li>
        </ul>
      </div>
    </div>
  </footer>

  <!-- akhir dari footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>