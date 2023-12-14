<?= $this->extend('Templates/UserTemplate/Layout'); ?>

<?= $this->section('content'); ?>

<section class="w-screen h-auto overflow-x-hidden">

    <div class="w-auto h-auto px-[3rem]">
        <table class="table h-[85vh] poppins">
            <thead>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php if (empty($carts)) : ?>
                    <div class="text-center poppins absolute top-[35%] right-[43%]">
                        <h2>Tidak ada menu yang dipesan</h2>
                    </div>
                <?php endif; ?>
                <?php foreach ($carts as $cart) : ?>
                    <tr class="cart-item">
                        <td><?= $cart['nama_menu']; ?></td>
                        <td class="hidden"><?= $cart['nama_menu']; ?></td>
                        <td class="item-price"><?= $cart['harga']; ?></td>
                        <td><?= $cart['jumlah']; ?></td>
                        <td class="subtotal"><?= $cart['harga'] * $cart['jumlah']; ?></td>
                        <td>
                            <form action="/cart/remove" method="post">
                                <input type="hidden" name="cart_item_id" value="<?= $cart['id'] ?>">
                                <button type="submit" class="btn btn-outline-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td><?= isset($totalKeseluruhan) ? $totalKeseluruhan : 0 ?></td>
                </tr>
                <tr class="flex">
                    <td>
                        <a class="btn btn-outline-success" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Order</a>
                        <a class="btn btn-outline-primary" href="/statusPesanan">Lihat Status Pesanan</a>
                        <a class="btn btn-outline-danger" href="/logoutUserTable/<?= $id; ?>">Cancel</a>
                        <a href="/menu" class="btn btn-outline-warning">Pilih Menu Lagi</a> <!-- Link untuk kembali ke halaman menu -->
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>


    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title poppins font-semibold text-[1.3rem]" id="exampleModalToggleLabel">Pilih Pembayaran</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <form action="<?= route_to('processOrder') ?>" method="post" class="flex flex-col">
                        <div class="form-check p-4">
                            <input type="radio" class="form-check-input" id="Dana" name="pembayaran" value="Dana">
                            <img src="https://clipground.com/images/dana-logo-1.png" alt="Dana" width="100px" height="100px">
                        </div>
                        <div class="form-check p-4">
                            <input type="radio" class="form-check-input" id="Gopay" name="pembayaran" value="Gopay">
                            <img class="" src="https://image.cermati.com/v1585904886/o81yliwckjhywelnx13a.png" alt="Gopay" width="100px" height="100px">
                        </div>
                        <div class="form-check p-4">
                            <input type="radio" class="form-check-input" id="Shopeepay" name="pembayaran" value="Shopeepay">
                            <img class="" src="https://imgkub.com/images/2022/08/07/Logo-ShopeePay-768x403.md.png" alt="Shopeepay" width="100px" height="100px">
                        </div>
                        <div>
                            
                            <p>Total yang harus dibayarkan: Rp. <?= isset($totalKeseluruhan) ? $totalKeseluruhan : 0 ?></p>
                        </div>
                            <!-- tambahkan lebih banyak input radio sesuai kebutuhan -->
                        <button class="btn btn-primary text-blue-700 hover:text-white" type="submit">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- <input class="btn btn-primary text-blue-700 hover:text-white" type="submit" value="Bayar"> -->
                </div>
            </div>
        </div>
    </div>
    <script>
        function incrementStok() {
            const stokInput = document.getElementById('stok');
            const stokValue = parseInt(stokInput.value);
            if (!isNaN(stokValue)) {
                stokInput.value = stokValue + 1;
            } else {
                stokInput.value = 1;
            }
        }

        function decrementStok() {
            const stokInput = document.getElementById('stok');
            const stokValue = parseInt(stokInput.value);
            if (!isNaN(stokValue) && stokValue > 0) {
                stokInput.value = stokValue - 1;
            }
        }

        function updateQuantity(clickedButton, change) {
            var cartItem = clickedButton.closest('.cart-item');
            var quantityElement = cartItem.querySelector('.item-quantity');
            var subtotalElement = cartItem.querySelector('.subtotal');
            var itemPriceElement = cartItem.querySelector('.item-price');

            // Dapatkan harga dan jumlah saat ini
            var itemPrice = parseFloat(itemPriceElement.textContent.replace('Harga: $', ''));
            var currentQuantity = parseInt(quantityElement.textContent);

            // Perbarui jumlah
            var newQuantity = currentQuantity + change;
            if (newQuantity < 1) {
                newQuantity = 1; // Pastikan tidak kurang dari 1
            }
            quantityElement.textContent = newQuantity;

            // Perbarui subtotal
            var newSubtotal = itemPrice * newQuantity;
            subtotalElement.textContent = 'Subtotal: $' + newSubtotal.toFixed(2);
        }
    </script>
</section>

<?= $this->endSection(); ?>