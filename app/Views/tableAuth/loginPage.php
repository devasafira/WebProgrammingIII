<?= $this->extend('Templates/AuthTemplate/Layout'); ?>

<?= $this->section('content'); ?>

<div class="w-auto h-auto flex flex-col justify-center items-center p-2">

    <div class="poppins border-[1px] border-black rounded w-[54%]">
        <div class="font-bold mb-[1.5rem] text-[1.4rem] text-center border-b-[1px] patternSushiBlack border-black p-3">
            <div class="bg-white w-[8rem] m-auto rounded">Sushi Go</div>
        </div>
    
        <div class="text-center leading-[2.5rem]">
            <div class="">Hello, <br> You have requested us to send a link to reset your password for your Sushi Go Admin Account.</div>
            <div class="">Please click button below.</div>
            <div class="my-[1.5rem]">
                <a href="" class="btn btn-outline-warning">Reset Form</a>
            </div>
            <div class="">If the token code doesn't show on your input form automatically, this is your token code :  </div>
            <br>
            <div class="mb-[1rem] font-semibold text-[0.8rem]">If you did not request a password reset, you can safely ignore this email.</div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>