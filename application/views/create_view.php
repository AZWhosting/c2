<!DOCTYPE html>
<!--[if lt IE 7]> <html class="front ie lt-ie9 lt-ie8 lt-ie7 fluid top-full menuh-top"> <![endif]-->
<!--[if IE 7]>    <html class="front ie lt-ie9 lt-ie8 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if IE 8]>    <html class="front ie lt-ie9 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if gt IE 8]> <html class="animations front ie gt-ie8 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if !IE]><!--><html class="animations front fluid top-full menuh-top sticky-top"><!-- <![endif]-->
<head>
	<title>Banhji</title>
	
	<!-- Meta -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	
<!-- Kendo UI -->
<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.common.min.css">
<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.bootstrap.min.css">
<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.dataviz.material.min.css">
<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.dataviz.bootstrap.min.css">

<!-- Bootstrap -->
<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/css/responsive.css">

<!-- Glyphicons Font Icons -->
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/fonts/glyphicons/css/glyphicons.css" rel="stylesheet" />

<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/fonts/font-awesome/css/font-awesome.min.css">
<!--[if IE 7]><link rel="stylesheet" href="../../../../../common/theme/fonts/font-awesome/css/font-awesome-ie7.min.css"><![endif]-->

<!-- Uniform Pretty Checkboxes -->
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css" rel="stylesheet" />

<!-- PrettyPhoto -->
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/gallery/prettyphoto/css/prettyPhoto.css" rel="stylesheet" />



<!-- extra CSS-->
<?php foreach($css as $c):?>
<link rel="stylesheet" href="<?php echo base_url().CSS.$c?>">
<?php endforeach;?>

<!-- extra fonts-->
<?php foreach($fonts as $f):?>
<link href="https://fonts.googleapis.com/css?family=<?php echo $f?>"
	rel="stylesheet" type="text/css">
<?php endforeach;?>


<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/modernizr-2.6.1-respond-1.1.0.min.js"></script>
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/jquery-1.8.2.min.js"></script>
<script>window.jQuery || document.write('https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/jquery-1.8.2.min.js"><\/script>')</script>
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="<?php echo base_url();?>resources/common/theme/scripts/plugins/system/html5shiv.js"></script>
<![endif]-->

<!--[if IE]><!--><script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/other/excanvas/excanvas.js"></script><!--<![endif]-->
<!--[if lt IE 8]><script src="../../../../../common/theme/scripts/plugins/other/json2.js"></script><![endif]-->

<!-- Bootstrap Extended -->
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/extend/jasny-fileupload/css/fileupload.css" rel="stylesheet">
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/extend/bootstrap-select/bootstrap-select.css" rel="stylesheet" />
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" rel="stylesheet" />

<!-- JQueryUI -->
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/system/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" />

<!-- Notyfy Notifications Plugin -->
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/notifications/notyfy/jquery.notyfy.css" rel="stylesheet" />
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/notifications/notyfy/themes/default.css" rel="stylesheet" />

<!-- Gritter Notifications Plugin -->
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/notifications/Gritter/css/jquery.gritter.css" rel="stylesheet" />

<!-- Google Code Prettify Plugin -->
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/other/google-code-prettify/prettify.css" rel="stylesheet" />

<!-- Pageguide Guided Tour Plugin -->
<!--[if gt IE 8]><!--><link media="screen" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/other/pageguide/css/pageguide.css" rel="stylesheet" /><!--<![endif]-->

<!-- Bootstrap Image Gallery -->
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/extend/bootstrap-image-gallery/css/bootstrap-image-gallery.min.css" rel="stylesheet" />

