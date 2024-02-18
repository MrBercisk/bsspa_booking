<?= $this->extend('templates_member/main'); ?>

<?= $this->section('content'); ?>


<?= $this->include('templates_member/header') ?>


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-book"></i>
                </span> Booking
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span><a href="<?= base_url('member'); ?>" style='text-decoration : none;'>Dashboard</a></span>/Booking <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <div class="uk-alert-primary" uk-alert>
                    <a href class="uk-alert-close" uk-close></a>
                    <h5>Silahkan setelah selesai booking tunggu sampai di proses Admin dan cek halaman Transaksi.</h5>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">History Booking Anda</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Jenis Massage </th>
                                        <th> Harga </th>
                                        <th> No Hp </th>
                                        <th> Alamat</th>
                                        <th> Tanggal Booking </th>
                                        <th> Status Booking </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($data_booking)) : ?>
                                        <tr>
                                            <td colspan="7">
                                                <h6 class="text-center text-muted">Anda Belum Melakukan Booking</h6>
                                            </td>
                                        </tr>
                                    <?php else : ?>
                                        <?php $no = 1; ?>
                                        <?php foreach ($data_booking as $b) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $b['jenis_massage']; ?></td>
                                                <td><?= $b['harga']; ?></td>
                                                <td><?= $b['no_hp']; ?></td>
                                                <td><?= $b['alamat']; ?></td>
                                                <td><?= $b['tanggal_booking']; ?></td>
                                                <td><?= $b['status_booking']; ?> <?php if ($b && $b['status_booking'] == 'Pending') : ?>
                                                        <a href="<?= base_url('booking/show/' . $b['id']); ?>" class="btn btn-success btn-sm">Detail</a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 grid-margin">
                <div class="card text-dark">
                    <div class="card-body">
                        <form action="<?= base_url('booking/create') ?>" method="post">

                            <div class="form-group">
                                <label for="bidang">Jenis Massage:</label>
                                <select name="massage_id" class="form-control">
                                    <?php foreach ($massage_list as $massage) : ?>
                                        <option value="<?= $massage['id'] ?>"><?= $massage['jenis_massage'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <textarea type="text" rows="3" class="form-control" id="alamat" name="alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Nomor Hp:</label>
                                <input type="tel" class="form-control" id="no_hp" name="no_hp" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_booking">Tanggal Booking:</label>
                                <input type="date" class="form-control" id="tanggal_booking" name="tanggal_booking" required>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Book Now</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card text-dark">
                    <div class="card-body">
                        <h5>Pilih Tanggal Booking Selain Tanggal Berikut:</h5>
                        <ol>
                            <?php foreach ($jadwal as $date) : ?>
                                <li><?= $date['tanggal_booking'] ?></li>
                            <?php endforeach; ?>
                        </ol>
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
</div>

<?= $this->endSection() ?>