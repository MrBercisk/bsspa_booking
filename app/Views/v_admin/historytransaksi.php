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
            <h5>Petunjuk Penggunaan : Klik di mana saja pada kolom tabel untuk merubah data yang di pilih.</h5>
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
                                        <th class="uk-table-expand">Jenis Massage</th>
                                        <th class="uk-table-shrink">Tanggal Booking</th>
                                        <th class="uk-table-expand">Nama Terapis</th>
                                        <th class="uk-width-small">Tanggal Transaksi</th>
                                        <th class="uk-width-small">Status Transaksi</th>
                                        <th class="uk-width-small">Total Bayar</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($transaksi as $tmassage) : ?>


                                        <td class="uk-table-link">
                                            <a class="uk-link-reset" href="<?= base_url('laporan/show/' . $tmassage['id']); ?>"><?= $no++; ?></a>
                                        </td>
                                        <td class="uk-table-link">
                                            <a class="uk-link-reset" href="<?= base_url('laporan/show/' . $tmassage['id']); ?>"><?= $tmassage['nama']; ?></a>
                                        </td>
                                        <td class="uk-table-link">
                                            <a class="uk-link-reset" href="<?= base_url('laporan/show/' . $tmassage['id']); ?>"><?= $tmassage['jenis_kelamin']; ?></a>
                                        </td>
                                        <td class="uk-table-link">
                                            <a class="uk-link-reset" href="<?= base_url('laporan/show/' . $tmassage['id']); ?>"><?= $tmassage['jenis_massage']; ?></a>
                                        </td>
                                        <td class="uk-table-link">
                                            <a class="uk-link-reset" href="<?= base_url('laporan/show/' . $tmassage['id']); ?>"><?= $tmassage['tanggal_booking']; ?></a>
                                        </td>
                                        <td class="uk-table-link">
                                            <a class="uk-link-reset" href="<?= base_url('laporan/show/' . $tmassage['id']); ?>"><?= $tmassage['nama_terapis']; ?></a>
                                        </td>
                                        <td class="uk-table-link">
                                            <a class="uk-link-reset" href="<?= base_url('laporan/show/' . $tmassage['id']); ?>"><?= $tmassage['tanggal_transaksi']; ?></a>
                                        </td>
                                        <td class="uk-table-link">
                                            <a class="uk-link-reset" href="<?= base_url('laporan/show/' . $tmassage['id']); ?>"><?= $tmassage['status_transaksi']; ?></a>
                                        </td>
                                        <td class="uk-table-link">
                                            <a class="uk-link-reset" href="<?= base_url('laporan/show/' . $tmassage['id']); ?>"><?= $tmassage['total_bayar']; ?></a>
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?= $this->endSection() ?>