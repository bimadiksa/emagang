<title><?= $title ?></title>
<?php echo view('user/template/header'); ?>


<div class="content-wrapper">
  <!-- section hero -->
  <div class="horeloc text-ligth text-center text-sm-start" id="home">
    <div class="heroloc">
      <div class="welcome">
        <h3>Pilih Lokasi Magang</h3>
      </div>
      <div class="search-container">
        <input type="text" placeholder="Cari..." id="searchInput">
        <!-- <form action="#">
          <input type="text" placeholder="Cari...">
          <button type="submit"><i class="bi bi-search"></i></button>
        </form> -->
      </div>
      <div class="d-sm-flex align-items-center justify-content-between py-4">
        <div>
          <p class="judulloc" style="color: #fff;">Tujuan E-MAGANG</p>
          <p class="deskripsiloc" style="color: #fff;">Website e-magang bertujuan untuk meningkatkan aksesibilitas informasi terkait program magang di Kabupaten Buleleng. Dengan adanya website ini, calon peserta magang dapat dengan mudah mengakses informasi tentang persyaratan, prosedur, dan manfaat program magang.</p>
        </div>

        <a href="">
          <img class="gambarunguloc img-fluid" src="<?php echo base_url('assets/lokasi.png') ?>" alt="Logo" height="700" width="700">
        </a>
      </div>

    </div>
  </div>
  <!-- Akhir section hero -->

  <!-- Card -->
  <div class="card-container">
    <?php if ($kode_instansi_dinas === null) : ?>
      <?php
      foreach ($output as $row) :
      ?>
        <div class="cardloc">
          <?php
          foreach ($deskripsiFoto as $rowDeskripsiFoto) :
            if ($row['kode_instansi'] == $rowDeskripsiFoto['kode_instansi']) :
          ?>
              <img src="<?php echo base_url('images/' . $rowDeskripsiFoto['foto_instansi']); ?>" alt="Gambar 1">

          <?php endif;
          endforeach; ?>
          <div class="cardloc-content">
            <h3><?= $row['ket_ukerja']; ?></h3>
            <!-- <p>Deskripsi Card 1</p> -->
            <a href="<?= base_url('user/detail/' . $row['kode_instansi']) ?>"><button class="btncardloc">Lihat Detail</button></a>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <?php
      foreach ($output as $row) :
        if ($row['kode_instansi'] == $kode_instansi_dinas) :
      ?>
          <div class="cardloc">
            <?php
            foreach ($deskripsiFoto as $rowDeskripsiFoto) :
              if ($row['kode_instansi'] == $rowDeskripsiFoto['kode_instansi']) :
            ?>
                <img src="<?php echo base_url('images/' . $rowDeskripsiFoto['foto_instansi']); ?>" alt="Gambar 1">

            <?php endif;
            endforeach; ?>
            <div class="cardloc-content">
              <h3><?= $row['ket_ukerja']; ?></h3>
              <!-- <p>Deskripsi Card 1</p> -->
              <a href="<?= base_url('user/detail/' . $row['kode_instansi']) ?>"><button class="btncardloc" style="background-color: red;">Lakukan Pembatalan</button></a>
              <h6 style="color : red;">Silahkan lakukan pembatalan jika ingin merubah tempat magang</h6 style="color : red;">
            </div>
          </div>
      <?php endif;
      endforeach; ?>
    <?php endif; ?>
  </div>

  <!-- akhir card -->
</div>

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
<script>
  // ambil input search dan card-container
  const searchInput = document.getElementById('searchInput');
  const cardContainers = document.querySelectorAll('.card-container');

  // fungsi untuk mencari card yang cocok dengan input search
  const searchCard = () => {
    const filter = searchInput.value.toLowerCase(); // konversi input search ke lowercase
    cardContainers.forEach(cardContainer => {
      const cards = cardContainer.querySelectorAll('.card'); // ambil semua card dalam card-container
      cards.forEach(card => {
        const title = card.querySelector('h3').textContent.toLowerCase(); // ambil judul card dan konversi ke lowercase
        if (title.indexOf(filter) !== -1) { // jika judul card mengandung input search
          card.style.display = 'flex'; // tampilkan card
        } else {
          card.style.display = 'none'; // sembunyikan card
        }
      });
    });
  };

  // tangkap event input pada input search dan panggil fungsi pencarian
  searchInput.addEventListener('input', searchCard);
</script>

<!-- <script>
  // ambil input search dan card-container
  const searchInput = document.getElementById('searchInput');
  const cardContainer = document.querySelector('.card-container');

  // fungsi untuk mencari card yang cocok dengan input search
  const searchCard = () => {
    const filter = searchInput.value.toLowerCase(); // konversi input search ke lowercase
    const cards = cardContainer.querySelectorAll('.card'); // ambil semua card
    cards.forEach(card => {
      const title = card.querySelector('h3').textContent.toLowerCase(); // ambil judul card dan konversi ke lowercase
      if (title.indexOf(filter) !== 1) { // jika judul card mengandung input search
        card.style.display = 'block'; // tampilkan card
      } else {
        card.style.display = 'none'; // sembunyikan card
      }
    });
  };

  // tangkap event input pada input search dan panggil fungsi pencarian
  searchInput.addEventListener('input', searchCard);
</script> -->