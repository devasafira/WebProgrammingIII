<?= $this->extend('Templates/AdminTemplate/Layout'); ?>

<?= $this->section('content'); ?>
<!-- wrapper -->
<section class="">
    <!-- container -->
    <div class="w-auto h-auto flex justify-around p-[1rem]">

        <!-- Box 1  -->
        <div class="card border-[3px] border-black" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title poppins font-semibold text-[1rem]">Jumlah Pesanan</h5>
                <p class="card-text poppins font-bold text-[2rem] "><?php echo $totalPesanan ?></p>
            </div>
        </div>

        <!-- Box 2  -->
        <div class="card border-[3px] border-black" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title poppins font-semibold text-[1rem]">Pesanan Selesai</h5>
                <p class="card-text poppins font-bold text-[2rem] "><?php echo $totalPesananSelesai ?></p>
            </div>
        </div>

        <!-- Box 3  -->
        <div class="card border-[3px] border-black" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title poppins font-semibold text-[1rem]">Pesanan Cancelled</h5>
                <p class="card-text poppins font-bold text-[2rem] "><?php echo $totalPesananDibatalkan ?></p>
            </div>
        </div>

    </div>

    <!-- start table -->
    <div class="w-auto h-auto p-[1rem] m-[2rem] border-2 border-black rounded-md">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">No. Table</th>
                    <th scope="col">Nama Menu</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ganti Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1; ?>
                <?php foreach ($pesanans as $pesanan) : ?>
                    <tr class="align-middle">
                        <th scope="row"><?= $a++; ?></th>
                        <td><?= $pesanan['table_number']; ?></td>
                        <td>
                            <?php
                            // Cek apakah 'nama_menu' adalah array
                            if (is_array($pesanan['nama_menu'])) {
                                // Jika array, tampilkan semua elemennya
                                foreach ($pesanan['nama_menu'] as $menu_item) {
                                    echo $menu_item . '<br>';
                                }
                            } else {
                                // Jika bukan array, tampilkan nilai seperti biasa
                                echo $pesanan['nama_menu'];
                            }
                            ?>
                        </td>
                        <td><?= $pesanan['jumlah']; ?></td>
                        <td><?= $pesanan['total']; ?></td>
                        <td>
                            <div class="btn btn-outline-success"><?= $pesanan['status']; ?></div>
                        </td>
                        <td>
                            <a type="button" href="/selesaikanPesanan/<?= $pesanan['id'];?>" class="btn btn-outline-success" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Selesai"><i class='bx bxs-edit-alt'></i></a>
                            <a type="button" href="/batalkanPesanan/<?= $pesanan['id'];?>" class="btn btn-outline-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dibatalkan"><i class='bx bxs-edit-alt'></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection(); ?>