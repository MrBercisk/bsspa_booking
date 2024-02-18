<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/css/styleadmin.css">
  <!-- End layout styles -->
  <link href="<?= base_url('assets/images/logo1.png') ?>" rel="icon" />
  <link href="<?= base_url('assets/images/logo1.png') ?>" rel="apple-touch-icon" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <?php if (session()->has('validation')) : ?>
              <div class="alert alert-danger">
                <?= session('validation')->listErrors() ?>
              </div>
            <?php endif; ?>
            <div class="auth-form-light text-left p-5">
              <h2 class="text-center">Login</h4>
                <form action="<?= base_url('login/create') ?>" class="pt-3" method="post">
                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <small id="email_error" class="form-text text-danger mb-3"></small>

                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <small id="password_error" class="form-text text-danger mb-3"></small>

                  <div class="mt-3 text-center">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">Login</a>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Belum memiliki akun? <a href="<?= base_url('daftar'); ?>" class="text-primary">Daftar</a></div>
                  <div class="text-center mt-4 font-weight-light"><a href="<?= base_url('home'); ?>" class="text-primary"><i class="fas fa-arrow-left"></i> Halaman Utama</a></div>
                  <!-- <div class="text-center mt-4 font-weight-light"><a href="<?= base_url('ForgotPassword') ?>">Lupa Password?</a></div> -->
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // Cek apakah ada notifikasi Sweet Alert
  <?php if (session()->has('sweet_alert')) : ?>
    // Mendapatkan data notifikasi dari Flashdata
    var sweetAlertData = <?= session('sweet_alert') ?>;

    // Menampilkan Sweet Alert
    Swal.fire({
      icon: sweetAlertData.success ? 'success' : 'error',
      title: sweetAlertData.message,
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true
    });
  <?php endif; ?>
</script>

</html>