<!DOCTYPE html>
<head>

<title>BanhJi Micro</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="icon" type="image/png" href="<?php echo base_url()?>assets/micro/micro-icon.ico" >

<!-- Theme CSS Elegant-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/micro/style.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>assets/micro/morris.css" >
<link rel="stylesheet" href="<?php echo base_url()?>assets/micro/jquery.toast.css" >
<link rel="stylesheet" href="<?php echo base_url()?>assets/micro/c3.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/micro/micro.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/micro/icon-page.css">

<script src="<?php echo base_url()?>assets/micro/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/micro/popper.min.js"></script>
<script src="<?php echo base_url()?>assets/micro/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/micro/waves.js"></script>
<script src="<?php echo base_url()?>assets/micro/sidebarmenu.js"></script>
<script src="<?php echo base_url()?>assets/micro/custom.min.js"></script>
<script src="<?php echo base_url()?>assets/micro/raphael-min.js"></script>
<script src="<?php echo base_url()?>assets/micro/morris.min.js"></script>
<script src="<?php echo base_url()?>assets/micro/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url()?>assets/micro/d3.min.js"></script>
<script src="<?php echo base_url()?>assets/micro/c3.min.js"></script>
<script src="<?php echo base_url()?>assets/micro/jquery.toast.js"></script>
    
<!-- End -->

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


<!-- CSS Kendo By DAWINE -->
<!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/kendo/examples/content/shared/styles/examples-offline.css" /> -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/kendo/styles/kendo.common.min.css" />
<!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/kendo/styles/kendo.rtl.min.css" /> -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/kendo/styles/kendo.default.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/kendo/styles/kendo.default.mobile.min.css" />


<!-- Kendo UI -->
<!-- <link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.common.min.css"> -->
<!-- <link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.bootstrap.min.css"> -->
<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.dataviz.material.min.css">
<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.dataviz.bootstrap.min.css">


<!-- Kedo JS by DAWINE -->
<!-- <script src="<?php echo base_url()?>assets/kendo/js/jszip.min.js"></script> -->
<!-- <script src="<?php echo base_url()?>assets/kendo/js/jquery.min.js"></script> -->
<script src="<?php echo base_url()?>assets/kendo/js/kendo.all.min.js"></script>
<script src="<?php echo base_url()?>assets/kendo/examples/content/shared/js/console.js"></script>

<!-- <script src="<?php echo base_url()?>assets/libraries/kendoui/js/kendo.all.min.js"></script> -->
<script src="<?php echo base_url()?>assets/libraries/kendoui/js/cultures/kendo.culture.km-KH.min.js"></script>
<script src="<?php echo base_url()?>assets/libraries/kendoui/js/cultures/kendo.culture.th-TH.min.js"></script>
<script src="<?php echo base_url()?>assets/libraries/kendoui/js/cultures/kendo.culture.vi-VN.min.js"></script>
<script src="<?php echo base_url()?>assets/libraries/kendoui/js/cultures/kendo.culture.de-DE.min.js"></script>
<script src="<?php echo base_url()?>assets/libraries/kendoui/js/cultures/kendo.culture.lo-LA.min.js"></script>
<!-- LESS.js Library -->
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/system/less.min.js"></script>

<!-- Print JS -->
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/jquery.print.js"></script>
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/demo/megamenu.js?1374506514"></script>

<!-- Translate Files -->
<script src="<?php echo base_url()?>assets/km-KH.js"></script>
<script src="<?php echo base_url()?>assets/en-US.js"></script>

<!--start kendo localization in Khmer-->
<script>
	kendo.pdf.defineFont({
		"Battambang" 		: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/fonts/Battambang-Regular.ttf",
		"Battambang|Bold"	: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/fonts/Battambang-Bold.ttf",
	});
