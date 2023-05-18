<?php
$uri = uri_string(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/jqvmap/jqvmap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/dist/css/adminlte.min.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/daterangepicker/daterangepicker.css') ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/summernote/summernote-bs4.min.css') ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
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


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url('adminlte/dist/img/EMagangLogo.png') ?>" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-dark navbar-purple">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->

            <a href="<?= base_url('/admin/dashboard_view') ?>" class="brand-link">
                <img src="<?php echo base_url('adminlte/dist/img/EMagangLogo.png') ?>" alt="EMagang Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">E-Magang</span>

            </a>


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url('adminlte/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= session()->get('username') ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <!-- <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div> -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/dashboard_view'); ?>" class="nav-link <?php if ($active_sidebar == 'dashboard_view') {
                                                                                                    echo 'active';
                                                                                                } ?>">
                                <i class="nav-icon fas fa-th"></i>

                                <p>
                                    Dashboard
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>
                        <?php
                        $session = \Config\Services::session();
                        $level = $session->get('level');
                        if ($level == 'super_admin') : ?>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/admin_view') ?>" class="nav-link <?php if ($active_sidebar == 'admin_view') {
                                                                                                    echo 'active';
                                                                                                } ?>">
                                    <i class="nav-icon fas fa-user-alt"></i>

                                    <p>
                                        Akun Admin
                                        <!-- <i class="right fas fa-angle-left"></i> -->
                                    </p>
                                </a>
                            </li>
                        <?php else : ?>
                            <!-- .. -->
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/instansiDinas_view') ?>" class="nav-link <?php if ($active_sidebar == 'instansi_dinas') {
                                                                                                        echo 'active';
                                                                                                    } ?>">
                                <i class="nav-icon fas fa-map-marker-alt"></i>

                                <p>
                                    Instansi Dinas
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/instansiAsal_view') ?>" class="nav-link <?php if ($active_sidebar == 'asal_instansi') {
                                                                                                        echo 'active';
                                                                                                    } ?>">
                                <i class="nav-icon fas fa-building"></i>

                                <p>
                                    Instansi Anak Magang
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/anakMagang_view') ?>" class="nav-link <?php if ($active_sidebar == 'anakmagang') {
                                                                                                    echo 'active';
                                                                                                } ?>">
                                <i class="nav-icon fas fa-users"></i>

                                <p>
                                    Anak Magang
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item mt-10 logout">
                            <?php if (session()->get('isLoggedIn')) : ?>
                                <a href="<?= base_url('/logout'); ?>" onclick="event.preventDefault(); logoutConfirmation();" class="nav-link">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>

                                    <p>
                                        Keluar <br> (<?= session()->get('email') ?>)
                                        <!-- <i class="right fas fa-sign-out-alt"></i> -->
                                    </p>
                                </a>
                            <?php endif; ?>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <style>
            .content_wrapper {
                background-color: #EBE8F2;
            }

            .navbar-purple {
                background-color: #7227FE;
            }

            .navbar-light .navbar-toggler-icon {
                background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255, 255, 255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
            }

            .navbar-nav {
                position: relative;
                display: flex;
                gap: 25px;
            }

            .nav-medsos {
                position: relative;
                list-style: none;
                width: 80px;
                height: 30px;
                border-radius: 20px;
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                transition: 0.5s;
            }

            .nav-medsos:hover {
                width: 180px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0);
            }

            .nav-medsos::before {
                content: '';
                position: absolute;
                inset: 0;
                border-radius: 30px;
                background: linear-gradient(45deg, var(--i), var(--j));
                opacity: 0;
                transition: 0.5s;
            }

            .nav-medsos:hover::before {
                opacity: 1;
            }

            .nav-medsos::after {
                content: '';
                position: absolute;
                top: 20px;
                width: 100%;
                height: 100%;
                border-radius: 60px;
                background: linear-gradient(45deg, var(--i), var(--j));
                opacity: 0;
                transition: 0.5s;
                z-index: -1;
                filter: blur(15px);
            }

            .nav-medsos:hover::after {
                opacity: 0.5;
            }

            .nav-medsos i {
                color: #777;
                font-size: 0.75em !important;
                transition: 0.5s;
                transition-delay: 0.5s;
                transform: scale(0);
            }

            .nav-medsos:hover i {
                transform: scale(0);
                font-size: 0.75em;
                transition-delay: 0.25s;
            }

            .nav-medsos span {
                position: absolute;
            }

            .nav-medsos .titulo {
                color: #fff;
                font-size: 0.7em !important;
                text-transform: uppercase;
                letter-spacing: 0.1em;
                transform: 0.5s;
                transition-delay: 0s;
            }

            .nav-medsos:hover .titulo {
                transform: scale(1);
                transition-delay: 0.25s;
            }
        </style>

        <script>
            function logoutConfirmation() {
                Swal.fire({
                    title: 'Sudah selesai?',
                    text: "Anda akan keluar dari halaman ini.",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    showConfirmButton: true,
                    confirmButtonText: 'Ya, keluar!',
                    cancelButtonText: 'Batal!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "<?= base_url('/logout') ?>";
                    }
                })
            }
        </script>