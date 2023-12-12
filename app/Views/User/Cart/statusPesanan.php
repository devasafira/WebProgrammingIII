<?= $this->extend('Templates/UserTemplate/Layout'); ?>

<?= $this->section('content'); ?>

<section class="w-auto h-[87.5vh] overflow-hidden">
    <div class="p-5">
        <table class="table h-[75vh] poppins ">
            <thead>
                <th>No</th>
                <th>Nama Menu</th>
                <th>Jumlah</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php if (empty($pesanans)) : ?>
                    <div class="text-center poppins absolute top-[35%] right-[43%]">
                        <h2>Tidak ada yang sudah dibayar, silahkan bayar terlebih dahulu</h2>
                    </div>
                <?php endif; ?>
                <?php foreach ($pesanans as $pesanan) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pesanan['nama_menu']; ?></td>
                        <td><?= $pesanan['jumlah']; ?></td>
                        <td><?= $pesanan['status']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr class="flex">
                    <td>
                        <a class="btn btn-outline-primary" href="/cart">Back</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</section>

<?= $this->endSection(); ?>