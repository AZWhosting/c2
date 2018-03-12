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
	.customerCenter .listWrapper {
	    background: #fff; 
	    border: none;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	    margin-bottom: 0;
	    border-radius: 10px;
	    float: left;
	    width: 100%;
	    padding: 15px;
	}
	.customerCenter .detailsWrapper {
		background: #fff;
	    border: none;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	    margin-bottom: 0;
	    border-radius: 10px;
	    padding: 15px;
	    color: #333;
	}   
	.customerCenter .k-icon.k-i-arrow-60-down{
		margin-top:  7px;
	}
	.customerCenter .listWrapper .results {
	    float: left;
	    height: 25px;
	    width: 100%;
	    background: #0eac00;
	    text-align: center;
	    line-height: 23px;
	}
	.customerCenter .listWrapper .table.table-condensed{
		float: left;
	    width: 99.3%;
	    color: #333;
	}
	.customerCenter .listWrapper .k-grid-content .k-virtual-scrollable-wrap table tr td .media-body span:first-child {
	    font-size: 12.5px;
	    color: #333;
	    text-align: left;
	}
	.customerCenter .listWrapper .k-grid-content .k-virtual-scrollable-wrap table tr td .media-body span:last-child {
	    font-size: 12.5px;
	    color: #333;
	    text-align: left;
	}
	.customerCenter .listWrapper .k-grid-content.k-auto-scrollable .k-virtual-scrollable-wrap table tr:hover .media-body span{
	    /*background: #0077c5 !important;*/
	    color: #fff;
	}
	.customerCenter .detailsWrapper .table.table-white {
	    background: #fff;
	    color: #333;
	    font-size: 13px;
	    margin-top: 15px;
	}
	.customerCenter .detailsWrapper .table.table-white tr th{
		text-transform: uppercase !important;
		background: #1c3b19;
		color: #fff;
	}
	.customerCenter .detailsWrapper .widget-head{
		margin-bottom: 10px;
	    float: left;
	    width: 100%;
	}
	.customerCenter .detailsWrapper .box-generic .tab-content{
		color: #333;
	}

	.customerCenter .detailsWrapper .btn-inverse:hover,
	.customerCenter .detailsWrapper .btn-inverse:focus {
	    background: #424242;
   		border-color: #424242;
	    color: #fff;
	}
	.k-icon.k-i-seek-w,
	.k-icon.k-i-arrow-w,
	.k-icon.k-i-arrow-e,
	.k-icon.k-i-seek-e{
		margin-top: 5px;
	}
	.k-header .k-i-calendar{
		margin-top: 6px;
	}
	.customerCenter .detailsWrapper button{
		height: 30px;
		cursor: pointer;
	}
	.customerCenter .listWrapper a.addLoyalty{
		padding: 8px;
	    width: 100%;
	    background: #0eac00;
	    color: #fff;
	    float: left;
	    text-align: center;
	}
	.customerCenter .listWrapper .k-animation-container .k-list-container .k-list-scroller ul li:hover, 
	.customerCenter .listWrapper .table .k-grid-content.k-auto-scrollable .k-virtual-scrollable-wrap table tr:hover {
		background: #0eac00 !important;
	}
	.accounCetner-textedit .btn.btn-primary.btn-icon.glyphicons.edit.pull-right{
		background: #0eac00;
		border: none;
	}
	.k-draghandle.k-state-selected:hover, 
	.k-ghost-splitbar-horizontal, 
	.k-ghost-splitbar-vertical, 
	.k-list>.k-state-highlight, 
	.k-list>.k-state-selected, 
	.k-marquee-color, 
	.k-panel>.k-state-selected, 
	.k-scheduler .k-scheduler-toolbar .k-state-selected, 
	.k-scheduler .k-today.k-state-selected, 
	.k-state-selected, 
	.k-state-selected:link, 
	.k-state-selected:visited {
	    background-color: #1c3b19 !important;
	    border-color: #1c3b19 !important;
	    color: #fff;
	    background-image: none;
	}
	.customerCenter .listWrapper .k-grid-content .k-virtual-scrollable-wrap table tr.k-state-selected td .media-body span {
	    font-size: 12.5px;
	    color: #fff;
	    text-align: left;
	}
	.box-generic {
	    border: 1px solid #efefef;
	    padding: 15px;
	    position: relative;
	    background: #ffffff;
	    height: auto !important;
	    display: inline-block;
	    clear: both;
	    width: 96.5%;
	    margin-left: 15px;
	    margin-bottom: 0;
	}
	
	/*Add Customer*/
	.addCusto .example {
	    background: #fff;
	    width: 100%;
	    text-align: left;
	    position: relative;
	    padding: 15px;
	    border-radius: 10px;
	    float: left;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	    color: #333;
	}
	.addCusto .example  h2{
		margin-bottom: 15px;
	}
	.addCusto .example .k-icon.k-i-arrow-60-down{
		margin-top: 5px;
	}
	.addCusto .example .box-generic table tr td{
		color: #333;
	}
	.bg-action-button .small-btn {
	    padding: 13px 8px;
	    float: right;
	    border-left: 1px solid #fff;
	    margin-left: 10px;
	}
