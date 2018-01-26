<div id="wrapperApplication" class="wrapper"></div>
<!--load before somthing not yet done -->
<div id="holdpageloadhide" style="display:block;text-align: center;position: fixed;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
	<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
</div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
	<div id="menu" class="menu"></div>
	<div id="content" class="container"></div>
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

<!-- ***************************
*	Water Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template">
	<div class="container" style="margin-top: 50px;">
		<div class="row" style="margin-top: 30px;">
			<div class="col-md-6">
				<div class="col-md-12" style="padding: 0; margin: 0; ">
					<ul id="module-image">
						<li style="text-align: center;">
							<a href="#/client_center">
								<img title="" src="<?php echo base_url()?>assets/spa/clients.png"  />
								<span data-bind="" style=" text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Clients</span>
							</a>
						</li>
						<li style="text-align: center;">
							<a href="#/staff_center">
								<img  title="" src="<?php echo base_url()?>assets/spa/staffs.png"  />
								<span data-bind="" style="text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Staffs</span>
							</a>
						</li>
						<li style="text-align: center;">
							<a href="#/service_center">
								<img title="" src="<?php echo base_url()?>assets/spa/service.png"   />
								<span data-bind="" style="text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Services</span>
							</a>
						</li>
						<li style="text-align: center;">
							<a href="#/report">
								<img  title="" src="<?php echo base_url()?>assets/spa/report.png"  />
								<span data-bind=""  style=" text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Reports</span>
							</a>
						</li>
					</ul>
				</div>
				<div class="cash-bg" style="margin-top: 15px; margin-bottom: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; width: 97%">				
					<div class="row-fluid" >
						<div class="col-xs-3 col-sm-3 col-md-3" style="text-align: center;">
							<a href="#/calendar">
								<img  title="" src="<?php echo base_url()?>assets/spa/calender.png"  />
								<span data-bind="" style="text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Calendar</span>
							</a>
						</div>
						<div class="col-xs-3 col-sm-3 col-md-3" style="text-align: center;">
							<a href="#/cash_sale">
								<img title="" src="<?php echo base_url()?>assets/spa/expense.png"  />
								<span  style=" text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Cash Sale</span>
							</a>
						</div>
						<div class="col-xs-3 col-sm-3 col-md-3" style="text-align: center;">
							<a href="#/invoice">
								<img title="" src="<?php echo base_url()?>assets/spa/invoce.png"   />
								<span data-bind="" style="text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Invoices</span>
							</a>
						</div>
						<div class="col-xs-3 col-sm-3 col-md-3" style="text-align: center;">
							<a href="#/receipt">
								<img title="" src="<?php echo base_url()?>assets/spa/receipt.png"  />
								<span data-bind="text: lang.lang.wreceipt"  style=" text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Receipt</span>
							</a>
						</div>			
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="cash-bg" style=" margin-bottom: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
							
							<a href="http://app.banhji.com/c2/rrd/">
								<div class="col-md-12" style="padding-left: 0;">
								 	<img style="height: 50px" src="<?php echo base_url();?>assets/water/banhji-logo.png" >
								</div>
							</a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6" style="padding-left: 0">
						<div class="cash-bg" style="width:94%; margin-bottom: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
							<a href="#" target="_blank"><img style="width: auto;height: 50px;margin-left: 15px;" src="<?php echo base_url();?>assets/spa/wellnez-blue.png"></a>
						</div>
					</div>
				</div>
				<div class="home-chart row-fluid" style="width:97%; margin-bottom: 15px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; float: left; background: #fff;">
					<div class="col-xs-12 col-sm-12">
						<div class="chart" >
						</div>
					</div>
				</div>
			</div>

		    <div class="col-md-6" >
		    	<div class="cash-bg" style="margin-bottom: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
		    		<div class="board-chart">
						<div class="span12">
							<h4> Company Name</h4>
							<span style="color: #000000;"><span data-bind="text: lang.lang.as_of"></span>:&nbsp;<span id="today-date" data-bind="text: today"></span></span><br/>
						</div>
					</div>
		    	</div>

		    	<div class="cash-bg" style="margin-bottom: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
		    		<div class="row-fluid" >
						<div class="col-xs-12 col-sm-6 col-md-7" style="background: #232F3E; padding-bottom: 15px; padding-top: 15px; padding-right: 0;">
							<a href="#/customer_aging_sum_list">
								<div class="widget-body alert-info welcome-nopadding" style="width: 100%; background: #232F3E; height: 120px;">
									<p style="color: #fff; font-size: 25px; margin-bottom: 30px;"><span data-bind="text: lang.lang.sale"></span></p>
									<table width="100%" style="color: #fff;">
										<tbody>
											<tr align="center">
												<td>
													<span style="font-size: 25px;"><span data-bind="text: invoice"></span></span>
													<br>
													<span style="text-transform: capitalize;" data-bind="text: lang.lang.customers"></span>
												</td>
												<td>
													<span style="font-size: 25px;"><span data-bind="text: invCust"></span></span>
													<br>
													<span data-bind="text: lang.lang.product"></span>
												</td>
												<td>
													<span style="font-size: 25px;"><span data-bind="text: overDue"></span></span>
													<br>
													<span data-bind="text: lang.lang.order"></span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</a>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-5" style="background: #203864; padding-bottom: 15px; padding-top: 15px; padding-right: 0;">
							<a href="#/customer_list">
								<div class="widget-body alert-info welcome-nopadding" style="width: 100%; background: #203864; height: 120px;">
									<p style="color: #fff; font-size: 25px; margin-bottom: 30px;"><span data-bind="text: lang.lang.sale_order"></span></p>
									<table width="100%" style="color: #fff; ">
										<tbody>
											<tr align="center">
												<td>
													<span style="font-size: 25px;" data-bind="text: totalCust"></span>
													<br>
													<span data-bind="text: lang.lang.average"></span>
												</td>
												<td>
													<span style="font-size: 25px;" data-bind="text: voidCust"></span>
													<br>
													<span data-bind="text: lang.lang.order_open"></span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</a>
						</div>
					</div>
		    	</div>
		    	<div class="row">
		    		<div class="col-xs-12 col-sm-6">
						<table class="table table-bordered table-primary table-striped table-vertical-center" style="font-size: 12px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
					        <thead>
					            <tr>
					                <th class="center" colspan="2" style="background: #203864;"><span data-bind="text: lang.lang.top_5_customers"></span></th>
					            </tr>
					        </thead>
					    </table>
					</div>
		    		<div class="col-xs-12 col-sm-6">
						<table class="table table-bordered table-primary table-striped table-vertical-center" style="font-size: 12px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
					        <thead>
					            <tr>
					                <th class="center" colspan="2" style="background: #203864;"><span data-bind="text: lang.lang.top_5_products"></span></th>
					            </tr>
					        </thead>
					    </table>
					</div>
		    	</div>
		   	</div>
		</div>		
	</div>
</script>