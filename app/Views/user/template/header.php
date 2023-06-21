<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title><?= $title ?></title>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Menghubungkan Font Awesome library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
    <!-- CSS DASBOARD KONTEN -->
    <link rel="stylesheet" href="<?php echo base_url('style/sidebar.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/dashboard.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/jurnal.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/kartu.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/sertif.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/absen.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/profile.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/location.css') ?>">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Right navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="user-panel d-flex" <?php
                                                    $session = \Config\Services::session();
                                                    $kode_instansi_dinas = $session->get('kode_instansi_dinas');
                                                    if ($kode_instansi_dinas !== null) {
                                                        $url = base_url('user/profile_magang/' . session('id_magang'));
                                                    } else {
                                                        $url = "";
                                                    }
                                                    ?> onclick="location.href='<?= $url ?>'">
                        <div class="image">
                            <?php if (session('foto') === null) : ?>
                                <span class="user-icon">
                                    <img src="<?php echo base_url('assets/user.png') ?>" alt="">
                                </span>
                            <?php else : ?>
                                <span class="user-icon">
                                    <div class="rounded-image-mask">
                                        <img src="<?php echo base_url('foto_magang/' . session('foto')); ?>" id="profile-picture-img" alt="Profile Picture">
                                    </div>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="info mt-2">
                            <a href="<?= base_url('user/profile_magang/' . session('id_magang')) ?>" class="d-block" style="color: black;"><?= session('nama') ?></a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>


        <!-- SIDE BAR  -->
        <!-- <div class="left-side-bar" style="background-color: #7227FE;">
            <div class="brand-logo">
                <a href="">
                    <p class="font-32 weight-700">E-MAGANG</p>
                </a>
                <div class="close-sidebar" data-toggle="left-sidebar-close">
                    <i class="ion-close-round"></i>
                </div>
            </div>
            <div class="menu-block customscroll">
                <div class="sidebar-menu">
                    <ul id="accordion-menu">
                        <?php
                        $session = \Config\Services::session();
                        $kode_instansi_dinas = $session->get('kode_instansi_dinas');
                        if ($kode_instansi_dinas !== null) : ?>
                            <li>
                                <a href="<?= base_url('user/dashboard_magang') ?>" class="dropdown-toggle no-arrow">
                                    <span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('user/profile_magang/' . session('id_magang')) ?>" class="dropdown-toggle no-arrow">
                                    <span class="micon fa fa-user-o"></span><span class="mtext">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('user/absen') ?>" class="dropdown-toggle no-arrow">
                                    <span class="micon fa fa-pencil-square-o"></span><span class="mtext">Absen</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('user/jurnal_harian') ?>" class="dropdown-toggle no-arrow">
                                    <span class="micon fa fa-book"></span><span class="mtext">Jurnal Harian</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('user/sertif') ?>" class="dropdown-toggle no-arrow">
                                    <span class="micon fa fa-print"></span><span class="mtext">Sertifikat</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?= base_url('user/location') ?>" class="dropdown-toggle no-arrow">
                                <span class="micon fa fa-map-marker"></span><span class="mtext">Lokasi Magang</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mobile-menu-overlay"></div> -->

        <aside class="main-sidebar elevation-4" style="background-color: #7227fe;">
            <!-- Brand Logo -->
            <a href="<?php echo base_url('index3.html') ?>" class="brand-link">
                <img src="<?php echo base_url('assets/logoputih.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-bold">E-MAGANG</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <?php $session = \Config\Services::session();
                        $kode_instansi_dinas = $session->get('kode_instansi_dinas');
                        if ($kode_instansi_dinas !== null) : ?>
                            <li class="nav-item">
                                <a href="<?= base_url('user/dashboard_magang') ?>" class="nav-link <?php if ($active_sidebar == 'dashboard') {
                                                                                                        echo 'active';
                                                                                                    } ?>">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('user/profile_magang/' . session('id_magang')) ?>" class="nav-link <?php if ($active_sidebar == 'profile') {
                                                                                                                                echo 'active';
                                                                                                                            } ?>">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Profile
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('user/absen') ?>" class="nav-link <?php if ($active_sidebar == 'absen') {
                                                                                            echo 'active';
                                                                                        } ?>">
                                    <i class="nav-icon fas fa-clipboard-check"></i>
                                    <p>
                                        Absen
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('user/jurnal_harian') ?>" class="nav-link <?php if ($active_sidebar == 'jurnal') {
                                                                                                    echo 'active';
                                                                                                } ?>">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Jurnal Harian
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('user/sertif') ?>" class="nav-link <?php if ($active_sidebar == 'sertifikat') {
                                                                                                echo 'active';
                                                                                            } ?>">
                                    <i class="nav-icon fas fa-star"></i>
                                    <p>
                                        Sertifikat
                                    </p>
                                </a>
                            </li>

                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?= base_url('user/location') ?>" class="nav-link <?php if ($active_sidebar == 'lokasi') {
                                                                                            echo 'active';
                                                                                        } ?>">
                                <i class="nav-icon fas fa-map-pin"></i>
                                <p>
                                    Lokasi Magang
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <?php if (session()->get('isLoggedIn')) : ?>
                                <a href="<?= base_url('/logout'); ?>" onclick="event.preventDefault(); logoutConfirmation();" class="nav-link">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>
                                        Logout
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