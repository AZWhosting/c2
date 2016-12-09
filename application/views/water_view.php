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
				<li><a href="<?php echo base_url(); ?>rrd/#" data-bind="click: checkRole"><img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png" style="height: 40px;"></a></li>
			</ul>
			<form class="navbar-form pull-left">
				<div class="btn-group">
				  	<a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
				    	<i class="icon-th"></i>
				    	<span class="caret"></span>
				  	</a>
				  	<ul class="dropdown-menu">
				    	<li data-bind="click: searchContact"><a href="#"><i class="icon-user"></i> Contact</a></li>
				    	<li data-bind="click: searchTransaction"><a href="#"><i class="icon-random"></i> Transaction</a></li>
				    	<li data-bind="click: searchItem"><a href="#"><i class="icon-th-list"></i> Item</a></li>
				  	</ul>
				</div>
			  	<input type="text" class="span2 search-query" placeholder="Search Contact" id="search-placeholder" 
			  			data-bind="value: searchText" 
			  			style="background-color: #555555; color: #ffffff; border-color: #333333; height: 22px;">
			  	<button type="submit" class="btn btn-inverse" data-bind="click: search"><i class="icon-search"></i></button>
			</form>
			<ul class="topnav" id="secondary-menu">
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



<!-- ***************************
*	Water Section      	  *
**************************** -->
<script id="wDashBoard" type="text/x-kendo-template">
	<img src="<?php echo base_url();?>/assets/water_bill.png" width="300" height="100">
	<div class="row-fluid" >
		<div class="span6" style="padding-left: 0;">
			<div class="cash-bg" style="padding-right: 0;">				
				<div class="span3" style="padding-left: 0; text-align: center;">
					<a href="#/reading">
						<img title="Add Reading" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/function_logo/ir_reader.png"  style="width: 120px; "  />
						<span style="text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Readings</span>
					</a>						
				</div>
				<div class="span3" style="padding-left: 0; text-align: center;">
					<a href="#/run_bill">
						<img title="Add Create Invoice" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/function_logo/create_invoice.png" style="width: 120px;"  />
						<span style=" text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Run Bill</span>
					</a>
				</div>
				<div class="span3" style="padding-left: 0; text-align: center;">						
					<a href="#/print_bill">
						<img title="Add Print Invoice" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/function_logo/print_invoice.png" style="width: 120px;"  />
						<span style="text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Print Bill</span>
					</a>						
				</div>
				<div class="span3" style="padding: 0; text-align: center;">						
					<a href="#/currency_rate">
						<img title="Receive Water Bill Payment" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/function_logo/receive_payment.png" style="width: 120px;"  />
						<span style=" text-transform: uppercase; color: #000; font-weight: 600; margin-top: 8px; display: inline-block;">Receipt</span>
					</a>						
				</div>
			</div>
			<div class="water-grap" style="background: #fff; width: 100%; min-height: 175px; margin-top: 10px;">
				Grap
			</div>
		</div>
	    <div class="span6" style="padding-left: 0;">
	    	<div class="cash-bg" style="margin-bottom: 10px;">
	    		<a href="">
					<div class="cash-invoice">
						<div class="span4" style="padding-left: 0;">
							<span style="font-size: 24px; color: #40546C;">DEPOSIT</span>
							<br>
							<span style="color: #9EA7B8;">Water Connection</span>
						</div>
						<div class="span5" style="color: #3F73A3; text-align: center; font-size: 35px; font-weight: 600; padding-left: 0; border-right: 1px solid #9DA9BF; ">
							$50,000
						</div>
						<div class="span3" style="text-align: center; margin-top: 7px; padding-right: 0; color: #000; font-size: 35px;">
							3,000
						</div>					
					</div>
				</a>
				<a href="">
					<div class="cash-invoice" style="margin-bottom: 0;">
						<div class="span4" style="padding-left: 0;">
							<span style="font-size: 24px; color: #40546C;">TOTAL SALE</span>
						</div>
						<div class="span4" style="color: #3F73A3; text-align: center; font-size: 35px; font-weight: 600; padding-left: 0; border-right: 1px solid #9DA9BF; ">
							$50,000
						</div>
						<div class="span4" style="text-align: center; margin-top: 7px; padding-right: 0; color: #000; font-size: 35px;">
							10,000<span style="font-size: 25px;">m<sup >3</sup></span>
						</div>										
					</div>
				</a>
	    	</div>
	    	<div class="cash-bg" style="margin-bottom: 10px;">
	    		<div class="row-fluid" >
					<div class="span6" style="background: #DEEAF6; margin-right: 15px; width: 47%; ">
						<a href="#/customer_balance_summary">
							<div class="widget-body alert-info welcome-nopadding" style="width: 100%;">
								<p style="color: #000;"><span>Expected due</span></p>
						
								<div class="strong" align="center" style="color: #3475AF; font-size: 40px; margin-top: -15px; margin-bottom: 0;">$35,000</div>
							
								<table width="100%" style="color: #8E9EAE;">
									<tbody>
										<tr align="center">
											<td>										
												<span style="font-size: 25px;">15</span>
												<br>
												<span>Invoices</span>
											</td>
											<td>
												<span style="font-size: 25px;">5</span>
												<br>
												<span>Customers</span>
											</td>
											<td>
												<span style="font-size: 25px;">3</span>
												<br>
												<span>Overdue</span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</a>
					</div>

					<div class="span6" style="background: #DEEAF6;">
						<a href="#/customer_balance_summary">
							<div class="widget-body alert-info welcome-nopadding" style="width: 100%;">
								<p style="color: #000;"><span>Amount to Pay</span></p>
						
								<div class="strong" align="center" style="color: #3475AF; font-size: 40px; margin-top: -15px; margin-bottom: 0;">$17,000</div>
							
								<table width="100%" style="color: #8E9EAE;">
									<tbody>
										<tr align="center">
											<td>										
												<span style="font-size: 25px;">10</span>
												<br>
												<span>Bills</span>
											</td>
											<td>
												<span style="font-size: 25px;">2</span>
												<br>
												<span>Operation</span>
											</td>
											<td>
												<span style="font-size: 25px;">1</span>
												<br>
												<span>Financing</span>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</a>
					</div>
				</div>
	    	</div>
	   </div>
	</div>
	<div class="span12 water-tableList" style="padding-left: 0;">
		<table class=" table table-borderless table-condensed ">
			<thead>
				<tr>
					<th><span>No.</span></th>
					<th><span>License</span></th>
					<th><span>No.of Bloc</span></th>
					<th><span>Active Customers</span></th>
					<th><span>Inactive Customers</span></th>
					<th><span>Deposit</span></th>
					<th><span>Quantity Sold(m<sup>3</sup>)</span></th>
					<th><span>Sale Amount</span></th>
					<th><span>Balance</span></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>test</td>
					<td>11</td>
					<td>3,000</td>
					<td>10</td>
					<td>5,000,000</td>
					<td>10,000</td>
					<td>2,500,000</td>
					<td>3,000,000</td>
				</tr>
				<tr>
					<td>1</td>
					<td>test</td>
					<td>11</td>
					<td>3,000</td>
					<td>10</td>
					<td>5,000,000</td>
					<td>10,000</td>
					<td>2,500,000</td>
					<td>3,000,000</td>
				</tr>
			</tbody>
		</table>
	</div>

</script>
<script id="wsale-by-branch-row-template" type="text/x-kendo-tmpl">		
	<tr>		
		<td class="sno">1</td>
		<td>#=name#</td>
		<td>#=location#</td>		
		<td align="right">#=kendo.toString(active_customer, "n0")#</td>
		<td align="right">#=kendo.toString(inactive_customer, "n0")#​</td>				
		<td align="right">#=kendo.toString(deposit, "c0", banhji.institute.locale)#</td>
		<td align="right">#=kendo.toString(usage, "n0")# m<sup>3</sup></td>		
		<td align="right">#=kendo.toString(sale, "c0", banhji.institute.locale)#</td>
		<td align="right">#=kendo.toString(unpaid, "c0", banhji.institute.locale)#</td>					
    </tr>   
</script>
<script id="wsale-by-location-row-template" type="text/x-kendo-tmpl">		
	<tr>		
		<td class="snoo">1</td>
		<td>#=branch_name#</td>
		<td>#=location_name#</td>		
		<td align="right">#=kendo.toString(active_customer, "n0")# </td>
		<td align="right">#=kendo.toString(inactive_customer, "n0")#​ </td>				
		<td align="right">#=kendo.toString(deposit, "c0", banhji.eDashBoard.locale)#</td>
		<td align="right">#=kendo.toString(usage, "n0")# m<sup>3</sup></td>		
		<td align="right">#=kendo.toString(sale, "c0", banhji.eDashBoard.locale)#</td>
		<td align="right">#=kendo.toString(unpaid, "c0", banhji.eDashBoard.locale)#</td>						
    </tr>   
</script>

<!--Setting-->
<script id="setting" type="text/x-kendo-template">
    <span class="pull-right glyphicons no-js remove_2" 
			onclick="javascript:window.history.back()"><i></i></span>
	<h2>Setting</h2>
	<br>

	<div class="widget widget-tabs widget-tabs-double widget-tabs-vertical row-fluid row-merge widget-tabs-gray">

	    <!-- Tabs Heading -->
	    <div class="widget-head span3">
	        <ul>
	            <li class="active">
	            	<a href="#tab1" class="glyphicons notes_2" data-toggle="tab">
	            		<i></i><span class="strong"><span>License</span></span>
	            	</a>
	            </li>  
	             <li>
	             	<a href="#tab2" class="glyphicons pushpin" data-toggle="tab">
	             		<i></i><span class="strong"><span>Bloc</span></span>
	             	</a>
	            </li>  
	            <li>
	            	<a href="#tab3" class="glyphicons old_man" data-toggle="tab">
	            		<i></i><span class="strong"><span>Customer Types</span></span>
	            	</a>
	            </li>
	            <li>
	            	<a href="#tab4" data-bind="click: goExemption" class="glyphicons retweet_2" data-toggle="tab">
	            		<i></i><span class="strong"><span>Exemption</span></span>
	            	</a>
	            </li>
	            <li>
	            	<a href="#tab5" data-bind="click: goTariff" class="glyphicons calculator" data-toggle="tab">
	            		<i></i><span class="strong"><span>Tariff</span></span>
	            	</a>
	            </li>
	            <li>
	            	<a href="#tab6" data-bind="click: goDeposit" class="glyphicons wallet" data-toggle="tab">
	            		<i></i><span class="strong"><span>Deposit</span></span>
	            	</a>
	            </li>
	            <li>
	            	<a href="#tab7" data-bind="click: goService" class="glyphicons cleaning" data-toggle="tab">
	            		<i></i><span class="strong"><span>Service</span></span>
	            	</a>
	            </li>
	            <li>
	            	<a href="#tab8" data-bind="click: goMaintenance" class="glyphicons rotation_lock" data-toggle="tab">
	            		<i></i><span class="strong"><span>Maintenance</span></span>
	            	</a>
	            </li>
	            <li>
	            	<a href="#tab9" data-bind="click: goPlan" class="glyphicons list" data-toggle="tab">
	            		<i></i><span class="strong"><span>Plans</span></span>
	            	</a>
	            </li> 
	             <li>
	            	<a href="#tab10" class="glyphicons nameplate_alt" data-toggle="tab">
	            		<i></i><span class="strong"><span>Custom Forms</span></span>
	            	</a>
	            </li>
	            <li>
	            	<a href="#tab11" class="glyphicons building" data-toggle="tab">
	            		<i></i><span class="strong"><span>Prefix Setting</span></span>
	            	</a>
	            </li>                       
	        </ul>
	    </div>
	    <!-- // Tabs Heading END -->

	    <div class="widget-body span9">
	        <div class="tab-content">
	        	
	            <!-- License -->
	            <div class="tab-pane active" id="tab1">
	            	<a class="btn-icon btn-primary glyphicons circle_plus" style="width: 130px" href="#/add_license"><i></i>Add License</a>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center" width="100"><span>Number</span></th>
	            				<th class="center"><span>Name</span></th>
	            				<th class="center"><span>Abbr</span></th>
	            				<th class="center" width="160"><span>Representive</span></th>
	            				<th class="center" width="180"><span>Expire Date</span></th>
	            				<th class="center" width="100"><span>Max Con.</span></th>
	            				<th class="center">Status</th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"	            				
				                data-template="licenseSetting-template"
				                data-template="customerSetting-contact-type-template"
				                data-bind="source: licenseDS"></tbody>
	            	</table>
	            </div>
	            <!-- // End License -->
	            
	            <div class="tab-pane" id="tab2">
	            	<div style="clear: both;margin-bottom: 10px;">
		            	<input data-role="dropdownlist"
		            	   class="span3"
		            	   style="padding-right: 1px;height: 32px;" 
            			   data-option-label="(--- Select ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="false"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: blockCompanyId,
		                              source: licenseDS,
		                              events: {change: onLicenseChange}"/>
		            	<input data-bind="value: blocName" type="text" placeholder="Location" style="height: 32px;"  class="span3 k-textbox k-invalid" />
		            	<input data-bind="value: blocAbbr" type="text" placeholder="Abbr" style="height: 32px;" class="span3 k-textbox k-invalid" />
		            	<a class="btn btn-default glyphicons circle_plus cutype-icon" style="width: 80px;margin-left: 2px;" data-bind="click: addBloc"><i></i>Add</a>
		            </div>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center"><span>License</span></th>
	            				<th class="center"><span>Location</span></th>
	            				<th class="center"><span>Abbr</span></th>
	            				<th class="center">Action</th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"		
			                data-template="blocSetting-template"
			                data-edit-template="bloc-edit-template"
			                data-auto-bind="true"
			                data-bind="source: blocDS"></tbody>
	            	</table>
	            </div>
	            <div class="tab-pane" id="tab3">
	            	<div style="clear: both;margin-bottom: 10px;">
		            	<input type="text" class="span3 k-textbox k-invalid" style="height: 32px;" data-bind="value: contactTypeName" placeholder="Type" />
		            	<input type="text" placeholder="Abbr" data-bind="value: contactTypeAbbr" style="height: 32px;"  class="span3 k-textbox k-invalid" />
		            	<select class="span3" style="height: 32px; border-radius: 0;background: #fff;" id="appendedInputButtons" data-bind="value: contactTypeCompany" >
			                <option value="0"><span>Not A Company</span></option>
			                <option value="1"><span>It is A Company</span></option>           
			            </select>
		            	<a class="btn btn-default glyphicons circle_plus cutype-icon" style="width: 80px;margin-left: 2px;" data-bind="click: addContactType"><i></i>Add</a>
		            </div>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center"><span>Type</span></th>
	            				<th class="center"><span>Abbr</span></th>
	            				<th class="center"><span>Other</span></th>
	            				<th class="center">Action</th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"	            	
				                data-template="custType-template"
				                data-edit-template="customerSetting-edit-contact-type-template"
				                data-bind="source: contactTypeDS"></tbody>
	            	</table>
	            </div>
	            <div class="tab-pane" id="tab4">
	            	<div style="clear: both;margin-bottom: 10px;">
	            		<input data-bind="value: exName" type="text" placeholder="Name" style="height: 32px;"  class="span3 k-textbox k-invalid" />

		                <input data-role="dropdownlist"
		            	   class="span2"
		            	   style="padding-right: 1px;height: 32px;" 
            			   data-option-label="(--- Unit ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: exUnit,
		                              source: typeUnit"/>
		            	
		            	<input data-bind="value: exPrice" type="text" placeholder="Price" style="height: 32px;" class="span3 k-textbox k-invalid" />
		            	<a class="btn btn-default glyphicons circle_plus cutype-icon" style="width: 80px;margin-left: 2px;" data-bind="click: addEx"><i></i>Add</a>
		            </div>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center"><span>Name</span></th>
	            				<th class="center"><span>Unit</span></th>
	            				<th class="center"><span>Price</span></th>
	            				<th class="center">Action</th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"	            				
				                data-template="exemptionSetting-template"
				                data-auto-bind="false"
				                data-edit-template="exemption-edit-template"
				                data-bind="source: planItemDS"></tbody>
	            	</table>
	            </div>
	            <div class="tab-pane" id="tab5">
		            <div style="clear: both;margin-bottom: 10px;">
		            	<input data-bind="value: tariffName" type="text" placeholder="Name" style="height: 32px;"  class="span8 k-textbox k-invalid" />

		            	<a class="btn btn-default glyphicons circle_plus cutype-icon" style="width: 80px;margin-left: 2px;" data-bind="click: addTariff"><i></i>Add</a>
		            </div>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center" width="300"><span>Name</span></th>
	            				<th class="center" ><span>Action</span></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"	            				
				                data-template="tariffSetting-template"
				                data-edit-template="tariff-edit-template"
				                data-auto-bind="false"
				                data-bind="source: planItemDS"></tbody>
	            	</table>
	            	
	            	<br>
	            	<p data-bind="visible: tariffSelect">Tariff Name: <span data-bind="text: tariffNameShow"></span></p>
	            	<table data-bind="visible: tariffSelect" class="table table-bordered table-condensed table-striped table-secondary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center" width="150"><span>Name</span></th>
	            				<th class="center" width="100"><span>Flat</span></th>
	            				<th class="center" width="100"><span>Usage</span></th>
	            				<th class="center" width="100"><span>Price</span></th>
	            				<th class="center" width="200"><span>Action</span></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"	            				
				                data-template="tariff-item-template"
				                data-auto-bind="false"
				                data-edit-template="tariff-edit-item-template"
				                data-bind="source: tariffItemDS"></tbody>
	            	</table>
	            	<!-- Tariff Item Window -->
		            <div data-role="window"
			                 data-title="Tariff Item"		                 
			                 data-width="250"
			                 data-height="290"
			                 data-actions="{}"
			                 data-position="{top: '30%', left: '37%'}"		                 
			                 data-bind="visible: windowTariffItemVisible">
	            		<table>
							<tr style="border-bottom: 8px solid #fff;">
								<td width="35%"><span data-bind="text: lang.lang.name"></span></td>
								<td>
									<input class="k-textbox" placeholder="Item Name ..." data-bind="value: tariffItemName" style="width: 100%;">
								</td>
							</tr>
							<tr style="border-bottom: 8px solid #fff;">
								<td><span>Flat</span></td>
								<td>
									<input data-role="dropdownlist"
					            	   style="padding-right: 1px;height: 32px;" 
			            			   data-auto-bind="false"			                   
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: tariffItemFlat,
					                              source: typeFlat"/>
								</td>
							</tr>
							<tr style="border-bottom: 8px solid #fff;">
								<td><span>Usage</span></td>
								<td>
									<input class="k-textbox" placeholder="Usage ..." data-bind="value: tariffItemUsage" style="width: 100%;">
								</td>
							</tr>
							<tr style="border-bottom: 8px solid #fff;">
								<td><span>Price</span></td>
								<td>
									<input class="k-textbox" placeholder="Price ..." data-bind="value: tariffItemAmount" style="width: 100%;">
								</td>
							</tr>
						</table>

						<br>
						<div style="text-align: center;">
							<span style="margin-bottom: 0;" class="btn btn-success btn-icon glyphicons ok_2" data-bind="click: saveTariffItem"><i></i><span data-bind="text: lang.lang.save"></span></span>

							<span class="btn btn-danger btn-icon glyphicons remove_2" data-bind="click: closeTariffWindowItem"><i></i><span data-bind="text: lang.lang.close"></span></span>  
						</div>
					</div>
	            </div>
	            <div class="tab-pane" id="tab6">
	            	<div style="clear: both;margin-bottom: 10px;">
	            		<input data-bind="value: depositName" type="text" placeholder="Name" style="height: 32px;"  class="span3 k-textbox k-invalid" />
		            	
		            	<input data-bind="value: depositPrice" type="text" placeholder="Price" style="height: 32px;" class="span3 k-textbox k-invalid" />

		            	<a class="btn btn-default glyphicons circle_plus cutype-icon" style="width: 80px;margin-left: 2px;" data-bind="click: addDeposit"><i></i>Add</a>
		            </div>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center"><span>Name</span></th>
	            				<th class="center"><span>Price</span></th>
	            				<th class="center">Action</th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"	            				
				                data-template="depositSetting-template"
				                data-edit-template="deposit-edit-template"
				                data-auto-bind="false"
				                data-bind="source: planItemDS"></tbody>
	            	</table>
	            </div>
	            <div class="tab-pane" id="tab7">
	            	<div style="clear: both;margin-bottom: 10px;">
	            		<input data-bind="value: serviceName" type="text" placeholder="Name" style="height: 32px;"  class="span3 k-textbox k-invalid" />
		            	
		            	<input data-bind="value: servicePrice" type="text" placeholder="Price" style="height: 32px;" class="span3 k-textbox k-invalid" />

		            	<a class="btn btn-default glyphicons circle_plus cutype-icon" style="width: 80px;margin-left: 2px;" data-bind="click: addService"><i></i>Add</a>
		            </div>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center"><span>Name</span></th>
	            				<th class="center"><span>Price</span></th>
	            				<th class="center">Action</th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"	            				
				                data-template="serviceSetting-template"
				                data-edit-template="service-edit-template"
				                data-auto-bind="false"
				                data-bind="source: planItemDS"></tbody>
	            	</table>
	            </div>
	            <div class="tab-pane" id="tab8">
	            	<div style="clear: both;margin-bottom: 10px;">
	            		<input data-bind="value: maintenanceName" type="text" placeholder="Name" style="height: 32px;"  class="span3 k-textbox k-invalid" />
		            	
		            	<input data-bind="value: maintenancePrice" type="text" placeholder="Price" style="height: 32px;" class="span3 k-textbox k-invalid" />

		            	<a class="btn btn-default glyphicons circle_plus cutype-icon" style="width: 80px;margin-left: 2px;" data-bind="click: addMaintenance"><i></i>Add</a>
		            </div>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center"><span>Name</span></th>
	            				<th class="center"><span>Price</span></th>
	            				<th class="center">Action</th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"	            				
				                data-template="maintenanceSetting-template"
				                data-auto-bind="false"
				                data-edit-template="maintenance-edit-template"
				                data-bind="source: planItemDS"></tbody>
	            	</table>
	            </div>
	            <div class="tab-pane" id="tab9">
	            	<a class="btn-icon btn-primary glyphicons circle_plus" style="width: 110px;" href="#/plan"><i></i>Add Plan</a>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center"><span>Name</span></th>
	            				<th class="center"><span>Code</span></th>
	            				<th class="center"><span>Action</span></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"	            				
				                data-template="planSetting-template"
				                data-auto-bind="false"
				                data-bind="source: planDS"></tbody>
	            	</table>
	            	<table data-bind="visible: planSelect" class="table table-bordered table-condensed table-striped table-secondary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center" width="150"><span>Name</span></th>
	            				<th class="center" width="100"><span>Type</span></th>
	            				<th class="center" width="100"><span>Amount</span></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"	            				
				                data-template="plan-item-template"
				                data-auto-bind="false"
				                data-bind="source: planItemDS"></tbody>
	            	</table>
	            </div>
	            <div class="tab-pane" id="tab10">
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr class="widget-head">
	            				<th class="center"><span data-bind="text: lang.lang.name"></span></th>
	            				<th class="center"><span data-bind="text: lang.lang.form_type"></span></th>
	            				<th class="center"><span data-bind="text: lang.lang.last_edited"></span></th>
	            				<th class="center"><span data-bind="text: lang.lang.action"></span></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"
								 data-selectable="false"
				                 data-template="customerSetting-form-template"
				                 data-bind="source: txnTemplateDS">				            
	            		</tbody>
	            	</table>
	            	<a id="addNew" class="btn-icon btn-primary glyphicons ok_2" href="#/invoice_custom" style="width: 110px;"><i></i>Add New</a>
	            </div>
	            <div class="tab-pane" id="tab11">
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr class="widget-head">
	            				<th class="center" data-bind="text: lang.lang.type"></th>
	            				<th class="center" data-bind="text: lang.lang.abbr"></th>
	            				<th class="center" data-bind="text: lang.lang.startup_number"></th>
	            				<th style="text-align: left;padding-left: 5px;" data-bind="text: lang.lang.name"></th>
	            				<th class="center"><span data-bind="text: lang.lang.action"></span></th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"
								 data-selectable="false"
				                 data-template="accountSetting-prefix-template"
				                 data-bind="source: prefixDS">				            
	            		</tbody>
	            	</table>
	            </div>
	        </div>
	    </div>

	</div>