</style>
<!-- ***************************
*	Water Section      	  *
**************************** -->
<script id="loyaltyCenter" type="text/x-kendo-template">
	<div class="container">
		<div class="row customerCenter">
			<div class="span3">
				<div class="listWrapper">
					<a href="#/loyalty" class="addLoyalty">Add Loyalty</a>
					<div class="innerAll" style="width: 100%; float: left; background: #424242;">
						<form autocomplete="off" class="form-inline" style="margin-bottom: 0;">
							<div class="widget-search separator bottom">
								<button style="height: 34px;" type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" placeholder="Number or Name..." data-bind="value: searchText">
								</div>
							</div>	
						</form>					
					</div>

					<div class="results">
						<span data-bind="text: loyaltyDS.total"></span>
						<span data-bind="text: lang.lang.found_search"></span>
					</div>

					<div class="table table-condensed " style="height: 450px; overflow: hidden; margin-bottom: 0;"
						 data-role="grid"
						 data-bind="source: loyaltyDS"
						 data-row-template="loyalty-list-tmpl"
						 data-columns="[{title: ''}]"
						 data-selectable=true
						 data-height="450"
						 data-scrollable="{virtual: true}">
					</div>
				</div>
			</div>
			<div class="span9" style="padding-left: 0">
				<div class="detailsWrapper">
					<div class="row">
						<div class="box-generic">

						    <div class="tabsbar tabsbar-1">
						        <ul class="row-fluid row-merge">
						            <li class="span2 glyphicons nameplate_alt active">
						            	<a href="#tab1" data-toggle="tab"><i></i> <span><span data-bind="text: lang.lang.info"></span></span></a>
						            </li>								            
						            <li class="span2 glyphicons usd">
						            	<a href="#tab2" data-toggle="tab"><i></i> <span><span >Customer</span></span></a>
						            </li>
						            <li class="span2 glyphicons parents">
						            	<a href="#tab3" data-toggle="tab"><i></i> <span><span >Transaction</span></span></a>
						            </li>						            					            					            
						        </ul>
						    </div>
						    
						    <div class="tab-content">						    	

						        <div class="tab-pane active" id="tab1">
					            	tab1
					        	</div>
						        
						        <div class="tab-pane" id="tab2">
						        	tab2
					        	</div>
						       
						        <div class="tab-pane" id="tab3">
						        	tab3
					        	</div>
						       
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</script>
<script id="loyalty-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td>
			<div class="media-body strong">				
				<span>#=abbr##=number#</span>
				<span>#=name#</span>
			</div>
		</td>
	</tr>
</script>



