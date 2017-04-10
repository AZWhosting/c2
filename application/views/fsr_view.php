<div id="wrapperApplication" class="container-fluid"></div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
	<div id="menu"></div>			
	<div id="content" class="row-fluid container"></div>
</script>
<script type="text/x-kendo-template" id="blank-tmpl">
</script>
<script type="text/x-kendo-template" id="menu-tmpl">
	<div class="menu-hidden sidebar-hidden-phone menu-left hidden-print">
		<div class="navbar main navbar-fixed-top" id="main-menu">
			<ul class="topnav">
				<li><a href="#" data-bind="click: checkRole"><img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png" style="height: 40px;"></a></li>
			</ul>
			<form class="navbar-form pull-left">
				<div class="btn-group">
				  	<a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
				    	<i class="icon-th"></i>
				    	<!-- <span class="caret"></span> -->
				  	</a>
				  	<!-- <ul class="dropdown-menu">
				    	<li data-bind="click: searchContact"><a href="#"><i class="icon-user"></i> Contact</a></li>
				    	<li data-bind="click: searchTransaction"><a href="#"><i class="icon-random"></i> Transaction</a></li>
				    	<li data-bind="click: searchItem"><a href="#"><i class="icon-th-list"></i> Item</a></li>
				  	</ul> -->
				</div>
			  	<input type="text" class="span2 search-query" placeholder="Search" id="search-placeholder" 
			  			data-bind="value: searchText" 
			  			style="background-color: #555555; color: #ffffff; border-color: #333333; height: 22px;">
			  	<button type="submit" class="btn btn-inverse" data-bind="click: search"><i class="icon-search"></i></button>
			</form>
			<ul class="topnav">
			  	<li><a href='#/fsr' class='glyphicons show_big_thumbnails'><i></i></a></li>
			  	<li role='presentation' class='dropdown'>
			  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i></i> <span class='caret'></span></a>
		  			<ul class='dropdown-menu'>  				  				
		  				<li><a href='#/finance_function'>Finance Function</a></li>  				
		  				<li><a href='#/accounting_system'>Accounting System</a></li>
		  				<li><a href='#/budget'>Budget</a></li>
		  				<li><a href='#/controls'>Controls</a></li>
		  				<li><a href='#/audit'>Audit</a></li>
		  				<li><a href='#/procurement'>Procurement</a></li>  						  				 				
		  			</ul>
			  	</li>	  	  	
			  	<li><a href='#/fsr_report'>REPORTS</a></li>	  	
			  	<li><a href='#/fsr_setting' class='glyphicons settings'><i></i></a></li>	  		  	
			</ul>
			<ul class="topnav pull-right">
				<li role="presentation" class="dropdown">
			  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="icon-th-list"></i> <span class="caret"></span></a>
		  			<ul class="dropdown-menu ul-multiTaskList" data-template="multiTaskList-row-template" data-bind="source: multiTaskList">  				  				
		  			</ul>
			  	</li>
				<li role="presentation" class="dropdown">
			  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">[<span data-bind="text: getUsername"></span>] <span class="caret"></span></a>
		  			<ul class="dropdown-menu">  				  				
		  				<li><a href="#" data-bind="click: lang.changeToKh">ភាសាខ្មែរ</a></li>
    					<li><a href="#" data-bind="click: lang.changeToEn">English</a></li>
						<li class="divider"></li>	
						<li><a href="#/manage" data-bind="click: logout"><i class="icon-power-off"></i> Logout</a></li> 				
		  			</ul>
			  	</li>				
			</ul>
		</div>
	</div>
</script>
<script id="multiTaskList-row-template" type="text/x-kendo-template">
    <li>
    	<a href="\#/#=url#">
    		#=name#
    		<span title="Remove" class="multiTaskList glyphicons remove_2 pull-right" data-bind="click: removeLink">
    			<i></i>
    		</span>
    	</a>

    </li>	
</script>
<script type="text/x-kendo-template" id="index">
	<div class="row-fluid">
		<div class="span6">
			<div class="row">
				<div class="board-chart" style="width: 97%; margin: 0 0 20px 0; min-height: 136px; background: #fff; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
					<div class="span12">
						<h4 data-bind="text: companyName"></h4>
						<h2 style="color: #113051; margin-bottom: 11px; display: inline-block; width: 100%;" data-bind="text: lang.lang.financial_snapshot"></h2>
						<span style="color: #000000;"><span data-bind="text: lang.lang.as_of"></span>:&nbsp;<span id="today-date" data-bind="text: today"></span></span><br/>
					</div>
				</div>

				<div class="cash-bg" style="width: 97%; margin-bottom: 15px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
		    		<div class="row-fluid" >
						<div class="span6" style="background: #0077c5; margin-right: 15px; ">
							<a href="">
								<div class="widget-body alert-info welcome-nopadding" style="width: 100%; background: #0077c5;">
									<p style="color: #fff;"><span >Institute</span></p>
							
									<div class="strong" align="center" style="color: #fff; font-size: 40px; margin-top: -15px; margin-bottom: 0;"><span >3.5</span></div>
								
								</div>
							</a>
						</div>

						<div class="span6" style="background: #21abf6; padding-right: 0; width: 47%;">
							<a href="#/">
								<div class="widget-body alert-info welcome-nopadding" style="width: 100%; background: #21abf6;">
									<p style="color: #fff;"><span >Your Ass</span></p>
							
									<div class="strong" align="center" style="color: #fff; font-size: 40px; margin-top: -15px; margin-bottom: 0;"><span >4.0</span></div>
								
									</table>
								</div>
							</a>
						</div>
					</div>
		    	</div>
			</div>
			<!-- <div class="row">
				<div class="span12" style="padding-left: 0; margin-left: 0; margin-top: 0;">
					<ul id="module-image">
						<li style="text-align:center;">
							<a href="#/customers">
								<img title="Customers Module" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/customers.jpg" alt="Customer">
							</a>
							<h style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><h5 data-bind="text: lang.lang.customers" style="margin-top: 5px; display: inline-block;"></h5></span>
						</li>
						<li style="text-align:center;">
							<a href="#/vendors">
								<img title="Supplier Module" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/supplier.jpg" alt="Vendor">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><h5 data-bind="text: lang.lang.suppliers" style="margin-top: 5px; display: inline-block;"></h5></span>
						</li>
						<li style="text-align:center;">
							<a href="#/inventories">
								<img title="Products/Sercies Module" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/inventory.jpg" alt="Inventory">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><h5 data-bind="text: lang.lang.products_services" style="margin-top: 5px; display: inline-block;"></h5></span>
						</li>
						<li style="text-align:center;">
							<a href="#/documents">
								<img title="Attached Documents" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/attach_file.jpg" alt="Attachment">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><h5 data-bind="text: lang.lang.documents" style="margin-top: 5px; display: inline-block;"></h5></span>
						</li>
					</ul>
					<ul id="module-image">						
						<li style="text-align:center;">
							<a href="#/accounting">
								<img title="Accounting Module" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/accounting.jpg" alt="Customer">							
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><h5 data-bind="text: lang.lang.accounting" style="margin-top: 5px; display: inline-block;" style="margin-top: 5px; display: inline-block;"></h5></span>
							</a>
						</li>
						<li style="text-align:center;">
							<a href="#/reports">
								<img title="Reports Module" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/report.jpg" alt="Reports">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><h5 data-bind="text: lang.lang.reports" style="margin-top: 5px; display: inline-block;"></h5></span>
						</li>
						<li style="text-align:center;">
							<a href="#/tax">
								<img title="Tax Module" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/tax.jpg" alt="Tax">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><h5 data-bind="text: lang.lang.tax" style="margin-top: 5px; display: inline-block;" style="margin-top: 5px; display: inline-block;"></h5></span>
						</li>
						<li style="text-align:center;">
							<a href="<?php echo base_url(); ?>admin">
								<img title="Admin Module" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/setting.jpg" alt="Admin">
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><h5 data-bind="text: lang.lang.settings" style="margin-top: 5px; display: inline-block;" style="margin-top: 5px; display: inline-block;"></h5></span>
							</a>
						</li>											
					</ul>
				</div>
			</div> -->
			<div class="row">
				<div class="span12" style="width: 100%; padding: 0 5px;">
					<div class="home-chart" style="width: 97.9%; padding: 0 15px;">
						
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
		
		<div class="span6" style="margin-bottom: 15px;">
			<div class="row">
				<div class="span12" style="background: #fff; margin-bottom: 20px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
					<!-- Add New Board -->
					<div class="board-add" style="padding: 15px 0;">
						<div class="span4" style="padding-right: 0;">
							<h2 style="color: #6399D5; font-size: 20px;" data-bind="text: lang.lang.welcome"></h2>
							<p style="font-size: 12px;">
								<span data-bind="text: lang.lang.to_get_you_started_with_banhji"></span> <a target="_blank" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/guide/welcome_guide.pdf">[Welcome Guide]</a>.
							</p>
						</div>
						<!-- <div class="span8" style="padding-right: 0; padding-left: 0;">
							<div class="span12" style="padding-right: 0; padding-left: 0;">
								<div class="span3">
									<a href="#/customer" class="center">
										<img  title="Add Customer" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/customers.ico" />
									</a>
								</div>
								<div class="span3">
									<a href="#/vendor" class="center">
										<img  title="Add Supplier" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/suppliers.ico" />
									</a>
								</div>
								<div class="span3">
									<a href="#/item" class="center">
										<img  title="Add Inventory" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/inventories.ico" />
									</a>
								</div>
								<div class="span3">
									<a href="#/item_service" class="center">
										<img  title="Add Service" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/services.ico" />
									</a>
								</div>
							</div>
						</div> -->
					</div><!--End Add New Board -->
				</div>
				
				<div class="cash-bg" style="margin-bottom: 10px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
		    		<a href="#/finance">
						<div class="cash-invoice" style="background: #203864; color: #fff;">
							<div class="span6" style="padding-left: 0;">
								<img style="float: left; width: 64px; margin-right: 15px;" src="<?php echo base_url();?>assets/fsr/1.ico">
								<span style="font-size: 24px; line-height: 23px; float: left; width: 173px; margin-top: 8px;">
									Finance Function
								</span>
							</div>
							<div class="span3" style="padding-left: 15px;">
								<span style="font-size: 24px; line-height: 45px; margin-top: 8px; float: left;">4/5</span>
							</div>
							<div class="span3" style=" text-align: center; font-size: 35px; font-weight: 600; padding: 0;">
								<span style="float: right; margin-top: 8px;">3.00</span>
							</div>
						</div>
					</a>
					<a href="#/accounting_system">
						<div class="cash-invoice" style="background: #203864; color: #fff;">
							<div class="span6" style="padding-left: 0;">
								<img style="float: left; width: 64px; margin-right: 15px;" src="<?php echo base_url();?>assets/fsr/2.ico">
								<span style="font-size: 24px; line-height: 23px; float: left; width: 173px; margin-top: 8px;">
									Accounting System
								</span>
							</div>
							<div class="span3" style="padding-left: 15px;">
								<span style="font-size: 24px; line-height: 45px; margin-top: 8px; float: left;">15/20</span>
							</div>
							<div class="span3" style=" text-align: center; font-size: 35px; font-weight: 600; padding: 0;">
								<span style="float: right; margin-top: 8px;">24.00</span>
							</div>
						</div>
					</a>
					<a href="#/budget">
						<div class="cash-invoice" style="background: #203864; color: #fff;">
							<div class="span6" style="padding-left: 0;">
								<img style="float: left; width: 64px; margin-right: 15px;" src="<?php echo base_url();?>assets/fsr/3.ico">
								<span style="font-size: 24px; line-height: 23px; float: left; width: 173px; margin-top: 20px;">
									Budget
								</span>
							</div>
							<div class="span3" style="padding-left: 15px;">
								<span style="font-size: 24px; line-height: 45px; margin-top: 8px; float: left;">/10</span>
							</div>
							<div class="span3" style=" text-align: center; font-size: 35px; font-weight: 600; padding: 0;">
								<span style="float: right; margin-top: 8px;">2.30</span>
							</div>
						</div>
					</a>
					<a href="#/controls">
						<div class="cash-invoice" style="background: #203864; color: #fff;">
							<div class="span6" style="padding-left: 0;">
								<img style="float: left; width: 64px; margin-right: 15px;" src="<?php echo base_url();?>assets/fsr/4.ico">
								<span style="font-size: 24px; line-height: 23px; float: left; width: 173px; margin-top: 20px;">
									Controls
								</span>
							</div>
							<div class="span3" style="padding-left: 15px;">
								<span style="font-size: 24px; line-height: 45px; margin-top: 8px; float: left;">/40</span>
							</div>
							<div class="span3" style=" text-align: center; font-size: 35px; font-weight: 600; padding: 0;">
								<span style="float: right; margin-top: 8px;">4.00</span>
							</div>
						</div>
					</a>
					<a href="#/audit">
						<div class="cash-invoice" style="background: #203864; color: #fff;">
							<div class="span6" style="padding-left: 0;">
								<img style="float: left; width: 64px; margin-right: 15px;" src="<?php echo base_url();?>assets/fsr/5.ico">
								<span style="font-size: 24px; line-height: 23px; float: left; width: 173px; margin-top: 20px;">
									Audit
								</span>
							</div>
							<div class="span3" style="padding-left: 15px;">
								<span style="font-size: 24px; line-height: 45px; margin-top: 8px; float: left;">/6</span>
							</div>
							<div class="span3" style=" text-align: center; font-size: 35px; font-weight: 600; padding: 0;">
								<span style="float: right; margin-top: 8px;">3.00</span>
							</div>
						</div>
					</a>
					<a href="#/procurement">
						<div class="cash-invoice" style="background: #203864; color: #fff; margin-bottom: 0;">
							<div class="span6" style="padding-left: 0;">
								<img style="float: left; width: 64px; margin-right: 15px;" src="<?php echo base_url();?>assets/fsr/6.ico">
								<span style="font-size: 24px; line-height: 23px; float: left; width: 173px; margin-top: 20px;">
									Procurement
								</span>
							</div>
							<div class="span3" style="padding-left: 15px;">
								<span style="font-size: 24px; line-height: 45px; margin-top: 8px; float: left;">/14</span>
							</div>
							<div class="span3" style=" text-align: center; font-size: 35px; font-weight: 600; padding: 0;">
								<span style="float: right; margin-top: 8px;">2.85</span>
							</div>
						</div>
					</a>
		    	</div>
			</div>
		</div>
	</div>

	<div class="row-fluid">
		<div style="margin-top: 10px; margin-left: 0;" align="center">
			<p>&copy; <?php echo date('Y'); ?><span data-bind="text: lang.lang.all_rights_reserved"></span></p>
		</div>	
	</div>		