</script>

<script id="licenseSetting-template" type="text/x-kendo-tmpl">
	<tr>
		<td>#= number #</td>
		<td>#= name #</td>
		<td>#= abbr #</td>
		<td>#= representative #</td>
		<td>#= expire_date #</td>
		<td>#= max_customer #</td>
		<td style="text-align: center;">
			#if(status==1){#
				<span class="btn-action glyphicons ok_2 btn-success" title="Active"><i></i></span>
			#}else if(status==2){#
				<span class="btn-action glyphicons lock btn-danger" title="Void"><i></i></span>
			#}else{#
				<span class="btn-action glyphicons unlock btn-danger" title="Inactive"><i></i></span>
			#}#
			<a class="btn-action glyphicons pencil btn-success" title="Edit" href="\#/add_license/#= id #"><i></i></a>
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
		        #if(is_system=="0"){#
			        <a class="btn-action glyphicons remove_2 btn-danger k-delete-button" href="\\#"><i></i></a>				        
		        #}#	   	
   		</td>   		
   	</tr>
</script>
<script id="blocSetting-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		#= branch.name#
   		</td>
   		<td align="center">
    		#= name#
   		</td>
   		<td align="center">
    		#= abbr#
   		</td>
   		<td align="center">   			   
		    <a class="btn-action glyphicons pencil btn-success k-edit-button" href="\\#"><i></i></a>
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
	            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
	            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
	        </div>
	    </td>
	</tr>
</script>
<script id="exemptionSetting-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		#= name#
   		</td>
   		<td align="center">
    		#= unit#
   		</td>
   		<td align="right" >
    		#= amount#
   		</td>
   		<td align="center">   			   
		    <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i></a>
   		</td>   		
   	</tr>
</script>
<script id="exemption-edit-template" type="text/x-kendo-tmpl">
    <tr>    	               
        <td>
			<input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" />
        </td>    
        <td>        	
        	<input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: unit,
                              source: typeUnit" />
        </td>      
        <td>
        	<input style="width: 100%;" type="text" class="k-textbox" data-bind="value:amount" />
        </td>
	    <td class="edit-buttons" style="text-align: center;">
	        <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
	        <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
	    </td>
    </tr>
</script>
<script id="tariffSetting-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		#= name#
   		</td>
   		<td align="left">   
		    <span class="k-edit-button"><i class="icon-edit"></i> Edit</span>
    		|
    		<span data-bind="click: viewTariffItem"><i class="icon-view"></i> View Item</span>
    		|
    		<span data-bind="click: showTariffItem"><i class="icon-plus icon-white"></i> Add Item</span>
   		</td>   		
   	</tr>
</script>
<script id="tariff-edit-template" type="text/x-kendo-tmpl">
    <tr>    	               
        <td>
			<input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" />
        </td>    

	    <td class="edit-buttons" style="text-align: center;">
	        <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
	        <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
	    </td>
    </tr>
</script>

<script id="tariff-item-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>#= name#</td>
    	<td align="center">
    		# if(is_flat == 0) {#
    			<span><i class="icon-remove"></i></span>
    		# }else{ #
    			<span><i class="icon-ok"></i></span>
    		# } #
    	</td>
    	<td align="right">#= usage#</td>
    	<td align="right">#= amount#</td>
    	<td align="center">
    		<span class="k-edit-button"><i class="icon-edit"></i> Edit</span>
    	</td>
   	</tr>
</script>
<script id="tariff-edit-item-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td><input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" /></td>
    	<td align="center">
    		<input data-role="dropdownlist"
        	   style="padding-right: 1px;height: 32px;" 
			   data-auto-bind="false"			                   
               data-value-primitive="true"
               data-text-field="name"
               data-value-field="id"
               data-bind="value: is_flat,
                          source: typeFlat"/>
		</td>
    	<td><input style="width: 100%;" type="text" class="k-textbox" data-bind="value:usage" /></td>
    	<td><input style="width: 100%;" type="text" class="k-textbox" data-bind="value:amount" /></td>
    	<td class="edit-buttons" style="text-align: center;">
	        <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
	        <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
	    </td>
   	</tr>
</script>
<script id="depositSetting-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		#= name#
   		</td>
   		<td align="right">
    		#= amount#
   		</td>
   		<td align="center">   			   
		    <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i></a>
   		</td>   		
   	</tr>
</script>
<script id="deposit-edit-template" type="text/x-kendo-tmpl">
    <tr>    	               
        <td>
			<input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" />
        </td>       
        <td>
        	<input style="width: 100%;" type="text" class="k-textbox" data-bind="value:amount" />
        </td>

	    <td class="edit-buttons" style="text-align: center;">
	        <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
	        <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
	    </td>
    </tr>
</script>
<script id="serviceSetting-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		#= name#
   		</td>
   		<td align="right">
    		#= amount#
   		</td>
   		<td align="center">   			   
		    <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i></a>
   		</td>   		
   	</tr>
</script>
<script id="service-edit-template" type="text/x-kendo-tmpl">
    <tr>    	               
        <td>
			<input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" />
        </td>       
        <td>
        	<input style="width: 100%;" type="text" class="k-textbox" data-bind="value:amount" />
        </td>

	    <td class="edit-buttons" style="text-align: center;">
	        <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
	        <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
	    </td>
    </tr>
</script>
<script id="maintenanceSetting-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		#= name#
   		</td>
   		<td align="right">
    		#= amount#
   		</td>
   		<td align="center">   			   
		    <a class="btn-action glyphicons pencil btn-success k-edit-button"><i></i></a>
   		</td>   		
   	</tr>
</script>
<script id="maintenance-edit-template" type="text/x-kendo-tmpl">
    <tr>    	               
        <td>
			<input style="width: 100%;" type="text" class="k-textbox" data-bind="value:name" />
        </td>       
        <td>
        	<input style="width: 100%;" type="text" class="k-textbox" data-bind="value:amount" />
        </td>

	    <td class="edit-buttons" style="text-align: center;">
	        <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
	        <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
	    </td>
    </tr>
</script>
<script id="plan-item-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>#= name#</td>
    	<td align="center">
    		#= type#
    	</td>
    	<td align="right">#= amount#</td>
   	</tr>
</script>
<script id="accountSetting-prefix-template" type="text/x-kendo-template">
	<tr>
		<td > #=type#  </a></td>
		<td style="text-align: center; padding-left: 10px!important;"> 
			#= abbr# 
		</td>
		<td class="center"> 
			#= startup_number#
		</td>
		<td class="center" style="text-align: left;">
			<a style="text-align: left;padding-left: 5px;" href="\\#/add_accountingprefix/#= id # ">#= name# </a>
		</td>
		<td class="center">
			<a class="btn-action glyphicons pencil btn-success" href="\\#/add_accountingprefix/#= id # "><i></i></a>
		</td>
	</tr>
</script>
<script id="addAccountingprefix" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>						
					</div>
			        <h2 style="padding:0 15px;"">Transaction Prefix</h2>
				    <br>

				    <span class="row-fluid">

				    	<span class="span6">
				    		<p>At the begining of every fiscal year, all the reference numbers will start at 1. 
				    			If you donot start using BanhJi at the beginning of your fiscal year, 
				    			please use Starting Number to determine you next number for each transaction reference. 
				    			This is important for your transaction reference number.</p>
				    	</span>

				    	<span class="span6">
				    		<table class="table table-borderless">	
						    	<thead>
							    	<tr>
							    		<th width="40%">Name</th>
							    		<th>Abbr</th>
							    		<th>Starting Number</td>
							    	</tr>
						    	</thead>
						    	<tbody>
							    	<tr>
							    		<td><span data-bind="text: obj.type"></span></td>
							    		<td>
							    			<input type="text" placeholder="Abbr" class="k-textbox k-invalid span4" data-bind="value: obj.abbr" style="width: 100px;" >
							    		</td>
							    		<td>
							    			<input type="text" placeholder="Starting Number" class="k-textbox k-invalid span2" data-bind="value: obj.startup_number" style="width: 100px;" >
							    		</td>
							    	</tr>
						    	</tbody>
							</table>
				    	</span>

				    </span>

					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>
						<div class="row">
							<span id="saveClose" class="btn btn-icon btn-success glyphicons power" style="width: 80px;float:right; margin-right: 15px;"><i></i> Save Close</span>	
						</div>
					</div>
					<!-- // Form actions END -->	
				</div>							
			</div>
		</div>
	</div>
</script>
<script id="customerSetting-form-template" type="text/x-kendo-template">
	<tr>
		<td ><a style="text-align: left;" href="\\#/invoice_custom/#= id # "> #=name#  </a></td>
		<td style="text-align: left; padding-left: 10px!important;"> 
			#= type.replace("_"," ")# 
		</td>
		<td style="text-align: left; padding-left: 10px!important;"> #if( updated_at ){ # 
				#=kendo.toString(new Date(updated_at),"D")# 
			 #}else{ #
			 	#=kendo.toString(new Date(created_at),"D")# 
			 #}#
		</td>
		<td class="center">
			#if( status == 0){ #
			<a class="btn-action glyphicons pencil btn-success" href="\\#/invoice_custom/#= id # "><i></i></a>
			<a data-bind="click: deleteForm" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
			# } #
		</td>
	</tr>
</script>

<script id="customerSetting-form-template" type="text/x-kendo-template">
	<tr>
		<td ><a style="text-align: left;" href="\\#/invoice_custom/#= id # "> #=name#  </a></td>
		<td style="text-align: left; padding-left: 10px!important;"> 
			#= type.replace("_"," ")# 
		</td>
		<td style="text-align: left; padding-left: 10px!important;"> #if( updated_at ){ # 
				#=kendo.toString(new Date(updated_at),"D")# 
			 #}else{ #
			 	#=kendo.toString(new Date(created_at),"D")# 
			 #}#
		</td>
		<td class="center">
			#if( status == 0){ #
			<a class="btn-action glyphicons pencil btn-success" href="\\#/invoice_custom/#= id # "><i></i></a>
			<a data-bind="click: deleteForm" class="btn-action glyphicons remove_2 btn-danger"><i></i></a>
			# } #
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
                <option value="0"><span data-bind="text: lang.lang.not_a_company"></span></option>
                <option value="1"><span data-bind="text: lang.lang.it_is_a_company"></span></option>			                
            </select>
        </td>              
 
    	<td class="edit-buttons" style="text-align: center;">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
        </td>
    </tr>  
</script>
<script id="planSetting-template" type="text/x-kendo-tmpl">
	<tr>
		<td>#= name #</td>
		<td>#= code #</td>
		<td>
			<a href="\#/plan/#: id#"><i class="icon-edit"></i> Edit</a>
    		|
    		<span data-bind="click: viewPlanItem"><i class="icon-view"></i> View Item</span>
    	</td>
	</tr>
</script>

<script id="plan" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>	
					</div>
			        <h2 style="padding:0 15px;">Add Plan</h2>
			        <div class="span12 row-fluid" style="padding:20px 0;">
			        	<div class="span12" style="padding-left: 0;">

				        	<div class="box-generic well" style="height: 190px; padding-bottom: 0;">				
								<table class="table table-borderless table-condensed cart_total">									
									<tbody>
										<tr>
											<td style="width: 5%"><span >Name</span></td>
											<td>
												<input
													class="k-textbox k-invalid"
													data-required-msg="required" 
													style="width: 100%;" 
													placeholder="Name ..." 
													aria-invalid="true"
													data-bind="value: current.name" />
											</td>
											<td style="width: 5%"><span >Code</span></td>
											<td>
												<input 
													class="k-textbox k-invalid" 
													data-required-msg="required" 
													style="width: 100%;" 
													placeholder="Code ..." 
													aria-invalid="true"
													data-bind="value: current.code" />
											</td>
										</tr>									
										<tr>
										</tr>								
									</tbody>
								</table>
							</div>
						</div>
		                <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs" style="margin-top: 20px;">
		                	<thead>
		                		<tr>
		                			<th style="width: 15%;" >Item</th>
		                			<th style="width: 20%;" >Type</th>
		                			<th style="width: 10%;" >Name</th>
		                			<th style="width: 11%;" >Rate</th>
		                			<th style="width: 11%;" >Action</th>
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
			            <div class="row-fluid">
							<!-- Column -->
							<div class="span4">
								<button class="btn btn-inverse" data-bind="click: addItem">
									<i class="icon-plus icon-white"></i>
								</button>
								<!-- Add New Item -->
								<ul class="topnav addNew">
									<li role="presentation" class="dropdown ">
								  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								  			<span >Add New Item</span>
					    					<span class="caret"></span>
								  		</a>
							  			<ul class="dropdown-menu addNewItem">  				  				
							  				<li><a data-bind="click: goSetting" data-go="3"><span >Excemption</span></a></li>
							  				<li><a data-bind="click: goSetting" data-go="4"><span >Tariff</span></a></li>
							  				<li><a data-bind="click: goSetting" data-go="5"><span >Deposit</span></a></li>
							  				<li><a data-bind="click: goSetting" data-go="6"><span >Service</span></a></li>
							  				<li><a data-bind="click: goSetting" data-go="7"><span >Maintenance</span></a></li>
							  				<li><a data-bind="click: goSetting" data-go="8"><span >Installation</span></a></li>  	
							  			</ul>
								  	</li>				
								</ul>
								<!--End Add New Item -->
							</div>
							<!-- Column END -->
						</div>
			        </div>
				    <br>
				    <!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>
						<div class="row">
							<div class="span3">
							</div>
							<div class="span9" align="right">
								<span id="saveNew" style="width: 80px!important;margin:0" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit, click: save" style="width: 50px;">
									<i></i><span>Save</span>
								</span>
								<span id="cancel" data-bind="click: cancel" class="btn btn-icon btn-success glyphicons power" style="width: 100px;">
									<i></i><span >Cancel</span>
								</span>
							</div>
						</div>
					</div>
					<!-- // Form actions END -->		
				</div>						
			</div>
		</div>
	</div>
</script>
<script id="planItem-list-item" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<input 
				data-role="dropdownlist" 
				style="width: 100%;" 
				data-option-label="Select ..." 
				data-auto-bind="true"  
				data-text-field="name" 
				data-value-field="id" 
				data-bind="
					value: item, 
					source: itemDS, 
					events: {change: onChange}">
		</td>
		<td><input type="text" class="k-textbox" data-bind="value: type" /></td>
		<td><input type="text" class="k-textbox" data-bind="value: name" /></td>
		<td><input type="text" class="k-textbox" data-bind="value: amount" /></td>
		<td align="center">
			<a class="btn-action glyphicons remove_2 btn-danger k-delete-button"><i></i></a>
		</td>
	</tr>
</script>
<script id="addLicense" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden;">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>						
					</div>
			        <h2>Add License</h2>
			        <br>
			        <!-- Top Part -->
			    	<div class="row-fluid">
			    		<div class="span12 well">									
							<div class="row">
								<div class="span3">														
									<!-- Group -->
									<div class="control-group">										
										<label ><span >License No.</span> <span style="color:red">*</span></label>
										<input 
											class="k-textbox" 
							            	data-bind="value: obj.number"
							            	placeholder="License No." 
							              	required data-required-msg="required"
							              	style="width: 100%;" />																				            
									</div>
									<!-- // Group END -->
								</div>

								<div class="span3" >	
									<!-- Group -->
									<div class="control-group">							
										<label ><span >License Name</span></label>										
				              			<br>
				              			<input
				              				class="k-textbox" 
							            	data-bind="value: obj.name" 
						              		placeholder="Name" 
						              		style="width: 100%;" />
									</div>
									<!-- // Group END -->											
								</div>

								<div class="span3">	
									<!-- Group -->
									<div class="control-group">								
										<label ><span >Abbr</span></label>
							            <input 
							            	class="k-textbox" 
							            	placeholder="Abbr" 
						            		data-bind="value: obj.abbr" 
						              		style="width: 100%;" />
									</div>																		
									<!-- // Group END -->
								</div>

								<div class="span3">
									<div class="control-group">								
										<label ><span >Representative</span></label>
										<input 
							            	class="k-textbox" 
							            	placeholder="Representative" 
						            		data-bind="value: obj.representative" 
						              		style="width: 100%;" />
									</div>
								</div>
							</div>
							
							<div class="row">
								
								<div class="span3">	
									<!-- Group -->
									<div class="control-group">								
										<label ><span >Currency</span></label>
										<select data-role="dropdownlist"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="
						                   	source: selectCurrency,
						                   	value: obj.currency"
						                   style="width: 100%; margin-bottom: 15px;" ></select>
						    		</div>																		
									<!-- // Group END -->
								</div>

								<div class="span3">	
									<!-- Group -->
									<div class="control-group">								
										<label ><span >Status</span> </label>
							            <select data-role="dropdownlist"
						                   data-value-primitive="true"
						                   data-text-field="name"
						                   data-value-field="id"
						                   data-bind="
						                   	source: selectType,
						                   	value: obj.status"
						                   style="width: 100%;" ></select>
									</div>																		
									<!-- // Group END -->
								</div>

								<div class="span3">	
									<!-- Group -->
									<div class="control-group">								
										<label ><span >Expire Date</span></label>
							            <input type="text" 
						                	style="width: 100%;" 
						                	data-role="datepicker"
						                	data-format="dd-MM-yyyy"
						                	placeholder="dd-mm-yyyy" 
								           	data-bind="value: obj.expire_date,
								           			  	min: toDay" />
									</div>																		
									<!-- // Group END -->
								</div>

								<div class="span3">
									<div class="control-group">								
										<label ><span >Maximum Houshold</span></label>
										<input 
							            	class="k-textbox" 
							            	placeholder="Maximum Houshold" 
						            		data-bind="value: obj.max_customer" 
						              		style="width: 100%;" />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="span12">
									<div class="control-group">								
										<label ><span >Description</span></label>
										<textarea rows="3" class="k-textbox k-valid" 
											style="width:100%" 
											data-bind="value: obj.description" 
											placeholder="Description ..."></textarea>
									</div>
								</div>
							</div>

						</div>
						
					</div>								
							
					<!-- // Bottom Tabs -->
					<div class="row-fluid">								
						<div class="box-generic" style="margin-bottom: 0; padding-bottom: 0;">
						    <!-- //Tabs Heading -->
						    <div class="tabsbar tabsbar-1">
						        <ul class="row-fluid row-merge">						            
						            <li class="span2 glyphicons nameplate_alt active">
						            	<a href="#tab1" data-toggle="tab"><i></i> <span><span >Info</span></span></a>
						            </li>								            
						            <li class="span2 glyphicons nameplate" style="width: 21%;">
						            	<a href="#tab2" data-toggle="tab"><i></i> <span><span >Terms & Condition</span></span></a>
						            </li>
						            <li class="span2 glyphicons paperclip">
						            	<a href="#tab3" data-toggle="tab"><i></i> <span><span ></span>Attach</span></a>
						            </li>						            					            
						        </ul>
						    </div>
						    <!-- // Tabs Heading END -->

						    <div class="tab-content">

						    	<!-- //GENERAL INFO -->
						        <div class="tab-pane active" id="tab1">
					            	<table class="table table-borderless table-condensed cart_total">					            		
							            <tr>
							                <td><span >Address</span></td>
							              	<td colspan="3">
					            				<input class="k-textbox" 
					            					data-bind="value: obj.address" 
													placeholder="Address ..." style="width: 100%;" />								
							              	</td>
							            </tr>
							            <tr>
							            	<td><span >Province</span></td>
							              	<td>
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
							              	</td>						              	
							            	<td><span >Mobile</span></td>
							              	<td>
							              		<input class="k-textbox" 
							              			data-bind="value: obj.mobile" 
							              			placeholder="Mobile ..." 
							              			style="width: 100%;" /></td>	              	
							            </tr>
							            <tr>
							            	<td><span >District</span></td>
							              	<td>
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
		                              					source: districtDS">
							              	</td>							              	
							            	<td><span >Telephone</span></td>
							              	<td><input class="k-textbox" 
							              		data-bind="value: obj.telephone" 
							              		placeholder="Telephone ..." style="width: 100%;" /></td>
							            </tr>	
							            <tr>
							            	<td><span >Email</span></td>
							              	<td>
							              		<input class="k-textbox" 
							              			data-bind="value: obj.email" 
							              			placeholder="Email ..." style="width: 100%;" />									            								              	
							            	<td></td>
							              	<td></td>							              	
							            </tr>									            
							            							            							            							            								            								            			            
							        </table>
					        	</div>
						        <!-- //GENERAL INFO END -->

						        <!-- //ACCOUNTING -->
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
						        <!-- //ACCOUNTING END -->						       

						        <!-- //CONTACT PERSON -->
						        <div class="tab-pane" id="tab3">
						        	<p><span >File Type</span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>		
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
								                <th><span >File Name</span></th>
								                <th><span >DESCRIPTION</span></th>
								                <th><span >Date</span></th>
								                <th style="width: 13%;"></th>                			                
								            </tr> 
								        </thead>
								        <tbody data-role="listview" 
								        		data-template="attachment-list-tmpl" 
								        		data-auto-bind="false"
								        		data-bind="source: attachmentDS"></tbody>			        
								    </table>
					        	</div>
						        <!-- //CONTACT PERSON END -->
						    </div>
						</div>
					</div>
					<br>
				    <!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>
						<div class="row">
							<div class="span3">
								
							</div>
							<div class="span9" align="right">
								<span id="saveNew" style="width: 80px!important;margin:0" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit, click: save" style="width: 50px;"><i></i> <span>Save</span></span>
								<span id="cancel" data-bind="click: cancel" class="btn btn-icon btn-success glyphicons power" style="width: 100px;"><i></i> <span >Cancel</span></span>
							</div>
						</div>
					</div>
					<!-- // Form actions END -->			
				</div>						
			</div>
		</div>
	</div>
</script>

