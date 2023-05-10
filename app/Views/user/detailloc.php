<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/detail.css') ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar fixed-top navbar-sticky">
        <div class="container">
            <a class="navbar-brand" href="#" style="color: #7227FE"> <img src="<?= base_url('assets/logo2.png') ?>" alt="Logo" height="30"> E-MAGANG</a>
            <div class="profile">
                <img src="<?php echo base_url('assets/user.png') ?>" alt="Gambar Profil">
                <div class="profile-info">
                    <p>Nama Lengkap</p>
                    <p class="email">email@contoh.com</p>
                </div>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <!-- Content -->
    <div class="konten">
        <div class="card" style="width: 18rem;">
            <img src="<?php echo base_url('assets/location.jpg') ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Dinas Komunikasi, Informatika, Persandian dan Statistik</p>
                <p class="desc" style="font-weight: lighter; font-size: small;">Jln. Jalani saja sudah kehidupan ini The Lorem ipum filling text is used by graphic designers.<br>
                    <br>Telp +192 92838 1093<br>
                    <br>Email mailto:kominfosanti@bulelengkab.go.id<br>
                    <br>Situs https://kominfosanti.bulelengkab.go.id/
                    <br>Deskripsi
                    Membuka pendaftaran magang bagi seluruh mahasiswa atau siswa/siswi denggan ketentuan sebagai berikut :
                    Memiliki skill pada bidang komputer
                    Dapa beradaptasi
                    memiliki soft skill
                    mau bekerja sama dalam tim
                    bekerja langsung di tempat
                </p>
            </div>
        </div>
        <div class="right">
            <form>
                <h5><b>Lengkapi data di bawah ini</b></h5><br>
                <div>
                    <img src="<?php echo base_url('assets/user.png') ?>" alt="gambar user" class="user">
                    <button class="btnprofile">Ubah foto profile</button>
                </div><br>
                <label for="name">Nama Lengkap</label>
                <input type="name" id="name" name="name" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <label for="tgl">Tanggal Lahir</label>
                <div class="input-grup">
                    <input type="number" name="tgl_lahir" id="tgl" min="1" max="31" placeholder="Tanggal" required>
                    <input type="number" name="bln_lahir" id="tgl" min="1" max="12" placeholder="Bulan" required>
                    <input type="number" name="thn_lahir" id="tgl" min="1900" max="2099" placeholder="Tahun" required>
                </div>
                <label for="asal">Asal Instansi</label>
                <input id="asal" name="asal" required></input>
                <label for="about">No Telp</label>
                <input id="telp" name="telp" required></input>
                <label for="alamat">Alamat</label>
                <input id="alamat" name="alamat" required></input>
                <div class="input-group">
                    <div class="options">
                        <label for="about">Pekerjaan</label>
                        <label>
                            <input type="radio" name="jawaban" value="mahasiswa">Mahasiswa
                        </label>
                        <label>
                            <input type="radio" name="jawaban" value="siswa">Siswa SMA/SMK
                        </label>
                    </div>
                    <div class="input-col">
                        <label for="Lainnya">Lainnya</label>
                        <input id="about" name="about" required></input>
                    </div>
                </div>
                <div class="simpan">
                    <button type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>