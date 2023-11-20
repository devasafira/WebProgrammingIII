<?= $this->extend('Templates/AdminTemplate/Layout'); ?>

<?= $this->section('content'); ?>
<!-- wrapper -->
<section class=" ">
    <!-- container -->
    <div class="w-auto h-auto flex justify-around p-[1rem]">

        <!-- Box 1  -->
        <div class="card border-[3px] border-black" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title poppins font-semibold text-[1rem]">Jumlah Table</h5>
                <p class="card-text poppins font-bold text-[2rem] ">23</p>
            </div>
        </div>

        <!-- Box 2  -->
        <div class="card border-[3px] border-black" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title poppins font-semibold text-[1rem]">Table Dibooking</h5>
                <p class="card-text poppins font-bold text-[2rem] ">23</p>
            </div>
        </div>

        <!-- Box 3  -->
        <div class="card border-[3px] border-black" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title poppins font-semibold text-[1rem]">Table Active</h5>
                <p class="card-text poppins font-bold text-[2rem] ">23</p>
            </div>
        </div>

    </div>

    <!-- buttons -->
    <div class="py-[1rem] p-[2rem]">
        <button type="button" class="btn btn-outline-dark float-right">Tambah Table</button>
    </div>

    <!-- start table -->
    <div class="w-auto h-auto p-[1rem] m-[2rem] border-2 border-black rounded-md">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Table</th>
                    <th scope="col">Status</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tables as $table) : ?>
                    <tr>
                        <td><?= $table['id']; ?></td>
                        <td><?= $table['table_number']; ?></td>
                        <td><?= $table['status']; ?></td>
                        <td>
                            <!-- Tambahkan aksi untuk setiap data menu -->
                            <button type="button" href="/editTable" <?= $table['id']; ?> class="btn btn-outline-warning"><i class='bx bxs-edit-alt'></i></button>
                            <button type="button" href="/deleteTable" <?= $table['id']; ?> class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection(); ?>