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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/jurnal.css') ?>">
	<title>Jurnal</title>

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


	<!-- ISI KONTEN -->
	<div class="container">
		<h1>Tabel Jurnal Harian</h1>
		<button class="tambah"><i class="bi bi-plus-circle"></i> Tambah Jurnal</button>
	</div>

	<div class="tabeljurnal">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Hari Tanggal</th>
					<th>Isi Jurnal</th>
					<th>Dokumentasi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>

	<div class="popup">
		<div class="popup-content">
			<span class="close">&times;</span>
			<h2>Silahkan Isi Jurnal</h2>
			<form>
				<label for="hari-tanggal">Hari Tanggal:</label>
				<input type="date" id="hari-tanggal" name="hari-tanggal">
				<label for="isi-jurnal">Isi Jurnal:</label>
				<textarea id="isi-jurnal" name="isi-jurnal"></textarea>
				<label for="dokumentasi" class="file-upload">Dokumentasi :</label>
				<input type="file" id="dokumentasi" name="dokumentasi">
				<img id="preview-image" src="#" alt="Preview Gambar" style="display:none; max-width:200px;">
				<button type="submit" class="simpan">Simpan</button>
			</form>
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

	<!-- POP UP FORM -->
	<script>
		const tambahJurnalButton = document.querySelector('.tambah');
		const popup = document.querySelector('.popup');
		const popupContent = document.querySelector('.popup-content');
		const closePopupButton = document.querySelector('.close');
		const tableBody = document.querySelector('tbody');
		const form = popupContent.querySelector('form');
		let nomorJurnal = 0;

		tambahJurnalButton.addEventListener('click', function() {
			popup.style.display = 'block';
		});

		closePopupButton.addEventListener('click', function() {
			popup.style.display = 'none';
		});

		form.addEventListener('submit', function(event) {
			event.preventDefault();
			const hariTanggal = form.elements['hari-tanggal'].value;
			const isiJurnal = form.elements['isi-jurnal'].value;
			const dokumentasi = form.elements['dokumentasi'].files[0];

			const row = document.createElement('tr');
			const nomorCell = document.createElement('td');
			nomorJurnal += 1;
			nomorCell.textContent = nomorJurnal.toString();

			const hariTanggalCell = document.createElement('td');
			hariTanggalCell.textContent = hariTanggal;

			const isiJurnalCell = document.createElement('td');
			isiJurnalCell.textContent = isiJurnal;

			const dokumentasiCell = document.createElement('td');
			const dokumentasiImg = document.createElement('img');
			dokumentasiImg.setAttribute('src', URL.createObjectURL(dokumentasi));
			dokumentasiImg.setAttribute('alt', dokumentasi.name);
			dokumentasiCell.appendChild(dokumentasiImg);

			const aksiCell = document.createElement('td');
			const editButton = document.createElement('button');
			editButton.textContent = 'Edit';
			editButton.addEventListener('click', function() {
				const editPopup = document.querySelector('.popup-edit');
				const editForm = editPopup.querySelector('form');
				editPopup.style.display = 'block';
				editForm.elements['edit-hari-tanggal'].value = hariTanggalCell.textContent;
				editForm.elements['edit-isi-jurnal'].value = isiJurnalCell.textContent;
				editForm.elements['edit-dokumentasi'].src = popupImg.src;
				editForm.addEventListener('submit', function(editEvent) {
					editEvent.preventDefault();
					hariTanggalCell.textContent = editForm.elements['edit-hari-tanggal'].value;
					isiJurnalCell.textContent = editForm.elements['edit-isi-jurnal'].value;
					popupImg.src = editForm.elements['edit-dokumentasi'].src;
					editPopup.style.display = 'none';
				});

				aksiCell.appendChild(editButton);
			});
			const deleteButton = document.createElement('button');
			deleteButton.textContent = 'Delete';
			deleteButton.addEventListener('click', function() {
				row.remove();
			});
			aksiCell.appendChild(editButton);
			aksiCell.appendChild(deleteButton);

			row.appendChild(nomorCell);
			row.appendChild(hariTanggalCell);
			row.appendChild(isiJurnalCell);
			row.appendChild(dokumentasiCell);
			row.appendChild(aksiCell);

			tableBody.appendChild(row);

			popup.style.display = 'none';
			form.reset();
		});
	</script>

</body>

</html>