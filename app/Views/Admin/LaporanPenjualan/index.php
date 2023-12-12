<?= $this->extend('Templates/AdminTemplate/Layout'); ?>

<?= $this->section('content'); ?>

<section class="w-auto h-auto p-[1rem]">

    <div class="row">
        <div class="card col mx-[1rem]" style="width: 18rem;">
            <div class="card-header text-center">
                PRINT
            </div>
            <div class="card-body">
                <!-- Form Print -->
                <form method="post" action="/laporan/print" class="flex ml-[1rem] my-[1rem] col">
                    <div class="text-field flex flex-col justify-between gap-y-[0.5rem]">
                        <select id="month" name="month" class="border-[1px] w-[7rem] border-black rounded p-[0.2rem]">
                            <option value="All" <?= ($selectedMonth === 'All') ? 'selected' : ''; ?>>All Data</option>
                            <option value="All Month" <?= ($selectedMonth === 'All Month') ? 'selected' : ''; ?>>All Month Data</option>
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                $monthValue = str_pad($i, 2, '0', STR_PAD_LEFT);
                                $monthName = date('F', mktime(0, 0, 0, $i, 1));
                                $selected = ($monthValue == $selectedMonth) ? 'selected' : '';
                                echo "<option value=\"$monthValue\" $selected>$monthName</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="text-field flex flex-col justify-between gap-y-[0.5rem] ml-[0.5rem]">
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
                    <div class="w-[69.5vw] flex justify-between">
                        <!-- button -->
                        <button type="submit" class="border-[1px] border-blue-700 rounded ml-[0.5rem] py-[0.2rem] px-[1rem] hover:bg-blue-700 hover:text-white" value="Submit">Print</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card col mx-[1rem]" style="width: 18rem;">
            <div class="card-header text-center">
                DOWNLOAD PDF
            </div>
            <div class="card-body">
                <!-- Form PDF -->
                <form method="post" action="/laporan/printpdf" class="flex ml-[1rem] my-[1rem] col">
                    <div class="text-field flex flex-col justify-between gap-y-[0.5rem]">
                        <select id="month" name="month" class="border-[1px] w-[7rem] border-black rounded p-[0.2rem]">
                            <option value="All" <?= ($selectedMonth === 'All') ? 'selected' : ''; ?>>All Data</option>
                            <option value="All Month" <?= ($selectedMonth === 'All Month') ? 'selected' : ''; ?>>All Month Data</option>
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                $monthValue = str_pad($i, 2, '0', STR_PAD_LEFT);
                                $monthName = date('F', mktime(0, 0, 0, $i, 1));
                                $selected = ($monthValue == $selectedMonth) ? 'selected' : '';
                                echo "<option value=\"$monthValue\" $selected>$monthName</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="text-field flex flex-col justify-between gap-y-[0.5rem] ml-[0.5rem]">
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
                    <div class="w-[69.5vw] flex justify-between">
                        <!-- button -->
                        <button type="submit" class="border-[1px] border-red-700 rounded ml-[0.5rem] py-[0.2rem] px-[1rem] hover:bg-red-700 hover:text-white" value="Submit">PDF</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card col mx-[1rem]" style="width: 18rem;">
            <div class="card-header text-center">
                DOWNLOAD EXCEL
            </div>
            <div class="card-body">
                <!-- Form Excel -->
                <form method="post" action="/laporan/excel" class="flex ml-[1rem] my-[1rem] col">
                    <div class="text-field flex flex-col justify-between gap-y-[0.5rem]">
                        <select id="month" name="month" class="border-[1px] w-[7rem] border-black rounded p-[0.2rem]">
                            <option value="All" <?= ($selectedMonth === 'All') ? 'selected' : ''; ?>>All Data</option>
                            <option value="All Month" <?= ($selectedMonth === 'All Month') ? 'selected' : ''; ?>>All Month Data</option>
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                $monthValue = str_pad($i, 2, '0', STR_PAD_LEFT);
                                $monthName = date('F', mktime(0, 0, 0, $i, 1));
                                $selected = ($monthValue == $selectedMonth) ? 'selected' : '';
                                echo "<option value=\"$monthValue\" $selected>$monthName</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="text-field flex flex-col justify-between gap-y-[0.5rem] ml-[0.5rem]">
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
                    <div class="w-[69.5vw] flex justify-between">
                        <!-- button -->
                        <button type="submit" class="border-[1px] border-green-700 rounded ml-[0.5rem] py-[0.2rem] px-[1rem] hover:bg-green-700 hover:text-white" value="Submit">Excel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- FORM FILTER -->

    <!-- Form Filter -->
    <form method="post" action="/laporan" class="flex ml-[1rem] my-[1rem]">
        <div class="text-field flex flex-col justify-between gap-y-[0.5rem]">
            <select id="month" name="month" class="border-[1px] w-[7rem] border-black rounded p-[0.2rem]">
                <option value="All" <?= ($selectedMonth === 'All') ? 'selected' : ''; ?>>All Data</option>
                <option value="All Month" <?= ($selectedMonth === 'All Month') ? 'selected' : ''; ?>>All Month Data</option>
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    $monthValue = str_pad($i, 2, '0', STR_PAD_LEFT);
                    $monthName = date('F', mktime(0, 0, 0, $i, 1));
                    $selected = ($monthValue == $selectedMonth) ? 'selected' : '';
                    echo "<option value=\"$monthValue\" $selected>$monthName</option>";
                }
                ?>
            </select>
        </div>

        <div class="text-field flex flex-col justify-between gap-y-[0.5rem] ml-[0.5rem]">
            <select id="year" name="year" class="border-[1px] w-[4rem] border-black rounded p-[0.2rem]">
                <?php
                $selectedYear = isset($year) ? $year : date('Y');
                $startYear = date('Y') - 1;
                $currentYear = (date('Y') - $startYear) + 1;

                for ($i = $startYear; $i < $startYear + $currentYear; $i++) {
                    $selected = ($i == $selectedYear) ? 'selected' : '';
                    echo "<option value=\"$i\" $selected>$i</option>";
                }
                ?>
            </select>
        </div>
        <div class="w-[69.5vw] flex justify-between">
            <!-- button -->
            <button type="submit" class="border-[1px] border-black rounded px-[1rem] mx-[0.5rem] hover:bg-[#202920] hover:text-white" value="Submit">Filter</button>
        </div>
    </form>

    <div class="">
        <div class="card" style="width: 18rem;">
            <div class="card-header">
                Menu Terfavorit
            </div>
            <div class="card-body">
                <?php foreach ($menuFavorit as $row) {
                    echo $row->nama_menu;
                    echo $row->total_pembelian;
                } ?>
            </div>
        </div>
    </div>

    <h2 class="poppins text-center text-[1.6rem] font-semibold">LAPORAN PENJUALAN SUSHIGO</h2>

    <?php if ($selectedMonth !== 'All') : ?>
        <div class="poppins font-semibold ml-[1rem]"> Bulan : <?= $selectedMonth; ?> / <?= $selectedYear; ?></div>
    <?php else : ?>
        <div class="poppins font-semibold ml-[1rem]"> Bulan : <?= $selectedMonth; ?></div>
    <?php endif; ?>


    <div class="p-[1rem]">
        <Table class="table montserrat text-center">
            <thead>
                <tr>
                    <th scope="col" class="border-[1px] border-black p-[10px]">Tanggal</th>
                    <th scope="col" class="border-[1px] border-black p-[10px]">No Invoice</th>
                    <th scope="col" class="border-[1px] border-black p-[10px]">ID Menu</th>
                    <th scope="col" class="border-[1px] border-black p-[10px]">Nama Menu</th>
                    <th scope="col" class="border-[1px] border-black p-[10px]">Jumlah Penjualan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($laporan as $data) : ?>
                    <tr>
                        <td class="border-[1px] border-black p-[10px]"><?= $data['tanggal_pembelian']; ?></td>
                        <td class="border-[1px] border-black p-[10px]"><?= $data['id']; ?></td>
                        <td class="border-[1px] border-black p-[10px]"><?= $data['id_menu']; ?></td>
                        <td class="border-[1px] border-black p-[10px]"><?= $data['nama_menu']; ?></td>
                        <td class="border-[1px] border-black p-[10px]"><?= $data['jumlah']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </Table>
    </div>

</section>

<script>
    // JavaScript untuk menambahkan opsi tahun secara dinamis hingga beberapa tahun ke depan
    document.addEventListener('DOMContentLoaded', function() {
        var yearSelect = document.getElementById('year');
        var currentYear = new Date().getFullYear();
        var endYear = currentYear + 10; // Sesuaikan dengan jumlah tahun yang ingin ditambahkan

        // Tambahkan opsi tahun hingga endYear
        for (var year = currentYear; year <= endYear; year++) {
            var option = document.createElement('option');
            option.value = year;
            option.text = year;
            yearSelect.add(option);
        }
    });
</script>

<?= $this->endSection(); ?>