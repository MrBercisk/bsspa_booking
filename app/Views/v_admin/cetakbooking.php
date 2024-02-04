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
        BSpa Booking List
    </div>
    <table align="center">
        <thead>
            <tr>
                <th> No </th>
                <th> Nomor Booking </th>
                <th> Nama Member </th>
                <th> Jenis Kelamin</th>
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
</body>

</html>