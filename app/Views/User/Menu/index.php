<?= $this->extend('Templates/UserTemplate/Layout'); ?>

<?= $this->section('content'); ?>

<section class="w-screen h-auto overflow-x-hidden">

    <div class="w-screen h-auto patternSushi poppins border-[1px] border-[#df5518] text-black text-center p-3">
        <div class="p-2 bg-white border-[1px] border-[#df5518] ">
            <div class="text-[2rem] font-bold">OUR MENU  <?php
                $tableNumber = session('table_number');
                if (!empty($tableNumber)) {
                    echo " - Meja $tableNumber";
                }
                ?></div>
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
        <div>
            <div class="p-2 w-[110px] rounded-full h-auto multiply shadow hover:scale-105 transition ease-in-out">
                <a href="#appetizer"><img class="rounded-full" src="https://ichibansushi.co.id/wp-content/uploads/2023/07/SALMON-SUSHI.jpg" alt="Salmon Sushi" width="100px" height="100px"></a>
            </div>
            <div class="text-center poppins text-[1rem] mt-[1rem] px-2">Appertizer</div>
        </div>
        <div>
            <div class="p-2 w-[110px] rounded-full h-auto multiply shadow hover:scale-105 transition ease-in-out">
                <a href="#dessert"><img class="rounded-full" src="https://ichibansushi.co.id/wp-content/uploads/2023/07/SALMON-SUSHI.jpg" alt="Salmon Sushi" width="100px" height="100px"></a>
            </div>
            <div class="text-center poppins text-[1rem] mt-[1rem] px-2">Dessert</div>
        </div>
        <div>
            <div class="p-2 w-[110px] rounded-full h-auto multiply shadow hover:scale-105 transition ease-in-out">
                <a href="#sushiroll"><img class="rounded-full" src="https://ichibansushi.co.id/wp-content/uploads/2023/07/SALMON-SUSHI.jpg" alt="Salmon Sushi" width="100px" height="100px"></a>
            </div>
            <div class="text-center poppins text-[1rem] mt-[1rem] px-2">Sushi Roll</div>
        </div>

    </div>

    <?php if (empty($SushiMenus) && empty($RamenMenus) && empty($DrinkMenus) && empty($AppetizerMenus) && empty($DessertMenus) && empty($SushiRollMenus)) : ?>
        <div class="text-center poppins mt-[2rem]">
            <h2>Tidak ada menu yang tersedia</h2>
        </div>
    <?php endif; ?>

    <?php if (!empty($SushiMenus)) : ?>
        <!-- Nigiri Sushi Menus -->
        <div class="w-screen h-auto">
            <div class="p-2 my-[2rem] text-center text-[2rem] poppins font-semibold" id="nigiriSushi">Nigiri Sushi</div>
            <div class="">
                <table class="table align-middle text-center w-screen">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
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
                                    <form action="/cart/add" method="post">
                                        <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="gambar" value="<?= basename($menu['gambar']); ?>">
                                        <div class="order-btn w-[7rem] h-auto p-2 bg-[#df5518] rounded text-center">
                                            <button type="submit" name="submit" class="block text-white text-[1rem] font-bold">Add to Cart</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
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
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                                    <div class="order-btn w-[7rem] h-auto p-2 bg-[#df5518] rounded text-center">
                                        <button type="submit" name="submit" class="block text-white text-[1rem] font-bold">Add to Cart</button>
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
                            <td><?= $menu['stok']; ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                                    <div class="order-btn w-[7rem] h-auto p-2 bg-[#df5518] rounded text-center">
                                        <button type="submit" name="submit" class="block text-white text-[1rem] font-bold">Add to Cart</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($AppertizerMenus)) : ?>
        <!-- Appertizer Menus -->
        <div class="w-screen h-auto">
            <div class="p-2 my-[2rem] text-center text-[2rem] poppins font-semibold" id="appertizer">Appertizer</div>
            <div class="">
                <table class="table align-middle text-center">
                    <?php foreach ($AppertizerMenus as $menu) : ?>
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
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                                    <div class="order-btn w-[7rem] h-auto p-2 bg-[#df5518] rounded text-center">
                                        <button type="submit" name="submit" class="block text-white text-[1rem] font-bold">Add to Cart</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($DessertMenus)) : ?>
        <!-- Dessert Menus -->
        <div class="w-screen h-auto">
            <div class="p-2 my-[2rem] text-center text-[2rem] poppins font-semibold" id="dessert">Dessert</div>
            <div class="">
                <table class="table align-middle text-center">
                    <?php foreach ($DessertMenus as $menu) : ?>
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
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                                    <div class="order-btn w-[7rem] h-auto p-2 bg-[#df5518] rounded text-center">
                                        <button type="submit" name="submit" class="block text-white text-[1rem] font-bold">Add to Cart</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($SushiRollMenus)) : ?>
        <!-- SushiRollMenus -->
        <div class="w-screen h-auto">
            <div class="p-2 my-[2rem] text-center text-[2rem] poppins font-semibold" id="sushiroll">Sushi Roll</div>
            <div class="">
                <table class="table align-middle text-center">
                    <?php foreach ($SushiRollMenus as $menu) : ?>
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
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                                    <div class="order-btn w-[7rem] h-auto p-2 bg-[#df5518] rounded text-center">
                                        <button type="submit" name="submit" class="block text-white text-[1rem] font-bold">Add to Cart</button>
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

<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var orderBtn = document.querySelector('.order-btn');

        orderBtn.addEventListener('click', function() {
            // Ganti tombol menjadi Increment dan Decrement
            orderBtn.innerHTML = `
                <button onclick="decrement()">-</button>
                <span id="stok">1</span>
                <button onclick="increment()">+</button>
            `;
        });
    });

    function increment() {
        const stokInput = document.getElementById('stok');
        const stokValue = parseInt(stokInput.value);
        if (!isNaN(stokValue)) {
            stokInput.value = stokValue + 1;
        } else {
            stokInput.value = 1;
        }
    }

    function decrement() {
        const stokInput = document.getElementById('stok');
        const stokValue = parseInt(stokInput.value);
        if (!isNaN(stokValue) && stokValue > 0) {
            stokInput.value = stokValue - 1;
        }
    }
</script> -->

<?= $this->endSection(); ?>