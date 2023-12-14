<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok Sushi</title>
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
    <h2><center>LAPORAN STOK SUSHIGO</center></h2>
    <br>
    <h3>Tanggal : <?= $tanggal ; ?></h3>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Bahan</th>
                <th scope="col">Jumlah Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($laporanStok as $data) : ?>
                <tr>
                    <td scope="row"><?= $no++ ?></td>
                    <td><?= $data['id'] ?></td>
                    <td><?= $data['bahan'] ?></td>
                    <td><?= $data['stok'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>