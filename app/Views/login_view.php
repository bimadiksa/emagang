<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in | Admin </title>

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
                <p class="login-box-msg">Masukkan email dan password</p>
                <?php if (session()->getFlashdata('errorLogin')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('errorLogin') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->get('lockout_time') > 0) : ?>

                    <?php if (session()->get('lockout_time') - time() > 0) : ?>

                    <?php else :
                        session()->remove('attempt_count');
                        session()->remove('lockout_time'); ?>
                    <?php endif ?>

                <?php endif ?>

                <form action="<?php echo base_url(); ?>/LoginController/loginAuth" method="post">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                    <div class="input-group mb-3">
                        <?php if (session()->get('lockout_time') - time() > 0) : ?>
                            <input type="email" name="email" class="form-control" value="<?php echo old('email') ?>" readonly>
                        <?php else : ?>
                            <input type="text" name="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" id="email" placeholder="Masukkan email" value="<?php echo old('email'); ?>">
                        <?php endif ?>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <?php if (session('errors.email')) : ?>
                            <div class="invalid-feedback"><?= session('errors.email') ?></div>
                        <?php endif ?>
                    </div>
                    <div class="password-wrapper">
                        <div class="input-group mb-3">
                            <?php if (session()->get('lockout_time') - time() > 0) : ?>
                                <input type="password" name="password" class="form-control" readonly>
                            <?php else : ?>
                                <input type="password" name="password" id="password" class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>" placeholder=" Masukkan Password" value="<?php echo old('password'); ?>">
                            <?php endif ?>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class=" show-password"><i class="fas fa-eye"></i></span>
                                </div>
                            </div>
                            <?php if (session('errors.password')) : ?>
                                <div class="invalid-feedback"><?= session('errors.password') ?></div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <!-- <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="rememberMe" name="rememberMe">
                                    <label for="rememberMe" class="custom-control-label">Remember Me</label>
                                </div>
                            </div> -->
                            <!-- <div class="icheck-primary">
                                <input type="checkbox" id="remember_me" name="remember_me" value="1">
                                <label for="remember_me">
                                    Remember Me
                                </label>
                            </div> -->
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <?php if (session()->get('lockout_time') - time() > 0) : ?>
                                <button type="submit" class="btn btn-primary" disabled>Login</button>
                            <?php else : ?>
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            <?php endif ?>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- <div>
                    <a href="#" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modalDetail"><i class="fas fa-info-circle"></i></a>

                </div> -->
                <!-- Modal New Password -->
                <!-- Tampilkan modal disini -->
                <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDetailLabel"><strong>UBAH PASSWORD</strong></h5>

                            </div>
                            <div class="modal-body">
                                <?php if (isset($errors)) : ?>
                                    <div class="alert alert-danger">
                                        <?php foreach ($errors as $error) : ?>
                                            <p><?= esc($error) ?></p>
                                        <?php endforeach ?>
                                    </div>
                                <?php endif ?>

                                <?php $validation = \Config\Services::validation(); ?>
                                <form action="<?= base_url('/newPassword') ?>" method="post">
                                    <input type="hidden" name="user_id" value="">
                                    <div class="form-group">
                                        <label for="new_password">Password Baru</label>
                                        <input type="password" class="form-control <?= ($validation->hasError('new_password')) ? 'is-invalid' : '' ?>" id="new_password" name="new_password" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('new_password') ?>
                                        </div>
                                        <label for="new_confirmpassword">Konfirmasi Password Baru</label>
                                        <input type="password" class="form-control <?= ($validation->hasError('new_confirmpassword')) ? 'is-invalid' : '' ?>" id="new_confirmpassword" name="new_confirmpassword" required>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('new_confirmpassword') ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                                </form>


                                <!-- Tambahkan informasi detail instansi lainnya sesuai kebutuhan -->
                                <div class="info" style="text-align: center;">
                                    <br>
                                    <p><strong>PENTING UNTUK MERUBAH PASSWORD ANDA</strong></p>
                                    <p><strong>AGAR BISA MASUK KE SISTEM E-MAGANG</strong></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <?php if (session()->get('attempt_count') != 3 && session()->getFlashdata('error')) : ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...Login Gagal',
                            text: '<?php echo session()->getFlashdata('error'); ?>',
                        })
                    </script>
                <?php endif; ?>
                <?php if (session()->get('attempt_count') == 3 && session()->getFlashdata('error')) : ?>
                    <script>
                        let timerInterval
                        let countdownTime = Math.ceil(<?php echo session()->get('lockout_time') - time() ?>) // dibagi 1000 agar satuan menjadi detik
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Terkunci',

                            html: 'Coba login kembali setelah <b>' + countdownTime + '</b> detik.',
                            timer: countdownTime * 1000, // dikalikan 1000 agar satuan menjadi milidetik
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                    countdownTime -= 1; // kurangi countdownTime setiap 1 detik
                                    b.textContent = countdownTime;
                                }, 1000); // set interval 1 detik (1000 milidetik)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                        }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                                location.reload(); // tambahkan kode ini untuk mereload halaman
                            }
                        })
                    </script>
                <?php endif; ?>

                <p class="mb-1">
                    <a href="<?= base_url('/lupa_password') ?>">Lupa Password?</a>
                </p>
                <p class="mb-0">
                    <a href="<?= base_url('/registrasi') ?>" class="text-center">Registrasi</a>
                </p>
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
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
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
    <?php elseif (session()->has('errorToken')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...Token Kadaluarsa',
                text: '<?php echo session()->getFlashdata('error'); ?>',
            })
        </script>

    <?php endif; ?>



    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>


</body>



</html>

<?php if (session()->has('showModal')) : ?>
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('modalDetail'));
        myModal.show();
    </script>
<?php endif; ?>