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
	#tab1 h2{
		float: left;
		width: 100%;
		font-size: 20px;
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
					            	<div class="span12">
					            		<h2>Rules</h2>
					            		<div style="width: 50%; text-align: left; margin: 20px auto 0;">
						            		<span style="float: left; padding: 10px 65px 10px 20px; background: #ddd; border-width: 1px 0 0 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Name</span>
						            		<label style="float: left; height: 41px; padding: 8px; border-width: 1px 1px 0 1px; border-style: solid; border-color: #ccc; color: #333; width: 54.8%; margin-bottom: 0;" data-bind="value: obj.name">ssss</label>
						            		<div class="clear"></div>
						            		<span style="float: left; padding: 10px 72px 10px 20px; background: #ddd; border-width: 1px 0 0 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Base</span>
						            		<label style="float: left; height: 41px; padding: 8px; border-width: 1px 1px 0 1px; border-style: solid; border-color: #ccc; color: #333; width: 54.8%; margin-bottom: 0;" data-bind="value: obj.name">sss</label>
						            		<div class="clear"></div>
						            		<span style="float: left; padding: 10px 71px 10px 20px; background: #ddd; border-width: 1px 0 1px 1px;   border-style: solid; border-color: #ccc; font-weight: 700" data-bind="invisible: isPointBase">Type</span>
						            		<label style="float: left; height: 41px; padding: 8px; border-width: 1px 1px 1px 1px; border-style: solid; border-color: #ccc; color: #333; width: 54.8%; margin-bottom: 0;" data-bind="value: obj.name">sss</label>
						            	</div>
					            		<h2>Rewards</h2>
					            		<div style="width: 50%; text-align: left; margin: 20px auto 0;">
						            		<span style="float: left; padding: 10px 51px 10px 20px; background: #ddd; border-width: 1px 0 0 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Amount</span>
						            		<label style="float: left; height: 41px; padding: 8px; border-width: 1px 1px 0 1px; border-style: solid; border-color: #ccc; color: #333; width: 54.8%; margin-bottom: 0;" data-bind="value: obj.name">sss</label>
						            		<div class="clear"></div>
						            		<span style="float: left; padding: 10px 72px 10px 20px; background: #ddd; border-width: 1px 0 0 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Type</span>
						            		<label style="float: left; height: 41px; padding: 8px; border-width: 1px 1px 0 1px; border-style: solid; border-color: #ccc; color: #333; width: 54.8%; margin-bottom: 0;" data-bind="value: obj.name">ss</label>
						            		<div class="clear"></div>
						            		<span style="float: left; padding: 10px 36px 10px 20px; background: #ddd; border-width: 1px 0 1px 1px;   border-style: solid; border-color: #ccc; font-weight: 700" data-bind="invisible: isPointBase">Expiration</span>
						            		<label style="float: left; height: 41px; padding: 8px; border-width: 1px 1px 1px 1px; border-style: solid; border-color: #ccc; color: #333; width: 54.8%; margin-bottom: 0;" data-bind="value: obj.name">sss</label>
						            	</div>
					            		<h2>Branch</h2>
					            		<div class="span12" style="padding-right: 0;">
					            			<a style="float: right; padding: 5px 15px; background: green; color: #fff; margin-bottom: 5px;" data-bind="visible: isEdit, click: clearBranch">Clear</a>
					            		</div>
					            		<div class="rows">
						            		<select id="listbox1" data-role="listbox"
								                data-text-field="name"
								                data-value-field="id" 
								                data-toolbar='{
								                	tools: ["moveUp", "moveDown", "transferTo", "transferFrom", "transferAllTo", "transferAllFrom", "remove"]
								            	}'
								                data-connect-with="listbox2"
								                data-auto-bind="true"
								                data-bind="source: branchDS" style="width: 50%; min-height: 550px;float: left;">
								            </select>
								           	
								            <select id="listbox2" data-role="listbox"
								                data-connect-with="listbox1"
								                data-text-field="name"
								                data-value-field="id"
								                data-auto-bind="false"
								                data-bind="source: obj.branches"
								                style="width: 49%; min-height: 550px;float: left;">
								            </select>
						           		</div>
					            	</div>
					        	</div>
						        
						        <div class="tab-pane" id="tab2">
						        	<div class="span12">
					            		<div class="span12" style="padding-right: 15px;">
					            			<a style="float: right; padding: 5px 15px; background: green; color: #fff; margin-bottom: 5px;" data-bind="click: clearBranch">Clear</a>
					            		</div>
					            		<div class="rows">
						            		<select id="listbox1" data-role="listbox"
								                data-text-field="name"
								                data-value-field="id" 
								                data-toolbar='{
								                	tools: ["moveUp", "moveDown", "transferTo", "transferFrom", "transferAllTo", "transferAllFrom", "remove"]
								            	}'
								                data-connect-with="listbox2"
								                data-auto-bind="true"
								                data-bind="source: branchDS" style="width: 50%; min-height: 550px;float: left;">
								            </select>
								           	
								            <select id="listbox2" data-role="listbox"
								                data-connect-with="listbox1"
								                data-text-field="name"
								                data-value-field="id"
								                data-auto-bind="false"
								                data-bind="source: obj.branches"
								                style="width: 49%; min-height: 550px;float: left;">
								            </select>
						           		</div>
					            		<a style="float: left; padding: 5px 15px; background: red; color: #fff; margin-top: 5px;" data-bind="click: clearBranch">Save</a>					            		
					            	</div>
					        	</div>
						       
						        <div class="tab-pane" id="tab3">
						        	<div class="span12">
					            		<div>
											<input data-role="dropdownlist"
												   class="sorter"                  
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" />

											<input data-role="datepicker"
												   class="sdate"
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." >

										    <input data-role="datepicker"
										    	   class="edate"
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." >

										  	<button type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
										</div>

										<table class="table table-bordered table-striped table-white">
											<thead>
												<tr>
													<th><span data-bind="text: lang.lang.date"></span></th>
													<th><span data-bind="text: lang.lang.type"></span></th>
													<th><span data-bind="text: lang.lang.reference_no"></span></th>
													<th><span data-bind="text: lang.lang.amount"></span></th>
													<th><span data-bind="text: lang.lang.status"></span></th>
													<th><span data-bind="text: lang.lang.action"></span></th>
												</tr>
											</thead>
						            		<tbody data-role="listview"
						            				data-auto-bind="false"
									                data-template="customerCenter-transaction-tmpl"
									                data-bind="source: transactionDS" >
									        </tbody>
						            	</table>

						            	<div id="pager" class="k-pager-wrap"
						            		 data-role="pager"
									    	 data-auto-bind="false"
								             data-bind="source: transactionDS"></div>
					            	</div>
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
	#tab0 .k-widget.k-dropdown.k-header > .k-dropdown-wrap.k-state-default{
		height: 40px;
	}
	#tab0 .k-dropdown-wrap .k-input{
		padding: 10px !important;
	}
	#tab0 .k-header .k-icon{
		margin-top: 13px;
	}
	#tab2 span.k-datepicker{
		width: 62.8%;
	    float: left;
	    padding: 0;
	    border: 1px solid #ddd;
	    height: 38px;
	    background: none;
	}
	#tab2 .k-picker-wrap .k-input{
		width: 97% !important;
	    float: left;
	    padding: 7px 0 0 10px !important;
	}
	#tab2 .k-picker-wrap.k-state-default{
		height: 37px;
	}
	#tab2 .k-header .k-i-calendar{
		margin-top: 10px;
	}
