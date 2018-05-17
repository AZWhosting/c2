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
<style>
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
</style>
<!-- ***************************
*	Report Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template">
	<div class="container">
		<div class="row addCusto">
			<div class="span12">
				<div class="example k-content" >
			        <h2 data-bind="text: lang.lang.reports"></h2>
			        <div class="row">
			        	<div class="span12">
							<div class="relativeWrap" data-toggle="source-code">
								<div class="widget widget-tabs widget-tabs-gray report-tab" style="padding-bottom: 20px; background: #fff; overflow: hidden;">
									<div class="widget-head head-custom" style="height: 50px;">
										<ul>
											<li class="active"><a href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.customer"></span></a></li>
											<li><a href="#tab-3" data-toggle="tab"><i></i><span >Products</span></a></li>
											<li><a href="#tab-4" data-toggle="tab"><i></i><span >Cash</span></a></li>
											<li><a href="#tab-5" data-toggle="tab"><i></i><span >Loyalty</span></a></li>
											<li><a href="#tab-6" data-toggle="tab"><i></i><span >Employee</span></a></li>
											
										</ul>
									</div>

									<div class="widget-body">
										<div class="tab-content">
									        <div class="tab-pane active" id="tab-1">
												<div class="row-fluid">
													<div class="row-fluid sale-report">
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
																		<h3><a href="#/cashSale_summary_by_customer" data-bind="text: lang.lang.cash_sale_summary" style="text-transform: capitalize;"></a></h3>
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
																	<td class="span4">
																		<p style="padding-right: 25px;" data-bind="text: lang.lang.cash_sale_summary_summarize">
																		Summarizes total cash sales for each customer within a period of time. In addition, it includes gross profit margin, quantity, amount, cost, and average prices.
																		</p>
																	</td>
																</tr>

																<tr>
																	<td class="span4">
																		<h3><a href="#/cashSale_detail_by_customer" data-bind="text: lang.lang.cash_sale_detail" style="text-transform: capitalize;"></a></h3>
																	</td>
																	<td class="span4">
																		<h3><a href="#/cashSale_summary_by_product" data-bind="text: lang.lang.cashSale_summary_by_product" style="text-transform: capitalize;"></a></h3>
																	</td>
																	<td class="span4">
																		<h3><a href="#/cashSale_detail_by_product" data-bind="text: lang.lang.cashSale_detail_by_product" style="text-transform: capitalize;"></a></h3>
																	</td>
																</tr>

																<tr>
																	<td class="span4">
																		<p style="padding-right: 25px;" data-bind="text: lang.lang.cash_sale_detail__summarize">
																			Lists individual cash sale transactions by date for each customer within a period of time.
																		</p>
																	</td>
																	<td class="span4">
																		<p style="padding-right: 25px;" data-bind="text: lang.lang.cash_sale_summary_product_summarize">
																		Summarizes total cash sales for each product/service within a period of time. In addition, it includes gross profit margin, quantity, amount, cost, and average prices.
																	</p>
																	</td>
																	<td class="span4">
																		<p style="padding-right: 25px;" data-bind="text: lang.lang.cash_sale_detail_product_summarize">
																			Lists individual cash sale transactions by date for each product/service within a period of time.
																		</p>
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
														<div class="row-fluid">
															<table class="span12">
																<tr>
																	<td class="span4">
																		<h3><a href="#/sale_summary_by_product" data-bind="text: lang.lang.sale_summary_by_product_services" style="text-transform: capitalize;"></a></h3>
																	</td>
																	<td class="span4">
																		<h3><a href="#/sale_detail_by_product" data-bind="text: lang.lang.sale_detail_by_product_services" style="text-transform: capitalize;"></a></h3>
																	</td>
																	<td class="span4"></td>
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
																	<td class="span4"></td>
																</tr>
															</table>
														</div>
													</div>
													
									        	</div>
								        	</div>

								        	<div class="tab-pane" id="tab-4">
								        		<div align="center" style="min-height: 150px;">
								        			<h1 style="font-style: 30px; margin-top: 20px;">Coming Soon</h1>
								        		</div>
								        	</div>

								        	<div class="tab-pane" id="tab-5">
									        	<div align="center" style="min-height: 150px;">
								        			<h1 style="font-style: 30px; margin-top: 20px;">Coming Soon</h1>
								        		</div>
								        	</div>

								        	<div class="tab-pane" id="tab-6">
									        	<div class="row-fluid">
													<div class="row-fluid recevable-report">
														<div class="row-fluid">
															<table class="span12">
																<tr>
																	<td class="span4">
																		<h3><a href="#/sale_summary_by_employee" data-bind="text: lang.lang.sale_summary_by_employee" style="text-transform: capitalize;"></a></h3>
																	</td>
																	<td class="span4">
																		<h3><a href="#/sale_detail_by_employee" data-bind="text: lang.lang.sale_detail_by_employee" style="text-transform: capitalize;"></a></h3>
																	</td>
																	<td class="span4">
																	</td>
																</tr>
																<tr>
																	<td class="span4">
																		<p style="padding-right: 25px;" data-bind="text: lang.lang.sale_summary_by_employee_summarize">
																			Summarizes total sales for each employee within a period of time so you can see which ones generate the most revenue for you.
																		</p>
																	</td>
																	<td class="span4">
																		<p style="padding-right: 25px;" data-bind="text: lang.lang.sale_detail_by_employee_summarize">
																		Lists individual sale transactions by date for each employee with a period of time.
																		</p>
																	</td>
																	<td class="span4"></td>
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
			    </div>
			</div>
		</div>
	</div>
