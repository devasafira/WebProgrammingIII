<section class="section-1 overflow-x-hidden">
    <p class="text-[1rem] poppins font-semibold text-center m-auto mb-[1rem] uppercase text-orange-500 absolute left-[0] right-[0] mx-auto" id="statusMessage"><?= session()->get('message') ?></p>

    <div class="h-[60rem] w-[100%] image">
        <div class="relative flex">
            <div class=" relative left-[10%] mt-[16%] border-2 border-white py-[20px] px-[5px] upright h-auto text-[1.055rem] text-white roboto-slab font-[200] uppercase">order online</div>
            <div class="relative left-[48%] mt-[16%] w-[170px] h-[320px] patternSushi "></div>
        </div>
        <div class="parallax-container absolute bottom-[8%] translate-y-[0] left-[45%] right-[55%]">
            <div class="parallax-title upright text-[5.8rem] font-[600] text-white border-[15px] border-white py-[5.4rem] px-[0.5rem] tracking-[1.5rem]">寿司</div>
        </div>
        <div class="flex flex-col text-center mt-[10rem] tracking-wide">
            <div class="roboto-slab text-[3rem] text-[#df5518] font-[200] mb-[1.2rem] capitalize">sushi restaurant</div>
            <div class="text-[1rem] text-white">Open: 9am - 10pm </div>
        </div>
    </div>

</section>
<script>
    setTimeout(function() {
        document.getElementById('statusMessage').style.display = 'none';
    }, 3000); // Hapus pesan setelah 3 detik (atur waktu sesuai kebutuhan)
</script>