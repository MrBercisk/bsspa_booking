<?= $this->extend('templates_admin/main'); ?>

<?= $this->section('content'); ?>


<?= $this->include('templates_admin/header') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-account-group"></i>
                </span> Data Terapis
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span><a href="<?= base_url('dashboard'); ?>" style='text-decoration : none;'>Dashboard</a></span>/Data Terapis <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <?php if (session()->has('validation')) : ?>
            <div class="alert alert-danger">
                <?= session('validation')->listErrors() ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12 grid-margin">
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus"></i> Tambah
                </button>
                <div class="card">
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Terapis</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('terapis/create') ?>" method="post">
                                            <!-- Add form fields for name, email, password, and confirmation password -->
                                            <div class="form-group">
                                                <label for="nama_terapis">Nama Terapis:</label>
                                                <input type="text" class="form-control" id="nama_terapis" name="nama_terapis" required>
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
                                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_lahir">Tanggal Lahir:</label>
                                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="status_pernikahan">Status Pernikahan:</label>
                                                <select name="status_pernikahan" id="status_pernikahan" class="form-select form-select-md">
                                                    <option selected disabled>Status Pernikahan</option>
                                                    <option value="Menikah">Menikah</option>
                                                    <option value="Belum Menikah">Belum Menikah</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat :</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="no_hp">Nomor Hp:</label>
                                                <input type="tel" class="form-control" id="no_hp" name="no_hp" required>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Nama Terapis </th>
                                        <th> Jenis Kelamin </th>
                                        <th> Tempat Lahir </th>
                                        <th> Tanggal Lahir </th>
                                        <th> Status Pernikahan </th>
                                        <th> Alamat </th>
                                        <th> No hp </th>
                                        <th> Aksi </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($terapis as $index => $t) : ?>
                                        <tr>
                                            <td><?= $index + 1; ?></td>
                                            <td><?= $t['nama_terapis']; ?></td>
                                            <td><?= $t['jenis_kelamin']; ?></td>
                                            <td><?= $t['tempat_lahir']; ?></td>
                                            <td><?= $t['tanggal_lahir']; ?></td>
                                            <td><?= $t['status_pernikahan']; ?></td>
                                            <td><?= $t['alamat']; ?></td>
                                            <td><?= $t['no_hp']; ?></td>
                                            <td>
                                                <!-- Edit Button -->
                                                <!-- <a data-bs-toggle="modal" data-bs-target="#exampleModal2" class="btn btn-primary btn-sm">Edit</a> -->
                                                <a href="<?= base_url('terapis/show/' . $t['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="<?= base_url('terapis/delete/' . $t['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-10">

                </div>

            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>