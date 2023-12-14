<?= $this->extend('Templates/AdminTemplate/Layout'); ?>

<?= $this->section('content'); ?>

<div class="w-[100%] h-auto py-[5rem] poppins">
    <div class="w-[55%] h-[100%] p-[1.5rem] border-2 border-black rounded-md m-auto patternSushiBlack">
        <div class="w-auto h-auto border-[1px] border-black rounded text-center py-[1.5rem] px-[3rem] tracking-[0.1rem] bg-white">
            <div class="" id="">
                <p class="text-[1rem] poppins font-semibold text-center m-auto mb-[1rem] uppercase text-lime-500" id="statusMessage"><?= session()->get('success') ?></p>
            </div>

            <div class="text-[2rem] poppins font-semibold mb-[5rem]">Tambah Bahan Masuk</div>

            <form action="/saveMaterialsIn" method="POST" enctype="multipart/form-data">
                <div class="text-field flex justify-between my-[1rem]">
                    <label for="tanggal">Tanggal Masuk Bahan</label>
                    <input class="w-[15rem] border-[1px] border-black rounded" type="datetime-local" name="tanggal" id="tanggal" required>
                </div>
                <div class="text-field flex justify-between my-[1rem]">
                    <label for="bahan">Nama Bahan</label>
                    <input class="w-[15rem] border-[1px] border-black rounded" type="text" name="bahan" id="bahan" required>
                </div>

                <div class="textfield flex justify-between my-[1rem]">
                    <label for="jumlah">Jumlah</label>
                    <div class="stok-input border-[1px] border-black rounded">
                        <button type="button" class="stok-btn" onclick="decrementStok()"><i class='bx bx-minus'></i></button>
                        <input type="number" name="jumlah" id="jumlah" min="0" max="999" required>
                        <button type="button" class="stok-btn" onclick="incrementStok()"><i class="bx bx-plus"></i></button>
                    </div>
                </div>

                <div class="flex justify-around mt-[2.5rem]">
                    <input class="py-[0.4rem] px-[1rem] text-[1rem] font-semibold border-2 border-black rounded transition duration-300 hover:scale-105" type="submit" value="Add">
                    <a class="addmenu-table py-[0.4rem] px-[1rem] text-[1rem] font-semibold border-2 border-black rounded transition duration-300 hover:scale-105" href="/laporanMaterialsIn">Back</a>
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