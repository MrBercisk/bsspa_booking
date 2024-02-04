<?= $this->extend('templates_admin/main'); ?>

<?= $this->section('content'); ?>


<?= $this->include('templates_admin/header') ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-book"></i>
                </span> Data Booking
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span><a href="<?= base_url('dashboard'); ?>" style='text-decoration : none;'>Dashboard</a></span>/Data Booking <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row">
            <div class="col-12 grid-margin">
                <a href="<?php echo site_url('databooking/cetak'); ?>" class="btn btn-danger mb-3">
                    <span class="icon"><i class="fas fa-file-pdf"></i></span>
                    Cetak PDF
                </a>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> No </th>
                                        <th> Nomor Booking </th>
                                        <th> Nama Member </th>
                                        <th> Jenis Kelamin </th>
                                        <th> Jenis Massage </th>
                                        <th> No Hp </th>
                                        <th> Alamat</th>
                                        <th> Tanggal Booking </th>
                                        <th> Status Booking </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($booking as $book) : ?>
                                        <tr>
                                            <td> <?= $no++; ?> </td>

                                            <td> <?= $book['nomor_booking']; ?> </td>

                                            <td> <?= $book['nama']; ?> </td>

                                            <td> <?= $book['jenis_kelamin']; ?> </td>

                                            <td> <?= $book['jenis_massage']; ?> </td>

                                            <td> <?= $book['no_hp']; ?> </td>

                                            <td> <?= $book['alamat']; ?> </td>

                                            <td> <?= $book['tanggal_booking']; ?> </td>

                                            <td> <?= $book['status_booking']; ?> </td>

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