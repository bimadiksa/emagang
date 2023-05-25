<title><?= $title ?></title>
<?php echo view('user/template/header'); ?>


<!-- ISI KONTEN -->
<div class="container">
	<h1>Tabel Jurnal Harian</h1>
	<button class="tambah" onclick="showModal()"><i class="bi bi-plus-circle"></i> Tambah Jurnal</button>
</div>

<div class="tabeljurnal">
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Hari Tanggal</th>
				<th>Judul</th>
				<th>Isi Jurnal</th>
				<th>Dokumentasi</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<?php
		usort($jurnal, function ($a, $b) {
			return strtotime($a['created_at']) - strtotime($b['created_at']);
		});
		$id = 0;
		foreach ($jurnal as $row) :
			$id++; ?>
			<tr>
				<td><?= $id ?></td>
				<td><?= $row['tanggal_logbook'] ?></td>
				<td><?= $row['judul'] ?></td>
				<td><?= $row['deskripsi'] ?></td>
				<td>
					<img src="<?php echo base_url('jurnal/' . $row['foto']); ?>" alt="Foto" data-image="<?php echo base_url('jurnal/' . $row['foto']); ?>" style=" width: 100px; height: 50px;">
				</td>
				<td>
					<a href="#" class="btn btn-jurnal-edit btn-outline-warning float-top" onclick="editModal('<?= $row['id_log_book'] ?>');"><i class="fas fa-edit"></i></a>
					<a href="#" class="btn btn-jurnal-hapus btn-outline-danger float-top-right" onclick="event.preventDefault(); hapusJurnal('<?= $row['id_log_book'] ?>');"><i class="fas fa-trash-alt"></i></a>
				</td>
			</tr>
		<?php endforeach; ?>
		<tbody>
		</tbody>
	</table>
</div>

<!-- Tampilkan modal tambah -->
<div class="modal fade" id="modalJurnal" tabindex="-1" role="dialog" aria-labelledby="modalJurnalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalJurnalLabel"><strong>Tambah Jurnal</strong></h5>

			</div>
			<div class="modal-body">
				<?php if (isset($errors)) : ?>
					<div class="alert alert-danger">
						<?php foreach ($errors as $error) : ?>
							<p><?= esc($error) ?></p>
						<?php endforeach ?>
					</div>
				<?php endif ?>
				<form action="<?= base_url('user/tambah_jurnal/' . session('id_magang')) ?>" method="post" enctype="multipart/form-data">
					<?= csrf_field() ?>
					<div class="form-group">
						<label for="haritanggal">Hari dan Tanggal</label>
						<div class="input-group mb-3">
							<input type="date" name="haritanggal" class="form-control <?= session('errors.haritanggal') ? 'is-invalid' : '' ?>" id="haritanggal" placeholder="Masukkan password baru">
							<!-- <div class="input-group-append">
								<div class="input-group-text">
									<span class=" show-new-password"><i class="fas fa-lock"></i></span>
								</div>
							</div> -->
							<?php if (session('errors.haritanggal')) : ?>
								<div class="invalid-feedback"><?= session('errors.haritanggal') ?></div>
							<?php endif ?>
						</div>
						<label for="judul">Judul</label>
						<div class="input-group mb-3">
							<input type="text" name="judul" class="form-control <?= session('errors.judul') ? 'is-invalid' : '' ?>" id="judul" placeholder="Konfirmasi judul">
							<!-- <div class="input-group-append">
								<div class="input-group-text">
									<span class=" show-new-confirm-password"><i class="fas fa-lock"></i></span>
								</div>
							</div> -->
							<?php if (session('errors.judul')) : ?>
								<div class="invalid-feedback"><?= session('errors.judul') ?></div>
							<?php endif ?>
						</div>
						<label for="isijurnal">Deskripsi Jurnal</label>
						<div class="input-group mb-3">
							<textarea name="isijurnal" class="form-control <?= session('errors.isijurnal') ? 'is-invalid' : '' ?>" id="isijurnal" placeholder="Masukkan deskripsi"></textarea>
							<!-- <div class="input-group-append">
								<div class="input-group-text">
									<span class=" show-new-confirm-password"><i class="fas fa-lock"></i></span>
								</div>
							</div> -->
							<?php if (session('errors.isijurnal')) : ?>
								<div class="invalid-feedback"><?= session('errors.isijurnal') ?></div>
							<?php endif ?>
						</div>
						<label for="dokumentasi">Dokumentasi</label>
						<div class="input-group mb-3">
							<div class="custom-file">
								<input type="file" name="dokumentasi" id="dokumentasi" class="custom-file-input <?= session('errors.dokumentasi') ? 'is-invalid' : '' ?>">
								<label class="custom-file-label" for="dokumentasi">Pilih foto</label>
							</div>
							<?php if (session('errors.dokumentasi')) : ?>
								<div class="invalid-feedback"><?= session('errors.dokumentasi') ?></div>
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

