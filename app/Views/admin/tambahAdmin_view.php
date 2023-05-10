<title><?= $title ?></title>
<?php echo view('admin/template/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Akun Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/admin_view'); ?>">Data Admin</a></li>
                        <li class="breadcrumb-item active">Tambah Akun Admin</li>
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
                    <div class="card card-primary tambah-admin">
                        <div class="card-header" style="background-color: #7227FE;">
                            <h3 class="card-title">Masukkan email dan password admin. Password menggunakan NIP</h3>
                        </div>
                        <!-- /.card-header -->
                        <?php if (isset($validation)) : ?>
                            <div class="alert alert-warning">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>
                        <!-- form start -->
                        <form action="<?php echo base_url(); ?>admin/tambahAdmin" method="post" id="form-admin">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <label for="username">Nama Lengkap Admin</label>
                                <div class="input-group">
                                    <input type="text" name="username" class="form-control <?= session('errors.username') ? 'is-invalid' : '' ?>" id="username" value="<?= old('username') ?>" placeholder=" Masukkan Nama Lengkap">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    <?php if (session('errors.username')) : ?>
                                        <div class="invalid-feedback"><?= session('errors.username') ?></div>
                                    <?php endif ?>
                                </div>
                                <label for="email">Email Admin</label>
                                <div class="input-group">
                                    <input type="text" name="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" id="email" value="<?php echo old('email'); ?>" placeholder=" Masukkan Email Yang Valid">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                    <?php if (session('errors.email')) : ?>
                                        <div class="invalid-feedback"><?= session('errors.email') ?></div>
                                    <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <label for="kode_instansi">Instansi Dinas</label>
                                    <div class="dropdown">
                                        <input type="text" class="form-control dropdown-toggle" id="id_search" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="Cari...">
                                        <div class="dropdown-menu" aria-labelledby="kode_instansi" style="position: absolute; top: 100%; left: 0; max-height: 200px; overflow-y: auto;" onshow="expandContent()">

                                            <?php
                                            foreach ($output as $row) {
                                                echo '<a class="dropdown-item" href="#" data-value="' . $row['kode_instansi'] . '">' . $row['ket_ukerja'] . '</a>';
                                            }
                                            ?>
                                        </div>
                                        <input type="hidden" id="kode_instansi" name="kode_instansi">
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                            <div class=" card-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary btn-block mt-2 mr-2" onclick="location.href='<?= base_url('admin/admin_view') ?>'">Kembali</button>
                                <button type="button" class="btn btn-warning btn-block mr-2" onclick="confirmBatal()">Batal</button>
                                <button type="submit" class="btn btn-success btn-block">Tambah Admin</button>

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

<script>
    const togglePassword = document.querySelector('.show-password');
    const form = document.querySelector('#tambah-admin');
    const username = document.querySelector('#username');
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
                document.getElementById('form-admin').reset(); // reset form
            }
        })
    }
</script>
<script>
    const dropdownMenu = document.querySelector('.dropdown-menu');
    const searchInput = document.getElementById('id_search');
    const hiddenInput = document.getElementById('kode_instansi');

    searchInput.oninput = function() {
        const filter = searchInput.value.toLowerCase();
        const options = dropdownMenu.querySelectorAll('.dropdown-item');
        for (let i = 0; i < options.length; i++) {
            const optionText = options[i].text.toLowerCase();
            if (optionText.indexOf(filter) > -1) {
                options[i].style.display = "";
            } else {
                options[i].style.display = "none";
            }
        }
    };

    dropdownMenu.addEventListener('click', function(event) {
        event.preventDefault();
        const clickedOption = event.target;
        const value = clickedOption.dataset.value;
        const text = clickedOption.text;
        hiddenInput.value = value;
        searchInput.value = text;
    });
</script>