</script>
<!-- ADVANCE SEARCH -->
<script id="searchAdvanced" type="text/x-kendo-template">
    <div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" onclick="javascript:window.history.back()"><i></i></span>						
					</div>
			        
			        <h2>SEARCH</h2>
				    
				    <br>	
				    
				    <!-- Result -->
				    <span class="results"><span data-format="n0" data-bind="text: found"></span> result found <i class="icon-circle-arrow-down"></i></span>
					
					<div data-role="listview"
						 data-auto-bind="false"
						 data-selectable="true"				                 
		                 data-template="searchAdvanced-contact-template"
		                 data-bind="source: contactDS"></div>
		            <div data-role="listview"
						 data-auto-bind="false"
						 data-selectable="true"				                 
		                 data-template="searchAdvanced-transaction-template"
		                 data-bind="source: transactionDS"></div>
		            <div data-role="listview"
						 data-auto-bind="false"
						 data-selectable="true"				                 
		                 data-template="searchAdvanced-item-template"
		                 data-bind="source: itemDS"></div>
		            <div data-role="listview"
						 data-auto-bind="false"
						 data-selectable="true"				                 
		                 data-template="searchAdvanced-account-template"
		                 data-bind="source: accountDS"></div>					
					<!-- End Result -->

				</div>							
			</div>
		</div>
	</div>
</script>
<script id="searchAdvanced-contact-template" type="text/x-kendo-template">
	<dl data-bind="click: selectedContact">			
		<dt>
			<div class="widget widget-heading-simple widget-body-multiple widget-offers">
				<div class="widget-body">
					
					<!-- Media item -->
					<div class="media">
						<img class="media-object pull-left thumb hidden-tablet hidden-phone" 
							src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/contact.ico" 
							style="width: 100px; height: 100px;">
						<div class="media-body">
							<h5>#=surname# #=name#</h5>							
							<span>#=abbr# #=number#</span>							
							<br>
							<span>#=company#</span>
							<br>
							<span>#=contact_type#</span>
														
						</div>
					</div>
					<!-- // Media item END -->
						
				</div>
			</div>
		</dt>											
	</dl>	
</script>
<script id="searchAdvanced-transaction-template" type="text/x-kendo-template">
	<dl data-bind="click: selectedTransaction">			
		<dt>
			<div class="widget widget-heading-simple widget-body-multiple widget-offers">
				<div class="widget-body">
					
					<!-- Media item -->
					<div class="media">
						<img class="media-object pull-left thumb hidden-tablet hidden-phone" 
							src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/transaction.ico" 
							style="width: 100px; height: 100px;">
						<div class="media-body">
							<h5>#=number#</h5>
							<span>#=amount#</span>
							<br>
							<span>#=issued_date#</span>					
						</div>
					</div>
					<!-- // Media item END -->
						
				</div>
			</div>
		</dt>											
	</dl>	
</script>
<script id="searchAdvanced-item-template" type="text/x-kendo-template">
	<dl data-bind="click: selectedItem">			
		<dt>
			<div class="widget widget-heading-simple widget-body-multiple widget-offers">
				<div class="widget-body">
					
					<!-- Media item -->
					<div class="media">
						<img class="media-object pull-left thumb hidden-tablet hidden-phone" 
							src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/item.ico" 
							style="width: 100px; height: 100px;">
						<div class="media-body">
							<h5>#=name#</h5>
							<span>#=number#</span>
							<br>
							<span>#=on_hand#</span>					
						</div>
					</div>
					<!-- // Media item END -->
						
				</div>
			</div>
		</dt>											
	</dl>	
</script>
<script id="searchAdvanced-account-template" type="text/x-kendo-template">
	<dl data-bind="click: selectedAccount">			
		<dt>
			<div class="widget widget-heading-simple widget-body-multiple widget-offers">
				<div class="widget-body">
					
					<!-- Media item -->
					<div class="media">
						<img class="media-object pull-left thumb hidden-tablet hidden-phone" 
							src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/journal.ico" 
							style="width: 100px; height: 100px;">
						<div class="media-body">
							<h5>#=name#</h5>
							<span>#=number#</span>				
						</div>
					</div>
					<!-- // Media item END -->
						
				</div>
			</div>
		</dt>											
	</dl>	
</script>



