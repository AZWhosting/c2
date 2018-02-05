<!-- Facebook and Direct Chat -->
<script>
    // $(document).on('click',function(){
    //     $('.collapse').collapse('hide');
    // })
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
<div id="wrapperApplication" class="wrapper"></div>
<!--load before somthing not yet done -->
<div id="holdpageloadhide" style="display:block;text-align: center;position: fixed;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
	<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
</div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
	<!-- <div id="menu" class="menu"></div> -->
	<div id="content" ></div>
</script>
<script type="text/x-kendo-template" id="blank-tmpl">
</script>
<script type="text/x-kendo-template" id="menu-tmpl">
	<nav class="navbar navbar-inverse " role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" style="margin: 0">
            	<!-- Menu Phone -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Menu Phone Multipel Task-->
                <button type="button" class="navbar-toggle phone-multitasklist" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">	                   
                    <span class="icon-th-list"></span>
                </button>

                <!-- Menu Phone Langauge-->
                <button type="button" class="navbar-toggle phone-lang" data-toggle="collapse" data-target="#bs-example-navbar-collapse-4">
                    <span data-bind="text: lang.localeCode"></span>
                </button>

                <!--Logo-->
                <!-- <a class="navbar-brand" href="#/" data-bind="click: checkRole"> -->
                <a class="navbar-brand" href="<?php echo base_url();?>wellnez" >
                    <img src="<?php echo base_url();?>assets/spa/logo.png" >
                </a>
            </div>
            <div class="row" style="margin-right:0 ;">
	            <div class="col-sm-4 col-md-4" style="padding: 0;">
		            <form class="navbar-form pull-left  hidden-xs" >
					  	<input type="text" class="span2 search-query" placeholder="Search" id="search-placeholder" 
					  			data-bind="value: searchText" 
					  			style="background-color: #fff; color: #ffffff; border-color: #333333; height: 33px;">
					  	<button type="submit" class="btn btn-inverse" data-bind="click: search"><i class="icon-search"></i></button>
					</form>
				</div>
				<div class="hidden-sm col-md-3">
				</div>
				<!-- Menu rigth Desktop -->
				<div class="col-sm-4 col-md-3" style="float: right; padding: 0;">
					<ul class="menu-right  topnav pull-right hidden-xs">
						<li role="presentation" class="setting dropdown">
					  		<a style="color: #fff;" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="right-user-name" data-bind="text: getUsername"></span></a>
				  			<ul class="dropdown-menu">
				  				<li>
			                    	<a href="#" data-bind="click: lang.changeToKh">
			                    		<img class="kh-flag" src="https://lipis.github.io/flag-icon-css/flags/4x3/kh.svg">
			                    		<span>ភាសាខ្មែរ</span>
			                    	</a>
			                    </li>
		    					<li>
		    						<a href="#" data-bind="click: lang.changeToEn">
		    							<img class="en-flag" src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg">
		    							<span>English</span>
		    						</a>
		    					</li>
		    					<!-- <li>
									<a href='#/setting' >
										<i class="icon-power-off"></i>
										<span>Setting</span>
									</a>
								</li> -->
								<li class="divider"></li>
								<li>
									<a href="#/manage" data-bind="click: logout">
										<i class="icon-power-off"></i>
										<span>Logout</span>
									</a>
								</li>
				  			</ul>
					  	</li>
					  	<!-- <li role="presentation" class="dropdown multitasklist">
					  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					  			<i class="icon-th-list"></i>
					  		</a>
				  			<ul class="dropdown-menu ul-multiTaskList" data-template="multiTaskList-row-template" data-bind="source: multiTaskList">  				  				
				  			</ul>
					  	</li> -->
					  	<li class="question">
					  		<a style="padding-top: 0;" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					  			<i class="icon-question icon-question1"></i>
					  		</a>
					  		<ul class="dropdown-menu" style="width: 408px !important; left: -295px !important; margin-top: 0; padding-bottom: 0; border: none;">
					  			
					  			<div class="middle-help" style="background: #f4f4f4; padding: 20px 20px 20px; text-align: left; display: inline-block; width: 100%;">
					  				<div class="more-help" style="border-bottom: 1px solid #ddd; margin-bottom: 10px; width: 100%; float: left; padding-bottom: 10px;">
				  						<div class="help-img" style="margin-right: 20px; float: left;">
				  							<img src="http://fpoimg.com/51x51?text=Picture%201">
				  						</div>
				  						<div class="help-desc" style="float: left;">
				  							<p>Need more help?</p>
				  							<a href="" target="_blank">Help Center</a>
				  						</div>
				  					</div>
				  					<div class="what-help" style="width: 100%; float: left;">
				  						<div class="help-img" style="margin-right: 20px; float: left;">
				  							<img src="http://fpoimg.com/51x51?text=Picture%202">
				  						</div>
				  						<div class="help-desc">
				  							<p>Check out what's new</p>
				  							<a href="" target="_blank">Learn about new product features</a>
				  						</div>
				  					</div>
					  			</div>
					  			
					  		</ul>
					  	</li>
					  	<li class="icon-setting">
					  		<a href="#/setting" class="glyphicons settings">
					  			<i class="text-t"></i>
					  		</a>
					  	</li>
					  	<li class="iconbell">
					  		<a href="">
					  			<i class="icon-bell"></i>
					  		</a>
					  	</li>
					  	
					</ul>
				</div>
			</div>
			<!-- Secondary Menu -->
			<!-- <ul class="topnav hidden-xs " id="secondary-menu">
			</ul> -->

            <!-- Menu Phone -->
            <div class="menu-phone collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav hidden-lg hidden-md hidden-sm">
                	<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/' class='glyphicons show_big_thumbnails'><i></i><span >Dashnboard</span></a></li>
				  	<!-- <li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/center'><span data-bind="text: lang.lang.center"></span></a></li>
				  	<li role='presentation' class='dropdown'>
				  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span style="margin-top: 12px;" class='caret'></span></a>
			  			<ul class='dropdown-menu'>
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/customer'><span >Add New Customer</span></a></li>
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/property'><span >Add New Property</span></a></li> 
			  				<li ><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/reorder'><span >Reading Route Management</span></a></li>  				
			  				<li><span class="li-line"></span></li>
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/reading'><span >1. Meter Reading</span></a></li>
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/run_bill'><span >2. Run Bill</span></a></li> 
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/print_bill'><span >3. Print Bill</span></a></li>
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/receipt'><span >4. Cash Receipt</span></a></li>
			  				<li><span class="li-line"></span></li>
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/imports'><span >Import</span></a></li>
			  				<li><span class="li-line"></span></li>
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" data-toggle="collapse" data-target=".navbar-collapse" href='#/backup'><span>Back Up</span></a></li>
			  				<li><a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/offline'><span>Offline</span></a></li>
			  			</ul>
				  	</li>
				  	<li>
				  		<a data-toggle="collapse" data-target=".navbar-collapse.in" href="#/reports">
				  			<span>REPORTS</span>
				  		</a>
				  	</li> -->
                	<li>
						<a data-toggle="collapse" data-target=".navbar-collapse.in" href='#/setting' class='glyphicons settings'>
							<i ></i>
							<span>Setting</span>
						</a>
					</li>
					<li>
						<a data-toggle="collapse" data-target=".navbar-collapse.in" href="#/manage" data-bind="click: logout">
							<i class="icon-power-off"></i>
							<span>Logout</span>
						</a>
					</li>
                </ul>
            </div>


            <!-- Menu Phone Multipel Task-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            	<ul class="hidden-lg hidden-md hidden-sm ul-multiTaskList nav navbar-nav phone-multiTaskList" data-template="multiTaskList-row-template" data-bind="source: multiTaskList">  				  				
		  		</ul>
            </div>

            <!-- Menu Phone Search-->
            <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3">
            	<form class="navbar-form pull-left hidden-lg hidden-md hidden-sm">
				  	<input id="search-placeholder" class="span2 search-query" 
				  		type="text" 
				  		placeholder="Search" 
				  		data-bind="value: searchText" />
				  	<button data-toggle="collapse" data-target=".navbar-collapse" class="btn btn-inverse"
				  		type="submit" 
				  		data-bind="click: search" >
				  			<i class="icon-search "></i>
				  	</button>
				</form>
            </div> -->

            <!-- Menu Phone Langauge-->
            <div class="menu-phone collapse navbar-collapse" id="bs-example-navbar-collapse-4">
            	<ul class=" nav navbar-nav hidden-lg hidden-md hidden-sm phone-language">
                    <li>
                    	<a  href="#" data-bind="click: lang.changeToKh">
                    		<img class="kh-flag" src="https://lipis.github.io/flag-icon-css/flags/4x3/kh.svg">
                    		<span style="margin-left: 0;">ភាសាខ្មែរ</span>
                    	</a>
                    </li>
					<li>
						<a  href="#" data-bind="click: lang.changeToEn">
							<img class="en-flag" src="https://lipis.github.io/flag-icon-css/flags/4x3/gb.svg">
							<span>English</span>
						</a>
					</li>	
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>	
</script>
<script id="multiTaskList-row-template" type="text/x-kendo-template">
    <li >
    	<a data-toggle="collapse" data-target=".navbar-collapse.in" href="\#/#=url#">
    		<span >#=name#</span>
    		<span title="Remove" class="multiTaskList glyphicons remove_2 pull-right" data-bind="click: removeLink">
    			<i></i>
    		</span>
    	</a>
    </li>	