<!-- Main Theme Stylesheet :: CSS -->
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/css/style-default-menus-dark.css?1374506511" rel="stylesheet" type="text/css" />
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/skins/css/blue-gray.css" rel="stylesheet" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Content:400,700' rel='stylesheet' type='text/css'>
<style>
	
	#module-image {
		list-style: none;
	}
	#module-image li {
		width: 145px;
		float: left;
		margin: 0.5px;
	}
	.main {
		border: 1px solid #C8C8C8;
		padding: 1px;
		margin: 0;
		padding-top: 0;
	}
	.full-height {
		height: 100%;
		min-height: 100%;
	}
	.mainContainer {
		min-height: 100%;
		height: 100%;
		margin 0 auto -40px;
	}
	#content {
		margin-top: -20px;
	}
	.vendor {
		list-style: none;
		padding: 0;
		margin: 0;
	}
	.vendor>li {
		padding: 2px;
	}
	.k-listview {
		border: 0;
	}
	.k-listview>li(even){
		border-top: 1px solid #cccccc;
	}

	input.k-textbox {
		height: 30px;
		width: 220px;
		line-height: 30px;
		vertical-align: middle;
		border-radius: 5px;
	}

	.brand {
		color: #ffffff;
	}
</style>

<!-- Global -->
<script>
//<![CDATA[
var basePath = '',
	commonPath = "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/";

// colors
var primaryColor = '#5dd9c8',
	dangerColor = '#b55151',
	successColor = '#609450',
	warningColor = '#ab7a4b',
	inverseColor = '#45484d';

var themerPrimaryColor = primaryColor;
//]]>
</script>
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

<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/js/kendo.all.min.js"></script>
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/js/cultures/kendo.culture.km-KH.min.js"></script>
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/js/cultures/kendo.culture.th-TH.min.js"></script>
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/js/cultures/kendo.culture.vi-VN.min.js"></script>
<!-- LESS.js Library -->
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/system/less.min.js"></script>

<!-- Print JS -->
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/jquery.print.js"></script>
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/demo/megamenu.js?1374506514"></script>

<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/language/km-KH.js"></script>
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/language/en-US.js"></script>

<!--start kendo localization in Khmer-->
<script>
	kendo.pdf.defineFont({
		"Battambang" 		: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/fonts/Battambang-Regular.ttf",
		"Battambang|Bold"	: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/fonts/Battambang-Bold.ttf",
	});
</script>

