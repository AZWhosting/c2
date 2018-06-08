<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if gt IE 8]> <html class="animations ie gt-ie8 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if !IE]><!--><html class="animations fluid top-full menuh-top sticky-top"><!-- <![endif]-->
<head>
<title>UtiBill App | Cashier Page</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300" rel="stylesheet">
<!-- <link href='https://fonts.googleapis.com/css?family=Content:400,700' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet"> -->
<link href="https://fonts.googleapis.com/css?family=Preahvihear" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Battambang" rel="stylesheet"> 

<!-- Main Theme Stylesheet :: CSS -->
<!--<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/css/style-default-menus-dark.css?1374506511" rel="stylesheet" type="text/css" />
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/skins/css/blue-gray.css" rel="stylesheet" type="text/css" />-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/style-default-menus-dark.css" >
<link rel="stylesheet" href="<?php echo base_url()?>assets/blue-gray.css" >


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


<!-- Bootstrap -->
<!--<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/css/responsive.css"-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap.css" >


<!-- Glyphicons Font Icons -->
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/fonts/glyphicons/css/glyphicons.css" rel="stylesheet" />

<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/fonts/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
<!--[if IE 7]><link rel="stylesheet" href="../../../../../common/theme/fonts/font-awesome/css/font-awesome-ie7.min.css"><![endif]-->

<!-- Uniform Pretty Checkboxes -->
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css" rel="stylesheet" />

<!-- PrettyPhoto -->
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/gallery/prettyphoto/css/prettyPhoto.css" rel="stylesheet" />



<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/modernizr-2.6.1-respond-1.1.0.min.js"></script>
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/jquery-1.8.2.min.js"></script>
<script>window.jQuery || document.write('https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/jquery-1.8.2.min.js"><\/script>')</script>
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  
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

<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap.css" />
<script src="<?php echo base_url()?>assets/kendo/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/bootstrap.min.js"></script>

<!-- Customize CSS-->
<!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/responsive.css" > -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/water/water.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/invoice/invoice.css" />

<!-- jcarousel-->
<script src="<?php echo base_url()?>assets/app_center/jquery.js" ></script>
<script src="<?php echo base_url()?>assets/app_center/jquery.jcarousel.min.js" ></script>
<script src="<?php echo base_url()?>assets/app_center/jcarousel.responsive.js" ></script>



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

<!-- Kedo JS by DAWINE -->
<!-- <script src="<?php echo base_url()?>assets/kendo/js/jszip.min.js"></script> -->
<script src="<?php echo base_url()?>assets/kendo/js/kendo.all.min.js"></script>
<script src="<?php echo base_url()?>assets/kendo/examples/content/shared/js/console.js"></script>

<!-- <script src="<?php echo base_url()?>assets/libraries/kendoui/js/kendo.all.min.js"></script> -->
<script src="<?php echo base_url()?>assets/libraries/kendoui/js/cultures/kendo.culture.km-KH.min.js"></script>
<script src="<?php echo base_url()?>assets/libraries/kendoui/js/cultures/kendo.culture.th-TH.min.js"></script>
<script src="<?php echo base_url()?>assets/libraries/kendoui/js/cultures/kendo.culture.vi-VN.min.js"></script>
<script src="<?php echo base_url()?>assets/libraries/kendoui/js/cultures/kendo.culture.de-DE.min.js"></script>
<!-- LESS.js Library -->
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/plugins/system/less.min.js"></script>

<!-- Print JS -->
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/jquery.print.js"></script>
<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/scripts/demo/megamenu.js?1374506514"></script>

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

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png">
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-106967397-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());

  gtag('config', 'UA-106967397-1');
</script>


</head>
<body class="document-body ">
	<div class="row logout">
		<div class="container" style="text-align: right; padding-top: 30px;">
			<div style="text-align: left;float: left;">
				<a href="#" onclick="langVM.changeToKh()">
	        		<span>ភាសាខ្មែរ</span>
	        	</a> | 
				<a href="#" onclick="langVM.changeToEn()">
					<span>English</span>
				</a>
			</div>
			<div style="text-align: right;float: right;">
				<span>Hello [<span id="userCut"></span>] |
				<a href="<?php echo base_url(); ?>login" >Logout</a></span>
			</div>
		</div>
	</div>
	
	