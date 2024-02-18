<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #bspa-header {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <div id="bspa-header">
        BSpa Transaksi List
    </div>
    <table align="center">
        <thead>
            <tr>
                <th> No </th>
                <th> Nama</th>
                <th> Jenis Kelamin </th>
                <th> Jenis Massage </th>
                <th> Tanggal Booking </th>
                <th> Nama Terapis </th>
                <th> Tanggal Transaksi </th>
                <th> Status Transaksi</th>
                <th> Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($transaksi as $t) : ?>
                <tr>
                    <td> <?= $no++; ?> </td>
                    <td> <?= $t['nama']; ?> </td>
                    <td> <?= $t['jenis_kelamin']; ?> </td>
                    <td> <?= $t['jenis_massage']; ?> </td>
                    <td> <?= $t['tanggal_booking']; ?> </td>
                    <td> <?= $t['nama_terapis']; ?> </td>
                    <td> <?= $t['tanggal_transaksi']; ?> </td>
                    <td> <?= $t['status_transaksi']; ?> </td>
                    <td> <?= $t['total_bayar']; ?> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>