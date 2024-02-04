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

                            <form action="<?= base_url('transaksi/create/'); ?>" method="post">
                                <!-- Add form fields for name, email, password, and confirmation password -->
                                <input type="hidden" name="booking_id" value="<?= $id ?>" readonly />
                                <div class="form-group">
                                    <label for="nama">Jenis Massage:</label>
                                    <input type="text" name="jenis_massage" class="form-control" value="<?= $jenis_massage; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga:</label>
                                    <input type="text" id="harga" name="harga" class="form-control" value="<?= $harga; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="diskon">Diskon:</label>
                                    <input type="text" id="diskon" name="diskon" class="form-control" value="<?= $diskon; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="terapis">Nama Terapis:</label>
                                    <select name="terapis_id" class="form-control">
                                        <option selected disabled>Nama Terapis:</option>
                                        <?php foreach ($terapis as $t) : ?>
                                            <option value="<?= $t['id'] ?>"><?= $t['nama_terapis'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan:</label>
                                    <select name="keterangan" class="form-control">
                                        <option selected disabled>Keterangan</option>
                                        <option value="Bookingan anda berhasil, untuk info selanjutnya silahkan hubungi terapis yang berkaitan.">Bookingan anda berhasil, untuk info selanjutnya silahkan hubungi terapis yang berkaitan.</option>
                                        <option value="Silahkan untuk melakukan pembayaran ke rekening yang tersedia.">Silahkan untuk melakukan pembayaran ke rekening yang tersedia.</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_transaksi">Tanggal Transaksi:</label>
                                    <input type="date" id="tanggal_transaksi" name="tanggal_transaksi" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="total_bayar">Total Bayar:</label>
                                    <input type="text" id="total_bayar" name="total_bayar" class="form-control" readonly>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <script>
                                    function hitungTotalBayar() {
                                        var harga = parseFloat(document.getElementById('harga').value);
                                        var diskon = parseFloat(document.getElementById('diskon').value);
                                        var totalBayar = harga - (harga * (diskon / 100));

                                        document.getElementById('total_bayar').value = totalBayar.toFixed(2);
                                    }

                                    document.getElementById('harga').addEventListener('input', hitungTotalBayar);
                                    document.getElementById('diskon').addEventListener('input', hitungTotalBayar);

                                    document.addEventListener('DOMContentLoaded', hitungTotalBayar);
                                </script>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>