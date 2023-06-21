<title><?= $title ?></title>
<?php echo view('admin/template/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?php
                    $session = \Config\Services::session();
                    $level = $session->get('level');
                    if ($level == 'super_admin') : ?>
                        <h1 class="m-0">Dashboard Super Admin</h1>
                    <?php else : ?>
                        <h1 class="m-0">Dashboard Admin</h1>
                    <?php endif; ?>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <?php
                $session = \Config\Services::session();
                $level = $session->get('level');
                if ($level == 'super_admin') : ?>
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><strong><?= $count ?></strong></h3>

                                <h5>Akun Admin
                                </h5>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-person"></i>
                            </div>
                            <a href="<?= base_url('admin/admin_view') ?>" class="small-box-footer">Lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <?php else : ?>
                    <!-- .. -->
                <?php endif; ?>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><strong><?= $countInstansi ?></strong></h3>
                            <!-- <h3>#<sup style="font-size: 20px">Instansi</sup></h3> -->

                            <h5>Instansi</h5>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-building"></i>
                        </div>
                        <a href="<?= base_url('admin/instansiAsal_view') ?>" class="small-box-footer">Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><strong><?= $countJurusan ?></strong></h3>

                            <h5>Jurusan</h5>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-building"></i>
                        </div>
                        <a href="<?= base_url('admin/instansiAsal_view') ?>" class="small-box-footer">Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><strong><?= $countProdi ?></strong></h3>

                            <h5>Prodi</h5>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-building"></i>
                        </div>
                        <a href="<?= base_url('admin/instansiAsal_view') ?>" class="small-box-footer">Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <?php
                $session = \Config\Services::session();
                $level = $session->get('level');
                if ($level == 'super_admin') : ?>
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3><strong><?= $countMagang ?></strong></h3>

                                <h5>Anak Magang</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="<?= base_url('admin/anakMagang_view') ?>" class="small-box-footer">Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3><strong><?= $countMagangByKodeInstansi ?></strong></h3>

                                <h5>Anak Magang</h5>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="<?= base_url('admin/anakMagang_view') ?>" class="small-box-footer">Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3><strong>40</strong></h3>

                            <h5>Total Instansi Dinas</h5>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-map-marker-alt"></i>
                        </div>
                        <a href="#" class="small-box-footer">-</i></a>
                    </div>
                </div>

                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->


            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
<?php echo view('admin/template/footer'); ?>

<!-- /.content-wrapper -->
<?php if (session()->get('success')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'E-Magang',
            text: '<?= session()->get('success') ?>',
            // Set timer dalam milidetik (misalnya: 3000 ms = 3 detik)
            timer: 2000,
            showConfirmButton: false // Menyembunyikan tombol konfirmasi
        });
    </script>
<?php endif; ?>