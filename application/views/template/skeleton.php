<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if gt IE 8]> <html class="animations ie gt-ie8 fluid top-full menuh-top sticky-top"> <![endif]-->
<!--[if !IE]><!--><html class="animations fluid top-full menuh-top sticky-top"><!-- <![endif]-->
<head>
<title>Banhji</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
<meta name="description" content="<?php echo $description ?>" />
<meta name="keywords" content="<?php echo $keywords ?>" />
<meta name="author" content="<?php echo $author ?>" />

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

<!-- Main Theme Stylesheet :: CSS -->
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/css/style-default-menus-dark.css?1374506511" rel="stylesheet" type="text/css" />
<link href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/common/theme/skins/css/blue-gray.css" rel="stylesheet" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Content:400,700' rel='stylesheet' type='text/css'>
<style>
	body{
		background: #f4f4f4 !important;
		font-family: 'Open Sans', sans-serif !important;
	}

	#module-image {
		list-style: none;
	}
	#module-image li {
		width: 116px;
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
		background: #f4f4f4;
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

	.supplier-icon{
		width: 100%;
	}
	
	.customer-icon{
		width: 90%;
		padding: 0 17%;
	}
	.customer-icon div:first-child{
		margin-right: 10px;
	}
	.customer-border{
		border: none;
	}
	.k-listview:after {
		display: none !important;
	}
	.text-table tr td span{
		color: #333 !important;
	}
	.customer-background{
		width: 990px;
		background: #fff;
		margin: 0 auto;
		padding: 15px 0 10px;
	}
	.table-condensed th, .table-condensed td{
		padding: 0 0 10px 0 !important;
	}
	.cash-table td{
	    padding: 4px 10px !important;
	}
	.k-selectable tr td{
		padding: 0 !important;
	}
	.media, .media-body {
		padding: 8px;
	}
	.btn-nomargin{
		margin-left: 0 !important;
	}

	.welcome-board{
		width: 98%;
		padding: 15px;
		background: #fff;
		float: left;
		position: relative;
	}
	.welcome-board .span4 h2{
		font-size:  21px;
		color: #333;
		float: left;
	}
	.welcome-board .span8,
	.welcome-board .span8 a:hover{
		color: #90A5BA;
	}
	.welcome-board .span8 a{
		font-weight: 600;
	}
	.btn-close{
		position: absolute;
	    font-size: 20px;
	    cursor: pointer;
	    right: 27px;
	    top: 37%;
	}

	.board-add{
		width: 98%;
		padding: 15px;
		background: #fff;
		float: left;
		position: relative;
		margin-top: 10px; 
	}
	.board-add .span6 p{
		font-size:  11px;
		color: #333;
		float: left;
	}
	.board-add .span5{
		margin-top: 10px;
	}
	.board-financial{
		width: 98%;
		padding: 15px;
		background: #fff;
		float: left;
		position: relative;
		margin-top: 10px;
		color: #333;
	}
	.board-financial P{ margin-bottom: 0; }
	.board-financial .financial-text2{
		color: #2D74B5;
		font-size: 20px;

	}

	.board-chart{
		width: 98%;
		padding: 15px;
		background: #fff;
		float: left;
		position: relative;
		margin-top: 10px;
		color: #333;
	}
	.board-chart p{
		font-weight: 600;
	}
	.board-chart p{ font-size: 600; }
	.performance,
	.position {
		background: #E7F2E0;
	    width: 95%;
	    padding: 15px;
	    float: left;
	    border-collapse: inherit;
	}

	.performance tr td,
	.position tr td{
		padding: 5px 0 5px 0;
    	border-bottom: 1px  #D7DCD4 solid;
	}
	.performance tr:last-child td,
	.position tr:last-child td{
    	border-bottom: 3px  #D7DCD4 double;
	}

	.welcome-nopadding{
		width:  90%;
	}
	.span12 .k-chart{
		margin-left: -20px;
	}
	.welcome-nopadding p{
		text-align:  center;
		font-weight: 600;
		color: #333;
		font-size: 20px;
		margin-top: 15px;
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
	#menu {
		position: relative !important;
	    width: 88%;
	}

	@media (max-width: 2000px){
		.container {
		    width: 1170px !important;
		}
	}

	@media (min-width: 1200px){
		.container {
		    width: 1170px !important;
		}
	}
	
	@media (min-width: 992px){
		.container {
		    width: 980px ;
		}
	}
	@media (min-width: 768px){
		.container {
		    width: 750px ;
		}
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
<!--start kendo localization in Khmer-->

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png">

</head>
<body class="document-body ">
	<?php echo $body ?>

	<!-- extra js-->
	
	<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
</body>
</html>
