<?= $this->extend('templates_admin/main'); ?>

<?= $this->section('content'); ?>


<?= $this->include('templates_admin/header') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-account-group"></i>
                </span> Edit Terapis
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span><a href="<?= base_url('dashboard'); ?>" style='text-decoration : none;'>Dashboard</a></span><span><a href="<?= base_url('user'); ?>" style='text-decoration : none;'>/Data Terapis</a></span>/Edit Terapis <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
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

                            <form action="<?= base_url('terapis/update/' . $terapis['id']); ?>" method="post">
                                <div class="form-group">
                                    <label for="nama_terapis">Nama Terapis:</label>
                                    <input type="text" class="form-control" id="nama_terapis" name="nama_terapis" value="<?= $terapis['nama_terapis']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select form-select-md" id="exampleInputEmail1">
                                        <option selected disabled>Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir:</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $terapis['tempat_lahir']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $terapis['tanggal_lahir']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="status_pernikahan">Status Pernikahan:</label>
                                    <select name="status_pernikahan" id="status_pernikahan" class="form-select form-select-md" value="<?= $terapis['status_pernikahan']; ?>">
                                        <option selected disabled>Status Pernikahan</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat :</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $terapis['alamat']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">Nomor Hp:</label>
                                    <input type="tel" class="form-control" id="no_hp" name="no_hp" value="<?= $terapis['no_hp']; ?>" required>
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