<?= $this->extend('Templates/AdminTemplate/Layout') ; ?>

<?= $this->section('content') ; ?>
<!-- wrapper -->
<section class="">
    <!-- container -->
    <div class="w-auto h-auto flex justify-around p-[1rem]">

        <!-- Box 1  -->
        <div class="card border-[3px] border-black" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title poppins font-semibold text-[1rem]">Jumlah Pesanan</h5>
                <p class="card-text poppins font-bold text-[2rem] ">1</p>
            </div>
        </div>

        <!-- Box 2  -->
        <div class="card border-[3px] border-black" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title poppins font-semibold text-[1rem]">Pesanan Selesai</h5>
                <p class="card-text poppins font-bold text-[2rem] ">1</p>
            </div>
        </div>

        <!-- Box 3  -->
        <div class="card border-[3px] border-black" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title poppins font-semibold text-[1rem]">Pesanan Cancelled</h5>
                <p class="card-text poppins font-bold text-[2rem] ">1</p>
            </div>
        </div>

    </div>

    <!-- start table -->
    <div class="w-auto h-auto p-[1rem] m-[2rem] border-2 border-black rounded-md">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">No. Table</th>
                    <th scope="col">Nama Menu</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="align-middle">
                    <th scope="row">1</th>
                    <td>iya</td>
                    <td>helo</td>
                    <td>lala</td>
                    <td>500</td>
                    <td>
                        <p>selesai</p>
                        <p>tidak selesai</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection() ; ?>