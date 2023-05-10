<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>location</title>
  <link rel="stylesheet" type="text/css" href="<?= base_url('style/location.css') ?>">
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <!-- navbar -->
  <nav class="navbar fixed-top navbar-sticky">
    <div class="container">
      <a class="navbar-brand" href="#" style="color: #7227FE"> <img src="<?= base_url('assets/logo2.png') ?>" alt="Logo" height="30"> E-MAGANG</a>
      <div class="profile">
        <img src="<?= base_url('assets/user.png') ?>" alt="Gambar Profil">
        <div class="profile-info">
          <p>Nama Lengkap</p>
          <p class="email">email@contoh.com</p>
        </div>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->

  <!-- section hero -->
  <section class="hore text-ligth text-center text-sm-start" id="home">
    <div class="hero container py-4">
      <div class="welcome">
        <h3>Pilih Lokasi Magang</h3>
      </div>
      <div class="search-container">
        <form action="#">
          <input type="text" placeholder="Cari...">
          <button type="submit"><i class="bi bi-search"></i></button>
        </form>
      </div>
      <div class="d-sm-flex align-items-center justify-content-between py-4">
        <div>
          <p class="judul my-3" style="color: #fff;">Tujuan E-MAGANG</p>
          <p class="deskripsi" style="color: #fff;">E-Magang adalah layanan untuk menunjang sistem administrasi magang di lingkup Pemkab Buleleng Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat iusto corrupti repellendus dolore quos expedita perferendis nam magni, quaerat sint..</p>
        </div>
        <a href="">
          <img class="gambarungu img-fluid" src="<?= base_url('assets/lokasi.png') ?>" alt="Logo" height="100" width="900">
        </a>
      </div>
    </div>
  </section>
  <!-- Akhir section hero -->

  <!-- Card -->
  <div class="card-container">
    <div class="card">
      <img src="<?= base_url('assets/location.jpg') ?>" alt="Gambar 1">
      <div class="card-content">
        <h3>Dinas Komunikasi, Informatika, Persandian dan Statistik</h3>
        <p>Deskripsi Card 1</p>
        <a href="<?= base_url('user/detail') ?>"><button class="btncard">Lihat Detail</button></a>
      </div>
    </div>
    <div class="card">
      <img src="<?= base_url('assets/location.jpg') ?>" alt="Gambar 2">
      <div class="card-content">
        <h3>Dinas Komunikasi, Informatika, Persandian dan Statistik</h3>
        <p>Deskripsi Card 2</p>
        <button class="btncard">Lihat Detail</button>
      </div>
    </div>
    <div class="card">
      <img src="<?= base_url('assets/location.jpg') ?>" alt="Gambar 3">
      <div class="card-content">
        <h3>Dinas Komunikasi, Informatika, Persandian dan Statistik</h3>
        <p>Deskripsi Card 3</p>
        <button class="btncard">Lihat Detail</button>
      </div>
    </div>
  </div>

  <div class="card-container">
    <div class="card">
      <img src="<?= base_url('assets/location.jpg') ?>" alt="Gambar 1">
      <div class="card-content">
        <h3>Dinas Komunikasi, Informatika, Persandian dan Statistik</h3>
        <p>Deskripsi Card 1</p>
        <button class="btncard">Lihat Detail</button>
      </div>
    </div>
    <div class="card">
      <img src="<?= base_url('assets/location.jpg') ?>" alt="Gambar 2">
      <div class="card-content">
        <h3>Dinas Komunikasi, Informatika, Persandian dan Statistik</h3>
        <p>Deskripsi Card 2</p>
        <button class="btncard">Lihat Detail</button>
      </div>
    </div>
    <div class="card">
      <img src="<?= base_url('assets/location.jpg') ?>" alt="Gambar 3">
      <div class="card-content">
        <h3>Dinas Komunikasi, Informatika, Persandian dan Statistik</h3>
        <p>Deskripsi Card 3</p>
        <button class="btncard">Lihat Detail</button>
      </div>
    </div>
  </div>

  <div class="card-container">
    <div class="card">
      <img src="<?= base_url('assets/location.jpg') ?>" alt="Gambar 1">
      <div class="card-content">
        <h3>Dinas Komunikasi, Informatika, Persandian dan Statistik</h3>
        <p>Deskripsi Card 1</p>
        <button class="btncard">Lihat Detail</button>
      </div>
    </div>
    <div class="card">
      <img src="<?= base_url('assets/location.jpg') ?>" alt="Gambar 2">
      <div class="card-content">
        <h3>Dinas Komunikasi, Informatika, Persandian dan Statistik</h3>
        <p>Deskripsi Card 2</p>
        <button class="btncard">Lihat Detail</button>
      </div>
    </div>
    <div class="card">
      <img src="<?= base_url('assets/location.jpg') ?>" alt="Gambar 3">
      <div class="card-content">
        <h3>Dinas Komunikasi, Informatika, Persandian dan Statistik</h3>
        <button class="btncard">Lihat Detail</button>
      </div>
    </div>
  </div>

  <!-- akhir card -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>