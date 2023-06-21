<title><?= $title ?></title>
<?php echo view('admin/template/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Titik Lokasi Instansi Dinas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/admin/instansiDinas_view'); ?>">Instansi Dinas</a></li>
                        <li class="breadcrumb-item active"> Titik Lokasi Instansi Dinas</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary tambah-admin">
                        <div class="card-header" style="background-color: #7227FE;">
                            <h3 class="card-title">Membuat Akun Admin</h3>
                        </div>
                        <!-- /.card-header -->
                        <?php if (isset($validation)) : ?>
                            <div class="alert alert-warning">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>
                        <!-- form start -->
                        <form action="<?php echo base_url('admin/pilih_titik/' . $kode_instansi); ?>" method="post" id="form-admin">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <label for="jarak_radius">Jarak Radius (meter):</label><br>

                                <div class="input-group">
                                    <input type="number" step="0.01" name="jarak_radius" id="jarak_radius" class="form-control" placeholder="50" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-ruler-horizontal"></span>
                                        </div>
                                    </div>
                                    <?php if (session('errors.username')) : ?>
                                        <div class="invalid-feedback"><?= session('errors.username') ?></div>
                                    <?php endif ?>
                                </div>
                                <label for="titik_koordinat_y">Latitude: (-8.128722,115.0669996 || Latitude, Longtitude)</label><br>
                                <div class="input-group">
                                    <input type="number" step="0.00000000000001" name="titik_koordinat_y" id="titik_koordinat_y" class="form-control" placeholder="-8.128722" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-map-marker-alt"></span>
                                        </div>
                                    </div>
                                    <?php if (session('errors.email')) : ?>
                                        <div class="invalid-feedback"><?= session('errors.email') ?></div>
                                    <?php endif ?>
                                </div>
                                <label for="titik_koordinat_x">Longtitude: (-8.128722,115.0669996 || Latitude, Longtitude)</label><br>
                                <div class="input-group">
                                    <input type="number" step="0.00000000000000001" name="titik_koordinat_x" id="titik_koordinat_x" class="form-control" placeholder="115.0669996" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-map-marker-alt"></span>
                                        </div>
                                    </div>
                                    <?php if (session('errors.email')) : ?>
                                        <div class="invalid-feedback"><?= session('errors.email') ?></div>
                                    <?php endif ?>
                                </div>




                            </div>
                            <!-- /.card-body -->
                            <div class=" card-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary btn-block mt-2 mr-2" onclick="location.href='<?= base_url('admin/instansiDinas_view') ?>'">Kembali</button>
                                <button type="button" class="btn btn-warning btn-block mr-2" onclick="confirmBatal()">Batal</button>
                                <button type="submit" class="btn btn-success btn-block">Tambah Titik Lokasi</button>

                            </div>
                        </form>
                        <br>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
<?php echo view('admin/template/footer'); ?>
<script>
    function confirmBatal() {
        Swal.fire({
            title: 'Apakah Anda yakin ingin membatalkan penambahan admin?',
            text: "Data yang telah diisi akan dihapus.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, batalkan!',
            cancelButtonText: 'Tidak, kembali',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-admin').reset(); // reset form
            }
        })
    }
</script>