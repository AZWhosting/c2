<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if gt IE 8]> <html class="animations ie gt-ie8 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if !IE]><!--><html class="animations fluid top-full menuh-top sticky-top"><!-- <![endif]-->
<head>
<title>BanhJi - ASEAN Accounting Platform</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300" rel="stylesheet">

<!-- CSS Kendo By DAWINE -->
<!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/kendo/examples/content/shared/styles/examples-offline.css" /> -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/kendo0418/styles/kendo.common.min.css" />
<!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/kendo/styles/kendo.rtl.min.css" /> -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/kendo0418/styles/kendo.default.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/kendo0418/styles/kendo.default.mobile.min.css" />


<!-- Kendo UI -->
<!-- <link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.common.min.css"> -->
<!-- <link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.bootstrap.min.css"> -->
<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.dataviz.material.min.css">
<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.dataviz.bootstrap.min.css">




<!-- Bootstrap -->
<!--<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/bootstrap/css/responsive.css"-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap.css" >

<!-- Main Theme Stylesheet :: CSS -->
<!--<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/css/style-default-menus-dark.css?1374506511" rel="stylesheet" type="text/css" />
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/skins/css/blue-gray.css" rel="stylesheet" type="text/css" />-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/style-default-menus-dark.css" >
<link rel="stylesheet" href="<?php echo base_url()?>assets/blue-gray.css" >
<link href='https://fonts.googleapis.com/css?family=Content:400,700' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Preahvihear" rel="stylesheet"> 

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

<!-- Customize CSS-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/responsive.css" >

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
<script src="<?php echo base_url()?>assets/kendo0418/js/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/kendo0418/js/kendo.all.min.js"></script>
<script src="<?php echo base_url()?>assets/kendo/examples/content/shared/js/console.js"></script>

<!-- <script src="<?php echo base_url()?>assets/libraries/kendoui/js/kendo.all.min.js"></script> -->
<!-- <script src="<?php echo base_url()?>assets/libraries/kendoui/js/cultures/kendo.culture.km-KH.min.js"></script>
<script src="<?php echo base_url()?>assets/libraries/kendoui/js/cultures/kendo.culture.th-TH.min.js"></script>
<script src="<?php echo base_url()?>assets/libraries/kendoui/js/cultures/kendo.culture.vi-VN.min.js"></script>
<script src="<?php echo base_url()?>assets/libraries/kendoui/js/cultures/kendo.culture.de-DE.min.js"></script>
<script src="<?php echo base_url()?>assets/libraries/kendoui/js/cultures/kendo.culture.lo-LA.min.js"></script> -->
<script src="<?php echo base_url()?>assets/kendo0418/js/cultures/kendo.culture.km-KH.min.js"></script>
<script src="<?php echo base_url()?>assets/kendo0418/js/cultures/kendo.culture.th-TH.min.js"></script>
<script src="<?php echo base_url()?>assets/kendo0418/js/cultures/kendo.culture.vi-VN.min.js"></script>
<script src="<?php echo base_url()?>assets/kendo0418/js/cultures/kendo.culture.de-DE.min.js"></script>
<script src="<?php echo base_url()?>assets/kendo0418/js/cultures/kendo.culture.lo-LA.min.js"></script>
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

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="<?php echo base_url();?>assets/update/banhji.jpg">

</head>
<body class="document-body ">
<?php
	//mail('loat.choeun@gmail.com', 'test', 'test', 'test');