</script>

<!-- Report -->
<script id="saleSummaryByCustomer" type="text/x-kendo-template">
	<div class="container">
		<div class="row addCusto">
			<div class="span12">
				<div class="example k-content saleSummaryCustomer" >
			    	<span class="glyphicons no-js remove_2 pull-right"
						onclick="javascript:window.history.back()"><i></i>
					</span>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code" style="margin-top: 30px;" >
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

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

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
										<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div class="row-fluid">
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="html: company.name"></h3>
								<h2 data-bind="text: lang.lang.sale_summary_by_customer"></h2>
								<p data-bind="text: displayDate"></p>
							</div>
							<div class="row">
								<div class="span3">
									<div class="total-customer">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
								</div>
								<div class="span9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.total_sale"></p>
										<span data-bind="text: totalAmount"></sapn>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<table class="table table-borderless table-condensed ">
									<thead>
										<tr>
											<th data-bind="text:lang.lang.customer"></th>
											<th style="text-align: center;" data-bind="text: lang.lang.number_of_invoice"></th>
											<th style="text-align: center;" data-bind="text: lang.lang.number_of_cash_sale"></th>
											<th style="text-align: right;" data-bind="text: lang.lang.total_sale"></th>
										</tr>
									</thead>
				            		<tbody  data-role="listview"
				            				data-auto-bind="false"
							                data-template="saleSummaryByCustomer-template"
							                data-bind="source: dataSource" >
							        </tbody>
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
	</div>
</script>
<script id="saleSummaryByCustomer-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: center;">#=invoice_count#</td>
		<td style="text-align: center;">#=cash_sale_count#</td>
		<td style="text-align: right;">#=kendo.toString(amount, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="saleDetailByCustomer" type="text/x-kendo-template">
	<div class="container">
		<div class="row addCusto">
			<div class="span12">
				<div class="example k-content saleSummaryCustomer" >
			    	<span class="glyphicons no-js remove_2 pull-right"
						onclick="javascript:window.history.back()"><i></i>
					</span>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code" style="margin-top: 30px;" >
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

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

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>
					<div class="row-fluid">
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="html: company.name"></h3>
								<h2 data-bind="text: lang.lang.sale_detail_by_customer"></h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="span3">
									<div class="total-customer">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>

								</div>
								<div class="span9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.amount"></p>
										<span data-bind="text: totalAmount"></sapn>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<table class="table table-borderless table-condensed ">
									<thead>
										<tr>
											<th data-bind="text: lang.lang.type"><span></span></th>
											<th data-bind="text: lang.lang.date"><span></span></th>
											<th data-bind="text: lang.lang.reference"><span></span></th>
											<th data-bind="text: lang.lang.memo"><span></span></th>
											<th data-bind="text: lang.lang.amount"><span></span></th>
										</tr>
									</thead>
									<tbody data-role="listview"
											data-template="saleDetailByCustomer-template"
											data-auto-bind="false"
											data-bind="source: dataSource">
									</tbody>
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
	</div>
