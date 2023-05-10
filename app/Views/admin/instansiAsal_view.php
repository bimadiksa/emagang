<title><?= $title ?></title>
<?php echo view('admin/template/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Instansi Anak Magang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard_view'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Instansi Anak Magang</li>
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
                            <h3 class="card-title">Data Instansi Anak Magang</h3>
                            <a href="<?= base_url('admin/tambah_instansi') ?>" class="btn btn-primary ml-auto" style="background-color: #6f42c1; border-color: #6f42c1;">Tambah Instansi Anak Magang</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">No</th>
                                        <th>Nama Instansi</th>
                                        <th width="200px">Alamat Instansi</th>
                                        <th>Jenis Instansi</th>
                                        <th width="150px">Jurusan</th>
                                        <th width="150px">Prodi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 0;
                                    foreach ($instansi as $row) :
                                        $id++; ?>
                                        <tr>
                                            <td><?= $id ?></td>
                                            <td><?= $row['nama_instansi']; ?></td>
                                            <td><?= $row['alamat_instansi']; ?></td>
                                            <td><?= $row['jenis_instansi']; ?></td>
                                            <td><?= $row['nama_jurusan']; ?></td>
                                            <td><?= $row['nama_prodi']; ?></td>
                                            <td>
                                                <!-- <a href="<?= base_url('admin/editInstansi/' . $row['id_prodi']) ?>" class="btn btn-instansi btn-warning float-left"><i class="fas fa-edit"></i></a> -->
                                                <!-- button delete -->
                                                <form action="<?= base_url('admin/hapusInstansi/' . $row['id_prodi']) ?>" method="post" style="display: inline-block;">
                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-instansi btn-danger float-right" onclick="event.preventDefault(); hapusInstansi();"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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
</div>
<!-- /.content-wrapper -->
<?php echo view('admin/template/footer'); ?>

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

    .btn-instansi {
        margin: 5px;
    }
</style>


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

<script>
    function hapusInstansi($id_prodi) {
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
                window.location.href = "<?php echo site_url('admin/hapusInstansi/' . $row['id_prodi']); ?>";
            }
        })
    }
</script>