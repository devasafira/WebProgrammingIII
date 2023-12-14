<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan Sushi PERBULAN <?= $selectedMonth; ?> TAHUN <?= $year; ?></title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Global.css">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table tr th,
        .table tr td {
            border: 1px solid black;
            font-size: 11pt;
            padding: 10px 10px 10px 10px;
            text-align: center;
        }

        .table tr th {
            background-color: grey;
            color: white;
        }
    </style>
</head>

<body>
    <form method="post" action="<?= base_url('laporan/filterLaporan') ?>" class="flex my-[1.5rem] gap-x-[0.5rem] ml-[1rem]">
        <div class="text-field flex flex-col justify-between gap-y-[0.5rem]">
            <select id="month" name="month" class="border-[1px] w-[7rem] border-black rounded p-[0.2rem]" type="hidden">
                <?php
                $selectedMonth = isset($month) ? $month : date('m');

                for ($i = 1; $i <= 12; $i++) {
                    $monthValue = str_pad($i, 2, '0', STR_PAD_LEFT); // Ensure two-digit month value
                    $monthName = date('F', mktime(0, 0, 0, $i, 1));
                    $selected = ($monthValue == $selectedMonth) ? 'selected' : '';
                    echo "<option value=\"$monthValue\" $selected>$monthName</option>";
                }
                ?>
            </select>
        </div>

        <div class="text-field flex flex-col justify-between gap-y-[0.5rem]">
            <select id="year" name="year" class="border-[1px] w-[4rem] border-black rounded p-[0.2rem]">
                <?php
                $selectedYear = isset($year) ? $year : date('Y');
                $startYear = date('Y') - 3;
                $currentYear = (date('Y') - $startYear) + 1;

                for ($i = $startYear; $i < $startYear + $currentYear; $i++) {
                    $selected = ($i == $selectedYear) ? 'selected' : '';
                    echo "<option value=\"$i\" $selected>$i</option>";
                }
                ?>
            </select>
        </div>
        <!-- button -->
        <button type="submit" class="border-[1px] border-black rounded px-[1rem] mx-[0.5rem] hover:bg-[#202920] hover:text-white" value="Submit">Filter</button>
    </form>

    <h2>
        <center>LAPORAN PENJUALAN SUSHIGO BULAN <?= $selectedMonth; ?> TAHUN <?= $year; ?></center>
    </h2>
    <h4>Bulan : <?= $selectedMonth; ?> / <?= $year; ?></h4>
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

</body>

</html>