</head>
<body>
	<div id="wrapperApplication" class="container-fluid"></div>
	<!-- template section starts -->
	<script type="text/x-kendo-template" id="layout">
		<div id="menu"></div>			
		<div id="content" class="row-fluid"></div>
	</script>
	<script type="text/x-kendo-template" id="blank-tmpl">
	</script>
	<script type="text/x-kendo-template" id="menu-tmpl">
		<div class="menu-hidden sidebar-hidden-phone menu-left hidden-print">
			<div class="navbar main" id="main-menu">
				<ul class="topnav">
					<li>
						<a href="\#" class="dropdown-toggle brand" data-toggle="dropdown" id="brand-menu">BanhJi <span id="current-section"></span></a>
			        </li>
				</ul>
			</div>
		</div>
	</script>

	<script type="text/x-kendo-template" id="index">
		<div class="row">
			<div class="span6">
				<div class="row">
					<div class="span12" style="padding-left: 0; margin-left: 0; margin-top: 0;">
						<ul id="module-image">
							<li style="text-align:center;">
								<a href="#/customers" data-bind="click: register">
									<img src="<?php echo base_url(); ?>resources/img/Customer.png" alt="Customer">
								</a>
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">អតិថិជន</span>
							</li>
							<li style="text-align:center;">
								<a href="#/vendors" data-bind="click: register">
									<img src="<?php echo base_url(); ?>resources/img/supplier.png" alt="Vendor">
								</a>
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">អ្នកផ្គត់ផ្គង់</span>
							</li>
							<li style="text-align:center;">
								<a href="#/accounting_dashboard" data-bind="click: register">
									<img src="<?php echo base_url(); ?>resources/img/Accounting.png" alt="Accounting">
								</a>
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">គណនេយ្យ</span>
							</li>
							<li style="text-align:center;">
								<a href="#/inventories" data-bind="click: register">
									<img src="<?php echo base_url(); ?>resources/img/Inventory.png" alt="Inventory">
								</a>
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">សន្និធិ</span>
							</li>
							<li style="text-align:center;" data-bind="click: register">
								<a href="<?php echo base_url(); ?>app#reports">
									<img src="<?php echo base_url(); ?>resources/img/reports.png" alt="Report">
								</a>
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">របាយការណ៍</span>
							</li>
							<li style="text-align:center;">
								<a href="#/water" data-bind="click: register">
									<img src="<?php echo base_url(); ?>resources/img/tax.png" alt="Water">
								</a>
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">ពន្ធ</span>
							</li>
							<li style="text-align:center;">
								<a href="<?php echo base_url(); ?>app#setting" data-bind="click: register">
									<img src="<?php echo base_url(); ?>resources/img/setting.png" alt="Settings">
								</a>
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">កំណត់</span>
							</li>
							<li style="text-align:center;">
								<a href="#/cashier/dashboard" data-bind="click: register">
									<img src="<?php echo base_url(); ?>resources/img/cashier.png" alt="Cashier">
								</a>
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">បេឡាករ</span>
							</li>
						</ul>
					</div>
					<div class="span12" style="padding-left: 0; margin-left: 0; margin-top: 30px;">
						<h4 style="margin-left: 35px; width: 450px;">តាមវិសយ័</h4>
						<ul id="module-image">
							<li style="text-align:center;">
								<a href="#/electricity" data-bind="click: register">
									<img src="<?php echo base_url(); ?>resources/img/electricity.png" alt="Electricity">
								</a>
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">អគ្គិសនី</span>
							</li>
							<li style="text-align:center;">
								<a href="#/water" data-bind="click: register">
									<img src="<?php echo base_url(); ?>resources/img/water.png" alt="Water">
								</a>
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">ទឹកស្អាត</span>
							</li>
							<li style="text-align:center;">
								<a href="#/water" data-bind="click: register">
									<img src="<?php echo base_url(); ?>resources/img/pos.png" alt="Smart POS">
								</a>
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">Smart POS</span>
							</li>
							<li style="text-align:center;">
								<a href="#/water" data-bind="click: register">
									<img src="<?php echo base_url(); ?>resources/img/ngo.png" alt="Water">
								</a>
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">NGO</span>
							</li>
						</ul>
					</div>
				</div>	
			</div>
			<div class="span6">
				<div class="row">
					<div class="span8">
						<h2>Your Company Name</h2>
						<span id="today-date" data-bind="text: curDate"></span><br/>
						លេខពន្ធ: <span></span>
					</div>
					<div class="span3">
						
					</div>
					<div class="span12"><hr/></div>
					
					</div>
					<div class="span11">
						<input data-role="datepicker"
						   data-format="dd-MM-yyyy"
		                   data-bind="value: selectedDate,
		                   events: { change: dateChanges }">

						<div style="height: 300px;" id="index-income-graph"></div>
					</div>
					
					<div class="span12">
						<div class="row">
							<div class="padding-bottom-none-phone span6">
								<div class="widget-stats widget-stats-primary widget-stats-4" data-bind="click: register">
									<span class="txt">សមតុល្យសាច់ប្រាក់</span>
									<span class="count" style="font-size: 25px;" data-bind="text: cashBal"></span>
									<div class="clearfix"></div>
									<i class="icon-play-circle"></i>
								</div>
							</div>
							<div class="padding-bottom-none-phone span6">
								<div class="widget-stats widget-stats-primary widget-stats-4" data-bind="click: register">
									<span class="txt">លក់សរុប</span>
									<span class="count" style="font-size: 25px;" data-bind="text: totalSale"></span>
									<div class="clearfix"></div>
									<i class="icon-play-circle"></i>
								</div>
							</div>
						</div>						
					</div>
					<br>
					<div class="span12">
						<div class="widget widget-heading-simple widget-body-simple">		
			
							<div class="widget-body">

								<!-- Row -->
								<div class="row-fluid">
									<div class="span3">
									
										<!-- Stats Widget -->
										<div class="widget-stats widget-stats-gray widget-stats-1" data-bind="click: register">
											<span class="txt">វិក្កយបត្រមិនទាន់ទូទាត់</span>
											<div class="clearfix"></div>
											<span class="count" data-bind="text: totalOpenInvoice"></span>
										</div>
										<!-- // Stats Widget END -->
										
									</div>
									<div class="span3">
									
										<!-- Stats Widget -->
										<div class="widget-stats widget-stats-1" data-bind="click: register">
											<span class="txt">វិក្កយបត្រមិនទាន់បង់</span>
											<div class="clearfix"></div>
											<span class="count" data-bind="text: totalUnbill"></span>
										</div>
										<!-- // Stats Widget END -->
										
									</div>
									<div class="span3">
									
										<!-- Stats Widget -->
										<div class="widget-stats widget-stats-gray widget-stats-2" data-bind="click: register">
											<span class="count" data-bind="text: totalCustomer"></span>
											<span class="txt">អតិថិជនសរុប</span>
										</div>
										<!-- // Stats Widget END -->
										
									</div>
									<div class="span3">
									
										<!-- Stats Widget -->
										<div class="widget-stats widget-stats-2" data-bind="click: register">
											<span class="count">0</span>
											<span class="txt">បញ្ជាលក់</span>
										</div>
										<!-- // Stats Widget END -->
										
									</div>								
								</div>
								<!-- // Row END -->
								
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<div class="row-fluid">
			<div style="margin-top: 10px; margin-left: 0;" align="center">
				<p>© 2016 Banhji Co., Ltd. All rights reserved. Banhji is the registered trademarks of Banhji Co., Ltd. 
				<br>
				Terms and conditions, features, support, pricing, and service options subject to change without notice.</p>
			</div>	
		</div>
		<div id="signupForm" style="width: 300px;" data-bind="visible: showCreate">
			<div style="text-align: center; padding-right: 10px;">
				<input type="text" placeholder="Company Name" data-bind="value: current.company">
				<input type="text" style="width: 220px; margin-bottom: 10px;" placeholder="Country" data-role="combobox" data-bind="source: countries, value: current.country" data-text-field="name" data-value-field="id">
				<input type="text" style="width: 220px;" placeholder="Industry" data-role="combobox" data-bind="source: industries, value: current.industry" data-text-field="name" data-value-field="id"><br>
				<button class="btn btn-primary" style="width: 200px; margin-top: 10px;" data-bind="click: create">Create Company</button>
			</div>
		</div>	
	</script>



