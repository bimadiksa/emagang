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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/absen.css') ?>">
	<title>Absen</title>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
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

	<div class="container">
		<h1>Absensi Magang</h1>
		<p>Silahkan lakukan absensi scan wajah pada aplikasi E-MAGANG dan upload surat ijin pada bagian yang tesedia.</p>
	</div>
	<div>
		<table class="absensi">
			<thead>
				<tr>
					<th>No.</th>
					<th>Hari/Tanggal</th>
					<th>Check In</th>
					<th>Check Out</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Senin, 3 Mei 2023</td>
					<td>08:00</td>
					<td>17:00</td>
					<td><input type="file" name="surat_ijin[]" accept="application/pdf,image/*"></td>
				</tr>
				<tr>
					<td>2</td>
					<td>Selasa, 4 Mei 2023</td>
					<td>08:15</td>
					<td>16:45</td>
					<td><input type="file" name="surat_ijin[]" accept="application/pdf,image/*"></td>
				</tr>
				<!-- tambahkan baris sesuai kebutuhan -->
			</tbody>
		</table>

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