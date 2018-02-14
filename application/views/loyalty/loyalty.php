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
	}
	.loyalty .example #tab1 h3{
		color: #0eac00 !important;
	}
	#tab1 .box-generic{
		border: none;
	    width: 90%;
	    padding-left: 14%;
	}
	#tab1 .tabsbar{
		height: 140px;
		background: none !important;
		width: 130%;
	}
	#tab1 .tabsbar ul li{
		margin-right: 20px;
		border:1px solid #adafb1;
		height: 140px;
		border-radius: 5px;
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

	#tab1 .box-generic{
		border: none;
	    width: 90%;
	    padding-left: 14%;
	}
	#tab1 .tabsbar{
		height: 140px;
		background: none !important;
		width: 130%;
	}
	#tab1 .tabsbar ul li{
		margin-right: 20px;
		border:1px solid #adafb1;
		height: 140px;
		border-radius: 5px;
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
</style>
<!-- ***************************
*	Water Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template">
	<div id="ntf1" data-role="notification"></div>
	<div class="container">
		<div class="row loyalty">
			<div class="span12">
				<div class="example">
					<h2>Create Loyalty Program</h2>

					<div class="row">
						<div class="span12">
							<div class="box-generic">
						    
							    <div class="tabsbar tabsbar-1">
							        <ul class="row-fluid row-merge">
							            <li class="span2  active">
							            	<a href="#tab1" data-toggle="tab"><span>Rules</span></a>
							            </li>
							            <li class="span2 usd">
							            	<a href="#tab2" data-toggle="tab"><span>Rewards</span></a>
							            </li>
							            <li class="span2 parents">
							            	<a href="#tab3" data-toggle="tab"><span>Incentives</span></a>
							            </li>
							            <li class="span2 notes">
							            	<a href="#tab4" data-toggle="tab"><span>Location</span></a>
							            </li>
							        </ul>
							    </div>

							    <div class="tab-content">
							        <div class="tab-pane active" id="tab1">
						            	<h3>Choose how your customers will earn stars.</h3>
						            	<p>Select one of the options below to determine how your customers will earn stars.</p>

						            	<div class="row">
											<div class="span12">
												<div class="box-generic" style="border: none;">											    
												    <div class="tabsbar tabsbar-1">
												        <ul class="row-fluid row-merge">
												            <li class="span2  active">
												            	<a href="#tab1-1" data-toggle="tab">
												            		<span class="textBlue">By Visit</span>
												            		 <br><span>Customers earn one star per qualifying visit.</span>
												            	</a>
												            </li>
												            <li class="span2 usd">
												            	<a href="#tab1-2" data-toggle="tab">
												            		<span class="textBlue">Earn by Amount Spent</span>
												            		 <br><span>Customers earn stars based on the total amount they spend.</span>
												            	</a>
												            </li>
												            <li class="span2 parents">
												            	<a href="#tab1-3" data-toggle="tab">
												            		<span class="textBlue">By Item or Category</span>
												            		 <br><span>Reward stars based on the specific items or categories being purchased.</span>
												            	</a>
												            </li>
												        </ul>
												    </div>

												    <div class="tab-content">
												        <div class="tab-pane active" id="tab1-1">
											            	<div style="margin-top: 20px; float: left;width: 100%; text-align: left;">
											            		<span style="padding: 10px 62px 10px 20px; background: #ddd; line-height: 34px; border-width: 1px 0 0 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Minimum purchase</span>
											            		<input style="height: 40px; padding: 8px; border-width: 1px 1px 0 1px; border-style: solid; border-color: #ccc; color: #333; margin-left: -4px; width: 55%;" type="search" placeholder="Number or Name..." >
											            		<div class="clear"></div>
											            		<span style="padding: 10px 75px 10px 20px; background: #ddd; line-height: 34px; border-width: 1px 0 1px 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Stars for a reward</span>
											            		<input style="height: 41px; padding: 8px; border-width: 1px 1px 1px 1px; border-style: solid; border-color: #ccc; color: #333; margin-left: -4px; width: 55%;" type="search" placeholder="Number or Name..." >
											            		<p style="margin-top: 10px; float: left;">Set the number of stars required to earn a reward.</p>
											            	</div>
											        	</div>
												        
												        <div class="tab-pane" id="tab1-2">
												        	<div style="margin-top: 20px; float: left;width: 100%; text-align: left;">
											            		<span style="padding: 10px 84px 10px 20px; background: #ddd; line-height: 34px; border-width: 1px 0 0 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Amount per star</span>
											            		<input style="height: 40px; padding: 8px; border-width: 1px 1px 0 1px; border-style: solid; border-color: #ccc; color: #333; margin-left: -4px; width: 55%;" type="search" placeholder="Number or Name..." >
											            		<div class="clear"></div>
											            		<span style="padding: 10px 75px 10px 20px; background: #ddd; line-height: 34px; border-width: 1px 0 1px 1px;   border-style: solid; border-color: #ccc; font-weight: 700">Stars for a reward</span>
											            		<input style="height: 41px; padding: 8px; border-width: 1px 1px 1px 1px; border-style: solid; border-color: #ccc; color: #333; margin-left: -4px; width: 55%;" type="search" placeholder="Number or Name..." >
											            		<p style="margin-top: 10px; float: left;">Set the number of stars required to earn a reward.</p>
											            	</div>
											        	</div>
												        
												        <div class="tab-pane" id="tab1-3">
												        	<div class="row">
																<div class="span12">
																	<div class="box-generic" style="border: none;">
																	    <div class="tabsbar tabsbar-1">
																	        <ul class="row-fluid row-merge">
																	            <li class="span2  active">
																	            	<a href="#tab2-1" data-toggle="tab">
																	            		Categories
																	            	</a>
																	            </li>
																	            <li class="span2 usd">
																	            	<a href="#tab2-2" data-toggle="tab">
																	            		Specific Items
																	            	</a>
																	            </li>
																	        </ul>
																	    </div>

																	    <div class="tab-content">
																	        <div class="tab-pane active" id="tab2-1">
																            	1-1-1
																        	</div>
																	        
																	        <div class="tab-pane" id="tab2-2">
																	        	2-2-2
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
							        
							        <div class="tab-pane" id="tab2">
							        	2222
						        	</div>
							        
							        <div class="tab-pane" id="tab3">
							        	333
						        	</div>
							        
							        <div class="tab-pane" id="tab4">
							        	444
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