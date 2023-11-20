<?= $this->extend('Templates/AdminTemplate/Layout'); ?>

<?= $this->section('content'); ?>

<div class="w-[100%] h-auto py-[5rem] poppins">
    <div class="w-[55%] h-[100%] p-[1.5rem] border-2 border-black rounded-md m-auto patternSushiBlack">
        <div class="w-auto h-auto border-[1px] border-black rounded text-center py-[1.5rem] px-[3rem] tracking-[0.1rem] bg-white">
            <div class="" id="">
                <p class="text-[1rem] poppins font-semibold text-center m-auto mb-[1rem] uppercase text-lime-500" id="statusMessage"><?= session()->get('success') ?></p>
            </div>

            <div class="text-[2rem] poppins font-semibold mb-[5rem]">Tambah Menu</div>

            <form action="/saveMenu" method="POST" enctype="multipart/form-data">
                <div class="text-field flex justify-between my-[1rem]">
                    <label for="nama_Menu">Nama Menu</label>
                    <input class="w-[15rem] border-[1px] border-black rounded" type="text" name="nama_menu" id="nama_menu" required>
                </div>
                <div class="text-field flex justify-between my-[1rem]">
                    <label for="harga">Harga</label>
                    <input class="w-[15rem] border-[1px] border-black rounded" type="text" name="harga" id="harga" required>
                </div>
                <div class="textfield flex justify-between my-[1rem]">
                    <label for="kategori">Kategori</label>
                    <select id="kategori" name="kategori" class="border-[1px] border-black rounded p-[0.2rem]">
                        <option value="Appertizer">Appertizer</option>
                        <option value="Nigiri Sushi">Nigiri Sushi</option>
                        <option value="Sushi Roll">Sushi Roll</option>
                        <option value="Ramen">Ramen</option>
                        <option value="Dessert">Dessert</option>
                        <option value="Drinks">Drinks</option>
                    </select>
                </div>

                <div class="textfield flex justify-between my-[1rem]">
                    <label for="stok">Stok</label>
                    <div class="stok-input border-[1px] border-black rounded">
                        <button type="button" class="stok-btn" onclick="decrementStok()"><i class='bx bx-minus'></i></button>
                        <input type="number" name="stok" id="stok" min="0" max="999" required>
                        <button type="button" class="stok-btn" onclick="incrementStok()"><i class="bx bx-plus"></i></button>
                    </div>
                </div>

                <div class="textfield flex justify-between my-[1rem]">
                    <label for="gambar">Gambar Menu</label>
                    <input class="w-[15rem] border-[1px] border-black rounded" type="file" id="gambar" name="gambar" accept="image/*">
                </div>

                <div class="flex justify-around mt-[2.5rem]">
                    <input class="py-[0.4rem] px-[1rem] text-[1rem] font-semibold border-2 border-black rounded transition duration-300 hover:scale-105" type="submit" value="Add">
                    <a class="addmenu-table py-[0.4rem] px-[1rem] text-[1rem] font-semibold border-2 border-black rounded transition duration-300 hover:scale-105" href="/menuAdmin">Back</a>
                </div>
            </form>
        </div>

    </div>
</div>
<script>
    setTimeout(function() {
        document.getElementById('statusMessage').style.display = 'none';
    }, 3000); // Hapus pesan setelah 3 detik (atur waktu sesuai kebutuhan)

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
</script>
<?= $this->endSection(); ?>