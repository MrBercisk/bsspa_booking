<?= $this->extend('templates_admin/main'); ?>

<?= $this->section('content'); ?>


<?= $this->include('templates_admin/header') ?>


<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> Dashboard
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Jumlah Booking <i class="mdi mdi-book mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5"><?= hitungData('booking') ?></h2>
            <h6 class="card-text">Total Booking Member</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Jenis Massage <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5"><?= hitungData('massage_list') ?></h2>
            <h6 class="card-text">Tipe/Jenis Massage</h6>

          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Jumlah User <i class="mdi mdi-account-box mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5"><?= hitungData('user') ?></h2>
            <h6 class="card-text">Total Semua User</h6>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Chart Data Member</h4>
            <canvas id="genderChart" width="200" height="100"></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-6 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Terapis List</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th> No </th>
                    <th> Nama Terapis </th>
                    <th> Jenis Kelamin </th>
                    <th> Status Pernikahan </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $maksdisplay = 0; ?>
                  <?php $no = 1; ?>
                  <?php foreach ($terapis as $t) : ?>
                    <?php if ($maksdisplay < 5) : ?>
                      <tr>
                        <td> <?= $no++; ?> </td>
                        <td> <?= $t['nama_terapis']; ?> </td>
                        <td> <?= $t['jenis_kelamin']; ?> </td>
                        <td> <?= $t['status_pernikahan']; ?> </td>
                        <?php $maksdisplay++; ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
              </table>
              <?php if (count($terapis) > 5) : ?>
                <div class="text-end">
                  <a href="<?= base_url('terapis'); ?>" class="text-muted" style="text-decoration: none;">Show More>></a>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Recent Bookings</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th> Nama </th>
                    <th> Jenis Massage </th>
                    <th> Tanggal Booking </th>
                    <th> Status Booking </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $maksdisplay = 0; ?>
                  <?php foreach ($booking as $book) : ?>
                    <?php if ($maksdisplay < 2) : ?>
                      <tr>
                        <td> <?= $book['nama']; ?> </td>
                        <td> <?= $book['jenis_massage']; ?> </td>
                        <td> <?= $book['tanggal_booking']; ?> </td>
                        <td> <?= $book['status_booking']; ?> </td>
                      </tr>
                      <?php $maksdisplay++; ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <?php if (count($booking) > 2) : ?>
                <div class="text-end">
                  <a href="<?= base_url('databooking'); ?>" class="text-muted" style="text-decoration: none;">Show More>></a>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Jenis Massage</h4>
            <div class="d-flex">
              <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                <i class="mdi mdi-account-outline icon-sm me-2"></i>
                <span>BSpa</span>
              </div>
              <div class="d-flex align-items-center text-muted font-weight-light">
                <i class="mdi mdi-clock icon-sm me-2"></i>
                <span>2024</span>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-6 pe-1">
                <img src="<?= base_url('assets/images/img1.jpg'); ?>" class="mb-2 mw-100 w-100 rounded" alt="image">
                <img src="<?= base_url('assets/images/img2.jpg'); ?>" class="mw-100 w-100 rounded" alt="image">
              </div>
              <div class="col-6 ps-1">
                <img src="<?= base_url('assets/images/img3.jpg'); ?>" class="mb-2 mw-100 w-100 rounded" alt="image">
                <img src="<?= base_url('assets/images/img4.jpg'); ?>" class="mw-100 w-100 rounded" alt="image">
              </div>
            </div>
            <div class="d-flex mt-5 align-items-top">
              <img src="assets/images/faces/face3.jpg" class="img-sm rounded-circle me-3" alt="image">
              <div class="mb-0 flex-grow">
                <h5 class="me-2 mb-2">Spa Massage Booking Website - BSpa.</h5>
                <p class="mb-0 font-weight-light">Jenis-jenis massage yang tersedia</p>
              </div>
              <div class="ms-auto">
                <i class="mdi mdi-heart-outline text-muted"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="container-fluid d-flex justify-content-between">
      <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © RDMassage 2024</span>
    </div>
  </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Access the genderCounts data from PHP
  var genderData = <?php echo json_encode($genderData); ?>;

  // Get the canvas element
  var ctx = document.getElementById('genderChart').getContext('2d');

  // Create a pie chart
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: Object.keys(genderData),
      datasets: [{
        data: Object.values(genderData),
        backgroundColor: ['#e74c3c', '#3498db'],
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Gender Distribution'
      }
    }
  });
</script>
<?= $this->endSection() ?>