<!--End Setting-->
<script id="waterCenter" type="text/x-kendo-template">	
	<div class="widget widget-heading-simple widget-body-gray widget-employees">		
		<div class="widget-body padding-none">			
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" >
					<div class="innerAll">			
						<!--button class="btn-primary span12" style="" data-bind="click: exportEXCEL">EXPORT XLSX</button-->						
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" placeholder="Number or Name..." data-bind="value: searchText, events:{change: enterSearch}">
								</div>
							</div>						
							<div class="select2-container" style="width: 100%;  margin-bottom: 10px;">
								<select data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: filterKey,
					                   		source: filterCustomerTypeDS, 
					                   		events: {change: filterChange}"
					                   style="width: 100%;" ></select>							
							</div>
						</form>	
					</div>
					<span class="results"><span data-bind="text: contactDS.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>
					<div class="table table-condensed" id="listContact" style="height: 580px;"						 
						 data-role="grid"						 
						 data-bind="source: contactDS"
						 data-row-template="waterCenter-customer-list-tmpl"
						 data-columns="[{title: 'abc'}]"
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
							            	<span data-bind="text: obj.name"></span>
							            </li>
							            <li class="glyphicons text_bigger dashboard active"><span data-toggle="tab" data-target="#tab1" data-bind="click: meterClick"><i></i></span>
							            </li>
							            <li class="glyphicons text_bigger" ><span data-bind="click: NometerClick" data-toggle="tab" data-target="#tab2"><i></i></span>
							            </li>							            							            
							            <li class="glyphicons circle_info"><span data-bind="click: NometerClick" data-toggle="tab" data-target="#tab3"><i></i></span>
							            </li>							            
							            <li class="glyphicons pen"><span data-bind="click: NometerClick" data-toggle="tab" data-target="#tab4"><i></i></span>
							            </li>
							            <li class="glyphicons paperclip"><span data-bind="click: NometerClick" data-toggle="tab" data-target="#tab5"><i></i></span>
							            </li>	         
							        </ul>
							        <div class="clearfix"></div>
							        <!-- // Tabs END -->
							    </div>
							    <!-- Widget Heading END -->
							    <div class="widget-body">
							        <div class="tab-content">
							        	<!-- Transactions Tab content -->
							            <div id="tab1" class="tab-pane box-generic active">
							            	<a class="btn btn-block btn-inverse" style="margin-bottom: 5px;" data-bind="click: goMeter, visible: meter_visible">Add Meter</a>
							            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
										        <thead>
										            <tr>			                
										                <th width="140">Meter No.</th>
										                <th width="50">Status</th>
										                <th width="100">Action</th>            
										            </tr> 
										        </thead>
										        <tbody data-role="listview" 
										        		data-template="meter-list-tmpl" 
										        		data-auto-bind="false"
										        		data-bind="source: meterDS"></tbody>			        
										    </table>
										    <div id="pager" class="k-pager-wrap"
											 data-auto-bind="false"
										     data-role="pager" data-bind="source: meterDS"></div>	
							            	<!--table class="table table-borderless table-condensed cart_total cash-table">
								            	<tr>
								            		<td width="50%">
								            			<a class="btn btn-block btn-inverse" data-bind="click: goMeter">Add Meter</a>
								            		</td>
								            		<td width="50%">
								            			<span class="btn btn-block btn-primary" data-bind="click: goActivateMeter"><span><span>Activate Meter</span></span>								            			
								            		</td>
								            	</tr>
							            	</table-->
							            </div>
							            <!-- // Transactions Tab content END -->	
							            <!-- Transactions Tab content -->
							            <div id="tab2" class="tab-pane box-generic">
							            	<table class="table table-borderless table-condensed cart_total cash-table">
								            	<tr>
								            		<td width="50%">
								            			<span class="btn btn-block btn-inverse" data-bind="click: goQuote"><span><span data-bind="text: lang.lang.quote"></span></span>
								            		</td>
								            		<td width="50%">
								            			<span class="btn btn-block btn-primary" data-bind="click: goDeposit"><span><span data-bind="text: lang.lang.c_deposit"></span></span>								            			
								            		</td>
								            	</tr>
								            	<tr>
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goSaleOrder"><span><span data-bind="text: lang.lang.sale_order"></span></span>
								            		</td>
								            		<td>
								            			<span class="btn btn-block btn-primary" data-bind="click: goCashSale"><span><span data-bind="text: lang.lang.cash_sale"></span></span>								            											            			
								            		</td>
								            	</tr>
								            	<tr>
								            		<td>
								            			<span class="btn btn-block btn-primary" data-bind="click: goSaleReturn"><span data-bind="text: lang.lang.sale_return1"></span></span>
								            		</td>
								            		<td>
								            			<span class="btn btn-block btn-primary" data-bind="click: goInvoice"><span data-bind="text: lang.lang.invoice"></span></span>								            											            			
								            		</td>
								            	</tr>
								            	<tr>								            		
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goGDN"><span data-bind="text:lang.lang.c_gdn"></span></span>
								            		</td>
								            		<td class="center">
								            			<span class="btn btn-block btn-primary" data-bind="click: goCashReceipt"><span data-bind="text: lang.lang.cash_receipt"></span></span>								            			

								            		</td>
								            	</tr>
								            	<tr>
								            		<td>
								            			<span class="btn btn-block btn-inverse" data-bind="click: goStatement"><span data-bind="text: lang.lang.statement"></span></span>
								            		</td>
								            		<td>
								            			
								            		</td>
								            	</tr>
							            	</table>
							            </div>
							            <!-- // Transactions Tab content END -->
							            <!-- INFO Tab content -->
							            <div id="tab3" class="tab-pane box-generic">
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
							            <div id="tab4" class="tab-pane">
										    <div>
												<input type="text" class="k-textbox" 
														data-bind="value: note, events:{change:saveNoteEnter}" 
														placeholder="Add memo ..." 
														style="width: 366px;" /-->
												<span class="btn btn-primary" data-bind="click: saveNote"><span data-bind="text: lang.lang.add"></span></span>
											</div>
											<br>
											<div class="table table-condensed" style="height: 100;"						 
												 data-role="grid"
												 data-auto-bind="false"						 
												 data-bind="source: noteDS"
												 data-row-template="waterCenter-note-tmpl"
												 data-columns="[{title: ''}]"
												 data-height="100"						 
												 data-scrollable="{virtual: true}"></div>
											
							            </div>
							            <!-- // NOTE Tab content END -->
							            <!-- Attach Tab content -->
								        <div id="tab5" class="tab-pane">							            	
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

										    <span class="btn btn-icon btn-success glyphicons ok_2" data-bind="click: uploadFile" style="color: #fff; padding: 5px 38px; text-align: left; width: 98px !important; display: inline-block; margin-top: 10px;"><i></i> <span data-bind="text: lang.lang.save"></span></span>

								        </div>
								        <!-- // Attach Tab content END -->							            								            

							        </div>
							    </div>
							</div>
						</div>
						<div class="span6" style="margin-bottom: 10px;">
							<div class="row-fluid">
								<div class="span6">
									<div class="widget-stats widget-stats-primary widget-stats-5" data-bind="click: loadBalance">
										<span class="glyphicons coins"><i></i></span>
										<span class="txt"><span data-bind="text: lang.lang.balance"></span><span data-bind="text: balance" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6">
									<div class="widget-stats widget-stats-inverse widget-stats-5" data-bind="click: loadDeposit">
										<span class="glyphicons briefcase"><i></i></span>
										<span class="txt"><span data-bind="text: lang.lang.deposit"></span><span data-bind="text: deposit" style="font-size:medium;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>							
							
							<div class="row-fluid">
								<div class="span6">
									<div class="widget-stats widget-stats-info widget-stats-5" data-bind="click: loadBalance">
										<span class="glyphicons circle_exclamation_mark"><i></i></span>
										<span class="txt"><span data-bind="text: outInvoice"></span> <span data-bind="text: lang.lang.open_invoice"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6">
									<div class="widget-stats widget-stats-default widget-stats-5" data-bind="click: loadOverInvoice">
										<span class="glyphicons turtle"><i></i></span>
										<span class="txt"><span data-bind="text: overInvoice"></span> <span data-bind="text: lang.lang.over_due"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>														
						</div>
					</div>
					<div class="row-fluid" id="waterCenterContent">
					</div>
				</div>
			</div>			
		</div>
	</div>		
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
                data-bind="source: transactionDS" >
        </tbody>
	</table>
	<div id="pager" class="k-pager-wrap"
	 data-auto-bind="false"
     data-role="pager" data-bind="source: transactionDS">
     </div>	
</script>
<script id="Transaction-tmpl" type="text/x-kendo-tmpl">
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
<script id="waterCenter-meter-tmpl" type="text/x-kendo-tmpl">
	<div class="heading-buttons">
		<h4 class="icon-bar-chart" ><i></i><span style="font-style: normal" data-bind="text: lang.lang.monthly_sale"></span></h4>
		
		<div class="clearfix"></div>
	</div>

	<div class="innerLR innerT">			
		<div id="wsale-graph" style="height: 200px;"></div>
	</div>
	<!-- <div id="meterClick">
	    <tr>    	  	
	    	<td>Graph Meter</td>
	    </tr>
	</div> -->
</script>
<script id="waterCenter-customer-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td>
			<div class="media-body strong" style="position: relative;">				
				<span>#=abbr##=number#</span>
				<span>
					#=name# 
					
				</span>
				#if(use_water == 0){#
					<a href="\#/activate_user/#=id#" class="activate">Activate</a>
				#}#
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

<script id="waterActivateUser" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden;">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>						
					</div>
			        <h2 style="padding:0 15px;">Activate Water User</h2>
			        <div class="span12 row-fluid" style="overflow: hidden;padding:40px 0;">
			        	
			        	<input data-role="dropdownlist"
		            	   class="span2 row-fluid"
		            	   style="width: 100%;margin-bottom: 20px;padding-left: 0" 
            			   data-option-label="(--- Licence ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: obj.licence,
		                              source: licenseDS,
		                              events: {change : lonChange}"/>

		                <input data-role="dropdownlist"
		            	   class="span2 row-fluid"
		            	   style="width: 100%;margin-bottom: 20px;padding-left: 0" 
            			   data-option-label="(--- Bloc ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: obj.bloc,
		                              source: blocDS"/>

			        	<input type="text" id="" name="Code" class="k-textbox k-invalid" placeholder="Code" required="" validationmessage="" style="width: 100%;margin-bottom: 20px;" data-bind="value: obj.code" aria-invalid="true">
			        	<input type="text" id="" name="Number of Family" class="k-textbox k-invalid" placeholder="Number of Family" required="" validationmessage="" style="width: 100%;margin-bottom: 20px;" data-bind="value: obj.family_member" aria-invalid="true">
			        	<input type="text" id="" name="ID Card Number" class="k-textbox k-invalid" placeholder="ID Card Number" required="" validationmessage="" style="width: 100%;margin-bottom: 20px;" data-bind="value: obj.national_id_number" aria-invalid="true">
			        	<input type="text" id="" name="Occupation" class="k-textbox k-invalid" placeholder="Occupation" required="" validationmessage="" style="width: 100%;" data-bind="value: obj.occupation" aria-invalid="true">
			        </div>
				    <br>
				    <!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>
						<div class="row">
							<div class="span3">
								
							</div>
							<div class="span9" align="right">
								<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit, click: save" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_new"></span></span>
									
							</div>
						</div>
					</div>
					<!-- // Form actions END -->		
				</div>						
			</div>
		</div>
	</div>
</script>

<!--  Meter  -->
<script id="waterAddMeter" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden;">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>						
					</div>
			        <h2>Meter</h2><br>
			       
			       	<div class="span12 row">			       		
			       		<!-- Top Part -->
				    	<div class="row-fluid">
				    		<div class="span6 well">									
								<div class="row">
									<div class="span12" style="padding-right: 0;">	
										<!-- Group -->
										<div class="control-group">							
											<label for="txtAbbr"><span >Number</span> <span style="color:red">*</span></label>										
					              			<br>
						              		<input class="k-textbox" 
						              			data-bind="value: obj.number"
								                placeholder="eg. 001" 
								                data-required-msg="required"
								                style="width: 96%;" />
										</div>
										<!-- // Group END -->											
									</div>
								</div>

								<div class="row">
									<div class="span12" style="padding-right: 0;">	
										<!-- Group -->
										<div class="control-group">							
											<label for="txtAbbr"><span >Number Digi</span> <span style="color:red">*</span></label>										
					              			<br>
						              		<input class="k-textbox"					    
						              			data-bind="value: obj.number_digit"
								                placeholder="eg. 1" required data-required-msg="required"
								                style="width: 96%" />
										</div>
										<!-- // Group END -->											
									</div>
								</div>

								<div class="row">
									<div class="span6">	
										<!-- Group -->
										<div class="control-group">								
											<label for="customerStatus"><span data-bind="text: lang.lang.status"></span> <span style="color:red">*</span></label>
								            <select data-role="dropdownlist"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="
							                   	source: selectType,
							                   	value: obj.status"
							                   style="width: 100%;margin-bottom: 15px;" ></select>
										</div>																		
										<!-- // Group END -->
									</div>

									<div class="span6">	
										<!-- Group -->
										<div class="control-group">								
											<label for="registeredDate"><span data-bind="text: lang.lang.register_date"></span> <span style="color:red">*</span></label>
								            <input
							            		data-role="datepicker"			            		
				            					data-bind="value: obj.registered_date" 
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
												<input style="width: 84%;" type="text" class="input-large span12" data-bind="value: obj.latitute, events:{change: loadMap}" placeholder="012345.67897">
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
												<input style="width: 84%;" type="text" class="input-large span12" data-bind="value: obj.longtitute, events:{change: loadMap}" placeholder="012345.67897">
											</div>										
										</div>
										<!-- // Group END -->
									</div>										
								</div>
							</div>
						</div>				
						<!-- // Bottom Part -->
						<div class="row-fluid">								
							<div class="box-generic">
							    <!-- //Tabs Heading -->
							    <div class="tabsbar tabsbar-1">
							        <ul class="row-fluid row-merge">
							        	<li class="span2 glyphicons nameplate_alt active">
							            	<a href="#tab1" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.info"></span></a>
							            </li>						            					            
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->
							    <div class="tab-content">
							    	<!-- //GENERAL INFO -->
							        <div class="tab-pane active" id="tab1">
						            	<table class="table table-borderless table-condensed cart_total">	      		
								            <tr>
								                <td><span>Start Up Number</span></td>
								              	<td>
						            				<input class="k-textbox" data-bind="value: obj.starting_no" 
														placeholder="e.g. 0" style="width: 100%;" />			
								              	</td>							              	
								            	<td><span >Type</span></td>
								              	<td>
								              		<input data-role="dropdownlist"
								              			   data-option-label="(--- Select ---)"             
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.type" style="width: 100%;" />
								              	</td>
								            </tr>
								            <tr>
								            	<td><span >Location</span></td>
								              	<td>
								              		<input data-role="dropdownlist"
								              			   data-option-label="(--- Select ---)"                  
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="source: locationDS, value: obj.location_id" 
										                   style="width: 100%;" />
								              	</td>							            								              	
								            	<td><span >Plan</span></td>
								              	<td>
								              		<input data-role="dropdownlist"
								              			   data-option-label="(--- Select ---)"		                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="source: planDS, value: obj.plan_id"
										                   style="width: 100%;" />
								              	</td>							            	
								            </tr>
								            						            							            							            								            								            			            
								        </table>
						        	</div>
							        <!-- //GENERAL INFO END -->
							    </div>
							</div>
						</div>
			       	</div>
				    <br>
				    <!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>
						<div class="row">
							<div class="span3">
							</div>
							<div class="span9" align="right">
								<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit, click: save" style="width: 80px;margin:0;"><i></i> <span>Save</span></span>
								<span id="saveClose" data-bind="click: cancel" class="btn btn-icon btn-success glyphicons power" style="width: 80px;"><i></i> <span>Cancel</span></span>		
							</div>
						</div>
					</div>
					<!-- // Form actions END -->		
				</div>						
			</div>
		</div>
	</div>
</script>
<script id="ActivateMeter" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden;">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>						
					</div>
			        <h2>Activate Meter</h2><br>
			       
				    <br>
				    <div class="span12 row">			       		
			       		<!-- Top Part -->
				    	<div class="row-fluid">
				    		<div class="span5 well" style="padding-left: 20px;">									
								<div class="row">
									<div class="span12" style="padding-right: 0;">	
										<!-- Group -->
										<div class="control-group">							
											<label for="txtAbbr"><span >Meter Number</span> <span style="color:red">*</span></label>										
					              			<br>
						              		<p tyle="width: 96%;" data-bind="text: meterObj.number"></p>
										</div>
										<!-- // Group END -->											
									</div>
								</div>
							</div>
							<div class="span7">
								<table class="table">
									<thead>
										<tr>
											<th>Type</th><th>Name</th><th>Amount</th>
										</tr>
									</thead>
									<tbody data-role="listview" data-bind="source: items" data-template="meter-plan-item-list">
									</tbody>
								</table>
								<div class="row">
									<div class="span12" style="padding-right: 0;">	
										<!-- Group -->
										<div class="control-group">							
											<label for="txtAbbr"><span>Payment Amount:</span></label>										
					              			<br>
						              		<input type="text" 
						              			class="k-textbox k-invalid" 
						              			placeholder="Amount Reciept ..." 
						              			style="width: 100%;margin-bottom: 20px;" 
						              			data-bind="value: amountToBeRecieved" />
										</div>
										<!-- // Group END -->											
									</div>
								</div>
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
								<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit, click: save" style="width: 80px;margin:0;"><i></i> <span>Activate</span></span>
								<span id="saveClose" data-bind="click: cancel" class="btn btn-icon btn-success glyphicons power" style="width: 80px;"><i></i> <span>Cancel</span></span>		
							</div>
						</div>
					</div>
					<!-- // Form actions END -->		
				</div>						
			</div>
		</div>
	</div>
</script>
<script id="meter-plan-item-list" type="text/x-kendo-template">
	<tr>
		<td>#=type#</td><td>#=name#</td><td>#=amount#</td>
	</tr>
</script>
<!--  End Meter  -->
<!--  Reading  -->
<script id="Reading" type="text/x-kendo-template">
	<span class="glyphicons no-js remove_2 pull-right" data-bind="click: cancel"><i></i></span>	
	<div  class="row-fluid saleSummaryCustomer" style="padding-top: 30px;">
		
		<!-- Tabs -->
		<div class="relativeWrap" data-toggle="source-code">
			<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
			
				<!-- Tabs Heading -->
				<div class="widget-head">
					<ul style="padding-left: 1px;">
						<li class="active"><a class="glyphicons inbox_in" href="#tabContact" data-toggle="tab"><i></i><span style="line-height: 55px;">Reading</span></a></li>
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
							
							<h4 class="separator bottom" style="margin-top: 10px;">Please upload reading book</h4>
							<a data-bind="click: exportEXCEL">
								<span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 200px!important;position: absolute;top: 85px;right: 10px;">
									<i></i> 
									<span >Download Reading Book</span>
								</span>
							</a>
							<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
							  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onSelected}" id="myFile"  class="margin-none" />
							</div>
							<span class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 160px!important;"><i></i>
							<span data-bind="click: save">Start Reading</span></span>
						</div>
						<!-- // Tab content END -->
					</div>
				</div>
				<div id="ntf1" data-role="notification"></div>
			</div>
		</div>
		<!-- // Tabs END -->
	</div>
</script>
<script id="EditReading" type="text/x-kendo-template">
	<div  class="row-fluid saleSummaryCustomer">
		<span class="glyphicons no-js remove_2 pull-right" data-bind="click: cancel"><i></i></span>	
		<!-- Tabs -->
		<div class="relativeWrap" data-toggle="source-code">
			<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
				<!-- // Tabs Heading END -->
				
				<div class="widget-body">
					<div class="tab-content">
						<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 70%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
							<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
						</div>
						<!-- Tab content -->
						<div id="tabContact" style="border: 1px solid #ccc" class="tab-pane active widget-body-regular">
							
							<h4 class="separator bottom" style="margin-top: 10px;">Edit Reading</h4>
							<a data-bind="click: exportEXCEL" style="position: absolute;top: 13px;right:10px;">
								<span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 200px!important;">
									<i></i> 
									<span >Download Reading file</span>
								</span>
							</a>
							<div class="fileupload fileupload-new margin-none" >
							  	<table class="table table-borderless table-condensed cart_total">
							  		<thead>
				                		<tr>
				                			<th>Meter Number</th>
				                			<th style="text-align: center">Date</th>
				                			<th>Previous</th>
				                			<th>Current</th>
				                			<th>Usage</th>
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
						<!-- // Tab content END -->
					</div>
				</div>
				<div id="ntf1" data-role="notification"></div>
			</div>
		</div>
		<!-- // Tabs END -->
	</div>
</script>
<script id="reading-list-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		#= number#
   		</td>
   		<td align="center">
    		#= date#
   		</td>
   		<td align="center">
    		#= previous#
   		</td>
   		<td align="center">
    		#= current#
   		</td>
   		<td align="center">
    		#= current - previous#
   		</td>
   		<td align="center">   			   
		    <a class="btn-action glyphicons pencil btn-success k-edit-button" ><i></i></a>
   		</td>   		
   	</tr>
</script>
<script id="readding-edit-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
            #= number#
        </td>
		<td align="center">
            <input type="text" class="k-textbox" data-bind="value:date" name="ProductName" required="required" validationMessage="required" />
        </td>
		<td align="center">
            <input type="text" class="k-textbox" data-bind="value:previous" name="abbr" required="required" validationMessage="required" />
        </td>
        <td align="center">
            <input type="text" class="k-textbox" data-bind="value:current" name="abbr" required="required" validationMessage="required" />
        </td>
        <td align="center">
            
        </td>
		<td align="center">
	        <div class="edit-buttons">
	            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
	            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
	        </div>
	    </td>
	</tr>
</script>

<script id="waterImport" type="text/x-kendo-template">
	<span class="glyphicons no-js remove_2 pull-right" data-bind="click: cancel"><i></i></span>	
	<div  class="row-fluid saleSummaryCustomer" style="padding-top: 30px;">
		
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
</script>

<script id="runBill" type="text/x-kendo-template">
	<span class="glyphicons no-js remove_2 pull-right" data-bind="click: cancel"><i></i></span>	
	<div  class="row-fluid saleSummaryCustomer" style="padding-top: 30px;">
		
		<!-- Tabs -->
		<div class="relativeWrap" data-toggle="source-code">
			<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
				<!-- // Tabs Heading END -->
				
				<div class="widget-body">
					<div class="tab-content">
						<!-- Tab content -->
						<div id="tabContact" style="border: 1px solid #ccc" class="tab-pane active widget-body-regular">
							
							<h4 class="separator bottom" style="margin-top: 10px;">Run Bill</h4>
							
							<div class="fileupload fileupload-new margin-none" >
							  	<div class="span12">
							  		<input 
							  			data-role="datepicker" 
							  			data-bind="" 
							  			data-start="year" 
							  			data-depth="year" 
							  			data-format="MM-yyyy" 
							  			placeholder="Month Of ..." 
							  			type="text" class="k-input k-valid span3" />
							  	</div>
							</div>
						</div>
						<!-- // Tab content END -->
					</div>
				</div>
				<div id="ntf1" data-role="notification"></div>
			</div>
		</div>
		<!-- // Tabs END -->
	</div>
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

<!-- ***************************
*	End Water Section         *
**************************** -->




<!-- ***************************
*	Invoice Form Section        *
**************************** -->
<script id="invoiceCustom" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>						
					</div>
			        <h2 style="padding:0 15px;"" data-bind="text: lang.lang.custom_forms"></h2>
				    <br>	
				    <div class="row" style="margin-left:0;">			   				
						<div class="span4">	
							<div class="span12" style="margin-bottom: 10px;">
								<input type="text" id="formName" name="Form Name" class="k-textbox" placeholder="Form Name" required validationMessage="" data-bind="value: obj.name" style="width: 100%;" />
							</div>
							<div class="span12">
								<h2 class="btn btn-block btn-primary">Form Style</h2>
								<div class="row formstyle">
									<div id="formStyle"
										 data-role="listview"
										 data-selectable="true"
						                 data-template="invoiceCustom-txn-form-template"
						                 data-bind="source: txnFormDS"
						                 style="overflow: auto">
						            </div>
						        </div>
							</div>
							<div class="span12" style="margin-left:0; margin-top: 10px;">
								<h2 class="btn btn-block btn-primary">Form Color</h2>
								<div class="colorPalatte span12">
									<div class="" style="margin-top: 15px;">
										<div data-selectable="true" data-bind="value: obj.color, events: { change : colorCC }" data-tile-size='{ width: 60, height: 35 }' data-role="colorpalette" data-columns="6" data-palette='[ "#ffffff", "#000000", "#eeece1", "#1f497d", "#4f81bd", "#c0504d", "#9bbb59", "#dbeef3", "#8064a2", "#f79646", "#f2f2f2", "#7f7f7f", "#ddd9c3", "#c6d9f0", "#dbe5f1", "#f2dcdb", "#ebf1dd", "#e5e0ec"]'></div>
                                	</div>
                                </div>
							</div>
							<div class="span12" style="margin-left:0; margin-top: 10px;padding-bottom: 30px;">
								<h2 class="btn btn-block btn-primary">Form Appearance</h2>
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
					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>
						<div class="row">
							<div class="span3">
								
							</div>
							<div class="span9" align="right">
								
								<span id="saveClose" data-bind="click: save" class="btn btn-icon btn-success glyphicons power" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save_close"></span></span>		
							</div>
						</div>
					</div>
					<!-- // Form actions END -->	
				</div>							
			</div>
		</div>
	</div>
