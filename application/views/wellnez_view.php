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
<script id="wDashBoard" type="text/x-kendo-template">
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
						<!-- <div class="col-xs-3 col-sm-3 col-md-3" style="text-align: center;">
							<a href="#/expanses">
								<img title="" src="<?php echo base_url()?>assets/spa/expense.png"  />
								<span data-bind="" style=" text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Expenses</span>
							</a>
						</div> -->
												
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
							<div data-role="chart"
								 data-auto-bind="true"
					             data-legend="{ position: 'top' }"
					             data-series-defaults="{ type: 'column' }"
					             data-tooltip='{
					                visible: true,
					                format: "{0}%",
					                template: "#= series.name #: #= kendo.toString(value, &#39;c&#39;, banhji.locale) #"
					             }'                 
					             data-series="[
					                             { field: 'amount', name: langVM.lang.sale, categoryField:'month', color: '#203864', overlay:{ gradient: 'none'}  }
					                         ]"
					             data-bind="source: graphDS"
					             style="height: 240px; " >
							</div>
						</div>
					</div>
				</div>

				<!-- <div class="row-fluid" style="display: inline-block; margin-bottom: 15px;">
					<div style="width: 100%; float: left; ">
						<div style="width: 100%; background: #f4f4f4; float: left; text-align: left; overflow: hidden;">
							<div id="carousel-1" class="carousel slide" data-ride="carousel" data-interval="2000" style="margin-bottom: 0; float: left;">
								<ol class="carousel-indicators" style="bottom: -11px; left: 92%;">
									<li data-target="#carousel-1" data-slide-to="0" class="active"></li>
									<li data-target="#carousel-1" data-slide-to="1"></li>
									<li data-target="#carousel-1" data-slide-to="2"></li>	
								</ol>
								<div class="carousel-inner" style=" float: left;">
									<div class="item active">
										<div class="carousel-caption" style="position: relative; right: 0; left: 0; padding: 0; top: 0; background: none;">
											 <img style="width: 100%; min-width: auto;" src="<?php echo base_url();?>assets/water/banner/banhji_banner.png" >
										</div>
									</div>
									<div class="item ">
										<div class="carousel-caption" style="position: relative; right: 0; left: 0; padding: 0; top: 0; background: none;">
											 <img style="width: 100%; min-width: auto;" src="<?php echo base_url();?>assets/water/banner/pcg_banner.png" >
										</div>
									</div>
									<div class="item ">
										<div class="carousel-caption" style="position: relative; right: 0; left: 0; padding: 0; top: 0; background: none;">
											 <img style="width: 100%; min-width: auto;" src="<?php echo base_url();?>assets/water/banner/reachs_banner.png" >
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
			</div>

		    <div class="col-md-6" >
		    	<div class="cash-bg" style="margin-bottom: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
		    		<div class="board-chart">
						<div class="span12">
							<h4> Company Name</h4>
							<!-- <h4 data-bind="text: companyName"> Company Name</h4> -->
							<!-- <h2 style="color: #113051; margin-bottom: 11px; display: inline-block; width: 100%;" data-bind="text: lang.lang.financial_snapshot"></h2> -->
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
							
									<!-- <div class="strong" align="center" style="color: #fff; font-size: 27px; margin-bottom: 0;"><span data-bind="text: totalAmount"></span></div> -->
								
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
							
									<!-- <div class="strong" align="center" style="color: #fff; font-size: 27px; margin-bottom: 0;"><span data-bind="text: activeCust"></span></div> -->
								
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
					        <!-- <tbody data-role="listview"
					        	 data-auto-bind="false"
				                 data-template="customerDashBoard-top-customer-template"
				                 data-bind="source: topCustomerDS"></tbody> -->
					    </table>
					</div>
		    		<div class="col-xs-12 col-sm-6">
						<table class="table table-bordered table-primary table-striped table-vertical-center" style="font-size: 12px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
					        <thead>
					            <tr>
					                <th class="center" colspan="2" style="background: #203864;"><span data-bind="text: lang.lang.top_5_products"></span></th>
					            </tr>
					        </thead>
					        <!-- <tbody data-role="listview"
					        	 data-auto-bind="false"
				                 data-template="customerDashBoard-top-product-template"
				                 data-bind="source: topProductDS"></tbody> -->
					    </table>
					</div>
		    	</div>

		    	


		    	<div class="home-chart row-fluid" style="margin-bottom: 15px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; float: left; width: 100%; background: #fff;">
					<div class="col-xs-12 col-sm-12">
						<div class="chart" >
							<div data-role="chart"
							 data-auto-bind="false"
			                 data-legend="{ position: 'top' }"
			                 data-series-defaults="{ type: 'column' }"
			                 data-tooltip='{
			                    visible: true,
			                    format: "{0}%",
			                    template: "#= series.name #: #= kendo.toString(value, &#39;c&#39;, banhji.locale) #"
			                 }'                 
			                 data-series="[
			                                 { field: 'cash_in', name: 'Cash In', categoryField:'month', color: '#203864', overlay:{ gradient: 'none'}  },
			                                 { field: 'cash_out', name: 'Cash Out', categoryField:'month', color: '#A6C9E3' , overlay:{ gradient: 'none'} }
			                             ]"	                             
			                 data-bind="source: graphDS"
			                 style="height: 240px;" ></div>
						</div>
					</div>
				</div>
		   	</div>
		</div>		
	</div>
</script>
<script id="wsale-by-branch-row-template" type="text/x-kendo-tmpl">
	<tr>		
		<td class="sno">1</td>
		<td>#=name#</td>
		<td>#=location#</td>		
		<td >#=kendo.toString(active_customer, "n0")#</td>
		<td >#=kendo.toString(inactive_customer, "n0")#​</td>				
		<td >#=kendo.toString(deposit, "c0", banhji.institute.locale)#</td>
		<td >#=kendo.toString(usage, "n0")# </td>		
		<td style="text-align: right; padding-right: 5px !important;">#=kendo.toString(sale, "c0", banhji.institute.locale)#</td>
		<td style="text-align: right; padding-right: 5px !important;">#=kendo.toString(unpaid, "c0", banhji.institute.locale)#</td>					
    </tr>   
</script>
<script id="wsale-by-location-row-template" type="text/x-kendo-tmpl">
	<tr>		
		<td class="snoo">1</td>
		<td>#=branch_name#</td>
		<td>#=location_name#</td>		
		<td >#=kendo.toString(active_customer, "n0")# </td>
		<td >#=kendo.toString(inactive_customer, "n0")#​ </td>				
		<td >#=kendo.toString(deposit, "c0", banhji.eDashBoard.locale)#</td>
		<td >#=kendo.toString(usage, "n0")# </td>		
		<td style="text-align: right; padding-right: 5px !important;" >#=kendo.toString(sale, "c0", banhji.eDashBoard.locale)#</td>
		<td style="text-align: right; padding-right: 5px !important;" >#=kendo.toString(unpaid, "c0", banhji.eDashBoard.locale)#</td>						
    </tr>   
</script>

<!--Setting-->
<script id="setting" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2 data-bind="text: lang.lang.settings">Setting</h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>
						<div style="float: left; width: 100%; " class="widget widget-tabs widget-tabs-double widget-tabs-vertical row-fluid row-merge widget-tabs-gray">
						    <div id="setting" class="widget-head col-xs-12 col-sm-3">
						        <ul>
						            <li class="active">
						            	<a href="#CusType" class="glyphicons old_man" data-toggle="tab">
						            		<i></i><span class="strong"><span data-bind="text: lang.lang.customer_types">Customer Types</span></span>
						            	</a>
						            </li>
						            <li>
						            	<a href="#Branch" data-bind="click: goBranch" class="glyphicons calculator" data-toggle="tab">
						            		<i></i><span class="strong"><span >Branch</span></span>
						            	</a>
						            </li>
						            <li>
						            	<a href="#Room" data-bind="click: goRoom" class="glyphicons calculator" data-toggle="tab">
						            		<i></i><span class="strong"><span >Room</span></span>
						            	</a>
						            </li>
						            <li>
						            	<a href="#CalSetting" class="glyphicons wallet" data-toggle="tab">
						            		<i></i><span class="strong"><span >Calendar Setting</span></span>
						            	</a>
						            </li>
						            <li>
						            	<a href="#RefSource" class="glyphicons list" data-toggle="tab">
						            		<i></i><span class="strong"><span >Referral Sources</span></span>
						            	</a>
						            </li>
						            <li>
						            	<a href="#CancelReason" class="glyphicons lock" data-toggle="tab">
						            		<i></i><span class="strong"><span>Cancellation Reasons</span></span>
						            	</a>
						            </li>
						            <li>
						            	<a href="#PayType" class="glyphicons nameplate_alt" data-toggle="tab">
						            		<i></i><span class="strong"><span >Payment Type</span></span>
						            	</a>
						            </li>
						        </ul>
						    </div>
						    <div class="widget-body col-xs-12 col-sm-9 setting">
						    	<div class="row-fluid">
							        <div class="tab-content">
							            <div class="tab-pane active" id="CusType">
							            	<div style="clear: both;">
								            	<input type="text" class="span3 k-textbox k-invalid" style="height: 32px; padding: 5px; margin-right: 10px;" data-bind="value: contactTypeName, attr: {placeholder: lang.lang.type}" placeholder="Type" />
								            	<input type="text" placeholder="Abbr" data-bind="value: contactTypeAbbr, attr: {placeholder: lang.lang.abbr}" style="height: 32px; padding: 5px; margin-right: 10px;"  class="span3 k-textbox k-invalid" />
								            	<select class="span3" style="height: 32px; border-radius: 0; background: #fff;" id="appendedInputButtons" data-bind="value: contactTypeCompany" >
									                <option value="0" data-bind="text: lang.lang.not_a_company">Not A Company</option>
									                <option value="1" data-bind="text: lang.lang.it_is_a_company">It is A Company</option>           
									            </select>
								            	<a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addContactType"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
								            </div>
							            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
							            		<thead>
							            			<tr>
							            				<th style="text-align: center;"><span data-bind="text: lang.lang.type">Type</span></th>
							            				<th style="text-align: center;"><span data-bind="text: lang.lang.abbr">Abbr</span></th>
							            				<th style="text-align: center;"><span data-bind="text: lang.lang.is_company">Is Company</span></th>
							            				<th style="text-align: center;"><span data-bind="text: lang.lang.action">Action</span></th>
							            			</tr>
							            		</thead>
							            		<tbody data-role="listview"	            	
									                data-template="custType-template"
									                data-edit-template="customerSetting-edit-contact-type-template"
									                data-bind="source: contactTypeDS">
										        </tbody>
							            	</table>
							            </div>
							            <div class="tab-pane" id="Branch">
							            	<a class="btn-icon btn-primary glyphicons circle_plus" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" href="#/branch"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
							            	<table style="width: 100%;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
							            		<thead>
							            			<tr>
							            				<th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.name">Name</span></th>
							            				<th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.mobile">Code</span></th>
							            				<th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.telephone">Telephone</span></th>
							            				<th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.action">Action</span></th>
							            			</tr>
							            		</thead>
							            		<tbody 
							            			data-role="listview"
									                data-template="branch-template"
									                data-bind="source: branchDS">
									            </tbody>
							            	</table>
							            </div>
							            <div class="tab-pane" id="Room">
							            	<div style="clear: both;">
								            	<input data-role="dropdownlist"
								            	   class="span3"
								            	   style="padding-right: 1px;height: 32px;"
						            			   data-option-label="(--- Branch ---)"
						            			   data-auto-bind="false"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: roomBranch,
								                              source: branchDS,
								                              events: {change: branchRChange}"/>
								            	<input 
								            		data-bind="value: roomName, attr: {placeholder: lang.lang.name}" 
								            		type="text" placeholder="Location" style="height: 32px; padding: 5px; margin-right: 10px; margin-left: 10px;"  class="span3 k-textbox k-invalid" />
								            	<input 
								            		data-bind="value: roomNumber, attr: {placeholder: lang.lang.number}" type="text" placeholder="Abbr" style="height: 32px; padding: 5px; margin-right: 10px;" class="span3 k-textbox k-invalid" />
								            	<input data-role="dropdownlist"    
									               data-value-primitive="true"
									               data-text-field="name"
									               data-value-field="id"
									               data-bind="
									               		value: roomStatus,
									                    source: statusAR" />
								            	<a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addRoom"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
								            </div>

							            	<table style="width: 100%;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
							            		<thead>
							            			<tr>
							            				<th style="vertical-align: top; text-align: center;" ><span >Branch</span></th>
							            				<th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.name">Code</span></th>
							            				<th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.number">Telephone</span></th>
							            				<th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.status">Telephone</span></th>
							            				<th style="vertical-align: top; text-align: center;" ><span data-bind="text: lang.lang.action">Action</span></th>
							            			</tr>
							            		</thead>
							            		<tbody 
							            			data-role="listview"
									                data-template="room-template"
									                data-edit-template="room-edit-template"
									                data-bind="source: roomDS">
									            </tbody>
							            	</table>
							            </div>
							        </div>
							    </div>
						    </div>
						    <div id="ntf1" data-role="notification"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="room-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#= branch_name#
   		</td>
   		<td align="center">
    		#= name#
   		</td>
   		<td align="center">
    		#= number#
   		</td>
   		<td align="center">   			   
		    #if(status == 1){#
		    	Active
		    #}else{#
		    	Inactive
		    #}#
   		</td> 
   		<td>
   			<span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
   		</td> 		
   	</tr>
</script>
<script id="room-edit-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
            <input data-role="dropdownlist"
			   data-option-label="(--- Select ---)"       
               data-value-primitive="true"
               data-text-field="name"
               data-value-field="id"
               data-bind="
               		value: branch_id,
                    source: branchDS" />
        </td>
		<td align="center">
            <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
        </td>
		<td align="center">
            <input type="text" class="k-textbox" data-bind="value:number" name="abbr" required="required" validationMessage="required" />
        </td>
        <td align="center">
            <input data-role="dropdownlist"    
               data-value-primitive="true"
               data-text-field="name"
               data-value-field="id"
               data-bind="
               		value: status,
                    source: statusAR" />
        </td>
		<td align="center">
	        <div class="edit-buttons">
	            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
	            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
	        </div>
	    </td>
	</tr>
</script>
<script id="custType-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#= name#
   		</td>
   		<td align="center">
    		#= abbr#
   		</td>
   		<td align="center">
    		#if(is_company=="1"){#
    			Yes
    		#}else{#
    			No
    		#}#
   		</td>
   		<td align="center">   			   
		    <a class="btn-action glyphicons pencil btn-success k-edit-button" href="\\#"><i></i></a>
   		</td>   		
   	</tr>
</script>
<script id="customerSetting-edit-contact-type-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <input style="width: 100%" type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
            <span data-for="ProductName" class="k-invalid-msg"></span>
        </td>               
                   
        <td>
            <input  style="width: 100%" type="text" class="k-textbox" data-bind="value:abbr" name="abbr" required="required" validationMessage="required" />
            <span data-for="abbr" class="k-invalid-msg"></span>
        </td>               
                   
        <td>
            <select  style="width: 100%; " data-bind="value: is_company" >
                <option value="0">#: banhji.setting.lang.lang.not_a_company#</option>
                <option value="1">#: banhji.setting.lang.lang.it_is_a_company#</option>    
            </select>
        </td>              
 
    	<td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
        </td>
    </tr>  
</script>
<script id="blocSetting-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#= branch.name#
   		</td>
   		<td>
    		#= name#
   		</td>
   		<td align="center">
    		#= abbr#
   		</td>
   		<td align="center">   			   
		    <span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
    		|
    		<span style="cursor: pointer;" data-bind="click: viewPole"><i class="icon-view"></i> <span data-bind="text: lang.lang.view_item">View Item</span></span>
    		|
    		<span style="cursor: pointer;" data-bind="click: showPole"><i class="icon-plus icon-white"></i> <span data-bind="text: lang.lang.add_sub_location">Add Sub Location</span></span>
   		</td>   		
   	</tr>
</script>
<script id="bloc-edit-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
            <input data-role="dropdownlist"
    			   data-option-label="(--- Select ---)"       
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: branch.id,
                              source: licenseDS" />
        </td>
			<td align="center">
    
            <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
        </td>
			<td align="center">
            <input type="text" class="k-textbox" data-bind="value:abbr" name="abbr" required="required" validationMessage="required" />
            <span data-for="abbr" class="k-invalid-msg"></span>
        </td>
		<td align="center">
    
	        <div class="edit-buttons">
	            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
	            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
	        </div>
	    </td>
	</tr>
</script>
<script id="pole-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#= name#
   		</td>
   		<td align="center">   			   
		    <span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
    		|
    		<span style="cursor: pointer;" data-bind="click: viewBox"><i class="icon-view"></i> <span data-bind="text: lang.lang.view_item">View Item</span></span>
    		|
    		<span style="cursor: pointer;" data-bind="click: showBox"><i class="icon-plus icon-white"></i> <span data-bind="text: lang.lang.add_box">Add Box</span></span>
   		</td>   		
   	</tr>
</script>
<script id="pole-edit-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
            <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
        </td>
		<td align="center">
    
	        <div class="edit-buttons">
	            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
	            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
	        </div>
	    </td>
	</tr>
</script>
<script id="box-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#= name#
   		</td>
   		<td align="center">   			   
		    <span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span>
   		</td>   		
   	</tr>
</script>
<script id="box-edit-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
            <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
        </td>
		<td align="center">
    
	        <div class="edit-buttons">
	            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
	            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
	        </div>
	    </td>
	</tr>
</script>
<script id="item-list-tmpl" type="text/x-kendo-tmpl">
	<span style="width:55%; float: left">
		#=name#
	</span>
	<span style="width:15%; text-align: right; float: right; padding-right: 15px; text-transform: capitalize;">#=type#</span>
</script>
<script id="branch-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#= name#
   		</td>
   		<td align="center">
    		#= mobile#
   		</td>
   		<td align="center">
    		#= telephone#
   		</td>
   		<td align="center">   			   
		    <a class="btn-action glyphicons pencil btn-success" href="\\#/branch/#= id#"><i></i></a>
   		</td>   		
   	</tr>
</script>

<script id="plan" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2 data-bind="text: lang.lang.add_plan"></h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>
						<div class="row-fluid">
				        	<div id="plan" class="box-generic well" style="margin-bottom: 0;">
				        		<div class="row">
				        			<div class="col-xs-12 col-sm-1">
				        				<span data-bind="text: lang.lang.name">Name</span>
				        			</div>
				        			<div class="col-xs-12 col-sm-3">
				        				<input
											class="k-textbox k-invalid"
											data-required-msg="required" 
											style="width: 100%;" 
											placeholder="Name ..." 
											aria-invalid="true"
											data-bind="value: current.name, attr: {placeholder: lang.lang.name}" />
				        			</div>
				        			<div class="col-xs-12 col-sm-1">
				        				<span data-bind="text: lang.lang.code">Code</span>
				        			</div>
				        			<div class="col-xs-12 col-sm-3">
				        				<input 
											class="k-textbox k-invalid" 
											data-required-msg="required" 
											style="width: 100%;" 
											placeholder="Code ..." 
											aria-invalid="true"
											data-bind="value: current.code, attr: {placeholder: lang.lang.code}" />
				        			</div>
				        			<div class="col-xs-12 col-sm-1">
				        				<span data-bind="visible: currencyEnable"><span data-bind="text: lang.lang.currency">Currency</span></span>
				        			</div>
				        			<div class="col-xs-12 col-sm-3">
				        				<input data-role="dropdownlist"
						            	   style="width: 100%; height: 32px;" 
				            			   data-option-label="(--- Currency ---)"
				            			   data-auto-bind="false"
						                   data-value-primitive="true"
						                   data-text-field="code"
						                   data-value-field="id"
						                   data-bind="value: current.currency,
						                            source: currencyDS,
						                            enabled: currencyEnable,
						                            events: {change: currencyChange}"/>
				        			</div>
				        		</div>		
							</div>
						</div>

		                <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs" style="margin-top: 15px;">
		                	<thead>
		                		<tr>
		                			<th style="vertical-align: top;" ><span data-bind="text: lang.lang.item">Item</span></th>
		                			<th style="vertical-align: top;" ><span data-bind="text: lang.lang.type">Type</span></th>
		                			<th style="vertical-align: top;" ><span data-bind="text: lang.lang.name">Name</span></th>
		                			<th style="vertical-align: top;" ><span data-bind="text: lang.lang.rate">Rate</span></th>
		                			<th style="vertical-align: top;" ><span data-bind="text: lang.lang.action">Action</span></th>
		                		</tr>
		                	</thead>
		                	<tbody 
		                		data-bind="source: current.items" 
		                		data-auto-bind="true" 
		                		data-role="listview" 
		                		data-template="planItem-list-item">
		                	</tbody>
		                </table>

		                 <!-- Bottom part -->
			            <div class="row" style="margin-bottom: 15px;">
							<!-- Column -->
							<div class="col-sm-4">
								<button style="float: left" class="btn btn-inverse" data-bind="click: addItem">
									<i class="icon-plus icon-white"></i>
								</button>
							</div>
							<!-- Column END -->
						</div>

						<!-- Form actions -->
						<div class="box-generic bg-action-button">
							<div id="ntf1" data-role="notification"></div>
							<div class="row">
								<div class="span3">
								</div>
								<div class="col-sm-9" align="right">
									<span id="cancel" data-bind="click: cancel" class="btn-btn">
										<span data-bind="text: lang.lang.cancel">Cancel</span>
									</span>
									<span id="saveNew" class="btn-btn" data-bind="invisible: isEdit, click: save">
										<span data-bind="text: lang.lang.save">Save</span>
									</span>									
								</div>
							</div>
						</div>
						<!-- // Form actions END -->

					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="planItem-list-item" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<input id="ccbItem" name="ccbItem-#:uid#"
			   data-role="combobox"
			   data-template="item-list-tmpl"
               data-text-field="name"
               data-auto-bind="true"
               data-value-field="id"
               data-bind="value: item, 
               			  source: itemDS,
               			  events:{ change: onChange }"
               placeholder="Select ..." 
               required data-required-msg="required" style="width: 100%" />	
		</td>
		<td><span data-bind="text: type"></span></td>
		<td><span data-bind="text: name"></span></td>
		<td><input type="text" style="text-align:right;" class="k-textbox" data-bind="value: amount" /></td>
		<td align="center">
			<a class="btn-action glyphicons remove_2 btn-danger k-delete-button"><i></i></a>
		</td>
	</tr>
</script>
<script id="item-list-tmpl" type="text/x-kendo-tmpl">
	<span style="width:55%; float: left">
		#=name#
	</span>
	<span style="width:15%; text-align: right; float: right; padding-right: 15px; text-transform: capitalize;">#=type#</span>
</script>
<script id="Branch" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2>Branch</h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>
				        <!-- <div class="row">
				        	<div class="col-xs-12 col-sm-3">
								<div class="control-group">
									<label><span data-bind="text: lang.lang.type">Is Center</span> <span style="color:red">*</span></label>
			              			<br>
			              			<select data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="
					                   	source: selectMeterType,
					                   	value: obj.type"
					                   style="width: 100%; margin-bottom: 15px;" ></select>
								</div>			
							</div>
						</div> -->
				    	<div class="row-fluid">
				    		<div class="col-xs-12 col-sm-12 well">
								<div class="row">
									<div class="col-xs-12 col-sm-3" >	
										<!-- Group -->
										<div class="control-group">
											<label ><span>Name</span></label>
					              			<br>
					              			<input
					              				class="k-textbox" 
								            	data-bind="value: obj.name, attr: {placeholder: lang.lang.name}" 
							              		placeholder="Name" 
							              		style="width: 100%;" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="control-group">
											<label ><span data-bind="text: lang.lang.abbr">Abbr</span></label>
								            <input 
								            	class="k-textbox" 
								            	placeholder="Abbr" 
							            		data-bind="value: obj.abbr, attr: {placeholder: lang.lang.abbr}" 
							              		style="width: 100%;" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="control-group">
											<label ><span data-bind="text: lang.lang.representative">Representative</span></label>
											<input 
								            	class="k-textbox" 
								            	placeholder="Representative" 
							            		data-bind="value: obj.representative, attr: {placeholder: lang.lang.representative}"
							              		style="width: 100%;" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="control-group">
											<label ><span data-bind="text: lang.lang.segment">Segment</span></label>
											<select data-role="dropdownlist"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="
							                   	source: segmentItemDS,
							                   	value: obj.segment_item_id"
							                   style="width: 100%; margin-bottom: 15px;" ></select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-3">
										<div class="control-group">
											<label ><span data-bind="text: lang.lang.currency">Currency</span></label>
											<select data-role="dropdownlist"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="
							                   	source: selectCurrency,
							                   	value: obj.currency"
							                   style="width: 100%; margin-bottom: 15px;" ></select>
							    		</div>
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="control-group">
											<label ><span data-bind="text: lang.lang.status">Status</span> </label>
								            <select data-role="dropdownlist"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="
							                   	source: selectType,
							                   	value: obj.status"
							                   style="width: 100%;" ></select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="control-group">
											<label ><span data-bind="text: lang.lang.expire_date">Expire Date</span></label>
								            <input type="text" 
							                	style="width: 100%;" 
							                	data-role="datepicker"
							                	data-format="dd-MM-yyyy"
							                	placeholder="dd-mm-yyyy" 
									           	data-bind="value: 
									           		obj.expire_date,
									           		min: toDay" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-3">
										<div class="control-group">
											<label ><span data-bind="text: lang.lang.maximum_household">Maximum Household</span> <span style="color:red">*</span></label>
											<input 
								            	class="k-textbox" 
								            	placeholder="Maximum Houshold" 
							            		data-bind="value: obj.max_customer, attr: {placeholder: lang.lang.maximum_household}" 
							              		style="width: 100%;" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-12">
										<div class="control-group">
											<label ><span data-bind="text: lang.lang.description">Description</span></label>
											<textarea rows="3" class="k-textbox k-valid" 
												style="width:100%" 
												data-bind="value: obj.description, attr: {placeholder: lang.lang.description}" 
												placeholder="Description ..."></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row-fluid">
							<div class="box-generic" >
							    <div class="tabsbar tabsbar-1" style="background: #203864 !important; color: #fff;">
							        <ul class="row-fluid row-merge">
							            <li class="span2 glyphicons nameplate_alt active">
							            	<a href="#tab1" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.info">Info</span></a>
							            </li>
							            <li class="span2 glyphicons nameplate" style="width: 21%;">
							            	<a href="#tab2" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.terms_condition">Terms & Condition</span></a>
							            </li>
							            <li class="span2 glyphicons paperclip">
							            	<a href="#tab3" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.logo">LOGO</span></a>
							            </li>
							        </ul>
							    </div>
							    <div class="tab-content">
							        <div class="tab-pane active" id="tab1">
							        	<div class="row" style="margin-bottom: 15px;">
							        		<div class="col-xs-12 col-sm-3">
							        			<span data-bind="text: lang.lang.address">Address</span>
							        		</div>
							        		<div class="col-xs-12 col-sm-9">
							        			<input class="k-textbox" 
					            					data-bind="value: obj.address, attr: {placeholder: lang.lang.address}" 
													placeholder="Address ..." style="width: 100%;" />
							        		</div>
							        	</div>

							        	<div class="row" style="margin-bottom: 15px;">
							        		<div class="col-xs-12 col-sm-3">
							        			<span data-bind="text: lang.lang.districts">District</span>
							        		</div>
							        		<div class="col-xs-12 col-sm-3">
							        			<input 
													data-role="dropdownlist" 
													style="width: 100%;" 
													data-option-label="District ..." 
													data-auto-bind="true" 
													data-value-primitive="true" 
													data-text-field="name_local" 
													data-value-field="id" 
													data-bind="
														value: obj.district,
		                              					source: districtDS" style="width: 100%;">
							        			
							        		</div>
							        		<div class="col-xs-12 col-sm-3">
							        			<span data-bind="text: lang.lang.mobile">Mobile</span>
							        		</div>
							        		<div class="col-xs-12 col-sm-3">
							        			<input class="k-textbox" 
							              			data-bind="value: obj.mobile, attr: {placeholder: lang.lang.mobile}" 
							              			placeholder="Mobile ..." 
							              			style="width: 100%;" /></td>
							        		</div>
							        	</div>

							        	<div class="row" style="margin-bottom: 15px;">
							        		<div class="col-xs-12 col-sm-3">
							        			<span data-bind="text: lang.lang.provinces">Province</span>
							        		</div>
							        		<div class="col-xs-12 col-sm-3">
							        			<input 
													data-role="dropdownlist" 
													style="width: 100%;" 
													data-option-label="Province ..." 
													data-auto-bind="true" 
													data-value-primitive="true" 
													data-text-field="name" 
													data-value-field="id" 
													data-bind="
														value: obj.province,
		                              					source: provinceSelect,
		                              					events: {change: provinceChange}">
							        		</div>
							        		<div class="col-xs-12 col-sm-3">
							        			<span data-bind="text: lang.lang.telephone">Telephone</span>
							        		</div>
							        		<div class="col-xs-12 col-sm-3">
							        			<input class="k-textbox" 
								              		data-bind="value: obj.telephone, attr: {placeholder: lang.lang.telephone}" 
								              		placeholder="Telephone ..." style="width: 100%;" />
							        		</div>
							        	</div>

							        	<div class="row">
							        		<div class="col-xs-12 col-sm-3">
							        			<span data-bind="text: lang.lang.email">Email</span>
							        		</div>
							        		<div class="col-xs-12 col-sm-3">
							        			<input class="k-textbox" 
							              			data-bind="value: obj.email, attr: {placeholder: lang.lang.email}" 
							              			placeholder="Email ..." style="width: 100%;" />
							              	</div>
							        	</div>
						        	</div>
							        <div class="tab-pane" id="tab2">
							        	<div class="row-fluid">
							        		<div class="controls">
												<textarea 
													class="span12" 
													placeholder="Terms & Condition..." 
							                      	data-bind="value: obj.term_of_condition"
							                      	style="height: 200px;">
								                </textarea>
					                      	</div>			        		
							            </div>
						        	</div>
							        <div class="tab-pane" id="tab3">
							        	<p><span >File Type</span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>	
							        	<img data-bind="attr: { src: obj.image_url, alt: obj.name, title: obj.name }" width="120px" style="margin-bottom: 15px; border: 1px solid #ddd;">
							            <input id="files" name="files"
						                   type="file"
						                   data-role="upload"
						                   data-show-file-list="false"
						                   data-bind="events: { 
				                   				select: onSelect
						                   }">
						        	</div>
							    </div>
							</div>
						</div>
						<div class="box-generic bg-action-button">
							<div id="ntf1" data-role="notification"></div>
							<div class="row">
								<div class="span3">
								</div>
								<div class="col-sm-9" align="right">
									<span id="cancel" data-bind="click: cancel" class="btn-btn">
										<span data-bind="text: lang.lang.cancel">Cancel</span>
									</span>
									<span id="saveNew" class="btn-btn" data-bind="invisible: isEdit, click: save">
										<span data-bind="text: lang.lang.save">Save</span>
									</span>
								</div>
							</div>
						</div>
					</div>		
				</div>						
			</div>
		</div>
	</div>
</script>
<!--End Setting-->

<!-- Water Center -->
<script id="waterCenter" type="text/x-kendo-template">	
	<div class="container">
		<div class="row" style="margin-top: 30px;">
			<div class="col-xs-12 col-sm-4 col-md-3" >
				<div class="listWrapper" >
					<div class="innerAll" style="height: 55px;">
						<div class="widget-search separator bottom" style="padding: 0;">
							<a class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></a>
							<div class="overflow-hidden">
								<input style="line-height: 26px;" type="search" placeholder="Number or Name..." data-bind="value: searchText, events:{change: search}">
							</div>
						</div>
					</div>
					<span class="results"><span data-bind="text: contactDS.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>
					<div class="table table-condensed" id="listContact" style="height: 580px; margin-bottom: 0;"
						 data-role="grid"
						 data-bind="source: contactDS"
						 data-row-template="waterCenter-customer-list-tmpl"
						 data-columns="[{title: 'Properties'}]"
						 data-selectable=true
						 data-height="475"
						 data-scrollable="{virtual: true}"></div>
				</div>	
			</div>
			<div class="col-xs-12 col-sm-8 col-md-9 ">
				<div class="listWrapper" >
					<div class="row" style="margin-bottom: 15px;">
						<div class="col-xs-12 col-sm-6" style="margin-bottom: 15px;">
							<div class="widget widget-4 widget-tabs-icons-only margin-bottom-none">
							    <div class="widget-head">
							        <ul class="pull-right">
							        	<li style="font-size: large; color: black; font-weight: bold;">							            	
							            	<span data-bind="text: obj.name"></span>
							            </li>
							            <li class="glyphicons text_bigger dashboard active"><span data-toggle="tab" data-target="#tab1"><i></i></span>
							            </li>		            
							            <li class="glyphicons circle_info"><span data-toggle="tab" data-target="#tab2"><i></i></span>
							            </li>							            
							            <li class="glyphicons pen"><span data-toggle="tab" data-target="#tab3"><i></i></span>
							            </li>
							            <li class="glyphicons paperclip"><span data-toggle="tab" data-target="#tab4"><i></i></span>
							            </li>	         
							        </ul>
							        <div class="clearfix"></div>
							    </div>
							    <div class="widget-body">
							        <div class="tab-content">
							            <div id="tab1" class="tab-pane active">
							            	<a class="btn btn-block btn-inverse" style="margin-bottom: 5px;" data-bind="click: goMeter, visible: meter_visible, text: lang.lang.add_meter">Add Meter</a>
							            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs" style="position: relative;clear:both;">
										        <thead>
										            <tr>			                
										                <th style="vertical-align: top;"><span data-bind="text: lang.lang.meter_no">Meter No.</span></th>
										                <th style="vertical-align: top;"><span data-bind="text: lang.lang.status">Status</span></th>
										                <th style="vertical-align: top;"><span data-bind="text: lang.lang.active">Action</span></th>            
										            </tr> 
										        </thead>
										        <tbody data-role="listview" 
									        		data-template="waterCenter-meter-list-tmpl" 
									        		data-auto-bind="false"
									        		data-selectable="single"
									        		data-bind="source: meterDS"></tbody>
										    </table>
										    <!-- <a class="btn btn-block btn-inverse" style="margin-bottom: 5px;position: relative;clear:both;background: #609450!important;" data-bind="click: groupMeter, visible: haveGroup">Group Meter</a> -->
							            </div>
							            <div id="tab2" class="tab-pane">
							            	<div class="row-fluid">
							            		<div class="accounCetner-textedit">
									            	<table width="100%">
														<tr>
															<td width="40%"><span data-bind="text: lang.lang.customer_type"></span></td>
															<td width="60%"><span data-bind="text: lang.lang.customer_type"></span></td>
														</tr>
														<tr>
															<td><span data-bind="text: lang.lang.number"></span></td>
															<td>
																<span class="strong" data-bind="text: obj.abbr"></span>
																<span class="strong" data-bind="text: obj.number"></span>
															</td>
														</tr>
														<tr>
															<td><span data-bind="text: lang.lang.name"></span></td>
															<td>
																<span data-bind="text: obj.name"></span>
															</td>
														</tr>
														<tr>
															<td><span data-bind="text: lang.lang.location"></span></td>
															<td>
																<span data-bind="text: obj.address"></span>
															</td>
														</tr>								
														<tr>
															<td><span data-bind="text: lang.lang.phone"></span></td>
															<td>
																<span data-bind="text: obj.phone"></span>
															</td>
														</tr>
														<tr>
															<td><span data-bind="text: lang.lang.currency"></span></td>
															<td>										
																<span data-bind="text: obj.currency.code"></span>
															</td>
														</tr>
													</table>
													<span style="margin-bottom: 0;" class="btn btn-primary btn-icon glyphicons edit pull-right" data-bind="click: goEdit"><i></i><span data-bind="text: lang.lang.view_edit_profile"></span></span>
												</div>
											</div>
							            </div>
							            <div id="tab3" class="tab-pane">
										    <div>
												<input type="text" class="k-textbox" 
													data-bind="value: note, events:{change:saveNoteEnter}" 
													placeholder="Add memo ..." 
													style="width: 100%;" >
												<span style="margin-top: 8px;" class="btn btn-primary" data-bind="click: saveNote"><span data-bind="text: lang.lang.add"></span></span>
											</div>
											<br>
											<div class="table table-condensed" style="height: 100; margin-bottom: 0"
												 data-role="grid"
												 data-auto-bind="false"						 
												 data-bind="source: noteDS"
												 data-row-template="waterCenter-note-tmpl"
												 data-columns="[{title: ''}]"
												 data-height="100"
												 data-scrollable="{virtual: true}"></div>		
							            </div>
								        <div id="tab4" class="tab-pane">
								            <p><span data-bind="text: lang.lang.file_type"></span> [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>
								            <input id="files" name="files"
							                   type="file"
							                   data-role="upload"
							                   data-show-file-list="false"
							                   data-bind="events: { 
					                   				select: onSelect
							                   }">
								            <table class="table table-bordered">
										        <thead>
										            <tr>			                
										                <th style="vertical-align: top;"><span data-bind="text: lang.lang.file_name"></span></th>
										                <th style="vertical-align: top;"><span data-bind="text: lang.lang.description"></span></th>
										                <th style="vertical-align: top;"><span data-bind="text: lang.lang.date"></span></th>
										                <th style="vertical-align: top;"></th>                			                
										            </tr> 
										        </thead>
										        <tbody data-role="listview" 
										        		data-template="attachment-list-tmpl" 
										        		data-auto-bind="false"
										        		data-bind="source: attachmentDS"></tbody>			        
										    </table>
										    <span class="btn btn-icon btn-success glyphicons ok_2" data-bind="click: uploadFile" style="color: #fff; padding: 5px 38px; text-align: left; width: 98px !important; display: inline-block; margin-top: 10px;"><i></i> <span data-bind="text: lang.lang.save"></span></span>
								        </div>
							        </div>
							    </div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6">
							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<div style="background: #203864;" class="widget-stats widget-stats-primary widget-stats-5" data-bind="click: loadBalance">
										<span class="glyphicons coins" style="position: absolute; top: 5px; left: 5px;"><i></i></span>
										<span class="txt" style="float: left;"><span data-bind="text: lang.lang.balance"></span><span data-bind="text: balance" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<a href="#/customer_deposit_report">
										<div style="background: #0077c5;" class="widget-stats widget-stats-inverse widget-stats-5">
											<span class="glyphicons briefcase" style="position: absolute; top: 5px; left: 5px;"><i></i></span>
											<span class="txt" style="float: left;"><span data-bind="text: lang.lang.deposit"></span><span data-bind="text: deposit" style="font-size:medium;"></span></span>
											<div class="clearfix"></div>
										</div>
									</a>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div style="background: #21abf6; padding: 10px;" class="widget-stats widget-stats-info widget-stats-5" data-bind="click: loadBalance">
										<span class="glyphicons circle_exclamation_mark " style="position: absolute; top: 5px; left: 5px;"><i></i></span>
										<span style="padding-left: 50px; float: left;" class="txt"><span data-bind="text: outInvoice"></span> <span data-bind="text: lang.lang.open_invoice"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div style="padding:10px;" class="widget-stats widget-stats-default widget-stats-5" data-bind="click: loadOverInvoice">
										<span class="glyphicons turtle" style="position: absolute; top: 5px; left: 5px;"><i></i></span>
										<span style="padding-left: 50px; float: left;" class="txt"><span data-bind="text: overInvoice"></span> <span data-bind="text: lang.lang.over_due"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>														
						</div>
					</div>
					<div class="row-fluid">
						<div style="margin-bottom: 0; padding-bottom: 0;">
						    <div class="tabsbar tabsbar-1">
						        <ul class="row-fluid row-merge">	
						        	<li class="span2 glyphicons charts active">
						            	<a id="tabms" href="#tab-1" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.monthly_sale">Monthly Sale</span></a>
						            </li>					            
						            <li class="span2 glyphicons usd" style="width: 23%;">
						            	<a id="tabTxn" href="#tab-2" data-toggle="tab" data-bind="click: loadTransaction"><i></i> <span data-bind="text: lang.lang.utility_sale">Utility Sale</span></a>
						            </li>								            
						            <li class="span2 glyphicons qrcode" style="width: 21%;">
						            	<a href="#tab-3" data-toggle="tab" data-bind="click: loadReading"><i></i> <span data-bind="text: lang.lang.reading">Reading</span></a>
						            </li>
						            <li class="span2 glyphicons show_lines" style="min-width: 160px;">
						            	<a href="#tab-4" data-toggle="tab" data-bind="click: loadInstallment"><i></i> <span data-bind="text: lang.lang.installment_schedule">Installment Schedule</span></a>
						            </li>           
						        </ul>
						    </div>
						    <div class="tab-content cover-tab-content">
						        <div class="tab-pane active" id="tab-1">
							        <div data-role="chart"
						                 data-legend="{ position: 'top' }"
						                 data-series-defaults="{ type: 'column' }"
						                 data-tooltip='{
						                    visible: true,
						                    format: "{0}%",
						                    template: "#= series.name #: #= kendo.toString(value) #"
						                 }'                 
						                 data-series="
						                 	[
			                                 	{ field: 'usage', name: 'Usage', categoryField:'month', color: '#236DA4', overlay:{ gradient: 'none'} }
			                             	]"
						                 data-auto-bind="false"
						                 data-bind="source: graphDS"
						                 style="height: 250px;"></div> 
					        	</div>
						        <div class="tab-pane" id="tab-2">
						        	<div class="row">
						        		<div class="col-xs-12 col-sm-3">
											<input data-role="dropdownlist"
												   class="sorter "
										           data-value-primitive="true"
										           data-text-field="text"
										           data-value-field="value"
										           data-bind="value: sorter,
										                      source: sortList,
										                      events: { change: sorterChanges }" style="background: none; width: 100%;" />
										</div>
										<div class="col-xs-12 col-sm-3">
											<input data-role="datepicker"
												   class="sdate "
												   data-format="dd-MM-yyyy"
										           data-bind="value: sdate,
										           			  max: edate"
										           placeholder="From ..." style="background: none; width: 100%;" />
										</div>
										<div class="col-xs-12 col-sm-3">
										    <input data-role="datepicker"
										    	   class="edate "
										    	   data-format="dd-MM-yyyy"
										           data-bind="value: edate,
										                      min: sdate"
										           placeholder="To ..." style="background: none; width: 100%;" />

										</div>
										<div class="col-xs-12 col-sm-3">
									  		<button type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
										</div>
									</div>
									<br>
						        	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
							        	<thead>
								            <tr>			                
								                <th style="vertical-align: top;"><span data-bind="text: lang.lang.month">Month</span></th>
								                <th style="vertical-align: top;"><span data-bind="text: lang.lang.meter_number">Meter Number</span></th>
								                <th style="vertical-align: top;"><span data-bind="text: lang.lang.amount">Amount</span></th>
								                <th style="vertical-align: top;"><span data-bind="text: lang.lang.status">Status</span></th>
								                <th style="vertical-align: top;"><span data-bind="text: lang.lang.action">Action</span></th>     
								            </tr> 
								        </thead>
								        <tbody data-role="listview"
								        		data-template="waterCenter-water-sale-list-template"
								        		data-auto-bind=false 
								        		data-bind="source: invoiceVM.dataSource">
								        </tbody>
								    </table>
								    <div id="pager" class="k-pager-wrap"
								        	 data-role="pager"
											 data-auto-bind="false"
										     data-bind="source: invoiceVM.dataSource"></div>
					        	</div>
						        <div class="tab-pane" id="tab-3">
						        	<h2 style="margin-left: 0;" data-bind="text: lang.lang.add_single_reading">Add Single Reading</h2>
						        	<div class="row">
					        			<div class="col-xs-12 col-sm-3">
											<div class="control-group">								
												<label ><span data-bind="text: lang.lang.month_of" >Month Of</span></label>
									            <input type="text" 
								                	style="width: 100%;" 
								                	data-role="datepicker"
								                	data-format="MM-yyyy"
								                	data-parse-formats="yyyy-MM-dd HH:mm:ss"
								                	data-start="year" 
									  				data-depth="year" 
								                	placeholder="Moth of ..." 
										           	data-bind="value: readingVM.monthOfSR, min: miniMonthofS" />
											</div>
										</div>										
										<div class="col-xs-12 col-sm-3">
											<div class="control-group">								
												<label ><span data-bind="text: lang.lang.meter_number">Meter Number</span></label>
								        		<p class="k-input k-textbox" 
								        			style="width:100%; border:1px solid #ccc; padding: 5px;"
								        			data-bind="text: readingVM.NumberSR">
								        		</p>
								        	</div>
								        </div>
								        <div class="col-xs-12 col-sm-3">
											<div class="control-group">								
												<label ><span data-bind="text: lang.lang.previous">Previous</span></label>
								        		<p class="k-input k-textbox" 
								        			style="width:100%; border:1px solid #ccc; padding: 5px;"
								        			data-bind="text: readingVM.previousSR" >
								        		</p>
								        	</div>
								       	</div>
								       	<div class="col-xs-12 col-sm-3">
											<div class="control-group">								
												<label ><span data-bind="text: lang.lang.current">Current</span></label>
								        		<input type="text" 
								        			class="k-input k-textbox" 
								        			placeholder="Current" 
								        			style="width:100%;border:1px solid #ccc;"
								        			data-bind="value: readingVM.currentSR" />
								        	</div>
								        </div>
								    </div>
								    <div class="row" style="margin-bottom: 15px;">   
								        <div class="col-xs-12 col-sm-3">
											<div class="control-group">	
												<label ><span data-bind="text: lang.lang.to_date">To Date</span></label>
									            <input type="text" 
								                	style="width: 100%;" 
								                	data-role="datepicker"
								                	placeholder="To Date ..." 
								                	data-parse-formats="yyyy-MM-dd HH:mm:ss"
										           	data-bind="value: readingVM.toDateSR, min: miniMonthofS" />
											</div>
								        </div>
								        <div class="col-xs-12 col-sm-3">
								        	<label ><span data-bind="text: lang.lang.new_round">New Round</span></label>
										    <input 
					              				data-role="dropdownlist"
							            		data-text-field="name"
				           						data-value-field="id"
				           						data-value-primitive="true" 
							            		data-bind="
							            			source: roundDS, 
							            			value: readingVM.newRound"
							            		style="width: 100%;" />
								        </div>
							        	<div class="col-xs-12 col-sm-3">
							        		<br>
							        		<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="click: readingVM.addSingleReading"><i></i> <span data-bind="text: lang.lang.add">Add</span></span>
							        	</div>
						        	</div>
						        	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
							        	<thead>
								            <tr>			                
								                <th style="vertical-align: top;"><span data-bind="text: lang.lang.month">Month</span></th>
								                <th style="vertical-align: top;"><span data-bind="text: lang.lang.meter_number">Meter Number</span></th>
								                <th style="vertical-align: top;"><span data-bind="text: lang.lang.previous">Previous</span></th>
								                <th style="vertical-align: top;"><span data-bind="text: lang.lang.current">Current</span></th>
								                <th style="vertical-align: top;">m<sup>3</sup></th> 					                
								                <th style="vertical-align: top;"><span data-bind="text: lang.lang.action">Action</span></th>     
								            </tr> 
								        </thead>
								        <tbody data-role="listview"
								        		data-template="waterCenter-meter-reading-list-tmpl" 
								        		data-edit-template="waterCenter-meter-reading-list-edit-tmpl"
								        		data-auto-bind="false" 
								        		data-bind="source: readingVM.dataSource">
								        </tbody>
								    </table>

								    <div id="pager" class="k-pager-wrap"
								        	 data-role="pager"
											 data-auto-bind="false"
										     data-bind="source: readingVM.dataSource"></div>

					        	</div>
						        <div class="tab-pane" id="tab-4">
						        	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
								        <thead>
								            <tr>
								                <th style="vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
								                <th style="vertical-align: top;"><span data-bind="text: lang.lang.installment">Installment</span></th>
								                <th style="vertical-align: top;"><span data-bind="text: lang.lang.status">Status</span></th>
								            </tr> 
								        </thead>
								        <tbody 
							        		data-role="listview"
							        		data-auto-bind=false 
							        		data-bind="source: installmentVM.dataSource" 
							        		data-template="waterCenter-installment-list-template">
								        </tbody>
								    </table>
					        	</div>
						    </div>
						</div>
					</div>
					<div id="ntf1" data-role="notification"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</script>
<script id="waterCenter-customer-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td style="border-bottom: 1px solid \#ddd;">
			<div class="media-body strong" style="position: relative;">				
				<span>#=abbr##=code#</span>
				<span>
					#=name# 	
				</span>
			</div>
		</td>
	</tr>
</script>
<script id="waterCenter-note-tmpl" type="text/x-kendo-template">
	<tr>
		<td>			
			<blockquote>
				<small class="author">
					<span class="strong">#=creator#</span> :
					<cite>#=kendo.toString(new Date(noted_date), "g")#</cite>
				</small>					
				<p>#=note#</p>
			</blockquote>				
		</td>
	</tr>	
</script>
<script id="waterCenter-transaction-tmpl" type="text/x-kendo-tmpl">
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
                data-template="Transaction-tmpl"
                data-bind="source: transactionDS"
                data-no-records="true" >
        </tbody>
	</table>
	<div id="pager" class="k-pager-wrap"
		 data-auto-bind="false"
	     data-role="pager" data-bind="source: transactionDS"></div>	
</script>
<script id="waterCenter-meter-list-tmpl" type="text/x-kendo-tmpl">
	<tr>
		<td class="mm" data-bind="click: onSelectedMeter" style="padding: 5px !important;">#= meter_number#</td>
		<td style="text-align:center;">
			# if(type == "w"){#
				<span style="cursor: pointer; margin-top: 3px;" title="Water" class="btn-action glyphicons tint btn-success"><i></i></span>
			# }else{#
				<span style="cursor: pointer;background-color: \\#a22314;border-color: \\#a22314;" title="Electircity" class="btn-action glyphicons electricity btn-danger"><i></i></span>
			# } #
		</td>
		<td style="text-align: right;">
			# if(status == 2){ # 
				<span style="" title="Group" class="btn-action glyphicons settings btn-danger"><i></i></span>
			# } #
			# if(activated != "1") { #
			<a style="background: \#1f4774; padding:4px; margin-right: 3px; vertical-align: middle;" href="\#/activate_meter/#= id#" class="btn-action btn-success" data-bind="text: lang.lang.activate">Activate</a>
			# } else { #
				# if(type == "e"){ #
					# if(group != 0){#
						<span style="background-color: \\rgb(96, 148, 80) !important;border-color: \\rgb(96, 148, 80) !important;" title="Group" class="btn-action glyphicons share_alt btn-danger"><i></i></span>
					# }else{ #
						<!--input type="checkbox" name="items" data-bind="checked: groupItem" value="#= id#"-->
					# } #
				# } #
			# } #
			# if(reaktive == 0){#
				<a style="border:none;" href="\#/meter/#= id #" class="btn-action glyphicons pencil btn-danger widget-stats widget-stats-info"><i></i></span>
			#}#
		</td>
	</tr>
</script>
<script id="waterCenter-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>    	  	
    	<td>#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
    	<td>#=type#</td>
        <!-- Reference -->
        <td>
        	#if(type=="Customer_Deposit" && amount<0){#			
				<a href="\#/#=reference[0].type.toLowerCase()#/#=reference[0].id#"><i></i> #=number#</a>			
			#}else{#
				<a href="\#/#=type.toLowerCase()#/#=id#"><i></i> #=number#</a>
			#}#        	
        </td>
        <!-- Amount -->
    	<td class="right">
    		#if(type=="GDN"){#
    			#=kendo.toString(amount, "n0")#
    		#}else{#
    			#=kendo.toString(amount-deposit, locale=="km-KH"?"c0":"c", locale)#
    		#}#
    	</td>
    	<!-- Status -->
    	<td align="center">
    		#if(type==="Quote"){#       		
				#if(status==="0"){#
        			Open
        		#}else{#
        			Used        			
        		#}#
        	#}else if(type==="Sale_Order"){#
        		#if(status==="0"){#
        			Open
        		#}else{#
        			Done        			
        		#}#
        	#}else if(type==="GDN"){#
        		Delivered
        	#}else if(type==="Invoice"){#
        		#if(status==="0" || status==="2") {#
        			# var date = new Date(), dueDate = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
					#if(dueDate < toDay) {#
						Over Due #:Math.floor((toDay - dueDate)/(1000*60*60*24))# days
					#} else {#
						#:Math.floor((dueDate - toDay)/(1000*60*60*24))# days to pay
					#}#
				#} else {#
					Paid
				#}#        	
        	#}#        				
		</td>
		<!-- Actions -->
    	<td align="center">
			#if(type==="Invoice"){#
				#if(status==="0" || status==="2") {#
        			<a data-bind="click: payInvoice"><i></i> <span data-bind="text: lang.lang.receive_payment"></span></a>
        		#}#
        	#}#
		</td>     	
    </tr>
</script>
<script id="waterCenter-water-sale-list-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
			#:kendo.toString(new Date(month_of), "MMMM")#
		</td>
		<td>
			#=meter.meter_number#	
		</td>
		<td align="right">
			#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#
		</td>
		<!-- Status -->
    	<td align="center">
    		#if(type=="Utility_Invoice"){#
        		#if(status=="0" || status=="2") {#
        			# var date = new Date(), dueDate = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
					#if(dueDate < toDay) {#
						Over Due #:Math.floor((toDay - dueDate)/(1000*60*60*24))# days
					#} else {#
						#:Math.floor((dueDate - toDay)/(1000*60*60*24))# days to pay
					#}#
				#} else if(status=="1") {#
					Paid
				#} else if(status=="3") {#
					Returned
				#}#        	
        	#}#        				
		</td>
		<!-- Actions -->
    	<td align="center">
			#if(type=="Utility_Invoice"){#
				#if(status=="0"){#
					<a data-bind="click: viewInv"><i></i> <span style="border-radius: 3px;background: green;color:\\#fff;padding: 5px 10px;" data-bind="text: lang.lang.print"></span></a>
				#}#
				#if(status=="0" || status=="2") {#
        			<!-- <a data-bind="click: payInvoice"><i></i> <span data-bind="text: lang.lang.receive_payment"></span></a> -->
        		#}#
        	#}#
		</td>
	</tr>
</script>
<script id="waterCenter-installment-list-template" type="text/x-kendo-tmpl">
	# for(var i= 0; i < schedule.length; i++) {#
	<tr>
		<td valign="top">
			#=schedule[i].date#
		</td>
		<td>#=kendo.toString(schedule[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
		<td>
			# schedule[i].invoiced=="0" ? 'Paid': 'Open'# 
		</td>
	</tr>
	#}#
</script>
<script id="waterCenter-meter-reading-list-tmpl" type="text/x-kendo-tmpl">
	kendo.culture("km-KH");
	<tr>
		<td>
			#:kendo.toString(new Date(month_of), "MMMM")#
		</td>
		<td>
			#=meter_number#
		</td>
		<td align="center">
			#=previous#
		</td>
		<td align="center">
			#=current#
		</td>
		<td align="center">
			#=usage#
		</td>
		<td align="center">
			# if(!invoiced || banhji.waterCenter.readingVM.dataSource.indexOf(data) == 0) {#
				<a class="btn-action glyphicons pencil btn-success k-edit-button" ><i></i></a>
			#}#
		</td>
	</tr>
</script>
<script id="waterCenter-meter-reading-list-edit-tmpl" type="text/x-kendo-tmpl">
	kendo.culture("km-KH");
	<tr>
		<td>
			#:kendo.toString(new Date(month_of), "D")#
		</td>
		<td>
			#=meter_number#
		</td>
		<td>
			#=previous#
		</td>
		<td>
			<input type="text" class="k-input" data-bind="value: current">
		</td>
		<td>
			#:consumption = current - previous #
		</td>
		<td>
			<div class="edit-buttons">
	            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
	            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
	        </div>
		</td>
	</tr>
</script>
<!-- Water Center End -->

<!-- Customer -->
<script id="customer-type-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer_setting">+ Add New Customer Type</a>
    </strong>
</script>
<script id="customer-payment-method-header-tmpl" type="text/x-kendo-tmpl">
	<strong>
    	<a href="\#/customer_setting">+ Add New Payment Method</a>
    </strong>	
</script>
<script id="customer-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer_setting">+ Add New Term</a>
    </strong>
</script>
<script id="account-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/account">+ Add New Account</a>
    </strong>
</script>
<script id="account-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=number#
	</span>
	-
	<span>#=name#</span>
</script>
<script id="tax-header-tmpl" type="text/x-kendo-tmpl">
	<strong>
    	<a href="\#/tax">+ Add New Tax</a>
    </strong>	
</script>
<script id="currency-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=code# - #=country#
	</span>
</script>
<!-- End Customer -->
<!-- Property -->
<script id="property" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2 data-bind="text: lang.lang.add_property">Property</h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>
						<div class="well" style="overflow: hidden; margin-bottom: 0;float: left;">
							<div class="row">
					        	<div class="col-sm-4 ">
					        		<div class="listWrapper">
										<div class="innerAll" style="height: 55px;padding:0;">
											<div class="widget-search separator bottom">
												<a class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></a>
												<div class="overflow-hidden">
													<input type="search" style="border: 1px solid #ccc;height: 34px;" placeholder="Number or Name..." data-bind="value: searchText, events:{change: search}">
												</div>
											</div>
										</div>
										<div class="table table-condensed" id="listContact" style="height: 580px; margin-bottom: 0;"
											 data-role="grid"
											 data-bind="source: contactDS"
											 data-row-template="waterCenter-customer-list-tmpl"
											 data-columns="[{title: 'Customers'}]"
											 data-selectable="true"
											 data-height="400"
											 data-scrollable="{virtual: true}"></div>
									</div>
								</div>
					        	<div class="col-sm-8">
					        		<div class="row" style="clear: both;" data-bind="visible: haveContact">
					        			<div class="col-xs-12 col-sm-2">
							            	<input 
							            		data-bind="value: pAbbr, 
							            			attr: {placeholder: lang.lang.abbr}" type="text"
							            		style="height: 32px; padding: 5px; width: 100%"  class="span2 k-textbox k-invalid" />
							           	</div>
							           	<div class="col-xs-12 col-sm-2">
							            	<input 
							            		data-bind="value: pCode, 
							            			attr: {placeholder: lang.lang.code}" type="text"
							            		style="height: 32px; padding: 5px; width: 100%"  class="span2 k-textbox k-invalid" />
							            </div>
							           	<div class="col-xs-12 col-sm-3">         	
							            	<input 
							            		data-bind="value: pName, 
							            			attr: {placeholder: lang.lang.name}" type="text"
							            		style="height: 32px; padding: 5px; width: 100%"  class="span2 k-textbox k-invalid" />
										</div>
							           	<div class="col-xs-12 col-sm-3">     	
							            	<input 
							            		data-bind="value: pAddress, 
							            			attr: {placeholder: lang.lang.address}" type="text"
							            		style="height: 32px; padding: 5px; width: 100%"  class="span2 k-textbox k-invalid" />
							            </div>
							           	<div class="col-xs-12 col-sm-2">							            	
							            	<a class="btn-icon btn-primary glyphicons circle_plus cutype-icon" style="width: 80px; padding: 5px 7px 5px 35px !important; text-align: left;" data-bind="click: addProperty"><i></i><span data-bind="text: lang.lang.add">Add</span></a>
						            	</div>
						            </div>
						        	<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
						        		<thead>
							        		<tr>
								        		<th style="vertical-align: top;" data-bind="text: lang.lang.abbr">ABBR</th>
								        		<th style="vertical-align: top;" data-bind="text: lang.lang.code">Code</th>
								        		<th style="vertical-align: top;" data-bind="text: lang.lang.name">Name</th>
								        		<th style="vertical-align: top;" data-bind="text: lang.lang.address">Address</th>
								        		<th style="vertical-align: top;" data-bind="text: lang.lang.action">Action</th>
							        		</tr>
							        	</thead>
							        	<tbody 
							        		data-role="listview" 
							        		data-bind="source: dataSource" 
							        		data-template="property-template-list" 
							        		data-edit-template="property-edit-template-list"
							        		data-auto-bind="false">
							        	</tbody>
						        	</table>
						        </div>
						    </div>
				        </div>
					    <br>
					    <!-- Form actions -->
						<div class="box-generic bg-action-button">
							<div id="ntf1" data-role="notification"></div>
							<div class="row">
								<div class="col-sm-12" align="right">
									<span id="cancel" data-bind="click: cancel" class="btn-btn"><span data-bind="text: lang.lang.cancel">Cancel </span></span>
								</div>
							</div>
						</div>
						<!-- // Form actions END -->
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customer-template-list" type="text/x-kendo-template">
	<li>#=abbr#-#=number# #=name#</li>
</script>
<script id="property-template-list" type="text/x-kendo-template">
	<tr>
		<td>#=abbr#</td>
		<td>#=code#</td>
		<td>#=name#</td>
		<td>#=address#</td>
		<td align="center"><span style="cursor: pointer;" class="k-edit-button"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit">Edit</span></span></td>
	</tr>
</script>
<script id="property-edit-template-list" type="text/x-kendo-template">
	<tr>
		<td>
			<input type="text" style="width:70px" class="k-textbox" data-bind="value:abbr" name="ProductName" required="required" validationMessage="required" />
		</td>
		<td>
			<input type="text"  style="width:100px" class="k-textbox" data-bind="value:code" name="ProductName" required="required" validationMessage="required" />
		</td>
		<td>
			<input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
		</td>
		<td>
			<input type="text"  style="width:100px" class="k-textbox" data-bind="value:address" name="ProductName" required="required" validationMessage="required" />
		</td>
		<td align="center">
	        <div class="edit-buttons">
	            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
	            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
	        </div>
	    </td>
	</tr>
</script>
<!-- End Property -->
<!--  Meter  -->
<script id="waterAddMeter" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2 data-bind="text: lang.lang.meter" >Meter</h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>
				    	<div class="row-fluid">
				    		<div class="col-xs-12 col-sm-6 well">
				    			<div class="row">
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">
											<label><span data-bind="text: lang.lang.license">Type</span> <span style="color:red">*</span></label>			
					              			<br>
					              			<select data-role="dropdownlist"
							                   data-value-primitive="true"
							                   data-option-label="(--- Select ---)"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="
							                   	source: licenseDS,
							                   	value: obj.branch_id,
							                   	events: {change: licenseChange}"
							                   style="width: 100%;" ></select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">
											<label><span data-bind="text: lang.lang.multiplier">Multiplier</span></label>
					              			<br>
					              			<input class="k-textbox"
						              			data-bind="value: obj.multiplier"
								                placeholder="eg. 1" required data-required-msg="required"
								                style="width: 100%" />
										</div>
									</div>
								</div>								
								<div class="row">
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">
											<label><span data-bind="text: lang.lang.meter_number">Meter Code</span> <span style="color:red">*</span></label>			
					              			<br>
					              			<input class="k-textbox"
						              			data-bind="value: obj.meter_number, events: {change: meterNumberChange}"
								                placeholder="eg. 1" required data-required-msg="required"
								                style="width: 100%" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">
											<label for="txtAbbr"><span data-bind="text: lang.lang.meter_no_digit">Meter No. Digit</span> <span style="color:red">*</span></label>
					              			<br>
						              		<input class="k-textbox"					    
						              			data-bind="value: obj.number_digit"
								                placeholder="eg. 1" required data-required-msg="required"
								                style="width: 100%" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">							
											<label for="txtAbbr"><span data-bind="text: lang.lang.plan">Plan</span> <span style="color:red">*</span></label>	
					              			<br>
						              		<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"	      
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="
							                   		source: planDS, 
							                   		value: obj.plan_id,
							                   		events: {change: planChange}"
							                   style="width: 100%;" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<!-- Group -->
										<div class="control-group">							
											<label for="txtAbbr"><span data-bind="text: lang.lang.starting_meter_no">Starting Meter No.</span></label>
					              			<br>
						              		<input class="k-textbox" data-bind="value: obj.starting_no" placeholder="e.g. 0" style="width: 100%;" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">
											<label for="customerStatus"><span data-bind="text: lang.lang.status"></span> <span style="color:red">*</span></label>
								            <select data-role="dropdownlist"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="
							                   	source: selectType,
							                   	value: obj.status"
							                   style="width: 100%; " ></select>
										</div>
										<div class="control-group">	
											<label for="txtAbbr"><span data-bind="text: lang.lang.meter_order"></span></label>			
					              			<br>
						              		<input class="k-textbox"					    
						              			data-bind="value: meterOrder"
								                placeholder="eg. 1" required data-required-msg="required"
								                style="width: 100%" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">
											<label for="registeredDate"><span data-bind="text: lang.lang.register_date"></span> <span style="color:red">*</span></label>
								            <input
							            		data-role="datepicker"
				            					data-bind="value: obj.date_used" 
				            					data-format="dd-MM-yyyy"
				            					placeholder="Register Date" 
				            					style="width: 100%;" />
										</div>
										<div class="control-group" data-bind="visible: electricMeter">	
											<input type="checkbox" data-bind="checked: chkRe, events: {change : checkRe}">
											<label for="registeredDate"><span data-bind="text: lang.lang.reactive_meter"></span></label>
										</div>
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="row-fluid">
									<div id="map" class="col-xs-12 col-sm-12" style="height: 200px;"></div>
								</div>
								<div class="separator line bottom"></div>
								<div class="row-fluid">	
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">
							    			<label for="latitute"><span data-bind="text: lang.lang.latitute"></span> </label>
											<div class="input-prepend">
												<span style="float: left;" class="add-on glyphicons direction"><i></i></span>
												<input style="float: left;  width: 77%; padding: 4px 8px; border: 1px solid #efefef; line-height: 20px; box-shadow: none;" type="text" class="input-large span12" data-bind="value: obj.latitute, events:{change: loadMap}" placeholder="012345.67897">
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">
							    			<label for="longtitute"><span data-bind="text: lang.lang.longtitute"></span> </label>
							    			<div class="input-prepend">
												<span style="float: left;" class="add-on glyphicons google_maps"><i></i></span>
												<input style="float: left;  width: 77%;  box-shadow: none;padding: 4px 8px; border: 1px solid #efefef; line-height: 20px; box-shadow: none;" type="text" class="input-large span12" data-bind="value: obj.longtitute, events:{change: loadMap}" placeholder="012345.67897">
											</div>										
										</div>
									</div>										
								</div>
							</div>
						</div>
						<div class="row-fluid" data-bind="visible: otherINFO">
							<div class="box-generic">
							    <div class="tabsbar tabsbar-1" style="background: #203864 !important; color: #fff;">
							        <ul class="row-fluid row-merge">
							        	<li class="span2 glyphicons nameplate_alt active">
							            	<a href="#tab1" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.info"></span></a>
							            </li>
							            <li class="span2 glyphicons more_items" style="width: 210px;">
							            	<a href="#tabService" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.service"></span> & <span data-bind="text: lang.lang.deposit"></span></a>
							            </li>
							            <li class="span2 glyphicons cardio" data-bind="visible: electricMeter">
							            	<a href="#tab2" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.electricity_meter"></span></a>
							            </li>
							            <li class="span2 glyphicons compass" data-bind="visible: visibleReMeter">
							            	<a href="#tab3" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.reactive_meter"></span></a>
							            </li>
							        </ul>
							    </div>
							    <div class="tab-content">
							        <div class="tab-pane active" id="tab1">
							        	<div class="row">	
											<div class="col-xs-12 col-sm-6" style="margin-bottom: 15px;">
												<div class="control-group">
									    			<label for="latitute"><span data-bind="text: lang.lang.location">Location</span> <span style="color:red">*</span></label>
													<div class="input-prepend">
														<input data-role="dropdownlist"
								              			   data-option-label="(--- Select ---)"        
										                   data-value-primitive="true"
										                   data-auto-bind="false"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="
										                   	source: locationDS, 
										                   	value: locationSelect,
										                   	events: {change: onLocationChange}" 
										                   style="width: 100%;" />
													</div>
												</div>
												<div class="control-group" >
									    			<label for="latitute"><span data-bind="text: lang.lang.sub_location">Sub Location</span> <span data-bind="visible: electricMeter" style="color:red"></span></label>
													<div class="input-prepend">
														<input data-role="dropdownlist"
								              			   data-option-label="(--- Select ---)"        
										                   data-value-primitive="true"
										                   data-auto-bind="false"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="
										                   	source: poleDS, 
										                   	value: subLocationSelect,
										                   	events: {change: onSubLocationChange},
										                   	enabled: haveLocation" 
										                   style="width: 100%;" />
													</div>
												</div>
												<div class="control-group" >
									    			<label for="latitute"><span data-bind="text: lang.lang.box">Box</span> <span data-bind="visible: electricMeter" style="color:red"></span></label>
													<div class="input-prepend">
														<input data-role="dropdownlist"
								              			   data-option-label="(--- Select ---)"        
										                   data-value-primitive="true"
										                   data-auto-bind="false"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="
										                   	source: boxDS, 
										                   	value: boxSelect,
										                   	enabled: haveSubLocation" 
										                   style="width: 100%;" />
													</div>
												</div>
												<div class="control-group">
													<label for="latitute"><span data-bind="text: lang.lang.brand">Brands</span> </label>
													<div class="input-prepend">
														<input data-role="dropdownlist"
								              			   data-option-label="(--- Select ---)" 
										                   data-value-primitive="true"
										                   data-auto-bind="false"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.brand_id, source: brandDS" style="width: 100%;" />
													</div>
												</div>
											</div>	
											<div class="col-xs-12 col-sm-6">
												<div class="control-group">
									    			<img data-bind="attr: { src: obj.image_url, alt: obj.name, title: obj.name }" width="120px" style="margin-bottom: 15px; border: 1px solid #ddd;">
													<input id="files" name="files"
									                    type="file"
									                    data-role="upload"
									                    data-multiple="false"
									                    data-show-file-list="false"
									                    data-bind="events: { 
							                   				select: onSelect
									                    }">
												</div>
											</div>										
										</div>
						        	</div>
						        	<div class="tab-pane" data-bind="visible: haveService" id="tabService">
							        	<div class="row-fluid">	
											<div class="col-xs-12 col-sm-6">
												<p><span data-bind="text: lang.lang.name"></span> : <span data-bind="text: serviceName"></span></p>
												<p><span data-bind="text: lang.lang.amount"></span> : <span data-bind="text: serviceAmount"></span></p>
											</div>
											<div class="col-xs-12 col-sm-6">
												<p><span data-bind="text: lang.lang.name"></span> : <span data-bind="text: depositName"></span></p>
												<p><span data-bind="text: lang.lang.amount"></span> : <span data-bind="text: depositAmount"></span></p>
											</div>
										</div>
						        	</div>
							        <div class="tab-pane" id="tab2">
							        	<div class="row-fluid">	
											<div class="col-xs-12 col-sm-6">
												<div class="control-group">
													<label for="latitute"><span data-bind="text: lang.lang.phase">Phase</span> </label>
													<div class="input-prepend">
														<input data-role="dropdownlist"
								              			   data-option-label="(--- Select ---)" 
										                   data-value-primitive="true"
										                   data-auto-bind="false"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: phaseSelect, source: phaseDS" style="width: 100%;" />
													</div>
												</div>
												<div class="control-group">
													<label for="latitute"><span data-bind="text: lang.lang.voltage">Voltage</span> </label>
													<div class="input-prepend">
														<input data-role="dropdownlist"
								              			   data-option-label="(--- Select ---)" 
										                   data-value-primitive="true"
										                   data-auto-bind="false"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: voltageSelect, source: voltageDS" style="width: 100%;" />
													</div>
												</div>
												<div class="control-group">
													<label for="latitute"><span data-bind="text: lang.lang.ampere">Ampere</span> </label>
													<div class="input-prepend">
														<input data-role="dropdownlist"
								              			   data-option-label="(--- Select ---)" 
										                   data-value-primitive="true"
										                   data-auto-bind="false"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: ampereSelect, source: ampereDS" style="width: 100%;" />
													</div>
												</div>
											</div>								
										</div>
						        	</div>
							        <div class="tab-pane" id="tab3" data-bind="visible: visibleReMeter">
							        	<div class="row-fluid">	
											<div class="col-xs-12 col-sm-6">
												<div class="control-group">
									    			<label for="latitute"><span data-bind="text: lang.lang.meter_number">Meter Number</span> </label>
													<div class="input-prepend">
														<input type="text"
															class="k-textbox" 
										                   data-bind="
										                   	value: objReactive.meter_number,
										                   	attr: {placeholder: objReactive.meter_number},
										                   	enabled: false"
										                   style="width: 100%;" />
													</div>
												</div>
												<div class="control-group">
									    			<label for="latitute"><span data-bind="text: lang.lang.startup_number">Startup Number</span> </label>
													<div class="input-prepend">
														<input type="text"
															class="k-textbox" 
										                   data-bind="
										                   	value: objReactive.starting_no,
										                   	attr: {placeholder: lang.lang.startup_number}"
										                   style="width: 100%;" />
													</div>
												</div>
											</div>								
										</div>
						        	</div>
							    </div>
							</div>
						</div>
						<div class="box-generic bg-action-button">
							<div id="ntf1" data-role="notification"></div>
							<div class="row">
								<div class="col-sm-3">
									<input data-role="dropdownlist"
			              			   data-option-label="(--- Select ---)"	      
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="
					                   		source: txnTemplateDS, 
					                   		value: txnFormSelect"
					                   style="width: 100%;" />
								</div>
								<div class="col-sm-9" align="right">									
									<span id="saveClose" data-bind="click: cancel" class="btn-btn"><span data-bind="text: lang.lang.cancel">Cancel</span></span>
									<ul class='dropdown-menu'>
						  				<li><span data-bind="click: save" data-bind="text: lang.lang.save"></span></li>
						  				<li><span data-bind="text: lang.lang.save_print, click: savePrint"></span></li>
						  			</ul>
									<span id="saveNew" class="btn-btn" data-bind="click: save" ><span data-bind="text: lang.lang.save">Save</span></span>		
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="ActivateMeter" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2 data-bind="text: lang.lang.activate_meter"></h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>
				    	<div class="row-fluid ">				    		
				    		<div class="col-xs-12 col-sm-5">
								<div class="row well activatemeter">
									<table class="table table-borderless table-condensed" style="margin-bottom: 0;">
										<tbody>
											<tr>
												<td data-bind="text: lang.lang.customer" style="width: 40%"></td>
												<td data-bind="text: meterObj.contact_name"></td>
											</tr>
											<tr>
												<td data-bind="text: lang.lang.meter_number">Meter Number</td>
												<td data-bind="text: meterObj.meter_number"></td>
											</tr>
											<tr>
												<td data-bind="text: lang.lang.activation_date">Activation Date</td>
												<td>
													<input
									            		data-role="datepicker"	 		
						            					data-bind="value: issued_date, events: {change: addReading}" 
						            					data-format="dd-MM-yyyy"
						            					data-parse-formats="yyyy-MM-dd" 
						            					placeholder="dd-MM-yyyy" 
						            					required data-required-msg="required" 
						            					style="width: 80%" />
												</td>
											</tr>
										</tbody>
									</table>	
								</div>
								<div class="row well installshow" data-bind="visible: showInstallment">
									<h2 data-bind="text: lang.lang.installment" style="width: 100%;">Installment</h2>
				              		<label>
				              			<span data-bind="text: lang.lang.month">Month</span>
				              		</label>										
			              			<br>
				              		<input 
				              			type="text"
				              			class="k-textbox k-invalid"
				              			style="width: 80%" 
				              			data-bind="value: period"
				              			placeholder="1 - 12" 
				              		/>
				              		<br>
				              		<label>
				              			<span data-bind="text: lang.lang.start_date">Start Date</span>
				              		</label>										
			              			<br>
				              		<input
					            		data-role="datepicker"	 		
		            					data-bind="value: startDate" 
		            					data-format="dd-MM-yyyy"
		            					data-parse-formats="yyyy-MM-dd" 
		            					placeholder="dd-MM-yyyy" 
		            					required data-required-msg="required" 
		            					style="width: 80%" />
		            					<br>
				              		<label><span data-bind="text: lang.lang.interest_percentage">Interest Percentage</span></label>	
			              			<br>
				              		<input	 		
		            					data-bind="value: percentage" 
		            					data-format="%"		            					
		            					placeholder="percentage number (10)" 
		            					required data-required-msg="required" 
		            					style="width: 80%" />
		            			</div>
							</div>
							<div class="col-xs-12 col-sm-7">
								<div class="row">
									<div class="box-generic-noborder">
									    <div class="tab-content">
									        <div class="tab-pane active" id="tab1-5">
									            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">    <tbody>
													<tr>
										            	<td><span data-bind="text: lang.lang.payment_method">Payment Method </span></td>				
														<td>
															<input 
																data-role="dropdownlist" 
																data-value-primitive="true" 
																data-text-field="name" 
																data-value-field="id" 
																data-bind="
																	value: paymentMethod,
										              				source: paymentMethodDS" 
										              			data-option-label="Select method..." 
										              			style="width: 100%; display: none;">
														</td>
													</tr>
										            <tr>
										            	<td><span data-bind="text: lang.lang.cash_account">Cash Account</span></td>				            	
									            		<td>
									            			<input 
									            				id="ddlCash" 
									            				name="ddlCash" 
									            				data-role="dropdownlist"  
									            				data-template="account-list-tmpl" 
									            				data-value-primitive="true" 
									            				data-text-field="name" 
									            				data-value-field="id" 
									            				data-bind="
									            					value: cashAccount,
									              					source: cashAccountDS" 
									              				data-option-label="Select Account..." 
									              				required="" 
									              				data-required-msg="required" 
									              				style="width: 100%; display: none;" 
									              				class="k-valid" />
														</td>       	
										            </tr>
										            <tr>
										            	<td><span data-bind="text: lang.lang.ar_account">Account Receivable</span></td>
									            		<td>
									            			<input 
									            				id="ddlCash" 
									            				name="ddlCash" 
									            				data-role="dropdownlist"  
									            				data-template="account-list-tmpl" 
									            				data-value-primitive="true" 
									            				data-text-field="name" 
									            				data-value-field="id" 
									            				data-bind="
									            					value: arAccount,
									              					source: arAccountDS" 
									              				data-option-label="Select Account..." 
									              				required="" data-required-msg="required" 
									              				style="width: 100%; display: none;" class="k-valid">
														</td>        	
										            </tr>
										            <tr>
										            	<td><span data-bind="text: lang.lang.check_no">Check Number</span></td>      	
									            		<td>
															<input 
																class="k-textbox" 
																placeholder="type check number ..." 
																data-bind="value: checkNumber" 
																style="width: 100%;" />
														</td>        	
										            </tr>	
									            </tbody></table>
									        </div>
									    </div>
									</div>
									<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
										<thead>
											<tr>
												<th style="vertical-align: top;" data-bind="text: lang.lang.type">Type</th>
												<th style="vertical-align: top;" data-bind="text: lang.lang.name">Name</th>
												<th style="vertical-align: top;" data-bind="text: lang.lang.amount">Amount</th>
												<th style="vertical-align: top;" data-bind="text: lang.lang.receive">Receive</th>
											</tr>
										</thead>
										<tbody 
											data-role="listview" 
											data-bind="source: items" 
											data-template="meter-plan-item-list">
										</tbody>
									</table>
								</div>
								<div class="row">
									<div class="col-sm-3"></div>
									<div class="col-xs-12 col-sm-9">
										<table class="table table-condensed table-striped table-white">
											<tbody>
												<tr>
													<td class="right">
														<span data-bind="text: lang.lang.subtotal">Amount Paid:</span>
													</td>
													<td class="right" width="40%">
														<span data-bind="text: amountToBeRecieved">0</span>
													</td>
												</tr>
												<tr>
													<td class="right">
														<span data-bind="text: lang.lang.amount_billed">Amount Billed</span>
													</td>
													<td class="right" style="width: 40%;border-bottom: 1px solid #000">
														<span data-bind="text: amountBilled">0</span>
				                   					</td>
												</tr>							
												<tr>
													<td class="right">
														<span data-bind="text: lang.lang.remaining">Outstanding:</span>
													</td>
													<td class="right">
														<span data-bind="text: amountRemain">0</span>
				                   					</td>
												</tr>								
											</tbody>
										</table>											
									</div>
								</div>
							</div>
						</div>
						<div class="box-generic bg-action-button">
							<div id="ntf1" data-role="notification"></div>
							<div class="row">
								<div class="col-sm-3">
								</div>
								<div class="col-sm-9" align="right">
									<span id="saveClose" data-bind="click: cancel" class="btn-btn" >
										<span data-bind="text: lang.lang.cancel">Cancel</span>
									</span>
									<span 
										class="btn-btn" 
										data-bind="click: save"><span data-bind="text: lang.lang.activate">Activate</span></span>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="meter-plan-item-list" type="text/x-kendo-template">
	<tr>
		<td>#=type#</td>
		<td>#=name#</td>
		<td>#: kendo.toString(kendo.parseFloat(amount), banhji.institute.locale == "km-KH"?"c0":"c", banhji.institute.locale)#</td>
		<td><input style="width: 100%" type="number" data-format="c0" class="k-textbox k-input k-formatted-value" data-bind="value: received, events: {change: onAmountChange}">
	</tr>
</script>
<script id="Reorder" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2 data-bind="text: lang.lang.reading_route_management"></h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>
						<!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code" style="margin-bottom: 15px;">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
								<!-- Tabs Heading -->
								<div class="widget-head" style="background: #203864 !important; color: #fff;">
									<ul>
										<li class="active">
											<a class="glyphicons calendar" href="#tab-1" data-toggle="tab" data-bind=""><i></i>Meter Order</a>
										</li>										
										<li>
											<a class="glyphicons print" href="#tab-2" data-toggle="tab" ><i></i>Excel</a>
										</li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body" style="overflow:hidden;">
									<div class="tab-content">
								        <div class="tab-pane active" id="tab-1" style="border: none; padding: 15px;">
											<div class="row">
												<div class="col-sm-3 col-xs-12" >
													<div class="control-group">
														<label ><span data-bind="text: lang.lang.license">License</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="License ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: licenseSelect,
							                  					source: licenseDS,
							                  					events: {change: licenseChange}">
							                  		</div>
												</div>	
												<div class="col-sm-2 col-xs-12">
													<div class="control-group">		
														<label ><span data-bind="text: lang.lang.location">Location</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
							                  					source: blocDS,
							                  					enabled: haveLicense,
							                  					events: {change: onLocationChange}">
							                  		</div>
												</div>
												<div class="col-sm-2 col-xs-12">
													<div class="control-group">		
														<label ><span data-bind="text: lang.lang.sub_location">Location</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="Sub Location ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: subLocationSelect,
							                  					source: subLocationDS,
							                  					enabled: haveLocation,
							                  					events: {change: onSubLocationChange}">
							                  		</div>
												</div>
												<div class="col-sm-2 col-xs-12">
													<div class="control-group">		
														<label ><span data-bind="text: lang.lang.box">Location</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="Box ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: boxSelect,
							                  					source: boxDS,
							                  					enabled: haveSubLocation">
							                  		</div>
												</div>
												<div class="col-sm-2 col-xs-12">
													<div class="control-group">	
														<label ><span data-bind="text: lang.lang.action">Action</span></label>	
														<div class="row" style="margin: 0;">					
															<button type="button" data-role="button" data-bind="click: search" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
														</div>
							                  		</div>
												</div>
									        </div>					
									    </div>
										<div class="tab-pane" id="tab-2" style="border: none; padding: 15px;">
											<h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.upload">Please upload Meter file</h4>
											
											<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
												<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onSelected}" id="myFile"  class="margin-none" />
											</div>
											<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 120px!important; float: left; float: "><i></i>
												<span data-bind="click: orderSave, text: lang.lang.upload"></span>
											</span>

											<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 120px!important; background: #0077c5; float: left; margin-left: 8px;"><i></i>
												<span data-bind="text: lang.lang.download"></span>
											</span>
										</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
						<div id="invFormContent">
							<div id="grid" style="clear: both; margin-bottom: 15px;"></div>
						</div>
						<div class="box-generic bg-action-button">
							<div id="ntf1" data-role="notification" style="display: none;"></div>
							<div class="row">
								<div class="col-xs-12" align="right">
									<span id="saveClose" class="btn-btn" ><span data-bind="text: lang.lang.cancel, click: cancel">Cancel</span></span>
									<span id="saveNew" class="btn-btn" > <span data-bind="click: save, text: lang.lang.save">Save</span></span>											
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<!--  End Meter  -->

<!--  Reading  -->
<script id="Reading" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2 data-bind="text: lang.lang.reading">Reading</h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>
						<!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
							
								<!-- Tabs Heading -->
								<div class="widget-head" style="background: #203864 !important; color: #fff;">
									<ul style="padding-left: 0px;">
										<li class="active" style="width: 210px;"><a style="text-transform: capitalize;" href="#tabDownload" data-toggle="tab"><span style="line-height: 23px;"><span data-bind="text: lang.lang.step1">Step 1:</span><b><span  data-bind="text: lang.lang.download_reading_book">Download Reading Book</span></b></span></a></li>
										<li style="width: 210px;"><a style="text-transform: capitalize;" href="#tabReading" data-toggle="tab"><span style="line-height: 23px;"><span data-bind="text: lang.lang.step2">Step 2:</span> <b><span data-bind="text: lang.lang.upload_reading_book">Upload Reading Book</span> </b></span></a></li>
										
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								
								<div class="widget-body">
									<div class="tab-content">
										<!-- Tab content -->
										<div id="tabDownload" style="border: 1px solid #ccc; overflow: hidden; padding: 15px" class="tab-pane active widget-body-regular" >
											<h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.please_select_license">Please Select License and Location to download reading book</h4>
										  	<div class="col-sm-12 row" style="padding:20px 0;padding-top: 0;">
												<div class="col-xs-12 col-sm-3" >
													<div class="control-group">	
														<label ><span data-bind="text: lang.lang.license">License</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="License ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: licenseSelect,
							                  					source: licenseDS,
							                  					events: {change: licenseChange}">
							                  		</div>
												</div>
												<div class="col-xs-12 col-sm-2" >
													<div class="control-group">								
														<label ><span data-bind="text: lang.lang.location">Location</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveLicense,
																events: {change: onLocationChange},
							                  					source: blocDS">
							                  		</div>
												</div>
												<div class="col-xs-12 col-sm-3">
													<div class="control-group">								
														<label ><span data-bind="text: lang.lang.sub_location">Location</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="Sub Location ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: subLocationSelect,
																enabled: haveLocation,
																events: {change: onSubLocationChange},
							                  					source: subLocationDS">
							                  		</div>
												</div>
												<div class="col-xs-12 col-sm-2" >
													<div class="control-group">								
														<label ><span data-bind="text: lang.lang.box">Box</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="Box ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: boxSelect,
																enabled: haveSubLocation,
							                  					source: boxDS">
							                  		</div>
												</div>
												<div class="col-xs-12 col-sm-1" >
													<div class="control-group">	
														<label ><span data-bind="text: lang.lang.search">search</span></label>	
														<div class="row" style="margin: 0;">					
															<button type="button" data-role="button" data-bind="click: search" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
														</div>
							                  		</div>
												</div>
									        </div>
									        <div class="row" data-bind="visible: selectMeter">
												<a data-bind="visible: haveData, click: exportEXCEL">
													<span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 250px!important;">
														<i></i> 
														<span data-bind="text: lang.lang.download_reading_book">Download Reading Book</span>
													</span>
												</a>
												<br>
												<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
													<thead>
														<tr>
															<th style="vertical-align: top;"><span data-bind="text: lang.lang.name">name</span></th>
															<th style="vertical-align: top;"><span data-bind="text: lang.lang.meter_number">Meter Number</span></th>
															<th style="vertical-align: top;"><span data-bind="text: lang.lang.from_date">From Date</span></th>
															<th style="vertical-align: top;"><span data-bind="text: lang.lang.to_date">To Date</span></th>
															<th style="vertical-align: top;"><span data-bind="text: lang.lang.month_of">Month Of</span></th>
															<th style="vertical-align: top;"><span data-bind="text: lang.lang.previous">Previouse</span></th>
															<th style="vertical-align: top;"><span data-bind="text: lang.lang.current">Current</span></th>
														</tr>
													</thead>
													<tbody 
								                		data-bind="source: uploadDS" 
								                		data-auto-bind="false" 
								                		data-role="listview" 
								                		data-template="reading-template">
								                	</tbody>
												</table>
											</div>
										</div>
										<div id="tabReading" style="border: 1px solid #ccc; padding: 15px" class="tab-pane widget-body-regular">
											<h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.please_upload_reading_book">Please upload reading book</h4>
											<div class="row clear" style="overflow: hidden;margin-bottom: 20px;">
												<div class="col-xs-12 col-sm-4" >
													<div class="control-group">	
														<label ><span data-bind="text: lang.lang.license">License</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="License ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: licenseSelectU,
							                  					source: licenseDSU,
							                  					events: {change: licenseChangeU}">
							                  		</div>
												</div>
												<div class="col-xs-12 col-sm-4">
													<div class="control-group">
														<label ><span data-bind="text: lang.lang.location">Location</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelectU,
																enabled: haveLicenseU,
																events: {change: onLocationChangeU},
							                  					source: blocDSU">
							                  		</div>
												</div>
												<div class="col-xs-12 col-sm-4">
													<div class="control-group">	
														<label ><span data-bind="text: lang.lang.sub_location">Location</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="Sub Location ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: subLocationSelectU,
																enabled: haveLocationU,
																events: {change: onSubLocationChangeU},
							                  					source: subLocationDSU">
							                  		</div>
												</div>
											</div>
											<div class="row clear" style="overflow: hidden; ">
												<div class="col-xs-12 col-sm-4" >
													<div class="control-group">
														<label ><span data-bind="text: lang.lang.box">Box</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="Box ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: boxSelectU,
																enabled: haveSubLocationU,
							                  					source: boxDSU">
							                  		</div>
												</div>
												<div class="col-xs-12 col-sm-4">
													<div class="control-group">	
														<label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
											            <input type="text" 
										                	style="width: 100%;" 
										                	data-role="datepicker"
										                	data-format="MM-yyyy"
										                	data-start="year" 
											  				data-depth="year"
										                	placeholder="Moth of ..." 
												           	data-bind="value: monthOfUpload,
												           			enabled: monthOfUen,
												           			events: {change: monthOfUSelect}" />
													</div>
												</div>											
												<div class="col-xs-12 col-sm-4">
													<div class="control-group">	
														<label ><span data-bind="text: lang.lang.to_date">To Date</span></label>
											            <input type="text" 
										                	style="width: 100%;" 
										                	data-role="datepicker"
										                	placeholder="To Date ..." 
												           	data-bind="value: toDateUpload,
												           			events: {change: selectMonthTo},
												           			disabled: toDateDisabled" />
													</div>
												</div>
											</div>
											<div style="margin-top: 20px;" class="fileupload fileupload-new margin-none" data-provides="fileupload" data-bind="visible: MonthTo">
											  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onSelected}" id="myFile"  class="margin-none" />
											</div>
											<table data-bind="visible: errorShow" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
												<thead>
													<tr>
														<th class="center"><span data-bind="text: lang.lang.line">Line</span></th>
														<th class="center"><span data-bind="text: lang.lang.meter_number">Meter Number</span></th>
														<th class="center"><span data-bind="text: lang.lang.previous">Previus</span></th>
														<th class="center"><span data-bind="text: lang.lang.current">Current</span></th>
														<th class="center"><span data-bind="text: lang.lang.status">Status</span></th>
													</tr>
												</thead>
												<tbody 
							                		data-bind="source: Uploaderror" 
							                		data-auto-bind="true" 
							                		data-role="listview" 
							                		data-template="reading-Error11-template">
							                	</tbody>
											</table>
											<div data-bind="visible: existShow" style="overflow: hidden;">
												<p data-bind="text: lang.lang.exist_meter">Exist Meter</p>
												<table  class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
													<thead>
														<tr>
															<th class="center"><span data-bind="text: lang.lang.line">Line</span></th>
															<th class="center"><span data-bind="text: lang.lang.meter_number">Meter Number</span></th>
															<th class="center"><span data-bind="text: lang.lang.previous">Previus</span></th>
															<th class="center"><span data-bind="text: lang.lang.current">Current</span></th>
															<th class="center"><span data-bind="text: lang.lang.status">Status</span></th>
														</tr>
													</thead>
													<tbody 
								                		data-bind="source: ExistRUpload" 
								                		data-auto-bind="true" 
								                		data-role="listview" 
								                		data-template="reading-Exist-template">
								                	</tbody>
												</table>
											</div>
											<br>

											<span data-bind="visible: fullCorrect" class="btn btn-icon btn-primary glyphicons ok_2" style="margin-top: 3px;width: 160px!important;"><i></i><span data-bind="click: save" data-bind="text: lang.lang.start_reading">Start Reading</span></span>
										</div>
										<!-- // Tab content END -->
										
									</div>
								</div>
								<div id="ntf1" data-role="notification"></div>
							</div>
						</div>
						<!-- // Tabs END -->

					</div>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="reading-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#= _contact#
   		</td>
    	<td>
    		#= meter_number#
   		</td>
   		<td align="center">
    		#= kendo.toString(new Date(from_date), "dd-MMM-yyyy")#
   		</td>
   		<td align="center">
    		#= kendo.toString(new Date(to_date), "dd-MMM-yyyy")#
   		</td>
   		<td align="center">
    		#= kendo.toString(new Date(month_of), "MMM-yyyy")#
   		</td>
   		<td align="center">
    		#= previous#
   		</td>
   		<td align="center">
    		#= current#
   		</td>		
   	</tr>
</script>
<script id="reading-Error11-template" type="text/x-kendo-tmpl">
    <tr>
    	<td align="center">
    		#= line#
   		</td>
    	<td>
    		#= meter_number#
   		</td>
   		<td align="center">
    		#= previous#
   		</td>
   		<td align="center" style="font-weight: bold;color:red">
    		#= current#
   		</td>
   		<td align="center">
   			<span><i class="icon-remove"></i></span>
   		</td>	
   	</tr>
</script>
<script id="reading-Exist-template" type="text/x-kendo-tmpl">
    <tr>
    	<td align="center">
    		#= line#
   		</td>
    	<td style="font-weight: bold;color:red">
    		#= meter_number#
   		</td>
   		<td align="center">
    		#= previous#
   		</td>
   		<td align="center" >
    		#= current#
   		</td>
   		<td align="center">
   			<span><i class="icon-remove"></i></span>
   		</td>	
   	</tr>
</script>
<script id="EditReading" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
				    
			    	<span class="glyphicons no-js remove_2 pull-right" 
							data-bind="click: cancel"><i></i></span>

			        <h2>Edit Reading</h2>

				    <br>
						
					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span12 row-fluid" style="padding:20px 0;padding-top: 0;">
					        	<div class="span5" style="padding-left: 0;">
						        	<div class="span6">	
										<!-- Group -->
										<div class="control-group">								
											<label ><span >Month Of</span></label>
								            <input type="text" 
							                	style="width: 100%;" 
							                	data-role="datepicker"
							                	data-format="MM-yyyy"
							                	data-start="year" 
								  				data-depth="year" 
							                	placeholder="Moth of ..." 
									           	data-bind="value: monthOfSelect" />
										</div>
																										
										<!-- // Group END -->
									</div>
									<div class="span6" style="padding-left: 0;">
										<div class="control-group">								
											<label ><span >License</span></label>
											<input 
												data-role="dropdownlist" 
												style="width: 100%;" 
												data-option-label="License ..." 
												data-auto-bind="false" 
												data-value-primitive="false" 
												data-text-field="name" 
												data-value-field="id" 
												data-bind="
													value: licenseSelect,
				                  					source: licenseDS,
				                  					events: {change: onLicenseChange}">
				                  		</div>
									</div>	
								</div>
								<div class="span7" style="padding-left: 0;">
									<div class="span4">
										<div class="control-group">								
											<label ><span >Location</span></label>
											<input 
												data-role="dropdownlist" 
												style="width: 100%;" 
												data-option-label="Location ..." 
												data-auto-bind="false" 
												data-value-primitive="false" 
												data-text-field="name" 
												data-value-field="id" 
												data-bind="
													value: blocSelect,
				                  					source: blocDS,
				                  					events: {change: blocChange}">
				                  		</div>
									</div>
									<div class="span4">
										<div class="control-group">	
											<label ><span >Action</span></label>	
											<div class="row" style="margin: 0;">					
												<button type="button" data-role="button" data-bind="click: search" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
											</div>
				                  		</div>
									</div>		
								</div>
					        </div>
							<br>
						  	<table class="table table-borderless table-condensed cart_total table-primary">
						  		<thead>
			                		<tr>
			                			<th>Meter Number</th>
			                			<th style="text-align: center">From Date</th>
			                			<th style="text-align: center">To Date</th>
			                			<th>Previous</th>
			                			<th>Current</th>
			                			<th style="text-align: center">Action</th>
			                		</tr>
			                	</thead>
			                	<tbody 
			                		data-bind="source: dataSource" 
			                		data-auto-bind="true" 
			                		data-role="listview" 
			                		data-edit-template="readding-edit-template"
			                		data-template="reading-list-template">
			                	</tbody>
						  	</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="reading-list-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#= meter_number#
   		</td>
   		<td align="center">
    		#= from_date#
   		</td>
   		<td align="center">
    		#= to_date#
   		</td>
   		<td align="center">
    		#= previous#
   		</td>
   		<td align="center">
    		#= current#
   		</td>
   		<td align="center">   			   
		    <a class="btn-action glyphicons pencil btn-success k-edit-button" ><i></i></a>
   		</td>   		
   	</tr>
</script>
<script id="readding-edit-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
            #= meter_number#
        </td>
		<td align="center">
            #= date#
        </td>
		<td align="center">
            #= previous#
        </td>
        <td align="center">
            <input type="text" class="k-textbox" data-bind="value:current" name="current" required="required" validationMessage="required" />
        </td>
        <td align="center">
            #= current - previous#
        </td>
		<td align="center">
	        <div class="edit-buttons">
	            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
	            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
	        </div>
	    </td>
	</tr>
</script>
<!-- Head Meter Reading -->
<script id="HeadMeter" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2>Head Meter</h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
								<div class="widget-head" style="background: #203864 !important; color: #fff;">
									<ul style="padding-left: 0px;">
										<li class="active" style="width: 210px;"><a style="text-transform: capitalize;" href="#tabCenter" data-toggle="tab"><span style="line-height: 23px;"><span >Head Meter Center</span><b><span >Information of Meter</span></b></span></a></li>
										<!-- <li style="width: 210px;"><a style="text-transform: capitalize;" href="#tabDownload" data-toggle="tab"><span style="line-height: 23px;"><span data-bind="text: lang.lang.step1">Step 1:</span><b><span  data-bind="text: lang.lang.download_reading_book">Download Reading Book</span></b></span></a></li>
										<li style="width: 210px;"><a style="text-transform: capitalize;" href="#tabReading" data-toggle="tab"><span style="line-height: 23px;"><span data-bind="text: lang.lang.step2">Step 2:</span> <b><span data-bind="text: lang.lang.upload_reading_book">Upload Reading Book</span> </b></span></a></li> -->
									</ul>
								</div>
								<div class="widget-body">
									<div class="tab-content">
										<div id="tabCenter" style="border: 1px solid #ccc; overflow: hidden; padding: 15px" class="tab-pane active widget-body-regular" >
											<div class="row">
									        	<div class="col-sm-4 ">
									        		<div class="listWrapper">
														<div class="innerAll" style="height: 55px;padding:0;">
															<a href="#/add_head_meter" style="float: left;width: 100%;padding: 10px 0;text-align: center;clear: both;position: relative;color: #fff;font-weight: bold;background: darkblue;">Add Head Meter</a>
															<div class="widget-search separator bottom" style="clear: both;padding: 10px;">
																<a class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></a>
																<div class="overflow-hidden">
																	<input type="search" style="border: 1px solid #ccc;height: 34px;" placeholder="Meter Number..." data-bind="value: searchText, events:{change: search}">
																</div>
															</div>
														</div>
														<div class="table table-condensed" id="listContact" style="height: 580px; margin-bottom: 0;"
															 data-role="grid"
															 data-bind="source: meterDS"
															 data-row-template="head-meter-list-tmpl"
															 data-columns="[{title: 'Head Meter'}]"
															 data-selectable="true"
															 data-height="400"
															 data-scrollable="{virtual: true}"></div>
													</div>
												</div>
									        	<div class="col-sm-8">
									        		<h2 style="margin-left: 0;" data-bind="text: lang.lang.add_single_reading">Add Single Reading</h2>
										        	<div class="row">
									        			<div class="col-xs-12 col-sm-3">
															<div class="control-group">
																<label ><span data-bind="text: lang.lang.month_of" >Month Of</span></label>
													            <input type="text" 
												                	style="width: 100%;" 
												                	data-role="datepicker"
												                	data-format="MM-yyyy"
												                	data-parse-formats="yyyy-MM-dd HH:mm:ss"
												                	data-start="year" 
													  				data-depth="year" 
												                	placeholder="Moth of ..." 
														           	data-bind="value: monthOfSR" />
															</div>
														</div>										
														<div class="col-xs-12 col-sm-3">
															<div class="control-group">								
																<label ><span data-bind="text: lang.lang.meter_number">Meter Number</span></label>
												        		<p class="k-input k-textbox" 
												        			style="width:100%; border:1px solid #ccc; padding: 5px;"
												        			data-bind="text: numberSR">
												        		</p>
												        	</div>
												        </div>
												        <div class="col-xs-12 col-sm-3">
															<div class="control-group">								
																<label ><span data-bind="text: lang.lang.previous">Previous</span></label>
												        		<p class="k-input k-textbox" 
												        			style="width:100%; border:1px solid #ccc; padding: 5px;"
												        			data-bind="text: previousSR" >
												        		</p>
												        	</div>
												       	</div>
												       	<div class="col-xs-12 col-sm-3">
															<div class="control-group">								
																<label ><span data-bind="text: lang.lang.current">Current</span></label>
												        		<input type="text" 
												        			class="k-input k-textbox" 
												        			placeholder="Current" 
												        			style="width:100%;border:1px solid #ccc;"
												        			data-bind="value: currentSR" />
												        	</div>
												        </div>
												    </div>
												    <div class="row" style="margin-bottom: 15px;">   
												        <div class="col-xs-12 col-sm-3">
															<div class="control-group">	
																<label ><span data-bind="text: lang.lang.to_date">To Date</span></label>
													            <input type="text" 
												                	style="width: 100%;" 
												                	data-role="datepicker"
												                	placeholder="To Date ..." 
												                	data-parse-formats="yyyy-MM-dd HH:mm:ss"
														           	data-bind="value: toDateSR" />
															</div>
												        </div>
												        <div class="col-xs-12 col-sm-3">
												        	<label ><span data-bind="text: lang.lang.new_round">New Round</span></label>
														    <input 
									              				data-role="dropdownlist"
											            		data-text-field="name"
								           						data-value-field="id"
								           						data-value-primitive="true" 
											            		data-bind="
											            			source: roundDS, 
											            			value: newRound"
											            		style="width: 100%;" />
												        </div>
											        	<div class="col-xs-12 col-sm-3">
											        		<br>
											        		<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="click: addReading"><i></i> <span data-bind="text: lang.lang.add">Add</span></span>
											        	</div>
										        	</div>
										        	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
											        	<thead>
												            <tr>			                
												                <th style="vertical-align: top;"><span data-bind="text: lang.lang.month">Month</span></th>
												                <th style="vertical-align: top;"><span data-bind="text: lang.lang.meter_number">Meter Number</span></th>
												                <th style="vertical-align: top;"><span data-bind="text: lang.lang.previous">Previous</span></th>
												                <th style="vertical-align: top;"><span data-bind="text: lang.lang.current">Current</span></th>
												                <th style="vertical-align: top;">Usage</th>
												                <th style="vertical-align: top;"><span data-bind="text: lang.lang.action">Action</span></th>     
												            </tr> 
												        </thead>
												        <tbody data-role="listview"
												        		data-template="headmeter-reading-template" 
												        		data-edit-template="edit-headmeter-reading-template"
												        		data-auto-bind="false" 
												        		data-bind="source: meterReadingDS">
												        </tbody>
												    </table>
										        </div>
										    </div>
										</div>
										<div id="tabDownload" style="border: 1px solid #ccc; overflow: hidden; padding: 15px" class="tab-pane widget-body-regular" >
											<h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.please_select_license">Please Select License and Location to download reading book</h4>
										  	<div class="col-sm-12 row" style="padding:20px 0;padding-top: 0;">
												<div class="col-xs-12 col-sm-3" >
													<div class="control-group">	
														<label ><span data-bind="text: lang.lang.license">License</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="License ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: licenseSelect,
							                  					source: licenseDS,
							                  					events: {change: licenseChange}">
							                  		</div>
												</div>
												<div class="col-xs-12 col-sm-2" >
													<div class="control-group">								
														<label ><span data-bind="text: lang.lang.location">Location</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveLicense,
																events: {change: onLocationChange},
							                  					source: blocDS">
							                  		</div>
												</div>
												<div class="col-xs-12 col-sm-3">
													<div class="control-group">								
														<label ><span data-bind="text: lang.lang.sub_location">Location</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="Sub Location ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: subLocationSelect,
																enabled: haveLocation,
																events: {change: onSubLocationChange},
							                  					source: subLocationDS">
							                  		</div>
												</div>
												<div class="col-xs-12 col-sm-2" >
													<div class="control-group">								
														<label ><span data-bind="text: lang.lang.box">Box</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="Box ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: boxSelect,
																enabled: haveSubLocation,
							                  					source: boxDS">
							                  		</div>
												</div>
												<div class="col-xs-12 col-sm-1" >
													<div class="control-group">	
														<label ><span data-bind="text: lang.lang.search">search</span></label>	
														<div class="row" style="margin: 0;">					
															<button type="button" data-role="button" data-bind="click: search" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
														</div>
							                  		</div>
												</div>
									        </div>
									        <div class="row" data-bind="visible: selectMeter">
												<a data-bind="visible: haveData, click: exportEXCEL">
													<span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 250px!important;">
														<i></i> 
														<span data-bind="text: lang.lang.download_reading_book">Download Reading Book</span>
													</span>
												</a>
												<br>
												<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
													<thead>
														<tr>
															<th style="vertical-align: top;"><span data-bind="text: lang.lang.meter_number">Meter Number</span></th>
															<th style="vertical-align: top;"><span data-bind="text: lang.lang.from_date">From Date</span></th>
															<th style="vertical-align: top;"><span data-bind="text: lang.lang.to_date">To Date</span></th>
															<th style="vertical-align: top;"><span data-bind="text: lang.lang.month_of">Month Of</span></th>
															<th style="vertical-align: top;"><span data-bind="text: lang.lang.previous">Previouse</span></th>
															<th style="vertical-align: top;"><span data-bind="text: lang.lang.current">Current</span></th>
														</tr>
													</thead>
													<tbody 
								                		data-bind="source: getReadingDS" 
								                		data-auto-bind="false" 
								                		data-role="listview" 
								                		data-template="head-download-reading-template">
								                	</tbody>
												</table>
											</div>
										</div>
										<div id="tabReading" style="border: 1px solid #ccc; padding: 15px" class="tab-pane widget-body-regular">
											<h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.please_upload_reading_book">Please upload reading book</h4>
											<div class="row clear" style="overflow: hidden;margin-bottom: 20px;">
												<div class="col-xs-12 col-sm-4" >
													<div class="control-group">	
														<label ><span data-bind="text: lang.lang.license">License</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="License ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: licenseSelectU,
							                  					source: licenseDSU,
							                  					events: {change: licenseChangeU}">
							                  		</div>
												</div>
												<div class="col-xs-12 col-sm-4">
													<div class="control-group">
														<label ><span data-bind="text: lang.lang.location">Location</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelectU,
																enabled: haveLicenseU,
																events: {change: onLocationChangeU},
							                  					source: blocDSU">
							                  		</div>
												</div>
												<div class="col-xs-12 col-sm-4">
													<div class="control-group">	
														<label ><span data-bind="text: lang.lang.sub_location">Location</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="Sub Location ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: subLocationSelectU,
																enabled: haveLocationU,
																events: {change: onSubLocationChangeU},
							                  					source: subLocationDSU">
							                  		</div>
												</div>
											</div>
											<div class="row clear" style="overflow: hidden; ">
												<div class="col-xs-12 col-sm-4" >
													<div class="control-group">
														<label ><span data-bind="text: lang.lang.box">Box</span></label>
														<input 
															data-role="dropdownlist" 
															style="width: 100%;" 
															data-option-label="Box ..." 
															data-auto-bind="false" 
															data-value-primitive="true" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: boxSelectU,
																enabled: haveSubLocationU,
							                  					source: boxDSU">
							                  		</div>
												</div>
												<div class="col-xs-12 col-sm-4">
													<div class="control-group">	
														<label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
											            <input type="text" 
										                	style="width: 100%;" 
										                	data-role="datepicker"
										                	data-format="MM-yyyy"
										                	data-start="year" 
											  				data-depth="year"
										                	placeholder="Moth of ..." 
												           	data-bind="value: monthOfUpload,
												           			enabled: monthOfUen,
												           			events: {change: monthOfUSelect}" />
													</div>
												</div>											
												<div class="col-xs-12 col-sm-4">
													<div class="control-group">	
														<label ><span data-bind="text: lang.lang.to_date">To Date</span></label>
											            <input type="text" 
										                	style="width: 100%;" 
										                	data-role="datepicker"
										                	placeholder="To Date ..." 
												           	data-bind="value: toDateUpload,
												           			events: {change: selectMonthTo},
												           			disabled: toDateDisabled" />
													</div>
												</div>
											</div>
											<div style="margin-top: 20px;" class="fileupload fileupload-new margin-none" data-provides="fileupload" data-bind="visible: MonthTo">
											  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onSelected}" id="myFile"  class="margin-none" />
											</div>
											<table data-bind="visible: errorShow" class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
												<thead>
													<tr>
														<th class="center"><span data-bind="text: lang.lang.line">Line</span></th>
														<th class="center"><span data-bind="text: lang.lang.meter_number">Meter Number</span></th>
														<th class="center"><span data-bind="text: lang.lang.previous">Previus</span></th>
														<th class="center"><span data-bind="text: lang.lang.current">Current</span></th>
														<th class="center"><span data-bind="text: lang.lang.status">Status</span></th>
													</tr>
												</thead>
												<tbody 
							                		data-bind="source: Uploaderror" 
							                		data-auto-bind="true" 
							                		data-role="listview" 
							                		data-template="reading-Error11-template">
							                	</tbody>
											</table>
											<div data-bind="visible: existShow" style="overflow: hidden;">
												<p data-bind="text: lang.lang.exist_meter">Exist Meter</p>
												<table  class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
													<thead>
														<tr>
															<th class="center"><span data-bind="text: lang.lang.line">Line</span></th>
															<th class="center"><span data-bind="text: lang.lang.meter_number">Meter Number</span></th>
															<th class="center"><span data-bind="text: lang.lang.previous">Previus</span></th>
															<th class="center"><span data-bind="text: lang.lang.current">Current</span></th>
															<th class="center"><span data-bind="text: lang.lang.status">Status</span></th>
														</tr>
													</thead>
													<tbody 
								                		data-bind="source: ExistRUpload" 
								                		data-auto-bind="true" 
								                		data-role="listview" 
								                		data-template="reading-Exist-template">
								                	</tbody>
												</table>
											</div>
											<br>
											<span data-bind="visible: fullCorrect" class="btn btn-icon btn-primary glyphicons ok_2" style="margin-top: 3px;width: 160px!important;"><i></i><span data-bind="click: save" data-bind="text: lang.lang.start_reading">Start Reading</span></span>
										</div>
									</div>
								</div>
								<div id="ntf1" data-role="notification"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="head-meter-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td style="border-bottom: 1px solid \#ddd;">
			<div class="media-body strong" style="position: relative;">				
				<span>#=number#</span>
				<a style="color: \\#000;float: right;" href="\\#/add_head_meter/#: id#">Edit</a>
			</div>
		</td>
	</tr>
</script>
<script id="headmeter-reading-template" type="text/x-kendo-tmpl">
	kendo.culture("km-KH");
	<tr>
		<td>
			#:kendo.toString(new Date(month_of), "MMMM")#
		</td>
		<td>
			#= head_meter_number#
		</td>
		<td align="center">
			#=previous#
		</td>
		<td align="center">
			#=current#
		</td>
		<td align="center">
			#=usage#
		</td>
		<td align="center">
			# if(banhji.HeadMeter.meterReadingDS.indexOf(data) == 0) {#
				<a class="btn-action glyphicons pencil btn-success k-edit-button" ><i></i></a>
			#}#
		</td>
	</tr>
</script>
<script id="edit-headmeter-reading-template" type="text/x-kendo-tmpl">
	kendo.culture("km-KH");
	<tr>
		<td>
			#:kendo.toString(new Date(month_of), "D")#
		</td>
		<td>
			#=head_meter_number#
		</td>
		<td>
			#=previous#
		</td>
		<td>
			<input type="text" class="k-input" data-bind="value: current">
		</td>
		<td>
			#:consumption = current - previous #
		</td>
		<td>
			<div class="edit-buttons">
	            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-i-check"></span></a>
	            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-i-cancel"></span></a>
	        </div>
		</td>
	</tr>
</script>
<script id="head-download-reading-template" type="text/x-kendo-tmpl">
    <tr>
    	<td>
    		#= meter_number#
   		</td>
   		<td align="center">
    		#= kendo.toString(new Date(from_date), "dd-MMM-yyyy")#
   		</td>
   		<td align="center">
    		#= kendo.toString(new Date(to_date), "dd-MMM-yyyy")#
   		</td>
   		<td align="center">
    		#= kendo.toString(new Date(month_of), "MMM-yyyy")#
   		</td>
   		<td align="center">
    		#= previous#
   		</td>
   		<td align="center">
    		#= current#
   		</td>		
   	</tr>
</script>
<script id="AddHeadMeter" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2 >Head Meter</h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>
				    	<div class="row-fluid">
				    		<div class="col-xs-12 col-sm-6 well">
				    			<div class="row">
									<div class="col-xs-12 col-sm-6">
										<!-- Group -->
										<div class="control-group">							
											<label><span data-bind="text: lang.lang.license">Type</span> <span style="color:red">*</span></label>			
					              			<br>
					              			<select data-role="dropdownlist"
							                   data-value-primitive="true"
							                   data-option-label="(--- Select ---)"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="
							                   	source: licenseDS,
							                   	value: obj.branch_id,
							                   	events: {change: licenseChange}"
							                   style="width: 100%;" ></select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">							
											<label><span data-bind="text: lang.lang.multiplier">Multiplier</span></label>			
					              			<br>
					              			<input class="k-textbox"					    
						              			data-bind="value: obj.multiplier"
								                placeholder="eg. 1" required data-required-msg="required"
								                style="width: 100%" />
										</div>
									</div>
								</div>								
								<div class="row">
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">							
											<label><span data-bind="text: lang.lang.meter_number">Meter Code</span> <span style="color:red">*</span></label>			
					              			<br>
					              			<input class="k-textbox"					    
						              			data-bind="value: obj.number, events: {change: meterNumberChange}"
								                placeholder="eg. 1" required data-required-msg="required"
								                style="width: 100%" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">							
											<label for="txtAbbr"><span data-bind="text: lang.lang.meter_no_digit">Meter No. Digit</span> <span style="color:red">*</span></label>			
					              			<br>
						              		<input class="k-textbox"					    
						              			data-bind="value: obj.number_digit"
								                placeholder="eg. 1" required data-required-msg="required"
								                style="width: 100%" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">							
											<label for="registeredDate"><span data-bind="text: lang.lang.register_date"></span> <span style="color:red">*</span></label>
								            <input
							            		data-role="datepicker"
				            					data-bind="value: obj.date_used" 
				            					data-format="dd-MM-yyyy"
				            					placeholder="Register Date" 
				            					style="width: 100%;" />
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<!-- Group -->
										<div class="control-group">							
											<label for="txtAbbr"><span data-bind="text: lang.lang.starting_meter_no">Starting Meter No.</span></label>
					              			<br>
						              		<input class="k-textbox" data-bind="value: obj.starting_no" placeholder="e.g. 0" style="width: 100%;" />
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">
											<label for="customerStatus"><span data-bind="text: lang.lang.status"></span> <span style="color:red">*</span></label>
								            <select data-role="dropdownlist"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="
							                   	source: selectType,
							                   	value: obj.status"
							                   style="width: 100%; " ></select>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">
											<label for="txtAbbr"><span data-bind="text: lang.lang.order"></span></label>			
					              			<br>
						              		<input class="k-textbox"					    
						              			data-bind="value: meterOrder"
								                placeholder="eg. 1" required data-required-msg="required"
								                style="width: 100%" />
										</div>
									</div>
								</div>						
							</div>
							<div class="col-sm-6">
								<div class="row-fluid">
									<div id="map" class="col-xs-12 col-sm-12" style="height: 200px;"></div>
								</div>
								<div class="separator line bottom"></div>
								<div class="row-fluid">	
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">
							    			<label for="latitute"><span data-bind="text: lang.lang.latitute"></span> </label>
											<div class="input-prepend">
												<span style="float: left;" class="add-on glyphicons direction"><i></i></span>
												<input style="float: left;  width: 77%; padding: 4px 8px; border: 1px solid #efefef; line-height: 20px; box-shadow: none;" type="text" class="input-large span12" data-bind="value: obj.latitute, events:{change: loadMap}" placeholder="012345.67897">
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">
							    			<label for="longtitute"><span data-bind="text: lang.lang.longtitute"></span> </label>
							    			<div class="input-prepend">
												<span style="float: left;" class="add-on glyphicons google_maps"><i></i></span>
												<input style="float: left;  width: 77%;  box-shadow: none;padding: 4px 8px; border: 1px solid #efefef; line-height: 20px; box-shadow: none;" type="text" class="input-large span12" data-bind="value: obj.longtitute, events:{change: loadMap}" placeholder="012345.67897">
											</div>										
										</div>
									</div>										
								</div>
							</div>
						</div>
						<div class="row-fluid">
							<div class="box-generic">
							    <div class="tabsbar tabsbar-1" style="background: #203864 !important; color: #fff;">
							        <ul class="row-fluid row-merge">
							        	<li class="span2 glyphicons nameplate_alt active">
							            	<a href="#tab1" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.info"></span></a>
							            </li>
							        </ul>
							    </div>
							    <div class="tab-content">
							        <div class="tab-pane active" id="tab1">
							        	<div class="row">	
											<div class="col-xs-12 col-sm-6" style="margin-bottom: 15px;">
												<div class="control-group">
									    			<label for="latitute"><span data-bind="text: lang.lang.location">Location</span> <span style="color:red">*</span></label>
													<div class="input-prepend">
														<input data-role="dropdownlist"
								              			   data-option-label="(--- Select ---)"        
										                   data-value-primitive="true"
										                   data-auto-bind="false"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="
										                   	source: locationDS, 
										                   	value: locationSelect,
										                   	events: {change: onLocationChange}" 
										                   style="width: 100%;" />
													</div>
												</div>
												<div class="control-group" >
									    			<label for="latitute"><span data-bind="text: lang.lang.sub_location">Sub Location</span> <span data-bind="visible: electricMeter" style="color:red"></span></label>
													<div class="input-prepend">
														<input data-role="dropdownlist"
								              			   data-option-label="(--- Select ---)"        
										                   data-value-primitive="true"
										                   data-auto-bind="false"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="
										                   	source: poleDS, 
										                   	value: subLocationSelect,
										                   	events: {change: onSubLocationChange},
										                   	enabled: haveLocation" 
										                   style="width: 100%;" />
													</div>
												</div>
												<div class="control-group" >
									    			<label for="latitute"><span data-bind="text: lang.lang.box">Box</span> <span data-bind="visible: electricMeter" style="color:red"></span></label>
													<div class="input-prepend">
														<input data-role="dropdownlist"
								              			   data-option-label="(--- Select ---)"        
										                   data-value-primitive="true"
										                   data-auto-bind="false"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="
										                   	source: boxDS, 
										                   	value: boxSelect,
										                   	enabled: haveSubLocation" 
										                   style="width: 100%;" />
													</div>
												</div>
											</div>	
											<div class="col-xs-12 col-sm-6">
												<div class="control-group">
									    			<img data-bind="attr: { src: obj.image_url, alt: obj.name, title: obj.name }" width="120px" style="margin-bottom: 15px; border: 1px solid #ddd;">
													<input id="files" name="files"
									                    type="file"
									                    data-role="upload"
									                    data-multiple="false"
									                    data-show-file-list="false"
									                    data-bind="events: { 
							                   				select: onSelect
									                    }">
												</div>
											</div>										
										</div>
						        	</div>
							    </div>
							</div>
						</div>
						<div class="box-generic bg-action-button">
							<div id="ntf1" data-role="notification"></div>
							<div class="row">
								<div class="col-sm-3">
								</div>
								<div class="col-sm-9" align="right">									
									<span id="saveClose" data-bind="click: cancel" class="btn-btn"><span data-bind="text: lang.lang.cancel">Cancel</span></span>
									<span id="saveNew" class="btn-btn" data-bind="click: save" ><span data-bind="text: lang.lang.save">Save</span></span>		
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="waterImport" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden;">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>	
					</div>
			        <h2 style="padding:0 15px;">Import</h2>
					<br />
		
					<!-- Tabs -->
					<div class="relativeWrap" data-toggle="source-code">
						<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
						
							<!-- Tabs Heading -->
							<div class="widget-head">
								<ul style="padding-left: 1px;">
									<li class="active"><a class="glyphicons group" href="#tabContact" data-toggle="tab"><i></i><span style="line-height: 55px;">Customer</span></a></li>
								</ul>
							</div>
							<!-- // Tabs Heading END -->
							
							<div class="widget-body">
								<div class="tab-content">
									<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 70%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
										<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
									</div>
									<!-- Tab content -->
									<div id="tabContact" style="border: 1px solid #ccc" class="tab-pane active widget-body-regular">
										
										<h4 class="separator bottom" style="margin-top: 10px;">Please upload customer list file</h4>
										<a data-bind="click: exportEXCEL">
											<span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 200px!important;position: absolute;top: 85px;right: 10px;">
												<i></i> 
												<span >Download Example file</span>
											</span>
										</a>
										<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
										  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onSelected}" id="myFile"  class="margin-none" />
										</div>
										<span class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 160px!important;"><i></i>
										<span data-bind="click: save">Start Import</span></span>
									</div>
									<!-- // Tab content END -->
								</div>
							</div>
							<div id="ntf1" data-role="notification"></div>
						</div>
					</div>
					<!-- // Tabs END -->
				</div>
			</div>
		</div>
	</div>
</script>

<script id="runBill" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2 data-bind="text: lang.lang.run_bill"></h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>

						<div class="row" style="clear:both;">
				        	<div class="col-sx-12 col-sm-2">
								<!-- Group -->
								<div class="control-group">								
									<label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
						            <input type="text" 
					                	style="width: 100%;" 
					                	data-role="datepicker"
					                	data-format="MM-yyyy"
					                	data-start="year" 
						  				data-depth="year" 
					                	placeholder="Moth of ..." 
							           	data-bind="value: monthSelect" />
								</div>
																									
									<!-- // Group END -->
							</div>	
							<div class="col-sx-12 col-sm-2">
								<div class="control-group">								
									<label ><span data-bind="text: lang.lang.license">License</span></label>
									<input 
										data-role="dropdownlist" 
										style="width: 100%;" 
										data-option-label="License ..." 
										data-auto-bind="false" 
										data-value-primitive="true" 
										data-text-field="name" 
										data-value-field="id" 
										data-bind="
											value: licenseSelect,
		                  					source: licenseDS,
		                  					events: {change: licenseChange}">
		                  		</div>
							</div>
							<div class="col-sx-12 col-sm-2">
								<div class="control-group">								
									<label ><span data-bind="text: lang.lang.location">Location</span></label>
									<input 
										data-role="dropdownlist" 
										style="width: 100%;" 
										data-option-label="Location ..." 
										data-auto-bind="false" 
										data-value-primitive="true" 
										data-text-field="name" 
										data-value-field="id" 
										data-bind="
											value: blocSelect,
											enabled: haveLicense,
											events: {change: onLocationChange},
		                  					source: blocDS">
		                  		</div>
							</div>
							<div class="col-sx-12 col-sm-2">
								<div class="control-group">								
									<label ><span data-bind="text: lang.lang.sub_location">Location</span></label>
									<input 
										data-role="dropdownlist" 
										style="width: 100%;" 
										data-option-label="Sub Location ..." 
										data-auto-bind="false" 
										data-value-primitive="true" 
										data-text-field="name" 
										data-value-field="id" 
										data-bind="
											value: subLocationSelect,
											enabled: haveLocation,
											events: {change: onSubLocationChange},
		                  					source: subLocationDS">
		                  		</div>
							</div>
							<div class="col-sx-12 col-sm-2">
								<div class="control-group">								
									<label ><span data-bind="text: lang.lang.box">Location</span></label>
									<input 
										data-role="dropdownlist" 
										style="width: 100%;" 
										data-option-label="Box ..." 
										data-auto-bind="false" 
										data-value-primitive="true" 
										data-text-field="name" 
										data-value-field="id" 
										data-bind="
											value: boxSelect,
											enabled: haveSubLocation,
		                  					source: boxDS">
		                  		</div>
							</div>
							<div class="col-sx-12 col-sm-1">
								<div class="control-group">	
									<label ><span data-bind="text: lang.lang.action">Action</span></label>	
									<div class="row" style="margin: 0;">					
										<button type="button" data-role="button" data-bind="click: search" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
									</div>
		                  		</div>
							</div>
				        </div>

				        <div class="row saleSummaryCustomer" style="margin-top: 15px;">
				        	<div class="col-sm-12" >
					        	<div class="row">
									<div class="col-xs-12 col-sm-4">
										<div class="total-customer" style="width: 100%; background: #f4f5f8; padding: 15px; margin-bottom: 15px;">											
											<p data-bind="text: lang.lang.total_number_of_invoice">Total Number of Invoices</p>
											<span data-bind="text: totalOfInv"></span>
										</div>
									</div>
									<div class="col-xs-12 col-sm-4">
										<div class="total-customer" style="width: 100%; background: #f4f5f8; padding: 15px; margin-bottom: 15px;">
											<p>m<sup>3</sup>/kWh <span style="font-size: 12px;font-weight: normal;" data-bind="text: lang.lang.sold">Sold</span></p>
											<span data-bind="text: meterSold"></span>
										</div>
									</div>
									<div class="col-xs-12 col-sm-4">
										<div class="total-customer" style="width: 100%; background: #f4f5f8; padding: 15px;">											
											<p data-bind="text: lang.lang.amount">Amount</p>
											<span data-bind="text: amountSold"></span>											
										</div>
									</div>
								</div>
							</div>							
						</div>

						<div class="row-fluid" style="margin-bottom: 15px">
				        	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
						        <thead>
						            <tr>
						                <th align="center" style="text-align: center; vertical-align: top;"><input type="checkbox" data-bind="checked: chkAll, events: {change : checkAll}" /></th>                
						                <th style="vertical-align: top;"><span data-bind="text: lang.lang.customer">Customer</span></th>		         
						                <th style="vertical-align: top;"><span data-bind="text: lang.lang.meter">Meter</span></th>
						                <th style="vertical-align: top;"><span data-bind="text: lang.lang.previous">Previous</span></th>
						                <th style="vertical-align: top;"><span data-bind="text: lang.lang.current">Current</span></th>
						                <th style="vertical-align: top;"><span data-bind="text: lang.lang.total">Total</span></th>	                    
						            </tr>
						        </thead>
						        <tbody data-role="listview" 
						        		data-template="runbill-row-template" 
						        		data-auto-bind="false" 
						        		data-bind="source: invoiceDS"></tbody>
						        <tfoot data-template="runbill-footer-template" 
							        		data-bind="source: this"></tfoot>	            
						    </table>
						    <div id="pager" class="k-pager-wrap"
						    	 data-auto-bind="false"
					             data-role="pager" data-bind="source: invoiceDS"></div>
				        </div>

				        <div class="row" style="margin-bottom: 15px;">
				        	<div class="col-xs-12 col-sm-3">
								<!-- Group -->
								<div class="control-group">								
									<label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
						            <input type="text" 
					                	style="width: 100%;" 
					                	data-role="datepicker"
					                	data-format="MM-yyyy"
					                	data-start="year" 
						  				data-depth="year" 
						  				data-parse-formats="yyyy-MM-dd HH:mm:ss"
					                	placeholder="Moth of ..." 
							           	data-bind="value: FmonthSelect,
							           			events: {change: makeBilled}" />
								</div>	
							</div>
							<div class="col-xs-12 col-sm-3">
								<div class="control-group">								
									<label ><span data-bind="text: lang.lang.billing_date">Billing Date</span></label>
									<input type="text" 
					                	style="width: 100%;" 
					                	data-role="datepicker"
					                	data-format="dd-MM-yyyy"
					                	placeholder="Bill Date ..." 
					                	data-parse-formats="yyyy-MM-dd HH:mm:ss"
							           	data-bind="value: BillingDate,
							           	events: {change: makeBilled}" />
		                  		</div>
							</div>	
							<div class="col-xs-12 col-sm-3">
								<div class="control-group">								
									<label ><span data-bind="text: lang.lang.due_date">Due Date</span></label>
									<input type="text" 
					                	style="width: 100%;" 
					                	data-role="datepicker"
					                	data-format="dd-MM-yyyy"
					                	placeholder="Due Date ..." 
					                	data-parse-formats="yyyy-MM-dd HH:mm:ss"
							           	data-bind="value: DueDate,
							           	events: {change: makeBilled}" />
		                  		</div>
							</div>	
							<div class="col-xs-12 col-sm-3">
								<div class="control-group">								
									<label ><span data-bind="text: lang.lang.issue_date">Issue Date</span></label>
									<input type="text" 
					                	style="width: 100%;" 
					                	data-role="datepicker"
					                	data-format="dd-MM-yyyy"
					                	data-parse-formats="yyyy-MM-dd HH:mm:ss"
					                	placeholder="Issue Date ..." 
							           	data-bind="value: IssueDate,
							           	events: {change: makeBilled}" />
		                  		</div>
							</div>
			        	</div>

			        	<div class="box-generic bg-action-button">
							<div id="ntf1" data-role="notification"></div>
					        <div class="row">
								<div class="span12" align="right">
									<span class="btn-btn" data-bind="click: save, visible: showButton" ><i></i> <span data-bind="text: lang.lang.run_bill">Run Bill</span></span>									
									<span class="btn-btn" data-bind="click: cancel" ><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>		  	
</script>
<script id="runbill-row-template" type="text/x-kendo-tmpl">
	<tr>
		<td align="center">
		   <input type="checkbox" data-bind="checked: invoiced, events: {change: makeInvoice}" />
		</td>						
		<td>#= contact.name#</td>		
		<td>#= meter.meter_number#</td>
		<td class="right">#= items[0].line.prev #</td>
		<td class="right">#= items[0].line.current #</td>		
		<td class="right">#= items[0].line.current - items[0].line.prev # </td>		
    </tr>
</script>
<script id="runbill-footer-template" type="text/x-kendo-template">
    <tr>    	
        <td class="right" colspan="8" style="font-size:30px;">
            <span data-bind="text: lang.lang.total"></span>: <span data-bind="text: meterSold"></span>  m<sup>3</sup>/kWh
        </td>
    </tr>
</script>
<script id="printBill" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2 data-bind="text: lang.lang.print_bill">Print Bill</h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>

						<div class=" row" style="clear:both;">
				        	<div class="col-sx-12 col-sm-2"">
								<!-- Group -->
								<div class="control-group">
									<label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
						            <input type="text" 
					                	style="width: 100%;" 
					                	data-role="datepicker"
					                	data-format="MM-yyyy"
					                	data-start="year" 
						  				data-depth="year" 
					                	placeholder="Moth of ..." 
							           	data-bind="value: monthSelect" />
								</div>
								<!-- // Group END -->
							</div>
							<div class="col-sx-12 col-sm-2"" >
								<div class="control-group">
									<label ><span data-bind="text: lang.lang.license">License</span></label>
									<input 
										data-role="dropdownlist" 
										style="width: 100%;" 
										data-option-label="License ..." 
										data-auto-bind="false" 
										data-value-primitive="true" 
										data-text-field="name" 
										data-value-field="id" 
										data-bind="
											value: licenseSelect,
		                  					source: licenseDS,
		                  					events: {change: licenseChange}">
		                  		</div>
							</div>
							<div class="col-sx-12 col-sm-2"">
								<div class="control-group">								
									<label ><span data-bind="text: lang.lang.location">Location</span></label>
									<input 
										data-role="dropdownlist" 
										style="width: 100%;" 
										data-option-label="Location ..." 
										data-auto-bind="false" 
										data-value-primitive="true" 
										data-text-field="name" 
										data-value-field="id" 
										data-bind="
											value: blocSelect,
											enabled: haveLicense,
											events: {change: onLocationChange},
		                  					source: blocDS">
		                  		</div>
							</div>
							<div class="col-sx-12 col-sm-2"">
								<div class="control-group">								
									<label ><span data-bind="text: lang.lang.sub_location">Location</span></label>
									<input 
										data-role="dropdownlist" 
										style="width: 100%;" 
										data-option-label="Sub Location ..." 
										data-auto-bind="false" 
										data-value-primitive="true" 
										data-text-field="name" 
										data-value-field="id" 
										data-bind="
											value: subLocationSelect,
											enabled: haveLocation,
											events: {change: onSubLocationChange},
		                  					source: subLocationDS">
		                  		</div>
							</div>
							<div class="col-sx-12 col-sm-2"">
								<div class="control-group">								
									<label ><span data-bind="text: lang.lang.box">Location</span></label>
									<input 
										data-role="dropdownlist" 
										style="width: 100%;" 
										data-option-label="Box ..." 
										data-auto-bind="false" 
										data-value-primitive="true" 
										data-text-field="name" 
										data-value-field="id" 
										data-bind="
											value: boxSelect,
											enabled: haveSubLocation,
		                  					source: boxDS">
		                  		</div>
							</div>
							<div class="col-sx-12 col-sm-2"">
								<div class="control-group">	
									<label ><span data-bind="text: lang.lang.action">Action</span></label>	
									<div class="row" style="margin: 0;">					
										<button type="button" data-role="button" data-bind="click: search" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
										<button type="button" data-role="button" data-bind="click: ExportExcel" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="charts"></i> Export EX</button>
									</div>
		                  		</div>
							</div>
				        </div>

				        <div class="row saleSummaryCustomer" style="margin-top: 15px;">
				        	<div class="col-sm-6" >
					        	<div class="row">
									<div class="col-sm-4">
										<div class="total-customer" style="width: 100%; background: #f4f5f8; padding: 15px; margin-bottom: 15px;">
											<p data-bind="text: lang.lang.total_invoice">Total Invoice</p>
											<span data-bind="text: totalInv"></span>												
										</div>
									</div>
									<div class="col-sm-4">
										<div class="total-customer" style="width: 100%; background: #f4f5f8; padding: 15px; margin-bottom: 15px;">
											<p data-bind="text: lang.lang.no_print">No Print</p>
											<span data-bind="text: noPrint, click: goNoPrint" style="cursor: pointer;"></span>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="total-customer" style="width: 100%; background: #f4f5f8; padding: 15px; margin-bottom: 15px;">
											<p>m<sup>3</sup>/kWh</p>
											<span data-bind="text: totalMeter"></span>												
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6" >
								<div class="total-customer" style="background: #203864; color: #fff; padding: 15px;">
									<p data-bind="text: lang.lang.amount">Amount</p>
									<span data-bind="text: amountTotal"></span>
								</div>
							</div>
						</div>

						<div class="row-fluid" style="margin-bottom: 15px" data-bind="visible: selectInv">
				        	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
						        <thead>
						            <tr>
						                <th style="text-align:center"><input type="checkbox" data-bind="checked: chkAll, events: {change : checkAll}" /></th>                
						                <th><span data-bind="text: lang.lang.customer">Customer</span></th>		         
						                <th><span data-bind="text: lang.lang.number">Number</span></th>
						                <th align="center"><span >Usage</span></th>
						                <th align="right"><span data-bind="text: lang.lang.amount">Amount</span></th>
						            </tr>
						        </thead>
						        <tbody data-role="listview" 
						        		data-template="printbill-row-template" 
						        		data-auto-bind="false" 
						        		data-bind="source: invoiceCollection.dataSource"></tbody>
						        <tfoot data-template="printbill-footer-template" 
							        		data-bind="source: this"></tfoot>	            
						    </table>				       	
				        </div>

				        <div class="box-generic bg-action-button">
							<div id="ntf1" data-role="notification"></div>
					        <div class="row">
					        	<div class="col-sm-3">
									<input data-role="dropdownlist"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-auto-bind="false"
						                   data-bind="value: TemplateSelect,
						                              source: txnTemplateDS"
						                   data-option-label="Select Template..." />
								</div>
								<div class="col-sm-9" align="right">
									<span class="btn-btn" data-bind="click: cancel" ><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
									<span class="btn-btn" data-bind="click: printBill" ><i></i> <span data-bind="text: lang.lang.print_bill">Print Bill</span></span>									
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>	  	
</script>
<script id="printbill-row-template" type="text/x-kendo-tmpl">
	<tr>
		<td align="center"><input type="checkbox" data-bind="checked: printed, events: {change: isCheck}" /></td>
		<td>#= contact.name#</td>
		<td>#= meter.meter_number#</td>
		<td align="center">#= consumption#</td>
		<td align="right">#= kendo.toString(amount, "c0", locale)#</td>
	</tr>
</script>
<script id="printbill-footer-template" type="text/x-kendo-template">
    <tr>    	
        <td class="right" colspan="8" style="font-size:30px;">
            <span data-bind="text: lang.lang.total"></span>: <span data-bind="text: totalMeter"></span>m<sup>3</sup>/kWh
        </td>
    </tr>
</script>
<script id="InvoicePrint" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div style="clear:both;position: relative;">
							<h2 data-bind="text: lang.lang.invoice_preview">Invoice Preview</h2>
							<div class="hidden-print pull-right">
					    		<span class="glyphicons no-js remove_2" 
									data-bind="click: cancel"><i></i></span>
							</div>
						</div>

						<span id="savePrint" class="btn btn-icon btn-primary glyphicons print" data-bind="click: printGrid" style="width: 120px; margin-bottom: 15px; float: none; clear: both;"><i></i><span data-bind="text: lang.lang.save_pdf">Save PDF</span></span>
						<div class="clear"></div>

						<div id="wInvoiceContent" style="margin-bottom: 15px;"></div>

						<!-- Form actions -->
						<div class="box-generic bg-action-button" align="right">
							<span id="notification"></span>
							<span class="btn-btn" data-bind="click: cancel" ><span data-bind="text: lang.lang.cancel">Cancel </span></span>	
							<span id="savePrint" class="btn-btn" data-bind="click: printGrid"><span data-bind="text: lang.lang.save_pdf">Save PDF</span></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="InvoiceFormTemplate1" type="text/x-kendo-tmpl">	
  	<div class="container winvoice-print" style="page-break-after: always;width: 800px;min-height: 1120px;position: relative;">
		<div class="span12 headerinv " style="border-bottom: 2px solid \#000;padding: 15px 0;padding-bottom: 30px;#= banhji.InvoicePrint.formVisible#">
            <img class="logoP" style="position: absolute;left: 0;top: 20px;width: auto;height: 90px;" src="#: banhji.InvoicePrint.license.image_url#" alt="#: banhji.InvoicePrint.license.name#" title="#: banhji.InvoicePrint.license.name#" />
			<div class="span12" align="center">
				<h4 style="line-height: 40px;">#: banhji.InvoicePrint.license.name#</h4>					
				<h5 style="line-height: 30px;">#: banhji.InvoicePrint.license.address# 
				<br>
				#:typeof banhji.InvoicePrint.license.mobile != 'undefined' ? banhji.InvoicePrint.license.mobile: ''#</h5>					
			</div>
		</div>
		<div class="span12 cover-customer">
			<div class="span6">
				<span id="secondwnumber#= id#" style="margin-left: -14px; float: left;"></span><br />
				<div class="span12">
					<p>អតិថិជន​ #=contact.number#</p>
					<p>#:contact.name#</p>
					<p>#: contact.address #</p>
					<p style="font-size: 10px;"><i>ថ្ងៃ​ចាប់​ផ្តើម​ទទួល​ប្រាក់ #=kendo.toString(new Date(bill_date), "dd-MMMM-yyyy", "km-KH")#</i></p>
				</div>
			</div>
			<div class="span5">
				<table >
					<tr>
						<td width="140" style><p>លេខ​វិក្កយ​បត្រ</p></td>
						<td><p>#:number#-#=banhji.institute.id#</p></td>
					</tr>
					<tr>
						<td style><p>ថ្ងៃ​ចេញ វិក្កយ​បត្រ</p></td>
						<td><p>#=kendo.toString(new Date(issue_date), "dd-MMMM-yyyy", "km-KH")#</p></td>
					</tr>
					<tr>
						<td style><p>តំបន់</p></td>
						<td><p>#:meter.location[0].abbr# - #:meter.location[0].name# #:meter.box#</p></td>
					</tr>
					<tr>
						<td style><p>គិត​ចាប់​ពី​ថ្ងៃ​ទី</p></td>
						<td><p>#=kendo.toString(new Date(invoice_lines[0].from_date), "dd-MMMM-yyyy", "km-KH")#</p></td>
					</tr>
					<tr>
						<td style><p>ដល់​ថ្ងៃ​ទី</p></td>
						<td><p>#=kendo.toString(new Date(invoice_lines[0].to_date), "dd-MMMM-yyyy", "km-KH")#</p></td>
					</tr>
				</table>		
			</div>
		</div>
		<table class="span12 table table-bordered footerTbl" style="padding:0;margin-top: 40px; border-radius: 3px;border-collapse: inherit;margin-left: 0px;#= banhji.InvoicePrint.formBorder#">
			<thead style>
				<tr>
					<th class="darkbblue main-color" style="width: 20%;background-color: #: formcolor #!important;border:none!important; vertical-align: top;">លេខ​កុងទ័រ<br>METER</th>
					<th class="darkbblue main-color" style="width: 15%;background-color: #: formcolor #!important;border:none!important; vertical-align: top;">អំណានចាស់<br>PREVIOUS</th>
					<th class="darkbblue main-color" style="width: 15%;background-color: #: formcolor #!important;border:none!important; vertical-align: top;">អំណានថ្មី<br>CURRENT</th>
					<th class="darkbblue main-color" style="width: 15%;background-color: #: formcolor #!important;border:none!important; vertical-align: top;">បរិមាណ<br>CONSUMPTION</th>
					<th class="darkbblue main-color" style="background-color: #: formcolor #!important;border:none!important; vertical-align: top;">តំលៃឯកត្តា<br>RATE</th>
					<th class="darkbblue main-color" style="background-color: #: formcolor #!important;border:none!important; vertical-align: top;">តំលៃសរុប<br>AMOUNT</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="vertical-align: middle;"></td>
					<td colspan="4" style="text-align: right">
						ជំពាក់​សរុប​នៅ​ថ្ងៃ​ធ្វើ​វិក្កយបត្រ Balance as at billing date .
					</td>
					<td align="right">
						#: kendo.toString(amount_remain, locale=="km-KH"?"c0":"c", locale)#
					</td>
				</tr>
				<tr>
					<td>#: meter.location[0].abbr# - #: meter.meter_number#</td>
					<td align="center"><strong>#: invoice_lines[0].previous#</strong></td>
					<td align="center"><strong>#: invoice_lines[0].current#</strong></td>
					<td align="center"><strong>#: invoice_lines[0].consumption#</strong></td>
					<td></td>
					<td></td>
				</tr>
				#for(var j=1; j< invoice_lines.length; j++) {#
					#if(invoice_lines[j].amount != 0) {#
						#if(invoice_lines[j].type == "tariff"){#
						#var amountTariff = invoice_lines[j].amount #
						#var amountTariffMoney = invoice_lines[j].amount * invoice_lines[0].consumption #
							<tr>
								<td colspan="3" align="left">#: invoice_lines[j].number#</td>
								<td align="center">#: invoice_lines[0].consumption#</td>
								<td align="right">#= kendo.toString(invoice_lines[j].amount, locale=="km-KH"?"c0":"c", locale)#</td>
								<td align="right">#= kendo.toString(amountTariffMoney, locale=="km-KH"?"c0":"c", locale)#</td>
							</tr>
						#}else if(invoice_lines[j].type == "exemption"){#
							<tr>
								<td colspan="3" align="left">#: invoice_lines[j].number#</td>
								#if(invoice_lines[j].unit == "money"){#
									<td align="center"></td>
									<td align="right"></td>
									<td align="right">-#= kendo.toString(invoice_lines[j].amount, locale=="km-KH"?"c0":"c", locale)#</td>
								#}else if(invoice_lines[j].unit == "%"){#
								#var AMM = (amountTariffMoney * invoice_lines[j].amount) / 100#
									<td align="center">#= invoice_lines[j].amount#%</td>
									<td align="center"></td>
									<td align="right">-#= kendo.toString(AMM, locale=="km-KH"?"c0":"c", locale)#</td>
								#}else{#
									<td align="center">#= invoice_lines[j].amount#</td>
									<td align="center"></td>
									<td align="right">-#= kendo.toString(invoice_lines[j].amount * amountTariff, locale=="km-KH"?"c0":"c", locale)#</td>
								#}#
							</tr>
						#}else if(invoice_lines[j].type == "fine"){#
						#}else{#
							<tr>
								<td colspan="3" align="left">#: invoice_lines[j].number#</td>
								<td align="center"></td>
								<td align="right"></td>
								<td align="right">#= kendo.toString(invoice_lines[j].amount, locale=="km-KH"?"c0":"c", locale)#</td>
							</tr>
						#}#
					# } #
				#}#
				<tr>
					<td colspan="5" style="padding-right: 10px;background: \\#355176;color: \\#fff;text-align: right;background-color: #: formcolor #!important;#= banhji.InvoicePrint.formVisible#" class="darkbblue main-color">បំណុល​សរុប TOTAL BALANCE</td>
					<td style="border: 1px solid;text-align: right">#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#</td>
				</tr>
				<tr>
					<td rowspan="4" colspan="3">#= banhji.InvoicePrint.license.term_of_condition#</td>
					<td colspan="2" class="greyy" style="background: \\#ccc;#= banhji.InvoicePrint.formVisible#">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td style="text-align: right"><strong>#= kendo.toString(amount + amount_remain, locale=="km-KH"?"c0":"c", locale)#</strong></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy"  style="background: \\#ccc;#= banhji.InvoicePrint.formVisible#">ថ្ងៃផុតកំណត់ DUE DATE</td>
					<td align="left">#=kendo.toString(new Date(due_date), "dd-MMMM-yyyy", "km-KH")#</td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;#= banhji.InvoicePrint.formVisible#">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td align="left"></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;#= banhji.InvoicePrint.formVisible#">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<div style="position: absolute;bottom:0; width: 768px;left: 15px;overflow: hidden;">
			<div class="line"></div>
			<table class="span12 table table-bordered footerTbl" style="padding:0;margin-bottom:15px;border-collapse: inherit;margin-top: 15px;border-radius: 3px;margin-left: 0px;#= banhji.InvoicePrint.formBorder#">
				<tbody style="border:none!important">
					<tr style="border:none!important">
						<td width="150"></td>
						<th width="300" style="border: none!important;">
							<span style="margin-left: -15px;border:none!important" id="footwnumber#:id#"></span>
						</th>
						<td width="270" class="greyy"  style="background: \\#ccc;border-bottom:1px solid \\#fff;#= banhji.InvoicePrint.formVisible#">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
						<td width="180" align="right"><strong>#= kendo.toString(amount + amount_remain, locale=="km-KH"?"c0":"c", locale)#</strong></td>
					</tr>
					<tr>
						<td style><p>វិក្កយបត្រ</p></td>
						<td>#: kendo.toString(new Date(issue_date), "dd-MMMM-yyyy", "km-KH")# - #: number#</td>
						<td class="greyy" style="background: \\#ccc;border-bottom:1px solid \\#fff;#= banhji.InvoicePrint.formVisible#">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
						<td align="left"></td>
					</tr>
					<tr>
						<td style><p>អតិថិជន</p></td>
						<td>#=contact.number# #=contact.name#<br>#: contact.phone# #:contact.address#</td>
						<td class="greyy" style="background: \\#ccc;border-bottom:1px solid \\#fff;#= banhji.InvoicePrint.formVisible#">ប្រាក់បានបង់ PAY AMOUNT</td>
						<td></td>
					</tr>
					<tr>
						<td style>លេខ​ទី​តាំង</td>
						<td>#:meter.location[0].abbr# - #:meter.location[0].name#</td>
						<td rowspan="2" class="greyy" style="#= banhji.InvoicePrint.formVisible#background: \\#ccc;">អ្នកទទួលប្រាក់ RECEIVER</td>
						<td rowspan="2"></td>
					</tr>
					<tr>
						<td style>លេខ​កុង​ទ័រ</td>
						<td>#: meter.meter_number#</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</script>
<script id="InvoiceFormTemplate2" type="text/x-kendo-template">
	<div class="row-fluid" style="page-break-after: always;">
	    <div class="row-fluid" style="overflow: hidden;">
	    	<div class="span7 inv1" style="width: 517px; padding-right: 15px; padding-left: 8px; ">
	    		<div class="head" style="width: 100%; padding-top: 0;">
		        	<div class="logo" style="max-width: 150px;">
		            	<img class="logoP" style=" left: 0;top: 20px;max-width: 200px;" src="#: banhji.InvoicePrint.license.image_url#" alt="#: banhji.InvoicePrint.license.name#" title="#: banhji.InvoicePrint.license.name#" />
		            </div>
		            <div class="cover-name-company" style="width: 57%; margin-left: 15px;">
		            	<h2 style="text-align: left;">#: banhji.InvoicePrint.license.name#</h2>
		                <p style="font-size: 12px; color: \\#000;">#:typeof banhji.InvoicePrint.license.address != 'undefined' ? banhji.InvoicePrint.license.address: ''#</p>
		                <p style="font-size: 12px; color: \\#000;">#:typeof banhji.InvoicePrint.license.mobile != 'undefined' ? banhji.InvoicePrint.license.mobile: ''#</p>
		            </div>
		            <div class="cover-name-company" style="border-top: 1px solid \\#000; width: 57%; margin-left: 15px;padding-top: 10px;margin-top: 10px;">
		            	<h2 style="text-align: left;">#: contact.name#</h2>
		                <p style="font-size: 12px; color: \\#000;">#:typeof contact.address !='undefined' ? contact.address: ''#</p>
		                <p style="font-size: 12px; color: \\#000;">#:typeof contact.phone != 'undefined' ? contact.phone: ''#</p>
		                <p style="font-size: 12px; color: \\#000;">លេខកូដអតិថិជន #: contact.number#</p>
		            </div>
		        </div>
	    	</div>
	    	<div class="span5 " style="padding-left: 0; padding-right: 0px;float: right;">
	    		<div class="headertable-invoice">
		    		<table style="background-color: \#daeef3!important; ">
		    			<tr>
		    				<td>លេខវិក្កយបត្រ INVOICE NO</td>
		    				<td>
		    					<input type="text" style="background-color: \#fff!important; width: 220px;" value="#: number#">
		    				</td>
		    			</tr>
		    			<tr>
		    				<td>ថ្ងៃចេញ INVOICE DATE</td>
		    				<td>
		    					<input type="text" style="background-color: \#fff!important; width: 220px;" value='#=kendo.toString(new Date(issue_date), "dd-MMMM-yyyy", "km-KH")#'>
		    				</td>
		    			</tr>
		    			<tr>
		    				<td>តំបន់ AREA</td>
		    				<td>
		    					<input type="text" style="background-color: \#fff!important; width: 220px;" value="#:meter.location[0].abbr# - #:meter.location[0].name#">
		    				</td>
		    			</tr>
		    			<tr>
		    				<td>លេខប្រអប់ BOX NO</td>
		    				<td>
		    					<input type="text" style="background-color: \#fff!important; width: 220px;" value="#:meter.location[0].abbr# - #:meter.location[0].box#">
		    				</td>
		    			</tr>
		    		</table>
		    	</div>
	    	</div>
	    </div>

	    <div class="row-fluid">
	    	<div class="span7" style="float: left;">
	    		<p >ប្រវត្តិប្រើប្រាស់របស់អ្នក</p>
	    		<div class="tab-pane active" id="tab-1">
			        <div id="monthchart#= id#" style="height: 200px;"></div> 
	        	</div>
	    	</div>
	    	<div class="span4" style="margin-top: 15px;float:right;">
	    		
	    		<span id="secondwnumber#= id#"" style="width: 180px; height: auto; float: right;"></span><br>
	    		<p style="text-align: right;clear: both;margin-top: 10px; float: right;font-size: 20px; ">ប្រាក់ត្រូវបង់សរុប</p><br>

	    		<p style="padding: 8px;margin-bottom: 10px; background: \\#fff; border: 5px solid \\#000; width: 254px; float: right;font-size: 15px; color: \\#000;font-weight: 600; text-align: center; ">#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#</p><br>

	    		<p style="text-align: right;margin-left: 30px; float: right; margin-bottom: 0;">សូមអញ្ជើញមកបង់ប្រាក់ អោយបានមុនថ្ងៃផុតកំនត់ទី</p><br>

	    		<p style="margin-left: 40%; float: right; font-weight: 600;">#=kendo.toString(new Date(due_date), "dd-MMMM-yyyy", "km-KH")#</p>

	    	</div>
	    </div>

	    <div class="row-fluid">
	    	<div class="table-content" style="border: 2px solid \\#30859C; border-radius: 10px; padding: 10px; margin: 10px 8px; font-weight: 600; float: left;">
	    		<p style="color: \\#30859C;">ការប្រើប្រាស់របស់អ្នកក្នុងរយះពេលពី​  <span style="color: \\#000;">#=kendo.toString(new Date(invoice_lines[0].from_date), "dd-MMMM-yyyy", "km-KH")#</span> ដល់ <span style="color: \\#000;">#=kendo.toString(new Date(invoice_lines[0].to_date), "dd-MMMM-yyyy", "km-KH")#</span></p>
	    		<table>
	    			<thead>
	    				<tr>
							<th width="180" class="darkbblue main-color" style="background-color: #: formcolor #!important;border:none!important">លេខ​កុងទ័រ<br>METER</th>
							<th width="150" class="darkbblue main-color" style="background-color: #: formcolor #!important;border:none!important">អំណានចាស់<br>PREVIOUS</th>
							<th width="120" class="darkbblue main-color" style="background-color: #: formcolor #!important;border:none!important">អំណានថ្មី<br>CURRENT</th>
							<th width="120" class="darkbblue main-color" style="background-color: #: formcolor #!important;border:none!important">បរិមាណ<br>CONSUMPTION</th>
							<th width="120" class="darkbblue main-color" style="background-color: #: formcolor #!important;border:none!important">តំលៃឯកត្តា<br>RATE</th>
							<th width="180" class="darkbblue main-color" style="background-color: #: formcolor #!important;border:none!important">តំលៃសរុប<br>AMOUNT</th>
						</tr>
	    			</thead>
	    			<tbody>
						<tr>
							<td style="vertical-align: middle;"></td>
							<td colspan="4" style="text-align: right">
								ជំពាក់​សរុប​នៅ​ថ្ងៃ​ធ្វើ​វិក្កយបត្រ Balance as at billing date .
							</td>
							<td align="right">
								#: kendo.toString(amount_remain, locale=="km-KH"?"c0":"c", locale)#
							</td>
						</tr>
						<tr>
							<td>#: meter.location[0].abbr# - #: meter.meter_number#</td>
							<td align="center"><strong>#: invoice_lines[0].previous#</strong></td>
							<td align="center"><strong>#: invoice_lines[0].current#</strong></td>
							<td align="center"><strong>#: invoice_lines[0].consumption#</strong></td>
							<td></td>
							<td></td>
						</tr>

						#for(var j=1; j< invoice_lines.length; j++) {#
							#if(invoice_lines[j].amount != 0) {#
								#if(invoice_lines[j].type == "tariff"){#
								#var amountTariff = invoice_lines[j].amount ;#
								#var amountTariffMoney = invoice_lines[j].amount * invoice_lines[0].consumption ;#
									<tr>
										<td colspan="3" align="left">#: invoice_lines[j].number#</td>
										<td align="center">#: invoice_lines[0].consumption#</td>
										<td align="right">#= kendo.toString(invoice_lines[j].amount, locale=="km-KH"?"c0":"c", locale)#</td>
										<td align="right">#= kendo.toString(amountTariffMoney, locale=="km-KH"?"c0":"c", locale)#</td>
									</tr>
								#}else if(invoice_lines[j].type == "exemption"){#
									<tr>
										<td colspan="3" align="left">#: invoice_lines[j].number#</td>
										#if(invoice_lines[j].unit == "money"){#
											<td align="center"></td>
											<td align="right"></td>
											<td align="right">-#= kendo.toString(invoice_lines[j].amount, locale=="km-KH"?"c0":"c", locale)#</td>
										#}else if(invoice_lines[j].unit == "%"){#
										#var AMM = (amountTariffMoney * invoice_lines[j].amount) / 100;#
											<td align="center">#= invoice_lines[j].amount#%</td>
											<td align="center"></td>
											<td align="right">-#= kendo.toString(AMM, locale=="km-KH"?"c0":"c", locale)#</td>
										#}else{#
											<td align="center">#= invoice_lines[j].amount#</td>
											<td align="center"></td>
											<td align="right">-#= kendo.toString(invoice_lines[j].amount * amountTariff, locale=="km-KH"?"c0":"c", locale)#</td>
										#}#
									</tr>
								#}else{#
									<tr>
										<td colspan="3" align="left">#: invoice_lines[j].number#</td>
										<td align="center"></td>
										<td align="right"></td>
										<td align="right">#= kendo.toString(invoice_lines[j].amount, locale=="km-KH"?"c0":"c", locale)#</td>
									</tr>
								#}#
							# } #
						#}#	
						<tr>
							<td colspan="5" style="padding-right: 10px;background: \\#355176;color: \\#fff;text-align: right;background-color: #: formcolor #!important;#= banhji.InvoicePrint.formVisible#" class="darkbblue main-color">បំណុល​សរុប TOTAL BALANCE</td>
							<td style="border: 1px solid \\#000;text-align: right">#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#</td>
						</tr>
						<tr>
							<td rowspan="4" colspan="3">#= banhji.InvoicePrint.license.term_of_condition#</td>
							<td colspan="2" class="greyy" style="background: \\#ccc;#= banhji.InvoicePrint.formVisible#">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
							<td style="text-align: right"><strong>#= kendo.toString(amount + amount_remain, locale=="km-KH"?"c0":"c", locale)#</strong></td>
						</tr>
						<tr>
							<td colspan="2" class="greyy"  style="background: \\#ccc;#= banhji.InvoicePrint.formVisible#">ថ្ងៃផុតកំណត់ DUE DATE</td>
							<td align="left">#=kendo.toString(new Date(due_date), "dd-MMMM-yyyy", "km-KH")#</td>
						</tr>
						<tr>
							<td colspan="2" class="greyy" style="background: \\#ccc;#= banhji.InvoicePrint.formVisible#">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
							<td align="left">#=kendo.toString(new Date(bill_date), "dd-MMMM-yyyy", "km-KH")#</td>
						</tr>
						<tr>
							<td colspan="2" class="greyy" style="background: \\#ccc;#= banhji.InvoicePrint.formVisible#">ប្រាក់បានបង់ PAY AMOUNT</td>
							<td></td>
						</tr>
					</tbody>
	    			<tfoot>
	    				<tr>
	    					<td colspan="1" rowspan="5"></td>
	    					<td colspan="4">
	    						ប្រាក់ត្រូវបង់សរុប ខែនេះ
	    						<span style="font-size: 10px;">
	    							Total charge for this period
	    						</span>
	    					</td>
	    					<td colspan="2" >#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#</td>
	    				</tr>
	    				<tr>
	    					<td colspan="4">
	    						ប្រាក់ត្រូវបង់សរុប
	    						<span style="font-size: 10px;">
	    							Total amount due
	    						</span>
	    					</td>
	    					<td colspan="2">#= kendo.toString(amount + amount_remain, locale=="km-KH"?"c0":"c", locale)#</td>
	    				</tr>
	    				<tr>
	    					<td colspan="2" rowspan="3" style="vertical-align: middle;">
	    						<div style="margin: 0 auto; width: 92px; height: 92px; border: 1px solid \\#A8B8CB; border-radius: 50%;">
								</div>
	    					</td>
	    					<td colspan="2">ថ្ងៃដែលបានបង់ប្រាក់ PAY DATE</td>
	    					<td >#=kendo.toString(new Date(bill_date), "dd-MMMM-yyyy", "km-KH")#</td>
	    				</tr>
	    				<tr>
	    					<td colspan="2">ប្រាក់ដែលបានបង់ AMOUNT PAID</td>
	    					<td ></td>
	    				</tr>
	    				<tr>
	    					<td colspan="2">ហត្ថលេខា និងឈ្មោះរបស់បេឡាករ</td>
	    					<td ></td>
	    				</tr>
	    			</tfoot>
	    		</table>    		
	    	</div>    	
	    </div>

	    <div class="row-fluid" style="float: left; border-bottom: 2px dotted \\#B9CDE4;">
	    	<!-- <a style="float: left; margin-left: 15px; " class="glyphicons no-js share"><i></i></a> -->
			<div class="span11" style="padding-left: 0;">
	    		<!-- <p style="float: left; margin: 0; font-size: 11px; width: 100%;">#: banhji.InvoicePrint.license.term_of_condition #</p> -->
			</div>
		</div>

		<div class="row-fluid">
			<div class="invoice-footer" style="float: left; width: 100%; text-align: center;">
				<p style="text-align: center; margin-top: 10px; font-weight: 600; ">បង្កាន់ដៃបង់ប្រាក់ PAYMENT SLIP</p>
			</div>		
			<div class="span1" style="width: 108px;float: left;padding-right: 0;text-align: center;">
				<div style="float: left; width: 92px; height: 92px; margin:0 0 5px 0; border: 1px solid \\#A8B8CB; border-radius: 50%;">
				</div>
				<p style="font-size: 10px; float: left;">ហត្ថលេខា និងត្រា របស់បេឡាករ </p>
				<p style="display: inline-block; text-align: center; margin-top: 40px; border-bottom: 1px solid \\#000; width: 75px;"></p>
			</div>
			<div class="row-fluid" style="width: 85%;float: left;clear: initial; margin-left: 15px;">
				<div class="span4" style="width: 30%; margin-right: 20px;">
					<p style="text-align: center; font-size: 12px; margin-bottom: 5px;">លេខវិក្កយបត្រ INVOICE NO</p>
					<p style="padding: 11px 8px 11px; background: \\#fff; margin-bottom: 0; border: 1px solid \\#A8B8CB; width: 253px; float: left;font-size: 15px; color: \\#000;font-weight: 600; text-align: center; ">#: number#</p> 
				</div>
				<div class="span4" style="width: 30%; margin-right: 20px;">
					<p style="text-align: center; font-size: 12px; margin-bottom: 5px;">ប្រាក់ត្រូវបង់ AMOUNT DUE</p>
					<p style="padding: 8px; background: \\#fff; margin-bottom: 0; border: 1px solid \\#A8B8CB; width: 253px; float: left;font-size: 15px; color: \\#000;font-weight: 600; text-align: center; ">#= kendo.toString(amount + amount_remain, locale=="km-KH"?"c0":"c", locale)#</p> 
				</div>
				<div class="span4" style="width: 30%; margin-right: 20px;">
					<p style="text-align: center; font-size: 12px; margin-bottom: 5px;">ថ្ងៃបង់ប្រាក់ PAY DATE</p>
					<p style="padding: 8px; background: \\#fff; margin-bottom: 0; border: 1px solid \\#A8B8CB; width: 253px; float: left;font-size: 15px; color: \\#000;font-weight: 600; text-align: center; ">#=kendo.toString(new Date(bill_date), "dd-MMMM-yyyy", "km-KH")#</p> 
				</div>
			</div>

			<div class="row-fluid" style="width: 84%;float: left;clear: initial; margin-left: 15px;margin-top: 10px;">
				<div class="span6">
					<p style="float: left; margin-left: 15px; margin-top: 5px; clear: both;"><b>#: contact.name#</b> <br/> #: contact.address#</p>
					<div style=" float: left;">
			    		<span style="width: 257px; height: auto;"  id="footwnumber#:id#"></span>
			    		<p style="margin-bottom: 0; margin-top: 5px; font-size: 12px; margin-left: 15px;">លេខកូដអតិថិជន #: contact.number#</p>
			    	</div>
			    </div>
			    <div class="span6" style="padding: 0; width: 46%;">
			    	<p style="text-align: center; font-size: 12px; margin-bottom: 0px; margin-top: 8px;float: right;">ប្រាក់បានបង់ AMOUNT DUE</p>
			    	<p style="padding: 8px; height: 25px; background: \\#fff; margin-bottom: 0; border: 5px solid \\#000; width: 254px; float: right;font-size: 15px; color: \\#000;font-weight: 600; text-align: center; "></p>
			    	<p style="font-size: 11px; font-weight: 600; margin-top: 10px; float: right;">#: banhji.InvoicePrint.license.name #</p>
			    </div>
			</div>
		</div>
	</div>
</script>
<script id="InvoiceFormElectric" type="text/x-kendo-tmpl">	
  	<div class="container winvoice-print" style="page-break-after: always;width: 800px;">
		<div class="span12 headerinv " style="border-bottom: 2px solid \#000;padding: 15px 0;padding-bottom: 30px;#= banhji.InvoicePrint.formVisible#">
            <img class="logoP" style="position: absolute;left: 0;top: 20px;width: auto;height: 90px;" src="#: banhji.InvoicePrint.license.image_url#" alt="#: banhji.InvoicePrint.license.name#" title="#: banhji.InvoicePrint.license.name#" />
			<div class="span12" align="center">
				<h4 style="line-height: 40px;">#: banhji.InvoicePrint.license.name#</h4>					
				<h5 style="line-height: 30px;">#: banhji.InvoicePrint.license.address# 
				<br>
				#:typeof banhji.InvoicePrint.license.mobile != 'undefined' ? banhji.InvoicePrint.license.mobile: ''#</h5>					
			</div>
		</div>
		<div class="span12 cover-customer">
			<div class="span6">
				<span id="secondwnumber#= id#" style="margin-left: -14px; float: left;"></span><br />
				<div class="span12">
					<p>អតិថិជន​ #=contact.number#</p>
					<p>#:contact.name#</p>
					<p>#: contact.address != 'null' ? contact.address: ''#</p>
					<p style="font-size: 10px;"><i>ថ្ងៃ​ចាប់​ផ្តើម​ទទួល​ប្រាក់ #=kendo.toString(new Date(bill_date), "dd-MMMM-yyyy", "km-KH")#</i></p>
				</div>
			</div>
			<div class="span5">
				<table >
					<tr>
						<td width="140" style><p>លេខ​វិក្កយ​បត្រ</p></td>
						<td><p>#:number#-#=banhji.institute.id#</p></td>
					</tr>
					<tr>
						<td style><p>ថ្ងៃ​ចេញ វិក្កយ​បត្រ</p></td>
						<td><p>#=kendo.toString(new Date(issue_date), "dd-MMMM-yyyy", "km-KH")#</p></td>
					</tr>
					<tr>
						<td style><p>តំបន់</p></td>
						<td><p>#:meter.location[0].name#</p></td>
					</tr>
					<tr>
						<td style><p>លេខប្រអប់</p></td>
						<td><p>#:meter.box#</p></td>
					</tr>
					<tr>
						<td style><p>គិត​ចាប់​ពី​ថ្ងៃ​ទី</p></td>
						<td><p>#=kendo.toString(new Date(invoice_lines[0].from_date), "dd-MMMM-yyyy", "km-KH")#</p></td>
					</tr>
					<tr>
						<td style><p>ដល់​ថ្ងៃ​ទី</p></td>
						<td><p>#=kendo.toString(new Date(invoice_lines[0].to_date), "dd-MMMM-yyyy", "km-KH")#</p></td>
					</tr>
				</table>		
			</div>
		</div>
		<table class="span12 table table-bordered footerTbl" style="padding:0;margin-top: 40px; border-radius: 3px;border-collapse: inherit;margin-left: 0px;#= banhji.InvoicePrint.formBorder#">
			<thead style>
				<tr>
					<th class="darkbblue main-color" style="width: 20%;background-color: #: formcolor #!important;border:none!important; vertical-align: top;">លេខ​កុងទ័រ<br>METER</th>
					<th class="darkbblue main-color" style="width: 15%;background-color: #: formcolor #!important;border:none!important; vertical-align: top;">អំណានចាស់<br>PREVIOUS</th>
					<th class="darkbblue main-color" style="width: 15%;background-color: #: formcolor #!important;border:none!important; vertical-align: top;">អំណានថ្មី<br>CURRENT</th>
					<th class="darkbblue main-color" style="width: 10%;background-color: #: formcolor #!important;border:none!important; vertical-align: top;">មេគុណ<br>Multi.</th>
					<th class="darkbblue main-color" style="width: 15%;background-color: #: formcolor #!important;border:none!important; vertical-align: top;">បរិមាណ<br>CONSUMPTION</th>
					<th class="darkbblue main-color" style="background-color: #: formcolor #!important;border:none!important; vertical-align: top;">តំលៃឯកត្តា<br>RATE</th>
					<th class="darkbblue main-color" style="background-color: #: formcolor #!important;border:none!important; vertical-align: top;">តំលៃសរុប<br>AMOUNT</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="vertical-align: middle;"></td>
					<td colspan="5" style="text-align: right">
						ជំពាក់​សរុប​នៅ​ថ្ងៃ​ធ្វើ​វិក្កយបត្រ Balance as at billing date .
					</td>
					<td align="right">
						#: kendo.toString(amount_remain, locale=="km-KH"?"c0":"c", locale)#
					</td>
				</tr>
				#if(invoice_lines[0].type == "meter") {#
					<tr>
						<td>#: invoice_lines[0].number#</td>
						<td align="center"><strong>#: invoice_lines[0].previous#</strong></td>
						<td align="center"><strong>#: invoice_lines[0].current#</strong></td>
						<td align="center"><strong>#: invoice_lines[0].rate#</strong></td>
						<td align="center"><strong>#: invoice_lines[0].consumption#</strong></td>
						<td></td>
						<td></td>
					</tr>
				#}else{#
					<tr>
						<td>#: meter.location[0].abbr# - #: meter.meter_number#</td>
						<td align="center"><strong>#: invoice_lines[0].previous#</strong></td>
						<td align="center"><strong>#: invoice_lines[0].current#</strong></td>
						<td align="center"><strong>#: meter.meter_multiplier#</strong></td>
						<td align="center"><strong>#: invoice_lines[0].consumption#</strong></td>
						<td></td>
						<td></td>
					</tr>
				# } #
				#for(var j=1; j< invoice_lines.length; j++) {#
					#if(invoice_lines[j].amount != 0) {#
						#if(invoice_lines[j].type == "tariff"){#
						#var amountTariff = invoice_lines[j].amount #
						#var amountTariffMoney = invoice_lines[j].amount * invoice_lines[0].consumption #
							<tr>
								<td colspan="4" align="left">#: invoice_lines[j].number#</td>
								<td align="center">#: invoice_lines[0].consumption * meter.meter_multiplier #</td>
								<td align="right">#= kendo.toString(invoice_lines[j].amount, locale=="km-KH"?"c0":"c", locale)#</td>
								<td align="right">#= kendo.toString(amountTariffMoney, locale=="km-KH"?"c0":"c", locale)#</td>
							</tr>
						#}else if(invoice_lines[j].type == "exemption"){#
							<tr>
								<td colspan="4" align="left">#: invoice_lines[j].number#</td>
								#if(invoice_lines[j].unit == "money"){#
									<td align="center"></td>
									<td align="right"></td>
									<td align="right">-#= kendo.toString(invoice_lines[j].amount, locale=="km-KH"?"c0":"c", locale)#</td>
								#}else if(invoice_lines[j].unit == "%"){#
								#var AMM = (amountTariffMoney * invoice_lines[j].amount) / 100#
									<td align="center">#= invoice_lines[j].amount#%</td>
									<td align="center"></td>
									<td align="right">-#= kendo.toString(AMM, locale=="km-KH"?"c0":"c", locale)#</td>
								#}else{#
									<td align="center">#= invoice_lines[j].amount#</td>
									<td align="center"></td>
									<td align="right">-#= kendo.toString(invoice_lines[j].amount * amountTariff, locale=="km-KH"?"c0":"c", locale)#</td>
								#}#
							</tr>
						#}else if(invoice_lines[j].type == "meter"){#
							<tr>
								<td>#: invoice_lines[j].number#</td>
								<td align="center"><strong>#: invoice_lines[j].previous#</strong></td>
								<td align="center"><strong>#: invoice_lines[j].current#</strong></td>
								<td align="center"><strong>#: invoice_lines[j].rate#</strong></td>
								<td align="center"><strong>#: invoice_lines[j].consumption#</strong></td>
								<td></td>
								<td></td>
							</tr>
						#}else if(invoice_lines[j].type == "total_usage"){#
							<tr>
								<td colspan="4" align="left">#: invoice_lines[j].number#</td>
								<td align="center">#:invoice_lines[j].amount#</td>
								<td align="center">#: kendo.toString(invoice_lines[j].price, locale=="km-KH"?"c0":"c", locale)#</td>
								<td align="right">#= kendo.toString(invoice_lines[j].amount * invoice_lines[j].price, locale=="km-KH"?"c0":"c", locale)#</td>
							</tr>
						#}else{#
							<tr>
								<td colspan="4" align="left">#: invoice_lines[j].number#</td>
								<td align="center"></td>
								<td align="right"></td>
								<td align="right">#= kendo.toString(invoice_lines[j].amount, locale=="km-KH"?"c0":"c", locale)#</td>
							</tr>
						#}#
					# } #
				#}#
				#var NU = 6;#
				#var k = NU - invoice_lines.length;#
				#if(k > 0){#
					#for(var z = 1; z < k; z++){#
						<tr>
							<td colspan="4" align="left">&nbsp;</td>
							<td align="center"></td>
							<td align="right"></td>
							<td align="right"></td>
						</tr>
					#}#
				#}#
				<tr>
					<td colspan="6" style="padding-right: 10px;background: \\#355176;color: \\#fff;text-align: right;background-color: #: formcolor #!important;#= banhji.InvoicePrint.formVisible#" class="darkbblue main-color">បំណុល​សរុប TOTAL BALANCE</td>
					<td style="border: 1px solid;text-align: right">#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#</td>
				</tr>
				<tr>
					<td rowspan="5" colspan="3">#= banhji.InvoicePrint.license.term_of_condition#</td>
					<td colspan="3" class="greyy" style="background: \\#ccc;#= banhji.InvoicePrint.formVisible#">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td style="text-align: right"><strong>#= kendo.toString(amount + amount_remain, locale=="km-KH"?"c0":"c", locale)#</strong></td>
				</tr>
				<tr>
					<td colspan="3" class="greyy"  style="background: \\#ccc;#= banhji.InvoicePrint.formVisible#">ថ្ងៃផុតកំណត់ DUE DATE</td>
					<td align="left">#=kendo.toString(new Date(due_date), "dd-MMMM-yyyy", "km-KH")#</td>
				</tr>
				<tr>
					<td colspan="3" class="greyy" style="background: \\#ccc;#= banhji.InvoicePrint.formVisible#">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td align="left">#=kendo.toString(new Date(bill_date), "dd-MMMM-yyyy", "km-KH")#</td>
				</tr>
				<tr>
					<td colspan="3" class="greyy" style="background: \\#ccc;#= banhji.InvoicePrint.formVisible#">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<div class="line" style></div>
		<table class="span12 table table-bordered footerTbl" style="padding:0;margin-bottom:15px;border-collapse: inherit;margin-top: 15px;border-radius: 3px;margin-left: 0px;#= banhji.InvoicePrint.formBorder#">
			<tbody style="border:none!important">
				<tr style="border:none!important">
					<td width="150"></td>
					<th width="300" style="border: none!important;">
						<span style="margin-left: -15px;border:none!important" id="footwnumber#:id#"></span>
					</th>
					<td width="270" class="greyy"  style="background: \\#ccc;border-bottom:1px solid \\#fff;#= banhji.InvoicePrint.formVisible#">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td width="180" align="right"><strong>#= kendo.toString(amount + amount_remain, locale=="km-KH"?"c0":"c", locale)#</strong></td>
				</tr>
				<tr>
					<td style><p>វិក្កយបត្រ</p></td>
					<td>#: kendo.toString(new Date(issue_date), "dd-MMMM-yyyy", "km-KH")# - #: number#</td>
					<td class="greyy" style="background: \\#ccc;border-bottom:1px solid \\#fff;#= banhji.InvoicePrint.formVisible#">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td align="left"></td>
				</tr>
				<tr>
					<td style><p>អតិថិជន</p></td>
					<td>#=contact.number# #=contact.name#<br>#: contact.phone# #: contact.address#</td>
					<td class="greyy" style="background: \\#ccc;border-bottom:1px solid \\#fff;#= banhji.InvoicePrint.formVisible#">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
				<tr>
					<td style>លេខ​ប្រអប់</td>
					<td>#:meter.box#</td>
					<td rowspan="2" class="greyy" style="#= banhji.InvoicePrint.formVisible#background: \\#ccc;">អ្នកទទួលប្រាក់ RECEIVER</td>
					<td rowspan="2"></td>
				</tr>
				<tr>
					<td style>លេខ​កុង​ទ័រ</td>
					<td>#: meter.meter_number#</td>
				</tr>
			</tbody>
		</table>
	</div>
</script>
<script id="waterInvoice" type="text/x-kendo-tmpl">	
  	<div class="container winvoice-print" style="page-break-after: always;width: 775px;">
		<!-- <div class="span12 headerinv " style="border-bottom: 2px solid \#000;padding: 15px 0;">
            <img class="logoP" style="position: absolute;left: 0;top: 20px;max-width: 100px;height: auto;max-height: 50px;" data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
			<div class="span12" align="center">
				<h4 data-bind="text: company.name"></h4>					
				<h5><span data-bind="text: company.address"></span> 
				<br>
				<span data-bind="text: company.phone"></span></h5>					
			</div>
		</div>		

		<div class="span12 cover-customer">
			
			<div class="span7">
				<span id="secondwnumber#= id#" style="margin-left: -14px;"></span><br />
				<div class="span12">
					<p>អតិថិជន​ <span data-bind="text: obj.contact.number"></span></p>
					<p><span data-bind="text: obj.contact.name"></span></p>
					<p><span data-bind="text: obj.contact.address"></span></p>
					<p style="font-size: 10px;"><i>ថ្ងៃ​ចាប់​ផ្តើម​ទទួល​ប្រាក់ <span data-bind="text: obj.bill_date"></span></i></p>
				</div>
			</div>
			<div class="span4">
				<table >
					<tr>
						<td width="140"><p>លេខ​វិក្កយ​បត្រ</p></td>
						<td><p data-bind="text: obj.number"></p></td>
					</tr>
					<tr>
						<td><p>ថ្ងៃ​ចេញ វិក្កយ​បត្រ</p></td>
						<td><p data-bind="text: obj.issue_date"></p></td>
					</tr>
					<tr>
						<td><p>តំបន់</p></td>
						<td><p data-bind="text: obj.meter.location[0].name"></p></td>
					</tr>
					<tr>
						<td><p>គិត​ចាប់​ពី​ថ្ងៃ​ទី</p></td>
						<td><p data-bind="text: obj.invoice_lines[0].from_date"></p></td>
					</tr>
					<tr>
						<td style><p>ដល់​ថ្ងៃ​ទី</p></td>
						<td><p data-bind="text: obj.invoice_lines[0].to_date"></p></td>
					</tr>
				</table>		
			</div>
		</div> -->
		<!-- <table class="span12 table table-bordered footerTbl" style="padding:0;margin-top: 40px; border-radius: 3px;border-collapse: inherit;margin-left: 0px;">
			<thead>
				<tr>
					<th width="180" class="darkbblue main-color" >លេខ​កុងទ័រ<br>METER</th>
					<th width="150" class="darkbblue main-color" >អំណានចាស់<br>PREVIOUS</th>
					<th width="120" class="darkbblue main-color" >អំណានថ្មី<br>CURRENT</th>
					<th width="120" class="darkbblue main-color" >បរិមាណ<br>CONSUMPTION</th>
					<th width="120" class="darkbblue main-color" >តំលៃឯកត្តា<br>RATE</th>
					<th width="180" class="darkbblue main-color" >តំលៃសរុប<br>AMOUNT</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="vertical-align: middle;"></td>
					<td colspan="4" style="text-align: right">
						ជំពាក់​សរុប​នៅ​ថ្ងៃ​ធ្វើ​វិក្កយបត្រ Balance as at billing date .
					</td>
					<td align="right" data-bind="text: obj.amount_remain">
					</td>
				</tr>
				<tr>
					<td><span data-bind="text: obj.meter.location[0].abbr"></span> - <span data-bind="text: obj.meter.meter_number"></span></td>
					<td align="center"><strong data-bind="text: obj.invoice_lines[0].previous"></strong></td>
					<td align="center"><strong data-bind="text: obj.invoice_lines[0].current"></strong></td>
					<td align="center"><strong data-bind="text: obj.invoice_lines[0].consumption"></strong></td>
					<td></td>
					<td></td>
				</tr>

				#for(var j=1; j< invoice_lines.length; j++) {#
					#if(invoice_lines[j].amount != 0) {#
						#if(invoice_lines[j].type == "tariff"){#
						#var amountTariff = invoice_lines[j].amount #
						#var amountTariffMoney = invoice_lines[j].amount * invoice_lines[0].consumption #
							<tr>
								<td colspan="3" align="left">#: invoice_lines[j].number#</td>
								<td align="center">#: invoice_lines[0].consumption#</td>
								<td align="right">#= kendo.toString(invoice_lines[j].amount, "c", locale)#</td>
								<td align="right">#= kendo.toString(amountTariffMoney, "c", locale)#</td>
							</tr>
						#}else if(invoice_lines[j].type == "exemption"){#
							<tr>
								<td colspan="3" align="left">#: invoice_lines[j].number#</td>
								#if(invoice_lines[j].unit == "money"){#
									<td align="center"></td>
									<td align="right"></td>
									<td align="right">-#= kendo.toString(invoice_lines[j].amount, "c", locale)#</td>
								#}else if(invoice_lines[j].unit == "%"){#
								#var AMM = (amountTariffMoney * invoice_lines[j].amount) / 100#
									<td align="center">#= invoice_lines[j].amount#%</td>
									<td align="center"></td>
									<td align="right">-#= kendo.toString(AMM, "c", locale)#</td>
								#}else{#
									<td align="center">#= invoice_lines[j].amount#m<sup>3</sup></td>
									<td align="center"></td>
									<td align="right">-#= kendo.toString(invoice_lines[j].amount * amountTariff, "c", locale)#</td>
								#}#
							</tr>
						#}else{#
							<tr>
								<td colspan="3" align="left">#: invoice_lines[j].number#</td>
								<td align="center"></td>
								<td align="right"></td>
								<td align="right">#= kendo.toString(invoice_lines[j].amount, "c", locale)#</td>
							</tr>
						#}#
					# } #
				#}#	
				<tr>
					<td colspan="5" style="padding-right: 10px;background: \\#355176;color: \\#fff;text-align: right;background-color:" class="darkbblue main-color">បំណុល​សរុប TOTAL BALANCE</td>
					<td style="border: 1px solid;text-align: right" data-bind="text: obj.amount"></td>
				</tr>
				<tr>
					<td rowspan="4" colspan="3" data-bind="">#= meter.license[0].term_of_condition#</td>
					<td colspan="2" class="greyy" style="background: \\#ccc;#= banhji.InvoicePrint.formVisible#">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td style="text-align: right"><strong>#= kendo.toString(amount + amount_remain, "c", locale)#</strong></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy"  style="background: \\#ccc;#= banhji.InvoicePrint.formVisible#">ថ្ងៃផុតកំណត់ DUE DATE</td>
					<td align="left">#=kendo.toString(new Date(due_date), "dd-MMM-yyyy")#</td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;#= banhji.InvoicePrint.formVisible#">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td align="left">#=kendo.toString(new Date(bill_date), "dd-MMM-yyyy")#</td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;#= banhji.InvoicePrint.formVisible#">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
			</tbody>
		</table> -->
		<!-- <div class="line" style></div>
		<table class="span12 table table-bordered footerTbl" style="padding:0;margin-bottom:75px;border-collapse: inherit;margin-top: 15px;border-radius: 3px;margin-left: 0px;#= banhji.InvoicePrint.formBorder#">
			<tbody style="border:none!important">
				<tr style="border:none!important">
					<td width="150"></td>
					<th width="300" style="border: none!important;">
						<span style="margin-left: -15px;border:none!important" id="footwnumber#:id#"></span>
					</th>
					<td width="270" class="greyy"  style="background: \\#ccc;border-bottom:1px solid \\#fff;#= banhji.InvoicePrint.formVisible#">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td width="180" align="right"><strong>#= kendo.toString(amount + amount_remain, "c", locale)#</strong></td>
				</tr>
				<tr>
					<td style><p>វិក្កយបត្រ</p></td>
					<td>#: kendo.toString(new Date(issue_date), "dd-MMM-yyyy")# - #: number#</td>
					<td class="greyy" style="background: \\#ccc;border-bottom:1px solid \\#fff;#= banhji.InvoicePrint.formVisible#">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td align="left">#=kendo.toString(new Date(bill_date), "dd-MMM-yyyy")#</td>
				</tr>
				<tr>
					<td style><p>អតិថិជន</p></td>
					<td>#=contact.number# #=contact.name#<br>#: contact.phone# #:contact.address#</td>
					<td class="greyy" style="background: \\#ccc;border-bottom:1px solid \\#fff;#= banhji.InvoicePrint.formVisible#">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
				<tr>
					<td style>លេខ​ទី​តាំង</td>
					<td>#:meter.location[0].abbr# - #:meter.location[0].name#</td>
					<td rowspan="2" class="greyy" style="#= banhji.InvoicePrint.formVisible#background: \\#ccc;">អ្នកទទួលប្រាក់ RECEIVER</td>
					<td rowspan="2"></td>
				</tr>
				<tr>
					<td style>លេខ​កុនង​ទ័រ</td>
					<td>#: meter.meter_number#</td>
				</tr>
			</tbody>
		</table> -->
	</div>
</script>
<!--Cash Reciept-->
<script id="Receipt" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print hidden-lg hidden-md pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<table width="100%" cellpadding="10">
									<tr>
								        <td>
								        	<h2 style="width: 100%" data-bind="text: lang.lang.wreceipt">Receipt</h2>
								        	<p>
								        		<span data-bind="text: lang.lang.in_here"></span>
								        	</p>
								        	<p style="width: 100%; float: left; margin-top: 8px;">
									        	<span style="position: relative; height: 35px; line-height: 35px;  float: left; display: block; ">
													<a data-bind="text: lang.lang.reconcile_transfer" style="color: #203864; line-height: 17px; background: #fff; width: 100%; padding: 10px 13px; font-size: 18px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; float: left;" href="#/reconcile">
														Reconcile & Transfer
													</a>
												</span>
											</p>
								        </td>
								 	</tr>
								</table>
								<div class="row">
									<div class="col-xs-12 col-sm-12">
										<div class="innerAll padding-bottom-none-phone" style="padding: 0 !important; margin: 8px 0 15px 0;">
											<a href="javascript:void(0)" class="widget-stats widget-stats-gray widget-stats-4" style="background: #fff; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; "> 
												<span class="txt" style="color: #203864;"><span data-bind="text: lang.lang.customer">Customer</span></span>
												<span class="count" style="color: #203864;" data-bind="text: numCustomer">0</span>
												<span class="glyphicons user userss"><i></i></span>
											</a>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12">
										<div class="innerAll padding-bottom-none-phone" style="background: #fff; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; margin: 0 0 15px 0">
											<a href="#/wPayment_summary" class="widget-stats widget-stats-primary widget-stats-4" style="background: #fff; padding-left: 15px !important;">
												<span class="txt" style="color: #203864;"><span data-bind="text: lang.lang.today_payment">Today Payment</span></span>
												<span class="count"><span style="font-size: 35px; color: #203864;" data-bind="text: paymentReceiptToday">0៛</span></span>
												<span class="glyphicons coins addcolors"><i></i></span>
											</a>
										</div>
									</div>
								</div>
								<div class="cover-block" style="padding-left: 15px; padding-right: 15px;">
									<h2 data-bind="text: lang.lang.reports" style="width: 100%;">Report</h2>
									<p data-bind="text: lang.lang.summary_and_detail_cash">
										Summary and detail cash receipt reports grouped by sources/ methods of receipts
									</p>
									<ul >
										<li><a href="#/cash_receipt_detail"><span data-bind="text: lang.lang.cash_receipt_by_detail">Cash Receipt By Detail</span></a></li>  
						  				<li><a href="#/cash_receipt_source_summary"><span data-bind="text: lang.lang.cash_receipt_by_sources_summary">Cash Receipt By Sources Summary</span></a></li>
						  				<li><a href="#/cash_receipt_source_detail"><span data-bind="text: lang.lang.cash_receipt_by_sources_detail">Cash Receipt By Sources Detail</span></a></li> 
									</ul>
								</div>
								<!-- <span class="btn btn-icon btn-warning glyphicons remove" data-bind="visible: haveSession ,click: endSession" style="width: 100%;background: #a22314; border-radius: 0;"><i></i> <span data-bind="text: lang.lang.end_session">End Session</span></span> -->
							</div>
							<div class="col-xs-12 col-sm-8" style="padding-right: 0">
								<div class="hidden-print hidden-xs hidden-sm pull-right">
						    		<span class="glyphicons no-js remove_2" 
										data-bind="click: cancel"><i></i></span>
								</div>
								<!--Session-->
								<div class="row-fluid" data-bind="invisible: haveSession" style="width:100%;background: #fff; float: left; padding: 15px; margin-left: -15px;">
									<h2 style="padding:0 15px 0 0;" data-bind="text: lang.lang.start_session">Start Session</h2><br><br>
									<table class="table table-bordered table-primary table-striped table-vertical-center">
								        <thead>
								            <tr>
								                <th class="center" style="width: 50px;"><span data-bind="text: lang.lang.no_">No.</span></th> 
								                <th><span data-bind="text: lang.lang.amount">Amount</span></th>
								                <th><span data-bind="text: lang.lang.currency">Currency</span></th>
								            </tr> 
								        </thead>
								        <tbody data-role="listview" 
							        		data-template="cashier-session-template" 
							        		data-auto-bind="false"
							        		data-bind="source: cashierItemDS"></tbody>
								    </table>
								    <span class="btn btn-icon btn-primary glyphicons ok_2" style="width: 135px;float: left; margin-bottom: 0px;"><i></i><span data-bind="text: lang.lang.add_session, click: addSession">Save</span></span>
								</div>
								<!--End Session-->
								<div id="loadING" style="display:none;text-align: center;position: absolute;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
									<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
								</div>
								<div class="row" data-bind="visible: haveSession" style="background: #fff; float: left; width: 100%; padding: 15px 0 0;">
									<div class="col-sm-12" style="padding-right: 0;/">
										<!-- Upper Part -->
										<div class="row" >
											<div class="col-sm-12" style="display: none;">
												<div class="box-generic-noborder" >
												    <div class="tab-content" style="padding-top: 12px;">
												    	<div class="col-sm-3" style="padding-left: 0;">
															<div class="control-group">
																<label ><span data-bind="text: lang.lang.license">License</span></label>
																<input 
																	data-role="dropdownlist" 
																	style="width: 100%;" 
																	data-option-label="License ..." 
																	data-auto-bind="false" 
																	data-value-primitive="true" 
																	data-text-field="name" 
																	data-value-field="id" 
																	data-bind="
																		value: licenseSelect,
									                  					source: licenseDS,
									                  					events: {change: licenseChange}">
									                  		</div>
														</div>
														<div class="col-sm-3" style="padding-left: 0;">
															<div class="control-group">								
																<label ><span data-bind="text: lang.lang.location">Bloc</span></label>
																<input 
																	data-role="dropdownlist" 
																	style="width: 100%;" 
																	data-option-label="Location ..." 
																	data-auto-bind="false" 
																	data-value-primitive="true" 
																	data-text-field="name" 
																	data-value-field="id" 
																	data-bind="
																		value: locationSelect,
									                  					source: locationDS,
									                  					events: {change: blocChange},
									                  					enabled: slocation">
									                  		</div>
														</div>
														<div class="col-sm-3" style="padding-left: 0;">
															<div class="control-group">								
																<label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
													            <input type="text" 
												                	style="width: 100%;" 
												                	data-role="datepicker"
												                	data-format="MM-yyyy"
												                	data-start="year" 
													  				data-depth="year" 
												                	placeholder="Moth of ..." 
														           	data-bind="value: monthSelect,
														           				enabled: haveMonth,
														           				events: {change: monthChange}" />
															</div>
														</div>
														<div class="col-sm-1" style="padding-left: 0;">
															<div class="control-group">
																<label ><span data-bind="text: lang.lang.action">Action</span></label>	
																<div class="row" style="margin: 0;">
																	<button type="button" data-role="button" data-bind="click: searchINV" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
																</div>
									                  		</div>
														</div>
														<div class="col-sm-2" data-bind="visible: downloadView" style="padding-left: 0;">
															<div class="control-group">
																<label ><span data-bind="text: lang.lang.download">Download</span></label>	
																<div class="row" style="margin: 0;">
																	<button type="button" data-role="button" data-bind="click: ExportExcel" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="download_alt"></i> <span data-bind="text: lang.lang.download"></span></button>
																</div>
									                  		</div>
														</div>
														<div class="col-sm-2" data-bind="visible: balanceView" style="padding-left: 0;">
															<div class="control-group">
																<label ><span data-bind="text: lang.lang.balance">Download</span></label>	
																<div class="row" style="margin: 0;">
																	<button type="button" data-role="button" data-bind="click: serachBalance" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="download_alt"></i> <span data-bind="text: lang.lang.balance"></span></button>
																</div>
									                  		</div>
														</div>
												    </div>
												</div>
											</div>
										</div>
										<div class="row" >
											<div class="col-xs-12 col-sm-6">
												<div class="widget widget-heading-simple widget-body-primary widget-employees">
													<div class="widget-body padding-none" style="background: none; width: 100%; float: left; border: none; padding: 0;">
														<div class="row-fluid row-merge">
															<div class="listWrapper" style="min-height: 0; margin-bottom: 15px; padding: 0;">
																<div style="margin-bottom: 10px;">
																	<input id="ddlPaymentMethod" name="ddlPaymentMethod"
																			data-role="dropdownlist"
												              				data-value-primitive="true"
																			data-text-field="name" 
												              				data-value-field="id"
												              				data-bind="
												              					value: searchSelect,
												              					source: searchSelectDS,
												              					events: { change: changeSearchMethod}"
												              				required data-required-msg="required" 
												              				style="width: 100%" />
																</div>
																<div class="innerAll" style="padding: 15px 15px 0;overflow: hidden;">
																	<div class="widget-search separator bottom" data-bind="visible: haveSearchInv">
																		<button class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
																		<div class="overflow-hidden">
																			<input style="line-height: 26px;" type="text" placeholder="Invoice Number..." data-bind="
																				value: searchText,
																				events: {change: search}
																			">
																		</div>
																	</div>
																	<div style="margin-bottom: 15px;" data-bind="visible: haveSearchCus">
																		<input data-role="combobox"
															                   	data-placeholder="Customer Name"
															                   	data-value-primitive="true"
															                   	data-text-field="name"
															                   	data-value-field="id"
															                   	data-filter="contains"
	                   															data-min-length="3"
															                   	data-bind="
															                   		value: selectedCustomer,
															                        source: customerDS,
															                        events: {
															                            change: search
															                        }"
															                   style="width: 100%;"
															            />
															        </div>
															        <div style="margin-bottom: 15px;" data-bind="visible: haveSearchMet">
																		<input data-role="combobox"
															                   	data-placeholder="Meter Number"
															                   	data-value-primitive="true"
															                   	data-text-field="number"
															                   	data-value-field="id"
															                   	data-filter="contains"
	                   															data-min-length="3"
															                   	data-bind="
															                   		value: selectedMeter,
															                        source: searchMeterDS,
															                        events: {
															                            change: search
															                        }"
															                   style="width: 100%;"
															            />
															        </div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="strong" style="margin-bottom: 15px; width: 100%; padding: 10px; float: left;" align="center"
													data-bind="style: { backgroundColor: amtDueColor}">
													<div align="left"><span data-bind="text: lang.lang.amount_received"></span></div>
													<h2 data-bind="text: total_received" align="right"></h2>
												</div>
											</div>
											<div class="col-xs-12 col-sm-6">
												<div class="box-generic-noborder" >
												    <div class="tab-content">
												    	<!-- Options Tab content -->
												        <div class="tab-pane active" id="tab1-1">
												            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">
												            	<tr>
																	<td><span data-bind="text: lang.lang.date"></span></td>
																	<td class="right">
																		<input id="issuedDate" name="issuedDate" 
																			data-role="datepicker"
																			data-format="dd-MM-yyyy"
																			data-parse-formats="yyyy-MM-dd HH:mm:ss"
																			data-bind="value: obj.issued_date, 
																						events:{ change : issuedDateChanges }" 
																			required data-required-msg="required"
																			style="width:100%;" />
																	</td>
																</tr>
																<tr>
													            	<td>
													            		<span data-bind="text: lang.lang.payment_term"></span>
													            	</td>
																	<td>
																		<input id="ddlPaymentMethod" name="ddlPaymentMethod"
																			data-role="dropdownlist"
																			data-header-template="customer-payment-method-header-tmpl"
												              				data-value-primitive="true"
																			data-text-field="name" 
												              				data-value-field="id"
												              				data-bind="value: obj.payment_method_id,
												              							source: paymentMethodDS"
												              				data-option-label="Select Method..."
												              				required data-required-msg="required" 
												              				style="width: 100%" />
																	</td>
																</tr>
																<tr>
													            	<td><span data-bind="text: lang.lang.cash_account"></span></td>
												            		<td>
																		<input id="ddlCashAccount" name="ddlCashAccount" 
																			data-role="dropdownlist"
																			data-header-template="account-header-tmpl"
																			data-template="account-list-tmpl"
												              				data-value-primitive="true"
																			data-text-field="name" 
												              				data-value-field="id"
												              				data-bind="value: obj.account_id,
												              							source: accountDS"
												              				data-option-label="Select Account..."
												              				required data-required-msg="required" 
												              				style="width: 100%" />
																	</td>
													            </tr>
													            <tr>
																	<td><span data-bind="text: lang.lang.segment"></span></td>
																	<td>
																		<select data-role="multiselect"
																		   data-value-primitive="true"
																		   data-header-template="segment-header-tmpl"
																		   data-item-template="segment-list-tmpl" 
																		   data-value-field="id" 
																		   data-text-field="code"
																		   data-bind="value: obj.segments, 
																		   			source: segmentItemDS,
																		   			events:{ change: segmentChanges }"
																		   data-placeholder="Add Segment.."
																		   style="width: 100%" /></select>
																	</td>
																</tr>
												            </table>
												        </div>
												    </div>
												</div>
										    </div>
										</div>
										<table class="table table-bordered table-primary table-striped table-vertical-center" style="margin-top: 15px;">
									        <thead>
									            <tr>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.date"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.name"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.number"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.meter"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.amount"></th>
									            	<th style="vertical-align: top;" data-bind="visible: chhDiscount, text: lang.lang.discount"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.receive"></th>
									            </tr>
									        </thead>
									        <tbody data-role="listview" 
								        		data-template="cashReceipt-list-template" 
								        		data-auto-bind="false"
								        		data-bind="source: dataSource"></tbody>
									    </table>
							            <div class="row">
											<div class="col-xs-12 col-sm-5"> 
												<div class="btn-group">
													<div class="leadcontainer">
													</div>
													<a style="margin-bottom: 15px" class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-list"></i> </a>
													<ul class="dropdown-menu" style="padding: 5px; border-radius:0;">
														<li>
															<input type="checkbox" id="chhDiscount" class="k-checkbox" data-bind="checked: chhDiscount">
						  									<label class="k-checkbox-label" for="chhDiscount"><span data-bind="text: lang.lang.discount"></span></label>
						  								</li>
													</ul>
												</div>
												<br>
											</div>
											<div class="col-xs-12 col-sm-7">
												<table class="table table-condensed table-striped table-white">
													<tbody>
														<tr>
															<td class="right"><span data-bind="text: lang.lang.total_received"></span>:</td>
															<td class="right strong"><span data-bind="text: total_received"></span></td>
															<td class="right"><span data-bind="text: lang.lang.subtotal"></span>:</td>
															<td class="right strong" width="40%"><span data-format="n2" data-bind="text: obj.sub_total"></span></td>
														</tr>
														<tr>
															<td class="right"><span data-bind="text: lang.lang.remaining"></span>:</td>
															<td class="right strong"><span data-format="n2" data-bind="text: obj.remaining"></span></td>
															<td class="right"><span data-bind="text: lang.lang.total_discount"></span>:</td>
															<td class="right strong">
																<span data-format="n2" data-bind="text: obj.discount"></span>
						                   					</td>
														</tr>
														<tr data-bind="visible: haveFine">
															<td></td>
															<td></td>
															<td class="right">
																<span data-bind="text: lang.lang.fine"></span>
															</td>
															<td class="right strong">
																<span data-format="n2" data-bind="text: amountFine"></span>
															</td>
														</tr>
														<tr>
															<td></td>
															<td></td>
															<td class="right"><h4 data-bind="text: lang.lang.total"></h4></td>
															<td class="right strong"><h4 data-bind="text: total"></h4></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-5" >
												<div class="well" style="overflow: hidden;">
													<textarea cols="0" rows="2" class="k-textbox" style="width:100% !important;" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
													<textarea cols="0" rows="2" class="k-textbox" style="width:100% !important;" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-7" data-bind="visible: btnActive">
												<table class="table table-bordered table-primary table-striped table-vertical-center">
											        <thead>
											            <tr>
											                <th style="vertical-align: top;"><span data-bind="text: lang.lang.no_">No.</span></th>
											                <th style="vertical-align: top;"><span data-bind="text: lang.lang.currency">Currency</span></th>
											                <th style="vertical-align: top;"><span data-bind="text: lang.lang.cash_receipt">Cash Receipt</span></th>
											            </tr> 
											        </thead>
											        <tbody data-role="listview" 
										        		data-template="cash-currency-template" 
										        		data-auto-bind="false"
										        		data-bind="source: receipCurrencyDS"></tbody>
											    </table>
											    <div class="row-fluid" data-bind="visible: haveChangeMoney">
											    	<h5 data-bind="text: lang.lang.change_currency"></h5><br>
											    	<table class="table table-bordered table-primary table-striped table-vertical-center">
												        <thead>
												            <tr>
												                <th class="center" style="width: 50px;"><span data-bind="text: lang.lang.no_">No.</span></th>
												                <th><span data-bind="text: lang.lang.currency">Currency</span></th>
												                <th><span data-bind="text: lang.lang.cash_receipt">Cash Receipt</span></th>
												            </tr> 
												        </thead>
												        <tbody data-role="listview" 
											        		data-template="change-currency-receipt-template" 
											        		data-auto-bind="false"
											        		data-bind="source: receipChangeDS"></tbody>
												    </table>
											    </div>
											</div>
										</div>
										<div class="box-generic bg-action-button">
											<div id="ntf1" data-role="notification"></div>
											<div class="row">
												<div class="col-sm-12" align="right">
													<span class="btn-btn" data-bind="click: cancel" ><span data-bind="text: lang.lang.cancel"></span></span>
													<span id="saveNew" class="btn-btn" data-bind="visible: btnActive, click: save" ><span data-bind="text: lang.lang.save"></span></span>		
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
	</div>
</script>
<script id="cashier-session-template" type="text/x-kendo-template">
	<tr>
		<td>
			#:banhji.Receipt.cashierItemDS.indexOf(data)+1#	
		</td>
		<td>
			<input style="text-align: right;" id="numeric" class="k-formatted-value k-input" type="number" value="17" min="0" data-bind="value: amount" step="1" />
		</td>
		<td>
			<p> #: currency# </p>
		</td>
	</tr>
</script>
<script id="cashReceipt-template" type="text/x-kendo-template">
	<tr data-uid="#: uid #">		
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.Receipt.dataSource.indexOf(data)+1#			
		</td>		
		<td>#=kendo.toString(new Date(due_date), "dd-MM-yyyy")#</td>
		<td>#=contact.name#</td>		
		<td>#=number#</td>
		<td data-bind="visible: showCheckNo">
			<input type="text" class="k-textbox" 
					data-bind="value: check_no"
					style="width: 100%; margin-bottom: 0;" />
		</td>	
		<td class="center">
			#=amount#
		</td>	
		<td> 
			<input data-role="numerictextbox"
				   data-spinners="false"
				   data-culture=""
                   data-decimals="2"
                   data-min="0"                   
                   data-bind="value: discount"
                   style="width: 100%;">
        </td>
		<td class="center">
			<input data-role="numerictextbox"
				   data-spinners="false"
				   data-culture=""
				   data-format="c"
                   data-decimals="3"
                   data-min="0"                   
                   data-bind="value: received,
                              events: { change: changes }"
                   style="width: 100%;">			
		</td>
    </tr> 
</script>
<script id="cashReceipt" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
				    
			    	<span class="glyphicons no-js remove_2 pull-right" 
		    				onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>

			        <h2 data-bind="text: lang.lang.cash_receipt"></h2>			    		   

				    <br>				   				
						
					<!-- Upper Part -->
				<div class="row-fluid">
					<div class="span4">
						<div class="widget widget-heading-simple widget-body-primary widget-employees">		
							<div class="widget-body padding-none">			
								<div class="row-fluid row-merge">
									<div class="listWrapper">
										<div class="innerAll" style="padding: 15px 15px 19px;">							
											<form autocomplete="off" class="form-inline">
												<div class="widget-search separator bottom" style="padding-bottom: 0;">
													<button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
													<div class="overflow-hidden">
														<input type="search" placeholder="Invoice Number..." data-bind="value: searchText, events:{change: search}">
													</div>
												</div>
											</form>					
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="strong" style="margin-bottom:0; width: 100%; padding: 10px; background: #D5DBDB;" align="center">
							<div align="left"><span >AMOUNT RECEIVED</span></div>
							<h2 align="right">0</h2>
						</div>												
					</div>					   

					<div class="span8" style="padding-right: 0; padding-left: 0;">

						<div class="box-generic-noborder" style="padding: 10px 10px 10px 10px">
					            
				            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">
				            	<tr>
									<td><span >Date</span></td>
									<td class="right">
										<input id="issuedDate" name="issuedDate" 
												data-role="datepicker"
												data-format="dd-MM-yyyy"
												data-parse-formats="yyyy-MM-dd" 
												data-bind="value: obj.issued_date, 
														   events:{ change : issuedDateChanges }" 
												required data-required-msg="required"
												style="width:100%;" />
									</td>
								</tr>							            
								<tr>
					            	<td>
					            		<span >Payment Term</span>
					            	</td>				
									<td>
										<input id="ddlPaymentMethod" name="ddlPaymentMethod"
												data-role="dropdownlist"								
												data-header-template="customer-payment-method-header-tmpl"
					              				data-value-primitive="true"
												data-text-field="name" 
					              				data-value-field="id"
					              				data-bind="value: obj.payment_method_id,
					              							source: paymentMethodDS"
					              				data-option-label="Select Method..."
					              				required data-required-msg="required" 
					              				style="width: 100%" />
									</td>
								</tr>
								<tr>
					            	<td><span >Cash Account</span></td>							            	
				            		<td>
										<input id="ddlCashAccount" name="ddlCashAccount" 
											data-role="dropdownlist"
											data-header-template="account-header-tmpl"
											data-template="account-list-tmpl"
				              				data-value-primitive="true"
											data-text-field="name" 
				              				data-value-field="id"
				              				data-bind="value: obj.account_id,
				              							source: accountDS"
				              				data-option-label="Select Account..."
				              				required data-required-msg="required" 
				              				style="width: 100%" />
									</td>							            	
					            </tr>							            
					            <tr>
									<td><span >Segment</span></td>
									<td>
										<select data-role="multiselect"
											   data-value-primitive="true"
											   data-header-template="segment-header-tmpl"
											   data-item-template="segment-list-tmpl"				    
											   data-value-field="id" 
											   data-text-field="code"
											   data-bind="value: obj.segments, 
											   			source: segmentItemDS,
											   			events:{ change: segmentChanges }"
											   data-placeholder="Add Segment.."				   
											   style="width: 100%" /></select>
									</td>
								</tr>											
				            </table>						            
						       
						</div>         
				    </div>
				</div>

				<!-- Item List -->
				<table class="table table-bordered table-primary table-striped table-vertical-center">
			        <thead>
			            <tr>
			                <th class="center" style="width: 50px;" data-bind="text: lang.lang.no_"></th>			                
			                <th data-bind="text: lang.lang.date"></th>
			                <th data-bind="text: lang.lang.name"></th>
			                <th data-bind="text: lang.lang.invoice"></th>
			                <th style="width: 15%" data-bind="text: lang.lang.amount"></th>
			                <th style="width: 15%" data-bind="text: lang.lang.discount"></th>
			                <th style="width: 15%">RECEIVE</th>
			            </tr> 
			        </thead>
			        <tbody data-role="listview" 
			        		data-template="cashReceipt-template" 
			        		data-auto-bind="false"
			        		data-bind="source: dataSource"></tbody>			        
			    </table>			    
								
	            <!-- Bottom part -->
	            <div class="row-fluid">
		
					<!-- Column -->
					<div class="span5" style="padding-left: 0;">
						
						<div class="btn-group">
							<div class="leadcontainer">
								
							</div>
							<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-list"></i> </a>
							<ul class="dropdown-menu" style="padding: 5px; border-radius:0;">
								<li>
									<input type="checkbox" id="chbCheckNo" class="k-checkbox" data-bind="checked: showCheckNo">
  									<label class="k-checkbox-label" for="chbCheckNo"><span data-bind="text: lang.lang.check_number"></span></label>
								</li>															
							</ul>
						</div>

						<br>
						<div class="well" style="overflow: hidden;">
							<textarea cols="0" rows="2" class="k-textbox" style="width:100% !important;" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>												
							<textarea cols="0" rows="2" class="k-textbox" style="width:100% !important;" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
						</div>
					</div>
					<!-- Column END -->
					
					<!-- Column -->
					<div class="span7" style="padding-left: 0;">
						<table class="table table-condensed table-striped table-white">
							<tbody>
								<tr>
									<td class="right"data-bind="text: lang.lang.total_received"></td>
									<td class="right strong" data-bind="text: pay"></td>
									<td class="right" data-bind="text: lang.lang.subtotal"></td>
									<td class="right strong" width="40%" data-bind="text: sub_total"></td>
								</tr>								
								<tr>
									<td class="right" data-bind="text: lang.lang.remaining"></td>
									<td class="right strong"><span data-bind="text: remain"></span></td>
									<td class="right" data-bind="text: lang.lang.total_discount"></td>
									<td class="right strong">
										<span data-bind="text: discount"></span>
                   					</td>
								</tr>
								<tr>
									<td class="right"><span >Fine</span>:</td>
									<td class="right strong"><span data-bind="text: fine"></span></td>
									<td></td>
									<td></td>							
							</tbody>
						</table>

						<table class="table table-bordered table-primary table-striped table-vertical-center">
					        <thead>
					            <tr>
					                <th class="center" style="width: 50px;"><span >No.</span></th>             
					                <th><span >Currency</span></th>
					                <th><span >Cash Receipt</span></th>			                			                			                			                
					            </tr> 
					        </thead>
					        <tbody data-role="listview" 
				        		data-template="cash-currency-template" 
				        		data-auto-bind="false"
				        		data-bind="source: reconReceipt.dataSource"></tbody>			        
					    </table>

					    <button style="margin-bottom: 15px;" class="btn btn-inverse" data-bind="click: reconReceipt.addRow"><i class="icon-plus icon-white"></i></button>
						
						<table class="table table-condensed table-striped table-white">
							<tbody>																
								<tr>
									<td></td>
									<td></td>
									<td class="right"><h4><span >Total Due</span>:</h4></td>
									<td class="right strong"><h4 data-bind="text: total"></h4></td>
								</tr>								
							</tbody>
						</table>
						
					</div>
					<!-- // Column END -->
					
				</div>	           
				
				<!-- Form actions -->
				<div class="box-generic bg-action-button">
					<div id="ntf1" data-role="notification"></div>

					<div class="row">
						<div class="span3">
							<input data-role="dropdownlist"
				                   data-value-primitive="true"
				                   data-text-field="name"
				                   data-value-field="id"
				                   data-bind="value: obj.transaction_template_id,
				                              source: txnTemplateDS"
				                   data-option-label="Select Template..." />
						</div>
						<div class="span9" align="right">
							<span class="btn btn-icon btn-default glyphicons print" style="width: 120px;color:#444;margin-bottom: 0;"><i></i><span data-bind="click:printReciept, text: lang.lang.save_print">Save Print</span></span>
							<span class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit, click: save" style="width: 100px;"><i></i><span >Save</span></span>			
						</div>
					</div>
				</div>
				<!-- // Form actions END -->
				<!-- Upper Part -->								

				</div>							
			</div>
		</div>
	</div>
</script>
<script id="cashReceipt-list-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.Receipt.dataSource.indexOf(data)+1#			
		</td>
		<td>#=kendo.toString(new Date(invissued_date), "dd-MMMM-yyyy", "km-KH")#</td>
		<td>#=contact_name#</td>
		<td>#=invnumber#</td>
		<td>#=meter#</td>
		<td class="center">
			#=kendo.toString(amountshow, locale=="km-KH"?"c0":"c", locale)#		
		</td>
		<td class="center" data-bind="visible: chhDiscount">
			<input data-role="numerictextbox"
				   data-spinners="false"
				   data-format="c0"
				   data-culture="#:locale#"
                   data-min="0"                   
                   data-bind="value: discount,
                              events: { change: changes }"
                   style="width: 100%; text-align: right;">			
		</td>
		
		<td class="center">
			<input data-role="numerictextbox"
				   data-spinners="false"
				   data-format="c"
				   data-culture="#:locale#"
                   data-min="0"
                   data-decimals="3"               
                   data-bind="value: amount,
                              events: { change: changes }"
                   style="width: 100%; text-align: right;">			
		</td>
    </tr>   
</script>
<script id="customerDeposit" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
				    
			    	<span class="glyphicons no-js remove_2 pull-right" 
		    				onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>

			        <h2 data-bind="text: lang.lang.customer_deposit"></h2>			    		   

				    <br>				   				
						
					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="box-generic well" style="height: 150px;">				
								<table class="table table-borderless table-condensed cart_total" style="margin-bottom:10;">		
									<tr data-bind="visible: isEdit">				
										<td><span data-bind="text: lang.lang.no_"></span></td>
										<td><input class="k-textbox" data-bind="value: obj.number" style="width:100%;" /></td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.date"></span></td>
										<td class="right">
											<input id="issuedDate" name="issuedDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd" 
													data-bind="value: obj.issued_date, 
																events:{ change : setRate }" 
													required data-required-msg="required"
													style="width:100%;" />
										</td>
									</tr>
								</table>

								<div class="strong" style="margin-bottom:0; width: 100%; padding: 10px;" align="left"
									data-bind="style: {backgroundColor: amtDueColor}">
									<div align="left"><span>Customer Infomation</span></div>
									<p style="font-weight: lighter;">Name: <span data-bind="text: contact.name"></span></p>
								</div>

							</div>
						</div>					   

						<div class="span8">

							<div class="box-generic-noborder" style="height: 155px;">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons notes active"><a href="#tab1" data-toggle="tab"><i></i> </a>
							            </li>
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">
							        	<p style="font-weight: bold;">Amount Deposit</p>
										<h2 style="font-size: 35px;margin-top: 22px;">$123,123.00</h2>	
							    </div>
							</div>

					    </div>
					    <!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>
					    <div class="row">
							<div class="span3">
								
							</div>
							<div class="span9" align="right">
								<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="visible: obj.isNew" style="width: 80px;margin:0;"><i></i> Deposit</span>

								<span id="saveClose" class="btn btn-icon btn-success glyphicons power" style="width: 80px;"><i></i> <span>Print</span></span>

								<span class="btn btn-icon btn-warning glyphicons remove_2" onclick="javascript:window.history.back()" data-bind="click: cancel" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
							</div>
						</div>
					</div>		
				</div>							
			</div>
		</div>
	</div>
</script>
<script id="cash-currency-template" type="text/x-kendo-template">
	<tr>
		<td> #:banhji.Receipt.receipCurrencyDS.indexOf(data) +1#</td>
		<td>
			<input style="text-align: left;background: none;border:none;" id="numeric" class="k-formatted-value k-input" type="text" data-bind="value: currency, enabled: false"  />
		</td>
		<td>
			<input style="text-align: right;" id="numeric" class="k-formatted-value k-input" type="number" value="17" min="0" data-format="n0" data-bind="value: amount, events: {change: checkChange}" step="1" />
		</td>
	</tr>
</script>
<script id="change-currency-receipt-template" type="text/x-kendo-template">
	<tr>
		<td>
			#:banhji.Receipt.receipChangeDS.indexOf(data) +1#</td>
		<td>
			<input style="text-align: left;background: none;border: none;" id="numeric" class="k-formatted-value k-input" type="text" data-bind="value: currency, enabled: false"  />
		</td>
		<td>
			<input style="text-align: right;" id="numeric" class="k-formatted-value k-input" type="number" value="17" min="0" data-bind="value: amount, events: {change: checkChangeMoney}" step="1" />
		</td>
	</tr>
</script>

<!-- ***************************
*	End Water Section         *
**************************** -->


<!-- ***************************
*	Invoice Form Section        *
**************************** -->	
<script id="invoiceCustom" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="margin-top: 15px;">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>						
					</div>
			        <h2 style="padding:0 15px 0 0;" data-bind="text: lang.lang.custom_forms"></h2>
				    <br>	
				    <div class="row" style="margin-left:0;">			   				
						<div class="span4">	
							<div class="span12" style="margin-bottom: 10px;">
								<input type="text" id="formName" name="Form Name" class="k-textbox" placeholder="Form Name" required validationMessage="" data-bind="value: obj.name" style="width: 100%;" />
							</div>
							<div class="span12">
								<h2 class="btn btn-block btn-primary" style="color: #fff!important;width: 100%;margin-bottom: 5px;" data-bind="text: lang.lang.form_style">Form Style</h2>
								<div class="row formstyle">
									<div id="formStyle"
										 data-role="listview"
										 data-auto-bind="false"
										 data-selectable="true"
						                 data-template="invoiceCustom-txn-form-template"
						                 data-bind="source: txnFormDS"
						                 style="overflow: auto;width: 100%;">
						            </div>
						        </div>
							</div>
							<div class="span12" style="margin-left:0; margin-top: 10px;">
								<h2 class="btn btn-block btn-primary" style="color: #fff!important;width: 100%;margin-bottom: 5px;" data-bind="text: lang.lang.form_color">Form Color</h2>
								<div class="colorPalatte span12">
									<div class="" style="margin-top: 15px;">
										<div data-selectable="true" data-bind="value: obj.color, events: { change : colorCC }" data-tile-size='{ width: 60, height: 35 }' data-role="colorpalette" data-columns="6" data-palette='[ "#ffffff", "#000000", "#eeece1", "#1f497d", "#4f81bd", "#c0504d", "#9bbb59", "#dbeef3", "#8064a2", "#f79646", "#f2f2f2", "#7f7f7f", "#ddd9c3", "#c6d9f0", "#dbe5f1", "#f2dcdb", "#ebf1dd", "#e5e0ec"]'></div>
                                	</div>
                                </div>
							</div>
							<div class="span12" style="margin-left:0; margin-top: 10px;padding-bottom: 30px;">
								<h2 class="btn btn-block btn-primary" style="color: #fff!important;width: 100%;margin-bottom: 5px;" data-bind="text: lang.lang.form_appearance">Form Appearance</h2>
								<div class="colorPalatte span12">
									<div class="" style="margin-top: 15px;">
										<input type="text" id="formtitle" name="Form Title" class="k-textbox" placeholder="Form Title" required validationMessage="" data-bind="value: obj.title" style="width: 100%;" />
										<textarea data-bind="value: obj.note, text: obj.note" placeholder="Note" class="span12" style="min-height: 100px;margin-top: 15px;padding-left: 10px;"></textarea>
                                	</div>
                                </div>
							</div>
						</div>
						<div class="span8" id="invFormContent" style="padding-left:0;padding-right: 0;width: 63%;border:1px solid #eee;margin-bottom:20px;">
						</div>
					</div>
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>
						<div class="row">
							<div class="span12" align="right">
								<span id="saveClose" data-bind="click: save" class="btn btn-icon btn-success glyphicons power" style="width: 120px;"><i></i> <span data-bind="text: lang.lang.save_close"></span></span>		
							</div>
						</div>
					</div>
				</div>							
			</div>
		</div>
	</div>
</script>
<script id="invoiceForm1" type="text/x-kendo-template">
	<div class="container font-small winvoice-print" style="margin-bottom: 10px; width: 610px; ">
		<div class="span12 headerinv " style="border-bottom: 2px solid \#000;padding: 15px 0;">
            <img class="logoP" data-bind="attr: { src: objLicense.image_url }"  style="position: absolute;left: 0;top: 20px;max-width: 100px;height: auto;max-height: 50px;" />
			<div class="span12" align="center">
				<h4 data-bind="text: objLicense.name"></h4>					
				<h5 data-bind="text: objLicense.address"></h5>
				<h5 data-bind="text: objLicense.mobile"></h5>					
			</div>
		</div>		

		<div class="span12 cover-customer">
			
			<div class="span7">
				<span id="secondwnumber1" style="margin-left: -14px;"></span>
				<div class="span12">
					<p>អតិថិជន​ <span>001</span></p>
					<p>Customer Name</p>
					<p>No.124, St. 11</p>
					<p style="font-size: 10px;"><i>ថ្ងៃ​ចាប់​ផ្តើម​ទទួល​ប្រាក់ <?php echo date("d/m/Y"); ?></i></p>
				</div>
			</div>
			<div class="span4">
				<table >
					<tr>
						<td width="200"><p>លេខ​វិក្កយ​បត្រ</p></td>
						<td><p>WM00001</p></td>
					</tr>
					<tr>
						<td><p>ថ្ងៃ​ចេញ វិក្កយ​បត្រ</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
					<tr>
						<td><p>តំបន់</p></td>
						<td><p>A1-001</p></td>
					</tr>
					<tr>
						<td><p>គិត​ចាប់​ពី​ថ្ងៃ​ទី</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
					<tr>
						<td><p>ដល់​ថ្ងៃ​ទី</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
				</table>		
			</div>			
		</div>
		<table class="span12 table table-bordered footerTbl" style="padding:0;margin-top: 40px;border:1px solid #000; border-radius: 3px;border-collapse: inherit;margin-left: 0px;">
			<thead>
				<tr>
					<th width="180" class="darkbblue main-color">លេខ​កុងទ័រ<br>METER</th>
					<th width="150" class="darkbblue main-color">អំណានចាស់<br>PREVIOUS</th>
					<th width="120" class="darkbblue main-color">អំណានថ្មី<br>CURRENT</th>
					<th width="120" class="darkbblue main-color">បរិមាណ<br>CONSUMPTION</th>
					<th width="120" class="darkbblue main-color">តំលៃឯកត្តា<br>RATE</th>
					<th width="180" class="darkbblue main-color">តំលៃសរុប<br>AMOUNT</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="vertical-align: middle;"> <?php echo date("d/m/Y"); ?></td>
					<td colspan="4" style="text-align: right">
						ជំពាក់​សរុប​នៅ​ថ្ងៃ​ធ្វើ​វិក្កយបត្រ Balance as at billing date .រ
					</td>
					<td>
						0<br>
					</td>
				</tr>
				<tr>
					<td data-bind="text: meter_number"></td>
					<td align="center">1</td>
					<td align="center">2</td>
					<td align="center">1</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>រំលោះ</td>
					<td align="center"></td>
					<td align="center"></td>
					<td align="center">1,០០០</td>
					<td></td>
					<td></td>
				</tr>
				<tr><td colspan="6"  style="height: 80px;" ></td></tr>
				<tr>
					<td colspan="5" style="padding-right: 10px;background: #355176;color: #fff;text-align: right;" class="darkbblue main-color">បំណុល​សរុប TOTAL BALANCE</td>
					<td style="border: 1px solid;text-align: right"><strong>1,000</strong></td>
				</tr>
				<tr>
					<td rowspan="4" colspan="3"></td>
					<td colspan="2" class="greyy" style="background: \\#ccc;">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td style="text-align: right"><strong>1,000</strong></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;">ថ្ងៃផុតកំណត់ DUE DATE</td>
					<td> <?php echo date("d/m/Y"); ?></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<div class="line"></div>
		<table class="span12 table table-bordered footerTbl" style="padding:0;border-collapse: inherit;margin-top: 15px;border:1px solid #000; border-radius: 3px;margin-left: 0px;">
			<tbody>
				<tr>
					<td width="100"></td>
					<th width="390" style="border: none">
						<span style="margin-left: -15px;" id="footwnumber1"></span>
					</th>
					<td width="270" class="greyy" style="background: #ccc;border-bottom:1px solid #fff;">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td width="180">1,000</td>
				</tr>
				<tr>
					<td><p>វិក្កយបត្រ</p></td>
					<td><span><?php echo date("d/m/Y"); ?></span> - <span>WM00001</span></td>
					<td class="greyy" style="background: #ccc;border-bottom:1px solid #fff;">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td></td>
				</tr>
				<tr>
					<td><p>អតិថិជន</p></td>
					<td><span>001</span> <span>Customer Name</span><br>
					<span>012 111 222</span> <span>No. 123, St.11</span></td>
					<td class="greyy" style="background: #ccc;border-bottom:1px solid #fff;">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
				<tr>
					<td>លេខ​ទី​តាំង</td>
					<td>A1-01</td>
					<td rowspan="2" class="greyy" style="background: #ccc;">អ្នកទទួលប្រាក់ RECEIVER</td>
					<td rowspan="2"></td>
				</tr>
				<tr>
					<td>លេខ​កុនង​ទ័រ</td>
					<td>WM0001</td>
				</tr>
			</tbody>
		</table>
	</div>
</script>
<script id="invoiceForm2" type="text/x-kendo-template">
	<div class="container font-small winvoice-print" style="margin-bottom: 10px; width: 610px; ">
		<div class="span12 headerinv " style="visibility: hidden;border-bottom: 2px solid \#000;padding: 15px 0;">
            <img class="logoP" data-bind="attr: { src: objLicense.image_url }"  style="position: absolute;left: 0;top: 20px;max-width: 100px;height: auto;max-height: 50px;" />
			<div class="span12" align="center">
				<h4 data-bind="text: objLicense.name"></h4>					
				<h5 data-bind="text: objLicense.address"></h5>
				<h5 data-bind="text: objLicense.mobile"></h5>					
			</div>
		</div>		

		<div class="span12 cover-customer">
			
			<div class="span7">
				<span id="secondwnumber1" style="margin-left: -14px;"></span>
				<div class="span12">
					<p>អតិថិជន​ <span>001</span></p>
					<p>Customer Name</p>
					<p>No.124, St. 11</p>
					<p style="font-size: 10px;"><i>ថ្ងៃ​ចាប់​ផ្តើម​ទទួល​ប្រាក់ <?php echo date("d/m/Y"); ?></i></p>
				</div>
			</div>
			<div class="span4">
				<table >
					<tr>
						<td width="200" style="visibility: hidden;"><p>លេខ​វិក្កយ​បត្រ</p></td>
						<td><p>WM00001</p></td>
					</tr>
					<tr>
						<td style="visibility: hidden;"><p>ថ្ងៃ​ចេញ វិក្កយ​បត្រ</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
					<tr>
						<td style="visibility: hidden;"><p>តំបន់</p></td>
						<td><p>A1-001</p></td>
					</tr>
					<tr>
						<td style="visibility: hidden;"><p>គិត​ចាប់​ពី​ថ្ងៃ​ទី</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
					<tr>
						<td style="visibility: hidden;"><p>ដល់​ថ្ងៃ​ទី</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
				</table>		
			</div>			
		</div>
		<table class="span12 table footerTbl" style="border:none;padding:0;margin-top: 40px; border-radius: 3px;border-collapse: inherit;margin-left: 0px;">
			<thead style="visibility: hidden;">
				<tr>
					<th width="180" class="darkbblue main-color">លេខ​កុងទ័រ<br>METER</th>
					<th width="150" class="darkbblue main-color">អំណានចាស់<br>PREVIOUS</th>
					<th width="120" class="darkbblue main-color">អំណានថ្មី<br>CURRENT</th>
					<th width="120" class="darkbblue main-color">បរិមាណ<br>CONSUMPTION</th>
					<th width="120" class="darkbblue main-color">តំលៃឯកត្តា<br>RATE</th>
					<th width="180" class="darkbblue main-color">តំលៃសរុប<br>AMOUNT</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="vertical-align: middle;"> <?php echo date("d/m/Y"); ?></td>
					<td colspan="4" style="text-align: right">
						ជំពាក់​សរុប​នៅ​ថ្ងៃ​ធ្វើ​វិក្កយបត្រ Balance as at billing date .រ
					</td>
					<td>
						0<br>
					</td>
				</tr>
				<tr>
					<td data-bind="text: meter_number"></td>
					<td align="center">1</td>
					<td align="center">2</td>
					<td align="center">1</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>រំលោះ</td>
					<td align="center"></td>
					<td align="center"></td>
					<td align="center">1,០០០</td>
					<td></td>
					<td></td>
				</tr>
				<tr><td colspan="6"  style="height: 80px;" ></td></tr>
				<tr>
					<td colspan="5" style="visibility: hidden;padding-right: 10px;background: #355176;color: #fff;text-align: right;" class="darkbblue main-color">បំណុល​សរុប TOTAL BALANCE</td>
					<td style="border: none;text-align: right"><strong>1,000</strong></td>
				</tr>
				<tr>
					<td rowspan="4" colspan="3"></td>
					<td colspan="2" class="greyy" style="visibility: hidden;background: \\#ccc;">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td style="text-align: right"><strong>1,000</strong></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;visibility: hidden;">ថ្ងៃផុតកំណត់ DUE DATE</td>
					<td> <?php echo date("d/m/Y"); ?></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;visibility: hidden;">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;visibility: hidden;">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<div class="line" style="visibility: hidden;"></div>
		<table class="span12 table footerTbl" style="border:none;padding:0;border-collapse: inherit;margin-top: 15px; border-radius: 3px;margin-left: 0px;">
			<tbody>
				<tr>
					<td width="100"></td>
					<th width="390" style="border: none">
						<span style="margin-left: -15px;" id="footwnumber1"></span>
					</th>
					<td width="270" class="greyy" style="background: #ccc;border-bottom:1px solid #fff;visibility: hidden;">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td width="180">1,000</td>
				</tr>
				<tr>
					<td style="visibility: hidden;"><p>វិក្កយបត្រ</p></td>
					<td><span><?php echo date("d/m/Y"); ?></span> - <span>WM00001</span></td>
					<td class="greyy" style="visibility:hidden;background: #ccc;border-bottom:1px solid #fff;">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td></td>
				</tr>
				<tr>
					<td style="visibility: hidden;"><p>អតិថិជន</p></td>
					<td><span>001</span> <span>Customer Name</span><br>
					<span>012 111 222</span> <span>No. 123, St.11</span></td>
					<td class="greyy" style="visibility: hidden;background: #ccc;border-bottom:1px solid #fff;visibility: hidden;">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
				<tr>
					<td style="visibility: hidden;">លេខ​ទី​តាំង</td>
					<td>A1-01</td>
					<td rowspan="2" class="greyy" style="background: #ccc;visibility: hidden;">អ្នកទទួលប្រាក់ RECEIVER</td>
					<td rowspan="2"></td>
				</tr>
				<tr>
					<td style="visibility: hidden;">លេខ​កុនង​ទ័រ</td>
					<td>WM0001</td>
				</tr>
			</tbody>
		</table>
	</div>
</script>
<script id="invoiceForm3-bk-26" type="text/x-kendo-template">
    <div class="row-fluid">
    	<div class="col-md-8 col-md-offset-2" inv1" style="margin-top: 15px; padding-right: 15px; padding-left: 8px; ">
    		<div class="head" style="width: 100%; margin-bottom: 10px; float: left;">
	        	<!-- <div class="logo" style="width: 30%;">
	            	<img data-bind="attr: { src: objLicense.image_url, alt: company.name, title: company.name }" />
	            </div> -->
	            <div class="cover-name-company" style="width: 100%; margin-left: 15px;">
	            	<h2 style="text-align: center;">សហគ្រាសបន្ទាយមាស អេឡិទ្រីស៊ីធី    </h2>
	                <p style="font-size: 12px; color: #000; text-align: center;">ភូមិទូកមាស ឃុំទូកមាសខាងលិច ស្រុកបន្ទាយមាស ខេត្តកំពត </p>
	                
	            </div>
	        </div>
	        <h2 style="text-align: center; font-weight: 700; margin-bottom: 15px;">វិក្កយបត្រ INVOICE</h2>
	        
	        <div class="row " style="width: 100%; text-align: center; margin-left: 7%; margin-bottom: 10px;">
	    		<div class="">
		    		<table style="width: 100%;">
		    			<tr>
		    				<td style="width: 50% text-align: left;">លេខវិក្កយបត្រ INVOICE NO</td>
		    				<td style="padding: 5px;">
		    					<input type="text">
		    				</td>

		    			</tr>
		    			<tr>
		    				<td style="width: 50%; text-align: left;">ថ្ងៃចេញ INVOICE DATE</td>
		    				<td style="padding: 5px;">
		    					<input type="text">
		    				</td>
		    			</tr>
		    		</table>
		    	</div>
	    	</div>

	        <div class="row">
    			<div class="span6" style="padding-right: 0">
    				<p style="list-style: 20px; margin-bottom: 0;">
    					<b>យិន អ៊ិច</b><br>
    					ភូមិសាមគ្គី ឃុំអង្គរជ័យ
    				</p>
		    	</div>
		    	<div class="span6" style="padding: 0;">
		    		<img style="width: 180px; height: auto; float: right;" src="<?php echo base_url();?>/assets/barcode.png">
		    		<p style="margin-bottom: 0; float: right; margin-top: 5px; font-size: 12px; margin-left: 8px;">លេខកូដអតិថិជន ០០៤៣៣៦</p>
		    	</div>
    		</div>
    		
    		<div class="row" style="padding-left: 0;">
	    		<p style="width: 180px; float: left; margin: 25px 0 0 8px; font-size: 20px; ">ចំនួនដែលត្រូវបង់សរុប</p>
	    		<p style="padding: 5px 8px; background: #F1F1F1; border: 1px solid #000; width: 190px; float: right;font-size: 25px; color: #000;font-weight: 600; text-align: right; margin: 13px 0 10px 8px;">38,808,900</p>
	    		<p style="float: left; text-align: center; width: 100%;">
	    			សូមអញ្ជើញមកបង់ប្រាក់ អោយបានមុនថ្ងៃផុតកំនត់ទី
	    			<span style="font-weight: 600;">១៥ មេសា ២០១៦</span>
	    		</p>
	    	</div>

	        <div class="table-content" style="border: 2px solid #30859C; border-radius: 10px; padding: 10px; margin: 10px 8px; font-weight: 600; float: left; width: 100%;">    		
	    		<table>
	    			<thead>
	    				<tr>
	    					<th>អំនានមុន <br> PREVIOUS</th>
	    					<th>អំនានថ្មី <br> LASTES</th>
	    					<th>ប្រើប្រាស់ <br> UNIT</th>
	    					<th>តម្លៃឯកតា <br> RATE</th>
	    					<th>តម្លៃសរុប <br> AMOUNT</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				<tr>
	    					<td>1</td>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    				</tr>
	    				<tr>
	    					<td>2</td>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    				</tr>
	    				<tr>
	    					<td>3</td>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    				</tr>
	    				<tr>
	    					<td>4</td>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    				</tr>
	    			</tbody>
	    			<tfoot>
	    				<tr>
	    					<td colspan="4" style="text-align: right;">
	    						<span >
	    							ថាមពលប្រើប្រាស់សរុបសម្រាប់រយះពេលនេះ
	    						</span>
	    					</td>
	    					<td colspan="1" style="font-weight: 700; text-align: right;">
	    						<span >
	    							100,000
	    						</span>
	    					</td>
	    				</tr>
	    				<tr>
	    					<td colspan="4" style="text-align: right;">
	    						<span >
	    							សមតុល្យសាច់ប្រាក់ជំពាក់គ្រាមុន
	    						</span>
	    					</td>
	    					<td colspan="1" style="font-weight: 700; text-align: right;">
	    						<span >
	    							0
	    						</span>
	    					</td>
	    				</tr>
	    				<tr>
	    					<td colspan="4" style="text-align: right;">
	    						<span >
	    							ប្រាក់ដែលត្រូវបង់សរុប
	    						</span>
	    					</td>
	    					<td colspan="1" style="font-weight: 700; text-align: right;">
	    						<span >
	    							100,000
	    						</span>
	    					</td>
	    				</tr>
	    			</tfoot>
	    		</table>
	    	</div>

	    	<div class="row" style="float: left; margin-left: 50px;">
	    		<p style="margin-bottom: 0;">បច្ចេកទេស <span style="font-weight: 700">០៣៣ ៦៦០១ ៣៣៣</span></p>
	    		<p>បង់ប្រាក់ និងវិក័យប័ត្រ <span style="font-weight: 700">០១១ ៦០០ ៧៣០</span></p>
	    	</div>
    	</div>
    </div>
</script>
<script id="invoiceForm3" type="text/x-kendo-template">
    <div class="row-fluid">
    	<div class="col-md-8 col-md-offset-2" inv1" style="margin-top: 15px; padding-right: 15px; padding-left: 8px; ">
    		<div class="head" style="width: 100%; margin-bottom: 10px; float: left;">
	        	<!-- <div class="logo" style="width: 30%;">
	            	<img data-bind="attr: { src: objLicense.image_url, alt: company.name, title: company.name }" />
	            </div> -->

	            <div class="cover-name-company" style="width: 100%; margin-left: 15px;">
	            	<h2 style="text-align: center; line-height: 47px; margin-bottom: 5px; width: 100%">សហគ្រាសបន្ទាយមាស អេឡិទ្រីស៊ីធី    </h2>
	                <!-- <p style="font-size: 12px; color: #000; text-align: center;">ភូមិទូកមាស ឃុំទូកមាសខាងលិច ស្រុកបន្ទាយមាស ខេត្តកំពត </p> -->
	                <p style="width: 100%; float: left; text-align: center; margin-bottom: 0;">Tel: 012345678</p>
	            </div>
	        </div>
	        <h2 style="text-align: center; font-weight: 700; margin-bottom: 15px; width: 100%;">វិក្កយបត្រ INVOICE</h2>
	        
	        <!-- <div class="row " style="width: 100%; text-align: center; margin-left: 7%; margin-bottom: 10px;">
	    		<div class="">
		    		<table style="width: 100%;">
		    			<tr>
		    				<td style="width: 50% text-align: left;">លេខវិក្កយបត្រ INVOICE NO</td>
		    				<td style="padding: 5px;">
		    					<input type="text">
		    				</td>

		    			</tr>
		    			<tr>
		    				<td style="width: 50%; text-align: left;">ថ្ងៃចេញ INVOICE DATE</td>
		    				<td style="padding: 5px;">
		    					<input type="text">
		    				</td>
		    			</tr>
		    		</table>
		    	</div>
	    	</div> -->
	    	<div class="row">
    			<div class="span6" style="padding-left: 0">
    				<table style="width: 100%; float: left;">
    					<tr >
    						<td>ល.អ :</td>
    						<td>KWS_A-19894</td>
    					</tr>
    					<tr>
    						<td>ឈ្មោះ :</td>
    						<td>តេង ពេញ</td>
    					</tr>
    					<tr>
    						<td>ប្លុក :</td>
    						<td>A1-ភូមិស៊ីធរ</td>
    					</tr>
    				</table>
    			</div>
    			<div class="span6" style="padding-right: 0">
    				<table style="width: 100%; float: right; text-align: right; line-height: 22px;">
    					<tr >
    						<td>កូដកុងទ័រ :</td>
    						<td>A-1-9894</td>
    					</tr>
    					<tr>
    						<td>ថ្ងៃចេញវិ.ក :</td>
    						<td>30-កញ្ញា-2017</td>
    					</tr>
    					<tr>
    						<td>ពីថ្ងៃទី :</td>
    						<td>30-សីហា-2017</td>
    					</tr>
    					<tr>
    						<td>ដល់ថ្ងៃទី :</td>
    						<td>29-កញ្ញា-2017</td>
    					</tr>
    				</table>
    			</div>
	    	</div>
	        <div class="row">
    			<!-- <div class="span12" style="padding-right: 0">
    				<div class="span6" style="padding-right: 0">
	    				<p style="list-style: 20px; margin-bottom: 0;">
	    					<b>យិន អ៊ិច</b><br>
	    					ភូមិសាមគ្គី ឃុំអង្គរជ័យ
	    				</p>
	    			</div>
	    			<div class="span6" style="padding-right: 0">
	    				<p style="margin-bottom: 0; float: right; margin-top: 5px; font-size: 12px; margin-left: 8px;">
	    					លេខកូដអតិថិជន </b><br>
	    					<span style="font-size: 15px;">០០៤៣៣៦</span>
	    				</p>
	    			</div>
		    	</div>
		    	<div class="span12" style="padding-right: 0">
		    		<table style="width: 100%;">
		    			<tr>
		    				<td style="width: 50% text-align: left;">លេខកុងទ័រ METER NO</td>
		    				<td style="padding: 5px;">
		    					<input type="text">
		    				</td>

		    			</tr>
		    		</table>
		    	</div> -->
		    	<div class="span12" style="padding: 0;">
		    		<img style="width: 100%; height: auto; float: left; margin: 8px 0;" src="<?php echo base_url();?>/assets/barcode.png">
		    		
		    	</div>
    		</div>
    		
    		<div class="row" style="padding-left: 0;">
	    		<p style="width: 180px; float: left; margin: 25px 0 0 8px; font-size: 20px; ">ចំនួនដែលត្រូវបង់សរុប</p>
	    		<p style="padding: 5px 8px; background: #F1F1F1; border: 1px solid #000; width: 190px; float: right;font-size: 25px; color: #000;font-weight: 600; text-align: right; margin: 13px 0 10px 8px;">38,808,900</p>
	    		<p style="float: left; text-align: center; width: 100%;">
	    			សូមអញ្ជើញមកបង់ប្រាក់ អោយបានមុនថ្ងៃផុតកំនត់ទី
	    			<span style="font-weight: 600;">១៥ មេសា ២០១៦</span>
	    		</p>
	    	</div>

	        <div class="table-content" style="font-weight: 600; float: left; width: 100%;">    		
	    		<table>
	    			<thead>
	    				<tr>
	    					<th style="background: #333; border: 1px solid #ccc; ">អំនានមុន <br> PREVIOUS</th>
	    					<th style="background: #333; border: 1px solid #ccc; ">អំនានថ្មី <br> LASTES</th>
	    					<th style="background: #333; border: 1px solid #ccc; ">ប្រើប្រាស់ <br> UNIT</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				<tr>
	    					<td style="border: 1px solid #ccc; ">1</td>
	    					<td style="border: 1px solid #ccc; "></td>
	    					<td style="border: 1px solid #ccc; "></td>
	    				</tr>
	    			</tbody>
	    			<tfoot>
	    				<tr style="border: 1px solid #ccc; ">
	    					<td colspan="2" style="text-align: right; border: 1px solid #ccc;">
	    						<span style="color: #333; font-size: 15px;">
	    							ថ្លៃថែទាំកុងទ័រ
	    						</span>
	    					</td>
	    					<td colspan="1" style="font-weight: 700; text-align: right; border: 1px solid #ccc;">
	    						<span style="color: #333; font-size: 15px;"">
	    							100,000
	    						</span>
	    					</td>
	    				</tr>
	    				<tr>
	    					<td colspan="2" style="text-align: right; border: 1px solid #ccc;">
	    						<span style="color: #333; font-size: 15px;"">
	    							សមតុល្យសាច់ប្រាក់ជំពាក់គ្រាមុន
	    						</span>
	    					</td>
	    					<td colspan="1" style="font-weight: 700; text-align: right; border: 1px solid #ccc;">
	    						<span style="color: #333; font-size: 15px;"">
	    							0
	    						</span>
	    					</td>
	    				</tr>
	    				<tr>
	    					<td colspan="2" style="text-align: right; border: 1px solid #ccc;">
	    						<span style="color: #333; font-size: 15px;"">
	    							ប្រាក់ដែលត្រូវបង់សរុប
	    						</span>
	    					</td>
	    					<td colspan="1" style="font-weight: 700; text-align: right; border: 1px solid #ccc;">
	    						<span style="color: #333; font-size: 15px;"">
	    							100,000
	    						</span>
	    					</td>
	    				</tr>
	    			</tfoot>
	    		</table>
	    	</div>

	    	<div class="row" style="float: left; margin-left: 50px;">
	    		<p style="margin-bottom: 0;">បច្ចេកទេស <span style="font-weight: 700">០៣៣ ៦៦០១ ៣៣៣</span></p>
	    		<p>បង់ប្រាក់ និងវិក័យប័ត្រ <span style="font-weight: 700">០១១ ៦០០ ៧៣០</span></p>
	    	</div>
    	</div>
    </div>
</script>
<script id="invoiceForm4" type="text/x-kendo-template">
	<div class="container font-small winvoice-print" style="margin-bottom: 10px; width: 610px; ">
		<div class="span12 headerinv " style="border-bottom: 2px solid \#000;padding: 15px 0;">
            <img class="logoP" data-bind="attr: { src: objLicense.image_url }"  style="position: absolute;left: 0;top: 20px;max-width: 100px;height: auto;max-height: 50px;" />
			<div class="span12" align="center">
				<h4 data-bind="text: objLicense.name"></h4>					
				<h5 data-bind="text: objLicense.address"></h5>
				<h5 data-bind="text: objLicense.mobile"></h5>					
			</div>
		</div>		

		<div class="span12 cover-customer">
			
			<div class="span7">
				<span id="secondwnumber1" style="margin-left: -14px;"></span>
				<div class="span12">
					<p>អតិថិជន​ <span>001</span></p>
					<p>Customer Name</p>
					<p>No.124, St. 11</p>
					<p style="font-size: 10px;"><i>ថ្ងៃ​ចាប់​ផ្តើម​ទទួល​ប្រាក់ <?php echo date("d/m/Y"); ?></i></p>
				</div>
			</div>
			<div class="span4">
				<table >
					<tr>
						<td width="200"><p>លេខ​វិក្កយ​បត្រ</p></td>
						<td><p>WM00001</p></td>
					</tr>
					<tr>
						<td><p>ថ្ងៃ​ចេញ វិក្កយ​បត្រ</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
					<tr>
						<td><p>តំបន់</p></td>
						<td><p>A1-001</p></td>
					</tr>
					<tr>
						<td><p>លេខប្រអប់</p></td>
						<td><p>P77,001</p></td>
					</tr>
					<tr>
						<td><p>គិត​ចាប់​ពី​ថ្ងៃ​ទី</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
					<tr>
						<td><p>ដល់​ថ្ងៃ​ទី</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
				</table>		
			</div>			
		</div>
		<table class="span12 table table-bordered footerTbl" style="padding:0;margin-top: 40px;border:1px solid #000; border-radius: 3px;border-collapse: inherit;margin-left: 0px;">
			<thead>
				<tr>
					<th width="180" class="darkbblue main-color">លេខ​កុងទ័រ<br>METER</th>
					<th width="150" class="darkbblue main-color">អំណានចាស់<br>PREVIOUS</th>
					<th width="120" class="darkbblue main-color">អំណានថ្មី<br>CURRENT</th>
					<th width="120" class="darkbblue main-color">បរិមាណ<br>CONSUMPTION</th>
					<th width="120" class="darkbblue main-color">តំលៃឯកត្តា<br>RATE</th>
					<th width="180" class="darkbblue main-color">តំលៃសរុប<br>AMOUNT</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="vertical-align: middle;"> <?php echo date("d/m/Y"); ?></td>
					<td colspan="4" style="text-align: right">
						ជំពាក់​សរុប​នៅ​ថ្ងៃ​ធ្វើ​វិក្កយបត្រ Balance as at billing date .រ
					</td>
					<td>
						0<br>
					</td>
				</tr>
				<tr>
					<td data-bind="text: meter_number"></td>
					<td align="center">1</td>
					<td align="center">2</td>
					<td align="center">1</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>រំលោះ</td>
					<td align="center"></td>
					<td align="center"></td>
					<td align="center">1,០០០</td>
					<td></td>
					<td></td>
				</tr>
				<tr><td colspan="6"  style="height: 80px;" ></td></tr>
				<tr>
					<td colspan="5" style="padding-right: 10px;background: #355176;color: #fff;text-align: right;" class="darkbblue main-color">បំណុល​សរុប TOTAL BALANCE</td>
					<td style="border: 1px solid;text-align: right"><strong>1,000</strong></td>
				</tr>
				<tr>
					<td rowspan="4" colspan="3"></td>
					<td colspan="2" class="greyy" style="background: \\#ccc;">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td style="text-align: right"><strong>1,000</strong></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;">ថ្ងៃផុតកំណត់ DUE DATE</td>
					<td> <?php echo date("d/m/Y"); ?></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<div class="line"></div>
		<table class="span12 table table-bordered footerTbl" style="padding:0;border-collapse: inherit;margin-top: 15px;border:1px solid #000; border-radius: 3px;margin-left: 0px;">
			<tbody>
				<tr>
					<td width="100"></td>
					<th width="390" style="border: none">
						<span style="margin-left: -15px;" id="footwnumber1"></span>
					</th>
					<td width="270" class="greyy" style="background: #ccc;border-bottom:1px solid #fff;">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td width="180">1,000</td>
				</tr>
				<tr>
					<td><p>វិក្កយបត្រ</p></td>
					<td><span><?php echo date("d/m/Y"); ?></span> - <span>WM00001</span></td>
					<td class="greyy" style="background: #ccc;border-bottom:1px solid #fff;">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td></td>
				</tr>
				<tr>
					<td><p>អតិថិជន</p></td>
					<td><span>001</span> <span>Customer Name</span><br>
					<span>012 111 222</span> <span>No. 123, St.11</span></td>
					<td class="greyy" style="background: #ccc;border-bottom:1px solid #fff;">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
				<tr>
					<td>លេខ​ទី​តាំង</td>
					<td>A1-01</td>
					<td rowspan="2" class="greyy" style="background: #ccc;">អ្នកទទួលប្រាក់ RECEIVER</td>
					<td rowspan="2"></td>
				</tr>
				<tr>
					<td>លេខ​កុនង​ទ័រ</td>
					<td>WM0001</td>
				</tr>
			</tbody>
		</table>
	</div>
</script>
<script id="invoiceForm3-bk" type="text/x-kendo-template">
    <div class="row-fluid">
    	<div class="span7 inv1" style="width: 54%; padding-right: 15px; padding-left: 8px; ">
    		<div class="head" style="width: 100%">
	        	<div class="logo" style="width: 30%;">
	            	<img data-bind="attr: { src: objLicense.image_url, alt: company.name, title: company.name }" />
	            </div>
	            <div class="cover-name-company" style="width: 65%; margin-left: 15px;">
	            	<h2 style="text-align: left;">សហគ្រាសបន្ទាយមាស អេឡិទ្រីស៊ីធី    </h2>
	                <p style="font-size: 12px; color: #000;">ភូមិទូកមាស ឃុំទូកមាសខាងលិច ស្រុកបន្ទាយមាស ខេត្តកំពត </p>
	                
	            </div>
	        </div>
	        <div class="row textunder">
	        	<div clas="span6" style="width: 47%;float: left; display: inherit; line-height: 30px;">
	        		<p>បច្ចេកទេស</p>
	        		<a href="#" class="glyphicons no-js iphone" style="font-weight: 600; color: #31849b;">
	        			<i></i> 
	        			<span style="margin-left: 17px;">០៣៣ ៦៦០១ ៣៣៣</span>
	        		</a>
	        		<p>២៤ម៉ោង</p>
	        	</div>
	        	<div clas="span6" style="width: 50%;float: left; display: inherit; border-left: 1px solid #000; padding-left: 15px; line-height: 30px;">
	        		<p>បង់ប្រាក់ និង វិក្កយបត្រ </p>
	        		<a href="#" class="glyphicons no-js iphone" style="font-weight: 600; color: #31849b;">
	        			<i></i>
	        			<span style="margin-left: 17px;">០៩៩ ៨៤១ ១៣៣</span>
	        		</a>
	        		<p>ច័ន្ទ ដល់ សៅរ៍ ៧:០០-៦:០០</p>
	        	</div>
	        </div>
    	</div>
    	<div class="span5 " style="padding-left: 0; padding-right: 8px; width: 46%">
    		<div class="headertable-invoice">
	    		<table style="">
	    			<tr>
	    				<td>លេខវិក្កយបត្រ INVOICE NO</td>
	    				<td>
	    					<input type="text">
	    				</td>

	    			</tr>
	    			<tr>
	    				<td>ថ្ងៃចេញ INVOICE DATE</td>
	    				<td>
	    					<input type="text">
	    				</td>
	    			</tr>
	    			<tr>
	    				<td>តំបន់ AREA</td>
	    				<td>
	    					<input type="text">
	    				</td>
	    			</tr>
	    			<tr>
	    				<td>លេខប្រអប់ BOX NO</td>
	    				<td>
	    					<input type="text">
	    				</td>
	    			</tr>
	    		</table>
	    	</div>
    	</div>
    </div>

    <div class="row-fluid">
    	<div class="span5">
    	</div>
    	<div class="span7">
    		<div class="row">
    			<div class="span5" style="padding-right: 0">
    				<p style="list-style: 20px; margin-bottom: 0;">
    					<b>យិន អ៊ិច</b><br>
    					ភូមិសាមគ្គី ឃុំអង្គរជ័យ
    				</p>
		    	</div>
		    	<div class="span6" style="padding-left: 0; margin-left: 15px;">
		    		<img style="width: 180px; height: auto; " src="<?php echo base_url();?>/assets/barcode.png">
		    		<p style="margin-bottom: 0; margin-top: 5px; font-size: 12px; margin-left: 8px;">លេខកូដអតិថិជន ០០៤៣៣៦</p>
		    	</div>
    		</div>
    	</div>
    </div>

    <div class="row-fluid">
    	<div class="span4" style="padding-left: 15px; padding-left: 8px;">
    		<p >ប្រវត្តិប្រើប្រាស់របស់អ្នកក្នុងឆ្នាំនេះ</p>
    		<img style="width: 175px; height: auto;" src="<?php echo base_url();?>/assets/chart.png">
    	</div>
    	<div class="span8" style="padding-left: 0;">
    		<img style="width: 58px; height: auto; float: left;" src="<?php echo base_url();?>/assets/icon-water.png">
    		<p style="width: 140px; float: left; margin: 25px 0 0 8px; font-size: 20px; ">ប្រាក់ត្រូវបង់សរុប</p>
    		<p style="padding: 5px 8px; background: #F1F1F1; border: 1px solid #000; width: 190px; float: left;font-size: 25px; color: #000;font-weight: 600; text-align: right; margin: 13px 0 10px 8px;">38,808,900</p>
    		<p style="margin-left: 30px; float: left; margin-bottom: 0;">សូមអញ្ជើញមកបង់ប្រាក់ អោយបានមុនថ្ងៃផុតកំនត់ទី</p><br>
    		<p style="margin-left: 40%; float: left; font-weight: 600;">១៥ មេសា ២០១៦</p>

    	</div>
    </div>

    <div class="row-fluid">
    	<div class="table-content" style="border: 2px solid #30859C; border-radius: 10px; padding: 10px; margin: 10px 8px; font-weight: 600; float: left; width: 97.5%;">
    		<p style="color: #30859C;">ការប្រើប្រាស់របស់អ្នកក្នុងរយះពេលពី​ (Electricity charges) <span style="color: #000;">01-05-2013</span> ដល់ <span style="color: #000;">31-05-2013</span></p>
    		<table>
    			<thead>
    				<tr>
    					<th>លេខកុងទ័រ <br> METER NO.</th>
    					<th>អំនានមុន <br> PREVIOUS</th>
    					<th>អំនានថ្មី <br> LASTES</th>
    					<th>មេគុណ <br> MULTIPLIER</th>
    					<th>ប្រើប្រាស់ <br> UNIT</th>
    					<th>តម្លៃឯកតា <br> RATE</th>
    					<th>តម្លៃសរុប <br> AMOUNT</th>
    				</tr>
    			</thead>
    			<tbody>
    				<tr>
    					<td>1</td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    				</tr>
    				<tr>
    					<td>2</td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    				</tr>
    				<tr>
    					<td>3</td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    				</tr>
    				<tr>
    					<td>4</td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    				</tr>
    			</tbody>
    			<tfoot>
    				<tr>
    					<td colspan="2" rowspan="5"></td>
    					<td colspan="4">
    						ប្រាក់ត្រូវបង់សរុប ខែនេះ
    						<span style="font-size: 10px;">
    							Total charge for this period
    						</span>
    					</td>
    					<td colspan="2" ></td>
    				</tr>
    				<tr>
    					<td colspan="4">
    						ប្រាក់ត្រូវបង់សរុប
    						<span style="font-size: 10px;">
    							Total amount due
    						</span>
    					</td>
    					<td colspan="2"></td>
    				</tr>
    				<tr>
    					<td colspan="2" rowspan="3" style="vertical-align: middle;">
    						<div style="margin: 0 auto; width: 92px; height: 92px; border: 1px solid #A8B8CB; border-radius: 50%;">
							</div>
    					</td>
    					<td colspan="2">ថ្ងៃដែលបានបង់ប្រាក់ PAY DATE</td>
    					<td ></td>
    				</tr>
    				<tr>
    					<td colspan="2">ប្រាក់ដែលបានបង់ AMOUNT PAID</td>
    					<td ></td>
    				</tr>
    				<tr>
    					<td colspan="2">ហត្ថលេខា និងឈ្មោះរបស់បេឡាករ</td>
    					<td ></td>
    				</tr>
    			</tfoot>
    		</table>    		
    	</div>    	
    </div>

    <div class="row-fluid" style="float: left; border-bottom: 2px dotted #B9CDE4;">
		<a href="#" style="float: left; margin-left: 15px; " class="glyphicons no-js share"><i></i></a>
		<div class="span11" style="padding-left: 0;">    			
    		<p style="float: left; margin: 0; font-size: 11px; width: 100%;">
				ក្នុងករណីដែលលោក លោកស្រីមិនបានមកបង់ប្រាក់ទាន់ពេលកំនត់ ក្រុមហ៊ិននឹងផ្អាក់ការប្រើប្រាស់របស់លោកអ្នក
			</p>
			<p style="float: left; font-size: 11px; padding-bottom: 8px;">
				ការភ្ជាប់ចរន្តជួនវិញ លុះត្រាតែអតិថិជនបានទូទាត់បំណុលសរុបក្នុងវិក្កយបត្រនេះដោយបូកបន្ថែមការប្រាក់១% និងសេវាភ្ជាប់ចរន្តរួចហើយ។
			</p>
		</div>
	</div>
	<div class="row-fluid">
		<div class="invoice-footer" style="float: left; width: 100%; text-align: center;">
			<p style="text-align: center; margin-top: 10px; font-weight: 600; ">បង្កាន់ដៃបង់ប្រាក់ PAYMENT SLIP</p>
		</div>		
		<div class="span1" style="width: 108px;float: left;padding-right: 0;text-align: center;">
			<div style="float: left; width: 92px; height: 92px; margin:0 0 5px 0; border: 1px solid #A8B8CB; border-radius: 50%;">
			</div>
			<p style="font-size: 10px; float: left;">ហត្ថលេខា និងត្រា របស់បេឡាករ </p>
			<p style="display: inline-block; text-align: center; margin-top: 40px; border-bottom: 1px solid #000; width: 75px;"></p>
		</div>
		<div class="row-fluid" style="width: 489px;float: left;clear: initial; margin-left: 15px;">
			<div class="span4">
				<p style="text-align: center; font-size: 12px; margin-bottom: 5px;">លេខវិក្កយបត្រ INVOICE NO</p>
				<p style="padding: 8px; background: #fff; margin-bottom: 0; border: 1px solid #A8B8CB; width: 155px; float: left;font-size: 15px; color: #000;font-weight: 600; text-align: center; ">INV1305-00001</p> 
			</div>
			<div class="span4">
				<p style="text-align: center; font-size: 12px; margin-bottom: 5px;">ប្រាក់ត្រូវបង់ AMOUNT DUE</p>
				<p style="padding: 8px; background: #fff; margin-bottom: 0; margin-left: -9px; border: 1px solid #A8B8CB; width: 155px; float: left;font-size: 15px; color: #000;font-weight: 600; text-align: center; ">38,808,900</p> 
			</div>
			<div class="span4">
				<p style="text-align: center; font-size: 12px; margin-bottom: 5px;">ថ្ងៃបង់ប្រាក់ PAY DATE</p>
				<p style="padding: 8px; background: #fff; margin-bottom: 0; border: 1px solid #A8B8CB; width: 155px; float: left;font-size: 15px; color: #000;font-weight: 600; text-align: center; ">38,808,900</p> 
			</div>
		</div>
		<div class="row-fluid" style="width: 489px;float: left;clear: initial; margin-left: 15px;">
			<div class="span8">
				<p style="float: left; margin-top: 5px; clear: both;"><b>យិន អ៊ិច</b> <br/> ភូមិសាមគ្គី ឃុំអង្គរជ័យ</p>
				<div style=" float: left;">
		    		<img style="width: 257px; height: auto; " src="<?php echo base_url();?>/assets/barcode.png">
		    		<p style="margin-bottom: 0; margin-top: 5px; font-size: 12px; margin-left: 8px;">លេខកូដអតិថិជន ០០៤៣៣៦</p>
		    	</div>
		    </div>
		    <div class="span4" style="padding: 0;">
		    	<p style="text-align: center; font-size: 12px; margin-bottom: 0px; margin-top: 8px;">ប្រាក់បានបង់ AMOUNT DUE</p>
		    	<p style="padding: 8px; height: 40px; background: #fff; margin-bottom: 0; border: 5px solid #000; width: 155px; float: left;font-size: 15px; color: #000;font-weight: 600; text-align: center; "></p>
		    	<p style="font-size: 11px; font-weight: 600; margin-top: 10px; float: left;">សហគ្រាសបន្ទាយមាស អេឡិទ្រីស៊ីធី</p>
		    </div>
		</div>
	</div>
</script>

<script id="invoiceCustom-txn-form-template" type="text/x-kendo-template">
	<a class="span4 #= type #" data-id="#= id #" data-bind="click: selectedForm" style="padding: 0; width: 32%;">
    	<img src="<?php echo base_url(); ?>assets/invoice/img/#= image_url #.jpg" alt="#: name # image" />
    </a>
</script>
<script id="invoiceForm-lineDS-template" type="text/x-kendo-template">
	<tr>
		<td><i>#:banhji.invoiceForm.lineDS.indexOf(data)+1#</i>&nbsp;</td>
		<td class="lside">#= description#</td>
		<td>#= quantity#</td>
		<td class="rside" width="70">#= kendo.toString(price, locale=="km-KH"?"c0":"c", locale) #</td>
		<td class="rside">#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale) #</td>
	</tr>
</script>

<script id="Reconcile" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden; margin-top: 15px;">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>	
					</div>
			        <h2 style="margin-bottom: 10px;" data-bind="text: lang.lang.reconcile">Reconcile</h2>
			        <br>
			        <div class="row-fluid reconcile">
				        <table class="span12 table-remove" style="width: 99.9%">
				        	<thead>
					        	<tr>
					        		<th colspan="1" align="left" data-bind="text: lang.lang.actual_cash_count">Actual Cash Count : <span data-bind="text: actualCash"></span></th>
					        	</tr>
				        	</thead>
				        	<tbody>
					        	<tr>
									<td colspan="2" style="padding: 0;">
										<table>
											<thead>
											<tr>
												<td data-bind="click: list.addRow" style="border: 0;"><i class="icon-plus"></i></td>
												<td style="background: #0077c5; color: #fff; border-top: 0;" data-bind="text: lang.lang.currency">Currency:</td>
												<td style="background: #0077c5; color: #fff; border-top: 0;" data-bind="text: lang.lang.note">Note:</td>
												<td style="background: #0077c5; color: #fff; border-top: 0;" data-bind="text: lang.lang.unit">Unit</td>
												<td style="background: #0077c5; color: #fff; border-top: 0; border-right: 0;" data-bind="text: lang.lang.total">Total</td>
											</tr>
											</thead>
											<tbody data-role="listview" data-bind="source: list.dataSource" data-template="Reconcile-list-tmpl"></tbody>
										</table>
									</td>
					        	</tr>
					        	<tr>
					        		<td style="padding: 15px;">
					        			<table class="span6">
					        				<thead>
					        					<tr>
					        						<th colspan="2" data-bind="text: lang.lang.amount_received">
					        							Amount Received
					        						</th>
					        					</tr>
					        				</thead>
					        				<tbody data-role="listview" data-bind="source: receiptDS" data-template="reconcile-receipt-list">
					        				</tbody>
					        			</table>
					        		</td>
					        		<td style="padding: 15px;">
					        			<table class="span6">
					        				<thead>
					        					<tr>
					        						<th colspan="2" data-bind="text: lang.lang.actual_count">
					        							Actual Count
					        						</th>
					        					</tr>
					        				</thead>
					        				<tbody data-role="listview" data-bind="source: list.cashReceiptArr" data-template="reconcile-cash-list">
					        				</tbody>
					        			</table>
					        		</td>
					        	</tr>
					        </tbody>
				        </table>
			        </div>
			        <div class="box-generic bg-action-button" style="margin-top: 15px;">
						<div id="ntf1" data-role="notification"></div>
				        <div class="row">
							<div class="span12" align="right">
								<span class="btn-btn" data-bind="click: verify" ><i></i> <span data-bind="text: lang.lang.verify">Verify</span></span>
								<span class="btn-btn" data-bind="click: sync" ><i></i> <span data-bind="text: lang.lang.record">Record</span></span>
								
								<span class="btn-btn" data-bind="click: cancel" ><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
													
							</div>
						</div>
					</div>
				</div>						
			</div>
		</div>
	</div>				  	
</script>

<script id="Reconcile-list-tmpl" type="text/x-kendo-template">
	<tr>
		<td style="border-left: 0; border-bottom: 0;"><i style="cursor: pointer;" class="icon-trash" data-bind="click: removeRow" ></i></td>
		<td style="border-left: 0; border-bottom: 0;"><input type="text" data-role="combobox" data-bind="source: currencyDS, value: code" data-text-field="code" data-value-field="code"></td>
		<td style="border-left: 0; border-bottom: 0;"><input type="number" class="k-textbox" data-role="numerictextbox" data-format="n" data-min="0" data-spinners="false" data-bind="value: note, events: {change: onChange}" style="display: inline-block; height: 28px; border: none; width: 168px !important;"></td>
		<td style="border-left: 0; border-bottom: 0;"><input type="number" class="k-textbox" data-role="numerictextbox" data-format="n" data-min="0" data-spinners="false" data-bind="value: unit, events: {change: onChange}" style="display: inline-block; height: 28px; border: none; width: 168px !important;"></td>
		<td style="border-left: 0; border-bottom: 0;"><input type="number" data-role="numerictextbox" data-format="n" data-min="0" data-spinners="false" data-bind="value:total" style="display: inline-block; border: none; width: 168px !important;"></td>
	</tr>
</script>
<script id="reconcile-receipt-list" type="text/x-kendo-template">
	<tr>
		<td width="100">#=code#</td>
		<td>#=amount#</td>
	</tr>
</script>
<script id="reconcile-cash-list" type="text/x-kendo-template">
	<tr>
		<td width="100">#=code#</td>
		<td>#=total#</td>
	</tr>
</script>

<!-- ***************************
*	Template Blog         	  *
**************************** -->

<script id="account-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/account">+ Add New Account</a>
    </strong>
</script>
<script id="account-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=number#				
	</span>
	-
	<span>
		#if(name.length>25){#
			#=name.substring(0, 25)#..
		#}else{#
			#=name#
		#}#
	</span>
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
<script id="segment-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/segment">+ Add New Segment</a>
    </strong>
</script>
<script id="segment-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=code#</span> <span>#=name#</span>
</script>
<script id="customer-payment-method-header-tmpl" type="text/x-kendo-tmpl">
	<strong>
    	<a href="\#/customer_setting">+ Add New Payment Method</a>
    </strong>	
</script>
<!--  Backup  -->
<script id="Backup" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2 data-bind="text: lang.lang.backup">Backup</h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>
						<!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
							
								<!-- Tabs Heading -->
								<div class="widget-head" style="background: #203864 !important; color: #fff;">
									<ul style="padding-left: 0px;">
										<li class="active" style="width: 210px;">
											<a style="text-transform: capitalize;" href="#Download" data-toggle="tab">
												<span style="line-height: 23px;">
													<span  data-bind="text: lang.lang.download_db">Download Database</span>
												</span>
											</a>
										</li>
										<li style="width: 210px;">
											<a style="text-transform: capitalize;" href="#Upload" data-toggle="tab">
												<span style="line-height: 23px;">
													<span data-bind="text: lang.lang.upload_db">Upload Database</span>
												</span>
											</a>
										</li>
									</ul>
								</div>
								<div class="widget-body">
									<div class="tab-content">
										<div id="Download" style="border: 1px solid #ccc; overflow: hidden;" class="tab-pane active widget-body-regular">
										  	<form action="<?php echo base_url(); ?>utibill_backup" method="post">
										  		<input type="hidden" id="uinstitute" name="institute" data-bind="value: institute_id">
										  		<input type="hidden" id="uid" name="uid" data-bind="value: user_id">
											  	<button>
													<span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 200px!important;position: relative;margin: 0;">
														<i></i> 
														<span data-bind="text: lang.lang.download_db">Download Database</span>
													</span>
												</button>
											</form>
										</div>

										<div id="Upload" style="border: 1px solid #ccc; overflow: hidden;" class="tab-pane widget-body-regular">
										  	<form action="<?php echo base_url(); ?>import" method="post" accept-charset="utf-8" enctype="multipart/form-data">
										  		<div class="fileupload fileupload-new margin-none" data-provides="fileupload" >
													<input type="file" name="userfile" size="20" />
												</div>
										  		<input type="hidden" id="uinstitute" name="institute" data-bind="value: institute_id">
										  		<input type="hidden" id="uid" name="uid" data-bind="value: user_id">
											  	<button>
													<span id="saveClose" class="btn btn-icon btn-success glyphicons upload" style="width: 200px!important;position: relative;margin: 0px;">
														<i></i> 
														<span data-bind="text: lang.lang.upload_db">Upload Database</span>
													</span>
												</button>
											</form>
										</div>
									</div>
								</div>
								<div id="ntf1" data-role="notification"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<!--  Offline  -->
<script id="Offline" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;left: 0;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2>Offline</h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
								<div class="widget-head" style="background: #203864 !important; color: #fff;">
									<ul style="padding-left: 0px;">
										<li class="active" style="width: 210px;">
											<a style="text-transform: capitalize;" href="#Download" data-toggle="tab">
												<span style="line-height: 23px;">
													<span  data-bind="text: lang.lang.download">Download</span>
												</span>
											</a>
										</li>
										<li style="width: 210px;">
											<a style="text-transform: capitalize;" href="#Upload" data-toggle="tab">
												<span style="line-height: 23px;">
													<span data-bind="text: lang.lang.upload">Upload Database</span>
												</span>
											</a>
										</li>
									</ul>
								</div>
								<div class="widget-body">
									<div class="tab-content">
										<div id="Download" style="border: 1px solid #ccc; overflow: hidden;" class="tab-pane widget-body-regular active">
											<div class="row-fluid" style="overflow: hidden;">
												<div style="background: #fff; padding: 15px; width: 100%; color: #333; float: left; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1">
													<div class="col-xs-12 col-sm-5 ">
														<div class="innerAll" style="background: #eee;height :290px;">
															<div class="control-group">								
																<label ><span data-bind="text: lang.lang.license">License</span> <span style="color:red">*</span></label>
																<input 
																	data-role="dropdownlist" 
																	style="width: 100%; margin-bottom: 10px;" 
																	data-option-label="License ..." 
																	data-auto-bind="false" 
																	data-value-primitive="true" 
																	data-text-field="name" 
																	data-value-field="id" 
																	data-bind="
																		value: licenseSelect,
									                  					source: licenseDS,
									                  					events: {change: licenseChange}">
									                  		</div>
									                  		<div class="control-group">								
																<label ><span data-bind="text: lang.lang.location">Location</span> <span style="color:red">*</span></label>
																<input 
																	data-role="dropdownlist" 
																	style="width: 100%; margin-bottom: 10px;" 
																	data-option-label="Location ..." 
																	data-auto-bind="false" 
																	data-value-primitive="true" 
																	data-text-field="name" 
																	data-value-field="id" 
																	data-bind="
																		value: locationSelect,
									                  					source: locationDS,
									                  					enabled: haveLicense,
									                  					events: {change: onLocationChange}">
									                  		</div>
									                  		<div class="control-group">								
																<label ><span data-bind="text: lang.lang.sub_location">Sub Location</span></label>
																<input 
																	data-role="dropdownlist" 
																	style="width: 100%; margin-bottom: 10px;" 
																	data-option-label="Sub Location ..." 
																	data-auto-bind="false" 
																	data-value-primitive="true" 
																	data-text-field="name" 
																	data-value-field="id" 
																	data-bind="
																		value: subLocationSelect,
									                  					source: subLocationDS,
									                  					enabled: haveLocation,
									                  					events: {change: onSubLocationChange}">
									                  		</div>
									                  		<div class="control-group">								
																<label ><span data-bind="text: lang.lang.box">Box</span></label>
																<input 
																	data-role="dropdownlist" 
																	style="width: 100%;" 
																	data-option-label="Box ..." 
																	data-auto-bind="false" 
																	data-value-primitive="true" 
																	data-text-field="name" 
																	data-value-field="id" 
																	data-bind="
																		value: boxSelect,
									                  					source: boxDS,
									                  					enabled: haveSubLocation">
									                  		</div><br>
														</div>
													</div>
													<div class="col-xs-12 col-sm-7">
														<div class="tab-pane">
												        	<div class="row" >
											        			<div class="col-xs-12 col-sm-6">
																	<div class="control-group" style="margin-bottom: 10px;">
																		<label ><span data-bind="text: lang.lang.month_of" >Month Of</span> <span style="color:red">*</span></label>
															            <input type="text" 
														                	style="width: 100%;" 
														                	data-role="datepicker"
														                	data-format="MM-yyyy"
														                	data-parse-formats="yyyy-MM-dd HH:mm:ss"
														                	data-start="year" 
															  				data-depth="year" 
														                	placeholder="Moth of ..." 
																           	data-bind="value: monthOfSR" />
																	</div>
																</div>
														        <div class="col-xs-12 col-sm-6">
																	<div class="control-group" style="margin-bottom: 10px;">
																		<label ><span data-bind="text: lang.lang.to_date">To Date</span> <span style="color:red">*</span></label>
															            <input type="text" 
														                	style="width: 100%;" 
														                	data-role="datepicker"
														                	placeholder="To Date ..." 
														                	data-parse-formats="yyyy-MM-dd"
																           	data-bind="value: toDateSR" />
																	</div>
														        </div>
												        	</div>
												        	<div class="row">
											        			<div class="col-xs-12 col-sm-6">
																	<div class="control-group" style="margin-bottom: 10px;">
																		<label ><span data-bind="text: lang.lang.issue_date" >Issue Date</span> <span style="color:red">*</span></label>
															            <input type="text" 
														                	style="width: 100%;" 
														                	data-role="datepicker"
														                	data-parse-formats="yyyy-MM-dd HH:mm:ss"
														                	placeholder="Issue Date ..." 
																           	data-bind="value: IssueDate" />
																	</div>
																</div>
																<div class="col-xs-12 col-sm-6">
																	<div class="control-group" style="margin-bottom: 10px;">
																		<label ><span data-bind="text: lang.lang.billing_date" >Bill Date</span> <span style="color:red">*</span></label>
															            <input type="text" 
														                	style="width: 100%;" 
														                	data-role="datepicker"
														                	data-parse-formats="yyyy-MM-dd"
														                	placeholder="Bill Date ..." 
																           	data-bind="value: BillingDate" />
																	</div>
																</div>
												        	</div>
											        		<div class="row">
										        				<div class="col-xs-12 col-sm-6">
																	<div class="control-group">
																		<label ><span data-bind="text: lang.lang.due_date" >Due Date</span> <span style="color:red">*</span></label>
															            <input type="text" 
														                	style="width: 100%;" 
														                	data-role="datepicker"
														                	data-parse-formats="yyyy-MM-dd"
														                	placeholder="Due Date ..." 
																           	data-bind="value: DueDate" />
																	</div>
																</div>
																<div class="col-xs-12 col-sm-6">
												        			<span id="saveNew" style="width: 100% !important; text-align: center; margin-top: 22px; float: left;" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="click: getOfflineDB"><i></i> <span data-bind="text: lang.lang.download">Add</span></span>
												        		</div>
												        	</div>
												        	<div class="row" style="border-top: 1px solid #ccc;padding-top: 15px;margin-top: 15px;background: #eee;">
											        			<div class="col-xs-12 col-sm-6">
											        				<label ><span data-bind="text: lang.lang.reader" >Reader</span> <span style="color:red">*</span></label>
											        				<input 
																		data-role="dropdownlist" 
																		style="width: 100%; margin-bottom: 10px;" 
																		data-option-label="Reader ..." 
																		data-auto-bind="false" 
																		data-value-primitive="true" 
																		data-text-field="name" 
																		data-value-field="id" 
																		data-bind="
																			value: readerSelect,
										                  					source: readerDS">
											        			</div>
											        			<div class="col-xs-12 col-sm-6">
											        				<label ><span data-bind="text: lang.lang.tablet" >Tablet</span> <span style="color:red">*</span></label>
											        				<input 
																		data-role="dropdownlist" 
																		style="width: 100%; margin-bottom: 10px;" 
																		data-option-label="Tablet ..." 
																		data-auto-bind="false" 
																		data-value-primitive="true" 
																		data-text-field="name" 
																		data-value-field="id"
																		data-bind="
																			value: tabletSelect,
										                  					source: tabletDS,
										                  					events: {change: tabletChange}">
											        			</div>
											        		</div>
											        	</div>
													</div>
												</div>
											</div>
										</div>
										<div id="Upload" style="border: 1px solid #ccc; overflow: hidden;" class="tab-pane widget-body-regular">
											<div class="span12" style="border: 1px solid #ccc;padding-bottom: 10px;min-height: 131px;">
												<h2 style="position: relative;clear:both;width: 100%;" data-bind="text: lang.lang.upload"></h2>
												<div style="clear: both;float:left; width: 95%;margin-bottom: 10px;position: relative;">
													<input type="file" 
														data-role="upload"
														data-bind="events: {select: txnSelected}" 
														name="userfile" 
														style="height: 40px;" size="20" />
												</div>
											  	<button data-bind="click: saveTXNoffline">
													<span class="btn btn-icon btn-success glyphicons upload" style="width: 200px!important;position: relative;margin: 0px;">
														<i></i> 
														<span data-bind="text: lang.lang.upload">Upload Database</span>
													</span>
												</button>
											</div>
										</div>
									</div>
								</div>
								<div id="ntf1" data-role="notification"></div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<!-- Report -->
<script id="Reports" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<h2 style="font-family: 'Open Sans', sans-serif;margin: 15px 0 10px;font-weight: 400; color: #4d4d4d; font-size: 26px; text-transform: uppercase;" data-bind="text: lang.lang.reports">Reports</h2>
			<!-- <input id="ddlCashAccount" name="ddlCashAccount" 
				data-role="dropdownlist"
  				data-value-primitive="true"
				data-text-field="name" 
  				data-value-field="id"
  				data-bind="value: licenseSelect,
  							source: licenseDS, events: {change: onLicenseChange}"
  				data-option-label="Select Licenses..." style="margin-bottom: 15px" /> -->


  			<!-- <div class="row">
  				<div class="col-xs-12 col-sm-6">
					<div class="widget widget-3 customer-border" style="padding: 15px;">
						<div class="widget-head header-custome" style="display: none;">
							<h4 class="heading">
								How efficient is your working capital management?
							</h4>
						</div>					
						<div class="widget-body alert alert-primary" style="min-height: 178px; background: #203864; color: #fff; margin-bottom: 0; border-radius: 0;">
							<a href="#/customer_deposit_report">
								<div align="center" class="text-large strong" style="font-size: 35px;">
									<span style="color: #fff;" data-bind="text: totalDeposit"></span>
									<br>
									<p style="font-size: 14px; color: #fff;" data-bind="text: lang.lang.total_deposit" >Total Deposit</p>
								</div>
							</a>
							<table width="100%">
								<tbody>
									<tr align="center" style="vertical-align: top;">
										<td width="33%">
											<a href="#/customer_list">										
												<span style="font-size: 18px; color: #fff;" data-bind="text: activeCustomer"></span>
												<br>
												<span style="font-size: 12px; color: #fff;" data-bind="text: lang.lang.active_customer_ratio">Active Customer Ratio</span>
											</a>
										</td>
										<td width="33%">
											<a href="#/customer_list">
												<span style="font-size: 18px; color: #fff;" data-bind="text: nCustomer"></span>
												<br>
												<span style="font-size: 12px; color: #fff;" data-bind="text: lang.lang.total_customer_ratio">Total Customer Ratio</span>
											</a>
										</td>
										<td width="33%">
											<a href="#/customer_list">
												<span style="font-size: 18px; color: #fff;" data-bind="text: tCustomer"></span>
												<br>
												<span style="font-size: 12px; color: #fff;" data-bind="text: lang.lang.total_no_of_customer">Total No. of Customer</span>
											</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>									
					</div>				
				</div>

				<div class="col-xs-12 col-sm-6">
					<div class="widget widget-3 customer-border" style="padding: 15px;">
						<div class="widget-head header-custome" style="display: none;">
							<h4 class="heading">
								How efficient is your working capital management?
							</h4>
						</div>					
						<div class="widget-body alert alert-primary" style="min-height: 178px; background: #337ab7; color: #fff; margin-bottom: 0; border-radius: 0;">
							<a href="#/sale_summary">
								<div align="center" class="text-large strong" style="font-size: 35px;">
									<span style="color: #fff;" data-bind="text: waterRevenue"></span>
									<br>
									<p style="font-size: 14px; color: #fff;" data-bind="text: lang.lang.total_water_revenue">Total Water Revenue</p>
								</div>
							</a>							
							<table width="100%">
								<tbody>
									<tr align="center" style="vertical-align: top;">
										<td width="33%">
											<a href="#/sale_summary">										
												<span style="font-size: 18px; color: #fff;" data-bind="text: avgRevenue"></span>
												<br>
												<span style="font-size: 12px; color: #fff;" data-bind="text: lang.lang.avarage_reveune_per_connection">Average Reveune Per Connection</span>
											</a>
										</td>
										<td width="33%">
											<a href="#/sale_summary">
												<span style="font-size: 18px; color: #fff;" data-bind="text: avgUsage"></span>
												<br>
												<span style="font-size: 12px; color: #fff;" data-bind="text: lang.lang.avarage_water_usage_per_connection">Average Water Usage Per Connection</span>
											</a>
										</td>
										<td width="33%">
											<a href="#/sale_summary">
												<span style="font-size: 18px; color: #fff;" data-bind="text: waterSold"></span>
												<br>
												<span style="font-size: 12px; color: #fff;" data-bind="text: lang.lang.quantity_sold">Quantity Sold</span><span style="color: #fff;"> m<sup>3</sup>/kWh</span>
											</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>									
					</div>				
				</div>

  			</div> -->

  			<!-- <div class="row" >
	  			<div class="col-xs-12 col-sm-4" >
			  		<div class="cover-block ">
			  			<div class="row-fluid">
				  			<div class="col-xs-12 col-sm-6" >
						
								<span class="widget-stats widget-stats-gray widget-stats-2" style="background: #203864;">
									<span class="count" style="font-size: 25px;"><a href="#/customer_list" style="color: #fff;" data-format="p" ><span data-bind="text: activeCustomer"></span></a></span>
									<span class="txt" style="font-size: small; color: #fff;" data-bind="text: lang.lang.active_customer_ratio">Active Customer Ratio</span>					
								</span>
								
							</div>

							<div class="col-xs-12 col-sm-6" >
								
								<span class="widget-stats widget-stats-2" style="background: #0077c5;">
									<span class="count" style="font-size: 25px;"><a href="#/customer_list" style="color: #fff;" data-format="p"><span data-bind="text: nCustomer"></span></a></span>
									<span class="txt" style="font-size: small; color: #fff;" data-bind="text: lang.lang.total_customer_ratio">Total Customer Ratio</span>
								</span>
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-3" >
					<div class="cover-block ">
			  			<div class="row-fluid">
			  				<div class="col-xs-12 col-sm-12" >
								
								<span class="widget-stats widget-stats-gray widget-stats-2" style="background: #21abf6; ">
									<span class="count" style="font-size: 25px; "><a href="#/customer_list" style="color: #fff;"><span data-bind="text: tCustomer"></span></a></span>
									<span class="txt" style="font-size: small; color: #fff;" data-bind="text: lang.lang.total_no_of_customer">Total No. of Customer</span>
								</span>
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-5" >
					<div class="cover-block ">
			  			<div class="row-fluid">
			  				<div class="col-xs-12 col-sm-12" >
							
								<span class="widget-stats widget-stats-2" style="background: #fff; ">
									<span class="count" style="font-size: 25px; "><a href="#/sale_summary" style="color: #203864;" data-format="c0" ><span data-bind="text: waterRevenue"></span></a></span>
									<span class="txt" style="font-size: small; color: #203864;" data-bind="text: lang.lang.total_water_revenue">Total Water Revenue</span>
								</span>
								
							</div>
						</div>
					</div>
				</div>
	  		</div>

	  		<div class="row">
	  			<div class="col-xs-12 col-sm-4" >
			  		<div class="cover-block ">
			  			<div class="row-fluid">
				  			<div class="col-xs-12 col-sm-6" >
								
								<span class="widget-stats widget-stats-default widget-stats-2"  style="background: #203864; padding: 0 5px 0 5px;">
									<span class="count" style="font-size: 25px;"><a href="#/sale_summary" style="color: #fff;" data-format="c0" ><span data-bind="text: avgRevenue"></span></a></span>
									<span class="txt" style="font-size: small; color: #fff; " data-bind="text: lang.lang.avarage_reveune_per_connection">Average Reveune Per Connection</span>
								</span>
								
							</div>

							<div class="col-xs-12 col-sm-6" >
								
								<span class="widget-stats widget-stats-2" style="background: #0077c5;  padding: 0 5px 0 5px;">
									<span class="count" style="font-size: 25px;"><a href="#/sale_summary" data-format="n2" style="color: #fff;"><span data-bind="text: avgUsage"></span></a></span>
									<span class="txt" style="font-size: small; color: #fff;" data-bind="text: lang.lang.avarage_water_usage_per_connection">Average Water Usage Per Connection</span></span>
								</span>
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-3" >
					<div class="cover-block ">
			  			<div class="row-fluid">
			  				<div class="col-xs-12 col-sm-12" >
								
								<span class="widget-stats widget-stats-default widget-stats-2" style="background: #21abf6;">				
									<span class="count" style="font-size: 25px; "><a href="#/sale_summary" style="color: #fff;"><span data-bind="text: waterSold"></span></a></span>
									<span class="txt" style="font-size: small;"><span data-bind="text: lang.lang.quantity_sold">Quantity Sold</span> m<sup>3</sup>/kWh</span>					
								</span>
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-5" >
					<div class="cover-block ">
			  			<div class="row-fluid">
			  				<div class="col-xs-12 col-sm-12" >
								
								<span class="widget-stats widget-stats-2" style="background: #fff; ">
									<span class="count" style="font-size: 25px;"><a href="#/customer_deposit_report" style="color: #203864;" data-format="c0" ><span data-bind="text: totalDeposit"></span></a></span>
									<span class="txt" style="font-size: small; color: #203864;" data-bind="text: lang.lang.total_deposit" >Total Deposit</span>
								</span>
								
							</div>
						</div>
					</div>
				</div>
	  		</div> -->

	  		<!-- <div class="row">
	  			<div class="col-xs-12 col-sm-6">
	  				<div class="cover-block" style="width: 100%; min-height: 175px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; padding-left: 15px;">
						<div class="row-fluid sale-report">
							<h2 data-bind="text: lang.lang.customer_management_report">Customer Management Report</h2>
							<p data-bind="text: lang.lang.these_reports_are_useful">
								These reports are useful for customer information management, meter connections, and usage managements 
							</p>
							<div class="row-fluid">
								<table class="table table-borderless table-condensed" style="margin-bottom: 0;">
									<tr>
										<td width="50%">
											<h3><a href="#/customer_list" data-bind="text: lang.lang.customer_list"></a></h3>
										</td>
										<td width="50%">
											<h3><a href="#/disconnect_list" data-bind="text: lang.lang.disconnected_list">Disconnected List</a></h3>
										</td>						
									</tr>
									<tr>
										<td width="50%">
											<p></p>
										</td>
										<td width="50%">
											<p></p>
										</td>
									</tr>
									<tr>
										<td width="50%">											
											<h3><a href="#/mini_usage_list" data-bind="text: lang.lang.minimum_water_usage_list">Minimum Water Usage List</a></h3>
										</td>
										<td width="50%">
											<h3><a href="#/to_be_disconnect_list">To Be Disconnect List</a></h3>
										</td>
									</tr>
									<tr>
										<td width="50%">
											<p></p>
										</td>
										<td width="50%">
											<p></p>
										</td>
									</tr>
									<tr>
										<td width="50%">
											<p></p>
										</td>
										<td width="50%">
											<p></p>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="cover-block" style="width: 100%; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; padding-left: 15px;">
						<div class="row-fluid sale-report">
							<h2 data-bind="text: lang.lang.receiveable_and_deposits">Receiveable and Deposits</h2>
							<p data-bind="text: lang.lang.these_would_be_the_most">
								These would be the most common reports that you will be using. It includes receivables balance and its aging in both summary and detail list and the security deposit made by the customers for their water connection.
							</p>
							<div class="row-fluid">
								<table class="table table-borderless table-condensed">
									<tr>
										<td >
											<h3><a href="#/account_receivable_list" data-bind="text: lang.lang.accounts_receivable_listing">Accounts Receivable Listing</a></h3>
										</td>
										<td >
											<h3><a href="#/customer_deposit_report" data-bind="text: lang.lang.customer_deposit">Customer Deposit</a></h3>								
										</td>						
									</tr>
									<tr>
										<td >
											<p></p>
											
										</td>
										<td >
											<p></p>
										</td>							
									</tr>
									<tr>
										<td >
												<h3><a href="#/customer_balance_summary" data-bind="text: lang.lang.customer_balance_summary">Customer Balance Summary</a></h3>
											
										</td>
										<td >
											<h3><a href="#/customer_balance_detail" data-bind="text: lang.lang.customer_balance_detail">Customer Balance Detail</a></h3>
										</td>							
									</tr>
									<tr>
										<td >
											<p></p>
											
										</td>
										<td >
											<p></p>
										</td>							
									</tr>

									<tr>
										<td >
											<h3><a href="#/customer_aging_sum_list" data-bind="text: lang.lang.customer_aging_summary_list">Customer Aging Summary List</a></h3>
										</td>
										<td >
											<h3><a href="#/customer_aging_detail" data-bind="text: lang.lang.customer_aging_detail_list">Customer Aging Detail List</a></h3>								
										</td>						
									</tr>
									<tr>
										<td >
											<p></p>
											
										</td>
										<td >
											<p></p>
										</td>							
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="cover-block" style="width: 100%; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; padding-left: 15px;">
						<div class="row-fluid sale-report">
							<h2 data-bind="text: lang.lang.sale_report">Sale Report</h2>
							<p data-bind="text: lang.lang.summary_and_detail_sale">
								Summary and detail sale report broken down by Licenses, bloc, and types of reveneues.	
							</p>
							<div class="row-fluid">
								<table class="table table-borderless table-condensed">
									<tr>
										<td>
											<h3><a href="#/sale_summary" data-bind="text: lang.lang.sale_summary_report">Sale Summary Report</a></h3>
										</td>
										<td >
											<h3><a href="#/sale_detail" data-bind="text: lang.lang.sale_detail_report">Sale Detail Report</a></h3>								
										</td>						
									</tr>
									<tr>
										<td >
											<p></p>
											
										</td>
										<td >
											<p></p>
										</td>							
									</tr>
									<tr>
										<td >
											<h3><a href="#/connect_service_revenue" data-bind="text: lang.lang.connection_service_revenue_report">Connection Service Revenue Report</a></h3>
										</td>
										<td >
											<h3><a href="#/fine_collect">Fine Collection Report</a></h3>
											
										</td>
									</tr>
									<tr>
										<td >
											<p></p>
										</td>
										<td >
											<p></p>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="cover-block" style="width: 100%; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; padding-left: 15px;">
						<div class="row-fluid sale-report">
							<h2 data-bind="text: lang.lang.cash_receipt_report">Cash Receipt Report</h2>
							<p data-bind="text: lang.lang.summary_and_detail_cash">
								Summary and detail cash receipt reports grouped by sources/ methods of receipts 
							</p>
							<div class="row-fluid">
								<table class="table table-borderless table-condensed">
									<tr>
										<td>
											<h3><a href="#/cash_receipt_detail" data-bind="text: lang.lang.cash_receipt_detail">Cash Receipt Detail</a></h3>
										</td>
										<td >
											<h3><a href="#/cash_receipt_source_detail" data-bind="text: lang.lang.cash_receipt_by_sources_detail">Cash Receipt By Sources Detail</a></h3>								
										</td>
									</tr>
									<tr>
										<td >
											<p></p>
											
										</td>
										<td >
											<p></p>
										</td>
									</tr>
									<tr>
										<td >
											
										</td>
										<td >
											
										</td>
									</tr>
									<tr>
										<td >
											<p></p>
										</td>
										<td >
											<p></p>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div> -->


			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<div class="box-generic" >
					    <!-- //Tabs Heading -->
					    <div class="tabsbar tabsbar-1" style="background: #203864 !important; color: #fff;">
					        <ul class="row-fluid row-merge">
					        	<li class="active">
					            	<a href="#tab1" data-toggle="tab"><span data-bind="text: lang.lang.summary_report"></span></a>
					            </li>
					            <li>
					            	<a href="#tab2" data-toggle="tab"><span data-bind="text: lang.lang.kpi_report"></span></a>
					            </li>
					            <li>
					            	<a href="#tab3" data-toggle="tab"><span data-bind="text: lang.lang.customer_report"></span></a>
					            </li>
					            <li >
					            	<a href="#tab4" data-toggle="tab"><span data-bind="text: lang.lang.receivable_reports"></span></a>
					            </li>
					            <li >
					            	<a href="#tab5" data-toggle="tab"><span data-bind="text: lang.lang.sale_report"></span></a>
					            </li>					            
					            <li >
					            	<a href="#tab6" data-toggle="tab"><span data-bind="text: lang.lang.cash_receipt_report"></span></a>
					            </li>
					            <li data-bind="click: viewMap">
					            	<a href="#tab7" data-toggle="tab"><span data-bind="text: lang.lang.meter_report_map" ></span></a>
					            </li>
					        </ul>
					    </div>
					    <!-- // Tabs Heading END -->

					    <div class="tab-content">
							<!-- //Summary Report -->
							<div class="tab-pane active" id="tab1">
					        	<div class="row-fluid sale-report">
											   <div class="col-md-12 water-tableList hidden-xs">
								<input id="ddlCashAccount" name="ddlCashAccount" 
									data-role="dropdownlist"
					  				data-value-primitive="true"
									data-text-field="name" 
					  				data-value-field="id"
					  				data-bind="value: licenseSelect,
					  							source: licenseDS, events: {change: onLicenseChange}"
					  				data-option-label="Select Licenses..." style="margin-bottom: 15px" />
								<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
									<thead>
										<tr>
											<th style="vertical-align: top; text-align: center"><span data-bind="text: lang.lang.no">No.</span></th>
											<th style="vertical-align: top; text-align: center"><span data-bind="text: lang.lang.license">License</span></th>
											<th style="vertical-align: top; text-align: center"><span data-bind="text: lang.lang.no_of_bloc">No.of Bloc</span></th>
											<th style="vertical-align: top; text-align: center"><span data-bind="text: lang.lang.active_meter">Active Meter</span></th>
											<th style="vertical-align: top; text-align: center"><span data-bind="text: lang.lang.inactive_meter">Inactive Meter</span></th>
											<th style="vertical-align: top; text-align: right"><span data-bind="text: lang.lang.deposit">Deposit</span></th>
											<th style="vertical-align: top; text-align: right">m<sup>3</sup>/kWh</th>
											<th style="vertical-align: top; text-align: right"><span data-bind="text: lang.lang.sale_amount">Sale Amount</span></th>
											<th style="vertical-align: top; text-align: right"><span data-bind="text: lang.lang.balance">Balance</span></th>
										</tr>
									</thead>
									<tbody style="border: none;" data-role="listview" data-bind="source: dataSourceSummary" data-template="dashboard-template-table-list" data-auto-bind="false">				
									</tbody>
								</table>
							</div>
								</div>
				        	</div>
							<!-- //Summary Report END -->	

							<!-- //Summary Report -->
							<div class="tab-pane" id="tab2">
					        	<div class="row-fluid sale-report">
											   <div class="col-md-12 water-tableList hidden-xs">
								<input id="ddlCashAccount" name="ddlCashAccount" 
									data-role="dropdownlist"
					  				data-value-primitive="true"
									data-text-field="name" 
					  				data-value-field="id"
					  				data-bind="value: licenseKPISelect,
					  							source: licenseDS, events: {change: onLicenseChangeKPI}"
					  				data-option-label="Select Licenses..." style="margin-bottom: 15px" />
								<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
									<thead>
										<tr>
											<th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.no">No.</span></th>
											<th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.license">License</span></th>
											<th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.active_customer_ratio">Active Customer Ratio</span></th>
											<th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.total_customer_ratio">Total Customer Ratio</span></th>
											<th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.total_no_of_customer">Total No. of Customer</span></th>
											<th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.avarage_reveune_per_connection">Average Reveune Per Connection</span></th>
											<th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.avarage_water_usage_per_connection">Average Water Usage Per Connection</span></th>
											<th style="vertical-align: top; text-align: center; font-size: 12px;"><span data-bind="text: lang.lang.quantity_sold"></span><span>m<sup>3</sup>/kWh
											</span></th>
											<th style="vertical-align: top; text-align: center"><span data-bind="text: lang.lang.total_water_revenue">Water Revenue</span></th>
										</tr>
									</thead>
									<tbody style="border: none;" data-role="listview" data-bind="source: dataSourceKPI" data-template="kpi-template-table-list" data-auto-bind="false">				
									</tbody>
								</table>
							</div>
								</div>
				        	</div>
							<!-- //Summary Report END -->

					    	<!-- //GENERAL INFO -->
					        <div class="tab-pane" id="tab3">
					        	<div class="row-fluid sale-report">
									<h2 style="margin-bottom: 10px;" data-bind="text: lang.lang.customer_management_report">Customer Management Report</h2>
									<p data-bind="text: lang.lang.these_reports_are_useful">
										These reports are useful for customer information management, meter connections, and usage managements 
									</p>
									<div class="row">
										<div class="col-sm-6">
											<table class="table table-borderless table-condensed">
												<tr>
													<td style="width: 50%">
														<h3 ><a href="#/customer_list" data-bind="text: lang.lang.customer_list"></a></h3>
													</td>
													<td>
														<h3 ><a href="#/connect_list" data-bind="text: lang.lang.connect_list"></a></h3>
													</td>
													
												</tr>

												<tr>
													<td >
														<p style="padding-right: 25px;"  data-bind="text: lang.lang.list_of_all_active_customers">
															List of all active customers
														</p>
													</td>
													<td >
														<p style="padding-right: 25px;"  data-bind="text: lang.lang.list_connect_customers">
															List of all customers to be connected
													</td>
												</tr>
												<tr>
													<td >
														<h3><a href="#/disconnect_list" data-bind="text: lang.lang.disconnected_list">Disconnected List</a></h3>
													</td>
													<td >													
														<h3><a href="#/inactive_list" data-bind="text: lang.lang.inactive_customer"></a></h3>
													</td>
												</tr>

												<tr>
													<td >
														<p style="vertical-align: top;" data-bind="text: lang.lang.disconnected_description"> 
															list of the customer have been disconnected
														</p>
													</td>
													<td >
														<p style="padding-right: 25px;"  data-bind="text: lang.lang.inactive_customer_description">
															list of each customer have been inactive
														</p>
													</td>
												</tr>
												<tr>
													<td >
														<h3 ><a href="#/to_be_disconnect_list" data-bind="text: lang.lang.to_be_disconnect_list"></a></h3>
													</td>
													<td >													
														<h3><a href="#/mini_usage_list" data-bind="text: lang.lang.minimum_water_usage_list">Minimum Water Usage List</a></h3>
													</td>
												</tr>

												<tr>
													<td >
														<p style="vertical-align: top;" data-bind="text: lang.lang.to_be_disconnect_description">
															List of the customer to be disconnect 
														</p>
													</td>
													<td>
														<p style="padding-right: 25px;"  data-bind="text: lang.lang.minimum_water_usage_description">
															list of each customer individual usage minimum water
														</p>
													</td>
												</tr>
												<tr>
													
												</tr>
											</table>
										</div>
										<div class="col-sm-6">
											<div class="home-chart">
												<div class="chart" >
													<div data-role="chart"
														 data-auto-bind="true"
											             data-legend="{ position: 'top' }"
											             data-series-defaults="{ type: 'column' }"
											             data-tooltip='{
											                visible: true,
											                format: "{0}%",
											                template: "#= series.name #: #= kendo.toString(value, &#39;c&#39;, banhji.locale) #"
											             }'                 
											             data-series="[
											                             { field: 'amount', name: langVM.lang.active_meter, categoryField:'month', color: '#203864', overlay:{ gradient: 'none'}  }
											                         ]"
											             data-bind="source: graphCustomer"
											             style="height: 240px; " >
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
				        	</div>
					        <!-- //GENERAL INFO END -->

					        <!-- //RECEIVEABLE AND DEPOSIT INFO -->
					        <div class="tab-pane" id="tab4">
								<div class="row-fluid sale-report">
									<h2 style="margin-bottom: 10px;" data-bind="text: lang.lang.receiveable_and_deposits">Receiveable and Deposits</h2>
									<p data-bind="text: lang.lang.these_would_be_the_most">
										These would be the most common reports that you will be using. It includes receivables balance and its aging in both summary and detail list and the security deposit made by the customers for their water connection.
									</p>
									<div class="row">
										<div class="col-sm-6">
											<table class="table table-borderless table-condensed">
												<tr>
													<td style="width: 50%">
														<h3><a href="#/account_receivable_list" data-bind="text: lang.lang.accounts_receivable_listing">Accounts Receivable Listing</a></h3>
													</td>
													<td >
														<h3><a href="#/customer_deposit_report" data-bind="text: lang.lang.customer_deposit">Customer Deposit</a></h3>								
													</td>
												</tr>
												<tr>
													<td >
														<p style="padding-right: 25px;"  data-bind="text: lang.lang.shows_a_chronological_list_of_all_your_invoices_for_a_selected_date_range">
															Shows a chronological list of all your invoices for a selected date range.
														</p>
													</td>
													<td style="vertical-align: top;" data-bind="text: lang.lang.provides_detailed_information_about_customer_deposit">
														<p>
															Provides detailed information about customer deposit for specific order, prepayment, or credit.
														</p>
													</td>
												</tr>
												<tr>
													<td >
														<h3><a href="#/customer_balance_summary" data-bind="text: lang.lang.customer_balance_summary">Customer Balance Summary</a></h3>
													</td>
													<td >
														<h3><a href="#/customer_balance_detail" data-bind="text: lang.lang.customer_balance_detail">Customer Balance Detail</a></h3>
													</td>							
												</tr>
												<tr>
													<td >
														<p style="padding-right: 25px;"  data-bind="text: lang.lang.show_each_customers_total_outstanding_balances">
															Show each customer’s total outstanding balances.
														</p>
													</td>
													<td style="vertical-align: top;" data-bind="text: lang.lang.lists_individual_unpaid_invoices_for_each_customer">
														<p>
															Lists individual unpaid invoices for each customer
														</p>
													</td>
												</tr>

												<tr>
													<td >
														<h3><a href="#/customer_aging_sum_list" data-bind="text: lang.lang.customer_aging_summary_list">Customer Aging Summary List</a></h3>
													</td>
													<td >
														<h3><a href="#/customer_aging_detail" data-bind="text: lang.lang.customer_aging_detail_list">Customer Aging Detail List</a></h3>								
													</td>						
												</tr>
												<tr>
													<td >
														<p style="padding-right: 25px;"  data-bind="text: lang.lang.lists_all_unpaid_invoices1">
															Lists all unpaid invoices for the current period, 30, 60, 90, 
														and more than 90 days, grouped by individual customers.
														</p>
													</td>
													<td style="vertical-align: top;" data-bind="text: lang.lang.lists_individual_unpaid_invoices_grouped_by_customer">
														<p>
															Lists individual unpaid invoices, grouped by customer. This includes due date, outstanding days (aging days), and amount.
														</p>
													</td>
												</tr>												
											</table>
										</div>
										<div class="col-sm-6">
											<div class="home-chart">
												<div class="chart" >
													<div data-role="chart"
														 data-auto-bind="true"
											             data-legend="{ position: 'top' }"
											             data-series-defaults="{ type: 'column' }"
											             data-tooltip='{
											                visible: true,
											                format: "{0}%",
											                template: "#= series.name #: #= kendo.toString(value, &#39;c&#39;, banhji.locale) #"
											             }'                 
											             data-series="[
											                             { field: 'amount', name: langVM.lang.expected_due, categoryField:'month', color: '#203864', overlay:{ gradient: 'none'}  }
											                         ]"
											             data-bind="source: graphBalance"
											             style="height: 240px; " >
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>
				        	</div>

					        <!-- //RECEIVEABLE AND DEPOSIT INFO END -->
					        <!-- //ACCOUNTING -->
					        <div class="tab-pane" id="tab5">
					        	<div class="row-fluid sale-report">
									<h2 style="margin-bottom: 10px;" data-bind="text: lang.lang.sale_report">Sale Report</h2>
									<p data-bind="text: lang.lang.summary_and_detail_sale">
										Summary and detail sale report broken down by Licenses, bloc, and types of reveneues.	
									</p>
									<div class="row">
										<div class="col-sm-6">
											<table class="table table-borderless table-condensed">
												<tr>
													<td style="width: 50%">
														<h3><a href="#/sale_summary" data-bind="text: lang.lang.sale_summary_report">Sale Summary Report</a></h3>
													</td>
													<td >
														<h3><a href="#/sale_detail" data-bind="text: lang.lang.sale_detail_report">Sale Detail Report</a></h3>								
													</td>
												</tr>
												<tr>
													<td >
														<p style="padding-right: 25px;"  data-bind="text: lang.lang.summarizes_total_sales">
														Summarizes total sales for each customer within a period 
														of time so you can see which ones generate the most revenue for you.
														</p>
													</td>
													<td style="vertical-align: top;" data-bind="text: lang.lang.lists_individual_sale">
														<p>
															Lists individual sale transactions by date for each customer with a period of time.
														</p>
													</td>
												</tr>
												<tr>
													<td >
														<h3><a href="#/connect_service_revenue" data-bind="text: lang.lang.connection_service_revenue_report">Connection Service Revenue Report</a></h3>
													</td>
													<td >
														<h3><a href="#/fine_collect" data-bind="text: lang.lang.fine_collection_report">Fine Collection Report</a></h3>
														
													</td>
												</tr>
												<tr>
													<td >
														<p style="padding-right: 25px;"  data-bind="text: lang.lang.connection_service_revenue_description">
														Lists individual connection revenue service by date for each customer with a period of time.
														</p>
													</td>
													<td style="vertical-align: top;" data-bind="text: lang.lang.fine_collection_description">
														<p>
															list individual fine by date for each customer with a period of time.
														</p>
													</td>
												</tr>
											</table>
										</div>
										<div class="col-sm-6">
											<div class="home-chart">
												<div class="chart" >
													<div data-role="chart"
														 data-auto-bind="true"
											             data-legend="{ position: 'top' }"
											             data-series-defaults="{ type: 'column' }"
											             data-tooltip='{
											                visible: true,
											                format: "{0}%",
											                template: "#= series.name #: #= kendo.toString(value, &#39;c&#39;, banhji.locale) #"
											             }'                 
											             data-series="[
											                             { field: 'amount', name: langVM.lang.sale, categoryField:'month', color: '#203864', overlay:{ gradient: 'none'}  }
											                         ]"
											             data-bind="source: graphSale"
											             style="height: 240px; " >
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
				        	</div>
					        <!-- //ACCOUNTING END -->					        

					        <!-- //ACCOUNTING -->
					        <div class="tab-pane" id="tab6">
								<div class="row-fluid sale-report">
									<h2 style="margin-bottom: 10px;" data-bind="text: lang.lang.cash_receipt_report">Cash Receipt Report</h2>
									<p data-bind="text: lang.lang.summary_and_detail_cash">
										Summary and detail cash receipt reports grouped by sources/ methods of receipts 
									</p>
									<div class="row">
										<div class="col-sm-6">
											<table class="table table-borderless table-condensed">
												<tr>
													<td style="width: 50%">
														<h3><a href="#/cash_receipt_detail" data-bind="text: lang.lang.cash_receipt_detail">Cash Receipt Detail</a></h3>
													</td>
													<td >
														<h3><a href="#/cash_receipt_source_detail" data-bind="text: lang.lang.cash_receipt_by_sources_detail">Cash Receipt By Sources Detail</a></h3>								
													</td>
													<td>

													</td>
												</tr>
												<tr>
													<td >
														<p style="padding-right: 25px;"  data-bind="text: lang.lang.cash_receipt_description">
														Lists of cash receipt for the select period of time, group by method of payment.
														</p>
													</td>
													<td style="vertical-align: top;" data-bind="text: lang.lang.cash_receipt_sources_description">
														<p>
															Lists of cash receipt by sources for the select period of time, group by method of payment.
														</p>
													</td>
												</tr>
											</table>
										</div>
										<div class="col-sm-6">
											<div class="home-chart">
												<div class="chart" >
													<div data-role="chart"
														 data-auto-bind="true"
											             data-legend="{ position: 'top' }"
											             data-series-defaults="{ type: 'column' }"
											             data-tooltip='{
											                visible: true,
											                format: "{0}%",
											                template: "#= series.name #: #= kendo.toString(value, &#39;c&#39;, banhji.locale) #"
											             }'                 
											             data-series="[
											                             { field: 'amount', name: langVM.lang.moneyCollection, categoryField:'month', color: '#203864', overlay:{ gradient: 'none'}  }
											                         ]"
											             data-bind="source: graphMoney"
											             style="height: 240px; " >
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
				        	</div>
					        <!-- //ACCOUNTING END -->


					        <div class="tab-pane" id="tab7" >
								<div class="row-fluid sale-report">
									<h1 style="text-align: center; padding: 20px;">Coming Soon !!</h1>
									<!-- <h2 style="margin-bottom: 10px;" data-bind="text: lang.lang.meter_report_map"></h2>
									<div id="map" style="border: 1px solid green; height: 70%; width: 100%">
										sdklasdj
									</div> -->
								</div>
							</div>
					    </div>
					</div>
				</div>
			</div>


		</div>
	</div>
</script>
<script id="dashboard-template-table-list" type="text/x-kendo-tmpl">
	<tr>
		<td style="text-align: center;">#=banhji.Reports.dataSourceSummary.indexOf(banhji.Reports.dataSourceSummary.get(id)) +1 #</td>
		<td style="text-align: left;">#=name#</td>
		<td style="text-align: center; padding-right: 5px !important;">#=kendo.toString(blocCount, "n0", banhji.locale)#</td>
		<td style="text-align: center; padding-right: 5px !important;">#=kendo.toString(activeCustomer, "n0", banhji.locale)#</td>
		<td style="text-align: center; padding-right: 5px !important;">#=kendo.toString(inActiveCustomer, "n0", banhji.locale)#</td>
		<td style="text-align: right; padding-right: 5px !important;">#= kendo.toString(deposit, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
		<td style="text-align: right; padding-right: 5px !important;">#=kendo.toString(usage, "n0", banhji.locale)#</td>
		<td style="text-align: right; padding-right: 5px !important;">#= kendo.toString(sale, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
		<td style="text-align: right; padding-right: 5px !important;">#= kendo.toString(balance, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
	</tr>
</script>
<script id="kpi-template-table-list" type="text/x-kendo-tmpl">
	<tr>
		<td style="text-align: center;">#=banhji.Reports.dataSourceKPI.indexOf(banhji.Reports.dataSourceKPI.get(id)) +1 #</td>
		<td style="text-align: left;">#=name#</td>
		<td style="text-align: center; padding-right: 5px !important;">#=kendo.toString(totalActiveCustomer, "n2", banhji.locale)#</td>
		<td style="text-align: center; padding-right: 5px !important;">#=kendo.toString(totalAllowCustomer, "n2", banhji.locale)#</td>
		<td style="text-align: center; padding-right: 5px !important;">#=kendo.toString(totalCustomer, "n0", banhji.locale)#</td>
		<td style="text-align: right; padding-right: 5px !important;">#= kendo.toString(avgIncome, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
		<td style="text-align: right; padding-right: 5px !important;">#=kendo.toString(avgUsage, "n0", banhji.locale)#</td>
		<td style="text-align: right; padding-right: 5px !important;">#=kendo.toString(totalUsage, "n0", banhji.locale)#</td>
		<td style="text-align: right; padding-right: 5px !important;">#= kendo.toString(totalAmount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
	</tr>
</script>
<script id="customerList" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
								<!-- Tabs Heading -->
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										
										<li class="active"><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export" style="text-transform: capitalize;"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">

							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane active report" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
								        	<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>

						<!-- // Tabs END -->

						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: institute.name"></h3>
							<h2 data-bind="text: lang.lang.customer_list">Customer List</h2>
							</div>
							<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
							<thead>
								<tr>
									<th style="vertical-align: top;">Property</th>
									<th style="vertical-align: top;">Meter</th>
									<th style="vertical-align: top;">Block</th>
									<th style="vertical-align: top;">License</th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-bind="source: dataSource"
										
										 data-template="customerList-temp"
							></tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerList-temp" type="text/x-kendo-template" >
	<tr>
		<td colspan="4" style="font-weight: bold; color: black;">#: name #</td>
	</tr>
	#for(var i= 0; i <line.length; i++) {#
		<tr>
			<td>#=line[i].property#</td>
			<td>#=line[i].meter#</td>
			<td>#=line[i].location#</td>
			<td style="text-align: right;">#=line[i].branch#</td>
		</tr>

	#}#
</script>
<script id="customerNoConnection" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i>Date</a></li>										
										<li><a class="glyphicons print" href="#tab-2" data-toggle="tab" data-bind="click: printGrid"><i></i>Print/Export</a></li
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <div class="tab-pane active" id="tab-1">
								        	<div class="row">
												<div class="col-xs-12 col-sm-2">
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
						                  					source: licenseDS,
						                  					events: {change: licenseChange}" style="width: 100%;">
						                  		</div>
						                  		<div class="col-xs-12 col-sm-2">
											        <input 
														data-role="dropdownlist" 
														data-option-label="Location ..." 
														data-auto-bind="false" 
														data-value-primitive="false" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: blocSelect,
						                  					source: blocDS" style="width: 100%;">
						                  		</div>
						                  		<div class="col-xs-12 col-sm-2">
												  	 <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>							
									    		</div>
									    	</div>
									    </div>									        							       
								    </div>
								</div>
							</div>
						</div>

						<!-- // Tabs END -->
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: institute.name"></h3>
								<h2>Customer No Connection List</h2>
							</div>
							<table class="table table-borderless table-condensed ">
								<thead>
									<tr>
										<th style="vertical-align: top;"><span>Customer Name</span></th>
										<th style="vertical-align: top;"><span>License</span></th>
										<th style="vertical-align: top;"><span>Location</span></th>
										<th style="vertical-align: top;"><span>Address</span></th>
										<th style="vertical-align: top;"><span style="text-align: right;">Phone</span></th>
										<th style="vertical-align: top;"><span>E-Mail</span></th>
									</tr>
								</thead>
								<tbody data-role="listview"
											 data-bind="source: dataSource"
											 data-template="customerNoConnection-temp"
								></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerNoConnection-temp" type="text/x-kendo-template" >
	<tr>
		<td>#=name#</td>
		<td>#=branch#</td>
		<td>#=location#</td>
		<td>#=address#</td>
		<td style="text-align: right;">#=phone#</td>
		<td style="text-align: right;">#=email#</td>
	</tr>
</script>
<script id="disconnectList" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

						<!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code" style="margin: 15px 0;">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
								<!-- Tabs Heading -->
								<div class="widget-head" style="background: #203864 !important; color: #fff;">
									<ul>
										<li class="active"><a class="glyphicons filter" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>	
										<li><a class="glyphicons print" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <div class="tab-pane active" id="tab-1" style="border: 1px solid #ccc; overflow: hidden; padding: 15px">
											<div class="row">
												<div class="col-xs-12-3 col-sm-2">
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
						                  					source: licenseDS,
						                  					events: {change: licenseChange}"
						                  					style="width: 100%;">
						                  		</div>
						                  		<div class="col-xs-12-3 col-sm-2">
											        <input 
														data-role="dropdownlist" 
														data-option-label="Location ..." 
														data-auto-bind="false" 
														data-value-primitive="false" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: blocSelect,
															enabled: haveBloc,
						                  					source: blocDS"
						                  					style="width: 100%;">
						                  		</div>
						                  		<div class="col-xs-12-3 col-sm-1">
												  	 <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>							
									    		</div>
									    	</div>
									    </div>	
									    <!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-2" style="border: 1px solid #ccc; overflow: hidden; padding: 15px">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
								        	<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>								        							       
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->

						<div id="invFormContent">
							<div class="block-title" style="">
								<h3 data-bind="text: institute.name"></h3>
								<h2 data-bind="text: lang.lang.disconnect_customer_list">Disconnect Customer List</h2>
							</div>
							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.customer_name">Customer Name</span></th>
										<th style="vertical-align: top;"><span data-bind="text:lang.lang.license"></span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.number">Number</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.phone">Phone</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.address">Address</span></th>
									</tr>
								</thead>
								<tbody data-role="listview"
											 data-bind="source: dataSource"
											 data-template="disconnectList-temp"
								></tbody>
							</table>
							<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="disconnectList-temp" type="text/x-kendo-template" >
	<tr>
		<td>#=name#</td>
		<td>#=license#</td>
		<td>#=number#</td>
		<td>#=phone#</td>
		<td style="text-align: right;">#=address#</td>
	</tr>
</script>
<script id="connectionList" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

						<!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code" style="margin: 15px 0;">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
								<!-- Tabs Heading -->
								<div class="widget-head" style="background: #203864 !important; color: #fff;">
									<ul>
										<li class="active"><a class="glyphicons filter" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>	
										<li><a class="glyphicons print" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <div class="tab-pane active" id="tab-1" style="border: 1px solid #ccc; overflow: hidden; padding: 15px">
											<div class="row">
												<div class="col-xs-12-3 col-sm-2">
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
						                  					source: licenseDS,
						                  					events: {change: licenseChange}"
						                  					style="width: 100%;">
						                  		</div>
						                  		<div class="col-xs-12-3 col-sm-2">
											        <input 
														data-role="dropdownlist" 
														data-option-label="Location ..." 
														data-auto-bind="false" 
														data-value-primitive="false" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: blocSelect,
															enabled: haveBloc,
						                  					source: blocDS"
						                  					style="width: 100%;">
						                  		</div>
						                  		<div class="col-xs-12-3 col-sm-1">
												  	 <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>							
									    		</div>
									    	</div>
									    </div>	
									    <!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-2" style="border: 1px solid #ccc; overflow: hidden; padding: 15px">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
								        	<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>								        							       
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->

						<div id="invFormContent">
							<div class="block-title" style="">
								<h3 data-bind="text: institute.name"></h3>
								<h2 data-bind="text: lang.lang.connect_list"></h2>
							</div>
							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.customer_name">Customer Name</span></th>
										<th style="vertical-align: top;"><span data-bind="text:lang.lang.license"></span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.number">Number</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.phone">Phone</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.address">Address</span></th>
									</tr>
								</thead>
								<tbody data-role="listview"
											 data-bind="source: dataSource"
											 data-template="connectionList-temp"
								></tbody>
							</table>
							<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="connectionList-temp" type="text/x-kendo-template" >
	<tr>
		<td>#=name#</td>
		<td>#=license#</td>
		<td>#=number#</td>
		<td>#=dataUsed#</td>
		<td>#=phone#</td>
		<td style="text-align: right;">#=address#</td>
	</tr>
</script>
<script id="inactiveList" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

						<!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code" style="margin: 15px 0;">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
								<!-- Tabs Heading -->
								<div class="widget-head" style="background: #203864 !important; color: #fff;">
									<ul>
										<li class="active"><a class="glyphicons filter" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>	
										<li><a class="glyphicons print" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <div class="tab-pane active" id="tab-1" style="border: 1px solid #ccc; overflow: hidden; padding: 15px">
											<div class="row">
												<div class="col-xs-12-3 col-sm-2">
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
						                  					source: licenseDS,
						                  					events: {change: licenseChange}"
						                  					style="width: 100%;">
						                  		</div>
						                  		<div class="col-xs-12-3 col-sm-2">
											        <input 
														data-role="dropdownlist" 
														data-option-label="Location ..." 
														data-auto-bind="false" 
														data-value-primitive="false" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: blocSelect,
															enabled: haveBloc,
						                  					source: blocDS"
						                  					style="width: 100%;">
						                  		</div>
						                  		<div class="col-xs-12-3 col-sm-1">
												  	 <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>							
									    		</div>
									    	</div>
									    </div>	
									    <!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-2" style="border: 1px solid #ccc; overflow: hidden; padding: 15px">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
								        	<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>								        							       
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->

						<div id="invFormContent">
							<div class="block-title" style="">
								<h3 data-bind="text: institute.name"></h3>
								<h2 data-bind="text: lang.lang.inactive_customer">Inactive Customer List</h2>
							</div>
							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.customer_name">Customer Name</span></th>
										<th style="vertical-align: top;"><span data-bind="text:lang.lang.license"></span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.number">Number</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.phone">Phone</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.address">Address</span></th>
									</tr>
								</thead>
								<tbody data-role="listview"
											 data-bind="source: dataSource"
											 data-template="inactiveList-temp"
								></tbody>
							</table>
							<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="inactiveList-temp" type="text/x-kendo-template" >
	<tr>
		<td>#=name#</td>
		<td>#=license#</td>
		<td>#=number#</td>
		<td>#=phone#</td>
		<td style="text-align: right;">#=address#</td>
	</tr>
</script>
<script id="to_be_disconnectList" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons filter" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>	
										<li><a class="glyphicons print" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <div class="tab-pane active" id="tab-1">
								        	<div class="row">
												<div class="col-xs-12-3 col-sm-2">
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
						                  					source: licenseDS,
						                  					events: {change: licenseChange}" style="width: 100%;">
						                  		</div>
												<div class="col-xs-12-3 col-sm-2">
											        <input 
														data-role="dropdownlist" 
														data-option-label="Location ..." 
														data-auto-bind="false" 
														data-value-primitive="false" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: blocSelect,
															enabled: haveBloc,
						                  					source: blocDS" style="width: 100%;">
												</div>
												<div class="col-xs-12-3 col-sm-1">
												  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>							
									    		</div>
									    	</div>
									    </div>	
									    <!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-2">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
								        	<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>									        							       
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: institute.name"></h3>
								<h2 data-bind="text: lang.lang.to_be_disconnect_list">To Be Disconnect Customer List</h2>
							</div>
							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.customer_name">Customer Name</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.date"></span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>										
										<th style="vertical-align: top; text-align: center;"><span data-bind="text: lang.lang.status">Status</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.address"></span></th>
									</tr>
								</thead>
								<tbody data-role="listview"
											 data-bind="source: dataSource"
											 data-template="to_be_disconnectList-temp"
								></tbody>
							</table>
							<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>	
					             
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="to_be_disconnectList-temp" type="text/x-kendo-template" >
	<tr>
		<td>#=name#</td>
		<td>#=kendo.toString(new Date(issued_date),"dd-MM-yyyy")#</td>
		<td>#=number#</td>
		<td style="text-align: center;">
			# var date = new Date(), dueDates = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
			#if(dueDates < toDay) {#
				Over Due #:Math.floor((toDay - dueDates)/(1000*60*60*24))# days
			#} else {#
				#:Math.floor((dueDates - toDay)/(1000*60*60*24))# days to pay
			#}#
		</td>
		<td style="text-align: right;">#=location#</td>
	</tr>
</script>
<script id="newCustomerList" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab" data-bind="click: printGrid"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">
								        	<div class="row">
												<div class="col-xs-12 col-sm-2">
													<input data-role="dropdownlist"
														   class="sorter"                  
												           data-value-primitive="true"
												           data-text-field="text"
												           data-value-field="value"
												           data-bind="value: sorter,
												                      source: sortList,                              
												                      events: { change: sorterChanges }" style="width: 100%" />
												</div>
												<div class="col-xs-12 col-sm-2">
													<input data-role="datepicker"
														   class="sdate"
														   data-format="dd-MM-yyyy"
												           data-bind="value: sdate,
												           			  max: edate"
												           placeholder="From ..." style="width: 100%" >
												</div>
												<div class="col-xs-12 col-sm-2">
												    <input data-role="datepicker"
												    	   class="edate"
												    	   data-format="dd-MM-yyyy"
												           data-bind="value: edate,
												                      min: sdate"
												           placeholder="To ..." style="width: 100%" >
												</div>
												<div class="col-xs-12 col-sm-1">
												  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>
											</div>
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<div class="row">
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.license">Licenses</span>
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
																source: licenseDS,
																events: {change: licenseChange}" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.location">Locations</span>
														<input 
															data-role="dropdownlist" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="false" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																	source: blocDS" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.customers"></span>
													<select data-role="multiselect"
														   data-value-primitive="true"
														   data-header-template="customer-header-tmpl"
														   data-item-template="contact-list-tmpl"
														   data-value-field="id"
														   data-text-field="name"
														   data-bind="value: obj.contactIds, 
														   			source: contactDS"
														   data-placeholder="Select Customer.."
														   style="width: 100%" /></select>
												</div>
												<div class="col-xs-12 col-sm-1">											
										  			<button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>														
											</div>		
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->

						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.new_customer_list">New Customer List</h2>
								<p data-bind="text: displayDate"></p>
							</div>
							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.customer_name">Customer Name</span></th>
										<th style="vertical-align: top;"><span data-bind="text: ">Abbr</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.address">Address</span></th>
									</tr>
								</thead>
			            		<tbody  data-role="listview"
			            				data-auto-bind="false"
						                data-template="newCustomerList-template"
						                data-bind="source: dataSource" >
						        </tbody>
			            	</table>
			            </div>
			        </div>
				</div>
			</div>
		</div>
	</div>	
</script>
<script id="new_CustomerList-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: right;">#=abbr#</td>
		<td style="text-align: right;">#=address#</td>	
	</tr>
</script>
<script id="miniUsageList" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code" >
							<div class="widget widget-tabs widget-tabs-gray report-tab">
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text:lang.lang.date">Date</span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>									
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text:lang.lang.print_export">Print/Export</span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <div class="tab-pane active" id="tab-1">
								        	<div class="row">
												<div class="col-xs-12-3 col-sm-2">											
													<input data-role="dropdownlist"
														   class="sorter"                  
												           data-value-primitive="true"
												           data-text-field="text"
												           data-value-field="value"
												           data-bind="value: sorter,
												                      source: sortList,                              
												                      events: { change: sorterChanges }" style="width: 100%" />
												</div>
												<div class="col-xs-12-3 col-sm-2">
													<input data-role="datepicker"
														   class="sdate"
														   data-format="dd-MM-yyyy"
												           data-bind="value: sdate,
												           			  max: edate"
												           placeholder="From ..." style="width: 100%" />
												</div>
												<div class="col-xs-12-3 col-sm-2">
												    <input data-role="datepicker"
												    	   class="edate"
												    	   data-format="dd-MM-yyyy"
												           data-bind="value: edate,
												                      min: sdate"
												           placeholder="To ..."  style="width: 100%" />
												</div>
												<div class="col-xs-12-3 col-sm-1">
												  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>
											</div>
							        	</div>	
							        	<div class="tab-pane" id="tab-2">
											<div class="row">
												<div class="col-xs-12-3 col-sm-2">
													<span data-bind="text: lang.lang.license">Licenses</span>
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
																source: licenseDS,
																events: {change: licenseChange}" style="width: 100%">
												</div>
												<div class="col-xs-12-3 col-sm-2">													
													<span data-bind="text: lang.lang.location">Locations</span>
														<input 
															data-role="dropdownlist" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="false" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveBloc,
																source: blocDS" style="width: 100%">
												</div>
												<div class="col-xs-12-3 col-sm-2">
													<span >Water</span>
													 <input id="usage" name="usage" class="k-textbox" 
													 	data-option-label="Usage ..." 
									            		data-bind="{placeholder: Usage }"
									            					
									              		style="width: 100%;" />
												</div>
												<div class="col-xs-12-3 col-sm-1">											
										  			<button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>														
											</div>		
							        	</div>	
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
								        	<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>							        							       
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->

						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: institute.name"></h3>
								<h2 data-bind="text:lang.lang.minimum_water_usage_list">Minimum Water Usage List</h2>
								<p data-bind="text: displayDate"></p>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="total-sale">
										<p data-bind="text: lang.lang.number_of_customer">Number of Customer</p>
										<span data-bind="text: count"></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-9">
									<div class="total-sale">
										<p>Total Usage</p>
										<span data-bind="text: amount"></sapn>
									</div>
								</div>
							</div>
							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>
										<th style="vertical-align: top;"><span data-bind="text:lang.lang.meter_number">Meter Number</span></th>
										<th style="vertical-align: top;"><span data-bind="text:lang.lang.date">Date</span></th>
										<th style="text-align: right;"><span data-bind="text:lang.lang.license">License</span></th>
										<th style="text-align: right;"><span data-bind="text:lang.lang.address">Address</span></th>
										<th style="text-align: right;"><span data-bind="text:lang.lang.usage">Usage</span></th>
									</tr>
								</thead>
								<tbody data-role="listview"
											 data-bind="source: dataSource"
											 data-auto-bind="false" 
											 data-template="miniCustomerList-temp"
								></tbody>
							</table>
							<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>					
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="miniCustomerList-temp" type="text/x-kendo-template" >
	<tr>
		<td>#=meter_number#</td>
		<td>#=from_date# - #=to_date#</td>
		<td style="text-align: right;">#=license#</td>
		<td style="text-align: right;">#=address#</td>
		<td style="text-align: right;">#=usage#</td>
	</tr>
</script>
<script id="saleSummary" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab" ><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">									        	
											<div class="row">
												<div class="col-xs-12 col-sm-2">
													<input data-role="dropdownlist"
														   class="sorter"                  
												           data-value-primitive="true"
												           data-text-field="text"
												           data-value-field="value"
												           data-bind="value: sorter,
												                      source: sortList,                              
												                      events: { change: sorterChanges }" style="width: 100%" />
												</div>
												<div class="col-xs-12 col-sm-2">  
													<input data-role="datepicker"
														   class="sdate"
														   data-format="dd-MM-yyyy"
												           data-bind="value: sdate,
												           			  max: edate"
												           placeholder="From ..." style="width: 100%" >
												</div>
												<div class="col-xs-12 col-sm-2">
												    <input data-role="datepicker"
												    	   class="edate"
												    	   data-format="dd-MM-yyyy"
												           data-bind="value: edate,
												                      min: sdate"
												           placeholder="To ..." style="width: 100%" >
												</div>
												<div class="col-xs-12 col-sm-1">
												  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>
											</div>
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<div class="row">
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.license">Licenses</span>
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
																source: licenseDS,
																events: {change: licenseChange}" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.location">Locations</span>
														<input 
															data-role="dropdownlist" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="false" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveBloc,
																source: blocDS" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.customers"></span>
													<select data-role="multiselect"
														   data-value-primitive="true"
														   data-header-template="customer-header-tmpl"
														   data-item-template="contact-list-tmpl"
														   data-value-field="id"
														   data-text-field="name"
														   data-bind="value: obj.contactIds, 
														   			source: contactDS"
														   data-placeholder="Select Customer.."
														   style="width: 100%" /></select>
												</div>
												<div class="col-xs-12 col-sm-1">											
										  			<button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>														
											</div>		
							        	</div>
							        	 <!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
											<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
												<i class="fa fa-file-excel-o"></i>
												Export to Excel
											</span>
							        	</div>	
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->

						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.sale_summary_report">Sale Summary</h2>
								<p data-bind="text: displayDate"></p>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="total-sale">
										<p data-bind="text: lang.lang.number_of_customer">Number of Customer</p>
										<span data-bind="text: dataSource.total"></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.total_sale">Total Sale</p>
										<span data-bind="text: totalAmount"></sapn>
									</div>
								</div>
							</div>
							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.customer">Customer</span></th>
										<th style="text-align: right; vertical-align: top;"><span data-bind="text: lang.lang.location">Location</span></th>
										<th style="text-align: right; vertical-align: top;"><span data-bind="text: lang.lang.usage">Usage</span></th>
										<th style="text-align: right; vertical-align: top;"><span data-bind="text: lang.lang.number_invoice">Number Invoice</span></th>
										<th style="text-align: right; vertical-align: top;"><span data-bind="text: lang.lang.total_sale">Total Sale</span></th>
									</tr>
								</thead>
			            		<tbody  data-role="listview"
			            				data-auto-bind="false"
						                data-template="saleSummary-template"
						                data-bind="source: dataSource" >
						        </tbody>
			            	</table>
			            </div>
			        </span>
				</div>
			</div>
		</div>
	</div>	
</script>
<script id="saleSummary-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: right;">#=location#</td>
		<td style="text-align: right;">#=usage#</td>
		<td style="text-align: right;">#=invoice#</td>
		<td style="text-align: right;">#=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
	</tr>
</script>
<script id="connectServiceRevenue" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">									        	
											<div class="row">
												<div class="col-xs-12 col-sm-2">
													<input data-role="dropdownlist"
														   class="sorter"                  
												           data-value-primitive="true"
												           data-text-field="text"
												           data-value-field="value"
												           data-bind="value: sorter,
												                      source: sortList,                              
												                      events: { change: sorterChanges }" style="width: 100%;" />
												</div>
												<div class="col-xs-12 col-sm-2">                      
													<input data-role="datepicker"
														   class="sdate"
														   data-format="dd-MM-yyyy"
												           data-bind="value: sdate,
												           			  max: edate"
												           placeholder="From ..." style="width: 100%;" >
												</div>
												<div class="col-xs-12 col-sm-2"> 
												    <input data-role="datepicker"
												    	   class="edate"
												    	   data-format="dd-MM-yyyy"
												           data-bind="value: edate,
												                      min: sdate"
												           placeholder="To ..." style="width: 100%;" >
												</div>
												<div class="col-xs-12 col-sm-1">
												  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>
											</div>
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<div class="row">
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.license">Licenses</span>
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
																source: licenseDS,
																events: {change: licenseChange}" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-3">													
													<span data-bind="text: lang.lang.location">Locations</span>
														<input 
															data-role="dropdownlist" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="false" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveBloc,
																source: blocDS" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-1">											
										  			<button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>														
											</div>		
							        	</div>
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
											<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
												<i class="fa fa-file-excel-o"></i>
												Export to Excel
											</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					

						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.connection_service_revenue_report">Connect Service Revenue</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="total-sale">
										<p data-bind="text: lang.lang.number_of_customer">Number of Customers</p>
										<span data-bind="text: dataSource.total"></span>
									</div>

								</div>
								<div class="col-xs-12 col-sm-9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.amount">Amount</p>
										<span data-bind="text: total"></sapn>
									</div>
								</div>
							</div>

							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>									
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.type">Type</span></th>
										<th style="text-align: left; vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
										<th style="text-align: left; vertical-align: top;"><span data-bind="text: lang.lang.location">Location</span></th>
										<th style="text-align: left; vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
										<th style="vertical-align: top; text-align: right;"><span data-bind="text: lang.lang.revenue">Revenue</span></th>
									</tr>
								</thead>
								<tbody data-role="listview"
										data-template="connectServiceRevenue-template"
										data-auto-bind="false" 
										data-bind="source: dataSource">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="connectServiceRevenue-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=name#</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">#=line[i].type#</td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].date), "dd-MM-yyyy")#</td>
			<td style="text-align: left;">#=line[i].location#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>		
			<td style="text-align: right;">#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;">Total</td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="4">&nbsp;</td>
    </tr>
</script>
<script id="saleDetail" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab" ><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">
								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
											<div class="row">
												<div class="col-xs-12 col-sm-2">
													<input data-role="dropdownlist"
														   class="sorter"
												           data-value-primitive="true"
												           data-text-field="text"
												           data-value-field="value"
												           data-bind="value: sorter,
												                      source: sortList,
												                      events: { change: sorterChanges }" style="width: 100%" />
												</div>
												<div class="col-xs-12 col-sm-2">
													<input data-role="datepicker"
														   class="sdate"
														   data-format="dd-MM-yyyy"
												           data-bind="value: sdate,
												           			  max: edate"
												           placeholder="From ..." style="width: 100%" >
												</div>
												<div class="col-xs-12 col-sm-2">
												    <input data-role="datepicker"
												    	   class="edate"
												    	   data-format="dd-MM-yyyy"
												           data-bind="value: edate,
												                      min: sdate"
												           placeholder="To ..." style="width: 100%" >
												</div>
												<div class="col-xs-12 col-sm-1">
												  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>
											</div>
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<div class="row">
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.license">Licenses</span>
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
																source: licenseDS,
																events: {change: licenseChange}" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.location">Locations</span>
														<input 
															data-role="dropdownlist" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="false" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveBloc,
																source: blocDS" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-1">											
										  			<button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>														
											</div>		
							        	</div>
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
											<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
												<i class="fa fa-file-excel-o"></i>
												Export to Excel
											</span>
							        	</div>	
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					

						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.sale_detail_report">Sale Detail</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="total-sale">
										<p data-bind="text: lang.lang.number_of_customer">Number of Customers</p>
										<span data-bind="text: dataSource.total"></span>
									</div>

								</div>
								<div class="col-xs-12 col-sm-9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.amount">Amount</p>
										<span data-bind="text: total"></sapn>
									</div>
								</div>
							</div>

							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>									
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.type">Type</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.location">Location</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
										<th style="vertical-align: top; text-align: right;"><span data-bind="text: lang.lang.usage">Usage</span></th>
										<th style="vertical-align: top; text-align: right;"><span data-bind="text: lang.lang.amount">Amount</span></th>
									</tr>
								</thead>
								<tbody data-role="listview"
										data-template="saleDetail-template"
										data-auto-bind="false" 
										data-bind="source: dataSource">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleDetail-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=name#</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">#=line[i].type#</td>
			<td>#=kendo.toString(new Date(line[i].date), "dd-MM-yyyy")#</td>
			<td>#=line[i].location#</td>
			<td>#=line[i].number#</td>		
			<td style="text-align: right;">#=line[i].usage#</td>	
			<td style="text-align: right;">#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;">Total</td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
</script>
<script id="fineCollect" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab" ><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">
								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
											<div class="row">
												<div class="col-xs-12 col-sm-2">
													<input data-role="dropdownlist"
														   class="sorter"
												           data-value-primitive="true"
												           data-text-field="text"
												           data-value-field="value"
												           data-bind="value: sorter,
												                      source: sortList,
												                      events: { change: sorterChanges }" style="width: 100%" />
												</div>
												<div class="col-xs-12 col-sm-2">
													<input data-role="datepicker"
														   class="sdate"
														   data-format="dd-MM-yyyy"
												           data-bind="value: sdate,
												           			  max: edate"
												           placeholder="From ..." style="width: 100%" >
												</div>
												<div class="col-xs-12 col-sm-2">
												    <input data-role="datepicker"
												    	   class="edate"
												    	   data-format="dd-MM-yyyy"
												           data-bind="value: edate,
												                      min: sdate"
												           placeholder="To ..." style="width: 100%" >
												</div>
												<div class="col-xs-12 col-sm-1">
												  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>
											</div>
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<div class="row">
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.license">Licenses</span>
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
																source: licenseDS,
																events: {change: licenseChange}" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.location">Locations</span>
														<input 
															data-role="dropdownlist" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="false" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveBloc,
																source: blocDS" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-1">											
										  			<button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>														
											</div>		
							        	</div>
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
											<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
												<i class="fa fa-file-excel-o"></i>
												Export to Excel
											</span>
							        	</div>	
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					

						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.fine_collection_report">Fine Collection</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="total-sale">
										<p data-bind="text: lang.lang.number_of_customer">Number of Customers</p>
										<span data-bind="text: dataSource.total"></span>
									</div>

								</div>
								<div class="col-xs-12 col-sm-9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.amount">Amount</p>
										<span data-bind="text: total"></sapn>
									</div>
								</div>
							</div>

							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>									
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.type">Type</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.location">Location</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.amount">Amount</span></th>
									</tr>
								</thead>
								<tbody data-role="listview"
										data-template="fineCollect-template"
										data-auto-bind="false" 
										data-bind="source: dataSource">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="fineCollect-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=name#</td>
		<td></td>
		<td></td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">#=line[i].type#</td>
			<td>#=kendo.toString(new Date(line[i].date), "dd-MM-yyyy")#</td>
			<td>#=line[i].location#</td>
			<td>#=line[i].number#</td>		
			<td style="text-align: right;">#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;">Total</td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
</script>
<script id="report-sale-detail-template" type="text/x-kendo-template">
	<tr>
		<td>#=contact_number#</td>
		<td>#=fullname#</td>
		<td>#=contact_type_name#</td>
		<td>#=location_name#</td>
		<td>#=kendo.toString(usage, "n0")#</td>
		<td>#=kendo.toString(amount, "c0", banhji.institute.locale)#</td>
	</tr>
</script>
<script id="otherRevenues" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab" ><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">
								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
											<div class="row">
												<div class="col-xs-12 col-sm-2">
													<input data-role="dropdownlist"
														   class="sorter"
												           data-value-primitive="true"
												           data-text-field="text"
												           data-value-field="value"
												           data-bind="value: sorter,
												                      source: sortList,
												                      events: { change: sorterChanges }" style="width: 100%" />
												</div>
												<div class="col-xs-12 col-sm-2">
													<input data-role="datepicker"
														   class="sdate"
														   data-format="dd-MM-yyyy"
												           data-bind="value: sdate,
												           			  max: edate"
												           placeholder="From ..." style="width: 100%" >
												</div>
												<div class="col-xs-12 col-sm-2">
												    <input data-role="datepicker"
												    	   class="edate"
												    	   data-format="dd-MM-yyyy"
												           data-bind="value: edate,
												                      min: sdate"
												           placeholder="To ..." style="width: 100%" >
												</div>
												<div class="col-xs-12 col-sm-1">
												  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>
											</div>
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<div class="row">
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.license">Licenses</span>
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
																source: licenseDS,
																events: {change: licenseChange}" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.location">Locations</span>
														<input 
															data-role="dropdownlist" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="false" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveBloc,
																source: blocDS" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-1">											
										  			<button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>														
											</div>		
							        	</div>
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
											<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
												<i class="fa fa-file-excel-o"></i>
												Export to Excel
											</span>
							        	</div>	
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					

						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.fine_collection_report">Fine Collection</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="total-sale">
										<p data-bind="text: lang.lang.number_of_customer">Number of Customers</p>
										<span data-bind="text: dataSource.total"></span>
									</div>

								</div>
								<div class="col-xs-12 col-sm-9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.amount">Amount</p>
										<span data-bind="text: total"></sapn>
									</div>
								</div>
							</div>

							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>									
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.type">Type</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.location">Location</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.amount">Amount</span></th>
									</tr>
								</thead>
								<tbody data-role="listview"
										data-template="otherRevenues-template"
										data-auto-bind="false" 
										data-bind="source: dataSource">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="otherRevenues-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=name#</td>
		<td></td>
		<td></td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">#=line[i].type#</td>
			<td>#=kendo.toString(new Date(line[i].date), "dd-MM-yyyy")#</td>
			<td>#=line[i].location#</td>
			<td>#=line[i].number#</td>		
			<td style="text-align: right;">#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;">Total</td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
</script>
<script id="accountReceivableList" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">

								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
									        <span data-bind="text: lang.lang.as_of"></span>:
									        <input data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd" 
													data-bind="value: as_of" />

								            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
							
							        	</div>
								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<div class="row">
												<div class="col-xs-12 col-sm-2" style="padding-left: 15px;">
													<span data-bind="text: lang.lang.license">Licenses</span>
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
																source: licenseDS,
																events: {change: licenseChange}" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-2">													
													<span data-bind="text: lang.lang.location">Locations</span>
														<input 
															data-role="dropdownlist" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="false" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveBloc,
																source: blocDS" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-2">
													<span data-bind="text: lang.lang.customers"></span>
													<select data-role="multiselect"
														   data-value-primitive="true"
														   data-header-template="customer-header-tmpl"
														   data-item-template="contact-list-tmpl"
														   data-value-field="id"
														   data-text-field="name"
														   data-bind="value: obj.contactIds, 
														   			source: contactDS"
														   data-placeholder="Select Customer.."
														   style="width: 100%" /></select>
												</div>
												<div class="col-xs-12 col-sm-1">											
										  			<button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>														
											</div>		
							        	</div>
							        								        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
								        	<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.accounts_receivable_listing">List Of Invoice To Be Collected</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="total-sale">									
										<p data-bind="text: lang.lang.number_of_customer">Number of Customer</p>
										<span data-format="n0" data-bind="text: dataSource.total"></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.total_amount">Total Amount</p>
										<span data-bind="text: totalAmount"></span>
									</div>
								</div>
							</div>

							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.type">Type</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.location">Location</span></th>
										<th style="vertical-align: top; text-align: center;"><span data-bind="text: lang.lang.status">Status</span></th>	
										<th style="vertical-align: top; text-align: right;" ><span data-bind="text: lang.lang.amount">Amount</span></th>
									</tr>
								</thead>
								<tbody data-role="listview"
										data-auto-bind="false"
									 	data-bind="source: dataSource"
									 	data-template="accountReceivableList-template"
								></tbody>
							</table>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="accountReceivableList-template" type="text/x-kendo-template">
	<tr>
		<td>
			<a href="\#/#=type.toLowerCase()#/#=id#">#=type#</a>
		</td>
		<td>#=kendo.toString(new Date(issued_date),"dd-MM-yyyy")#</td>
		<td>#=name#</td>
		<td>
			<a href="\#/#=type.toLowerCase()#/#=id#">#=number#</a>
		</td>
		<td>#=location#</td>
		<td style="text-align: center;">
			# var date = new Date(), dueDates = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
			#if(dueDates < toDay) {#
				Over Due #:Math.floor((toDay - dueDates)/(1000*60*60*24))# days
			#} else {#
				#:Math.floor((dueDates - toDay)/(1000*60*60*24))# days to pay
			#}#
		</td>
		<td style="text-align: right;">#=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
	</tr>
</script>
<script id="agingSummary" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">

								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
									        <span data-bind="text: lang.lang.as_of"></span>:
									        <input data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd" 
													data-bind="value: as_of" />

								            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
							
							        	</div>
								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<div class="row">
												<div class="xol-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.license">Licenses</span>
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
																source: licenseDS,
																events: {change: licenseChange}" style="width: 100%">
												</div>
												<div class="xol-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.location">Locations</span>
														<input 
															data-role="dropdownlist" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="false" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveBloc,
																source: blocDS" style="width: 100%">
												</div>
												<div class="xol-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.customers"></span>
													<select data-role="multiselect"
														   data-value-primitive="true"
														   data-header-template="customer-header-tmpl"
														   data-item-template="contact-list-tmpl"
														   data-value-field="id"
														   data-text-field="name"
														   data-bind="value: obj.contactIds, 
														   			source: contactDS"
														   data-placeholder="Select Customer.."
														   style="width: 100%" /></select>
												</div>
												<div class="xol-xs-12 col-sm-1">											
										  			<button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>														
											</div>		
							        	</div>
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
											<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
												<i class="fa fa-file-excel-o"></i>
												Export to Excel
											</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.receivable_aging_summary">Receivable Aging Summary</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="total-sale">									
										<p data-bind="text: lang.lang.number_of_customer">Number of Customer</p>
										<span data-format="n0" data-bind="text: dataSource.total"></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.total_customer_balance">Total Customer Balance</p>
										<span data-bind="text: totalBalance"></span>
									</div>
								</div>
							</div>

							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
										<th style="text-align: right; vertical-align: top;"><span data-bind="text: lang.lang.current">CURRENT</span></th>
										<th style="text-align: right; vertical-align: top;"><span>1-30</span></th>
										<th style="text-align: right; vertical-align: top;"><span>31-60</span></th>
										<th style="text-align: right; vertical-align: top;"><span>61-90</span></th>
										<th style="text-align: right; vertical-align: top;"><span data-bind="text: lang.lang.over_90"></span></th>
										<th style="text-align: right; vertical-align: top;"><span data-bind="text: lang.lang.total">TOTAL</span></th>							
									</tr>
								</thead>
								<tbody data-role="listview"
										data-auto-bind="false"
									 	data-bind="source: dataSource"
									 	data-template="agingSummary-template"
								></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="agingSummary-template" type="text/x-kendo-template" >
	<tr>
		<td>#=name#</td>
		<td style="text-align: right;">#=kendo.toString(current, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(in30, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(in60, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(in90, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(over90, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(total, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
	</tr>
</script>
<script id="customerDepositReport" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">
								        	<div class="row">									        	
												<div class="col-xs-12 col-sm-2">
													<input data-role="dropdownlist"
														   class="sorter"                  
												           data-value-primitive="true"
												           data-text-field="text"
												           data-value-field="value"
												           data-bind="value: sorter,
												                      source: sortList,
												                      events: { change: sorterChanges }" style="width: 100%" />
												</div>
												<div class="col-xs-12 col-sm-2">
													<input data-role="datepicker"
														   class="sdate"
														   data-format="dd-MM-yyyy"
												           data-bind="value: sdate,
												           			  max: edate"
												           placeholder="From ..." style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-2">
												    <input data-role="datepicker"
												    	   class="edate"
												    	   data-format="dd-MM-yyyy"
												           data-bind="value: edate,
												                      min: sdate"
												           placeholder="To ..." style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-1">
												  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>
											</div>
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<div class="row">
												<div class="col-xs-12 col-sm-2">
													<span data-bind="text: lang.lang.license">Licenses</span>
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
																source: licenseDS,
																events: {change: licenseChange}" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-2">
													<span data-bind="text: lang.lang.location">Locations</span>
														<input 
															data-role="dropdownlist" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="false" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveBloc,
																source: blocDS" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-2">
													<span data-bind="text: lang.lang.customers"></span>
													<select data-role="multiselect"
														   data-value-primitive="true"
														   data-header-template="customer-header-tmpl"
														   data-item-template="contact-list-tmpl"
														   data-value-field="id"
														   data-text-field="name"
														   data-bind="value: obj.contactIds, 
														   			source: contactDS"
														   data-placeholder="Select Customer.."
														   style="width: 100%" /></select>
												</div>
												<div class="col-xs-12 col-sm-1">											
										  			<button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>														
											</div>		
							        	</div>
							        	<div class="tab-pane report" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
								        	<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					

						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.customer_deposit_detail">Customer Deposit Detail</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-5">
									<div class="total-sale">
										<p data-bind="text: lang.lang.number_of_customer">Number of Customer</p>
										<span data-bind="text: dataSource.total"></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-7">
									<div class="total-sale">
										<p data-bind="text: lang.lang.deposit_balance">Deposit Balance</p>
										<span data-bind="text: totalAmount"></span>
									</div>
								</div>
							</div>

							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.type">Type</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.number">Number</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.location">Location</span></th>
										<th style="vertical-align: top; text-align: right;"><span data-bind="text: lang.lang.amount">Amount</span></th>
										<th style="vertical-align: top; text-align: right;"><span data-bind="text: lang.lang.balance">Balance</span></th>
									</tr>
								</thead>
								<tbody data-role="listview"
										 data-bind="source: dataSource"
										 data-auto-bind="false"
										 data-template="customerDepositReport-template"
								></tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerDepositReport-template" type="text/x-kendo-tmpl">
	<tr>
		<td colspan="6" style="font-weight: bold;">#: name #</td>
    	<td class="right strong" style="color: black;">
    		#=kendo.toString(balance_forward)#
    	</td>
	</tr>
	#var balance = balance_forward;#
	#for(var i=0; i<line.length; i++){#
		#balance += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important; color: black;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
			</td>		
			<td style="color: black;">
				#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#
			</td>
			<td style="color: black;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].number#</a>
			</td>
			<td style="color: black;">
				#if(line[i].reference.length>0){#
					<a href="\#/#=line[i].reference[0].type.toLowerCase()#/#=line[i].reference[0].id#"><i></i> #=line[i].reference[0].number#</a>
				#}#
			</td>
			<td>#=line[i].location#</td>
			<td align="right" style="color: black;">
				#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
			</td>
			<td class="right" style="color: black;">
				#=kendo.toString(balance, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
			</td> 			
	    </tr>    
    #}# 
    <tr>
    	<td colspan="6" style="font-weight: bold; color: black;">Total #: name #</td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(balance, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="7">&nbsp;</td>
    </tr>  
</script>
<script id="agingDetail" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export">Print/Export</span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">

								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
									        <span data-bind="text: lang.lang.as_of"></span>:
									        <input data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd" 
													data-bind="value: as_of" />

								            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
							
							        	</div>
								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<div class="row">
												<div class="xol-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.license">Licenses</span>
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
																source: licenseDS,
																events: {change: licenseChange}" style="width: 100%">
												</div>
												<div class="xol-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.location">Locations</span>
														<input 
															data-role="dropdownlist" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="false" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveBloc,
																source: blocDS" style="width: 100%">
												</div>
												<div class="xol-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.customers"></span>
													<select data-role="multiselect"
														   data-value-primitive="true"
														   data-header-template="customer-header-tmpl"
														   data-item-template="contact-list-tmpl"
														   data-value-field="id"
														   data-text-field="name"
														   data-bind="value: obj.contactIds, 
														   			source: contactDS"
														   data-placeholder="Select Customer.."
														   style="width: 100%" /></select>
												</div>
												<div class="xol-xs-12 col-sm-1">											
										  			<button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>														
											</div>		
							        	</div>
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
											<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
												<i class="fa fa-file-excel-o"></i>
												Export to Excel
											</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.customer_aging_detail_list">Receivable Aging Summary</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="total-sale">									
										<p data-bind="text: lang.lang.number_of_customer">Number of Customer</p>
										<span data-format="n0" data-bind="text: dataSource.total"></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.total_customer_balance">Total Customer Balance</p>
										<span data-bind="text: totalBalance"></span>
									</div>
								</div>
							</div>

							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>
										<th><span data-bind="text: lang.lang.type">Type</span></th>
										<th><span data-bind="text: lang.lang.invoice_date">Invoice Date</span></th>
										<th><span data-bind="text: lang.lang.due_date">Due Date</span></th>
										<th><span data-bind="text: lang.lang.reference">Reference</span></th>
										<th><span data-bind="text: lang.lang.location">Location</span></th>
										<th style="text-align: center;"><span data-bind="text: lang.lang.status">Status</span></th>
										<th style="text-align: right;"><span data-bind="text: lang.lang.amount">Amount</span></th>
										<th style="text-align: right;"><span data-bind="text: lang.lang.balance">Balance</span></th>
									</tr>
								</thead>
								<tbody data-role="listview"
								 data-auto-bind="false"
								 data-bind="source: dataSource"
								 data-template="agingDetail-template"
							></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="agingDetail-template" type="text/x-kendo-tmpl">
	<tr>
		<td colspan="8" style="font-weight: bold; color: black;">#: name #</td>
	</tr>
	#var totalBalance = 0;#
	#for(var i=0; i<line.length; i++){#
	#totalBalance += line[i].amount;#
	<tr>
		<td style="padding-left: 20px !important;">
			<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
		</td>
		<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
		<td>#=kendo.toString(new Date(line[i].due_date), "dd-MM-yyyy")#</td>
		<td><a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].number#</a></td>		
		<td>#=line[i].location#</td>
		<td style="text-align: center;"> 
    		#if(line[i].type==="Cash_Receipt"){#
				PMT
			#}else if(line[i].type==="Sale_Return"){#
				Returned
        	#}else{#
        		#if(line[i].status==="0" || line[i].status==="2") {#
					# var date = new Date(), dueDates = new Date(line[i].due_date).getTime(), toDay = new Date(date).getTime(); #
					#if(dueDates < toDay) {#
						Over Due #:Math.floor((toDay - dueDates)/(1000*60*60*24))# days
					#} else {#
						#:Math.floor((dueDates - toDay)/(1000*60*60*24))# days to pay
					#}#
				#}else{#
					Paid
				#}#
        	#}#
		</td>
		<td style="text-align: right;">
			#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
		</td>
		<td style="text-align: right;">
			#=kendo.toString(totalBalance, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
		</td>
	</tr>
    #}#
    <tr>
    	<td colspan="7" style="font-weight: bold; color: black;">Total</td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalBalance, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="7">&nbsp;</td>
    </tr>  
</script>
<script id="customerBalanceSummary" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>	
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
									        <span data-bind="text: lang.lang.as_of"></span>:
									        <input data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd" 
													data-bind="value: as_of" />

								            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
							
							        	</div>
							        	<div class="tab-pane report" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
											<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
												<i class="fa fa-file-excel-o"></i>
												Export to Excel
											</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.customer_balance_summary"></h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-5">
									<div class="total-sale">	
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-7">
									<div class="total-sale">
										<p data-bind="text: lang.lang.total_customer_balance"></p>
										<span data-bind="text: total_balance"></span>									
									</div>
								</div>
							</div>

							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>
										<th style="text-transform: uppercase; vertical-align: top;" data-bind="text: lang.lang.customer_name"></th>
										<th style="text-align: right; text-transform: uppercase; vertical-align: top;" data-bind="text: lang.lang.No_of_invoice"></th>
										<th style="vertical-align: top; text-align: right;" data-bind="text: lang.lang.account_receivable_balance"></th>
									</tr>
								</thead>
			            		<tbody data-role="listview"
			            				data-auto-bind="false"
						                data-template="customerBalanceSummary-template"
						                data-bind="source: dataSource" >
						        </tbody>
			            	</table>
			            </div>
			        </div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerBalanceSummary-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: right;">#=number#</td>
		<td align="right">#=kendo.toString(amount, "c2", banhji.locale)#</td>
	</tr>
</script>	
<script id="customerBalanceDetail" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>										
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
									        <span data-bind="text: lang.lang.as_of"></span>:
									        <input data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd" 
													data-bind="value: as_of" />

								            <button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>							
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.customer_balance_detail"></h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-5">
									<div class="total-sale">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-7">
									<div class="total-sale">
										<p data-bind="text: lang.lang.total_customer_balance"></p>
										<span data-bind="text: total_balance"></span>						
									</div>
								</div>
							</div>

							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>
										<th style="vertical-align: top;" data-bind="text: lang.lang.type"></th>
										<th style="text-align: left; vertical-align: top;" data-bind="text: lang.lang.date"></th>
										<th style="text-align: left; vertical-align: top;" data-bind="text: lang.lang.reference"></th>		
										<th style="text-align: left; vertical-align: top;" data-bind="text: lang.lang.location"></th>	
										<th style="text-align: right; vertical-align: top; text-align: center;" data-bind="text: lang.lang.status"></th>	
										<th style="vertical-align: top; text-align: right;" data-bind="text: lang.lang.balance"></th>
									</tr>
								</thead>
								<tbody data-role="listview"
											 data-auto-bind="false"
											 data-bind="source: dataSource"										 
											 data-template="customerBalanceDetail-template"
								></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerBalanceDetail-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td colspan="6">#=name#</td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += kendo.parseFloat(line[i].amount);#
		<tr>
			<td style="padding-left: 20px !important; text-align: left">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
			</td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: left;">#=line[i].number#</td>	
			<td style="text-align: left;">#=line[i].location#</td>		
			<td style="text-align: center;">
				# var date = new Date(), dueDates = new Date(line[i].due_date).getTime(), toDay = new Date(date).getTime(); #
				#if(dueDates < toDay) {#
					Over Due #:Math.floor((toDay - dueDates)/(1000*60*60*24))# days
				#} else {#
					#:Math.floor((dueDates - toDay)/(1000*60*60*24))# days to pay
				#}#
			</td>	
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;" data-bind="text: lang.lang.total"></td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
</script>
<script id="cashReceiptSummary" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="margin-top: 15px;">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i>Date</a></li>										
										<li><a class="glyphicons print" href="#tab-2" data-toggle="tab" data-bind="click: printGrid"><i></i>Print/Export</a></li
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <div class="tab-pane active" id="tab-1">
											<input data-role="dropdownlist"
							                   data-value-primitive="true"
							                   data-text-field="text"
							                   data-value-field="value"
							                   data-bind="value: sorter,
							                              source: sortList,             
							                              events: { change: sorterChanges }" />
							                                           
						                    <input data-role="datepicker"
						                       data-format="dd-MM-yyyy"
						                       data-parse-formats="yyyy-MM-dd"
							                   data-bind="value: sdate"
							                   placeholder="From" />

						                   	<input data-role="datepicker"
						                       data-format="dd-MM-yyyy"
						                       data-parse-formats="yyyy-MM-dd"
							                   data-bind="value: edate"
							                   placeholder="To" />

							          		<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>							
									    </div>									        							       
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					</div>
					<br>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: institute.name"></h3>
							<h2>Cash Receipt Summary</h2>
						</div>
					</div>
					<div data-role="grid" data-bind="source: dataSource" data-pageable="true"></div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashReceiptSourceSummary" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="margin-top: 15px;">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text:lang.lang.date">Date</span></a></li>									
										<li><a class="glyphicons print" href="#tab-2" data-toggle="tab" data-bind="click: printGrid"><i></i><span data-bind="text:lang.lang.print_export">Print/Export</span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <div class="tab-pane active" id="tab-1">
											<input data-role="dropdownlist"
							                   data-value-primitive="true"
							                   data-text-field="text"
							                   data-value-field="value"
							                   data-bind="value: sorter,
							                              source: sortList,             
							                              events: { change: sorterChanges }" />
							                                           
						                    <input data-role="datepicker"
						                       data-format="dd-MM-yyyy"
						                       data-parse-formats="yyyy-MM-dd"
							                   data-bind="value: sdate"
							                   placeholder="From" />

						                   	<input data-role="datepicker"
						                       data-format="dd-MM-yyyy"
						                       data-parse-formats="yyyy-MM-dd"
							                   data-bind="value: edate"
							                   placeholder="To" />

							          		<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>							
									    </div>									        							       
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					</div>
					<br>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: institute.name"></h3>
							<h2 data-bind="text:lang.lang.cash_receipt_by_sources_detail">Cash Receipt by Source Summary</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashReceiptDetail" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export" style="text-transform: capitalize;"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
								        	<div class="row">
												<div class="col-xs-12 col-sm-2">											
													<input data-role="dropdownlist"
														   class="sorter"                  
												           data-value-primitive="true"
												           data-text-field="text"
												           data-value-field="value"
												           data-bind="value: sorter,
												                      source: sortList,                              
												                      events: { change: sorterChanges }" style="width: 100%" />
												</div>
												<div class="col-xs-12 col-sm-2">                    
													<input data-role="datepicker"
														   class="sdate"
														   data-format="dd-MM-yyyy"
												           data-bind="value: sdate,
												           			  max: edate"
												           placeholder="From ..." style="width: 100%" >
												</div>
												<div class="col-xs-12 col-sm-2">
												    <input data-role="datepicker"
												    	   class="edate"
												    	   data-format="dd-MM-yyyy"
												           data-bind="value: edate,
												                      min: sdate"
												           placeholder="To ..." style="width: 100%" >
												</div>
												<div class="col-xs-12 col-sm-1">
												  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>
							        		</div>
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<div class="row">
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.license">Licenses</span>
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
																source: licenseDS,
																events: {change: licenseChange}" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.location">Locations</span>
														<input 
															data-role="dropdownlist" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="false" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveBloc,
																source: blocDS" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-1">											
										  			<button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>														
											</div>		
							        	</div>
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
											<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
												<i class="fa fa-file-excel-o"></i>
												Export to Excel
											</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.cash_receipt_detail">Cash Receipt Detail</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="total-sale">									
										<p data-bind="text: lang.lang.no_of_cashReceipt">Number of Cash Receipt</p>
										<span data-format="n0" data-bind="text: cashReceipt"></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.total_amount">Total Amount</p>
										<span data-bind="text: total"></span>
									</div>
								</div>
							</div>

							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.receipt_date">Receipt Date</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.receipt_number">Receipt Number</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.receipt_amount">Receipt Amount</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.invoice_date">Invoice Date</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.invoice_number">Invoice Number</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.invoice_amount">Invoice Amount</span></th>									
									</tr>
								</thead>
								<tbody data-role="listview"
											 data-auto-bind="false"
											 data-bind="source: dataSource"
											 data-template="cashReceiptDetail-template"
								></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashReceiptDetail-template" type="text/x-kendo-template">
	<tr>
		<td colspan="6" style="font-weight: bold; color: black;">#: name #</td>
	</tr>
	# var totalReceived = 0;#	
	# var totalInvoice = 0;#
	#for(var i=0; i<line.length; i++){#
		#totalReceived += line[i].amount;#
		#totalInvoice += line[i].reference_amount;#
		<tr>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td><a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a></td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>		
			<td>#=kendo.toString(new Date(line[i].reference_issued_date), "dd-MM-yyyy")#</td>
			<td><a href="\#/#=line[i].reference_type.toLowerCase()#/#=line[i].reference_id#">#=line[i].reference_number#</a></td>
			<td style="text-align: right;">#=kendo.toString(line[i].reference_amount, "c2", banhji.locale)#</td>				
		</tr>
	#}#
	<tr>
    	<td colspan="2" style="font-weight: bold; color: black;" data-bind="text: lang.lang.total">Total</td>
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalReceived, "c2", banhji.locale)#
    	</td>
    	<td></td>
    	<td></td>
    	<td></td>
    </tr>
	<tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
</script>
<script id="cashReceiptSourceDetail" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export" style="text-transform: capitalize;"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
											<div class="row">									        	
												<div class="col-xs-12 col-sm-2">
													<input data-role="dropdownlist"
														   class="sorter"                  
												           data-value-primitive="true"
												           data-text-field="text"
												           data-value-field="value"
												           data-bind="value: sorter,
												                      source: sortList,                              
												                      events: { change: sorterChanges }" style="width: 100%">
												</div>								        	
												<div class="col-xs-12 col-sm-2">                     
													<input data-role="datepicker"
														   class="sdate"
														   data-format="dd-MM-yyyy"
												           data-bind="value: sdate,
												           			  max: edate"
												           placeholder="From ..."  style="width: 100%">
												</div>								        	
												<div class="col-xs-12 col-sm-2">          
												    <input data-role="datepicker"
												    	   class="edate"
												    	   data-format="dd-MM-yyyy"
												           data-bind="value: edate,
												                      min: sdate"
												           placeholder="To ..."  style="width: 100%">
												</div>								        	
												<div class="col-xs-12 col-sm-1">
												  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>
											</div>
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<div class="row">
												<div class="col-xs-12 col-sm-3" >
													<span data-bind="text: lang.lang.license">Licenses</span>
													<input 
														data-role="dropdownlist" 
														data-option-label="License ..." 
														data-auto-bind="false" 
														data-value-primitive="true" 
														data-text-field="name" 
														data-value-field="id" 
														data-bind="
															value: licenseSelect,
																source: licenseDS,
																events: {change: licenseChange}" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.location">Locations</span>
														<input 
															data-role="dropdownlist" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="false" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveBloc,
																source: blocDS" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-1">											
										  			<button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>														
											</div>		
							        	</div>

							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
											<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
												<i class="fa fa-file-excel-o"></i>
												Export to Excel
											</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					

						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.cash_receipt_by_sources_detail">Cash Receipt by Source Detail</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="total-sale">
										<p data-bind="text: lang.lang.number_of_customer">Number of Customers</p>
										<span data-bind="text: dataSource.total"></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.total">Total</p>
										<span data-bind="text: total"></sapn>
									</div>
								</div>
							</div>

							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>									
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
										<th style="text-align: left; vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>									
										<th style="text-align: left; vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
										<th style="vertical-align: top; text-align: right"><span data-bind="text: lang.lang.amount">Amount</span></th>
									</tr>
								</thead>
								<tbody data-role="listview"
										data-template="cashReceiptSourceDetail-template"
										data-auto-bind="false" 
										data-bind="source: dataSource">
								</tbody>
							</table>
						</div>
					</span>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashReceiptSourceDetail-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=payment#</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">#=line[i].name#</td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].date), "dd-MM-yyyy")#</td>
			<td style="text-align: left;">#=line[i].number#</td>		
			<td style="text-align: right;">#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;">Total</td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="4">&nbsp;</td>
    </tr>
</script>
<script id="importView" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2 data-bind="text: lang.lang.imports" style="margin-bottom: 25px;">Imports</h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>

						<!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
							
								<!-- Tabs Heading -->
								<div class="widget-head" style="background: #203864 !important; color: #fff;">
									<ul>
										<li class="active"><a class="glyphicons user" href="#tabContact" data-toggle="tab"><i></i><span style="line-height: 55px;" data-bind="text: lang.lang.customer">Customer</span></a></li>
										<li><a class="glyphicons vcard" href="#tabProperty" data-toggle="tab"><i></i><span style="line-height: 55px;" data-bind="text: lang.lang.property">Property</span></a></li>
										<li><a class="glyphicons pushpin" href="#tabLocation" data-toggle="tab"><i></i><span style="line-height: 55px;" data-bind="text: lang.lang.location">Location</span></a></li>
										<li><a class="glyphicons list" href="#tabInventery" data-toggle="tab"><i></i><span style="line-height: 55px;" data-bind="text: lang.lang.meter">Meter</span></a></li>									
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">
										<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 70%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
											<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
										</div>
										<!-- Tab content -->
										<div id="tabContact" class="tab-pane active widget-body-regular">
											<div class="row-fluid">
												<h4 class="separator bottom" data-bind="text: lang.lang.please_upload_contacts_file">Please upload contacts file</h4>
												<a href="<?php echo base_url(); ?>assets/water/wcontact_import_form_excel.xlsx" download>
													<span id="saveClose" class="btn btn-icon btn-success glyphicons download" >
														<i></i> 
														<span data-bind="text: lang.lang.download_file_example">Download file example</span>
													</span>
												</a>
												<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
												  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: contact.onSelected}" id="myFile"  class="margin-none" />
												</div>
												<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 120px!important; margin-bottom: 0;"><i></i>
													<span data-bind="click: contact.save, text: lang.lang.imports">Import Contact</span>
												</span>
											</div>
										</div>
										<!-- // Tab content END -->
									
										<!-- Tab content -->
										<div id="tabInventery"  class="tab-pane widget-body-regular">
											<div class="row-fluid">
												<h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.please_upload_meter_file">Please upload Meter file</h4>
												<a href="<?php echo base_url(); ?>assets/water/meter_import.xlsx" download>
													<span id="saveClose" class="btn btn-icon btn-success glyphicons download" >
														<i></i> 
														<span data-bind="text: lang.lang.download_file_example">Download file Example</span>
													</span>
												</a>
												<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
												  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: item.onSelected}" id="myFile"  class="margin-none" />
												</div>
												<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 120px!important; margin-bottom: 0;"><i></i>
													<span data-bind="click: item.save, text: lang.lang.imports">Import Meter</span>
												</span>
											</div>
										</div>

										<!-- Tab content -->
										<div id="tabLocation" class="tab-pane widget-body-regular">
											<div class="row">
												<div class="col-xs-12 col-sm-4">
													<h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.location">Please upload Meter file</h4>
													<a href="<?php echo base_url(); ?>assets/water/location_import.xlsx" download>
														<span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 200px!important;">
															<i></i> 
															<span data-bind="text: lang.lang.download_file_example">Download file Example</span>
														</span>
													</a>
													<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
													  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onLocationSelected}" id="myFile"  class="margin-none" />
													</div>
													<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 120px!important;"><i></i>
														<span data-bind="click: locationSave, text: lang.lang.imports">Import Meter</span>
													</span>
												</div>
												<div class="col-xs-12 col-sm-4">
													<h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.sub_location">Please upload Meter file</h4>
													<a href="<?php echo base_url(); ?>assets/water/sub_location_import.xlsx" download>
														<span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 200px!important;">
															<i></i> 
															<span data-bind="text: lang.lang.download_file_example">Download file Example</span>
														</span>
													</a>
													<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
													  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onSubLocationSelected}" id="myFile"  class="margin-none" />
													</div>
													<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 120px!important;"><i></i>
														<span data-bind="click: subLocationSave, text: lang.lang.imports">Import Meter</span>
													</span>
												</div>
												<div class="col-xs-12 col-sm-4">
													<h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.box">Please upload Meter file</h4>
													<a href="<?php echo base_url(); ?>assets/water/box_import.xlsx" download>
														<span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 200px!important;">
															<i></i> 
															<span data-bind="text: lang.lang.download_file_example">Download file Example</span>
														</span>
													</a>
													<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
													  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onBoxSelected}" id="myFile"  class="margin-none" />
													</div>
													<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 120px!important;"><i></i>
														<span data-bind="click: boxSave, text: lang.lang.imports">Import Meter</span>
													</span>
												</div>
											</div>
										</div>

										<!-- // Tab content END -->
										<div id="tabProperty" class="tab-pane widget-body-regular">
											<div class="row-fluid">
												<h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.please_upload_inventory_file">Please upload Property file</h4>
												<a href="<?php echo base_url(); ?>assets/water/property_import.xlsx" download>
													<span id="saveClose" class="btn btn-icon btn-success glyphicons download">
														<i></i> 
														<span data-bind="text: lang.lang.download_file_example">Download file Example</span>
													</span>
												</a>
												<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
												  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: property.onSelected}" id="myFile"  class="margin-none" />
												</div>
												<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 120px!important;"><i></i>
													<span data-bind="click: property.save, text: lang.lang.imports">Import Meter</span>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div id="ntf1" data-role="notification"></div>
								<!-- // Tabs END -->
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="Choeun" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2 data-bind="text: lang.lang.imports" style="margin-bottom: 25px;">Imports</h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>

						<!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
							
								<!-- Tabs Heading -->
								<div class="widget-head" style="background: #203864 !important; color: #fff;">
									<ul>
										<li class="active"><a class="glyphicons user" href="#tabContact" data-toggle="tab"><i></i><span style="line-height: 55px;" data-bind="text: lang.lang.customer">Customer</span></a></li>				
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">
										<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 70%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
											<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
										</div>
										<!-- Tab content -->
										<div id="tabContact" class="tab-pane active widget-body-regular">
											<div class="row-fluid">
												<h4 class="separator bottom" data-bind="text: lang.lang.please_upload_contacts_file">Please upload contacts file</h4>
												<a href="<?php echo base_url(); ?>assets/water/wcontact_import_form_excel.xlsx" download>
													<span id="saveClose" class="btn btn-icon btn-success glyphicons download" >
														<i></i> 
														<span data-bind="text: lang.lang.download_file_example">Download file example</span>
													</span>
												</a>
												<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
												  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onSelected}" id="myFile"  class="margin-none" />
												</div>
												<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 120px!important; margin-bottom: 0;"><i></i>
													<span data-bind="click: save, text: lang.lang.imports">Import Contact</span>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div id="ntf1" data-role="notification"></div>
								<!-- // Tabs END -->
							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<!-- ***************************
*	Menu Section         	  *
**************************** -->
<script id="customer-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="<?php echo base_url();?>rrd\#/customer">+ Add New Customer</a></li>
    </strong>
</script>
<script id="waterMenu" type="text/x-kendo-template">
	<ul class="topnav pull-left">
	  	<li><a href='#/center'><span data-bind="text: lang.lang.center"></span></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/customer'><span >Add New Customer</span></a></li>
  				<li><a href='#/property'><span >Add New Property</span></a></li> 
  				<li ><a href='#/reorder'><span >Reading Route Management</span></a></li>
  				<li ><a href='#/head_meter'><span >Head Meter Reading</span></a></li>
  				<li><span class="li-line"></span></li>
  				<li><a href='#/reading'><span >1. Meter Reading</span></a></li> 
  				<li><a href='#/run_bill'><span >2. Run Bill</span></a></li> 
  				<li><a href='#/print_bill'><span >3. Print Bill</span></a></li>
  				<li><a href='#/receipt'><span >4. Cash Receipt</span></a></li>
  				<li><span class="li-line"></span></li>
  				<li><a href='#/offline'><span >Offline</span></a></li>
  			</ul>
	  	</li>
	  	<li><a href="#/reports" style="color: #fff">REPORTS</a></li>
	  	<li style="width: 47px"><a style="width: 47px;" href='#/setting' class='glyphicons settings'><i class="text-t"></i></a></li>
	</ul>
</script>

<!-- ***************************
* widget templates
**************************** -->
<script id="contact-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer">+ Add New Customer</a></li>
    </strong>
</script>
<script id="contact-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=abbr##=number#</span>	
	<span>#=name#</span>	
</script>

<script id="cashReAuto" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden;">
			<div class="container-960">
				<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
					<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
				</div>			
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>	
					</div>
			        <h2 style="padding:0 15px;">Import</h2>
					<br />
					<div class="relativeWrap" data-toggle="source-code">
						<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
							<div class="widget-head">
								<ul style="padding-left: 1px;">
									<li class="active"><a class="glyphicons group" href="#tabMeter" data-toggle="tab"><i></i><span style="line-height: 55px;">Meter</span></a></li>
									<li><a class="glyphicons group" href="#tabContact" data-toggle="tab"><i></i><span style="line-height: 55px;">Customer Number</span></a></li>
								</ul>
							</div>
							<div class="widget-body">
								<div class="tab-content">
									<div id="tabMeter" style="border: 1px solid #ccc" class="tab-pane active widget-body-regular">
										<h4 class="separator bottom" style="margin-top: 10px;">Recieve By Meter ID</h4>
										<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
										  	<input type="file"  
										  		data-role="upload" 
										  		data-show-file-list="true" 
										  		data-bind="events: {select: onSelected}" 
										  		id="myFile"  class="margin-none" />
										</div>
										<span class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 160px!important;"><i></i>
										<span data-bind="click: save">Start Import</span></span>
									</div>
									<div id="tabContact" style="border: 1px solid #ccc" class="tab-pane widget-body-regular">
										<h4 class="separator bottom" style="margin-top: 10px;">Recieve By Customer Number</h4>
										<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
										  	<input type="file"
										  		data-role="upload"
										  		data-show-file-list="true"
										  		data-bind="events: {select: onCusSelected}" 
										  		id="myFile"  class="margin-none" />
										</div>
										<span class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 160px!important;"><i></i>
										<span data-bind="click: saveCus">Start Import</span></span>
									</div>
								</div>
							</div>
							<div id="ntf1" data-role="notification"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>

<!--Customer Center-->
<script id="customerCenter" type="text/x-kendo-template">
	<div class="widget widget-heading-simple widget-body-gray widget-employees">		
		<div class="widget-body padding-none">			
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" >
					<div class="innerAll" style="padding-bottom:4px;">							
						<form autocomplete="off" class="form-inline">
							
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" placeholder="Number or Name..." data-bind="value: searchText" style="height: 34px;">
								</div>
							</div>						
							<div class="select2-container" style="width: 100%;  margin-bottom: 10px;">
								<input data-role="dropdownlist"
					                   data-option-label="Select Type..."
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: contact_type_id,
					                              source: contactTypeDS"
					                   style="width: 100%;" />							
							</div>
						</form>					
					</div>
					
					<span class="results"><span data-bind="text: contactDS.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>

					<div class="table table-condensed" style="height: 580px;"						 
						 data-role="grid"
						 data-bind="source: contactDS"
						 data-row-template="customerCenter-customer-list-tmpl"
						 data-columns="[{title: ''}]"
						 data-selectable=true
						 data-height="600"						 
						 data-scrollable="{virtual: true}"></div>									
				</div>
				<div class="span9 detailsWrapper">
					<div class="row-fluid">					
						<div class="span6">
							<div class="widget widget-4 widget-tabs-icons-only margin-bottom-none">

							    <!-- Widget Heading -->
							    <div class="widget-head">
							    	<input type="text" name="" data-bind="value: obj.name" disabled="disabled" style="border: none; width: 65%; font-size: 20px; font-weight: 600; margin-top: 8px; margin-left: -8px; background: #fff;">
							        <!-- Tabs -->
							        <ul class="pull-right">

							            <li class="glyphicons text_bigger active"><span data-toggle="tab" data-target="#tab1-4"><i></i></span>
							            </li>							            							            
							            <li class="glyphicons circle_info"><span data-toggle="tab" data-target="#tab2-4"><i></i></span>
							            </li>							            
							            <li class="glyphicons pen"><span data-toggle="tab" data-target="#tab3-4"><i></i></span>
							            </li>
							            <li class="glyphicons paperclip"><span data-toggle="tab" data-target="#tab4-4"><i></i></span>
							            </li>							            							            
							        </ul>
							        <div class="clearfix"></div>
							        <!-- // Tabs END -->

							    </div>
							    <!-- Widget Heading END -->

							    <div class="widget-body">
							        <div class="tab-content">

							            <!-- Transactions Tab content -->
							            <div id="tab1-4" class="tab-pane active box-generic">
							            	<table class="table table-borderless table-condensed cart_total cash-table" style="margin-bottom: 0;">
								            	<tr>
								            		<td width="50%">
								            			<span class="btn btn-block btn-inverse" data-bind="click: goQuote"><span><span data-bind="text: lang.lang.quote"></span></span>
								            		</td>
								            		<!-- <td width="50%">
								            			<span class="btn btn-block btn-primary" data-bind="click: goDeposit"><span><span data-bind="text: lang.lang.c_deposit"></span></span>								            			
								            		</td> -->
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goSaleOrder"><span><span data-bind="text: lang.lang.sale_order"></span></span>
								            		</td>
								            	</tr>
								            	<tr>
								            		
								            		<td>
								            			<span class="btn btn-block btn-primary" data-bind="click: goCashSale"><span><span data-bind="text: lang.lang.cash_sale"></span></span>								            											            			
								            		</td>
								            		<td>
								            			<span class="btn btn-block btn-primary" data-bind="click: goInvoice"><span data-bind="text: lang.lang.invoice"></span></span>								            											            			
								            		</td>
								            	</tr>
								            	<tr>
								            		<!-- <td>
								            			<span class="btn btn-block btn-primary" data-bind="click: goSaleReturn"><span data-bind="text: lang.lang.sale_return1"></span></span>
								            		</td> -->
								            		<td class="center">
								            			<span class="btn btn-block btn-primary" data-bind="click: goCashReceipt"><span data-bind="text: lang.lang.cash_receipt"></span></span>								            			

								            		</td>
								            		<td></td>
								            	</tr>
								            	<!-- <tr>
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goGDN"><span data-bind="text:lang.lang.c_gdn"></span></span>
								            		</td>
								            		
								            	</tr>
								            	<tr>
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goStatement"><span data-bind="text: lang.lang.statement"></span></span>
								            		</td>
								            		<td>
								            			<span class="btn btn-block btn-primary" data-bind="click: goCashRefound"><span >CASH REFUND</span></span>
								            		</td>
								            	</tr> -->
							            	</table>
							            </div>
							            <!-- // Transactions Tab content END -->							           					            

							            <!-- INFO Tab content -->
							            <div id="tab2-4" class="tab-pane box-generic">
							            	<div class="row-fluid">
							            		<div class="accounCetner-textedit">
									            	<table width="100%">
														<tr>
															<td width="40%"><span data-bind="text: lang.lang.customer_type"></span></td>
															<td width="60%">
																<span class="strong" data-bind="text: obj.contact_type"></span>
															</td>
														</tr>
														<tr>
															<td><span data-bind="text: lang.lang.number"></span></td>
															<td>
																<span class="strong" data-bind="text: obj.abbr"></span>
																<span class="strong" data-bind="text: obj.number"></span>
															</td>
														</tr>
														<tr>
															<td><span data-bind="text: lang.lang.name"></span></td>
															<td>
																<span data-bind="text: obj.name"></span>
															</td>
														</tr>
														<tr>
															<td><span data-bind="text: lang.lang.billed_address"></span></td>
															<td>
																<span data-bind="text: obj.address"></span>
															</td>
														</tr>								
														<tr>
															<td><span data-bind="text: lang.lang.phone"></span></td>
															<td>
																<span data-bind="text: obj.phone"></span>
															</td>
														</tr>
														<tr>
															<td><span data-bind="text: lang.lang.currency"></span></td>
															<td>										
																<span data-bind="text: currencyCode"></span>
															</td>
														</tr>
													</table>

													<span class="btn btn-primary btn-icon glyphicons edit pull-right" data-bind="click: goEdit"><i></i><span data-bind="text: lang.lang.view_edit_profile"></span></span>
												</div>
											</div>
							            </div>
							            <!-- // INFO Tab content END -->

							            <!-- NOTE Tab content -->
							            <div id="tab3-4" class="tab-pane">

										    <div>
												<input type="text" class="k-textbox" 
														data-bind="value: note" 
														placeholder="Add memo ..." 
														style="width: 366px;" />
												<span class="btn btn-primary" data-bind="click: saveNote"><span data-bind="text: lang.lang.add"></span></span>
											</div>

											<br>

											<div class="table table-condensed" style="height: 100;"						 
												 data-role="grid"
												 data-auto-bind="false"						 
												 data-bind="source: noteDS"
												 data-row-template="customerCenter-note-tmpl"
												 data-columns="[{title: ''}]"
												 data-height="100"						 
												 data-scrollable="{virtual: true}"></div>
											
							            </div>
							            <!-- // NOTE Tab content END -->

							            <!-- Attach Tab content -->
								        <div id="tab4-4" class="tab-pane" >							            	
								            <p><span data-bind="text: lang.lang.file_type"></span> [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>
								            <input id="files" name="files"
							                   type="file"
							                   data-role="upload"
							                   data-show-file-list="false"
							                   data-bind="events: { 
					                   				select: onSelect
							                   }">

								            <table class="table table-bordered">
										        <thead>
										            <tr>			                
										                <th><span data-bind="text: lang.lang.file_name"></span></th>
										                <th><span data-bind="text: lang.lang.description"></span></th>
										                <th><span data-bind="text: lang.lang.date"></span></th>
										                <th style="width: 13%;"></th>                			                
										            </tr> 
										        </thead>
										        <tbody data-role="listview" 
										        		data-template="attachment-list-tmpl" 
										        		data-auto-bind="false"
										        		data-bind="source: attachmentDS"></tbody>			        
										    </table>

										    <div id="pager" class="k-pager-wrap"
										    	 data-role="pager"
										    	 data-auto-bind="false"
									             data-bind="source: attachmentDS"></div>

										    <span class="btn btn-icon btn-success glyphicons ok_2" data-bind="click: uploadFile" style="color: #fff; padding: 5px 38px; text-align: left; width: 98px !important; display: inline-block; margin-top: 10px;"><i></i> <span data-bind="text: lang.lang.save"></span></span>

								        </div>
								        <!-- // Attach Tab content END -->							            								            

							        </div>
							    </div>
							</div>
						</div>

						<div class="span6" style="margin-bottom: 10px; float: right; width: 49%;">
							<div class="row-fluid">
								<div class="span6">
									<div class="widget-stats widget-stats-primary widget-stats-5" data-bind="click: loadBalance" style="cursor: pointer; background: #0077c5">
										<span class="glyphicons coins"><i></i></span>
										<span class="txt" style="padding-right: 18px;"><span data-bind="text: lang.lang.balance"></span><span data-bind="text: balance" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6">
									<div class="widget-stats widget-stats-inverse widget-stats-5" data-bind="click: loadDeposit" style="cursor: pointer; ">
										<span class="glyphicons briefcase"><i></i></span>
										<span class="txt"><span data-bind="text: lang.lang.sale"></span><span data-bind="text: sale" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>							
							
							<div class="row-fluid">
								<div class="span6">
									<div class="widget-stats widget-stats-info widget-stats-5" data-bind="click: loadBalance" style="cursor: pointer; background: #21abf6;">
										<span class="glyphicons circle_exclamation_mark"><i></i></span>
										<span class="txt"><span data-bind="text: outInvoice"></span> <span data-bind="text: lang.lang.open_invoice"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6">
									<div class="widget-stats widget-stats-default widget-stats-5" data-bind="click: loadOverInvoice" style="cursor: pointer;"> 
										<span class="glyphicons turtle"><i></i></span>
										<span class="txt"><span data-bind="text: overInvoice"></span> <span data-bind="text: lang.lang.over_due"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>														
						</div>
					</div>
					
					<div>
						<input data-role="dropdownlist"
							   class="sorter"                  
					           data-value-primitive="true"
					           data-text-field="text"
					           data-value-field="value"
					           data-bind="value: sorter,
					                      source: sortList,                              
					                      events: { change: sorterChanges }" style="width: 17%;" />

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
</script>
<script id="customerCenter-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>    	  	
    	<td>#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
    	<td>#=type#</td>
        <!-- Reference -->
        <td>
        	#if(type=="Customer_Deposit" && amount<0){#			
				<a data-bind="click: goReference">#=number#</a>			
			#}else{#
				<a href="\#/#=type.toLowerCase()#/#=id#"><i></i> #=number#</a>
			#}#        	
        </td>
        <!-- Amount -->
    	<td class="right">
    		#if(type=="GDN"){#
    			#=kendo.toString(amount, "n0")#
    		#}else if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice" || type=="Commercial_Cash_Sale" || type=="Vat_Cash_Sale" || type=="Cash_Sale"){#
    			#=kendo.toString(amount-deposit, locale=="km-KH"?"c0":"c", locale)#
    		#}else{#
    			#=kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#
    		#}#
    	</td>
    	<!-- Status -->
    	<td align="center">
    		#if(status=="4") {#
    			#=progress#
    		#}#

    		#if(type=="Quote"){#       		
				#if(status=="0"){#
        			Open      			
        		#}#
        	#}else if(type=="Sale_Order"){#
        		#if(status=="0"){#
        			Open
        		#}else{#
        			Done        			
        		#}#
        	#}else if(type=="GDN"){#
        		Delivered
        	#}else if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice"){#
        		#if(status=="0" || status=="2") {#
        			# var date = new Date(), dueDate = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
					#if(dueDate < toDay) {#
						Over Due #:Math.floor((toDay - dueDate)/(1000*60*60*24))# days
					#} else {#
						#:Math.floor((dueDate - toDay)/(1000*60*60*24))# days to pay
					#}#
				#} else if(status=="1") {#
					Paid
				#} else if(status=="3") {#
					Returned
				#}#        	
        	#}#        				
		</td>
		<!-- Actions -->
    	<td align="center">
			#if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice"){#
				#if(status=="0" || status=="2") {#
        			<a data-bind="click: payInvoice"><i></i> <span data-bind="text: lang.lang.receive_payment"></span></a>
        		#}#
        	#}#

        	#if(status=="4") {#
				<a href="\#/#=type.toLowerCase()#/#=id#"><i></i> Use</a>
    		#}#
		</td>     	
    </tr>
</script>
<script id="customerCenter-customer-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td>
			<div class="media-body strong">				
				<span>#=abbr##=number#</span>
				<span>#=name#</span>
			</div>
		</td>
	</tr>
</script>
<script id="customerCenter-note-tmpl" type="text/x-kendo-template">
	<tr>
		<td>			
			<blockquote>
				<small class="author">
					<span class="strong">#=creator#</span> :
					<cite>#=kendo.toString(new Date(noted_date), "g")#</cite>
				</small>					
				<p>#=note#</p>
			</blockquote>				
		</td>
	</tr>	
</script>
<script id="customer" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
			    
			    	<span class="glyphicons no-js remove_2 pull-right" 
	    				onclick="javascript:window.history.back()"
						data-bind="click: cancel"><i></i></span>						
					
			        <h2 span data-bind="text: lang.lang.customers"></h2>			    		   

				    <br>

				    <!-- Top Part -->
			    	<div class="row-fluid">
			    		<div class="span6 well">									
							<div class="row">
								<div class="span6">														
									<!-- Group -->
									<div class="control-group">										
										<label for="ddlContactType"><span data-bind="text: lang.lang.customer_type"></span> <span style="color:red">*</span></label>
										<input id="ddlContactType" name="ddlContactType"
												   data-role="dropdownlist"
												   data-header-template="customer-type-header-tmpl"       
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.contact_type_id,
								                   			  disabled: obj.is_pattern,
								                              source: contactTypeDS,
								                              events:{change: typeChanges}"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />																				            
									</div>
									<!-- // Group END -->
								</div>

								<div class="span6" style="padding-right: 0;">	
									<!-- Group -->
									<div class="control-group">							
										<label for="txtAbbr"><span data-bind="text: lang.lang.number"></span> <span style="color:red">*</span></label>										
				              			<br>
				              			<input id="txtAbbr" name="txtAbbr" class="k-textbox"
					              				data-bind="value: obj.abbr, 
					              						   disabled: obj.is_pattern" 
					              				placeholder="eg. AB" required data-required-msg="required"
					              				style="width: 55px;" />
					              		-					              		
					              		<input id="txtNumber" name="txtNumber"
					              			   class="k-textbox"					              			   					                   
							                   data-bind="value: obj.number, 
							                   			  disabled: obj.is_pattern,
							                   			  events:{change:checkExistingNumber}"
							                   placeholder="eg. 001" required data-required-msg="required"
							                   style="width: 143px;" />
									</div>
									<!-- // Group END -->											
								</div>
							</div>
							
							<div class="row">
								<div class="span12">	
									<!-- Group -->
									<div class="control-group">								
										<label for="fullname"><span data-bind="text: lang.lang.full_name"></span> <span style="color:red">*</span></label>
							            <input id="fullname" name="fullname" class="k-textbox" 
							            		data-bind="value: obj.name, 
							            					disabled: obj.is_pattern,
							            					attr: { placeholder: phFullname }" 
							              		required data-required-msg="required"
							              		style="width: 100%;" />
									</div>																		
									<!-- // Group END -->
								</div>
							</div>

							<div class="row">
								<div class="span6">	
									<!-- Group -->
									<div class="control-group">								
										<label for="customerStatus"><span data-bind="text: lang.lang.status"></span> <span style="color:red">*</span></label>
							            <input id="customerStatus" name="customerStatus" 
							              				data-role="dropdownlist"
									            		data-text-field="name"
						           						data-value-field="id"
						           						data-value-primitive="true" 
									            		data-bind="source: statusList, value: obj.status"
									            		data-option-label="(--- Select ---)"
									            		required data-required-msg="required" style="width: 100%;" />
									</div>																		
									<!-- // Group END -->
								</div>

								<div class="span6">	
									<!-- Group -->
									<div class="control-group">								
										<label for="registeredDate"><span data-bind="text: lang.lang.register_date"></span> <span style="color:red">*</span></label>
							            <input id="registeredDate" name="registeredDate" 
								            		data-role="datepicker"			            		
					            					data-bind="value: obj.registered_date, disabled: obj.is_pattern" 
					            					data-format="dd-MM-yyyy"
					            					data-parse-formats="yyyy-MM-dd" 
					            					placeholder="dd-MM-yyyy" required data-required-msg="required" style="width: 100%;" />
									</div>																		
									<!-- // Group END -->
								</div>
							</div>																					
						</div>
						<div class="span6">
							<div class="row-fluid">	
								<!-- Map -->
								<div id="map" class="span12" style="height: 130px;"></div>
							</div>

							<div class="separator line bottom"></div>

							<div class="row-fluid">	
								<div class="span6">									
									<!-- Group -->
									<div class="control-group">
						    			<label for="latitute"><span data-bind="text: lang.lang.latitute"></span> </label>
										<div class="input-prepend">
											<span class="add-on glyphicons direction"><i></i></span>
											<input type="text" class="input-large span12" data-bind="value: obj.latitute, events:{change: loadMap}" placeholder="012345.67897">
										</div>
									</div>									
									<!-- // Group END -->
								</div>	
								
								<div class="span6">	
									<!-- Group -->
									<div class="control-group">
						    			<label for="longtitute"><span data-bind="text: lang.lang.longtitute"></span> </label>
						    			<div class="input-prepend">
											<span class="add-on glyphicons google_maps"><i></i></span>
											<input type="text" class="input-large span12" data-bind="value: obj.longtitute, events:{change: loadMap}" placeholder="012345.67897">
										</div>										
									</div>
									<!-- // Group END -->
								</div>										
							</div>
						</div>
					</div>								
							
					<!-- // Bottom Tabs -->
					<div class="row-fluid">								
						<div class="box-generic">
						    <!-- //Tabs Heading -->
						    <div class="tabsbar tabsbar-1">
						        <ul class="row-fluid row-merge">						            
						            <li class="span2 glyphicons nameplate_alt active">
						            	<a href="#tab1" data-toggle="tab"><i></i> <span><span data-bind="text: lang.lang.info"></span></span></a>
						            </li>								            
						            <li class="span2 glyphicons usd">
						            	<a href="#tab2" data-toggle="tab"><i></i> <span><span data-bind="text: lang.lang.account"></span></span></a>
						            </li>
						            <li class="span2 glyphicons parents">
						            	<a href="#tab3" data-toggle="tab"><i></i> <span><span ></span>Contact</span></a>
						            </li>
						            <li class="span2 glyphicons notes">
						            	<a href="#tab4" data-toggle="tab"><i></i> <span>Invoice Note</span></a>
						            </li>						            					            
						        </ul>
						    </div>
						    <!-- // Tabs Heading END -->

						    <div class="tab-content">

						    	<!-- //GENERAL INFO -->
						        <div class="tab-pane active" id="tab1">
					            	<table class="table table-borderless table-condensed cart_total">					            		
							            <tr>
							                <td><span data-bind="text: lang.lang.vat_no"></span></td>
							              	<td>
					            				<input class="k-textbox" data-bind="value: obj.vat_no" 
													placeholder="e.g. 01234567897" style="width: 100%;" />									
							              	</td>							              	
							            	<td><span data-bind="text: lang.lang.phone"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.phone" placeholder="e.g. 012 333 444" style="width: 100%;" /></td>
							            </tr>
							            <tr>
							            	<td><span data-bind="text: lang.lang.country"></span></td>
							              	<td>
							              		<input data-role="dropdownlist"
							              			   data-option-label="(--- Select ---)"
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: obj.country_id,
									                              source: countryDS" style="width: 100%;" />
							              	</td>							            								              	
							            	<td><span data-bind="text: lang.lang.email"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.email" placeholder="e.g. me@email.com" style="width: 100%;" />							            	
							            </tr>
							            <tr>
							            	<td><span data-bind="text: lang.lang.city"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.city" placeholder="city name ..." style="width: 100%;" /></td>							              	
							            	<td><span data-bind="text: lang.lang.post_code"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.post_code" placeholder="e.g. 12345" style="width: 100%;" /></td>
							            </tr>							            
							            <tr style="vertical-align: top;">
							            	<td><span data-bind="text: lang.lang.address"></span></td>
							              	<td><textarea class="k-textbox" data-bind="value: obj.address" placeholder="where you live ..." style="width: 100%;" /></textarea></td>									            								              	
							            	<td><span data-bind="text: lang.lang.memo"></span></td>
							              	<td><textarea rows="2" class="k-textbox" data-bind="value: obj.memo" placeholder="memo ..." style="width: 100%;" ></textarea></td>							              	
							            </tr>									            
							            <tr  style="vertical-align: top;">
							            	<td>
							            		<span for="txtBillTo" data-bind="click: copyBillTo"><span data-bind="text: lang.lang.bill_to"></span> </span>											            
							            	</td>
							            	<td>
							            		<textarea rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="billed to ..."></textarea>
							            	</td>
							            	<td><span data-bind="text: lang.lang.delivered_to"></span></td>
							            	<td>
							            		<textarea rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="delivered to ..."></textarea>
							            	</td>
							            </tr>							            							            							            								            								            			            
							        </table>
					        	</div>
						        <!-- //GENERAL INFO END -->

						        <!-- //ACCOUNTING -->
						        <div class="tab-pane" id="tab2">
						        	
						        	<div class="row-fluid">								        		
						            	<div class="span3">
											<label for="ddlAR"><span data-bind="text: lang.lang.account_receiveable"></span> <span style="color:red">*</span></label>
											<input id="ddlAR" name="ddlAR"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl"      
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.account_id,
								                              source: arDS"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />													
										</div>
										<div class="span3">
											<label for="ddlRA"><span data-bind="text: lang.lang.revenue_account"></span> <span style="color:red">*</span></label>
											<input id="ddlRA" name="ddlRA"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl" 
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.ra_id,
								                              source: raDS"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />													
										</div>
										<div class="span3">
											<label for="ddlDepositAccount"><span data-bind="text: lang.lang.deposit_account"></span> <span style="color:red">*</span></label>
											<input id="ddlDepositAccount" name="ddlDepositAccount"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl"      
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.deposit_account_id,
								                              source: depositDS"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />													
										</div>
										<div class="span3">
											<label for="ddlTradeDiscount"><span data-bind="text: lang.lang.trade_discount"></span> <span style="color:red">*</span></label>
											<input id="ddlTradeDiscount" name="ddlTradeDiscount"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl"      
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.trade_discount_id,
								                              source: tradeDiscountDS"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />														
										</div>												
							        </div>

							        <div class="separator line bottom"></div>

							        <div class="row-fluid">
						        		<div class="span3">						
								            <label for="currency"><span data-bind="text: lang.lang.currency"></span> <span style="color:red">*</span></label>
								            <input id="currency" name="currency" 
								            	data-role="dropdownlist"
								            	data-template="currency-list-tmpl"
								            	data-value-primitive="true"
								                data-text-field="code"
								                data-value-field="locale"
												data-bind="value: obj.locale,
															disabled: isProtected, 
															source: currencyDS"
												data-option-label="(--- Select ---)" 
												required data-required-msg="required" style="width: 100%;" />
								        </div>
						            	<div class="span3">
											<label for="ddlPaymentTerm"><span data-bind="text: lang.lang.payment_term"></span></label>
											<input id="ddlPaymentTerm" name="ddlPaymentTerm"
												data-header-template="customer-term-header-tmpl"
												data-role="dropdownlist"
								            	data-value-primitive="true"
								                data-text-field="name"
								                data-value-field="id"
												data-bind="value: obj.payment_term_id, source: paymentTermDS" 
												data-option-label="(--- Select ---)"
												style="width: 100%;" />
										</div>
										<div class="span3">
											<label for="ddlPaymentMethod"><span data-bind="text: lang.lang.payment_method"></span></label>
											<input id="ddlPaymentMethod" name="ddlPaymentMethod"
												data-header-template="customer-payment-method-header-tmpl"
												data-role="dropdownlist"
								            	data-value-primitive="true"
								                data-text-field="name"
								                data-value-field="id"
												data-bind="value: obj.payment_method_id, source: paymentMethodDS"
												data-option-label="(--- Select ---)" 
												style="width: 100%;" />
										</div>
										<div class="span3">
											<label for="ddlSettlementDiscount"><span data-bind="text: lang.lang.settlement_discount"></span> <span style="color:red">*</span></label>
											<input id="ddlSettlementDiscount" name="ddlSettlementDiscount"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl"      
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.settlement_discount_id,
								                              source: settlementDiscountDS"
								                   data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;" />														
										</div>												
							        </div>

							        <div class="separator line bottom"></div>

							        <div class="row-fluid">
							        	<div class="span3">
											<label for="ddlTaxItem"><span data-bind="text: lang.lang.tax"></span></label>
											<input id="ddlTaxItem" name="ddlTaxItem"
												   data-role="dropdownlist"								
												   data-header-template="tax-header-tmpl"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.tax_item_id,
								                              source: taxItemDS"
								                   data-option-label="(--- Select ---)"
								                   style="width: 100%;" />
										</div>	
								        <div class="span3">
											<label for="txtCreditLimit"><span data-bind="text: lang.lang.credit_limit"></span> </label>								              		
								            <input data-role="numerictextbox"
								                   data-format="n"
								                   data-min="0"										                   
								                   data-bind="value: obj.credit_limit"										                  
								                   style="width: 100%;">
										</div>																							
									</div>
					        	</div>
						        <!-- //ACCOUNTING END -->						       

						        <!-- //CONTACT PERSON -->
						        <div class="tab-pane" id="tab3">
						        	<span style="margin-bottom: 15px;" class="btn btn-primary btn-icon glyphicons circle_plus" data-bind="click: addEmptyContactPerson"><i></i><span data-bind="text: lang.lang.new_contact_person"></span></span>

						        	<table class="table table-bordered table-white">
								        <thead>
								            <tr>
								                <th><span data-bind="text: lang.lang.name"></span></th>
								                <th><span data-bind="text: lang.lang.department"></span></th>						                
								                <th><span data-bind="text: lang.lang.phone"></span></th>
								                <th><span data-bind="text: lang.lang.email"></span></th>
								                <th width="20px"></th>										               
								            </tr>
								        </thead>
								        <tbody data-role="listview"										        		
								        		data-auto-bind="false"										        						        		 
								        		data-template="contact-person-row-tmpl" 
								        		data-bind="source: contactPersonDS">
								        </tbody>										        						        
								    </table>
					        	</div>
						        <!-- //CONTACT PERSON END -->

						        <!-- //INVOICE NOTE -->
						        <div class="tab-pane" id="tab4">
						        	<textarea data-role="editor"
					                      data-tools="['bold',
					                                   'italic',
					                                   'underline',
					                                   'strikethrough',
					                                   'justifyLeft',
					                                   'justifyCenter',
					                                   'justifyRight',
					                                   'justifyFull']"
					                      data-bind="value: obj.invoice_note"
					                      style="height: 200px;"></textarea>
					        	</div>
						        <!-- //INVOICE NOTE END -->

						    </div>
						</div>
					</div>

					<br>											
					
					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>

						<!-- Delete Confirmation -->
						<div data-role="window"
			                 data-title="Delete Confirmation"
			                 data-width="350"
			                 data-height="200"
			                 data-iframe="true"
			                 data-modal="true"
			                 data-visible="false"
			                 data-position="{top:'40%',left:'35%'}"
			                 data-actions="{}"
			                 data-resizable="false"
			                 data-bind="visible: showConfirm"
			                 style="text-align:center;">
			                <p style="font-size:25px; margin: 15px 0 25px;" class="delete-message" data-bind="text: confirmMessage"></p>
						    <button style="font-size:14px; border:none; background:#496cad; color:#fff; padding:5px 25px;" data-bind="click:delete">Yes</button> 
						    <button style="font-size:14px; border:none; background:red; color:#fff; padding:5px 25px;" data-bind="click:closeConfirm">No</button>
			            </div>
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span4" style="padding-left: 15px;"><a style="color: #fff; float: left;">Print Preview</a></div>
							<div class="span8" align="right">
								<span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
								<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
								<span role='presentation' class='dropdown btn-btn' style="padding: 0 0 0 15px; float: right; height: 32px; line-height: 30px;">
							  		<a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
							  			<span data-bind="text: lang.lang.save_option"></span>
							  			<span class="small-btn"><i class='caret '></i></span>
							  		</a>
							  		<ul class='dropdown-menu'>
						  				<li id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></li>
						  				<!-- <li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li> -->
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft"><span data-bind="text: lang.lang.save_draft"></span></span>
								<!-- <span class="btn-btn" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></span>
								<span class="btn-btn"><span data-bind="text: lang.lang.save_close"></span></span>
								<span class="btn-btn"><span data-bind="text: lang.lang.save_print"></span></span> -->
							</div>
						</div>
					</div>
					<!-- // Form actions END -->

				</div>
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
<!--calendar-->
<script id="calendar" type="text/x-kendo-tmpl">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
			    
			    	<span class="glyphicons no-js remove_2 pull-right" 
	    				onclick="javascript:window.history.back()"
						data-bind="click: cancel"><i></i></span>						
					
			        <h2>Calendar</h2>			    		   

				    <br>

				    <!-- Top Part -->
			    	<div class="row-fluid">
			    		<div id="scheduler"></div>
					</div>

				</div>
			</div>
		</div>
	</div>
</script>

<!--Emmployee-->
<script id="employeeCenter" type="text/x-kendo-template">
	<div class="widget widget-heading-simple widget-body-gray widget-employees">		
		<div class="widget-body padding-none">			
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" >
					<div class="innerAll" style="padding-bottom: 4px;">							
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input style="height: 34px;" type="search" placeholder="Employee ..." data-bind="value: searchText, events:{change: enterSearch}">
								</div>
							</div>
							<div class="select2-container" style="width: 100%;">								
																
							</div>
						</form>					
					</div>
					
					<span class="results"><span data-bind="text: contactDS.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>

					<div class="table table-condensed" style="height: 580px;"						 
						 data-role="grid" 
						 data-bind="source: contactDS"
						 data-auto-bind="false" 
						 data-row-template="employeeCenter-customer-list-tmpl"
						 data-columns="[{title: ''}]"
						 data-selectable=true
						 data-height="600"						 
						 data-scrollable="{virtual: true}"></div>									
				</div>
				<div class="span9 detailsWrapper">
					<div class="row-fluid">					
						<div class="span6">
							<div class="widget widget-4 widget-tabs-icons-only margin-bottom-none">

							    <!-- Widget Heading -->
							    <div class="widget-head">

							        <!-- Tabs -->
							        <ul class="pull-right">
							        	<li style="font-size: large; color: black; font-weight: bold;">
							            	<span data-bind="text: obj.number"></span>
							            	
							            	<span data-bind="text: obj.fullname"></span>
							            </li>
							            <li class="glyphicons text_bigger active"><span data-toggle="tab" data-target="#tab1-7"><i></i></span>
							            </li>							           
							            <li class="glyphicons riflescope"><span data-toggle="tab" data-target="#tab2-7"><i></i></span>
							            </li>							            
							            <li class="glyphicons circle_info"><span data-toggle="tab" data-target="#tab3-7"><i></i></span>
							            </li>							            
							            <li class="glyphicons pen"><span data-toggle="tab" data-target="#tab4-7"><i></i></span>
							            </li>
							            <li class="glyphicons edit"><span data-bind="click: goEditContact"><i></i></span>
							            </li>							            							            							            
							        </ul>
							        <div class="clearfix"></div>
							        <!-- // Tabs END -->

							    </div>
							    <!-- Widget Heading END -->

							    <div class="widget-body">
							        <div class="tab-content">

							            <!-- Transactions Tab content -->
							            <div id="tab1-7" class="tab-pane active box-generic">
							            	<table class="table table-borderless table-condensed cart_total">
								            	<tr>
								            		<td width="50%">
								            			<span class="btn btn-block btn-primary" data-bind="click: goCashadvance">Cash Advance</span>
								            		</td>
								            		<td width="50%">
								            			<span class="btn btn-block btn-primary" data-bind="click: goExpense">Expense</span>								            			
								            		</td>								            	
							            	</table>
							            </div>
							            <!-- // Transactions Tab content END -->

							            <!-- SEARCH Tab content -->
							            <div id="tab2-7" class="tab-pane box-generic">
							                <input data-role="dropdownlist"
							                	   data-auto-bind="false"
						            			   data-option-label="Select Customer Type..."					            			   		                   
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: contact_type_id,
								                              source: contactTypeDS"
								                   style="width: 100%"/>

							                <input data-role="dropdownlist"
						            			   data-option-label="Select Currency..."
						            			   data-template="currency-list-tmpl"					            			   		                   
								                   data-value-primitive="true"
								                   data-text-field="code"
								                   data-value-field="id"
								                   data-bind="value: currency_id,
								                              source: currencyDS"
								                   style="width: 100%"/>

								            <br><br>
								            <span class="btn btn-primary btn-icon glyphicons search pull-right" data-bind="click: search"><i></i> <span data-bind="text: lang.lang.search"></span></span>
								            <br>
							            </div>
							            <!-- // SEARCH Tab content END -->							            

							            <!-- INFO Tab content -->
							            <div id="tab3-7" class="tab-pane box-generic">
							            	<div class="row-fluid">
								            	<div class="span6">
										
													<!-- Bio -->
													<div class="widget widget-heading-simple widget-body-gray margin-none">
														<div class="widget-head">
															<h4 class="heading glyphicons user"><i></i> <span data-bind="text: obj.wnumber"></span> <span data-bind="text: obj.fullname"></span></h4>
														</div>
														<div class="widget-body">
															<ul class="unstyled icons margin-none">
																<li class="glyphicons group"><i></i> <span data-bind="text: obj.contact_type"></span></li>
																<li class="glyphicons phone"><i></i> <span data-bind="text: obj.phone"></span></li>
																<li class="glyphicons envelope"><i></i> <span data-bind="text: obj.email"></li>
																<li class="glyphicons calendar"><i></i> <span data-bind="text: obj.registered_date"></li>
															</ul>
														</div>
													</div>
													<!-- // Bio END -->
													
												</div>
												<div class="span6">
													<!-- Bio -->
													<div class="widget widget-heading-simple widget-body-gray margin-none">
														<div class="widget-head">
															<h4 class="heading glyphicons edit" data-bind="click: goEditContact"><i></i> <span data-bind="text: lang.lang.edit"></span></h4>
														</div>
														<div class="widget-body">
															<p><i class="icon-home"></i> <span data-bind="text: obj.address"></span></p>
														</div>
													</div>
													<!-- // Bio END -->
												</div>
											</div>
							            </div>
							            <!-- // INFO Tab content END -->

							            <!-- NOTE Tab content -->
							            <div id="tab4-7" class="tab-pane box-generic">

										    <div class="chat-controls">															
												<form class="margin-none">
													<div class="row-fluid">
														<div class="span10">
															<input type="text" name="message" class="input-block-level margin-none" data-bind="value: note" placeholder="កំណត់Memo ...">
														</div>
														<div class="span2">
															<span class="btn btn-block btn-primary" data-bind="click: saveNote"><span data-bind="text: lang.lang.save"></span></span>
														</div>
													</div>
												</form>															
											</div>

											<br>

									    	<div data-role="grid"
									    	 	 data-height="100"
					 							 data-scrollable="{virtual: true}"									                 
								                 data-row-template="customerCenter-note-tmpl"
								                 data-bind="source: noteDS"
								                 data-columns="[{title: ''}]"></div>
											
							            </div>
							            <!-- // NOTE Tab content END -->							            								            

							        </div>
							    </div>
							</div>
						</div>

						<div class="span6">
							<div class="row-fluid">
								<div class="span6">
									<div class="widget-stats widget-stats-primary widget-stats-5" data-bind="click: loadBalance">
										<span class="glyphicons coins"><i></i></span>
										<span class="txt">Total Advance<span data-bind="text: balance" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6">
									<div class="widget-stats widget-stats-inverse widget-stats-5" data-bind="click: loadDeposit">
										<span class="glyphicons briefcase"><i></i></span>
										<span class="txt">Sale<span data-bind="text: deposit" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>							
							
							<div class="row-fluid">
								<div class="span6">
									<div class="widget-stats widget-stats-info widget-stats-5" data-bind="click: loadBalance">
										<span class="glyphicons circle_exclamation_mark"><i></i></span>
										<span class="txt"><span data-bind="text: outInvoice"></span> Open</span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6">
									<div class="widget-stats widget-stats-default widget-stats-5" data-bind="click: loadOverInvoice">
										<span class="glyphicons turtle"><i></i></span>
										<span class="txt"><span data-bind="text: overInvoice"></span> Over Due</span>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>														
						</div>											          	
		          	</div>
					
					<div>
						<input id="sorter" name="sorter"
				    	   data-role="dropdownlist"                   
				           data-value-primitive="true"
				           data-text-field="text"
				           data-value-field="value"
				           data-bind="value: sorter,
				                      source: sortList" style="width: 17%" />
				                                   
				        <input id="sdate" name="sdate"						           
					           data-bind="value: sdate"
					           placeholder="From ..." />
				        
				       	<input id="edate" name="edate"						           
					           data-bind="value: edate"
					           placeholder="To ..." />

			            <button id="search" type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
					</div>

					<table class="table table-bordered table-striped table-white">
						<thead>
							<tr>
								<th>Date</th>
								<th>Type</th>								
								<th>Reference No</th>
								<th>Amount</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>	            		
	            		<tbody data-role="listview"
	            				data-auto-bind="false"	            					            					            					            			
				                data-template="customerCenter-transaction-tmpl"
				                data-bind="source: transactionDS" >
				        </tbody>
	            	</table>

	            	<div id="pager" class="k-pager-wrap"
				    	 data-auto-bind="false"
			             data-role="pager" data-bind="source: transactionDS"></div>	            	
				</div>
			</div>			
		</div>
	</div>		
</script>
<script id="employeeCenter-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>    	  	
    	<td>#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
    	<td>#=type#</td>
        <td>
        	#if(type=="Invoice" || type=="Cash_Sale" || type=="Quote" || type=="Sale_Order" || type=="GDN" || type=="Sale_Return"){#
				<a href="\#/#=type.toLowerCase()#/#=id#"><i></i> #=number#</a>						
			#}else{#
				#=number#
			#}#        	
        </td>
    	<td class="right">
    		#if(type=="GDN"){#
    			#=kendo.toString(amount, "n0")#
    		#}else{#
    			#=kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#
    		#}#
    	</td>
    	<td>        	
        	#if(type==="Invoice"){#
        		#if(status==="0" || status==="2") {#
        			# var date = new Date(), dueDate = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
					#if(dueDate < toDay) {#
						Over Due #:Math.floor((toDay - dueDate)/(1000*60*60*24))# days
					#} else {#
						#:Math.floor((dueDate - toDay)/(1000*60*60*24))# days to pay
					#}#
				#} else {#
					Paid
				#}#
        	#}else if(type==="Sale_Order" || type==="GDN"){#
        		#if(status==="0"){#
        			Open
        		#}else{#
        			Done        			
        		#}#
        	#}else if(type==="Quote"){#        		
        		#if(status==="0"){#
        			Open
        		#}else{#
        			Approved        			
        		#}#
        	#}#			
		</td>    	
    	<td align="center">
			#if(type==="Invoice"){#
				<a href="\#/invoice/#=id#"><i></i> Send</a>

				#if(status==="0" || status==="2"){#					
					| <a href="\#/cashier/#=id#"><i></i> Pay</a>
				#}#        	
			#}else if(type==="Sale_Order"){#
        		#if(status==="0"){#
        			
        		#}#
        	#}else if(type==="Quote"){#
        		<a href="\#/quote/#=id#"><i></i> Send</a>        		
        		#if(status==="0"){#
        			
        		#}#
        	#}else if(type==="GDN"){#        		
        		#if(status==="0"){#
        			
        		#}#
        	#}#
		</td>     	
    </tr>
</script>
<script id="employeeCenter-customer-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td>
			<div class="media-body">
				<span class="strong">
					#=number# #=fullname#				
				</span>
			</div>
		</td>
	</tr>
</script>
<script id="employeeCenter-note-tmpl" type="text/x-kendo-template">
	<tr>
		<td>			
			<blockquote>
				<small class="author">
					<span class="strong">#=creator#</span> :
					<cite>#=kendo.toString(new Date(noted_date), "g")#</cite>
				</small>					
				<p>#=note#</p>
			</blockquote>				
		</td>
	</tr>	
</script>
<script id="employee" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">				
				<div id="example" class="k-content">

					<span class="glyphicons no-js remove_2 pull-right" 
	    				onclick="javascript:window.history.back()"
						data-bind="click: cancel"><i></i></span>

			        <h2>Employee</h2>

			        <br>				

			    	<div class="row-fluid">
			    		<div class="span6 well">

							<div class="row-fluid">

								<div class="span6">														
									<!-- Group -->
									<div class="control-group">										
										<label for="ddlContactType">Employee Type<span style="color:red">*</span></label>
										<input id="ddlContactType" name="ddlContactType"
											   data-role="dropdownlist"
											   data-option-label="(--- Select ---)"									                   
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.contact_type_id,
							                   			  disabled: obj.is_pattern, 
							                              source: contactTypeDS,
							                              events:{change: contactTypeChanges}"
							                   required data-required-msg="required"
							                   style="width: 100%;" />									            
									</div>
									<!-- // Group END -->
								</div>

								<div class="span6">	
									<!-- Group -->
									<div class="control-group">							
										<label for="number"><span data-bind="text: lang.lang.number"></span> <span style="color:red">*</span></label>
				              			<input id="number" name="number" class="k-textbox"
					              				data-bind="value: obj.number, disabled: obj.is_pattern" 
					              				placeholder="e.g. ID0001" required data-required-msg="required"
					              				style="width: 100%;" />
					              		<span data-bind="visible: isDuplicateNumber" style="color: red;"><span data-bind="text: lang.lang.duplicate_number"></span></span>
									</div>
									<!-- // Group END -->											
								</div>
							</div>
							
							<div class="row-fluid">
								<div class="span6">						
									<!-- Group -->
									<div class="control-group">
										<label for="surname"><span data-bind="text: lang.lang.surname"></span> <span style="color:red">*</span></label>
					              		<input id="surname" name="surname" class="k-textbox" data-bind="value: obj.surname, disabled: obj.is_pattern" 
							              		placeholder="surname ..." required data-required-msg="required"
							              		style="width: 100%;" />
									</div>
									<!-- // Group END -->
								</div>

								<div class="span6">	
									<!-- Group -->
									<div class="control-group">								
										<label for="name"><span data-bind="text: lang.lang.name"></span> <span style="color:red">*</span></label>
							            <input id="name" name="name" class="k-textbox" data-bind="value: obj.name, disabled: obj.is_pattern" 
							              		placeholder="name ..." required data-required-msg="required"
							              		style="width: 100%;" />
									</div>																		
									<!-- // Group END -->
								</div>
							</div>
						</div>

						<div class="span6">
							<div class="row-fluid">	
								<!-- Map -->
								<div id="map" class="span12" style="height: 130px;"></div>
							</div>

							<div class="separator line bottom"></div>

						
						</div>
					</div>								
							
					<!-- // Inner Tabs -->
					<div class="row-fluid">								
						<div class="box-generic">
						    <!-- //Tabs Heading -->
						    <div class="tabsbar tabsbar-1">
						        <ul class="row-fluid row-merge">						            
						            <li class="span2 glyphicons usd active">
						            	<a href="#tab1" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.account"></span></a>
						            </li>								           							            
						            <li class="span2 glyphicons nameplate_alt">
						            	<a href="#tab2" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.info"></span></a>
						            </li>
						            <li class="span2 glyphicons paperclip">
						            	<a href="#tab3" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.info"></span></a>
						            </li>
						            									           						            					            
						        </ul>
						    </div>
						    <!-- // Tabs Heading END -->

						    <div class="tab-content">
						        <!-- //ACCOUNTING INFO -->
						        <div class="tab-pane active" id="tab1">
						        	
						        	<div class="row-fluid">

						            	<div class="span3">													
											<!-- Group -->
											<div class="control-group">										
												<label for="ddlAD">Advance Account<span style="color:red">*</span></label>
												<input id="ddlAD" name="ddlAD"
													   data-role="dropdownlist"
													   data-header-template="account-header-tmpl"
													   data-option-label="(--- Select ---)"											                   
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: obj.account_id,
									                              source: adDS"
									                   required data-required-msg="required"											                              
									                   style="width: 100%;" />									            
											</div>
											<!-- // Group END -->													
										</div>												
										<div class="span3">
											<!-- Group -->
											<div class="control-group">
												<label for="ddlSA">Salary Account<span style="color:red">*</span></label>
												<input id="ddlSA" name="ddlSA"
													   data-role="dropdownlist"
													   data-option-label="(--- Select ---)"											                   
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-header-template="account-header-tmpl"
									                   data-value-field="id"
									                   data-bind="value: obj.salary_account_id,
									                              source: saDS"
									                   required data-required-msg="required"											                              
									                   style="width: 100%;" />
										    </div>
											<!-- // Group END -->	
										</div>
										<div class="span3">
											<!-- Group -->
											<div class="control-group">
												<label for="currency"><span data-bind="text: lang.lang.currency"></span> <span style="color:red">*</span></label>
									            <input id="currency" name="currency" 
									            	data-role="dropdownlist"
									            	data-value-primitive="true"
									                data-text-field="code"
									                data-value-field="id"
													data-bind="value: obj.currency_id, source: currencyDS"
													data-option-label="(--- Select ---)" 
													required data-required-msg="required" style="width: 100%;" />
											</div>													
										</div>																																				
							        </div>	
							        <div class="separator line bottom"></div>
					        	</div>
						        <!-- //ACCOUNTING INFO END -->								        

						        <!-- //GENERAL INFO -->
						        <div class="tab-pane" id="tab2">
					            	<table class="table table-borderless table-condensed cart_total">						            	
					            		<tr>
							                <td><span data-bind="text: lang.lang.status"></span> <span style="color:red">*</span></td>
							              	<td>
							              		<input id="customerStatus" name="customerStatus" 
							              				data-role="dropdownlist"
									            		data-text-field="name"
						           						data-value-field="id"
						           						data-value-primitive="true" 
									            		data-bind="source: statusList, value: obj.status"
									            		data-option-label="(--- Select ---)"
									            		required data-required-msg="ត្រូវការ ស្ថានភាព" />
							              	</td>							              	
							            	<td><span data-bind="text: lang.lang.register_date"></span> <span style="color:red">*</span></td>
							              	<td>
							              		<input id="registered_date" name="registered_date" 
								            		data-role="datepicker"			            		
					            					data-bind="value: obj.registered_date" 
					            					data-format="dd-MM-yyyy"
					            					data-parse-formats="yyyy-MM-dd" 
					            					placeholder="dd-MM-yyyy" required data-required-msg="required" />
							              	</td>
							            </tr>									            
							            <tr>
							                <td><span data-bind="text: lang.lang.email"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.email" placeholder="e.g. me@email.com" /></td>							              	
							            	<td><span data-bind="text: lang.lang.phone"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.phone" placeholder="e.g. 012 333 444" /></td>
							            </tr>									           							            
							            <tr>
							            	<td><span data-bind="text: lang.lang.address"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.address" placeholder="where you live ..." />							              	
							            	<td><span data-bind="text: lang.lang.memo"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.memo" placeholder="memo ..." /></td>
							            </tr>
							            <tr>
							            	<td><label for="txtBillTo" data-bind="click: copyBillTo"><span data-bind="text: lang.lang.bill_to"></span> <i class="icon-share"></i></label></td>
							              	<td><input class="k-textbox" data-bind="value: obj.bill_to" placeholder="bill to ..." />							              	
							            	<td><span data-bind="text: lang.lang.ship_to"></span></td>
							              	<td><input class="k-textbox" data-bind="value: obj.ship_to" placeholder="ship to ..." /></td>									              	
							            </tr>							            							            								            								            			            
							        </table>
					        	</div>
						        <!-- //GENERAL INFO END -->	
						        <div class="tab-pane" id="tab3">	
						        	<input name="files"
					                   type="file"
					                   data-role="upload"
					                   data-async="{ saveUrl: 'save', removeUrl: 'remove', autoUpload: false }">								     
						        </div>						        
						    </div>
						</div>
					</div>

					<br>											
							
							<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>

						<!-- Delete Confirmation -->
						<div data-role="window"
			                 data-title="Delete Confirmation"
			                 data-width="350"
			                 data-height="200"
			                 data-iframe="true"
			                 data-modal="true"
			                 data-visible="false"
			                 data-position="{top:'40%',left:'35%'}"
			                 data-actions="{}"
			                 data-resizable="false"
			                 data-bind="visible: showConfirm"
			                 style="text-align:center;">
			                <p style="font-size:25px; margin: 15px 0 25px;" class="delete-message" data-bind="text: confirmMessage"></p>
						    <button style="font-size:14px; border:none; background:#496cad; color:#fff; padding:5px 25px;" data-bind="click:delete">Yes</button> 
						    <button style="font-size:14px; border:none; background:red; color:#fff; padding:5px 25px;" data-bind="click:closeConfirm">No</button>
			            </div>
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span3">
								
							</div>
							<div class="span9" align="right">
								<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 80px;"><i></i> Save New</span>
								<span id="saveClose" class="btn btn-icon btn-success glyphicons power" style="width: 80px;"><i></i> Save Close</span>
								<span class="btn btn-icon btn-warning glyphicons remove_2" onclick="javascript:window.history.back()" data-bind="click: cancel" style="width: 80px;"><i></i> Cancel</span>
								<span class="btn btn-danger btn-icon glyphicons bin" data-bind="click: openConfirm, visible: isEdit" style="width: 80px;"><i></i> Delete</span>					
							</div>
						</div>
					</div>
					<!-- // Form actions END -->	          					                
			    											
				</div> <!-- // End div example-->  
			</div> <!-- // End div span12-->
		</div> <!-- // End div row-fluid-->	
	</div> 	 
</script>
<script id="employee-contact-person-row-tmpl" type="text/x-kendo-tmpl">
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
<!--Service-->
<script id="itemCenter" type="text/x-kendo-template"> 
	<div class="widget widget-heading-simple widget-body-gray widget-employees">
		<div class="widget-body padding-none">			
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" >
					<div class="innerAll" style="padding-bottom: 4px;">							
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input style="height: 34px;" type="search" placeholder="Number or Name ..." data-bind="value: searchText">
								</div>
							</div>

							<div class="select2-container" style="width: 100%; margin-bottom: 10px;">								
								<input data-role="dropdownlist"
					                   data-option-label="Select Category..."
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: category_id,
					                              source: categoryDS"
					                   style="width: 100%; " />									
							</div>
						</form>					
					</div>
					
					<span class="results"><span data-bind="text: itemDS.total()"></span> <span data-bind="text: lang.lang.found_search"></span></span>

					<div class="table table-condensed" style="height: 580px;"						 
						 data-role="grid" 
						 data-bind="source: itemDS"
						 data-row-template="itemCenter-item-list-tmpl"
						 data-columns="[{title: ''}]"
						 data-selectable=true
						 data-height="600"						 
						 data-scrollable="{virtual: true}"></div>									
				</div>
				<div class="span9 detailsWrapper">
					<div class="row-fluid">					
						<div class="span6">
							<div class="widget widget-4 widget-tabs-icons-only margin-bottom-none">

							    <!-- Widget Heading -->
							    <div class="widget-head">
							    	<input type="text" disabled="disabled" data-bind="value: obj.name" style="border: none; width: 65%; font-size: 20px; font-weight: 600; margin-top: -11px; margin-left: 11px; background: #fff;">
							        <!-- Tabs -->
							        <ul class="pull-right">
							            <li class="glyphicons circle_info active"><span data-toggle="tab" data-target="#tab1-4"><i></i></span>
							            </li>
							            <li class="glyphicons coins"><span data-target="#tab2-4" data-bind="click: pricing"><i></i></span>
							            </li>
							           <!--  <li class="glyphicons sampler"><span data-target="#tab3-4" data-bind="click: variant"><i></i></span>
							            </li> -->
							            <li class="glyphicons paperclip"><span data-toggle="tab" data-target="#tab4-4"><i></i></span>
							            </li>								            						            
							        </ul>
							        <div class="clearfix"></div>
							        <!-- // Tabs END -->

							    </div>
							    <!-- Widget Heading END -->

							    <div class="widget-body">
							        <div class="tab-content">

							            <!-- Info Tab content -->
							            <div id="tab1-4" class="tab-pane active box-generic">
							            	
											<div class="row-fluid">
							            		<div class="accounCetner-textedit">
								            		<div class="row-fluid">
								            			<div class="span6" style="padding: 0 15px 0 0;">
								            				<img class="main-image" data-bind="attr: { src: obj.image_url, alt: obj.name, title: obj.name }" style="border: 1px solid #ddd; height: auto !important;">
								            			</div>
								            			<div class="span6">
								            				<table width="100%">
																<tr>
																	<td colspan="2">
																		<span data-bind="text: lang.lang.weighted_avg_cost"></span>
																	</td>
																</tr>
																<tr>
																	<td align="right" colspan="2">
																		<span class="strong" data-format="n" data-bind="text: raw.cost"></span>
																		<span data-bind="text: raw.currency_code"></span>
																	</td>
																</tr>
																<tr>
																	<td colspan="2">
																		<span data-bind="text: lang.lang.price"></span>
																	</td>
																</tr>
																<tr>
																	<td align="right" colspan="2">
																		<span class="strong" data-format="n" data-bind="text: raw.price"></span>
																		<span data-bind="text: raw.currency_code"></span>
																	</td>
																</tr>
																<tr>
																	<td>
																		<span data-bind="text: lang.lang.uom"></span>
																	</td>
																	<td>
																		<span data-bind="text: raw.measurement"></span>
																	</td>
																</tr>
															</table>
															<span style="margin-top: 10px; width: 204px !important; text-align: center;" class="btn btn-primary btn-icon glyphicons edit pull-right" data-bind="click: edit"><i></i><span style="font-size: 12.5px;" data-bind="text: lang.lang.view_all_info_edit"></span></span>
								            			</div>
								            		</div>
													
												</div>
											</div>
											
							            </div>
							            <!-- // Info Tab content END -->

							             <!-- Attach Tab content -->
								        <div class="tab-pane" id="tab4-4">
								            
								            <p><span data-bind="text: lang.lang.file_type"></span> [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>							            	
							            
								            <input id="files" name="files"
								                   type="file"
								                   data-role="upload"
								                   data-show-file-list="false"
								                   data-bind="events: { 
						                   				select: onSelect
								                   }">

								            <table class="table table-bordered">
										        <thead>
										            <tr>			                
										                <th data-bind="text: lang.lang.file_name"></th>
										                <th data-bind="text: lang.lang.description"></th>
										                <th data-bind="text: lang.lang.date"></th>
										                <th style="width: 13%;"></th>                			                
										            </tr> 
										        </thead>
										        <tbody data-role="listview" 
										        		data-template="attachment-list-tmpl" 
										        		data-auto-bind="false"
										        		data-bind="source: attachmentDS"></tbody>			        
										    </table>

										    <div id="pager" class="k-pager-wrap"
										    	 data-role="pager"
										    	 data-auto-bind="false"
									             data-bind="source: attachmentDS"></div>

										    <span style=" width: 93px !important; margin-top: 10px;" class="btn btn-icon btn-success glyphicons ok_2" data-bind="click: uploadFile"><i></i> <span data-bind="text: lang.lang.save"></span></span>

								        </div>
								        <!-- // Attach Tab content END -->
							           
							        </div>
							    </div>
							</div>
						</div>

						<div class="span6 account-center" style="margin-bottom: 10px;">
							<!-- <div class="row-fluid">
								<div class="span12" style="padding-right:0;">
									<div class="widget-body alert alert-primary" style="margin-bottom: 10px; background: #203864;">							
										<div align="center" class="text-large strong">
											<span data-format="n" data-bind="text: raw.amount"></span>
											<span data-bind="text: raw.currency_code"></span>
										</div>										
										<table width="100%">
											<tr align="center">
												<td>										
													<span data-format="n0" data-bind="text: raw.quantity"></span>
													<br>
													<span data-bind="text: lang.lang.qoh"></span>
												</td>
												<td data-bind="click: loadPO" >
													<span data-format="n0" data-bind="text: raw.po"></span>
													<br>
													<span data-bind="text: lang.lang.on_po"></span>
												</td>
												<td>
													<span data-format="n0" data-bind="text: raw.so"></span>
													<br>
													<span data-bind="text: lang.lang.on_so"></span>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div> -->							
							
							<div class="row-fluid" style="width: 98%; float: right;">
								<div class="span6">
									<div class="widget-stats widget-stats-info widget-stats-5" style="background: #0077c5">
										<span class="glyphicons adjust_alt"><i></i></span>
										<span class="txt" style="width: 70%; margin-top: -16px;"><span style=" font-size: 18px;">Appointment</span></span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6">
									<div class="widget-stats widget-stats-default widget-stats-5" style="background: #21abf6">
										<span class="glyphicons random"><i></i></span>
										<span class="txt"><span data-bind="text: raw.txn"></span><span style=" font-size: 18px;">Sale</span></span>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>														
						</div>											          	
		          	</div>
					
					<div>
						<input data-role="dropdownlist"
							   class="sorter"                  
					           data-value-primitive="true"
					           data-text-field="text"
					           data-value-field="value"
					           data-bind="value: sorter,
					                      source: sortList,                              
					                      events: { change: sorterChanges }" style="width: 17%;" />

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
								<th><span data-bind="text: lang.lang.type2"></span></th>								
								<th style="text-align: center;" ><span data-bind="text: lang.lang.reference_no"></span></th>
								<th style="text-align: center;" ><span data-bind="text: lang.lang.qty"></span></th>
								<th style="text-align: right;" ><span data-bind="text: lang.lang.cost"></span></th>
								<th style="text-align: right;" ><span data-bind="text: lang.lang.price"></span></th>
							</tr>
						</thead>	            		
	            		<tbody data-role="listview"
	            				data-auto-bind="false"	            					            					            					            			
				                data-template="itemCenter-transaction-tmpl"
				                data-bind="source: transactionDS" >
				        </tbody>
	            	</table>

	            	<div id="pager" class="k-pager-wrap"
				    	 data-auto-bind="false"
			             data-role="pager" data-bind="source: transactionDS"></div>	            	
				</div>
			</div>			
		</div>
	</div>		
</script>
<script id="itemCenter-item-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td>
			<div class="media-body">
				<span class="strong">
					#=abbr##=number# #=name#
				</span>

				<span>
					#if(variant.length>0){#
						[
						#for(var i=0; i < variant.length; i++){# 
							#=variant[i].name#, 
						#}#
						]
					#}#
				</span>
			</div>
		</td>
	</tr>
</script>
<script id="itemCenter-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>    	  	
    	<td>#=kendo.toString(new Date(transaction_issued_date), "dd-MM-yyyy")#</td>
    	<td>#=transaction_type#</td>
        <td align="center">		
			<a href="\#/#=transaction_type.toLowerCase()#/#=id#">#=transaction_number#</a>
        </td>
    	<td align="center">#=kendo.toString(quantity * movement, "n0")#</td>
    	<td align="right">
    		#if(cost>0){#
    			#=kendo.toString((cost+additional_cost)/rate, "c", locale)#
    		#}#
    	</td>
    	<td align="right">
    		#if(price>0){#
    			#=kendo.toString(price/rate, "c", locale)#
    		#}#
    	</td>
    </tr>
</script>
<script id="item" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">
			    
			    	<span class="glyphicons no-js remove_2 pull-right" 
	    				onclick="javascript:window.history.back()"
						data-bind="click: cancel"><i></i></span>

			        <h2 data-bind="text: lang.lang.inventory_for_sale"></h2>

				    <br>
					
			    	<div class="row-fluid">
			    		<div class="span6 well">
							<div class="row">
								<div class="span6" style="padding-right: 0;">														
									<!-- Group -->
									<div class="control-group">										
										<label for="ddlCategory"><span data-bind="text: lang.lang.category"></span> <span style="color:red">*</span></label>										
										<input id="ddlCategory" id="ddlCategory"
											   data-role="dropdownlist"
											   data-option-label="Select Category..."
											   data-header-template="item-category-header-tmpl"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.category_id,
							                   			  disabled: obj.is_pattern, 
							                              source: categoryDS,
							                              events: {change: categoryChanges}"
							                   required data-required-msg="required" style="width: 100%;" />
									</div>
									<!-- // Group END -->
								</div>

								<div class="span6">	
									<!-- Group -->
									<div class="control-group">										
										<label for="ddlItemGroup"><span data-bind="text: lang.lang.group"></span> </label>										
										<input id="ddlItemGroup" id="ddlItemGroup"
											   data-role="dropdownlist"
											   data-header-template="item-group-header-tmpl"
											   data-option-label="Select Group..."
											   data-cascade-from="ddlCategory"
											   data-cascade-from-field="category_id"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.item_group_id,							                   			  
							                              source: itemGroupDS"
							                   style="width: 100%;" />
									</div>
									<!-- // Group END -->												
								</div>
							</div>
							
							<div class="row">
								<div class="span6" style="padding-right: 0;">										
									<!-- Group -->
									<div class="control-group">							
										<label for="txtNumber"><span data-bind="text: lang.lang.no_"></span><span style="color:red">*</span></label>
				              			<br>
				              			<input id="txtAbbr" name="txtAbbr" class="k-textbox"
					              				data-bind="value: obj.abbr, 
					              						   disabled: obj.is_pattern" 
					              				placeholder="eg. AB" style="width: 55px;" />
				              			-
				              			<input id="txtNumber" name="txtNumber" class="k-textbox"
					              				data-bind="value: obj.number, 
					              							disabled: obj.is_pattern,
					              							events:{change: checkExistingNumber}" 
					              				placeholder="e.g. 0001" 
					              				required data-required-msg="required"
					              				style="width: 157px;" />
									</div>
									<!-- // Group END -->		
								</div>

								<div class="span6">						
									<!-- Group -->
									<div class="control-group">
										<label for="txtName"><span data-bind="text: lang.lang.name"></span> <span style="color:red">*</span></label>
					              		<input id="txtName" name="txtName" class="k-textbox" data-bind="value: obj.name, disabled: obj.is_pattern" 
							              		placeholder="Item name..." required data-required-msg="required"
							              		style="width: 100%;" />
									</div>
									<!-- // Group END -->	
								</div>								
							</div>

							<div class="row">
								<div class="span6" style="padding-right: 0;">
									<!-- Group -->
									<div class="control-group">
										<label for="ddlCurrency"><span data-bind="text: lang.lang.currency"></span> <span style="color:red">*</span></label>							            
							            <input id="ddlCurrency" name="ddlCurrency"
				              				data-role="dropdownlist"
				              				data-option-label="(--- Select ---)"
				              				data-template="currency-list-tmpl"
				              				data-value-primitive="true"
						            		data-text-field="code"
			           						data-value-field="locale"
						            		data-bind="source: currencyDS, 
						            				   disabled: isLock,
						            				   value: obj.locale"
						            		required data-required-msg="required" style="width: 100%;" />
									</div>
									<!-- // Group END -->
								</div>

								<div class="span6">
									<!-- Group -->
									<div class="control-group">
										<label for="ddlMeasurement">Base <span data-bind="text: lang.lang.uom"></span> <span style="color:red">*</span></label>
										<input id="ddlMeasurement" name="ddlMeasurement"
										   data-option-label="(--- Select ---)" 
										   data-header-template="item-measurement-header-tmpl"
										   data-role="dropdownlist"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.measurement_id,
						                   			  disabled: isLock,
						                              source: measurementDS"
						                   required data-required-msg="required"
						                   style="width: 100%;" />
									</div>
									<!-- // Group END -->
								</div>
							</div>
						</div>
						<div class="span6">
							<div class="row">
								<div class="span6">
									<!-- Group -->
									<div class="control-group">
										<label for="txtCost"><span data-bind="text: lang.lang.average_cost"></span></label>
							            <input id="txtCost" name="txtCost"
							            	   type="number" class="k-textbox"
							            	   min="0"
							                   data-bind="value: obj.cost"
							                   placeholder="Add Cost..."
							                   style="width: 100%" />
									</div>
									<!-- // Group END -->
								</div>

								<div class="span6">
									<!-- Group -->
									<div class="control-group">
										<label for="txtPrice"><span data-bind="text: lang.lang.average_price"></span></label>
							            <input id="txtPrice" name="txtPrice"
							            	   type="number" class="k-textbox"
							            	   min="0"
							                   data-bind="value: obj.price"
							                   placeholder="Add Price..."
							                   style="width: 100%" />
									</div>
									<!-- // Group END -->
								</div>
							</div>

							<br>

							<div class="row">
								<div class="span6">
									<!-- Group -->
									<div class="control-group">
										<label for="txtPurchaseDescription"><span data-bind="text: lang.lang.purchase_description"></span></label>
							            <textarea id="txtPurchaseDescription" 
							            	class="k-textbox" 
											data-bind="value: obj.purchase_description"
											placeholder="Add Purchase Description..." 
											style="resize:none; width: 100%;height:94px;"></textarea>
									</div>
									<!-- // Group END -->
								</div>
								<div class="span6">
									<!-- Group -->
									<div class="control-group">
										<label for="txtSaleDescription"><span data-bind="text: lang.lang.sale_description"></span></label>
							            <textarea id="txtSaleDescription" 
							            	class="k-textbox" 
											data-bind="value: obj.sale_description"
											placeholder="Add Sale Description..." 
											style="resize:none; width: 100%;height:94px;"></textarea>
									</div>
									<!-- // Group END -->
								</div>
							</div>
						</div>
					</div>
							
					<!-- // Inner Tabs -->
					<div class="row-fluid">
						<div class="box-generic">
						    <!-- //Tabs Heading -->
						    <div class="tabsbar tabsbar-1">
						        <ul class="row-fluid row-merge">
						        	<li class="span2 glyphicons circle_info active">
						            	<a href="#tab1" data-toggle="tab"><i></i> <span><span data-bind="text: lang.lang.info"></span></span></a>
						            </li>
						            <li class="span2 glyphicons usd">
						            	<a href="#tab2" data-toggle="tab"><i></i> <span><span data-bind="text: lang.lang.accounting"></span></span></a>
						            </li>
						            <li class="span2 glyphicons sampler">
						            	<a href="#tab3" data-toggle="tab"><i></i> <span>Variants</span></a>
						            </li>
						            <li class="span2 glyphicons barcode">
						            	<a href="#tab4" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.supplier_customer_codes"></span></a>
						            </li>
						        </ul>
						    </div>
						    <!-- // Tabs Heading END -->

						    <div class="tab-content">

						    	<!-- //INFO -->
						        <div class="tab-pane" id="tab1">

						        	<div class="row">
						        		<div class="span6">
						        			<div class="row">
						        				<div class="span12">
						        					<div class="row-fluid">
							        					<!-- Group -->
														<div class="control-group span8">
															<label for="txtBarcode">Barcode</label>
												            <input id="txtBarcode" name="txtBarcode" class="k-textbox"
										              				data-bind="value: obj.barcode" 
										              				placeholder="e.g. 123456" style="width: 100%" />
														</div>
														<!-- // Group END -->

														<!-- Group -->
														<div class="control-group span4">
												            <input type="checkbox" data-bind="checked: obj.favorite" />	<span data-bind="text: lang.lang.favorite"></span>
														</div>
														<!-- // Group END -->
													</div>
												</div>

												<br>

							        			<div class="span12">
													<!-- Group -->
													<div class="control-group">
														<label for="txtSerialNumber"><span data-bind="text: lang.lang.model"></span></label>
								              			<input data-role="dropdownlist"
								              			   data-option-label="(--- Select ---)"
								              			   data-header-template="item-brand-header-tmpl"           
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.brand_id,
										                              source: brandDS"
										                   style="width: 100%;" />
													</div>
													<!-- // Group END -->
												</div>

												<br>

												<div class="span12">
													<!-- Group -->
													<div class="control-group">
														<label for="ddlStatus"><span data-bind="text: lang.lang.status"></span> <span style="color:red">*</span></label>
											            <input id="ddlStatus" name="ddlStatus" 
								              				data-role="dropdownlist"
										            		data-text-field="name"
							           						data-value-field="id"
							           						data-value-primitive="true" 
										            		data-bind="source: statusList, value: obj.status"
										            		data-option-label="(--- Select ---)"
										            		required data-required-msg="required" style="width: 100%;" />
													</div>
													<!-- // Group END -->
												</div>

												<br>
									        
												<div class="span12">
													<!-- Group -->
													<div class="control-group">
														<label for="multiselect">Tag</label>
											            <select id="multiselect" name="multiselect" 
											            		data-role="multiselect"
											                    data-bind="value: obj.tags,
											                    			source: tagList, 
											                    			events:{filtering:tagChanges}"
										            ></select>
													</div>
													<!-- // Group END -->
												</div>
											</div>
						        		</div>
										<div class="span6">
											<img width="120px" data-bind="attr: { src: obj.image_url }" style="margin-bottom: 15px; border: 1px solid #ddd;">
											
											<input id="files" name="files"
							                    type="file"
							                    data-role="upload"
							                    data-multiple="false"
							                    data-show-file-list="false"
							                    data-bind="events: { 
					                   				select: onSelect
							                    }">
										</div>

							        </div>

					        	</div>
						        <!-- //INFO END -->

						        <!-- //ACCOUNTING -->
						        <div class="tab-pane" id="tab2">
						        	<div class="row-fluid">
										<div class="span4">
											<label for="ddlIncome"><span data-bind="text: lang.lang.income_account"></span><span style="color:red">*</span></label>											
											<input id="ddlIncome" name="ddlIncome"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.income_account_id,
								                              source: incomeAccountDS"
								                   data-option-label="Select Account..."
								                   required data-required-msg="required" style="width: 100%;" />
										</div>
										<div class="span4">
											<label for="ddlCogs"><span data-bind="text: lang.lang.cost_of_good_sold_account"></span><span style="color:red">*</span></label>
											<input id="ddlCogs" name="ddlCogs"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.expense_account_id,
								                              source: cogsAccountDS"
								                   data-option-label="Select Account..."
								                   required data-required-msg="required" style="width: 100%;" />											
										</div>
										<div class="span4">
											<label for="ddlInventory"><span data-bind="text: lang.lang.inventory_account"></span><span style="color:red">*</span></label>
											<input id="ddlInventory" name="ddlInventory"
												   data-role="dropdownlist"
												   data-header-template="account-header-tmpl"
												   data-template="account-list-tmpl"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.inventory_account_id,
								                              source: inventoryAccountDS"
								                   data-option-label="Select Account..."
								                   required data-required-msg="required" style="width: 100%;" />
										</div>												
							        </div>							        
					        	</div>
						        <!-- //ACCOUNTING END -->

						        <!-- //VARIANTS -->
						        <div class="tab-pane active" id="tab3">
						        	<div data-bind="visible: subcribedAdvanceInventory">
							        	<div data-role="grid" class="costom-grid"
									    	 data-resizable="true"
									    	 data-editable="true"
							                 data-columns="[
							                 	{ 
											    	title:'NO',
											    	width: '50px', 
											    	attributes: { style: 'text-align: center;' }, 
											        template: function (dataItem) {
											        	return banhji.item.itemVariantDS.indexOf(dataItem)+1;
											      	}
											    },
							                 	{
												    field: 'variant_attribute',
												    title: 'Variant Attribute',
												    template: '#=variant_attribute.name#',
												    editor: variantAttributeEditor,
												    width: '40%'
												},
												{
												    field: 'variants',
												    title: 'Attribute Value',
												    template: '#for(var i=0; i<variants.length; i++){# #=variants[i].name#, #}#',
												    editor: attributeValueEditor,
												    width: '60%'
												},
												{ command: 'destroy', title: '&nbsp;', width: 150 }
					                         ]"
					                         data-auto-bind="false"
							                 data-bind="source: itemVariantDS" ></div>

							            <button class="btn btn-inverse" data-bind="click: addVariant"><i class="icon-plus icon-white"></i></button>
							            <button class="btn btn-inverse" data-bind="click: generateVariant">Generate Variant</button>
						            	
						            	<br>

						            	<div data-role="grid"
						            		 data-editable="true"
							                 data-columns="[
				                                { 'field': 'name', title:'NAME' },
				                                { 
					                            	field: 'variant', 
					                            	title:'ATTRIBUTES',
					                            	editable: function(){
					                            		return false;
					                            	},
					                            	template:'#for(var i=0; i < variant.length; i++){# #=variant[i].name#, #}#' 
					                            },
					                            { field: 'barcode', title:'BARCODE', width: '250px' },
												{ command: 'destroy', title: '&nbsp;', width: 150 }
				                             ]"
				                             data-auto-bind="false"
							                 data-bind="source: variantDS"></div>

						            </div>
						            <div data-bind="invisible: subcribedAdvanceInventory" style="text-align: center;">
						            	<a href="<?php echo base_url(); ?>admin">Click here to subcribe Advance Inventory Module.</a>
						            </div>
					        	</div>
						        <!-- //VARIANTS END -->						        

						        <!-- //VENDOR/CUSTOMER CODE -->
						        <div class="tab-pane" id="tab4">

						        	<div class="row">
						        		<div class="span6">
						        			<span style="margin-bottom: 15px;" class="btn btn-primary btn-icon glyphicons circle_plus" data-bind="click: addEmptyItemVendor"><i></i> <span data-bind="text: lang.lang.new_vendor_item"></span></span>
								        	
								        	<table class="table table-bordered table-white">
										        <thead>
										            <tr>
										                <th><span data-bind="text: lang.lang.name"></span></th>
										                <th><span data-bind="text: lang.lang.code"></span></th>								                
										                <th width="20px"></th>										               
										            </tr>
										        </thead>
										        <tbody data-role="listview"										        		
										        		data-auto-bind="false"					        						        		 
										        		data-template="item-vendor-row-tmpl" 
										        		data-bind="source: itemVendorDS">
										        </tbody>										        						        
										    </table>
						        		</div>
						        		<div class="span6">
						        			<span style="margin-bottom: 15px;" class="btn btn-primary btn-icon glyphicons circle_plus" data-bind="click: addEmptyItemCustomer"><i></i> <span data-bind="text: lang.lang.new_customer_item"></span></span>
								        	
								        	<table class="table table-bordered table-white">
										        <thead>
										            <tr>
										                <th><span data-bind="text: lang.lang.name"></span></th>
										                <th><span data-bind="text: lang.lang.code"></span></th>								                
										                <th width="20px"></th>										               
										            </tr>
										        </thead>
										        <tbody data-role="listview"										        		
										        		data-auto-bind="false"										        						        		 
										        		data-template="item-customer-row-tmpl" 
										        		data-bind="source: itemCustomerDS">
										        </tbody>										        						        
										    </table>
						        		</div>
						        	</div>

					        	</div>
						        <!-- //VENDOR/CUSTOMER CODE END -->

						    </div>
						</div>
					</div>

					<br>

					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>

						<!-- Delete Confirmation -->
						<div data-role="window"
			                 data-title="Delete Confirmation"
			                 data-width="350"
			                 data-height="200"
			                 data-iframe="true"
			                 data-modal="true"
			                 data-visible="false"
			                 data-position="{top:'40%',left:'35%'}"
			                 data-actions="{}"
			                 data-resizable="false"
			                 data-bind="visible: showConfirm"
			                 style="text-align:center;">
			                <p style="font-size:25px; margin: 15px 0 25px;" class="delete-message" data-bind="text: confirmMessage"></p>
						    <button style="font-size:14px; border:none; background:#496cad; color:#fff; padding:5px 25px;" data-bind="click:delete">Yes</button> 
						    <button style="font-size:14px; border:none; background:red; color:#fff; padding:5px 25px;" data-bind="click:closeConfirm">No</button>
			            </div>
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span4" style="padding-left: 15px;"><a style="color: #fff; float: left;"></a></div>
							<div class="span8" align="right">
								<span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
								<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
								<span role='presentation' class='dropdown btn-btn' style="padding: 0 0 0 15px; float: right; height: 32px; line-height: 30px;">
							  		<a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
							  			<span data-bind="text: lang.lang.save_option"></span>
							  			<span class="small-btn"><i class='caret '></i></span>
							  		</a>
							  		<ul class='dropdown-menu'>
						  				<li id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></li>
						  				<!-- <li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li> -->
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft"><span data-bind="text: lang.lang.save_draft"></span></span>
								<!-- <span class="btn-btn" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></span>
								<span class="btn-btn"><span data-bind="text: lang.lang.save_close"></span></span>
								<span class="btn-btn"><span data-bind="text: lang.lang.save_print"></span></span> -->
							</div>
						</div>
					</div>
					<!-- // Form actions END -->

				</div>
			</div>
		</div>
	</div>
</script>
<!--Report-->
<script id="reportDashboard" type="text/x-kendo-template" >
	<div class="row-fluid">
		<div class="span12">
			<div class="span4 report-module">
				<h2 style="font-family: 'Open Sans', sans-serif;margin: 0 0 5px;font-weight: 400; color: #4d4d4d; font-size: 26px; text-transform: uppercase;" data-bind="text: lang.lang.reports">REPORTS</h2>
				<p style="margin: 0 0 10px; line-height: normal;" data-bind="text: lang.lang.report_center_description">					
				</p>
			</div>
			<div class="span8">				
			</div>
		</div>

		<div class="span12">
			<div class="span4">
				<div class="widget widget-3 customer-border">
					<div class="widget-head header-custome">
						<h4 class="heading">
							How efficient is your working capital management?
						</h4>
					</div>					
					<div class="widget-body alert alert-primary" style="min-height: 178px; background: #203864; color: #fff;">
						<div align="center" class="text-large strong" style="font-size: 35px;">
							<span data-bind="text: ccc"></span>
							<br>
							<p style="font-size: 14px" data-bind="text: lang.lang.cash_conversion_cycle">Cash Conversion Cycle</p>
						</div>
						<table width="100%">
							<tbody>
								<tr align="center" style="vertical-align: top;">
									<td width="33%">										
										<span style="font-size: 18px;" data-bind="text: arCollectionPeriod"></span>
										<br>
										<span style="font-size: 12px;" data-bind="text: lang.lang.receivable_collection_days"></span>
									</td>
									<td width="33%">
										<span style="font-size: 18px;" data-bind="text: apPaymentPeriod"></span>
										<br>
										<span style="font-size: 12px;" data-bind="text: lang.lang.payable_payment_days"></span>
									</td>
									<td width="33%">
										<span style="font-size: 18px;" data-bind="text: inventoryTurnOver"></span>
										<br>
										<span style="font-size: 12px;" data-bind="text: lang.lang.inventory_turnover_days"></span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>									
				</div>				
			</div>
			<div class="span4">
				<div class="widget widget-3 customer-border">
					<div class="widget-head header-custome">
						<h4 class="heading">
							WHAT IS YOUR ABILITY TO MEET YOUR PRESENT OBLIGATIONS?
						</h4>
					</div>					
					<div class="widget-body alert-info" style="min-height: 178px; background: #0077c5; color: #fff;">
						<div align="center" class="text-large strong" style="font-size: 35px;">
							<span data-bind="text: currentRatio"></span>
							<br>
							<p style="font-size: 14px" data-bind="text: lang.lang.current_ratio">Current Ratio</p>
						</div>
						<table width="100%">
							<tbody>
								<tr align="center" style="vertical-align: top;">
									<td width="33%">										
										<span style="font-size: 18px;" data-bind="text: quickRatio"></span>
										<br>
										<span style="font-size: 12px;" data-bind="text: lang.lang.quick_ratio"></span>
									</td>
									<td width="33%">
										<span style="font-size: 18px;" data-bind="text: cashRatio"></span>
										<br>
										<span style="font-size: 12px;" data-bind="text: lang.lang.cash_ratio"></span>
									</td>
									<td width="33%">
										<span style="font-size: 18px;" data-bind="text: wcSale"></span>
										<br>
										<span style="font-size: 12px;" data-bind="text: lang.lang.working_capital_to_sale_ratio"></span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>										
				</div>				
			</div>
			<div class="span4">	
				<div class="widget widget-3 customer-border">
					<div class="widget-head header-custome">
						<h4 class="heading">
							How profitable is your business?
						</h4>
					</div>					
					<div class="widget-body alert-info3" style="min-height: 178px; background :#21abf6; color: #fff;">
						<div align="center" class="text-large strong" style="font-size: 35px;">
							<span data-bind="text: roce"></span>
							<br>
							<p style="font-size: 14px" data-bind="text: lang.lang.return_on_capital_employed"></p>
						</div>						
						<table width="100%">
							<tbody>
								<tr align="center" style="vertical-align: top;">
									<td width="33%">										
										<span style="font-size: 18px;" data-bind="text: grossProfitMargin"></span>
										<br>
										<span style="font-size: 12px;" data-bind="text: lang.lang.gross_profit_margin"></span>
									</td>
									<td width="33%">
										<span style="font-size: 18px;" data-bind="text: profitMargin"></span>
										<br>
										<span style="font-size: 12px;" data-bind="text: lang.lang.earning_before_instest_tax"></span>
									</td>
									<td width="33%">
										<span style="font-size: 18px;" data-bind="text: returnOnAsset"></span>
										<br>
										<span style="font-size: 12px;" data-bind="text: lang.lang.return_on_asset"></span>
									</td>
								</tr>
							</tbody>
						</table>
					</div>									
				</div>				
			</div>
		</div>

		<div class="span12" style="margin-top: 20px;">		
			<div class="relativeWrap" data-toggle="source-code">
				<div class="widget widget-tabs widget-tabs-gray report-tab" style="padding-bottom: 20px; background: #fff; overflow: hidden;">
					<div class="widget-head head-custom" style="height: 50px;">
						<ul>
							<li class="active"><a href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.customer"></span></a></li>
							<li><a href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.supplier"></span></a></li>
							<li><a href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.products_services"></span></a></li>
							<li><a href="#tab-4" data-toggle="tab"><i></i><span data-bind="text: lang.lang.cash"></span></a></li>
							<li><a href="#tab-5" data-toggle="tab"><i></i><span data-bind="text: lang.lang.period_end"></span></a></li>
							<li><a href="#tab-6" data-toggle="tab"><i></i><span data-bind="text: lang.lang.financial_statements"></span></a></li>
							<li><a href="#tab-7" data-toggle="tab"><i></i><span data-bind="text: lang.lang.segment_reporting"></span></a></li>
							<li><a href="#tab-8" data-toggle="tab"><i></i><span data-bind="text: lang.lang.job_tracking"></span></a></li>
						</ul>
					</div>

					<div class="widget-body">
						<div class="tab-content">
					        <div class="tab-pane active" id="tab-1">
								<div class="row-fluid">
									<div class="row-fluid sale-report">
										<h2 data-bind="text: lang.lang.sale_managment_reports" style="text-transform: uppercase;"></h2>
										<p data-bind="text: lang.lang.the_following_reports_provide">
											The following reports provide summary and detailed reports in 
											different ways to help analyze your revenue performance.
										</p>
										<div class="row-fluid">
											<table class="span12" style="margin-top: 10px;">
												<tr>
													<td class="span4">
														<h3 ><a href="#/sale_summary_by_customer" data-bind="text: lang.lang.sale_summary_by_customer" style="text-transform: capitalize;"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/sale_detail_by_customer" data-bind="text: lang.lang.sale_detail_by_customer" style="text-transform: capitalize;"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/customer_transaction_list" data-bind="text: lang.lang.customer_transaction_list" style="text-transform: capitalize;"></a></h3>
													</td>
												</tr>

												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.summarizes_total_sales">
															Summarizes total sales for each customer within a period 
															of time so you can see which ones generate the most revenue for you.
														</p>									
													</td>
													<td class="span4" style="vertical-align: top;">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_sale">
															Lists individual sale transactions by date for each customer with a period of time.
														</p>
													</td>
													<td class="span4" >
														<p data-bind="text: lang.lang.list_of_all_transactions_related">
															List of all transactions related to and grouped by each customer, including invoice, cash sale
														</p>
													</td>
												</tr>

												<tr>
													<td class="span4">
														<h3><a href="#/sale_summary_by_product" data-bind="text: lang.lang.sale_summary_by_product_services" style="text-transform: capitalize;"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/sale_detail_by_product" data-bind="text: lang.lang.sale_detail_by_product_services" style="text-transform: capitalize;"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/deposit_detail_by_customer" data-bind="text: lang.lang.deposit_detail_by_customer" style="text-transform: capitalize;"></a></h3>
													</td>
												</tr>

												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.summarizes_total_sales_for_each_product">
															Summarizes total sales for each product/ service within a period of time. In addition, it also includes gross profit margin, quantity, amount, cost, and average prices. 
														</p>
													</td>
													<td class="span4" style="vertical-align: top;">
														<p data-bind="text: lang.lang.lists_individual_sale_transactions">
															Lists individual sale transactions by date for each product/ service with a period of time.
														</p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.provides_detailed_information_about_customer_deposit">
															Provides detailed information about customer deposit for specific order, prepayment, or credit.
														</p>
													</td>
												</tr>
												<tr>
													<td class="span4">
														<h3><a href="#/sale_order_list" data-bind="text: lang.lang.sale_order_list" style="text-transform: capitalize;"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/cashSale_summary_by_customer"  style="text-transform: capitalize;">Cash Sale Summary by Customer</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/cashSale_detail_by_customer" style="text-transform: capitalize;">Cash Sale Detail by Customer</a></h3>
													</td>
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;"></p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;">
															Summarizes total cash sales for each customer within a period of time, so you can see which ones generating the most revenue for you.
														</p>
													</td>	
													<td class="span4">
														<p style="padding-right: 25px;">
															Lists individual cash sale transactions by date for each customer within a period of time.
														</p>
													</td>
												</tr>
												<tr>
													<td class="span4">
														<h3><a href="#/cashSale_summary_by_product"  style="text-transform: capitalize;">Cash Sale Summary by Product/Service</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/cashSale_detail_by_product" style="text-transform: capitalize;">Cash Sale Detail by Product/Service</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/draft_list" style="text-transform: capitalize;">Draft List</a></h3>
													</td>
												</tr>
												<tr>
													<td class="span4">
														<p >
															Summarizes total cash sales for each product/service within a period of time. In addition, it includes gross profit margin, quantity, amount, cost, and average prices.
														</p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;">
															Lists individual cash sale transactions by date for each product/service within a period of time.
														</p>
													</td>	
													<td class="span4"></td>
												</tr>
												</tr>
												<tr>
													<td class="span4">
														<h3><a href="#/sale_summary_by_employee" style="text-transform: capitalize;">Sale Summary by Employee</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/sale_detail_by_employee" style="text-transform: capitalize;">Sale Detail by Employee</a></h3>
													</td>
													<td class="span4">														
													</td>
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;">
															Summarizes total sales for each sale representative within a period of time, so you can see which ones generating the most revenue for you.
														</p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;">
														Lists individual sale transactions by date for each sale representative within a period of time.
														</p>
													</td>
													<td class="span4"></td>
												</tr>


												<!-- <tr>
													<td class="span4" ><h3><a href="#/deposit_detail_by_customer" data-bind="text: lang.lang.deposit_detail_by_customer"></a></h3></td>
													<td class="span4" ><h3><a href="#/customer_transaction_list" data-bind="text: lang.lang.customer_transaction_list"></a></h3></td>
													<td class="span4" ><h3><a href="#/sale_detail_by_customer" data-bind="text: lang.lang.sale_detail_by_customer"></a></h3></td>
												</tr>												
												<tr>
													<td class="span4" ><p style="padding-right: 25px;">Provides detailed information about customer deposit for specific order, prepayment, or credit.</p></td>													
													<td class="span4" ><p style="padding-right: 25px;">List of all transactions related to and grouped by each customer, including invoice, cash sale</p></td>
													<td class="span4" ><p>Lists individual sale transactions by date for each customer with a period of time.</p></td>
												</tr>

												<tr>
													<td class="span4" ><h3><a href="#/sale_summary_by_customer" data-bind="text: lang.lang.sale_summary_by_customer"></a></h3></td>
													<td class="span4" ><h3><a href="#/sale_summary_by_product" data-bind="text: lang.lang.sale_summary_by_product_Services"></a></h3></td>
													<td class="span4" ><h3><a href="#/sale_detail_by_product" data-bind="text: lang.lang.sale_detail_by_product_Services"></a></h3></td>
												</tr>												
												<tr>
													<td class="span4" ><p style="padding-right: 25px;">Summarizes total sales for each customer within a period of time so you can see which ones generate the most revenue for you.</p></td>
													<td class="span4" ><p style="padding-right: 25px;">Summarizes total sales for each product/ service within a period of time. In addition, it also includes gross profit margin, quantity, amount, cost, and average prices.</p></td>
													<td class="span4" ><p>Lists individual sale transactions by date for each product/ service with a period of time.</p></td>
												</tr>

												<tr>
													<td class="span4" ><h3><a href="#/sale_job_engagement" data-bind="text: lang.lang.sale_by_job_engagement"></a></h3></td>
													<td class="span4" ><h3><a href="#/sale_order_list" data-bind="text: lang.lang.sale_order_list"></a></h3></td>
												</tr> -->												
											</table>
										</div>
									</div>

									<div class="row-fluid recevable-report" style="margin-top: 15px; display: inline-block;">
										<h2 data-bind="text: lang.lang.receivable_management_reports" style="text-transform: uppercase;"></h2>
										<p data-bind="text: lang.lang.the_following_reports_provide_summary">
											The following reports provide summary and detailed reports.
										</p>
										<div class="row-fluid">
											<table class="span12" >
												<tr>
													<td class="span4">
														<h3><a href="#/customer_balance_summary" data-bind="text: lang.lang.customer_balance_summary"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/customer_balance_detail" data-bind="text: lang.lang.customer_balance_detail"></a></h3>								
													</td>
													<td class="span4">
														<h3><a href="#/customer_list" data-bind="text: lang.lang.customer_list"></a></h3>
													</td>
												</tr>
												<tr>													
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.show_each_customers_total_outstanding_balances">
															Show each customer’s total outstanding balances.
														</p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_unpaid_invoices_for_each_customer">Lists all unpaid invoices, grouped by Due today and Overdue.</p>
													</td>
													<td class="span4">													
														<p data-bind="text: lang.lang.list_of_all_active_customers">
															List of all active customers
														</p>													
													</td>													
												</tr>
												<tr>
													<td class="span4">
														<h3><a href="#/receivable_aging_summary" data-bind="text: lang.lang.receivable_aging_summary"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/receivable_aging_detail" data-bind="text: lang.lang.receivable_aging_detail"></a></h3>
													</td>
													<td class="span4" >
														<h3><a href="#/invoice_list" data-bind="text: lang.lang.invoice_list"></a></h3>
													</td>
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_all_unpaid_invoices1">
															Lists all unpaid invoices for the current period, 30, 60, 90, and more than 90 days, grouped by individual customers.
														</p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_unpaid_invoices_grouped_by_customer">Lists individual unpaid invoices, grouped by customer. This includes due date, outstanding days (aging days), and amount.</p>
													</td>
													<td class="span4" >
														<p data-bind="text: lang.lang.shows_a_chronological_list_of_all_your_invoices_for_a_selected_date_range">
															Shows a chronological list of all your invoices for a selected date range.
														</p>													
													</td>
												</tr>
												<tr>
													<td class="span4">
														<h3><a href="#/collect_invoice" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/collection_report" data-bind="text: lang.lang.collection_report"></a></h3>
													</td>
													<td class="span4"></td>
												</tr>
												<tr>
													<td class="span4">
														<p data-bind="text: lang.lang.lists_all_unpaid_invoices_grouped_by_due_today_and_overdue">
															Lists individual unpaid invoices for each customer
														</p>														
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_of_collected_invoices_for_the_select_period_of_time_group_by_method_of_payment">
															Lists of collected invoices for the select period of time, group by method of payment.
														</p>														
													</td>
													<td class="span4">
													</td>
												</tr>


												<!-- <tr>
													
																										
																			
												</tr>
												<tr>
													
												
													
													
													
												</tr>
												<tr>
													
													
																										
													
													
												</tr>
												<tr>
																										
													
													<td class="span4" >
														<p>Lists individual unpaid invoices for each customer</p>
													</td>
												</tr>

												<tr>
													<td class="span4" >
														<h3><a href="#/customer_balance_summary" data-bind="text: lang.lang.customer_balance_summary"></a></h3>
													</td>
													
												</tr>
												
													
												</tr> -->

											</table>
										</div>
									</div>
									
									<div class=" span12  recevable-report" style="margin-top: 15px; display: inline-block; padding-left: 0;">
										<h2 data-bind="text: lang.lang.other_reports_lists"></h2>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4" >
														<h3><a href="#/customer_recurring" data-bind="text: lang.lang.recurring_customer_template_list"></a></h3>
													</td>
													<td class="span4" >
														<h3><a href="#/customer_setting" data-bind="text: lang.lang.payment_method_term_list"></a></h3>								
													</td>
													<td class="span4"></td>						
												</tr>
												<tr>
													<td class="span4">																				
													</td>
													<td class="span4" >
															List the types of payments and the term that determine due date for payment from customers.
														
													</td>
													<td class="span4"></td>															
												</tr>
											</table>
										</div>
									</div>
								</div>
				        	</div>

				        	<div class="tab-pane" id="tab-2">
					        	<div class="row-fluid">
					        		<div class="row-fluid sale-report">
										<h2 data-bind="text: lang.lang.expense_purchase_management_reports" style="text-transform: uppercase;"></h2>
										<p data-bind="text: lang.lang.the_following_reports_provide_summary_and_detailed_reports">
											The following reports provide summary and detailed reports in different ways to help analyze what 
											you spent and their impact on your cash flow and performance. 
										</p>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/expenses_purchase_summary_supplier" data-bind="text: lang.lang.expenses_purchase_summary_by_supplier"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/expenses_purchase_detail_supplier" data-bind="text: lang.lang.expeneses_purchase_detail_by_suppplier"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/suppliers_transaction_list" data-bind="text: lang.lang.suppliers_transaction_list"></a></h3>								
													</td>
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.summarizes_total_expenses_purchase_for_each">
															Summarizes total expenses/ purchase for each suppliers within a period of time.
														</p>																												
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_expenses_purchase_transactions_by">
															Lists individual expenses/ purchase transactions by date for each supplier within a period of time.
														</p>														
													</td>
													<td class="span4">
														<p data-bind="text: lang.lang.lists_of_all_transactions_related_to_and_grouped_by_each_suppliers">
															Lists of all transactions related to and grouped by each suppliers
														</p>													
													</td>
												</tr>
												<tr>
													<td class="span4">
														<h3><a href="#/purchase_summary_product_services" data-bind="text: lang.lang.purchase_summary_by_product_services"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/purchase_detail_product_services" data-bind="text: lang.lang.purchase_detail_by_product_services"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/deposit_detail_supplier" data-bind="text: lang.lang.deposit_detail_by_supplier"></a></h3>
													</td>
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.summarizes_total_expenses_purchase_for_each">
															Summarizes total expenses/ purchase for each product/ service within a period of time.
														</p>														
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_sale_transactions_by_date_for_each_product">
															Lists individual sale transactions by date for each product/ service with a period of time.
														</p>													
													</td>
													<td class="span4">
														<p data-bind="text: lang.lang.provides_detailed_information_about_supplier_deposit">
															Provides detailed information about supplier deposit for specific order, prepayment, or credit.
														</p>
													</td>
												</tr>
												<tr>
													<td class="span4">
														<h3><a href="#/open_purchase_order" data-bind="text: lang.lang.open_purchase_order"></a></h3>
													</td>
													<td class="span4"></td>
													<td class="span4"></td>
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_all_the_open_purchase_order_grouped_by_suppliers">
															Lists all the open purchase order grouped by suppliers including the original amount as well.
														</p>														
													</td>
													<td class="span4">
														<h3><a href="#/draft_list" style="text-transform: capitalize;">Draft List</a></h3>
													</td>
													<td class="span4"></td>
												</tr>
											</table>
										</div>
									</div>

									<div class="row-fluid recevable-report" style="margin-top: 15px; display: inline-block;">
										<h2 data-bind="text: lang.lang.payable_management_reports"></h2>
										<p data-bind="text: lang.lang.the_following_reports_provide_summary_and_detailed_reports">
											The following reports provide summary and detailed reports.
										</p>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/suppliers_balance_summary" data-bind="text: lang.lang.suppliers_balance_summary"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/suppliers_balance_detail" data-bind="text: lang.lang.suppliers_balance_detail"></a></h3>								
													</td>
													<td class="span4">
														<h3><a href="#/bill_payment_list" data-bind="text: lang.lang.bill_payment_list"></a></h3>
													</td>																			
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.show_each_supplier_total_outstanding_balances">
															Show each supplier’s total outstanding balances.
														</p>														
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_unpaid_bill_for_each_supplier">
															Lists individual unpaid bill for each supplier
														</p>													
													</td>
													<td class="span4">
														<p data-bind="text: lang.lang.lists_of_paid_bills_for_the_select_period_of_time_group_by_method_of_payments">
															Lists individual unpaid bills, grouped by suppliers. This includes due date, outstanding days (aging days), and amount.
														</p>														
													</td>																										
												</tr>												
												<tr>
													<td class="span4">
														<h3><a href="#/payables_aging_summary" data-bind="text: lang.lang.payables_aging_summary"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/payables_aging_detail" data-bind="text: lang.lang.payables_aging_detail"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/list_bills_paid" data-bind="text: lang.lang.list_of_bills_to_be_paid"></a></h3>
													</td>													
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_all_unpaid_bills_for_the_current_period_30_60_90_and_more">
															Lists all unpaid bills for the current period, 30, 60, 90, and more than 90 days, grouped by individual suppliers.
														</p> 														
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_unpaid_bills_grouped_by_suppliers_this_includes">
															Lists all unpaid invoices, grouped by Due today and Overdue.
														</p>
													</td>
													<td class="span4">
														<p data-bind="text: lang.lang.lists_of_paid_bills_for_the_select_period_of_time_group_by_method_of_payments">
															Lists of paid bills for the select period of time, group by method of payments.
														</p>													
													</td>
													
												</tr>						

											</table>
										</div>
									</div>

									<div class="row-fluid recevable-report">
										<h2 data-bind="text: lang.lang.other_reports_lists"></h2>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<!-- <td class="span4">
														<h3><a href="#/product_service_list">Product/ Service List</a></h3>
													</td> -->
													<td class="span4">
														<h3><a href="#/supplier_list" data-bind="text: lang.lang.supplier_list"></a></h3>								
													</td>
													<td class="span4">
														<h3><a href="#/customer_recurring" data-bind="text: lang.lang.recurring_supplier_template_list"></a></h3>								
													</td>
													<td class="span4">
													</td>						
												</tr>
												<tr>
													<!-- <td class="span4">
														Lists the products and services you purchase. The following information is included: name, 
															description, cost, sales price, and quantity on hand.
													</td> -->
													<td class="span4">
														<p data-bind="text: lang.lang.lists_of_all_active_suppliers">
															Lists of all active suppliers
														</p>
													</td>
													<td class="span4">
													</td>
													<td class="span4">
													</td>						
												</tr>												
											</table>
										</div>
									</div>
					        	</div>
				        	</div>

				        	<div class="tab-pane" id="tab-3">
					        	<div class="row-fluid">
					        		<div class="row-fluid sale-report">
										<h2 data-bind="text: lang.lang.inventory_position" style="text-transform: uppercase;"></h2>
										<p data-bind="text: lang.lang.the_following_reports_provide_summary_and_detailed_reports_on_the_position_of_inventory">
											The following reports provide summary and detailed reports on the position of inventory. 
										</p>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/inventory_position_summary" data-bind="text: lang.lang.inventory_position_summary"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/inventory_position_detail" data-bind="text: lang.lang.inventory_position_detail"></a></h3>
													</td>
													<td class="span4"></td>						
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.summarizes_each_inventory_balance_by_quantity_on_hand">
															Summarizes each inventory balance by quantity on hand, on purchase order and sale order. In addition, it also includes average cost and price.
														</p> 
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.lists_individual_inventory_movement_transactions_by_date_for_each_inventory_within_a_period_of_time">
															Lists individual inventory movement transactions by date for each inventory within a period of time.
														</p>
													</td>
													<td class="span4">
														<h3><a href="#/draft_list" style="text-transform: capitalize;">Draft List</a></h3>
													</td>
												</tr>
												<!-- <tr>													
													<td class="span4">
														<h3><a href="#/inventory_turnover_list">Inventory Turnover List</a></h3>
													</td>
												</tr>
												<tr>													
													<td class="span4">
														Provides analysis of inventory turnover days by each inventory.
													</td>
												</tr> -->
											</table>
										</div>
									</div>

									<div class="row-fluid recevable-report" style="margin-top: 15px; display: inline-block;">
										<h2 data-bind="text: lang.lang.inventory_movement_reports" style="text-transform: uppercase;"></h2>
										<p data-bind="text: lang.lang.the_following_reports_provide_summary_and_detailed_reports_on_the_movement_of_the_inventories">
											The following reports provide summary and detailed reports on the movement of the inventories
										</p>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/purchase_summary_product_services" data-bind="text: lang.lang.purchase_summary_by_product_services""></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/purchase_detail_product_services" data-bind="text: lang.lang.purchase_detail_by_product_services"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/sale_summary_by_customer" data-bind="text: lang.lang.sale_by_customer_summary"></a></h3>
													</td>					
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;">Lists all inventory purchases from each suppliers</p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;">Lists all inventory sold to each customer</p>
													</td>
													<td class="span4">
														<p >Lists of detailed inventory sale transactions to each customer</p>
													</td>
												</tr>
												
												<tr>													
													<td class="span4">
														<h3><a href="#/sale_detail_by_customer" data-bind="text: lang.lang.sale_by_customer_detail"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/sale_summary_by_product" data-bind="text:lang.lang.sale_summary_by_product_services"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/sale_detail_by_product" data-bind="text:lang.lang.sale_detail_by_product_services"></a></h3>
													</td>
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;">Lists of detailed inventory purchase transactions from each suppliers</p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;" data-bind="text: lang.lang.summarizes_total_sales_for_each_product">
															Summarizes total sales for each product/ service within a period of time. In addition, it also includes gross profit margin, quantity, amount, cost, and average prices.
														</p>
													</td>
													<td class="span4" style="vertical-align: top;">
														<p data-bind="text: lang.lang.lists_individual_sale_transactions">
															Lists individual sale transactions by date for each product/ service with a period of time.
														</p>
													</td>
												</tr>
											</table>
										</div>
									</div>
									<!-- <div class="span12 recevable-report" style="margin-top: 15px; display: inline-block; padding-left: 0;">
										<h2>OTHER REPORTS/ LISTS</h2>
										<p>
											The following reports provide summary and detailed reports on the movement of the inventories
										</p>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/inventory_list">Inventory List</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/">Recurring Inventory Template List</a></h3>
													</td>
													<td class="span4">								
													</td>						
												</tr>
												<tr>
													<td class="span4">
														Lists the products you purchase and sold. The following information is included: name, description, cost, sales price, and quantity on hand.		
													</td>
													<td class="span4">								
													</td>
													<td class="span4">								
													</td>
												</tr>
												
											</table>
										</div>
									</div> -->
					        	</div>
				        	</div>

				        	<div class="tab-pane" id="tab-4">
				        		<!-- <div align="center" style="min-height: 150px;">
				        			<h1 style="font-style: 30px; margin-top: 20px;">Coming Soon</h1>
				        		</div> -->
				        		<div class="row-fluid">
									<div class="row-fluid sale-report" style="margin-top: 15px;">
										<h2 data-bind="text: lang.lang.cash_position" style="text-transform: uppercase;"></h2>
										<p>
											The following reports provide summary and detailed reports on your cash position and related cash transactions.  
										</p>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/cash_movement" data-bind="text: lang.lang.cash_movement"></a></h3>
													</td>													
													<td class="span4">
														<h3><a href="#/collection_report" data-bind="text: lang.lang.cash_collection_report"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/bill_payment_list" data-bind="text: lang.lang.bill_payment_report"></a></h3>
													</td>
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;">List of detail movement transaction by each Cash & Cash Equivalent accounts</p> 
													</td>
													<td class="span4">
														<p style="padding-right: 25px;">Lists of collected invoices for the select period of time, group by method of payment.</p>
													</td>
													<td class="span4">
														<p>Lists of paid bills for the select period of time, group by method of payments.</p>
													</td>
												</tr>
												<tr>
													<td class="span4">
														<h3><a href="#/cash_advance_report" data-bind="text: lang.lang.cash_advance"></a></h3>
													</td>	
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;">List of detail movement transaction by each Cash Advance accounts</p>
													</td>
												</tr>
											</table>					
										</div>
									</div>									
					        	</div>						        	
					        	<!-- <div class="row-fluid">
									<div class="row-fluid sale-report" style="margin-top: 15px;">
										<h2>CASH POSITION</h2>
										<p>
											The following reports provide summary and detailed reports on employee related transactions.  
										</p>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/cash_position_report">Cash Position Report</a></h3>
													</td>
													<td class="span4">
														<h3>Cash Payment Report (Coming Soon)</h3>
													</td>
													<td class="span4">
														<h3>Cash Receipt Report (Coming Soon)</h3>
													</td>
												</tr>
												<tr>
													<td class="span4">
														Summarizes each inventory balance by quantity on hand, on purchase order and sale order. In addition, it also includes average cost and price. 
													</td>
													<td class="span4">
														Lists of all transactions related to and grouped by each inventory with analysis of average gross profit margin.
													</td>
													<td class="span4">
														Lists individual inventory movement transactions by date for each inventory within a period of time.
													</td>
												</tr>
												<tr>													
													<td class="span4">
														<h3>Reconciliation Report (Coming Soon)</h3>
													</td>
												</tr>
												<tr>													
													<td class="span4">
														List of all cash related reconciliation reports.
													</td>
												</tr>
											</table>					
										</div>
									</div>									
					        	</div> -->
				        	</div>

				        	<div class="tab-pane" id="tab-5">
					        	<div class="row-fluid">
					        		<div class="row-fluid sale-report">
										<h2 data-bind="text: lang.lang.period_end_closing_reports"></h2>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/journal_report" data-bind="text: lang.lang.journal_entry_report"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/general_ledger" data-bind="text: lang.lang.general_ledger"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/trial_balance" data-bind="text: lang.lang.trial_balance"></a></h3>
													</td>					
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;">Lists all accounting transactions within a period of time into debits and credits and displays them chronologically.</p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;">Groups all accounting transactions by each account in your chart of accounts within a period of time into debits, credits, and balances.</p>
													</td>
													<td class="span4">
														<p >Summarizes each account balance on your chart of accounts in the format of debit and credit within a period of time</p>
													</td>
												</tr>

												<!-- <tr>
													<td class="span4">
														<h3><a href="#/transaction_list_date">Transaction List by Date</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/recent_transactions_list">Recent Transactions List</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/">Period-End Closing Checklist</a></h3>
													</td>
												</tr>
												<tr>
													<td class="span4">
														This is similar with journal entry; however, it does not include debit and credit. In addition, it includes not financial transactions, such as sale order or purchase order.
													</td>
													<td class="span4">
														Lists all transaction recorded or edited within the last five days.
													</td>
													<td class="span4">
														
													</td>
												</tr> -->
											</table>
										</div>
									</div>									
					        	</div>

					        	<div class="span12 recevable-report" style="margin-top: 15px; display: inline-block; padding-left: 0;">
										<h2 data-bind="text: lang.lang.other_reports_lists"></h2>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/chart_of_account" data-bind="text: lang.lang.chart_of_account"></a></h3>
													</td>
													<td class="span4"></td>
													<td class="span4"></td>
													<!-- <td class="span4">
														<h3><a href="#/audit_trial_report">Audit Trial Report</a></h3>								
													</td>
													<td class="span4">
														<h3><a href="#/recurring_journal_list">Recurring Journal List</a></h3>							
													</td>	 -->					
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;">Lists of all accounts with name, type, and balance.</p>
													</td>
													<td class="span4"></td>
													<td class="span4"></td>
												</tr>
												<!-- <tr>
													<td class="span4">
														<h3><a href="#/">Realized Exchange Gains & Losses</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/">Unrealized Exchange Gains & Losses</a></h3>							
													</td>						
												</tr>
												<tr>
													<td class="span4">
														This detailed report lists foreign transactions that are closed (referred to as realized gains and losses) and totals the gains and losses due to changes in exchange rates.
													</td>
													<td class="span4">
														This summary report lists your foreign accounts and calculates the potential gain or loss for each account.
													</td>							
												</tr>			 -->									
											</table>
										</div>
									</div>

				        	</div>

				        	<div class="tab-pane" id="tab-6">
					        	<div class="row-fluid">

									<div class="row-fluid recevable-report" style="margin-top: 15px;">
										<h2 data-bind="text: lang.lang.financial_statements"></h2>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/statement_profit_loss" data-bind="text: lang.lang.statement_of_profit_or_loss"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/statement_financial_position" data-bind="text: lang.lang.statement_of_financial_position"></a></h3>								
													</td>
													<td class="span4">
														<h3><a href="#/statement_profit_loss_by_nature" data-bind="text: lang.lang.statement_of_profit_or_loss_by_nature"></a></h3>
													</td>					
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;">Provides the progress of your company’s financial performance, summarized in a record of income generated and expenses incurred over a given period in the format by functions of expenses.</p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;">Provides the snapshot of your company’s financial position on value and ownership. It is the relationship of the company’s assets, liabilities and equities as of a specific date.</p>
													</td>
													<td class="span4">
														<p style="padding-right: 25px;">Provides the progress of your company’s financial performance, summarized in a record of income generated and expenses incurred over a given period in the format by nature of expenses.</p>
													</td>													
												</tr>
												<!-- <tr>
													<td class="span4">
														<h3><a href="#/statement_financial_position_comparison">Statement of Financial Position Comparison</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/statement_cash_flow">Statement of Cash Flow</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/statement_changes_equity">Statement of Changes in Equity</a></h3>
													</td>
												</tr>
												<tr>
													<td class="span4">
														Shows cash generated by your company operating activities, cash spent on investing in your company assets long term asset, and cash in or out from your own share or financial institutions.
													</td>
													<td class="span4">
														Shows the movement of your paid-up capital, dividends, the effects of changes in accounting policies and corrections of errors recognized in the period, and the profit or loss for a reporting period
													</td>
													<td class="span4">
														Shows a year-over-year comparison of your financial position.
													</td>
												</tr> -->

											</table>
										</div>
									</div>

									

									
					        	</div>
				        	</div>

				        	<div class="tab-pane" id="tab-7">
				        		<div class="row-fluid">
					        		<div class="row-fluid sale-report">
										<h2 data-bind="text: lang.lang.segment_reports" style="text-transform: uppercase;"></h2>
										<p>
										</p>
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/journal_report_by_segment" data-bind="text: lang.lang.journal_entry_report_with_segment"></a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/general_ledger_by_segment">General Ledger With Segment</a></h3>
													</td>
													<td class="span4">
														<h3><a href="#/statement_profit_loss_by_segment">Statement of Profit or Loss With Segment</a></h3>
													</td>						
												</tr>
											</table>
										</div>
									</div>									
					        	</div>
				        	</div>

				        	<div class="tab-pane" id="tab-8">
				        		<!-- <div align="center" style="min-height: 150px;">
				        			<h1 style="font-style: 30px;margin-top: 20px;">Coming Soon</h1>
				        		</div> -->

				        		<div class="row-fluid">
									<div class="row-fluid sale-report" style="margin-top: 15px;">
										<h2>Job Tracking Reports</h2>
										<!-- <p>
											The following reports provide summary and detailed reports on your cash position and related cash transactions.  
										</p> -->
										<div class="row-fluid">
											<table class="span12">
												<tr>
													<td class="span4">
														<h3><a href="#/profitability_summary_job" data-bind="text: lang.lang.profitability_summary_by_job"></a></h3>
													</td>													
													<td class="span4">
														<h3><a href="#/profitability_detail_job" data-bind="text: lang.lang.profitability_detail_by_job"></a></h3>
													</td>
													<td class="span4">														
													</td>
												</tr>
												<tr>
													<td class="span4">
														<p style="padding-right: 25px;"></p>
													</td>													
													<td class="span4">
														<p style="padding-right: 25px;"></p>
													</td>
													<td class="span4">														
													</td>
												</tr>
											</table>					
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
</script>
<!--Cash Sale-->
<script id="cashSale" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
				    
			    	<span class="glyphicons no-js remove_2 pull-right" 
		    				onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>

			        <h2 data-bind="text: lang.lang.cash_sale"></h2>			    		   

				    <br>				   				
						
					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="box-generic well" style="height: 190px;">				
								<table class="table table-borderless table-condensed cart_total">									
									<tr>
										<td style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></td>
										<td>
											<input id="txtNumber" name="txtNumber" class="k-textbox" 
													data-bind="value: obj.number,
																disabled: obj.is_recurring,
																events:{change:checkExistingNumber}" 
													required data-required-msg="required" 
													placeholder="eg. ABC00001" style="width: 83%; float: left; margin-right: 5px;"" />
											<div style="padding-left: 0; width: 25px; float: left;">
												<a class="glyphicons no-js qrcode" data-bind="click: generateNumber" title="Generate Number" style="float: left; margin: 2px 0 0 0 ;"><i></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.date"></span></td>
										<td class="right">
											<input id="issuedDate" name="issuedDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd HH:mm:ss"
													data-bind="value: obj.issued_date, 
																events:{ change : setRate }" 
													required data-required-msg="required"
													style="width: 210px;" />
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.type"></span></td>
										<td>
											<input id="cbbType" name="cbbType"
												   data-role="dropdownlist"											                    
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="type"
								                   data-bind="value: obj.type,
								                              source: typeList,
								                              events:{ change: typeChanges }"
								                   required data-required-msg="required" style="width: 210px" />
										</td>
									</tr>								
									<tr>
										<td><span data-bind="text: lang.lang.customers"></span></td>
										<td>
											<input id="cbbContact" name="cbbContact"
												   data-role="dropdownlist"
												   data-header-template="contact-header-tmpl"
								                   data-template="contact-list-tmpl"
								                   data-auto-bind="false"
								                   data-value-primitive="false"
								                   data-filter="startswith"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.contact,
								                              source: contactDS,
								                              events: {change: contactChanges}"
								                   data-option-label="Select Customer..."
								                   required data-required-msg="required" style="width: 210px;" />
										</td>
									</tr>																															
								</table>

								<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
									data-bind="style: { backgroundColor: amtDueColor}">
									<div align="left"><span data-bind="text: lang.lang.amount_received"></span></div>
									<h2 data-bind="text: amount_due" align="right"></h2>
								</div>

							</div>						
						</div>					   

						<div class="span8">

							<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons adress_book"><a href="#tab2-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons circle_info"><a href="#tab3-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons link"><a href="#tab4-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons sort"><a href="#tab5-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab6-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons history"><a href="#tab7-7" data-toggle="tab"><i></i></a>
							            </li>
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab1-7">						            
							            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">							            
											<tr>
												<td>
													<span data-bind="text: lang.lang.balance"></span>
													<span data-bind="text: balance"></span>
												</td>
												<td>
													<span data-bind="text: lang.lang.credit_allowed"></span>
													<span data-format="n" data-bind="text: obj.credit_allowed"></span>
												</td>
											</tr>
											<tr>
								            	<td><span data-bind="text: lang.lang.payment_method"></span></td>				
												<td>
													<input data-role="dropdownlist"
								              				data-value-primitive="true"
								              				data-header-template="customer-payment-method-header-tmpl"
															data-text-field="name" 
								              				data-value-field="id"
								              				data-bind="value: obj.payment_method_id,
								              							source: paymentMethodDS"
								              				data-option-label="Select method..."							              				 
								              				style="width: 100%" />
												</td>
											</tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.cash_account"></span></td>
							            		<td>
							            			<input id="ddlCash" name="ddlCash"
							            				data-role="dropdownlist"
							            				data-header-template="account-header-tmpl"
							            				data-template="account-list-tmpl"
							              				data-value-primitive="true"
														data-text-field="name" 
							              				data-value-field="id"
							              				data-bind="value: obj.account_id,
							              							source: cashAccountDS"
							              				data-option-label="Select Account..." 
							              				required data-required-msg="required" 
							              				style="width: 100%" />
												</td>
								            </tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.trade_discount"></span></td>
							            		<td>
							            			<input id="ddlDiscountAccount" name="ddlDiscountAccount"
							            				data-role="dropdownlist"
							            				data-header-template="account-header-tmpl"
							            				data-template="account-list-tmpl"
							              				data-value-primitive="true"
														data-text-field="name" 
							              				data-value-field="id"
							              				data-bind="value: obj.discount_account_id,
							              							source: discountAccountDS"
							              				data-option-label="Select Account..." 
							              				required data-required-msg="required" 
							              				style="width: 100%" />
												</td>
								            </tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.check_no"></span></td>							            	
							            		<td>
													<input class="k-textbox" placeholder="type check number ..." data-bind="value: obj.check_no" style="width: 100%;">
												</td>							            	
								            </tr>
							            </table>						            
							        </div>
							        <!-- // Options Tab content END -->

							        <!-- Address Tab content -->
							        <div class="tab-pane" id="tab2-7">
							        	<span data-bind="text: lang.lang.billing_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>								
										
										<span data-bind="text: lang.lang.delivery_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea>	
												
							        </div>
							        <!-- // Address Tab content END -->

							        <!-- Info Tab content -->
							        <div class="tab-pane" id="tab3-7">
							        	
										<table class="table table-borderless table-condensed cart_total">
											<tr>
												<td><span data-bind="text: lang.lang.sale_rep"></span></td>
												<td>
													<input id="cbbContact" name="cbbContact"
														   data-role="dropdownlist"
														   data-header-template="employee-header-tmpl"
										                   data-template="contact-list-tmpl"
										                   data-auto-bind="false"
										                   data-value-primitive="false"
										                   data-filter="startswith"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.employee,
										                              source: employeeDS,
										                              events: {change: employeeChanges}"
										                   data-option-label="Select Sale Rep..."
										                   style="width: 100%;" />
												</td>
											</tr>
											<tr>
												<td><span data-bind="text: lang.lang.job"></span></td>
												<td>
													<input id="ddlJob" name="ddlJob"
														   data-role="dropdownlist"
														   data-header-template="job-header-tmpl"
														   data-template="job-list-tmpl"
														   data-auto-bind="false"				                
										                   data-value-primitive="true"	   
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.job_id, 
										                   			source: jobDS"
										                   data-option-label="Add job..." 
										                   style="width: 100%" />										
												</td>
											</tr>											
							            </table>
												
							        </div>
							        <!-- // Info Tab content END -->

							        <!-- References -->
							        <div class="tab-pane" id="tab4-7">
							            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">											
								            <tr>
												<td style="vertical-align: top;">
								            		<span data-bind="text: lang.lang.reference"></span>
								            	</td>
								            	<td>
								            		<input data-role="dropdownlist"
								            			   data-item-template="reference-list-tmpl"
										                   data-auto-bind="false"
										                   data-value-primitive="true"
										                   data-text-field="number"
										                   data-value-field="id"
										                   data-bind="value: reference_id,
										                              source: referenceDS,
										                              events: { change: referenceChanges }"
										                   data-option-label="Add Reference..."
										                   style="width: 100%;" />
										            <br>
										            <table class="table table-bordered">
												        <tbody data-template="cashSale-reference-template"
												        		data-bind="source: referenceList"></tbody>			        
												    </table>
												</td>
											</tr>
							            </table>
							        </div>
							        <!-- // References END -->

							        <!-- Segment -->
							        <div class="tab-pane" id="tab5-7">

							        	<input id="cbbSegment" name="cbbSegment"
							        		   data-role="combobox"
							                   data-value-primitive="true"
							                   data-filter="startswith"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: segment_id,
							                              source: segmentDS"
							                   data-placeholder="Select segment..."
							                   style="width: 46%" />

							            <input id="cbbSegmentItem" name="cbbSegmentItem"
							            	   data-role="combobox"
							            	   data-cascade-from="cbbSegment"
							            	   data-cascade-from-field="segment_id"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-auto-bind="false"
							                   data-bind="value: segmentitem_id,
							                              source: segItemDS"
							                   data-placeholder="Select segment item..."
							                   style="width: 46%" />

							            <button class="btn btn-inverse" data-bind="click: addSegmentItem"><i class="icon-plus icon-white"></i></button>

							            <br><br>

							            <div data-role="grid" class="costom-grid"
							            	 data-editable="true"
							                 data-columns="[
							                 	{ field: 'segment', 
							                 		title: 'SEGMENT',
							                 		editable: 'false',
							                 		template: '#=segment.name#'
							                 	},
							                 	{ field: 'name', 
							                 		title: 'SEGMENT ITEM',
							                 		editable: 'false',
							                 		template: '#=code# #=name#'
							                 	},
							                 	{ command: 'destroy', title: '&nbsp;', width: 150 }
					                         ]"
					                         data-auto-bind="false"
							                 data-bind="source: segmentItemDS"></div>

							        </div>
							        <!-- // Segment END -->

							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab6-7">

							        	<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>		
							            <input id="files" name="files"
							                   type="file"
							                   data-role="upload"
							                   data-show-file-list="false"
							                   data-bind="events: { 
					                   				select: onSelect
							                   }">

							            <table class="table table-bordered">
									        <thead>
									            <tr>			                
									                <th><span data-bind="text: lang.lang.file_name"></span></th>
									                <th><span data-bind="text: lang.lang.description"></span></th>
									                <th><span data-bind="text: lang.lang.date"></span></th>
									                <th style="width: 13%;"></th>                			                
									            </tr> 
									        </thead>
									        <tbody data-role="listview" 
									        		data-template="attachment-list-tmpl" 
									        		data-auto-bind="false"
									        		data-bind="source: attachmentDS"></tbody>			        
									    </table>

							        </div>
							        <!-- // Attach Tab content END -->						        

							        <!-- Recuring Tab content -->
							        <div class="tab-pane" id="tab7-7">							            	
							            
							            <table style="width: 100%" class="table borderless">
							            	<tr align="right">
							            		<td style="border-top: 0;">
							            			<span data-bind="text: lang.lang.name"></span>
							            		</td>
							            		<td style="border-top: 0;">
							            			<input id="txtRecurringName" name="txtRecurringName"
							            					class="k-textbox" 
							            					data-bind="value: obj.recurring_name" 
							            					placeholder="Recurring name.." 
							            					style="width: 43%; " />

							            			<span data-bind="text: lang.lang.start"></span>

									                <input data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd"
															data-bind="value: obj.start_date"
															style="width: 40%; " />
							            		</td>
							            	</tr>
							            	<tr align="right">
							            		<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.every"></span>
								            	</td>
							            		<td style="border-top: 0;">
								            		<input data-role="numerictextbox"
									                   data-format="n0"
									                   data-min="0"								                   
									                   data-bind="value: obj.interval"
									                   style="width: 45%; " />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.frequency,
										                              source: frequencyList,
										                              events: { change: frequencyChanges }"
										                   style="width: 45%;" />
								            	</td>
							            	</tr>
								            <tr align="right">
								            	<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.on"></span>
								            	</td>							            	
								            	<td style="border-top: 0;">

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month,
										                   			  visible: showMonth,
										                              source: monthList"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month_option,
										                   			  visible: showMonthOption,
										                              source: monthOptionList,
										                              events: { change: monthOptionChanges }"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.week,
										                   			  visible: showWeek,
										                              source: weekDayList"										                  
										                   style="width: 45%;" />										            
										        
								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.day,
										                   			  visible: showDay,
										                              source: dayList"										                   
										                   style="width: 45%;" />

								            	</td>
								            </tr>
							            </table>

							            <span id="saveRecurring" class="btn btn-icon btn-default glyphicons history" data-bind="visible: obj.isNew" style="float: right; margin-top: -12px;"><i></i> <span data-bind="text: lang.lang.save_recurring"></span></span>								     
							            
							        </div>
							        <!-- // Recuring Tab content END -->						        								        

							        <div class="tab-pane saleSummaryCustomer" id="tab5-6">
										<table class="table table-borderless table-condensed">
									        <thead>
									            <tr>
									                <th>NUMBER</th>
									                <th>ACCOUNT</th>                		                
									                <th class="right">DEBITS (Dr)</th>
									                <th class="right">CREDITS (Cr)</th>		                
									            </tr>
									        </thead> 
									        <tbody>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        </tbody>			        
									    </table>
									</div>

							    </div>
							</div>

					    </div>
					</div>

					<!-- Item List -->
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
						        	var rowIndex = banhji.cashSale.lineDS.indexOf(dataItem)+1;
						        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
						      	}
						    },
		                 	{ field: 'item', title: 'PRODUCTS/SERVICES', editor: itemEditor, template: '#=item.name#', width: '170px' },
                            { field: 'description', title:'DESCRIPTION', width: '250px' },                            
                            {
							    field: 'quantity',
							    title: 'QTY',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
                            { field: 'measurement', title: 'UOM', editor: measurementEditor, template: '#=measurement.measurement#', width: '80px' },
                            {
							    field: 'price',
							    title: 'PRICE',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
							{
							    field: 'discount',
							    title: 'DISCOUNT VALUE',
							    hidden: true,
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
							{
							    field: 'discount_percentage',
							    title: 'DISCOUNT %',
							    hidden: true,
							    format: '{0:p}',
							    editor: discountEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
                            { field: 'amount', title:'AMOUNT', format: '{0:n}', editable: 'false', attributes: { style: 'text-align: right;' }, width: '120px' },                            
                            { field: 'tax_item', title:'TAX', editor: taxForSaleEditor, template: '#=tax_item.name#', width: '90px' }
                         ]"
                         data-auto-bind="false"
		                 data-bind="source: lineDS" ></div>
									
		            <!-- Bottom part -->
		            <div class="row-fluid">
			
						<!-- Column -->
						<div class="span4">
							<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>												

							<!-- Add New Item -->
							<ul class="topnav addNew">
								<li role="presentation" class="dropdown ">
							  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							  			<span data-bind="text: lang.lang.add_new_item"></span>
				    					<span class="caret"></span>
							  		</a>
						  			<ul class="dropdown-menu addNewItem">  				  				
						  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
						  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>
						  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
						  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li> 	
						  			</ul>
							  	</li>				
							</ul>
							<!--End Add New Item -->
							
							<br><br>
							<div class="well">
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
								<br>						
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
							</div>
						</div>
						<!-- Column END -->

						<!-- Column -->
						<div class="span4" align="center">
							<div data-bind="visible: isEdit" style="margin-top: 10%;">
								<h2 data-bind="text: statusObj.text" style="text-transform: uppercase;"></h2>
								<p data-bind="text: statusObj.date"></p>
								<a data-bind="text: statusObj.number,
											attr: { href: statusObj.url }"></a>
							</div>
						</div>
						<!-- Column END -->
						
						<!-- Column -->
						<div class="span4">
							<table class="table table-condensed table-striped table-white">
								<tbody>
									<tr>
										<td class="right" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
										<td class="right" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
									</tr>								
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_discount"></span></td>
										<td class="right"><span data-format="n" data-bind="text: obj.discount"></span></td>
									</tr>
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_tax"></span></td>
										<td class="right"><span data-format="n" data-bind="text: obj.tax"></span></td>
									</tr>						
									<tr>
										<td class="right" ><h4 data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
										<td class="right" ><h4 data-bind="text: total" style=" font-weight: 700;"></h4></td>
									</tr>
									<tr>
										<td class="right">
											<span data-bind="text: lang.lang.deposit"></span>
											<span data-format="n" data-bind="text: total_deposit"></span>										
										</td>
										<td class="right">
											<input data-role="numerictextbox"
								                   data-format="n"
								                   data-spinners="false"
								                   data-min="0"							                                      
								                   data-bind="value: obj.deposit,
								                              events: { change: changes }"
								                   style="width: 90%; text-align: right;">
										</td>
									</tr>
									<tr>
										<td class="right">
											<span data-bind="text: lang.lang.remaining" style="font-size: 15px; font-weight: 700;"></span>
										</td>
										<td class="right">
											<span data-format="n" data-bind="text: obj.remaining" style="font-size: 15px; font-weight: 700;"></span>
										</td>
									</tr>								
								</tbody>
							</table>
						</div>
						<!-- // Column END -->
						
					</div>	           
					
					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>

						<!-- Delete Confirmation -->
						<div data-role="window"
			                 data-title="Delete Confirmation"
			                 data-width="350"
			                 data-height="200"
			                 data-iframe="true"
			                 data-modal="true"
			                 data-visible="false"
			                 data-position="{top:'40%',left:'35%'}"
			                 data-actions="{}"
			                 data-resizable="false"
			                 data-bind="visible: showConfirm"
			                 style="text-align:center;">
			                <p style="font-size:25px; margin: 15px 0 25px;" class="delete-message" data-bind="text: confirmMessage"></p>
						    <button style="font-size:14px; border:none; background:#496cad; color:#fff; padding:5px 25px;" data-bind="click:delete">Yes</button> 
						    <button style="font-size:14px; border:none; background:red; color:#fff; padding:5px 25px;" data-bind="click:closeConfirm">No</button>
			            </div>
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span4" style="padding-left: 15px;">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.transaction_template_id,
					                              source: txnTemplateDS"
					                   data-option-label="Select Template..." />
								
							</div>
							<div class="span8" align="right">
								<span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
								<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
								<span role='presentation' class='dropdown btn-btn' style="padding: 0 0 0 15px; float: right; height: 32px; line-height: 30px;">
							  		<a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
							  			<span data-bind="text: lang.lang.save_option"></span>
							  			<span class="small-btn"><i class='caret '></i></span>
							  		</a>
							  		<ul class='dropdown-menu'>
						  				<li id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></li>
						  				<li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li>
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft1" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_draft"></span></span>
							</div>
						</div>
					</div>
					<!-- // Form actions END -->								

				</div>							
			</div>
		</div>
	</div>
</script>
<script id="cashSale-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">		
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.cashSale.lineDS.indexOf(data)+1#			
		</td>		
		<td>
			<input id="ccbItem" name="ccbItem-#:uid#"
				   data-role="combobox"
				   data-template="item-list-tmpl"
				   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-filter="contains"
                   data-min-length="3"
                   data-bind="value: item_id, 
                   			  source: itemDS,
                   			  events:{ change: itemChanges }"
                   placeholder="Add Item..." 
                   required data-required-msg="required" style="width: 100%" />			
		</td>		
		<td>
			<input id="txtDescription-#:uid#" name="txtDescription-#:uid#" 
					type="text" class="k-textbox" 
					data-bind="value: description"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>
			<input id="txtQuantity-#:uid#" name="txtQuantity-#:uid#"
				   type="number" class="k-textbox"
				   min="0"
			       data-bind="value: quantity, events: {change : changes}"
			       required data-required-msg="required"
			       placeholder="Qty..." 
			       style="text-align: right; width: 40%;" />

			<input id="ddlMesurement" name="ddlMesurement"
				   data-role="dropdownlist"
				   data-header-template="item-measurement-header-tmpl"
				   data-value-primitive="true"                  
                   data-text-field="measurement"
                   data-value-field="measurement_id"
                   data-bind="value: measurement_id,
                   			  source: item_prices,
                   			  events:{ change: measurementChanges }"
                   data-option-label="UM"
                   style="width: 57%;" />
		</td>					
		<td>
			<input id="txtPrice-#:uid#" name="txtPrice-#:uid#"
				   type="number" class="k-textbox"
				   min="0"
			       data-bind="value: price, events: {change : changes}"
			       required data-required-msg="required"
			       placeholder="Price..." 
			       style="text-align: right; width: 100%;" />
		</td>
		<td class="center" data-bind="visible: showDiscount">
			<input data-role="numerictextbox"
                   data-format="p0"
                   data-min="0"
                   data-max="0.99"
                   data-step="0.1"                   
                   data-bind="value: discount,
                              events: { change: changes }"
                   style="width: 65px;">			
		</td>				
		<td class="right">
			<span data-format="n" data-bind="text: amount"></span> 						
		</td>
		<td>
			<input id="ccbTaxItem" name="ccbTaxItem-#:uid#"
				   data-role="combobox"
				   data-header-template="tax-header-tmpl"				     
				   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: tax_item_id, 
                   			  source: taxItemDS,
                   			  events:{ change: changes }"
                   style="width: 100%" />			
		</td>				
    </tr>   
</script>
<script id="cashSale-reference-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<i class="icon-trash" data-bind="events: { click: referenceRemoveRow }"></i>
			#=number#
		</td>
		<td align="right">#=kendo.toString(amount, "c2", locale)#</td>
    </tr>   
</script>
<!--Invoice-->
<script id="invoice" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">
				    
			    	<span class="glyphicons no-js remove_2 pull-right"
							data-bind="click: cancel"><i></i></span>

			        <h2 data-bind="text: lang.lang.invoice"></h2>

				    <br>
						
					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="box-generic well" style="height: 190px;">				
								<table class="table table-borderless table-condensed cart_total">
									<tr>
										<td style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></td>
										<td>
											<input id="txtNumber" name="txtNumber" class="k-textbox" 
													data-bind="value: obj.number,
														disabled: obj.is_recurring,
														events:{change:checkExistingNumber}" 
													required data-required-msg="required" 
													placeholder="eg. ABC00001" style="width: 83%; float: left; margin-right: 5px;"" />
											<div style="padding-left: 0; width: 25px; float: left;">
												<a class="glyphicons no-js qrcode" data-bind="click: generateNumber" title="Generate Number" style="float: left; margin: 2px 0 0 0 ;"><i></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.date"></span></td>
										<td class="right">
											<input id="issuedDate" name="issuedDate" 
													data-role="datepicker"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd HH:mm:ss"
													data-bind="value: obj.issued_date, 
																events:{ change : setRate }" 
													required data-required-msg="required"
													style="width: 210px;" />
										</td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.type"></span></td>
										<td>
											<input id="cbbType" name="cbbType"
												   data-role="dropdownlist"											                    
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="type"
								                   data-bind="value: obj.type,
								                              source: typeList,
								                              events:{ change: typeChanges }"
								                   required data-required-msg="required" style="width: 210px" />
										</td>
									</tr>								
									<tr>
										<td><span data-bind="text: lang.lang.customers"></span></td>
										<td>
											<input id="cbbContact" name="cbbContact"
												   data-role="dropdownlist"
												   data-header-template="contact-header-tmpl"
								                   data-template="contact-list-tmpl"
								                   data-auto-bind="false"
								                   data-value-primitive="false"
								                   data-filter="startswith"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.contact,
								                              source: contactDS,
								                              events: {change: contactChanges}"
								                   data-option-label="Select Customer..."
								                   required data-required-msg="required" style="width: 210px;" />
										</td>
									</tr>
								</table>

								<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
									data-bind="style: { backgroundColor: amtDueColor}">
									<div align="left"><span data-bind="text: lang.lang.amount_due"></span></div>
									<h2 data-bind="text: amount_due" align="right"></h2>
								</div>

							</div>						
						</div>

						<div class="span8">

							<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons adress_book"><a href="#tab2-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons circle_info"><a href="#tab3-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons link"><a href="#tab4-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons sort"><a href="#tab5-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab6-7" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons history"><a href="#tab7-7" data-toggle="tab"><i></i></a>
							            </li>
							            <!-- <li class="span1 glyphicons show_liness"><a href="#tab6-6" data-toggle="tab"><i></i></a></li> -->
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options -->
							        <div class="tab-pane active" id="tab1-7">
							            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">
											<tr>
												<td>
													<span data-bind="text: lang.lang.balance"></span>
													<span data-bind="text: balance"></span>
												</td>
												<td>
													<span data-bind="text: lang.lang.credit_allowed"></span>
													<span data-format="n" data-bind="text: obj.credit_allowed"></span> 
												</td>
											</tr>
											<tr>
								            	<td>
								            		<span data-bind="text: lang.lang.term"></span>
								            	</td>
												<td>
													<input data-role="dropdownlist"
								              				data-value-primitive="true"
															data-text-field="name" 
								              				data-value-field="id"
								              				data-header-template='customer-term-header-tmpl'
								              				data-bind="value: obj.payment_term_id,
								              							source: paymentTermDS,
								              							events:{ change: setTerm }"
								              				data-option-label="Select Term..." 
								              				style="width: 100%" />
												</td>
											</tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.due_date"></span></td>
								            	<td>
								            		<input id="txtDueDate" name="txtDueDate" 
															data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd" 
															data-bind="value: obj.due_date" 
															required data-required-msg="required"
															style="width:100%;" />
								            	</td>
								            </tr>
								            <tr>
								            	<td><span data-bind="text: lang.lang.payment_method"></span></td>				
												<td>
													<input data-role="dropdownlist"
								              				data-value-primitive="true"
								              				data-header-template="customer-payment-method-header-tmpl"
															data-text-field="name" 
								              				data-value-field="id"
								              				data-bind="value: obj.payment_method_id,
								              							source: paymentMethodDS"
								              				data-option-label="Select method..."							              				 
								              				style="width: 100%" />
												</td>
											</tr>
											<tr>
								            	<td><span data-bind="text: lang.lang.trade_discount"></span></td>
							            		<td>
							            			<input id="ddlDiscountAccount" name="ddlDiscountAccount"
							            				data-role="dropdownlist"
							            				data-header-template="account-header-tmpl"
							            				data-template="account-list-tmpl"
							              				data-value-primitive="true"
														data-text-field="name" 
							              				data-value-field="id"
							              				data-bind="value: obj.discount_account_id,
							              							source: discountAccountDS"
							              				data-option-label="Select Account..." 
							              				required data-required-msg="required" 
							              				style="width: 100%" />
												</td>
								            </tr>
							            </table>
							        </div>
							        <!-- // Options END -->

							        <!-- Address -->
							        <div class="tab-pane" id="tab2-7">
							        	<span data-bind="text: lang.lang.billing_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>								
										
										<span data-bind="text: lang.lang.delivery_address"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea>	

							        </div>
							        <!-- // Address END -->

							        <!-- Info -->
							        <div class="tab-pane" id="tab3-7">
							        	
										<table class="table table-borderless table-condensed cart_total">
								            <tr>
												<td><span data-bind="text: lang.lang.sale_rep"></span></td>
												<td>
													<input id="cbbContact" name="cbbContact"
														   data-role="dropdownlist"
														   data-header-template="employee-header-tmpl"
										                   data-template="contact-list-tmpl"
										                   data-auto-bind="false"
										                   data-value-primitive="false"
										                   data-filter="startswith"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.employee,
										                              source: employeeDS,
										                              events: {change: employeeChanges}"
										                   data-option-label="Select Sale Rep..."
										                   style="width: 100%;" />
												</td>
											</tr>
											<tr>
												<td><span data-bind="text: lang.lang.job"></span></td>
												<td>
													<input id="ddlJob" name="ddlJob"
														   data-role="dropdownlist"
														   data-header-template="job-header-tmpl"
														   data-template="job-list-tmpl"
														   data-auto-bind="false"				                
										                   data-value-primitive="true"									                   				   
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.job_id, 
										                   			source: jobDS"
										                   data-option-label="Add job..." 
										                   style="width: 100%" />										
												</td>
											</tr>											
							            </table>

							        </div>
							        <!-- // Info END -->

							        <!-- References -->
							        <div class="tab-pane" id="tab4-7">
							            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">											
								            <tr>
												<td style="vertical-align: top;">
								            		<span data-bind="text: lang.lang.reference"></span>
								            	</td>
								            	<td>
								            		<input data-role="dropdownlist"
								            			   data-item-template="reference-list-tmpl"
										                   data-auto-bind="false"
										                   data-value-primitive="true"
										                   data-text-field="number"
										                   data-value-field="id"
										                   data-bind="value: reference_id,
										                              source: referenceDS,
										                              events: { change: referenceChanges }"
										                   data-option-label="Add Reference..."
										                   style="width: 100%;" />
										            <br>
										            <table class="table table-bordered">
												        <tbody data-template="invoice-reference-template"
												        		data-bind="source: referenceList"></tbody>			        
												    </table>
												</td>
											</tr>
							            </table>
							        </div>
							        <!-- // References END -->

							        <!-- Segment -->
							        <div class="tab-pane" id="tab5-7">

							        	<input id="cbbSegment" name="cbbSegment"
							        		   data-role="combobox"
							                   data-value-primitive="true"
							                   data-filter="startswith"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: segment_id,
							                              source: segmentDS"
							                   data-placeholder="Select segment..."
							                   style="width: 46%" />

							            <input id="cbbSegmentItem" name="cbbSegmentItem"
							            	   data-role="combobox"
							            	   data-cascade-from="cbbSegment"
							            	   data-cascade-from-field="segment_id"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-auto-bind="false"
							                   data-bind="value: segmentitem_id,
							                              source: segItemDS"
							                   data-placeholder="Select segment item..."
							                   style="width: 46%" />

							            <button class="btn btn-inverse" data-bind="click: addSegmentItem"><i class="icon-plus icon-white"></i></button>

							            <br><br>

							            <div data-role="grid" class="costom-grid"
							            	 data-editable="true"
							                 data-columns="[
							                 	{ field: 'segment', 
							                 		title: 'SEGMENT',
							                 		editable: 'false',
							                 		template: '#=segment.name#'
							                 	},
							                 	{ field: 'name', 
							                 		title: 'SEGMENT ITEM',
							                 		editable: 'false',
							                 		template: '#=code# #=name#'
							                 	},
							                 	{ command: 'destroy', title: '&nbsp;', width: 150 }
					                         ]"
					                         data-auto-bind="false"
							                 data-bind="source: segmentItemDS"></div>

							        </div>
							        <!-- // Segment END -->

							        <!-- Attach -->
							        <div class="tab-pane" id="tab6-7">

							        	<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>		
							            <input id="files" name="files"
							                   type="file"
							                   data-role="upload"
							                   data-show-file-list="false"
							                   data-bind="events: { 
					                   				select: onSelect
							                   }">

							            <table class="table table-bordered">
									        <thead>
									            <tr>			                
									                <th><span data-bind="text: lang.lang.file_name"></span></th>
									                <th><span data-bind="text: lang.lang.description"></span></th>
									                <th><span data-bind="text: lang.lang.date"></span></th>
									                <th style="width: 13%;"></th>                			                
									            </tr> 
									        </thead>
									        <tbody data-role="listview" 
									        		data-template="attachment-list-tmpl" 
									        		data-auto-bind="false"
									        		data-bind="source: attachmentDS"></tbody>			        
									    </table>

							        </div>
							        <!-- // Attach END -->

							        <!-- Recuring -->
							        <div class="tab-pane" id="tab7-7">
							            
							            <table style="width: 100%" class="table borderless">
							            	<tr align="right">
							            		<td style="border-top: 0;">
							            			<span data-bind="text: lang.lang.name"></span>
							            		</td>
							            		<td style="border-top: 0;">
							            			<input id="txtRecurringName" name="txtRecurringName"
							            					class="k-textbox" 
							            					data-bind="value: obj.recurring_name" 
							            					placeholder="Recurring name.." 
							            					style="width: 43%; " />

							            			<span data-bind="text: lang.lang.start"></span>

									                <input data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd"
															data-bind="value: obj.start_date"
															style="width: 40%; " />
							            		</td>
							            	</tr>
							            	<tr align="right">
							            		<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.every"></span>
								            	</td>
							            		<td style="border-top: 0;">
								            		<input data-role="numerictextbox"
									                   data-format="n0"
									                   data-min="0"								                   
									                   data-bind="value: obj.interval"
									                   style="width: 45%; " />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.frequency,
										                              source: frequencyList,
										                              events: { change: frequencyChanges }"
										                   style="width: 45%;" />
								            	</td>
							            	</tr>
								            <tr align="right">
								            	<td style="border-top: 0;">
								            		<span data-bind="text: lang.lang.on"></span>
								            	</td>							            	
								            	<td style="border-top: 0;">

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month,
										                   			  visible: showMonth,
										                              source: monthList"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.month_option,
										                   			  visible: showMonthOption,
										                              source: monthOptionList,
										                              events: { change: monthOptionChanges }"										                   
										                   style="width: 45%;" />

								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.week,
										                   			  visible: showWeek,
										                              source: weekDayList"										                  
										                   style="width: 45%;" />										            
										        
								            		<input data-role="dropdownlist"									                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.day,
										                   			  visible: showDay,
										                              source: dayList"										                   
										                   style="width: 45%;" />

								            	</td>
								            </tr>
							            </table>

							            <span id="saveRecurring" class="btn btn-icon btn-default glyphicons history" data-bind="visible: obj.isNew" style="float: right; margin-top: -12px;"><i></i> <span data-bind="text: lang.lang.save_recurring"></span></span>									     
							            
							        </div>
							        <!-- // Recuring END -->

							        <div class="tab-pane saleSummaryCustomer" id="tab5-6">
										<table class="table table-borderless table-condensed">
									        <thead>
									            <tr>
									                <th>NUMBER</th>
									                <th>ACCOUNT</th>                		                
									                <th class="right">DEBITS (Dr)</th>
									                <th class="right">CREDITS (Cr)</th>		                
									            </tr>
									        </thead> 
									        <tbody>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        </tbody>			        
									    </table>
									</div>

							    </div>
							</div>

					    </div>
					</div>

					<!-- Item List -->
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
						        	var rowIndex = banhji.invoice.lineDS.indexOf(dataItem)+1;
						        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
						      	}
						    },
		                 	{ field: 'item', title: 'PRODUCTS/SERVICES', editor: itemEditor, template: '#=item.name#', width: '170px' },
                            { field: 'description', title:'DESCRIPTION', width: '250px' },                            
                            {
							    field: 'quantity',
							    title: 'QTY',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
                            { field: 'measurement', title: 'UOM', editor: measurementEditor, template: '#=measurement.measurement#', width: '80px' },
                            {
							    field: 'price',
							    title: 'PRICE',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
							{
							    field: 'discount',
							    title: 'DISCOUNT VALUE',
							    hidden: true,
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
							{
							    field: 'discount_percentage',
							    title: 'DISCOUNT %',
							    hidden: true,
							    format: '{0:p}',
							    editor: discountEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
                            { field: 'amount', title:'AMOUNT', format: '{0:n}', editable: 'false', attributes: { style: 'text-align: right;' }, width: '120px' },                            
                            { field: 'tax_item', title:'TAX', editor: taxForSaleEditor, template: '#=tax_item.name#', width: '90px' }
                         ]"
                         data-auto-bind="false"
		                 data-bind="source: lineDS" ></div>

		            <!-- Bottom part -->
		            <div class="row-fluid">
			
						<!-- Column -->
						<div class="span4">
							<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>

							<!-- Add New Item -->
							<ul class="topnav addNew">
								<li role="presentation" class="dropdown ">
							  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							  			<span data-bind="text: lang.lang.add_new_item"></span>
				    					<span class="caret"></span>
							  		</a>
						  			<ul class="dropdown-menu addNewItem">  				  				
						  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
						  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>
						  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
						  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li>  	
						  			</ul>
							  	</li>				
							</ul>
							<!--End Add New Item -->
							
							<br><br>
							<div class="well">
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo" placeholder="Message ..."></textarea>
								<br>						
								<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.note" placeholder="Note ..."></textarea>
							</div>
						</div>
						<!-- Column END -->
						
						<!-- Column -->
						<div class="span4" align="center">
							<div data-bind="visible: isEdit" style="margin-top: 10%;">
								<h2 data-bind="text: statusObj.text" style="text-transform: uppercase;"></h2>
								<p data-bind="text: statusObj.date"></p>
								<a data-bind="text: statusObj.number,
											attr: { href: statusObj.url }"></a>
							</div>
						</div>
						<!-- Column END -->

						<!-- Column -->
						<div class="span4">
							<table class="table table-condensed table-striped table-white">
								<tbody>
									<tr>
										<td class="right" style="width: 60%"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
										<td class="right"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
									</tr>								
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_discount"></span></td>
										<td class="right"><span data-format="n" data-bind="text: obj.discount"></span></td>
									</tr>
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_tax"></span></td>
										<td class="right"><span data-format="n" data-bind="text: obj.tax"></span></td>
									</tr>
									<tr>
										<td class="right"><h4 span data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
										<td class="right"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
									</tr>
									<tr>
										<td class="right">
											<span data-bind="text: lang.lang.deposit"></span>
											<span data-format="n" data-bind="text: total_deposit"></span>										
										</td>
										<td class="right">
											<input data-role="numerictextbox"
								                   data-format="n"
								                   data-spinners="false"
								                   data-min="0"							                                      
								                   data-bind="value: obj.deposit,
								                              events: { change: changes }"
								                   style="width: 90%; text-align: right;">
										</td>
									</tr>
									<tr>
										<td class="right">
											<span data-bind="text: lang.lang.remaining" style="font-size: 15px; font-weight: 700;"></span>
										</td>
										<td class="right">
											<span data-format="n" data-bind="text: obj.remaining" style="font-size: 15px; font-weight: 700;"></span>
										</td>
									</tr>								
								</tbody>
							</table>
						</div>
						<!-- // Column END -->
						
					</div>
					
					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>

						<!-- Delete Confirmation -->
						<div data-role="window"
			                 data-title="Delete Confirmation"
			                 data-width="350"
			                 data-height="200"
			                 data-iframe="true"
			                 data-modal="true"
			                 data-visible="false"
			                 data-position="{top:'40%',left:'35%'}"
			                 data-actions="{}"
			                 data-resizable="false"
			                 data-bind="visible: showConfirm"
			                 style="text-align:center;">
			                <p style="font-size:25px; margin: 15px 0 25px;" class="delete-message" data-bind="text: confirmMessage"></p>
						    <button style="font-size:14px; border:none; background:#496cad; color:#fff; padding:5px 25px;" data-bind="click:delete"><span data-bind="text: lang.lang.yes"></span></button> 
						    <button style="font-size:14px; border:none; background:red; color:#fff; padding:5px 25px;" data-bind="click:closeConfirm"><span data-bind="text: lang.lang.no"></span></button>
			            </div>
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span4" style="padding-left: 15px;">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.transaction_template_id,
					                              source: txnTemplateDS"
					                   data-option-label="Select Template..." />
								
							</div>
							<div class="span8" align="right">
								<span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
								<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
								<span role='presentation' class='dropdown btn-btn' style="padding: 0 0 0 15px; float: right; height: 32px; line-height: 30px;">
							  		<a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
							  			<span data-bind="text: lang.lang.save_option"></span>
							  			<span class="small-btn"><i class='caret '></i></span>
							  		</a>
							  		<ul class='dropdown-menu'>
						  				<li id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></li>
						  				<li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li>
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft1" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_draft"></span></span>
							</div>
						</div>
					</div>
					<!-- // Form actions END -->

				</div>
			</div>
		</div>
	</div>
</script>
<script id="invoice-reference-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<i class="icon-trash" data-bind="events: { click: referenceRemoveRow }"></i>
			#=number#
		</td>
		<td align="right">
			#if(type=="GDN"){# 
				#=kendo.toString(amount, "n2")#
			#}else{#
				#=kendo.toString(amount, "c2", locale)#
			#}#
		</td>
    </tr>   
</script>
<!--Cash Receipt-->
<script id="cashReceipt" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
				    
			    	<span class="glyphicons no-js remove_2 pull-right" 
		    				onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>

			        <h2 data-bind="text: lang.lang.cash_receipt"></h2>			    		   

				    <br>				   				
						
					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="widget widget-heading-simple widget-body-primary widget-employees">		
								<div class="widget-body padding-none">			
									<div class="row-fluid row-merge">
										<div class="listWrapper">
											<div class="innerAll" style="padding: 15px 15px 19px; background: #203864">							
												<form autocomplete="off" class="form-inline">
													<div class="widget-search separator bottom">
														<button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
														<div class="overflow-hidden">
															<input type="search" placeholder="Invoice Number..." data-bind="value: searchText">
														</div>
													</div>
													<div class="select2-container" style="width: 100%;">								
														<input id="ccbItem" name="cbbContact"
														   	data-role="combobox"
										                   	data-header-template="contact-header-tmpl"
										                   	data-template="contact-list-tmpl"
										                   	data-value-primitive="true"
										                   	data-text-field="name"
										                   	data-value-field="id"
										                   	data-bind="value: contact_id,
										                              source: contactDS,
										                              events:{ change: contactChanges }"
										                   	data-placeholder="Customer..."                    
										                   	style="width: 100%; height: 29px;" />									
													</div>
												</form>					
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
								data-bind="style: { backgroundColor: amtDueColor}">
								<div align="left"><span data-bind="text: lang.lang.amount_received"></span></div>
								<h2 data-bind="text: total_received" align="right"></h2>
							</div>												
						</div>					   

						<div class="span8">

							<div class="box-generic-noborder" >

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-1" data-toggle="tab"><i></i> </a>
							            </li>
							            <!-- <li class="span1 glyphicons show_liness"><a href="#tab1-2" data-toggle="tab"><i></i></a></li> -->
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab1-1">						            
							            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">
							            	<tr>
												<td><span data-bind="text: lang.lang.date"></span></td>
												<td class="right">
													<input id="issuedDate" name="issuedDate" 
															data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd HH:mm:ss"
															data-bind="value: obj.issued_date, 
																		events:{ change : issuedDateChanges }" 
															required data-required-msg="required"
															style="width:100%;" />
												</td>
											</tr>							            
											<tr>
								            	<td>
								            		<span data-bind="text: lang.lang.payment_term"></span>
								            	</td>				
												<td>
													<input id="ddlPaymentMethod" name="ddlPaymentMethod"
															data-role="dropdownlist"								
															data-header-template="customer-payment-method-header-tmpl"
								              				data-value-primitive="true"
															data-text-field="name" 
								              				data-value-field="id"
								              				data-bind="value: obj.payment_method_id,
								              							source: paymentMethodDS"
								              				data-option-label="Select Method..."
								              				required data-required-msg="required" 
								              				style="width: 100%" />
												</td>
											</tr>
											<tr>
								            	<td><span data-bind="text: lang.lang.cash_account"></span></td>							            	
							            		<td>
													<input id="ddlCashAccount" name="ddlCashAccount" 
														data-role="dropdownlist"
														data-header-template="account-header-tmpl"
														data-template="account-list-tmpl"
							              				data-value-primitive="true"
														data-text-field="name" 
							              				data-value-field="id"
							              				data-bind="value: obj.account_id,
							              							source: accountDS"
							              				data-option-label="Select Account..."
							              				required data-required-msg="required" 
							              				style="width: 100%" />
												</td>							            	
								            </tr>							            
								            <tr>
												<td><span data-bind="text: lang.lang.segment"></span></td>
												<td>
													<select data-role="multiselect"
														   data-value-primitive="true"
														   data-header-template="segment-header-tmpl"
														   data-item-template="segment-list-tmpl"				    
														   data-value-field="id" 
														   data-text-field="code"
														   data-bind="value: obj.segments, 
														   			source: segmentItemDS,
														   			events:{ change: segmentChanges }"
														   data-placeholder="Add Segment.."				   
														   style="width: 100%" /></select>
												</td>
											</tr>											
							            </table>						            
							        </div>
							        <!-- // Options Tab content END -->

							        <div class="tab-pane saleSummaryCustomer" id="tab1-2">
										<table class="table table-borderless table-condensed custo-table">
									        <thead>
									            <tr>
									                <th>NUMBER</th>
									                <th>ACCOUNT</th>                		                
									                <th class="right">DEBITS (Dr)</th>
									                <th class="right">CREDITS (Cr)</th>		                
									            </tr>
									        </thead> 
									        <tbody>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        	<tr>
									        		<td>1</td>
									        		<td>2</td>
									        		<td class="right">3</td>
									        		<td class="right">4</td>
									        	</tr>
									        </tbody>			        
									    </table>
									</div>

							    </div>
							</div>

					    </div>
					</div>

					<!-- Item List -->
					<div data-role="grid" class="costom-grid"
				    	 data-column-menu="true"
				    	 data-reorderable="true"
				    	 data-scrollable="true"
				    	 data-resizable="true"
				    	 data-editable="true"
		                 data-columns="[
						    { 
						    	title:'NO',
						    	width: '50px', 
						    	attributes: { style: 'text-align: center;' }, 
						        template: function (dataItem) {
						        	var rowIndex = banhji.cashReceipt.dataSource.indexOf(dataItem)+1;
						        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
						      	}
						    },
						    { 
						    	field: 'reference', 
						    	title: 'DATE',
						    	editable: function(){
		                 			return false;
		                 		}, 
						    	template: function(dataItem){
						    		if(dataItem.reference.length>0){
						    			return kendo.toString(new Date(dataItem.reference[0].issued_date), banhji.dateFormat);
						    		}
						    	},
						    	width: '120px'
						    },
		                 	{ field: 'contact.name', title: 'NAME' },
		                 	{ 
		                 		field: 'reference_no', 
		                 		title: 'REFERENCE NO.',
		                 		width: '120px'
		                 	},
		                 	{ field: 'number', title: 'RECEIPT NO.', hidden: true, width: '120px' },
		                 	{ field: 'check_no', title: 'CHECK NO.', hidden: true, width: '120px' },
		                 	{ 
		                 		field: 'sub_total', 
		                 		title:'AMOUNT', 
		                 		format: '{0:n}', 
		                 		editable: function(){
		                 			return false;
		                 		}, 
		                 		attributes: { style: 'text-align: right;' }, 
		                 		width: '120px' 
		                 	},
							{
							    field: 'discount',
							    title: 'DISCOUNT VALUE',
							    hidden: true,
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
							{
							    field: 'discount_percentage',
							    title: 'DISCOUNT %',
							    hidden: true,
							    format: '{0:p}',
							    editor: discountEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
                            {
							    field: 'amount',
							    title: 'RECEIVE',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							}
                         ]"
                         data-auto-bind="false"
		                 data-bind="source: dataSource" ></div>

		            <!-- Bottom part -->
		            <div class="row-fluid">
			
						<!-- Column -->
						<div class="span4">
							<div class="well" style="overflow: hidden; margin-top: 15px;">
								<textarea cols="0" rows="2" class="k-textbox" style="width:100% !important;" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>												
								<textarea cols="0" rows="2" class="k-textbox" style="width:100% !important;" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
							</div>
						</div>
						<!-- Column END -->

						<div class="span4"></div>

						<!-- Column -->
						<div class="span4">
							<table class="table table-condensed table-striped table-white">
								<tbody>
									<tr>
										<td class="right strong" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
										<td class="right strong" ><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
									</tr>
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_discount"></span></td>
										<td class="right"><span data-format="n" data-bind="text: obj.discount"></span></td>
									</tr>
									<tr>
										<td class="right"><span data-bind="text: lang.lang.total_tax"></span></td>
										<td class="right"><span data-format="n" data-bind="text: obj.tax"></span></td>
									</tr>
									<tr>
										<td class="right"><h4 span data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
										<td class="right"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
									</tr>
									<tr>
										<td class="right">
											<span data-bind="text: lang.lang.deposit"></span>
											<span data-format="n" data-bind="text: total_deposit"></span>
										</td>
										<td class="right">
											<input 	data-role="numerictextbox"
								                   	data-format="n"
								                   	data-spinners="false"
								                   	data-min="0"
								                   	data-bind="value: obj.deposit, events: { change: changes }"
								                   	style="width: 90%; text-align: right;">
										</td>
									</tr>
									<tr>
										<td class="right strong">
											<span data-bind="text: lang.lang.remaining" style="font-size: 15px; font-weight: 700;"></span>
										</td>
										<td class="right strong">
											<span data-format="n" data-bind="text: obj.remaining" style="font-size: 15px; font-weight: 700;"></span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- // Column END -->
						
					</div>	           
					
					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>

						<div class="row">
							<div class="span4" style="padding-left: 15px;">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: obj.transaction_template_id,
					                              source: txnTemplateDS"
					                   data-option-label="Select Template..." />
								
							</div>
							<div class="span8" align="right">
								<span class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
								<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
								<span role='presentation' class='dropdown btn-btn' style="padding: 0 0 0 15px; float: right; height: 32px; line-height: 30px;">
							  		<a style="color: #fff; padding: 0;" class='dropdown-toggle glyphicons' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>
							  			<span data-bind="text: lang.lang.save_option"></span>
							  			<span class="small-btn"><i class='caret '></i></span>
							  		</a>
							  		<ul class='dropdown-menu'>
						  				<li data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></li>
						  				<li id="savePrint"><span data-bind="text: lang.lang.save_print"></span></li>
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft"><span data-bind="text: lang.lang.save_draft"></span></span>
								<!-- <span class="btn-btn" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></span>
								<span class="btn-btn"><span data-bind="text: lang.lang.save_close"></span></span>
								<span class="btn-btn"><span data-bind="text: lang.lang.save_print"></span></span> -->
							</div>
						</div>
					</div>
					<!-- // Form actions END -->								

				</div>							
			</div>
		</div>
	</div>
</script>
<script id="cashReceipt-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.cashReceipt.dataSource.indexOf(data)+1#			
		</td>
		<td>
			<span data-format="dd-MM-yyyy" data-bind="text: reference[0].issued_date"></span>
		</td>
		<td>#=contact.name#</td>
		<td>
			#if(reference.length>0){#
        		<a href="\#/#=reference[0].type.toLowerCase()#/#=reference[0].id#"><i></i> #=reference_no#</a>
        	#}#
        </td>
		<td data-bind="visible: showReceiptNo">
			<input type="text" class="k-textbox" 
					data-bind="value: number"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td data-bind="visible: showCheckNo">
			<input type="text" class="k-textbox" 
					data-bind="value: check_no"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td class="center">
			<input id="txtSubTotal-#:uid#" name="txtSubTotal-#:uid#"
				   type="number" class="k-textbox"
				   min="0"
			       data-bind="value: sub_total"
			       style="text-align: right; width: 100%;" disabled="disabled" />
		</td>		
		<td class="center">
			<input id="txtDiscount-#:uid#" name="txtDiscount-#:uid#"
				   type="number" class="k-textbox"
				   min="0"
			       data-bind="value: discount, events: {change : changes}"
			       placeholder="Discount..." 
			       style="text-align: right; width: 100%;" />
		</td>
		<td class="center">
			<input id="txtAmount-#:uid#" name="txtAmount-#:uid#"
				   type="number" class="k-textbox"
				   min="0"
			       data-bind="value: amount, events: {change : changes}"
			       required data-required-msg="required"
			       placeholder="Amount..." 
			       style="text-align: right; width: 100%;" />
		</td>
    </tr>   
</script>

<!--Template-->
<!-- #############################################
##################################################
#	TEMPLATE LIST VIEW 					 		 #
##################################################
############################################## -->
<script id="contact-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=abbr##=number#</span>	
	<span>#=name#</span>	
</script>
<script id="contact-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer">+ Add New Customer</a></li>
    </strong>
</script>
<script id="supplier-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor">+ Add New Supplier</a></li>
    </strong>
</script>
<script id="currency-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=code# - #=country#
	</span>
</script>
<script id="segment-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/segment">+ Add New Segment</a>
    </strong>
</script>
<script id="segment-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=code#</span> <span>#=name#</span>
</script>
<script id="job-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/job">+ Add New Job</a>
    </strong>
</script>
<script id="job-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=number# #=name#
	</span>
</script>

<script id="customer-type-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer_setting">+ Add New Customer Type</a>
    </strong>
</script>
<script id="customer-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer">+ Add New Customer</a>
    </strong>
</script>
<script id="customer-payment-method-header-tmpl" type="text/x-kendo-tmpl">
	<strong>
    	<a href="\#/customer_setting">+ Add New Payment Method</a>
    </strong>	
</script>
<script id="customer-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer_setting">+ Add New Term</a>
    </strong>
</script>

<script id="employee-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="<?php echo base_url(); ?>admin\#employeelist">+ Add New Employee</a>
    </strong>
</script>

<script id="item-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item">+ Add New Item</a> &nbsp;&nbsp;
    	<a href="\#/item_service">+ Add New Service</a>
    </strong>
</script>
<script id="item-list-tmpl" type="text/x-kendo-tmpl">
	<div class="pull-left">
		#=abbr##=number# #=name#
		&nbsp;&nbsp;
		#if(variant.length>0){#
			[
			#for(var i=0; i < variant.length; i++){# 
				#=variant[i].name#, 
			#}#
			]
		#}#
	</div>
	<div class="pull-right">
		#=category#
	</div>
</script>
<script id="item-group-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item_setting">+ Add New Group</a>
    </strong>
</script>
<script id="item-category-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item_setting">+ Add New Category</a>
    </strong>
</script>
<script id="item-brand-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item_setting">+ Add New Brand</a>
    </strong>
</script>
<script id="item-measurement-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item_setting">+ Add New Measurement</a>
    </strong>
</script>

<script id="vendor-type-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor_setting">+ Add New Supplier Type</a>
    </strong>
</script>
<script id="vendor-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor">+ Add New Supplier</a>
    </strong>
</script>
<script id="vendor-payment-method-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor_setting">+ Add New Payment Method</a>
    </strong>
</script>
<script id="vendor-payment-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor_setting">+ Add New Payment Term</a>
    </strong>
</script>

<script id="cash-payment-method-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/cash_seting">+ Add New Payment Method</a>
    </strong>
</script>
<script id="cash-payment-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/cash_seting">+ Add New Payment Term</a>
    </strong>
</script>

<script id="account-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/account">+ Add New Account</a>
    </strong>
</script>
<script id="account-list-tmpl" type="text/x-kendo-tmpl">	
	<span>
		#=number#				
	</span>
	-
	<span>#=name#</span>
</script>
<script id="account-type-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer_setting">+ Add New Customer Type</a>
    </strong>
</script>
<script id="account-type-list-tmpl" type="text/x-kendo-tmpl">	
	<span>
		#=number#				
	</span>
	-
	<span>#=name#</span>
</script>

<script id="tax-header-tmpl" type="text/x-kendo-tmpl">
	<strong>
    	<a href="\#/tax">+ Add New Tax</a>
    </strong>	
</script>

<script id="reference-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=number# :
		#if(type=="GDN" || type=="GRN"){# 
			#=kendo.toString(amount, "n")#
		#}else{#
			#=kendo.toString(amount - amount_paid, "c", locale)#
		#}#
	</span>
	<span class="pull-right">
		#if(type=="GDN" || type=="GRN" || type=="Quote" || type=="Sale_Order"){# 
			#if(status==1){#
				Used
			#}else{#
				Open
			#}#
		#}else{#
			#if(status==1){#
				Paid
			#}else if(status==2){#
				Partially Paid
			#}else{#
				Open
			#}#
		#}#		
	</span>
</script>
<script id="attachment-rith-list-tmpl" type="text/x-kendo-tmpl">
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
			<span class="btn-action glyphicons remove_2 btn-danger" data-bind="click: onRemove"><i></i></span>			
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

<script>
	function itemComboBoxEditor(container, options) {
        $('<input name="' + options.field + '"/>')
        .appendTo(container)
        .kendoComboBox({
        	placeholder: "Select Item",
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#item-list-tmpl").html()),
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "items",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:{ field: "item_type_id <>", value: 3 },
				sort: [
					{ field:"item_type_id", dir:"asc" },
					{ field:"number", dir:"asc" }
				],
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 50
            }
        });
    }

    function itemEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#item-list-tmpl").html()),
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "items",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:{ field: "item_type_id <>", value: 3 },
				sort: [
					{ field:"item_type_id", dir:"asc" },
					{ field:"number", dir:"asc" }
				],
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 50
            }
        });
    }

    function variantAttributeEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	valuePrimitive: false,
        	filter: "startswith",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: dataStore(apiUrl + "variant_attributes")
        });
    }

    function attributeValueEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoMultiSelect({
        	valuePrimitive: false,
            dataTextField: "name",
            dataValueField: "id",
            autoBind: false,
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "attribute_values",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:{ field: "variant_attribute_id", value: options.model.variant_attribute.id },
				sort: { field:"name", dir:"asc" },
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function locationTypeEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "location_types",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function inventoryForSaleEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#item-list-tmpl").html()),
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "items",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:{ field: "item_type_id", value: 1 },
				sort: { field:"number", dir:"asc" },
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function accountEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#account-list-tmpl").html()),
            dataSource: {
            	data: banhji.source.accountList,
			  	sort: [
				  	{ field: "account_type_id", dir: "asc" },
				  	{ field: "number", dir: "asc" }
				]
            }
        });
    }

    function toAccountEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#account-list-tmpl").html()),
            dataSource: {
            	data: banhji.source.accountList,
            	filter: [
			      	{ field: "account_type_id", operator:"neq", value: 10 },
			      	{ field: "account_type_id", operator:"neq", value: 11 },
			      	{ field: "account_type_id", operator:"neq", value: 12 }
			    ],
			  	sort: [
				  	{ field: "account_type_id", dir: "asc" },
				  	{ field: "number", dir: "asc" }
				]
            }
        });
    }

    function whtAccountEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#account-list-tmpl").html()),
            dataSource: {
            	data: banhji.source.accountList,
            	filter: {
		      		logic: "or",
				    filters: [
				      	{ field: "account_type_id", value: 13 },//Inventory
				      	{ field: "account_type_id", value: 16 },//Fixed Asset
				      	{ field: "account_type_id", value: 17 },//Intangible Assets
				      	{ field: "account_type_id", value: 36 },//Expense
				      	{ field: "account_type_id", value: 37 },
				      	{ field: "account_type_id", value: 38 },
				      	{ field: "account_type_id", value: 40 },
				      	{ field: "account_type_id", value: 41 },
				      	{ field: "account_type_id", value: 42 },
				      	{ field: "account_type_id", value: 43 }
				    ]
				},
			  	sort: [
				  	{ field: "account_type_id", dir: "asc" },
				  	{ field: "number", dir: "asc" }
				]
            }
        });
    }    

    function measurementEditor(container, options) {
        $('<input name="' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({       	
            dataTextField: "measurement",
            dataValueField: "measurement_id",
            autoWidth: true,
            height: 200,
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "item_prices",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:[
					{ field:"item_id", value: options.model.item_id },
					{ field:"assembly_id", value: 0 }
				],
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function discountEditor(container, options) {
        $('<input name="' + options.field + '" type="number" class="k-textbox" style="width: 95%;" min="0" max="1" />')
        .appendTo(container);
    }

    function taxForSaleEditor(container, options) {
        $('<input name="' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
            	data: banhji.source.taxList,
			  	filter:{
				    logic: "or",
				    filters: [
				      	{ field: "tax_type_id", value: 3 },//Customer Tax
				      	{ field: "tax_type_id", value: 9 }
				    ]
				},
			  	sort: [
				  	{ field: "tax_type_id", dir: "asc" },
				  	{ field: "name", dir: "asc" }
				]
            }
        });
    }

    function taxForPurchaseEditor(container, options) {
        $('<input name="' + options.field + '"/>')
        .appendTo(container)
        .kendoDropDownList({
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
            	data: banhji.source.taxList,
			  	filter:{
				    logic: "or",
				    filters: [
				      	{ field: "tax_type_id", value: 1 },//Supplier Tax
				      	{ field: "tax_type_id", value: 2 },
				      	{ field: "tax_type_id", value: 3 },
				      	{ field: "tax_type_id", value: 9 }
				    ]
				},
			  	sort: [
				  	{ field: "tax_type_id", dir: "asc" },
				  	{ field: "name", dir: "asc" }
				]
            }
        });
    } 

    function segmentEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "startswith",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "segments",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function segmentItemEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "startswith",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#segment-list-tmpl").html()),
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "segments/item",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:{ field: "segment_id", value: options.model.segment.id },
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }

    function numberTextboxEditor(container, options) {
        $('<input name="' + options.field + '" type="number" class="k-textbox" style="width: 95%;" />')
        .appendTo(container);
    }

    function oneDigitMaskedTextboxEditor(container, options) {
        $('<input name="' + options.field + '" class="k-textbox" style="width: 95%;" />')
        .appendTo(container)
        .kendoMaskedTextBox({
        	mask: "A",
        	promptChar: "_"
        });;
    }

    function twoDigitMaskedTextboxEditor(container, options) {
        $('<input name="' + options.field + '" class="k-textbox" style="width: 95%;" />')
        .appendTo(container)
        .kendoMaskedTextBox({
        	mask: "AA",
        	promptChar: "_"
        });;
    }

    function dateEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDatePicker({
        	format: "dd-MM-yyyy",
        	parseFormats: ["yyyy-MM-dd"]
        });
    }

    function customBoolEditor(container, options) {
        $('<input class="k-checkbox" type="checkbox" name="applyAdditionalCostChk" data-type="boolean" data-bind="checked:additional_applied">').appendTo(container);
        $('<label class="k-checkbox-label">&#8203;</label>').appendTo(container);
    }

    function supplierEditor(container, options) {
        $('<input name="' + options.field + '" />')
        .appendTo(container)
        .kendoDropDownList({
        	filter: "contains",        	
            dataTextField: "name",
            dataValueField: "id",
            autoWidth: true,
            height: 200,
            template: kendo.template($("#contact-list-tmpl").html()),
            dataSource: {
            	transport: {
					read 	: {
						url: apiUrl + "contacts",
						type: "GET",
						headers: banhji.header,
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								page: options.page,
								limit: options.pageSize,
								filter: options.filter,
								sort: options.sort
							};
						} else {
							return {models: kendo.stringify(options.models)};
						}
					}
				},
				schema 	: {
					model: {
						id: 'id'
					},
					data: 'results',
					total: 'count'
				},
				filter:{ field: "parent_id", operator:"where_related_contact_type", value: 2 },
				sort: [
					{ field:"contact_type_id", dir:"asc" },
					{ field:"number", dir:"asc" }
				],
				batch: true,
				serverFiltering: true,
				serverSorting: true,
				serverPaging: true,
				page: 1,
				pageSize: 100
            }
        });
    }
    
</script>