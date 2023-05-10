<title><?= $title ?></title>
<?php echo view('admin/template/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Akun Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Edit Admin</a></li>
                        <li class="breadcrumb-item active">Edit Akun Admin</li>
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
                            <h3 class="card-title">Masukkan email dan password admin. <small>password menggunakan NIP</small></h3>
                        </div>
                        <!-- /.card-header -->
                        <?php if (isset($validation)) : ?>
                            <div class="alert alert-warning">
                                <?= $validation->listErrors() ?>
                            </div>
                        <?php endif; ?>
                        <!-- form start -->
                        <form action="<?php echo base_url('admin/edit_admin/' . $admin['id_admin']); ?>" method="post" id="quickForm">
                            <?= csrf_field() ?>
                            <div class="card-body">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    <input type="username" name="username" class="form-control" id="username" value="<?= $admins['username'] ?>" placeholder="Masukkan Nama Lengkap">
                                    <?php if ($validation != null && $validation->hasError('username')) : ?>
                                        <div class="alert alert-danger"><?= $validation->getError('username') ?></div>
                                    <?php endif ?>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-block">Edit Admin</button>
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