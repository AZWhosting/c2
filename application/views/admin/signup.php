<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up | Free Online Accounting</title>
    <link rel="shortcut icon" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libraries/kendoui/styles/kendo.common.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libraries/kendoui/styles/kendo.material.min.css">
    <!-- Boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kantumruy" rel="stylesheet">

    <style>
        html, body {
            background-color: #fff;
            font-family: 'Roboto Slab', Kantumruy !important;
        }
        label {
            color: #000;
            text-transform: uppercase;
        }
        *{
            margin: 0;
            padding: 0;
        }
        .sign-up{
            width: 85%;
            margin: 0 auto;
            background: #fff;
            height: auto;
            padding-bottom: 100px;
        }
        .signup-content{
            margin: 10% 0;
            display: inline-block;
            width: 100%;
        }
        .singup-image{
            text-align: center;
        }
        .singup-image p{
            color: #8DB3DA;
            margin-top: 20px;
            font-size: 13px;
        }
        .signup-form{
            background: #01b0f1;
            padding: 57px 50px 49px;
            margin-bottom: 10px;
            color: #000000;
            float: left;
            text-align:  center;
            font-family: 'Roboto Slab', Kantumruy !important;
        }
        .signup-form input{
          font-size: 15px;
            color: #FFF;

        }
        .signup-form label{
            font-size:  18px;
            font-weight: 600;
            float: left;
        }
        .signup-form .signup-email{
            width: 100%;
            margin-top: 2px;
            padding: 3px 3px 3px 10px;
            height: 40px;
            color: #000;
            font-family: 'Roboto Slab', Kantumruy !important;
        }
        .signup-noted{
            color: #000;
            margin: 5px auto 0;
            font-size: 11px;
            text-align: center;
            width: 100%;
        }
        .textnear-logo {
            font-size: 27px;
            text-align: left;
            padding-right: 0;
        }
        .sme {
            text-transform: uppercase;
        }
        .signup-country{
            height: 37px;
            width: 100%;
            margin-top: 10px;
        }
        .btn-signup{
            background: #002161;
            color: #fff;
            border: none;
            height: 55px;
            cursor: pointer;
            width: 100%;
            font-size: 30px !important;
        }
        .signup-text-bottom{
            color: #000;
            text-align: left;
            width: 100%;
            font-size: 11px;
            margin-top: 5px;
        }
        .signup-text-bottom a{
            color: #8DB3DA;
            text-decoration: underline;
        }
        .signup-list ul li{
            width: 100%;
            float: left;
            list-style: none;

        }
        .signup-list ul li .image{
            float: left;
        }
         .signup-list ul li .image img{
            width: 100%;
        }
         .signup-list ul li .description{
            color: #fff;
            float: left;
            width: 75%;
        }
        .signup-img{
            width: 18%;
            float: left;
            margin-right: 11px;
            margin-bottom: 10px;
            text-align: center;
        }
        .signup-img:nth-child(5),
        .signup-img:nth-child(10),
        .signup-img:nth-child(15){
            margin-right: 0;
        }
        .signup-img a img{
            width: 100%;
            height: auto;
        }
        .signup-img a.active{
            float: left;
            opacity: 0.23;
        }
        .supporter{
            float: left;
            margin-top: 15px;
            width: 100%;
        }
        #siteSealFauxBadge{
            float: right;
            text-align: right;
        }
        .k-dropdown .k-input, .k-dropdown .k-state-focused .k-input, .k-menu .k-popup{
            color: #B5B5B5;
        }
        .k-dropdown .k-input, .k-dropdown .k-state-focused .k-input, .k-menu .k-popup{
            color: #000;
        }
        .company1{
            width: 100%;
            height: 40px;
            padding: 3px 3px 3px 10px;
        }
        .footer-list ul li{
            float: right;
            width: 120px;
            margin-left: 25px;
            font-size: 12px;
            list-style: none;
            color: #839ABA;
            border-right: 1px solid #fff;
        }
        .footer-list ul li:first-child{ border-right: 0; }
        .footer-list ul li a,
        .footer-list ul li a:hover{
          color: #839ABA;
        }
        @media only screen
        and (min-device-width : 768px)
        and (max-device-width : 1024px)
        and (orientation : portrait) {
        }
    </style>
    <style>
        /* FeedBack */
        a.rightfixed {
                position: relative;
            background: #1F4774;
            padding: 15px 25px;
            z-index: 99;
            color: #fff;
            border-radius: 3px;
            font-size: 12px;
            padding-left: 50px;
            cursor: pointer;
            -webkit-transition: all .5s;
            transition: all .5s;
            text-decoration: none;
            opacity: 1;
            margin-bottom: 1px;
            clear: both;
            float: none;
            left: 0;
        }
        a.rightfixed:hover {
          opacity: 1;
        }
        a.rightfixed i::before {
            color: #fff;
            top: 10px;
            left: 7px;
            font-size: 20px;
        }
        a.feedback {
            background: #a22314;
        }
        a.referral {
          background: #1b8330;
        }
        .popRightBlog {
            width: 350px;
            height: 260px;
            left: 35%;
            top: 10%;
        }
        .popRightBlog textarea{
            height: 150px;
            min-height: 150px;
            max-height: 150px;
            width: 100%;
            min-width: 100%;
            max-width: 100%;
        }
        .popRightBlog input[type=email], .popRightBlog input[type=text]{
            width: 65%;
            margin-bottom: 2px;
            padding: 5px;
            border: 1px solid #ccc;
        }
        .popRightBlog input[type=text] {
          width: 34%;
          margin-right: 2px;
        }
        a.feedback:hover {
            margin-left: -66px;
        }
        a.enquiries {
          background: url(//storage.googleapis.com/instapage-user-media/e315080c/8593373-0-s-bg.jpg) no-repeat 15px center #1F4774;
            background-size: 23px;
        }
        a.enquiries:hover {
            left: -95px;
        }
        a.referral:hover {
            margin-left: -56px;
        }
        .cover-rightfixed {
            position: fixed;
            top: 40%;
            right: -95px;
            z-index: 99999;
            text-align: left;
        }
        .enquiry-content {
            background: #fff;
            border: 1px solid #D7D7D7;
            padding: 10px 10px 0;
            position: absolute;
            width: 142px;
            right: -120px;
            font-size: 12px;
            text-align: center;
            bottom: -134px;
            -webkit-transition: all .5s;
            transition: all .5s;
            padding-bottom: 10px;
            color: #444;
            z-index: -1;
        }
        a.enquiries:hover .enquiry-content, .enquiry-content:hover {
               right: 0;
        }
        .cover {
            position: relative;
            clear: both;
        }
        .cover img {
            position: absolute;
            right: 2px;
            top: 5px;
            display: none;
        }
        .cover p.msg {
            width: 100%;
            color: #fff;
            padding: 5px 10px;
            background: #a22314;
            display: none;
        }
    </style>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
              appId      : '387834344756149',
              xfbml      : true,
              version    : 'v2.7'
            });
            FB.AppEvents.logPageView();
        };
        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</head>

