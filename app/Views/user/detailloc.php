<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Location</title>
    <!-- sweet alert -->
    <link rel="stylesheet" href="/plugins/sweetalert2/sweetalert2.min.css">
    <script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" type="text/css" href="<?= base_url('path/sweetalert2/sweetalert2.min.css') ?>">
    <script type="text/javascript" src="<?= base_url('path/sweetalert2/sweetalert2.all.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Menghubungkan Font Awesome library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('style/detail.css') ?>">
    <script src="<?php echo base_url('js/landing.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar fixed-top navbar-sticky">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('user/location') ?>" style="color: #7227FE">
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

    <!-- Content -->
    <div class="konten">
        <div class="card">
            <?php if (!empty($tabel['foto_instansi'])) : ?>
                <img src="<?php echo base_url('images/' . $tabel['foto_instansi']) ?>" class="card-img-top" alt="gambar">
            <?php else : ?>
                <img src="<?php echo base_url('assets/location.jpg') ?>" class="card-img-top" alt="gambar">
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title"><?= $nama_instansi ?></h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Alamat: <?= $alamat_instansi ?></li>
                <li class="list-group-item">Email : <?= $email_instansi ?></li>
                <?php if (!empty($tabel['deskripsi'])) : ?>
                    <?php
                    // Pisahkan setiap ketentuan berdasarkan baris baru ("\n")
                    $ketentuan = explode("\n", $tabel['deskripsi']);

                    ?>
                    <li class="list-group-item">
                        <?php foreach ($ketentuan as $kt) : ?>
                            - <?= trim($kt) ?><br>
                        <?php endforeach; ?>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="card-body">
                <a href="<?= base_url('user/pilih_instansi/' . $kode_instansi) ?>" onclick="event.preventDefault(); pilihInstansiDinas();" class="card-link"><button class="btn-pilih">Pilih Tempat Magang</button></a>
                <a href="<?= base_url('user/location') ?>"><button class="btn-kembali">Kembali</button></a>
            </div>
        </div>
    </div>

    <!-- <div class="popup-container" id="popup-container">
        <div class="popup">
            <p>Anda yakin?</p>
            <div class="popup-buttons">
                <button class="btn-ya">Ya</button>
                <button class="btn-tidak">Tidak</button>
            </div>
        </div>
    </div> -->

    <script>
        document.addEventListener
        // Menangkap elemen tombol "Pilih Tempat Magang"
        var btnPilih = document.querySelector('.btn-pilih');

        // Menangkap elemen popup container
        var popupContainer = document.getElementById('popup-container');

        // Menangkap elemen tombol "Ya" di dalam popup
        var btnYa = document.querySelector('.btn-ya');

        // Menangkap elemen tombol "Tidak" di dalam popup
        var btnTidak = document.querySelector('.btn-tidak');

        // Menambahkan event listener pada tombol "Pilih Tempat Magang"
        btnPilih.addEventListener('click', function() {
            // Menampilkan popup
            popupContainer.classList.add('show');
        });

        // Menambahkan event listener pada tombol "Ya" di dalam popup
        btnYa.addEventListener('click', function() {
            // Tindakan yang akan dijalankan ketika tombol "Ya" ditekan
            alert('Anda telah memilih tempat magang!');
            // Sembunyikan popup
            popupContainer.classList.remove('show');
        });

        // Menambahkan event listener pada tombol "Tidak" di dalam popup
        btnTidak.addEventListener('click', function() {
            // Sembunyikan popup
            popupContainer.classList.remove('show');
        });
    </script>
</body>

</html>

<script>
    function pilihInstansiDinas() {
        Swal.fire({
            title: 'Apakah Yakin?',
            text: "kesalahan akan membutuhkan waktu perbaikan, pastikan pilihan anda benar!!!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            showConfirmButton: true,
            confirmButtonText: 'Ya, Saya Yakin!',
            cancelButtonText: 'Batal!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('user/pilih_instansi/' . $kode_instansi) ?>";
            }
        })
    }
</script>