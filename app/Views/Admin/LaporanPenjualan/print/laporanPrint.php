<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan Sushi</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Global.css">

    <style>
        body{
            font-family: 'Montserrat', sans-serif;
        }

        .table{
            width: 100%;
            border-collapse: collapse;
        }

        .table tr th,
        .table tr td{
            border: 1px solid black;
            font-size: 11pt;
            padding: 10px 10px 10px 10px;
            text-align: center;
        }

        .table tr th{
            background-color: grey;
            color: white;
        }
    </style>
</head>

<body>
    <br>
    <h2><center>LAPORAN PENJUALAN SUSHIGO</center></h2>
    <br>
    <?php if ($selectedMonth !== 'All') : ?>
        <h4> Bulan : <?= $selectedMonth; ?> / <?= $selectedYear; ?></h4>
    <?php else : ?>
        <h4> Bulan : <?= $selectedMonth; ?></h4>
    <?php endif; ?>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">No. Invoice</th>
                <th scope="col">ID Menu</th>
                <th scope="col">Nama Menu</th>
                <th scope="col">Jumlah Penjualan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($laporan as $data) : ?>
                <tr>
                    <td scope="row"><?= $no++ ?></td>
                    <td><?= $data['tanggal_pembelian'] ?></td>
                    <td><?= $data['id'] ?></td>
                    <td><?= $data['id_menu'] ?></td>
                    <td><?= $data['nama_menu'] ?></td>
                    <td><?= $data['jumlah'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                window.print();
            }, 1000); // Menunda pencetakan selama 1 detik setelah halaman dimuat
        });
    </script>
</body>

</html>