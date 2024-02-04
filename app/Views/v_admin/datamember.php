<?= $this->extend('templates_admin/main'); ?>

<?= $this->section('content'); ?>


<?= $this->include('templates_admin/header') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-account-group"></i>
                </span> Data Member
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span><a href="<?= base_url('dashboard'); ?>" style='text-decoration : none;'>Dashboard</a></span>/Data Member <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
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
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-plus"></i> Tambah
                    </button>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Member</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('user/create') ?>" method="post">
                                                <!-- Add form fields for name, email, password, and confirmation password -->
                                                <div class="form-group">
                                                    <label for="nama">Nama:</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                                </div>
                                                <div class="form-group">
                                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select form-select-md" id="exampleInputEmail1">
                                                        <option selected disabled>Jenis Kelamin</option>
                                                        <option value="Laki-laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email:</label>
                                                    <input type="email" class="form-control" id="email" name="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password:</label>
                                                    <input type="password" class="form-control" id="password" name="password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="confirm_password">Konfirmasi Password:</label>
                                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
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
                                    <thead class="table">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Jenis Kelamin</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Tanggal Bergabung</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $index => $user) : ?>
                                            <tr>
                                                <td><?= $index + 1; ?></td>
                                                <td><?= $user['nama']; ?></td>
                                                <td><?= $user['email']; ?></td>
                                                <td><?= $user['jenis_kelamin']; ?></td>
                                                <td>

                                                    <?php if ($user['status'] == 'Aktif') : ?>
                                                        <span class="badge bg-success"><?= $user['status']; ?></span>
                                                    <?php elseif ($user['status'] == 'Tidak Aktif') : ?>
                                                        <span class="badge bg-danger"><?= $user['status']; ?></span>
                                                    <?php else : ?>
                                                        <?= $user['status']; ?>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $user['created_at']; ?></td>
                                                <td>
                                                    <!-- Edit Button -->
                                                    <a href="<?= base_url('user/show/' . $user['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="<?= base_url('user/delete/' . $user['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
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
        </div>
    </div>
</div>



<?= $this->endSection() ?>