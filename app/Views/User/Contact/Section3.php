<!-- File: app/Views/contact/Section3.php -->
<?= $this->extend('Templates/UserTemplate/Layout'); ?>

<?= $this->section('content'); ?>
<head>
    <link rel="stylesheet" id="divi-style-css" href="https://www.elegantthemes.com/layouts/wp-content/themes/Divi/style-static.min.css?ver=4.23.0" type="text/css" media="all">
    <style>   
    .et_pb_section .et_pb_button_1,
   .et_pb_section {
    color: #ffffff!important;
    border-width: 2px!important; /* Menambahkan border width */
    border-style: solid!important; /* Menambahkan border style */
    border-radius: 0px;
    font-size: 16px;
    font-family: 'Roboto Slab', Georgia, "Times New Roman", serif!important;
    background-color: transparent!important; /* Membuat latar belakang transparan */
    padding-top: 16px!important;
    padding-right: 30px!important;
    padding-bottom: 16px!important;
    padding-left: 30px!important;
    transition: background-color 300ms ease 0ms, color 300ms ease 0ms; /* Menambahkan efek transisi */
}

  
.et_pb_column_4 {
    background-image: url(https://ali.sandbox.etdevs.com/divi/wp-content/uploads/sites/2/2020/07/sushi-39-1.jpg);
    padding-top: 100px;
    padding-right: 20px;
    padding-bottom: 100px;
    padding-left: 20%
}

.et_pb_section {
    padding-top: 60px;
    padding-bottom: 260px
}

.et_pb_row_3.et_pb_row,.et_pb_row_0.et_pb_row {
    padding-bottom: 0px!important;
    padding-bottom: 0px
}


.et_pb_text_6 h4 {
    font-family: 'Oswald',Helvetica,Arial,Lucida,sans-serif;
    text-transform: uppercase;
    font-size: 30px;
    line-height: 1.4em
}

.et_pb_text_8.et_pb_text,.et_pb_text_8.et_pb_text a,.et_pb_text_9.et_pb_text,.et_pb_text_9.et_pb_text a,.et_pb_text_10.et_pb_text,.et_pb_text a,.et_pb_text,.et_pb_text_10.et_pb_text a,.et_pb_text a,.et_pb_text {
    color: #df5518!important
}

.et_pb_text_9,.et_pb_text_8,.et_pb_text_10 {
    line-height: 1.6em;
    font-family: 'Roboto Slab',Georgia,"Times New Roman",serif;
    font-size: 28px;
    line-height: 1.6em
}

.et_pb_text_9 h6,.et_pb_text_8 h6,.et_pb_text_10 h6 {
    font-size: 16px;
    line-height: 1.4em
}

.et_pb_section,.et_pb_section {
    background-color: #f9f4ee!important
}

 .et_pb_section .et_pb_contact_form_container.et_pb_module  {
    color: #ffffff!important;
    border-width: 0px!important;
    border-radius: 0px;
    font-size: 16px;
    font-family: 'Roboto Slab',Georgia,"Times New Roman",serif!important;
    background-color: #df5518!important;
    padding-top: 16px!important;
    padding-right: 30px!important;
    padding-bottom: 16px!important;
    padding-left: 30px!important;
    margin-top: 20px!important
}



.et_pb_button_0,.et_pb_module {
    transition: background-color 300ms ease 0ms
}

.et_pb_row {
    padding-top: 60px!important;
    padding-right: 20px!important;
    padding-bottom: 60px!important;
    padding-left: 20px!important;
    padding-top: 60px;
    padding-right: 20px;
    padding-bottom: 60px;
    padding-left: 20px
}



.et_pb_text,.et_pb_text a {
    color: #000000!important
}

.et_pb_button_1_wrapper .et_pb_button_1,.et_pb_button_1_wrapper .et_pb_button_1:hover,.et_pb_button_0_wrapper .et_pb_button_0,.et_pb_button_0_wrapper .et_pb_button_0:hover {
    padding-top: 16px!important;
    padding-right: 30px!important;
    padding-bottom: 16px!important;
    padding-left: 30px!important
}

 .et_pb_section .et_pb_button_0 {
    color: #ffffff!important;
    border-width: 0px!important;
    border-radius: 0px;
    font-size: 16px;
    font-family: 'Roboto Slab',Georgia,"Times New Roman",serif!important;
    background-color: #df5518
}

 .et_pb_section .et_pb_button_0:hover {
    background-image: initial;
    background-color: #000000
}

.et_pb_button_1,.et_pb_button_1:after,.et_pb_button_0,.et_pb_button_0:after {
    transition: all 300ms ease 0ms
}

.et_pb_section_3.et_pb_section {
    padding-bottom: 0px;
    background-color: #f9f4ee!important
}

.et_pb_row_3, .et_pb_row_3.et_pb_row,.et_pb_row_3.et_pb_row {
    width: 100%;
    max-width: 1600px
}

.et_pb_text_6 h2 {
    font-family: 'Oswald',Helvetica,Arial,Lucida,sans-serif;
    text-transform: uppercase;
    font-size: 80px;
    line-height: 1.2em
}

.et_pb_text_6 {
    width: 100%
}

.et_pb_text_7 h2 {
    font-family: 'Roboto Slab',Georgia,"Times New Roman",serif;
    font-size: 120px;
    color: #df5518!important;
    line-height: 1.2em
}

.et_pb_text_7 h4 {
    font-family: 'Oswald',Helvetica,Arial,Lucida,sans-serif;
    text-transform: uppercase;
    font-size: 30px;
    color: #df5518!important;
    line-height: 1.4em
}

.et_pb_column_4 {
    background-image: url(https://ali.sandbox.etdevs.com/divi/wp-content/uploads/sites/2/2020/07/sushi-39-1.jpg);
    padding-top: 100px;
    padding-right: 20px;
    padding-bottom: 100px;
    padding-left: 10%
}

.et_pb_column_5 {
    padding-top: 100px;
    padding-bottom: 100px
}

.et_pb_module,.et_pb_module {
    margin-left: auto!important;
    margin-right: auto!important
}

@media only screen and (max-width: 980px) {
    
    .et_pb_text_9,.et_pb_text_8,.et_pb_text_7 h4,.et_pb_text_6 h4,.et_pb_text_10{
        font-size: 24px
    }

    .et_pb_row_1 {
        border-width: 8px
    }

    .et_pb_row_1.et_pb_row {
        padding-top: 25px!important;
        padding-right: 25px!important;
        padding-bottom: 25px!important;
        padding-left: 25px!important;
        padding-top: 25px!important;
        padding-right: 25px!important;
        padding-bottom: 25px!important;
        padding-left: 25px!important
    }

    .et_pb_text_6 h2,.et_pb_text_7 h2 {
        font-size: 44px
    }

    .et_pb_column_4 {
        padding-top: 60px;
        padding-right: 10%;
        padding-bottom: 60px;
        padding-left: 10%
    }

    .et_pb_column_5 {
        padding-top: 60px;
        padding-bottom: 60px
    }
}

@media only screen and (max-width: 767px) {
    
     .et_pb_text_7 h4,.et_pb_text_6 h4 {
        font-size: 18px
    }

    .et_pb_text_9,.et_pb_text_8,.et_pb_text_10{
        font-size: 16px
    }

    .et_pb_row_1 {
        border-width: 4px
    }

    .et_pb_row_1.et_pb_row {
        padding-top: 15px!important;
        padding-right: 15px!important;
        padding-bottom: 15px!important;
        padding-left: 15px!important;
        padding-top: 15px!important;
        padding-right: 15px!important;
        padding-bottom: 15px!important;
        padding-left: 15px!important
    }

}
    </style>
</head>

<body>
    <div class="et_pb_section et_pb_section_3 et_pb_with_background et_section_regular">
        <div class="et_pb_row et_pb_row_3 et_pb_equal_columns">
            <div class="et_pb_column et_pb_column_1_2 et_pb_column_4  et_pb_css_mix_blend_mode_passthrough">
                <div class="et_pb_module et_pb_text et_pb_text_6  et_pb_text_align_left et_pb_bg_layout_dark">
                    <div class="et_pb_text_inner">
                        <h4>Dine IN&nbsp;</h4>
                        <h2>Reserve Online</h2>
                    </div>
                </div>
                <div class="et_pb_button_module_wrapper et_pb_button_1_wrapper et_pb_button_alignment_left et_pb_module ">
                    <a class=" et_pb_button_1" href="">Book a Table</a>
                </div>
            </div>
            <div class="et_pb_column et_pb_column_1_2 et_pb_column_5  et_pb_css_mix_blend_mode_passthrough et-last-child">
                <div class="et_pb_module et_pb_text et_pb_text_7  et_pb_text_align_center et_pb_bg_layout_light">
                    <div class="et_pb_text_inner">
                        <h4>Divi</h4>
                        <h2>Sushi</h2>
                    </div>
                </div>
                <div class="et_pb_module et_pb_text et_pb_text_8  et_pb_text_align_center et_pb_bg_layout_light">
                    <div class="et_pb_text_inner">
                        <h6>Open hours</h6>
                        <p>M-F: 11am-11pm<br> S-S: 11am-9pm</p>
                    </div>
                </div>
                <div class="et_pb_module et_pb_text et_pb_text_9  et_pb_text_align_center et_pb_bg_layout_light">
                    <div class="et_pb_text_inner">
                        <h6>Call</h6>
                        <p><a href="#">(255) 352-6258</a></p>
                    </div>
                </div>
                <div class="et_pb_module et_pb_text et_pb_text_10  et_pb_text_align_center et_pb_bg_layout_light">
                    <div class="et_pb_text_inner">
                        <h6>Our Address</h6>
                        <p>1234 Divi St. #1000<br> San Francisco, CA 94220.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?= $this->endSection(); ?>