</script>
<style>
	@media (min-width: 768px){
		html.no-touch.sticky-top:not(.animations-gpu) #content {
		    padding-top: 0;
		}
	}
	.session .example{
		background: #0eac00;
	    width: 100%;
	    text-align: center;
	    position: relative; 
	    padding: 15px;
	    border-radius: 20px;
	    float: left;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	    
	}
	.session .example h2{
		color: #fff;
		text-align: left;
		margin-bottom: 10px;
	}
	.session .example table th{
		text-transform: uppercase;
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
    .chat a.enquiries {
        background: url(//storage.googleapis.com/instapage-user-media/e315080c/8593373-0-s-bg.jpg) no-repeat right center #1F4774;
        background-size: 23px;
        background-position-x: 110px;
    }
    a.enquiries:hover {
        left: 95px;
    }
    a.referral:hover {
        margin-left: -56px;
    }
    
    .enquiry-content {
        background: #fff;
        border: 1px solid #D7D7D7;
        padding: 10px 10px 0;
        position: absolute;
        width: 142px;
        left: -120px;
        font-size: 12px;
        text-align: center;
        bottom: -130px;
        -webkit-transition: all .5s;
        transition: all .5s;
        padding-bottom: 10px;
        color: #444;
        z-index: -1;
    }
    a.enquiries:hover .enquiry-content, .enquiry-content:hover {
           left: 0;
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
    .cover-rightfixed {
        position: fixed;
        top: 39.7%;
        left: -95px;
        z-index: 999;
        text-align: left;
    }
    .text-t.rightfixed {
	    position: relative;
	    background: red;
	    padding: 15px 10px;
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
	    font-size: 15px; 
	    float:left; 
	    background: url(<?php echo base_url();?>assets/spa/multi.png) no-repeat right center red;
	    background-size: 23px;
	    background-position-x: 275px;
	    margin-left: -168px;
	    width: 313px;
	    text-align: left;
	}
	.text-t.rightfixed:hover {
		opacity: 1;
		z-index: 9999999;
		margin-left: 0
	}
	.text-t.rightfixed i::before {
	    color: #fff;
	    top: 10px;
	    left: 7px;
	    font-size: 20px;
	}
	.text-t.feedback:hover {
	    margin-left: -66px;
	}
	.text-t.enquiries:hover {
	    left: 95px;
	    width: 313px;
	}
	.text-t.referral:hover {
	    margin-left: -56px;
	}
	.text-t.enquiries:hover .enquiry-content, .enquiry-content:hover {
	    left: 0px;

	}
	.text-t .enquiry-content ul {
		padding: 0;
		margin: 0;
	}
	.text-t .enquiry-content ul li{
		display: inline-block;
		list-style: none;
		width: 100%;
		padding-bottom: 5px;
	}

	.text-t .enquiry-content ul li.divider{
	    border-bottom: 1px #000 solid;
	    width: 100%;
	    float: left;
	    margin-bottom: 5px;
	}
	.text-t .enquiry-content ul li a{
		color: #000;
		padding: 5px;
		font-size: 14px;
	}
	.text-t .enquiry-content ul li a:hover{
		color: #203864;
		text-decoration: underline;
	}
	.text-t  .enquiry-content {
		bottom: -283px;
	    left: -313px;
	    width: 313px;
	}

	.multiple-list.rightfixed {
	    position: relative;
	   	padding: 15px 10px;
	   	padding-left: 50px;
	    z-index: 99;
	    color: #fff;
	    border-radius: 3px;
	    font-size: 12px;
	    cursor: pointer;
	    -webkit-transition: all .5s;
	    transition: all .5s;
	    text-decoration: none;
	    opacity: 1;
	    margin-bottom: 1px;
	    clear: both;
	    float: none;
	    left: 0;
	    background: url(<?php echo base_url();?>assets/spa/icon-report.png) no-repeat right center green; 
	    background-size: 23px;
	    background-position-x: 275px;
	    margin-left: -168px;
	    width: 313px;
	    text-align: left;
	}
	.multiple-list.rightfixed:hover {
		opacity: 1;
		z-index: 9999999;
		margin-left: 0;
	}
	.multiple-list.rightfixed i::before {
	    color: #fff;
	    top: 10px;
	    left: 7px;
	    font-size: 20px;
	}
	.multiple-list.feedback:hover {
	    margin-right: -66px;
	}

	.multiple-list.enquiries:hover {
	    left: 95px;
	    width: 313px;
	}
	.multiple-list.referral:hover {
	    margin-right: -56px;
	}
	.multiple-list.enquiries:hover .enquiry-content, .enquiry-content:hover {
	    left: 0;
	}
	.multiple-list .enquiry-content ul {
		padding: 0;
		margin: 0;
	}
	.multiple-list .enquiry-content ul li{
		display: inline-block;
		list-style: none;
		width: 100%;
		padding-bottom: 5px;
	    text-align: left;
	}
	.multiple-list .enquiry-content ul li a{
		color: #000;
		padding: 5px;
		font-size: 14px;
	}
	.multiple-list .enquiry-content ul li a:hover{
		color: #203864;
		text-decoration: underline;
	}
	.multiple-list  .enquiry-content {
		bottom: -97px;
	    width: 313px;
	    left: -219px
	}
	.cover-rightfixed.chat{
	    top: 52%;
	}
	.glyphicons.remove_2 i:before {
	    cursor: pointer;
	    color: #000 !important;
	    top: 0 !important;
	}

</style>
<!-- ***************************
*	Water Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template">
	<div class="container">
		<div class="row session">
			<div class="span12">
				<div class="example">
					<h2>Session Management</h2>
					<div data-bind="visible: noSession">
						<table class="table table-bordered table-primary table-striped table-vertical-center" style="margin-top: 15px;">
					        <thead>
					            <tr>
					            	<th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
					            	<th style="vertical-align: top;" data-bind="text: lang.lang.employee"></th>
					            	<th style="vertical-align: top;" data-bind="text: lang.lang.start"></th>
					            	<th style="vertical-align: top;" data-bind="text: lang.lang.end"></th>
					            	<th style="vertical-align: top;" data-bind="text: lang.lang.status"></th>
					            	<th style="vertical-align: top;" data-bind="text: lang.lang.action"></th>
					            </tr>
					        </thead>
					        <tbody data-role="listview" 
				        		data-template="session-list-template" 
				        		data-auto-bind="true"
				        		data-bind="source: sessionDS"></tbody>
					    </table>
					    <ul class="topnav addNew">
							<li role="presentation" class="dropdown ">
						  		<a class="dropdown-toggle" data-bind="click: addNewSession" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						  			<span data-bind="text: lang.lang.add_new"></span>
						  		</a>
						  	</li>
						</ul>
					</div>
					<div data-bind="invisible: noSession" style="display: none;">
						<table class="table table-bordered table-primary table-striped table-vertical-center">
					        <thead>
					            <tr>
					                <th class="center" style="width: 50px;"><span data-bind="text: lang.lang.no_">No.</span></th>
					                <th><span data-bind="text: lang.lang.currency">Currency</span></th>
					                <th><span data-bind="text: lang.lang.amount">Amount</span></th>
					            </tr> 
					        </thead>
					        <tbody data-role="listview" 
				        		data-template="cashier-session-template" 
				        		data-auto-bind="false"
				        		data-bind="source: cashierItemDS"></tbody>
					    </table>
					    <span class="btn btn-icon btn-primary glyphicons ok_2" style="width: 135px;float: left; margin-bottom: 0px;" data-bind="click: addSession"><i></i><span data-bind="text: lang.lang.add">Save</span></span>
					    <span  class="btn btn-icon btn-primary glyphicons remove_2" style="background: red;width: 135px;float: left; margin-bottom: 0px;"><i></i><span data-bind="text: lang.lang.cancel, click: backSession">Cancel</span></span>
					</div>
				</div>
			</div>

			<div class="span12" style="margin-top: 20px;">
				<p data-bind="text: today"></span>
			</div>
		</div>
	</div>
</script>

<!-- Side fix right -->
<div class="cover-rightfixed cover-rightfixed1 " style="z-index: 99999;">
    <div class="rightfixed enquiries text-t btn-rounded  no-js " style="">
        Menu
        <div class="enquiry-content">
            <ul style="text-align: left; font-size: 13px; color: #000; ">
                <li><a href="#/pos">Point of Sale</a></li>
                <li><a href="#/sessions">Session Management</a></li>
                <li><a href="#/books">Booking Management</a></li>
                <li><a href="#/service">Servicing Customer</a></li>
                <li><a href="#/reconciliation">Reconciliation</a></li>
                <!-- <li class="divider"></li> -->
                <li><a href="#/pay">Print & Pay</a></li>
                <li class="divider"></li>
                <li><a href="#/customer">Customer</a></li>
                <li><a href="#/rooms">Rooms / Facilities</a></li>
                <li><a href="#/therapist">Therapist</a></li>
                <li><a href="#/report">Reports</a></li>
            </ul>
        
        </div>
    </div>
</div>
<div class="cover-rightfixed " style="top: 45.9%; z-index: 9999; right: -97px;">
    <div class="rightfixed enquiries multiple-list  btn-rounded glyphicons glyphicons-plus no-js " style="float:left;  font-size: 15px;">
        Reports
        <div class="enquiry-content">
            <ul data-template="multiTaskList-row-template" data-bind="source: multiTaskList">
                <li>
                    <a href="#/calendar">
                        Create Calendar
                        <span title="Remove" class="multiTaskList glyphicons remove_2 pull-right" data-bind="click: removeLink">
                            <i></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#/receipt">
                        Create Receipt
                        <span title="Remove" class="multiTaskList glyphicons remove_2 pull-right" data-bind="click: removeLink">
                            <i class="icon-remove"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#/invoice">
                        Create Invoice
                        <span title="Remove" class="multiTaskList glyphicons remove_2 pull-right" data-bind="click: removeLink">
                            <i class="icon-remove"></i>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="cover-rightfixed chat" style=" z-index: 999; right: -92px;">
    <a class="rightfixed enquiries btn-rounded glyphicons no-js conversation" style="width: 142px;float:left;">
        Support
        <div class="enquiry-content">
            <p style="font-size: 14px;">Call us by<br><span style="font-weight: bold;font-size: 16px">+855 10 413 777</span><br>Mon-Fri<br>09:00 - 18:00</p>
            <div class="fb-messengermessageus" 
                messenger_app_id="1301847836514973" 
                page_id="298877880530498"
                color="blue"
                width="180"
                size="standard" ></div>
        </div>
    </a>
</div>
<!-- End -->