?>
	
	<a class="aWelcome" href="#firstPopUp" data-toggle="modal"></a>
	<div class="modal fade popRightBlog" id="firstPopUp">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<div class="span12 welcome">
			<div class="span5" style="text-align: center;">
				<img src="<?php echo base_url(); ?>assets/img/welcome/welcome.png" style="width:93%;margin-top: 20px;" />
				<div style="padding: 20px 0;" class="span12">
					<a href="https://www.facebook.com/BanhjiApp/" target="_blank"> 
						<img src="<?php echo base_url(); ?>assets/img/welcome/f-icon.png" style="float: left;width: 40px;" />
						<p style="font-size: 10px;color: #8497b0;float:left;text-align: left;width: 64%;">សូមចូលទៅកាន់ទំព័រ Facebook របស់ BanhJi ដើម្បីទទួលបានព័តមានថ្មី និងការណែនាំផ្សេង</p>
					</a>
				</div>
			</div>
			<div class="span7" style="float:right;">
				<h2 style="font-size: 16px; color: #bdd7ee;">មុនពេលចាប់ផ្តើមជាមួយBanhJi សូមមើលការណែនាំទីនេះ<br> <a style="color: #0063c1;" target="_blank" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/guide/welcome_guide.pdf">[Welcome Guide]</a> ដើម្បីជាជំនួយ</h2>
				<div class="span12 cover-welcome-four-blog">
					<p style="color: #8497b0;font-size:12px;">ជាទូទៅដើម្បីចាប់ផ្តើមប្រើប្រាស់ អ្នកគួរមាន ផលិតផល ឬសេវាកម្មដើម្បីលក់ អតិថិជនដែលត្រូវចេញវិក័យបត្រអោយ និងអ្នកផ្គត់ផ្គង់ដែលអ្នកត្រូវទិញផលិតផលទាំងនោះ</p>
					<a href="#/customer">
						<div class="cover-blog-welcome span3">
							<img src="<?php echo base_url(); ?>assets/img/welcome/1.png">
							<p style="color: #fff;font-size:10px;">កត់ត្រាអតិថិជនរបស់អ្នក</p>
						</div>
					</a>
					<a href="#/vendor">
						<div class="cover-blog-welcome span3">
							<img src="<?php echo base_url(); ?>assets/img/welcome/2.png">
							<p style="color: #fff;font-size:10px;">បន្ថែមអ្នកផ្គត់ផ្គង់របស់អ្នក</p>
						</div>
					</a>
					<a href="#/item">
						<div class="cover-blog-welcome span3">
							<img src="<?php echo base_url(); ?>assets/img/welcome/3.png">
							<p style="color: #fff;font-size:10px;">កត់ត្រាផលិតផលដែលដែលអ្នកលក់​ និងទិញ</p>
						</div>
					</a>
					<a href="#/item_service">
						<div class="cover-blog-welcome span3">
							<img src="<?php echo base_url(); ?>assets/img/welcome/4.png">
							<p style="color: #fff;font-size:10px;">កត់ត្រាសេវាកម្មដែលផ្តល់អោយអតិថិជន</p>
						</div>
					</a>
				</div>
				<p style="color: #8497b0;font-size:11px;">យើងខ្ញុំកំពុងបកប្រែទំព័រមួយចំនួន ដូចនេះទំព័រទាំងនោះមិនទាន់មានភាសាខ្មែរនៅឡើយទេ សូមអភ័យទោសចំពោះការយឺតយាវនេះ។ លើសពីនេះប្រសិនបើមានសំណួរ ឬមតិយោបល់សូមចុចលើប៊ូតុងទាំងនេះ </p>
			</div>
		</div>
	</div>

	<a class="aCustomer" href="#customerPopUp" data-toggle="modal"></a>
	<div class="modal fade popRightBlog" id="customerPopUp">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<div class="span12 welcome">
			<div class="span4" style="text-align: center;">
				<img src="<?php echo base_url(); ?>assets/img/welcome/wcustomer.png" style="margin-top: 35px;width: 63%;" />
				
			</div>
			<div class="span8" style="float:right;margin-top: 46px;">
				<h2 style="font-size: 16px; color: #bdd7ee;">ដើម្បីចាប់ផ្តើមប្រើទំព័រនេះ អ្នកគួរមានលក្ខខណ្ឌខាងក្រោម</h2>
				<div class="span12 cover-welcome-four-blog">
					<div class="cover-blog-welcome span3">
						<a href="#/customer">
						<p style="color: #fff;font-size:10px;text-align: left;">បង្កើតអតិថិជនរបស់អ្នកដើម្បីចេញវិក័យបត្រ</p>
						<img src="<?php echo base_url(); ?>assets/img/welcome/1.png">
						</a>
					</div>
					<div class="cover-blog-welcome span5">
						<p style="color: #fff;font-size:10px;text-align: left;">បង្កើតផលិតផលដែលអ្នកលក់​ និងទិញ ឬសេវាកម្មដែលអ្នកផ្តល់</p>
						<div class="row">
							<a href="#/item"><img style="width: 46%;float:left;" src="<?php echo base_url(); ?>assets/img/welcome/3.png"></a>
							<a href="#/item_service"><img style="width: 46%;float:left;" src="<?php echo base_url(); ?>assets/img/welcome/4.png"></a>
						</div>
					</div>
					<div class="cover-blog-welcome span4" style="text-align: center;">
						<a href="#/purchase">
							<p style="color: #fff;font-size:10px;text-align: left;">បើអ្នកលក់ផលិតផល អ្នកត្រូវទិញផលិតផលទាំងនោះ</p>
							<img style="width: 66%;" src="<?php echo base_url(); ?>assets/img/welcome/5.png">
						</a>
					</div>
				</div>
				<p style="color: #8497b0;font-size:14px;">មានទាំងអស់នេះហើយ អ្នកអាចរៀបចំសម្រង់តម្លៃ បញ្ជាលក់ ទទួលប្រាក់កក់ លក់ជាសាច់ប្រាក់ និងចេញវិក័យបត្របាន</p>
			</div>
		</div>
		<div class="bottom-cover">
			<a href="https://www.facebook.com/BanhjiApp/" target="_blank" style="float:left;"><img src="<?php echo base_url(); ?>assets/img/welcome/facebook-icon.png"></a><a href="https://m.me/862386433857166" target="_blank" style="float:left;"><img src="<?php echo base_url(); ?>assets/img/welcome/chart-icon.png"></a><p style="background: #5a9bd5; padding: 5px 15px; color: #000;float:left;">សួស្តីខ្ញុំជាជំនួយការអ្នក មានចំងល់សូមទំនាក់ទំនងមកខ្ញុំលេខ ០១០​ ៤១៣ ៧៧៧</p>
		</div>
	</div>

	<a class="aSupplier" href="#supplierPopUp" data-toggle="modal"></a>
	<div class="modal fade popRightBlog" id="supplierPopUp">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<div class="span12 welcome">
			<div class="span4" style="text-align: center;">
				<img src="<?php echo base_url(); ?>assets/img/welcome/supplier.png" style="margin-top: 35px;width: 63%;" />
				
			</div>
			<div class="span8" style="float:right;margin-top: 46px;">
				<h2 style="font-size: 16px; color: #bdd7ee;">ដើម្បីចាប់ផ្តើមប្រើទំព័រនេះ អ្នកគួរមានលក្ខខណ្ឌខាងក្រោម</h2>
				<div class="span12 cover-welcome-four-blog">
					<div class="cover-blog-welcome span3">
						<a href="#/vendor">
						<p style="color: #fff;font-size:10px;text-align: left;">បង្កើតអ្នកផ្គត់ផ្គង់របស់អ្នកដើម្បីបញ្ជាទិញ</p>
						<img src="<?php echo base_url(); ?>assets/img/welcome/2.png">
						</a>
					</div>
					<div class="cover-blog-welcome span5">
						<p style="color: #fff;font-size:10px;text-align: left;">បង្កើតផលិតផលដែលអ្នកលក់​ និងទិញ ឬសេវាកម្មដែលអ្នកផ្តល់</p>
						<div class="row">
							<a href="#/item"><img style="width: 46%;float:left;" src="<?php echo base_url(); ?>assets/img/welcome/3.png"></a>
							<a href="#/item_service"><img style="width: 46%;float:left;" src="<?php echo base_url(); ?>assets/img/welcome/4.png"></a>
						</div>
					</div>
					<div class="cover-blog-welcome span4" style="text-align: center;">
						<a href="#/purchase">
							<p style="color: #fff;font-size:10px;text-align: left;">អ្នកអាចចាប់ផ្តើម ទិញផលិតផលសម្រាប់លក់</p>
							<img style="width: 66%;" src="<?php echo base_url(); ?>assets/img/welcome/5.png">
						</a>
					</div>
				</div>
				<p style="color: #8497b0;font-size:14px;">មានទាំងអស់នេះហើយ អ្នកអាចរៀបចំការបញ្ជាទិញ ប្រាក់កក់ទៅអ្នកផ្គត់ផ្គង់ និងទិញផលិតផលសម្រាប់លក់បាន</p>
			</div>
		</div>
		<div class="bottom-cover">
			<a href="https://www.facebook.com/BanhjiApp/" target="_blank" style="float:left;"><img src="<?php echo base_url(); ?>assets/img/welcome/facebook-icon.png"></a><a href="https://m.me/862386433857166" target="_blank" style="float:left;"><img src="<?php echo base_url(); ?>assets/img/welcome/chart-icon.png"></a><p style="background: #5a9bd5; padding: 5px 15px; color: #000;float:left;">សួស្តីខ្ញុំជាជំនួយការអ្នក មានចំងល់សូមទំនាក់ទំនងមកខ្ញុំលេខ ០១០​ ៤១៣ ៧៧៧</p>
		</div>
	</div>

	<a class="aInventory" href="#inventoryPopUp" data-toggle="modal"></a>
	<div class="modal fade popRightBlog" id="inventoryPopUp">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<div class="span12 welcome">
			<div class="span4" style="text-align: center;">
				<img src="<?php echo base_url(); ?>assets/img/welcome/inventory.png" style="margin-top: 35px;width: 63%;" />
				
			</div>
			<div class="span8" style="float:right;margin-top: 46px;">
				<h2 style="font-size: 16px; color: #bdd7ee;">ដើម្បីចាប់ផ្តើមប្រើទំព័រនេះ អ្នកគួរមានលក្ខខណ្ឌខាងក្រោម</h2>
				<div class="span12 cover-welcome-four-blog">
					<div class="cover-blog-welcome span4">
						<p style="color: #fff;font-size:10px;text-align: left;">បង្កើតផលិតផលដែលអ្នកលក់​ និងទិញ ឬសេវាកម្មដែលអ្នកផ្តល់</p>
						<div class="row">
							<a href="#/item"><img style="width: 46%;float:left;" src="<?php echo base_url(); ?>assets/img/welcome/3.png"></a>
							<a href="#/item_service"><img style="width: 46%;float:left;" src="<?php echo base_url(); ?>assets/img/welcome/4.png"></a>
						</div>
					</div>
					<div class="cover-blog-welcome span4">
						<p style="color: #fff;font-size:10px;text-align: left;">បង្កើតអ្នកផ្គត់ផ្គង់ និងអតិថិជនរបស់អ្នកដើម្បីបញ្ជាទិញ និងលក់</p>
						<div class="row">
							<a href="#/vendor"><img style="width: 46%;float:left;" src="<?php echo base_url(); ?>assets/img/welcome/2.png"></a>
							<a href="#/customer"><img style="width: 46%;float:left;" src="<?php echo base_url(); ?>assets/img/welcome/1.png"></a>
						</div>
					</div>
					<div class="cover-blog-welcome span4">
						<p style="color: #fff;font-size:10px;text-align: left;">អ្នកអាចចាប់ផ្តើម ទិញ និងលក់ផលិតផល</p>
						<div class="row">
							<a href="#/purchase"><img style="width: 46%;float:left;" src="<?php echo base_url(); ?>assets/img/welcome/5.png"></a>
							<a href="#/invoice"><img style="width: 46%;float:left;" src="<?php echo base_url(); ?>assets/img/welcome/invoice.png"></a>
						</div>
					</div>
					
				</div>
				<p style="color: #8497b0;font-size:14px;">មានទាំងអស់នេះហើយ អ្នកអាចទិញ និងលក់ផលិតផលបាន</p>
			</div>
		</div>
		<div class="bottom-cover">
			<a href="https://www.facebook.com/BanhjiApp/" target="_blank" style="float:left;"><img src="<?php echo base_url(); ?>assets/img/welcome/facebook-icon.png"></a><a href="https://m.me/862386433857166" target="_blank" style="float:left;"><img src="<?php echo base_url(); ?>assets/img/welcome/chart-icon.png"></a><p style="background: #5a9bd5; padding: 5px 15px; color: #000;float:left;">សួស្តីខ្ញុំជាជំនួយការអ្នក មានចំងល់សូមទំនាក់ទំនងមកខ្ញុំលេខ ០១០​ ៤១៣ ៧៧៧</p>
		</div>
	</div>

	<a class="aAccount" href="#accountPopUp" data-toggle="modal"></a>
	<div class="modal fade popRightBlog" id="accountPopUp">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<div class="span12 welcome">
			<div class="span4" style="text-align: center;">
				<img src="<?php echo base_url(); ?>assets/img/welcome/accounting.png" style="margin-top: 35px;width: 63%;" />
				
			</div>
			<div class="span8" style="float:right;margin-top: 46px;">
				<h2 style="font-size: 16px; color: #bdd7ee;">ដើម្បីចាប់ផ្តើមប្រើទំព័រនេះ អ្នកគួរមានលក្ខខណ្ឌខាងក្រោម</h2>
				<div class="span12 cover-welcome-four-blog">
					<div class="cover-blog-welcome span6">
						<p style="color: #fff;font-size:10px;text-align: left;">បង្កើតផលិតផលដែលអ្នកលក់​ និងទិញ ឬសេវាកម្មដែលអ្នកផ្តល់</p>
						<div class="row">
							<a href="#/account"><img style="width: 32%;float:left;" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/journal.ico"></a>
							<a href="#/segment"><img style="width: 32%;float:left;" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/segment.ico"></a>
						</div>
					</div>
					<div class="cover-blog-welcome span4">
						<p style="color: #fff;font-size:10px;text-align: left;">បង្កើតអ្នកផ្គត់ផ្គង់ និងអតិថិជនរបស់អ្នកដើម្បីបញ្ជាទិញ និងលក់</p>
						<div class="row">
							<a href="#/vendor"><img style="width: 46%;float:left;" src="<?php echo base_url(); ?>assets/img/welcome/2.png"></a>
						</div>
					</div>
					
				</div>
				<p style="color: #8497b0;font-size:14px;">មានទាំងអស់នេះហើយ អ្នកអាចទិញ និងលក់ផលិតផលបាន</p>
			</div>
		</div>
		<div class="bottom-cover">
			<a href="https://www.facebook.com/BanhjiApp/" target="_blank" style="float:left;"><img src="<?php echo base_url(); ?>assets/img/welcome/facebook-icon.png"></a><a href="https://m.me/862386433857166" target="_blank" style="float:left;"><img src="<?php echo base_url(); ?>assets/img/welcome/chart-icon.png"></a><p style="background: #5a9bd5; padding: 5px 15px; color: #000;float:left;">សួស្តីខ្ញុំជាជំនួយការអ្នក មានចំងល់សូមទំនាក់ទំនងមកខ្ញុំលេខ ០១០​ ៤១៣ ៧៧៧</p>
		</div>
	</div>

	<div class="modal fade popRightBlog" id="feedbackContent">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>User Feedback</h3>
		</div>
		<div class="modal-body">
		  	<textarea id="feedbackMsg" placeholder="Your Feedback..."></textarea>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-default cloze" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary" id="feedBackSend">Send</a>
		</div>
	</div>
	<div class="modal fade popRightBlog" style="height: 330px" id="referralContent">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Refer to Friends</h3>
		</div>
		<div class="modal-body">
			<p>Help us grow and earn rewards! Get 100MB of storage when you refer customers to BanhJi that signup.</p>
		  	<input type="text" name="refferalName1" id="refferalName1" placeholder="Name" /><input type="email" name="refferalEmail1" id="refferalEmail1" placeholder="Email" />
		  	<input type="text" name="refferalName2" id="refferalName2" placeholder="Name" /><input type="email" name="refferalEmail1" id="refferalEmail2" placeholder="Email" />
		  	<input type="text" name="refferalName3" id="refferalName3" placeholder="Name" /><input type="email" name="refferalEmail1" id="refferalEmail3" placeholder="Email" />
		  	<input type="text" name="refferalName4" id="refferalName4" placeholder="Name" /><input type="email" name="refferalEmail1" id="refferalEmail4" placeholder="Email" />
		  	<input type="text" name="refferalName5" id="refferalName5" placeholder="Name" /><input type="email" name="refferalEmail1" id="refferalEmail5" placeholder="Email" />
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-default cloze" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary" id="referralSend">Send</a>
		</div>
	</div>