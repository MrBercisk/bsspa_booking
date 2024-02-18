<?= $this->extend('templates_admin/main'); ?>

<?= $this->section('content'); ?>


<?= $this->include('templates_admin/header') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-account-group"></i>
                </span> Proses Transaksi
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span><a href="<?= base_url('dashboard'); ?>" style='text-decoration : none;'>Dashboard</a></span><span><a href="<?= base_url('user'); ?>" style='text-decoration : none;'>/Transaksi Massage</a></span>/Proses Transaksi <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
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

                            <form action="<?= base_url('laporan/update/' . $transaksi['id']); ?>>" method="post">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan:</label>
                                    <select name="keterangan" class="form-control">
                                        <option selected disabled>Keterangan</option>
                                        <option value="Bookingan anda berhasil, untuk info selanjutnya silahkan hubungi terapis yang berkaitan." <?= ($transaksi['keterangan'] == 'Bookingan anda berhasil, untuk info selanjutnya silahkan hubungi terapis yang berkaitan.') ? 'selected' : ''; ?>>Bookingan anda berhasil, untuk info selanjutnya silahkan hubungi terapis yang berkaitan.</option>
                                        <option value="Silahkan untuk melakukan pembayaran ke rekening yang tersedia." <?= ($transaksi['keterangan'] == 'Silahkan untuk melakukan pembayaran ke rekening yang tersedia.') ? 'selected' : ''; ?>>Silahkan untuk melakukan pembayaran ke rekening yang tersedia.</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status_transaksi">Status Transaksi:</label>
                                    <select name="status_transaksi" class="form-control">
                                        <option selected disabled>Status Transaksi:</option>
                                        <option value="Berhasil" <?= ($transaksi['status_transaksi'] == 'Berhasil') ? 'selected' : ''; ?>>Berhasil</option>
                                        <option value="Gagal" <?= ($transaksi['status_transaksi'] == 'Gagal') ? 'selected' : ''; ?>>Gagal</option>
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