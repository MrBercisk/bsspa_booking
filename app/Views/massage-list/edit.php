<?= $this->extend('templates_admin/main'); ?>

<?= $this->section('content'); ?>


<?= $this->include('templates_admin/header') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-format-list-numbered"></i>
                </span> Edit Massage
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span><a href="<?= base_url('dashboard'); ?>" style='text-decoration : none;'>Dashboard</a></span><span><a href="<?= base_url('massage'); ?>" style='text-decoration : none;'>/Data Massage</a></span>/Edit Massage <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
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

                            <form action="<?= base_url('massage/update/' . $massage['id']); ?>" method="post">
                                <!-- Add form fields for name, email, password, and confirmation password -->
                                <div class="form-group">
                                    <label for="jenis_massage">Jenis Massage:</label>
                                    <input type="text" class="form-control" id="jenis_massage" name="jenis_massage" value="<?= $massage['jenis_massage']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga:</label>
                                    <input type="number" class="form-control" id="harga" name="harga" value="<?= $massage['harga']; ?>" required>
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