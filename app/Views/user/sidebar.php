<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Dashboard</title>
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/jqvmap/jqvmap.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('adminlte/dist/css/adminlte.min.css') ?>">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/daterangepicker/daterangepicker.css') ?>">
	<!-- summernote -->
	<link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/summernote/summernote-bs4.min.css') ?>">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
	<!-- sweet alert -->
	<link rel="stylesheet" href="/plugins/sweetalert2/sweetalert2.min.css">
	<script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<link rel="stylesheet" type="text/css" href="<?= base_url('path/sweetalert2/sweetalert2.min.css') ?>">
	<script type="text/javascript" src="<?= base_url('path/sweetalert2/sweetalert2.all.min.js') ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
	<!-- Menghubungkan Font Awesome library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<!-- CSS DASBOARD KONTEN -->
	<link rel="stylesheet" href="<?php echo base_url('style/sidebar.css') ?>">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">


		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">


			<!-- Right navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>

			</ul>
			<ul class="navbar-nav ml-auto">


				<li class="nav-item">
					<div class="user-panel mt-1 mb-1 d-flex">

						<div class="image">
							<?php if (session('foto') === null) : ?>
								<span class="user-icon">
									<img src="<?php echo base_url('assets/user.png') ?>" alt="">
								</span>
							<?php else : ?>
								<span class="user-icon">
									<div class="rounded-image-mask">
										<img src="<?php echo base_url('foto_magang/' . session('foto')); ?>" id="profile-picture-img" alt="Profile Picture">
									</div>
								</span>
							<?php endif; ?>
						</div>
						<div class="info">
							<a href="#" class="d-block" style="color: black;"><?= session('nama') ?></a>
						</div>
					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar elevation-4" style="background-color: #7227fe;">
			<!-- Brand Logo -->
			<a href="<?php echo base_url('index3.html') ?>" class="brand-link">
				<img src="<?php echo base_url('assets/logoputih.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-bold">E-MAGANG</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?php echo base_url('assets/user.png') ?>" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="<?php echo base_url('#') ?>" class="d-block">Alexander Pierce</a>
					</div>
				</div>


				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
						<li class="nav-item">
							<a href="<?php echo base_url('#') ?>" class="nav-link active">
								<i class="nav-icon fas fa-home"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('pages/widgets.html') ?>" class="nav-link">
								<i class="nav-icon fas fa-user"></i>
								<p>
									Profile
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('pages/widgets.html') ?>" class="nav-link">
								<i class="nav-icon fas fa-map-pin"></i>
								<p>
									Lokasi Magang
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('pages/widgets.html') ?>" class="nav-link">
								<i class="nav-icon fas fa-clipboard-check"></i>
								<p>
									Absen
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('pages/widgets.html') ?>" class="nav-link">
								<i class="nav-icon fas fa-book"></i>
								<p>
									Jurnal Harian
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('pages/widgets.html') ?>" class="nav-link">
								<i class="nav-icon fas fa-star"></i>


								<p>
									Sertifikat
								</p>
							</a>
						</li>

					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">


			<!-- Main content -->
			<div class="main-container">

				<div class="column">
					<div class="row">
						<h4 class="font-30 weight-700 mb-10 text-capitalize">
							Selamat Datang
						</h4>
						<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
						<div class="font-30 weight-700 mb-10 text-capitalize"><?= session('nama') ?></div>
					</div>
					<?php
					$session = \Config\Services::session();
					$kode_instansi_dinas = $session->get('kode_instansi_dinas');
					if ($kode_instansi_dinas == null) : ?>
						<p>Silahkan pilih tempat magang terlebih dahulu, silahkan klik tombol dibawah atau menuju menu samping!</p>
						<button type="button" class="btn btn-primary" onclick="location.href='<?= base_url('user/location') ?>'">Pilih Tempat Magang</button>
					<?php endif; ?>
				</div>
			</div>

			<div class="flex-container">
				<div class="left-content">
					<!-- Card button -->
					<div class="button-container">
						<div class="button" <?php
											$session = \Config\Services::session();
											$kode_instansi_dinas = $session->get('kode_instansi_dinas');
											if ($kode_instansi_dinas !== null) {
												$url = base_url('user/kartu/' . session('id_magang'));
											} else {
												$url = "";
											}
											?> onclick="location.href='<?= $url ?>'">
							<h2>Kartu Identitas</h2>
							<img src="<?php echo base_url('assets/cetak_kartu.png') ?>" alt="Gambar 1">
						</div>
						<div class="button" <?php
											$session = \Config\Services::session();
											$kode_instansi_dinas = $session->get('kode_instansi_dinas');
											if ($kode_instansi_dinas !== null) {
												$url = base_url('user/profile_magang/' . session('id_magang'));
											} else {
												$url = "";
											}
											?> onclick="location.href='<?= $url ?>'">
							<h2>Perbarui Profile</h2>
							<img src="<?php echo base_url('assets/edit profile.png') ?>" alt="Gambar 2">
						</div>
						<div class="button" <?php
											$session = \Config\Services::session();
											$kode_instansi_dinas = $session->get('kode_instansi_dinas');
											if ($kode_instansi_dinas !== null) {
												$url = base_url('user/absen');
											} else {
												$url = "";
											}
											?> onclick="location.href='<?= $url ?>'">
							<h2>Absensi </h2>
							<img src="<?php echo base_url('assets/absent.png') ?>" alt="Gambar 3">
						</div>
						<div class="button" <?php
											$session = \Config\Services::session();
											$kode_instansi_dinas = $session->get('kode_instansi_dinas');
											if ($kode_instansi_dinas !== null) {
												$url = base_url('user/jurnal_harian');
											} else {
												$url = "";
											}
											?> onclick="location.href='<?= $url ?>'">
							<h2>Jurnal Harian</h2>
							<img src="<?php echo base_url('assets/jurnal.png') ?>" alt="Gambar 3">
						</div>
					</div>
				</div>
				<div class="right-content">
					<div class="petaoke">
						<!-- Card lokasi -->
						<div class="Peta">
							<div class="row">
								<div class="judul col-9">
									<h3>Lokasi Tempat Anda Magang </h3>
								</div>
								<div class="map col-5">
									<!-- masukkan kode untuk menampilkan peta di sini -->
								</div>
								<div class="details col-5">
									<p>Deskripsi singkat tentang lokasi</p>
									<a href="#" class="btn">Lihat Detail</a>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>



			<!-- NYOBA NYOBA -->
			<div class="card-box display-flex mb-30">
				<h2 class="h4 pd-50 text-header">Rekan Magang Anda</h2>
				<table class="data-table table nowrap">
					<thead>
						<tr>
							<th class="table-plus datatable-nosort">foto</th>
							<th>Nama</th>
							<th>Jurusan</th>
							<th>Asal Instansi</th>
							<th>No Telp</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$id = 0;
						$userKodeInstansi = $session->get('kode_instansi_dinas');
						foreach ($anakMagang as $row) :
							if ($row['kode_instansi_dinas'] == $userKodeInstansi) :
								$id++; ?>
								<tr>
									<td><?= $id ?></td>
									<td><?= $row['nama']; ?></td>
									<td><?= $row['nama_jurusan']; ?></td>
									<td><?= $row['nama_instansi']; ?></td>
									<td><?= $row['no_hp']; ?></td>

								</tr>
						<?php endif;
						endforeach; ?>
					</tbody>
					<!-- <tbody>
			<tr>
				<td class="table-plus">
					<img src="<?php echo base_url('assets/user.png') ?>" width="50" height="50" alt="">
				</td>
				<td>John Doe
				</td>
				<td>Black</td>
				<td>0018209</td>
			</tr>
			<tr>
				<td class="table-plus">
					<img src="<?php echo base_url('assets/user.png') ?>" width="50" height="50" alt="">
				</td>
				<td>Lea R. Frith
				</td>
				<td>brown</td>
				<td>901829</td>
			</tr>
			<tr>
				<td class="table-plus">
					<img src="<?php echo base_url('assets/user.png') ?>" width="50" height="50" alt="">
				</td>
				<td>Erik L. Richards
				</td>
				<td>Orange</td>
				<td>109209</td>
				</td>
			</tr>
			<tr>
				<td class="table-plus">
					<img src="<?php echo base_url('assets/user.png') ?>" width="50" height="50" alt="">
				</td>
				<td>Renee I. Hansen
				</td>
				<td>Gray</td>
				<td>082010-</td>
			</tr>
		</tbody> -->
				</table>
			</div>

			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<strong>Copyright &copy; 2014-2021 <a href="<?php echo base_url('https://adminlte.io') ?>">AdminLTE.io</a>.</strong>
			All rights reserved.
			<div class="float-right d-none d-sm-inline-block">
				<b>Version</b> 3.2.0
			</div>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<!-- jQuery -->
	<script src="<?php echo base_url('adminlte/plugins/jquery/jquery.min.js') ?>"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url('adminlte/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<!-- ChartJS -->
	<script src="<?php echo base_url('adminlte/plugins/chart.js/Chart.min.js') ?>"></script>
	<!-- Sparkline -->
	<script src="<?php echo base_url('adminlte/plugins/sparklines/sparkline.js') ?>"></script>
	<!-- JQVMap -->
	<script src="<?php echo base_url('adminlte/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
	<script src="<?php echo base_url('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?php echo base_url('adminlte/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
	<!-- daterangepicker -->
	<script src="<?php echo base_url('adminlte/plugins/moment/moment.min.js') ?>"></script>
	<script src="<?php echo base_url('adminlte/plugins/daterangepicker/daterangepicker.js') ?>"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="<?php echo base_url('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
	<!-- Summernote -->
	<script src="<?php echo base_url('adminlte/plugins/summernote/summernote-bs4.min.js') ?>"></script>
	<!-- overlayScrollbars -->
	<script src="<?php echo base_url('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
	<!-- DataTables  & Plugins -->
	<script src="<?php echo base_url('adminlte/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
	<script src="<?php echo base_url('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
	<script src="<?php echo base_url('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
	<script src="<?php echo base_url('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
	<script src="<?php echo base_url('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
	<script src="<?php echo base_url('adminlte/plugins/jszip/jszip.min.js') ?>"></script>
	<script src="<?php echo base_url('adminlte/plugins/pdfmake/pdfmake.min.js') ?>"></script>
	<script src="<?php echo base_url('adminlte/plugins/pdfmake/vfs_fonts.js') ?>"></script>
	<script src="<?php echo base_url('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
	<script src="<?php echo base_url('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
	<script src="<?php echo base_url('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('adminlte/dist/js/adminlte.js') ?>"></script>
	<!-- AdminLTE for demo purposes -->
	<!-- <script src="<?php echo base_url('adminlte/dist/js/demo.js') ?>"></script> -->
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="<?php echo base_url('adminlte/dist/js/pages/dashboard.js') ?>"></script>
	<!-- sweet alert -->
	<script src="sweetalert2.all.min.js"></script>
</body>

</html>