</script>
<!--start kendo localization in Khmer-->
</head>
<body class="skin-default-dark fixed-layout" >
	<div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
        </div>
    </div>

    <div id="main-wrapper">
        <div id="examplee">
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?php echo base_url();?>micro/home">
                            <b>                                
                                <img src="<?php echo base_url()?>assets/micro/logo-banhjiNew.png" style="height: 36px;" alt="homepage" class="dark-logo" />
                            </b>
                            <span>                             
                                <img src="<?php echo base_url()?>assets/micro/logo-micro.png" style="height: 36px;" alt="homepage" class="dark-logo" />
                            </span>
                            </a>
                    </div>

                    <div class="navbar-collapse">

                        <ul class="navbar-nav mr-auto">
                            <!-- This is  -->
                            <li class="nav-item hidden-sm-up"> <a class="nav-link nav-toggler waves-effect waves-light" href="javascript:void(0)"><i class="ti-menu"></i></a></li>                        
                           
                            <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                                <form class="app-search">
                                    <input type="text" class="form-control search-query" placeholder="Search" id="search-placeholder" data-bind="value: searchText">
                                    <a class="srh-btn" data-bind="click: search"><i class="ti-close"></i></a>
                                </form>
                            </li>
                        </ul>
                        <ul class="navbar-nav my-lg-0" id="companyDash">
                           	<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-plus"></i></a>
                                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY menuTransaction">
                                    <span class="with-arrow"><span class="bg-primary"></span></span>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div>
                                                <p><i class="ti-receipt m-r-5 m-l-5"></i><span data-bind="text: lang.lang.sale_transactions"></span></p>
                                                <ul>
                                                    <li><a href="sales#/customer"><span data-bind="text: lang.lang.customers"></span></a></li>
                                                   <li><a href="sales#/sale_order"><span data-bind="text: lang.lang.create_sale_order"></span></a></li>
                                                    <li><a href="sales#/customer_deposit"><span data-bind="text: lang.lang.create_customer_deposit"></span></a></li>
                                                    <li><a href="sales#/cash_sale"><span data-bind="text: lang.lang.create_cash_sale"></span></a></li>
                                                    <li><a href="sales#/invoice"><span data-bind="text: lang.lang.create_invoice"></span></a></li>
                                                    <li><a href="sales#/cash_receipt"><span data-bind="text: lang.lang.create_cash_receipt"></span></a></li>
                                                    <li><a href="sales#/cash_refund"><span data-bind="">Cash Refund</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-4 lineBorder">
                                            <div >
                                                <p><i class="ti-view-list m-r-5 m-l-5"></i><span data-bind="text: lang.lang.purchase_transaction"></span></p>
                                                <ul>
                                                    <li><a href="purchases#/vendor"><span data-bind="text: lang.lang.add_supplier"></span></a></li>
                                                    <li><a href="purchases#/purchase_order"><span data-bind="text: lang.lang.make_purchase_order"></span></a></li>
                                                    <li><a href="purchases#/vendor_deposit"><span data-bind="text: lang.lang.make_vendor_deposit"></span></a></li>
                                                    <li><a href="purchases#/purchase"><span data-bind="text: lang.lang.make_purchase"></span></a></li>
                                                    <li><a href="purchases#/cash_payment"><span data-bind="text: lang.lang.make_cash_payment"></span></a></li>
                                                    <li><a href="purchases#/payment_refund"><span data-bind="">Payment Refund</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div >
                                                <p><i class="fa fa-dollar m-r-5 m-l-5"></i><span data-bind="text: lang.lang.c_transaction"></span></p>
                                                <ul>
                                                    <li><a href="cashs#/journal"><span data-bind="text: lang.lang.make_journal"></span></a></li>
                                                    <li><a href="cashs#/cash_transaction"><span data-bind="text: lang.lang.make_cash_transaction"></span></a></li>
                                                    <li><a href="cashs#/cash_advance"><span data-bind="text: lang.lang.set_exchange_rate"></span></a></li>
                                                </ul>
                                            </div>
                                             <div >
                                                <p><i class="fa fa-dollar m-r-5 m-l-5"></i><span data-bind="text: lang.lang.reports"></span></p>
                                                <ul>
                                                    <li><a href="cashs#/journal"><span data-bind="text: lang.lang.make_journal"></span></a></li>
                                                    <li><a href="cashs#/cash_transaction"><span data-bind="text: lang.lang.make_cash_transaction"></span></a></li>
                                                    <li><a href="cashs#/cash_advance"><span data-bind="text: lang.lang.set_exchange_rate"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?php echo base_url()?>assets/micro/logo-banhjiNew.png" alt="user" class="img-circle" width="30">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY ul-multiTaskList" data-template="multiTaskList-row-template" data-bind="source: multiTaskList">
                                    <span class="with-arrow"><span class="bg-primary"></span></span>
                                    
                                    <a class="dropdown-item" target="_blank" href="<?php echo base_url();?>rrd">Back to BanhJi</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-comments-o"></i></a>
                                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                    <span class="with-arrow"><span class="bg-primary"></span></span>
                                    <div style="text-align: center; padding: 10px 10px 0;">
                                        <p style="font-size: 14px;">Call us by<br><span style="font-weight: bold;font-size: 16px">+855 10 413 777</span><br>Mon-Fri<br>09:00 - 18:00</p>
                                        <div class="fb-messengermessageus"
                                          messenger_app_id="1301847836514973"
                                          page_id="862386433857166"
                                          color="blue"
                                          width="180"
                                          size="standard" ></div>
                                    </div>
                                </div>
                            </li>

                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-comments-o"></i></a>
                                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                    <span class="with-arrow"><span class="bg-primary"></span></span>
                                    <div class="middle-help">
    					  				<div class="more-help" style="border-bottom: 1px solid #ddd; margin-bottom: 10px; width: 100%; float: left; padding-bottom: 10px;">
    				  						<div class="help-img" >
    				  							<img src="http://fpoimg.com/51x51?text=Picture%201">
    				  						</div>
    				  						<div class="help-desc" >
    				  							<p>Need more help?</p>
    				  							<a href="" target="_blank">Accountant Help hub</a>
    				  						</div>
    				  					</div>
    				  					<div class="what-help" >
    				  						<div class="help-img" >
    				  							<img src="http://fpoimg.com/51x51?text=Picture%202">
    				  						</div>
    				  						<div class="help-desc">
    				  							<p>Check out what's new</p>
    				  							<a href="" target="_blank">Learn about new product</a>
    				  						</div>
    				  					</div>
    					  			</div>
                                </div>
                            </li> -->

                            <li class="nav-item right-side-toggle" >
                                <a class="nav-link  waves-effect waves-light" href="javascript:void(0)">
                                    <img data-bind="attr: {src: userDS.data()[0].profile_photo.url}" alt="user" class="img-circle" width="30">
                                </a>                            
                            </li>
                            <div class="right-sidebar">
                                <div class="slimscrollright">
                                    <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">                  
                                        <i class="ti-close right-side-toggle"></i>
                                        <div class=""><img data-bind="attr: {src: userDS.data()[0].profile_photo.url}" alt="user" class="img-circle" width="60"></div>
                                        <div class="m-l-10">
                                            <h4 class="m-b-0"><span data-bind="text: userDS.data()[0].last_name"></span>&nbsp;
                                            <span data-bind="text: userDS.data()[0].first_name"></span></h4>
                                            <p class=" m-b-0"><span data-bind="text: userDS.data()[0].username"></span></p>
                                        </div>
                                    </div>
                                    <a class="dropdown-item" href="<?php echo base_url()?>admin#"><i class="ti-settings m-r-5 m-l-5 " ></i><span class="marginLeft" data-bind="text: lang.lang.my_account_setting"></span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item menuLang" href="javascript:void(0)" onclick="langVM.changeToKh()"><i class="flag-icon flag-icon-kh  m-r-5 m-l-5"></i> ភាសាខ្មែរ</a>
                                    <a class=" dropdown-item menuLang" href="javascript:void(0)" onclick="langVM.changeToEn()"><i class="flag-icon flag-icon-us  m-r-5 m-l-5"></i> English</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#/manage" data-bind="click: logout"><i class="fa fa-power-off m-r-5 m-l-5"></i><span data-bind="text: lang.lang.logout"></span></a>
                                    
                                </div>
                            </div>
                        </ul>
                    </div>
                </nav>
            </header>