<!-- END OF DAWINE ==================================================================================================== -->
<!-- JQuery -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/resources/jquery.min.js"></script>
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/js/kendo.all.min.js"></script>
	
	<!-- Code Beautify -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/other/js-beautify/beautify.js"></script>
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/other/js-beautify/beautify-html.js"></script>
	
	<!-- Global -->
	<script>
	var basePath = '',
		commonPath = 'https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/';
	</script>
	
	<!-- JQueryUI -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/system/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
	
	<!-- JQueryUI Touch Punch -->
	<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/system/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
	
	<!-- Modernizr -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/system/modernizr.js"></script>
	
	<!-- Bootstrap -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- SlimScroll Plugin -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.js"></script>
	
	<!-- MegaMenu -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/demo/megamenu.js?1374506533"></script>
	
	<!-- jQuery ScrollTo Plugin -->
	<!--[if gt IE 8]><!--><script src="http://balupton.github.io/jquery-scrollto/lib/jquery-scrollto.js"></script><!--<![endif]-->
	
	<!-- History.js -->
	<!--[if gt IE 8]><!--><script src="http://browserstate.github.io/history.js/scripts/bundled/html4+html5/jquery.history.js"></script><!--<![endif]-->
	
	<!-- jQuery Ajaxify -->
	<!--[if gt IE 8]><!--><script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/system/jquery-ajaxify/ajaxify-html5.js"></script><!--<![endif]-->
	
	
	<!-- Holder Plugin -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/other/holder/holder.js?1374506533"></script>
	
	<!-- Uniform Forms Plugin -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js"></script>

	<!-- Bootstrap Extended -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/extend/bootbox.js"></script>
	
	<!-- Google Code Prettify -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/other/google-code-prettify/prettify.js"></script>
	
	<!-- MiniColors Plugin -->
	<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.js"></script>
	
	<!-- Cookie Plugin -->
	<script src="<?php echo base_url(); ?>resources/common/theme/scripts/plugins/system/jquery.cookie.js"></script>
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
<script>
	var banhji = banhji || {};
	var baseUrl = "<?php echo base_url(); ?>"+'api/';
	banhji.token = null;
	banhji.pageLoaded = {};		
	localforage.config({
		driver: localforage.LOCALSTORAGE,
		name: 'userData'
	});
	var dataStore = function(url) {
		var o = new kendo.data.DataSource({
				transport: {
					read 	: {
						url: url,
						type: "GET",
						headers: {
							"Entity": getDB(),
							"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
						},
						dataType: 'json'
					},
					create 	: {
						url: url,
						type: "POST",
						headers: {
							"Entity": getDB(),
							"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
						},
						dataType: 'json'
					},
					update 	: {
						url: url,
						type: "PUT",
						headers: {
							"Entity": getDB(),
							"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
						},
						dataType: 'json'
					},
					destroy : {
						url: url,
						type: "DELETE",
						headers: {
							"Entity": getDB(),
							"User": banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id
						},
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								limit: options.take,
								page: options.page,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				pageSize: 100
			});
		return o;
	};
	banhji.userManagement = kendo.observable({
		auth : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'authentication',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: baseUrl + 'authentication',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: baseUrl + 'authentication',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: baseUrl + 'authentication',
					type: "DELETE",
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
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			// pageSize: 100
		}),		
		inst 	 : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'banhji/company',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: baseUrl + 'banhji/company',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: baseUrl + 'banhji/company',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: baseUrl + 'banhji/company',
					type: "DELETE",
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
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			// pageSize: 100
		}),
		industry : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'banhji/industry',
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
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			// pageSize: 100
		}),
		countries: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'banhji/countries',
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
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			// pageSize: 100
		}),
		provinces: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'banhji/provinces',
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
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			// pageSize: 100
		}),
		types 	 : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: baseUrl + 'banhji/types',
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
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			// pageSize: 100
		}),
		onSuccessUpload: function(e){
			var logo = e.response.results.url;
			this.get('newInst').set('logo', logo);
			this.saveIntitute();
			// console.log(logo);
		},	 
		close 		: function() {
			window.history.back(-1);
			if(this.inst.hasChanges()) {
				this.inst.cancelChanges();
			}
			if(this.auth.hasChanges()) {
				this.auth.cancelChanges();
			}
		},
		taxRegimes: [
			{ code: 'small', type: 'ខ្នាតតូច'},
			{ code: 'medium', type: 'ខ្នាតមធ្យម'},
			{ code: 'large', type: 'ខ្នាតធំ'}
		],
		currency : [
			{ code: 'KHR', locale: 'km-KH'},
			{ code: 'USD', locale: 'us-US'},
			{ code: 'VND', locale: 'vn-VN'}
		],
		username : null,
		password : null,
		_password: null,
		pwdDS 	 : new kendo.data.DataSource({
			transport: {
				create 	: {
					url: baseUrl + 'banhji/password',
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
			schema 	: {
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
		validateEmail: function() {
			var sQtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
		  	var sDtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
		  	var sAtom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
		  	var sQuotedPair = '\\x5c[\\x00-\\x7f]';
		  	var sDomainLiteral = '\\x5b(' + sDtext + '|' + sQuotedPair + ')*\\x5d';
		  	var sQuotedString = '\\x22(' + sQtext + '|' + sQuotedPair + ')*\\x22';
		  	var sDomain_ref = sAtom;
		  	var sSubDomain = '(' + sDomain_ref + '|' + sDomainLiteral + ')';
		  	var sWord = '(' + sAtom + '|' + sQuotedString + ')';
		  	var sDomain = sSubDomain + '(\\x2e' + sSubDomain + ')*';
		  	var sLocalPart = sWord + '(\\x2e' + sWord + ')*';
		  	var sAddrSpec = sLocalPart + '\\x40' + sDomain; // complete RFC822 email address spec
		  	var sValidEmail = '^' + sAddrSpec + '$'; // as whole string

		  	var reValidEmail = new RegExp(sValidEmail);

		  	if(!reValidEmail.test(this.get('username'))){
		  		alert("Please enter valid address");
				this.set('passed', false);
		  	}
		  	this.set('passed', false);
		},
		loginBtn : function() {
			banhji.view.layout.showIn('#content', banhji.view.loginView);
		},
		login  	 : function() {
			this.auth.query({
				filter: [
					{field: 'username', value: banhji.userManagement.get('username')},
					{field: 'password', value: banhji.userManagement.get('password')}
				]
			}).done(function(e){
				var data = banhji.userManagement.auth.data();
				if(data.length > 0) {
					var user = banhji.userManagement.auth.data()[0];
					localforage.setItem('user', user);
					if(user.institute.length === 0) {
						banhji.router.navigate('/no-page');
					} else {
						banhji.router.navigate('/');
					}
				} else {
					console.log('bad');
				}
			});
		},
		registerBtn: function() {
			banhji.view.layout.showIn('#content', banhji.view.signupView);	
		},
		logout 		: function() {
			localforage.removeItem('user', function(err){
				window.location.assign("<?php echo base_url(); ?>home");
			});
		},
		setCurrent : function(current) {
			this.set('current', current);
		},
		changePwd  : function() {
			if(this.get('password') !== this.get('_password')) {
				alert("Password does not match");
			} else {
				this.pwdDS.sync();
			}
		},
		getLogin 	: function() {
			return JSON.parse(localStorage.getItem('userData/user'));
		},
		page 	 : function() {
			if(this.getLogin()) {
				return '\#/page';
			} else {
				return '\#/page/';
			}
			
		},
		createComp : function() {
			banhji.router.navigate('/create_company');
		},
		setInstitute: function(newIns) {
			this.set('newInst', newIns);
		},
		addInst    : function() {
			this.inst.insert(0, {
				name: "",
				email: "",
				address: "",
				description: "",
				industry: {id: null, name: null},
				type: {id: null, name: null},
				country: {id: null, code: null, name: null},
				province: {id: null, local: null, english: null},
				vat_no: null,
				fiscal_date: null,
				tax_regime: null,
				locale : null,
				legal_name: null,
				date_founded: null,
				logo: ""
			});
			this.setInstitute(this.inst.at(0));
		},
		cancelInst : function() {
			this.inst.cancelChanges();
		},
		saveIntitute: function() {
			if(this.get('newInst').industry.id !== null || this.get('newInst').province.id || this.get('newInst').country.id) {
				this.inst.sync();
				this.inst.bind('requestEnd', function(e){
					var type = e.type, res = e.response.results;
					if(e.response.error === false) {
						if(e.type === 'create') {
							$('#createComMessage').text("created. Please wait till site admin created database for you.");
						} else {
							localforage.removeItem('company', function(err){
								//
							});
							localforage.setItem('company', res);
							$('#createComMessage').text("Updated");
						}
					} else {
						$('#createComMessage').text("error creating company.");
					}
				});
			} else {
				alert('filling all fields');
			}
		},
		signup 	   : function() {
			this.auth.add({username: this.get('username'), password: this.get('password')});
			this.sync();
			this.auth.bind('requestEnd', function(e){
				if(e.type === 'create' && e.response.error === false) {
					alert("អ្នកបានចុះឈ្មោះរួច");
					banhji.router.route('')
				}
			});
		},
		onFileSelect: function(e) {
			console.log(e.files[0]);
		},
		sync: function() {
			this.auth.sync();
			this.auth.bind('requestEnd', function(e){
				var type = e.type;
				var result = e.response.results;
				if(type === "read" && e.error !== true) {
					// get login info
					console.log('true');
				} else if(type === "create") {
					if(e.response.error === true) {
						banhji.userManagement.auth.cancelChanges();
						alert('មានរួចហើយ');
					} else {
						var user = banhji.userManagement.auth.data()[0];
						localforage.setItem('user', user);
						if(!user.institute) {
							banhji.router.navigate('/page', false);
						} else {
							banhji.router.navigate('/app', false);
						}
					}
				}
			});
		}
	});
	// banhji.institute = banhji.userManagement.getLogin()!==null?banhji.userManagement.getLogin().institute[0]:"";
	function getDB() {
		var entity = null;
		// if(banhji.userManagement.getLogin()) {
		// 	if(banhji.userManagement.getLogin().institute) {
		// 		if(banhji.userManagement.getLogin().institute.length > 0) {
		// 			entity = banhji.userManagement.getLogin().institute[0].name
		// 		}
				
		// 	} else {
		// 		entity = false
		// 	}
		// }		
		return 'demo';
	}

	banhji.countries = new kendo.data.DataSource({
		transport: {
			read 	: {
				url: baseUrl + 'banhji/countries',
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
		schema 	: {
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
			read 	: {
				url: baseUrl + 'banhji/industry',
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
		schema 	: {
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
	
	banhji.index = kendo.observable({
		countries : banhji.countries,
		industries: banhji.industry,
		createDB  : new kendo.data.DataSource({
			transport: {
				create 	: {
					url: baseUrl + 'banhji/createDB',
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
			schema 	: {
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
		showCreate: false,
		setCurrent: function(current) {
			this.set('current', current);
		},
		email 	  : 'rith@pro-cg.com',  
		register  : function(e) {
			e.preventDefault();
			
			var win =$('#signupForm').kendoWindow({
				title: "Create Company",
				modal: true,
				close: function(e) {
					if(banhji.index.createDB.hasChanges()) {
						banhji.index.createDB.cancelChanges();
					}
				},
				open: function(e) {
					banhji.index.createDB.insert(0, {
						company: null,
						country: null,
						industry: null
					});
					banhji.index.setCurrent(banhji.index.createDB.at(0));
				}
			}).data('kendoWindow');
			win.center().open();
		},
		create: function() {
			this.createDB.sync();
			this.createDB.bind('requestEnd', function(e){
				var res = e.response;
				var type= e.type;

			});
		}
	});
		    	
	//END OF DAWINE  ---------------------------------------------------------------------------------


	<!-- views and layout -->
	banhji.view = {
		layout 		: new kendo.Layout('#layout', {model: banhji.Layout}),
		blank		: new kendo.View('<div></div>'),
		vendorMenu 	: new kendo.View("#vendor-menu-tmpl", {wrap: false, tagName: 'ul'}),
		// menu 		: new kendo.Layout('#menu-tmpl', {model: banhji.Layout}),
		// loginV 		: new kendo.View("#login-tmpl", {model: auth}),
		index  		: new kendo.Layout("#index", {model: banhji.index}),
		menu 		: new kendo.Layout('#menu-tmpl', {model: banhji.userManagement}),
		
		//END OF DAWINE  ---------------------------------------------------------------------------------
	};
	<!-- views and layout-->
	banhji.router = new kendo.Router({
		init: function() {
			// banhji.view.layout.render("#wrapperApplication");
			$('#current-section').html('|&nbsp;Company');
			$('#home-menu').addClass('active');
			banhji.view.layout.render("#wrapperApplication");
			// if(banhji.userManagement.getLogin() === false) {
			// 	window.location.assign("<?php echo base_url(); ?>home");
			// }
		},
		routeMissing: function(e) {
			// banhji.view.layout.showIn("#layout-view", banhji.view.missing);
			console.log("no resource found.")
		}
	});

	/* Login page */
	banhji.router.route('/', function(){
		var blank = new kendo.View('#blank-tmpl');
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		$('#current-section').text("");
		$("#secondary-menu").html("");
		if(getDB() !== null) {
			banhji.view.layout.showIn('#content', banhji.view.index);
					
		} else {
			// window.location.assign("<?php echo base_url(); ?>home");
		}
	});	
	//END OF DAWINE  ---------------------------------------------------------------------------------
	
	$(function() {	
		banhji.router.start();
		// if(!banhji.userManagement.getLogin()){
		// 	window.location.assign("<?php echo base_url(); ?>home");
		// } else {
		// 	if(banhji.currency.dataSource.data().length === 0) {
		// 		banhji.currency.dataSource.read();
		// 	}	
		// }
	});
</script>