<title><?= $title ?></title>
<?php echo view('user/template/header'); ?>

<div class="content-wrapper">
	<div class="isiprofile">
		<div class="row">
			<div class="col-md-4 bg-light">
				<?php foreach ($anakMagang as $row) {
				}
				?>
				<div class="profileoke">
					<?php if ($row['foto'] === null) : ?>
						<img src="<?php echo base_url('assets/user.png') ?>" id="profile-picture-img" alt="Profile Picture">
					<?php else : ?>
						<img src="<?php echo base_url('foto_magang/' . $row['foto']); ?>" id="profile-picture-img" alt="Profile Picture" data-image="<?php echo base_url('foto_magang/' . $row['foto']); ?>">
					<?php endif; ?>
				</div>
				<div class="gantifotopro">
					<button class="btn btn-outline-light" id="edit-profile-picture" onclick="editModal('<?= session('id_magang') ?>');">Ubah Foto Profile</button>
				</div>
				<div class="deskripsipro">
					<p>Silahkan unggah foto profile anda untuk melengkapi data diri anda</p>
				</div>
			</div>
			<!-- pop up untuk upload foto -->
			<div class="modal fade" id="editModalJurnal<?= session('id_magang') ?>" tabindex="-1" role="dialog" aria-labelledby="editModalJurnalLabel<?= session('id_magang') ?>" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="editModalJurnalLabel<?= session('id_magang') ?>"><strong>Ubah Foto Profile</strong></h5>

						</div>
						<div class="modal-body">
							<?php if (isset($errors)) : ?>
								<div class="alert alert-danger">
									<?php foreach ($errors as $error) : ?>
										<p><?= esc($error) ?></p>
									<?php endforeach ?>
								</div>
							<?php endif ?>
							<form action="<?= base_url('user/edit_foto_magang/' . session('id_magang')) ?>" method="post" enctype="multipart/form-data">
								<?= csrf_field() ?>
								<div class="form-group">
									<label for="foto_magang">Pilih Foto Anda</label>
									<div class="input-group mb-3">
										<div class="custom-file">
											<input type="file" name="foto_magang" id="foto_magang" class="custom-file-input <?= session('errors.foto_magang') ? 'is-invalid' : '' ?>">
											<label class="custom-file-label" for="foto_magang">Pilih foto</label>
										</div>
										<?php if (session('errors.foto_magang')) : ?>
											<div class="invalid-feedback"><?= session('errors.foto_magang') ?></div>
										<?php endif ?>
									</div>
									<div class="tombol" style="padding-top: 20px;">
										<button type="submit" class="btn btn-primary w-100">Simpan</button>
									</div>
								</div>


							</form>
						</div>


					</div>
				</div>

			</div>
			<!-- Akhir Pop Up -->
			<?php foreach ($anakMagang as $row) {
			}
			?>
			<?php foreach ($instansiAsal as $rowInstansi) {
			}
			?>
			<div class="col-md-8 bg-light">
				<form action="<?php echo base_url('user/edit_profile_magang/' . session('id_magang')); ?>" method="post" id="form-edit-profile">
					<?= csrf_field() ?>
					<div class="form-group">
						<label for="nama">Nama Lengkap</label>
						<input type="text" value="<?= $row['nama'] ?>" class="form-control <?= session('errors.nama') ? 'is-invalid' : '' ?>" id="nama" name="nama">
						<?php if (session('errors.nama')) : ?>
							<div class="invalid-feedback"><?= session('errors.nama') ?></div>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="no_id">NISN/NIP</label>
						<input type="text" value="<?= $row['no_id'] ?>" class="form-control <?= session('errors.no_id') ? 'is-invalid' : '' ?>" id="no_id" name="no_id">
						<?php if (session('errors.no_id')) : ?>
							<div class="invalid-feedback"><?= session('errors.no_id') ?></div>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<h6><?= $row['email'] ?></h6>

					</div>

					<div class="form-group">
						<label for="no_hp">No Telepon</label>
						<input type="text" value="<?= $row['no_hp'] ?>" class="form-control <?= session('errors.no_hp') ? 'is-invalid' : '' ?>" id="no_hp" name="no_hp">
						<?php if (session('errors.no_hp')) : ?>
							<div class="invalid-feedback"><?= session('errors.no_hp') ?></div>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" value="<?= $row['alamat'] ?>" class="form-control <?= session('errors.alamat') ? 'is-invalid' : '' ?>" id="alamat" name="alamat">
						<?php if (session('errors.alamat')) : ?>
							<div class="invalid-feedback"><?= session('errors.alamat') ?></div>
						<?php endif ?>
					</div>
					<div class="form-group">
						<label for="id_prodi">Asal Instansi</label>
						<h6><?= $rowInstansi['nama_prodi'] . ',' . $rowInstansi['nama_instansi'] . ', ' . $rowInstansi['nama_jurusan'] ?></h6>
						<div class="dropdown">
							<input type="text" class="form-control dropdown-toggle" id="id_search" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder=" Jika ingin merubah instansi asal Cari disini!!! Tidak wajib diisi">
							<div class="dropdown-menu" aria-labelledby="id_prodi" style="position: absolute; top: 100%; left: 0; max-height: 200px; overflow-y: auto;" onshow="expandContent()">
								<?php
								foreach ($instansiForm as $row) {
									echo '<a class="dropdown-item" href="#" data-value="' . $row['id_prodi'] . '">' . $row['nama_prodi'] . ',' . $row['nama_jurusan'] . ',' . $row['nama_instansi'] . '</a>';
								}
								?>
							</div>
							<input type="hidden" id="id_prodi" name="id_prodi">
						</div>
					</div>
					<div class="form-group">
						<button type="button" class="btn-batal" onclick="confirmBatal()">Batal</button>
						<button type="submit" class="btn-submit">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



