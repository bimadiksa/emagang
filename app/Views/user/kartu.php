<title><?= $title ?></title>
<?php echo view('user/template/header'); ?>

<!-- ISI KONTEN -->
<div class="content-wrapper">
	<div class="container-kartu">
		<h5>Silahkan cetak kartu identitas magang di bawah ini</h5><br>
	</div>
	<div class="card" style="background-image: url('<?php echo base_url('assets/kartudesain.png'); ?>')">
		<?php foreach ($anakMagang as $row) {
		} ?>
		<?php if (session('foto') === null) : ?>
			<img src="<?php echo base_url('assets/woman-avatar.jpg') ?>" alt="Foto Profil">
		<?php else : ?>
			<div class=" kartu rounded-image-mask square">
				<img src="<?php echo base_url('foto_magang/' . $row['foto']); ?>" id="profile-picture-img" alt="Profile Picture" data-image="<?php echo base_url('foto_magang/' . session('foto')); ?>">
			</div>
		<?php endif; ?>

		<p>Nama :</p>
		<p><strong><?= $row['nama'] ?></strong></p>
		<p>NIM/NISN :</p>
		<p><strong> <?= $row['no_id'] ?></strong></p>
		<p>Jurusan :</p>
		<p><strong><?= $row['nama_jurusan'] ?></strong></p>
		<p>sebagai :</p><br>
		<?php
		foreach ($output as $instansi) :
			if ($row['kode_instansi_dinas'] !== null) :
				if ($instansi['kode_instansi'] == $row['kode_instansi_dinas']) : ?>
					<p><strong> Peserta Magang <?= $instansi['ket_ukerja'] ?></strong></p>
		<?php endif;
			endif;
		endforeach; ?>
	</div>
	<div class="download">
		<a href="#" onclick="saveAsImage()">Download JPG</a>
	</div>


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