<body>
    <div class="cover-rightfixed">
        <a class="rightfixed enquiries btn-rounded glyphicons no-js conversation" style="width: 142px;float:left;">
            Support
            <div class="enquiry-content">
                <p style="font-size: 14px;">Call us by<br><span style="font-weight: bold;font-size: 16px">+855 10 413 777</span><br>Mon-Fri<br>09:00 - 18:00</p>
                <div class="fb-messengermessageus"
                    messenger_app_id="1301847836514973"
                    page_id="862386433857166"
                    color="blue"
                    width="180"
                    size="standard" ></div>
            </div>
        </a>
    </div>
    <div class="container">
        <div class="sign-up">
            <dis class="signup-content">
                <div class="col-sm-6">
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-sm-2 logo-onsignup" style="width: 20%;">
                            <a href="https://banhji.com/" target="_blank">
                                <img width="100%" height="auto" alt="BanhJi Logo" src="<?php echo base_url();?>assets/industry_logos/banhji-logo-onsignup.png">
                            </a>
                        </div>
                        <div class="col-sm-10" style="width: 80%; margin-top: -10px; padding-left: 0;">
                            <h3 class="textnear-logo">
                                is <span class="fontbold">online accounting software</span> for <span class="sme">msme</span>s
                            </h3>
                        </div>
                        <div class="btn-switch">
                            <ul class="topnav pull-right" style="margin-bottom: 0; margin-right: 16px;">
                                <li role="presentation" class="dropdown" style="list-style: none;">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Languages:<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" data-bind="click: lang.changeToKh">ភាសាខ្មែរ</a></li>
                                        <li><a href="#" data-bind="click: lang.changeToEn">English</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="signup-form">
                        <form action="" method="">
                            <label data-bind="text: lang.lang.personal_information"></label><br>
                            <div class="cover">
                                <img src="<?php echo base_url();?>assets/img/form-loader.gif" class="imgLoad" />
                                <img src="<?php echo base_url();?>assets/img/form-tick.png" class="imgTick" />
                                <img src="<?php echo base_url();?>assets/img/form-cross.png" class="imgCross" />
                                <input type="email" data-bind="value: email, events: {change : emailChange}, attr: {placeholder: lang.lang.your_email}" required="required" placeholder="Your email" class="signup-email">
                                <p class="msg"></p>
                            </div>
                            <div class="cover" style="margin-top: 10px;">
                                <img src="<?php echo base_url();?>assets/img/form-loader.gif" class="imgLoad" />
                                <img src="<?php echo base_url();?>assets/img/form-tick.png" class="imgTick" />
                                <img src="<?php echo base_url();?>assets/img/form-cross.png" class="imgCross" />
                                <input required="required" type="numbers" data-bind="value: telephone, events: {change: phoneChange}, attr: {placeholder: lang.lang.your_telephone}" id="phoneInput" placeholder="Your Telephone" class="signup-email" >
                                <p class="msg"></p>
                            </div>
                            <p class="signup-noted" data-bind="text: lang.lang.we_will_use"></p>
                            <div class="cover">
                                <img src="<?php echo base_url();?>assets/img/form-loader.gif" class="imgLoad" />
                                <img src="<?php echo base_url();?>assets/img/form-tick.png" class="imgTick" />
                                <img src="<?php echo base_url();?>assets/img/form-cross.png" class="imgCross" />
                                <input required="required" type="password" data-bind="value: password, events: {change: pwdCheck}, attr: {placeholder: lang.lang.spassword}" placeholder="Password " class="signup-email" style="margin-top: 8px;">
                                <p class="msg"></p>
                            </div>

                            <p class="signup-noted" data-bind="text: lang.lang.the_minimum_requirements"></p>
                            <div class="cover">
                                <img src="<?php echo base_url();?>assets/img/form-loader.gif" class="imgLoad" />
                                <img src="<?php echo base_url();?>assets/img/form-tick.png" class="imgTick" />
                                <img src="<?php echo base_url();?>assets/img/form-cross.png" class="imgCross" />
                                <input required="required" minlength="8" type="password" data-bind="value: cPassword, events: {change: pwdChange}, attr: {placeholder: lang.lang.confirm_password}" placeholder="Confirm password " class="signup-email" style="margin-top: 8px;">
                                <p class="msg"></p>
                            </div>

                            <!-- <label>Company Information</label><br>
                            <div class="cover">
                                <img src="<?php echo base_url();?>assets/img/form-loader.gif" class="imgLoad" />
                                <img src="<?php echo base_url();?>assets/img/form-tick.png" class="imgTick" />
                                <img src="<?php echo base_url();?>assets/img/form-cross.png" class="imgCross" />
                                <input required="required" type="text" data-bind="value: name, events: {change: comChange }" placeholder="Company Name " class="signup-email">
                                <p class="msg">Company Name Required!</p>
                            </div>
                            <select class="signup-country"
                                    data-role="dropdownlist"
                                    data-bind="source: currencies, value: currency"
                                    data-text-field="country"
                                    data-value-field="id"
                                    data-option-label="Select the main Currency" style="text-align: left;">
                            </select><br>

                            <select class="signup-country"
                                    data-role="dropdownlist"
                                    data-bind="source: countries, value: country"
                                    data-text-field="name"
                                    data-value-field="id"
                                    data-option-label="Select Country" style="text-align: left;">
                            </select><br>

                            <select class="signup-country"
                                    data-role="dropdownlist"
                                    data-bind="source: types, value: type"
                                    data-text-field="name"
                                    data-value-field="id"
                                    data-option-label="Select Business Type" style="text-align: left;">
                            </select><br>

                             <select class="signup-country"
                                    data-role="dropdownlist"
                                    data-bind="source: industries, value: industry"
                                    data-text-field="name"
                                    data-value-field="id"
                                    data-option-label="Select Industry Type"
                                    data-place-holder="select one" style="text-align: left;">
                            </select><br>

                            <input style="background: #1F4E78;font-size: 20px !important; " id="signupBtn" type="button" data-bind="enabled: signupEnable, click: create" class="btn-signup" value="SIGNUP FOR FREE"><br>
                            <p class="signup-text-bottom">
                                By clicking on “signup”, you agree to the <a href="https://www.banhji.com/terms" target="_blank">Terms of Service</a>  and <a href="https://banhji.com/privacy" target="_blank">Privacy Policy</a>.
                            </p>-->
                        </form>
                    </div>
                    <!-- <span class="row" style="font-size: 13px; color: #333; text-align: center; margin: 20px; float: left;">
                            By clicking on “signup”, you agree to the
                            <a href="https://www.banhji.com/terms" target="_blank" style="color: #333;">Terms of Service</a>
                            and
                            <a href="https://banhji.com/privacy" target="_blank" style="color: #333;">Privacy Policy</a>.
                        </span> -->
                    <div class="" style="font-size: 12px; text-align: center">
                        *Problem with "Signup", Please contact us by +855 10 413 777 from Mon-Fri at 9am to 6pm or
                            <div class="fb-messengermessageus"
                                messenger_app_id="1301847836514973"
                                page_id="862386433857166"
                                color="blue"
                                width="180"
                                size="standard" style="margin-top: 5px;">
                            </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="cover">
                        <img src="<?php echo base_url();?>assets/img/form-loader.gif" class="imgLoad" />
                        <img src="<?php echo base_url();?>assets/img/form-tick.png" class="imgTick" />
                        <img src="<?php echo base_url();?>assets/img/form-cross.png" class="imgCross" />
                        <input class="company1" required="required" type="text" data-bind="value: name, events: {change: comChange }, attr: {placeholder: lang.lang.company_name}" placeholder="Company Name " class="signup-email">
                        <p class="msg">Company Name Required!</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" style="padding-right: 0;">
                            <select class="signup-country"
                                    data-role="dropdownlist"
                                    data-bind="source: currencies, value: currency"
                                    data-text-field="country"
                                    data-value-field="id"
                                    data-option-label="Select the main Currency" style="text-align: left; border: 1px solid #d0cfd5;">
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select class="signup-country"
                                    data-role="dropdownlist"
                                    data-bind="source: countries, value: country"
                                    data-text-field="name"
                                    data-value-field="id"
                                    data-option-label="Select Country" style="text-align: left; border: 1px solid #d0cfd5;">
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" style="padding-right: 0;">
                            <select class="signup-country"
                                data-role="dropdownlist"
                                data-bind="source: types, value: type"
                                data-text-field="name"
                                data-value-field="id"
                                data-option-label="Select Business Type" style="text-align: left; border: 1px solid #d0cfd5;">
                            </select>
                        </div>
                        <!-- <div class="col-sm-6"">
                            <input type="date"
                                class="k-input"
                                data-role="datepicker"
                                label="Fiscal Date">

                        </div> -->
                        <!-- <div class="col-sm-6">
                            <select class="signup-country"
                                data-role="dropdownlist"
                                data-bind="source: industries, value: industry"
                                data-text-field="name"
                                data-value-field="id"
                                data-option-label="Select Industry Type"
                                data-place-holder="select one" style="text-align: left; border: 1px solid #d0cfd5;">
                            </select>
                        </div> -->
                    </div>
                    <div>
                        <div class="col-sm-6" style="padding-right: 0;">
                            <p style="font-size: 12px; margin-bottom: 0; float: left; margin-top: 13px" data-bind="text: lang.lang.please_select_the_industry"></p>
                        </div>
                        <div class="col-sm-6" style="padding-right: 0;">

                        </div>
                    </div>
                    <div class="row-fluid" style="color: #333; margin-top: 8px;">

                        <div class="col-sm-12" style="padding: 0;">
                            <div class="signup-img" style="height: 110px; margin-bottom: 8px;">
                                <a class="" id="91" data-bind="click: industryClick">
                                    <img src="<?php echo base_url();?>assets/industry_logos/10.png">
                                    <p style="font-size: 10px; color: #333;" data-bind="text: lang.lang.wholesale_retail_trading"></p>
                                </a>
                            </div>
                            <div class="signup-img" style="height: 110px; margin-bottom: 8px;">
                                <a class="" id="92" data-bind="click: industryClick">
                                    <img src="<?php echo base_url();?>assets/industry_logos/9.png">
                                    <p style="font-size: 10px; color: #333;" data-bind="text: lang.lang.manufacturing"></p>
                                </a>
                            </div>
                            <div class="signup-img" style="height: 110px; margin-bottom: 8px;">
                                <a class="" id="93" data-bind="click: industryClick">
                                    <img src="<?php echo base_url();?>assets/industry_logos/11.png">
                                    <p style="font-size: 10px; color: #333;" data-bind="text: lang.lang.electricity"></p>
                                </a>
                            </div>
                            <div class="signup-img" style="height: 110px; margin-bottom: 8px;">
                                <a class="" id="94" data-bind="click: industryClick">
                                    <img src="<?php echo base_url();?>assets/industry_logos/15.png">
                                    <p style="font-size: 10px; color: #333;" data-bind="text: lang.lang.swater"></p>
                                </a>
                            </div>
                            <div class="signup-img" style="height: 110px; margin-bottom: 8px;">
                                <a class="" id="95" data-bind="click: industryClick">
                                    <img src="<?php echo base_url();?>assets/industry_logos/4.png">
                                    <p style="font-size: 10px; color: #333;" data-bind="text: lang.lang.financial_institutions"></p>
                                </a>
                            </div>

                            <div class="signup-img" style="height: 110px;">
                                <a class="" id="89" data-bind="click: industryClick">
                                    <img src="<?php echo base_url();?>assets/industry_logos/13.png">
                                    <p style="font-size: 10px; color: #333;" data-bind="text: lang.lang.ngos"></p>
                                </a>
                            </div>
                            <div class="signup-img" style="height: 110px;">
                                <a class=""  id="96" data-bind="click: industryClick">
                                    <img src="<?php echo base_url();?>assets/industry_logos/7.png">
                                    <p style="font-size: 10px; color: #333;" data-bind="text: lang.lang.professional_service"></p>
                                </a>
                            </div>
                            <div class="signup-img" style="height: 110px;">
                                <a class="" id="75" data-bind="click: industryClick">
                                    <img src="<?php echo base_url();?>assets/industry_logos/3.png">
                                    <p style="font-size: 10px; color: #333;" data-bind="text: lang.lang.education"></p>
                                </a>
                            </div>
                            <div class="signup-img" style="height: 110px;">
                                <a class="" id="97" data-bind="click: industryClick">
                                    <img src="<?php echo base_url();?>assets/industry_logos/5.png">
                                    <p style="font-size: 10px; color: #333;" data-bind="text: lang.lang.information_communication"></p>
                                </a>
                            </div>
                            <div class="signup-img" style="height: 110px;">
                                <a class="" id="90" data-bind="click: industryClick">
                                    <img src="<?php echo base_url();?>assets/industry_logos/6.png">
                                    <p style="font-size: 10px; color: #333;" data-bind="text: lang.lang.others"></p>
                                </a>
                            </div>

                            <div class="signup-img">
                                <a class="" id="98" data-bind="click: industryClick">
                                    <img src="<?php echo base_url();?>assets/industry_logos/8.png">
                                    <p style="font-size: 10px; color: #333;" data-bind="text: lang.lang.real_estate_activities">
                                </a>
                            </div>
                            <div class="signup-img">
                                <a class="" id="99" data-bind="click: industryClick">
                                    <img src="<?php echo base_url();?>assets/industry_logos/12.png">
                                    <p style="font-size: 10px; color: #333;" data-bind="text: lang.lang.accomm_food"></p>
                                </a>
                            </div>
                            <div class="signup-img">
                                <a class="" id="100" data-bind="click: industryClick">
                                    <img src="<?php echo base_url();?>assets/industry_logos/14.png">
                                    <p style="font-size: 10px; color: #333;" data-bind="text: lang.lang.transportation"></p>
                                </a>
                            </div>
                            <div class="signup-img">
                                <a class="" id="101" data-bind="click: industryClick">
                                    <img src="<?php echo base_url();?>assets/industry_logos/2.png">
                                    <p style="font-size: 10px; color: #333;" data-bind="text: lang.lang.agriculture"></p>
                                </a>
                            </div>
                            <div class="signup-img">
                                <a class="" id="102" data-bind="click: industryClick">
                                    <img src="<?php echo base_url();?>assets/industry_logos/1.png">
                                    <p style="font-size: 10px; color: #333;" data-bind="text: lang.lang.construction"></p>
                                </a>
                            </div>

                        </div>
                    </div>
                    <!-- <div class="singup-image">
                        <img style="float: left;width: 67%; margin-top: -14px; margin-left: -32px;" src="<?php echo base_url(); ?>assets/signup-new.png" />
                    </div>
                    <div class="col-sm-12 signup-list">
                        <ul>
                            <li>
                                <div class="image" style="margin-bottom: -27px; width: 12%;">
                                    <img src="<?php echo base_url(); ?>assets/free.png" style="width: 100%;"/>
                                </div>
                                <div class="description" style="font-size: 12px; margin-top: 7px; width: 50%;">
                                    មិនគិតថ្លៃ ១០០% លើប្រព័ន្ធគណនេយ្យ BanhJi ព្រមទាំងសេវាគាំទ្រ 1GB storage និងចំនួនអ្នកប្រើប្រាស់មិនកំណត់
                                 </div>
                             </li>
                            <li>
                                <div  class="image" style="width: 9%; margin-left: 7px; margin-top: 20px;">
                                    <img src="<?php echo base_url(); ?>assets/language.png" style="width: 100%;"/>
                                </div>
                                <div class="description" style="color: #839ABA; font-size: 12px; margin-top: 28px; margin-left: 10px; width: 50%;">
                                    ប្រព័ន្ធគណនេយ្យយ៉ាងពេញលេញជាខេមរៈភាសា ដែលស្របតាមទម្រង់បទដ្ឋានពន្ធ និងគំរូរបាយការណ៍ហិរញ្ញវត្ថុ
                                </div>

                            </li>
                            <li>
                               <div  class="image" style="width: 9%; margin-left: 7px; margin-top: 20px;">
                                    <img src="<?php echo base_url(); ?>assets/audit.png" style="width: 100%;"/>
                                </div>
                                <div class="description" style=" font-size: 12px; margin-top: 28px; margin-left: 10px; width: 65%;">
                                    ឆ្លងកាត់ការអភិវឌ្ឍន៍ វិភាគ ត្រួតពិនិត្យ រយៈពេល ១៣៦៥ ថ្ងៃ ដោយក្រុមគណនេយ្យករ និងសវនករជំនាញ របស់ក្រុមហ៊ុន PCG & Partners Co., Ltd
                                 </div>
                            </li>
                            <li>
                                <div  class="image" style="width: 9%; margin-left: 7px; margin-top: 20px;">
                                    <img src="<?php echo base_url(); ?>assets/secure.png" style="width: 100%;"/>
                                </div>
                                <div class="description" style="color: #839ABA; font-size: 12px; margin-top: 28px; margin-left: 10px; width: 50%;">
                                    មានសុវត្ថិភាព ងាយស្រួលប្រើ ព្រមទាំងផ្តល់លទ្ធភាពវិភាគលទ្ធផល និងស្ថានភាពហិរញ្ញវត្ថុស៊ីជម្រៅ
                                 </div>
                            </li>
                            <li>
                                <div  class="image" style="width: 9%; margin-left: 7px; margin-top: 20px;">
                                    <img src="<?php echo base_url(); ?>assets/asean.png" style="width: 100%;"/>
                                </div>
                                <div class="description" style=" font-size: 12px; margin-top: 28px; margin-left: 10px; width: 50%;">
                                    មោទនភាពផលិតផលខ្មែរ ប្រើ BanhJi គឺជួយគាំទ្រផលិតផលខ្មែរ ចូលក្នុងទីផ្សារតំបន់ ASEAN
                                </div>
                            </li>
                        </ul>

                    </div> -->
                    <div class="row-fluid">
                        <input style="font-size: 20px !important; " id="signupBtn" type="button" data-bind="enabled: signupEnable, click: create" class="btn-signup" value="Signup for Free" />
                        <!-- <span data-bind="text: lang.lang.signup_for_free"></span>   -->
                    </div>
                    <span class="row" style="font-size: 12px; color: #333; text-align: center; margin: 10px 10px 0; float: left;">
                        By clicking on “signup”, you agree to the
                        <a href="https://www.banhji.com/terms" target="_blank" style="color: #01b0f1;">Terms of Service</a>
                        and
                        <a href="https://banhji.com/privacy" target="_blank" style="color: #01b0f1;">Privacy Policy</a>.
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-wrapper" style="position: fixed; width: 100%; bottom:0; left: 0;">
        <div class="footer" style="width: 100%; background: #111F3F; padding: 10px 0; color: #839ABA;">
            <div class="container">
                <div class="sign-up" style="padding-bottom: 0; background: none;">
                    <div class="row">
                        <div class="col-sm-6">
                            <div style="padding-right: 20px; border-right: 1px solid #fff; width: 7%; float: left; margin-right: 13px; ">
                                <img style="width: 30px; height: 30px; " src="https://storage.googleapis.com/instapage-user-media/e315080c/7548513-0-Banhji-Logo-3.png" />
                            </div>
                            <p style="text-align: left; margin-bottom: 0; margin-top: 7px; font-size: 13px;">Taking Fear out of Accounting</p>
                            <p style="width: 85%; margin-left: 5px; font-size: 12px; margin-top: 10px; float: left; clear: both;">&copy; <?php echo date('Y'); ?> BanhJi Pte. Ltd. All rights reserved. Terms, conditions, features, support, pricing and service options subject to change without notice.</p>
                        </div>
                        <div class="col-sm-6 footer-list">
                            <ul>
                                <li>
                                    <a href="https://banhji.com/privacy" target="_blank">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="https://www.banhji.com/terms" target="_blank">Terms of Service</a>
                                </li>
                            </ul>
                            <div class="supporter">
                                <span  id="siteseal" style="float: right; width: 28%; text-align: right; margin-left: 15px;">
                                    <script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=lNpq2OuFwU0nDcZ5f7uSQ9D1rwgIIgTNOoYBNRt4BqE4CMLt8GMhEDKt66EL"></script>
                                </span>
                                <span id="cdSiteSeal1" style="float: right; width: 28%; text-align: right;">
                                    <script type="text/javascript" src="//tracedseals.starfieldtech.com/siteseal/get?scriptId=cdSiteSeal1&amp;cdSealType=Seal1&amp;sealId=55e4ye7y7mb733e8444d2ecffd8819eq59my7mb7355e4ye7baf4c5b6a4491396"></script></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cognito -->
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/jsbn.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/jsbn2.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/sjcl.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/moment.js"></script>
    <!-- For Cognito -->
    <!--Core Cognito -->
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/aws-cognito-sdk.min.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/amazon-cognito-identity.min.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/aws-sdk.min.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/cred.js"></script>
    <!--Core Cognito -->

    <!-- jQuery -->
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/jquery.min.js"></script>
    <!-- kendoui-->
    <script src="<?php echo base_url(); ?>assets/libraries/kendoui/js/kendo.all.min.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
    <!-- Boostrap-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- File Languages-->
    <script src="<?php echo base_url()?>assets/km-KH.js"></script>
    <script src="<?php echo base_url()?>assets/en-US.js"></script>

    <script>
        /*--- Check Phone --*/
        $("#phoneInput").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                 // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                 // Allow: Ctrl+C
                (e.keyCode == 67 && e.ctrlKey === true) ||
                 // Allow: Ctrl+X
                (e.keyCode == 88 && e.ctrlKey === true) ||
                 // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                     // let it happen, don't do anything
                     return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
        /* -- end check phone --- */
        var banhji = banhji || {};
        var baseUrl = "<?php echo base_url(); ?>";
        var userPool = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserPool(poolData);
        localforage.config({
            driver: localforage.LOCALSTORAGE,
            name: 'userData'
        });


        var langVM = kendo.observable({
            lang        : null,
            localeCode  : null,
            changeToEn  : function() {
                localforage.setItem("lang", "EN").then(function(value){
                    location.reload(false);
                });
            },
            changeToKh  : function() {
                localforage.setItem("lang", "KH").then(function(value){
                    location.reload(false);
                });
            }
        });

        banhji.countries = new kendo.data.DataSource({
            transport: {
                read    : {
                    url: baseUrl + 'api/banhji/countries',
                    type: "GET",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if(operation === 'read') {
                        return {
                            limit: options.take,
                            page: options.page,
                            filter: options.filter
                        };
                    } else {
                        return {models: kendo.stringify(options.models)};
                    }
                }
            },
            schema  : {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        });

        banhji.industry = new kendo.data.DataSource({
            transport: {
                read    : {
                    url: baseUrl + 'api/banhji/industry',
                    type: "GET",
                    dataType: 'json'
                },
                parameterMap: function(options, operation) {
                    if(operation === 'read') {
                        return {
                            limit: options.take,
                            page: options.page,
                            filter: options.filter
                        };
                    } else {
                        return {models: kendo.stringify(options.models)};
                    }
                }
            },
            schema  : {
                model: {
                    id: 'id'
                },
                data: 'results',
                total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        });

        banhji.companyDS = new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + 'api/profiles/company',
              type: "GET",
              dataType: 'json'
            },
            update  : {
              url: baseUrl + 'api/profiles/company',
              type: "PUT",
              dataType: 'json'
            },
            create: {
              url: baseUrl + 'api/profiles/company',
              type: "POST",
              dataType: 'json'
            },
            parameterMap: function(options, operation) {
              if(operation === 'read') {
                return {
                  limit: options.take,
                  page: options.page,
                  filter: options.filter
                };
              } else {
                return {models: kendo.stringify(options.models)};
              }
            }
          },
          schema  : {
            model: {
              id: 'id'
            },
            data: 'results',
            total: 'count'
          },
          batch: true,
          serverFiltering: true,
          serverPaging: true,
          filter: {field: 'username', value: userPool.getCurrentUser() == null ? '': userPool.getCurrentUser().username},
          pageSize: 1
        });

        banhji.currencies = new kendo.data.DataSource({
            transport: {
              read  : {
                url: baseUrl + 'api/monetaries',
                type: "GET",
                dataType: 'json'
              },
              parameterMap: function(options, operation) {
                if(operation === 'read') {
                  return {
                    limit: options.take,
                    page: options.page,
                    filter: options.filter
                  };
                } else {
                  return {models: kendo.stringify(options.models)};
                }
              }
            },
            schema  : {
              model: {
                id: 'id'
              },
              data: 'results',
              total: 'count'
            },
            batch: true,
            serverFiltering: true,
            serverPaging: true,
            pageSize: 100
        });

        banhji.typeDS = new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + 'api/institutes/types',
              type: "GET",
              dataType: 'json'
            },
            parameterMap: function(options, operation) {
              if(operation === 'read') {
                return {
                  limit: options.take,
                  page: options.page,
                  filter: options.filter
                };
              } else {
                return {models: kendo.stringify(options.models)};
              }
            }
          },
          schema  : {
            model: {
              id: 'id'
            },
            data: 'results',
            total: 'count'
          },
          batch: true,
          serverFiltering: true,
          serverPaging: true,
          pageSize: 1
        });

        banhji.userDS = new kendo.data.DataSource({
          transport: {
            create  : {
              url: baseUrl + 'api/users/create',
              type: "POST",
              dataType: 'json'
            },
            parameterMap: function(options, operation) {
              if(operation === 'read') {
                return {
                  limit: options.take,
                  page: options.page,
                  filter: options.filter
                };
              } else {
                return {models: kendo.stringify(options.models)};
              }
            }
          },
          schema  : {
            model: {
              id: 'id'
            },
            data: 'results',
            total: 'count'
          },
          batch: true,
          serverFiltering: true,
          serverPaging: true,
          pageSize: 1
        });

        banhji.index = kendo.observable({
            lang                        : langVM,
            userDSCheck : new kendo.data.DataSource({
                transport: {
                  read  : {
                    url: baseUrl + 'api/users',
                    type: "GET",
                    dataType: 'json'
                  },
                  create  : {
                    url: baseUrl + 'api/users',
                    type: "POST",
                    dataType: 'json'
                  },
                  update  : {
                    url: baseUrl + 'api/users',
                    type: "PUT",
                    dataType: 'json'
                  },
                  parameterMap: function(options, operation) {
                    if(operation === 'read') {
                      return {
                        limit: options.take,
                        page: options.page,
                        filter: options.filter
                      };
                    } else {
                      return {models: kendo.stringify(options.models)};
                    }
                  }
                },
                schema  : {
                  model: {
                    id: 'id'
                  },
                  data: 'results',
                  total: 'count'
                },
                batch: true,
                serverFiltering: true,
                serverPaging: true,
                pageSize: 50
            }),
            industryClick: function(e) {
                let $value = $(e.currentTarget);
                let id = $value.attr('id');
                $value.addClass('active');
                $value.parent().siblings().children().removeClass('active');
                this.set('industry', id);
            },
            companyCheck : new kendo.data.DataSource({
                transport: {
                    read  : {
                      url: baseUrl + 'api/institutes',
                      type: "GET",
                      dataType: 'json'
                    },
                    parameterMap: function(options, operation) {
                      if(operation === 'read') {
                        return {
                          limit: options.take,
                          page: options.page,
                          filter: options.filter
                        };
                      } else {
                        return {models: kendo.stringify(options.models)};
                      }
                    }
                },
                schema  : {
                    model: {
                      id: 'id'
                    },
                    data: 'results',
                    total: 'count'
                },
                batch: true,
                serverFiltering: true,
                serverPaging: true,
                pageSize: 1
            }),
            email     : null,
            password  : null,
            cPassword : null,
            name      : '',
            currency  : null,
            country   : null,
            industry  : null,
            type      : null,
            telephone : null,
            countries : banhji.countries,
            industries: banhji.industry,
            types     : banhji.typeDS,
            userDS    : banhji.userDS,
            currencies: banhji.currencies,
            err       : null,
            signupEnable : true,
            createDB  : new kendo.data.DataSource({
                transport: {
                    create  : {
                        url: baseUrl + 'api/banhji/createDB',
                        type: "POST",
                        dataType: 'json'
                    },
                    parameterMap: function(options, operation) {
                        if(operation === 'read') {
                            return {
                                limit: options.take,
                                page: options.page,
                                filter: options.filter
                            };
                        } else {
                            return {models: kendo.stringify(options.models)};
                        }
                    }
                },
                schema  : {
                    model: {
                        id: 'id'
                    },
                    data: 'results',
                    total: 'count'
                },
                batch: true,
                serverFiltering: true,
                serverPaging: true,
                pageSize: 100
            }),
            emailChange : function(e) {
                var self = this;
                $(".cover").eq(0).children(".imgLoad").css("display", "block");
                $(".cover").eq(0).children(".imgTick, .imgCross").css("display", "none");
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(re.test(this.get('email'))) {
                    this.userDSCheck.query({
                        filter: {field: "username", operator: "", value : this.get('email') }
                    }).then(function(){
                        if(self.userDSCheck.data().length > 0){
                            self.set("err", null);
                            self.set("err", "Your Email is already Register!");
                            $(".cover").eq(0).children(".imgLoad, .imgTick").css("display", "none");
                            $(".cover").eq(0).children(".imgCross").css("display", "block");
                            $(".cover").eq(0).children(".msg").text("Email is already registered!");
                            $(".cover").eq(0).children(".msg").css("display", "block");
                            $(".cover").eq(0).children("input").css("border", "1px solid #a22314");
                            $(".cover").eq(0).children("input").focus();
                        }else{
                            $(".cover").eq(0).children(".imgLoad, .imgCross").css("display", "none");
                            $(".cover").eq(0).children(".imgTick").css("display", "block");
                            $(".cover").eq(0).children(".msg").removeAttr("style");
                            $(".cover").eq(0).children("input").removeAttr("style");

                        }
                    });
                }else{
                    this.set("err", null);
                    this.set("err", "Email incorrect!")
                    $(".cover").eq(0).children(".msg").text("Incorrect email address!");
                    $(".cover").eq(0).children(".imgLoad, .imgTick").css("display", "none");
                    $(".cover").eq(0).children(".imgCross").css("display", "block");
                    $(".cover").eq(0).children(".msg").css("display", "block");
                    $(".cover").eq(0).children("input").css("border", "1px solid #a22314");
                    $(".cover").eq(0).children("input").focus();
                }
            },
            phoneChange : function(e) {
                $(".cover").eq(1).children(".imgTick").css("display", "block");
                var Nu = this.get('telephone').length;
                if(this.get('telephone') == ""){
                    this.set("err", null);
                    this.set("err", "Please Fill Phone Number!");
                    $(".cover").eq(1).children(".imgLoad, .imgTick").css("display", "none");
                    $(".cover").eq(1).children(".imgCross").css("display", "block");
                    $(".cover").eq(1).children(".msg").text("Minimum Phone Number is 8 digits!");
                    $(".cover").eq(1).children(".msg").css("display", "block");
                    $(".cover").eq(1).children("input").css("border", "1px solid #a22314");
                    $(".cover").eq(1).children("input").focus();
                }else{
                    if(Nu < 8){
                        this.set("err", null);
                        this.set("err", "Minimum Phone Number is 8 digits!");
                        $(".cover").eq(1).children(".imgLoad, .imgTick").css("display", "none");
                        $(".cover").eq(1).children(".imgCross").css("display", "block");
                        $(".cover").eq(1).children(".msg").text("Minimum Phone Number is 8 digits!");
                        $(".cover").eq(1).children(".msg").css("display", "block");
                        $(".cover").eq(1).children("input").css("border", "1px solid #a22314");
                        $(".cover").eq(1).children("input").focus();
                    }else if(Nu > 15){
                        this.set("err", null);
                        this.set("err", "Maximum Phone Number is 15 digits!");
                        $(".cover").eq(1).children(".imgLoad, .imgTick").css("display", "none");
                        $(".cover").eq(1).children(".imgCross").css("display", "block");
                        $(".cover").eq(1).children(".msg").text("Maximum Phone Number is 15 digits!");
                        $(".cover").eq(1).children(".msg").css("display", "block");
                        $(".cover").eq(1).children("input").css("border", "1px solid #a22314");
                        $(".cover").eq(1).children("input").focus();
                    }else{
                        this.set("err", null);
                        var str = this.get('telephone');
                        var phoneNumber = str.substring(3,0);
                        var HeadPhone = ["012","011","017","061","076","077","078","085","087","089","092","095","099","010","015","016","069","070","081","093","096","098","031","060","066","067","068","071","088","090","097","013","018", "021", "020", "023", "031", "036", "038", "034"];
                        if($.inArray(phoneNumber, HeadPhone) != -1) {
                            $(".cover").eq(1).children(".imgLoad, .imgCross").css("display", "none");
                            $(".cover").eq(1).children(".imgTick").css("display", "block");
                            $(".cover").eq(1).children(".msg").removeAttr("style");
                            $(".cover").eq(1).children("input").removeAttr("style");
                        }else{
                            this.set("err", null);
                            this.set("err", "Phone Number is Incorrect!");
                            $(".cover").eq(1).children(".imgLoad, .imgTick").css("display", "none");
                            $(".cover").eq(1).children(".imgCross").css("display", "block");
                            $(".cover").eq(1).children(".msg").text("Phone Number is Incorrect!");
                            $(".cover").eq(1).children(".msg").css("display", "block");
                            $(".cover").eq(1).children("input").css("border", "1px solid #a22314");
                            $(".cover").eq(1).children("input").focus();
                        }
                    }
                }
            },
            checkLetter   : function(inputtxt) {
                    var letters = /^[a-zA-Z]+$/,Num = /^[0-9]+$/, Result;
                    if (letters.test(inputtxt)) {
                        Result = false;
                        return Result;
                    }
                    if (Num.test(inputtxt)) {
                        Result = false;
                        return Result;
                    }
            },
            pwdChange   : function(e) {
                if(this.get('password')){
                    if(this.get('password') != this.get('cPassword')) {
                        this.set("err", null);
                        this.set("err", "Your password does not match!");
                        $(".cover").eq(3).children(".imgLoad, .imgTick").css("display", "none");
                        $(".cover").eq(3).children(".imgCross").css("display", "block");
                        $(".cover").eq(3).children(".msg").text("Your password does not match!");
                        $(".cover").eq(3).children(".msg").css("display", "block");
                        $(".cover").eq(3).children("input").css("border", "1px solid #a22314");
                        $(".cover").eq(3).children("input").focus();
                    }else{
                        this.set("err", null);
                        $(".cover").eq(3).children(".imgLoad, .imgCross").css("display", "none");
                        $(".cover").eq(3).children(".imgTick").css("display", "block");
                        $(".cover").eq(3).children(".msg").removeAttr("style");
                        $(".cover").eq(3).children("input").removeAttr("style");
                    }
                }else{
                    this.set("err", null);
                    this.set("err", "Password emty!");
                    $(".cover").eq(2).children(".imgLoad, .imgTick").css("display", "none");
                    $(".cover").eq(2).children(".imgCross").css("display", "block");
                    $(".cover").eq(2).children(".msg").text("Fill Your Password!");
                    $(".cover").eq(2).children(".msg").css("display", "block");
                    $(".cover").eq(2).children("input").css("border", "1px solid #a22314");
                    $(".cover").eq(2).children("input").focus();
                }
            },
            pwdCheck    : function(e) {
                var checkL = this.checkLetter(this.get('password'));
                if(checkL == false || this.get('password').length < 8) {
                    this.set("err", null);
                    this.set("err", "Password does not match requirements!");
                    $(".cover").eq(2).children(".imgLoad, .imgTick").css("display", "none");
                    $(".cover").eq(2).children(".imgCross").css("display", "block");
                    $(".cover").eq(2).children(".msg").text("Password does not match requirements");
                    $(".cover").eq(2).children(".msg").css("display", "block");
                    $(".cover").eq(2).children("input").css("border", "1px solid #a22314");
                    $(".cover").eq(2).children("input").focus();
                }else{
                    $(".cover").eq(2).children(".imgLoad, .imgCross").css("display", "none");
                    $(".cover").eq(2).children(".imgTick").css("display", "block");
                    $(".cover").eq(2).children(".msg").removeAttr("style");
                    $(".cover").eq(2).children("input").removeAttr("style");
                }
                if(this.get("cPassword")){
                    this.pwdChange();
                }
            },
            comChange   : function(e) {
                var self = this;
                $(".cover").eq(4).children(".imgLoad").css("display", "block");
                $(".cover").eq(4).children(".imgTick, .imgCross").css("display", "none");
                if(this.get("name") == ""){
                    this.set("err", null);
                    this.set("err", "Please fill company name!");
                    $(".cover").eq(4).children(".imgLoad, .imgTick").css("display", "none");
                    $(".cover").eq(4).children(".imgCross").css("display", "block");
                    $(".cover").eq(4).children(".msg").text("Please fill company name!");
                    $(".cover").eq(4).children(".msg").css("display", "block");
                    $(".cover").eq(4).children("input").css("border", "1px solid #a22314");
                    $(".cover").eq(4).children("input").focus();
                }else{
                    this.companyCheck.query({
                        filter: {field: "name", operator: "", value : this.get('name') }
                    }).then(function(){
                        if(self.companyCheck.data().length > 0){
                            self.set("err", null);
                            self.set("err", "Company name aleady registered!");
                            $(".cover").eq(4).children(".imgLoad, .imgTick").css("display", "none");
                            $(".cover").eq(4).children(".imgCross").css("display", "block");
                            $(".cover").eq(4).children(".msg").text("Company name aleady registered!");
                            $(".cover").eq(4).children(".msg").css("display", "block");
                            $(".cover").eq(4).children("input").css("border", "1px solid #a22314");
                            $(".cover").eq(4).children("input").focus();
                        }else{
                            self.set("err", null);
                            $(".cover").eq(4).children(".imgLoad, .imgCross").css("display", "none");
                            $(".cover").eq(4).children(".imgTick").css("display", "block");
                            $(".cover").eq(4).children(".msg").removeAttr("style");
                            $(".cover").eq(4).children("input").removeAttr("style");
                        }
                    });
                }
            },
            create: function() {
                var self = this;
                if(this.err == null){
                    $("#signupBtn").val("Signing up...");
                    // create user
                    var attributeList = [];
                    this.comChange();
                    this.phoneChange();
                    var dataEmail = {
                        Name : 'email',
                        Value : this.get('email')
                    };
                    if(this.err == null){
                        this.set("signupEnable", true);
                    }
                    var attributeEmail = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserAttribute(dataEmail);

                    attributeList.push(attributeEmail);

                    userPool.signUp(this.get('email'), this.get('password'), attributeList, null, function(err, result){
                        if (err) {
                        } else {
                            banhji.index.userDS.add({
                                username: result.user.username,
                                first_name: null,
                                last_name: null,
                                email: null,
                                mobile: null,
                                profile_photo: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/blank.png",
                                company: {id: 0, name:''},
                                usertype: 1
                            });
                            banhji.index.userDS.sync();
                            banhji.userDS.bind('requestEnd', function(e){
                                var res = e.response, type = e.type;
                                if(res.results.length > 0) {
                                    // create company
                                    let dd = new Date();
                                    dd.setMonth(11);
                                    dd.setDate(31);
                                    banhji.companyDS.insert(0, {
                                        name:  banhji.index.get('name'),
                                        currency: banhji.index.get('currency'),
                                        country:  banhji.index.get('country'),
                                        industry:  banhji.index.get('industry'),
                                        fiscal_date : dd.getTime(),
                                        type: banhji.index.get('type'),
                                        telephone: banhji.index.get('telephone'),
                                        username:result.user.username
                                    });
                                    banhji.companyDS.sync();
                                    banhji.companyDS.bind('requestEnd', function(e){
                                        banhji.index.set('email', null);
                                        banhji.index.set('password', null);
                                        banhji.index.set('cPassword', null);
                                        banhji.index.set('name', '');
                                        banhji.index.set('currency', '');
                                        banhji.index.set('country', null);
                                        banhji.index.set('industry', null);
                                        banhji.index.set('telephone', null);
                                        banhji.index.set('type', null);
                                        // go to confirm
                                        //window.location.replace(baseUrl + "confirm/");
                                        window.location.replace(baseUrl + "confirm/?e=" + self.get('email'));
                                    });
                                }
                            });
                          }
                    });
                }else{
                    alert(this.err);
                }
            }
        });
        $(function(){
            kendo.bind($('.sign-up'), banhji.index);

            var language = JSON.parse(localStorage.getItem('userData/lang'));
            switch(language) {
                case "KH":
                    langVM.set('lang', km_KH);
                    localforage.setItem("lang", language);
                    langVM.set('localeCode', language);
                    break;
                case "EN":
                    langVM.set('lang', en_US);
                    localforage.setItem("lang", language);
                    langVM.set('localeCode', language);
                    break;
                default:
                    langVM.set('lang', en_US);
                    localforage.setItem("lang", language);
                    langVM.set('localeCode', language);
            }
        });
    </script>
</body>
</html>