<!-- #############################################
##################################################
#							 #
##################################################
############################################## -->
<script id="finance" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">				    
			    	<span class="glyphicons no-js remove_2 pull-right"
							data-bind="click: cancel"><i></i></span>

					<!-- Title -->
					<h2>Finance Functions</h2>
					<p>Assessment Sessions</p>
					<br>
					<!-- Table -->
					<div class="row-fluid fsr-budget">
							<table class="table table-borderless table-condensed ">
								<thead>
									<tr>
										<th></th>
										<th style="vertical-align: top;">Focus Areas</th>
										<th style="vertical-align: top;">Document Required</th>
										<th style="vertical-align: top;">NA/CP</th>
										<th style="vertical-align: top;">Risk Point</th>
										<th style="vertical-align: top;">Attachment</th>
										<th style="vertical-align: top;">Remarks/comments</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>3.1.7</td>
										<td>
											The approved budgets are informed and shared to all concerns via appropriate means, such as electronic document and/or hard copies of the approved documents.
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
									<tr>
										<td>3.2</td>
										<td colspan="6">
											Budget Management & Monitoring
										</td>
									</tr>
									<tr>
										<td>3.2.1</td>
										<td>
											Verifying and approving officer are always attentive and thorough in approving expenditure that is charged to budget.
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
									<tr>
										<td>3.2.2</td>
										<td>
											Budget performance reports are produced. Variances (both deficits and surpluses) are identified. Reasons for variances are determined, and recommendations for corrective actions are developed and implemented.
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
									<tr>
										<td>3.2.3</td>
										<td>
											There are no overlap funding in the same project (not shared cost funding)
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
								</tbody>						
							</table>
					</div>
					<br>
					<!-- Bottom Part -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification" style="display: none;"></div>

						<!-- Delete Confirmation -->
						
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span12" align="right">
								<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_new">Save New</span></span>
								<span id="saveClose" class="btn btn-icon btn-success glyphicons power" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_close">Save Close </span></span>																	
								<span id="savePrint" class="btn btn-icon btn-default glyphicons print" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_print">Save Print</span></span>
								<span class="btn btn-icon btn-warning glyphicons remove_2" onclick="javascript:window.history.back()" data-bind="click: cancel" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.cancel">Cancel </span></span>
								<span class="btn btn-danger btn-icon glyphicons bin" data-bind="click: openConfirm, visible: isEdit" style="width: 80px; display: none;"><i></i> <span data-bind="text: lang.lang.delete">Delete</span></span>					
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="budget" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">				    
			    	<span class="glyphicons no-js remove_2 pull-right"
							data-bind="click: cancel"><i></i></span>

					<!-- Title -->
					<h2>BUDGET FORMULATION, MANAGEMENT& MONITORING</h2>
					<p>Assessment Sessions</p>
					<br>
					<!-- Table -->
					<div class="row-fluid fsr-budget">
							<table class="table table-borderless table-condensed ">
								<thead>
									<tr>
										<th></th>
										<th style="vertical-align: top;">Focus Areas</th>
										<th style="vertical-align: top;">Document Required</th>
										<th style="vertical-align: top;">NA/CP</th>
										<th style="vertical-align: top;">Risk Point</th>
										<th style="vertical-align: top;">Attachment</th>
										<th style="vertical-align: top;">Remarks/comments</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>3.1.7</td>
										<td>
											The approved budgets are informed and shared to all concerns via appropriate means, such as electronic document and/or hard copies of the approved documents.
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
									<tr>
										<td>3.2</td>
										<td colspan="6">
											Budget Management & Monitoring
										</td>
									</tr>
									<tr>
										<td>3.2.1</td>
										<td>
											Verifying and approving officer are always attentive and thorough in approving expenditure that is charged to budget.
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
									<tr>
										<td>3.2.2</td>
										<td>
											Budget performance reports are produced. Variances (both deficits and surpluses) are identified. Reasons for variances are determined, and recommendations for corrective actions are developed and implemented.
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
									<tr>
										<td>3.2.3</td>
										<td>
											There are no overlap funding in the same project (not shared cost funding)
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
								</tbody>						
							</table>
					</div>
					<br>
					<!-- Bottom Part -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification" style="display: none;"></div>

						<!-- Delete Confirmation -->
						
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span12" align="right">
								<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_new">Save New</span></span>
								<span id="saveClose" class="btn btn-icon btn-success glyphicons power" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_close">Save Close </span></span>																	
								<span id="savePrint" class="btn btn-icon btn-default glyphicons print" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_print">Save Print</span></span>
								<span class="btn btn-icon btn-warning glyphicons remove_2" onclick="javascript:window.history.back()" data-bind="click: cancel" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.cancel">Cancel </span></span>
								<span class="btn btn-danger btn-icon glyphicons bin" data-bind="click: openConfirm, visible: isEdit" style="width: 80px; display: none;"><i></i> <span data-bind="text: lang.lang.delete">Delete</span></span>					
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="controls" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">				    
			    	<span class="glyphicons no-js remove_2 pull-right"
							data-bind="click: cancel"><i></i></span>

					<!-- Title -->
					<h2>GOVERNANCE, CONTROL & COMPLIANCE</h2>
					<p>Assessment Sessions</p>
					<br>
					<!-- Table -->
					<div class="row-fluid fsr-budget">
							<table class="table table-borderless table-condensed ">
								<thead>
									<tr>
										<th></th>
										<th style="vertical-align: top;">Focus Areas</th>
										<th style="vertical-align: top;">Document Required</th>
										<th style="vertical-align: top;">NA/CP</th>
										<th style="vertical-align: top;">Risk Point</th>
										<th style="vertical-align: top;">Attachment</th>
										<th style="vertical-align: top;">Remarks/comments</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>4.8.3</td>
										<td>
											There is a process in place to collect and document errors or complaints to analyse, determine cause, and eliminate a problem from recurring in future.
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
									<tr>
										<td>4.9</td>
										<td colspan="6">
											Monitoring
										</td>
									</tr>
									<tr>
										<td>4.9.1</td>
										<td>
											Officers and employees understand their obligation to communicate observed weaknesses in design or compliance with the internal control structure of the organization to the appropriate supervisory or management personnel
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
									<tr>
										<td>4.9.2</td>
										<td>
											There are follow-up on recommendations from external auditors for improvements to the internal control system.
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
								</tbody>						
							</table>
					</div>
					<br>
					<!-- Bottom Part -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification" style="display: none;"></div>

						<!-- Delete Confirmation -->
						
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span12" align="right">
								<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_new">Save New</span></span>
								<span id="saveClose" class="btn btn-icon btn-success glyphicons power" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_close">Save Close </span></span>																	
								<span id="savePrint" class="btn btn-icon btn-default glyphicons print" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_print">Save Print</span></span>
								<span class="btn btn-icon btn-warning glyphicons remove_2" onclick="javascript:window.history.back()" data-bind="click: cancel" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.cancel">Cancel </span></span>
								<span class="btn btn-danger btn-icon glyphicons bin" data-bind="click: openConfirm, visible: isEdit" style="width: 80px; display: none;"><i></i> <span data-bind="text: lang.lang.delete">Delete</span></span>					
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="audit" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">				    
			    	<span class="glyphicons no-js remove_2 pull-right"
							data-bind="click: cancel"><i></i></span>

					<!-- Title -->
					<h2>FINANCIAL AUDIT</h2>
					<p>Assessment Sessions</p>
					<br>
					<!-- Table -->
					<div class="row-fluid fsr-budget">
							<table class="table table-borderless table-condensed ">
								<thead>
									<tr>
										<th></th>
										<th style="vertical-align: top;">Focus Areas</th>
										<th style="vertical-align: top;">Document Required</th>
										<th style="vertical-align: top;">NA/CP</th>
										<th style="vertical-align: top;">Risk Point</th>
										<th style="vertical-align: top;">Attachment</th>
										<th style="vertical-align: top;">Remarks/comments</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>5.1</td>
										<td colspan="6">
											Internal Audit
										</td>
									</tr>
									<tr>
										<td>5.1.1</td>
										<td>
											The Partner appears to have strong internal controls to ensure funds are expended for the intended purpose, discourage and prevent improper use of funds, and safeguard assets.
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
									<tr>
										<td>5.2</td>
										<td colspan="6">
											External Audit
										</td>
									</tr>
									<tr>
										<td>5.2.1</td>
										<td>
											"The partner’s specific financial statements are audited regularly by an independent auditor."
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
									<tr>
										<td>5.2.2</td>
										<td>
											The audit of the Partner’s financial statements are conducted according to the International Standards on Auditing.
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
									<tr>
										<td>5.2.3</td>
										<td>
											"The auditor will audit the accounts related to the work plan and Audit Agreements with the BfdW."
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
									<tr>
										<td>5.2.4</td>
										<td>
											The Statutory auditor has submitted a management letter/ internal control letter according to BfdW audit agreement.
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
									<tr>
										<td>5.2.5</td>
										<td>
											All recommendations made by the auditor in the prior three audit reports and/or management letters have been implemented.
										</td>
										<td></td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>
										<td>
											<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.country_id,
							                              source: countryDS" style="width: 100%;" />
										</td>								
										<td></td>
										<td>
											<textarea 
												cols="0" 
												rows="2" 
												class="k-textbox" 
												style="width:100%; resize: none;" 
												data-bind="value: obj.memo2" 
												placeholder="Remarks/comments...">
											</textarea>
										</td>
									</tr>
								</tbody>						
							</table>
					</div>
					<br>
					<!-- Bottom Part -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification" style="display: none;"></div>

						<!-- Delete Confirmation -->
						
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span12" align="right">
								<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_new">Save New</span></span>
								<span id="saveClose" class="btn btn-icon btn-success glyphicons power" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_close">Save Close </span></span>																	
								<span id="savePrint" class="btn btn-icon btn-default glyphicons print" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_print">Save Print</span></span>
								<span class="btn btn-icon btn-warning glyphicons remove_2" onclick="javascript:window.history.back()" data-bind="click: cancel" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.cancel">Cancel </span></span>
								<span class="btn btn-danger btn-icon glyphicons bin" data-bind="click: openConfirm, visible: isEdit" style="width: 80px; display: none;"><i></i> <span data-bind="text: lang.lang.delete">Delete</span></span>					
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="procurement" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">				    
			    	<span class="glyphicons no-js remove_2 pull-right"
							data-bind="click: cancel"><i></i></span>

					<!-- Title -->
					<h2>PROCUREMENT</h2>
					<p>Assessment Sessions</p>
					<br>
					<!-- Table -->
					<div class="row-fluid fsr-budget">
						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th></th>
									<th style="vertical-align: top;">Focus Areas</th>
									<th style="vertical-align: top;">Document Required</th>
									<th style="vertical-align: top;">NA/CP</th>
									<th style="vertical-align: top;">Risk Point</th>
									<th style="vertical-align: top;">Attachment</th>
									<th style="vertical-align: top;">Remarks/comments</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>6.1</td>
									<td colspan="6">
										Procurement Principle, Policies, and Procedures
									</td>
								</tr>
								<tr>
									<td>6.1.1</td>
									<td>
										The partner has developed or followed an acceptable procurement principles
									</td>
									<td>"Procurement Policies"</td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>								
									<td></td>
									<td>
										<textarea 
											cols="0" 
											rows="2" 
											class="k-textbox" 
											style="width:100%; resize: none;" 
											data-bind="value: obj.memo2" 
											placeholder="Remarks/comments...">
										</textarea>
									</td>
								</tr>
								<tr>
									<td>6.1.2</td>
									<td>
										The partner has written procurement policies and procedures.
									</td>
									<td></td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>								
									<td></td>
									<td>
										<textarea 
											cols="0" 
											rows="2" 
											class="k-textbox" 
											style="width:100%; resize: none;" 
											data-bind="value: obj.memo2" 
											placeholder="Remarks/comments...">
										</textarea>
									</td>
								</tr>
								<tr>
									<td>6.1.3</td>
									<td>
										The Partner has a specific anti-fraud and corruption policy or conflict of interest that cover this topic.
									</td>
									<td>anti-fraud & corruption policy or conflict of interest</td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>								
									<td></td>
									<td>
										<textarea 
											cols="0" 
											rows="2" 
											class="k-textbox" 
											style="width:100%; resize: none;" 
											data-bind="value: obj.memo2" 
											placeholder="Remarks/comments...">
										</textarea>
									</td>
								</tr>
								<tr>
									<td>6.1.4</td>
									<td>
										The Partner has utilize project funds and purchased goods efficiently, economically and exclusively for the purpose of the project, as state in the Cooperation Agreement with BfdW.
									</td>
									<td></td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>								
									<td></td>
									<td>
										<textarea 
											cols="0" 
											rows="2" 
											class="k-textbox" 
											style="width:100%; resize: none;" 
											data-bind="value: obj.memo2" 
											placeholder="Remarks/comments...">
										</textarea>
									</td>
								</tr>
								<tr>
									<td>6.2</td>
									<td colspan="6">
										Controls
									</td>
								</tr>
								<tr>
									<td>6.2.1</td>
									<td>
										The Partner has a procurement committee that reviews and approves contracts.
									</td>
									<td></td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>								
									<td></td>
									<td>
										<textarea 
											cols="0" 
											rows="2" 
											class="k-textbox" 
											style="width:100%; resize: none;" 
											data-bind="value: obj.memo2" 
											placeholder="Remarks/comments...">
										</textarea>
									</td>
								</tr>
								<tr>
									<td>6.2.2</td>
									<td>
										The Partner has defined authorization guidance and policies and procedures to ensure they are properly applied.
									</td>
									<td></td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>								
									<td></td>
									<td>
										<textarea 
											cols="0" 
											rows="2" 
											class="k-textbox" 
											style="width:100%; resize: none;" 
											data-bind="value: obj.memo2" 
											placeholder="Remarks/comments...">
										</textarea>
									</td>
								</tr>
								<tr>
									<td>6.2.3</td>
									<td>
										The Partner obtains sufficient approvals before signing a contract executing a purchase or a payment.
									</td>
									<td></td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>								
									<td></td>
									<td>
										<textarea 
											cols="0" 
											rows="2" 
											class="k-textbox" 
											style="width:100%; resize: none;" 
											data-bind="value: obj.memo2" 
											placeholder="Remarks/comments...">
										</textarea>
									</td>
								</tr>
								<tr>
									<td>6.2.4</td>
									<td>
										The Partner has formal guidelines and procedures in place to assist in identifying, monitoring and dealing with potential conflict of interests with potential suppliers/procurement agents.
									</td>
									<td></td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>								
									<td></td>
									<td>
										<textarea 
											cols="0" 
											rows="2" 
											class="k-textbox" 
											style="width:100%; resize: none;" 
											data-bind="value: obj.memo2" 
											placeholder="Remarks/comments...">
										</textarea>
									</td>
								</tr>
								<tr>
									<td>6.3</td>
									<td colspan="6">
										Procurement process
									</td>
								</tr>
								<tr>
									<td>6.3.1</td>
									<td>
										The Partner has a well-defined process for sourcing/pre-qualifying suppliers.
									</td>
									<td></td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>								
									<td></td>
									<td>
										<textarea 
											cols="0" 
											rows="2" 
											class="k-textbox" 
											style="width:100%; resize: none;" 
											data-bind="value: obj.memo2" 
											placeholder="Remarks/comments...">
										</textarea>
									</td>
								</tr>
								<tr>
									<td>6.3.2</td>
									<td>
										The Partner regularly checks ‘market’ prices of goods and services purchased.
									</td>
									<td></td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>								
									<td></td>
									<td>
										<textarea 
											cols="0" 
											rows="2" 
											class="k-textbox" 
											style="width:100%; resize: none;" 
											data-bind="value: obj.memo2" 
											placeholder="Remarks/comments...">
										</textarea>
									</td>
								</tr>
								<tr>
									<td>6.3.3</td>
									<td>
										The Partner conducts public bid opening for formal procurement methods.
									</td>
									<td></td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>								
									<td></td>
									<td>
										<textarea 
											cols="0" 
											rows="2" 
											class="k-textbox" 
											style="width:100%; resize: none;" 
											data-bind="value: obj.memo2" 
											placeholder="Remarks/comments...">
										</textarea>
									</td>
								</tr>
								<tr>
									<td>6.4</td>
									<td colspan="6">
										Awarding of contracts
									</td>
								</tr>
								<tr>
									<td>6.4.1</td>
									<td>
										The Partner awards procurement contracts to qualified bidders whose bids substantially conform to requirements set forth in the solicitation documentation and offer the lowest cost.
									</td>
									<td></td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>								
									<td></td>
									<td>
										<textarea 
											cols="0" 
											rows="2" 
											class="k-textbox" 
											style="width:100%; resize: none;" 
											data-bind="value: obj.memo2" 
											placeholder="Remarks/comments...">
										</textarea>
									</td>
								</tr>
								<tr>
									<td>6.4.2</td>
									<td>
										The Partner awards procurement contracts to qualified proposers whose proposals, all factors considered, are the most responsive to the requirements set forth in the solicitation process.
									</td>
									<td></td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>								
									<td></td>
									<td>
										<textarea 
											cols="0" 
											rows="2" 
											class="k-textbox" 
											style="width:100%; resize: none;" 
											data-bind="value: obj.memo2" 
											placeholder="Remarks/comments...">
										</textarea>
									</td>
								</tr>
								<tr>
									<td>6.5</td>
									<td colspan="6">
										Reporting and monitoring
									</td>
								</tr>
								<tr>
									<td>6.5.1</td>
									<td>
										Procurement reports are prepared frequently for the Partner.
									</td>
									<td></td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>
									<td>
										<input data-role="dropdownlist"
				              			   data-option-label="(--- Select ---)"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="value: obj.country_id,
						                              source: countryDS" style="width: 100%;" />
									</td>								
									<td></td>
									<td>
										<textarea 
											cols="0" 
											rows="2" 
											class="k-textbox" 
											style="width:100%; resize: none;" 
											data-bind="value: obj.memo2" 
											placeholder="Remarks/comments...">
										</textarea>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<br>
					<!-- Bottom Part -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification" style="display: none;"></div>

						<!-- Delete Confirmation -->
						
			            <!-- // Delete Confirmation -->

						<div class="row">
							<div class="span12" align="right">
								<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_new">Save New</span></span>
								<span id="saveClose" class="btn btn-icon btn-success glyphicons power" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_close">Save Close </span></span>																	
								<span id="savePrint" class="btn btn-icon btn-default glyphicons print" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_print">Save Print</span></span>
								<span class="btn btn-icon btn-warning glyphicons remove_2" onclick="javascript:window.history.back()" data-bind="click: cancel" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.cancel">Cancel </span></span>
								<span class="btn btn-danger btn-icon glyphicons bin" data-bind="click: openConfirm, visible: isEdit" style="width: 80px; display: none;"><i></i> <span data-bind="text: lang.lang.delete">Delete</span></span>					
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</script>





