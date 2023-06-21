<!DOCTYPE html>
<html>

<head>
	<title>Log In</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/fontawesome-free/css/all.min.css') ?>">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('adminlte/dist/css/adminlte.min.css') ?>">

	<!-- SweetAlert -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.css">
	<link rel="stylesheet" href="/plugins/sweetalert2/sweetalert2.min.css">
	<script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url('style/login.css') ?>">
</head>

<body>
	<div class="container">
		<div class="register">
			<div class="register-form">
				<h3>Belum Memiliki Akun?</h5>
					<p>Harap melakukan daftar akun apabila belum memiliki akun.</p>
					<button type="button" onclick="location.href='<?= base_url('/registrasi') ?>'">Daftar</button>
					<button type="button" onclick="location.href='<?= base_url('/') ?>'">Beranda</button>
			</div>
		</div>

		<div class="login-form">
			<div class="textlogin">
				<h2>Masuk Akun E-MAGANG<?= session('showModal') ?></h2>
			</div>
			<?php if (session()->getFlashdata('errorLogin')) : ?>
				<div class="alert alert-danger">
					<?= session()->getFlashdata('errorLogin') ?>
				</div>
			<?php endif; ?>
			<?php if (session()->get('lockout_time') > 0) : ?>

				<?php if (session()->get('lockout_time') - time() > 0) : ?>

				<?php else :
					session()->remove('attempt_count');
					session()->remove('lockout_time'); ?>
				<?php endif ?>

			<?php endif ?>

			<form class="input" action="<?php echo base_url(); ?>/LoginController/loginAuth" method="post">
				<input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
				<label for="Email">Email</label> <br>
				<div class="input-group my-custom-width mb-4">
					<?php if (session()->get('lockout_time') - time() > 0) : ?>
						<input type="email" name="email" class="form-control" value="<?php echo old('email') ?>" readonly>
					<?php else : ?>
						<input type="text" name="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" id="email" placeholder="Masukkan email" value="<?php echo old('email'); ?>">
					<?php endif ?>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
					<?php if (session('errors.email')) : ?>
						<div class="invalid-feedback"><?= session('errors.email') ?></div>
					<?php endif ?>
				</div>
				<label for="password">Kata Sandi</label><br>
				<div class="input-group my-custom-width mb-4">
					<?php if (session()->get('lockout_time') - time() > 0) : ?>
						<input type="password" name="password" class="form-control" readonly>
					<?php else : ?>
						<input type="password" name="password" id="password" class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>" placeholder=" Masukkan Password" value="<?php echo old('password'); ?>">
					<?php endif ?>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class=" show-password"><i class="fas fa-eye"></i></span>
						</div>
					</div>
					<?php if (session('errors.password')) : ?>
						<div class="invalid-feedback"><?= session('errors.password') ?></div>
					<?php endif ?>
				</div>

				<?php if (session()->get('lockout_time') - time() > 0) : ?>
					<button type="submit" class="btn btn-primary" disabled>Masuk</button>
				<?php else : ?>
					<button type="submit" class="btn btn-primary btn-block">Masuk</button>
				<?php endif ?>

			</form>

			<!-- Tampilkan modal disini -->
			<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="modalDetailLabel"><strong>UBAH PASSWORD</strong></h5>

						</div>
						<div class="modal-body">
							<?php if (isset($errors)) : ?>
								<div class="alert alert-danger">
									<?php foreach ($errors as $error) : ?>
										<p><?= esc($error) ?></p>
									<?php endforeach ?>
								</div>
							<?php endif ?>
							<form action="<?= base_url('newPassword/' . session('id_admin')) ?>" method="post">
								<input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
								<input type="hidden" name="<?= session('username') ?>" value="">
								<div class="form-group">
									<label for="new_password">Password Baru</label>
									<div class="input-group mb-3">
										<input type="password" name="new_password" class="form-control <?= session('errors.new_password') ? 'is-invalid' : '' ?>" id="new_password" placeholder="Masukkan password baru" value="<?php echo old('new_password'); ?>">
										<div class="input-group-append">
											<div class="input-group-text">
												<span class=" show-new-password"><i class="fas fa-lock"></i></span>
											</div>
										</div>
										<?php if (session('errors.new_password')) : ?>
											<div class="invalid-feedback"><?= session('errors.new_password') ?></div>
										<?php endif ?>
									</div>
									<label for="new_confirmpassword">Konfirmasi Password Baru</label>
									<div class="input-group mb-3">
										<input type="password" name="new_confirmpassword" class="form-control <?= session('errors.new_confirmpassword') ? 'is-invalid' : '' ?>" id="new_confirmpassword" placeholder="Konfirmasi password baru" value="<?php echo old('new_confirmpassword'); ?>">
										<div class="input-group-append">
											<div class="input-group-text">
												<span class=" show-new-confirm-password"><i class="fas fa-lock"></i></span>
											</div>
										</div>
										<?php if (session('errors.new_confirmpassword')) : ?>
											<div class="invalid-feedback"><?= session('errors.new_confirmpassword') ?></div>
										<?php endif ?>
									</div>
								</div>
								<button type="submit" class="btn btn-primary w-100">Simpan</button>
							</form>


							<!-- Tambahkan informasi detail instansi lainnya sesuai kebutuhan -->
							<div class="info">
								<br>
								<p><strong>PENTING UNTUK MERUBAH PASSWORD ANDA</strong></p>
								<p><strong>AGAR BISA MASUK KE SISTEM E-MAGANG</strong></p>
							</div>
						</div>

					</div>
				</div>

			</div>

			<p class="mb-1">
				<a href="<?= base_url('/lupa_password') ?>">Lupa Password?</a>
			</p>

			<?php if (session()->get('attempt_count') != 3 && session()->getFlashdata('error')) : ?>
				<script>
					Swal.fire({
						icon: 'error',
						title: 'Oops...Login Gagal',
						text: '<?php echo session()->getFlashdata('error'); ?>',
					})
				</script>
			<?php endif; ?>
			<?php if (session()->get('attempt_count') == 3 && session()->getFlashdata('error')) : ?>
				<script>
					let timerInterval
					let countdownTime = Math.ceil(<?php echo session()->get('lockout_time') - time() ?>) // dibagi 1000 agar satuan menjadi detik
					Swal.fire({
						icon: 'error',
						title: 'Login Terkunci',

						html: 'Coba login kembali setelah <b>' + countdownTime + '</b> detik.',
						timer: countdownTime * 1000, // dikalikan 1000 agar satuan menjadi milidetik
						timerProgressBar: true,
						didOpen: () => {
							Swal.showLoading()
							const b = Swal.getHtmlContainer().querySelector('b')
							timerInterval = setInterval(() => {
								countdownTime -= 1; // kurangi countdownTime setiap 1 detik
								b.textContent = countdownTime;
							}, 1000); // set interval 1 detik (1000 milidetik)
						},
						willClose: () => {
							clearInterval(timerInterval)
						}
					}).then((result) => {
						/* Read more about handling dismissals below */
						if (result.dismiss === Swal.DismissReason.timer) {
							console.log('I was closed by the timer')
							location.reload(); // tambahkan kode ini untuk mereload halaman
						}
					})
				</script>
			<?php endif; ?>
		</div>


	</div>

	<script>
		const togglePassword = document.querySelector('.show-password');
		togglePassword.addEventListener('click', function(e) {
			const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
			password.setAttribute('type', type);
			this.querySelector('i').classList.toggle('fa-eye');
			this.querySelector('i').classList.toggle('fa-eye-slash');
		});
	</script>
	<script>
		if (window.history.replaceState) {
			window.history.replaceState(null, null, window.location.href);
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
	<?php elseif (session()->has('errorToken')) : ?>
		<script>
			Swal.fire({
				icon: 'error',
				title: 'Oops...Token Kadaluarsa',
				text: '<?php echo session()->getFlashdata('errorToken'); ?>',
			})
		</script>

	<?php elseif (session()->has('errorNewPassword')) : ?>
		<script>
			Swal.fire({
				icon: 'error',
				title: 'Oops...Email atau Password Salah',
				text: '<?php echo session()->getFlashdata('errorNewPassword'); ?>',
			})
		</script>

	<?php endif; ?>
	<!-- jQuery -->
	<script src="<?php echo base_url('adminlte/plugins/jquery/jquery.min.js') ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('adminlte/dist/js/adminlte.min.js') ?>"></script>
	<!-- sweet alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.6/dist/sweetalert2.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
</body>

</html>






<!-- untuk modal -->
<?php if (session()->get('showModal')) : ?>
	<script>
		var myModal = new bootstrap.Modal(document.getElementById('modalDetail'));
		myModal.show();
	</script>
	<?php session()->remove('showModal'); ?>
<?php endif; ?>

<!-- <script>
	const toggleNewPassword = document.querySelector('.show-new-password');
	toggleNewPassword.addEventListener('click', function(e) {
		const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
		password.setAttribute('type', type);
		this.querySelector('i').classList.toggle('fa-eye');
		this.querySelector('i').classList.toggle('fa-eye-slash');
	});
	const toggleNewConfirmPassword = document.querySelector('.show-new-confirm-password');
	toggleNewConfirmPassword.addEventListener('click', function(e) {
		const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
		password.setAttribute('type', type);
		this.querySelector('i').classList.toggle('fa-eye');
		this.querySelector('i').classList.toggle('fa-eye-slash');
	});
</script> -->