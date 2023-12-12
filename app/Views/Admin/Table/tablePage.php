<?= $this->extend('Templates/AdminTemplate/Layout'); ?>

<?= $this->section('content'); ?>
<!-- wrapper -->
<section class=" ">
    <div class="" id="">
        <p class="text-[1rem] poppins font-semibold text-center m-auto mb-[1rem] uppercase text-lime-500" id="statusMessage"><?= session()->get('success') ?></p>
    </div>

    <!-- container -->
    <div class="w-auto h-auto flex justify-around p-[1rem]">


        <!-- Box 1  -->
        <div class="card border-[3px] border-black" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title poppins font-semibold text-[1rem]">Jumlah Table</h5>
                <p class="card-text poppins font-bold text-[2rem] "><?php echo $totalTable ?></p>
            </div>
        </div>

        <!-- Box 2  -->
        <div class="card border-[3px] border-black" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title poppins font-semibold text-[1rem]">Table Dibooking</h5>
                <p class="card-text poppins font-bold text-[2rem] "><?php echo $totalBookingTable ?></p>
            </div>
        </div>

        <!-- Box 3  -->
        <div class="card border-[3px] border-black" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title poppins font-semibold text-[1rem]">Table Active</h5>
                <p class="card-text poppins font-bold text-[2rem] "><?php echo $totalActiveTable ?></p>
            </div>
        </div>

    </div>

    <!-- buttons -->
    <div class="py-[1rem] p-[2rem]">
        <a href="/tambahTable" type="button" class="btn btn-outline-dark float-right">Tambah Table</a>
    </div>

    <!-- start table -->
    <div class="w-auto h-auto p-[1rem] m-[2rem] border-2 border-black rounded-md">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Table</th>
                    <th scope="col">Status</th>
                    <th scope="col">Nonaktifkan</th>
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
                            <a type="button" onclick="statusVisibility()" href="/logoutTable/<?= $table['id']; ?>" class="btn btn-outline-danger"><i class='bx bxs-minus-circle'></i></a>
                        </td>
                        <td>
                            <!-- Tambahkan aksi untuk setiap data menu -->
                            <a type="button" href="/editTable/<?= $table['id']; ?>" class="btn btn-outline-warning"><i class='bx bxs-edit-alt'></i></a>

                            <form action="/deleteTable/<?= $table['id']; ?>" method="post" class="d-inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" onclick="return confirm('Apakah anda ingin menghapus menu ini?')" class="btn btn-outline-danger"><i class='bx bxs-trash'></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<script>
    setTimeout(function() {
        document.getElementById('statusMessage').style.display = 'none';
    }, 3000); // Hapus pesan setelah 3 detik (atur waktu sesuai kebutuhan)
</script>
<?= $this->endSection(); ?>