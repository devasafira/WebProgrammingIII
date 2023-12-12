<?= $this->extend('Templates/UserTemplate/Layout'); ?>

<?= $this->section('content'); ?>

<section class="w-screen h-[86vh] overflow-x-hidden">

    <div class="">
        

        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title poppins font-semibold text-[1.3rem]" id="exampleModalToggleLabel">Pilih Pembayaran</h5>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <form action="/submit" method="post" class="flex flex-col">
                            <div class="form-check p-4">
                                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="Dana" >
                                <img src="https://clipground.com/images/dana-logo-1.png" alt="Dana" width="100px" height="100px">
                            </div>
                            <div class="form-check p-4">
                                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="Gopay">
                                <img class="" src="https://image.cermati.com/v1585904886/o81yliwckjhywelnx13a.png" alt="Gopay" width="100px" height="100px">
                            </div>
                            <div class="form-check p-4">
                                <input type="radio" class="form-check-input" id="radio3" name="optradio" value="Shopeepay">
                                <img class="" src="https://imgkub.com/images/2022/08/07/Logo-ShopeePay-768x403.md.png" alt="Shopeepay" width="100px" height="100px">
                            </div>
                            <!-- tambahkan lebih banyak input radio sesuai kebutuhan -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary text-blue-700 hover:text-white" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        
        <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>

    </div>

</section>

<?= $this->endSection(); ?>