</script>
<script id="saleDetailByCustomer-template" type="text/x-kendo-template">
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
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: right;">#=line[i].memo#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;"> <span data-bind="text: lang.lang.total"></span> #=name#</td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="cashSaleSummaryByCustomer" type="text/x-kendo-template">
	<div class="container">
		<div class="row addCusto">
			<div class="span12">
				<div class="example k-content saleSummaryCustomer" >
			    	<span class="glyphicons no-js remove_2 pull-right"
						onclick="javascript:window.history.back()"><i></i>
					</span>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code" style="margin-top: 30px;" >
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span>Print/Export</a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

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

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>							        								<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div class="row-fluid">
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="html: company.name"></h3>
								<h2>Cash Sale Summary by Customer</h2>
								<p data-bind="text: displayDate"></p>
							</div>
							<div class="row">
								<div class="span3">
									<div class="total-customer">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
								</div>
								<div class="span9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.total_sale"></p>
										<span data-bind="text: totalAmount"></sapn>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<table class="table table-borderless table-condensed ">
									<thead>
										<tr>
											<th data-bind="text:lang.lang.customer"></th>
											<th style="text-align: right;" data-bind="text: lang.lang.number_of_cash_sale"></th>
											<th style="text-align: right;" data-bind="text: lang.lang.total_sale"></th>
										</tr>
									</thead>
				            		<tbody  data-role="listview"
				            				data-auto-bind="false"
							                data-template="cashSaleSummaryByCustomer-template"
							                data-bind="source: dataSource" >
							        </tbody>
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
	</div>
</script>
<script id="cashSaleSummaryByCustomer-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: right;">#=cash_sale_count#</td>
		<td style="text-align: right;">#=kendo.toString(amount, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="cashSaleDetailByCustomer" type="text/x-kendo-template">
	<div class="container">
		<div class="row addCusto">
			<div class="span12">
				<div class="example k-content saleSummaryCustomer" >
			    	<span class="glyphicons no-js remove_2 pull-right"
						onclick="javascript:window.history.back()"><i></i>
					</span>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code" style="margin-top: 30px;" >
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

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

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<!--PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div class="row-fluid">
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="html: company.name"></h3>
								<h2>Cash Sale Detail by Customer</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="span3">
									<div class="total-customer">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>

								</div>
								<div class="span9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.amount"></p>
										<span data-bind="text: totalAmount"></sapn>
									</div>
								</div>
							</div>

							<div class="row-fluid">
								<table class="table table-borderless table-condensed ">
									<thead>
										<tr>
											<th data-bind="text: lang.lang.type"><span></span></th>
											<th data-bind="text: lang.lang.date"><span></span></th>
											<th data-bind="text: lang.lang.reference"><span></span></th>
											<th data-bind="text: lang.lang.memo"><span></span></th>
											<th data-bind="text: lang.lang.amount"><span></span></th>
										</tr>
									</thead>
									<tbody data-role="listview"
											data-template="cashSaleDetailByCustomer-template"
											data-auto-bind="false"
											data-bind="source: dataSource">
									</tbody>
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
	</div>
