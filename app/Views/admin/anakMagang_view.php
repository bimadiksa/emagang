<title><?= $title ?></title>
<?php echo view('admin/template/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Anak Magang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard_view'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Anak Magang</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card card-outline card-purple">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title">Data Anak Magang<?= session('showModal') ?></h3>
                            <!-- <a href="<?= base_url('admin/anakMagang_view') ?>" class="btn btn-primary ml-auto" style="background-color: #6f42c1; border-color: #6f42c1;">Tambah Admin</a> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Nama Anak Magang</th>
                                        <th>No ID</th>
                                        <th>Status</th>
                                        <th>Status Magang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $session = \Config\Services::session();
                                    $level = $session->get('level');
                                    if ($level == 'super_admin') : ?>
                                        <?php
                                        $id = 0;
                                        foreach ($anakMagang as $row) :
                                            $id++; ?>
                                            <tr>
                                                <td><?= $id ?></td>
                                                <td><?= $row['nama']; ?></td>
                                                <td><?= $row['no_id']; ?></td>
                                                <td><span class=" badge <?php echo $row['status'] == 'aktif' ? 'bg-success' : 'bg-danger'; ?>"><?= $row['status']; ?></span></td>
                                                <td><span class="badge <?= $row['status_magang'] == 'nonmagang' ? 'bg-secondary' : ($row['status_magang'] == 'magang' ? 'bg-success' : 'bg-danger'); ?>"><?= $row['status_magang']; ?></span></td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#modalDetail<?= $row['id_magang'] ?>"><i class="fas fa-info-circle"></i></a>
                                                    <a href="<?= base_url('admin/rubah_status_anak_magang/' . $row['id_magang']) ?>" class="btn btn-admin float-top-left <?php if ($row['status'] == 'aktif') echo 'btn-outline-secondary';
                                                                                                                                                                            else echo 'btn-outline-primary' ?>">
                                                        <i class="fa <?php if ($row['status'] == 'aktif') echo 'fa-ban';
                                                                        else echo 'fa-unlock' ?>"></i>
                                                    </a>
                                                    <a href="<?= base_url('admin/rubah_status_magang/' . $row['id_magang']) ?>" class="btn btn-admin float-top-left <?php if ($row['status_magang'] == 'nonmagang') echo 'btn-outline-secondary';
                                                                                                                                                                    elseif ($row['status_magang'] == 'magang') echo 'btn-outline-primary';
                                                                                                                                                                    elseif ($row['status_magang'] == 'tamat') echo 'btn-outline-danger'; ?>">
                                                        <i class="fa <?php if ($row['status_magang'] == 'nonmagang') echo 'fa-user-slash';
                                                                        elseif ($row['status_magang'] == 'magang') echo 'fa-user-check';
                                                                        elseif ($row['status_magang'] == 'tamat') echo 'fa-user-times'; ?>"></i>
                                                    </a>
                                                    <a href="<?= base_url('admin/kembalikan/' . $row['id_magang']) ?>" class="btn btn-admin float-top-left <?php if ($row['kode_instansi_dinas'] !== null) echo 'btn-outline-danger';
                                                                                                                                                            else echo 'btn-outline-secondary disabled'   ?>">
                                                        <i class="fa <?php if ($row['kode_instansi_dinas'] !== null) echo 'fa-arrow-left';
                                                                        else echo 'fa-times' ?>"></i>
                                                    </a>

                                                    <!-- <a href="<?= base_url('admin/edit_admin/' . $row['id_magang']) ?>" class="btn btn-admin btn-outline-warning float-top"><i class="fas fa-edit"></i></a> -->
                                                    <a href="<?= base_url('admin/hapus_anak_magang/' . $row['id_magang']) ?>" class="btn btn-admin btn-outline-danger float-top-right" onclick="event.preventDefault(); hapusAnakMagang('<?= $row['id_magang'] ?>');"><i class="fas fa-trash-alt"></i></a>


                                                </td>
                                            </tr>
                                            <!-- Modal detail instansi anak magang -->
                                            <div class="modal fade" id="modalDetail<?= $row['id_magang'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel<?= $row['id_magang'] ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalDetailLabel<?= $row['id_magang'] ?>">Detail Anak Magang</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Tampilkan detail instansi anak magang -->
                                                            <p><strong>Nama Lengkap:</strong>&nbsp;&nbsp;<?= $row['nama'] ?></p>
                                                            <p><strong>NIM/NISN:</strong>&nbsp;&nbsp;<?= $row['no_id'] ?></p>
                                                            <p><strong>No HP:</strong>&nbsp;&nbsp;<?= $row['no_hp'] ?></p>
                                                            <p><strong>Alamat:</strong>&nbsp;&nbsp;<?= $row['alamat'] ?></p>
                                                            <p><strong>Program Studi:</strong>&nbsp;&nbsp;<?= $row['nama_prodi'] ?></p>
                                                            <p><strong>Jurusan:</strong>&nbsp;&nbsp;<?= $row['nama_jurusan'] ?></p>
                                                            <p><strong>Instansi Asal:</strong>&nbsp;&nbsp;<?= $row['nama_instansi'] ?></p>
                                                            <?php
                                                            foreach ($output as $instansi) :
                                                                if ($row['kode_instansi_dinas'] !== null) :
                                                                    if ($instansi['kode_instansi'] == $row['kode_instansi_dinas']) : ?>
                                                                        <p><strong>Tempat Magang:</strong>&nbsp;<?= $instansi['ket_ukerja'] ?></p>
                                                            <?php endif;
                                                                endif;
                                                            endforeach; ?>




                                                            <!-- Tambahkan informasi detail instansi lainnya sesuai kebutuhan -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php elseif ($level == 'admin') :
                                        $adminKodeInstansi = $session->get('kode_instansi_dinas');
                                        $id = 0;
                                        foreach ($anakMagang as $row) :
                                            $id++;
                                            if ($row['kode_instansi_dinas'] == $adminKodeInstansi) : ?>
                                                <tr>
                                                    <td><?= $id ?></td>
                                                    <td><?= $row['nama']; ?></td>
                                                    <td><?= $row['no_id']; ?></td>
                                                    <td><span class=" badge <?php echo $row['status'] == 'aktif' ? 'bg-success' : 'bg-danger'; ?>"><?= $row['status']; ?></span></td>
                                                    <td><span class="badge <?= $row['status_magang'] == 'nonmagang' ? 'bg-secondary' : ($row['status_magang'] == 'magang' ? 'bg-success' : 'bg-danger'); ?>"><?= $row['status_magang']; ?></span></td>
                                                    <td>
                                                        <a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#modalDetail<?= $row['id_magang'] ?>"><i class="fas fa-info-circle"></i></a>
                                                        <a href="<?= base_url('admin/rubah_status_anak_magang/' . $row['id_magang']) ?>" class="btn btn-admin float-top-left <?php if ($row['status'] == 'aktif') echo 'btn-outline-secondary';
                                                                                                                                                                                else echo 'btn-outline-primary' ?>">
                                                            <i class="fa <?php if ($row['status'] == 'aktif') echo 'fa-ban';
                                                                            else echo 'fa-unlock' ?>"></i>
                                                        </a>
                                                        <a href="<?= base_url('admin/rubah_status_magang/' . $row['id_magang']) ?>" class="btn btn-admin float-top-left <?php if ($row['status_magang'] == 'nonmagang') echo 'btn-outline-secondary';
                                                                                                                                                                        elseif ($row['status_magang'] == 'magang') echo 'btn-outline-primary';
                                                                                                                                                                        elseif ($row['status_magang'] == 'tamat') echo 'btn-outline-danger'; ?>">
                                                            <i class="fa <?php if ($row['status_magang'] == 'nonmagang') echo 'fa-user-slash';
                                                                            elseif ($row['status_magang'] == 'magang') echo 'fa-user-check';
                                                                            elseif ($row['status_magang'] == 'tamat') echo 'fa-user-times'; ?>"></i>
                                                        </a>
                                                        <a href="<?= base_url('admin/kembalikan/' . $row['id_magang']) ?>" class="btn btn-admin float-top-left <?php if ($row['kode_instansi_dinas'] !== null) echo 'btn-outline-danger';
                                                                                                                                                                else echo 'btn-outline-secondary disabled'   ?>">
                                                            <i class="fa <?php if ($row['kode_instansi_dinas'] !== null) echo 'fa-arrow-left';
                                                                            else echo 'fa-times' ?>"></i>
                                                        </a>

                                                        <!-- <a href="<?= base_url('admin/edit_admin/' . $row['id_magang']) ?>" class="btn btn-admin btn-outline-warning float-top"><i class="fas fa-edit"></i></a> -->
                                                        <a href="<?= base_url('admin/hapus_anak_magang/' . $row['id_magang']) ?>" class="btn btn-admin btn-outline-danger float-top-right" onclick="event.preventDefault(); hapusAnakMagang('<?= $row['id_magang'] ?>');"><i class="fas fa-trash-alt"></i></a>


                                                    </td>
                                                </tr>
                                                <!-- Modal detail instansi anak magang -->
                                                <div class="modal fade" id="modalDetail<?= $row['id_magang'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel<?= $row['id_magang'] ?>" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalDetailLabel<?= $row['id_magang'] ?>">Detail Anak Magang</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Tampilkan detail instansi anak magang -->
                                                                <p><strong>Nama Lengkap:</strong>&nbsp;&nbsp;<?= $row['nama'] ?></p>
                                                                <p><strong>NIM/NISN:</strong>&nbsp;&nbsp;<?= $row['no_id'] ?></p>
                                                                <p><strong>No HP:</strong>&nbsp;&nbsp;<?= $row['no_hp'] ?></p>
                                                                <p><strong>Alamat:</strong>&nbsp;&nbsp;<?= $row['alamat'] ?></p>
                                                                <p><strong>Program Studi:</strong>&nbsp;&nbsp;<?= $row['nama_prodi'] ?></p>
                                                                <p><strong>Jurusan:</strong>&nbsp;&nbsp;<?= $row['nama_jurusan'] ?></p>
                                                                <p><strong>Instansi Asal:</strong>&nbsp;&nbsp;<?= $row['nama_instansi'] ?></p>
                                                                <?php
                                                                foreach ($output as $instansi) :
                                                                    if ($row['kode_instansi_dinas'] !== null) :
                                                                        if ($instansi['kode_instansi'] == $row['kode_instansi_dinas']) : ?>
                                                                            <p><strong>Tempat Magang:</strong>&nbsp;<?= $instansi['ket_ukerja'] ?></p>
                                                                <?php endif;
                                                                    endif;
                                                                endforeach; ?>




                                                                <!-- Tambahkan informasi detail instansi lainnya sesuai kebutuhan -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php endif;
                                        endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th>ID Admin</th>
                                        <th>Nama Admin</th>
                                        <th>Email Admin</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <?php echo view('admin/template/footer'); ?>
</div>
<!-- /.content-wrapper -->


<!-- style untuk field status -->
<style>
    /* .change-status {
        padding-bottom: 20px;
    } */
    .content {
        background-color: #EBE8F2;
    }

    .content-header {
        background-color: #EBE8F2;
    }

    .background-text {
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        display: inline-flex;
        text-align: center;
        vertical-align: middle;
    }

    .btn-admin {
        margin: 5px;
    }

    .modal-body p {
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
    }
</style>


<!-- Script untuk mengirim permintaan AJAX ke controller -->
<script>
    $(document).ready(function() {
        $('#modalDetail').click(function() {
            var url = $(this).data('url'); // Ambil URL dari atribut data-url
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                success: function(response) {
                    $('#modalContent').html(response); // Isi konten modal dengan response dari server
                    $('#myModal').modal('show'); // Tampilkan modal
                }
            });
        });
    });
</script>


<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<script>
    function hapusAnakMagang(id_magang) {
        Swal.fire({
            title: 'Apakah anda yakin menghapus data ini?',
            text: "Jika yakin tekan Ya.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            showConfirmButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo site_url('admin/hapus_anak_magang/'); ?>" + id_magang;

            }
        })
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
<?php endif; ?>

<?php if (session()->has('validation')) : ?>
    <style>
        /* CSS untuk mengatur warna teks menjadi putih */
        .swal-toast-custom-class {
            color: #FFF !important;
        }
    </style>
    <script>
        Toast = Swal.mixin({
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
<?php endif; ?>