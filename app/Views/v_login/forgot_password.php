<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="../../assets/css/styleadmin.css">
    <!-- End layout styles -->
    <link href="<?= base_url('assets/images/logo1.png') ?>" rel="icon" />
    <link href="<?= base_url('assets/images/logo1.png') ?>" rel="apple-touch-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <h2 class="text-center">Lupa Password</h4>
                                <form action="<?= base_url('forgotPassword/create') ?>" method="POST">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Alamat Email Akun Anda" value="<?= old('email') ?>">
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Cek apakah ada notifikasi Sweet Alert
    <?php if (session()->has('sweet_alert')) : ?>
        // Mendapatkan data notifikasi dari Flashdata
        var sweetAlertData = <?= session('sweet_alert') ?>;

        // Menampilkan Sweet Alert
        Swal.fire({
            icon: sweetAlertData.success ? 'success' : 'error',
            title: sweetAlertData.message,
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    <?php endif; ?>
</script>

</html>