</script>
<script id="cashSaleDetailByCustomer-template" type="text/x-kendo-template">
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
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: right;">#=line[i].memo#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span> #: name #</td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="cashSaleSummaryByProduct" type="text/x-kendo-template">
	<div class="container">
		<div class="row addCusto">
			<div class="span12">
				<div class="example k-content saleSummaryCustomer" >
			    	<span class="glyphicons no-js remove_2 pull-right"
						onclick="javascript:window.history.back()"><i></i>
					</span>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code" style="margin-top: 30px;" >
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

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

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.item"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="item-header-tmpl"
															   data-item-template="item-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.itemIds,
															   			source: itemDS"
															   data-placeholder="Select Item..."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<!--PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div class="row-fluid">
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="html: company.name"></h3>
								<h2>Cash Sale by Product/Service</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="span5">
									<div class="total-customer">
										<div class="span6">
											<p data-bind="text: lang.lang.total_product_services"></p>
											<span data-bind="text: dataSource.total"></span>
										</div>
										<div class="span6">
											<p data-bind="text: lang.lang.avg_sale_per_invoice"></p>
											<span data-bind="text: avg_sale"></span>
										</div>
									</div>
								</div>
								<div class="span7">
									<div class="total-customer">
										<p data-bind="text: lang.lang.total_sale"></p>
										<span data-bind="text: total_sale"></span>
									</div>
								</div>
							</div>

							<div class="row-fluid">
								<table class="table table-borderless table-condensed ">
									<thead>
										<tr>
											<th style="text-transform: uppercase;" data-bind="text: lang.lang.item"></th>
											<th style="text-align: right;" data-bind="text: lang.lang.qty"></th>
											<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.amount"></th>
											<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.avg_price"></th>
											<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.avg_cost"></th>
											<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.gross_profit_margin"></th>
										</tr>
									</thead>
									<tbody data-role="listview"
												 data-template="cashSaleSummaryByProduct-template"
												 data-auto-bind="false"
												 data-bind="source: dataSource"
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
	</div>
</script>
<script id="cashSaleSummaryByProduct-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: right;">#=kendo.toString(quantity, "n")# #=measurement#</td>
		<td style="text-align: right;">#=kendo.toString(amount, "c2", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(avg_price, "c3", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(avg_cost, "c3", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(gpm, "p")#</td>
	</tr>
</script>
<script id="cashSaleDetailByProduct" type="text/x-kendo-template">
	<div class="container">
		<div class="row addCusto">
			<div class="span12">
				<div class="example k-content saleSummaryCustomer" >
			    	<span class="glyphicons no-js remove_2 pull-right"
						onclick="javascript:window.history.back()"><i></i>
					</span>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code" style="margin-top: 30px;" >
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

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

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.item"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="item-header-tmpl"
															   data-item-template="item-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.itemIds,
															   			source: itemDS"
															   data-placeholder="Select Item..."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<!--PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div class="row-fluid">
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="html: company.name"></h3>
								<h2>Cash Sale Detail by Product/Services</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="span5">
									<div class="total-customer">
										<div class="span6">
											<p data-bind="text: lang.lang.total_product_services"></p>
											<span data-bind="text: dataSource.total"></span>
										</div>
										<div class="span6">
											<p data-bind="text: lang.lang.avg_sale_per_invoice"></p>
											<span data-bind="text: product_sale"></span>
										</div>
									</div>
								</div>
								<div class="span7">
									<div class="total-customer">
										<p data-bind="text: lang.lang.total_sale"></p>
										<span data-bind="text: total_sale"></span>
									</div>
								</div>
							</div>

							<div class="row-fluid">
								<table class="table table-borderless table-condensed ">
									<thead>
										<tr>
											<th data-bind="text: lang.lang.type"></th>
											<th data-bind="text:lang.lang.customer"></th>
											<th data-bind="text: lang.lang.invoice_date"></th>
											<th data-bind="text: lang.lang.reference"></th>
											<th data-bind="text: lang.lang.qty"></th>
											<th style="text-align: right;" data-bind="text: lang.lang.price"></th>
											<th data-bind="text: lang.lang.amount"></th>
										</tr>
									</thead>
									<tbody data-role="listview"
												 data-template="cashSaleDetailByProduct-template"
												 data-auto-bind="false"
												 data-bind="source: dataSource"
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
	</div>
