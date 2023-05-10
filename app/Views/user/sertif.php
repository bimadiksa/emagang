<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/styles/core.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/styles/icon-font.min.css') ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/styles/style.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/sertif.css') ?>">
	<title>Sertifikat</title>
</head>

<body>
	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="assets/user.png" alt="">
						</span>
						<span class="user-name">Ni Luh Sukma</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- SIDE BAR  -->
	<div class="left-side-bar" style="background-color: #7227FE;">
		<div class="brand-logo">
			<a href="index.html">
				<p class="font-32 weight-700">E-MAGANG</p>
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="<?= base_url('/dashboard') ?>" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('/profile') ?>" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-user-o"></span><span class="mtext">Profile</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('/location') ?>" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-map-marker"></span><span class="mtext">Lokasi Magang</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('/absen') ?>" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-pencil-square-o"></span><span class="mtext">Absens</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('/jurnal') ?>" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-book"></span><span class="mtext">Jurnal Harian</span>
						</a>
					</li>
					<li>
						<a href="<?= base_url('/sertif') ?>" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-print"></span><span class="mtext">Sertifikat</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

	<!-- ISI KONTEN -->
	<div class="container">
		<h1>Sertifikat dan Nilai</h1>
		<div class="datamentor">
			<table class="table table-secondary table-sm bordered">
				<thead>
					<tr>
						<th scope="col">Nama Mentor</th>
						<th scope="col">Aat Rayudha, S.Kom</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td scope="col">No telp</td>
						<td>08174787973</td>
					</tr>
				</tbody>
			</table>
		</div>

		<h4>Akumulasi Nilai Magang</h4>
		<div class="nilai-magang">
			<div class="row">
				<div class="left col-sm-5 col-md-6">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Nilai Sikap</th>
								<th scope="col">Nilai Absen</th>
								<th scope="col">Nilai Project</th>
							</tr>
						</thead>
						<tbody class="table-group-divider">
							<tr>
								<td>80.00</td>
								<td>80.00</td>
								<td>80.00</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="rigth col-sm-5 offset-sm-2 col-md-6 offset-md-0">
					<p>Total Nilai</p>
					<h2>80.00</h2>
				</div>
			</div>
		</div>

		<div class="sertif">
			<div class="row">
				<div class="left col-sm-5 col-md-6">
					<p class="textunduh">Unduh Sertifikat Magang</p>
				</div>
				<div class=" rigth col-sm-5 offset-sm-2 col-md-6 offset-md-0">
					<a href=""><button class="tombolunduh"><i class="bi bi-download"></i> Unduh</button></a>
				</div>
			</div>
		</div>
	</div>

	<!-- js -->
	<script src="<?php echo base_url('assets/vendors/scripts/core.js') ?>"></script>
	<script src="<?php echo base_url('assets/vendors/scripts/script.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/vendors/scripts/process.js') ?>"></script>
	<script src="<?php echo base_url('assets/vendors/scripts/layout-settings.js') ?>"></script>
	<script src="<?php echo base_url('assets/src/plugins/apexcharts/apexcharts.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/src/plugins/datatables/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/src/plugins/datatables/js/dataTables.responsive.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/vendors/scripts/dashboard.js') ?>"></script>
</body>

</html>