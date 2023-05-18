<title><?= $title ?></title>
<?php echo view('admin/template/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Instansi Dinas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard_view'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Instansi Dinas</li>
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
                            <h3 class="card-title">Instansi Dinas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Kode Instansi</th>
                                        <th>Nama Instansi</th>
                                        <th>Deskirpsi</th>
                                        <th>Foto Instansi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $session = \Config\Services::session();
                                    $level = $session->get('level');
                                    if ($level == 'super_admin') : ?>
                                        <?php
                                        foreach ($output as $row) :
                                        ?>
                                            <tr>
                                                <!-- pembuatan database harus isi field true false 1 0 untuk ngecek pertama kali ato engga -->

                                                <td><?= $row['kode_instansi']; ?></td>
                                                <td><?= $row['ket_ukerja']; ?></td>
                                                <td>
                                                    <?php
                                                    foreach ($deskripsiFoto as $rowDeskripsiFoto) :
                                                        if ($row['kode_instansi'] == $rowDeskripsiFoto['kode_instansi']) :
                                                            $ketentuan = explode("\n", $rowDeskripsiFoto['deskripsi']);

                                                    ?>

                                                            <?php foreach ($ketentuan as $kt) : ?>
                                                                - <?= trim($kt) ?><br>
                                                            <?php endforeach; ?>
                                                    <?php endif;
                                                    endforeach; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    foreach ($deskripsiFoto as $rowDeskripsiFoto) :
                                                        if ($row['kode_instansi'] == $rowDeskripsiFoto['kode_instansi']) :
                                                            if ($rowDeskripsiFoto['foto_instansi'] !== null) :
                                                    ?>
                                                                <img src="<?php echo base_url('images/' . $rowDeskripsiFoto['foto_instansi']); ?>" alt="Foto Instansi" width="200" height="150" data-image="<?php echo base_url('images/' . $rowDeskripsiFoto['foto_instansi']); ?>">

                                                    <?php endif;
                                                        endif;
                                                    endforeach; ?>
                                                </td>
                                                <td><a href="<?= base_url('admin/edit_instansi_dinas/' . $row['kode_instansi']) ?>" class="btn btn-admin btn-outline-warning float-top"><i class="fas fa-edit"></i></a>
                                                </td>



                                            </tr>
                                        <?php endforeach; ?>
                                        <?php elseif ($level == 'admin') :
                                        $adminKodeInstansi = $session->get('kode_instansi_dinas');
                                        foreach ($output as $row) :
                                            if ($row['kode_instansi'] == $adminKodeInstansi) :
                                        ?>
                                                <td><?= $row['kode_instansi']; ?></td>
                                                <td><?= $row['ket_ukerja']; ?></td>
                                                <td>
                                                    <?php
                                                    foreach ($deskripsiFoto as $rowDeskripsiFoto) :
                                                        if ($row['kode_instansi'] == $rowDeskripsiFoto['kode_instansi']) :
                                                            $ketentuan = explode("\n", $rowDeskripsiFoto['deskripsi']);

                                                    ?>

                                                            <?php foreach ($ketentuan as $kt) : ?>
                                                                - <?= trim($kt) ?><br>
                                                            <?php endforeach; ?>
                                                    <?php endif;
                                                    endforeach; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    foreach ($deskripsiFoto as $rowDeskripsiFoto) :
                                                        if ($row['kode_instansi'] == $rowDeskripsiFoto['kode_instansi']) :
                                                            if ($rowDeskripsiFoto['foto_instansi'] !== null) :
                                                    ?>
                                                                <img src="<?php echo base_url('images/' . $rowDeskripsiFoto['foto_instansi']); ?>" alt="Foto Instansi" width="200" height="150" data-image="<?php echo base_url('images/' . $rowDeskripsiFoto['foto_instansi']); ?>">

                                                    <?php endif;
                                                        endif;
                                                    endforeach; ?>
                                                </td>
                                                <td><a href="<?= base_url('admin/edit_instansi_dinas/' . $row['kode_instansi']) ?>" class="btn btn-admin btn-outline-warning float-top"><i class="fas fa-edit"></i></a>
                                                </td>
                                    <?php endif;
                                        endforeach;
                                    endif; ?>

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
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
</div>
<?php echo view('admin/template/footer'); ?>

<!-- style untuk field status -->
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding: 50px;
        left: 270px;
        top: 50px;
        width: 70%;
        height: 80%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .modal-content {
        margin: auto;
        display: flexbox;
        width: 100%;
        max-width: 1000px;
        max-height: 100%;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 20px;
        font-size: 35px;
        font-weight: bold;
        color: white;
    }

    .close:hover,
    .close:focus {
        color: #999;
        text-decoration: none;
        cursor: pointer;
    }
</style>

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
    var modal = document.getElementById("myModal");
    var img = document.querySelectorAll("img[data-image]");
    var modalImg = document.getElementById("img01");

    img.forEach(function(el) {
        el.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.dataset.image;
            modalImg.alt = this.alt;
        }
    });

    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        modal.style.display = "none";
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