</script>
<script id="invoiceForm" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>						
					</div>
			        <h2>PREVIEW FORM</h2>
				    <br>	
				    <div class="row" style="margin-left:0;">	 				
						<div class="span10" id="invFormContent" style="min-height: 300px;border:1px solid #ccc; margin: 0 auto;float:none;padding-bottom:20px;margin-bottom: 30px;">	
							<div id="loading-inv" style="margin-left: -15px;text-align: center;position: absolute;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
								<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
							</div>
						</div>
					</div>
					<!-- Form actions -->
					<div class="box-generic" align="right" style="background-color: #0B0B3B;">
						<span id="notification"></span>

						<span id="savePrint" class="btn btn-icon btn-primary glyphicons print" data-bind="click: printGrid" style="width: 80px;"><i></i>Print / PDF</span>
						<!--span id="savePDF" class="btn btn-icon btn-success glyphicons edit" data-bind="click: savePDF" style="width: 120px;"><i></i> Save PDF</span-->									
					</div>
					<!-- // Form actions END -->
				</div>							
			</div>
		</div>
	</div>
</script>
<script id="invoiceForm1" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company">
            	<h2 ></h2>
                <h3 style="text-align:left;" data-bind="text: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                	<pre>អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></pre>
                    <pre>ទូរស័ព្ទលេខ HP <span data-bind="text: company.phone"></span></pre>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-weight:bold">
                        		<span data-bind="text: obj.contact[0].name"></span><br>
                        		<span data-bind="text: obj.contact[0].address"></span>
                        	</p>
                        </div>
                    </div>
                    <div class="clear">
                    	<!--div class="left">
                    		<p>ទូរស័ព្ទ​លេខ HP:</p>
                        </div-->
                        <div class="left dotted-ruler" style="width: 78%;">
                        	<p style="font-weight:bold" data-bind="text: obj.contact[0].phone"></p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th>ល.រ<br />N<sup>0</sup></th>
                            <th>បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th>បរិមាណ<br />Quantity</th>
                            <th>ថ្លៃឯកតា​<br />Unit Price</th>
                            <th>ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សរុប (បូក​បញ្ចូល​ទាំង​អាករ)​ Total (VAT included)</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td style="text-align: right; padding-right: 5px;" data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6>សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceForm2" type="text/x-kendo-template">
	<div class="inv1">
    	<div class="head">
        	<div class="logo">
            	<img data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
            </div>
            <div class="cover-name-company">
            	<h2 ></h2>
                <h3 style="text-align:left;" data-bind="text: company.name"></h3>
                <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span>
                </div>
                <div class="clear">
                	<pre>អាស័យ​ដ្ឋាន Address: <span data-bind="text: company.address"></span></pre>
                    <pre>ទូរស័ព្ទលេខ HP <span data-bind="text: company.phone"></span></pre>
                </div>
            </div>
        </div>
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រអាករ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-weight:bold">
                        		<span data-bind="text: obj.contact[0].name"></span><br>
                        		<span data-bind="text: obj.contact[0].address"></span>
                        	</p>
                        </div>
                    </div>
                    <div class="clear">
                    	<!--div class="left">
                    		<p>ទូរស័ព្ទ​លេខ HP:</p>
                        </div-->
                        <div class="left dotted-ruler" style="width: 78%;">
                        	<p style="font-weight:bold" data-bind="text: obj.contact[0].phone"></p>
                        </div>
                    </div>
                    <div class="vattin">
                	<p>លេខ​អត្ត​សញ្ញាណ​កម្ម អតប (VATTIN)</p><span id="vat_number" data-bind="text: company.vat_number"></span><p style="font-size:8px;font-weight:normal;margin-left: 8px;">(ប្រសិន​បើ​មាន / If any)</p>
                	</div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
            
        	<div class="clear inv2">
            	<table cellpadding="0" cellspacing="0" border="1" style="width:100%;">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th>ល.រ<br />N<sup>0</sup></th>
                            <th>បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th>បរិមាណ<br />Quantity</th>
                            <th>ថ្លៃឯកតា​<br />Unit Price</th>
                            <th>ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុប​ Sub Total</td>
                            <td data-bind="text: obj.sub_total"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">អាករ​លើ​តម្លៃ​បន្ថែម ១០% VAT (10%)</td>
                            <td data-bind="text: obj.tax"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សរុបរួម​ Grand Total</td>
                            <td data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">ប្រាក់កក់ Deposit</td>
                            <td data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding-right:10px;font-weight:bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6>សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>
<script id="invoiceForm32" type="text/x-kendo-template">
	<div class="inv1">
        <div class="content">
        	<div style="overflow: hidden;padding:10px 0;">
        		<h1>វិក្កយបត្រ</h1>
            	<h2 data-bind="text: obj.title"></h2>
        	</div>
            <div class="clear mid-header" style="padding: 10px;background: #dce6f2;padding-bottom: 10px;">
            	<div class="cover-customer">
                	<h5>ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
                    <div class="clear">
                        <div class="left dotted-ruler" style="width: 62%;">
                        	<p style="font-weight:bold">
                        		<span data-bind="text: obj.contact[0].name"></span><br>
                        		<span data-bind="text: obj.contact[0].address"></span>
                        	</p>
                        </div>
                    </div>
                    <div class="clear">
                    	<!--div class="left">
                    		<p>ទូរស័ព្ទ​លេខ HP:</p>
                        </div-->
                        <div class="left dotted-ruler" style="width: 78%;">
                        	<p style="font-weight:bold" data-bind="text: obj.contact[0].phone"></p>
                        </div>
                    </div>
                </div>
                <div class="cover-inv-number">
                	<div class="clear">
                    	<div class="left">
                    		<p>លេខ No. :</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 42%;">
                        	<p style="font-weight:bold" data-bind="text: obj.number"></p>
                        </div>
                    </div>
                    <div class="clear">
                    	<div class="left">
                    		<p>កាល​បរិច្ឆេទ Date:</p>
                        </div>
                        <div class="left dotted-ruler" style="width: 57%;">
                        	<p style="font-weight:bold" data-bind="text: obj.issued_date"></p>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="clear">
            	<table cellpadding="0" cellspacing="0" border="1" class="span12">
                	<thead>
                        <tr class="main-color" style="height: 45px;" data-bind="style: {backgroundColor: obj.color}">
                            <th>ល.រ<br />N<sup>0</sup></th>
                            <th>បរិយាយ​មុខ​ទំនិញ<br />Description</th>
                            <th>បរិមាណ<br />Quantity</th>
                            <th>ថ្លៃឯកតា​<br />Unit Price</th>
                            <th>ថ្លៃ​ទំនិញ<br />Amount</th>
                        </tr>
                    </thead>
                    <tbody style="margin-top: 2px" id="formListView" data-role="listview"
										 data-auto-bind="false"
						                 data-template="invoiceForm-lineDS-template"
						                 data-bind="source: lineDS">
                    </tbody>
                    <tfoot>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
                            <td data-bind="text: obj.discount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សរុប Total</td>
                            <td data-bind="text: obj.amount"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់កក់ Deposit</td>
                            <td data-bind="text: obj.deposit"></td>
                        </tr>
                        <tr>
                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សាច់ប្រាក់ត្រូវទូទាត់ Amount Due</td>
                            <td data-bind="text: obj.amount_due"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="foot">
        	<div class="cover-signature">
            	<div class="singature" style="float:left">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នក​ទិញ<br />Customer's Signature & Name</p>
                </div>
                <div class="singature" style="float:right">
                	<p>ហត្ថលេខា និងឈ្មោះ​អ្នកលក់<br />Seller's Signature & Name</p>
                </div>
            </div>
            <h6>សម្គាល់៖ <span>ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
        </div>
    </div>
</script>


<script id="invoiceCustom-txn-form-template" type="text/x-kendo-template">
	<a class="span4 #= type #" data-id="#= id #" data-bind="click: selectedForm" style="padding-right: 0; width: 32%;">
    	<img src="<?php echo base_url(); ?>assets/invoice/img/#= image_url #.jpg" alt="#: name # image" />
    </a>
</script>
<script id="invoiceForm-lineDS-template" type="text/x-kendo-template">
	<tr>
		<td><i>#:banhji.invoiceForm.lineDS.indexOf(data)+1#</i>&nbsp;</td>
		<td class="lside">#= description#</td>
		<td>#= quantity#</td>
		<td class="rside" width="70">#= kendo.toString(price, "c", locale) #</td>
		<td class="rside">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template3" type="text/x-kendo-template">
	<tr>
		<td><i>#:banhji.invoiceForm.lineDS.indexOf(data)+1#</i></td>
		<td style="text-align: left; padding-left: 5px;">#= description#</td>
		<td style="text-align: left; padding-left: 5px;"></td>
		<td>#= item_prices.length>0 ? item_prices[0].measurement : "" #</td>
		<td>#= quantity#</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(price, "c", locale) #</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template4" type="text/x-kendo-template">
	<tr>
		<td><i>#:banhji.invoiceForm.lineDS.indexOf(data)+1#</i></td>
		<td style="text-align: left; padding-left: 5px;"></td>
		<td style="text-align: left; padding-left: 5px;">#= description#</td>
		<td></td>
		<td></td>
		<td>#= quantity#</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(price, "c", locale) #</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template5" type="text/x-kendo-template">
	<tr>
		<td style="text-align: left; padding-left: 5px;">&nbsp;</td>
		<td style="text-align: left; padding-left: 5px;">#= description#</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td style="text-align: right; padding-right: 5px;"></td>
		<td style="text-align: right; padding-right: 5px;"></td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template6" type="text/x-kendo-template">
	<tr>
		<td class="lside">&nbsp;#= item_id #</td>
		<td class="lside">#= description#</td>
		<td>#= item_prices.length>0 ? item_prices[0].measurement : "" #</td>
		<td>#= quantity#</td>
		<td class="rside" width="70">#= kendo.toString(price, "c", locale) #</td>
		<td class="rside" style="background-color: \\#eee">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template8" type="text/x-kendo-template">
	<tr>
		<td style="text-align: left; padding-left: 5px;">&nbsp;#= description#</td>
		<td>#= item_prices.length>0 ? item_prices[0].measurement : "" #</td>
		<td>#= quantity#</td>
		<td class="rside">#= kendo.toString(price, "c", locale) #</td>
		<td class="rside" style="background-color: \\#eee">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template10" type="text/x-kendo-template">
	<tr>
		<td class="lside">&nbsp;#= item_id #</td>
		<td class="lside">#= description#</td>
		<td>#= item_prices.length>0 ? item_prices[0].measurement : "" #</td>
		<td>#= quantity#</td>
		<td class="rside" width="70">#= kendo.toString(price, "c", locale) #</td>
		<td class="rside" style="background-color: \\#eee">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template12" type="text/x-kendo-template">
	<tr>
		<td class="lside">#= description.length>0 ? description: "&nbsp;"#</td>
		<td >#= item_prices.length>0 ? item_prices[0].measurement : "" #</td>
		<td>#= quantity#</td>
		<td class="rside" width="70">#= kendo.toString(price, "c", locale) #</td>
		<td class="rside" style="background-color: \\#eee;">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template14" type="text/x-kendo-template">
	<tr>
		<td>#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
		<td style="text-align: left; padding-left: 5px;"></td>
		<td style="text-align: left; padding-left: 5px;">#= description#</td>
		<td>#= item_prices.length>0 ? item_prices[0].measurement : "" #</td>
		<td>#= quantity#</td>
		<td style="text-align: right; padding-right: 5px;"></td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template19" type="text/x-kendo-template">
	<tr>
		<td>#:banhji.invoiceForm.lineDS.indexOf(data)+1#</td>
		<td style="text-align: left; padding-left: 5px;"></td>
		<td style="text-align: left; padding-left: 5px;"></td>
		<td></td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template31" type="text/x-kendo-template">
	<tr>
		<td style="text-align: left; padding-left: 5px;">&nbsp;</td>
		<td style="text-align: left; padding-left: 5px;">#= description#</td>
		<td>#= item_prices.length>0 ? item_prices[0].measurement : "" #</td>
		<td>#= quantity#</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(price, "c", locale) #</td>
	</tr>
</script>
<script id="invoiceForm-lineDS-template33" type="text/x-kendo-template">
	<tr>
		<td style="text-align: left; padding-left: 5px;">&nbsp;#= description#</td>
		<td>#= item_prices.length>0 ? item_prices[0].measurement : "" #</td>
		<td>#= quantity#</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(price, "c", locale) #</td>
		<td style="text-align: right; padding-right: 5px;">#= kendo.toString(amount, "c", locale) #</td>
	</tr>
</script>





<!-- ***************************
*	Template Blog         	  *
**************************** -->
<script id="meter-list-tmpl" type="text/x-kendo-tmpl">
	<tr>
		<td>#= number#</td>
		<td style="text-align:center;">
			# if(status == 1){#
				<span class="btn-action glyphicons ok_2 btn-success"><i></i></span>
			# }else if(status == 0){#
				<span class="btn-action glyphicons remove_2 btn-danger"><i></i></span>
			# }else{ #
				<span class="btn-action glyphicons remove_2 btn-danger widget-stats widget-stats-info "><i></i></span>
			# } #
		</td>
		<td style="text-align: center;">
			<a style="background: \#1f4774;padding:4px;margin-right: 3px;vertical-align: middle;" 
				href="\#/activate_meter/#= id#" 
				class="btn-action btn-success">Activate
			</a>
			<a style="border:none;" href="\#/meter/#= id #" class="btn-action glyphicons pencil btn-danger widget-stats widget-stats-info"><i></i></span>
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
<!-- ***************************
*	Menu Section         	  *
**************************** -->

<!-- ***************************
*	Menu Section         	  *
**************************** -->

<script id="waterMenu" type="text/x-kendo-template">
	<ul class="topnav pull-left">
	  	<li><a href='#/' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/center'><span data-bind="text: lang.lang.center"></span></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/customer'><span >New Customer</span></a></li> 
  				<li ><a href='#/reorder'><span >Reorder Customer Number</span></a></li>  				
  				<li><span class="li-line"></span></li>
  				<li><a href='#/reading'><span >Meter Reading</span></a></li> 
  				<li><a href='#/edit_reading'><span >Edit Reading</span></a></li>
  				<li><span class="li-line"></span></li>
  				<li><a href='#/run_bill'><span >Run Bill</span></a></li> 
  				<li><a href='#/print_invoice'><span >Print Bill</span></a></li>
  				<li><span class="li-line"></span></li>
  				<li><a href='#/import'><span >Import</span></a></li>
  			</ul>
	  	</li>	  	  	
	  	<li><a href="#/reports">Reports</a></li>	  	
	  	<li><a href='#/setting' class='glyphicons settings'><i></i></a></li>
	</ul>
</script>
<script id="inventoryMenu" type="text/x-kendo-template">
	<ul class="topnav">
		<li><a href='#/inventories' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/item_center'>CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>
  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
  				<li ><a href="#/txn_item"><span data-bind="text: lang.lang.add_transaction_item"></span></a></li>
  				<li><a href='#/item_assembly'><span data-bind="text: lang.lang.build_assembly"></span></a></li>  
  				<li><a href='#/item_catalog'><span data-bind="text: lang.lang.add_new_catalog"></span></a></li>
  				<li><a href='#/fixed_assets'><span data-bind="text: lang.lang.add_fixed_assets"></span></a></li>  		
  				<li> <span class="li-line"></span></li> 
  				<li><a href='#/grn'><span data-bind="text: lang.lang.add_received_note"></span></a></li>
  				<li><a href='#/gdn'><span data-bind="text: lang.lang.add_delivery_note"></span></a></li>
  				<li><a href='#/item_adjustment'><span data-bind="text: lang.lang.create_item_adjustment"></span></a></li>  				
  				<li><a href='#/internal_usage'><span data-bind="text: lang.lang.create_internal_usage"></span></a></li>	
  				<!-- <li> <span class="li-line"></span></li>  -->	
  				<!-- <li><a href='#/item_recurring'>Inventory Recurring List</a></li>-->
  			</ul>
	  	</li>	  	  	
	  	<li><a href='#/item_report_center'>REPORTS</a></li>	  	
	  	<li><a href='#/item_setting' class='glyphicons settings'><i></i></a></li>	  	
	</ul>	
</script>
<script id="saleTaxMenu" type="text/x-kendo-template">
	<ul class="topnav">
		<li><a href='#/sale_tax' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>				 				  				
  				<li><a href='#/journal'>Journal</a></li>  				
  				<li><a href='#/sale_tax'>Tax</a></li>  				  				 				  				 				
  			</ul>
	  	</li>	  	  	
	  	<li><a href='#/sale_tax_report_center'>REPORTS</a></li>	  	
	  	<li><a href='#/' class='glyphicons settings'><i></i></a></li>	  				
	</ul>
</script>
<script id="saleMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<li><a href='#/sales' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/sale_center'><span data-bind="text: lang.lang.center"></span></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li ><a href='#/sale'>Make Sale</a></li> 				
  				<li> <span class="li-line"></span></li>
  				<li style="padding-top: 10px;"><a href='#/quote'><span data-bind="text: lang.lang.create_quotation"></span></a></li>  				
  				<li><a href='#/sale_order'><span data-bind="text: lang.lang.create_sale_order"></span></a></li>
  				<li> <span class="li-line"></span></li> 				
  				<li><a href='#/sale_recurring'>Sale Recurring</a></li>  				 				  				 				
  			</ul>
	  	</li>	  	  	
	  	<li><a href="#/sale_report_center">Reports</a></li>
	</ul>
</script>




