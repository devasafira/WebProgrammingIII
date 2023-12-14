<?= $this->extend('Templates/UserTemplate/Layout'); ?>

<?= $this->section('content'); ?>


<div class="w-[100%] h-auto py-[5rem] poppins mb-[10rem] ">
    <div class="w-[55%] h-[100%] p-[1.5rem] border-2 border-black rounded-md m-auto patternSushiBlack">
        <div class="w-auto h-auto border-[1px] border-black rounded text-center py-[1.5rem] px-[3rem] tracking-[0.1rem] bg-white">
            <div class="" id="">
                <p class="text-[1rem] poppins font-semibold text-center m-auto mb-[1rem] uppercase text-lime-500" id="statusMessage"><?= session()->get('success') ?></p>
            </div>

            <div class="text-[2rem] poppins font-semibold mb-[5rem]">Login</div>

            <form action="/tableLogin" method="POST" enctype="multipart/form-data" >
                <div class="text-field flex justify-between my-[1rem]">
                    <label for="table_number">Table Number</label>
                    <input class="w-[15rem] border-[1px] border-black rounded" value="<?= $table['table_number']; ?>" type="text" name="table_number" id="table_number" required disabled>
                    <input class="w-[15rem] border-[1px] border-black rounded" value="<?= $table['table_number']; ?>" type="hidden" name="table_number" id="table_number" required>
                </div>

                <div class="flex justify-around mt-[2.5rem]">
                    <input class="py-[0.4rem] px-[1rem] text-[1rem] font-semibold border-2 border-black rounded transition duration-300 hover:scale-105" type="submit" value="Login">
                </div>
            </form>

<section class="w-screen h-auto overflow-x-hidden">
    <div class="w-[100%] h-auto py-[5rem] poppins">
        <div class="w-[55%] h-[100%] p-[1.5rem] border-2 border-black rounded-md m-auto patternSushiBlack">
            <div class="w-auto h-auto border-[1px] border-black rounded text-center py-[1.5rem] px-[3rem] tracking-[0.1rem] bg-white">
                <div class="" id="">
                    <p class="text-[1rem] poppins font-semibold text-center m-auto mb-[1rem] uppercase text-lime-500" id="statusMessage"><?= session()->get('success') ?></p>
                </div>

                <div class="text-[2rem] poppins font-semibold mb-[5rem]">Login</div>

                <form action="/tableLogin" method="POST" enctype="multipart/form-data">
                    <div class="text-field flex justify-between my-[1rem]">
                        <label for="nama_pembeli">Nama Pembeli</label>
                        <input class="w-[15rem] border-[1px] border-black rounded" type="text" name="nama_pembeli" id="nama_pembeli" required>
                    </div>
                    <div class="text-field flex justify-between my-[1rem]">
                        <label for="table_number">Table Number</label>
                        <input class="w-[15rem] border-[1px] border-black rounded" value="<?= $table['table_number']; ?>" type="text" name="table_number" id="table_number" required disabled>
                        <input class="w-[15rem] border-[1px] border-black rounded" value="<?= $table['table_number']; ?>" type="hidden" name="table_number" id="table_number" required>
                    </div>

                    <div class="flex justify-around mt-[2.5rem]">
                        <input class="py-[0.4rem] px-[1rem] text-[1rem] font-semibold border-2 border-black rounded transition duration-300 hover:scale-105" type="submit" value="Login">
                        <a class="addmenu-table py-[0.4rem] px-[1rem] text-[1rem] font-semibold border-2 border-black rounded transition duration-300 hover:scale-105" href="/">Back</a>
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
</section>
    <?= $this->endSection(); ?>