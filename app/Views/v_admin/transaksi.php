<?= $this->extend('templates_admin/main'); ?>

<?= $this->section('content'); ?>


<?= $this->include('templates_admin/header') ?>


<!-- partial -->
<div class="main-panel">

    <div class="content-wrapper">

        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-credit-card"></i>
                </span> Transaksi
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span><a href="<?= base_url('dashboard'); ?>" style='text-decoration : none;'>Dashboard</a></span>/Transaksi Massage <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="uk-alert-primary" uk-alert>
            <a href class="uk-alert-close" uk-close></a>
            <h5>Silahkan untuk mengupdate data booking member.</h5>

        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                
                <div class="card">
                    <div class="card-body">
                        <div class="uk-overflow-auto">
                            <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
                                <thead>
                                    <tr>
                                        <th class="uk-table-shrink">No</th>
                                        <th class="uk-table-shrink">Nama Member</th>
                                        <th class="uk-table-expand">Jenis Kelamin</th>
                                        <th class="uk-width-small">Tanggal Booking</th>
                                        <th class="uk-width-small">Jenis Massage</th>
                                        <th class="uk-table-shrink uk-text-nowrap">Status Booking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($booking as $book) : ?>

                                        <td class="uk-table-link">
                                            <a class="uk-link-reset" href="<?= base_url('transaksi/show/' . $book['id']); ?>"><?= $no++; ?></a>
                                        </td>
                                        <td class="uk-table-link">
                                            <a class="uk-link-reset" href="<?= base_url('transaksi/show/' . $book['id']); ?>"><?= $book['nama']; ?></a>
                                        </td>
                                        <td class="uk-table-link">
                                            <a class="uk-link-reset" href="<?= base_url('transaksi/show/' . $book['id']); ?>"><?= $book['jenis_kelamin']; ?></a>
                                        </td>
                                        <td class="uk-table-link">
                                            <a class="uk-link-reset" href="<?= base_url('transaksi/show/' . $book['id']); ?>"><?= $book['tanggal_booking']; ?></a>
                                        </td>
                                        <td class="uk-table-link">
                                            <a class="uk-link-reset" href="<?= base_url('transaksi/show/' . $book['id']); ?>"><?= $book['jenis_massage']; ?></a>
                                        </td>
                                        <td class="uk-table-link">
                                            <a class="uk-link-reset" href="<?= base_url('transaksi/show/' . $book['id']); ?>">

                                                <?php if ($book['status_booking'] == 'Selesai') : ?>
                                                    <span class="badge bg-success"><?= $book['status_booking']; ?></span>
                                                <?php elseif ($book['status_booking'] == 'Pending') : ?>
                                                    <span class="badge bg-warning"><?= $book['status_booking']; ?></span>
                                                <?php elseif ($book['status_booking'] == 'Belum Selesai') : ?>
                                                    <span class="badge bg-danger"><?= $book['status_booking']; ?></span>
                                                <?php else : ?>
                                                    <?= $book['status_booking']; ?>
                                                <?php endif; ?>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?= $this->endSection() ?>