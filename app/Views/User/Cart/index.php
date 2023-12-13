<!-- Chart view (chart/index.php) -->

<?= $this->extend('Templates/UserTemplate/Layout'); ?>
<?= $this->section('content'); ?>

<section class="w-screen h-auto overflow-x-hidden">
    <!-- ... Bagian lain dari tampilan chart ... -->

    <div class="row payTable">
        <table class="table table-striped table-hover table-bayar">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Action</th> <!-- Kolom baru untuk tombol Remove -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $item) : ?>
                    <tr>
                        <td> <?php if (isset($item['gambar'])) : ?>
                                <?= $item['gambar'] ?>
                            <?php else : ?>
                                Gambar Tidak Tersedia
                            <?php endif; ?></td>
                        <td><?= $item['nama_menu'] ?></td>
                        <td><?= $item['harga'] ?></td>
                        <td><?= $item['jumlah'] ?></td>
                        <td>
                            <form action="/cart/remove" method="post">
                                <input type="hidden" name="cart_item_id" value="<?= $item['id']; ?>">
                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="row user-row totalTable">
        <?php if (!empty($cartItems)) : ?>
            <div class="col">
                <ul>
                    <li>Total harga</li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <li><?= $totalHarga ?></li>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <div class="row button-row">
        <form action="/cart" method="get">
            <?php if (!empty($cartItems)) : ?>
                <input type="hidden" name="nama_pembeli" value="<?= session('nama_pembeli') ?>">
                <input type="hidden" name="table_number" value="<?= session('table_number') ?>">
                <button type="submit" class="btn btn-success">Pesan</button>
            <?php endif; ?>
        </form>

        <a href="/cancelOrder" class="btn btn-sm btn-danger">Cancel</a>
        <a href="/menu" class="btn btn-sm btn-primary">Pilih Menu Lagi</a> <!-- Link untuk kembali ke halaman menu -->
    </div>
</section>

<?= $this->endSection(); ?>