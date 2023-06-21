<title><?= $title ?></title>
<?php echo view('admin/template/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Instansi Anak Magang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/admin/instansiAsal_view'); ?>">Tambah Instansi Anak Magang</a></li>
                        <li class="breadcrumb-item active">Tambah Instansi Anak Magang</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Masukkan data yang diperlukan</h3>
                        </div>
                        <!-- /.card-header -->
                        <?php if (isset($validation)) : ?>
                            <div class="alert alert-warning">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>admin/tambah_data_instansi" method="post" id="quickForm">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <label for="nama_instansi">Nama Asal Instansi Anak Magang</label>
                                <div class="input-group">
                                    <input type="text" name="nama_instansi" class="form-control" id="nama_instansi" placeholder="Masukkan Nama Instansi">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-building"></span>
                                        </div>
                                    </div>
                                </div>
                                <label for="alamat_instansi">Alamat Asal Instansi Anak Magang</label>
                                <div class="input-group">
                                    <input type="text" name="alamat_instansi" class="form-control" id="alamat_instansi" placeholder="Masukkan Alamat Instansi">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-map"></span>
                                        </div>
                                    </div>
                                </div>
                                <label for="jenis_instansi">Jenis Asal Instansi Anak Magang</label>
                                <div class="input-group">
                                    <select class="form-control" id="jenis_instansi" name="jenis_instansi">
                                        <option value="universitas">Universitas</option>
                                        <option value="SMK">SMK</option>
                                    </select>
                                </div>
                                <label for="nama_jurusan">Jurusan Asal Instansi Anak Magang</label>
                                <div class="input-group">
                                    <input type="text" name="nama_jurusan" class="form-control" id="nama_jurusan" placeholder="Masukkan Jurusan">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-building"></span>
                                        </div>
                                    </div>
                                </div>
                                <label for="nama_prodi">Program Studi Asal Instansi Anak Magang</label>
                                <div class="input-group">
                                    <input type="text" name="nama_prodi" class="form-control" id="nama_prodi" placeholder="Masukkan Program Studi">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-building"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer  d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary btn-block mt-2 mr-2" onclick="location.href='<?= base_url('admin/instansiAsal_view') ?>'">Kembali</button>
                                <button type="button" class="btn btn-warning btn-block mr-2" onclick="confirmBatal()">Batal</button>
                                <button type="submit" class="btn btn-success btn-block">Tambah Instansi Anak Magang</button>

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
    <!-- /.content -->
    <?php echo view('admin/template/footer'); ?>

</div>

<!-- /.content-wrapper -->