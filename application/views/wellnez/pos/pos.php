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
	<div id="content"></div>
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
<style >
	#productListView{
		border: none;
	}
	.demo-section.span12{
		padding: 15px;
		margin-bottom: 1px;
		background: #0eac00;
	}
	.product {
	    float: left;
	    position: relative;
	    width: 99px;
	    height: 180px;
	    padding: 15px;
	    cursor: pointer;
	    background: #fff;
	    margin-right: 2px;
	    margin-bottom: 1px;
	}
	.listWrapper{
		padding-right: 0;
		width: 47%;
	}
	.product img {	    
	    height: 110px;
	    margin-bottom: 5px;
	    border-bottom: 1px solid #0eac00;
	    width: 100%;
	    padding-bottom: 15px;
	}
	.product h3 {
	    margin: 0 auto;
	    width: 75%;
	    overflow: hidden;
	    line-height: 1.5em;
	    font-size: .9em;
	    text-transform: uppercase;
	    color: #333;
	    font-weight: 700;
	    text-align: center;
	    height: 35px;
	}
	.topnav.addNew {
	    display: inline-block;
	    background: #203864;
	    padding: 3px 10px 3px 10px;
	    margin: 0;
	    line-height: 23px;
	    border: 1px solid #fff;
	    border-radius: 3px;
	}
	.topnav.addNew li {
	    list-style: none;
	}
	.topnav.addNew li a {
	    color: #fff;
	}
	#posProductList {
	    overflow: scroll;
	    border: #ccc 1px solid;
	    background: #fff;
	    padding: 15px;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.costom-grid {
	    clear: both;
	    margin-bottom: 15px;
	    border-radius: 0px;
	    border-width: 1px 0px 2px 0px;
	    border-style: solid;
	    border-color: rgb(221, 221, 221);
	    overflow-x: auto;
	    overflow-y: auto;
	}
	.costom-grid table tr th {
	    font-weight: 700 !important;
	    font-size: 13px !important;
	    background: #1c3b19 !important;
	    color: #fff;
	}
	.table-condensed tr td {
	    border: none !important;
	}
	.table-condensed th, .table-condensed td {
	    padding: 5px 5px 5px 10px !important;
	}
	.table-striped tbody tr:nth-child(odd) td, 
	.table-striped tbody tr:nth-child(odd) th {
	    background: #f4f5f8 !important;
	}
	.btn-center-text {
	    background: #213863;
	    display: flex;
	    align-items: center;
	    justify-content: space-around;
	    border-radius: 5px !important;
	}
	#pager{
		margin-top: 15px;
	    float: left;
	    width: 98.2%;
	}
	.pos table.table-customer th{
		background: #1c3b19;
		
	}
	.pos table th{
		background: #203864 ;
	}
	@media (min-width: 768px){
		html.no-touch.sticky-top:not(.animations-gpu) #content {
		    padding-top: 0;
		}
	}
	.botton .button-service{
		background: #0eac00;
	    padding: 10px;
	    float: left;
	    width: 100%;
	    border-radius: 5px 5px 0 0;
	    margin-bottom: 1px;
	    cursor: pointer;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.botton .button-service .img{
		width: 40px;
	    float: left;
	    margin-right: 15px;
	    margin-left: 30px;
	}
	.botton .button-service .img img{
		width: 100%
	}
	.botton .button-service p{
		font-size: 27px;
	}
	
	.botton .button-book{
		background: #0eac00;
	    padding: 13px;
	    border-radius: 0 0 0 5px;
	    cursor: pointer;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.botton .button-book .img{
		width: 38px;
	    margin-left: 8px;
	    margin-bottom: 4px;
	}
	.botton .button-book .img img{
		width: 100%
	}
	.botton .button-book p{
		margin-bottom: 0;
	}

	.botton .button-pay{
		background: #0eac00;
	    padding: 17px 17px 10px 17px;
	    text-align: center;
	    margin-left: 1px;
	    text-align: center;
	    cursor: pointer;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.botton .button-pay .img{
		width: 38px;
	    margin-left: 8px;
	    margin-bottom: 4px;
	}
	.botton .button-pay .img img{
		width: 100%
	}
	.botton .button-pay p{
		margin-bottom: 0
	}
	.button-cancel{
		background: #1c3b19;
	    width: 100%;
	    text-align: center;
	    margin-left: 1px;
	    margin-bottom: 0;
	    border-radius: 0 0 5px 0;
	    line-height: 39px;
	    cursor: pointer;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.button-cancel span{
		font-size: 45px;
	    padding: 5px;
	    float: left;
	    width: 100%;
	}
	.listWrapper{
		background: #0eac00;
	    padding: 0 0 15px 0;
	    margin-bottom: 1px;
	    width: 100%;
	    float: left;
	    border-radius: 20px 20px 0 0;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	}
	.table.table-white {
	    background: #fff;
	    color: #333;
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
    }
    a.enquiries:hover {
        left: 95px;
    }
    a.referral:hover {
        margin-left: -56px;
    }
    /*.cover-rightfixed {
        position: fixed;
        top: 39.7%;
        right: -95px;
        z-index: 999;
        text-align: left;
    }*/
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
	    padding-right: 50px;
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
	    background: url(<?php echo base_url();?>assets/spa/plus.png) no-repeat right center red; background-size: 23px;
	}
	.text-t.rightfixed:hover {
	  opacity: 1;
	  z-index: 9999999;
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
		bottom: -233px;
	    left: -313px;
	    width: 313px;
	}



	.multiple-list.rightfixed {
	    position: relative;
	   /* background: green;*/
	    padding: 15px 25px;
	    z-index: 99;
	    color: #fff;
	    border-radius: 3px;
	    font-size: 12px;
	    padding-left: 46px;
	    cursor: pointer;
	    -webkit-transition: all .5s;
	    transition: all .5s;
	    text-decoration: none;
	    opacity: 1;
	    margin-bottom: 1px;
	    clear: both;
	    float: none;
	    left: 0;
	    background: url(<?php echo base_url();?>assets/spa/multi.png) no-repeat right center green; 
	    background-size: 23px;
	}
	.multiple-list.rightfixed:hover {
		opacity: 1;
		z-index: 9999999;
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
	<div id="ntf1" data-role="notification"></div>
	<div class="container">
		<div class="row pos">
			<div class="span12">
				<div class="row">
					<div class="span6">
						<div style="position: relative;overflow: hidden;">
							<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
								<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
							</div>
							<div class="row" style="padding: 0;">
								<div class="span12">
									<div class="listWrapper">
										<div class="row">
											<div class="span6" style="padding-right: 1px; width: 50%;">
												<div class="innerAll" style="height: 45px; padding-bottom: 0; padding: 15px 0 0 15px; float: left; width: 100%;">
													<div class="widget-search separator bottom" style="padding: 0;">
														<a class="btn btn-default pull-right" data-bind="click: search" style="padding: 4px 10px;"><i class="icon-search"></i></a>
														<div class="overflow-hidden">
															<input style="height: 30px; padding: 5px; border: 1px solid #ccc; color: #333;" type="search" placeholder="Number or Name..." data-bind="value: searchText, events:{change: search}">
														</div>
													</div>
												</div>
											</div>
											<div class="span3" style="padding-top: 15px; padding-left: 0; padding-right: 1px; width: 22%;">
												<input 
													data-role="dropdownlist"
													data-auto-bind="false" 
													data-value-primitive="true" 
													data-filter="startswith" 
													data-text-field="name" 
													data-value-field="id"
													data-bind="
														value: catSelected,
						                              	source: categoryDS,
						                              	events: {change: catChange}" 
						                            data-option-label="Category ..."
						                            required="" 
						                            data-required-msg="required" 
						                            style="width: 100%; border-radius: 0; 
						                            aria-invalid="true" 
						                            class="k-invalid" />
											</div>
											<div class="span3" style="padding-top: 15px; padding-left: 0;">
												<input 
													data-role="dropdownlist"
													data-auto-bind="false" 
													data-value-primitive="true" 
													data-filter="startswith" 
													data-text-field="name" 
													data-value-field="id"
													data-bind="
														value: groupSelected,
						                              	source: itemGroupDS,
						                              	events: {change: groupChange}" 
						                            data-option-label="Group ..."
						                            required="" 
						                            data-required-msg="required" 
						                            style="width: 100%; border-radius: 0; " 
						                            aria-invalid="true" 
						                            class="k-invalid"
						                        />
											</div>
										</div>

									</div>
										
									<div class="demo-section k-content wide span12" style="box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);">
										<div class="demo-section k-content wide">
											<div 
												id="productListView"
												data-role="listview"
												data-template="item-list-view-template"
												data-auto-bind="true"
												data-bind="source: itemsDS">
											</div>
											<div id="pager" class="k-pager-wrap"
										    	 data-role="pager"
										    	 data-auto-bind="true"
									             data-bind="source: itemsDS">
									        </div>
										</div>
									</div>
								</div>

								<div class="span12">
									<div class="box-generic" style="background: #0eac00; border: none; box-shadow: 2px 0px 12px 0px rgba(68,68,68,1); margin-bottom: 0; border-radius: 0 0 20px 20px;">
										<div class="row">
											<div class="span6">
												<input 
													data-role="dropdownlist"
													data-template="contact-list-tmpl" 
													data-auto-bind="false" 
													data-value-primitive="true" 
													data-filter="startswith" 
													data-text-field="name" 
													data-value-field="id"
													data-option-label="Select Customer..."
													data-bind="
														value: customerSelected,
						                              	source: contactDS,
						                              	events: {change: addCustomer}"
						                            style="width: 100%; float: left;margin-right: 2%; margin-bottom: 5px;" 
						                            aria-invalid="true" 
						                            class="k-invalid"
						                        />
						                        <input type="text" 
								                	style="width: 100%; margin-bottom: 5px;" 
								                	data-role="datetimepicker"
										           	data-bind="
										           		value: dateSelected,
										           		events: {change: dateChange}
										           	" />
										        <input type="text" 
								                	style="width: 100%; border: 1px solid #c5c5c5; padding: 3px; height: 30px;" 
								                	placeholder="Phone Number" 
										           	data-bind="
										           		value: customerPhone
										           	" />
										        
										    </div>

										        <div class="span6" style="padding-left: 0;">
													<table class="table-fixed table-customer table table-bordered table-primary table-striped table-vertical-center">
												        <thead>
												            <tr>
												            	<th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
												            	<th style="vertical-align: top;" data-bind="text: lang.lang.name"></th>
												            </tr>
												        </thead>
												        <tbody data-role="listview" 
											        		data-template="customer-select-list-tmpl" 
											        		data-auto-bind="false"
											        		data-bind="source: customerAR">
											        	</tbody>
												    </table>
												</div>
											</div>
									</div>
								</div>
							</div> 
						</div>
					</div>
					<div class="span6" style="padding-left: 0;">
						<div class="span12" style="background: #c4c2d2; margin-bottom: 1px; box-shadow: 2px 0px 12px 0px rgba(68,68,68,1); border-radius: 20px 20px 0 0;">
							<div class="row" style="margin-top: 15px; ">
								<div class="span6">
				                    <div class="box-generic"  style="background: #c4c2d2; margin: 0 !important; padding: 0; border: none;">
				                    	<input 
											data-role="dropdownlist"
											data-template="room-list-tmpl" 
											data-auto-bind="false" 
											data-value-primitive="true" 
											data-filter="startswith" 
											data-text-field="name" 
											data-value-field="id"
											data-bind="
												value: roomSelected,
				                              	source: roomDS,
				                              	events: {change: addRoom}" 
				                            data-option-label="Select Room..." 
				                            required="" 
				                            data-required-msg="required" 
				                            style="width: 100%;" 
				                            aria-invalid="true" 
				                            class="k-invalid"
				                        />
				                        <table class="table table-bordered table-primary table-striped table-vertical-center" style="margin-top: 15px;">
									        <thead>
									            <tr>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.name"></th>
									            </tr>
									        </thead>
									        <tbody data-role="listview" 
								        		data-template="room-select-list-tmpl" 
								        		data-auto-bind="false"
								        		data-bind="source: roomAR"></tbody>
									    </table>
				                    </div>		                
								</div>
								<div class="span6">
									<div class="box-generic" style="background: #c4c2d2; padding: 0; border: none; margin-bottom: 0; padding-bottom: 15px;">
										<div data-bind="visible: emSelect">
											<input 
												data-role="dropdownlist"
												data-template="contact-list-tmpl" 
												data-auto-bind="false" 
												data-value-primitive="true" 
												data-filter="startswith" 
												data-text-field="name" 
												data-value-field="id"
												data-bind="
													value: employeeSelected,
					                              	source: employeeDS,
					                              	events: {change: addEmployee}" 
					                            data-option-label="Select Employee..."
					                            required="" 
					                            data-required-msg="required" 
					                            style="width: 60%; float: left;" 
					                            aria-invalid="true" 
					                            class="k-invalid"
					                        />
					                        <ul class="topnav addNew" style="float: right;" >
												<li role="presentation" class="dropdown ">
											  		<a class="dropdown-toggle" data-bind="click: selectOutsource" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
											  			<span>Outsource</span>
											  		</a>
											  	</li>
											</ul>
					                    </div>
					                   	<div data-bind="invisible: emSelect">
											<input 
												data-role="dropdownlist"
												data-template="contact-list-tmpl" 
												data-auto-bind="false" 
												data-value-primitive="true" 
												data-filter="startswith" 
												data-text-field="name" 
												data-value-field="id"
												data-bind="
													value: employeeSelected,
					                              	source: supplierDS,
					                              	events: {change: addEmployee}" 
					                            data-option-label="Select Supplier..." 
					                            required="" 
					                            data-required-msg="required" 
					                            style="width: 69%; float: left;" 
					                            aria-invalid="true" 
					                            class="k-invalid"
					                        />
					                        <ul class="topnav addNew">
												<li role="presentation" class="dropdown" style="float: right;">
											  		<a class="dropdown-toggle" data-bind="click: selectEmployee" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
											  			<span>Employee</span>
											  		</a>
											  	</li>
											</ul>
					                    </div>
					                    <table class="table table-bordered table-primary table-striped table-vertical-center" style="margin-top: 15px; width: 100%; float: left;">
									        <thead>
									            <tr>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.name"></th>
									            </tr>
									        </thead>
									        <tbody data-role="listview" 
								        		data-template="employee-list-tmpl" 
								        		data-auto-bind="false"
								        		data-bind="source: employeeAR"></tbody>
									    </table>
				                    </div>
								</div>
							</div>
						</div>

						<div class="row posProductItems" >
							<div class="span12" >
								<div id="posProductList" class="box-generic-noborder" style="min-height: 140px!important; height: 140px; padding-bottom: 0;">
									<div data-role="grid" class="costom-grid"
								    	 data-column-menu="true"
								    	 data-reorderable="true"
								    	 data-scrollable="false"
								    	 data-resizable="true"
								    	 data-editable="true"
						                 data-columns="[
										    { 
										    	title:'NO',
										    	width: '50px', 
										    	attributes: { style: 'text-align: center;' }, 
										        template: function (dataItem) {
										        	var rowIndex = banhji.pos.lineDS.indexOf(dataItem)+1;
										        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
										      	}
										    },
						                 	{ 
						                 		field: 'item', 
						                 		title: 'Name', 
						                 		editor: itemEditor, 
						                 		editable: 'false', 
						                 		template: '#=item.name#', 
						                 		width: '170px' },
				                            { 
				                            	field: 'description', title:'DESCRIPTION', 
				                            	hidden: true,
				                            	width: '250px' 
				                            },                            
				                            {
											    field: 'quantity',
											    title: 'QTY',
											    format: '{0:n}',
											    editor: numberTextboxEditor,
											    width: '120px',
											    attributes: { style: 'text-align: right;' },
											    template: function(dataItem){
											    	banhji.pos.changes();
											    	dataItem.set('amount', dataItem.price * dataItem.quantity);
													return dataItem.quantity;
												}
											},
				                            { 
				                            	field: 'measurement', 
				                            	title: 'UOM', 
				                            	editable: 'false',
				                            	editor: measurementEditor, 
				                            	template: '#=measurement?measurement.measurement:banhji.emptyString#', 
				                            	width: '80px' 
				                            },
				                            {
											    field: 'price',
											    title: 'PRICE',
											    format: '{0:n}',
											    hidden: true,
											    editor: numberTextboxEditor,
											    width: '120px',
											    attributes: { style: 'text-align: right;' },
											    template: function(dataItem){
											    	banhji.pos.changes();
											    	dataItem.set('amount', dataItem.price * dataItem.quantity);
													return dataItem.price;
												}
											},
											{
											    field: 'discount',
											    title: 'DISCOUNT VALUE',
											    hidden: true,
											    format: '{0:n}',
											    editor: numberTextboxEditor,
											    width: '120px',
											    attributes: { style: 'text-align: right;' },
											    template: function(dataItem){
											    	banhji.pos.changes();
											    	return dataItem.discount;
												}
											},
				                            { 
				                            	field: 'amount', 
				                            	title:'AMOUNT', 
				                            	format: '{0:n}', 
				                            	editable: 'false', 
				                            	attributes: { style: 'text-align: right;' }, 
				                            	width: '120px' 
				                            },                            
				                            { 
				                            	field: 'tax_item', 
				                            	title:'TAX', 
				                            	hidden: true,
				                            	editor: taxForSaleEditor, 
				                            	template: function(dataItem){
				                            		banhji.pos.changes();
				                            		return dataItem.tax_item.name;
				                            	}, 
				                            	width: '90px' 
				                            }
				                         ]"
				                         data-auto-bind="false"
						                 data-bind="source: lineDS" >
						            </div>
								</div>
							</div>
						</div>

						<div class="row" style="background: #fff; margin-left: 0; margin-top: 1px; margin-right: 0; padding: 15px 0; box-shadow: 2px 0px 12px 0px rgba(68,68,68,1); border-radius: 0 0 20px 20px;">
							<div class="span6" style="padding-right: 0;">
								<div class="posSaleSummary cover-block" style="width: 100%; float:right; padding: 0 15px 0 0;">
									<table class="table table-condensed table-striped table-white" style="margin: 5px 0 0;">
										<tbody>
											<tr>
												<td class="right" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
												<td class="right strong" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
											</tr>               
											<tr>
												<td class="right"><span>Discount</span></td>
												<td class="right ">
													<span data-format="n" data-bind="text: obj.discount"></span>
												</td>
											</tr>               
											<tr>
												<td class="right"><span data-bind="text: lang.lang.total_tax"></span></td>
												<td class="right "><span data-format="n" data-bind="text: obj.tax"></span></td>
											</tr>                             
											<tr>
												<td class="right"><h4 span data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
												<td class="right strong"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
											</tr>               
										</tbody>
									</table>
								</div>
							</div>

							<!-- <div class="span5 " style="margin-top: 1px; padding-left: 0">
								<button style="width: 100% !important; float: left; margin-right: 8px;" class="btn-btn btn-width-100 btn-center-text btn-md margin" data-bind="click: payPopup">Pay
								</button>
								<button style="width: 105px !important; float: left; margin-right: 10px;" class="btn-btn btn-width-100 btn-center-text btn-md margin" data-bind="click: payPopup">
									Cancel
								</button>
								<button style="width: 105px !important; float: left;" class="btn-btn btn-width-100 btn-center-text btn-md margin" data-bind="click: addBook">
									Book
								</button>
							</div> -->

							<div class="span6 botton" style="padding-left: 0;">
								<div class="row">
									<div class="span12 ">
										<div class="button-service">
											<div class="img">
												<img src="<?php echo base_url();?>assets/spa/icon/serving.png" >
											</div>
											<p class="textBig">Servicing </p>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="span4 " style="padding-right: 0;">
										<div class="button-book">
											<div class="img">
												<img src="<?php echo base_url();?>assets/spa/icon/book.png" >
											</div>
											<p class="textSmall">Booking</p>
										</div>
									</div>
									<div class="span4 " style="padding: 0;">
										<div class="button-pay">
											<div class="img">
												<img src="<?php echo base_url();?>assets/spa/icon/pay.png" >
											</div>
											<p class="textSmall">Pay</p>
										</div>
									</div>
									<div class="span4 " style="padding-left: 0;">
										<p class="button-cancel"><span>X</span> <br> Cancel</p>
									</div>
								</div>
							</div>
							
							
							<div id="dialog" style="display:none; padding: 15px !important;">
								<div class="row">
									<div class="span5">
										<div class="cover-block box-shadow">
											<h1>Sale Summary</h1>
											<div class="posSaleSummary cover-block "
											data-template="sale-summary-template"
											data-auto-bind="false"
											data-bind="source: lineDS">
											</div>
										</div>
										<div class="posSaleSummary cover-block">
											<table class="table table-white">
												<tbody>
													<tr>
														<td class="right" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
														<td class="right strong" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
													</tr>               
													<tr>
														<td class="right"><span data-bind="text: lang.lang.total_discount"></span></td>
														<td class="right ">
															<span data-format="n" data-bind="text: obj.discount"></span>
														</td>
													</tr>               
													<tr>
														<td class="right"><span data-bind="text: lang.lang.total_tax"></span></td>
														<td class="right "><span data-format="n" data-bind="text: obj.tax"></span></td>
													</tr>                             
													<tr>
														<td class="right"><h4 span data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
														<td class="right strong"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
													</tr>               
												</tbody>
											</table>
										</div>
									</div>
									<div class="span6" style="padding-right: 0;">
										<div class="cover-block box-shadow" style="padding: 15px;">
											<h1>Pay</h1>
											<input class="k-textbox" id="pay_amount" name="pay_amount" />
											<br>
											<button style="width: 92%; margin-bottom: 0;" class="btn margin btn-inverse btn-center-text btn-lg width-100" data-bind="click: payCash">
												Cash
											</button> 
										</div>
										<div class="row-fluid">
											<div class="box-generic" style="width: 95%; margin: 0 !important; padding: 0 !important;">
											   
											    <div class="tabsbar tabsbar-1">
											        <ul class="row-fluid row-merge">
											            <li class="span2 glyphicons nameplate_alt active">
											            	<a href="#tab1" data-toggle="tab"><i></i> <span><span data-bind="text: lang.lang.info"></span></span></a>
											            </li>
											            <li class="span2 glyphicons usd">
											            	<a href="#tab2" data-toggle="tab"><i></i> <span><span data-bind="text: lang.lang.account"></span></span></a>
											            </li>
											        </ul>
											    </div>
											    

											    <div class="tab-content">

											        
											        <div class="tab-pane active" id="tab1">
										            	abc
										        	</div>
											        
											        <div class="tab-pane" id="tab2">
											        	
														dgdfghsfh
										        	</div>
											      

											    </div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
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
        Transaction
        <div class="enquiry-content">
            <ul style="text-align: left; font-size: 13px; color: #000; ">
                <li><a href="#/calendar">Create Calendar</a></li>
                <li><a href="#/cash-sale">Create Cash Sale</a></li>
                <li><a href="#/receipt">Create Receipt</a></li>
                <li><a href="#/invoice">Create Invoice</a></li>
                <li><a href="#/expenses">Create Expenses</a></li>
                <li class="divider"></li>
                <li><a href="#/add_customer">Add New Customer</a></li>
                <li><a href="#/add_staff">Add New Staff</a></li>
                <li><a href="#/add_service">Add New Service</a></li>
            </ul>
        
        </div>
    </div>
</div>
<div class="cover-rightfixed " style="top: 45.9%; z-index: 9999; right: -97px;">
    <div class="rightfixed enquiries multiple-list  btn-rounded glyphicons glyphicons-plus no-js " style="float:left;  font-size: 15px;">
        Multitasks
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
    <a class="rightfixed enquiries btn-rounded glyphicons no-js conversation" style="width: 146px;float:left;">
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
<script id="item-list-view-template" type="text/x-kendo-template">
	<div class="product" data-bind="click:addRow" style="text-align: center;">
		<img src="#= image_url #" />
		<h3>#:name#</h3>
		<p>#=kendo.toString(price, locale=="km-KH"?"c0":"c", locale)#</p>
	</div>
</script>
<script id="sale-summary-template" type="text/x-kendo-template">
	<div class="item-row">
		<div class="item-name">
			#= item.name #
		</div>
		<div class="item-price">
			<span data-format="c2" data-bind="text: amount"></span>
		</div>
	</div>
</script>
<script id="favorite-category-list-template" type="text/x-kendo-template">
	<button class="btn btn-inverse btn-round" data-value="1" data-bind="click: categorySelect">
		#=name#
	</button>
</script>
<script id="item-group-list-template" type="text/x-kendo-template">
	<button class="btn btn-inverse btn-round" data-value="1" data-bind="click: groupSelect">
		#=name# [#=abbr#]
	</button>
</script>
<script id="contact-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=abbr##=number#</span>	
	<span>#=name#</span>	
</script>
<script id="employee-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: rmEmployee }"></i>
			#:banhji.pos.employeeAR.indexOf(data)+1#      
		</td>
		<td>#= name#</td>
	</tr>
</script>
<script id="room-select-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: rmRoom }"></i>
			#:banhji.pos.roomAR.indexOf(data)+1#      
		</td>
		<td>#= name#</td>
	</tr>
</script>
<script id="customer-select-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: rmCustomer }"></i>
			#:banhji.pos.customerAR.indexOf(data)+1#      
		</td>
		<td>#= name#</td>
	</tr>
</script>
<script id="room-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=number#</span>	
	<span>#=name#</span>	
</script>
<script id="book-list-tmpl" type="text/x-kendo-template">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: rmBook }"></i>
			#:banhji.pos.bookDS.indexOf(data)+1#      
		</td>
		<td>#= name#</td>
		<td>#= phone#</td>
		<td>#= room#</td>
		<td>#= employee#</td>
		<td>#= date#</td>
		<td align="center">   			
   			<div class="edit-buttons">       
		        <a class="k-button" data-bind="click: editBook"><span class="k-icon k-i-edit"></span></a>
			    <a class="k-button k-delete-button" href="\\#"><span class="k-icon k-i-delete"></span></a>
		   	</div>		   	
   		</td>
	</tr>
</script>                                             