<style >
	.loyalty .example {
	    background: #fff;
	    width: 100%;
	    text-align: center;
	    position: relative;
	    padding: 15px;
	    border-radius: 10px;
	    float: left;
	    box-shadow: 2px 0px 12px 0px rgba(68,68,68,1);
	    color: #333
	}
	.loyalty .example h2 {
	    color: #0eac00 !important;
	    text-align: left;
	    margin-bottom: 10px;
	    float: left;
	}
	.loyatyNext{
		background: #0eac00;
	    border-radius: 2px;
	    padding: 8px 25px;
	    color: #fff;
	    float: right;
	    margin-top: -5px; 
	}
	.example a.loyatyNext:hover{
		color: #fff;
	}
	.loyalty .example #tab1 h3{
		color: #0eac00 !important;
	}
	/*Tab: Rules */
	#tab1 .box-generic{
		border: none;
	    width: 90%;
	    padding-left: 14%;
	}
	#tab1 .tabsbar{
		height: 140px;
		background: none !important;
		width: auto;
	}
	#tab1 .tabsbar ul li{
		margin-right: 20px;
		border:1px solid #adafb1;
		height: 140px;
		border-radius: 5px;
		width: 210px;
	}
	#tab1 .tabsbar ul li a{
		line-height: 23px;
		padding: 10px 15px;
		height: 140px;
	}
	#tab1 .tabsbar ul li.active a{
		line-height: 23px;
		padding:10px 15px;
		height: 139px;
		border: 1px solid #0eac00;
		border-radius: 5px;
	}	
	#tab1 .tabsbar ul li a .textBlue{
		color: #0eac00 ;
	}

	/*Tab1-3*/
	#tab1-3 .box-generic {
	    border: none;
	    width: 100%;
	    padding-left: 0;
	}
	#tab1-3 .tabsbar {
	    height: 40px;
	    background: none !important;
	    width: 100%;
	    padding-left: 4%;
	}
	#tab1-3 .tabsbar ul li {
	    margin-right: 0;
	    border-radius: 0;
	    height: 40px;
	    border: 1px solid #333;
	    width: 40%;
	}
	#tab1-3 .tabsbar ul li a {
	    line-height: 15px;
	    padding: 10px 15px;
	    height: 40px;
	}
	#tab1-3 .tabsbar ul li.active a {
	    line-height: 15px;
	    padding: 10px 15px;
	    height: 39px;
	    border: 1px solid #333;
	    border-radius: 0;
	    background: #333;
	    color: #fff;
	}
	#tab2-1 table{
		width: 100%;
		float: left;		
		border: 1px solid #d6d7d8;
	}
	#tab2-1 table tr th{
		padding: 8px;
		border: 1px solid #d6d7d8;
		background: #ebecec;
	}
	#tab2-1 table tr td{
		padding: 8px;
		border: 1px solid #d6d7d8;
	}
	#tab1-3 .tab-content{
		margin-top: 20px; 
		width: 85%;
	}

	#tab2-2 table{
		width: 100%;
		float: left;		
		border: 1px solid #d6d7d8;
	}
	#tab2-2 table tr th{
		padding: 8px;
		border: 1px solid #d6d7d8;
		background: #ebecec;
	}
	#tab2-2 table tr td{
		padding: 8px;
		border: 1px solid #d6d7d8;
	}

	/*Tab2*/
	#tab2 .box-generic{
		border: none;
	    width: 90%;
	    padding-left: 14%;
	}
	#tab2 .tabsbar{
		height: 160px;
		background: none !important;
		width: 130%;
	}
	#tab2 .tabsbar ul li{
		margin-right: 20px;
		border:1px solid #adafb1;
		height: 160px;
		border-radius: 5px;
	}
	#tab2 .tabsbar ul li a{
		line-height: 23px;
		padding: 10px 15px;
		height: 160px;
	}
	#tab2 .tabsbar ul li.active a{
		line-height: 23px;
		padding:10px 15px;
		height: 159px;
		border: 1px solid #0eac00;
		border-radius: 5px;
	}	
	#tab2 .tabsbar ul li a .textBlue{
		color: #0eac00 ;
	}

	/*Rewards Tab 2*/
	#tab3-2 .box-generic {
	    border: none;
	    width: 100%;
	    padding-left: 0;
	}
	#tab3-2 .tabsbar {
	    height: 40px;
	    background: none !important;
	    width: 100%;
	    padding-left: 4%;
	}
	#tab3-2 .tabsbar ul li {
	    margin-right: 0;
	    border-radius: 0;
	    height: 40px;
	    border: 1px solid #333;
	    width: 40%;
	}
	#tab3-2 .tabsbar ul li a {
	    line-height: 15px;
	    padding: 10px 15px;
	    height: 40px;
	}
	#tab3-2 .tabsbar ul li.active a {
	    line-height: 15px;
	    padding: 10px 15px;
	    height: 39px;
	    border: 1px solid #333;
	    border-radius: 0;
	    background: #333;
	    color: #fff;
	}
	#tab4-1 table{
		width: 85%;
		float: left;		
		border: 1px solid #d6d7d8;
	}
	#tab4-1 table tr th{
		padding: 8px;
		border: 1px solid #d6d7d8;
		background: #ebecec;
	}
	#tab4-1 table tr td{
		padding: 8px;
		border: 1px solid #d6d7d8;
	}
	#tab4-1 .tab-content{
		margin-top: 20px; 
		width: 85%;
	}

	#tab4-2 table{
		width: 85%;
		float: left;		
		border: 1px solid #d6d7d8;
	}
	#tab4-2  table tr th{
		padding: 8px;
		border: 1px solid #d6d7d8;
		background: #ebecec;
	}
	#tab4-2  table tr td{
		padding: 8px;
		border: 1px solid #d6d7d8;
	}

	/*Rewards Tab 3*/
	#tab3-3 .box-generic {
	    border: none;
	    width: 100%;
	    padding-left: 0;
	}
	#tab3-3 .tabsbar {
	    height: 40px;
	    background: none !important;
	    width: 100%;
	    padding-left: 4%;
	}
	#tab3-3 .tabsbar ul li {
	    margin-right: 0;
	    border-radius: 0;
	    height: 40px;
	    border: 1px solid #333;
	    width: 40%;
	}
	#tab3-3 .tabsbar ul li a {
	    line-height: 15px;
	    padding: 10px 15px;
	    height: 40px;
	}
	#tab3-3 .tabsbar ul li.active a {
	    line-height: 15px;
	    padding: 10px 15px;
	    height: 39px;
	    border: 1px solid #333;
	    border-radius: 0;
	    background: #333;
	    color: #fff;
	}
	#tab5-1 table{
		width: 85%;
		float: left;		
		border: 1px solid #d6d7d8;
	}
	#tab5-1 table tr th{
		padding: 8px;
		border: 1px solid #d6d7d8;
		background: #ebecec;
	}
	#tab5-1 table tr td{
		padding: 8px;
		border: 1px solid #d6d7d8;
	}
	#tab5-1 .tab-content{
		margin-top: 20px; 
		width: 85%;
	}

	#tab5-2 table{
		width: 85%;
		float: left;		
		border: 1px solid #d6d7d8;
	}
	#tab5-2  table tr th{
		padding: 8px;
		border: 1px solid #d6d7d8;
		background: #ebecec;
	}
	#tab5-2  table tr td{
		padding: 8px;
		border: 1px solid #d6d7d8;
	}
