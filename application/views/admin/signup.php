<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up | Free Online Accounting</title>
    <link rel="shortcut icon" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png">
    <link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.common.min.css">
    <link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.material.min.css">
    <!-- Boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Battambang" rel="stylesheet">
    <style>
        html, body {
            background-color: #203864;
            font-family: 'Roboto Slab', Battambang !important;
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
            width: 100%;
            margin: 0 auto;
            background: #203864;
            height: auto;
        }
        .signup-content{
            margin: 25px 0;
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
            background: #BDD7EE;
            padding: 30px 50px;
            color: #000000;
            text-align:  center;
            font-family: 'Roboto Slab', Battambang !important;
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
            padding: 3px;
            color: #000;
            font-family: 'Roboto Slab', Battambang !important;
        }
        .signup-noted{
                color: #000;
            margin: 5px auto 0;
            font-size: 11px;
            text-align: center;
            width: 100%;
        }
        .signup-country{
            height: 37px;
            width: 100%;
            margin-top: 5px;
        }
        .btn-signup{
            width: 100%;
            background: #222A35;
            color: #68788E;
            border: none;
            margin: 15px 0 0 0;
            height: 55px;
            cursor: pointer;
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
        .k-dropdown .k-input, .k-dropdown .k-state-focused .k-input, .k-menu .k-popup{
            color: #B5B5B5;
        }
        .k-dropdown .k-input, .k-dropdown .k-state-focused .k-input, .k-menu .k-popup{
            color: #000;
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
            height: 31px;
            clear: both;
            margin-bottom: 5px;
        }
        .cover img {
            position: absolute;
            right: 2px;
            top: 5px;
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
      <p style="font-size: 14px;">Call us at<br><span style="font-weight: bold;font-size: 16px">+855 10 413 777</span><br>Mon-Fri<br>09:00 - 18:00</p>
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
                    <div class="col-md-10 col-md-offset-2">
                        <div class="signup-form">
                            <form action="" method="">
                                <label>Personal Information</label><br>
                                <div class="cover">
                                    <img src="<?php echo base_url();?>assets/img/form-loader.gif" class="imgLoad" />
                                    <img src="<?php echo base_url();?>assets/img/form-tick.png" class="imgTick" />
                                    <img src="<?php echo base_url();?>assets/img/form-cross.png" class="imgCross" />
                                    <input type="email" data-bind="value: email, events: {change : emailChange}" required="required" placeholder="Your email" class="signup-email">
                                </div>
                                <div class="cover">
                                    <img src="<?php echo base_url();?>assets/img/form-loader.gif" class="imgLoad" />
                                    <img src="<?php echo base_url();?>assets/img/form-tick.png" class="imgTick" />
                                    <img src="<?php echo base_url();?>assets/img/form-cross.png" class="imgCross" />
                                    <input required="required" type="numbers" data-bind="value: telephone, events: {change: phoneChange}" id="phoneInput" placeholder="Your Telephone" class="signup-email">
                                </div>
                                <p class="signup-noted">We will use this information to communicate with you. We never share your number with third parties without your consent.</p>
                                <div class="cover">
                                    <img src="<?php echo base_url();?>assets/img/form-loader.gif" class="imgLoad" />
                                    <img src="<?php echo base_url();?>assets/img/form-tick.png" class="imgTick" />
                                    <img src="<?php echo base_url();?>assets/img/form-cross.png" class="imgCross" />
                                    <input required="required" type="password" data-bind="value: password, events : {change: pwdCheck}" placeholder="Password " class="signup-email">
                                </div>

                                <p class="signup-noted">The minimum requirements for password are:  at least 8 characters, letter, and numbers.</p>
                                <div class="cover">
                                    <img src="<?php echo base_url();?>assets/img/form-loader.gif" class="imgLoad" />
                                    <img src="<?php echo base_url();?>assets/img/form-tick.png" class="imgTick" />
                                    <img src="<?php echo base_url();?>assets/img/form-cross.png" class="imgCross" />
                                    <input required="required" type="password" data-bind="value: cPassword, events: {change: pwdChange}" placeholder="Confirm password " class="signup-email"><br>
                                </div>

                                <label>Company Information</label><br>
                                <div class="cover">
                                    <img src="<?php echo base_url();?>assets/img/form-tick.png" class="imgTick" />
                                    <img src="<?php echo base_url();?>assets/img/form-cross.png" class="imgCross" />
                                    <input required="required" type="text" data-bind="value: name, events: {change: comChange }" placeholder="Company Name " class="signup-email"><br>
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

                                <input style="background: #1F4E78;font-size: 20px !important; " id="signupBtn" type="button" data-bind="click: create" class="btn-signup" value="SIGNUP FOR FREE"><br>
                                <p class="signup-text-bottom">
                                    By clicking on “signup”, you agree to the <a href="https://www.banhji.com/terms" target="_blank">Terms of Service</a>  and <a href="https://banhji.com/privacy" target="_blank">Privacy Policy</a>.
                                </p>

                            </form> 
                        </div>
                    </div>
                </div>
               <div class="col-sm-6">
                    <div class="singup-image">
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

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-wrapper" style="position: fixed;width: 100%; bottom:0; left: 0;">
       <div class="footer" style="width: 100%; background: #111F3F; padding: 10px 0; color: #839ABA;">
         <div class="container">
          <div class="row">
            <div class="col-sm-6">
                <div style="margin-left:113px; padding-right: 20px; border-right: 1px solid #fff; width: 7%; float: left; margin-right: 13px; ">
                  <img style="width: 30px; height: 30px; " src="https://storage.googleapis.com/instapage-user-media/e315080c/7548513-0-Banhji-Logo-3.png" />
                </div>
                <p style="text-align: left; margin-bottom: 0; margin-top: 7px; font-size: 13px;">Taking Fear out of Accounting</p>
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

            </div>           
          </div>
           <p style="width: 35%; font-size: 12px; margin-top: 10px; margin-left: 120px; float: left;">©2016 BanhJi Pte. Ltd. All rights reserved. Terms, conditions, features, support, pricing and service options subject to change without notice.</p>
            <span style="float: right; width: 45%; text-align: right; margin-right: 35px;" id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=lNpq2OuFwU0nDcZ5f7uSQ9D1rwgIIgTNOoYBNRt4BqE4CMLt8GMhEDKt66EL"></script></span>
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
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/kendoui/js/kendo.all.min.js"></script>
    <script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
    <!-- Boostrap-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
                            alert(self.err);
                            $(".cover").eq(0).children(".imgLoad, .imgTick").css("display", "none");
                            $(".cover").eq(0).children(".imgCross").css("display", "block");
                        }else{
                            $(".cover").eq(0).children(".imgLoad, .imgCross").css("display", "none");
                            $(".cover").eq(0).children(".imgTick").css("display", "block");
                        }
                    });
                }else{
                    this.set("err", null);
                    this.set("err", "Please check your email address!")
                    alert(this.err);
                    $(".cover").eq(0).children(".imgLoad, .imgTick").css("display", "none");
                    $(".cover").eq(0).children(".imgCross").css("display", "block");
                }
            },
            allLetter   : function(inputtxt) {  
                    var letters = /^[a-zA-Z]+$/;
                    if (letters.test(inputtxt)) {
                        this.set("err", null);
                        this.set("err", "Password Invalid!");
                    }else{
                        this.set("err", null);
                    }
            },  
            allNumber   : function(inputtxt) {  
                    var letters = /^[0-9]+$/;
                    if (letters.test(inputtxt)) {
                        this.set("err", null);
                        this.set("err", "Password Invalid!");
                    }else{
                        this.set("err", null);
                    }
            },  
            phoneChange : function(e) {
                $(".cover").eq(1).children(".imgTick").css("display", "block");
            },
            pwdCheck    : function(e) {
                this.allLetter(this.get('password'));
                this.allNumber(this.get('password'));
            },
            pwdChange   : function(e) {
                
                if(this.get('password') != this.get('cPassword')) {
                    this.set("err", null);
                    this.set("err", "Your Passwrod Not Match!");
                    alert(this.err);
                    $(".cover").eq(2).children(".imgLoad, .imgTick").css("display", "none");
                    $(".cover").eq(2).children(".imgCross").css("display", "block");
                    $(".cover").eq(3).children(".imgLoad, .imgTick").css("display", "none");
                    $(".cover").eq(3).children(".imgCross").css("display", "block");
                }else{
                    this.set("err", null);
                    $(".cover").eq(2).children(".imgLoad, .imgCross").css("display", "none");
                    $(".cover").eq(2).children(".imgTick").css("display", "block");
                    $(".cover").eq(3).children(".imgLoad, .imgCross").css("display", "none");
                    $(".cover").eq(3).children(".imgTick").css("display", "block");
                }
            },
            comChange   : function(e) {
                if(this.get("name") == ""){
                    this.set("err", null);
                    this.set("err", "Please fill Company Name!");
                    $(".cover").eq(4).children(".imgCross").css("display", "block");
                    $(".cover").eq(4).children(".imgTick").css("display", "none");
                }else{
                    $(".cover").eq(4).children(".imgTick").css("display", "block");
                    $(".cover").eq(4).children(".imgCross").css("display", "none");
                }
            },
            create: function() {
                if(this.err == null){
                    $("#signupBtn").val("Signing up...");
                    // create user
                    var attributeList = [];

                    var dataEmail = {
                        Name : 'email',
                        Value : this.get('email')
                    };

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
                                    banhji.companyDS.insert(0, {
                                        name:  banhji.index.get('name'),
                                        currency: banhji.index.get('currency'),
                                        country:  banhji.index.get('country'),
                                        industry:  banhji.index.get('industry'),
                                        type: banhji.index.get('type'),
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
                                        banhji.index.set('type', null);
                                        // go to confirm
                                        window.location.replace(baseUrl + "confirm/");
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
        });
    </script>
</body>
</html>
