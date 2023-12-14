<div class="overflow-x-hidden relative mb-[4rem]">

    <!-- for mobile -->
    <div class="w-screen h-[9vh] p-[1rem] px-[1.5rem] fixed top-0 left-0 right-0 bg-white z-30 sm:hidden">
        <button class="btn btn-outline-dark py-[0] px-[0.5rem] float-right" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo"><i class='bx bx-menu text-[2rem]'></i></button>
        <div class="offcanvas offcanvas-top" id="demo">
            <div class="offcanvas-header">
                <!-- <div class="flex font-[600]">
                    <h1 class="text-[1.5rem]">Sushi <span class="text-[#df5518]">Go</span></h1>
                    <p class="mx-[0.3rem] mt-[-0.1rem] text-[1.7rem] text-[#df5518]"><i class='bx bx-sushi'></i></p>
                </div> -->
                <h1 class="offcanvas-title">Heading</h1>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"><p class="text-[2rem]">x</p></button>
                <!-- <button type="button" class="btn-close text-[1rem] ml-[3rem]" data-bs-dismiss="offcanvas"><i class='bx bx-x text-[2rem]'></i></button> -->
            </div>
            <div class="offcanvas-body">
                <!-- navbar links -->
                <div class="navbar">
                    <ul class="flex flex-col text-[1.15rem] text-[500]">
                        <li class="transition ease-in duration-300 hover:text-[#df5518]"><a href="/home">Home</a></li>
                        <li class="transition ease-in duration-300 hover:text-[#df5518]"><a href="/menu">Menu</a></li>
                        <li class="transition ease-in duration-300 hover:text-[#df5518]">
                            <?php if (!empty($table_number)) : ?>
                                <p class="cursor-default capitalize font-bold"><?= esc($table_number) ?></p>
                            <?php else : ?>
                                <a href="/contact">Contact Us</a>
                            <?php endif; ?>
                            <!-- <a href="/contact">Contact Us</a> -->
                        </li>
                        <li class="mx-[1.2rem] transition ease-in duration-300 hover:text-[#df5518]"><a href="/cart"><i class='bx bxs-cart'></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- For Desktop -->
    <div class="w-[100vw] h-[9vh] p-[1rem] px-[1.5rem] fixed top-0 left-0 right-0 bg-white z-30 max-sm:hidden">
        <nav class="flex justify-between items-end poppins">
            <!-- logo and title -->
            <div class="flex font-[600]">
                <h1 class="text-[1.5rem]">Sushi <span class="text-[#df5518]">Go</span></h1>
                <p class="mx-[0.3rem] mt-[-0.1rem] text-[1.7rem] text-[#df5518]"><i class='bx bx-sushi'></i></p>
            </div>
            <!-- navbar links -->
            <div class="navbar">
                <ul class="flex text-[1.15rem] text-[500]">
                    <li class="mx-[1.2rem] transition ease-in duration-300 hover:text-[#df5518]"><a href="/home">Home</a></li>
                    <li class="mx-[1.2rem] transition ease-in duration-300 hover:text-[#df5518]"><a href="/menu">Menu</a></li>
                    <li class="mx-[1.2rem] transition ease-in duration-300 hover:text-[#df5518]">
                        <?php if (!empty($table_number)) : ?>
                            <p class="cursor-default capitalize font-bold"><?= esc($table_number) ?></p>
                        <?php else : ?>
                            <a href="/contact">Contact Us</a>
                        <?php endif; ?>
                        <!-- <a href="/contact">Contact Us</a> -->
                    </li>
                    <li class="mx-[1.2rem] transition ease-in duration-300 hover:text-[#df5518]"><a href="/cart"><i class='bx bxs-cart'></i></a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>

</html>