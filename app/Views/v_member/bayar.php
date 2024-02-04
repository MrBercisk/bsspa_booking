<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembayaran</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.7.5/css/uikit.min.css" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .payment-container {
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            max-width: 800px;
            width: 100%;
            position: relative;
        }

        .logo {
            position: absolute;
            top: 10px;
            left: 10px;
            width: 80px;
            height: auto;
        }

        .payment-info {
            margin-bottom: 20px;
        }

        .info-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .info-label {
            flex-basis: 30%;
            font-weight: bold;
        }

        .info-value {
            flex-grow: 1;
        }

        .copy-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .copy-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="payment-container">
        <img src="<?= base_url('assets/images/logo1.png') ?>" alt="Logo" class="logo">
        <h2>Pembayaran Bank Transfer</h2>

        <?php foreach ($transaksi as $tmassage) : ?>
            <div class="payment-info">
                <div class="info-row">
                    <div class="info-label">Nomor Booking</div>
                    <div class="info-value"><?= $tmassage['nomor_booking']; ?></div>
                </div>
                <div class="info-row">
                    <div class="info-label">Nama Member</div>
                    <div class="info-value"><?= $tmassage['nama']; ?></div>
                </div>
                <div class="info-row">
                    <div class="info-label">Jenis Massage</div>
                    <div class="info-value"><?= $tmassage['jenis_massage']; ?></div>
                </div>
                <div class="info-row">
                    <div class="info-label">Status Transaksi</div>
                    <div class="info-value"><?= $tmassage['status_transaksi']; ?></div>
                </div>
                <div class="info-row">
                    <div class="info-label">Tanggal Booking</div>
                    <div class="info-value"><?= $tmassage['tanggal_booking']; ?></div>
                </div>
                <div class="info-row">
                    <div class="info-label">Harga Layanan</div>
                    <div class="info-value"><?= $tmassage['harga']; ?></div>
                </div>
                <div class="info-row">
                    <div class="info-label">Total Tagihan</div>
                    <div class="info-value"><?= $tmassage['total_bayar']; ?> (20% off)</div>
                </div>
            </div>
        <?php endforeach; ?>
        <div id="payment-info">
            <p class="payment-info-text">Nomor Rekening:</p>
            <p id="account-number">#123456789 <br>(a.n. BSDev)</p>
            <button class="copy-button" onclick="copyAccountNumber()">Salin Nomor Rekening</button>
        </div>
        <p>Silakan lakukan pembayaran</p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.7.5/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.7.5/js/uikit-icons.min.js"></script>

</body>

<script>
    /* document.addEventListener('DOMContentLoaded', function() {
        showPaymentInfo();
        setTimeout(function() {
            hidePaymentInfo();
        }, 60000);
    });

    function showPaymentInfo() {
        document.getElementById('payment-info').style.display = 'block';
    }

    function hidePaymentInfo() {
        document.getElementById('payment-info').style.display = 'none';
    }
 */
    function copyAccountNumber() {
        var accountNumber = document.getElementById('account-number').innerText;

        var tempInput = document.createElement('input');
        document.body.appendChild(tempInput);
        tempInput.value = accountNumber;
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
    }
</script>

</html>