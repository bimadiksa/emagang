<title><?= $title ?></title>
<?php echo view('admin/template/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Instansi Anak Magang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/admin/instansiAsal_view'); ?>">Edit Instansi Anak Magang</a></li>
                        <li class="breadcrumb-item active">Edit Instansi Anak Magang</li>
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
                            <h3 class="card-title">Rubah data yang diperlukan</h3>
                        </div>
                        <!-- /.card-header -->
                        <?php if (isset($validation)) : ?>
                            <div class="alert alert-warning">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>
                        <!-- form start -->
                        <form action="<?php echo base_url('admin/editInstansi/' . $prodi['id_prodi']); ?>" method="post" id="form-edit">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <label for="nama_instansi">Nama Asal Instansi Anak Magang</label>
                                <div class="input-group">
                                    <input type="text" name="nama_instansi" class="form-control" id="nama_instansi" value="<?= $instansis['nama_instansi'] ?>" placeholder="Masukkan Nama Instansi">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-university"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- <label for="alamat_instansi">Alamat Asal Instansi Anak Magang</label>
                                <div class="input-group">
                                    <input type="text" name="alamat_instansi" class="form-control" id="alamat_instansi" value="<?= $instansis['alamat_instansi'] ?>" placeholder="Masukkan Alamat Instansi">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-map-marker-alt"></span>
                                        </div>
                                    </div>
                                </div> -->
                                <label for="jenis_instansi">Jenis Asal Instansi Anak Magang</label>
                                <div class="input-group">
                                    <select class="form-control" id="jenis_instansi" name="jenis_instansi">
                                        <option value="universitas" <?= ($instansis['jenis_instansi'] == 'universitas') ? 'selected' : '' ?>>Universitas</option>
                                        <option value="smk" <?= ($instansis['jenis_instansi'] == 'smk') ? 'selected' : '' ?>>SMK</option>
                                    </select>
                                </div>
                                <label for="nama_jurusan">Jurusan Asal Instansi Anak Magang</label>
                                <div class="input-group">
                                    <input type="text" name="nama_jurusan" class="form-control" id="nama_jurusan" value="<?= isset($instansis['nama_jurusan']) ? $instansis['nama_jurusan'] : '' ?>" placeholder="Masukkan Jurusan">

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user-graduate"></span>
                                        </div>
                                    </div>
                                </div>
                                <label for="nama_prodi">Program Studi Asal Instansi Anak Magang</label>
                                <div class="input-group">
                                    <input type="text" name="nama_prodi" class="form-control" id="nama_prodi" value="<?= isset($prodi['nama_prodi']) ? $prodi['nama_prodi'] : '' ?>" placeholder="Masukkan Program Studi">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-chalkboard-teacher"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer  d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary btn-block mt-2 mr-2" onclick="location.href='<?= base_url('admin/instansiAsal_view') ?>'">Kembali</button>
                                <button type="button" class="btn btn-warning btn-block mr-2" onclick="confirmBatal()">Batal</button>
                                <button type="submit" class="btn btn-success btn-block">Edit Instansi Anak Magang</button>

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
</div>
<!-- /.content-wrapper -->

<?php echo view('admin/template/footer'); ?>

<!-- popup batal -->
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
                document.getElementById('form-edit').reset(); // reset form
            }
        })
    }
</script>