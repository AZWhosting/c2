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
<meta name="description" content="<?php echo $description ?>" />
<meta name="keywords" content="<?php echo $keywords ?>" />
<meta name="author" content="<?php echo $author ?>" />

<!-- Kendo UI -->
<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.common.min.css">
<link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/kendoui/styles/kendo.bootstrap.min.css">
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
<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png">

</head>
<body class="document-body ">
<?php
	//mail('loat.choeun@gmail.com', 'test', 'test', 'test');
?>
	<div class="cover-rightfixed">
		<a class="rightfixed feedback btn-rounded glyphicons no-js circle_exclamation_mark" href="#feedbackContent" data-toggle="modal"><i></i>
			Feedback
		</a><br>
		<a class="rightfixed referral btn-rounded glyphicons no-js user_add" href="#referralContent" data-toggle="modal"><i></i>
			Referral
		</a><br>
		<a class="rightfixed enquiries btn-rounded glyphicons no-js conversation" style="width: 144px;" href="" data-toggle="modal"><i></i>
			Support
		<div class="enquiry-content">
			<p>Call us at<br>+855 10 413 777<br>Mon-Fri<br>09:00 - 18:00</p>
			<div class="fb-messengermessageus" 
			  messenger_app_id="1301847836514973" 
			  page_id="862386433857166"
			  color="blue"
			  width="180"
			  size="standard" ></div>
		</div>
		</a>
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
	<div class="modal fade popRightBlog" id="referralContent">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3>Referral</h3>
		</div>
		<div class="modal-body">
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
	<?php echo $body ?>

	<!-- extra js-->
	
	<script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));


    // Google Font
	WebFontConfig = {
		google: {
			families: ['Battambang::khmer']
		}
	};
	(function() {
		var wf = document.createElement('script');
		wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
			'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		wf.type = 'text/javascript';
		wf.async = 'true';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(wf, s);
	})();

  </script>
  <script type="text/javascript">
	$(document).ready(function(e) {
		$("#feedBackSend").click(function(){
			var MSG = $("#feedbackMsg").val();
			var CurrentURL = $(location).attr('href');
			var UserName = banhji.userData.username;
			var d = new Date();
			var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
			$.ajax({  
			    type: 'POST',
			    url: '<?php echo base_url(); ?>api/feedbacks', 
			    data: { msg: MSG, cURL: CurrentURL, uName: UserName, datesend: strDate },
			    success: function(response) {
			        alert(response.message);
			        $("#feedbackMsg").val("");
			        $(".cloze").click();
			    }
			});
		});
		$("#referralSend").click(function(){
			var name1 = $("#refferalName1").val();
			var email1 = $("#refferalEmail1").val();
			var name2 = $("#refferalName2").val();
			var email2 = $("#refferalEmail2").val();
			var name3 = $("#refferalName3").val();
			var email3 = $("#refferalEmail3").val();
			var name4 = $("#refferalName4").val();
			var email4 = $("#refferalEmail4").val();
			var name5 = $("#refferalName5").val();
			var email5 = $("#refferalEmail5").val();
			var UserName = banhji.userData.username;
			var d = new Date();
			var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
			$.ajax({  
			    type: 'POST',
			    url: '<?php echo base_url(); ?>api/referrals',
			    data: { uName: UserName, datesend: strDate, rName1: name1, rName2: name2, rName3: name3, rName4: name4, rName5: name5, rMail1: email1, rMail2: email2, rMail3: email3, rMail4: email4, rMail5: email5 },
			    success: function(response) {
			        alert(response.message);
			        //$("#feedbackMsg").val("");
			        $(".cloze").click();
			    }
			});
		});
	});
   </script>
</body>
</html>