</style>
<script id="Loyalty" type="text/x-kendo-template">	
	<!-- <div id="ntf1" data-role="notification"></div> -->
	<div class="container">
		<div class="row loyalty">
			<div class="span12">
				<div class="example">
					<h2>Create Loyalty Program</h2>
					<a href="" class="loyatyNext">Next</a>
					<div class="row">
						<div>
							<div class="box-generic" style="margin-left: 0;">
						    
							    <div class="tabsbar tabsbar-1">
							        <ul class="row-fluid row-merge">
							        	<li class="span2  active">
							            	<a href="#tab0" data-toggle="tab"><span>Name</span></a>
							            </li>
							            <li class="span2  ">
							            	<a href="#tab1" data-toggle="tab"><span>Rules</span></a>
							            </li>
							            <li class="span2">
							            	<a href="#tab2" data-toggle="tab"><span>Rewards</span></a>
							            </li>
							            <!-- <li class="span2">
							            	<a href="#tab3" data-toggle="tab"><span>Location</span></a>
							            </li> -->
							        </ul>
							    </div>

							    <div class="tab-content">
							    	<div class="tab-pane active" id="tab0">
							    		<div style="width: 50%; text-align: left; margin: 20px auto 0;">
						            		<span style="padding: 10px 69px 10px 20px; background: #ddd; line-height: 34px; border-width: 1px 0 0 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Name</span>
						            		<input style="height: 40px; padding: 8px; border-width: 1px 1px 0 1px; border-style: solid; border-color: #ccc; color: #333; margin-left: -4px; width: 55%;" type="search" placeholder="Name..." >
						            		<div class="clear"></div>
						            		<span style="padding: 10px 76px 10px 20px; background: #ddd; line-height: 34px; border-width: 1px 0 0 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Base</span>
						            		<input style="height: 41px; padding: 8px; border-width: 1px 1px 0 1px; border-style: solid; border-color: #ccc; color: #333; margin-left: -4px; width: 55%;" type="search" >						            		
						            		<div class="clear"></div>
						            		<span style="padding: 10px 74px 10px 20px; background: #ddd; line-height: 34px; border-width: 1px 0 1px 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Type</span>
						            		<input style="height: 40px; padding: 8px; border-width: 1px 1px 1px 1px; border-style: solid; border-color: #ccc; color: #333; margin-left: -4px; width: 55.1%;" type="search" >
						            	</div>
							    	</div>

							        <div class="tab-pane " id="tab1">
						            	<h3>Earn by Amount Spent</h3>
						            	<p>Customers earn stars based on the total amount they spend.</p>
						            	<div style="width: 50%; text-align: left; margin: 20px auto 0;">
						            		<span style="padding: 10px 69px 10px 20px; background: #ddd; line-height: 34px; border-width: 1px 0 0 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Amount per point</span>
						            		<input style="height: 40px; padding: 8px; border-width: 1px 1px 0 1px; border-style: solid; border-color: #ccc; color: #333; margin-left: -4px; width: 55%;" type="search" placeholder="Name..." >
						            		<div class="clear"></div>
						            		<span style="padding: 10px 76px 10px 20px; background: #ddd; line-height: 34px; border-width: 1px 0 1px 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Point per reward</span>
						            		<input style="height: 41px; padding: 8px; border-width: 1px 1px 1px 1px; border-style: solid; border-color: #ccc; color: #333; margin-left: -4px; width: 55%;" type="search" >						            		
						            	</div>
						        	</div>
							        
							        <div class="tab-pane " id="tab2">
						            	<h3>Choose how your customers will redeem their rewards.</h3>
						            	<p>Select one of the options below to determine how your customers will redeem stars for rewards.</p>

						            	<div style="width: 75%; text-align: left; margin: 20px auto 0;">
						            		<span style="padding: 7px 50px 7px 20px; background: #ddd; line-height: 34px; border-width: 1px 0 0 1px; border-style: solid; border-color: #ccc; font-weight: 700; float: left;">Reward amount</span>
						            		<div style="height: 49px; padding: 8px; border-width: 1px 1px 0 1px ; border-style: solid; border-color: #ccc; color: #333; width: 63%; float: left;" type="search" placeholder="Number..." >
						            			<input  type="search" placeholder="Number..." style="float: left; width: 76%; border: none;">
						            			<a style="padding: 5px 10px; border: 1px solid #333; float: left; text-align: center;">%</a>
						            			<a style="padding: 5px 10px; border: 1px solid #333; float: left; text-align: center;">Amount</a>
						            		</div>
						            		<div class="clear"></div>
					            			<span style="padding: 2px 85px 2px 20px; background: #ddd; line-height: 34px; border-width: 1px 0 1px 1px; border-style: solid; border-color: #ccc; font-weight: 700; float: left;">Expiration</span>										            	
					            			<input 
												data-role="dropdownlist"
												data-template="contact-list-tmpl" 
												data-auto-bind="false" 
												data-value-primitive="true" 
												data-filter="startswith" 
												data-text-field="name" 
												data-value-field="id"
												data-option-label="Select a Category..."
												data-bind=""
					                            style="height: 40px; padding: 8px; border-width: 1px 1px 1px 1px; border-style: solid; border-color: #ccc; color: #333; margin-left: 0px; width: 63%; float: left;"
					                            aria-invalid="true" 
					                            class="k-invalid"
					                        />						            		
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
<script id="contact-person-row-tmpl" type="text/x-kendo-tmpl">
	<tr>		
		<td>
			<input id="name" name="name" 
					type="text" class="k-textbox" 
					data-bind="value: name"
					placeholder="eg: Mr. John" 
					required="required" validationMessage="required" style="width: 190px;" />
            <span data-for="name" class="k-invalid-msg"></span>
		</td>
		<td>
			<input type="text" class="k-textbox" data-bind="value: department" placeholder="eg: Accounting" style="width: 190px;" />
		</td>		
		<td>
			<input type="text" class="k-textbox" data-bind="value: phone" placeholder="eg: 012 333 444" style="width: 190px;" />
		</td>
		<td>
			<input type="text" class="k-textbox" data-bind="value: email" placeholder="eg: john@email.com" style="width: 190px;" />
		</td>		
		<td align="center">            
			<span class="glyphicons no-js delete" data-bind="click: deleteContactPerson"><i></i></span>									
		</td>		
	</tr>
</script>
<script id="attachment-list-tmpl" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<input id="txtName-#:uid#" name="txtName-#:uid#" 
					type="text" class="k-textbox" 
					data-bind="value: name" />
		</td>
		<td>
			<input id="txtDescription-#:uid#" name="txtDescription-#:uid#" 
					type="text" class="k-textbox" 
					data-bind="value: description"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>#=kendo.toString(created_at, "dd-MM-yyyy")#</td>
		<td>
			#if(id){#
				<a href="#=url#" target="_blank" class="btn-action glyphicons download btn-default"><i></i></a>
			#}#
			<span class="btn-action glyphicons remove_2 btn-danger" data-bind="click: removeFile"><i></i></span>			
		</td>
	</tr>
</script>
<script id="account-list-tmpl" type="text/x-kendo-tmpl">	
	<span>
		#=number#				
	</span>
	-
	<span>#=name#</span>
</script>
<script id="currency-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=code# - #=country#
	</span>
</script>