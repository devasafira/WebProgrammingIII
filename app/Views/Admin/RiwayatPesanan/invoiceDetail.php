<?= $this->extend('Templates/AdminTemplate/Layout'); ?>

<?= $this->section('content'); ?>

<section>
    <div class="w-auto h-auto p-[1rem] m-[2rem] border-2 border-black rounded-md">
        <table class="table">
            <thead>
                <tr class="align-middle">
                    <th scope="col">No</th>
                    <th scope="col">Nama Menu</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1; ?>
                <?php foreach ($histories as $history) : ?>
                    <tr class="align-middle">
                        <th scope="row"><?= $a++; ?></th>
                        <td><?= $history['nama_menu']; ?></td>
                        <td><?= $history['harga']; ?></td>
                        <td><?= $history['jumlah']; ?></td>
                        <td><?= $history['total']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection(); ?>