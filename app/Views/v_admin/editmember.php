<?= $this->extend('templates_admin/main'); ?>

<?= $this->section('content'); ?>


<?= $this->include('templates_admin/header') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-account-group"></i>
                </span> Edit Member
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span><a href="<?= base_url('dashboard'); ?>" style='text-decoration : none;'>Dashboard</a></span><span><a href="<?= base_url('user'); ?>" style='text-decoration : none;'>/Data Member</a></span>/Edit Member <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="container">
            <!-- Menampilkan pesan error validasi -->
            <?php if (session()->has('validation')) : ?>
                <div class="alert alert-danger">
                    <?= session('validation')->listErrors() ?>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>

                            <form action="<?= base_url('user/update/' . $users['id']); ?>" method="post">
                                <!-- Add form fields for name, email, password, and confirmation password -->
                                <div class="form-group">
                                    <label for="status">Status Member:</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="Aktif" <?= ($users['status'] == 'Aktif') ? 'selected' : ''; ?>>Aktif</option>
                                        <option value="Tidak Aktif" <?= ($users['status'] == 'Tidak Aktif') ? 'selected' : ''; ?>>Tidak Aktif</option>
                                    </select>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>