</script>
<script id="cashSaleDetailByProduct-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td colspan="7">#=name#</td>
	</tr>
	#var totalAmount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		#totalAmount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important; color: black;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].type#</a>
			</td>
			<td style="text-align: left;">#=line[i].customer#</td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].issued_date),"dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: left;">#=kendo.toString(line[i].quantity, "n")# #=line[i].measurement#</td>
			<td style="text-align: right;">#=kendo.toString(parseFloat(line[i].price), "c2", banhji.locale)#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>

	#}#
	<tr>
    	<td colspan="6" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span>Total #: name #</td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalAmount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="7">&nbsp;</td>
    </tr>
</script>
<script id="saleSummaryByProduct" type="text/x-kendo-template">
	<div class="container">
		<div class="row addCusto">
			<div class="span12">
				<div class="example k-content saleSummaryCustomer" >
			    	<span class="glyphicons no-js remove_2 pull-right"
						onclick="javascript:window.history.back()"><i></i>
					</span>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code" style="margin-top: 30px;" >
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

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

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.item"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="item-header-tmpl"
															   data-item-template="item-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.itemIds,
															   			source: itemDS"
															   data-placeholder="Select Item..."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div class="row-fluid">
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="html: company.name"></h3>
								<h2 data-bind="text: lang.lang.sale_summary_by_product_services"></h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="span5">
									<div class="total-customer">
										<div class="span6">
											<p data-bind="text: lang.lang.total_product_services"></p>
											<span data-bind="text: dataSource.total"></span>
										</div>
										<div class="span6">
											<p data-bind="text: lang.lang.avg_sale_per_invoice"></p>
											<span data-bind="text: avg_sale"></span>
										</div>
									</div>
								</div>
								<div class="span7">
									<div class="total-customer">
										<p data-bind="text: lang.lang.total_sale"></p>
										<span data-bind="text: total_sale"></span>
									</div>
								</div>
							</div>

							<div class="row-fluid">
								<table class="table table-borderless table-condensed ">
									<thead>
										<tr>
											<th style="text-transform: uppercase;" data-bind="text: lang.lang.item"></th>
											<th style="text-align: right;" data-bind="text: lang.lang.qty"></th>
											<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.amount"></th>
											<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.avg_price"></th>
											<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.avg_cost"></th>
											<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.gross_profit_margin"></th>
										</tr>
									</thead>
									<tbody data-role="listview"
												 data-template="saleSummaryByProduct-template"
												 data-auto-bind="false"
												 data-bind="source: dataSource"
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
	</div>
</script>
<script id="saleSummaryByProduct-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: right;">#=kendo.toString(quantity, "n")# #=measurement#</td>
		<td style="text-align: right;">#=kendo.toString(amount, "c2", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(avg_price, "c3", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(avg_cost, "c3", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(gpm, "p")#</td>
	</tr>
