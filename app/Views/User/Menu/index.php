<?= $this->extend('Templates/UserTemplate/Layout'); ?>

<?= $this->section('content'); ?>

<section class="w-screen h-auto overflow-x-hidden">

    <div class="w-screen h-auto patternSushi poppins border-[1px] border-[#df5518] text-black text-center p-3">
        <div class="p-2 bg-white border-[1px] border-[#df5518] ">
            <div class="text-[2rem] font-bold">OUR MENU</div>
            <div class="text-[1.5rem] font-semibold capitalize">serve our customer the best is our job</div>
        </div>
    </div>

    <div class="flex justify-center align-center gap-x-[3.5rem] font-bold mt-[2rem]">
        <div>
            <div class="p-2 w-[110px] rounded-full h-auto multiply shadow hover:scale-105 transition ease-in-out">
                <a href="#nigiriSushi"><img class="rounded-full" src="https://ichibansushi.co.id/wp-content/uploads/2023/07/SALMON-SUSHI.jpg" alt="Salmon Sushi" width="100px" height="100px"></a>
            </div>
            <div class="text-center poppins text-[1rem] mt-[1rem] px-2">Nigiri Sushi</div>
        </div>
        <div>
            <div class="p-2 w-[110px] rounded-full h-auto multiply shadow hover:scale-105 transition ease-in-out">
                <a href="#ramen"><img class="rounded-full" src="https://ichibansushi.co.id/wp-content/uploads/2023/07/SPICY-RAMEN.jpg" alt="Salmon Sushi" width="100px" height="100px"></a>
            </div>
            <div class="text-center poppins text-[1rem] mt-[1rem] px-2">Ramen</div>
        </div>
        <div>
            <div class="p-2 w-[110px] rounded-full h-auto multiply shadow hover:scale-105 transition ease-in-out">
                <a href="#drink"><img class="rounded-full" src="https://ichibansushi.co.id/wp-content/uploads/2023/07/SALMON-SUSHI.jpg" alt="Salmon Sushi" width="100px" height="100px"></a>
            </div>
            <div class="text-center poppins text-[1rem] mt-[1rem] px-2">Drink</div>
        </div>

    </div>

    <?php if (empty($SushiMenus) && empty($RamenMenus) && empty($DrinkMenus)) : ?>
        <div class="text-center poppins mt-[2rem]">
            <h2>Tidak ada menu yang tersedia</h2>
        </div>
    <?php endif; ?>

    <?php if (!empty($SushiMenus)) : ?>
        <!-- Nigiri Sushi Menus -->
        <div class="w-screen h-auto ">
            <div class="p-2 my-[2rem] text-center text-[2rem] poppins font-semibold" id="nigiriSushi">Nigiri Sushi</div>
            <div class="">
                <table class="table align-middle text-center w-screen">
                    <?php foreach ($SushiMenus as $menu) : ?>
                        <tr>
                            <td>
                                <?php if (!empty($menu['gambar'])) : ?>
                                    <?php $gambarPath = "/uploads/" . $menu['gambar']; ?>

                                    <?php if (file_exists(FCPATH . $gambarPath)) : ?>
                                        <!-- Jika gambar ada di dalam folder, tampilkan gambar dari folder -->
                                        <img src="<?= $gambarPath; ?>" alt="<?= basename($menu['gambar']); ?>" width="150" height="150">
                                    <?php else : ?>
                                        <!-- Jika gambar tidak ada di dalam folder, tampilkan gambar dari database -->
                                        <img src="<?= $menu['gambar']; ?>" alt="<?= basename($menu['gambar']); ?>" width="150" height="150">
                                    <?php endif; ?>

                                <?php endif; ?>
                            </td>
                            <td><?= $menu['nama_menu']; ?></td>
                            <td><?= $menu['harga']; ?></td>
                            <td>
                                <form action="" method="post" class="">
                                    <div class="flex flex-row gap-x-[1rem] ml-[15%]">
                                        <input type="number" name="jumlah" id="jumlah" min='0' max='<?= $menu['stok'] ?>' class="w-auto h-auto text-[1rem] rounded border-[1px] border-black">
                                        <div class="order-btn h-auto p-2 bg-[#df5518] rounded text-center">
                                            <a href="<?= route_to('addToCart', $menu['id'], 1) ?>" name="submit" class="text-white text-[1rem] font-bold">Add to Cart</a>
                                        </div>
                                        <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($RamenMenus)) : ?>
        <!-- Ramen Menus -->
        <div class="w-screen h-auto">
            <div class="p-2 my-[2rem] text-center text-[2rem] poppins font-semibold" id="ramen">Ramen</div>
            <div class="">
                <table class="table align-middle text-center">
                    <?php foreach ($RamenMenus as $menu) : ?>
                        <tr>
                            <td>
                                <?php if (!empty($menu['gambar'])) : ?>
                                    <?php $gambarPath = "/uploads/" . $menu['gambar']; ?>

                                    <?php if (file_exists(FCPATH . $gambarPath)) : ?>
                                        <!-- Jika gambar ada di dalam folder, tampilkan gambar dari folder -->
                                        <img src="<?= $gambarPath; ?>" alt="<?= basename($menu['gambar']); ?>" width="150" height="150">
                                    <?php else : ?>
                                        <!-- Jika gambar tidak ada di dalam folder, tampilkan gambar dari database -->
                                        <img src="<?= $menu['gambar']; ?>" alt="<?= basename($menu['gambar']); ?>" width="150" height="150">
                                    <?php endif; ?>

                                <?php endif; ?>
                            </td>
                            <td><?= $menu['nama_menu']; ?></td>
                            <td><?= $menu['harga']; ?></td>
                            <td>
                                <form action="" method="post" class="">
                                    <div class="flex flex-row gap-x-[1rem] ml-[15%]">
                                        <input type="number" name="jumlah" id="jumlah" min='0' max='<?= $menu['stok'] ?>' class="w-auto h-auto text-[1rem] rounded border-[1px] border-black">
                                        <div class="order-btn h-auto p-2 bg-[#df5518] rounded text-center">
                                            <a href="<?= route_to('addToCart', $menu['id'], 1) ?>" name="submit" class="text-white text-[1rem] font-bold">Add to Cart</a>
                                        </div>
                                        <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($Drinkmenus)) : ?>
        <!-- Drink Menus -->
        <div class="w-screen h-auto">
            <div class="p-2 my-[2rem] text-center text-[2rem] poppins font-semibold" id="drink">Drinks</div>
            <div class="">
                <table class="table align-middle text-center">
                    <?php foreach ($DrinkMenus as $menu) : ?>
                        <tr>
                            <td>
                                <?php if (!empty($menu['gambar'])) : ?>
                                    <?php $gambarPath = "/uploads/" . $menu['gambar']; ?>

                                    <?php if (file_exists(FCPATH . $gambarPath)) : ?>
                                        <!-- Jika gambar ada di dalam folder, tampilkan gambar dari folder -->
                                        <img src="<?= $gambarPath; ?>" alt="<?= basename($menu['gambar']); ?>" width="150" height="150">
                                    <?php else : ?>
                                        <!-- Jika gambar tidak ada di dalam folder, tampilkan gambar dari database -->
                                        <img src="<?= $menu['gambar']; ?>" alt="<?= basename($menu['gambar']); ?>" width="150" height="150">
                                    <?php endif; ?>

                                <?php endif; ?>
                            </td>
                            <td><?= $menu['nama_menu']; ?></td>
                            <td><?= $menu['harga']; ?></td>
                            <td>
                                <form action="" method="post" class="">
                                    <div class="flex flex-row gap-x-[1rem] ml-[15%]">
                                        <input type="number" name="jumlah" id="jumlah" min='0' max='<?= $menu['stok'] ?>' class="w-auto h-auto text-[1rem] rounded border-[1px] border-black">
                                        <div class="order-btn h-auto p-2 bg-[#df5518] rounded text-center">
                                            <a href="<?= route_to('addToCart', $menu['id'], 1) ?>" name="submit" class="text-white text-[1rem] font-bold">Add to Cart</a>
                                        </div>
                                        <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    <?php endif; ?>

</section>

<?= $this->endSection(); ?>