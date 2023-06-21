<title><?= $title ?></title>
<?php echo view('admin/template/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rekap Jurnal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('/admin/dashboard_view'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Rekap Jurnal</li>
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
                            <h3 class="card-title">Rekap Jurnal <?= session('kode_instansi_dinas)') ?></h3>
                            <div class="form-group ml-auto">
                                <form action="" method="GET">
                                    <label for="bulan">Pilih Bulan:</label>
                                    <select name="bulan" id="bulan">
                                        <option value="">Semua Bulan</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">Novembber</option>
                                        <option value="12">Desember</option>
                                        <!-- Tambahkan opsi bulan lainnya sesuai kebutuhan -->
                                    </select>
                                    <button type="submit">Cari</button>
                                </form>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: auto">No</th>
                                        <th style="width: auto">Hari Tanggal</th>
                                        <th style="width: auto">Judul</th>
                                        <th style="width: auto">Isi jurnal</th>
                                        <th style="width: auto">Dokumentasi</th>
                                        <th style="width: auto">Nama</th>
                                        <th style="width: auto">Instansi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (session('level') == 'super_admin') : ?>
                                        <?php
                                        usort($jurnal, function ($a, $b) {
                                            return strtotime($a['created_at']) - strtotime($b['created_at']);
                                        });
                                        $id = 0;
                                        if (isset($_GET['bulan'])) {
                                            $selectedMonth = $_GET['bulan'];
                                        } else {
                                            // Jika $_GET['bulan'] belum ada, Anda dapat menetapkan nilai default atau menangani kasus ini sesuai kebutuhan Anda.
                                            $selectedMonth = ''; // Misalnya, di sini kami menetapkan nilai default menjadi string kosong.
                                        }
                                        foreach ($jurnal as $row) :
                                            $rowMonth = date('m', strtotime($row['tanggal_logbook']));
                                            if ($selectedMonth === '' || $rowMonth == $selectedMonth) :
                                                $id++; ?>
                                                <tr>
                                                    <td><?= $id ?></td>

                                                    <td><?= $row['tanggal_logbook'] ?></td>
                                                    <td><?= $row['judul'] ?></td>
                                                    <td><?= $row['deskripsi'] ?></td>

                                                    <td>
                                                        <img src="<?php echo base_url('jurnal/' . $row['foto']); ?>" alt="Foto" data-image="<?php echo base_url('jurnal/' . $row['foto']); ?>" style=" width: 100px; height: 50px;">
                                                    </td>
                                                    <?php foreach ($anakMagang as $magang) :
                                                        if ($row['id_magang'] == $magang['id_magang']) : ?>
                                                            <td><?= $magang['nama'] ?></td>
                                                            <?php foreach ($instansi as $instansis) :
                                                                if ($instansis['kode_ukerja'] == $magang['kode_instansi_dinas']) : ?>
                                                                    <td><?= $instansis['ket_ukerja'] ?></td>
                                                            <?php endif;
                                                            endforeach; ?>
                                                    <?php endif;
                                                    endforeach; ?>

                                                </tr>
                                        <?php endif;
                                        endforeach; ?>
                                    <?php else : ?>
                                        <?php
                                        usort($jurnal, function ($a, $b) {
                                            return strtotime($a['created_at']) - strtotime($b['created_at']);
                                        });
                                        $id = 0;
                                        foreach ($anakMagang as $magang) {
                                        }
                                        foreach ($instansi as $instansis) {
                                        }
                                        if (isset($_GET['bulan'])) {
                                            $selectedMonth = $_GET['bulan'];
                                        } else {
                                            // Jika $_GET['bulan'] belum ada, Anda dapat menetapkan nilai default atau menangani kasus ini sesuai kebutuhan Anda.
                                            $selectedMonth = ''; // Misalnya, di sini kami menetapkan nilai default menjadi string kosong.
                                        }

                                        foreach ($jurnal as $row) :
                                            $rowMonth = date('m', strtotime($row['tanggal_logbook']));

                                            if (session('kode_instansi_dinas') == $row['kode_instansi_dinas']) :
                                                if ($selectedMonth === '' || $rowMonth == $selectedMonth) :
                                                    $id++; ?>
                                                    <tr>
                                                        <td><?= $id ?></td>
                                                        <td><?= $row['tanggal_logbook'] ?></td>
                                                        <td><?= $row['judul'] ?></td>
                                                        <td><?= $row['deskripsi'] ?></td>
                                                        <td>
                                                            <img src="<?php echo base_url('jurnal/' . $row['foto']); ?>" alt="Foto" data-image="<?php echo base_url('jurnal/' . $row['foto']); ?>" style=" width: 100px; height: 50px;">
                                                        </td>
                                                        <?php foreach ($anakMagang as $magang) :
                                                            if ($row['id_magang'] == $magang['id_magang']) : ?>
                                                                <td><?= $magang['nama'] ?></td>
                                                        <?php endif;
                                                        endforeach;
                                                        ?>
                                                        <?php foreach ($instansi as $instansis) :
                                                            if ($instansis['kode_ukerja'] == $magang['kode_instansi_dinas']) : ?>
                                                                <td><?= $instansis['ket_ukerja'] ?></td>
                                                        <?php endif;
                                                        endforeach; ?>
                                                    </tr>
                                        <?php endif;
                                            endif;
                                        endforeach;
                                        // endif;

                                        ?>
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
    <div id="myModal" class="modal">
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>
        <img class="modal-content" id="img01">
    </div>
    <?php echo view('admin/template/footer'); ?>
</div>

<!-- /.content-wrapper -->


<style>
    .modal-header {
        background-color: #EBE8F2;
    }

    .modal {
        display: none;
        position: fixed;
        /* z-index: 1; */
        left: 20%;
        top: 5%;
        width: 800px;
        height: 800px;
        overflow: auto;
        /* background-color: rgba(0, 0, 0, 0.5); */
    }

    .modal-content {
        display: block;
        margin: auto;
        max-width: 100%;
        max-height: 100%;
    }
</style>
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
            "buttons": ["pdf", "colvis"]
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