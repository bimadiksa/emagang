<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>Registrasi Anak Magang <br> E-Magang</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Registrasi sebagai anak magang</p>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-warning">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>
                <form action="<?php echo base_url(); ?>/RegistrasiController/store" method="post">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?= session('errors.nama') ? 'is-invalid' : '' ?>" name="nama" id="nama" value="<?php echo old('nama') ?>" placeholder=" Nama Lengkap">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <?php if (session('errors.nama')) : ?>
                            <div class="invalid-feedback"><?= session('errors.nama') ?></div>
                        <?php endif ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?= session('errors.no_id') ? 'is-invalid' : '' ?>" name="no_id" id="no_id" value="<?php echo old('no_id') ?>" placeholder=" NIM/NISN">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-sort-numeric-up"></span>
                            </div>
                        </div>
                        <?php if (session('errors.no_id')) : ?>
                            <div class="invalid-feedback"><?= session('errors.no_id') ?></div>
                        <?php endif ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" name="email" id="email" value="<?php echo old('email') ?>" placeholder=" Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <?php if (session('errors.email')) : ?>
                            <div class="invalid-feedback"><?= session('errors.email') ?></div>
                        <?php endif ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>" name="password" id="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class=" show-password"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                        <?php if (session('errors.password')) : ?>
                            <div class="invalid-feedback"><?= session('errors.password') ?></div>
                        <?php endif ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control <?= session('errors.confirmpassword') ? 'is-invalid' : '' ?>" name="confirmpassword" id="confirmpassword" placeholder="konfirmasi password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class=" show-confirm-password"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                        <?php if (session('errors.confirmpassword')) : ?>
                            <div class="invalid-feedback"><?= session('errors.confirmpassword') ?></div>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="id_prodi">Asal Instansi</label>
                        <div class="dropdown">
                            <input type="text" class="form-control dropdown-toggle" id="id_search" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="Cari...">
                            <div class="dropdown-menu" aria-labelledby="id_prodi" style="position: absolute; top: 100%; left: 0; max-height: 200px; overflow-y: auto;" onshow="expandContent()">
                                <?php foreach ($instansi as $row) : ?>
                                    <option value="<?= $row['id_prodi'] ?>"><?= $row['nama_prodi'] ?></option>
                                <?php endforeach; ?>
                                <?php
                                foreach ($instansi as $row) {
                                    echo '<a class="dropdown-item" href="#" data-value="' . $row['id_prodi'] . '">' . $row['nama_prodi'] . ',' . $row['nama_jurusan'] . ',' . $row['nama_instansi'] . '</a>';
                                }
                                ?>
                            </div>
                            <input type="hidden" id="id_prodi" name="id_prodi">
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <a href="<?= base_url('/login_view') ?>" class="text-center">Sudah punya akun</a>
                            <!-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div> -->
                            <!-- /.col -->
                            <div class="col-4 ml-auto">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <!-- <div class="con" style="height: 300px;">
                    </div> -->

                </form>


            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url('adminlte/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>
</body>

</html>


<?php if (session()->has('success')) : ?>
    <style>
        /* CSS untuk mengatur warna teks menjadi putih */
        .swal-toast-custom-class {
            color: #FFF !important;
        }
    </style>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            background: '#4CAF50', // Set warna background menjadi hijau
            iconColor: '#FFF', // Set warna ikon menjadi putih
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        Toast.fire({
            icon: 'success',
            title: '<?= session('success') ?>'
        });
    </script>
<?php endif; ?>

<script>
    const togglePassword = document.querySelector('.show-password');
    const form = document.querySelector('#login-form');
    const email = document.querySelector('#email');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    const toggleConfirmPassword = document.querySelector('.show-confirm-password');

    toggleConfirmPassword.addEventListener('click', function(e) {
        const type = confirmpassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmpassword.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
</script>
<script>
    const dropdownMenu = document.querySelector('.dropdown-menu');
    const searchInput = document.getElementById('id_search');
    const hiddenInput = document.getElementById('id_prodi');

    searchInput.oninput = function() {
        const filter = searchInput.value.toLowerCase();
        const options = dropdownMenu.querySelectorAll('.dropdown-item');
        for (let i = 0; i < options.length; i++) {
            const optionText = options[i].text.toLowerCase();
            if (optionText.indexOf(filter) > -1) {
                options[i].style.display = "";
            } else {
                options[i].style.display = "none";
            }
        }
    };

    dropdownMenu.addEventListener('click', function(event) {
        event.preventDefault();
        const clickedOption = event.target;
        const value = clickedOption.dataset.value;
        const text = clickedOption.text;
        hiddenInput.value = value;
        searchInput.value = text;
    });
</script>