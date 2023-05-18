<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Kartu Nama</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/styles/core.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/styles/icon-font.min.css') ?>">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/styles/style.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/kartu.css') ?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
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
		<h5>Silahkan cetak kartu identitas magang di bawah ini</h5><br>
	</div>
	<div class="card">
		<h2>Kartu Identitas</h2>
		<img src="<?php echo base_url('assets/woman-avatar.jpg') ?>" alt="Foto Profil">
		<p>Nama : John Doe</p>
		<p>No. Identitas : 123456</p>
		<p>Jurusan : Teknik Informatika</p>
		<p>sebagai : Perserta Magang</p>
	</div>
	<div class="download">
		<a href="#" onclick="saveAsImage()">Download JPG</a>
	</div>



	<!-- Include the jsPDF and html2canvas libraries -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
	<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

	<script>
		function saveAsImage() {
			// Get the card element
			var element = document.querySelector('.card');

			// Convert the HTML element to a canvas using html2canvas
			html2canvas(element).then(function(canvas) {
				// Convert the canvas to an image using toDataURL
				var image = canvas.toDataURL('image/jpeg');

				// Create a new link element
				var link = document.createElement('a');

				// Set the link href attribute to the data URL of the canvas image
				link.href = image;

				// Set the link download attribute to the desired filename
				link.download = 'Kartu Identitas.jpg';

				// Trigger a click event on the link element to initiate the download
				link.click();
			});
		}
	</script>
	<script src="<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js') ?>"></script>
	<script src="<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js') ?>"></script>
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