<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
<script>
	localforage.config({
		driver: localforage.LOCALSTORAGE,
		name: 'userData'
	});	
	var banhji = banhji || {};
	var baseUrl = "<?php echo base_url(); ?>";
	var apiUrl = baseUrl + 'api/';
	banhji.s3 = "https://banhji.s3.amazonaws.com/";	
	banhji.token = null;
	banhji.no_image = "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg";

	// custom widget for min and max
	kendo.data.binders.widget.max = kendo.data.Binder.extend({
		init: function(widget, bindings, options) {//call the base constructor
            kendo.data.Binder.fn.init.call(this, widget.element[0], bindings, options);
        },
        refresh: function() {
            var that = this,
            value = that.bindings["max"].get(); //get the value from the View-Model
            $(that.element).data("kendoDatePicker").max(value); //update the widget
        }
    });

    kendo.data.binders.widget.min = kendo.data.Binder.extend({
        init: function(widget, bindings, options) {
            //call the base constructor
            kendo.data.Binder.fn.init.call(this, widget.element[0], bindings, options);
        },
        refresh: function() {
            var that = this,
            value = that.bindings["min"].get(); //get the value from the View-Model
            $(that.element).data("kendoDatePicker").min(value); //update the widget
        }
    });
	// end of custom widget
	banhji.fileManagement = kendo.observable({
        dataSource: new kendo.data.DataSource({
          transport: {
            read  : {
              url: baseUrl + 'api/attachments',
              type: "GET",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            create  : {
              url: baseUrl + 'api/attachments',
              type: "POST",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            update  : {
              url: baseUrl + 'api/attachments',
              type: "PUT",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            destroy  : {
              url: baseUrl + 'api/attachments',
              type: "DELETE",
              dataType: 'json',
              headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
            },
            parameterMap: function(options, operation) {
              if(operation === 'read') {
                return {
                  limit: options.take,
                  page: options.page,
                  filter: options.filter
                };
              } else {
                return {models: kendo.stringify(options.models)};
              }
            }
          },
          schema  : {
            model: {
              id: 'id'
            },
            data: 'results',
            total: 'count'
          },
          batch: true,
          serverFiltering: true,
          serverPaging: true,
          pageSize: 50
        }),
        fileArray     : [],
        onRemove      : function(e) {
          banhji.fileManagement.dataSource.remove(e.data);
        },
        onSelected    : function(e) {
          var files = e.files;
          var key = 'ATTACH_' + JSON.parse(localStorage.getItem('userData/user')).institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ files[0].name;
          banhji.fileManagement.dataSource.add({
            transaction_id  : 0,
            type            : "Transaction",
            name            : files[0].name,
            contact_id      : null,
            description     : "",
            key             : key,
            url             : "https://s3-ap-southeast-1.amazonaws.com/banhji/"+key,
            created_at      : new Date(),
            file            : files[0].rawFile
          });
        },
        allowSize	  : 0,
        transactionSize: 0,
        contactSize   : 0,
        totalSize 	  : 0,
        transactionNu : 0,
        contactNu 	  : 0,
        save                : function(contact_id){
          $.each(banhji.fileManagement.dataSource.data(), function(index, value){ 
            banhji.fileManagement.dataSource.at(index).set("transaction_id", contact_id);
            if(!value.id){
              var params = { 
                Body: value.file, 
                Key: value.key
              };
              bucket.upload(params, function (err, data) {                    
                  // console.log(err, data);
                  // var url = data.Location;
              });
            }
          });

          banhji.fileManagement.dataSource.sync();
          var saved = false;
          banhji.fileManagement.dataSource.bind("requestEnd", function(e){
            //Delete File
            if(e.type=="destroy"){
              if(saved==false && e.response){
                saved = true;
                var response = e.response.results;
                $.each(response, function(index, value){                  
                  var params = {
                    Delete: { /* required */
                      Objects: [ /* required */
                        {
                          Key: value.data.key
                        }
                      ]
                    }
                  };
                  bucket.deleteObjects(params, function(err, data) {
                    //console.log(err, data);
                  });
                });
              }
            }
            banhji.fileManagement.dataSource.data([]);
          });
        }
    });
	banhji.pageLoaded = {};
	// Initializing AWS Cognito service
	var userPool = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserPool(poolData);
	// Initializing AWS S3 Service
	var bucket = new AWS.S3({params: {Bucket: 'banhji'}});
	banhji.accessMod = new kendo.data.DataSource({
      transport: {
        read  : {
          url: baseUrl + 'api/users/access',
          type: "GET",
          dataType: 'json'
        },
        parameterMap: function(options, operation) {
          if(operation === 'read') {
            return {
              limit: options.pageSize,
              page: options.page,
              filter: options.filter
            };
          } else {
            return {models: kendo.stringify(options.models)};
          }
        }
      },
      schema  : {
        model: {
          id: 'id'
        },
        data: 'results',
        total: 'count'
      },
      batch: true,
      serverFiltering: true,
      serverPaging: true,
      filter: {field: 'username', value: userPool.getCurrentUser() == null ? '': userPool.getCurrentUser().username},
      pageSize: 1
    });
    banhji.allowed;
	function checkRole(arg) {
		var dfd = $.Deferred();
		// var roleName = $(location).attr('hash').substr(2);
		// loop through roles if this has in the role list
		banhji.accessMod.query({
			filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		}).then(function(e){
				if(banhji.accessMod.data().length > 0) {
					for(var i = 0; i < banhji.accessMod.data().length; i++) {
						if(arg == banhji.accessMod.data()[i].name.toLowerCase()) {
							dfd.resolve(true);
							break;
						}
					}
				}
			}
		);
	}
	banhji.companyDS = new kendo.data.DataSource({
      transport: {
        read  : {
          url: baseUrl + 'api/profiles/company',
          type: "GET",
          dataType: 'json'
        },
        update  : {
          url: baseUrl + 'api/profiles/company',
          type: "PUT",
          dataType: 'json'
        },
        parameterMap: function(options, operation) {
          if(operation === 'read') {
            return {
              limit: options.pageSize,
              page: options.page,
              filter: options.filter
            };
          } else {
            return {models: kendo.stringify(options.models)};
          }
        }
      },
      schema  : {
        model: {
          id: 'id'
        },
        data: 'results',
        total: 'count'
      },
      batch: true,
      serverFiltering: true,
      serverPaging: true,
      filter: {field: 'username', value: userPool.getCurrentUser() == null ? '': userPool.getCurrentUser().username},
      pageSize: 1
    });
	banhji.profileDS = new kendo.data.DataSource({
      transport: {
        read  : {
          url: baseUrl + 'api/profiles',
          type: "GET",
          dataType: 'json',
          headers: banhji.header,
        },
        parameterMap: function(options, operation) {
          if(operation === 'read') {
            return {
              limit: options.pageSize,
              page: options.page,
              filter: options.filter
            };
          } else {
            return {models: kendo.stringify(options.models)};
          }
        }
      },
      schema  : {
        model: {
          id: 'id'
        },
        data: 'results',
        total: 'count'
      },
      batch: true,
      serverFiltering: true,
      serverPaging: true,
      filter: {field: 'username', value: userPool.getCurrentUser() == null ? '':userPool.getCurrentUser().username},
      pageSize: 100
    });
	banhji.aws = kendo.observable({
        password: null,
        confirm: null,
        email: null,
        verificationCode: null,
        cognitoUser: null,
        newPass: null,
        oldPass: null,
        image: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/blank.png",
        getImage: function() {
          banhji.profileDS.fetch(function(e){
            banhji.aws.set('image', banhji.profileDS.data()[0].profile_photo);
          });
        },
        signUp: function() {
          // e.preventDefault();
          if(this.get('password') != this.get('confirm')) {
            alert('Passwords do not match');
          } else {
            // using cognito to sign up
            var attributeList = [];

            var dataEmail = {
                Name : 'email',
                Value : this.get('email')
            };

            var attributeEmail = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserAttribute(dataEmail);

            attributeList.push(attributeEmail);

            userPool.signUp(this.get('email'), this.get('password'), attributeList, null, function(err, result){
                if (err) {
                    alert(err);
                    return;
                }
                // update attribute
                // 2. move to admin page
                // banhji.awsCognito.set('cognitoUser', result.user);
                banhji.router.navigate('confirm');
            });
          }
        },
        comfirmCode: function(e) {
           e.preventDefault();
            // confirm user verification code after signed up
            var userData = {
                Username : userPool.getCurrentUser().username,
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.confirmRegistration(this.get('verificationCode'), true, function(err, result) {
                if (err) {
                    alert(err);
                    return;
                }
                banhji.router.navigate('index');
            });
        },
        resendCode: function(e) {
          e.preventDefault();
          alert('code resent');
        },
        signIn: function() {
            var authenticationData = {
                Username : this.get('email'),
                Password : this.get('password'),
            };
            var authenticationDetails = new AWSCognito.CognitoIdentityServiceProvider.AuthenticationDetails(authenticationData);
            
            var userData = {
                Username : this.get('email'),
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.authenticateUser(authenticationDetails, {
                onSuccess: function (result) {
                    banhji.awsCognito.set('cognitoUser', cognitoUser);
                },

                onFailure: function(err) {
                    alert(err);
                },

            });
        },
        signOut: function(e){
          e.preventDefault();
          var userData = {
              Username : userPool.getCurrentUser().username,
              Pool : userPool
          };
          var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
          if(cognitoUser != null) {
              cognitoUser.signOut();
              localforage.clear().then(function(){
              	window.location.replace("<?php base_url(); ?>login");
              });              
          } else {
              console.log('No user');
          }
        },
        changePassword: function() {
            var userData = {
                Username : this.get('email'),
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.changePassword('oldPassword', 'newPassword', function(err, result) {
                if (err) {
                    alert(err);
                    return;
                }
                console.log('call result: ' + result);
            });
        },
        forgotPassword: function(e) {
            e.preventDefault();
            var userData = {
                Username : this.get('email'),
                Pool : userPool
            };
            var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
            cognitoUser.forgotPassword({
                onSuccess: function (result) {
                    console.log('call result: ' + result);
                },
                onFailure: function(err) {
                    alert(err);
                },
                inputVerificationCode() {
                    var verificationCode = prompt('Please input verification code ' ,'');
                    var newPassword = prompt('Enter new password ' ,'');
                    cognitoUser.confirmPassword(verificationCode, newPassword, this);
                }
            });
        },
        getCurrentUser: function() {
            var cognitoUser = null;
            if (userPool.getCurrentUser() != null) {
                cognitoUser = userPool.getCurrentUser();
            }
            return cognitoUser;
        }
    });
	// Check if user is logged and authenticated via cognito service
	if(userPool.getCurrentUser() == null) {
		// if not login return to login page		
	  	//window.location.replace('http://localhost/aws/login.html');
	} else {
	  	var cognitoUser = userPool.getCurrentUser();
	  	if(cognitoUser !== null) {
	    	// banhji.aws.getImage();
	    	cognitoUser.getSession(function(err, result) {
	      		if(result) {
	        		AWS.config.credentials = new AWS.CognitoIdentityCredentials({
	          			IdentityPoolId: 'us-east-1:35445541-da4c-4dbb-b83f-d1d0301a26a9',
	          			Logins: {
	            			'cognito-idp.us-east-1.amazonaws.com/us-east-1_56S0nUDS4' : result.getIdToken().getJwtToken()
	          			}
	        		});
	     		}
	    	});
	  	}
	}	
	var langVM = kendo.observable({
		lang 		: null,		
		localeCode 	: null,		
		changeToEn 	: function() {
			localforage.setItem("lang", "EN").then(function(value){
				location.reload(false);
			});
		},
		changeToKh 	: function() {
			localforage.setItem("lang", "KH").then(function(value){
				location.reload(false);
			});
		}
	});
	banhji.userData = JSON.parse(localStorage.getItem('userData/user')) ? JSON.parse(localStorage.getItem('userData/user')) : "";
	if(banhji.userData == "") {
		banhji.companyDS.fetch(function() {
			banhji.profileDS.fetch(function(){
				var data = banhji.companyDS.data();
				var id = 0;
				id = banhji.profileDS.data()[0].id;
				if(data.length > 0) {
					var user = {
						id: id,
						username: userPool.getCurrentUser().username,
						institute: data
					};
					localforage.setItem('user', user);
				}
				banhji.userData = JSON.parse(localStorage.getItem('userData/user'));
			});
		});
	}
	banhji.institute = banhji.userData ? banhji.userData.institute : "";
	banhji.locale = banhji.institute.currency.locale;
	banhji.localeReport = banhji.institute.reportCurrency.locale;
	banhji.header = { Institute: banhji.institute.id };	
	var dataStore = function(url) {
		var o = new kendo.data.DataSource({
			transport: {
				read 	: {
					url: url,
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				create 	: {
					url: url,
					type: "POST",
					headers: banhji.header,
					dataType: 'json'
				},
				update 	: {
					url: url,
					type: "PUT",
					headers: banhji.header,
					dataType: 'json'
				},
				destroy 	: {
					url: url,
					type: "DELETE",
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
		});
		return o;
	};
	banhji.userManagement = kendo.observable({
		lang : langVM,
		multiTaskList 		: [],
		searchText : "",
		searchType : "contacts",
		checkRole  : function(e) {
			e.preventDefault();
		if(JSON.parse(localStorage.getItem('userData/user')).role == 1) {
            banhji.router.navigate("");
          } else {
           	window.location.replace("<?php echo base_url(); ?>admin");
          }
		},
		searchContact: function() {
			this.set("searchType", "contacts");

			$("#search-placeholder").attr('placeholder', "Search Contact");
		},
		searchTransaction: function() {
			this.set("searchType", "transactions");

			$("#search-placeholder").attr('placeholder', "Search Transaction");
		},
		searchItem: function() {
			this.set("searchType", "items");

			$("#search-placeholder").attr('placeholder', "Search Item");
		},
		search: function(e) {
			e.preventDefault();
			
			banhji.searchAdvanced.set("searchText", this.get("searchText"));
			banhji.searchAdvanced.set("searchType", this.get("searchType"));
			banhji.searchAdvanced.search();
			banhji.router.navigate('/search_advanced');
		},
		removeLink 			: function(e){
			e.preventDefault();

			var data = e.data,
			index = this.multiTaskList.indexOf(data);
			
			if(data.vm!==null){				
				data.vm.cancel();
			}			

			this.multiTaskList.splice(index, 1);
		},
		removeMultiTask		: function(url){
			var self = this;

			$.each(this.multiTaskList, function(index, value){
				if(value.url==url){
					self.multiTaskList.splice(index, 1);

					return false;
				}
			});
		},
		addMultiTask 		: function(name, url, vm){
			var isExisting = false;
			$.each(this.multiTaskList, function(index, value){
				if(value.url==url){
					isExisting = true;

					return false;
				}
			});

			if(isExisting==false){
				this.multiTaskList.push({ name:name, url:url, vm:vm });
			}
		},				
		auth : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'authentication',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'authentication',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'authentication',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'authentication',
					type: "DELETE",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			// pageSize: 100
		}),		
		inst 	 : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/company',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'banhji/company',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'banhji/company',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'banhji/company',
					type: "DELETE",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			// pageSize: 100
		}),
		industry : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/industry',
					type: "GET",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			// pageSize: 100
		}),
		countries: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/countries',
					type: "GET",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			// pageSize: 100
		}),
		provinces: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/provinces',
					type: "GET",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			// pageSize: 100
		}),
		types 	 : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/types',
					type: "GET",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			// pageSize: 100
		}),
		instMod 	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'admin/modules_institute',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'admin/modules_institute',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'admin/modules_institute',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'admin/modules_institute',
					type: "DELETE",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			filter: {field: 'id', value: 1}
			// pageSize: 100
		}),
		onSuccessUpload: function(e){
			var logo = e.response.results.url;
			this.get('newInst').set('logo', logo);
			this.saveIntitute();
			// console.log(logo);
		},	 
		close 		: function() {
			window.history.back(-1);
			if(this.inst.hasChanges()) {
				this.inst.cancelChanges();
			}
			if(this.auth.hasChanges()) {
				this.auth.cancelChanges();
			}
		},
		getUsername : function() {
			var x = banhji.userData.username.substring(0,2);
			return x.toUpperCase();
		},
		taxRegimes: [
			{ code: 'small', type: 'ខ្នាតតូច'},
			{ code: 'medium', type: 'ខ្នាតមធ្យម'},
			{ code: 'large', type: 'ខ្នាតធំ'}
		],
		currency : [
			{ code: 'KHR', locale: 'km-KH'},
			{ code: 'USD', locale: 'us-US'},
			{ code: 'VND', locale: 'vn-VN'}
		],
		username : null,
		password : null,
		_password: null,
		pwdDS 	 : new kendo.data.DataSource({
			transport: {
				create 	: {
					url: apiUrl + 'banhji/password',
					type: "POST",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			pageSize: 100
		}),
		validateEmail: function() {
			var sQtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
		  	var sDtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
		  	var sAtom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
		  	var sQuotedPair = '\\x5c[\\x00-\\x7f]';
		  	var sDomainLiteral = '\\x5b(' + sDtext + '|' + sQuotedPair + ')*\\x5d';
		  	var sQuotedString = '\\x22(' + sQtext + '|' + sQuotedPair + ')*\\x22';
		  	var sDomain_ref = sAtom;
		  	var sSubDomain = '(' + sDomain_ref + '|' + sDomainLiteral + ')';
		  	var sWord = '(' + sAtom + '|' + sQuotedString + ')';
		  	var sDomain = sSubDomain + '(\\x2e' + sSubDomain + ')*';
		  	var sLocalPart = sWord + '(\\x2e' + sWord + ')*';
		  	var sAddrSpec = sLocalPart + '\\x40' + sDomain; // complete RFC822 email address spec
		  	var sValidEmail = '^' + sAddrSpec + '$'; // as whole string

		  	var reValidEmail = new RegExp(sValidEmail);

		  	if(!reValidEmail.test(this.get('username'))){
		  		alert("Please enter valid address");
				this.set('passed', false);
		  	}
		  	this.set('passed', false);
		},
		loginBtn : function() {
			banhji.view.layout.showIn('#content', banhji.view.loginView);
		},
		login  	 : function() {
			this.auth.query({
				filter: [
					{field: 'username', value: banhji.userManagement.get('username')},
					{field: 'password', value: banhji.userManagement.get('password')}
				]
			}).done(function(e){
				var data = banhji.userManagement.auth.data();
				if(data.length > 0) {
					var user = banhji.userManagement.auth.data()[0];
					localforage.setItem('user', user);
					if(user.institute.length === 0) {
						banhji.router.navigate('/no-page');
					} else {
						banhji.router.navigate('/');
					}
				} else {
					console.log('bad');
				}
			});
		},
		registerBtn: function() {
			banhji.view.layout.showIn('#content', banhji.view.signupView);	
		},
		logout 		: function(e) {
			e.preventDefault();
			var userData = {
              	Username : userPool.getCurrentUser().username,
              	Pool : userPool
	        };
          	var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
          	if(cognitoUser != null) {
              	cognitoUser.signOut();
              	localforage.removeItem('user').then(function() {
				    // Run this code once the key has been removed.
				    console.log('Key is cleared!');
				}).catch(function(err) {
				    // This code runs if there were any errors
				    console.log(err);
				});
              	window.location.replace("<?php echo base_url(); ?>login");
          	} else {
              	console.log('No user');
          	}
		},
		setCurrent : function(current) {
			this.set('current', current);
		},
		changePwd  : function() {
			if(this.get('password') !== this.get('_password')) {
				alert("Password does not match");
			} else {
				this.pwdDS.sync();
			}
		},
		getLogin 	: function() {
			return JSON.parse(localStorage.getItem('userData/user'));
		},
		page 	 : function() {
			if(banhji.userManagement.getLogin()) {
				if(banhji.userManagement.getLogin().perm === 1) {
					return 'admin';
				}
			} else {
				return 'home';
			}
			// if(this.getLogin()) {
			// 	return '\#/page';
			// } else {
			// 	return '\#/page/';
			// }
			
		},
		createComp : function() {
			banhji.router.navigate('/create_company');
		},
		setInstitute: function(newIns) {
			this.set('newInst', newIns);
		},
		addInst    : function() {
			this.inst.insert(0, {
				name: "",
				email: "",
				address: "",
				description: "",
				industry: {id: null, name: null},
				type: {id: null, name: null},
				country: {id: null, code: null, name: null},
				province: {id: null, local: null, english: null},
				vat_no: null,
				fiscal_date: null,
				tax_regime: null,
				locale : null,
				legal_name: null,
				date_founded: null,
				logo: ""
			});
			this.setInstitute(this.inst.at(0));
		},
		cancelInst : function() {
			this.inst.cancelChanges();
		},
		saveIntitute: function() {
			if(this.get('newInst').industry.id !== null || this.get('newInst').province.id || this.get('newInst').country.id) {
				this.inst.sync();
				this.inst.bind('requestEnd', function(e){
					var type = e.type, res = e.response.results;
					if(e.response.error === false) {
						if(e.type === 'create') {
							$('#createComMessage').text("created. Please wait till site admin created database for you.");
						} else {
							localforage.removeItem('company', function(err){
								//
							});
							localforage.setItem('company', res);
							$('#createComMessage').text("Updated");
						}
					} else {
						$('#createComMessage').text("error creating company.");
					}
				});
			} else {
				alert('filling all fields');
			}
		},
		signup 	   : function() {
			this.auth.add({username: this.get('username'), password: this.get('password')});
			this.sync();
			this.auth.bind('requestEnd', function(e){
				if(e.type === 'create' && e.response.error === false) {
					alert("អ្នកបានចុះឈ្មោះរួច");
					banhji.router.route('')
				}
			});
		},
		onFileSelect: function(e) {
			console.log(e.files[0]);
		},
		sync: function() {
			this.auth.sync();
			this.auth.bind('requestEnd', function(e){
				var type = e.type;
				var result = e.response.results;
				if(type === "read" && e.error !== true) {
					// get login info
					console.log('true');
				} else if(type === "create") {
					if(e.response.error === true) {
						banhji.userManagement.auth.cancelChanges();
						alert('មានរួចហើយ');
					} else {
						var user = banhji.userManagement.auth.data()[0];
						localforage.setItem('user', user);
						if(!user.institute) {
							banhji.router.navigate('/page', false);
						} else {
							banhji.router.navigate('/app', false);
						}
					}
				}
			});
		}
	});	
	function getDB() {
		var entity = null;
		if(banhji.userManagement.getLogin()) {
			if(banhji.userManagement.getLogin().institute) {
				if(banhji.userManagement.getLogin().institute.length > 0) {
					entity = banhji.userManagement.getLogin().institute.name
				}
				
			} else {
				entity = false
			}
		}
		return entity;
	}
	banhji.currency = kendo.observable({
		dataSource 			: dataStore(apiUrl + 'currencies'),
		getCurrencyID 		: function(locale){
			var currency_id = 0;

			$.each(this.dataSource.data(), function(index, value){
				if(value.locale===locale){
					currency_id = value.id;
					return false;
				}
			});

			return currency_id;
		}
	});
	banhji.users = kendo.observable({
		dataStore	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/users',
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'banhji/users',
					type: "POST",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'banhji/users',
					type: "PUT",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'banhji/users',
					type: "DELETE",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			pageSize: 100
		}),
		roleDS 		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'banhji/roles',
					type: "GET",
					headers: {
						"Entity": getDB(),
						"User": banhji.userManagement.getLogin() === null ? '': banhji.userManagement.getLogin().id
					},
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			pageSize: 100
		}),
		add 		: function() {
			banhji.view.pageAdmin.showIn('#col2', banhji.view.addUserView);
			this.dataStore.insert(0, {username: '', password: null, permission: {id: null, name: null}});
			this.setCurrent(this.dataStore.at(0));
		},
		remove 		: function(e) {
			var user = confirm('Are you sure you want to remove this user?');
			if(user === true) {
				this.dataStore.remove(e.data);
				this.sync();
			}
		},
		editRight 	: function(e) {
			banhji.view.pageAdmin.showIn('#col2', banhji.view.editRoleView);
			this.setCurrent(e.data);
		},
		cancelAdd 	: function() {
			banhji.view.pageAdmin.showIn('#col2', banhji.view.userListView);
			this.dataStore.cancelChanges();
		},
		setCurrent 	: function(current) {
			this.set('current', current);
		},
		sync 		: function() {
			this.dataStore.sync();
			this.dataStore.bind('requestEnd', function(e){
				var type = e.type;
				var data = e.response.results;
				if(type !== 'read') {
					console.log('data recorded');
				}
			});
		}
	});
	banhji.people = kendo.observable({
		dataSource : new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "people",
					type: "GET",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name:""
					},
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + "people",
					type: "POST",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name:""
					},
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + "people",
					type: "PUT",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institutename:""
					},
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + "people",
					type: "DELETE",
					headers: {
						"Entity": banhji.userManagement.getLogin() !== null ? banhji.userManagement.getLogin().institute.name:""
					},
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							offset: options.skip,
							filter: options.filter
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
				total: 'count',
				errors: 'error'
			},
			batch: true,
			serverFiltering: true,
			serverPaging: true,
			pageSize: 20
		}),
		filterBy   : function() {},
		save 	   : function() {}
	});
	// end TEst offline
	var obj = function(url) {
		var o = kendo.observable({
			dataStore: new kendo.data.DataSource({
				transport: {
					read 	: {
						url: url,
						type: "GET",
						headers: {
							"Entity": getDB()
						},
						dataType: 'json'
					},
					create 	: {
						url: url,
						type: "POST",
						headers: {
							"Entity": getDB()
						},
						dataType: 'json'
					},
					update 	: {
						url: url,
						type: "PUT",
						headers: {
							"Entity": getDB()
						},
						dataType: 'json'
					},
					destroy : {
						url: url,
						type: "DELETE",
						headers: {
							"Entity": getDB()
						},
						dataType: 'json'
					},
					parameterMap: function(options, operation) {
						if(operation === 'read') {
							return {
								limit: options.pageSize,
								offset: options.skip,
								filter: options.filter
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
					total: 'count',
					errors: 'error'
				},
				batch: true,
				serverFiltering: true,
				serverPaging: true,
				pageSize: 20
			}),
			findById: function(id) {},
			findBy 	: function(arr) {},
			insert 	: function(data) {},
			remove 	: function(model) {
				this.dataStore.remove(model);
				this.save();
			},
			save 	: function() {
				this.dataStore.sync();
				this.dataStore.bind('requestEnd', function(e){
					var type = e.type, res = e.response.results;
					console.log(type + " operation is successful.");
				});
			}
		});
		return o;
	}	
	banhji.Layout = kendo.observable({
		locale: "km-KH",
		menu 	: [],
		// isShown : true,
		// isAdmin : auth.isAdmin(),
		// logout 	: function(e) {
		// 	e.preventDefault();
		// 	auth.logout();
		// },
		// isLogin : function(){
		// 	if(banhji.userManagement.getLogin()) {
		// 		return true;
		// 	} else {
		// 		return false;
		// 	}
		// },
		// init: function() {
		// 	// initialize when the whole page load
		// },
		// ui: function() {
		// 	// get UI information from source base on locale
		// }
	});	
	var role = kendo.observable({
		dataStore 	: new kendo.data.DataSource({
			transport: {
				read: {
					url: apiUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				create: {
					url: apiUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				update: {
					url: apiUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				destroy: {
					url: apiUrl + 'roles',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				parameterMap: function(data, operation) {
					if(operation === 'read') {
						return {
							limit: data.pageSize,
							offset: data.skip,
							filter: data.filter
						};
					}
					return {models: kendo.stringify(data.models)};
				}
			},
			schema: {
	        	model: {
	        		id: "id"
	        	},
	        	data: "results"
	        },
			pageSize: 20,
			serverPaging: true,
			serverFiltering: true,
			batch: true
		}),
		roleUserDs 	: new kendo.data.DataSource({
			transport: {
				read: {
					url: apiUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'GET'
				},
				create: {
					url: apiUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'POST'
				},
				update: {
					url: apiUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'PUT'
				},
				destroy: {
					url: apiUrl + 'roles/user',
					dataType: 'json',
					headers: {
						"Entity": getDB()
					},
					type: 'DELETE'
				},
				parameterMap: function(data, operation) {
					if(operation === 'read') {
						return {
							limit: data.pageSize,
							offset: data.skip,
							filter: data.filter
						};
					}
					return {models: kendo.stringify(data.models)};
				}
			},
			schema: {
	        	model: {
	        		id: "id"
	        	},
	        	data: "results"
	        },
			pageSize: 20,
			serverPaging: true,
			serverFiltering: true,
			batch: true
		}),
		find 		: function(arg) {},
		setCurrent 	: function(currentRole) {},
		save 		: function() {}
	});

	// DBS
	banhji.store = banhji.store || {};
	banhji.dbsUrl = "https://developers.dbs.com:10443/api/sg/v1/accounts/1018260032/accountHolders?productType=CA";
	banhji.dbsApiKey = "9c976436-9f86-42b1-965c-3a6d15c73d66";
	banhji.dbsToken = "bPIIqpDNbR14tBI0X+DbkVWa0Ao=";
	banhji.dbsHeaders = {
		'apiKey' 		: banhji.dbsApiKey,
		'uuid' 	 		: banhji.dbsApiKey,
		'Authorization' : banhji.dbsToken == "" ? banhji.authorization : banhji.dbsToken
	};
	banhji.store.dbsDataSource = new kendo.data.DataSource({
		transport: {
		    read: {
		    	url: banhji.dbsUrl,
		    	headers: banhji.dbsHeaders,
				type: "GET",
		        dataType: "json",
		        contentType: 'application/json'
		    }
		},
		batch: false,
		schema: {
			data: function(response) {
				var data = [];
				data.push(response);
				return data;
			}
		}
	});

	// SOURCE #############################################################################################
	banhji.source = kendo.observable({
		lang 						: langVM,
		countryDS					: dataStore(apiUrl + "countries"),
		//Contact
		customerList 				: [],
		supplierList 				: [],
		employeeList 				: [],
		contactDS					: dataStore(apiUrl + "contacts"),
		customerDS					: dataStore(apiUrl + "contacts"),
		supplierDS					: dataStore(apiUrl + "contacts"),
		employeeDS					: dataStore(apiUrl + "contacts"),
		//Contact Type
		contactTypeList 			: [],
		contactTypeDS				: dataStore(apiUrl + "contacts/type"),
		//Job
		jobList 					: [],
		jobDS						: dataStore(apiUrl + "jobs"),
		//Currency
		currencyList 				: [],
		currencyDS					: dataStore(apiUrl + "currencies"),
		currencyRateDS				: dataStore(apiUrl + "currencies/rate"),
		//Item
		itemList 					: [],
		itemDS						: dataStore(apiUrl + "items"),
		itemTypeDS					: dataStore(apiUrl + "item_types"),
		itemGroupList 				: [],
		itemGroupDS					: dataStore(apiUrl + "items/group"),
		brandDS						: dataStore(apiUrl + "brands"),
		categoryList 				: [],
		categoryDS					: dataStore(apiUrl + "categories"),		
		itemPriceList 				: [],
		itemPriceDS					: dataStore(apiUrl + "item_prices"),
		measurementList 			: [],
		measurementDS				: dataStore(apiUrl + "measurements"),
		//Tax
		taxList 					: [],
		taxItemDS					: dataStore(apiUrl + "tax_items"),
		//Accounting
		accountList 				: [],
		accountDS					: dataStore(apiUrl + "accounts"),
		accountTypeDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts/type",
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
			filter:{ field:"id >", value:9 },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Payment Term, Method, Segment
		paymentTermDS				: dataStore(apiUrl + "payment_terms"),
		paymentMethodDS				: dataStore(apiUrl + "payment_methods"),
		//Segment
		segmentItemList 			: [],
		segmentItemDS				: dataStore(apiUrl + "segments/item"),
		//Txn Template
		txnTemplateList 			: [],
		txnTemplateDS				: dataStore(apiUrl + "transaction_templates"),
		//Prefixes
		prefixList 					: [],
		prefixDS					: dataStore(apiUrl + "prefixes"),
		frequencyList 				: [
			{ id: 'Daily', name: 'Day' },
			{ id: 'Weekly', name: 'Week' },
			{ id: 'Monthly', name: 'Month' },
			{ id: 'Annually', name: 'Annual' }
		],
		monthOptionList 			: [
			{ id: 'Day', name: 'Day' },
			{ id: '1st', name: '1st' },
			{ id: '2nd', name: '2nd' },
			{ id: '3rd', name: '3rd' },
			{ id: '4th', name: '4th' }
		],
		monthList 					: [
			{ id: 0, name: 'January' },
			{ id: 1, name: 'February' },
			{ id: 2, name: 'March' },
			{ id: 3, name: 'April' },
			{ id: 4, name: 'May' },
			{ id: 5, name: 'June' },
			{ id: 6, name: 'July' },
			{ id: 7, name: 'August' },
			{ id: 8, name: 'September' },
			{ id: 9, name: 'October' },
			{ id: 10, name: 'November' },
			{ id: 11, name: 'December' }
		],
		weekDayList 				: [
			{ id: 0, name: 'Sunday' },
			{ id: 1, name: 'Monday' },
			{ id: 2, name: 'Tuesday' },
			{ id: 3, name: 'Wednesday' },
			{ id: 4, name: 'Thurday' },
			{ id: 5, name: 'Friday' },
			{ id: 6, name: 'Saturday' }
		],
		dayList 					: [
			{ id: 1, name: '1st' },
			{ id: 2, name: '2nd' },
			{ id: 3, name: '3rd' },
			{ id: 4, name: '4th' },
			{ id: 5, name: '5th' },
			{ id: 6, name: '6th' },
			{ id: 7, name: '7th' },
			{ id: 8, name: '8th' },
			{ id: 9, name: '9th' },
			{ id: 10, name: '10th' },
			{ id: 11, name: '11st' },
			{ id: 12, name: '12nd' },
			{ id: 13, name: '13rd' },
			{ id: 14, name: '14th' },
			{ id: 15, name: '15th' },
			{ id: 16, name: '16th' },
			{ id: 17, name: '17th' },
			{ id: 18, name: '18th' },
			{ id: 19, name: '19th' },
			{ id: 20, name: '20th' },
			{ id: 21, name: '21st' },
			{ id: 22, name: '22nd' },
			{ id: 23, name: '23rd' },
			{ id: 24, name: '24th' },
			{ id: 25, name: '25th' },
			{ id: 26, name: '26th' },
			{ id: 27, name: '27th' },
			{ id: 28, name: '28th' },
			{ id: 0, name: 'Last' }
		],
		sortList					: [
	 		{ text:"All", value: "all" },
	 		{ text:"Today", value: "today" },
	 		{ text:"This Week", value: "week" },
	 		{ text:"This Month", value: "month" },
	 		{ text:"This Year", value: "year" }
		],
		statusList 					: [
			{ "id": 1, "name": "Active" },
			{ "id": 0, "name": "Inactive" },
			{ "id": 2, "name": "Void" }
        ],
        customerFormList 			: [
	    	{ id: "Quote", name: "Quotation" },
			{ id: "Sale_Order", name: "Sale Order" },
			{ id: "Deposit", name: "Deposit" },
			{ id: "Cash_Sale", name: "Cash Sale" },
			{ id: "Invoice", name: "Invoice" },
			{ id: "Cash_Receipt", name: "Cash Receipt" },
			//{ id: "Sale_Return", name: "Sale Return" },
			{ id: "GDN", name: "Delivered Note" }
	    ],
	    vendorFormList 				: [
	    	{ id: "Purchase_Order", name: "Purchase Order" },
	    	{ id: "GRN", name: "GRN" },
			// { id: "Deposit", name: "Deposit" },
			// { id: "Purchase", name: "Purchase" },
			// { id: "Pur_Return", name: "Pur.Return" },
			{ id: "Cash_Payment", name: "Cash Payment" }
	    ],
	    cashFormList 				: [
	    	{ id: "Cash_Transfer", name: "Cash Transaction" },
	    	{ id: "Cash_Receipt", name: "Cash Receipt" },
			{ id: "Cash_Payment", name: "Cash Payment" },
			{ id: "Cash_Advance", name: "Cash Advance" },
			{ id: "Reimbursement", name: "Reimbursement" },
			{ id: "Advance_Settlement", name: "Advance Settlement" }
	    ],
	    cashMGTFormList				: [
	    	{ id: "Cash_Transfer", name: "Transfer" },
	    	{ id: "Deposit", name: "Deposit" },
			{ id: "Withdraw", name: "Withdraw" },
			{ id: "Cash_Advance", name: "Advance" },
			{ id: "Cash_Payment", name: "Payment" },
			{ id: "Reimbursement", name: "Reimbursement" },
			{ id: "Journal", name: "Journal" }
	    ],
		genderList					: ["M", "F"],
		typeList 					: ['Invoice','Commercial_Invoice','Vat_Invoice','Electricity_Invoice','Water_Invoice','Cash_Sale','Commercial_Cash_Sale','Vat_Cash_Sale','Receipt_Allocation','Sale_Order','Quote','GDN','Sale_Return','Purchase_Order','GRN','Cash_Purchase','Credit_Purchase','Purchase_Return','Payment_Allocation','Deposit','Electricty_Deposit','Water_Deposit','Customer_Deposit','Vendor_Deposit','Withdraw','Transfer','Journal','Item_Adjustment','Cash_Advance','Reimbursement','Direct_Expense','Advance_Settlement','Additional_Cost','Cash_Payment','Cash_Receipt','Credit_Note','Debit_Note','Offset_Bill','Offset_Invoice','Cash_Transfer','Internal_Usage'],
		user_id						: banhji.userData.id,
		amtDueColor 				: "#D5DBDB",
		acceptedSrc					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/accepted.ico",
		approvedSrc					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/approved.ico",
		cancelSrc					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/cancel.ico",
		openSrc 					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/open.ico",
		paidSrc 					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/paid.ico",
		partialyPaidSrc 			: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/partialy_paid.ico",
		usedSrc 					: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/used.ico",
		receivedSrc 				: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/received.ico",
		deliveredSrc 				: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/delivered.ico",
		successMessage 				: "Saved Successful!",
		errorMessage 				: "Warning, please review it again!",
		confirmMessage 				: "Are you sure, you want to delete it?",
		requiredMessage 			: "Required",
		duplicateNumber 			: "Duplicate Number!",
		duplicateInvoice 			: "Duplicate Invoice!",
		selectCustomerMessage 		: "Please select a customer.",
		selectSupplierMessage 		: "Please select a supplier.",
		selectItemMessage 			: "Please select an item.",
		duplicateSelectedItemMessage: "You already selected this item.",
		pageLoad 					: function(){
			this.loadCurrencies();
			this.loadRates();
			this.loadPrefixes();
			this.loadTxnTemplates();
			this.loadTaxes();
			this.loadJobs();
			this.loadSegmentItems();
			this.loadAccounts();
			this.loadCategories();
			this.loadItemGroups();
			this.loadItems();
			this.itemTypeDS.read();
			this.loadItemPrices();
			this.loadMeasurements();
			this.loadContactTypes();
			this.loadCustomers();
			this.loadSuppliers();
			this.loadEmployees();
			this.accountTypeDS.read();
		},
		getFiscalDate 				: function(){
			var today = new Date(),	
			fDate = new Date(today.getFullYear() +"-"+ banhji.institute.fiscal_date);

			if(today < fDate){
				fDate.setFullYear(today.getFullYear()-1);
			}		

			return fDate;
		},
		loadPrefixes 				: function(){
			var self = this, raw = this.get("prefixList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.prefixDS.query({
				filter: [],
			}).then(function(){
				var view = self.prefixDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadTxnTemplates 			: function(){
			var self = this, raw = this.get("txnTemplateList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.txnTemplateDS.query({
				filter:[]
			}).then(function(){
				var view = self.txnTemplateDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadCurrencies 					: function(){
			var self = this, raw = this.get("currencyList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.currencyDS.query({
				filter:[]
			}).then(function(){
				var view = self.currencyDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadRates 					: function(){
			this.currencyRateDS.query({
				filter:[],
				sort:{ field:"date", dir:"desc"}
			});
		},
		getRate						: function(locale, date){
			var rate = 0, lastRate = 1;
			$.each(this.currencyRateDS.data(), function(index, value){
				if(value.locale == locale){
					lastRate = kendo.parseFloat(value.rate);

					if(date >= new Date(value.date)){
						rate = kendo.parseFloat(value.rate);

						return false;
					}
				}
			});

			//If no rate, use the last rate
			if(rate==0){
				rate = lastRate;
			}

			return rate;
		},
		loadTaxes 					: function(){
			var self = this, raw = this.get("taxList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.taxItemDS.query({
				filter:[]
			}).then(function(){
				var view = self.taxItemDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadJobs 					: function(){
			var self = this, raw = this.get("jobList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.jobDS.query({
				filter:[]
			}).then(function(){
				var view = self.jobDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadSegmentItems 			: function(){
			var self = this, raw = this.get("segmentItemList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.segmentItemDS.query({
				filter:{ field:"segment_id >", value: 0 }
			}).then(function(){
				var view = self.segmentItemDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadAccounts 				: function(){
			var self = this, raw = this.get("accountList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.accountDS.query({
				filter: { field:"status", value:1 }
			}).then(function(){
				var view = self.accountDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadCategories 				: function(){
			var self = this, raw = this.get("categoryList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.categoryDS.query({
				filter:[]
			}).then(function(){
				var view = self.categoryDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadItemGroups 				: function(){
			var self = this, raw = this.get("itemGroupList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.itemGroupDS.query({
				filter:[]
			}).then(function(){
				var view = self.itemGroupDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadItems 					: function(){
			var self = this, raw = this.get("itemList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.itemDS.query({
				filter:{ field:"status", value:1 }
			}).then(function(){
				var view = self.itemDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadItemPrices 				: function(){
			var self = this, raw = this.get("itemPriceList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.itemPriceDS.query({
				filter:[
					{ field:"assembly_id", value:0 },
					{ field:"status", operator:"where_related_item", value:1 }
				]
			}).then(function(){
				var view = self.itemPriceDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadMeasurements 			: function(){
			var self = this, raw = this.get("measurementList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.measurementDS.query({
				filter:[],
			}).then(function(){
				var view = self.measurementDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadContactTypes			: function(){
			var self = this, raw = this.get("contactTypeList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.contactTypeDS.query({
				filter:[]
			}).then(function(){
				var view = self.contactTypeDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadCustomers 				: function(){
			var self = this, raw = this.get("customerList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.customerDS.query({
				filter:[
					{ field:"parent_id", operator:"where_related_contact_type", value:1 }
				]
			}).then(function(){
				var view = self.customerDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadSuppliers 				: function(){
			var self = this, raw = this.get("supplierList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.supplierDS.query({
				filter:[
					{ field:"parent_id", operator:"where_related_contact_type", value:2 }
				]
			}).then(function(){
				var view = self.supplierDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		loadEmployees 				: function(){
			var self = this, raw = this.get("employeeList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.employeeDS.query({
				filter:[
					{ field:"parent_id", operator:"where_related_contact_type", value:3 },
					{ field:"status", value:1 }
				]
			}).then(function(){
				var view = self.employeeDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		getPaymentTerm 				: function(id){
			var data = this.paymentTermDS.get(id);
			return data.name;
		},
		getPrefixAbbr 				: function(type){
			var abbr = "";
			$.each(this.prefixList, function(index, value){
				if(value.type==type){
					abbr = value.abbr;

					return false;
				}
			});

			return abbr;
		}
	});
	
	/*************************************************
	*   HOME PAGE MVVM		  						 *
	*************************************************/
	banhji.index = kendo.observable({
		lang 				: langVM,
		dataSource			: dataStore(apiUrl+"accounting_modules/apar"),
		summaryDS			: dataStore(apiUrl+"accounting_modules/financial_snapshot"),
		graphDS 			: dataStore(apiUrl+"cash_modules/cash_in_out"),
		modules 			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'admin/modules',
					type: "GET",
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'admin/modules',
					type: "POST",
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'admin/modules',
					type: "PUT",
					dataType: 'json'
				},
				destroy : {
					url: apiUrl + 'admin/modules',
					type: "DELETE",
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							limit: options.pageSize,
							page: options.page,
							filter: options.filter
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
			serverPaging: true,
			// pageSize: 100
		}),
		companyInf 			: function() {
			var company = JSON.parse(localStorage.getItem('userData/user'));
			return company;
		},
		getLogo   			: function() {
			banhji.companyDS.fetch(function(){
				if(banhji.companyDS.data().length > 0) {
					banhji.index.set('companyLogo', banhji.companyDS.data()[0].logo);
				}
			});
		},
		obj 				: {},
		today 				: new Date(),
		companyName 		: null,
		companyLogo 		: "",
		pageLoad 			: function(){
			this.setObj();
			this.loadData();
		},
		setObj 		: function(){
			this.set("obj", {
				//AR
				ar 					: 0,
				ar_open 			: 0,
				ar_customer 		: 0,
				ar_overdue 			: 0,
				//AP
				ap 					: 0,
				ap_open 			: 0,
				ap_vendor 			: 0,
				ap_overdue 			: 0,
				//Performance
				income 				: 0,
				expense 			: 0,
				net_income 			: 0,
				//Position
				asset 				: 0,
				liability 	 		: 0,
				equity 	 			: 0
			});
		},
		loadData 			: function(){
			var self = this, obj = this.get("obj");

			this.graphDS.read();

			this.dataSource.query({
				filter: [],
				page: 1,
				pageSize: 5
			}).then(function(){
				var view = self.dataSource.view();
				
				obj.set("ar", kendo.toString(view[0].ar, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("ar_open", kendo.toString(view[0].ar_open, "n0"));
				obj.set("ar_customer", kendo.toString(view[0].ar_customer, "n0"));
				obj.set("ar_overdue", kendo.toString(view[0].ar_overdue, "n0"));

				obj.set("ap", kendo.toString(view[0].ap, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("ap_open", kendo.toString(view[0].ap_open, "n0"));
				obj.set("ap_vendor", kendo.toString(view[0].ap_vendor, "n0"));
				obj.set("ap_overdue", kendo.toString(view[0].ap_overdue, "n0"));
			});

			this.summaryDS.query({
				filter: [],
				page: 1,
				pageSize: 5
			}).then(function(){
				var view = self.summaryDS.view();
				
				obj.set("income", kendo.toString(view[0].income, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("expense", kendo.toString(view[0].expense, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("net_income", kendo.toString(view[0].net_income, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				
				obj.set("asset", kendo.toString(view[0].asset, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("liability", kendo.toString(view[0].liability, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
				obj.set("equity", kendo.toString(view[0].equity, banhji.locale=="km-KH"?"c0":"c2", banhji.locale));
			});
		}
	});
	banhji.searchAdvanced =  kendo.observable({
    	lang 				: langVM,
    	contactDS 			: dataStore(apiUrl+"contacts"),
    	contactTypeDS 		: dataStore(apiUrl+"contacts/type"),
    	transactionDS 		: dataStore(apiUrl+"transactions"),
    	itemDS 				: dataStore(apiUrl+"items"),
    	accountDS 			: dataStore(apiUrl+"accounts"),
    	searchType 			: "",
    	searchText 			: "",
    	found 				: 0,
    	pageLoad 			: function(){
		},
		search 				: function(){
			var self = this, 
			searchText = this.get("searchText");
			this.set("found", 0);

			if(searchText){
				this.contactDS.query({
					filter:[
						{ field:"number", operator:"like", value: searchText },
						{ field:"surname", operator:"or_like", value: searchText },
						{ field:"name", operator:"or_like", value: searchText },
						{ field:"company", operator:"or_like", value: searchText }
					],
					page:1,
					pageSize: 10
				}).then(function(){
					var found = self.get("found") + self.contactDS.total();
					self.set("found", found);
				});

				this.transactionDS.query({
					filter:[
						{ field:"number", operator:"like", value: searchText }
					],
					page:1,
					pageSize: 10
				}).then(function(){
					var found = self.get("found") + self.transactionDS.total();
					self.set("found", found);
				});

				this.itemDS.query({
					filter:[
						{ field:"number", operator:"like", value: searchText },
						{ field:"name", operator:"or_like", value: searchText }
					],
					page:1,
					pageSize: 10
				}).then(function(){
					var found = self.get("found") + self.itemDS.total();
					self.set("found", found);
				});

				this.accountDS.query({
					filter:[
						{ field:"number", operator:"like", value: searchText },
						{ field:"name", operator:"or_like", value: searchText }
					],
					page:1,
					pageSize: 10
				}).then(function(){
					var found = self.get("found") + self.accountDS.total();
					self.set("found", found);
				});
			}
		},
		selectedContact 	: function(e){
			e.preventDefault();

			var data = e.data, 
			type = this.contactTypeDS.get(data.contact_type_id);
			
			if(type.parent_id==1){
				banhji.customerCenter.loadContact(data.id);
				banhji.router.navigate('/customer_center', false);
			}else{
				banhji.vendorCenter.loadContact(data.id);
				banhji.router.navigate('/vendor_center', false);
			}
		},
		selectedTransaction : function(e){
			e.preventDefault();

			var data = e.data;
			banhji.router.navigate('/'+data.type.toLowerCase()+'/'+data.id);
		},
		selectedItem 		: function(e){
			e.preventDefault();

			var data = e.data;
			banhji.router.navigate('/item_center/'+e.data.id);
		},
		selectedAccount 		: function(e){
			e.preventDefault();

			var data = e.data;
			banhji.router.navigate('/accounting_center/'+e.data.id);
		}
    });



    /*************************************************
	*   VIEW & LAYOUT	  				 		 	 *
	*************************************************/
	banhji.view = {
		layout 		: new kendo.Layout('#layout', {model: banhji.Layout}),
		blank		: new kendo.View('<div></div>'),
		index  		: new kendo.Layout("#index", {model: banhji.index}),
		menu 		: new kendo.Layout('#menu-tmpl', {model: banhji.userManagement}),
		searchAdvanced: new kendo.Layout("#searchAdvanced", {model: banhji.searchAdvanced}),

		//
		finance: new kendo.Layout("#finance", {model: banhji.finance}),
		budget: new kendo.Layout("#budget", {model: banhji.budget}),
		controls: new kendo.Layout("#controls", {model: banhji.controls}),
		audit: new kendo.Layout("#audit", {model: banhji.audit}),
		procurement: new kendo.Layout("#procurement", {model: banhji.procurement}),
			
	};
	banhji.router = new kendo.Router({
		init: function() {	
			var language = JSON.parse(localStorage.getItem('userData/lang'));	
			switch(language) {
				case "KH": 
					langVM.set('lang', km_KH);
					localforage.setItem("lang", language);
					langVM.set('localeCode', language);
					break;
				case "EN":
					langVM.set('lang', en_US);
					localforage.setItem("lang", language);
					langVM.set('localeCode', language);
					break;
				default: 
					langVM.set('lang', en_US);
					localforage.setItem("lang", language);
					langVM.set('localeCode', language);
			}
			localforage.getItem('user', function(err, data){
				if (err) {
					
				} else {
					$('#current-section').html('|&nbsp;Company');
					$('#home-menu').addClass('active');
					banhji.view.layout.render("#wrapperApplication");
					banhji.index.set('companyName', data.institute.name);
					banhji.index.set('companyLogo', data.institute.logo);
					var blank = new kendo.View('#blank-tmpl');
					banhji.view.layout.showIn('#menu', banhji.view.menu);
					if(userPool.getCurrentUser() == null) {
						window.location.replace(baseUrl + "login");
					}
					banhji.aws.getImage();
				}
			});	
			
		},
		routeMissing: function(e) {
			// banhji.view.layout.showIn("#layout-view", banhji.view.missing);
			console.log("no resource found.")
		}
	});
	/* Login page */
	banhji.router.route('/', function(){
		var blank = new kendo.View('#blank-tmpl');
		banhji.view.layout.showIn('#content', banhji.view.index);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		$('#main-top-navigation').append('<li><a href="\#">Home</a></li>');
		$('#current-section').text("");
		$("#secondary-menu").html("");
		banhji.index.getLogo();
		banhji.index.pageLoad();
		banhji.pageLoaded["index"] = true;
	});
	banhji.router.route("/search_advanced", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			var vm = banhji.searchAdvanced;
			banhji.view.layout.showIn("#content", banhji.view.searchAdvanced);
			
			if(banhji.pageLoaded["search_advanced"]==undefined){
				banhji.pageLoaded["search_advanced"] = true;
			}

			vm.pageLoad();
		}
	});

	//Router
	banhji.router.route("/finance", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.finance);
			
			var vm = banhji.finance;
			banhji.userManagement.addMultiTask("Finance Function","finance",null);

			if(banhji.pageLoaded["finance"]==undefined){
				banhji.pageLoaded["finance"] = true;

				//vm.sorterChanges();
			}
			//vm.pageLoad();
		}
	});
	banhji.router.route("/budget", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.budget);
			
			var vm = banhji.budget;
			banhji.userManagement.addMultiTask("Budget","budget",null);

			if(banhji.pageLoaded["budget"]==undefined){
				banhji.pageLoaded["budget"] = true;

				//vm.sorterChanges();
			}
			//vm.pageLoad();
		}
	});
	banhji.router.route("/controls", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.controls);
			
			var vm = banhji.controls;
			banhji.userManagement.addMultiTask("Controls","controls",null);

			if(banhji.pageLoaded["controls"]==undefined){
				banhji.pageLoaded["controls"] = true;

				//vm.sorterChanges();
			}
			//vm.pageLoad();
		}
	});
	banhji.router.route("/audit", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.audit);
			
			var vm = banhji.audit;
			banhji.userManagement.addMultiTask("Audit","audit",null);

			if(banhji.pageLoaded["audit"]==undefined){
				banhji.pageLoaded["audit"] = true;

				//vm.sorterChanges();
			}
			//vm.pageLoad();
		}
	});
	banhji.router.route("/procurement", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.procurement);
			
			var vm = banhji.procurement;
			banhji.userManagement.addMultiTask("Procurement","procurement",null);

			if(banhji.pageLoaded["procurement"]==undefined){
				banhji.pageLoaded["procurement"] = true;

				//vm.sorterChanges();
			}
			//vm.pageLoad();
		}
	});



	$(function() {
		banhji.router.start();
		banhji.source.pageLoad();
		//console.log($(location).attr('hash').substr(2));

		var cognitoUser = userPool.getCurrentUser();
		cognitoUser.getSession(function(err, session) {
          	if(session) {
            	// window.location.replace(baseUrl + "rrd/");
          	} else {
            	window.location.replace(baseUrl + "login/");
          	}
        });

		function createCookie(name,value,days) {
		    if (days) {
		        var date = new Date();
		        date.setTime(date.getTime()+(days*24*60*60*1000000000000000));
		        var expires = "; expires="+date.toGMTString();
		    }
		    else var expires = "";
		    document.cookie = name+"="+value+expires+"; path=/";
		}
		function readCookie(name) {
		    var nameEQ = name + "=";
		    var ca = document.cookie.split(';');
		    for(var i=0;i < ca.length;i++) {
		        var c = ca[i];
		        while (c.charAt(0)==' ') c = c.substring(1,c.length);
		        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		    }
		    return null;
		}
		function eraseCookie(name) {
		    createCookie(name,"");
		}
	});
</script>