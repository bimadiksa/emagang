<!DOCTYPE html>
<html>

<head>
	<title>Profile Page</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('style/profile.css') ?>">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 bg-purple">
				<div class="profile">
					<img src="<?php echo base_url('assets/user.png') ?>" id="profile-picture-img" alt="Profile Picture">
				</div>
				<div class="ganti">
					<button class="btn btn-outline-light" id="edit-profile-picture">Ubah Foto Profile</button>
				</div>
				<div class="deskripsi">
					<p>Siilahkan unggah foto profile anda untuk melengkapi data diri anda</p>
				</div>
				<div class="ganti">
					<button class="btn btn-outline-light">Kembali</button>
				</div>
			</div>
			<!-- pop up untuk upload foto -->
			<div id="popup">
				<form>
					<h2>Ubah Foto Profil</h2>
					<label for="profile-picture-file">Unggah foto baru:</label>
					<input type="file" id="profile-picture-file">
					<button type="submit">Simpan</button>
					<button type="button" id="close-popup">&times;</button>
				</form>
			</div>
			<!-- Akhir Pop Up -->
			<div class="col-md-8 bg-light">
				<form>
					<div class="form-group">
						<label for="name">Nama Lengkap</label>
						<input type="name" class="form-control" id="name" name="name" required>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>
					<div class="form-group">
						<label for="asal">Asal Instansi</label>
						<input type="asal" id="asal" name="asal" required class="form-control" list="list-asal"></input>
						<datalist id="list-asal"></datalist>
					</div>
					<div class="form-group">
						<label for="telp">No Telp</label>
						<input type="telp" class="form-control" id="telp" name="telp" required>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="alamat" class="form-control" id="alamat" name="alamat" required>
					</div>
					<div class="form-group">
						<label for="about">Pekerjaan</label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="jawaban" id="mahasiswa" value="mahasiswa">
							<label class="form-check-label" for="mahasiswa">
								Mahasiswa
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="jawaban" id="siswa" value="siswa">
							<label class="form-check-label" for="siswa">
								Siswa SMA/SMK
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="jawaban" id="lainnya" value="lainnya">
							<label class="form-check-label" for="lainnya">
								Lainnya
							</label>
						</div>
						<input id="about" name="about" required class="form-control"></input>
					</div>
					<div class="form-group">
						<button type="submit" class="btn-submit">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- SCRIPT POP UP -->
	<script>
		const editProfilePictureBtn = document.getElementById('edit-profile-picture');
		const popup = document.getElementById('popup');
		const profilePictureFile = document.getElementById('profile-picture-file');
		const profilePictureImg = document.getElementById('profile-picture-img');
		const closePopupBtn = document.getElementById('close-popup');

		editProfilePictureBtn.addEventListener('click', function() {
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
</body>

</html>