</script>
<script id="saleDetailByProduct" type="text/x-kendo-template">
	<div class="container">
		<div class="row addCusto">
			<div class="span12">
				<div class="example k-content saleSummaryCustomer" >
			    	<span class="glyphicons no-js remove_2 pull-right"
						onclick="javascript:window.history.back()"><i></i>
					</span>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code" style="margin-top: 30px;" >
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

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

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
													<td style="padding: 8px 0 0 0 !important;">
														<span data-bind="text: lang.lang.item"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="item-header-tmpl"
															   data-item-template="item-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.itemIds,
															   			source: itemDS"
															   data-placeholder="Select Item..."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div class="row-fluid">
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="html: company.name"></h3>
								<h2 data-bind="text: lang.lang.sale_detail_by_product_services"></h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="span5">
									<div class="total-customer">
										<div class="span6">
											<p data-bind="text: lang.lang.total_product_services"></p>
											<span data-bind="text: dataSource.total"></span>
										</div>
										<div class="span6">
											<p data-bind="text: lang.lang.avg_sale_per_invoice"></p>
											<span data-bind="text: product_sale"></span>
										</div>
									</div>
								</div>
								<div class="span7">
									<div class="total-customer">
										<p data-bind="text: lang.lang.total_sale"></p>
										<span data-bind="text: total_sale"></span>
									</div>
								</div>
							</div>

							<div class="row-fluid">
								<table class="table table-borderless table-condensed ">
									<thead>
										<tr>
											<th data-bind="text:lang.lang.customer"></th>
											<th style="text-align: left;" data-bind="text: lang.lang.invoice_date"></th>
											<th style="text-align: left;" data-bind="text: lang.lang.reference"></th>
											<th style="text-align: left;" data-bind="text: lang.lang.item_name"></th>
											<th style="text-align: right;" data-bind="text: lang.lang.qty"></th>
											<th data-bind="text: lang.lang.uom"></th>
											<th style="text-align: right;" data-bind="text: lang.lang.price"></th>
											<th data-bind="text: lang.lang.amount"></th>
										</tr>
									</thead>
									<tbody data-role="listview"
												 data-template="saleDetailByProduct-template"
												 data-auto-bind="false"
												 data-bind="source: dataSource"
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
	</div>
</script>
<script id="saleDetailByProduct-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td colspan="8">#=name#</td>
	</tr>
	#var totalAmount = 0, totalQty = 0;#
	#for(var i= 0; i <line.length; i++) {#
		#totalQty += kendo.parseInt(line[i].quantity);#
		#totalAmount += kendo.parseFloat(line[i].amount);#
		<tr>
			<td>#=line[i].customer#</td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].issued_date),"dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td>#=line[i].item_name#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].quantity, "c2")#</td>
			<td>#=line[i].measurement#</td>
			<td style="text-align: right;">#=kendo.toString(parseFloat(line[i].price), "c2", banhji.locale)#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>

	#}#
	<tr>
    	<td colspan="4" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span>Total #: name #</td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalQty, "n")#
    	</td>
    	<td colspan="2" style="font-weight: bold; border-top: 1px solid black !important; color: black;"></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalAmount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="7">&nbsp;</td>
    </tr>
</script>
<script id="saleSummaryByEmployee" type="text/x-kendo-template">
	<div class="container">
		<div class="row addCusto">
			<div class="span12">
				<div class="example k-content saleSummaryCustomer" >
			    	<span class="glyphicons no-js remove_2 pull-right"
						onclick="javascript:window.history.back()"><i></i>
					</span>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code" style="margin-top: 30px;" >
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span>Print/Export</a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

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

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.employee"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Employee.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        								        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div class="row-fluid">
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="html: company.name"></h3>
								<h2>Sale Summary by Employee</h2>
								<p data-bind="text: displayDate"></p>
							</div>
							<div class="row">
								<div class="span3">
									<div class="total-customer">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
								</div>
								<div class="span9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.total_sale"></p>
										<span data-bind="text: totalAmount"></sapn>
									</div>
								</div>
							</div>

							<div class="row-fluid">
								<table class="table table-borderless table-condensed ">
									<thead>
										<tr>
											<th data-bind="text:lang.lang.employee"></th>
											<th style="text-align: right;" data-bind="text: lang.lang.number_of_invoice"></th>
											<th style="text-align: right;" data-bind="text: lang.lang.number_of_cash_sale"></th>
											<th style="text-align: right;" data-bind="text: lang.lang.total_sale"></th>
										</tr>
									</thead>
				            		<tbody  data-role="listview"
				            				data-auto-bind="false"
							                data-template="saleSummaryByEmployee-template"
							                data-bind="source: dataSource" >
							        </tbody>
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
	</div>
