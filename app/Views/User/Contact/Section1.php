<!-- File: app/Views/contact/Section1.php -->
<?= $this->extend('Templates/UserTemplate/Layout'); ?>

<?= $this->section('content'); ?>
<head>
    <link rel="stylesheet" id="divi-style-css" href="https://www.elegantthemes.com/layouts/wp-content/themes/Divi/style-static.min.css?ver=4.23.0" type="text/css" media="all">
    <style>

div.et_pb_section.et_pb_section_0 {
        background-image: url(https://ali.sandbox.etdevs.com/divi/wp-content/uploads/sites/2/2020/07/sushi-40.jpg)!important
    }

    .et_pb_section_0.et_pb_section {
        padding-top: 60px;
        padding-bottom: 260px
    }

    .et_pb_row,.et_pb_row_0.et_pb_row {
        padding-bottom: 0px!important;
        padding-bottom: 0px
    }

    .et_pb_text_0 h1 {
        font-family: 'Roboto Slab',Georgia,"Times New Roman",serif;
        font-weight: 300;
        font-size: 120px;
        color: #000000!important
    }

    .h4,.et_pb_text_0 h4 {
        font-family: 'Oswald',Helvetica,Arial,Lucida,sans-serif;
        text-transform: uppercase;
        font-size: 30px;
        line-height: 1.4em
    }

    .et_pb_text,.et_pb_text a,.et_pb_text,.et_pb_text a,.et_pb_text,.et_pb_text_2.et_pb_text a,.et_pb_text_2.et_pb_text,.et_pb_text a,.et_pb_text_1.et_pb_text a,.et_pb_text_1.et_pb_text {
        color: #df5518!important
    }

    .et_pb_text_2,.et_pb_text_1{
        line-height: 1.6em;
        font-family: 'Roboto Slab',Georgia,"Times New Roman",serif;
        font-size: 28px;
        line-height: 1.6em
    }
    .et_pb_text_1 h6,.et_pb_text_2 h6 {
        font-size: 16px;
        line-height: 1.4em
    }

    .et_pb_section_1.et_pb_section,.et_pb_section_2.et_pb_section {
        background-color: #f9f4ee!important
    }

    .et_pb_row_1 {
        background-size: initial;
        background-repeat: repeat;
        background-image: url(https://ali.sandbox.etdevs.com/divi/wp-content/uploads/sites/2/2020/07/sushi-background-pattern-black.png);
        border-width: 10px;
        border-color: #000000
    }

    .et_pb_row_1.et_pb_row {
        padding-top: 40px!important;
        padding-right: 40px!important;
        padding-bottom: 40px!important;
        padding-left: 40px!important;
        margin-top: -240px!important;
        padding-top: 40px;
        padding-right: 40px;
        padding-bottom: 40px;
        padding-left: 40px
    }

    .et_pb_contact_form_0.et_pb_contact_form_container h1,.et_pb_contact_form_0.et_pb_contact_form_container h2.et_pb_contact_main_title,.et_pb_contact_form_0.et_pb_contact_form_container h3.et_pb_contact_main_title,.et_pb_contact_form_0.et_pb_contact_form_container h4.et_pb_contact_main_title,.et_pb_contact_form_0.et_pb_contact_form_container h5.et_pb_contact_main_title,.et_pb_contact_form_0.et_pb_contact_form_container h6.et_pb_contact_main_title {
        font-family: 'Poppins',Helvetica,Arial,Lucida,sans-serif;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 70px;
        color: #000000!important;
        line-height: 1.4em;
        text-align: center;
        text-shadow: 0.06em 0.06em 0em #df5518
    }

    .et_pb_contact_form_0.et_pb_contact_form_container .input,.et_pb_contact_form_0.et_pb_contact_form_container .input[type="checkbox"]+label i,.et_pb_contact_form_0.et_pb_contact_form_container .input[type="radio"]+label i {
        border-width: 2px;
        border-color: rgba(51,51,51,0.1)
    }

    .et_pb_section .et_pb_contact_form_0.et_pb_contact_form_container.et_pb_module .et_pb_button {
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

    .et_pb_section .et_pb_contact_form_0.et_pb_contact_form_container.et_pb_module .et_pb_button:before,body #page-container .et_pb_section .et_pb_contact_form_0.et_pb_contact_form_container.et_pb_module .et_pb_button:after,body #page-container .et_pb_section .et_pb_button_0:before,body #page-container .et_pb_section .et_pb_button_0:after,body #page-container .et_pb_section .et_pb_button_1:before,body #page-container .et_pb_section .et_pb_button_1:after {
        display: none!important
    }

    .et_pb_section .et_pb_contact_form_0.et_pb_contact_form_container.et_pb_module .et_pb_button:hover {
        background-image: initial!important;
        background-color: #000000!important
    }

    .et_pb_contact_form_0 .input,.et_pb_contact_form_0 .input[type="checkbox"]+label i,.et_pb_contact_form_0 .input[type="radio"]+label i {
        background-color: rgba(0,0,0,0)
    }

    .et_pb_contact_form_0 .input::-webkit-input-placeholder {
        color: #000000
    }

    .et_pb_contact_form_0 .input,.et_pb_contact_form_0 .input[type="checkbox"]+label,.et_pb_contact_form_0 .input[type="radio"]+label,.et_pb_contact_form_0 .input[type="checkbox"]:checked+label i:before,.et_pb_contact_form_0 .input::placeholder {
        color: #000000
    }

    .et_pb_contact_form_0 .input::-ms-input-placeholder {
        color: #000000
    }

    .et_pb_contact_form_0 .input::-moz-placeholder {
        color: #000000
    }

    .et_pb_button_0,.et_pb_contact_form_0.et_pb_contact_form_container.et_pb_module .et_pb_button {
        transition: background-color 300ms ease 0ms
    }

    .et_pb_contact_form_0 .input[type="radio"]:checked+label i:before {
        background-color: #000000
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

    .et_pb_section {
        padding-bottom: 0px;
        background-color: #f9f4ee!important
    }

    .et_pb_section  {
        color: #ffffff!important;
        border-color: #ffffff;
        border-radius: 0px;
        font-size: 16px;
        font-family: 'Roboto Slab',Georgia,"Times New Roman",serif!important
    }

    .et_pb_column_2 {
        background-color: #f9f4ee;
        border-width: 10px;
        border-color: #000000;
        padding-top: 60px;
        padding-right: 60px;
        padding-bottom: 60px;
        padding-left: 60px
    }

       .et_pb_module,.et_pb_module {
        margin-left: auto!important;
        margin-right: auto!important
   }

   .et_pb_button_custom {
color: #ffffff !important;
background-color: #df5518 !important;
transition: background-color 300ms ease 0ms;
font-family: 'Roboto Slab', Georgia, "Times New Roman", serif !important;
font-size: 16px;
padding-top: 16px !important;
padding-right: 30px !important;
padding-bottom: 16px !important;
padding-left: 30px !important;
border-radius: 0px;
text-shadow: 0.06em 0.06em 0em #df5518;
}

.et_pb_button_custom:hover {
background-color: #000000 !important;
box-shadow: 0.06em 0.06em 0em #df5518;
}



</style>
   
</head>

<body>
    <div class="et_pb_section et_pb_section_0 et_pb_with_background et_section_regular">
    <div class="et_pb_row et_pb_row_0">
            <div class="et_pb_column et_pb_column_2_3 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough">
                <div class="et_pb_module et_pb_text et_pb_text_0  et_pb_text_align_left et_pb_bg_layout_light">
                    <div class="et_pb_text_inner">
                        <h1>Contact Us</h1>
                    </div>
                </div>
            </div>
            <div class="et_pb_column et_pb_column_1_3 et_pb_column_1  et_pb_css_mix_blend_mode_passthrough et-last-child">
                <div class="et_pb_module et_pb_text et_pb_text_1  et_pb_text_align_left et_pb_bg_layout_light">
                    <div class="et_pb_text_inner">
                        <h6>Open hours</h6>
                        <p>M-F: 11am-11pm<br> S-S: 11am-9pm</p>
                    </div>
                </div>
                <div class="et_pb_module et_pb_text et_pb_text_2  et_pb_text_align_left et_pb_bg_layout_light">
                    <div class="et_pb_text_inner">
                        <h6>Call</h6>
                        <p><a href="#">(255) 352-6258</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="et_pb_section et_pb_section_1 et_pb_with_background et_section_regular">
    <div class="et_pb_with_border et_pb_row et_pb_row_1">
            <div class="et_pb_with_border et_pb_column_4_4 et_pb_column et_pb_column_2  et_pb_css_mix_blend_mode_passthrough et-last-child">
                <div id="et_pb_contact_form_0" class="et_pb_with_border et_pb_module et_pb_contact_form_0 et_pb_contact_form_container clearfix" data-form_unique_num="0" data-form_unique_id="">
                    <div class="et-pb-contact-message"></div>
                    <div class="et_pb_contact">
                        <form class="et_pb_contact_form clearfix" method="post" action="">
                            <p class="et_pb_contact_field et_pb_contact_field_0 et_pb_contact_field_half" data-id="name" data-type="input">
                                <label for="et_pb_contact_name_0" class="et_pb_contact_form_label">Name</label>
                                <input type="text" id="et_pb_contact_name_0" class="input" value="" name="et_pb_contact_name_0" data-required_mark="required" data-field_type="input" data-original_id="name" placeholder="Name">
                            </p>
                            <p class="et_pb_contact_field et_pb_contact_field_1 et_pb_contact_field_half et_pb_contact_field_last" data-id="email" data-type="email">
                                <label for="et_pb_contact_email_0" class="et_pb_contact_form_label">Email Address</label>
                                <input type="text" id="et_pb_contact_email_0" class="input" value="" name="et_pb_contact_email_0" data-required_mark="required" data-field_type="email" data-original_id="email" placeholder="Email Address">
                            </p>
                            <p class="et_pb_contact_field et_pb_contact_field_2 et_pb_contact_field_last" data-id="message" data-type="text">
                                <label for="et_pb_contact_message_0" class="et_pb_contact_form_label">Message</label>
                                <textarea name="et_pb_contact_message_0" id="et_pb_contact_message_0" class="et_pb_contact_message input" data-required_mark="required" data-field_type="text" data-original_id="message" placeholder="Message"></textarea>
                            </p>
                            <input type="hidden" value="et_contact_proccess" name="et_pb_contactform_submit_0">
                            <div class="et_contact_bottom_container">
                                <button class="et_pb_button_custom">Submit</button>
                            </div>
                            <input type="hidden" id="_wpnonce-et-pb-contact-form-submitted-0" name="_wpnonce-et-pb-contact-form-submitted-0" value="e8cb732677"><input type="hidden" name="_wp_http_referer" value="/layouts/food-drink/sushi-restaurant-contact-page/live-demo">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?= $this->endSection(); ?>
