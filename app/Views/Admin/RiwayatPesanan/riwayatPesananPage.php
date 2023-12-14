<?= $this->extend('Templates/AdminTemplate/Layout') ; ?>

<?= $this->section('content') ; ?>
<!-- wrapper -->
<section class="">

    <!-- start table -->
    <div class="w-auto h-auto p-[1rem] m-[2rem] border-2 border-black rounded-md">
        <table class="table">
            <thead>
                <tr class="align-middle">
                    <th scope="col">No</th>
                    <th scope="col">No Invoice</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Admin</th>
                    <th scope="col">Table Number</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Total</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php $a = 1 ;?>
                <?php foreach ($histories as $history) : ?>
                <tr class="align-middle">
                    <th scope="row"><?= $a++ ; ?></th>
                    <td><a href="#"><?= $history['id'] ; ?></a></td>
                    <td><?= $history['tanggal_pembelian'] ; ?></td>
                    <td><?= $history['nama_admin'] ; ?></td>
                    <td><?= $history['table_number'] ; ?></td>
                    <td><?= $history['nama_pembeli'] ; ?></td>
                    <td><?= $history['total'] ; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection() ?>