<!-- app/Views/User/Menu/KonfirmasiPilihan.php -->
<?= $this->extend('Templates/UserTemplate/Layout'); ?>

<?= $this->section('content'); ?>

<section class="w-screen h-auto overflow-x-hidden">
    <div class="box">
        <div class="center" style="background: #12171b;">
            <h1>Konfirmasi Pilihan</h1>
            <p>Anda telah memilih meja <?= $selectedTable['table_number'] ?>.</p>
            <p>Nama Pembeli: <?= $namaPembeli ?></p>
            <a class="addmenu-table" href="/menu">Kembali ke Menu</a>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>