</style>
<script id="Loyalty" type="text/x-kendo-template">	
	<!-- <div id="ntf1" data-role="notification"></div> -->
	<div class="container">
		<div class="row loyalty">
			<div class="span12">
				<div class="example" style="overflow: hidden;position: relative;">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;margin-left: -15px;">
						<p style="color: #fff;font-size: 25px;position: absolute;top: 45%;left: 45%;">Loading</p>
					</div>
					<h2>Create Loyalty Program</h2>
					<a data-bind="click: goNext, invisible: lastStep" class="loyatyNext">Next</a>
					<a data-bind="click: save, visible: lastStep" class="loyatyNext" style="background: red">Save</a>
					<div class="row">
						<div>
							<div class="box-generic" style="margin-left: 0;">
							    <div class="tabsbar tabsbar-1">
							        <ul class="row-fluid row-merge">
							        	<li class="span2  active" data-bind="click: tabeClick">
							            	<a href="#tab0" data-toggle="tab"><span>Name</span></a>
							            </li>
							            <li class="span2" data-bind="visible: isPointBase, click: tabeClick">
							            	<a href="#tab1" data-toggle="tab"><span>Rules</span></a>
							            </li>
							            <li class="span2">
							            	<a href="#tab2" data-toggle="tab" data-bind="click: tabeClick"><span>Rewards</span></a>
							            </li>
							            <li class="span2">
							            	<a href="#tab3" data-toggle="tab" data-bind="click: tabeClick"><span>Branch</span></a>
							            </li>
							        </ul>
							    </div>
							    <div class="tab-content">
							    	<div class="tab-pane active" id="tab0">
							    		<div style="width: 50%; text-align: left; margin: 20px auto 0;">
						            		<span style="float: left; padding: 10px 69px 10px 20px; background: #ddd; border-width: 1px 0 0 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Name</span>
						            		<input style="float: left; height: 41px; padding: 8px; border-width: 1px 1px 0 1px; border-style: solid; border-color: #ccc; color: #333; margin-left: -4px; width: 54.8%;" type="search" placeholder="Name..." data-bind="value: obj.name">
						            		<div class="clear"></div>
						            		<span style="float: left; padding: 10px 72px 10px 20px; background: #ddd; border-width: 1px 0 0 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Base</span>
						            		<input data-role="dropdownlist"
								                data-auto-bind="false"
								                data-value-primitive="true"
								                data-text-field="name"
								                data-value-field="id"
								                data-bind="
								                	value: obj.base,
								                    source: baseAR,
								                    events: {change: baseChange}
								                    "
								                style="float: left; width: 55%; height: 41px; background: none;"
								            />
						            		<div class="clear"></div>
						            		<span style="float: left; padding: 10px 71px 10px 20px; background: #ddd; border-width: 1px 0 1px 1px;   border-style: solid; border-color: #ccc; font-weight: 700" data-bind="invisible: isPointBase">Type</span>
						            		<input data-role="dropdownlist"
								                data-auto-bind="false"
								                data-value-primitive="true"
								                data-text-field="name"
								                data-value-field="id"
								                data-bind="
								                	invisible: isPointBase,
								                	value: obj.base_type,
								                    source: typeAR,
								                    events: {change: baseTypeChange}
								                    "
								                style="width: 54.8%;"
								            />
						            	</div>
							    	</div>
							        <div class="tab-pane " id="tab1">
						            	<h3>Earn by Amount Spent</h3>
						            	<p>Customers earn stars based on the total amount they spend.</p>
						            	<div style="width: 50%; text-align: left; margin: 20px auto 0;">
						            		<span style="padding: 10px 69px 10px 20px; background: #ddd; line-height: 34px; border-width: 1px 0 0 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Amount per point</span>
						            		<input style="height: 40px; padding: 8px; border-width: 1px 1px 0 1px; border-style: solid; border-color: #ccc; color: #333; margin-left: -4px; width: 55%;" type="search" placeholder="..." data-bind="value: obj.amount_per_point">
						            		<div class="clear"></div>
						            		<span style="padding: 10px 76px 10px 20px; background: #ddd; line-height: 34px; border-width: 1px 0 1px 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Point per reward</span>
						            		<input style="height: 41px; padding: 8px; border-width: 1px 1px 1px 1px; border-style: solid; border-color: #ccc; color: #333; margin-left: -4px; width: 55%;" type="search" data-bind="value: obj.point_per_reward">						            		
						            	</div>
						        	</div>
							        <div class="tab-pane " id="tab2">
						            	<h3>Choose how your customers will redeem their rewards.</h3>
						            	<p>Select one of the options below to determine how your customers will redeem stars for rewards.</p>
						            	<div style="width: 75%; text-align: left; margin: 20px auto 0;">
						            		<span style="padding: 7px 50px 7px 20px; background: #ddd; line-height: 34px; border-width: 1px 0 0 1px; border-style: solid; border-color: #ccc; font-weight: 700; float: left;">Reward amount</span>
						            		<div style="height: 49px; padding: 8px; border-width: 1px 1px 0 1px ; border-style: solid; border-color: #ccc; color: #333; width: 63%; float: left;" >
						            			<input  
						            				placeholder="Number..." 
						            				style="float: left; width: 76%; border: none;" 
						            				data-bind="value: obj.reward_amount">
						            			<div 
						            				data-role="listview"
									                data-template="reward_template"
									                data-bind="source: rewardTypeAR">
										        </div>
						            		</div>
						            		<div class="clear"></div>
					            			<span style="padding: 2px 84px 2px 20px; background: #ddd; line-height: 34px; border-width: 1px 0 1px 1px; border-style: solid; border-color: #ccc; font-weight: 700; float: left;">Expiration</span>
					            			<input 
								            	data-role="datepicker" 
								            	data-format="dd-MM-yyyy" 
								            	data-parse-formats="yyyy-MM-dd" 
								            	data-bind="value: obj.expire"
								            	style=" width: 63%; float: left;"
								            	type="text" class="k-input k-valid"> 
						            	</div>
						        	</div>
						        	<div class="tab-pane " id="tab3">
						            	<h3>Choose how your customers will redeem their rewards.</h3>
						            	<p>Select one of the options below to determine how your customers will redeem stars for rewards.</p>
						            	<div style="width: 75%; text-align: left; margin: 20px auto 0;">
						            		<div class="span12" style="padding-right: 0;"><a style="float: right; padding: 5px 15px;    background: green; color: #fff; margin-bottom: 5px;" data-bind="visible: isEdit, click: clearBranch">Clear</a></div>
						            		<select id="listbox1" data-role="listbox"
								                data-text-field="name"
								                data-value-field="id" 
								                data-toolbar='{
								                	tools: ["moveUp", "moveDown", "transferTo", "transferFrom", "transferAllTo", "transferAllFrom", "remove"]
								            	}'
								                data-connect-with="listbox2"
								                data-auto-bind="true"
								                data-bind="source: branchDS" style="width: 50%; min-height: 550px;">
								            </select>
								           	
								            <select id="listbox2" data-role="listbox"
								                data-connect-with="listbox1"
								                data-text-field="name"
								                data-value-field="id"
								                data-auto-bind="false"
								                data-bind="source: obj.branches"
								                style="width: 49%; min-height: 550px;">
								            </select>
						            	</div>
						        	</div>
							    </div>
							</div>
							<div id="ntf1" data-role="notification"></div>
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
<script id="reward_template" type="text/x-kendo-tmpl">
	<a data-bind="click: typeRewardSelect" class="#if(id == 2){# rewardtypeamt #}else{# rewardtypeper #}#" style="padding: 5px 10px; border: 1px solid \#333; float: left; text-align: center;list-style: none;cursor: pointer;#if(id == 1){#background: \#333; color: \#fff;#}#">#: name#</a>
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
</script>                                                 