<!-- popup foto profile -->
<!-- popup foto -->
<div id="myModalProfile" class="modal foto-magang" style="width: 800px; height: 600px;">
	<div class="modal-header foto-magang-header">
		<span class="close">&times;</span>
	</div>
	<img class="modal-content foto-magang-content" id="img01">
</div>
<style>
	#myModalProfile {
		max-width: 800px;
		/* Mengatur lebar maksimum modal */
		max-height: 800px;
		/* Mengatur tinggi maksimum modal */
		/* Tambahan gaya untuk menengahkan modal di layar */
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		/* ... tambahkan gaya lainnya yang diperlukan ... */
	}

	.foto-magang-header {
		background-color: #7227fe;
	}

	.foto-magang-content {
		max-width: 100%;
		/* Mengatur lebar maksimum konten modal */
		max-height: 100%;
		/* Mengatur tinggi maksimum konten modal */
		/* ... tambahkan gaya lainnya yang diperlukan ... */
	}
</style>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


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


<!-- popup foto profile -->
<script>
	var modal = document.getElementById("myModalProfile");
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

<!-- SCRIPT POP UP -->
<!-- file name -->
<script>
	$(document).ready(function() {
		// Menampilkan nama file setelah pemilihan file
		$('.custom-file-input').on('change', function() {
			var fileName = $(this).val().split('\\').pop();
			$(this).next('.custom-file-label').addClass('selected').html(fileName);
		});
	});
</script>
<script>
	$(document).ready(function() {
		// Mengecek apakah terdapat pesan error dalam session
		<?php if (session('errors')) : ?>
			$('#editModalJurnal<?= session('id_magang') ?>').modal('show'); // Menampilkan modal jika terdapat pesan error
		<?php endif ?>
	});
</script>

<script>
	function editModal(idMagang) {
		$('#editModalJurnal' + idMagang).modal('show');
	}
</script>

<!-- untuk popup  instansi asal -->
<script>
	const dropdownMenu = document.querySelector('.dropdown-menu');
	const searchInput = document.getElementById('id_search');
	const hiddenInput = document.getElementById('id_prodi');

	searchInput.oninput = function() {
		const filter = searchInput.value.toLowerCase();
		const options = dropdownMenu.querySelectorAll('.dropdown-item');
		for (let i = 0; i < options.length; i++) {
			const optionText = options[i].text.toLowerCase();
			if (optionText.indexOf(filter) > -1) {
				options[i].style.display = "";
			} else {
				options[i].style.display = "none";
			}
		}
	};

	dropdownMenu.addEventListener('click', function(event) {
		event.preventDefault();
		const clickedOption = event.target;
		const value = clickedOption.dataset.value;
		const text = clickedOption.text;
		hiddenInput.value = value;
		searchInput.value = text;
	});
</script>

<!-- confrim batal -->
<script>
	function confirmBatal() {
		Swal.fire({
			title: 'Apakah Anda yakin ingin membatalkan perubahan data?',
			text: "Data yang telah diisi akan dihapus.",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, batalkan!',
			cancelButtonText: 'Tidak, kembali',
			reverseButtons: true
		}).then((result) => {
			if (result.isConfirmed) {
				document.getElementById('form-edit-profile').reset(); // reset form
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