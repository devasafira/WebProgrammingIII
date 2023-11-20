<?= $this->extend('Templates/AdminTemplate/Layout') ; ?>

<?= $this->section('content') ; ?>
<!-- wrapper -->
<section class="">

    <!-- start table -->
    <div class="w-auto h-auto p-[1rem] m-[2rem] border-2 border-black rounded-md">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Admin</th>
                    <th scope="col">Table Number</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Nama Menu</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr class="align-middle">
                    <th scope="row">1</th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection() ; ?>