<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/water/water.css" />
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
	banhji.index = kendo.observable({
		lang 				: langVM,
		dataSource			: dataStore(apiUrl+"dashboards/home"),
		summaryDS			: dataStore(apiUrl+"accounting_reports/financial_snapshot"),
		graphDS  			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "dashboards/home_graph",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			sort: {
                field: "month",
                dir: "asc"
            },								
			batch: true,			
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			pageSize: 100
		}),		
		companyLogo 		: '',
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
		companyName 		: null,
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
		today 				: new Date(),		
		ar 					: 0,
		ar_open 			: 0,
		ar_customer 		: 0,
		ar_overdue 			: 0,
		ap 					: 0,
		ap_open 			: 0,
		ap_vendor 			: 0,
		ap_overdue 			: 0,
		income 				: 0,
		expense 			: 0,
		net_income 			: 0,
		asset 				: 0,
		liability 	 		: 0,
		equity 	 			: 0,		
		pageLoad 			: function(){
			var self = this;

			this.graphDS.fetch();

			this.dataSource.query({
				filter: [],								
				page: 1,
				pageSize: 5
			}).then(function(){
				var view = self.dataSource.view();				
				
				self.set("ar", kendo.toString(view[0].ar, banhji.locale=="km-KH"?"c0":"c", banhji.locale));
				self.set("ar_open", kendo.toString(view[0].ar_open, "n0"));
				self.set("ar_customer", kendo.toString(view[0].ar_customer, "n0"));
				self.set("ar_overdue", kendo.toString(view[0].ar_overdue, "n0"));

				self.set("ap", kendo.toString(view[0].ap, banhji.locale=="km-KH"?"c0":"c", banhji.locale));
				self.set("ap_open", kendo.toString(view[0].ap_open, "n0"));
				self.set("ap_vendor", kendo.toString(view[0].ap_vendor, "n0"));
				self.set("ap_overdue", kendo.toString(view[0].ap_overdue, "n0"));
			});

			this.summaryDS.query({
				filter: [],								
				page: 1,
				pageSize: 5
			}).then(function(){
				var view = self.summaryDS.view();				
				
				self.set("income", kendo.toString(view[0].income, banhji.locale=="km-KH"?"c0":"c", banhji.locale));
				self.set("expense", kendo.toString(view[0].expense, banhji.locale=="km-KH"?"c0":"c", banhji.locale));
				self.set("net_income", kendo.toString(view[0].net_income, banhji.locale=="km-KH"?"c0":"c", banhji.locale));
				
				self.set("asset", kendo.toString(view[0].asset, banhji.locale=="km-KH"?"c0":"c", banhji.locale));
				self.set("liability", kendo.toString(view[0].liability, banhji.locale=="km-KH"?"c0":"c", banhji.locale));
				self.set("equity", kendo.toString(view[0].equity, banhji.locale=="km-KH"?"c0":"c", banhji.locale));
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


	//DAWINE -----------------------------------------------------------------------------------------
	
	banhji.source =  kendo.observable({
		lang 						: langVM,
		countryDS					: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "countries",
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
			page:1,
			pageSize: 100
		}),
		//Contact
		contactDS					: new kendo.data.DataSource({
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
			// group: { field: "contact_type" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		customerDS					: new kendo.data.DataSource({
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
			filter: { field:"parent_id", operator:"where_related", model:"contact_type", value:1 },
			// group: { field: "contact_type" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		supplierDS					: new kendo.data.DataSource({
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
			filter: { field:"parent_id", operator:"where_related", model:"contact_type", value:2 },
			// group: { field: "contact_type" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		supplierListDS				: new kendo.data.DataSource({
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
			filter: { field:"parent_id", operator:"where_related", model:"contact_type", value:2 },
			// group: { field: "contact_type" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		employeeDS					: new kendo.data.DataSource({
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
			filter: { field:"parent_id", operator:"where_related", model:"contact_type", value:3 },
			// group: { field: "contact_type" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		saleRepDS					: new kendo.data.DataSource({
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
			filter: { field:"contact_type_id", value:10 },
			// group: { field: "contact_type" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Contact Type
		contactTypeDS				: dataStore(apiUrl + "contacts/type"),
		customerTypeDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "contacts/type",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + "contacts/type",
					type: "POST",
					headers: banhji.header,
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + "contacts/type",
					type: "PUT",
					headers: banhji.header,
					dataType: 'json'
				},
				destroy 	: {
					url: apiUrl + "contacts/type",
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
			filter: { field:"parent_id", value: 1 },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		supplierTypeDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "contacts/type",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + "contacts/type",
					type: "POST",
					headers: banhji.header,
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + "contacts/type",
					type: "PUT",
					headers: banhji.header,
					dataType: 'json'
				},
				destroy 	: {
					url: apiUrl + "contacts/type",
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
			filter: { field:"parent_id", value: 2 },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Job
		jobDS						: dataStore(apiUrl + "jobs"),
		//Currency
		currencyAllDS				: dataStore(apiUrl + "currencies"),
		currencyDS					: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "currencies",
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
			filter: { field:"status", value: 1 },
			// group: { field: "group"},
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		currencyRateDS				: dataStore(apiUrl + "currencies/rate"),
		//Item
		itemDS						: dataStore(apiUrl + "items"),
		itemTypeDS					: dataStore(apiUrl + "item_types"),
		itemGroupDS					: dataStore(apiUrl + "items/group"),
		brandDS						: dataStore(apiUrl + "brands"),
		categoryDS					: dataStore(apiUrl + "categories"),
		itemInventoryDS				: new kendo.data.DataSource({
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
			filter:{ field:"item_type_id", value:1 },
			sort:[
				{ field:"item_type_id", dir:"asc" },
				{ field:"number", dir:"asc" },
			],
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		itemNonAssemblyDS			: new kendo.data.DataSource({
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
			filter:[
				{ field:"is_catalog", value: 0 },
				{ field:"is_assembly", value: 0 }
			],
			sort:[
				{ field:"item_type_id", dir:"asc" },
				{ field:"number", dir:"asc" },
			],
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		itemNonCatalogDS			: new kendo.data.DataSource({
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
			filter:[
				{ field:"is_catalog", value: 0 },
				{ field:"is_assembly", value: 0 }
			],
			sort:[
				{ field:"item_type_id", dir:"asc" },
				{ field:"number", dir:"asc" },
			],
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		inventoryCategoryDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "categories",
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
			filter: { field: "item_type_id", value: 1 },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		nonInventoryPartCategoryDS	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "categories",
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
			filter: { field: "item_type_id", value: 2 },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		fixedAssetCategoryDS		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "categories",
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
			filter: { field: "item_type_id", value: 3 },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		serviceCategoryDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "categories",
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
			filter: { field: "item_type_id", value: 4 },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Measurement
		measurementDS				: dataStore(apiUrl + "measurements"),		
		//Tax Item
		taxItemDS					: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "tax_items",
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
			page:1,
			pageSize: 100
		}),
		customerTaxDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "tax_items",
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
			filter: { field: "tax_type_id", operator:"where_in", value:[3,9] },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		supplierTaxDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "tax_items",
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
			filter: { field: "tax_type_id", operator:"where_in", value:[1,2,3,9] },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Accounting
		accountDS					: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + "accounts",
					type: "POST",
					headers: banhji.header,
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + "accounts",
					type: "PUT",
					headers: banhji.header,
					dataType: 'json'
				},
				destroy 	: {
					url: apiUrl + "accounts",
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
			filter:{ field:"status", value:1 },
			//group:{ field: "account_type_name" },
			sort:{ field:"number", dir:"asc" },
			batch: true,			
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 1000
		}),
		subAccountDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter:{ field: "sub_of_id", value:0 },
			sort:{ field:"number", dir:"asc" },
			batch: true,			
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 1000
		}),
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
			filter:{ field:"number <>", value:"" },			
			batch: true,			
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 1000
		}),
		cashAccountDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
				{ field:"account_type_id", value: 10 },
				{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		advAccountDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
				{ field:"account_type_id", value: 11 },
				{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Item Income / Item Revenue / Customer Revenue / Service Revenue Account
		incomeAccountDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
					{ field:"account_type_id", operator:"where_in", value: [35,39] },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		adjustmentAccountDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
				{ field:"id", value: 75 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Expense
		expenseAccountDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
					{ field:"account_type_id", operator:"where_in", value: [36,37,38,40,41,42,43] },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		ARAccountDS					: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
					{ field:"account_type_id", value: 12 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		APAccountDS					: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
					{ field:"account_type_id", operator:"where_in", value: [23,24] },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),		
		tradeDiscountDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
					{ field:"id", value: 72 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		settlementDiscountDS		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
					{ field:"id", value:99 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		supplierTradeDiscountDS		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
					{ field:"account_type_id", value: 36 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		supplierSettlementDiscountDS: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
					{ field:"id", value:109 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		prepaidAccountDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
					{ field:"account_type_id", operator:"where_in", value: [14,21] },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		depositAccountDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
					{ field:"account_type_id", operator:"where_in", value: [25,30] },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),		
		cogsAccountDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
					{ field:"account_type_id", value: 36 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		inventoryAccountDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
					{ field:"account_type_id", value: 13 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		fixedAssetAccountDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
					{ field:"account_type_id", value: 16 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		accumulatedAccountDS		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
					{ field:"account_type_id", value: 18 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		deposalAccountDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
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
			filter: [
					{ field:"account_type_id", value: 38 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
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
		segmentItemDS				: dataStore(apiUrl + "segments/item"),
		//Recurring
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
			{ id: "Witdraw", name: "Witdraw" },
			{ id: "Cash_Advance", name: "Advance" },
			{ id: "Cash_Payment", name: "Payment" },
			{ id: "Reimbursement", name: "Reimbursement" },
			{ id: "Journal", name: "Journal" }
	    ],
		genderList					: ["M", "F"],
		typeList 					: ['Invoice','eInvoice','wInvoice','Cash_Sale','Receipt_Allocation','Sale_Order','Quote','GDN','Sale_Return','Purchase_Order','GRN','Cash_Purchase','Credit_Purchase','Purchase_Return','Payment_Allocation','Deposit','eDeposit','wDeposit','Customer_Deposit','Vendor_Deposit','Witdraw','Transfer','Journal','Adjustment','Cash_Advance','Reimbursement','Direct_Expense','Advance_Settlement','Additional_Cost','Cash_Payment','Cash_Receipt','Credit_Note','Debit_Note','Offset_Bill','Offset_Invoice','Cash_Transfer','Internal_Usage'],
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
		duplicateNumber 			: "Duplicate Number!",
		loadData 					: function(){
			this.loadRate();
			this.itemTypeDS.read();
			this.measurementDS.query({
				filter:[],
				page:1,
				pageSize:1000
			});
			this.accountDS.read();
		},
		getFiscalDate 				: function(){
			var today = new Date(),	
			fDate = new Date(today.getFullYear() +"-"+ banhji.institute.fiscal_date);

			if(today < fDate){
				fDate.setFullYear(today.getFullYear()-1);				
			}		

			return fDate;
		},
		//Rate
		loadRate 					: function(){
			this.currencyRateDS.query({
				filter:[],
				sort:{ field:"date", dir:"desc"},
				page:1,
				pageSize:1000
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
		}
	});
	/*************************
	*	Water Section   	* 
	**************************/
	
	//Setting
	banhji.plan = kendo.observable({
		dataSource 	: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "plans",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + "plans",
					type: "POST",
					headers: banhji.header,
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + "plans",
					type: "PUT",
					headers: banhji.header,
					dataType: 'json'
				},
				destroy 	: {
					url: apiUrl + "plans",
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
		}),
		itemDS 		: dataStore(apiUrl + "plans/items"),
		itemSelect 	: 0,
		current 	: null,
		list 		: [],
		pageLoad    : function(id){
			if(id){
				this.loadObj(id);
			}else{
				this.addNew();
				this.itemDS.read();
				this.addItem();
			}
		},
		loadObj 	: function(id){
			var self = this;	
			this.dataSource.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.dataSource.view();
				self.setCurrent(view[0]);
			});
		},
		onChange 	: function(e) {
			var data = e.data,
			selected = e.sender.selectedIndex - 1,
			dataitemDs = this.itemDS.at(selected);
			data.set("type", dataitemDs.type);
			data.set("name", dataitemDs.name);
			data.set("amount", dataitemDs.amount);
		}, 
		setCurrent 	: function(current) {
			this.set('current', current);
		},
		addNew 	  	: function() {
			this.dataSource.add({
				name 		: null,
				code 	 	: null,
				items 		: []
			});
			this.setCurrent(this.dataSource.at(this.dataSource.data().length -1));
		},
		remove 		: function(e) {
			this.dataSource.remove(e.data);
		},
		addItem 	: function() {
			this.get("current").items.push({item: "", type: "", name: "", amount: 0});
		},
		removeItem 	: function(e) {
			this.items.remove(e);
		},
		goSetting 	: function(e){
			var data = $(e.currentTarget).data("go");
			console.log(data);
			banhji.setting.set("tabGo", data);
			banhji.router.navigate('/setting');
		},
		save 		: function() {
			var dfd = $.Deferred(), self = this;
			banhji.plan.dataSource.sync();
			banhji.plan.dataSource.bind('requestEnd', function(e){
				if(e.type != 'read') {
					if(e.response.results) {
						dfd.resolve(e.response.results);
					}
					self.cancel();
				}
			});
			banhji.plan.dataSource.bind('error', function(e){
				dfd.reject(e.status);
			});
			return dfd.promise();
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();		
			window.history.back();
		}
	});
	banhji.addLicense = kendo.observable({
		dataSource 	: dataStore(apiUrl + "branches"),
		provinceDS 	: dataStore(apiUrl + "provinces"),
		districtDS 	: dataStore(apiUrl + "districts"),
		toDay 		: new Date(),
		obj 		: null,
		provinceSelect : [],
		isEdit      : false,
		selectType 	: [{id: "1", name: "Active"},{id: "0", name: "Inactive"},{id: "2", name: "Void"}],
		selectCurrency : [{id: "3", name: "KHR"},{id: "1", name: "USD"},{id: "10", name: "THB"},{id: "11", name: "VND"}],
		pageLoad    : function(id){
			if(id){
				this.loadObj(id);
			}else{
				this.addNew();
			}
			//Province
			var self = this;
			this.provinceDS.read()
			.then(function(e){
				var Lenght = self.provinceDS.data().length;
				var view = self.provinceDS.view();
				for(var i = 0; i < self.provinceDS.data().length; i++){
					self.provinceSelect.push({'id' : view[i].id,'name' : view[i].name_local});
				}
			});
		},
		provinceChange : function(pro){
			console.log(this.obj.province);
			this.districtDS.filter({field: "province_id", value: this.obj.province});
		},
		loadObj 	: function(id){
			var self = this;	
			this.dataSource.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.dataSource.view();
				self.set("obj", view[0]);
			});	

		},
		addNew 	  	: function() {
			this.set("obj", null);		
			this.set("isEdit", false);		
			this.dataSource.insert(0,{	
				number 			: null,
				name 			: null,
				abbr 			: null,
				representative  : null,
				currency 		: 3,
				status 			: 1,
				expire_date 	: null,
				max_customer 	: null,
				description 	: null,
				address   		: null,
				province 		: null,
				district 		: null,
				email 			: null,
				mobile 			: null,
				telephone 		: null,
				term_of_condition : null
			});
			var obj = this.dataSource.at(0);
			this.set("obj", obj);	
		},
		save 		: function() {
			var self = this;
			if(this.dataSource.data().length > 0) {
				this.dataSource.sync();
				this.dataSource.bind("requestEnd", function(e){
					if(e.type != 'read') {
						if(e.response){				
				    		$("#ntf1").data("kendoNotification").success("Successfully!");
				    		//self.dataSource.addNew();
							banhji.router.navigate("/setting");
							banhji.setting.licenseDS.fetch();
						}
					}				    					  				
			    });
			    this.dataSource.bind("error", function(e){		    		    	
					$("#ntf1").data("kendoNotification").error("Error!"); 			
			    });
			}
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();	
			this.dataSource.data([]);
			window.history.back();
		}
	});
	//End Setting
	banhji.setting = kendo.observable({
		lang 				: langVM,
		contactTypeName 	: "",
		contactTypeAbbr 	: "",
        contactTypeCompany 	: 0,
        blockCompanyId  	: 0,
        tabGo 				: 0,
        blocDS 				: dataStore(apiUrl + "locations"),
        planItemDS			: dataStore(apiUrl + "plans/items"),
        tariffItemDS		: dataStore(apiUrl + "plans/tariff"),
        txnTemplateDS		: dataStore(apiUrl + "transaction_templates"),
        objBloc 			: null,
        licenseDS 			: dataStore(apiUrl + "branches"),
        branchDS 			: dataStore(apiUrl + "branches"),
        planDS 				: dataStore(apiUrl + "plans"),
		contactTypeDS 		: banhji.source.customerTypeDS,
		typeUnit 			: [{id:"m3", name: "m3"},{id:"money", name: "Money"},{ id:"%", name: "%"}],
		typeFlat 			: [{id:"0", name: "Not Flat"},{id:"1", name: "Flat"}],
		tariffItemFlat 		: 0,
		tariffSelect 		: false,
		tariffNameShow 		: null,
		planSelect 			: false,
		windowTariffItemVisible : false,
		prefixDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "prefixes",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + "prefixes",
					type: "POST",
					headers: banhji.header,
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + "prefixes",
					type: "PUT",
					headers: banhji.header,
					dataType: 'json'
				},
				destroy 	: {
					url: apiUrl + "prefixes",
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
			filter: { field:"type", operator:"where", value:"Water_Invoice" },			
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		onLicenseChange 	: function(e) {
			var index = e.sender.selectedIndex;
			var block = this.licenseDS.at(index - 1);
			this.set('blockCompanyId',{id:block.id, name:block.name});
			console.log(index);
		},
		addContactType 		: function(){
        	var name = this.get("contactTypeName");
        	if(name!==""){
	        	this.contactTypeDS.add({
	        		parent_id 	: 1,
	        		name 		: name,
	        		abbr 		: this.get("contactTypeAbbr"),
	        		description : "",
	        		is_company 	: this.get("contactTypeCompany"),
	        		is_system 	: 0
	        	});
	        	this.contactTypeDS.sync();
	        	this.set("contactTypeName", "");
	        	this.set("contactTypeAbbr", "");
	        	this.set("contactTypeCompany", 0);
        	}
        },
        addBloc 			: function(){

        	var branch = this.get("blockCompanyId");
        	console.log(branch);
        	if(branch!= ""){
	        	this.blocDS.add({
	        		branch 		: {id : branch.id, name: branch.name},
	        		name 		: this.get("blocName"),
	        		abbr 		: this.get("blocAbbr")
	        	});

	        	this.blocDS.sync();
	        	this.set("blocName", "");
	        	this.set("blocAbbr", "");
	        	this.set("blockCompanyId", 0);
        	}
        },
        goExemption    		: function(){
        	this.planItemDS.data([]);
        	this.planItemDS.filter({field: "type", value: "exemption"});
        },
        addEx 				: function(){
        	this.planItemDS.add({
        		name 		: this.get("exName"),
        		type     	: "exemption",
        		is_flat 	: false,
        		usage 		: 0,
        		unit 		: this.get("exUnit"),
        		amount 		: this.get("exPrice")
        	});
        	this.planItemDS.sync();
        	this.set("exName", "");
        	this.set("exPrice", "");
        	this.set("exUnit", "");
        },
        goTariff    		: function(){
        	this.set("tariffSelect", false)
        	this.planItemDS.data([]);
        	this.tariffItemDS.data([]);
        	this.planItemDS.filter({field: "type", value: "tariff"});
        },
        showTariffItem 		: function(e){
        	var data = e.data;
        	this.set("windowTariffItemVisible", true);
        	this.setCurrent(e.data);
        },
        setCurrent 			: function(current) {
        	this.set('current', current);
        },
        saveTariffItem 		: function(e){
        	var data = e.data.id, self = this;
        	this.tariffItemDS.data([]);
        	this.tariffItemDS.add({
        		name 		: this.get("tariffItemName"),
        		type     	: "tariff",
        		tariff_id	: this.get('current').id,
        		is_flat   	: this.get("tariffItemFlat"),
        		unit 		: null,
        		usage 		: this.get("tariffItemUsage"),
        		amount 		: this.get("tariffItemAmount"),
        	});
        	this.tariffItemDS.sync();
        	this.tariffItemDS.bind("requestEnd", function(e){
        		if(e.type != 'read') {
	        		if(e.response) {
	        			self.set("tariffItemName", "");
			        	self.set("tariffItemFlat", 0);
			        	self.set("tariffItemUsage", "");
			        	self.set("tariffItemAmount", "");
			        	self.set("windowTariffItemVisible", false);
			        	self.closeTariffWindowItem();
			        	// console.log(e);
			        	self.tariffItemDS.filter({field: "tariff_id", value: self.get('current').id});
			        	//self.set("tariffNameShow", e.data.name);
	        		}
	        	}
        	});
        	this.tariffItemDS.bind("error", function(e){
        		console.log("error");
        	});
        },
        addTariff 		: function(e){
        	var self = this;
        	this.planItemDS.add({
        		name 		: this.get("tariffName"),
        		type     	: "tariff",
        		is_flat   	: 0,
        		tariff_id 	: 0,
        		unit 		: 0,
        		usage 		: 0,
        		amount 		: 0
        	});
        	this.planItemDS.sync();
        	this.planItemDS.bind("requestEnd", function(e){
        		console.log(e);
        		if(e.response) {
        			console.log("e");
        			self.set("tariffName", "");
        		}
        	});
        	this.planItemDS.bind("error", function(e){
        		console.log("error");
        	});
        },
        closeTariffWindowItem 	: function(){
        	this.set("windowTariffItemVisible", false);
        },
        viewTariffItem 		: function(e){
        	var data = e.data.id;
        	this.set("tariffNameShow", e.data.name);
        	this.set("tariffSelect", true);
        	this.tariffItemDS.data([]);
        	this.tariffItemDS.filter({field: "tariff_id", value: data});
        },
        goDeposit    		: function(){
        	this.planItemDS.data([]);
        	this.planItemDS.filter({field: "type", value: "deposit"});
        },
        addDeposit			: function(){
        	this.planItemDS.add({
        		name 		: this.get("depositName"),
        		type     	: "deposit",
        		is_flat   	: false,
        		unit 		: null,
        		usage 		: 0,
        		amount 		: this.get("depositPrice")
        	});
        	this.planItemDS.sync();
        	this.set("depositName", "");
        	this.set("depositPrice", "");
        },
        goService    		: function(){
        	this.planItemDS.data([]);
        	this.planItemDS.filter({field: "type", value: "service"});
        },
        addService			: function(){
        	this.planItemDS.add({
        		name 		: this.get("serviceName"),
        		type     	: "service",
        		is_flat   	: false,
        		unit 		: null,
        		usage 		: 0,
        		amount 		: this.get("servicePrice")
        	});
        	this.planItemDS.sync();
        	this.set("serviceName", "");
        	this.set("servicePrice", "");
        },
        goMaintenance    		: function(){
        	this.planItemDS.data([]);
        	this.planItemDS.filter({field: "type", value: "maintenance"});
        },
        addMaintenance			: function(){
        	this.planItemDS.add({
        		name 		: this.get("maintenanceName"),
        		type     	: "maintenance",
        		is_flat   	: false,
        		unit 		: null,
        		usage 		: 0,
        		amount 		: this.get("maintenancePrice")
        	});
        	this.planItemDS.sync();
        	this.set("maintenanceName", "");
        	this.set("maintenancePrice", "");
        },
        goPlan 				: function(){
        	this.planDS.read();
        	this.planItemDS.data([]);
        	this.set("planSelect", false);
        },
        viewPlanItem 		: function(e){
        	var data = e.data;
        	var idList = [];
        	$.each(data.items, function(index, value){
        		idList.push(value.item);
        	});
        	this.set("planSelect", true);
        	this.planItemDS.data([]);
        	this.planItemDS.filter({field: "id", operator:"where_in", value: idList});
        },
		pageLoad 			: function(){
			this.txnTemplateDS.filter({ field: "moduls", value : "water_mg" });
			$(".widget-head li").eq(this.tabGo).children("a").click();
			console.log(this.tabGo);
		},
		cancel 				: function(){
			this.licenseDS.cancelChanges();		
			window.history.back();
		},
		deleteForm 			: function(e){
        	var data = e.data;
        	if(confirm("Do you want to delete it?") == true) {
        		this.txnTemplateDS.remove(data);
        		this.txnTemplateDS.sync();
        	}
        },
	});
	banhji.addAccountingprefix =  kendo.observable({
		lang 				: langVM,		
		selectTypeList 		: banhji.source.typeList,
		Type 				: "Invoice",
        dataSource			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "prefixes",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + "prefixes",
					type: "POST",
					headers: banhji.header,
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + "prefixes",
					type: "PUT",
					headers: banhji.header,
					dataType: 'json'
				},
				destroy 	: {
					url: apiUrl + "prefixes",
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
			filter: { field:"type", operator:"where_not_in", value:["Electricity_Invoice", "Water_Invoice"] },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
        pageLoad 			: function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{	
				this.cancel;
			}
		},
		loadObj 			: function(id){
			var self = this;	
			this.dataSource.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.dataSource.view();
				self.set("obj", view[0]);
				
			});	
		},	
		objSync 			: function(){
	    	var dfd = $.Deferred();	        

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){
		    	if(e.response){				
					dfd.resolve(e.response.results);
				}				  				
		    });
		    this.dataSource.bind("error", function(e){		    		    	
				dfd.reject(e.errorThrown);    				
		    });
		    return dfd;	    		    	
	    }, 	    
		save 				: function(){				
	    	var self = this, obj = this.get("obj");
			//Save Obj
			this.objSync()
			.then(function(data){ //Success	
				banhji.accountingSetting.prefixDS.fetch();	
				
				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){				
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveClose")){
					//Save Close					
					self.set("saveClose", false);
					self.cancel();
					//window.history.back();
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();		
			window.history.back();
		}
    });
    banhji.waterCenter = kendo.observable({
		lang 				: langVM,
		transactionDS  		: dataStore(apiUrl + 'transactions'),
		filterKey 			: 1,
		meter_visible 		: false,
		meterDS 			: dataStore(apiUrl + 'meters'),
		meterClick 			: function(){
			banhji.view.layout.showIn("#waterCenterContent", banhji.view.waterCenterContent);
			$('#wsale-graph').kendoChart({
				dataSource: {data: monthlyDS.data()},												
				series: [
					{field: 'amount', categoryField:'month', type: 'line', axis: 'sale'},
					{field: 'usage', categoryField:'month', type: 'column', axis: 'usage'}
				],
				valueAxes: [
					{
	                    name: "sale",
	                    color: "#007eff",
	                    min: 0,
	                    majorUnit: 5000000,
	                    max: 50000000
	                }, 
	                {
	                    name: "usage",
	                    color: "#3399ff",
	                    min: 0,	
	                    majorUnit: 5000,		                   
	                    max: 50000
	                }
                ],
                categoryAxis: {
                    //categories: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],		                    
                    axisCrossingValues: [0, 13],
                    justified: true
                },
                tooltip: {
                    visible: true,
                    format: "{0}"
                }

			});
		},
		NometerClick 		: function(){
			// var Find = $('#waterCenterContent').find('#meterClick');
			// if(Find.length > 0){
				banhji.view.layout.showIn("#waterCenterContent", banhji.view.waterTransactionContent);
			// }
		},
		contactDS			: new kendo.data.DataSource({
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
			filter:[{ field:"use_water", value:1 },{field:"parent_id", operation: "where_related", model: "contact_type", value: 1}],
			sort:{ field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		filterCustomerTypeDS : [
	    	{ id: 1, name: "Water" },
			{ id: 0, name: "None Water" }],
		contactTypeDS  		: banhji.source.customerTypeDS,
		filterChange 		: function(e){
			this.contactDS.filter([
				{field:"use_water", value: this.get("filterKey")},
				{field:"deleted", value: "0"},
				{field:"is_pattern", value: "0"},
				{field:"parent_id", operation: "where_related", model: "contact_type", value: 1}
			]);
			// if(this.meter_visible == true){
			// 	this.set('meter_visible',false);
			// }
		},
		noteDS 				: dataStore(apiUrl + 'notes'),
		attachmentDS	 	: dataStore(apiUrl + "attachments"),
		currencyDS  		: banhji.source.currencyDS,
		summaryDS 			: dataStore(apiUrl + "transactions"),
		sortList			: banhji.source.sortList,
		sorter 				: "all",
		sdate 				: "",
		edate 				: "",
		obj 				: {id:0},
		note 				: "",
		searchText 			: "",
		contact_type_id 	: null,
		currency_id 		: 0,
		balance 			: 0,
		deposit 			: 0,
		outInvoice 			: 0,
		overInvoice 		: 0,
		currencyCode 		: "",
		user_id 			: banhji.source.user_id,
		exportEXCEL 		: function(){
			var workbook = new kendo.ooxml.Workbook({
			  sheets: [
			    {
			      // Column settings (width)
			      columns: [
			        { autoWidth: true },
			        { autoWidth: true }
			      ],
			      // Title of the sheet
			      title: "Customers",
			      // Rows of the sheet
			      rows: [
			        // First row (header)
			        {
			          cells: [
			            // First cell
			            { value: "number/" },
			            { value: "date" },
			            { value: "previous" },
			            { value: "reading" },
			            { value: "current" }
			          ]
			        },
			        // Second row (data)
			        {
			          cells: [
			            { value: "1" },
			            { value: "1" },
			            { value: "1" },
			            { value: "1" },
			            { value: "1" }
			          ]
			        }
			      ]
			    }
			  ]
			});
			kendo.saveAs({
			    dataURI: workbook.toDataURL(),
			    fileName: "abc.xlsx"
			});
		},
		pageLoad 			: function(id){
			banhji.view.layout.showIn("#waterCenterContent", banhji.view.waterCenterContent);
			//Refresh
			if(this.contactDS.total()>0){
				this.contactDS.fetch();
				this.searchTransaction();
				this.loadSummary();
			}

		},
		sorterChanges 		: function(){
	        var today = new Date(),
        	sdate = "",
        	edate = "",
        	sorter = this.get("sorter");
        	
			switch(sorter){
				case "today":								
					this.set("sdate", today);
					this.set("edate", "");
													  					
				  	break;
				case "week":			  	
					var first = today.getDate() - today.getDay(),
					last = first + 6;

					this.set("sdate", new Date(today.setDate(first)));
					this.set("edate", new Date(today.setDate(last)));						
					
				  	break;
				case "month":							  	
					this.set("sdate", new Date(today.getFullYear(), today.getMonth(), 1));
					this.set("edate", new Date(today.getFullYear(), today.getMonth() + 1, 0));

				  	break;
				case "year":				
				  	this.set("sdate", new Date(today.getFullYear(), 0, 1));
				  	this.set("edate", new Date(today.getFullYear(), 11, 31));

				  	break;
				default:
					this.set("sdate", "");
				  	this.set("edate", "");									  
			}
		},
		setCurrencyCode 	: function(){
			var code = "", obj = this.get("obj");

			$.each(banhji.source.currencyRateDS.data(), function(index, value){				
				if(value.locale == obj.locale){
					code = value.currency[0].code;					

					return false;					
				}
			});

			this.set("currencyCode", code);
		},
		loadObj 			: function(id){
			var self = this;

			this.contactDS.query({
				filter: { field:"id", value:id},
				page:1,
				pageSize:100
			}).then(function(){
				var view = self.contactDS.view();

				if(view.length>0){
					self.set("obj", view[0]);
					self.loadData();
				}
			});
		},
		loadData 			: function(){
			var obj = this.get("obj");

			this.searchTransaction();
			this.loadSummary(obj.id);
			this.setCurrencyCode();

			this.attachmentDS.filter({ field:"contact_id", value: obj.id });
			this.noteDS.query({
				filter: { field:"contact_id", value: obj.id },
				sort: { field:"noted_date", dir:"desc" },
				page: 1,
				pageSize: 10
			});
		},
		//Upload
		onSelect 			: function(e){			
	        // Array with information about the uploaded files
	        var self = this, 
	        files = e.files,
	        obj = this.get("obj");			
			
			if(obj.id>0){
		        // Check the extension of each file and abort the upload if it is not .jpg
		        $.each(files, function(index, value){
		            if (value.extension.toLowerCase() === ".jpg"
		            	|| value.extension.toLowerCase() === ".jpeg"
		            	|| value.extension.toLowerCase() === ".tiff"
		            	|| value.extension.toLowerCase() === ".png" 
		            	|| value.extension.toLowerCase() === ".gif"
		            	|| value.extension.toLowerCase() === ".pdf"){

		            	var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

		            	self.attachmentDS.add({
		            		user_id 		: self.get("user_id"),
		            		contact_id 		: obj.id,
		            		type 			: "Contact",
		            		name 			: value.name,
		            		description 	: "",
		            		key 			: key,
		            		url 			: banhji.s3 + key,
		            		size 			: value.size,
		            		created_at 		: new Date(),

		            		file 			: value.rawFile
		            	});	            			            		            
		            }else{
		            	alert("This type of file is not allowed to attach.");
		            }
		        });
	    	}else{
	    		alert("Please select a customer!");
	    	}
	    },
	    removeFile 			: function(e){
	    	var data = e.data;

	    	if (confirm(banhji.source.confirmMessage)) {
	    		this.attachmentDS.remove(data);
	    		this.attachmentDS.sync();
	    	}	    	
	    },
	    uploadFile 			: function(){
	    	$.each(this.attachmentDS.data(), function(index, value){	    		
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

            this.attachmentDS.sync();
            var saved = false;
            this.attachmentDS.bind("requestEnd", function(e){
            	//Delete File
            	if(e.type=="destroy"){
	            	if(saved==false && e.response){
	            		saved = true;
	            	
	            		var response = e.response.results;
	            		$.each(response, function(index, value){            			
		            		var params = {
							  	//Bucket: 'STRING_VALUE', /* required */
							 	Delete: { /* required */
								    Objects: [ /* required */
								      	{
									        Key: value.data.key /* required */
								      	}
								      /* more items */
								    ]
							  	}
							};
							bucket.deleteObjects(params, function(err, data) {
							  	//console.log(err, data);
							});
						});
	            	}
            	}
            });
	    },
	    //Summary
		loadContact 		: function(id){
			var self = this;
			
			this.contactDS.query({
			  	filter:[
			  		{ field:"id", value:id }
			  	],
			  	page: 1,
			  	pageSize: 50
			}).then(function(e) {
			    var view = self.contactDS.data();
			    
			    if(view.length>0){
			    	self.set("obj", view[0]);
			    	self.loadData();
			    }
			});
		},
		loadSummary 		: function(id){
			var self = this, obj = this.get("obj");

			this.summaryDS.query({
			  	filter: [
			  		{ field:"contact_id", value: obj.id },
			  		{ field:"type", operator:"where_in", value: ["Water_Deposit", "Water_Invoice"] },
			  		{ field:"status", operator:"where_in", value: [0,2] }
			  	],
			  	sort: { field: "issued_date", dir: "desc" },
			  	page: 1,
			  	pageSize: 1000
			}).then(function(){
				var view = self.summaryDS.view(),
				deposit = 0, open = 0, over = 0, balance = 0, today = new Date();

				$.each(view, function(index, value){
					if(value.type=="Water_Deposit"){
						deposit += kendo.parseFloat(value.amount);
					}else{
						balance += kendo.parseFloat(value.amount) - kendo.parseFloat(value.deposit);
						open++;

						if(new Date(value.due_date)<today){						
							over++;
						}
					}									
				});
				
				self.set("deposit", kendo.toString(deposit, obj.locale=="km-KH"?"c0":"c", obj.locale));
				self.set("outInvoice", kendo.toString(open, "n0"));
				self.set("overInvoice", kendo.toString(over, "n0"));
				self.set("balance", kendo.toString(balance, obj.locale=="km-KH"?"c0":"c", obj.locale));
			});
		},
		loadBalance 		: function(){
			var obj = this.get("obj");

			this.transactionDS.query({
			  	filter: [
			  		{ field:"contact_id", value: obj.id },
			  		{ field:"type", value:"Water_Invoice" },
			  		{ field:"status", operator:"where_in", value: [0,2] }
			  	],
			  	sort: [
			  		{ field: "issued_date", dir: "desc" },
			  		{ field: "id", dir: "desc" }
			  	],
			  	page: 1,
			  	pageSize: 10
			});
		},
		loadDeposit 		: function(){
			var obj = this.get("obj");

			this.transactionDS.query({
			  	filter: [
			  		{ field:"contact_id", value: obj.id },
			  		{ field:"type", value:"Water_Deposit" }
			  	],
			  	sort: [
			  		{ field: "issued_date", dir: "desc" },
			  		{ field: "id", dir: "desc" }
			  	],
			  	page: 1,
			  	pageSize: 10
			});
		},
		loadOverInvoice 	: function(){
			var obj = this.get("obj");

			this.transactionDS.query({
			  	filter: [
			  		{ field:"contact_id", value: obj.id },
			  		{ field:"type", value: "Water_Invoice" },
			  		{ field:"status", operator:"where_in", value: [0,2] },
			  		{ field:"due_date <", value: kendo.toString(new Date(), "yyyy-MM-dd") }
			  	],
			  	sort: [
			  		{ field: "issued_date", dir: "desc" },
			  		{ field: "id", dir: "desc" }
			  	],
			  	page: 1,
			  	pageSize: 10
			});
		},	
		selectedRow			: function(e){
			var data = e.data, self = this;
			this.meterDS.filter({field: "contact_id", value: data.id});
			this.set("obj", data);
			this.loadData();
			if(data.use_water == 1){
				this.set('meter_visible', true);
			}else{
				this.set('meter_visible', false);
			}
			console.log(this.meter_visible);
		},
		goMeter 			: function(){
			banhji.meter.set("contact", this.get("obj"));
			banhji.router.navigate("/meter");
		},
		goDeposit 			: function(){
			banhji.customerDeposit.set("contact", this.get("obj"));
			banhji.router.navigate("/customer_deposit");
		},
		//Search
		enterSearch 		: function(e){
			e.preventDefault();

			this.search();
		},
		search 				: function(){
			var self = this, 
			para = [],
      		searchText = this.get("searchText"),
      		contact_type_id = this.get("contact_type_id");
      		
      		if(searchText){
      			var textParts = searchText.replace(/([a-z]+)/i, "$1 ").split(/[^0-9a-z]+/ig);

      			para.push(
      				{ field: "abbr", value: textParts[0] },
      				{ field: "number", value: textParts[1] },
					{ field: "name", operator: "or_like", value: searchText }
      			);
      		}

      		if(contact_type_id){
      			para.push({ field: "contact_type_id", value: contact_type_id });
      		}else{
      			para.push({ field: "parent_id", model:"contact_type", operator:"where_related", value: 1 });
      		}

      		this.contactDS.filter(para);
			
			//Clear search filters
      		self.set("searchText", "");
      		self.set("contact_type_id", 0);
		},
		searchTransaction	: function(){
			var self = this,
				start = kendo.toString(this.get("sdate"), "yyyy-MM-dd"),
        		end = kendo.toString(this.get("edate"), "yyyy-MM-dd"),
        		para = [], obj = this.get("obj");

        	if(obj.id>0){
        		para.push({ field:"contact_id", value: obj.id });
        	
	        	//Dates
	        	if(start && end){
	            	para.push({ field:"issued_date >=", value: start });
	            	para.push({ field:"issued_date <=", value: end });
	            }else if(start){
	            	para.push({ field:"issued_date", value: start });
	            }else if(end){
	            	para.push({ field:"issued_date <=", value: end });
	            }else{
	            	
	            }

	            this.transactionDS.query({
	            	filter: para,
	            	sort: [
				  		{ field: "issued_date", dir: "desc" },
				  		{ field: "id", dir: "desc" }
				  	],
	            	page: 1,
	            	pageSize: 10
	            });
	        }            
		},
		//Note
		saveNoteEnter 		: function(e){
			e.preventDefault();
			this.saveNote();
		},		
		saveNote 			: function(){
			var obj = this.get("obj");

			if(obj.id>0 && this.get("note")!==""){
				this.noteDS.insert(0, {
					contact_id 	: obj.id,
					note 		: this.get("note"),
					noted_date	: new Date(),
					created_by 	: this.get("user_id"),

					creator 	: ""
				});

				this.noteDS.sync();
				this.set("note", "");					
			}else{
				alert("Please select a customer and Memo is required");
			}
		}
	});
	banhji.waterActivateUser = kendo.observable({
		lang 				: langVM,
		dataSource  		: dataStore(apiUrl + "activate_water"),
		licenseDS 			: dataStore(apiUrl + "branches"),
		blocDS 				: dataStore(apiUrl + "locations"),
		obj 				: null,
		isEdit 				: false,
		pageLoad 			: function(id){
			this.addEmpty(id);
		},
		loadObj 			: function(id){
			var self = this;
			this.contactDS.query({
				filter: { field:"id", value:id},
				page:1,
				pageSize:100
			}).then(function(){
				var view = self.contactDS.view();

				if(view.length>0){
					self.set("obj", view[0]);
					self.loadData();
				}
			});
		},
		lonChange 			: function(e){
			var obj = this.get("obj"), self = this;
			this.blocDS.filter({field: "branch_id", value: obj.licence});
		},
		loadContact 		: function(id){
			var self = this;
			this.contactDS.query({
			  	filter:[
			  		{ field:"id", value:id }
			  	],
			  	page: 1,
			  	pageSize: 50
			}).then(function(e) {
			    var view = self.contactDS.data();
			    if(view.length>0){
			    	self.set("obj", view[0]);
			    	self.loadData();
			    }
			});
		},
		addEmpty 		 	: function(id){			
			//this.dataSource.data([]);		
			this.set("obj", null);		
			this.set("isEdit", false);		
			this.dataSource.insert(0,{				
				contact_id			: id,
				code 				: null,
				licence 			: null,
				location  			: null,
				type 				: "w",
				family_member 		: null,
				national_id_number 	: null,
				occupation 			: null
	    	});		
			var obj = this.dataSource.at(0);			
			this.set("obj", obj);		
		},
		save 				: function() {
			if(this.dataSource.data().length > 0) {
				//$("#loadImport").css("display","block");
				this.dataSource.sync();
				this.dataSource.bind("requestEnd", function(e){
			    	if(e.response){				
			    		$("#ntf1").data("kendoNotification").success("Activated user successfully!");
			    		//console.log(banhji.waterCenter.get('obj'));		
						banhji.waterCenter.get('obj').set('user_water', 1);	
						banhji.waterCenter.dataSource.sync();
			    		window.history.back();
						//$("#loadImport").css("display","none");
					}				  				
			    });
			    this.dataSource.bind("error", function(e){		    		    	
					$("#ntf1").data("kendoNotification").error("Error activated!"); 
					//$("#loadImport").css("display","none");				
			    });
			}	
			
		},
		cancel 				: function(){
			//this.dataSource.cancelChanges();		
			window.history.back();
		}
	});

	/*==== Meter=====*/
	banhji.meter = kendo.observable({
		lang 				: langVM,
		dataSource  		: dataStore(apiUrl + "meters"),
		planDS 				: dataStore(apiUrl + "plans"),
		locationDS 			: dataStore(apiUrl + "locations"),
		itemDS 				: null,
		obj 				: null,
		isEdit 				: false,
		contact 			: null,
		selectType 			: [{id: 1, name: "Active"},{id: 0, name: "Inactive"},{id: 2, name: "Void"}],
		pageLoad 			: function(id){
			if(id){
				this.loadObj(id);
			}else{
				this.addEmpty(this.contact.id);
			}
		},
		loadObj 			: function(id){
			var self = this;	
			this.dataSource.data([]);			
			this.dataSource.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.dataSource.view();	
				self.set("obj", view[0]);
			});
		},
		addEmpty 		 	: function(id){			
			this.dataSource.data([]);		
			this.set("obj", null);		
			this.set("isEdit", false);		
			this.dataSource.insert(0,{				
				contact_id		: id,
				number 			: null,
				status 			: 1,
				location_id 	: 0,
				latitute 		: null,
				longtitute  	: null,
				plan_id 		: 0,
				registered_date : null,
				map 			: null,
				memo 			: null,
				type 			: {id: "w", name: "Water"},
				starting_no 	: null,
				activated 		: 0,
				number_digit 	: null		
	    	});		
			var obj = this.dataSource.at(0);			
			this.set("obj", obj);		
		},
		save 				: function() {
			var self = this;
			if(this.dataSource.data().length > 0) {
				this.dataSource.sync();
				this.dataSource.bind("requestEnd", function(e){
					if(e.type != 'read') {
						if(e.response){				
				    		$("#ntf1").data("kendoNotification").success("Successfully!");
							self.cancel();
						}
					}				    					  				
			    });
			    this.dataSource.bind("error", function(e){		    		    	
					$("#ntf1").data("kendoNotification").error("Error!"); 	
			    });
			}	
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();		
			window.history.back();
		}
	});
	banhji.ActivateMeter = kendo.observable({
		lang 				: langVM,
		meterDS     		: dataStore(apiUrl + "meters"),
		dataStore 			: [],
		planDS 				: dataStore(apiUrl + "plans"),
		meterObj	 		: null,
		pageLoad 			: function(id){
			var self = this;				
			this.meterDS.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.meterDS.view();	
				self.set("meterObj", view[0]);
				self.setObj(view[0].plan_id);
			});
		},
		items :[],
		amountToBeRecieved 	: 0.0,
		setObj 				: function(plan_id){
			var self = this;
			this.planDS.query({
				filter: {field: "id", value: plan_id}
			})
			.then(function(e){
				var data = self.planDS.view()[0];
				var amount = 0.0;
				$.each(data.items, function(i, v){
					if(v.type == 'service' || v.type== 'deposit'){
						self.items.push(v);
						amount += parseFloat(v.amount);
					}
				});
				self.set('amountToBeRecieved', amount);
			});
		},
		save 				: function() {
			console.log('save');
			var self = this;
			var amount = 0.0;
			$.each(this.items, function(i, v){
				amount += parseFloat(v.amount);
			});
			if(this.get('amountToBeRecieved') < amount) {
				// create one invoice
				// and amount left to be make via installment
				// then change meter activated field to 1
			} else {
				// create only invoice for the service
				// then change meter activated field to 1
				if(this.dataSource.data().length > 0) {
					//$("#loadImport").css("display","block");
					this.dataSource.sync();
					this.dataSource.bind("requestEnd", function(e){
						if(e.type != 'read') {
							if(e.response){				
					    		$("#ntf1").data("kendoNotification").success("Successfully!");
								window.history.back();
							}
						}				    					  				
				    });
				    this.dataSource.bind("error", function(e){		    		    	
						$("#ntf1").data("kendoNotification").error("Error!"); 
						//$("#loadImport").css("display","none");				
				    });
				}
			}
				
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();		
			window.history.back();
		}
	});
	/*==== End Meter=====*/
	/*Reading*/
	banhji.reading = kendo.observable({
		lang 				: langVM,
		dataSource  		: dataStore(apiUrl + "readings"),
		itemDS 				: null,
		obj 				: null,
		isEdit 				: false,
		contact 			: null,
		pageLoad 			: function(id){
			this.addEmpty();
		},
		types 				: [
			{id: "w", name: "Water"},
			{id: "e", name: "Electricity"}
		],
		addEmpty 		 	: function(id){			
			//this.dataSource.data([]);		
			this.set("obj", null);		
			this.set("isEdit", false);		
			this.dataSource.insert(0,{		
	    	});		
			var obj = this.dataSource.at(0);			
			this.set("obj", obj);		
		},
		onSelected 			: function(e){
			$('li.k-file').remove();
	        var files = e.files, self = this;
	        $("#loadImport").css("display","block");
	        var reader = new FileReader();
			this.dataSource.data([]);	
			reader.onload = function() {	
				var data = reader.result;	
				var result = {}; 						
				var workbook = XLSX.read(data, {type : 'binary'});
				workbook.SheetNames.forEach(function(sheetName) {
					var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
					if(roa.length > 0){
						result[sheetName] = roa;
						for(var i = 0; i < roa.length; i++) {
							self.dataSource.add(roa[i]);
							$("#loadImport").css("display","none");	
							console.log(roa[i]);
						}							
					}					
				});															
			}
			reader.readAsBinaryString(files[0].rawFile);      
		},
		exportEXCEL 		: function(e){
			$("#loadImport").css("display","block");
			var ds = new kendo.data.DataSource({
		        type: "json",
		        transport: {
		          read: apiUrl + "readings"
		        },
		        schema: {
		          model: {
		            fields: {
		              number: { type: "number" },
		              date: { type: "date" },
		              previous: { type: "previous" },
		              reading: { type: "reading" },
		              current: { type: "current" }
		            }
		          }
		        }
		      });

		      var rows = [{
		        cells: [
		          { value: "number" },
		          { value: "date" },
		          { value: "previous" },
		          { value: "reading" },
		          { value: "current" }
		        ]
		      }];
		      ds.fetch(function(){
		        var data = this.data();
		        for (var i = 0; i < data[0].count; i++){
		          rows.push({
		            cells: [
		              { value: data[0].results[i].number },
		              { value: data[0].results[i].date },
		              { value: data[0].results[i].previous },
		              { value: data[0].results[i].reading },
		              { value: data[0].results[i].current }
		            ]
		          })
		        }
		        var workbook = new kendo.ooxml.Workbook({
		          sheets: [
		            {
		              columns: [
		                { autoWidth: true },
		                { autoWidth: true },
		                { autoWidth: true },
		                { autoWidth: true },
		                { autoWidth: true }
		              ],
		              // Title of the sheet
		              title: "Reading",
		              // Rows of the sheet
		              rows: rows
		            }
		          ]
		        });
		        //save the file as Excel file with extension xlsx
		        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "Reading.xlsx"});
		      }).then(function(){
		      	$("#loadImport").css("display","none");
		      });
		},
		save 				: function() {
			var self = this;
			if(this.dataSource.data().length > 0) {
				$("#loadImport").css("display","block");
				this.dataSource.sync();
				this.dataSource.bind("requestEnd", function(e){
					if(e.type != 'read') {
				    	if(e.response){				
				    		$("#ntf1").data("kendoNotification").success("Activated user successfully!");
				    		self.cancel();
							$("#loadImport").css("display","none");
						}	
					}			  				
			    });
			    this.dataSource.bind("error", function(e){		    		    	
					$("#ntf1").data("kendoNotification").error("Error activated!"); 
					$("#loadImport").css("display","none");				
			    });
			}	
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();		
			window.history.back();
		}
	});
	banhji.EditReading = kendo.observable({
		lang 				: langVM,
		dataSource  		: dataStore(apiUrl + "readings"),
		pageLoad 			: function(id){
			this.dataSource.read();
		},
		exportEXCEL 		: function(e){
			$("#loadImport").css("display","block");
			var ds = new kendo.data.DataSource({
		        type: "json",
		        transport: {
		          read: apiUrl + "readings"
		        },
		        schema: {
		          model: {
		            fields: {
		              number: { type: "number" },
		              date: { type: "date" },
		              previous: { type: "previous" },
		              reading: { type: "reading" },
		              current: { type: "current" }
		            }
		          }
		        }
		      });

		      var rows = [{
		        cells: [
		          { value: "number" },
		          { value: "date" },
		          { value: "previous" },
		          { value: "reading" },
		          { value: "current" }
		        ]
		      }];
		      ds.fetch(function(){
		        var data = this.data();
		        for (var i = 0; i < data[0].count; i++){
		          rows.push({
		            cells: [
		              { value: data[0].results[i].number },
		              { value: data[0].results[i].date },
		              { value: data[0].results[i].previous },
		              { value: data[0].results[i].reading },
		              { value: data[0].results[i].current }
		            ]
		          })
		        }
		        var workbook = new kendo.ooxml.Workbook({
		          sheets: [
		            {
		              columns: [
		                { autoWidth: true },
		                { autoWidth: true },
		                { autoWidth: true },
		                { autoWidth: true },
		                { autoWidth: true }
		              ],
		              // Title of the sheet
		              title: "Reading",
		              // Rows of the sheet
		              rows: rows
		            }
		          ]
		        });
		        //save the file as Excel file with extension xlsx
		        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "Reading.xlsx"});
		      }).then(function(){
		      	$("#loadImport").css("display","none");
		      });
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();		
			window.history.back();
		}
	});

	banhji.waterImport = kendo.observable({
		lang 				: langVM,
		dataSource  		: dataStore(apiUrl + "readings"),
		pageLoad 			: function(id){
			
		},
		onSelected 			: function(e){
			$('li.k-file').remove();
	        var files = e.files, self = this;
	        $("#loadImport").css("display","block");
	        var reader = new FileReader();
			this.dataSource.data([]);	
			reader.onload = function() {	
				var data = reader.result;	
				var result = {}; 						
				var workbook = XLSX.read(data, {type : 'binary'});
				workbook.SheetNames.forEach(function(sheetName) {
					var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
					if(roa.length > 0){
						result[sheetName] = roa;
						for(var i = 0; i < roa.length; i++) {
							self.dataSource.add(roa[i]);
							$("#loadImport").css("display","none");	
							console.log(roa[i]);
						}							
					}					
				});															
			}
			reader.readAsBinaryString(files[0].rawFile);      
		},
		exportEXCEL 		: function(e){
			$("#loadImport").css("display","block");
			var ds = new kendo.data.DataSource({
		        type: "json",
		        transport: {
		          read: apiUrl + "readings"
		        },
		        schema: {
		          model: {
		            fields: {
		              number: { type: "number" },
		              date: { type: "date" },
		              previous: { type: "previous" },
		              reading: { type: "reading" },
		              current: { type: "current" }
		            }
		          }
		        }
		      });

		      var rows = [{
		        cells: [
		          { value: "number" },
		          { value: "date" },
		          { value: "previous" },
		          { value: "reading" },
		          { value: "current" }
		        ]
		      }];
		      ds.fetch(function(){
		        var data = this.data();
		        for (var i = 0; i < data[0].count; i++){
		          rows.push({
		            cells: [
		              { value: data[0].results[i].number },
		              { value: data[0].results[i].date },
		              { value: data[0].results[i].previous },
		              { value: data[0].results[i].reading },
		              { value: data[0].results[i].current }
		            ]
		          })
		        }
		        var workbook = new kendo.ooxml.Workbook({
		          sheets: [
		            {
		              columns: [
		                { autoWidth: true },
		                { autoWidth: true },
		                { autoWidth: true },
		                { autoWidth: true },
		                { autoWidth: true }
		              ],
		              // Title of the sheet
		              title: "Reading",
		              // Rows of the sheet
		              rows: rows
		            }
		          ]
		        });
		        //save the file as Excel file with extension xlsx
		        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "Reading.xlsx"});
		      }).then(function(){
		      	$("#loadImport").css("display","none");
		      });
		},
		save 				: function() {
			var self = this;
			if(this.dataSource.data().length > 0) {
				$("#loadImport").css("display","block");
				this.dataSource.sync();
				this.dataSource.bind("requestEnd", function(e){
					if(e.type != 'read') {
				    	if(e.response){				
				    		$("#ntf1").data("kendoNotification").success("Activated user successfully!");
				    		self.cancel();
							$("#loadImport").css("display","none");
						}	
					}			  				
			    });
			    this.dataSource.bind("error", function(e){		    		    	
					$("#ntf1").data("kendoNotification").error("Error activated!"); 
					$("#loadImport").css("display","none");				
			    });
			}	
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();		
			window.history.back();
		}
	});

	banhji.runBill = kendo.observable({
		lang 				: langVM,
		pageLoad 			: function(id){
			
		},   
		save 				: function() {
			var self = this;
			if(this.dataSource.data().length > 0) {
				$("#loadImport").css("display","block");
				this.dataSource.sync();
				this.dataSource.bind("requestEnd", function(e){
					if(e.type != 'read') {
				    	if(e.response){				
				    		$("#ntf1").data("kendoNotification").success("Activated user successfully!");
				    		self.cancel();
							$("#loadImport").css("display","none");
						}	
					}			  				
			    });
			    this.dataSource.bind("error", function(e){		    		    	
					$("#ntf1").data("kendoNotification").error("Error activated!"); 
					$("#loadImport").css("display","none");				
			    });
			}	
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();		
			window.history.back();
		}
	});

	banhji.customerDeposit =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "transactions"),
		deleteDS 			: dataStore(apiUrl + "transactions"),
		lineDS  			: dataStore(apiUrl + "account_lines"),
		referenceDS			: dataStore(apiUrl + "transactions"),
		referenceLineDS		: dataStore(apiUrl + "account_lines"),
		recurringDS 		: dataStore(apiUrl + "transactions"),
		recurringLineDS 	: dataStore(apiUrl + "account_lines"),
		journalLineDS		: dataStore(apiUrl + "journal_lines"),
		currencyRateDS		: dataStore(apiUrl + "currencies/rate"),
		attachmentDS	 	: dataStore(apiUrl + "attachments"),
		txnTemplateDS		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "transaction_templates",
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
			filter: { field: "type", value:"Customer_Deposit" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		contact 			: null,
		contactDS 			: banhji.source.customerDS,
		depositAccountDS 	: banhji.source.depositAccountDS,
		segmentItemDS 		: banhji.source.segmentItemDS,
		accountDS 			: banhji.source.cashAccountDS,
		amtDueColor 		: banhji.source.amtDueColor,
	    confirmMessage 		: banhji.source.confirmMessage,
		frequencyList 		: banhji.source.frequencyList,
		monthList 			: banhji.source.monthList,	
		monthOptionList 	: banhji.source.monthOptionList,
		weekDayList 		: banhji.source.weekDayList,
		dayList 			: banhji.source.dayList,
		showMonthOption 	: false,
		showMonth 			: false,
		showWeek 			: false,
		showDay 			: false,
		obj 				: null,
		isEdit 				: false,
		saveClose 			: false,
		savePrint 			: false,
		saveRecurring 		: false,
		showConfirm 		: false,
		statusSrc 			: "",
		enableRef 	 		: false,
		total				: 0,
		original_total 		: 0,
		user_id				: banhji.source.user_id,
		pageLoad 			: function(id, is_recurring){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id, is_recurring);
			}else{				
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}								
			}
		},
		//Upload
		onSelect 			: function(e){			
	        // Array with information about the uploaded files
	        var self = this, 
	        files = e.files,
	        obj = this.get("obj");			
			
	        // Check the extension of each file and abort the upload if it is not .jpg
	        $.each(files, function(index, value){
	            if (value.extension.toLowerCase() === ".jpg"
	            	|| value.extension.toLowerCase() === ".jpeg"
	            	|| value.extension.toLowerCase() === ".tiff"
	            	|| value.extension.toLowerCase() === ".png" 
	            	|| value.extension.toLowerCase() === ".gif"
	            	|| value.extension.toLowerCase() === ".pdf"){

	            	var key = 'ATTACH_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ value.name;

	            	self.attachmentDS.add({
	            		user_id 		: self.get("user_id"),
	            		transaction_id 	: obj.id,
	            		type 			: "Transaction",
	            		name 			: value.name,
	            		description 	: "",
	            		key 			: key,
	            		url 			: banhji.s3 + key,
	            		size 			: value.size,
	            		created_at 		: new Date(),

	            		file 			: value.rawFile
	            	});	            			            		            
	            }else{
	            	alert("This type of file is not allowed to attach.");
	            }
	        });
	    },
	    removeFile 			: function(e){
	    	var data = e.data;

	    	if (confirm(banhji.source.confirmMessage)) {
	    		this.attachmentDS.remove(data);
	    	}	    	
	    },
	    uploadFile 			: function(){
	    	$.each(this.attachmentDS.data(), function(index, value){	    		
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

	        this.attachmentDS.sync();
	        var saved = false;
	        this.attachmentDS.bind("requestEnd", function(e){
	        	//Delete File
	        	if(e.type=="destroy"){
	            	if(saved==false && e.response){
	            		saved = true;
	            	
	            		var response = e.response.results;
	            		$.each(response, function(index, value){            			
		            		var params = {
							  	//Bucket: 'STRING_VALUE', /* required */
							 	Delete: { /* required */
								    Objects: [ /* required */
								      	{
									        Key: value.data.key /* required */
								      	}
								      /* more items */
								    ]
							  	}
							};
							bucket.deleteObjects(params, function(err, data) {
							  	//console.log(err, data);
							});
						});
	            	}
	        	}
	        });
	    },
		//Contact
		loadContact 		: function(id){
			var self = this;

			this.contactDS.query({
				filter: { field:"id", value: id },
				page: 1,
				pageSize: 100
			}).then(function(e){
				var view = self.contactDS.view(),
				obj = self.get("obj");
		    	
		    	obj.set("contact_id", view[0].id);
		    	obj.set("account_id", view[0].deposit_account_id);
		    	obj.set("locale", view[0].locale);

				self.setRate();
				self.loadReference();
				self.loadRecurring();
			});
		},
		contactChanges 		: function(){
			var obj = this.get("obj");

	    	if(obj.contact_id>0){
		    	var contact = this.contactDS.get(obj.contact_id);
		    	
		    	obj.set("account_id", contact.deposit_account_id);
		    	obj.set("locale", contact.locale);
		    	this.setRate();
		    	this.loadReference();
		    	this.loadRecurring();
	    	}

	    	this.lineDS.data([]);
		    this.addRow();
		    this.changes();
	    },
		//Currency Rate
		setRate 			: function(){
			var obj = this.get("obj"), 
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));			
			
			obj.set("rate", rate);

			$.each(this.lineDS.data(), function(index, value){
				value.set("rate", rate);
				value.set("locale", obj.locale);
			});
		},
		//Segment
		segmentChanges 		: function(e) {
			var dataArr = this.get("obj").segments,
			lastIndex = dataArr.length - 1,
			last = this.segmentItemDS.get(dataArr[lastIndex]);
			
			if(dataArr.length > 1) {
				for(var i = 0; i < dataArr.length - 1; i++) {
					var current_index = dataArr[i],
					current = this.segmentItemDS.get(current_index);

					if(current.segment_id === last.segment_id) {
						dataArr.splice(lastIndex, 1);
						break;
					}
				}
			}
		},
		//Obj
		loadObj 			: function(id, is_recurring){
			var self = this, para = [];

			para.push({ field:"id", value: id });

			if(is_recurring){
				para.push({ field:"is_recurring", value: 1 });
			}

			this.dataSource.query({
				filter: para,
				page: 1,
				pageSize: 1
			}).then(function(e){
				var view = self.dataSource.view();

				self.set("obj", view[0]);
				self.set("original_total", view[0].amount);
				self.set("total", kendo.toString(view[0].amount, "c", view[0].locale));
				self.lineDS.filter({ field: "transaction_id", value: id });				
				self.journalLineDS.filter({ field: "transaction_id", value: id });
				self.referenceDS.filter({ field: "id", value: view[0].reference_id });

				self.loadRecurring();
			});
		},
		changes				: function(){
			var obj = this.get("obj");
			
			if(this.lineDS.total()>0){
				var sum = 0;
				
				$.each(this.lineDS.data(), function(index, value) {
					sum += value.amount;
		        });

		        this.set("total", kendo.toString(sum, "c", obj.locale));
		        obj.set("amount", sum);
	    	}else{
	    		this.set("total", 0);
		        obj.set("amount", 0);
	    	}
		},
		addEmpty 		 	: function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.attachmentDS.data([]);
			this.journalLineDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);

			this.dataSource.insert(0, {
				contact_id 				: "",
				transaction_template_id : "",
				recurring_id 			: "",
				reference_id	 		: "",
				account_id 				: "",
				user_id 				: this.get("uer_id"),
			   	type					: "Customer_Deposit", //required
			   	amount					: 0,
			   	rate					: 1,
			   	locale 					: banhji.locale,
			   	issued_date 			: new Date(),
			   	memo 					: "",
			   	memo2 					: "",
			   	segments 				: [],
			   	is_journal 				: 1,
			   	//Recurring
			   	recurring_name 			: "",
			   	start_date 				: new Date(),
			   	frequency 				: "Daily",
			   	month_option 			: "Day",
			   	interval 				: 1,
			   	day 					: 1,
			   	week 					: 0,
			   	month 					: 0,
			   	is_recurring 			: 0
	    	});

			var obj = this.dataSource.at(0);
			this.set("obj", obj);

			this.setRate();
			this.addRow();
		},
		addRow 				: function(){
			var obj = this.get("obj");
					
			this.lineDS.add({
				transaction_id 		: obj.id,
				account_id 			: "",
				description 		: "",
				reference_no 		: "",
				amount 	 			: 0,
				rate				: obj.rate,
				locale				: obj.locale
			});
		},
		removeRow  			: function(e){						
			var data = e.data;
			if(this.lineDS.total()>1){				
				this.lineDS.remove(data);
		        this.changes();
	        }		        
		},
		objSync 			: function(){
	    	var dfd = $.Deferred();	        

	    	this.dataSource.sync();
		    this.dataSource.bind("requestEnd", function(e){
		    	if(e.response){				
					dfd.resolve(e.response.results);
				}				  				
		    });
		    this.dataSource.bind("error", function(e){		    		    	
				dfd.reject(e.errorThrown);    				
		    });

		    return dfd;	    		    	
	    },	    	    
		save 				: function(){				
	    	var self = this, obj = this.get("obj");

	    	//Reference
	    	if(obj.reference_id>0){
				var ref = this.referenceDS.get(obj.reference_id);
				ref.set("deposit", obj.amount);
				this.referenceDS.sync();
			}else{
				obj.set("reference_id", 0);
			}

	    	//Recurring
	    	if(this.get("saveRecurring")){
	    		this.set("saveRecurring", false);

	    		if(this.get("isEdit")){
		    		if(obj.is_recurring=="0"){ //Add brand new recurring from existing transaction	    			
		    			this.addNewRecurring();

		    			this.recurringSync()
						.then(function(data){ //Success
							$.each(self.recurringLineDS.data(), function(index, value){										
								value.set("transaction_id", data[0].id);						
							});
							self.recurringLineDS.sync();

							return data;			
						}, function(reason) { //Error
							$("#ntf1").data("kendoNotification").error(reason);
						}).then(function(result){
							$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

							self.addEmpty();
						});
		    		}
		    	}else{
	    			obj.set("is_recurring", 1);
		    	}
	    	}	    	

	    	//Edit Mode
	    	if(this.get("isEdit")){
		    	obj.set("dirty", true);
		    	
		    	//Line has changed
		    	if(obj.amount!==this.get("original_total") && obj.is_recurring==0){
		    		this.set("original_total",0);

			    	$.each(this.journalLineDS.data(), function(index, value){										
						value.set("deleted", 1);										
					});

					this.addJournal(obj.id);
		    	}
	    	}	    	
	    	
			//Save Obj
			this.objSync()
			.then(function(data){ //Success												
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
			    		value.set("transaction_id", data[0].id);
		            });

					if(obj.is_recurring==0){
			            //Journal
			            self.addJournal(data[0].id);
			        }
				}

				self.lineDS.sync();
				self.uploadFile();
				
				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){				
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveClose")){
					//Save Close					
					self.set("saveClose", false);
					self.cancel();
					window.history.back();
				}else if(self.get("savePrint")){
					//Save Print					
					self.set("savePrint", false);
					self.cancel();
					banhji.router.navigate("/invoice_form/"+result[0].id);
				}else{
					//Save New
					self.addEmpty();
				}

				// Refresh Customer
				self.contactDS.filter({ field:"parent_id", operator:"where_related", model:"contact_type", value:1 });
			});			
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.attachmentDS.cancelChanges();

			this.dataSource.data([]);
			this.lineDS.data([]);
			this.attachmentDS.data([]);

			this.contactDS.filter({ field:"parent_id", operator:"where_related", model:"contact_type", value:1 });
			
			banhji.userManagement.removeMultiTask("customer_deposit");
		},
		delete 				: function(){
			var self = this, obj = this.get("obj");
			this.set("showConfirm",false);			
			
	        this.deleteDS.query({
	        	filter:[
	        		{ field:"reference_id", value:obj.id }
	        	],
	        	page:1,
	        	pageSize:1
	        }).then(function(){
	        	var view = self.deleteDS.view();

	        	if(view.length>0){
	        		alert("Sorry, you can not delete it.");
	        	}else{
	        		obj.set("deleted", 1);
			        self.dataSource.sync();

			        window.history.back();
	        	}
	        });		    	    	
		},
		openConfirm 		: function(){
			this.set("showConfirm", true);
		},
		closeConfirm 		: function(){
			this.set("showConfirm", false);
		},
		//Journal
		addJournal 			: function(transaction_id){
	    	var self = this,
	    	sum = 0,
	    	obj = this.get("obj");

			//Cash account on DR
			$.each(this.lineDS.data(), function(index, value){
				sum += value.amount;
				self.journalLineDS.add({
					transaction_id 		: transaction_id,
					account_id 			: value.account_id,
					contact_id 			: value.contact_id,
					description 		: "",
					reference_no 		: value.reference_no,
					segments 	 		: [],
					dr 	 				: value.amount,
					cr 					: 0,
					rate				: value.rate,
					locale				: value.locale
				});
			});

			//Deposit on CR
			this.journalLineDS.add({
				transaction_id 		: transaction_id,
				account_id 			: obj.account_id,
				contact_id 			: obj.contact_id,
				description 		: "",
				reference_no 		: "",
				segments 	 		: obj.segments,
				dr 	 				: 0,
				cr 					: sum,
				rate				: obj.rate,
				locale				: obj.locale
			});

			this.journalLineDS.sync();
		},
		//Reference
		loadReference 		: function(){
			var obj = this.get("obj");

			if(obj.contact_id>0){
				this.set("enableRef", true);

				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "status", value: 0 },
					{ field: "type", value: "Sale_Order" },
					{ field: "due_date >=", value: kendo.toString(obj.issued_date, "yyyy-MM-dd") }
				]);
			}else{
				this.set("enableRef", false);
				obj.set("reference_id", "");
			}
		},
		referenceChanges 	: function(){
			var obj = this.get("obj");

			if(obj.reference_id>0){
				var data = this.referenceDS.get(obj.reference_id);

				obj.set("segments", data.segments);
				obj.set("amount", data.amount);

				this.lineDS.data([]);
				this.lineDS.add({
					transaction_id 		: obj.id,
					account_id 			: "",
					description 		: "",
					reference_no 		: data.number,
					amount 	 			: data.amount,
					rate				: data.rate,
					locale				: data.locale
				});
			 	this.set("total", kendo.toString(data.amount, "c", data.locale));
		 	}
		},
		//Recurring
		loadRecurring 		: function(){
			var obj = this.get("obj");

			this.recurringDS.filter([
				{ field:"type", value:obj.type },
				{ field:"contact_id", value:obj.contact_id },
				{ field:"is_recurring", value:1 }
			]);
		},		
		applyRecurring 		: function(){
			var self = this, obj = this.get("obj");
			
			if(obj.recurring_id){
				var data = this.recurringDS.get(obj.recurring_id);

				obj.set("employee_id", data.employee_id);//Sale Rep
				obj.set("segments", data.segments);
				obj.set("rate", data.rate);
				obj.set("locale", data.locale);
				obj.set("memo", data.memo);
				obj.set("memo2", data.memo2);
				obj.set("bill_to", data.bill_to);
				obj.set("ship_to", data.ship_to);

				this.recurringLineDS.query({
					filter: { field:"transaction_id", value:data.id },
					page: 1,
					pageSize: 100
				}).then(function(){
					var view = self.recurringLineDS.view();
					self.lineDS.data([]);

					$.each(view, function(index, value){
						self.lineDS.add({
							transaction_id 		: obj.id,
							tax_item_id 		: value.tax_item_id,
							item_id 			: value.item_id,
							description 		: value.description,
							quantity 			: value.quantity,
							price 				: value.price,
							amount 	 			: value.amount,
							rate				: value.rate,
							locale				: value.locale,
							
							item_prices 		: value.item_prices
						});
					});

					self.changes();
				});
			}else{
				this.addEmpty();
			}
		},
		frequencyChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.frequency) {
			    case "Daily":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", false);
			       
			        break;
			    case "Weekly":
			        this.set("showMonthOption", false);
			        this.set("showMonth", false);
			        this.set("showWeek", true);
			        this.set("showDay", false);

			        break;
			    case "Monthly":
			        this.set("showMonthOption", true);
			        this.set("showMonth", false);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    case "Annually":
			        this.set("showMonthOption", false);
			        this.set("showMonth", true);
			        this.set("showWeek", false);
			        this.set("showDay", true);

			        break;
			    default:
			        //Default here..
			}
		},
		monthOptionChanges 	: function(){
			var obj = this.get("obj");

			switch(obj.month_option) {
			    case "Day":
			        this.set("showWeek", false);
			        this.set("showDay", true);
			       
			        break;
			    default:
			        this.set("showWeek", true);
			        this.set("showDay", false);
			}
		},
		validateRecurring  	: function(){
			var result = true, obj = this.get("obj");
			
			if(obj.recurring_name!==""){
				//Check existing name
				$.each(this.recurringDS.data(), function(index, value){
					if(value.recurring_name==obj.recurring_name){
						result = false;
						alert("This is name is taken.");

						return false;
					}
				});
			}
			else{
				result = false;
				alert("Recurring name is required.");
			}

			return result;
		},
		addNewRecurring 	: function(){
			var self = this, obj = this.get("obj");

			this.recurringDS.add({
				contact_id 				: obj.contact_id,
				transaction_template_id : obj.transaction_template_id,
				user_id 				: this.get("user_id"),
				employee_id 			: obj.employee_id,
			   	type					: obj.type,
			   	amount					: obj.amount,
			   	discount 				: obj.discount,
			   	tax 					: obj.tax,
			   	rate					: obj.rate,
			   	locale 					: obj.locale,
			   	bill_to 				: obj.bill_to,
			   	ship_to 				: obj.ship_to,
			   	memo 					: obj.memo,
			   	memo2 					: obj.memo2,
			   	segments 				: obj.segments,
			   	recurring_name 			: obj.recurring_name,
			   	start_date 				: obj.start_date,
			   	frequency 				: obj.frequency,
			   	month_option 			: obj.month_option,
			   	interval 				: obj.interval,
			   	day 					: obj.day,
			   	week 					: obj.week,
			   	month 					: obj.month,
			   	is_recurring 			: 1
	    	});

	    	$.each(this.lineDS.data(), function(index, value){
	    		self.recurringLineDS.add({
					transaction_id 		: 0,
					measurement_id 		: value.measurement_id,
					tax_item_id 		: value.tax_item_id,
					item_id 			: value.item_id,
					description 		: value.description,
					quantity 			: value.quantity,
					price 				: value.price,
					amount 	 			: value.amount,
					discount 			: value.discount,
					rate				: value.rate,
					locale				: value.locale
				});
	    	});
		},
		recurringSync 		: function(){
	    	var dfd = $.Deferred();	        

	    	this.recurringDS.sync();
		    this.recurringDS.bind("requestEnd", function(e){
		    	if(e.response){
					dfd.resolve(e.response.results);
				}
		    });
		    this.recurringDS.bind("error", function(e){
				dfd.reject(e.errorThrown);
		    });

		    return dfd;
	    }
	});

	banhji.invoiceCustom =  kendo.observable({
    	lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "transaction_templates"),		
		txnFormDS			: dataStore(apiUrl + "transaction_forms"),
		obj 				: null,
		objForm	 			: null,
		formTitle 			: "Invoice",
		formType			: "Invoice",
		company 			: banhji.institute,
		selectCustom		: "water_mg",
		isEdit 				: false,
		user_id				: banhji.source.user_id,
		pageLoad 			: function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{	
				var obj = this.get("obj"), self = this;
				banhji.view.invoiceCustom.showIn('#invFormContent', banhji.view.invoiceForm1);	
				this.addRowLineDS();
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
					this.txnFormDS.query({    			
						filter: { field:"type", value: "Invoice" },
						page: 1,
						take: 100
					}).then(function(e){
						var view = self.txnFormDS.view();
						var obj = self.get("obj");
						obj.set("type", view[0].type);
						obj.set("title", view[0].title);
						obj.set("note", view[0].note);
						
					});	
				}	
				var name = banhji.invoiceForm.get("obj");
				name.set("title", this.formTitle);
			}
		},
		addRowLineDS			: function(e){
			banhji.invoiceForm.lineDS.data([]);
			for (var i = 0; i < 15; i++) { 
				banhji.invoiceForm.lineDS.add({				
					id			: i,
					description : '',
					quantity 	: '',
					price 		: '',
					amount 		: '',
					description : '',
					locale : '',
					item_prices : [],
					item_id 	: ''
		    	});	
		    }
		},
		activeInvoiceTmp		: function(e){
			var Active;
			switch(e) {
				case 1: Active = banhji.view.invoiceForm1; break;
				case 2: Active = banhji.view.invoiceForm2; break;
				case 32: Active = banhji.view.invoiceForm32; break;
			}
			banhji.view.invoiceCustom.showIn('#invFormContent', Active);
		},
		colorCC 			: function(e){
			var Color = e.value;
			var tS = '';
			if(Color == '#000000' || Color =='#1f497d') tS = '#fff'; 
			else tS = '#333';
			$('.main-color').css({'background-color': e.value, 'color': tS});
			$('.main-color div').css({'color': tS});
			$('.main-color p').css({'color': tS});
			$('.main-color span').css({'color': tS});
			$('.main-color th').css({'color': tS});
		},
		selectedForm 		: function(e){
			var Index = e.data.id;
			this.activeInvoiceTmp(Index);
			this.addRowLineDS();
			var data = e.data, obj = this.get("obj");
			obj.set("transaction_form_id", data.id);
		},	    			
		loadObj 			: function(id){
			var self = this;	
			this.dataSource.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.dataSource.view();
				self.set("obj", view[0]);
				
				banhji.invoiceForm.set("obj", view[0]);	
				var Index = parseInt(view[0].transaction_form_id);
				self.activeInvoiceTmp(Index);
				self.addRowLineDS();

				self.txnFormDS.filter({ field:"type", value: "Invoice" });
			});	
		},		
		addEmpty 		 	: function(){			
			this.dataSource.data([]);		
			this.set("obj", null);		
			this.set("isEdit", false);		
			this.dataSource.insert(0,{				
				user_id			: banhji.source.user_id,
				transaction_form_id : 0,
				type 			: "Invoice",
				name 			: "",
				title 			: "Invoice",
				note 			: "",
				color  			: null,
				moduls 			: "water_mg",
				item_id 		: '',
				status 			: 0
	    	});		
			var obj = this.dataSource.at(0);			
			this.set("obj", obj);		
		},		    
		save 				: function(){				
	    	var self = this;
			if(this.dataSource.data().length > 0) {
				this.dataSource.sync();
				this.dataSource.bind("requestEnd", function(e){
					if(e.type != 'read') {
						if(e.response){				
				    		$("#ntf1").data("kendoNotification").success("Successfully!");
				    		//self.dataSource.addNew();
							banhji.router.navigate("/setting");
							banhji.setting.txnTemplateDS.fetch();
						}
					}				    					  				
			    });
			    this.dataSource.bind("error", function(e){		    		    	
					$("#ntf1").data("kendoNotification").error("Error!"); 			
			    });
			}
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();		
			window.history.back();
		}
	});
	banhji.invoiceForm =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "transactions"),
		txnTemplateDS		: dataStore(apiUrl + "transaction_templates"),		
		obj 				: {title: "Quotation", issued_date : "<?php echo date('d/M/Y'); ?>", number : "QO123456", type : "Quote", amount: "$500,000.00", contact: []},
		company 			: banhji.institute,		
		lineDS 				: dataStore(apiUrl + "transactions/line"),
		user_id				: banhji.source.user_id,
		selectForm 			: null,
		pageLoad 			: function(id, is_recurring){
			if(id){				
				this.loadObj(id);
			}
		},	 
		printGrid			: function() {
			var obj = this.get('obj'), colorM, ts;
			if(obj.color == null){
				colorM = "#10253f";
			}else{
				colorM = obj.color;
			}
			if(obj.color == '#000000' || obj.color =='#1f497d' || obj.color == null){ 
				ts = 'color: #fff!important;';
			} else { ts = 'color: #333;'; }
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=800, height=900'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="<?php echo base_url(); ?>assets/invoice/invoice.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            'html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: portrait; margin:0mm;margin-top: 1mm; }'+
		            	'.inv1 .main-color {' +
		            		'background-color: '+colorM+'!important; ' + ts +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'} ' +
		            	'.inv1 .light-blue-td { ' +
		            		'background-color: #c6d9f1!important;' +
		            		'text-align: left;' +
		            		'padding-left: 5px;' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}' +
		            	'.inv1 thead tr {'+
		            		'background-color: rgb(242, 242, 242)!important;'+
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}'+
		            	'.pcg .mid-title div {' + ts + '}' +
		            	'.pcg .mid-header {' +
		            		'background-color: #dce6f2!important; ' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}'+
		            	'.inv1 span.total-amount { ' +
		            		'color:#fff!important;' +
		            	'}</style>' +
		            '</head>' +
		            '<body>';
		    var htmlEnd =
		            '</body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	//win.close();
		    },2000);
		},
		activeInvoiceTmp		: function(e){
			var Active;
			switch(e) {
				case 1: Active = banhji.view.invoiceForm1; break;
				case 2: Active = banhji.view.invoiceForm2; break;
				//case 3: Active = banhji.view.invoiceForm3; break;
				//case 4: Active = banhji.view.invoiceForm4; break;
				//case 5: Active = banhji.view.invoiceForm5; break;
				case 6: Active = banhji.view.invoiceForm6; break;
				case 7: Active = banhji.view.invoiceForm7; break;
				case 8: Active = banhji.view.invoiceForm8; break;
				case 9: Active = banhji.view.invoiceForm9; break;
				case 10: Active = banhji.view.invoiceForm10; break;
				case 11: Active = banhji.view.invoiceForm11; break;
				case 12: Active = banhji.view.invoiceForm12; break;
				case 13: Active = banhji.view.invoiceForm13; break;
				case 14: Active = banhji.view.invoiceForm31; break;
				case 15: Active = banhji.view.invoiceForm15; break;
				case 16: Active = banhji.view.invoiceForm25; break;
				case 17: Active = banhji.view.invoiceForm17; break;
				case 18: Active = banhji.view.invoiceForm18; break;
				case 19: Active = banhji.view.invoiceForm19; break;
				case 20: Active = banhji.view.invoiceForm20; break;
				case 21: Active = banhji.view.invoiceForm21; break;
				case 22: Active = banhji.view.invoiceForm22; break;
				case 23: Active = banhji.view.invoiceForm28; break;
				case 24: Active = banhji.view.invoiceForm29; break;
				case 25: Active = banhji.view.invoiceForm35; break;
				case 26: Active = banhji.view.invoiceForm39; break;
				case 27: Active = banhji.view.invoiceForm19; break;
				case 28: Active = banhji.view.invoiceForm25; break;
				case 29: Active = banhji.view.invoiceForm26; break;
				case 30: Active = banhji.view.invoiceForm25; break;
				case 31: Active = banhji.view.invoiceForm25; break;
				case 32: Active = banhji.view.invoiceForm27; break;
				case 33: Active = banhji.view.invoiceForm30; break;
				case 34: Active = banhji.view.invoiceForm32; break;
				case 35: Active = banhji.view.invoiceForm33; break;
				case 36: Active = banhji.view.invoiceForm34; break;
				case 37: Active = banhji.view.invoiceForm36; break;
				case 38: Active = banhji.view.invoiceForm37; break;
				case 39: Active = banhji.view.invoiceForm38; break;
				case 40: Active = banhji.view.invoiceForm40; break;
				case 41: Active = banhji.view.invoiceForm41; break;
				case 42: Active = banhji.view.invoiceForm42; break;
			}
			banhji.view.invoiceForm.showIn('#invFormContent', Active);
		},
		loadObj 			: function(id){
			var self = this;				
			this.dataSource.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.dataSource.view();	
				view[0].set("sub_total", kendo.toString(view[0].sub_total, "c", view[0].locale));	
				view[0].set("tax", kendo.toString(view[0].tax, "c", view[0].locale));
				view[0].set("amount", kendo.toString(view[0].amount, "c", view[0].locale));
				view[0].set("discount", kendo.toString(view[0].discount, "c", view[0].locale));	
				view[0].set("deposit", kendo.toString(view[0].deposit, "c", view[0].locale));	
				view[0].set("amount_due", kendo.toString(view[0].amount_due, "c", view[0].locale));				
				self.set("obj", view[0]);
				self.loadObjTemplate(view[0].transaction_template_id, id);		
			});	
		},
		loadObjTemplate 		: function(id, transaction_id){
			var self = this, obj = this.get('obj');			
			this.txnTemplateDS.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.txnTemplateDS.view(), Index = parseInt(view[0].transaction_form_id), Active;
				obj.set("color", view[0].color);
				obj.set("title", view[0].title);
				self.activeInvoiceTmp(Index);
				self.lineDS.filter({ field:"transaction_id", value: transaction_id });
				setTimeout(function(){ 	
					var CountItemsRow = parseInt(self.lineDS.data().length); 
					var TotalRow = 15 - CountItemsRow;
					if(TotalRow > 0){
						for (var i = 1; i < TotalRow; i++) { 
							self.lineDS.add({				
								id			: '',
								description : '',
								quantity 	: '',
								price 		: '',
								amount 		: '',
								description : '',
								locale 		: '',
								item_prices : [],
								item_id 	: ''
					    	});	
					    }
					    $("#loading-inv").remove();
					}
				},6000);
			});
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();		
			window.history.back();
		}
	});

	// Invoice
	banhji.invoice = kendo.observable({
		makes 	: new kendo.data.DataSource({
	      transport: {
	        read  : {
	          url: baseUrl + 'api/winvoices/make',
	          type: "GET",
	          dataType: 'json'
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
	      pageSize: 100
	    }),
		dataSource 	: new kendo.data.DataSource({
	      transport: {
	        read  : {
	          url: baseUrl + 'api/winvoices',
	          type: "GET",
	          dataType: 'json'
	        },
	        create  : {
	          url: baseUrl + 'api/winvoices',
	          type: "POST",
	          dataType: 'json'
	        },
	        destroy  : {
	          url: baseUrl + 'api/winvoices',
	          type: "DELETE",
	          dataType: 'json'
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
	      pageSize: 100
	    }),
		remove 		: function(e) {
			this.dataSource.remove(e.data);
		},
		queryReading: function() {
			var dfd = $.Deferred();
			return this.makes.query({
				filter: {field: '', value: ''}
			});
		},
		save 		: function() {
			var that = this, dfd = $.Deferred();
			this.dataSource.sync();
			this.dataSource.bind('requestEnd', function(e){
				if(e.type != 'read' && e.response.results) {
					dfd.resolve(e.response.results);
				} else {
					dfd.reject(e.response);
				}
			});
			this.dataSource.bind('error', function(e){
				dfd.reject(e.status);
			});
			return dfd.promise();
		}
	});
	/* views and layout */
	banhji.view = {
		layout 		: new kendo.Layout('#layout', {model: banhji.Layout}),
		blank		: new kendo.View('<div></div>'),		
		index  		: new kendo.Layout("#index", {model: banhji.index}),		
		menu 		: new kendo.Layout('#menu-tmpl', {model: banhji.userManagement}),
		searchAdvanced: new kendo.Layout("#searchAdvanced", {model: banhji.searchAdvanced}),
		//Water
		setting: new kendo.Layout("#setting", {model: banhji.setting}),
		waterCenter: new kendo.Layout("#waterCenter", {model: banhji.waterCenter}),
		waterActivateUser: new kendo.Layout("#waterActivateUser", {model: banhji.waterActivateUser}),
		meter: new kendo.Layout("#waterAddMeter", {model: banhji.meter}),
		ActivateMeter: new kendo.Layout("#ActivateMeter", {model: banhji.ActivateMeter}),
		plan: new kendo.Layout("#plan", {model: banhji.plan}),
		reading: new kendo.Layout("#Reading", {model: banhji.reading}),
		EditReading: new kendo.Layout("#EditReading", {model: banhji.EditReading}),
		customerDeposit: new kendo.Layout("#customerDeposit", {model: banhji.customerDeposit}),
		addLicense: new kendo.Layout("#addLicense", {model: banhji.addLicense}),
		waterCenterContent: new kendo.Layout("#waterCenter-meter-tmpl", {model: banhji.waterCenter}),
		waterTransactionContent: new kendo.Layout("#waterCenter-transaction-tmpl", {model: banhji.waterCenter}),
		addAccountingprefix: new kendo.Layout("#addAccountingprefix", {model: banhji.addAccountingprefix}),

		waterImport: new kendo.Layout("#waterImport", {model: banhji.waterImport}),
		runBill: new kendo.Layout("#runBill", {model: banhji.runBill}),

		//custom form
		invoiceCustom: new kendo.Layout("#invoiceCustom", {model: banhji.invoiceCustom}),
		invoiceForm: new kendo.Layout("#invoiceForm", {model: banhji.invoiceForm}),
		invoiceForm1: new kendo.Layout("#invoiceForm1", {model: banhji.invoiceForm}),
		invoiceForm2: new kendo.Layout("#invoiceForm2", {model: banhji.invoiceForm}),
		invoiceForm32: new kendo.Layout("#invoiceForm32", {model: banhji.invoiceForm}),

		//Menu
		accountingMenu: new kendo.View("#accountingMenu", {model: langVM}),
		employeeMenu: new kendo.View("#employeeMenu", {model: langVM}),
		vendorMenu: new kendo.View("#vendorMenu", {model: langVM}),
		customerMenu: new kendo.View("#customerMenu", {model: langVM}),
		cashMenu: new kendo.View("#cashMenu", {model: langVM}),
		waterMenu: new kendo.View("#waterMenu", {model: langVM}),
		inventoryMenu: new kendo.View("#inventoryMenu", {model: langVM}),
		saleTaxMenu: new kendo.View("#saleTaxMenu", {model: langVM}),
		saleMenu: new kendo.View("#saleMenu", {model: langVM}),

		wDashBoard: new kendo.View("#wDashBoard", {model: wDashBoard}),
		customer: new kendo.Layout("#customer", {model: banhji.customer}),	
	};
	/* views and layout */
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
		banhji.view.layout.showIn('#content', banhji.view.wDashBoard);
		//banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		// $('#main-top-navigation').append('<li><a href="\#">Home</a></li>');
		// $('#current-section').text("");
		// $("#secondary-menu").html("");
		banhji.index.getLogo();
		banhji.index.pageLoad();
	});
	banhji.router.route('/setting', function(){
		banhji.view.layout.showIn("#content", banhji.view.setting);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		
		var vm = banhji.setting;

		banhji.userManagement.addMultiTask("Setting","setting",null);

		if(banhji.pageLoaded["setting"]==undefined){
			banhji.pageLoaded["setting"] = true;
		}

		vm.pageLoad();
	});
	banhji.router.route("/search_advanced", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{			
			var vm = banhji.searchAdvanced;
						
			banhji.view.layout.showIn("#content", banhji.view.searchAdvanced);
			
			if(banhji.pageLoaded["search_advanced"]==undefined){
				banhji.pageLoaded["search_advanced"] = true;
		         
		        vm.contactTypeDS.read();	
			}

			vm.pageLoad();			
		}
	});	

	/*************************
	*   Water Section   *
	**************************/
	banhji.router.route("/center(/:id)", function(id){		
		banhji.view.layout.showIn("#content", banhji.view.waterCenter);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		
		var vm = banhji.waterCenter;

		banhji.userManagement.addMultiTask("Water Center","water_center",null);

		if(banhji.pageLoaded["water_center"]==undefined){
			banhji.pageLoaded["water_center"] = true;
		}

		vm.pageLoad(id);
	});
	banhji.router.route("/activate_user/:id", function(id){		
		banhji.view.layout.showIn("#content", banhji.view.waterActivateUser);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		
		var vm = banhji.waterActivateUser;

		banhji.userManagement.addMultiTask("Activate User","activate_user",null);

		if(banhji.pageLoaded["activate_user"]==undefined){
			banhji.pageLoaded["activate_user"] = true;
		}

		vm.pageLoad(id);
	});
	banhji.router.route("/meter(/:id)", function(id){		
		banhji.view.layout.showIn("#content", banhji.view.meter);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		
		var vm = banhji.meter;

		banhji.userManagement.addMultiTask("Add Meter","meter",null);

		if(banhji.pageLoaded["meter"]==undefined){
			banhji.pageLoaded["meter"] = true;
		}

		vm.pageLoad(id);
	});
	banhji.router.route("/activate_meter/:id", function(id){		
		banhji.view.layout.showIn("#content", banhji.view.ActivateMeter);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		
		var vm = banhji.ActivateMeter;

		banhji.userManagement.addMultiTask("Activate Meter","activate_meter",null);

		if(banhji.pageLoaded["activate_meter"]==undefined){
			banhji.pageLoaded["activate_meter"] = true;
		}

		vm.pageLoad(id);
	});

	banhji.router.route("/plan(/:id)", function(id){		
		banhji.view.layout.showIn("#content", banhji.view.plan);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		
		var vm = banhji.plan;

		banhji.userManagement.addMultiTask("Add Plan","plan",null);

		if(banhji.pageLoaded["plan"]==undefined){
			banhji.pageLoaded["plan"] = true;
		}
		console.log("plan");
		vm.pageLoad(id);
	});
	banhji.router.route("/add_license(/:id)", function(id){		
		
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		banhji.view.layout.showIn("#content", banhji.view.addLicense);
		

		banhji.userManagement.addMultiTask("Add Licence","Licence",null);

		if(banhji.pageLoaded["add_license"]==undefined){
			banhji.pageLoaded["add_license"] = true;
		}
		console.log("add_license");
		var vm = banhji.addLicense;
		vm.pageLoad(id);
	});
	banhji.router.route("/reading", function(){		
		banhji.view.layout.showIn("#content", banhji.view.reading);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		
		var vm = banhji.reading;

		banhji.userManagement.addMultiTask("Reading","reading",null);

		if(banhji.pageLoaded["reading"]==undefined){
			banhji.pageLoaded["reading"] = true;
		}

		vm.pageLoad();
	});
	banhji.router.route("/edit_reading", function(){		
		banhji.view.layout.showIn("#content", banhji.view.EditReading);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		
		var vm = banhji.EditReading;

		banhji.userManagement.addMultiTask("Edit Reading","Edit Reading",null);

		if(banhji.pageLoaded["edit_reading"]==undefined){
			banhji.pageLoaded["edit_reading"] = true;
		}

		vm.pageLoad();
	});

	banhji.router.route("/import", function(){		
		banhji.view.layout.showIn("#content", banhji.view.waterImport);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		
		var vm = banhji.waterImport;

		banhji.userManagement.addMultiTask("Import","import",null);

		if(banhji.pageLoaded["import"]==undefined){
			banhji.pageLoaded["import"] = true;
		}

		vm.pageLoad();
	});

	banhji.router.route("/run_bill", function(){		
		banhji.view.layout.showIn("#content", banhji.view.runBill);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		
		var vm = banhji.runBill;

		banhji.userManagement.addMultiTask("Run Bill","run_bill",null);

		if(banhji.pageLoaded["run_bill"]==undefined){
			banhji.pageLoaded["run_bill"] = true;
		}

		vm.pageLoad();
	});

	banhji.router.route("/customer_deposit(/:id)(/:is_recurring)", function(id,is_recurring){
		// banhji.accessMod.query({
		// 	filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		// }).then(function(e){
		// 	var allowed = false;
		// 	if(banhji.accessMod.data().length > 0) {
		// 		for(var i = 0; i < banhji.accessMod.data().length; i++) {
		// 			if("customer" == banhji.accessMod.data()[i].name.toLowerCase()) {
		// 				allowed = true;
		// 				break;
		// 			}
		// 		}
		// 	} 
		// 	if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.customerDeposit);
				kendo.fx($("#slide-form")).slideIn("down").play();

				var vm = banhji.customerDeposit;
				banhji.userManagement.addMultiTask("Customer Deposit","customer_deposit",vm);

				if(banhji.pageLoaded["customer_deposit"]==undefined){
					banhji.pageLoaded["customer_deposit"] = true;

			        var validator = $("#example").kendoValidator().data("kendoValidator");
			        $("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate()){
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate()){
							vm.set("saveClose", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#savePrint").click(function(e){
						e.preventDefault();
						
						if(validator.validate()){
							vm.set("savePrint", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveRecurring").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validateRecurring()){
			            	vm.set("saveRecurring", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});
				}

				vm.pageLoad(id, is_recurring);
		// 	} else {
		// 		window.location.replace(baseUrl + "admin");
		// 	}
		// });
	});
	banhji.router.route("/invoice_custom(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.invoiceCustom);
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.invoiceCustom;
			
			if(banhji.pageLoaded["invoice_custom"]==undefined){
				banhji.pageLoaded["invoice_custom"] = true;

				//Function write css to header
				function loadStyle(href){
				    // avoid duplicates
				    for(var i = 0; i < document.styleSheets.length; i++){
				        if(document.styleSheets[i].href == href){
				            return;
				        }
				    }
				    var head  = document.getElementsByTagName('head')[0];
				    var link  = document.createElement('link');
				    link.rel  = 'stylesheet';
				    link.type = 'text/css';
				    link.href = href;
				    head.appendChild(link);
				}
				var Href1 = '<?php echo base_url(); ?>assets/invoice/invoice.css';
				loadStyle(Href1);
			};
			
			vm.pageLoad(id);
		};
	});
	banhji.router.route("/invoice_form(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.invoiceForm);
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.invoiceForm;
			banhji.userManagement.addMultiTask("Customer Form","invoice_form",null);
			if(banhji.pageLoaded["invoice_form"]==undefined){
				banhji.pageLoaded["invoice_form"] = true;

				//Function write css to header
				function loadStyle(href){
				    // avoid duplicates
				    for(var i = 0; i < document.styleSheets.length; i++){
				        if(document.styleSheets[i].href == href){
				            return;
				        }
				    }
				    var head  = document.getElementsByTagName('head')[0];
				    var link  = document.createElement('link');
				    link.rel  = 'stylesheet';
				    link.type = 'text/css';
				    link.href = href;
				    head.appendChild(link);
				}
				var Href1 = '<?php echo base_url(); ?>assets/invoice/invoice.css';
				loadStyle(Href1);
			};
			
			vm.pageLoad(id);
		};
	});

	banhji.router.route("/add_accountingprefix(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.addAccountingprefix);			
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.addAccountingprefix;
			banhji.userManagement.addMultiTask("Add Accounting Prefix","add_accountingprefix",null);
			if(banhji.pageLoaded["add_accountingprefix"]==undefined){
				banhji.pageLoaded["add_accountingprefix"] = true;				        
				setTimeout(function(){
					var validator = $("#example").kendoValidator().data("kendoValidator");
					var notification = $("#notification").kendoNotification({				    
					    autoHideAfter: 5000,
					    width: 300,				    
					    height: 50
					}).data('kendoNotification');
					$("#saveNew").click(function(e){	
		        			
						e.preventDefault();
						if(validator.validate()){
			            	vm.save();		            	

			            	notification.success("Save Successful");			  
				        }else{
				        	notification.error("Warning, please review it again!");			           
				        }		            
					});
					$("#saveClose").click(function(e){				
						e.preventDefault();

						if(validator.validate()){
			            	vm.save();
			            	window.history.back();

			            	notification.success("Save Successful");			  
				        }else{
				        	notification.error("Warning, please review it again!");			           
				        }	            
					});
				},2000);
						
			};
			
			vm.pageLoad(id);		
		};
	});	
	$(function() {	
		banhji.router.start();
		banhji.source.loadData();
		//console.log($(location).attr('hash').substr(2));
	});
</script>