<?= $this->extend('Templates/AdminTemplate/Layout'); ?>

<?= $this->section('content'); ?>
<!-- wrapper -->
<section class="">
    <!-- container -->
    <div class="w-auto h-auto flex justify-around p-[1rem]">

        <!-- Box 1  -->
        <div class="card border-[3px] border-black" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title poppins font-semibold text-[1rem]">Jumlah Menu</h5>
                <p class="card-text poppins font-bold text-[2rem] "><?php echo $totalMenu; ?></p>
            </div>
        </div>

        <!-- Box 2  -->
        <div class="card border-[3px] border-black" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title poppins font-semibold text-[1rem]">Jumlah Kategori</h5>
                <p class="card-text poppins font-bold text-[2rem] "><?php echo $totalKategori ?></p>
            </div>
        </div>

        <!-- Box 3  -->
        <div class="card border-[3px] border-black" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title poppins font-semibold text-[1rem]">Total Stok</h5>
                <p class="card-text poppins font-bold text-[2rem] ">23</p>
            </div>
        </div>

    </div>

    <!-- buttons -->
    <div class="py-[1rem] p-[2rem]">
        <button type="button" class="btn btn-outline-dark float-right"><a href="/tambahMenu">Tambah Menu</a></button>
    </div>

    <!-- start table -->
    <div class="w-auto h-auto p-[1rem] m-[2rem] border-2 border-black rounded-md">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Menu</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                <?php foreach ($menus as $menu) : ?>
                    <tr>
                        <td>
                            <?php if (!empty($menu['gambar'])) : ?>
                                <?php $gambarPath = "/uploads/" . $menu['gambar']; ?>

                                <?php if (file_exists(FCPATH . $gambarPath)) : ?>
                                    <!-- Jika gambar ada di dalam folder, tampilkan gambar dari folder -->
                                    <img src="<?= $gambarPath; ?>" alt="<?= basename($menu['gambar']); ?>" width="100" height="100">
                                <?php else : ?>
                                    <!-- Jika gambar tidak ada di dalam folder, tampilkan gambar dari database -->
                                    <img src="<?= $menu['gambar']; ?>" alt="<?= basename($menu['gambar']); ?>" width="100" height="100">
                                <?php endif; ?>
                                
                            <?php endif; ?>
                        </td>
                        <td><?= $menu['nama_menu']; ?></td>
                        <td><?= $menu['kategori']; ?></td>
                        <td>Rp. <?= $menu['harga']; ?></td>
                        <td><?= $menu['stok']; ?></td>
                        <td>
                            <!-- Tambahkan aksi untuk setiap data menu -->
                            <a href="/editMenu/<?= $menu['id']; ?>">
                                <button type="button" class="btn btn-outline-warning"><i class='bx bxs-edit-alt'></i></button>
                            </a>

                            <form action="/deleteMenu/<?= $menu['id']; ?>" method="post" class="d-inline">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda ingin menghapus menu ini?')"><i class='bx bxs-trash'></i></button>
                            </form>


                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection(); ?>