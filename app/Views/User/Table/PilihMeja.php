<!-- selectTable.php -->

<?= $this->extend('Templates/UserTemplate/Layout'); ?>

<?= $this->section('content'); ?>

<section class="w-screen h-auto overflow-x-hidden">
    <div class="w-[100%] h-auto py-[5rem] poppins">
        <div class="w-[55%] h-[100%] p-[1.5rem] border-2 border-black rounded-md m-auto patternSushiBlack">
            <div class="w-auto h-auto border-[1px] border-black rounded text-center py-[1.5rem] px-[3rem] tracking-[0.1rem] bg-white">
                <div class="" id="">
                    <p class="text-[1rem] poppins font-semibold text-center m-auto mb-[1rem] uppercase text-lime-500" id="statusMessage"><?= session()->get('success') ?></p>
                </div>

                <div class="text-[2rem] poppins font-semibold mb-[5rem]">Pilih Meja</div>

                <form action="/pilihmeja" method="post">
                    <div class="text-field">
                        <label for="nama_pembeli">Nama Pembeli</label>
                        <input class="w-[15rem] border-[1px] border-black rounded" type="text" name="nama_pembeli" id="nama_pembeli" required>
                    </div>
                    <div class="textfield">
                        <label for="table_number">Nomor Meja</label>
                        <div class="textfield">
                            <label for="table"></label>
                            <select name="table_number" id="table_number">
                                <?php foreach ($tables as $table) : ?>
                                    <option value="<?= $table['id'] ?>"><?= $table['table_number'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <br>
                    <input class="py-[0.4rem] px-[1rem] text-[1rem] font-semibold border-2 border-black rounded transition duration-300 hover:scale-105" type="submit" value="Pilih Meja">
                    <a class="addmenu-table py-[0.4rem] px-[1rem] text-[1rem] font-semibold border-2 border-black rounded transition duration-300 hover:scale-105" href="/table">Back</a>
                </form>

            </div>

        </div>
    </div>
    <script>
        const tableNumberInput = document.getElementById('table');
        const selectedTable = tableNumberInput.value.trim();
        if (selectedTable !== '') {
            tableNumberInput.disabled = true;
        }
    </script>

</section>

<?= $this->endSection(); ?>