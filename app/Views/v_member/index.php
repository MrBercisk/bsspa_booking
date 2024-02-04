<?= $this->extend('templates_member/main'); ?>

<?= $this->section('content'); ?>


<?= $this->include('templates_member/header') ?>


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
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-3">
          <div class="card card-outline">
            <div class="card-body box-profile">
              <h5>Informasi Profil</h5>
              <p>Informasi profil data anda</p>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-body p-5">
              <?php if (session()->has('validation')) : ?>
                <div class="alert alert-danger">
                  <?= session('validation')->listErrors() ?>
                </div>
              <?php endif; ?>
              <form>
                <?php foreach ($user as $users) : ?>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" name="nama_peserta" value="<?php echo $nama; ?>" class="form-control" id="exampleFormControlInput1" readonly>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" id="exampleFormControlInput1" readonly>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" value="<?= $users['jenis_kelamin']; ?>" class="form-control" id="exampleFormControlInput1" readonly>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Status Member</label>
                    <input type="text" name="status" value="<?= $users['status']; ?>" class="form-control" id="exampleFormControlInput1" readonly>
                  </div>
                <?php endforeach; ?>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-md-3">
          <div class="card card-outline">
            <div class="card-body box-profile">
              <h5>Update Password</h5>
              <p>Perbarui password akun Anda secara berkala</p>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-body p-5">
              <?php if (session()->has('validation')) : ?>
                <div class="alert alert-danger">
                  <?= session('validation')->listErrors() ?>
                </div>
              <?php endif; ?>
              <form method="POST" action="<?= base_url('member/updatePassword') ?>">
                <div class="form-group">
                  <label for="password_lama">Password Lama</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="password_lama" name="password_lama" required>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" id="toggleOldPassword"><i class="fas fa-eye"></i></button>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="new_password">Password Baru</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="password_baru" name="password_baru" minlength="6" required>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword"><i class="fas fa-eye"></i></button>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="confirm_password">Konfirmasi Password Baru</label>
                  <div class="input-group">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" minlength="6" required>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword"><i class="fas fa-eye"></i></button>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Update Password</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer">
    <div class="container-fluid d-flex justify-content-between">
      <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">BSDev © 2024 All Rights Reserved.</span>
    </div>
  </footer>
</div>


<?= $this->endSection() ?>