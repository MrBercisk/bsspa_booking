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
            <div class="col-md-12 stretch-card grid-margin">
                <div class="card bg-light card-img-holder text-white">
                    <div class="card-body">
                        <h3 class="text-center text-dark"><span>Data Booking</span></h3>
                        <hr class="text-dark">
                        <div class="row">
                            <h5 class="text-dark">Nomor Booking : <strong><?= $konfirmasi['nomor_booking']; ?></strong></h5>
                            <h6 class="text-dark">Status Booking : <?= $konfirmasi['status_booking']; ?> (Status akan berubah saat anda selesai booking)</h5>
                                <hr class="text-dark">
                                <h3 class="card-title">Data Anda Sebagai Berikut :</h3>
                                <div class="col-md-12">


                                    <table class="table table-striped mt-4">
                                        <tbody>
                                            <tr>
                                                <td>Nama</td>
                                                <td><?= $nama; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?= $email; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status Member </td>
                                                <td><?= $user['status']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat Lengkap</td>
                                                <td><?= $konfirmasi['alamat']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>No Hp/Whatsapp </td>
                                                <td><?= $konfirmasi['no_hp']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Booking </td>
                                                <td><?= $konfirmasi['tanggal_booking']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Jenis/Tipe Massage </td>
                                                <td><?= $jenis_massage; ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <hr class="text-dark">


                                    <table class="table table-striped mt-4">
                                        <tbody class="text-end">
                                            <tr>
                                                <td>
                                                    <h6><strong>Total: Rp. <?= $harga; ?></strong></h6>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <form action="<?= base_url('booking/update/' . $konfirmasi['id']); ?>" method="post" role="form" class="php-email-form">
                                        <input type="hidden" name="id" value="<?= $konfirmasi['id']; ?>" />
                                        <input type="hidden" name="status_booking" value="<?= $konfirmasi['status_booking']; ?>" />
                                        <!-- Tombol Simpan -->
                                        <div class="mt-2 text-end">
                                            <a href="<?= base_url('booking/delete/' . $konfirmasi['id']); ?>" class="btn btn-danger col-lg-3">Batal</a>
                                            <button class="btn btn-primary col-lg-3 " type="submit">Proses Booking</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">

                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
                <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">BSDev © 2024 All Rights Reserved.</span>
            </div>
        </footer>
    </div>
</div>
</div>

<?= $this->endSection() ?>