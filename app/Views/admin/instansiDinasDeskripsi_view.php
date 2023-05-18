<title><?= $title ?></title>
<?php echo view('admin/template/header'); ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Menambah Deskripsi dan Foto</h3>
                    </div>
                    <form method="post" action="<?php echo base_url('admin/simpan_data_instansi_dinas/' . $kode_instansi); ?>" enctype="multipart/form-data" id="form-instansi">
                        <?= csrf_field() ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode_instansi">Kode Instansi</label>
                                <input name="kode_instansi" id="kode_instansi" class="form-control" rows="3" value="<?= $kode_instansi ?>" readonly></input>
                            </div>
                            <div class="form-group">
                                <label for="nama_instansi_dinas">Nama Instansi Dinas</label>
                                <input name="nama_instansi_dinas" id="nama_instansi_dinas" class="form-control" rows="3" value="<?= $nama_instansi ?>" readonly></input>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control <?= session('errors.deskripsi') ? 'is-invalid' : '' ?>" rows="3" placeholder="Masukkan deskripsi"><?= isset($deskripsi['deskripsi']) ? $deskripsi['deskripsi'] : '' ?></textarea>
                                <?php if (session('errors.deskripsi')) : ?>
                                    <div class="invalid-feedback"><?= session('errors.deskripsi') ?></div>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="foto_instansi">Foto</label>
                                <div class="custom-file">
                                    <input type="file" name="foto_instansi" id="foto_instansi" class="custom-file-input <?= session('errors.foto_instansi') ? 'is-invalid' : '' ?>">
                                    <label class="custom-file-label" for="foto_instansi">Pilih foto</label>
                                    <?php if (session('errors.foto_instansi')) : ?>
                                        <div class="invalid-feedback"><?= session('errors.foto_instansi') ?></div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <div class=" card-footer d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary btn-block mt-2 mr-2" onclick="location.href='<?= base_url('admin/instansiDinas_view') ?>'">Kembali</button>
                            <button type="button" class="btn btn-warning btn-block mr-2" onclick="confirmBatal()">Batal</button>
                            <button type="submit" class="btn btn-success btn-block">Simpan Data</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>


<?php echo view('admin/template/footer'); ?>


<script>
    $(document).ready(function() {
        $('#foto_instansi').change(function() {
            var filename = $(this).val().split("\\").pop();
            $(this).next('.custom-file-label').html(filename);
        });
    });
</script>

<!-- popup batal -->
<!-- <script>
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
                document.getElementById('form-instansi').reset(); // reset form
            }
        })
    }
</script> -->

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
                document.getElementById('form-instansi').reset(); // reset form
                document.getElementById('foto_instansi').value = ""; // mengosongkan nilai input file
                document.querySelector('.custom-file-label').textContent = "Pilih foto"; // mengganti teks label file
            }
        })
    }
</script>