</script>
<script id="saleSummaryByEmployee-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: right;">#=invoice_count#</td>
		<td style="text-align: right;">#=cash_sale_count#</td>
		<td style="text-align: right;">#=kendo.toString(amount, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="saleDetailByEmployee" type="text/x-kendo-template">
	<div class="container">
		<div class="row addCusto">
			<div class="span12">
				<div class="example k-content saleSummaryCustomer" >
			    	<span class="glyphicons no-js remove_2 pull-right"
						onclick="javascript:window.history.back()"><i></i>
					</span>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code" style="margin-top: 30px;" >
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

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

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        								        								        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div class="row-fluid">
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="html: company.name"></h3>
								<h2>Sale Detail by Employee</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="span3">
									<div class="total-customer">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>

								</div>
								<div class="span9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.amount"></p>
										<span data-bind="text: totalAmount"></sapn>
									</div>
								</div>
							</div>

							<div class="row-fluid">
								<table class="table table-borderless table-condensed ">
									<thead>
										<tr>
											<th data-bind="text: lang.lang.type"><span></span></th>
											<th data-bind="text: lang.lang.name"><span></span></th>
											<th data-bind="text: lang.lang.date"><span></span></th>
											<th style="text-align: right;" data-bind="text: lang.lang.reference"><span></span></th>
											<th data-bind="text: lang.lang.amount"><span></span></th>
										</tr>
									</thead>
									<tbody data-role="listview"
											data-template="saleDetailByEmployee-template"
											data-auto-bind="false"
											data-bind="source: dataSource">
									</tbody>
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
	</div>
</script>
<script id="saleDetailByEmployee-template" type="text/x-kendo-template">
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
			<td style="padding-left: 20px !important;">
				#=line[i].type#
			</td>
			<td style="padding-left: 20px !important;">
				#=line[i].customer#
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: right;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;" data-bind="text: lang.lang.print_export"></td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="4">&nbsp;</td>
    </tr>
</script>
<script id="saleProductDetailByEmployee" type="text/x-kendo-template">
	<div class="container">
		<div class="row addCusto">
			<div class="span12">
				<div class="example k-content saleSummaryCustomer" >
			    	<span class="glyphicons no-js remove_2 pull-right"
						onclick="javascript:window.history.back()"><i></i>
					</span>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code" style="margin-top: 30px;" >
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">

								        <!-- Date -->
								        <div class="tab-pane active" id="tab-1">

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

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>

							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        								        								        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div class="row-fluid">
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="html: company.name"></h3>
								<h2>Sale Detail by Employee</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="span3">
									<div class="total-customer">
										<p data-bind="text: lang.lang.number_of_customer"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>

								</div>
								<div class="span9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.amount"></p>
										<span data-bind="text: total"></sapn>
									</div>
								</div>
							</div>

							<div class="row-fluid">
								<table class="table table-borderless table-condensed ">
									<thead>
										<tr>
											<th data-bind="text: lang.lang.type"><span></span></th>
											<th data-bind="text: lang.lang.customer"><span></span></th>
											<th data-bind="text: lang.lang.date"><span></span></th>
											<th style="text-align: right;" data-bind="text: lang.lang.reference"><span></span></th>
											<th data-bind="text: lang.lang.product"><span></span></th>
											<th data-bind="text: lang.lang.qty"><span></span></th>
											<th data-bind="text: lang.lang.price"><span></span></th>
											<th data-bind="text: lang.lang.amount"><span></span></th>
										</tr>
									</thead>
									<tbody data-role="listview"
											data-template="saleProductDetailByEmployee-template"
											data-auto-bind="false"
											data-bind="source: dataSource">
									</tbody>
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
	</div>
</script>
<script id="saleProductDetailByEmployee-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=name#</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">
				#=line[i].type#
			</td>
			<td style="padding-left: 20px !important;">
				#=line[i].customer#
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: right;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="padding-left: 20px !important;">
				#=line[i].product#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].quantity, "n0")#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].price, "c2", banhji.locale)#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;" data-bind="text: lang.lang.print_export"></td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="8">&nbsp;</td>
    </tr>
</script>

<!-- Template -->
<script id="contact-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer">+ Add New Customer</a></li>
    </strong>
</script>
<script id="contact-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=abbr##=number#</span>
	<span>#=name#</span>
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