<!DOCTYPE html>
<head>

<title>Retail</title>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/spa/icon-wellnez.png"> -->
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300" rel="stylesheet">

<!-- Theme CSS AdminLTE-->
<link rel="stylesheet" href="<?php echo base_url()?>assets/retail/bootstrap.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>assets/retail/font-awesome.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>assets/retail/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/retail/AdminLTE.min.css" >
<link rel="stylesheet" href="<?php echo base_url()?>assets/retail/skin-blue.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>assets/retail/retail.css">

<!-- <link re="stylesheet" href="https://fontawesome.com/v4.7.0/assets/font-awesome/css/font-awesome.css"> -->


    
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

<!-- Kedo JS by DAWINE -->
<!-- <script src="<?php echo base_url()?>assets/kendo/js/jszip.min.js"></script> -->
<script src="<?php echo base_url()?>assets/kendo/js/jquery.min.js"></script>
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

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
	    <!-- Main Header -->
	    <header class="main-header">
	        <!-- Logo -->
	        <a href="" class="logo">
	            <!-- mini logo for sidebar mini 50x50 pixels -->
	            <span class="logo-mini"><b>M</b>acro</span>
	            <!-- logo for regular state and mobile devices -->
	            <span class="logo-lg"><b>BanhJi</b>Macro</span>
	        </a>

	        <!-- Header Navbar -->
	        <nav class="navbar navbar-static-top" role="navigation">
	            <!-- Sidebar toggle button-->
	            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
	        		<span class="sr-only">Toggle navigation</span>
	      		</a>
	      		<span style="padding: 11px 15px 11px 0;  float: left; color: #fff; font-size: 20px; font-weight: 700;">Sales</span>
	            	
	            <!-- search form (Optional) -->
		      	<form action="#" method="get" class="sidebar-form hidden-xs" style="width: 50%; float: left; margin-left: 23%;">
			        <div class="input-group">
			          	<input style="height: 28px;" type="text" name="q" class="form-control" placeholder="Search..." style="background: #fff">
			          	<span class="input-group-btn">
			              	<button type="submit" name="search" id="search-btn" class="btn btn-flat" style="padding: 2px 12px; height: 28px;"><i class="fa fa-search"></i>
			              	</button>
			            </span>
			        </div>
			     </form>
			    <!-- /.search form -->

	            <!-- Navbar Right Menu -->
	            <div class="navbar-custom-menu">
	                <ul class="nav navbar-nav">
	                    <!-- Messages: style can be found in dropdown.less-->
	                    <li class="dropdown messages-menu">
	                        <!-- Menu toggle button -->
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				              	<i class="fa fa-plus-circle"></i>
				            </a>
	                        <ul class="dropdown-menu">
	                            <li class="header">You have 4 messages</li>
	                            <li>
	                                <!-- inner menu: contains the messages -->
	                                <ul class="menu">
	                                    <li>
	                                        <!-- start message -->
	                                        <a href="#">
	                                            <div class="pull-left">
	                                                <!-- User Image -->
	                                                <img src="<?php echo base_url()?>assets/retail/user2-160x160.jpg" class="img-circle" alt="User Image">
	                                            </div>
	                                            <!-- Message title and timestamp -->
	                                            <h4>
	                                                Support Team
	                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
	                                            </h4>
	                                            <!-- The message -->
	                                            <p>Why not buy a new awesome theme?</p>
	                                        </a>
	                                    </li>
	                                    <!-- end message -->
	                                </ul>
	                                <!-- /.menu -->
	                            </li>
	                            <li class="footer"><a href="#">See All Messages</a></li>
	                        </ul>
	                    </li>
	                    <!-- /.messages-menu -->

	                    <!-- Notifications Menu -->
	                    <li class="dropdown notifications-menu">
	                        <!-- Menu toggle button -->
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				              	<i class="fa fa-question-circle"></i>
				            </a>
	                        <ul class="dropdown-menu">
	                            <li class="header">You have 10 notifications</li>
	                            <li>
	                                <!-- Inner Menu: contains the notifications -->
	                                <ul class="menu">
	                                    <li>
	                                        <!-- start notification -->
	                                        <a href="#">
						                      	<i class="fa fa-users text-aqua"></i> 5 new members joined today
						                    </a>
	                                    </li>
	                                    <!-- end notification -->
	                                </ul>
	                            </li>
	                            <li class="footer"><a href="#">View all</a></li>
	                        </ul>
	                    </li>

	                    <!-- Notifications Menu -->
	                    <li class="dropdown notifications-menu">
	                        <!-- Menu toggle button -->
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				              	<i class="fa fa-list"></i>
				            </a>
	                        <ul class="dropdown-menu">
	                            <li class="header">You have 10 notifications</li>
	                            <li>
	                                <!-- Inner Menu: contains the notifications -->
	                                <ul class="menu">
	                                    <li>
	                                        <!-- start notification -->
	                                        <a href="#">
						                      	<i class="fa fa-users text-aqua"></i> 5 new members joined today
						                    </a>
	                                    </li>
	                                    <!-- end notification -->
	                                </ul>
	                            </li>
	                            <li class="footer"><a href="#">View all</a></li>
	                        </ul>
	                    </li>
	                </ul>
	            </div>
	        </nav>
	    </header>                    