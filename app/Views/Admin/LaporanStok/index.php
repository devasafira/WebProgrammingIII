<?= $this->extend('Templates/AdminTemplate/Layout'); ?>

<?= $this->section('content'); ?>

<section class="w-auto h-auto p-[1rem]">

    <div class="row mb-[1rem]">
        <div class="card col mx-[1rem]" style="width: 18rem;">
            <div class="card-body flex">
                <a href="/laporanMaterialsIn" class="border-[1px] border-blue-700 rounded block m-auto text-center ml-[0.5rem] py-[0.2rem] px-[1rem] hover:bg-blue-700 hover:text-white uppercase">Management Stok Bahan Masuk</a>
                <a href="/laporanMaterialsOut" class="border-[1px] border-blue-700 rounded block m-auto text-center ml-[0.5rem] py-[0.2rem] px-[1rem] hover:bg-blue-700 hover:text-white uppercase">Management Stok Bahan Keluar</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card col mx-[1rem]" style="width: 18rem;">
            <div class="card-header text-center">
                PRINT
            </div>
            <div class="card-body">
                <a href="/laporanStok/print" class="border-[1px] border-blue-700 rounded block m-auto text-center ml-[0.5rem] py-[0.2rem] px-[1rem] hover:bg-blue-700 hover:text-white">Print</a>
            </div>
        </div>
        <div class="card col mx-[1rem]" style="width: 18rem;">
            <div class="card-header text-center">
                DOWNLOAD PDF
            </div>
            <div class="card-body">
                <a href="/laporanStok/printpdf" class="border-[1px] border-red-700 rounded block m-auto text-center ml-[0.5rem] py-[0.2rem] px-[1rem] hover:bg-red-700 hover:text-white">PDF</a>
            </div>
        </div>
        <div class="card col mx-[1rem]" style="width: 18rem;">
            <div class="card-header text-center">
                DOWNLOAD EXCEL
            </div>
            <div class="card-body">
                <a href="/laporanStok/excel" class="border-[1px] border-green-700 rounded block m-auto ml-[0.5rem] text-center py-[0.2rem] px-[1rem] hover:bg-green-700 hover:text-white">Excel</a>
            </div>
        </div>
    </div>

    <h2 class="poppins text-center text-[1.6rem] font-semibold mt-[2rem]">LAPORAN STOK SUSHIGO</h2>

    <div class="poppins font-semibold ml-[1rem]"> Tanggal : <?= $tanggal; ?> </div>

    <div class="p-[1rem]">
        <Table class="table montserrat text-center">
            <thead>
                <tr>
                    <th scope="col" class="border-[1px] border-black p-[10px]">No</th>
                    <th scope="col" class="border-[1px] border-black p-[10px]">Bahan</th>
                    <th scope="col" class="border-[1px] border-black p-[10px]">Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($laporanStok as $data) : ?>
                    <tr>
                        <td class="border-[1px] border-black p-[10px]"><?= $no++; ?></td>
                        <td class="border-[1px] border-black p-[10px]"><?= $data['bahan']; ?></td>
                        <td class="border-[1px] border-black p-[10px]"><?= $data['stok']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </Table>
    </div>

</section>

<?= $this->endSection(); ?>