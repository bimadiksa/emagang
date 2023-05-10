<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title><?= $title ?></title>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/styles/core.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/styles/icon-font.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/styles/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('style/dashboard.css') ?>">



    <!-- 
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
    </script> -->

</head>

<body>
    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
        </div>
        <div class="header-right">
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="<?php echo base_url('assets/user.png') ?>" alt="">
                        </span>
                        <span class="user-name"><?= session('nama') ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="<?= base_url('/login_view'); ?>"><i class="dw dw-user1"></i> Profile</a></li>
                        <li><?php if (session()->get('isLoggedIn')) : ?>
                                <a class="dropdown-item" href="<?= base_url('/logout'); ?>"><i class="dw dw-logout"></i> Log Out</a>
                            <?php endif; ?>
                        </li>
                    </div>
                </div>



                <!-- <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="<?php echo base_url('assets/user.png') ?>" alt="">
                        </span>
                        <span class="user-name">Ni Luh Sukma</span>
                    </a>
                    <div class="dropdown-menu-end dropdown-menu dropdown-menu-dark">
                        <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
                        <?php if (session()->get('isLoggedIn')) : ?>
                            <a class="dropdown-item" href="<?= base_url('/logout'); ?>" onclick="event.preventDefault(); logoutConfirmation();"><i class="dw dw-logout"></i> Log Out</a>
                        <?php endif; ?>
                    </div>
                </div> -->
            </div>
        </div>
    </div>


    <!-- SIDE BAR  -->
    <div class="left-side-bar" style="background-color: #7227FE;">
        <div class="brand-logo">
            <a href="index.html">
                <p class="font-32 weight-700">E-MAGANG</p>
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li>
                        <a href="<?= base_url('user/dashboard_magang') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('user/profil_magang/' . session('id_magang')) ?>" class="dropdown-toggle no-arrow">
                            <span class="micon fa fa-user-o"></span><span class="mtext">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('user/location') ?>" class="dropdown-toggle no-arrow">
                            <span class="micon fa fa-map-marker"></span><span class="mtext">Lokasi Magang</span>
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
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>