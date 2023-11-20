<div class=" w-[17vw] h-[100vh] bg-gray-900 rounded-r-2xl mr-[1rem] fixed left-0 ">

    <div class="logo">
        <div class="p-5 text-[2rem] font-bold text-center text-white border-b-[1px] roboto-slab">Dashboard</div>
    </div>

    <div class="leading-[3.5rem] pl-5 py-10 text-[1rem] roboto-slab text-white border-b-[1px]">
        <ul>
            <li class="list" onclick="activeLink()" ><a href="/pesananAdmin"><i class='bx bxs-cart-alt mx-[0.5rem]'></i>Pemesanan</a></li>
            <li class="list" onclick="activeLink()"><a href="/menuAdmin"><i class='bx bxs-food-menu mx-[0.5rem]'></i>Menu</a></li>
            <li class="list" ><a href="/tableAdmin" ><i class='bx bx-table mx-[0.5rem]'></i>Table</a></li>
            <li class="list" ><a href="Riwayat Pesanan"><i class='bx bx-history mx-[0.5rem]'></i>Riwayat Pemesanan</a></li>
        </ul>
    </div>

    <div class="leading-[3.5rem] pl-5 py-10 text-[1.05rem] roboto-slab text-white">
        <ul>
            <li class="list"><a href="Laporan Penjualan"><i class='bx bxs-report mx-[0.5rem]' ></i>Laporan Penjualan</a></li>
            <li class="list"><a href="Laporan Stok"><i class='bx bxs-report mx-[0.5rem]' ></i>Laporan Stok</a></li>
        </ul>
    </div>
    
    <div class="leading-[3.5rem] pl-5 py-10 text-[1.05rem] roboto-slab text-white">
        <ul>
            <li class="list"><a href="/logout"><i class='bx bx-log-out mx-[0.5rem]' ></i>Logout</a></li>
        </ul>
    </div>

    <script>
        // add active class in selected list item
        // let list = document.querySelectorAll('.list');
        // for (let i=0; i<list.length; i++){
        //     list[i].onclick = function(){
        //         let j = 0;
        //         while(j < list.length){
        //             list[j++].className = 'list';
        //         }
        //         list[i].classname = 'list.active';
        //     }
        // }

       const list = document.querySelectorAll('.list');

       function activeLink(){
        list.foreach((item) =>
        
        this.classList.add('active'));
       }

       list.foreach((item) =>
       item.addEventListener('click', activeLink));

    </script>
</div>