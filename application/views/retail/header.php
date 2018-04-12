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
	            <span class="logo-mini"><b>R</b>etail</span>
	            <!-- logo for regular state and mobile devices -->
	            <span class="logo-lg"><b>BanhJi</b>Retail</span>
	        </a>

	        <!-- Header Navbar -->
	        <nav class="navbar navbar-static-top" role="navigation">
	            <!-- Sidebar toggle button-->
	            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
	        		<span class="sr-only">Toggle navigation</span>
	      		</a>
	      		<span style="padding: 11px 15px;  float: left; color: #fff; font-size: 20px; font-weight: 700;">Sales</span>
	            <!-- Navbar Right Menu -->
	            <div class="navbar-custom-menu">
	                <ul class="nav navbar-nav">
	                    <!-- Messages: style can be found in dropdown.less-->
	                    <li class="dropdown messages-menu">
	                        <!-- Menu toggle button -->
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				              	<i class="fa fa-envelope-o"></i>
				              	<span class="label label-success">4</span>
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
				              	<i class="fa fa-bell-o"></i>
				              	<span class="label label-warning">10</span>
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
	                    <!-- Tasks Menu -->
	                    <li class="dropdown tasks-menu">
	                        <!-- Menu Toggle Button -->
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				              	<i class="fa fa-flag-o"></i>
				              	<span class="label label-danger">9</span>
				            </a>
	                        <ul class="dropdown-menu">
	                            <li class="header">You have 9 tasks</li>
	                            <li>
	                                <!-- Inner menu: contains the tasks -->
	                                <ul class="menu">
	                                    <li>
	                                        <!-- Task item -->
	                                        <a href="#">
	                                            <!-- Task title and progress text -->
	                                            <h3>
	                                                Design some buttons
	                                                <small class="pull-right">20%</small>
	                                            </h3>
	                                            <!-- The progress bar -->
	                                            <div class="progress xs">
	                                                <!-- Change the css width attribute to simulate progress -->
	                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
	                                                    <span class="sr-only">20% Complete</span>
	                                                </div>
	                                            </div>
	                                        </a>
	                                    </li>
	                                    <!-- end task item -->
	                                </ul>
	                            </li>
	                            <li class="footer">
	                                <a href="#">View all tasks</a>
	                            </li>
	                        </ul>
	                    </li>
	                    <!-- User Account Menu -->
	                    <li class="dropdown user user-menu">
	                        <!-- Menu Toggle Button -->
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	                            <!-- The user image in the navbar-->
	                            <img src="<?php echo base_url()?>assets/retail/user2-160x160.jpg" class="user-image" alt="User Image">
	                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
	                            <span class="hidden-xs">Alexander Pierce</span>
	                        </a>
	                        <ul class="dropdown-menu">
	                            <!-- The user image in the menu -->
	                            <li class="user-header">
	                                <img src="<?php echo base_url()?>assets/retail/user2-160x160.jpg" class="img-circle" alt="User Image">

	                                <p>
	                                    Alexander Pierce - Web Developer
	                                    <small>Member since Nov. 2012</small>
	                                </p>
	                            </li>
	                            <!-- Menu Body -->
	                            <li class="user-body">
	                                <div class="row">
	                                    <div class="col-xs-4 text-center">
	                                        <a href="#">Followers</a>
	                                    </div>
	                                    <div class="col-xs-4 text-center">
	                                        <a href="#">Sales</a>
	                                    </div>
	                                    <div class="col-xs-4 text-center">
	                                        <a href="#">Friends</a>
	                                    </div>
	                                </div>
	                                <!-- /.row -->
	                            </li>
	                            <!-- Menu Footer-->
	                            <li class="user-footer">
	                                <div class="pull-left">
	                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
	                                </div>
	                                <div class="pull-right">
	                                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
	                                </div>
	                            </li>
	                        </ul>
	                    </li>
	                    <!-- Control Sidebar Toggle Button -->
	                    <li>
	                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
	                    </li>
	                </ul>
	            </div>
	        </nav>
	    </header>