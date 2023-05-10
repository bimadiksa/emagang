<title><?= $title ?></title>
<?php echo view('admin/template/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard_view'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Admin</li>
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
                            <h3 class="card-title">Data Admin <?= session('kode_instansi_dinas)') ?></h3>
                            <a href="<?= base_url('admin/tambahAdmin_view') ?>" class="btn btn-primary ml-auto" style="background-color: #6f42c1; border-color: #6f42c1;">Tambah Admin</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">No</th>
                                        <th>Nama Admin</th>
                                        <th>Email Admin</th>
                                        <th>Instansi Dinas</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id = 0;
                                    foreach ($admins as $admin) :
                                        $id++;
                                        $kode_instansi = $admin['kode_instansi_dinas']; ?>
                                        <tr>
                                            <td><?= $id ?></td>
                                            <td><?= $admin['username']; ?></td>
                                            <td><?= $admin['email']; ?></td>
                                            <td><?php foreach ($output as $instansi) {
                                                    if ($instansi['kode_instansi'] == $kode_instansi) {
                                                        echo $instansi['ket_ukerja'];
                                                        break;
                                                    }
                                                } ?></td>
                                            <td><span class=" background-text <?php echo $admin['status'] == 'aktif' ? 'bg-success' : 'bg-danger'; ?>"><?= $admin['status']; ?></span></td>
                                            <td><a href="<?= base_url('admin/rubah_status/' . $admin['id_admin']) ?>" class="btn btn-admin float-top-left <?php if ($admin['status'] == 'aktif') echo 'btn-outline-secondary';
                                                                                                                                                            else echo 'btn-outline-primary' ?>">
                                                    <i class="fa <?php if ($admin['status'] == 'aktif') echo 'fa-ban';
                                                                    else echo 'fa-unlock' ?>"></i>
                                                </a>

                                                <a href="<?= base_url('admin/edit_admin/' . $admin['id_admin']) ?>" class="btn btn-admin btn-outline-warning float-top"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('admin/hapus/' . $admin['id_admin']) ?>" class="btn btn-admin btn-outline-danger float-top-right" onclick="event.preventDefault(); hapusAdmin('<?= $admin['id_admin'] ?>');"><i class="fas fa-trash-alt"></i></a>

                                                <!-- button delete -->
                                                <!-- <form action="<?= base_url('admin/hapus/' . $admin['id_admin']) ?>" method="post" style="display: inline-block;">

                                                    <?= csrf_field() ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-admin btn-outline-danger float-top-right" onclick="event.preventDefault(); hapusAdmin();"><i class="fas fa-trash-alt"></i></button>
                                                </form> -->



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

    .btn-admin {
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

<script>
    function hapusAdmin(id_admin) {
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
                window.location.href = "<?php echo site_url('admin/hapus/'); ?>" + id_admin;
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