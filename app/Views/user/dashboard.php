<title><?= $title ?></title>
<?php echo view('user/template/header'); ?>


<div class="content-wrapper">

	<div class="flex-container">
		<div class="column">
			<div class="row">
				<h2 class="font-30 weight-700 text-capitalize">
					Selamat Datang
				</h2>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<h2 class="font-30 weight-700 text-capitalize"><?= session('nama') ?></h2>
			</div>
			<?php
			$session = \Config\Services::session();
			$kode_instansi_dinas = $session->get('kode_instansi_dinas');
			if ($kode_instansi_dinas == null) : ?>
				<p>Silahkan pilih tempat magang terlebih dahulu, silahkan klik tombol dibawah atau menuju menu samping!</p>
				<button type="button" class="btn btn-primary" onclick="location.href='<?= base_url('user/location') ?>'">Pilih Tempat Magang</button>
			<?php endif; ?>
		</div>
		<div class="left-content">
			<!-- Card button -->
			<div class="button-container">
				<div class="buttondas" <?php
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
				<div class="buttondas" <?php
										$session = \Config\Services::session();
										$kode_instansi_dinas = $session->get('kode_instansi_dinas');
										if ($kode_instansi_dinas !== null) {
											$url = base_url('user/profil_magang/' . session('id_magang'));
										} else {
											$url = "";
										}
										?> onclick="location.href='<?= $url ?>'">
					<h2>Perbarui Profile</h2>
					<img src="<?php echo base_url('assets/edit profile.png') ?>" alt="Gambar 2">
				</div>
				<div class="buttondas" <?php
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
				<div class="buttondas" <?php
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
				<div class="Peta">
					<div class="row">
						<div class="judul col-9">
							<h5>Tempat Anda Magang </h5>
						</div>
						<?php
						$session = \Config\Services::session();
						$kode_instansi_dinas = $session->get('kode_instansi_dinas');
						if ($kode_instansi_dinas !== null) : ?>
							<div class="map col-7 ml-2">
								<?php if (!empty($tabel['foto_instansi'])) : ?>
									<img src="<?php echo base_url('images/' . $tabel['foto_instansi']) ?>" class="card-img-top" alt="gambar">
								<?php else : ?>
									<img src="<?php echo base_url('assets/location.jpg') ?>" class="card-img-top" alt="gambar">
								<?php endif; ?>

							</div>
							<div class="details col-3">
								<div class="card-body">
									<?php if (!empty($tabel['foto_instansi'])) : ?>
										<h5 class="card-title"><?= $nama_instansi ?></h5>
										<h5 class="card-title"><?= $alamat_instansi ?></h5>
										<h5 class="card-title"><?= $email_instansi ?></h5>
									<?php else : ?>
									<?php endif; ?>
								</div>

								<a href="<?= base_url('user/detail/' . session('kode_instansi_dinas')) ?>" class="btn">Lihat Detail</a>


							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>


		<div class="card-box display-flex mb-30" style="background-color: #FFF; border-radius: 7px;">
			<div class="card-body">
				<h2 class="h4 pd-50 mb-10 text-header">Rekan Magang Anda</h2>
				<span></span>
				<div class="table-responsive">
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
							if ($userKodeInstansi !== null) :
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
								endforeach;
							endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>

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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>

<!-- footer -->
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
			timer: 4000,
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