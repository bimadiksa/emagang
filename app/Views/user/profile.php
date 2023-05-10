<!DOCTYPE html>
<html>

<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/profile.css') ?>">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="left">
			<div class="profile">
				<img src="<?php echo base_url('assets/user.png') ?>" id="profile-picture-img" alt="Profile Picture">
			</div>
			<div class="ganti">
				<button class="tombol" id="edit-profile-picture">Ubah Foto Profile</button>
			</div>
			<div id="popup">
				<form>
					<h2>Ubah Foto Profil</h2>
					<label for="profile-picture-file">Atau unggah foto baru:</label>
					<input type="file" id="profile-picture-file">
					<button type="submit">Simpan</button>
					<button type="button" id="close-popup">&times;</button>
				</form>
			</div>
			<div class="deskripsi">
				<p>Siilahkan unggah foto profile anda untuk melengkapi data diri anda</p>
			</div>
			<div class="ganti">
				<button class="tombol">Kembali</button>
			</div>
		</div>
		<div class="right">
			<form>
				<label for="name">Nama Lengkap</label>
				<input type="name" id="name" name="name" placeholder="Nama Lengkap" value="<?= $anakMagang[0]['nama'] ?>" required>
				<label for="email">Email</label>
				<input type="email" id="email" name="email" placeholder="Email" value="<?= $anakMagang[0]['email'] ?>" required>
				<!-- <label for="tgl">Tanggal Lahir</label>
				<div class="input-grup">
					<input type="number" name="tgl_lahir" id="tgl" min="1" max="31" placeholder="Tanggal" required>
					<input type="number" name="bln_lahir" id="tgl" min="1" max="12" placeholder="Bulan" required>
					<input type="number" name="thn_lahir" id="tgl" min="1900" max="2099" placeholder="Tahun" required>
				</div> -->
				<label for="id_prodi">Asal Instansi</label>
				<div class="dropdown">
					<input type="text" class="form-control dropdown-toggle" id="id_search" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="Cari..." value="<?= $anakMagang[0]['nama_prodi'] . ' - ' . $anakMagang[0]['nama_jurusan'] . ' - ' . $anakMagang[0]['nama_instansi'] ?>">
					<div class="dropdown-menu" aria-labelledby="id_prodi" style="position: absolute; top: 100%; left: 0; max-height: 200px; overflow-y: auto;" onshow="expandContent()">
						<?php
						foreach ($instansiAsal as $instansi) {
							echo '<a class="dropdown-item" href="#" data-value="' . $instansi['id_prodi'] . '">' . $instansi['nama_prodi'] . ',' . $instansi['nama_jurusan'] . ',' . $instansi['nama_instansi'] . '</a>';
						}
						?>
					</div>
					<input type="hidden" id="id_prodi" name="id_prodi">
				</div>
				<label for="about">No Telp</label>
				<input id="telp" name="telp" value="<?= $anakMagang[0]['no_hp'] ?>" required></input>
				<label for="alamat">Alamat</label>
				<input id="alamat" name="alamat" value="<?= $anakMagang[0]['alamat'] ?>" required></input>
				<div class="input-group">
					<div class="options">
						<label for="about">Pekerjaan</label>
						<?php if ($anakMagang[0]['nama_prodi'] == $anakMagang[0]['nama_jurusan']) : ?>
							<label>
								<input type="radio" name="jawaban" value="mahasiswa">Mahasiswa
							</label>
							<label>
								<input type="radio" name="jawaban" value="siswa" checked>Siswa SMK
							</label>
						<?php else : ?>
							<label>
								<input type="radio" name="jawaban" value="mahasiswa" checked>Mahasiswa
							</label>
							<label>
								<input type="radio" name="jawaban" value="siswa">Siswa SMK
							</label>
						<?php endif; ?>
					</div>
					<!-- <div class="input-col">
						<label for="Lainnya">Lainnya</label>
						<input id="about" name="about" required></input>
					</div> -->
				</div>
			</form>
			<div class="simpan">
				<button type="submit">Simpan</button>
			</div>
		</div>
	</div>


	<script>
		// Ubah Profile
		const editProfilePictureBtn = document.getElementById('edit-profile-picture');
		const popup = document.getElementById('popup');
		const profilePictureFile = document.getElementById('profile-picture-file');
		const profilePictureImg = document.getElementById('profile-picture-img');
		const closePopupBtn = document.getElementById('close-popup');

		editProfilePictureBtn.addEventListener('click', function(event) {
			event.preventDefault();
			popup.style.display = 'block';
		});

		profilePictureFile.addEventListener('change', function() {
			const reader = new FileReader();
			reader.onload = function() {
				profilePictureImg.src = reader.result;
			};
			reader.readAsDataURL(profilePictureFile.files[0]);
		});

		closePopupBtn.addEventListener('click', function() {
			popup.style.display = 'none';
		});

		popup.addEventListener('submit', function(event) {
			event.preventDefault();
			popup.style.display = 'none';
		});
	</script>


	<script>
		// Asal Instansi
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

</body>

</html>