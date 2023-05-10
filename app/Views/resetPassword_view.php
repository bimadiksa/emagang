<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/dist/css/adminlte.min.css') ?>">

    <!-- SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="/plugins/sweetalert2/sweetalert2.min.css">
    <script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- <div class="login-logo">
            <a href="../../index2.html"><b>Masuk Sebagai Admin</b>E-Magang</a>
        </div> -->
        <!-- /.login-logo -->
        <div class="card card-outline card-purple">
            <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>E-</b>Magang</a>
            </div>
            <div class="card-body login-card-body login-form">
                <p class="login-box-msg">Masukkan Password Baru</p>
                <form action="<?php echo base_url('konfirmasi_reset_password'); ?>" method="post">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>" id="password" placeholder="Masukkan password baru" value="<?php echo old('password'); ?>">
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
                        <input type="password" name="confirmpassword" class="form-control <?= session('errors.confirmpassword') ? 'is-invalid' : '' ?>" id="confirmpassword" placeholder="Konfirmasi password baru" value="<?php echo old('confirmpassword'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class=" show-confirm-password"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                        <?php if (session('errors.confirmpassword')) : ?>
                            <div class="invalid-feedback"><?= session('errors.confirmpassword') ?></div>
                        <?php endif ?>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary btn-block mt-2 mr-2" onclick="location.href='<?= base_url('/login_view') ?>'">Kembali</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block mt-2 mr-2">Simpan Password</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- CSS -->
    <style>
        .login-page {
            background-color: #EBE8F2;
        }

        .password-wrapper {
            position: relative;
        }

        .password-icon {
            position: absolute;
            top: 50%;
            right: 40px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .password-icon i {
            font-size: 18px;
            color: #999;
        }

        .password-icon i:hover {
            color: #333;
        }
    </style>

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.js"></script>
</body>

</html>

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