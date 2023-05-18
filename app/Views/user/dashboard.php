<title><?= $title ?></title>
<?php echo view('user/template/header'); ?>


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
			<div class="button">
				<h2>Kartu Identitas</h2>
				<img src="<?php echo base_url('assets/cetak_kartu.png') ?>" alt="Gambar 1">
			</div>
			<div class="button" <?php
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


<?php echo view('user/template/footer'); ?>

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