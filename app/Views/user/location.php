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
      <a class="navbar-brand" href="<?= base_url('user/dashboard_magang') ?>" style="color: #7227FE">
        <i class="bi bi-arrow-left"></i>
        <img src="<?= base_url('assets/logo2.png') ?>" alt="Logo" height="30"> E-MAGANG</a>
      <div class="profile" <?php
                            $session = \Config\Services::session();
                            $kode_instansi_dinas = $session->get('kode_instansi_dinas');
                            if ($kode_instansi_dinas !== null) {
                              $url = base_url('user/profil_magang/' . session('id_magang'));
                            } else {
                              $url = "";
                            }
                            ?> onclick="location.href='<?= $url ?>'">
        <img src="<?= base_url('assets/user.png') ?>" alt="Gambar Profil">
        <div class="profile-info">
          <p><?= session('nama') ?></p>
          <p class="email"><?= session('email') ?></p>
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
        <input type="text" placeholder="Cari..." id="searchInput">
        <!-- <form action="#">
          <input type="text" placeholder="Cari...">
          <button type="submit"><i class="bi bi-search"></i></button>
        </form> -->
      </div>
      <div class="d-sm-flex align-items-center justify-content-between py-4">
        <div>
          <p class="judul my-3" style="color: #fff;">Tujuan E-MAGANG</p>
          <p class="deskripsi" style="color: #fff;">E-Magang adalah layanan untuk menunjang sistem administrasi magang di lingkup Pemkab Buleleng Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat iusto corrupti repellendus dolore quos expedita perferendis nam magni, quaerat sint..</p>
        </div>

        <a href="">
          <img class="gambarungu img-fluid" src="<?php echo base_url('assets/lokasi.png') ?>" alt="Logo" height="100" width="900">
        </a>
      </div>

    </div>
  </section>
  <!-- Akhir section hero -->

  <!-- Card -->
  <div class="card-container">
    <?php

    foreach ($output as $row) :
    ?>
      <div class="card">
        <?php
        foreach ($deskripsiFoto as $rowDeskripsiFoto) :
          if ($row['kode_instansi'] == $rowDeskripsiFoto['kode_instansi']) :
        ?>
            <img src="<?php echo base_url('images/' . $rowDeskripsiFoto['foto_instansi']); ?>" alt="Gambar 1">

        <?php endif;
        endforeach; ?>
        <div class="card-content">
          <h3><?= $row['ket_ukerja']; ?></h3>
          <!-- <p>Deskripsi Card 1</p> -->
          <a href="<?= base_url('user/detail/' . $row['kode_instansi']) ?>"><button class="btncard">Lihat Detail</button></a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- akhir card -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>

<script>
  // ambil input search dan card-container
  const searchInput = document.getElementById('searchInput');
  const cardContainers = document.querySelectorAll('.card-container');

  // fungsi untuk mencari card yang cocok dengan input search
  const searchCard = () => {
    const filter = searchInput.value.toLowerCase(); // konversi input search ke lowercase
    cardContainers.forEach(cardContainer => {
      const cards = cardContainer.querySelectorAll('.card'); // ambil semua card dalam card-container
      cards.forEach(card => {
        const title = card.querySelector('h3').textContent.toLowerCase(); // ambil judul card dan konversi ke lowercase
        if (title.indexOf(filter) !== -1) { // jika judul card mengandung input search
          card.style.display = 'flex'; // tampilkan card
        } else {
          card.style.display = 'none'; // sembunyikan card
        }
      });
    });
  };

  // tangkap event input pada input search dan panggil fungsi pencarian
  searchInput.addEventListener('input', searchCard);
</script>

<!-- <script>
  // ambil input search dan card-container
  const searchInput = document.getElementById('searchInput');
  const cardContainer = document.querySelector('.card-container');

  // fungsi untuk mencari card yang cocok dengan input search
  const searchCard = () => {
    const filter = searchInput.value.toLowerCase(); // konversi input search ke lowercase
    const cards = cardContainer.querySelectorAll('.card'); // ambil semua card
    cards.forEach(card => {
      const title = card.querySelector('h3').textContent.toLowerCase(); // ambil judul card dan konversi ke lowercase
      if (title.indexOf(filter) !== 1) { // jika judul card mengandung input search
        card.style.display = 'block'; // tampilkan card
      } else {
        card.style.display = 'none'; // sembunyikan card
      }
    });
  };

  // tangkap event input pada input search dan panggil fungsi pencarian
  searchInput.addEventListener('input', searchCard);
</script> -->