<!-- modal edit -->
<!-- Tampilkan modal disini -->
<div class="modal fade" id="editModalJurnal<?= $row['id_log_book'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalJurnalLabel<?= $row['id_log_book'] ?>" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="editModalJurnalLabel<?= $row['id_log_book'] ?>"><strong>Tambah Jurnal</strong></h5>

			</div>
			<div class="modal-body">
				<?php if (isset($errors)) : ?>
					<div class="alert alert-danger">
						<?php foreach ($errors as $error) : ?>
							<p><?= esc($error) ?></p>
						<?php endforeach ?>
					</div>
				<?php endif ?>
				<form action="<?= base_url('user/edit_jurnal/' . $row['id_log_book']) ?>" method="post" enctype="multipart/form-data">
					<?= csrf_field() ?>
					<div class="form-group">
						<label for="haritanggal">Hari dan Tanggal</label>
						<div class="input-group mb-3">
							<input type="date" name="haritanggal" value="<?= $row['tanggal_logbook'] ?>" class="form-control <?= session('errors.haritanggal') ? 'is-invalid' : '' ?>" id="haritanggal" placeholder="Masukkan password baru">
							<!-- <div class="input-group-append">
								<div class="input-group-text">
									<span class=" show-new-password"><i class="fas fa-lock"></i></span>
								</div>
							</div> -->
							<?php if (session('errors.haritanggal')) : ?>
								<div class="invalid-feedback"><?= session('errors.haritanggal') ?></div>
							<?php endif ?>
						</div>
						<label for="judul">Judul</label>
						<div class="input-group mb-3">
							<input type="text" name="judul" value="<?= $row['judul'] ?>" class="form-control <?= session('errors.judul') ? 'is-invalid' : '' ?>" id="judul" placeholder="Konfirmasi judul">
							<!-- <div class="input-group-append">
								<div class="input-group-text">
									<span class=" show-new-confirm-password"><i class="fas fa-lock"></i></span>
								</div>
							</div> -->
							<?php if (session('errors.judul')) : ?>
								<div class="invalid-feedback"><?= session('errors.judul') ?></div>
							<?php endif ?>
						</div>
						<label for="isijurnal">Deskripsi Jurnal</label>
						<div class="input-group mb-3">
							<textarea name="isijurnal" class="form-control <?= session('errors.isijurnal') ? 'is-invalid' : '' ?>" id="isijurnal" placeholder="Masukkan deskripsi"><?= $row['deskripsi'] ?></textarea>
							<!-- <div class="input-group-append">
								<div class="input-group-text">
									<span class=" show-new-confirm-password"><i class="fas fa-lock"></i></span>
								</div>
							</div> -->
							<?php if (session('errors.isijurnal')) : ?>
								<div class="invalid-feedback"><?= session('errors.isijurnal') ?></div>
							<?php endif ?>
						</div>
						<label for="dokumentasi">Dokumentasi</label>
						<div class="input-group mb-3">
							<div class="custom-file">
								<input type="file" name="dokumentasi" id="dokumentasi" class="custom-file-input <?= session('errors.dokumentasi') ? 'is-invalid' : '' ?>">
								<label class="custom-file-label" for="dokumentasi">Pilih foto</label>
							</div>
							<?php if (session('errors.dokumentasi')) : ?>
								<div class="invalid-feedback"><?= session('errors.dokumentasi') ?></div>
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
<!-- popup foto -->
<div id="myModal" class="modal">
	<div class="modal-header">
		<span class="close">&times;</span>
	</div>
	<img class="modal-content" id="img01">
</div>


<style>
	#myModal {
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

	.modal-header {
		background-color: #7227fe;
	}

	.modal-content {
		max-width: 100%;
		/* Mengatur lebar maksimum konten modal */
		max-height: 100%;
		/* Mengatur tinggi maksimum konten modal */
		/* ... tambahkan gaya lainnya yang diperlukan ... */
	}
</style>

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
<!-- <script>
	$(document).ready(function() {
		$('#dokumentasi').change(function() {
			var filename = $(this).val().split("\\").pop();
			$(this).next('.custom-file-label').html(filename);
		});
	});
</script> -->

<!-- POP UP FORM tambah-->
<script>
	$(document).ready(function() {
		// Mengecek apakah terdapat pesan error dalam session
		<?php if (session('errors')) : ?>
			$('#modalJurnal').modal('show'); // Menampilkan modal jika terdapat pesan error
		<?php endif ?>
	});
</script>
<script>
	function showModal() {
		$('#modalJurnal').modal('show');
	}
</script>

<!-- popup form edit -->
<script>
	$(document).ready(function() {
		// Mengecek apakah terdapat pesan error dalam session
		<?php if (session('errors')) : ?>
			$('#editModalJurnal<?= $row['id_log_book'] ?>').modal('show'); // Menampilkan modal jika terdapat pesan error
		<?php endif ?>
	});
</script>

<script>
	function editModal(idLogBook) {
		$('#editModalJurnal' + idLogBook).modal('show');
	}
</script>

<!-- popup foto jurnal -->
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

<!-- popup hapus -->
<script>
	function hapusJurnal(id_log_book) {
		Swal.fire({
			title: 'Apakah anda yakin menghapus data ini?',
			text: "Jika yakin tekan Ya.",
			icon: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			showConfirmButton: true,
			confirmButtonText: 'Ya',
			cancelButtonText: 'Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.isConfirmed) {
				// Mengarahkan pengguna ke halaman yang diinginkan
				window.location.href = "<?php echo site_url('user/hapus_jurnal/'); ?>" + id_log_book;
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