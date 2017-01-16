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
					<a href="#/receipt">
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
								<p style="color: #000;"><span>Active Customer</span></p>
						
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
												<span>Average Usage</span>
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
					<th><span>(m<sup>3</sup>) Sold</span></th>
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
	            <li>
	            	<a href="#tab12" data-bind="click: goBrand" class="glyphicons certificate" data-toggle="tab">
	            		<i></i><span class="strong"><span>Brand</span></span>
	            	</a>
	            </li>                        
	        </ul>
	    </div>
	    <!-- // Tabs Heading END -->

	    <div class="widget-body span9">
	        <div class="tab-content">
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
				                data-bind="source: licenseDS"></tbody>
	            	</table>
	            </div>
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
	            		<input data-bind="value: exName" type="text" placeholder="Name" style="height: 32px;"  class="span2 k-textbox k-invalid" />

	            		<input data-role="dropdownlist"
		            	   class="span2"
		            	   style="padding-right: 1px;height: 32px;" 
            			   data-option-label="(--- Acount ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="false"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: exAccount,
		                              source: exAccountDS"/>

		                <input data-role="dropdownlist"
		            	   class="span2"
		            	   style="padding-right: 1px;height: 32px;" 
            			   data-option-label="(--- Unit ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: exUnit,
		                              source: typeUnit,
		                              events: {change: unitChange}" />

		            	<input data-role="dropdownlist"
		            	   class="span2"
		            	   style="padding-right: 1px;height: 32px;" 
            			   data-option-label="(--- Currency ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="true"
		                   data-text-field="code"
		                   data-value-field="id"
		                   data-bind="value: exCurrency,
		                              source: currencyDS"/>
		            	<input data-bind="visible: priceUnit, value: exPrice" type="text" placeholder="Price" style="height: 32px;" class="span2 k-textbox k-invalid" />
		            	<input data-bind="visible: percentUnit, value: exPrice" type="text" placeholder="%" data-spinners="false" data-role="numerictextbox" max="100" min="1" style="padding:0;" class="span2 k-input k-valid" />
		            	<input data-bind="visible: meterUnit, value: exPrice" type="text" placeholder="m3" data-spinners="false" data-role="numerictextbox" max="100" min="1" style="padding:0;" class="span2 k-input k-valid" />

		            	<a class="btn btn-default glyphicons circle_plus cutype-icon" style="width: 80px;margin-left: 2px;" data-bind="click: addEx"><i></i>Add</a>
		            </div>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center"><span>Name</span></th>
	            				<th class="center"><span>Account</span></th>
	            				<th class="center"><span>Unit</span></th>
	            				<th class="center"><span>Currency</span></th>
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
		            	<input data-bind="value: tariffName" type="text" placeholder="Name" style="height: 32px;"  class="span3 k-textbox k-invalid" />
		            	<input data-role="dropdownlist"
		            	   class="span3"
		            	   style="padding-right: 1px;height: 32px;" 
            			   data-option-label="(--- Acount ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="false"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: tariffAccount,
		                              source: tariffAccDS"/>
		                <input data-role="dropdownlist"
		            	   class="span3"
		            	   style="padding-right: 1px;height: 32px;" 
            			   data-option-label="(--- Currency ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="true"
		                   data-text-field="code"
		                   data-value-field="id"
		                   data-bind="value: tariffCurrency,
		                              source: currencyDS"/>
		            	<a class="btn btn-default glyphicons circle_plus cutype-icon" style="width: 80px;margin-left: 2px;" data-bind="click: addTariff"><i></i>Add</a>
		            </div>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center" width="300"><span>Name</span></th>
	            				<th class="center" ><span>Account</span></th>
	            				<th class="center"><span>Currency</span></th>
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
	            		<input data-bind="value: depositName" type="text" placeholder="Name" style="height: 32px;"  class="span2 k-textbox k-invalid" />
		            	<input data-role="dropdownlist"
		            	   class="span2"
		            	   style="padding-right: 1px;height: 32px;" 
            			   data-option-label="(--- Acount ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="false"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: depositAccount,
		                              source: depositAccDS"/>

		                <input data-role="dropdownlist"
		            	   class="span2"
		            	   style="padding-right: 1px;height: 32px;" 
            			   data-option-label="(--- Currency ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="true"
		                   data-text-field="code"
		                   data-value-field="id"
		                   data-bind="value: depositCurrency,
		                              source: currencyDS"/>

		            	<input data-bind="value: depositPrice" type="text" placeholder="Price" style="height: 32px;" class="span2 k-textbox k-invalid" />

		            	<a class="btn btn-default glyphicons circle_plus cutype-icon" style="width: 80px;margin-left: 2px;" data-bind="click: addDeposit"><i></i>Add</a>
		            </div>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center"><span>Name</span></th>
	            				<th class="center"><span>Account</span></th>
	            				<th class="center"><span>Currency</span></th>
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
	            		<input data-bind="value: serviceName" type="text" placeholder="Name" style="height: 32px;"  class="span2 k-textbox k-invalid" />

		            	<input data-role="dropdownlist"
		            	   class="span2"
		            	   style="padding-right: 1px;height: 32px;" 
            			   data-option-label="(--- Acount ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="false"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: serviceAccount,
		                              source: tariffAccDS"/>
		                <input data-role="dropdownlist"
		            	   class="span2"
		            	   style="padding-right: 1px;height: 32px;" 
            			   data-option-label="(--- Currency ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="true"
		                   data-text-field="code"
		                   data-value-field="id"
		                   data-bind="value: serviceCurrency,
		                              source: currencyDS"/>

		            	<input data-bind="value: servicePrice" type="text" placeholder="Price" style="height: 32px;" class="span2 k-textbox k-invalid" />

		            	<a class="btn btn-default glyphicons circle_plus cutype-icon" style="width: 80px;margin-left: 2px;" data-bind="click: addService"><i></i>Add</a>
		            </div>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center"><span>Name</span></th>
	            				<th class="center"><span>Account</span></th>
	            				<th class="center"><span>Currency</span></th>
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
	            		<input data-bind="value: maintenanceName" type="text" placeholder="Name" style="height: 32px;"  class="span2 k-textbox k-invalid" />
		            	<input data-role="dropdownlist"
		            	   class="span2"
		            	   style="padding-right: 1px;height: 32px;" 
            			   data-option-label="(--- Acount ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="false"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: maintenanceAccount,
		                              source: tariffAccDS"/>
		                <input data-role="dropdownlist"
		            	   class="span2"
		            	   style="padding-right: 1px;height: 32px;" 
            			   data-option-label="(--- Currency ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="true"
		                   data-text-field="code"
		                   data-value-field="id"
		                   data-bind="value: maintenanceCurrency,
		                              source: currencyDS"/>
		            	<input data-bind="value: maintenancePrice" type="text" placeholder="Price" style="height: 32px;" class="span2 k-textbox k-invalid" />

		            	<a class="btn btn-default glyphicons circle_plus cutype-icon" style="width: 80px;margin-left: 2px;" data-bind="click: addMaintenance"><i></i>Add</a>
		            </div>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center"><span>Name</span></th>
	            				<th class="center"><span>Account</span></th>
	            				<th class="center"><span>Currency</span></th>
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
	            				<th class="center"><span>Currency</span></th>
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
	            <div class="tab-pane" id="tab12">
	            	<div style="clear: both;margin-bottom: 10px;">
		            	<input data-bind="value: brandCode" type="text" placeholder="Code ..." style="height: 32px;"  class="span3 k-textbox k-invalid" />
		            	<input data-bind="value: brandName" type="text" placeholder="Name ..." style="height: 32px;"  class="span3 k-textbox k-invalid" />
		            	<input data-bind="value: brandAbbr" type="text" placeholder="Abbr ..." style="height: 32px;" class="span3 k-textbox k-invalid" />
		            	<a class="btn btn-default glyphicons circle_plus cutype-icon" style="width: 80px;margin-left: 2px;" data-bind="click: addBrand"><i></i>Add</a>
		            </div>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center"><span>Code</span></th>
	            				<th class="center"><span>Name</span></th>
	            				<th class="center"><span>Abbr</span></th>
	            				<th class="center">Action</th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"		
			                data-template="brandSetting-template"
			                data-edit-template="brand-edit-template"
			                data-auto-bind="true"
			                data-bind="source: brandDS"></tbody>
	            	</table>
	            </div>
	        </div>
	    </div>
	    <div id="ntf1" data-role="notification"></div>
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
   		<td>
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
   		<td>
    		#= account.name#
   		</td>
   		<td align="center">
    		#= unit#
   		</td>
   		<td align="center">
    		#= _currency.code#
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
                   data-value-primitive="false"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: account,
                              source: exAccountDS" />
        </td> 
        <td>        	
        	<input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="false"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: unit,
                              source: typeUnit" />
        </td>    
        <td>
        	<input data-role="dropdownlist"
            	   style="padding-right: 1px;height: 32px;" 
    			   data-auto-bind="false"			                   
                   data-value-primitive="true"
                   data-text-field="code"
                   data-value-field="id"
                   data-bind="value: currency,
                              source: currencyDS"/>
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
   		<td>
    		#= account.name#
   		</td>
   		<td>
    		#= _currency.code#
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
        <td>        	
        	<input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="false"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: account,
                              source: tariffAccDS" />
        </td>
        <td>
        	<input data-role="dropdownlist"
            	   style="padding-right: 1px;height: 32px;" 
    			   data-auto-bind="false"			                   
                   data-value-primitive="true"
                   data-text-field="code"
                   data-value-field="id"
                   data-bind="value: currency,
                              source: currencyDS"/>
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
   		<td align="left">
    		#= account.name#
   		</td>
   		<td>
   			#= _currency.code #
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
			<input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="false"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: account,
                              source: depositAccDS" />
        </td>    
        <td>
        	<input data-role="dropdownlist"
            	   style="padding-right: 1px;height: 32px;" 
    			   data-auto-bind="false"			                   
                   data-value-primitive="true"
                   data-text-field="code"
                   data-value-field="id"
                   data-bind="value: currency,
                              source: currencyDS"/>
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
   		<td align="left">
    		#= account.name#
   		</td>
   		<td>
   			#= _currency.code #
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
			<input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="false"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: account,
                              source: tariffAccDS" />
        </td>   
        <td>
        	<input data-role="dropdownlist"
            	   style="padding-right: 1px;height: 32px;" 
    			   data-auto-bind="false"			                   
                   data-value-primitive="true"
                   data-text-field="code"
                   data-value-field="id"
                   data-bind="value: currency,
                              source: currencyDS"/>
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
    		#= account.name#
   		</td>
   		<td>
   			#= _currency.code #
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
			<input style="width: 100%;" data-role="dropdownlist"      
                   data-value-primitive="false"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: account,
                              source: tariffAccDS" />
        </td>  
        <td>
        	<input data-role="dropdownlist"
            	   style="padding-right: 1px;height: 32px;" 
    			   data-auto-bind="false"			                   
                   data-value-primitive="true"
                   data-text-field="code"
                   data-value-field="id"
                   data-bind="value: currency,
                              source: currencyDS"/>
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
    	<td>
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
<script id="brandSetting-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		#= code#
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
<script id="brand-edit-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
            <input type="text" class="k-textbox" data-bind="value:code" name="ProductName" required="required" validationMessage="required" />
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
		<td>#= _currency.code #</td>
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
											<td style="width: 5%"><span >Currency</span></td>
											<td>
												<input data-role="dropdownlist"
								            	   style="width: 100%;padding-right: 1px;height: 32px;" 
						            			   data-option-label="(--- Currency ---)"
						            			   data-auto-bind="false"			                   
								                   data-value-primitive="true"
								                   data-text-field="code"
								                   data-value-field="id"
								                   data-bind="value: current.currency,
								                            source: currencyDS,
								                            events: {change: currencyChange}"/>
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
								<button style="float: left" class="btn btn-inverse" data-bind="click: addItem">
									<i class="icon-plus icon-white"></i>
								</button>
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
	<span style="width:45%; float: left">
		#=name#
	</span>
	<span style="width:35%; text-align: center; text-transform: capitalize;">#=type#</span>
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
															<td><span data-bind="">Location</span></td>
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
		<div class="row-fluid">								
			<div class="box-generic" style="margin-bottom: 0; padding-bottom: 0;">
			    <!-- //Tabs Heading -->
			    <div class="tabsbar tabsbar-1">
			        <ul class="row-fluid row-merge">	
			        	<li class="span2 glyphicons charts active">
			            	<a href="#metertab1" data-toggle="tab"><i></i> <span><span >Monthly Sale</span></span></a>
			            </li>					            
			            <li class="span2 glyphicons usd">
			            	<a href="#metertab2" data-toggle="tab"><i></i> <span><span >Water Sale</span></span></a>
			            </li>								            
			            <li class="span2 glyphicons qrcode" style="width: 21%;">
			            	<a href="#metertab3" data-toggle="tab"><i></i> <span><span >Reading</span></span></a>
			            </li>
			            <li class="span2 glyphicons show_lines">
			            	<a href="#metertab4" data-toggle="tab"><i></i> <span><span ></span>Installment Schedule</span></a>
			            </li>						            					            
			        </ul>
			    </div>
			    <!-- // Tabs Heading END -->

			    <div class="tab-content">
			    	<!-- //GENERAL INFO -->
			        <div class="tab-pane active" id="metertab1">
				        <div data-role="chart"
		                 data-legend="{ position: 'top' }"
		                 data-series-defaults="{ type: 'column' }"
		                 data-tooltip='{
		                    visible: true,
		                    format: "{0}%",
		                    template: "#= series.name #: #= kendo.toString(value, &#39;c&#39;, banhji.locale) #"
		                 }'                 
		                 data-series="[
		                                 { field: 'amount', name: 'Amount', categoryField:'month_of', color: '#236DA4' },
		                                 { field: 'consumption', name: 'Usage', categoryField:'month_of', color: '#A6C9E3' }
		                             ]"
		                 data-auto-bind="false"	                             
		                 data-bind="source: invoiceVM.dataSource"
		                 style="height: 250px;" ></div> 
		        	</div>
			    	<!-- //GENERAL INFO -->
			        <div class="tab-pane" id="metertab2">
			        	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
				        	<thead>
					            <tr>			                
					                <th width="140">Month</th>
					                <th width="50">Ref.</th>
					                <th width="100">m<sup>3</sup></th>    
					                <th width="50">Amount</th>
					                <th width="50">Action</th>     
					            </tr> 
					        </thead>
					        <tbody data-role="listview" data-bind="source: invoiceVM.dataSource" data-template="water-sale-list-template" data-auto-bind=false>
					        </tbody>
					    </table>
		        	</div>
			        <!-- //GENERAL INFO END -->

			        <!-- //ACCOUNTING -->
			        <div class="tab-pane" id="metertab3">
			        	<h2>Add Single Reading</h2>
			        	<div class="row-fluid" style="padding: 15px 0;overflow:hidden;">
			        		<div class="span10">
			        			<div class="span3">	
									<div class="control-group">								
										<label ><span >Month Of</span></label>
							            <input type="text" 
						                	style="width: 100%;" 
						                	data-role="datepicker"
						                	data-format="MM-yyyy"
						                	data-start="year" 
							  				data-depth="year" 
						                	placeholder="Moth of ..." 
								           	data-bind="value: readingVM.monthOfSR" />
									</div>
								</div>
								<div class="span3">	
									<div class="control-group">								
										<label ><span >Meter Number</span></label>
						        		<p class="k-input k-textbox" 
						        			style="width:100%"
						        			data-bind="text: readingVM.NumberSR"></p>
						        	</div>
						        </div>
						        <div class="span3">	
									<div class="control-group">								
										<label ><span >Previous</span></label>
						        		<input type="text" 
						        			class="k-input k-textbox" 
						        			placeholder="Previous" 
						        			style="width:100%;border:1px solid #ccc;"
						        			data-bind="value: readingVM.previousSR" />
						        	</div>
						       	</div>
						       	<div class="span3">	
									<div class="control-group">								
										<label ><span >Current</span></label>
						        		<input type="text" 
						        			class="k-input k-textbox" 
						        			placeholder="Current" 
						        			style="width:100%;border:1px solid #ccc;"
						        			data-bind="value: readingVM.currentSR" />
						        	</div>
						        </div>
				        	</div>
				        	<div class="span2">
				        		<span id="saveNew" style="width: 80px!important;margin:0;top: 22px;" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="click: readingVM.addSingleReading"><i></i> <span>Add</span></span>
				        	</div>
			        	</div>
			        	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
				        	<thead>
					            <tr>			                
					                <th width="140">Month</th>
					                <th width="50">Meter Number</th>
					                <th width="50">Previous</th>
					                <th width="50">Current</th>
					                <th width="100">m<sup>3</sup></th> 					                
					                <th width="50">Action</th>     
					            </tr> 
					        </thead>
					        <tbody data-role="listview" data-bind="source: readingVM.dataSource" data-auto-bind=false data-template="meter-reading-list-tmpl" data-edit-template="meter-reading-list-edit-tmpl">
					        </tbody>
					    </table>
		        	</div>
			        <!-- //ACCOUNTING END -->						       

			        <!-- //CONTACT PERSON -->
			        <div class="tab-pane" id="metertab4">
			        	<table>
			        		<tbody data-role="listview" data-bind="source: installmentVM.dataSource" data-template="installment-list-template" data-auto-bind=false>
			        		</tbody>
			        	</table>
		        	</div>
			        <!-- //CONTACT PERSON END -->
			    </div>
			</div>
		</div>

	</div>

	<div class="innerLR innerT">			
		<div id="wsale-graph" style="height: 200px;"></div>
	</div>
	<!-- <div id="meterClick">
	    <tr>    	  	
	    	<td>Graph Meter</td>
	    </tr>
	</div> -->
	<div id="ntf1" data-role="notification"></div>
</script>
<script id="water-sale-list-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
			#=month_of#	
		</td>
		<td>
			#=number#	
		</td>
		<td>
			#=items[0].consumption#	
		</td>
		<td>
			#=amount#	
		</td>
		<td>
		</td>
	</tr>
</script>
<script id="installment-list-template" type="text/x-kendo-tmpl">
	<tr>
		<td valign="top">
			Payment Schedule
		</td>
		<td>
			<ul style="list-style: none;">
				# for(var i= 0; i < schedule.length; i++) {#
					<li>
						#=schedule[i].date#
						#=schedule[i].amount#
					</li>
				#}#
			</ul>
		</td>
	</tr>
</script>
<script id="meter-reading-list-tmpl" type="text/x-kendo-tmpl">
	kendo.culture("km-KH");
	<tr>
		<td>
			#:kendo.toString(new Date(month_of), "MMMM")#
		</td>
		<td>
			#=meter_number#
		</td>
		<td>
			#=previous#
		</td>
		<td>
			#=current#
		</td>
		<td>
			#=current-previous#
		</td>
		<td>
			# if(!invoiced || banhji.waterCenter.readingVM.dataSource.indexOf(data) == 0) {#
				<a class="btn-action glyphicons pencil btn-success k-edit-button" ><i></i></a>
			#}#
		</td>
	</tr>
</script>
<script id="meter-reading-list-edit-tmpl" type="text/x-kendo-tmpl">
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
	            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
	            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
	        </div>
		</td>
	</tr>
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
			        <h2 style="padding:0 15px;">Name : <strong data-bind="text: contactOBJ.name"></strong></h2><br>
			        <div class="span6 row-fluid well" style="overflow: hidden;">
			        	<div class="control-group">										
							<label for="ddlContactType"><span>License</span> <span style="color:red">*</span></label>
				        	<input data-role="dropdownlist"
			            	   class="span2 row-fluid"
			            	   style="width: 100%;padding-left: 0" 
	            			   data-option-label="(--- Licence ---)"
	            			   data-auto-bind="false"			                   
			                   data-value-primitive="true"
			                   data-text-field="name"
			                   data-value-field="id"
			                   data-bind="value: obj.branch_id,
			                              source: licenseDS,
			                              events: {change : licenseChange}"/>
			            </div>
			            <div class="control-group">										
							<label for="ddlContactType"><span>Bloc</span></label>
			                <input data-role="dropdownlist"
			            	   class="span2 row-fluid"
			            	   style="width: 100%;padding-left: 0" 
	            			   data-option-label="(--- Bloc ---)"
	            			   data-auto-bind="false"			                   
			                   data-value-primitive="true"
			                   data-text-field="name"
			                   data-value-field="id"
			                   data-bind="value: obj.location_id,
			                              source: blocDS,
			                              events: {change : BlocChange}"/>
			            </div>
			        	<div class="control-group">							
							<label for="txtAbbr"><span data-bind="text: lang.lang.code">Code</span> <span style="color:red">*</span></label>										
	              			<br>
	              			<input id="txtAbbr" name="txtAbbr" class="k-textbox k-valid" data-bind="value: Codeabbr" placeholder="eg. AB" required="" data-required-msg="required" style="width: 55px;">
		              		-					              		
		              		<input id="txtNumber" name="txtNumber" class="k-textbox" data-bind="value: Codenumber, events:{change:checkExistingNumber}" placeholder="eg. 001" required="" data-required-msg="required" style="width: 143px;">
						</div>
			        </div>
			        <dvi class="span6">
			        	<label for="ddlContactType"><span>Number of Family</span></label>
			        	<input type="text" id="" name="Number of Family" class="k-textbox k-invalid" placeholder="Number of Family" required="" validationmessage="" style="width: 100%;margin-bottom: 10px" data-bind="value: obj.family_member" aria-invalid="true">
			        	<label for="ddlContactType"><span>ID Card Number</span></label>
			        	<input type="text" id="" name="ID Card Number" class="k-textbox k-invalid" placeholder="ID Card Number" required="" validationmessage="" style="width: 100%;margin-bottom: 10px;" data-bind="value: obj.id_card" aria-invalid="true">
			        	<label for="ddlContactType"><span>Occupation</span></label>
			        	<input type="text" id="" name="Occupation" class="k-textbox k-invalid" placeholder="Occupation" required="" validationmessage="" style="width: 100%;margin-bottom: 20px;" data-bind="value: obj.occupation" aria-invalid="true">
			        </dvi>
				    <br>
				    <!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>
						<div class="row">
							<div class="span3">
								
							</div>
							<div class="span9" align="right">
								<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="click: save" style="width: 80px;margin-bottom: 0;"><i></i> <span >Activate</span></span>
									
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
									<div class="span6" style="padding-right: 0;">	
										<!-- Group -->
										<div class="control-group">							
											<label><span >Meter Code</span> <span style="color:red">*</span></label>			
					              			<br>

					              			<input class="k-textbox"					    
						              			data-bind="value: obj.meter_number"
								                placeholder="eg. 1" required data-required-msg="required"
								                style="width: 96%" />
										</div>
										<!-- // Group END -->											
									</div>
									<div class="span6" style="padding-right: 0;">	
										<!-- Group -->
										<div class="control-group">							
											<label for="txtAbbr"><span >Meter No. Digit</span> <span style="color:red">*</span></label>										
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
									<div class="span6" style="padding-right: 0;">	
										<!-- Group -->
										<div class="control-group">							
											<label for="txtAbbr"><span >Plan</span></label>										
					              			<br>
						              		<input data-role="dropdownlist"
					              			   data-option-label="(--- Select ---)"	      
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="source: planDS, value: obj.plan_id"
							                   style="width: 96%;" />
										</div>
										<!-- // Group END -->											
									</div>
									<div class="span6" style="padding-right: 0;">	
										<!-- Group -->
										<div class="control-group">							
											<label for="txtAbbr"><span >Starting Meter No.</span></label>										
					              			<br>
						              		<input class="k-textbox" data-bind="value: obj.starting_no" 
														placeholder="e.g. 0" style="width: 96%;" />
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
				            					data-bind="value: obj.date_used" 
				            					data-format="dd-MM-yyyy"
				            					placeholder="Register Date" 
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
							        	<div class="row-fluid">	
											<div class="span6">		
												<!-- Group -->
												<div class="control-group">
									    			<label for="latitute"><span>Bloc</span> </label>
													<div class="input-prepend">
														<input data-role="dropdownlist"
								              			   data-option-label="(--- Select ---)"        
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="source: locationDS, value: obj.location_id" 
										                   style="width: 100%;" />
													</div>
													<label for="latitute"><span>Brands</span> </label>
													<div class="input-prepend">
														<input data-role="dropdownlist"
								              			   data-option-label="(--- Select ---)" 
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.brand_id, source: brandDS" style="width: 100%;" />
													</div>
												</div>									
												<!-- // Group END -->
											</div>	
											<div class="span6">	
												<!-- Group -->
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
												<!-- // Group END -->
											</div>										
										</div>
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
				    		<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
								<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
							</div>
				    		<div class="span5" style="padding-left: 20px;">									
								<div class="row well">
									<div class="span12">
										<table class="table table-borderless table-condensed">
											<tbody>
												<tr>
													<td data-bind="text: lang.lang.customer" style="width: 40%"></td>
													<td data-bind="text: meterObj.contact[0].name"></td>
												</tr>
												<tr>
													<td>Meter Number</td>
													<td data-bind="text: meterObj.meter_number"></td>
												</tr>
												<tr>
													<td>Activation Date</td>
													<td>
														<input
										            		data-role="datepicker"	 		
							            					data-bind="value: issued_date" 
							            					data-format="dd-MM-yyyy"
							            					data-parse-formats="yyyy-MM-dd" 
							            					placeholder="dd-MM-yyyy" required data-required-msg="required" 
							            					style="width: 80%" />
													</td>
												</tr>
											</tbody>
										</table>											
									</div>
								</div>
								<div class="installshow" data-bind="visible: showInstallment">
									<hr>
									<h2>Installment</h2>
				              		<label><span >Month</span></label>										
			              			<br>
				              		<input 
				              			type="text"
				              			class="k-textbox k-invalid"
				              			style="width: 80%" 
				              			data-bind="value: period"
				              			placeholder="1 - 12" 
				              		/>
				              		<br>
				              		<label><span >Start Date</span></label>										
			              			<br>
				              		<input
					            		data-role="datepicker"	 		
		            					data-bind="value: startDate" 
		            					data-format="dd-MM-yyyy"
		            					data-parse-formats="yyyy-MM-dd" 
		            					placeholder="dd-MM-yyyy" required data-required-msg="required" 
		            					style="width: 80%" />
		            			</div>
							</div>
							<div class="span7">
								<div class="box-generic-noborder">
								    <div class="tabsbar tabsbar-2">
								        <ul class="row-fluid row-merge">
								        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-5" data-toggle="tab"><i></i></a>
								            </li>						            								            
								        </ul>
								    </div>
								    <div class="tab-content">
								        <div class="tab-pane active" id="tab1-5">						            
								            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">							            
												<tbody>
												<tr>
									            	<td><span data-bind="text: lang.lang.payment_method">Payment Method </span></td>				
													<td>
														<input data-role="dropdownlist" data-value-primitive="true" data-text-field="name" data-value-field="id" data-bind="value: paymentMethod,
									              							source: paymentMethodDS" data-option-label="Select method..." style="width: 100%; display: none;">
													</td>
												</tr>
									            <tr>
									            	<td><span data-bind="text: lang.lang.cash_account">Cash Account</span></td>				            	
								            		<td>
								            			<input id="ddlCash" name="ddlCash" data-role="dropdownlist"  data-template="account-list-tmpl" data-value-primitive="true" data-text-field="name" data-value-field="id" data-bind="value: cashAccount,
								              							source: cashAccountDS" data-option-label="Select Account..." required="" data-required-msg="required" style="width: 100%; display: none;" class="k-valid">
													</td>							            	
									            </tr>
									            <tr>
									            	<td><span data-bind="text: lang.lang.check_no">Check Number</span></td>							            	
								            		<td>
														<input class="k-textbox" placeholder="type check number ..." data-bind="value: checkNumber" style="width: 100%;">
													</td>							            	
									            </tr>	
								            </tbody></table>						            
								        </div>	        								        
								    </div>
								</div>

								<table class="table">
									<thead>
										<tr>
											<th>Type</th><th>Name</th><th style="width: 30%">Amount</th><th style="width: 30%">Receive</th>
										</tr>
									</thead>
									<tbody data-role="listview" data-bind="source: items" data-template="meter-plan-item-list">
									</tbody>
								</table>
								<div class="row">
									<div class="span12" style="padding-right: 0;">	
										<!-- Group -->
										<table class="table table-condensed table-striped table-white">
											<tbody>
												<tr>
													<td class="right"><span data-bind="text: lang.lang.subtotal">Amount Paid:</span></td>
													<td class="right" width="40%"><span data-bind="text: amountToBeRecieved">0</span></td>
												</tr>
												<tr>
													<td class="right"><span>Amount Billed</span></td>
													<td class="right" style="width: 40%;border-bottom: 1px solid #000">
														<span data-bind="text: amountBilled">0</span>
				                   					</td>
												</tr>							
												<tr>
													<td class="right"><span data-bind="text: lang.lang.remaining">Outstanding:</span></td>
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
		<td>#=type#</td><td>#=name#</td><td>#=amount#</td><td><input type="text" class="k-textbox k-input k-formatted-value" data-bind="value: received, events: {change: onAmountChange}">
	</tr>
</script>
<script id="Reorder" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
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
										<li><a class="glyphicons print" href="#tab-2" data-toggle="tab" data-bind="click: printGrid"><i></i>Print/Export</a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body" style="overflow:hidden;">
									<div class="tab-content">
								        <div class="tab-pane active" id="tab-1">
											<div class="span12 row-fluid" style="padding:20px 0;padding-top: 0;">
									        	<div class="span6" style="padding-left: 0;">
													<div class="span4" style="padding-left: 0;">
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
									    </div>		
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					</div>
					<br>
					<div id="invFormContent">
						<div id="grid"></div>
					</div>
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification" style="display: none;"></div>
						<div class="row">
							<div class="span3">
								
							</div>
							<div class="span9" align="right">
								<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" style="width: 80px;"><i></i> <span data-bind="click: save, text: lang.lang.save_new">Save New</span></span>
								<span id="saveClose" class="btn btn-icon btn-success glyphicons power" style="width: 80px;margin-bottom: 10px"><i></i> <span data-bind="text: lang.lang.cancel, click: cancel">Cancel</span></span>		
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
	<h2>Reading</h2>
	<span class="glyphicons no-js remove_2 pull-right" data-bind="click: cancel"><i></i></span>	
	<div  class="row-fluid saleSummaryCustomer" style="padding-top: 30px;">
		
		<!-- Tabs -->
		<div class="relativeWrap" data-toggle="source-code">
			<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
			
				<!-- Tabs Heading -->
				<div class="widget-head">
					<ul style="padding-left: 1px;">
						<li class="active"><a class="glyphicons inbox_in" href="#tabDownload" data-toggle="tab"><i></i><span style="line-height: 55px;">Download</span></a></li>

						<li ><a class="glyphicons inbox_out" href="#tabReading" data-toggle="tab"><i></i><span style="line-height: 55px;">Upload</span></a></li>
						
					</ul>
				</div>
				<!-- // Tabs Heading END -->
				
				<div class="widget-body">
					<div class="tab-content">
						<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 70%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
							<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
						</div>
						<!-- Tab content -->
						<div id="tabDownload" style="border: 1px solid #ccc; overflow: hidden;" class="tab-pane active widget-body-regular">
							<h4 class="separator bottom" style="margin-top: 10px;">Please Select Query</h4>
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
					        <div class="row-fluid" data-bind="visible: selectMeter">
								<a data-bind="visible: haveData, click: exportEXCEL">
									<span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 250px!important;">
										<i></i> 
										<span >Download Reading Book</span>
									</span>
								</a>
								<br>
								<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
									<thead>
										<tr>
											<th class="center">Meter Number</th>
											<th class="center">From Date</th>
											<th class="center">To Date</th>
											<th class="center">Previouse</th>
											<th class="center">Current</th>
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
						<!-- // Tab content END -->
						<!-- Tab content -->
						<div id="tabReading" style="border: 1px solid #ccc" class="tab-pane widget-body-regular">	
							<h4 class="separator bottom" style="margin-top: 10px;">Please upload reading book</h4>
							<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
							  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onSelected}" id="myFile"  class="margin-none" />
							</div>
							<span class="btn btn-icon btn-primary glyphicons ok_2" style="width: 160px!important;"><i></i>
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
<script id="reading-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		#= number#
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
    		#= number#
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
            #= number#
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
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden;">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>	
					</div>
			        <h2 style="padding:0 15px;">Run Bill</h2>
			        <div class="span12 row-fluid" style="padding:20px 0;">
			        	<div class="span5" style="padding-right: 0;">
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
							           	data-bind="value: monthSelect" />
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
										data-value-primitive="true" 
										data-text-field="name" 
										data-value-field="id" 
										data-bind="
											value: licenseSelect,
		                  					source: licenseDS,
		                  					events: {change: licenseChange}">
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
										data-value-primitive="true" 
										data-text-field="name" 
										data-value-field="id" 
										data-bind="
											value: blocSelect,
		                  					source: blocDS">
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
			        <div class="row-fluid saleSummaryCustomer">
			        	<div class="span12" >
				        	<div class="row">
								<div class="span4">
									<div class="total-customer">
										<div class="span12">
											<p>Total Number of Invoices</p>
											<span data-bind="text: totalOfInv"></span>
										</div>	
									</div>
								</div>
								<div class="span4">
									<div class="total-customer">
										<p>m<sup>3</sup> Sold</p>
										<span data-bind="text: meterSold"></span>
									</div>
								</div>
								<div class="span4">
									<div class="total-customer">
										<div class="span12">
											<p>Amount</p>
											<span data-bind="text: amountSold"></span>
										</div>	
									</div>
								</div>
							</div>
						</div>
						
					</div>
			        <div class="span12 row-fluid" style="padding:20px 0;padding-top: 0;">
			        	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
					        <thead>
					            <tr>
					                <th><input type="checkbox" data-bind="checked: chkAll, events: {change : checkAll}" /></th>                
					                <th><span data-bind="text: lang.lang.customer"></span></th>		         
					                <th><span data-bind="text: lang.lang.meter"></span></th>
					                <th><span data-bind="">Previous</span></th>
					                <th><span data-bind="text: lang.lang.current"></span></th>
					                <th><span data-bind="text: lang.lang.total"></span></th>	                    
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
			        <div class="span12 row-fluid" style="padding:20px 0;padding-top: 0">
			        	<div class="span3">	
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
						           	data-bind="value: FmonthSelect" />
							</div>	
						</div>
						<div class="span3" style="padding-left: 0;">
							<div class="control-group">								
								<label ><span >Billing Date</span></label>
								<input type="text" 
				                	style="width: 100%;" 
				                	data-role="datepicker"
				                	data-format="dd-MM-yyyy"
				                	placeholder="Bill Date ..." 
						           	data-bind="value: BillingDate" />
	                  		</div>
						</div>	
						<div class="span3">
							<div class="control-group">								
								<label ><span >Due Date</span></label>
								<input type="text" 
				                	style="width: 100%;" 
				                	data-role="datepicker"
				                	data-format="dd-MM-yyyy"
				                	placeholder="Due Date ..." 
						           	data-bind="value: DueDate" />
	                  		</div>
						</div>	
			        </div>
			        <div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>
				        <div class="row">
							<div class="span12" align="right">
								<span class="btn btn-icon btn-primary glyphicons ok_2" data-bind="click: save, visible: showButton" style="width: 110px;margin-bottom: 0;"><i></i> <span>Run Bill</span></span>
								
								<span class="btn btn-icon btn-warning glyphicons remove_2" data-bind="click: cancel" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
													
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
		<td>#= meter.number#</td>
		<td class="right">#= items[0].line.prev #</td>
		<td class="right">#= items[0].line.current #</td>		
		<td class="right">#= items[0].line.current - items[0].line.prev # m<sup>3</sup></td>		
    </tr>
</script>
<script id="runbill-footer-template" type="text/x-kendo-template">
    <tr>    	
        <td class="right" colspan="8" style="font-size:30px;">
            <span data-bind="text: lang.lang.total"></span>: <span data-bind="text: meterSold"></span>  m<sup>3</sup>
        </td>
    </tr>
</script>
<script id="printBill" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden;">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>	
					</div>
			        <h2 style="padding:0 15px;">Print Bill</h2>
			        <div class="span12 row-fluid" style="padding:20px 0;">
			        	<div class="span5" style="padding-right: 0;">
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
							           	data-bind="value: monthSelect" />
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
										data-value-primitive="true" 
										data-text-field="name" 
										data-value-field="id" 
										data-bind="
											value: licenseSelect,
		                  					source: licenseDS,
		                  					events: {change: licenseChange}">
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
										data-value-primitive="true" 
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
			         
			        <div class="row-fluid saleSummaryCustomer">
			        	<div class="span6" >
				        	<div class="row">
								<div class="span4">
									<div class="total-customer">
										<div class="span12">
											<p>Total Invoice</p>
											<span>11</span>
										</div>	
									</div>
								</div>
								<div class="span4">
									<div class="total-customer">
										<p>No Print</p>
										<span >55</span>
									</div>
								</div>
								<div class="span4">
									<div class="total-customer">
										<div class="span12">
											<p>m<sup>3</sup></p>
											<span >11</span>
										</div>	
									</div>
								</div>
							</div>
						</div>
						<div class="span6" style="padding-right: 0;">
							<div class="total-customer" style="background: #0B0B3B; color: #fff;">
								<p>Amount</p>
								<span>55.16</span>
							</div>
						</div>
					</div>

			        <div class="span12 row-fluid" data-bind="visible: selectInv" style="padding:20px 0;padding-top: 0;">
			        	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
					        <thead>
					            <tr>
					                <th style="text-align:center"><input type="checkbox" data-bind="checked: chkAll, events: {change : checkAll}" /></th>                
					                <th><span data-bind="text: lang.lang.customer"></span></th>		         
					                <th><span data-bind="text: lang.lang.number"></span></th>
					                <th><span data-bind="text: lang.lang.amount"></span></th>
					                <th><span data-bind="text: lang.lang.status"></span></th>                    
					            </tr>
					        </thead>
					        <tbody data-role="listview" 
					        		data-template="printbill-row-template" 
					        		data-auto-bind="false" 
					        		data-bind="source: invoiceCollection.dataSource"></tbody>
					        <tfoot data-template="printbill-footer-template" 
						        		data-bind="source: this"></tfoot>	            
					    </table>
					    <div id="pager" class="k-pager-wrap"
					    	 data-auto-bind="false"
				             data-role="pager" data-bind="source: invoiceCollection.dataSource"></div>
				       	
			        </div>
			        <div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>
				        <div class="row">
							<div class="span2">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: TemplateSelect,
					                              source: txnTemplateDS"
					                   data-option-label="Select Template..." />
							</div>
							<div class="span2" style="margin: 0 10px;margin-left: 25px;">
								<input data-role="dropdownlist"
					                   data-value-primitive="true"
					                   data-option-label="Paper Size ..." 
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: SelectSize,
					                              source: SizePaper" />
							</div>
							<div class="span7" align="right">
								<span class="btn btn-icon btn-primary glyphicons print" data-bind="click: printBill" style="width: 110px;margin-bottom: 0;"><i></i> <span data-bind="text: lang.lang.print"></span></span>
								
								<span class="btn btn-icon btn-warning glyphicons remove_2" data-bind="click: cancel" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
													
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
		<td>#= meter.number#</td>
		<td>#= amount#</td>
		<td>#= status#</td>
	</tr>
</script>
<script id="printbill-footer-template" type="text/x-kendo-template">
    <tr>    	
        <td class="right" colspan="8" style="font-size:30px;">
            <span data-bind="text: lang.lang.total"></span>:  m<sup>3</sup>
        </td>
    </tr>
</script>
<script id="InvoicePrint" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden;">
			<div class="container-960">					
				<div id="example" class="k-content">
					<div class="hidden-print pull-right">
			    		<span style="padding: 5px 0 11px 35px;" class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>	
					</div>
					<h2>Invoice Preview</h2>
					<br>					
					
					<div id="wInvoiceContent" data-role="listview" 
						data-auto-bind="false"
						data-bind="source: dataSource" 
						data-template="Invoice-print-row-template"></div>						
					<!-- Form actions -->
					<div class="box-generic" align="right" style="background-color: #0B0B3B;">
						<span id="notification"></span>

						<span id="savePrint" class="btn btn-icon btn-primary glyphicons print" data-bind="click: printGrid" style="width: 80px;"><i></i>Print</span>
						<!--span id="savePDF" class="btn btn-icon btn-success glyphicons edit" data-bind="click: savePDF" style="width: 120px;"><i></i> Save PDF</span-->									
					</div>
				</div><!-- //End div span12-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>	
</script>
<script id="Invoice-print-row-template" type="text/x-kendo-tmpl">	
  	<div class="container winvoice-print" style="margin-bottom: 10px; #if(banhji.InvoicePrint.PaperSize == 'A5'){# width: 775px; #}else{# width: 900px; #}#">
		<div class="span12 headerinv " style="border-bottom: 2px solid \#000;padding: 15px 0;">
			<div class="span12" align="center">
				<h4>#: banhji.institute.name#</h4>					
				<h5>#: banhji.institute.address# 
				<br>
				#:typeof banhji.institute.phone != 'undefined' ? banhji.institute.phone: ''#</h5>					
			</div>
		</div>		

		<div class="span12 cover-customer">
			
			<div class="span7">
				<span id="secondwnumber#= id#" style="margin-left: -14px;"></span>
				<div class="span12">
					<p>អតិថិជន​ #=contact.number#</p>
					<p>#:contact.name#</p>
					<p>#: typeof contact.address != 'null' ? contact.address: ''#</p>
					<p style="font-size: 10px;"><i>ថ្ងៃ​ចាប់​ផ្តើម​ទទួល​ប្រាក់ #=kendo.toString(new Date(issue_date), "dd-MM-yyyy")#</i></p>
				</div>
			</div>
			<div class="span4">
				<table >
					<tr>
						<td width="200"><p>លេខ​វិក្កយ​បត្រ</p></td>
						<td><p>#:number#</p></td>
					</tr>
					<tr>
						<td><p>ថ្ងៃ​ចេញ វិក្កយ​បត្រ</p></td>
						<td><p>#:issue_date#</p></td>
					</tr>
					<tr>
						<td><p>តំបន់</p></td>
						<td><p>#:contact.code#</p></td>
					</tr>
					<!-- <tr>
						<td><p>លេខ​ទី​តាំង​</p></td>
						<td><p>#:contact.code#</p></td>
					</tr> -->
					<tr>
						<td><p>គិត​ចាប់​ពី​ថ្ងៃ​ទី</p></td>
						<td><p>#:due_date#</p></td>
					</tr>
					<tr>
						<td><p>ដល់​ថ្ងៃ​ទី</p></td>
						<td><p>#:due_date#</p></td>
					</tr>
				</table>		
			</div>			
		</div>
		<table class="span12 table table-bordered footerTbl" style="padding:0;margin-top: 40px;border:1px solid \\#000; border-radius: 3px;border-collapse: inherit;margin-left: 0px;">
			<thead>
				<tr>
					<th width="180" class="darkbblue">លេខ​កុងទ័រ<br>METER</th>
					<th width="150" class="darkbblue">អំណានចាស់<br>PREVIOUS</th>
					<th width="120" class="darkbblue">អំណានថ្មី<br>CURRENT</th>
					<th width="120" class="darkbblue">បរិមាណ<br>CONSUMPTION</th>
					<th width="120" class="darkbblue">តំលៃឯកត្តា<br>RATE</th>
					<th width="180" class="darkbblue">តំលៃសរុប<br>AMOUNT</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="vertical-align: middle;">#: issue_date#</td>
					<td colspan="4" style="text-align: right">
						ប្រាក់​ជំ​ពាក់​ពេល​មុន Balance brought forward . រ<br>
						ប្រាក់​បាន​ទទួល​ Payment Recieve - THANK YOU . រ<br>
						ជំពាក់​សរុប​នៅ​ថ្ងៃ​ធ្វើ​វិក្កយបត្រ Balance as at billing date .រ
					</td>
					<td>
						<br>
						0<br>
						0
					</td>
				</tr>
				<tr>
					<td>#: meter.location[0].abbr##: meter.number#</td>
					<td align="center">#: items[0].previous#</td>
					<td align="center">#: items[0].current#</td>
					<td align="center">#: items[0].consumption#</td>
					<td></td>
					<td></td>
				</tr>

				#for(var j=1; j< items.length; j++) {#
				<tr>
					<td>#: items[j].number#</td>
					<td align="center">#: items[j].amount#</td>
					<td align="center"></td>
					<td align="center"></td>
					<td></td>
					<td></td>
				</tr>
				#}#	
				#if(banhji.InvoicePrint.PaperSize == 'A4'){#
					<tr><td colspan="6"  style="height: 200px;" ></td></tr>
				#}#
				<tr>
					<td colspan="5" style="padding-right: 10px;background: \\#355176;color: \\#fff;text-align: right;" class="darkbblue">បំណុល​សរុប TOTAL BALANCE</td>
					<td style="border: 1px solid;text-align: right">#: amount#</td>
				</tr>
				<tr>
					<td rowspan="4" colspan="3"></td>
					<td colspan="2" class="greyy" style="background: \\#ccc;">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td style="text-align: right"><strong>#: amount#</strong></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;">ថ្ងៃផុតកំណត់ DUE DATE</td>
					<td>#=kendo.toString(new Date(due_date), "dd-MM-yyyy")#</td>
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
		<table class="span12 table table-bordered footerTbl" style="padding:0;border-collapse: inherit;margin-top: 15px;border:1px solid \\#000; border-radius: 3px;margin-left: 0px;">
			<tbody>
				<tr>
					<td width="100"></td>
					<th width="390" style="border: none">
						<span style="margin-left: -15px;" id="footwnumber#:id#"></span>
					</th>
					<td width="270" class="greyy" style="background: \\#ccc;border-bottom:1px solid \\#fff;">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td width="180">#: amount#</td>
				</tr>
				<tr>
					<td><p>វិក្កយបត្រ</p></td>
					<td>#: issue_date# - #: number#</td>
					<td class="greyy" style="background: \\#ccc;border-bottom:1px solid \\#fff;">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td></td>
				</tr>
				<tr>
					<td><p>អតិថិជន</p></td>
					<td>#=contact.number# #=contact.name#<br>#: contact.phone# #:contact.address#</td>
					<td class="greyy" style="background: \\#ccc;border-bottom:1px solid \\#fff;">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
				<tr>
					<td>លេខ​ទី​តាំង</td>
					<td>#: contact.code#</td>
					<td rowspan="2" class="greyy" style="background: \\#ccc;">អ្នកទទួលប្រាក់ RECEIVER</td>
					<td rowspan="2"></td>
				</tr>
				<tr>
					<td>លេខ​កុនង​ទ័រ</td>
					<td>#: meter.number#</td>
				</tr>
			</tbody>
		</table>
	</div>
</script> 

<!-- <script id="Receipt" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden;">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>
					</div>
					<h2>Receipt</h2>
					<br>
					<div class="row-fluid">
						<div class="span4">
							<span class="k-widget k-combobox k-header" style="width: 100%;"><span tabindex="-1" unselectable="on" class="k-dropdown-wrap k-state-default"><input class="k-input k-valid" type="text" autocomplete="off" title="" role="combobox" aria-expanded="false" placeholder="លេខកូដអតិថិជន..." tabindex="0" aria-disabled="false" aria-readonly="false" aria-autocomplete="list" aria-owns="ddlContact_listbox" style="width: 100%;"><span tabindex="-1" unselectable="on" class="k-select"><span unselectable="on" class="k-icon k-i-arrow-s" role="button" tabindex="-1" aria-controls="ddlContact_listbox">select</span></span></span><input id="ddlContact" data-bind="value: customer_id" style="width: 100%; display: none;" data-role="combobox" aria-disabled="false" aria-readonly="false" class="k-valid"></span>			
							<h5><i class="icon-info-sign"></i> <span>Customer Info</span></h5>				
							<table width="100%" style="background-color:Silver; color:black;">
								<tbody><tr>
									<td colspan="2">
										<i class="icon-user icon-li icon-fixed-width"></i> 
										<span >Full Name</span>										
									</td>																			
								</tr>
								<tr>
									<td>
										<i class="icon-phone icon-li icon-fixed-width"></i> <span >Customer Phone</span>
									</td>
								</tr>											
								<tr>
									<td colspan="2">
										<i class="icon-home icon-li icon-fixed-width"></i> <span >Customer Address</span>
									</td>						
								</tr>
							</tbody></table>

							<br>			
							
							<h5><i class="icon-list"></i> <span >Activities</span></h5>

							<table class="table table-bordered table-striped table-white">
						        <thead>
						            <tr>
						            	<th><span >Date</span></th>						                
						                <th><span >Type</span></th>						                
						                <th><span >Amount</span></th>						                						                
						            </tr>
						        </thead>
						        <tbody data-role="listview" data-auto-bind="false" data-template="cashier-transaction-row-template" data-bind="source: transactionDS" class="k-widget k-listview" role="listbox"></tbody>						        					        
						    </table>
							
							<div id="pager" class="k-pager-wrap k-widget k-floatwrap" data-role="pager" data-auto-bind="false" data-bind="source: transactionDS"><a href="#" title="Go to the first page" class="k-link k-pager-nav k-pager-first k-state-disabled" data-page="1" tabindex="-1"><span class="k-icon k-i-seek-w">Go to the first page</span></a><a href="#" title="Go to the previous page" class="k-link k-pager-nav  k-state-disabled" data-page="1" tabindex="-1"><span class="k-icon k-i-arrow-w">Go to the previous page</span></a><ul class="k-pager-numbers k-reset"></ul><a href="#" title="Go to the next page" class="k-link k-pager-nav  k-state-disabled" data-page="0" tabindex="-1"><span class="k-icon k-i-arrow-e">Go to the next page</span></a><a href="#" title="Go to the last page" class="k-link k-pager-nav k-pager-last k-state-disabled" data-page="0" tabindex="-1"><span class="k-icon k-i-seek-e">Go to the last page</span></a><span class="k-pager-info k-label"></span></div>
						
						</div>
						<div class="span8 well" style="margin-left: 15px; padding-left: 15px; padding-right: 15px; width: 65%;">
							<div class="row">
								<div class="span6" style="padding-right: 0;">
									<div class="control-group">										
										<label for="ddlCategory"><span >Payment Date</span></label>										
										<span class="k-widget k-datepicker k-header" style="width: 100%; ">
											<span class="k-picker-wrap k-state-default">
												<input id="registeredDate" name="registeredDate" data-role="datepicker" data-bind="" data-format="dd-MM-yyyy" data-parse-formats="yyyy-MM-dd" placeholder="dd-MM-yyyy" required="" data-required-msg="required" style="width: 100%;" type="text" class="k-input" role="combobox" aria-expanded="false" aria-owns="registeredDate_dateview" aria-disabled="false" aria-readonly="false">
												<span unselectable="on" class="k-select" role="button" aria-controls="registeredDate_dateview">
												<span unselectable="on" class="k-icon k-i-calendar">select</span></span></span></span>
									</div>
								</div>
								<div class="span6">
									<div class="control-group">
										<label for="ddlCategory"><span >Payment Method</span></label>	
										<input id="ddlPaymentMethod" id="ddlPaymentMethod" style="width: 100%; padding: 5px 0;"
						                  			   data-role="dropdownlist"
									                   data-auto-bind="false"
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind=""
									                   required data-required-msg="" />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="span6" style="padding-right: 0;">
									<div class="control-group">
										<label for="ddlCategory"><span >Cheque</span></label>
										<input id="check_no" class="k-textbox" style="width: 100%;" />
									</div>
								</div>
								<div class="span6">
									<div class="control-group">
										<label for="ddlCategory"><span >Cash Account</span></label>
										<input id="ddlPaymentMethod" id="ddlPaymentMethod" style="width: 100%;"
						                  			   data-role="dropdownlist"
									                   data-auto-bind="false"
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind=""
									                   required data-required-msg="" />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="span6" style="padding-right: 0;">
									<div class="control-group">
										<label for="ddlCategory"><span >Discount</span></label>
										<input data-role="numerictextbox" style="width: 100%" 
														data-format="c0" data-culture="km-KH" 
														data-bind="" />
									</div>
								</div>
								<div class="span6">
									<div class="control-group">
										<label for="ddlCategory"><span >Fine</span></label>										
										<input data-role="numerictextbox" style="width: 100%" 
														data-format="c0" data-culture="km-KH" 
														data-bind="" />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="span6" style="padding-right: 0;">
									<div class="control-group">
										<label for="ddlCategory"><span >Total Payment:	</span></label>
										<br>
										<span style="text-align: right; float: right;">0៛</span>
									</div>
								</div>
								<div class="span6">
									<div class="control-group">
										<label for="ddlCategory"><span >Remain:</span></label>
										<br>
										<span style="text-align: right; float: right;">0៛</span>
									</div>
								</div>
							</div>


						</div>

					</div>

					<div class="row-fluid" >						

						<div class="span4" style="margin: 15px 0;">
							<div class="innerAll padding-bottom-none-phone" style="padding: 0;">
								<a href="javascript:void(0)" class="widget-stats widget-stats-gray widget-stats-4"> 
									<span class="txt"><span >Customer</span></span>
									<span class="count" >0</span>
									<span class="glyphicons user"><i></i></span>
									<div class="clearfix"></div>
									<i class="icon-play-circle"></i> 
								</a>
							</div>
						</div>
						
						<div class="span4" style="margin: 15px 0;">
							<div class="innerAll padding-bottom-none-phone" style="padding: 0;">
								<a href="#/wPayment_summary" class="widget-stats widget-stats-primary widget-stats-4">
									<span class="txt"><span >Today Payment</span></span>
									<span class="count"><span style="font-size: 35px;">0៛</span></span>
									<span class="glyphicons coins"><i></i></span>
									<div class="clearfix"></div>
									<i class="icon-play-circle"></i>
								</a>
							</div>
						</div>

						<div class="span4" style="margin: 15px 0;">
							<div class="innerAll padding-bottom-none-phone" style="padding: 0;">
								<a id="save" name="save" class="widget-stats widget-stats-info widget-stats-4">
									<span class="txt"><span data-bind="text: lang.lang.save">Save</span></span>
									<span class="count" style="font-size: 35px;" data-bind="text: receive_amount">0៛</span>
									<span class="glyphicons cart_in"><i></i></span>
									<div class="clearfix"></div>
									<i class="icon-play-circle"></i>
								</a>
							</div>								
						</div>
					</div>


					<div class="row-fluid">
					<table class="table table-bordered table-striped table-white">
					        <thead>
					            <tr>
					                <th></th>
					                <th><span data-bind="text: lang.lang.no">No.</span></th>						                
					                <th><span data-bind="text: lang.lang.date">Date</span></th>
					                <th><span data-bind="text: lang.lang.name">Name</span></th>
					                <th><span data-bind="text: lang.lang.invoice">Invoice</span></th>
					                <th class="right"><span data-bind="text: lang.lang.amount">Amount</span></th>
					                <th class="right"><span data-bind="text: lang.lang.pay">Pay</span></th>							                
					            </tr>
					        </thead>
						        <tbody data-role="listview" data-auto-bind="false" data-template="cashier-row-template" data-bind="source: invoiceList" class="k-widget k-listview" role="listbox">		
									<tr id="rowGrid-12" data-uid="b60e50ff-b848-49e7-b4ff-896ceaa1177c" role="option" aria-selected="false">
										<td>
											<input type="checkbox" data-bind="checked: isPay, events:{change: checkPay}">			
										</td>
										<td class="sno">1</td>			
										<td>NaN-NaN-0NaN</td>		
										<td>ជា ប៊ុនធឿន</td>
										<td>WINV0001</td>				
										<td class="right">35,000.00៛</td>
										<td class="right">
											<span class="k-widget k-numerictextbox" style="width: 120px;"><span class="k-numeric-wrap k-state-default"><input type="text" class="k-formatted-value k-input" tabindex="0" title="" aria-disabled="false" aria-readonly="false" style="display: inline-block;"><input data-role="numerictextbox" data-format="c" data-culture="data-bind=&quot;value:" pay_amount,="" events:="" {change="" :="" change}"="" style="display: none;" role="spinbutton" class="k-input" type="text" aria-valuenow="" aria-disabled="false" aria-readonly="false"><span class="k-select"><span unselectable="on" class="k-link"><span unselectable="on" class="k-icon k-i-arrow-n" title="Increase value">Increase value</span></span><span unselectable="on" class="k-link"><span unselectable="on" class="k-icon k-i-arrow-s" title="Decrease value">Decrease value</span></span></span></span></span>
											<i class="icon-trash" data-bind="events: { click: remove "></i>						
										</td>				
								    </tr>   
								</tbody>
														        <tfoot data-template="cashier-footer-template" data-bind="source: this">
								    <tr>    	
								        <td class="right" colspan="7" style="font-size:30px;">
								            Total: 35,000៛
								        </td>
								    </tr>
								</tfoot>						        
						    </table>
					</div>

				</div>
			</div>
		</div>
	</div>				  	
</script> -->
<script id="Receipt" type="text/x-kendo-template">
	<div class="row-fluid">

		<!-- Left Side -->
		<div class="span4">

			<!-- Logo of the page -->
			<table width="100%" cellpadding="10">
				<tr>
			        <td>
			        	<h2 >Receipt</h2>
			        	<p>
			        		<span data-bind="text: lang.lang.in_here"></span>
			        	</p>

			        	<p style="width: 100%; float: left; margin-top: 8px;">
				        	<span style="position: relative; height: 35px; line-height: 35px; padding-right: 15px; float: left; display: block; ">
								<a style="color: #fff; margin-top: 4px; line-height: 17px; background: #203864; padding: 8px 91px; font-size: 20px;" href="#/reconcile">
									Reconcile & Transfer												
								</a>
							</span>
						</p>
			        </td>
			 	</tr>
			</table>

			<div style="width: 100%; float: left; background: #fff; height: 80px; margin: 10px 0 15px 0;">
				Chart
			</div>

			<h2 >Report</h2>
			<p>
				Summary and detail cash receipt reports grouped by sources/ methods of receipts
			</p>
			<ul style="margin-left: -20px;">
				<li><a href="#/cash_receipt_summary"><span >Cash Receipt By Summary</span></a></li> 
				<li><a href="#/cash_receipt_detail"><span >Cash Receipt By Detail</span></a></li>  
  				<li><a href="#/cash_receipt_source_summary"><span >Cash Receipt By Sources Summary</span></a></li>
  				<li><a href="#/cash_receipt_source_detail"><span >Cash Receipt By Sources Detail</span></a></li> 
			</ul>

		</div>

		<!-- Right Side -->
		<div class="span8">

			<!-- Summary -->
			<div class="row">
	
				<div class="span4" style="background: #496cad; margin-bottom: 15px;">
					<div class="innerAll padding-bottom-none-phone" >
						<a href="javascript:void(0)" class="widget-stats widget-stats-gray widget-stats-4" style="background: #496cad;"> 
							<span class="txt" style="color: #fff;"><span >Customer</span></span>
							<span class="count" style="color: #fff;" data-bind="text: numCustomer">0</span>
							<span class="glyphicons user userss"><i></i></span>
						</a>
					</div>
				</div>

				<div class="span8" >
					<div class="innerAll padding-bottom-none-phone" style="background: #d9edf7;">
						<a href="#/wPayment_summary" class="widget-stats widget-stats-primary widget-stats-4" style="background: #d9edf7;">
							<span class="txt" style="color: #31708f;"><span >Today Payment</span></span>
							<span class="count"><span style="font-size: 35px; color: #31708f;" data-bind="text: paymentReceiptToday">0៛</span></span>
							<span class="glyphicons coins addcolor-coins"><i></i></span>
						</a>
					</div>
				</div>
				
			</div>

			<div class="row-fluid" style="background: #fff; float: left; padding: 15px; margin-left: -15px;">
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
			</div>
		</div>		

	</div>				  	
</script>
<script id="cashReceipt-template" type="text/x-kendo-template">
	<tr data-uid="#: uid #">		
		<td>
			<i class="icon-trash" data-bind="events: { click: removeInvRow }"></i>
			#:banhji.Receipt.dataSource.indexOf(data)+1#			
		</td>		
		<td>#=kendo.toString(new Date(due_date), "dd-MM-yyyy")#</td>
		<td>#=contact[0].name#</td>		
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
                   data-decimals="2"
                   data-min="0"                   
                   data-bind="value: received,
                              events: { change: changes }"
                   style="width: 100%;">			
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
		<td><i class="icon-trash" data-bind="events: { click: rmCurrencyRow }"></i>
			#:banhji.Receipt.reconcileVM.currencyList.indexOf(data)+1#	</td>
		<td>
			<input data-role="dropdownlist"
        	   style="padding-right: 1px;height: 32px;" 
			   data-option-label="(--- Currency ---)"
			   data-auto-bind="false"			                   
               data-value-primitive="true"
               data-text-field="code"
               data-value-field="code"
               data-bind="value: code,
                          source: currencyDS"/>
		</td>
		<td>
			<input id="numeric" class="k-formatted-value k-input" type="number" value="17" min="0" data-bind="value: amount" step="1" />
			
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
							<div class="span12">
								<select class="span12 selectType" 
									data-role="dropdownlist" 
									data-value-primitive="true" 
									data-text-field="name" 
									data-value-field="id" 
									data-bind="value: obj.type, 
												source: selectTypeList, 
												events:{change: onChange}" ></select>
							</div>
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
	<div class="container font-small winvoice-print" style="margin-bottom: 10px; width: 610px; ">
		<div class="span12 headerinv " style="border-bottom: 2px solid \#000;padding: 15px 0;">
			<div class="span12" align="center">
				<h4 data-bind="text: company.name"></h4>					
				<h5><span data-bind="text: company.address"></span>
				<br>
				<span data-bind="text: company.phone"></span></h5>					
			</div>
		</div>		

		<div class="span12 cover-customer">
			
			<div class="span7">
				<span id="secondwnumber1" style="margin-left: -14px;"></span>
				<div class="span12">
					<p>អតិថិជន​ <span data-bind="text: obj.customer_number"></span></p>
					<p data-bind="text: obj.customer_name"></p>
					<p data-bind="text: obj.customer_address"></p>
					<p style="font-size: 10px;"><i>ថ្ងៃ​ចាប់​ផ្តើម​ទទួល​ប្រាក់ <?php echo date("d/m/Y"); ?></i></p>
				</div>
			</div>
			<div class="span4">
				<table >
					<tr>
						<td width="200"><p>លេខ​វិក្កយ​បត្រ</p></td>
						<td><p data-bind="text: obj.wnumber"></p></td>
					</tr>
					<tr>
						<td><p>ថ្ងៃ​ចេញ វិក្កយ​បត្រ</p></td>
						<td><p data-bind="text: obj.issue_date"></p></td>
					</tr>
					<tr>
						<td><p>តំបន់</p></td>
						<td><p data-bind="text: obj.customer_code"></p></td>
					</tr>
					<!-- <tr>
						<td><p>លេខ​ទី​តាំង​</p></td>
						<td><p>#:contact.code#</p></td>
					</tr> -->
					<tr>
						<td><p>គិត​ចាប់​ពី​ថ្ងៃ​ទី</p></td>
						<td><p data-bind="text: obj.start_date"></p></td>
					</tr>
					<tr>
						<td><p>ដល់​ថ្ងៃ​ទី</p></td>
						<td><p data-bind="text: obj.due_date">#:due_date#</p></td>
					</tr>
				</table>		
			</div>			
		</div>
		<table class="span12 table table-bordered footerTbl" style="padding:0;margin-top: 40px;border:1px solid #000; border-radius: 3px;border-collapse: inherit;margin-left: 0px;">
			<thead>
				<tr>
					<th width="180" class="darkbblue">លេខ​កុងទ័រ<br>METER</th>
					<th width="150" class="darkbblue">អំណានចាស់<br>PREVIOUS</th>
					<th width="120" class="darkbblue">អំណានថ្មី<br>CURRENT</th>
					<th width="120" class="darkbblue">បរិមាណ<br>CONSUMPTION</th>
					<th width="120" class="darkbblue">តំលៃឯកត្តា<br>RATE</th>
					<th width="180" class="darkbblue">តំលៃសរុប<br>AMOUNT</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="vertical-align: middle;" data-bind="text: obj.issue_date"></td>
					<td colspan="4" style="text-align: right">
						ប្រាក់​ជំ​ពាក់​ពេល​មុន Balance brought forward . រ<br>
						ប្រាក់​បាន​ទទួល​ Payment Recieve - THANK YOU . រ<br>
						ជំពាក់​សរុប​នៅ​ថ្ងៃ​ធ្វើ​វិក្កយបត្រ Balance as at billing date .រ
					</td>
					<td>
						<br>
						0<br>
						0
					</td>
				</tr>
				<tr>
					<td data-bind="text: meter_number"></td>
					<td align="center" data-bind="text: obj.meter_prev"></td>
					<td align="center" data-bind="text: obj.meter_current"></td>
					<td align="center" data-bind="text: obj.meter_consumption"></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td data-bind="text: obj.item_number"></td>
					<td align="center" data-bind="text: obj.item_amount"></td>
					<td align="center"></td>
					<td align="center"></td>
					<td></td>
					<td></td>
				</tr>
				<tr><td colspan="6"  style="height: 80px;" ></td></tr>
				<tr>
					<td colspan="5" style="padding-right: 10px;background: #355176;color: #fff;text-align: right;" class="darkbblue">បំណុល​សរុប TOTAL BALANCE</td>
					<td style="border: 1px solid;text-align: right"><strong data-bind="text: obj.amount"></strong></td>
				</tr>
				<tr>
					<td rowspan="4" colspan="3"></td>
					<td colspan="2" class="greyy" style="background: \\#ccc;">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td style="text-align: right"><strong data-bind="text: obj.amount"></strong></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;">ថ្ងៃផុតកំណត់ DUE DATE</td>
					<td data-bind="text: obj.due_date"></td>
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
					<td width="180" data-bind="text: obj.amount"></td>
				</tr>
				<tr>
					<td><p>វិក្កយបត្រ</p></td>
					<td><span data-bind="text: obj.issue_date"></span> - <span data-bind="text: obj.wnumber"></span></td>
					<td class="greyy" style="background: #ccc;border-bottom:1px solid #fff;">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td></td>
				</tr>
				<tr>
					<td><p>អតិថិជន</p></td>
					<td><span data-bind="text: obj.customer_number"></span> <span data-bind="text: obj.customer_name"></span><br>
					<span data-bind="text: obj.customer_phone"></span> <span data-bind="text: obj.customer_address"></span></td>
					<td class="greyy" style="background: #ccc;border-bottom:1px solid #fff;">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
				<tr>
					<td>លេខ​ទី​តាំង</td>
					<td data-bind="text: obj.customer_code"></td>
					<td rowspan="2" class="greyy" style="background: #ccc;">អ្នកទទួលប្រាក់ RECEIVER</td>
					<td rowspan="2"></td>
				</tr>
				<tr>
					<td>លេខ​កុនង​ទ័រ</td>
					<td data-bind="text: obj.meter_number"></td>
				</tr>
			</tbody>
		</table>
	</div>
</script>
<script id="invoiceForm2" type="text/x-kendo-template">
	<div class="inv1 pcg pcg-border">
        <div class="content clear">
        	<div class="span12">
	        	<div class="span7">
	        		<div class="logo" style="width: 40%">
		            	<img style="width: " data-bind="attr: { src: company.logo.url, alt: company.name, title: company.name }" />
		            </div>
	        	</div>
	        	<div class="span5">
	        		<div class="span12" style="margin-bottom: 10px;">
	        			<h2 style="font-size: 24px;text-align: left;color:#10253f " data-bind="text: obj.title"></h2>
	        			<!--img src="<?php echo base_url(); ?>assets/invoice/img/official-receipt.jpg" /-->
	        		</div>
	        		<div class="span12">
	        			<table class="span12">
	        				<tr>
	        					<td class="light-blue-td" width="100">កាលបរិច្ឆេទ Date</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.issued_date"></td>
	        				</tr>
	        				<tr>
	        					<td class="light-blue-td">លេខបបង្កាន់ដៃ Receipt No.</td>
	        					<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.number"></td>
	        				</tr>
	        			</table>
	        		</div>
	        	</div>
	        </div>
        	<div class="span12" style="margin-top: 10px;">
		    	<div class="span7" style="margin-top: 10px;">
		    		<table class="span11">
						<tr>
							<td class="light-blue-td" width="120">ទទួលពីឈ្មោះ​ <br>Recieve From</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.issued_date"></td>
						</tr>
						<tr>
							<td class="light-blue-td">អស័យដ្ឋាន <br>Contact Address</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.contact[0].address"></td>
						</tr>
						<tr>
							<td class="light-blue-td">គោលបំណង​​ <br>Purpose</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.memo"></td>
						</tr>
						<tr>
							<td class="light-blue-td">លេខយោង <br> Reference Document</td>
							<td style="text-align: left;padding-left: 5px;" data-bind="text: obj.reference_id"></td>
						</tr>
					</table>
		    	</div>
		    	<div class="span5" style="float:right">
		    		<p style="padding: 5px 0; text-align: left;font-weight: bold;color: #000;">ចំនួនទទួលសរុប​ <br> TOTAL RECEIVED AMOUNT</p>
		    		<div class="span12 main-color order-price" data-bind="style: {backgroundColor: obj.color}">
		    			<p><span class="total-amount" data-bind="text: obj.amount"></span></p>		    			
		    		</div>
		    		<p style="padding: 5px 0;font-weight: bold;color: #000;clear:both;">វិធីសាស្រ្តទូទាត់​ Mode of payment</p>
		    		<p style="padding: 5px 0;font-weight: bold;color: #000;clear:both;" data-bind="text: obj.payment_method"></p>
		    	</div>
		    </div>
        	<div class="span12">
        		<div class="span8">
        			<p style="color:black;margin: 10px 0;" data-bind="text: obj.note"></p>
        		</div>
        	</div>
        	<div class="span12">
        		<div class="span5">
        			<p>On behalf of <span data-bind="text: company.name"></span></p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        		<div class="span4" style="float:right;">
        			<p>Paid By:</p>
        			<div style="height: 60px;border-bottom: 1px solid #000" class="span12"></div>
        			<p style="font-weight: bold;">Name</p>
        		</div>
        	</div>
        	<div style="margin-top: 15px" class="span12">
        		<p>Address: <span data-bind="text: company.address"></span> <sapn data-bind="text: company.city"></sapn> <span data-bind="text: company.country.name"></span>.</p>
        	</div>
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

<script id="Reconcile" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden;">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>	
					</div>
			        <h2>Reconcile</h2>
			        <br>
			        <div class="row-fluid reconcile">
				        <table class="span12">
				        	<thead>
					        	<tr>
					        		<th colspan="1">Actual Cash Count</th>
					        	</tr>
				        	</thead>
				        	<tbody>
					        	<tr>
									<td colspan="2" style="padding: 0;">
										<table>
											<thead>
											<tr>
												<td data-bind="click: list.addRow"><i class="icon-plus"></i></td>
												<td style="background: olive;">Currency:</td>
												<td style="background: olive;">Note:</td>
												<td style="background: olive;" >Unit</td>
												<td style="background: olive;" >Total</td>
											</tr>
											</thead>
											<tbody data-role="listview" data-bind="source: list.dataSource" data-template="Reconcile-list-tmpl"></tbody>
										</table>
									</td>
					        	</tr>
					        	<tr>
					        		<td style="padding: 0;">
					        			<table class="span6">
					        				<thead>
					        					<tr>
					        						<th colspan="2">
					        							Amount Received
					        						</th>
					        					</tr>
					        				</thead>
					        				<tbody data-role="listview" data-bind="source: receiptDS" data-template="reconcile-receipt-list">
					        				</tbody>
					        			</table>
					        		</td>
					        		<td>
					        			<table class="span6">
					        				<thead>
					        					<tr>
					        						<th colspan="2">
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
			        <div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>
				        <div class="row">
							<div class="span12" align="right">
								<span class="btn btn-icon btn-primary glyphicons ok_2" data-bind="click: verify" style="width: 110px;margin-bottom: 0;"><i></i> <span>Verify</span></span>
								<span class="btn btn-icon btn-primary glyphicons ok_2" data-bind="click: runBill" style="width: 110px;margin-bottom: 0;"><i></i> <span>Record</span></span>
								
								<span class="btn btn-icon btn-warning glyphicons remove_2" data-bind="click: cancel" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
													
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
		<td><i class="icon-trash" data-bind="click: removeRow"></i></td>
		<td><input type="text" data-role="combobox" data-bind="source: currencyDS, value: code" data-text-field="code" data-value-field="code"></td>
		<td><input type="number" class="k-textbox" data-bind="value: note, events: {change: onChange}"></td>
		<td><input type="number" class="k-textbox" data-bind="value: unit, events: {change: onChange}"></td>
		<td><input type="number" data-bind="value:total"></td>
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
<script id="meter-list-tmpl" type="text/x-kendo-tmpl">
	<tr>
		<td data-bind="click: onSelectedMeter">#= meter_number#</td>
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
			# if(activated != "1") { #
			<a style="background: \#1f4774;padding:4px;margin-right: 3px;vertical-align: middle;" 
				href="\#/activate_meter/#= id#" 
				class="btn-action btn-success">Activate
			</a>
			# } #
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
<!-- Report -->
<script id="Reports" type="text/x-kendo-template">
	<div class="row-fluid customer-report-center">
	
		<div class="rowfluid" style="margin-bottom: 20px;">
			<div class="span12">
				<p>Key Performance Indicators (KPIs)</p> 
				<input id="ddlCashAccount" name="ddlCashAccount" 
					data-role="dropdownlist"
	  				data-value-primitive="true"
					data-text-field="name" 
	  				data-value-field="id"
	  				data-bind="value: licenseSelect,
	  							source: licenseDS"
	  				data-option-label="Select Licenses..."
	  				/>
	  		</div>
  		</div>

  		<div style="float: left; margin-bottom: 15px; clear: both;"></div>

  		<div class="row-fluid">
  			<div class="span2" >
		
				<!-- Stats Widget -->
				<span class="widget-stats widget-stats-gray widget-stats-2" style="background: #496cad;">
					<span class="count" style="font-size: 25px; "><a style="color: #fff;">100.00</a></span>
					<span class="txt" style="font-size: small; color: #fff;"><span >Total No. of Customer</span></span>
				</span>
				<!-- // Stats Widget END -->
				
			</div>
			<div class="span2" style="padding: 0; ">
		
				<!-- Stats Widget -->
				<span class="widget-stats widget-stats-2" style="background: #d9edf7;">
					<span class="count" style="font-size: 25px;"><a style="color: #31708f;" data-format="p">10.00</a></span>
					<span class="txt" style="font-size: small; color: #31708f;"><span >Total Customer Ratio</span></span>
				</span>
				<!-- // Stats Widget END -->
				
			</div>
			<div class="span3" style="padding-right: 0; ">
		
				<!-- Stats Widget -->
				<span class="widget-stats widget-stats-gray widget-stats-2" style="background: #D3D3D3;">
					<span class="count" style="font-size: 25px;"><a style="color: #000;" data-format="p" >100.00</a></span>
					<span class="txt" style="font-size: small;"><span >Active Customer Ratio</span></span>
				</span>
				<!-- // Stats Widget END -->
				
			</div>
			<div class="span5" >
			
				<!-- Stats Widget -->
				<span class="widget-stats widget-stats-2" style="background: #113051;">
					<span class="count" style="font-size: 25px;"><a style="color: #fff;" data-format="c0" >100.00</a></span>
					<span class="txt" style="font-size: small; color: #fff;"><span >Total Water Revenue</span></span>
				</span>
				<!-- // Stats Widget END -->
				
			</div>
  		</div>

  		<div style="float: left; margin-bottom: 15px; clear: both;"></div>

  		<div class="row-fluid">		
			<div class="span2" >
			
				<!-- Stats Widget -->			
				<span class="widget-stats widget-stats-default widget-stats-2"  style="background: #496cad;">
					<span class="count" style="font-size: 25px; "><a style="color: #fff;">100.00</a></span>
					<span class="txt" style="font-size: small;"><span >Water Sold (M3)</span></span>
				</span>
				<!-- // Stats Widget END -->
				
			</div>
			<div class="span2" style="padding: 0; ">
			
				<!-- Stats Widget -->
				<span class="widget-stats widget-stats-2" style="background: #d9edf7;">
					<span class="count" style="font-size: 25px;"><a data-format="n2" style="color: #31708f;">100.00</a></span>
					<span class="txt" style="font-size: small; color: #31708f;"><span >Average Water Usage Per Connection</span></span>
				</span>
				<!-- // Stats Widget END -->
				
			</div>
			<div class="span3" style="padding-right: 0; ">
			
				<!-- Stats Widget -->
				<span class="widget-stats widget-stats-default widget-stats-2" style="background: #D3D3D3;">
					<span class="count" style="font-size: 25px;"><a style="color: #000;" data-format="c0" >100.00</a></span>
					<span class="txt" style="font-size: small; color: #000; "><span >Avarage Reveune Per Connection</span></span>
				</span>
				<!-- // Stats Widget END -->
				
			</div>
			<div class="span5">
			
				<!-- Stats Widget -->
				<span class="widget-stats widget-stats-2" style="background: #113051;">
					<span class="count" style="font-size: 25px;"><a style="color: #fff;" data-format="c0" >100.00</a></span>
					<span class="txt" style="font-size: small; color: #fff;"><span >Total Deposit</span></span>
				</span>
				<!-- // Stats Widget END -->
				
			</div>							
		</div>

		<div style="float: left; margin-bottom: 15px; clear: both;"></div>

  		<div class="row-fluid">
  			<div class="span6">
				<div class="row-fluid sale-report">
					<h2>Customer Management Report</h2>
					<p>
						These reports are useful for customer information management, meter connections, and usage managements 
					</p>
					<div class="row-fluid">
						<table class="table table-borderless table-condensed">
							<tr>
								<td width="50%">
									<h3><a href="#/customer_list">Customer List</a></h3>
								</td>
								<td width="50%">
									<h3><a href="#/new_customer_list">New Customer List</a></h3>
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
									<h3><a href="#/disconnect_list">Disconnected List</a></h3>
								</td>
								<td width="50%">
									<h3><a href="#/mini_usage_list">Minimum Water Usage List</a></h3>
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
			<div class="span6">
				<div class="row-fluid recevable-report">
					<h2>Receiveable and Deposits</h2>
					<p>
						These would be the most common reports that you will be using. It includes receivables balance and its aging in both summary and detail list and the security deposit made by the customers for their water connection.
					</p>
					<div class="row-fluid">
						<table class="table table-borderless table-condensed">
							<tr>
								<td >
									<h3><a href="#/account_receivable_list">Accounts Receivable Listing</a></h3>
								</td>
								<td >
									<h3><a href="#/customer_deposit_report">Customer Deposit</a></h3>								
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
									<h3><a href="#/customer_aging_sum_list">Customer Aging Summary List</a></h3>
								</td>
								<td >
									<h3><a href="#/customer_aging_detail">Customer Aging Detail List</a></h3>								
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
		<div class="row-fluid">
			<div class="span6">
				<div class="row-fluid sale-report">
					<h2>Sale Report</h2>
					<p>
						Summary and detail sale report broken down by Licenses, bloc, and types of reveneues.	
					</p>
					<div class="row-fluid">
						<table class="table table-borderless table-condensed">
							<tr>
								<td>
									<h3><a href="#/sale_summary">Sale Summary Report</a></h3>
								</td>
								<td >
									<h3><a href="#/sale_detail">Sale Detail Report</a></h3>								
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
									<h3><a href="#/connect_service_revenue">Connection Service Revenue Report</a></h3>
								</td>
								<td >
									<h3><a href="#/other_revenues">Other Revenues</a></h3>
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
			<div class="span6">
				<div class="row-fluid recevable-report">
					<h2>Cash Receipt Report</h2>
					<p>
						Summary and detail cash receipt reports grouped by sources/ methods of receipts 
					</p>
					<div class="row-fluid">
						<table class="table table-borderless table-condensed">
							<tr>
								<td>
									<h3><a href="#/cash_receipt_summary">Cash Receipt By Summary</a></h3>
								</td>
								<td >
									<h3><a href="#/cash_receipt_detail">Cash Receipt By Detail</a></h3>								
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
									<h3><a href="#/cash_receipt_source_summary">Cash Receipt By Sources Summary</a></h3>
								</td>
								<td >
									<h3><a href="#/cash_receipt_source_detail">Cash Receipt By Sources Detail</a></h3>
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
</script>
<script id="customerList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
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
				                  					events: {change: licenseChange}">

									        <input 
												data-role="dropdownlist" 
												data-option-label="Location ..." 
												data-auto-bind="false" 
												data-value-primitive="false" 
												data-text-field="name" 
												data-value-field="id" 
												data-bind="
													value: blocSelect,
				                  					source: blocDS">

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
							<h2>Customer List</h2>
						</div>
						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th><span>CustomerID</span></th>
									<th><span>Customer Name</span></th>
									<th><span>License</span></th>
									<th><span>Address</span></th>
									<th><span>Phone</span></th>
									<th><span>E-Mail</span></th>
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
</script>
<script id="customerList-temp" type="text/x-kendo-template" >
	# kendo.culture(locale); #
	<tr style="font-weight: bold">
		<td>#=number.abbr# - #=number.code#</td>
		<td>#=fullname#</td>
		<td>#=license#</td>
		<td>#=address#</td>
		<td>#=phone#</td>
		<td>#=email#</td>
	</tr>
</script>
<script id="customerNoConnection" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">						
					</div>
					<br>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: institute.name"></h3>
							<h2>Customer No Connecting</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="disconnectList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
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
				                  					events: {change: licenseChange}">

									        <input 
												data-role="dropdownlist" 
												data-option-label="Location ..." 
												data-auto-bind="false" 
												data-value-primitive="false" 
												data-text-field="name" 
												data-value-field="id" 
												data-bind="
													value: blocSelect,
				                  					source: blocDS">

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
							<h2>Disconnect Customer List</h2>
						</div>
						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th><span>CustomerID</span></th>
									<th><span>Customer Name</span></th>
									<th><span>License</span></th>
									<th><span>Address</span></th>
									<th><span>Phone</span></th>
									<th><span>E-Mail</span></th>
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
</script>
<script id="newCustomerList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
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
				                  					events: {change: licenseChange}">

									        <input 
												data-role="dropdownlist" 
												data-option-label="Location ..." 
												data-auto-bind="false" 
												data-value-primitive="false" 
												data-text-field="name" 
												data-value-field="id" 
												data-bind="
													value: blocSelect,
				                  					source: blocDS">

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
							<h2>New Customer List</h2>
						</div>
						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th><span>Register Date</span></th>
									<th><span>Code</span></th>
									<th><span>Name</span></th>
									<th><span>Type</span></th>
									<th><span>License</span></th>
									<th><span>Location</span></th>
								</tr>
							</thead>
							<tbody data-role="listview"
								 data-bind="source: dataSource"
								 data-template="newCustomerList-temp"
							></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="newCustomerList-temp" type="text/x-kendo-template" >
	# kendo.culture(locale); #
	<tr style="font-weight: bold">
		<td>#=register_date#</td>
		<td>#=number.abbr# - #=number.code#</td>
		<td>#=name#</td>
		<td>#=type#</td>
		<td>#=license#</td>
		<td>#=bloc#</td>
		
	</tr>
</script>
<script id="miniUsageList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
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
				                  					events: {change: licenseChange}">

									        <input 
												data-role="dropdownlist" 
												data-option-label="Location ..." 
												data-auto-bind="false" 
												data-value-primitive="false" 
												data-text-field="name" 
												data-value-field="id" 
												data-bind="
													value: blocSelect,
				                  					source: blocDS">
				                  			<input type="text" 
							                	data-role="datepicker"
							                	data-format="MM-yyyy"
							                	data-start="year" 
								  				data-depth="year" 
							                	placeholder="Moth of ..." 
									           	data-bind="value: monthSelect" />
				                  			<input 
												class="k-textbox k-invalid" 
												data-bind="
													value: miniNumber">
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
							<h2>Minimum Water Usage List</h2>
						</div>
						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th><span>Meter Number</span></th>
									<th><span>Date</span></th>
									<th><span>License</span></th>
									<th><span>Address</span></th>
									<th><span>Usage</span></th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-bind="source: dataSource"
										 data-template="miniCustomerList-temp"
							></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="miniCustomerList-temp" type="text/x-kendo-template" >
	# kendo.culture(locale); #
	<tr style="font-weight: bold">
		<td>#=meter_number#</td>
		<td>#=from_date# - #=to_date#</td>
		<td>#=license#</td>
		<td>#=address#</td>
		<td>#=usage#</td>
	</tr>
</script>
<script id="saleSummary" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
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
							<h2>Sale Summary</h2>
							<p data-bind="text: strDate"></p>
						</div>
						<div class="row-fluid">						
							<div class="total-sale">
								<p>Total Sale</p>
								<span data-bind="text: total"></span>
							</div>	
						</div>
						<div id="grid"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="connectServiceRevenue" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">						
					</div>
					<br>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: institute.name"></h3>
							<h2>Connect Service Revenue</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleDetail" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">						
					</div>
					<br>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: institute.name"></h3>
							<h2>Sale Detail</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="otherRevenues" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">						
					</div>
					<br>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: institute.name"></h3>
							<h2>Other Revenues</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="accountReceivableList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">						
					</div>
					<br>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: institute.name"></h3>
							<h2>Account Receivable List</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerAgingSumList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">						
					</div>
					<br>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: institute.name"></h3>
							<h2>Customer Aging Summary List</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerDepositReport" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">						
					</div>
					<br>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: institute.name"></h3>
							<h2>Customer Deposit Report</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerAgingDetail" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">						
					</div>
					<br>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: institute.name"></h3>
							<h2>Customer Aging Detail</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashReceiptSummary" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">						
					</div>
					<br>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: institute.name"></h3>
							<h2>Cash Receipt Summary</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashReceiptSourceSummary" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">						
					</div>
					<br>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: institute.name"></h3>
							<h2>Cash Receipt Source Summary</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashReceiptDetail" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">						
					</div>
					<br>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: institute.name"></h3>
							<h2>Cash Receipt Detail</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashReceiptSourceDetail" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">						
					</div>
					<br>
					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="text: institute.name"></h3>
							<h2>Cash Receipt Source Detail</h2>
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

<script id="waterMenu" type="text/x-kendo-template">
	<ul class="topnav pull-left">
	  	<li><a href='#/' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/center'><span data-bind="text: lang.lang.center"></span></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='<?php echo base_url(); ?>/c2/rrd/#/customer' target="_blank"><span >New Customer</span></a></li> 
  				<li ><a href='#/reorder'><span >Reorder Meter</span></a></li>  				
  				<li><span class="li-line"></span></li>
  				<li><a href='#/reading'><span >Meter Reading</span></a></li> 
  				<!--li><a href='#/edit_reading'><span >Edit Reading</span></a></li-->
  				<li><span class="li-line"></span></li>
  				<li><a href='#/run_bill'><span >Run Bill</span></a></li> 
  				<li><a href='#/print_bill'><span >Print Bill</span></a></li>
  				<li><span class="li-line"></span></li>
  				<li><a href='#/receipt'><span >Receipt</span></a></li>
  			</ul>
	  	</li>	  	  	
	  	<li><a href="#/reports">Reports</a></li>	  	
	  	<li><a href='#/setting' class='glyphicons settings'><i></i></a></li>
	</ul>
</script>

<!-- ***************************
* widget templates
**************************** -->


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
    	pageLoad 			: function(){},
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
	banhji.source = kendo.observable({
		lang 						: langVM,
		countryDS					: dataStore(apiUrl + "countries"),
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
				create 	: {
					url: apiUrl + "contacts",
					type: "POST",
					headers: banhji.header,
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + "contacts",
					type: "PUT",
					headers: banhji.header,
					dataType: 'json'
				},
				destroy 	: {
					url: apiUrl + "contacts",
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
			filter: { field:"parent_id", operator:"where_related_contact_type", value:1 },
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
				create 	: {
					url: apiUrl + "contacts",
					type: "POST",
					headers: banhji.header,
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + "contacts",
					type: "PUT",
					headers: banhji.header,
					dataType: 'json'
				},
				destroy 	: {
					url: apiUrl + "contacts",
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
			filter: { field:"parent_id", operator:"where_related_contact_type", value:2 },
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
			filter: { field:"parent_id", operator:"where_related_contact_type", value:2 },
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
			filter: { field:"parent_id", operator:"where_related_contact_type", value:3 },
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
		//Prefixes
		invoicePrefixDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "prefixes",
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
			filter: { field:"type", operator:"where_in", value: ["Commercial_Invoice", "Vat_Invoice", "Invoice"] },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		cashSalePrefixDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "prefixes",
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
			filter: { field:"type", operator:"where_in", value: ["Commercial_Cash_Sale", "Vat_Cash_Sale", "Cash_Sale"] },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Item
		itemDS						: dataStore(apiUrl + "items"),
		itemTypeDS					: dataStore(apiUrl + "item_types"),
		itemGroupDS					: dataStore(apiUrl + "items/group"),
		brandDS						: dataStore(apiUrl + "brands"),
		categoryDS					: dataStore(apiUrl + "categories"),
		itemForSupplierDS			: new kendo.data.DataSource({
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
		inventoryForSaleDS			: new kendo.data.DataSource({
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
			sort:{ field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		itemForSaleDS				: new kendo.data.DataSource({
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
			filter:{ field:"item_type_id", operator:"where_not_in", value:[3] },
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
				{ field:"item_type_id", operator:"where_in", value: [1,4] },
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
		//Tax
		taxItemDS					: dataStore(apiUrl + "tax_items"),
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
		loadData 					: function(){
			this.loadRate();
			this.itemTypeDS.read();
			this.measurementDS.query({
				filter:[],
				page:1,
				pageSize:100
			});
			this.loadAccount();
			this.accountTypeDS.read();
			this.fixedAssetCategoryDS.read();
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
		},
		loadAcct 					: function(){
			var self = this, dfd = $.Deferred();
			if(this.accountList.length>0) {
				dfd.resolve(this.accountList);
			} else {
				this.accountDS.query({
					filter:[]
				}).then(function(){
					var view = self.accountDS.view();

					$.each(view, function(index, value){
						self.accountList.push(value);
					});
					dfd.resolve(self.accountList);
				});
			}
			return dfd.promise();
		},
		loadAccount 				: function(){
			var self = this, raw = this.get("accountList");

			//Clear array
			if(raw.length>0){
				raw.splice(0,raw.length);
			}

			this.accountDS.query({
				filter:[]
			}).then(function(){
				var view = self.accountDS.view();

				$.each(view, function(index, value){
					raw.push(value);
				});
			});
		},
		fetchAllItems				: function(){
			this.itemDS.fetch();
			this.itemForSaleDS.fetch();
			this.itemForSupplierDS.fetch();
			this.inventoryForSaleDS.fetch();
		},
		fetchAllAccounts			: function(){
		},
		fetchAllTaxes 				: function(){
			this.customerTaxDS.fetch();
			this.supplierTaxDS.fetch();
		},
		getPaymentTerm 				: function(id){
			var data = this.paymentTermDS.get(id);
			return data.name;
		},
		//Water
		tradeDiscountDS 			: new kendo.data.DataSource({
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
		depositAccountDS 			: new kendo.data.DataSource({
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
		incomeAccountDS 			: new kendo.data.DataSource({
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
		})
	});
	/*************************
	*	Water Section   	* 
	**************************/
	//Setting
	banhji.setting = kendo.observable({
		lang 				: langVM,
		contactTypeName 	: "",
		contactTypeAbbr 	: "",
        contactTypeCompany 	: 0,
        blockCompanyId  	: 0,
        tabGo 				: 0,
        depositAccDS 		: banhji.source.depositAccountDS,
        exAccountDS 		: banhji.source.tradeDiscountDS,
        tariffAccDS	 	 	: banhji.source.incomeAccountDS,
        blocDS 				: dataStore(apiUrl + "locations"),
        brandDS 			: banhji.source.brandDS,
        planItemDS			: dataStore(apiUrl + "plans/items"),
        tariffItemDS		: dataStore(apiUrl + "plans/tariff"),
        txnTemplateDS		: dataStore(apiUrl + "transaction_templates"),
        objBloc 			: null,
        currencyDS  		: banhji.source.currencyDS,
        licenseDS 			: dataStore(apiUrl + "branches"),
        branchDS 			: dataStore(apiUrl + "branches"),
        planDS 				: dataStore(apiUrl + "plans"),
		contactTypeDS 		: banhji.source.customerTypeDS,
		typeUnit 			: [{id:"m3", name: "m3"},{id:"money", name: "Money"},{ id:"%", name: "%"}],
		typeFlat 			: [{id:"0", name: "Not Flat"},{id:"1", name: "Flat"}],
		tariffItemFlat 		: 0,
		tariffSelect 		: false,
		tariffNameShow 		: null,
		exCurrency 			: null,
		planSelect 			: false,
		priceUnit 			: true,
		percentUnit 		: false,
		meterUnit 			: false,
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
		unitChange 			: function(e){
			this.set("exPrice","");
			if(this.exUnit === "%"){
				this.set("percentUnit", true);
				this.set("priceUnit", false);
				this.set("meterUnit", false);
			}else if(this.exUnit === "m3"){
				this.set("percentUnit", false);
				this.set("priceUnit", false);
				this.set("meterUnit", true);
			}else{
				this.set("percentUnit", false);
				this.set("priceUnit", true);
				this.set("meterUnit", false);
			}
		},
		addContactType 		: function(){
        	var name = this.get("contactTypeName"), self = this;
        	if(name && this.get("contactTypeAbbr")){
	        	this.contactTypeDS.add({
	        		parent_id 	: 1,
	        		name 		: name,
	        		abbr 		: this.get("contactTypeAbbr"),
	        		description : "",
	        		is_company 	: this.get("contactTypeCompany"),
	        		is_system 	: 0
	        	});
	        	this.contactTypeDS.sync();
	        	this.contactTypeDS.bind("requestEnd", function(e){
					if(e.type != 'read') {
						if(e.response){
							$("#ntf1").data("kendoNotification").success("Successfully!");
							self.set("contactTypeName", "");
				        	self.set("contactTypeAbbr", "");
				        	self.set("contactTypeCompany", 0);
						}
					}
				});
        	}else{
        		alert("Fiels Required!");
        	}
        },
        addBloc 			: function(){
        	var branch = this.get("blockCompanyId"),
        	self = this;
        	if(branch && this.get("blocName") && this.get("blocAbbr")){
	        	this.blocDS.add({
	        		branch 		: {id : branch.id, name: branch.name},
	        		name 		: this.get("blocName"),
	        		abbr 		: this.get("blocAbbr")
	        	});
	        	this.blocDS.sync();
	        	this.blocDS.bind("requestEnd", function(e){
					if(e.type != 'read') {
						if(e.response){
							$("#ntf1").data("kendoNotification").success("Successfully!");
							self.set("blocName", "");
				        	self.set("blocAbbr", "");
				        	self.set("blockCompanyId", 0);
						}
					}
				});
        	}else{
        		alert("Fiels Required!");
        	}
        },
        goExemption    		: function(){
        	this.planItemDS.data([]);
        	this.planItemDS.filter({field: "type", value: "exemption"});
        },
        addEx 				: function(){
        	var self = this;
        	if(this.get("exName") && this.get("exAccount") && this.get("exUnit") && this.get("exCurrency") && this.get("exPrice")){
	        	this.planItemDS.add({
	        		name 		: this.get("exName"),
	        		type     	: "exemption",
	        		is_flat 	: false,
	        		usage 		: 0,
	        		account 	: this.get("exAccount"),
	        		unit 		: this.get("exUnit"),
	        		currency 	: this.get("exCurrency"),
	        		amount 		: this.get("exPrice"),
	        		_currency 	: []
	        	});
	        	this.planItemDS.sync();
	        	this.planItemDS.bind("requestEnd", function(e){
					if(e.type != 'read') {
						if(e.response){				
							$("#ntf1").data("kendoNotification").success("Successfully!");
							self.set("exName", "");
				        	self.set("exAccount", "");
				        	self.set("exPrice", "");
				        	self.set("exUnit", "");
				        	self.set("exCurrency", "");
				        }
					}
				});
			}else{
				alert("Fields Required!");
			}
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
        	if(this.get("tariffItemName") && this.get("tariffItemUsage") && this.get("tariffItemAmount")){
	        	this.tariffItemDS.data([]);
	        	this.tariffItemDS.add({
	        		name 		: this.get("tariffItemName"),
	        		type     	: "tariff",
	        		tariff_id	: this.get('current').id,
	        		account   	: this.get('current').account,
	        		is_flat   	: this.get("tariffItemFlat"),
	        		unit 		: null,
	        		usage 		: this.get("tariffItemUsage"),
	        		amount 		: this.get("tariffItemAmount"),
	        		currency 	: this.get("current").currency,
	        		_currency   : []
	        	});
	        	this.tariffItemDS.sync();
	        	this.tariffItemDS.bind("requestEnd", function(e){
	        		if(e.type != 'read') {
		        		if(e.response) {
		        			$("#ntf1").data("kendoNotification").success("Successfully!");
		        			self.set("tariffItemName", "");
				        	self.set("tariffItemFlat", 0);
				        	self.set("tariffItemUsage", "");
				        	self.set("tariffItemAmount", "");
				        	self.set("windowTariffItemVisible", false);
				        	self.closeTariffWindowItem();
				        	self.closeTariffWindowItem();
				        	self.tariffItemDS.filter({field: "tariff_id", value: self.get('current').id});
		        		}
		        	}
	        	});
	        	this.tariffItemDS.bind("error", function(e){
	        		alert("Usage is already exist!");
	        	});
	        }else{
	        	alert("Fields Required!");
	        }
        },
        updateTariffItem : function(e){
        	this.tariffItemDS.sync();
	        	this.tariffItemDS.bind("requestEnd", function(e){
	        		if(e.type != 'read') {
		        		if(e.response) {
		        			$("#ntf1").data("kendoNotification").success("Successfully!");
				        	self.tariffItemDS.filter({field: "tariff_id", value: self.get('current').id});
		        		}
		        	}
	        	});
	        	this.tariffItemDS.bind("error", function(e){
	        		alert("Usage is already exist!");
	        	});
        },
        addTariff 		: function(e){
        	var self = this;
        	if(this.get("tariffName") && this.get("tariffAccount") && this.get("tariffCurrency")){
	        	this.planItemDS.add({
	        		name 		: this.get("tariffName"),
	        		type     	: "tariff",
	        		is_flat   	: 0,
	        		tariff_id 	: 0,
	        		unit 		: 0,
	        		currency 	: this.get("tariffCurrency"),
	        		account 	: this.get("tariffAccount"),
	        		usage 		: 0,
	        		amount 		: 0,
	        		_currency 	: []
	        	});
	        	this.planItemDS.sync();
	        	this.planItemDS.bind("requestEnd", function(e){
	        		if(e.type != 'read') {
		        		if(e.response) {
		        			$("#ntf1").data("kendoNotification").success("Successfully!");
		        			self.set("tariffName", "");
		        			self.set("tariffAccount", "");
		        			self.set("tariffCurrency", "");
		        		}
	        		}
	        	});
	        	this.planItemDS.bind("error", function(e){
	        		console.log("error");
	        	});
	        }else{
	        	alert("Fields Required!");
	        }
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
        	var self = this;
        	if(this.get("depositName") && this.get("depositAccount") && this.get("depositCurrency") && this.get("depositPrice")){
	        	this.planItemDS.add({
	        		name 		: this.get("depositName"),
	        		type     	: "deposit",
	        		is_flat   	: false,
	        		unit 		: null,
	        		account 	: this.get("depositAccount"),
	        		usage 		: 0,
	        		currency 	: this.get("depositCurrency"),
	        		amount 		: this.get("depositPrice"),
	        		_currency 	: []
	        	});
	        	this.planItemDS.sync();
	        	this.planItemDS.bind("requestEnd", function(e){
	        		if(e.type != 'read') {
		        		if(e.response) {
		        			$("#ntf1").data("kendoNotification").success("Successfully!");
				        	self.set("depositName", "");
				        	self.set("depositPrice", "");
				        	self.set("depositCurrency", "");
				        	self.set("depositAccount", "");
				        }
				    }
				});
			}else{
				alert("Fields Required!");
			}
        },
        goService    		: function(){
        	this.planItemDS.data([]);
        	this.planItemDS.filter({field: "type", value: "service"});
        },
        addService			: function(){
        	var self = this;
        	if(this.get("serviceName") && this.get("serviceAccount") && this.get("serviceCurrency") && this.get("servicePrice")){
	        	this.planItemDS.add({
	        		name 		: this.get("serviceName"),
	        		type     	: "service",
	        		is_flat   	: false,
	        		unit 		: null,
	        		account 	: this.get("serviceAccount"),
	        		usage 		: 0,
	        		currency 	: this.get("serviceCurrency"),
	        		amount 		: this.get("servicePrice"),
	        		_currency  	: []
	        	});
	        	this.planItemDS.sync();
	        	this.planItemDS.bind("requestEnd", function(e){
	        		if(e.type != 'read') {
		        		if(e.response) {
		        			$("#ntf1").data("kendoNotification").success("Successfully!");
				        	self.set("serviceName", "");
				        	self.set("servicePrice", "");
				        	self.set("serviceCurrency","");
				        	self.set("serviceAccount", "");
				       	}
				    }
				});
			}else{
				alert("Fields Required!");
			}
        },
        goMaintenance    		: function(){
        	this.planItemDS.data([]);
        	this.planItemDS.filter({field: "type", value: "maintenance"});
        },
        addMaintenance			: function(){
        	var self = this;
        	if(this.get("maintenanceName") && this.get("maintenanceAccount") && this.get("maintenanceCurrency") && this.get("maintenancePrice")){
	        	this.planItemDS.add({
	        		name 		: this.get("maintenanceName"),
	        		type     	: "maintenance",
	        		is_flat   	: false,
	        		unit 		: null,
	        		account 	: this.get("maintenanceAccount"),
	        		usage 		: 0,
	        		currency 	: this.get("maintenanceCurrency"),
	        		amount 		: this.get("maintenancePrice"),
	        		_currency   : []
	        	});
	        	this.planItemDS.sync();
	        	this.planItemDS.bind("requestEnd", function(e){
	        		if(e.type != 'read') {
		        		if(e.response) {
		        			$("#ntf1").data("kendoNotification").success("Successfully!");
				        	self.set("maintenanceName", "");
				        	self.set("maintenancePrice", "");
				        	self.set("maintenanceAccount", "");
				        	self.set("maintenanceCurrency","");
				       	}
				    }
				});
			}else{
				alert("Fields Required!");
			}
        },
        goPlan 				: function(){
        	this.planDS.read();
        	this.planItemDS.data([]);
        	this.set("planSelect", false);
        },
        viewPlanItem 		: function(e){
        	var data = e.data, self = this;
        	var idList = [];
        	$.each(data.items, function(index, value){
        		idList.push(value.item);
        	});
        	this.set("planSelect", true);
        	this.planItemDS.data([]);
        	this.planItemDS.query({filter: { field:"id", operator:"where_in", value: idList }})
        	.then(function(e){
        		var view = self.planItemDS.view();
        	});
        },
        goBrand    		: function(){
        	this.brandDS.data([]);
        	this.brandDS.filter({field: "sub_of", value: "water"});
        },
        addBrand 			: function(){
        	var self = this;
        	if(this.get("brandCode") && this.get("brandName") && this.get("brandAbbr")){
	        	this.brandDS.add({
	        		sub_of 		: "water",
	        		code 		: this.get("brandCode"),        		
	        		name 		: this.get("brandName"),
	        		abbr 		: this.get("brandAbbr")
	        	});
	        	this.brandDS.sync();	        	    			
	        	this.brandDS.bind("requestEnd", function(e){
	        		if(e.type != 'read') {
		        		if(e.response) {
		        			$("#ntf1").data("kendoNotification").success("Successfully!");
			    			self.set("brandCode", "");
			    			self.set("brandName", "");
			    			self.set("brandAbbr", "");	
			    		}
			    	}
			    });
        	}else{
        		alert("Fields Required!");
        	}
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
	banhji.addLicense = kendo.observable({
		dataSource 	: dataStore(apiUrl + "branches"),
		provinceDS 	: dataStore(apiUrl + "provinces"),
		districtDS 	: dataStore(apiUrl + "districts"),
		toDay 		: new Date(),
		obj 		: null,
		provinceSelect : [],
		attachmentDS	: dataStore(apiUrl + "attachments"),
		isEdit      : false,
		selectType 	: [{id: "1", name: "Active"},{id: "0", name: "Inactive"},{id: "2", name: "Void"}],
		selectCurrency : [{id: "3", name: "KHR"},{id: "1", name: "USD"},{id: "10", name: "THB"},{id: "11", name: "VND"}],
		pageLoad    : function(id){
			if(id){
				this.loadObj(id);
				this.attachmentDS.filter({field: "license_id", value: id});
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
	            		license_id 		: obj.id,
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
	    uploadFile 			: function(id){
	    	if(id){
	    		this.attachmentDS.pushUpdate({license_id: id});
	    	}
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
	    removeFile 			: function(e){
	    	var data = e.data;

	    	if (confirm(banhji.source.confirmMessage)) {
	    		this.attachmentDS.remove(data);
	    	}	    	
	    },
		save 		: function() {
			var self = this;
			if(this.get("obj").number){
				if(this.dataSource.data().length > 0) {
					if(this.dataSource.hasChanges() == true ){
						this.dataSource.sync();
						this.dataSource.bind("requestEnd", function(e){
							if(e.type != 'read') {
								if(e.response){				
						    		$("#ntf1").data("kendoNotification").success("Successfully!");
						    		//self.dataSource.addNew();
									banhji.router.navigate("/setting");
									banhji.setting.licenseDS.fetch();
									self.uploadFile(e.response.results[0].id);
								}
							}else{
								console.log("Read");
							}					  				
					    });
					    this.dataSource.bind("error", function(e){		    		    	
							$("#ntf1").data("kendoNotification").error("Error!"); 			
					    });
					}else{
						if(this.attachmentDS.hasChanges() == true) {
							banhji.router.navigate("/setting");
							banhji.setting.licenseDS.fetch();
							this.uploadFile();
						}
					}
				}
			}else{
				alert("License Number required!");
			}
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();	
			this.dataSource.data([]);
			this.attachmentDS.cancelChanges();	
			this.attachmentDS.data([]);
			window.history.back();
		}
	});
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
		ItemTypeDS  : [{id:"exemption",name: "Exemption"}, {id: "tariff",name: "Tariff"},{id:"deposit",name:"Deposit"},{id:"service",name:"Service"},{id:"maintenance",name:"Maintenance"},{id:"installment",name:"Installment"}],
		addNewItemType : null,
		current 	: null,
		currencyDS  : banhji.source.currencyDS,
		list 		: [],
		planItemList: [],
		pageLoad    : function(id){
			if(id){
				this.loadObj(id);
			}else{
				this.addNew();
				//this.itemDS.read();
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
			selected = e.sender.selectedIndex,
			dataitemDs = this.itemDS.at(selected);
			console.log(data);
			data.set("type", dataitemDs.type);
			data.set("name", dataitemDs.name);
			data.set("amount", dataitemDs.amount);
		}, 
		currencyChange : function(e) {
			var data = e.data;
			console.log(this.current.currency);
			this.itemDS.filter({field: "currency_id", value: this.current.currency});
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
			this.get("current").items.push({item:"", type: "", name: "", amount: 0});
		},
		removeItem 	: function(e) {
			this.items.remove(e);
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
	//end Setting
	
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
    //Activate User
	banhji.waterActivateUser = kendo.observable({
		lang 				: langVM,
		dataSource  		: dataStore(apiUrl + "activate_water"),
		numberDS  			: dataStore(apiUrl + "activate_water"),
		existingDS	  		: dataStore(apiUrl + "activate_water"),
		licenseDS 			: dataStore(apiUrl + "branches"),
		blocDS 				: dataStore(apiUrl + "locations"),
		contactDS 			: dataStore(apiUrl + "contacts"),
		obj 				: null,
		contactOBJ 			: null,
		Codeabbr 			: null,
		Codenumber 			: null,
		notDuplicateNumber 	: true,
		isEdit 				: false,
		pageLoad 			: function(id){
			var self = this;
			this.addEmpty(id);
			this.licenseDS.read();
			this.contactDS.query({filter: [{ field: "id", value: id}]})
			.then(function(){
				var view = self.contactDS.data();
				self.set("contactOBJ", view[0]);
			});
		},
		licenseChange 			: function(e){
			var obj = this.get("obj"), self = this;
			this.blocDS.filter({field: "branch_id", value: obj.branch_id});
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
				branch_id 			: null,
				abbr 				: null,
				location_id  		: null,
				type 				: "w",
				family_member 		: null,
				id_card 			: null,
				occupation 			: null
	    	});
			var obj = this.dataSource.at(0);			
			this.set("obj", obj);
		},
		BlocChange 			: function(e) {
			var obj = this.get("obj"), self = this;
			this.blocDS.query({    			
				filter: { field:"id", value: obj.location_id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.blocDS.view();	
				self.goNumber(view[0].abbr);
				self.set("Codeabbr", view[0].abbr);
				self.dataSource.pushUpdate({abbr: view[0].abbr});
			});
		},
		goNumber 			: function(abbr) {
			var self = this, obj = this.get("obj");
			this.numberDS.query({    			
				filter: { field:"abbr", value: abbr },
				sort: { field:"code", dir:"desc" },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.numberDS.view();
				var lastNo;
				if(self.numberDS._total > 0){
					lastNo = kendo.parseInt(view[0].code) + 1;
				}else{
					lastNo = 1;
				}
				if(lastNo){
					obj.set("code",lastNo);
					self.set("Codenumber", lastNo);
				}
			});
		},
		checkExistingNumber 	: function(){
			var self = this, para = [], 
			obj = this.get("obj");			
			
			if(obj.code!==""){

				para.push({ field:"abbr", value: obj.abbr });
				para.push({ field:"code", value: obj.code });
				
				this.existingDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.existingDS.view();
					
					if(view.length>0){
				 		self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
					console.log(self.notDuplicateNumber);
				});
			}		
		},
		save 				: function() {
			var self = this;
			// if(this.notDuplicateNumber == )
			if(this.dataSource.data().length > 0) {
				
				this.dataSource.sync();
				this.dataSource.bind("requestEnd", function(e){
					if(e.type != 'read') {
				    	if(e.response){				
				    		$("#ntf1").data("kendoNotification").success("Activated user successfully!");
				    		self.cancel();
						}				  	
					}			
			    });
			    this.dataSource.bind("error", function(e){		    		    	
					$("#ntf1").data("kendoNotification").error("Error activated!"); 
					//$("#loadImport").css("display","none");				
			    });
			}	
			
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();		
			window.history.back();
		}
	});
	/* Invoice Section */
	banhji.transactionLine = kendo.observable({
		dataSource 		: dataStore(apiUrl + "journal_lines"),
		addById 		: function(transactionId, contactId, accountId, description, dr, cr, issuedDate) {
			// todo: create chart of accounts: water_sale_revenue(42610) & service_charge(42620) & maintenance(42630)
			// get from customer 
			this.dataSource.add({					
				transaction_id 		: transactionId,
				account_id 			: accountId,				
				contact_id 			: contactId,				
				description 		: description,
				reference_no 		: "",
				job_id 				: "",
				segments 	 		: [],								
				dr 	 				: dr,
				cr 					: cr,				
				rate				: banhji.source.getRate(banhji.locale, issuedDate),
				locale				: banhji.locale
			});
		},
		save 			: function() {
			// customer account and Cash account
			var that = this, dfd = $.Deferred();
			this.dataSource.sync();
			this.dataSource.bind('requestEnd', function(e){
				if(e.response && e.type != 'read') {
					dfd.resolve(e.response.results);
				} else {
					dfd.reject(false);
				}
			});
			this.dataSource.bind('error', function(e){
				dfd.reject(false);
			});
			return dfd.promise();
		}
	});
	banhji.transaction = kendo.observable({
		dataSource 		: dataStore(apiUrl + "transactions"),
		makeInvoice 	: function(contactId, payment, amount, type) {
			var duedate = new Date(), dfd = $.Deferred();
			duedate.setDate(duedate.getDate() + 7);				

			banhji.transaction.dataSource.insert(0, {				
				contact_id 			: contactId,//Customer
				transaction_template_id : 3,
				payment_term_id		: 0,				
				reference_id 		: "",
				recurring_id 		: "",
				job_id 				: 0,				
				user_id 			: banhji.userData.id,
				employee_id 		: "",//Sale Rep 	    		
			   	type				: type,//Required
			   	sub_total 			: 0,
			   	discount 			: 0,
			   	tax 				: 0,
			   	deposit 			: 0,			   	
			   	amount				: amount,
			   	remaining 			: 0,
			   	credit_allowed 		: 0,
			   	rate				: 1,			   	
			   	locale 				: banhji.locale,			   	
			   	issued_date 		: new Date(),
			   	due_date 			: duedate,			   	
			   	bill_to 			: "",
			   	ship_to 			: "",
			   	memo 				: "",
			   	memo2 				: "",
			   	status 				: 0,
			   	segments 			: [],
			   	is_journal 			: 0,
			   	//Recurring
			   	recurring_name 		: "",
			   	start_date 			: new Date(),
			   	frequency 			: "Daily",
			   	month_option 		: "Day",
			   	interval 			: 1,
			   	day 				: 1,
			   	week 				: 0,
			   	month 				: 0,
			   	is_recurring 		: 0				
	    	});		    		
			if(banhji.transaction.dataSource.at(0)) {
				dfd.resolve(banhji.transaction.dataSource.at(0));
			} else {
				dfd.reject(false);
			}
			return dfd.promise();
		},
		save 			: function() {
			var that = this, dfd = $.Deferred();
			banhji.transaction.dataSource.sync();
			banhji.transaction.dataSource.bind('requestEnd', function(e){
				if(e.response && e.type != 'read') {
					dfd.resolve(e.response.results);
				} else {
					dfd.reject(false);
				}
			});
			banhji.transaction.dataSource.bind('error', function(e){
				dfd.reject(false);
			});
			return dfd.promise();
		}
	});
	banhji.installment = kendo.observable({
		dataSource 			: dataStore(apiUrl + "installments"),
		startDate 			: new Date(),
		period 				: 12,
		setDate 			: function(date) {
			this.set('startDate', date);
		},
		setPeriod 			: function(period) {
			this.set('period', period);
		},
		makeSchedule 		: function(amount, contactId, startDate, period) {
			var dfd = $.Deferred();
			try {
				if(amount == undefined) throw "TypeError: Amount is not defined";
				if(contactId == undefined) throw "TypeError: Contact ID is not defined";
				
				banhji.installment.dataSource.insert(0, {
					biller_id 	: banhji.userData.id,
					contact_id 	: contactId,
					start_month : kendo.toString(startDate, 'yyyy-MM-dd'),
					amount 		: amount,
					payment_number: null,
					period 		: period,
					invoiced 	: 0
				});
				dfd.resolve(banhji.installment.dataSource.at(0));
				return dfd.promise();
			} catch (err) {
				console.log(err);
				dfd.reject(err);
			}
			
		},
		save 				: function() {
			var dfd = $.Deferred();
			banhji.installment.dataSource.sync();
			banhji.installment.dataSource.bind('requestEnd', function(e){
				if(e.response) {
					dfd.resolve(e.response.results);
				} else {
					dfd.reject(false);
				}
			});
			banhji.installment.dataSource.bind('error', function(e){
				dfd.reject(e);
			});
			return dfd.promise();
		}
	});
	// Invoice
	banhji.invoice = kendo.observable({
		makes 	: new kendo.data.DataSource({
	      transport: {
	        read  : {
	          url: baseUrl + 'api/winvoices/make',
	          type: "GET",
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
	      pageSize: 100
	    }),
		dataSource 	: new kendo.data.DataSource({
	      transport: {
	      	read  : {
	          url: baseUrl + 'api/winvoices',
	          type: "GET",
	          dataType: 'json',
	          headers: { Institute: JSON.parse(localStorage.getItem('userData/user')).institute.id }
	        },
	        create  : {
	          url: baseUrl + 'api/winvoices',
	          type: "POST",
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
	/* End of Invoice Section */
	/*==== Meter=====*/
	banhji.meter = kendo.observable({
		lang 				: langVM,
		dataSource  		: dataStore(apiUrl + "meters"),
		planDS 				: dataStore(apiUrl + "plans"),
		userActivatDS 		: dataStore(apiUrl + "activate_water"),
		brandDS 			: banhji.source.brandDS,
		locationDS 			: dataStore(apiUrl + "locations"),
		itemDS 				: null,
		obj 				: null,
		isEdit 				: false,
		contact 			: null,
		selectType 			: [
			{id: 1, name: "Active"},
			{id: 0, name: "Inactive"},
			{id: 2, name: "Void"}],
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
				self.loadMap();	
			});
		},
		loadMap : function(){
			var obj = this.get("obj");
			// console.log(obj);
			lat = kendo.parseFloat(obj.latitute),
			lng = kendo.parseFloat(obj.longtitute);
			
			if(lat && lng){
				var myLatLng = {lat:lat, lng:lng};
				var mapOptions = {
					zoom: 17,					
					center: myLatLng,
					mapTypeControl: false,
					zoomControl: false,
					scaleControl: false,
					streetViewControl: false
				};
				var map = new google.maps.Map(document.getElementById('map'),mapOptions);
				var marker = new google.maps.Marker({
					position: myLatLng,
					map: map
					// title: obj.company
				});
			} 
		},
		addEmpty 		 	: function(id){		
			var self = this;	
			this.dataSource.data([]);		
			this.set("obj", null);		
			this.set("isEdit", false);	
			this.userActivatDS.query({filter: [{field: "contact_id", value: id}]})
			.then(function(){
				var view = self.userActivatDS.data();
				self.dataSource.insert(0,{				
					contact_id		: id,
					meter_number 	: null,
					status 			: 1,
					location_id 	: 0,
					branch_id 		: view[0].branch_id,
					brand_id 		: 0,
					latitute 		: null,
					longtitute  	: null,
					plan_id 		: 0,
					date_used 		: null,
					map 			: null,
					memo 			: null,
					type 			: {id: "w", name: "Water"},
					starting_no 	: null,
					activated 		: 0,
					number_digit 	: null,
					image_url 		: "https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg"
		    	});		
				var obj = self.dataSource.at(0);			
				self.set("obj", obj);
			});	
				
		},
		onSelect 				: function(e){
	        // Array with information about the uploaded files
	        var self = this, 
	        files = e.files[0],
	        obj = this.get("obj");

	        var fileReader = new FileReader();
	        fileReader.onload = function (event) {
	            var mapImage = event.target.result;
	            self.obj.set('image_url', mapImage);
	        }
	        fileReader.readAsDataURL(files.rawFile);
			
	        // Check the extension of each file and abort the upload if it is not .jpg	       
            if (files.extension.toLowerCase() === ".jpg"
            	|| files.extension.toLowerCase() === ".jpeg"
            	|| files.extension.toLowerCase() === ".tiff"
            	|| files.extension.toLowerCase() === ".png" 
            	|| files.extension.toLowerCase() === ".gif"){

            	if(this.attachmentDS.total()>0){
            		var att = this.attachmentDS.at(0);
            		this.attachmentDS.remove(att);
            	}

            	var key = 'ITEM_' + banhji.institute.id + "_" + Math.floor(Math.random() * 100000000000000001) +'_'+ files.name;

            	this.attachmentDS.add({
            		user_id 		: this.get("user_id"),
            		item_id 		: obj.id,
            		type 			: "Item",
            		name 			: files.name,
            		description 	: "",
            		key 			: key,
            		url 			: banhji.s3 + key,
            		size 			: files.size,
            		created_at 		: new Date(),

            		file 			: files.rawFile
            	});
            }else{
            	alert("This type of file is not allowed to attach.");
            }
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
			banhji.router.navigate("/center");
		}
	});
	banhji.ActivateMeter = kendo.observable({
		lang 				: langVM,
		meterDS     		: dataStore(apiUrl + "meters"),
		worderDS     		: dataStore(apiUrl + "meters"),
		dataSource 			: null,
		planDS 				: dataStore(apiUrl + "plans"),
		cashAccountDS  		: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter: [
				{ field:"account_type_id", value: 10 },
				{ field:"status", value: 1 }
			],
		  	sort: { field:"number", dir:"asc" }
		}),
		paymentMethodDS 	: dataStore(apiUrl + "payment_methods"),
		meterObj	 		: null,
		isEdit 				: false,
		obj 				: [],
		installShow 		: false,
		startDate 			: new Date(),
		issued_date 		: new Date(),
		period 				: 12,
		showInstallment 	: false,
		pageLoad 			: function(id){
			$("#loadImport").css("display","block");
			var self = this;				
			this.meterDS.query({    			
				filter: { field:"id", value: id },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.meterDS.view();	
				self.set("meterObj", view[0]);
				self.setObj(view[0].plan_id);
				self.goWorder(view[0].branch_id, view[0].location_id);
			});	
			
		},
		cashAccount 		: null,
		paymentMethod 		: null,
		checkNumber 		: null,
		amountRecievChange 	: function(e){
			var amount = this.get("NamountToBeRecieved");
			var new_amount = e.data.amountToBeRecieved;
			if(new_amount < amount){
				this.set("installShow", true);
			}else{
				this.set("installShow", false);
			}
		},
		items :[],
		lWorder: 0,
		goWorder 			: function(branch_id, location_id) {
			var self = this, meterObj = this.get("meterObj");
			this.worderDS.query({    			
				filter: [{field:"activated", value: 1},{ field:"branch_id", value: branch_id },{field:"location_id", value: location_id}],
				sort: { field:"worder", dir:"desc" },
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.worderDS.view();
				var lastNo;
				if(self.worderDS._total > 0){
					lastNo = kendo.parseInt(view[0].worder) + 1;
				}else{
					lastNo = 1;
				}
				if(lastNo){
					console.log(lastNo);
					$("#loadImport").css("display","none");
					//self.set("lWorder", lastNo);
					meterObj.set('worder',lastNo );
				}
			});
		},
		amountToBeRecieved 	: 0.0,
		amountBilled 		: 0.0,
		amountRemain 		: 0.00,
		onAmountChange 		: function(e) {
			var that = this;
			if(this.items.length > 0) {
				var amount = 0.00;
				$.each(this.items, function(i, v){
					amount += kendo.parseFloat(v.received);
				});
				var remain = this.get('amountBilled') - amount;
				this.set('amountRemain', remain);
				this.set('amountToBeRecieved', amount);
				if(this.get('amountRemain') > 0) {
					this.set('showInstallment', true);
				} else {
					this.set('showInstallment', false);
				}
			}
		},
		NamountToBeRecieved : 0.0,
		setObj 				: function(plan_id){
			var self = this;
			this.planDS.query({
				filter: {field: "id", value: plan_id}
			})
			.then(function(e){
				var data = self.planDS.view()[0];
				self.items.splice(0, self.items.length);
				var amount = 0.0;
				$.each(data.items, function(i, v){
					if(v.type == 'service' || v.type== 'deposit'){
						self.items.push({id: v.item, account_id: v.account_id, name: v.name, type: v.type, amount: v.amount, received: v.amount});
						amount += parseFloat(v.amount);
					}
				});
				self.set('amountBilled', amount);
				self.set('NamountToBeRecieved', amount);
			});
		},
		save 				: function() {
			console.log('save');
			$("#loadImport").css("display","block");
			var self = this;
			var amount = 0.0;
			$.each(this.items, function(i, v){
				amount += parseFloat(v.amount);
			});
			if(this.get('amountToBeRecieved') < amount) {
				// create one invoice
				banhji.transaction.makeInvoice(this.get('meterObj').contact[0].id, this.get('paymentMethod'), this.get('amountToBeRecieved'), 'Meter_Activation')
				.then(function(data){
					// create invoice
					// console.log(amount - kendo.parseFloat(banhji.ActivateMeter.get('amountToBeRecieved')));
					if(data) {
						return banhji.transaction.save();
					} else {
						return false;
					}
				})
				.then(function(transaction){
					// create invoice line
					if(transaction[0]){	
						$.each(banhji.ActivateMeter.items, function(i, v){
							if(v.type == 'service') {
								var amount = 0.00;
								banhji.transactionLine.addById(transaction[0].id, banhji.ActivateMeter.get('meterObj').contact[0].id, banhji.ActivateMeter.get('cashAccount'), 'Meter Activation', v.received, 0, banhji.ActivateMeter.get('issued_date'));

								banhji.transactionLine.addById(transaction[0].id, banhji.ActivateMeter.get('meterObj').contact[0].id, banhji.ActivateMeter.get('meterObj').contact[0].account_id, 'Meter Activation', v.amount - v.received, 0, banhji.ActivateMeter.get('issued_date'));

								if(banhji.ActivateMeter.get('amountToBeRecieved') > 0) {
									banhji.transactionLine.addById(transaction[0].id, banhji.ActivateMeter.get('meterObj').contact[0].id, v.account_id, 'Meter Activation', 0, v.amount, banhji.ActivateMeter.get('issued_date'));
								} else {
									banhji.transactionLine.addById(transaction[0].id, banhji.ActivateMeter.get('meterObj').contact[0].id, v.account_id, 'Meter Activation', 0, banhji.ActivateMeter.get('amountBilled'), banhji.ActivateMeter.get('issued_date'));
								}
								
							}

							if(v.type == 'deposit' && v.received > 0) {
								banhji.transactionLine.addById(transaction[0].id, banhji.ActivateMeter.get('meterObj').contact[0].id, banhji.ActivateMeter.get('cashAccount'), 'Meter Activation', v.received, 0, banhji.ActivateMeter.get('issued_date'));
								banhji.transactionLine.addById(transaction[0].id, banhji.ActivateMeter.get('meterObj').contact[0].id, v.account_id, 'Meter Activation', 0, v.received, banhji.ActivateMeter.get('issued_date'));
							}
						});
						
						return banhji.transactionLine.save();
					} else {
						return false;
					}
				})
				.then(function(lines){
					// then change meter activated field to 1
					console.log(lines.length);
					var status = false;
					if(lines.length > 0) {
						status = true;
						self.get('meterObj').set('activated', 1);
						console.log(self.meterDS.data());
						self.meterDS.sync();
						self.meterDS.bind('requestEnd', function(e){
							if(e.response) {
								// show success message
							} else {
								// show erro message
							}
						});
					} else {
						status = false;
					}
					return status;
				})
				.then(function(status){
					if(status) {
						banhji.installment.setDate(banhji.ActivateMeter.get('startDate'));
						banhji.installment.setPeriod(banhji.ActivateMeter.get('period'));
						return banhji.installment.makeSchedule(amount - kendo.parseFloat(banhji.ActivateMeter.get('amountToBeRecieved')), banhji.ActivateMeter.get('meterObj').contact[0].id, banhji.ActivateMeter.get('startDate'), banhji.ActivateMeter.get('period'));
					}
				})
				.then(function(data){
					return banhji.installment.save();
				})
				.then(function(installment){
					if(installment[0]) {
						// show message
						banhji.ActivateMeter.set('amountBilled', 0.00);
						banhji.ActivateMeter.set('cashAccount', null);
						banhji.ActivateMeter.set('paymentMethod', null);
						banhji.ActivateMeter.set('amountToBeRecieved', 0.00);
						banhji.ActivateMeter.set('amountRemain', 0.00);
						$("#ntf1").data("kendoNotification").success("Successfully!");
						banhji.ActivateMeter.cancel();
						banhji.waterCenter.meterDS.read();
					} else {
						// show error
						$("#ntf1").data("kendoNotification").error("Error!");
					}
				});
				// and amount left to be make via installment
				
			} else {
				banhji.transaction.makeInvoice(this.get('meterObj').contact[0].id, this.get('paymentMethod'), this.get('amountToBeRecieved'), 'Meter_Activation')
				.then(function(data){
					// create invoice
					// console.log(amount - kendo.parseFloat(banhji.ActivateMeter.get('amountToBeRecieved')));
					if(data) {
						return banhji.transaction.save();
					} else {
						return false;
					}
				})
				.then(function(transaction){
					// create invoice line
					if(transaction[0]){	
						$.each(banhji.ActivateMeter.items, function(i, v){
							if(v.type == 'service') {
								var amount = 0.00;
								banhji.transactionLine.addById(transaction[0].id, banhji.ActivateMeter.get('meterObj').contact[0].id, banhji.ActivateMeter.get('cashAccount'), 'Meter Activation', v.received, 0, banhji.ActivateMeter.get('issued_date'));

								banhji.transactionLine.addById(transaction[0].id, banhji.ActivateMeter.get('meterObj').contact[0].id, v.account_id, 'Meter Activation', 0, v.received, banhji.ActivateMeter.get('issued_date'));								
							}

							if(v.type == 'deposit' && v.received > 0) {
								banhji.transactionLine.addById(transaction[0].id, banhji.ActivateMeter.get('meterObj').contact[0].id, banhji.ActivateMeter.get('cashAccount'), 'Meter Activation', v.received, 0, banhji.ActivateMeter.get('issued_date'));
								banhji.transactionLine.addById(transaction[0].id, v.account_id, banhji.ActivateMeter.get('meterObj').contact.deposit_account_id, 'Meter Activation', 0, v.received, banhji.ActivateMeter.get('issued_date'));
							}
						});
						
						return banhji.transactionLine.save();
					} else {
						return false;
					}
				})
				.then(function(lines){
					banhji.ActivateMeter.get('meterObj').set('activated', 1);
						banhji.ActivateMeter.meterDS.sync();
						banhji.ActivateMeter.meterDS.bind('requestEnd', function(e){
							if(e.response) {
								// show success message
							} else {
								// show erro message
							}
						});
					// then change meter activated field to 1
					var status = false;
					if(lines.length > 0) {
						status = true;
						banhji.ActivateMeter.set('amountBilled', 0.00);
						banhji.ActivateMeter.set('cashAccount', null);
						banhji.ActivateMeter.set('paymentMethod', null);
						banhji.ActivateMeter.set('amountToBeRecieved', 0.00);
						banhji.ActivateMeter.set('amountRemain', 0.00);
						$("#ntf1").data("kendoNotification").success("Successfully!");
						$("#loadImport").css("display","none");
						banhji.ActivateMeter.cancel();
					} else {
						status = false;
						$("#ntf1").data("kendoNotification").error("Error!"); 
					}
					return status;
				});
			}		
		},
		cancel 				: function(){
			$("#loadImport").css("display","none");
			this.meterDS.cancelChanges();	
			this.planDS.cancelChanges();
			this.paymentMethodDS.cancelChanges();
			banhji.router.navigate("/center");
		}
	});
	banhji.Reorder = kendo.observable({
		lang 				: langVM,
		dataSource  		: dataStore(apiUrl + "meters"),
		licenseDS 			: dataStore(apiUrl + "branches"),
		blocDS 				: dataStore(apiUrl + "locations"),
		licenseSelect		: null,
		blocSelect			: null,
		selectMeter 		: false,
		pageLoad 			: function(id){
		},
		onLicenseChange 	: function(e) {
			var data = e.data;
			var license = this.licenseDS.at(e.sender.selectedIndex - 1);
			this.set("licenseSelect", license);
			this.blocDS.filter({field: "branch_id", value: license.id});
		},
		blocChange 			: function(e){
			var data = e.data;
			var bloc = this.blocDS.at(e.sender.selectedIndex - 1);
			this.set("blocSelect", bloc);
		},
		search 		 		: function(){	
			license_id = this.get("licenseSelect"),
			bloc_id = this.get("blocSelect");
			var para = [{field: "activated", value: 1}];	
			
			if(license_id){
				para.push({field: "branch_id", value: license_id.id});
				if(bloc_id){
					para.push({field: "location_id", value: bloc_id.id});
					var self = this;
					this.dataSource.query({
						filter: para
					}).then(function(){
				        if(self.dataSource.data().length > 0){
				        	//self.gridData();
				        }
					});
				}else{
					alert("Please Select Location");
				}
			}else{
				alert("Please Select License");
			}
		},
		save 				: function() {
			$.each(this.dataSource.data(), function(index, value){
				value.set("worder", index);
			});

			this.dataSource.sync();
			var saved = false;
			this.dataSource.bind("requestEnd", function(e){				
				if(e.type=="update" && saved==false){
					saved = true;
					//$("#ntf1").data("kendoNotification").info("Saved Successful");
				}
				$("#ntf1").data("kendoNotification").info("Saved Successful");
			});
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
		meterVM 			: banhji.meter,
		dataSource  		: dataStore(apiUrl + "readings"),
		uploadDS  			: dataStore(apiUrl + "readings/books"),
		licenseDS 			: dataStore(apiUrl + "branches"),
		blocDS 				: dataStore(apiUrl + "locations"),
		itemDS 				: null,
		obj 				: null,
		monthOfSelect		: null,
		licenseSelect		: null,
		blocSelect			: null,
		selectMeter 		: false,
		haveData 			: false,
		rows 				: [{ cells: [ { value: "number" }, { value: "from_date" }, { value: "to_date" }, { value: "previous" }, { value: "current" }, { value: "status" }]}],
		pageLoad 			: function(id){
			this.licenseDS.read();
		},
		onLicenseChange 	: function(e) {
			var data = e.data;
			var license = this.licenseDS.at(e.sender.selectedIndex - 1);
			banhji.reading.set("licenseSelect", license);
			banhji.reading.blocDS.filter({field: "branch_id", value: license.id});
		},
		blocChange 			: function(e){
			var data = e.data;
			var bloc = this.blocDS.at(e.sender.selectedIndex - 1);
			banhji.reading.set("blocSelect", bloc);
		},
		search 		 		: function(){	
			this.set("haveData", false);	
			var monthOfSearch = this.get("monthOfSelect"),
			license_id = this.get("licenseSelect"),
			bloc_id = this.get("blocSelect");
			var para = [];	
			if(monthOfSearch){						
				var monthOf = new Date(monthOfSearch);
				monthOf.setDate(1);
				monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
				var monthL = new Date(monthOfSearch);
				monthL.setDate(31);
				monthL = kendo.toString(monthL, "yyyy-MM-dd");
				
				para.push(
					{field: "month_of >=", operator: "where_related_record", value: monthOf},
					{field: "month_of <=", operator: "where_related_record", value: monthL}
				);
				//this.dataSource.filter(para);
				if(license_id){
					para.push({field: "branch_id", value: license_id.id});
					if(bloc_id){
						para.push({field: "location_id", value: bloc_id.id});
						this.set("selectMeter", true);
						var self = this;
						this.uploadDS.query({
							filter: para
						}).then(function(){
							for (var i = 0; i < self.uploadDS.data().length; i++){
					        self.rows.push({
					            cells: [
					              { value: self.uploadDS.data()[i].number },
					              { value: self.uploadDS.data()[i].from_date },
					              { value: self.uploadDS.data()[i].to_date  },
					              { value: self.uploadDS.data()[i].previous  },
					              { value: self.uploadDS.data()[i].current  },
					              { value: self.uploadDS.data()[i].status  }
					            ]
					          });
					        }
					        if(self.uploadDS.data().length > 0){
					        	self.set("haveData", true);
					        }
						});
					}else{
						alert("Please Select Location");
					}
				}else{
					alert("Please Select License");
				}
			}else{
				alert("Please Select Month Of");
			}	
		},
		monthOfSR 			: null,
		NumberSR 			: null,
		previousSR 			: 0,
		currentSR 			: 0,
		addSingleReading 	: function() {
			banhji.reading.dataSource.insert(0, {
				month_of: banhji.reading.get('monthOfSR'),
				meter_number  : banhji.reading.get('NumberSR'),
				previous: banhji.reading.get('previousSR'),
				current : banhji.reading.get('currentSR'),
				invoiced: 0,
				status: "n",
				consumption: banhji.reading.get('currentSR') - banhji.reading.get('previousSR')
			});
			banhji.reading.save()
			.done(
				function(data) {
					$("#ntf1").data("kendoNotification").success("Successfully!");
					banhji.reading.set('monthOfSR', null);
					banhji.reading.set('previousSR', null);
					banhji.reading.set('currentSR', null);
					$("#loadImport").css("display","none");
				}
			)
			.fail(function(err){
				$("#ntf1").data("kendoNotification").error("Error activated!"); 
				$("#loadImport").css("display","none");	
			});
		},
		exportEXCEL 		: function(e){
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
	              		title: "Reading",
	              		rows: this.rows
	            	}
	          	]
	        });
	        //save the file as Excel file with extension xlsx
	        kendo.saveAs({dataURI: workbook.toDataURL(), fileName: "Reading.xlsx"});
		},
		onSelected 			: function(e){
			$('li.k-file').remove();
	        var files = e.files, self = this;
	        $("#loadImport").css("display","block");
	        var reader = new FileReader();
			banhji.reading.dataSource.data([]);	
			reader.onload = function() {	
				var data = reader.result;	
				var result = {}; 						
				var workbook = XLSX.read(data, {type : 'binary'});
				workbook.SheetNames.forEach(function(sheetName) {
					var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
					if(roa.length > 0){
						result[sheetName] = roa;
						for(var i = 0; i < roa.length; i++) {
							banhji.reading.dataSource.add(roa[i]);
							$("#loadImport").css("display","none");	
							console.log(roa[i]);
						}							
					}					
				});															
			}
			reader.readAsBinaryString(files[0].rawFile);      
		},
		save 				: function() {
			var self = this;
			var dfd = $.Deferred();
			if(banhji.reading.dataSource.data().length > 0) {
				$("#loadImport").css("display","block");
				banhji.reading.dataSource.sync();
				banhji.reading.dataSource.bind("requestEnd", function(e){
					if(e.type != 'read') {
						if(e.type == 'update') {
							// update current invoice
							banhji.invoice.dataSource.query({
								filter: {field: 'meter_record_id', operator: 'where_related_winvoice_line', value: e.response.results[0]._meta.id}
							}).then(function(e){
								console.log(banhji.invoice.dataSource.data());
							});
							// create new invoice
						}
				    	if(e.response){	
				    		dfd.resolve(e.response.results);			
				    		// self.cancel();
							$("#loadImport").css("display","none");
						}	
					}			  				
			    });
			    banhji.reading.dataSource.bind("error", function(e){
			    	dfd.reject(e);		    		    				
			    });
			}
			return dfd.promise();	
		},
		cancel 				: function(){
			banhji.reading.dataSource.cancelChanges();	
			banhji.reading.uploadDS.cancelChanges();	
			// banhji.reading.dataSource.data([]);
			// banhji.reading.uploadDS.data([]);	
			//window.history.back();
		}
	});
	banhji.EditReading = kendo.observable({
		lang 				: langVM,
		dataSource  		: dataStore(apiUrl + "readings"),
		licenseDS 			: dataStore(apiUrl + "branches"),
		blocDS 				: dataStore(apiUrl + "locations"),
		monthOfSearch 		: null,
		licenseSelect 		: null,
		blocSelect 			: null,
		pageLoad 			: function(id){
			this.licenseDS.read();
		},
		onLicenseChange 	: function(e) {
			var data = e.data;
			var license = this.licenseDS.at(e.sender.selectedIndex - 1);
			this.set("licenseSelect", license);
			this.blocDS.filter({field: "branch_id", value: license.id});
		},
		blocChange 			: function(e){
			var data = e.data;
			var bloc = this.blocDS.at(e.sender.selectedIndex - 1);
			this.set("blocSelect", bloc);
		},
		search 		 		: function(){
			var monthOfSearch = this.get("monthOfSelect"),
			license_id = this.get("licenseSelect"),
			bloc_id = this.get("blocSelect");
			var para = [];	
			if(monthOfSearch){
				var monthOf = new Date(monthOfSearch);
				monthOf.setDate(1);
				monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
				var monthL = new Date(monthOfSearch);
				monthL.setDate(31);
				monthL = kendo.toString(monthL, "yyyy-MM-dd");
				
				para.push(
					{field: "month_of >=" , value: monthOf},
					{field: "month_of <=", value: monthL}
				);
				//this.dataSource.filter(para);
				if(license_id){
					para.push({field: "branch_id", operator: "where_related_meter" , value: license_id.id});
				}
				if(bloc_id){
					para.push({field: "location_id", operator: "where_related_meter" , value: bloc_id.id});
				}
				this.set("selectMeter", true);
				var self = this;
				this.dataSource.query({
					filter: para
				}).then(function(){
					for (var i = 0; i < self.dataSource.data().length; i++){
			        self.rows.push({
			            cells: [
			              { value: self.dataSource.data()[i].number },
			              { value: self.dataSource.data()[i].from_date },
			              { value: self.dataSource.data()[i].to_date  },
			              { value: self.dataSource.data()[i].previous  },
			              { value: self.dataSource.data()[i].current  },
			              { value: self.dataSource.data()[i].consumption  },
			              { value: self.dataSource.data()[i].status  }
			            ]
			          });
			        }
				});
				console.log(para);
			}else{
				alert("សូមSelect ខែ");
			}
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
		dataSource  		: dataStore(apiUrl + "districts"),
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
		licenseDS 			: dataStore(apiUrl + "branches"),
		blocDS 				: dataStore(apiUrl + "locations"),
		invoiceDS	     	: dataStore(apiUrl + "winvoices/make"),
		invoiceCollection 	: banhji.invoice, 
		chkAll 				: false,
		licenseSelect 		: null,	
		monthSelect 		: null,	
		blocSelect 			: null,
		totalOfInv 			: 0,
		meterSold 			: 0,
		amountSold 			: 0,
		pageLoad 			: function(id){
		},   
		invoiceArray 		: [],
		checkAll 		: function(e){
			var self = this;
			e.preventDefault();
			this.set("invoiceArray",[]);
			var bolValue = this.get("chkAll");
			var data = this.invoiceDS.data();
			if(bolValue == true){
				if(data.length>0){						
			        $.each(data, function(index, value){	
			        	value.set("invoiced", bolValue);
			        	self.invoiceArray.push(value);      	
			        });		        			        
		        }
		    }else{
	        	this.set("invoiceArray",[]);
	        	$.each(data, function(index, value){	
		        	value.set("invoiced", bolValue);      	
		        });
	        }
	        this.makeBilled();					
		},	
		total 			: function(){      		
	        var sum = 0;
	        $.each(this.readingDS.data(), function(index, value) {	  
	        	sum += kendo.parseInt(value.usage);
	        });
	        return kendo.toString(sum, "n0");
	    },	 
	    licenseChange 		: function(e) {
			// var license = this.licenseDS.at(e.sender.selectedIndex - 1);
			// console.log(license);
			// this.set("licenseSelect", license.id);
			var data = e.data;
			var license = this.licenseDS.at(e.sender.selectedIndex - 1);
			this.blocDS.filter({field: "branch_id",value: license.id});
	    	//this.invoiceDS.filter({field: "branch_id",value: license.id});
	    },
	    search 				: function(){
	    	this.invoiceDS.filter([
	    		{field: 'branch_id', operator: 'where_related_meter', value: this.licenseSelect},
	    		{field: 'location_id', operator: 'where_related_meter', value: this.blocSelect}
	    	]);
	    },
	    makeInvoice 		: function(e) {
	    	var that = this;
	    	if(e.data.invoiced) {
	    		this.invoiceArray.push(e.data);
	    	} else {
	    		$.each(this.invoiceArray, function(i, v){
	    			if(e.data == v) {
	    				that.invoiceArray.splice(i, 1);
	    				return false;
	    			}
	    		});
	    	}
	    	this.makeBilled();
	    },
	    showButton 			: false,
	    makeBilled 			: function(){
	    	var mSold = 0, self = this, rUsage, tUsage, aTariff;
	    	if(this.invoiceArray.length > 0) {
	    		this.set('showButton', true);
	    	} else {
	    		this.set('showButton', false);
	    	}
	    	this.set('totalOfInv', this.invoiceArray.length);
	    	$.each(this.invoiceArray, function(i, v){
	    		mSold += kendo.parseInt(v.items[0].line.usage);
	    		//Calculate Exemption
	    		if(v.exemption){
	    			var Usage = kendo.parseInt(v.items[0].line.usage),
	    			AmountEx = kendo.parseInt(v.exemption[0].line.amount);
	    			if(v.exemption[0].line.unit == 'm3'){
	    				rUsage = Usage - AmountEx;
	    				
	    			}else if(v.exemption[0].line.unit == '%'){
	    				rUsage = (Usage * AmountEx) / 100;
	    			}
	    			tUsage = Usage - rUsage;
	    		}
	    		console.log(tUsage);
	    		//Calculate Tariff
	    		$.each(v.tariff, function(j, v){
	    			if(kendo.parseInt(tUsage) > kendo.parseInt(v.line.usage)){
	    				aTariff = v.line.amount;
	    			}	
	    		});
	    		self.calInvoice(aTariff, tUsage);

	    	});
	    	this.set("meterSold", mSold);
	    },
	    calInvoice 			: function(AmountTariff, TotalUsage){
	    	var self =this,
	    	monthOF,
			issueDate,
			paymentDate,
			billDate,
			dueDate,
			AmountAfterTariff = kendo.parseInt(TotalUsage) * kendo.parseFloat(AmountTariff);
			console.log(AmountAfterTariff);
			// $.each(this.invoiceArray, function(i, v){
			// 	var invoiceItems = [];
			// 	var rate = banhji.source.getRate(banhji.locale, date);
			// 	var locale = banhji.locale;
			// 	var usage = v.items[0].line.usage * v.meter.multiplier;
			// 	var record_id = v.items[0].line.id;
			// 	var amount = 0.00;
			// 	var date = new Date();
			// 	if(self.get("FmonthSelect")){
			// 		monthOF = self.get("FmonthSelect");
			// 	}else{
			// 		monthOF = null;
			// 	}
			// 	if(self.get("BillingDate")){
			// 		billDate = self.get("BillingDate");
			// 	}else{
			// 		billDate = null;
			// 	}
			// 	if(self.get("PaymentDate")){
			// 		paymentDate = self.get("PaymentDate");
			// 	}else{
			// 		paymentDate = null;
			// 	}
			// 	if(self.get("DueDate")){
			// 		dueDate = self.get("DueDate");
			// 	}else{
			// 		dueDate = date.setDate(date.getDate() + 7);
			// 	}

			// 	v.items.filter(function(data) {
			// 		if(data.type === 'tariff') {
			// 			return true;
			// 		} else {
			// 			return false
			// 		}
			// 	}).sort(function(aValue, bValue){
			// 		if(aValue.usage < bValue.user) {
			// 			return -1;
			// 		} else {
			// 			return 1;
			// 		}
			// 		return 0;
			// 	});

			// 	$.each(v.items, function(index, value) {
			// 		if(value.type == "tariff") {
			// 			invoiceItems.push({				
			// 		   		"invoice_id"		: 0,
			// 				"item_id" 			: 0,														
			// 			   	"meter_record_id"	: record_id,
			// 			   	"description" 		: value.line.name,					   	
			// 			   	"quantity" 			: usage,
			// 			   	"price"				: value.line.amount,					   	
			// 			   	"amount" 			: value.line.is_flat == false ? usage * kendo.parseFloat(value.line.amount) : kendo.parseFloat(value.line.amount),
			// 			   	"rate"				: rate,
			// 			   	"locale" 			: locale,
			// 			   	"has_vat" 			: false,
			// 		   		"type" 				: value.type
			// 			});
			// 			amount += value.line.is_flat == false ? usage * kendo.parseFloat(value.line.amount) : kendo.parseFloat(value.line.amount);
			// 		} else {
			// 			invoiceItems.push({				
			// 		   		"invoice_id"		: 0,
			// 				"item_id" 			: 0,														
			// 			   	"meter_record_id"	: record_id,
			// 			   	"description" 		: value.line.name,					   	
			// 			   	"quantity" 			: value.type == 'usage' ? value.line.usage : 1,
			// 			   	"price"				: value.line.amount,					   	
			// 			   	"amount" 			: value.line.amount,
			// 			   	"rate"				: rate,
			// 			   	"locale" 			: locale,
			// 			   	"has_vat" 			: false,
			// 		   		"type" 				: value.type
			// 			});
			// 			amount += kendo.parseFloat(value.line.amount);
			// 		}	
			// 	});

			// 	self.invoiceCollection.dataSource.add({
			// 		contact_id 			: v.contact.id,
			// 		payment_term_id		: null,
			// 		payment_method_id 	: null,
			// 		reference_id 		: null,
			// 		account_id 			: v.contact.account_id,
			// 		vat_id 				: v.contact.vat_id,
			// 		biller_id 			: banhji.userData.id,
			// 		number 				: null,
			// 		type 				: "Water_Invoice",
			// 		amount 				: amount,
			// 		vat 				: null,
			// 		rate 				: rate,
			// 		locale 				: locale,
			// 		month_of 			: monthOF,
			// 		issued_date 		: date,
			// 		payment_date 		: null,
			// 		bill_date 			: billDate,
			// 		due_date 			: dueDate,
			// 		check_no 			: null,
			// 		memo 				: null,
			// 		memo2 				: null,
			// 		status 				: null,
			// 		invoice_lines    	: invoiceItems
			// 	});
			// });
	    },
		save 				: function() {
			// var self = this,
			// monthOF,
			// issueDate,
			// paymentDate,
			// billDate,
			// dueDate;
			// $.each(this.invoiceArray, function(i, v){
			// 	var invoiceItems = [];
			// 	var rate = banhji.source.getRate(banhji.locale, date);
			// 	var locale = banhji.locale;
			// 	var usage = v.items[0].line.usage * v.meter.multiplier;
			// 	var record_id = v.items[0].line.id;
			// 	var amount = 0.00;
			// 	var date = new Date();
			// 	if(self.get("FmonthSelect")){
			// 		monthOF = self.get("FmonthSelect");
			// 	}else{
			// 		monthOF = null;
			// 	}
			// 	if(self.get("BillingDate")){
			// 		billDate = self.get("BillingDate");
			// 	}else{
			// 		billDate = null;
			// 	}
			// 	if(self.get("PaymentDate")){
			// 		paymentDate = self.get("PaymentDate");
			// 	}else{
			// 		paymentDate = null;
			// 	}
			// 	if(self.get("DueDate")){
			// 		dueDate = self.get("DueDate");
			// 	}else{
			// 		dueDate = date.setDate(date.getDate() + 7);
			// 	}

			// 	v.items.filter(function(data) {
			// 		if(data.type === 'tariff') {
			// 			return true;
			// 		} else {
			// 			return false
			// 		}
			// 	}).sort(function(aValue, bValue){
			// 		if(aValue.usage < bValue.user) {
			// 			return -1;
			// 		} else {
			// 			return 1;
			// 		}
			// 		return 0;
			// 	});

			// 	$.each(v.items, function(index, value) {
			// 		if(value.type == "tariff") {
			// 			invoiceItems.push({				
			// 		   		"invoice_id"		: 0,
			// 				"item_id" 			: 0,														
			// 			   	"meter_record_id"	: record_id,
			// 			   	"description" 		: value.line.name,					   	
			// 			   	"quantity" 			: usage,
			// 			   	"price"				: value.line.amount,					   	
			// 			   	"amount" 			: value.line.is_flat == false ? usage * kendo.parseFloat(value.line.amount) : kendo.parseFloat(value.line.amount),
			// 			   	"rate"				: rate,
			// 			   	"locale" 			: locale,
			// 			   	"has_vat" 			: false,
			// 		   		"type" 				: value.type
			// 			});
			// 			amount += value.line.is_flat == false ? usage * kendo.parseFloat(value.line.amount) : kendo.parseFloat(value.line.amount);
			// 		} else {
			// 			invoiceItems.push({				
			// 		   		"invoice_id"		: 0,
			// 				"item_id" 			: 0,														
			// 			   	"meter_record_id"	: record_id,
			// 			   	"description" 		: value.line.name,					   	
			// 			   	"quantity" 			: value.type == 'usage' ? value.line.usage : 1,
			// 			   	"price"				: value.line.amount,					   	
			// 			   	"amount" 			: value.line.amount,
			// 			   	"rate"				: rate,
			// 			   	"locale" 			: locale,
			// 			   	"has_vat" 			: false,
			// 		   		"type" 				: value.type
			// 			});
			// 			amount += kendo.parseFloat(value.line.amount);
			// 		}	
			// 	});

			// 	self.invoiceCollection.dataSource.add({
			// 		contact_id 			: v.contact.id,
			// 		payment_term_id		: null,
			// 		payment_method_id 	: null,
			// 		reference_id 		: null,
			// 		account_id 			: v.contact.account_id,
			// 		vat_id 				: v.contact.vat_id,
			// 		biller_id 			: banhji.userData.id,
			// 		number 				: null,
			// 		type 				: "Water_Invoice",
			// 		amount 				: amount,
			// 		vat 				: null,
			// 		rate 				: rate,
			// 		locale 				: locale,
			// 		month_of 			: monthOF,
			// 		issued_date 		: date,
			// 		payment_date 		: null,
			// 		bill_date 			: billDate,
			// 		due_date 			: dueDate,
			// 		check_no 			: null,
			// 		memo 				: null,
			// 		memo2 				: null,
			// 		status 				: null,
			// 		invoice_lines    	: invoiceItems
			// 	});
			// });
			$("#loadImport").css("display","block");
			this.invoiceCollection.save();
			
			this.invoiceCollection.dataSource.bind("requestEnd", function(e){
				if(e.type != 'read') {
			    	if(e.response){				
			    		$("#ntf1").data("kendoNotification").success("Successfully!");
			    		self.cancel();
						$("#loadImport").css("display","none");
					}	
				}			  				
		    });
		    this.invoiceCollection.dataSource.bind("error", function(e){		    		    	
				$("#ntf1").data("kendoNotification").error("Error!"); 
				$("#loadImport").css("display","none");				
		    });	
		},
		cancel 				: function(){
			this.invoiceCollection.dataSource.cancelChanges();		
			window.history.back();
		}
	});
	banhji.printBill = kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "branches"),
		licenseDS 			: dataStore(apiUrl + "branches"),
		blocDS 				: dataStore(apiUrl + "locations"),
		invoiceDS	     	: dataStore(apiUrl + "winvoices/make"),
		printBTN 			: false,
		invoiceCollection 	: banhji.invoice, 
		txnTemplateDS 		: dataStore(apiUrl + "transaction_templates"),
		selectInv 			: false,
		chkAll 				: false,
		licenseSelect 		: null,	
		monthSelect 		: null,	
		TemplateSelect 		: 1,
		SelectSize 			: null,
		SizePaper 			: [{id: "A4", name: "A4"},{id: "A5", name: "A5"}],
		obj 				: [],
		blocSelect 			: null,
		pageLoad 			: function(id){
			this.txnTemplateDS.filter({field:"moduls", value: "water_mg" });
		}, 
		printArray 		: [],
		checkAll 		: function(e){
			var self = this;
			e.preventDefault();
			this.set("printArray",[]);
			var bolValue = this.get("chkAll");
			var data = this.invoiceCollection.dataSource.data();
			if(bolValue == true){
				if(data.length>0){						
			        $.each(data, function(index, value){	
			        	value.set("printed", bolValue);
			        	self.printArray.push(value);      	
			        });		        			        
		        }
		    }else{
	        	this.set("printArray",[]);
	        	$.each(data, function(index, value){	
		        	value.set("printed", bolValue);      	
		        });
	        }						
		},	
		isCheck 		: function(e) {
	    	var that = this;
	    	this.set("chkAll", false);
	    	if(e.data.printed) {
	    		this.printArray.push(e.data);
	    	} else {
	    		$.each(this.printArray, function(i, v){
	    			if(e.data == v) {
	    				that.printArray.splice(i, 1);
	    				return false;
	    			}
	    		});
	    	}
	    },
	    licenseChange 	: function(e) {
			var data = e.data;
			var license = this.licenseDS.at(e.sender.selectedIndex - 1);
			//banhji.reading.set("licenseSelect", license);
			this.blocDS.filter({field: "branch_id", value: license.id});
		},
		blocChange 			: function(e){
			// var data = e.data;
			// var bloc = this.blocDS.at(e.sender.selectedIndex - 1);
			// banhji.reading.set("blocSelect", bloc);
		},
		search 				: function(){
			this.invoiceCollection.dataSource.read();
			this.set("selectInv", true);
			this.set("printBTN", true);
		},
		printBill 			: function(){
	  		if(this.invoiceCollection.dataSource.total()>0){
				if(this.printArray.length>0){
				  	var self = this;
				  	$.each(this.printArray, function(index, value){
				  		banhji.InvoicePrint.dataSource.push(self.printArray[index]);
				  	});
				  	banhji.InvoicePrint.PaperSize = this.SelectSize;
			        banhji.router.navigate('/invoice_print');

		    	}else{
		    		alert("Please check the box!");
		    	}
			}else{
				alert("No data found");
			}
		},
		save 				: function() {
			var self = this;
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();		
			window.history.back();
		}
	});
	banhji.InvoicePrint = kendo.observable({
		lang 				: langVM,
		invoiceDS 	 		: dataStore(baseUrl + "invoices"),
		dataSource 			: [],
		isVisible 			: true,
		company 			: banhji.institute,
		PaperSize 			: "A4",
		user_id 			: banhji.userManagement.getLogin() === null ? '':banhji.userManagement.getLogin().id,
		pageLoad 			: function(id){	
			this.barcod();
			console.log(this.PaperSize);
		},
		barcod 			: function(){
			var view = this.dataSource;
			
			for (var i=0;i<view.length;i++) {
				var d = view[i];
				$("#secondwnumber"+d.id).kendoBarcode({
					renderAs: "svg",
				  	value: d.number,
				  	type: "code128",
				  	width: 200,
					height: 40,
					text:{
					    visible: false
					}
				});
				$("#footwnumber"+d.id).kendoBarcode({
					renderAs: "svg",
				  	value: d.number,
				  	type: "code128",
				  	width: 200,
					height: 40,
					text:{
					    visible: false
					}	
				});
			}
		},
		printGrid 		: function(){
			var self = this, Win, pHeight, pWidth;
			if(this.PaperSize == "A5"){
				Win = window.open('', '', 'width=800, height=900');
				pHeight = "210mm";
				pWidth = "148mm";
			}else{
				Win = window.open('', '', 'width=1000, height=900');
				pHeight = "297mm";
				pWidth = "210mm";
			}
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = Win,
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>resources/js/kendoui/styles/kendo.bootstrap.min.css">'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">'+
		            '<link href="<?php echo base_url(); ?>assets/water/water.css" rel="stylesheet" />'+
		            '<link href="<?php echo base_url(); ?>assets/water/winvoice-print.css" rel="stylesheet" />'+
		            '<link href="<?php echo base_url(); ?>resources/common/theme/css/style-default-menus-dark.css" rel="stylesheet" />'+
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">'+
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">'+
		            '<style type="text/css" media="print"> @page { size: portrait; margin:1mm 0.5mm; size: '+ this.PaperSize +';} '+
						'@media print {' +
  							'html, body {' +
    							'width: '+ pWidth +';' +
    							'height: '+ pHeight +';' +
  							'}' +
						'}' +
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
		            	'.pcg .mid-title div {}' +
		            	'.pcg .mid-header {' +
		            		'background-color: #dce6f2!important; ' +
		            		'-webkit-print-color-adjust:exact; ' +
		            	'}'+
		            	'.winvoice-print table thead .darkbblue, .winvoice-print table tbody td.darkbblue { ' +
						    'background-color: #355176!important;' +
						    'color: #fff!important;' +
						    '-webkit-print-color-adjust:exact; ' +
						'}' +
						'.winvoice-print table td.greyy {' +
						'background-color: #ccc!important;-webkit-print-color-adjust:exact;' +
						'}' +
		            	'.inv1 span.total-amount { ' +
		            		'color:#fff!important;' +
		            	'}</style>' +
				    '</head>' + 
				    '<body><div class="row-fluid" style="padding-top: 40px" ><div id="example" class="k-content">';

		    var htmlEnd =
		            '</div></div></body>' +
		            '</html>';
		    
		    printableContent = $('#wInvoiceContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();	
		    	//win.close();
		    },2000)
			//}
		},		
		hideFrameInvoice 			: function(e) {
			var printBtn = e.target;
			if(printBtn.checked) {
				$(".hiddenPrint").css("visibility", "hidden");
			} else {
				$(".hiddenPrint").css("visibility", "visible");
			}
		},
		cancel 				: function(){
			this.set("dataSource",[]);	
			this.set("PaperSize","A4");
			window.history.back();
		}
	});

	banhji.reconReceipt= kendo.observable({
		dataSource 		: dataStore(apiUrl + 'reconciles/receipt'),
		sDate 			: new Date(2016, 01, 12, 01),
		eDate 			: new Date(),
		search 			: function() {
			var dfd = $.Deferred();
			banhji.reconReceipt.dataSource.query({
				filter: [
					{field: 'created_at >=', value: banhji.reconReceipt.get('sDate').getTime()},
					{field: 'created_at <=', value: banhji.reconReceipt.get('eDate').getTime()}
				]
			}).then(function(e){
				if(banhji.reconReceipt.dataSource.data().length > 0) {
					dfd.resolve(banhji.reconReceipt.dataSource.data());
				} else {
					dfd.reject(false);
				}
			});
			return dfd.promise();
		},
		addRow 			: function() {
			banhji.reconReceipt.dataSource.add({
				code: null,
				amount: 0,
				_date: Date.now()
			});
		},
		rmCurrencyRow  	: function(e) {
			banhji.reconReceipt.dataSource.remove(e.data);
		},
		sync 			: function() {
			banhji.reconReceipt.dataSource.sync();
		}
	});
	banhji.reconList   = kendo.observable({
		dataSource 		: dataStore(apiUrl + 'reconciles/item'),
		cashReceiptArr  : [],
		addRow 			: function() {
			// var that = this;
			banhji.reconList.dataSource.add({reconcile_id: null, code: "USD", note: 1, unit: 0, total: 0});
			// alert("l");
		},
		removeRow 		: function(e) {
			if(banhji.reconList.dataSource.data().length > 1) {
				banhji.reconList.dataSource.remove(e.data);
			}			
		},
		onChange 		: function(e) {
			e.data.set('total', e.data.note * e.data.unit);
			
			// if(banhji.reconList.cashReceiptArr.length > 0) {
				
			// 	$.each(banhji.reconList.cashReceiptArr, function(x, y) {
			// 		$.each(banhji.reconList.dataSource.data(), function(i, v){
			// 			if(banhji.reconList.cashReceiptArr[x].code == banhji.reconList.dataSource.data()[i].code) {
							
			// 				banhji.reconList.cashReceiptArr[x].total += v.total; 
			// 			} else {
			// 				banhji.reconList.cashReceiptArr.push(v);
			// 			}
			// 		});
			// 	});
			// } else {
			// 	banhji.reconList.cashReceiptArr.push(e.data);
			// }			
		},
		countActual 	: function(data) {
			var self = this, temp =[];
			banhji.reconList.cashReceiptArr.splice(0, banhji.reconList.cashReceiptArr.length);
			$.each(data, function(i, v){
				temp.push({code: v.code, total: 0});
			});
			console.log(temp);
			$.each(temp, function(x, y){
				$.each(banhji.reconList.dataSource.data(), function(i, v){
					if(temp[x].code == v.code) {
						temp[x].total += v.total;
					}
				});
			});
			$.each(temp, function(i,v) {
				banhji.reconList.cashReceiptArr.push(v);
			});
		},
		sync 			: function(id) {
			var dfd = $.Deferred();
			$.each(banhji.reconList.dataSource.data(), function(i, v){
				v.set('reconcile_id', id);
			});
			banhji.reconList.dataSource.sync();
			banhji.reconList.dataSource.bind('requestEnd', function(e){
				if(e.type !== 'read' && e.response) {
					dfd.resolve(e.response.results);
				}
			});
			banhji.reconList.dataSource.bind('error', function(e){
				dfd.reject(e.status);
			});

			return dfd.promise();
		}
	});
	banhji.reconcileVM = kendo.observable({
		dataSource 		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + 'reconciles',
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + 'reconciles',
					type: "POST",
					headers: banhji.header,
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + 'reconciles',
					type: "PUT",
					headers: banhji.header,
					dataType: 'json'
				},
				destroy 	: {
					url: apiUrl + 'reconciles',
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
		receiptDS 		: [],
		currencyDS 		: [],
		currencyList 	: [],
		list 			: banhji.reconList,
		currencyVM 		: banhji.reconReceipt,
		search 			: function() {
			banhji.reconcileVM.receiptDS.splice(0, banhji.reconcileVM.receiptDS.length);
			this.currencyVM.search()
			.then(function(success) {
				$.each(banhji.reconcileVM.currencyVM.dataSource.data(), function(i, v) {
					banhji.reconcileVM.receiptDS.push(v);
				});
			}, function(error){});
		},
		setCurrent 		: function(current) {
			this.set('current', current);
		},
		verify 			: function() {
			banhji.reconcileVM.receiptDS.splice(0, banhji.reconcileVM.receiptDS.length);
			this.currencyVM.search()
			.then(function(data) {
				$.each(data, function(i,v){
					banhji.reconcileVM.receiptDS.push(v);
				});

				banhji.reconcileVM.list.countActual(data);
			
			}, function(error){});
		},
		sync 			: function() {
			var dfd = $.Deferred();

			banhji.banhji.reconcileVM.add({
				cashier: banhji.userData.id,
				memo: "",
				currencies: banhji.reconcileVM.currencyList
			});
			banhji.reconcileVM.dataSource.sync();
			banhji.reconcileVM.dataSource.bind('requestEnd', function(e){
				banhji.reconcileVM.list.sync(e.response.results[0].id);
			});
			banhji.reconcileVM.dataSource.bind('error', function(e){});
		}
	});

	banhji.Receipt = kendo.observable({
		lang 				: langVM,
		numCustomer			: 0,
		paymentReceiptToday : 0,
		currencyDS 			: banhji.source.currencyDS,
		reconcileVM 		: banhji.reconcileVM,
		reconReceipt 		: banhji.reconReceipt,
		cashCurrencyDS 		: [],
		addRow 				: function() {
			this.cashCurrencyDS.push({id:1, code: "USD", cash_receipt: 0});
			this.cashCurrencyDS.push({id:3, code: "KHR", cash_receipt: 0});
		},
		removeCurrencyRow 	: function(e) {
			var that = this;
			$.each(this.cashCurrencyDS, function(i, v){
				if(v === e.data) {
					that.cashCurrencyDS.splice(i, 1);
					return false;
				}
			});
			// console.log(e.data);
		},
 		dataSource 			: dataStore(apiUrl + "transactions"),
		deleteDS 			: dataStore(apiUrl + "transactions"),
		invoiceDS 			: dataStore(apiUrl + "transactions"),
		creditDS 			: dataStore(apiUrl + "transactions"),		
		journalLineDS		: dataStore(apiUrl + "journal_lines"),
		currencyRateDS		: dataStore(apiUrl + "currencies/rate"),
		contactDS  			: banhji.source.customerDS,
		employeeDS  		: banhji.source.saleRepDS,
		accountDS  			: new kendo.data.DataSource({
		  	data: banhji.source.accountList,
		  	filter: [
				{ field:"account_type_id", value: 10 },
				{ field:"status", value: 1 }
			],
		  	sort: { field:"number", dir:"asc" }
		}),		
		paymentTermDS 		: banhji.source.paymentTermDS,
		paymentMethodDS 	: banhji.source.paymentMethodDS,	
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
			filter: { field: "type", value:"Cash_Receipt" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		segmentItemDS		: banhji.source.segmentItemDS,
		amtDueColor 		: banhji.source.amtDueColor,
		showCheckNo 		: false,
		obj 				: null,		
		isEdit 				: false,
		saveClose 			: false,
		savePrint 			: false,
		searchText 			: "",
		contact_id 			: "",
		invoice_id 			: 0,		
		sub_total 			: 0,		
		discount 			: 0,		
		total 				: 0,
		pay 		 		: 0,
		remain 				: 0,
		user_id				: banhji.source.user_id,
		pageLoad 			: function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{				
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}								
			}
		},
		loadInvoice 		: function(id){
			this.set("invoice_id", id);
			this.search();
		},	
		//Contact
		loadContact 		: function(id){
			this.set("contact_id", id);
			this.search();
		},
		contactChanges 		: function(){
			this.search();
	    },
	    //Payment Method
	    issuedDateChanges 	: function(){
	    	this.applyTerm();
	    	this.setRate();	
	    },
	    applyTerm 			: function(){
	    	var self = this, obj = this.get("obj"), 
	    	today = new Date();

	    	$.each(this.dataSource.data(), function(index, value){	    		   		
	    		var term = self.paymentTermDS.get(value.payment_term_id),
	    		period = term.discount_period || 0,
	    		termDate = new Date(value.reference[0].issued_date);

    			termDate.setDate(termDate.getDate() + period);
    			
    			if(today<=termDate){
    				if(value.amount_paid==0){
	    				var amount = value.reference[0].amount * term.discount_percentage;
	    				value.set("discount", amount);
	    				value.set("amount", value.reference[0].amount - amount);
    				}
    			}		    	
	    	});	    	
	    },
	    //Currency Rate		
		setRate 			: function(){
			var obj = this.get("obj");

			$.each(this.dataSource.data(), function(index, value){
				var rate = banhji.source.getRate(value.locale, new Date(obj.issued_date));				
				
				value.set("rate", rate);				
			});

			this.changes();			
		},
		//Segments		
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
		//Search		
		search 				: function(){
			var self = this, 
			para = [],
			obj = this.get("obj"),			
			date = kendo.toString(new Date(obj.issued_date), "yyyy-MM-dd"), 
			searchText = this.get("searchText"), 
			invoice_id = this.get("invoice_id"),
			contact_id = this.get("contact_id");

	    	if(contact_id>0){		    			    	
		    	para.push({ field:"contact_id", value: contact_id });				    			    	
	    	}

	    	if(invoice_id>0){		    			    	
		    	para.push({ field:"id", value: invoice_id });				    			    	
	    	}
			
			if(searchText!==""){
				para.push({ field:"number", value: searchText });
			}

			para.push({ field:"type", value:"Water_Invoice" });
			para.push({ field:"status", operator:"where_in", value:[0,2] });

			if(this.dataSource.total()>0){
				var idList = [];
				$.each(this.dataSource.data(), function(index, value){
					idList.push(value.reference_id);
				});
				para.push({ field:"id", operator:"where_not_in", value:idList });
			}

			this.invoiceDS.query({
				filter: para,
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.invoiceDS.view();

				if(view.length>0){
					$.each(view, function(index, value){											
						var amount_due = value.amount - (value.amount_paid + value.deposit);							

						self.dataSource.add({
							transaction_template_id : 0,
							number 				: value.number,
		    				contact_id 			: value.contact_id,				
							account_id 			: obj.account_id,
							payment_term_id		: value.payment_term_id,
							payment_method_id	: obj.payment_method_id,				
							reference_id 		: value.id,								
							user_id 			: self.get("user_id"),
							check_no 			: value.check_no,
						   	type				: "Cash_Receipt",
						   	amount 				: amount_due,				   	
						   	discount 			: 0,
						   	rate				: value.rate,			   	
						   	locale 				: value.locale,			   	
						   	issued_date 		: obj.issued_date,					   	
						   	memo 				: obj.memo,
						   	memo2 				: obj.memo2,
						   	due_date 			: value.due_date,
						   	status 				: 0,
						   	segments 			: obj.segments,
						   	is_journal 			: 1,
						   	//Recurring
						   	recurring_name 		: "",
						   	discount_period 	: typeof value.discount_period !== undefined? value.discount_period:null,
						   	start_date 			: new Date(),
						   	frequency 			: "Daily",
						   	month_option 		: "Day",
						   	interval 			: 1,
						   	day 				: 1,
						   	week 				: 0,
						   	month 				: 0,
						   	is_recurring 		: 0,

						   	contact				: value.contact,
						   	amount_due 			: kendo.toString(amount_due, "c", value.locale),
						   	amount_paid 		: value.amount_paid,
						   	reference 			: [{ "number" : value.number, "amount" : value.amount, "deposit" : value.deposit, "issued_date":value.issued_date, "account_id":value.account_id }]				
				    	});	
				    	self.set('numCustomer', self.get('numCustomer') + 1);					
					});
					self.applyTerm();
					self.setRate();
				}

				self.set("searchText", "");
				self.set("contact_id", "");
				self.set("invoice_id", 0);				
			});
		},
		//Obj
		loadObj 			: function(id){
			var self = this, para = [];

			para.push({ field:"id", value: id });					

			this.dataSource.query({    			
				filter: para,
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.dataSource.view();
				
				var amount_due = kendo.parseFloat(view[0].reference[0].amount) - (view[0].amount_paid + kendo.parseFloat(view[0].reference[0].deposit)), 
				total = amount_due - view[0].discount,
				remain = amount_due - (view[0].amount + view[0].discount);

				view[0].set("amount_due", kendo.toString(amount_due, "c", view[0].locale));
				
				self.set("obj", view[0]);

				self.set("sub_total", kendo.toString(amount_due, "c", view[0].locale));
		        self.set("discount", kendo.toString(view[0].discount, "c", view[0].locale));
		        self.set("total", kendo.toString(total, "c", view[0].locale));
		        self.set("pay", kendo.toString(view[0].amount, "c", view[0].locale));
		        self.set("remain", kendo.toString(remain, "c", view[0].locale));
				
				self.journalLineDS.filter({ field: "transaction_id", value: id });
				self.creditDS.filter([
					{ field: "reference_id", value: id },
					{ field: "type", value: "Customer_Deposit" }
				]);
			});						
		},
		changes				: function(){
			var self = this, obj = this.get("obj"),
			total = 0, subTotal = 0, discount = 0, pay = 0, remain = 0;											

			$.each(this.dataSource.data(), function(index, value) {
				//var amount = value.reference[0].amount - (value.amount_paid + value.reference[0].deposit);								
				
				subTotal += kendo.parseFloat(value.amount_due) / value.rate;					
				discount += value.discount / value.rate;
				pay += value.amount / value.rate;					
	        });

			total = subTotal - discount;
			remain = total - pay;			

	        this.set("sub_total", kendo.toString(subTotal, "c", banhji.locale));
	        this.set("discount", kendo.toString(discount, "c", banhji.locale));
	        this.set("total", kendo.toString(total, "c", banhji.locale));
	        this.set("pay", kendo.toString(pay, "c", banhji.locale));
	        this.set("remain", kendo.toString(remain, "c", banhji.locale));
		},
		removeRow 			: function(e){			
			this.dataSource.remove(e.data);		    
		    this.changes();	        
		},
		addEmpty 		 	: function(){			
			this.dataSource.data([]);
			this.invoiceDS.data([]);
			this.creditDS.data([]);			
			this.journalLineDS.data([]);			

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("sub_total", 0);			
			this.set("discount", 0);		
			this.set("total", 0);
			this.set("pay", 0);
			this.set("remain", 0);				

			this.set("obj", {
				transaction_template_id: 6,				
				account_id 			: 7,
				payment_method_id	: 1,							   	
			   	rate				: 1,			   	
			   	locale 				: banhji.locale,			   	
			   	issued_date 		: new Date(),			   	
			   	memo 				: "",
			   	memo2 				: "",			   	
			   	segments 			: []		
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
	    	
	    	//Edit Mode
	    	if(this.get("isEdit")){
	    		//Update Journal
    			$.each(this.journalLineDS.data(), function(index, value){										
					value.set("deleted", 1);										
				});

				this.addJournal(obj.id);

				//Credit
				if(this.creditDS.total()>0){
					var credit = this.creditDS.at(0),
					overAmount = ((obj.reference[0].amount - obj.amount_paid) - obj.amount) - obj.discount;
					
					if(overAmount<0){
						credit.set("amount", overAmount*-1);
					}else{
						credit.set("amount", 0);
					}

					this.creditDS.sync();
				}else{
					this.addCredit(obj.id);
				}					    			    		
	    	}else{
	    		//Add brand new transaction
	    		$.each(this.dataSource.data(), function(index, value){
	    			value.set("transaction_template_id", obj.transaction_template_id);
	    			value.set("account_id", obj.account_id);
	    			value.set("payment_method_id", obj.payment_method_id);	    			
	    			value.set("issued_date", obj.issued_date);
	    			value.set("memo", obj.memo);
	    			value.set("memo2", obj.memo2);
	    			value.set("segments", obj.segments);
	    		});
			}

			this.objSync()
			.then(function(data){
				if(self.get("isEdit")==false){
					self.addCredit(data[0].id);
					self.addJournal(data[0].id);
				}
									
				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){

				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);
				self.set('paymentReceiptToday', self.get('paymentReceiptToday') + self.get('total'));
				self.set('total', 0);
				if(self.get("saveClose")){
					//Save Close					
					self.set("saveClose", false);
					self.cancel();
					window.history.back();
				}else if(self.get("savePrint")){
					//Save Print					
					self.set("savePrint", false);
					self.cancel();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();
			
			banhji.userManagement.removeMultiTask("cash_receipt");
		},
		//Deposit
		addCredit 			: function(cash_receipt_id){
			var self = this, obj = this.get("obj");
			
			//Add over amount to customer credit
			$.each(this.dataSource.data(), function(index, value){			
				var overAmount = ((value.reference[0].amount - value.amount_paid) - value.amount) - value.discount;
				
				if(overAmount<0){
					self.creditDS.add({
	    				contact_id 			: value.contact_id,				
						account_id 			: value.contact[0].deposit_account_id,						
						payment_method_id	: obj.payment_method_id,				
						reference_id 		: cash_receipt_id,								
						user_id 			: self.get("user_id"),
						check_no 			: value.check_no,
					   	type				: "Customer_Deposit",
					   	amount 				: overAmount*-1,				   	
					   	discount 			: 0,
					   	rate				: value.rate,			   	
					   	locale 				: value.locale,			   	
					   	issued_date 		: obj.issued_date,					   	
					   	memo 				: obj.memo,
					   	memo2 				: obj.memo2,
					   	status 				: 0,
					   	segments 			: obj.segments,
					   	is_journal 			: 0,
					   	//Recurring
					   	recurring_name 		: "",
					   	start_date 			: new Date(),
					   	frequency 			: "Daily",
					   	month_option 		: "Day",
					   	interval 			: 1,
					   	day 				: 1,
					   	week 				: 0,
					   	month 				: 0,
					   	is_recurring 		: 0
			    	});	    			
				}
			});

			this.creditDS.sync();
		},
		//Journal
		addJournal 			: function(transaction_id){
			var self = this, obj = this.get("obj");

			$.each(this.dataSource.data(), function(index, value){
				var overAmount = ((value.reference[0].amount - value.amount_paid) - value.amount) - value.discount;

				//Cash on Dr
				self.journalLineDS.add({					
					transaction_id 		: transaction_id,
					account_id 			: obj.account_id,				
					contact_id 			: value.contact_id,				
					description 		: "",
					reference_no 		: "",
					segments 	 		: [],								
					dr 	 				: value.amount,
					cr 					: 0,				
					rate				: value.rate,
					locale				: value.locale
				});

				if(value.discount>0){
					//Discount on Dr
					self.journalLineDS.add({					
						transaction_id 		: transaction_id,
						account_id 			: value.contact[0].settlement_discount_id,				
						contact_id 			: value.contact_id,				
						description 		: "",
						reference_no 		: "",
						segments 	 		: [],								
						dr 	 				: value.discount,
						cr 					: 0,				
						rate				: value.rate,
						locale				: value.locale
					});
				}

				//AR on Cr
				self.journalLineDS.add({					
					transaction_id 		: transaction_id,
					account_id 			: value.contact[0].account_id,				
					contact_id 			: value.contact_id,				
					description 		: "",
					reference_no 		: "",
					segments 	 		: [],								
					dr 	 				: 0,
					cr 					: kendo.parseFloat(value.amount),				
					rate				: value.rate,
					locale				: value.locale
				});

				if(overAmount<0){
					self.journalLineDS.add({					
						transaction_id 		: transaction_id,
						account_id 			: value.contact[0].deposit_account_id,				
						contact_id 			: value.contact_id,				
						description 		: "",
						reference_no 		: "",
						segments 	 		: [],								
						dr 	 				: 0,
						cr 					: overAmount*-1,				
						rate				: value.rate,
						locale				: value.locale
					});
				}				
			});

			self.journalLineDS.sync();	
		}
	});
	banhji.Reports = kendo.observable({
		lang 				: langVM,
		dataSource 			: banhji.invoice.dataSource,
		licenseDS 			: dataStore(apiUrl + "branches"),
		pageLoad 			: function(){
		},
		save 				: function() {
			var self = this;
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
		    		if(obj.is_recurring=="0"){ 
		    			//Add brand new recurring from existing transaction
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
		selectTypeList 		: [
			{ id: "Invoice", name: "Invoice" },
			{ id: "Cash_Receipt", name: "Cash Receipt" }
	    ],
		user_id				: banhji.source.user_id,
		pageLoad 			: function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{	
				var obj = this.get("obj"), self = this;
				banhji.view.invoiceCustom.showIn('#invFormContent', banhji.view.invoiceForm1);	
				banhji.invoiceForm.pageLoad();
				this.addEmpty();
				this.txnFormDS.query({
					filter: [{ field:"type", value: "Invoice" },{ field:"moduls", value: "water_mg"}],
					page: 1,
					take: 100
				}).then(function(e){
					var view = self.txnFormDS.view();
					var obj = self.get("obj");
					obj.set("type", view[0].type);
					obj.set("title", view[0].title);
					obj.set("note", view[0].note);
					
				});	
				var name = banhji.invoiceForm.get("obj");
				name.set("title", this.formTitle);
			}
		},	
		onChange			: function(e) {
			var obj = this.get("obj"), self = this;
			this.txnFormDS.query({    			
				filter: [{ field:"type", value: obj.type }, {field:"moduls", value: "water_mg" }],
				page: 1,
				take: 100
			}).then(function(e){
				var view = self.txnFormDS.view();
				if(view.length > 0){
					banhji.invoiceForm.set("obj", view[0]);
					var obj = self.get("obj");
					obj.set("type", view[0].type);
					obj.set("title", view[0].title);
					obj.set("note", view[0].note);
				}
			});	
			setTimeout(function(e){ $('#formStyle a').eq(0).click(); },2000);
        },
		addEmpty 		 	: function(){
			this.dataSource.data([]);
			this.set("obj", null);
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
		activeInvoiceTmp		: function(e){
			var Active;
			switch(e) {
				case 43: Active = banhji.view.invoiceForm1; break;
				case 44: Active = banhji.view.invoiceForm2; break;
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
				
				//banhji.invoiceForm.set("obj", view[0]);	
				var Index = parseInt(view[0].transaction_form_id);
				self.activeInvoiceTmp(Index);
				//self.addRowLineDS();

				self.txnFormDS.filter({ field:"type", value: "Invoice" });
			});	
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
		obj 				: {
								title: "Quotation", 
								issued_date : "<?php echo date('d/M/Y'); ?>", 
								number : "QO123456", 
								type : "Quote", 
								amount: "$500,000.00", 
								contact: [],
								customer_number : "CS0001",
								customer_code 	: "A1",
								customer_phone 	: "012 345 678",
								customer_address : banhji.institute.address,
								issue_date 		: "<?php echo date("d/M/Y"); ?>",
								start_date 		: "<?php echo date("d/M/Y"); ?>",
								due_date 		: "<?php echo date("d/M/Y"); ?>",
								wnumber 		: "INVW00001",
								meter_number 	: "MT00001",
								meter_prev 		: 1,
								meter_current 	: 2,
								meter_consumption : 1,
								item_number 	: "001",
								item_amount 	: "1,000"
							},
		company 			: banhji.institute,		
		lineDS 				: dataStore(apiUrl + "transactions/line"),
		user_id				: banhji.source.user_id,
		selectForm 			: null,
		pageLoad 			: function(id, is_recurring){
			if(id){				
				this.loadObj(id);
			}
			for (var i=0; i < 2; i++) {			
				$("#secondwnumber1").kendoBarcode({
					renderAs: "svg",
				  	value: "1",
				  	type: "code128",
				  	width: 200,
					height: 10,
					text:{
					    visible: false
					}	
				});					
				$("#footwnumber1").kendoBarcode({
					renderAs: "svg",
				  	value: "1",
				  	type: "code128",
				  	width: 200,
					height: 10,
					text:{
					    visible: false
					}	
				});	
									
			}
			console.log("abd");
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
				case 43: Active = banhji.view.invoiceForm1; break;
				case 2: Active = banhji.view.invoiceForm2; break;
				case 32: Active = banhji.view.invoiceForm32; break;
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
	banhji.waterCenter = kendo.observable({
		lang 				: langVM,
		transactionDS  		: dataStore(apiUrl + 'transactions'),
		filterKey 			: 1,
		meter_visible 		: false,
		meterDS 			: dataStore(apiUrl + "meters"),
		readingVM			: banhji.reading,
		installmentVM 		: banhji.installment,
		invoiceVM 			: banhji.invoice,
		meterClick 			: function(){ banhji.view.layout.showIn("#waterCenterContent", banhji.view.waterCenterContent); },
		NometerClick 		: function(){ banhji.view.layout.showIn("#waterCenterContent", banhji.view.waterTransactionContent); },
		contactDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "customers",
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
			
		},
		pageLoad 			: function(id){
			banhji.view.layout.showIn("#waterCenterContent", banhji.view.waterCenterContent);
			//Refresh
			if(this.contactDS.total()>0){
				this.contactDS.fetch();
				this.searchTransaction();
				this.loadSummary();
				var grid = $("#listContact").data('kendoGrid');
				console.log(grid);
				grid.select("tr:eq(1)");
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
			this.meterDS.query({
				filter: {field: "contact_id", value: data.id}
			})
			.then(function(e){
				var meters = self.meterDS.data();
				if(meters.length > 0) {
					if(meters.length > 1) {
						var meterIds = [];
						$.each(meters, function(index, value) {
							meterIds.push(value.id);
						});
						self.readingVM.dataSource.filter({field: 'meter_id', operator: 'where_in', value: meterIds});
					} else {
						self.readingVM.dataSource.filter({field: 'meter_id', value: meters.id});
					}
					self.invoiceVM.dataSource.filter({field: 'contact_id', value: meters[0].contact[0].id});	
				}
			});
			this.set("obj", data);
			this.loadData();
			if(data.use_water == 1){
				this.set('meter_visible', true);
			}else{
				this.set('meter_visible', false);
			}
			// console.log(this.meter_visible);
		},
		onSelectedMeter		: function(e) {
			this.readingVM.set('NumberSR',e.data.meter_number);
			this.readingVM.dataSource.filter({field: 'meter_id', value: e.data.id});
			this.installmentVM.dataSource.filter({field: 'meter_id', value: e.data.id});
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
		},
		goEdit 		 		: function(){
			var obj = this.get("obj");

			if(obj!==null && obj.id !== 0){
				window.open('<?php echo base_url(); ?>rrd#/customer/'+obj.id,'_blank');
				//banhji.router.navigate('/customer/'+obj.id);
			}else{
				alert("Please select a customer.");
			}
		},
	});
	banhji.Reconcile = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,	
		pageLoad 				: function(){
			
		},
		save 					: function(){

		},
		cancel 					: function(){
			window.history.back();
		}
	});	
	/* Report */
	banhji.customerList = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "wreports/list"),
		licenseDS 				: dataStore(apiUrl+"branches"),
		blocDS 					: dataStore(apiUrl+"locations"),
		licenseSelect 			: null,
		blocSelect 				: null,
		pageLoad 				: function(){
			this.licenseDS.read();
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		licenseChange 	: function(e) {
			var data = e.data;
			var license = this.licenseDS.at(e.sender.selectedIndex - 1);
			this.set("licenseSelect", license);
			this.blocDS.filter({field: "branch_id", value: license.id});
		},
		search 					: function(){
			var para = [],
			license = this.get("licenseSelect"),
			bloc = this.get("blocSelect");

			if(license){
				para.push({ field:"branch_id", value: license.id });
			}

			if(bloc){
				para.push({ field:"location_id", value: bloc.id });
			}
			console.log(para);
			this.dataSource.filter(para);
		}, 
		cancel 			: function(){
			this.contact.cancelChanges();
			window.history.back();
		}
	});	
	banhji.customerNoConnection = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "customers"),	
		pageLoad 				: function(){
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		cancel				: function(e){
			this.dataSource.cancelChanges();
			window.history.back();
		},
	});
	banhji.disconnectList = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "wreports/disconnectlist"),
		licenseDS 				: dataStore(apiUrl+"branches"),
		blocDS 					: dataStore(apiUrl+"locations"),
		licenseSelect 			: null,
		blocSelect 				: null,
		pageLoad 				: function(){
			this.licenseDS.read();
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		licenseChange 	: function(e) {
			var data = e.data;
			var license = this.licenseDS.at(e.sender.selectedIndex - 1);
			this.set("licenseSelect", license);
			this.blocDS.filter({field: "branch_id", value: license.id});
		},
		search 					: function(){
			var para = [],
			license = this.get("licenseSelect"),
			bloc = this.get("blocSelect");

			if(license){
				para.push({ field:"branch_id", value: license.id });
			}

			if(bloc){
				para.push({ field:"location_id", value: bloc.id });
			}
			console.log(para);
			this.dataSource.filter(para);
		}, 
		cancel 			: function(){
			this.contact.cancelChanges();
			window.history.back();
		}
	});	
	banhji.newCustomerList = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "wreports/newlist"),
		licenseDS 				: dataStore(apiUrl+"branches"),
		blocDS 					: dataStore(apiUrl+"locations"),
		licenseSelect 			: null,
		blocSelect 				: null,
		pageLoad 				: function(){
			this.licenseDS.read();
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		licenseChange 	: function(e) {
			var data = e.data;
			var license = this.licenseDS.at(e.sender.selectedIndex - 1);
			this.set("licenseSelect", license);
			this.blocDS.filter({field: "branch_id", value: license.id});
		},
		search 					: function(){
			var para = [],
			license = this.get("licenseSelect"),
			bloc = this.get("blocSelect");

			if(license){
				para.push({ field:"branch_id", operator: "where_related_contact_utility", value: license.id });
			}

			if(bloc){
				para.push({ field:"location_id", operator: "where_related_contact_utility", value: bloc.id });
			}
			console.log(para);
			this.dataSource.filter(para);
		}, 
		cancel 			: function(){
			this.contact.cancelChanges();
			window.history.back();
		}
	});
	banhji.miniUsageList = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "wreports/miniusage"),
		licenseDS 				: dataStore(apiUrl+"branches"),
		blocDS 					: dataStore(apiUrl+"locations"),
		miniNumber 				: 20,
		licenseSelect 			: null,
		blocSelect 				: null,
		pageLoad 				: function(){
			this.licenseDS.read();
			this.dataSource.filter({field: "usage <=", operator: "where_related_record" ,value: this.get("miniNumber")});
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		licenseChange 	: function(e) {
			var data = e.data;
			var license = this.licenseDS.at(e.sender.selectedIndex - 1);
			this.set("licenseSelect", license);
			this.blocDS.filter({field: "branch_id", value: license.id});
		},
		search 					: function(){
			var para = [],
			license = this.get("licenseSelect"),
			bloc = this.get("blocSelect"),
			monthOfSearch = this.get("monthSelect"),
			miniNumber = this.get("miniNumber");
			if(license){
				para.push({ field:"branch_id", value: license.id });
			}
			if(bloc){
				para.push({ field:"location_id", value: bloc.id });
			}
			if(monthOfSearch){
				var monthOf = new Date(monthOfSearch);
				monthOf.setDate(1);
				monthOf = kendo.toString(monthOf, "yyyy-MM-dd");
				var monthL = new Date(monthOfSearch);
				monthL.setDate(31);
				monthL = kendo.toString(monthL, "yyyy-MM-dd");
				
				para.push(
					{field: "month_of >=", operator: "where_related_record", value: monthOf},
					{field: "month_of <=", operator: "where_related_record", value: monthL}
				);
			}
			if(miniNumber){
				para.push({field: "usage <=", operator: "where_related_record" ,value: this.get("miniNumber")});
			}
			console.log(para);
			this.dataSource.filter(para);
		}, 
		cancel 			: function(){
			this.contact.cancelChanges();
			window.history.back();
		}
	});
	banhji.customerNoMeter = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		contact 				: dataStore(apiUrl + "customers"),
		dataSource 				: dataStore(apiUrl+"contacts/no_meter"),
		licenseDS 				: dataStore(apiUrl+"branches"),
		blocDS 					: dataStore(apiUrl+"locations"),
		licenseSelect 			: null,
		blocSelect 				: null,
		contactTypeDS			: banhji.source.customerTypeDS,
		contactAAA 				: banhji.source.customerDS,
		statusList 				: banhji.source.statusList,
		contact_type_id 		: null,
		status 					: null,		
		pageLoad 				: function(){
			this.contact.filter({field: "use_water", value: 1});
			this.licenseDS.read();

		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		licenseChange 	: function(e) {
			var data = e.data;
			var license = this.licenseDS.at(e.sender.selectedIndex - 1);
			this.set("licenseSelect", license);
			this.blocDS.filter({field: "branch_id", value: license.id});
		},
		search 					: function(){
			var para = [],
			status = this.get("status"),
			contact_type_id = this.get("contact_type_id");

			if(status!==null){
				para.push({ field:"status", value: status });
			}

			if(contact_type_id){
				para.push({ field:"contact_type_id", value: contact_type_id });
			}

			this.dataSource.filter(para);
			this.set("status", null);
			this.set("contact_type_id", null);
		}, 
		selectedRow			: function(e){
			var data = e.data;
			
			this.set("obj", data);
			this.loadData();
		},
	});
	banhji.saleSummary = kendo.observable({
		lang 				: langVM,
		institute 			: banhji.institute,
		dataSource 			: dataStore(apiUrl + "wreports/salesummary"),	
		sortList			: [ 
	 		{ text:"All", 	value: "all" }, 
	 		{ text:"Today", 	value: "today" }, 
	 		{ text:"This Week",value: "week" }, 
	 		{ text:"This Month", 		value: "month" }, 
	 		{ text:"This Year", 	value: "year" } 
		],
		sorter 				: "all",
		sdate 				: "",
		edate 				: "",
		totalSale 			: 0,
		pageLoad 			: function(){	
			var self = this, total = 0;
			this.dataSource.read()
			.then(function(e){
				$("#grid").kendoGrid({
		            toolbar: ["excel"],
		            excel: {
		                fileName: "sale_summary.xlsx"
		            },		            		           
		            dataSource: self.dataSource.data(),
		            groupable: true,		           		                        
		            reorderable: true,
		            resizable: true,
		            columns: [		                
		                { field: "License", title: "License" },
		                { field: "Location", title: "Location" },		                
		                { field: "Usage", title:"Usage", template:'#=kendo.toString(Usage, "n0")#', attributes:{style:"text-align:right;"} },
		                { field: "Amount", title:"Amount", template:'#=kendo.toString(Amount, "c0", banhji.institute.locale)#', attributes:{style:"text-align:right;"} }
		            ]
		        });
		        $.each(self.dataSource.data(), function(index, value){
		        	total += kendo.parseFloat(value.Amont);
		        });
		        self.set("totalSale", kendo.toString(total, "c", banhji.locale));
		    });
		},
		sorterChanges 		: function(){
			var value = this.get("sorter"),
			today = new Date();

			switch(value){
			case "today":								
				this.set("sdate", today);
				this.set("edate", "");
							  					
			  	break;
			case "week":			  	
				var first = today.getDate() - today.getDay(),
				last = first + 6;

				var firstDayOfWeek = new Date(today.setDate(first)),
				lastDayOfWeek = new Date(today.setDate(last));				

				this.set("sdate", firstDayOfWeek);
				this.set("edate", lastDayOfWeek);
				
			  	break;
			case "month":							  	
				var firstDayOfMonth = new Date(today.getFullYear(), today.getMonth(), 1),
				lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);

				this.set("sdate", firstDayOfMonth);
				this.set("edate", lastDayOfMonth);

			  	break;
			case "year":				
			  	var firstDayOfYear = new Date(today.getFullYear(), 0, 1),
			  	lastDayOfYear = new Date(today.getFullYear(), 11, 31);

				this.set("sdate", firstDayOfYear);
				this.set("edate", lastDayOfYear);

			  	break;
			default:
				this.set("sdate", "");
				this.set("edate", "");					  
			}
		},		
		strDate 			: function(){
			var strDate = "",
			sdate = this.get("sdate"),
			edate = this.get("edate");

			if(sdate && edate){
				strDate = "From " + kendo.toString(new Date(sdate), "dd-MM-yyyy") + " To " + kendo.toString(new Date(edate), "dd-MM-yyyy");
			}else if(sdate){
				strDate = "On " + kendo.toString(new Date(sdate),"dd-MM-yyyy");
			}else if(edate){
				strDate = "As Of " + kendo.toString(new Date(edate),"dd-MM-yyyy");
			}else{
				strDate = "";
			}

			return strDate;
		},
		search 				: function(){
			var self = this,
			para = [], 
			start = kendo.toString(this.get("sdate"), "yyyy-MM-dd"), 
			end = kendo.toString(this.get("edate"), "yyyy-MM-dd");

        	//Dates
        	if(start && end){        		
            	para.push({ field:"issued_date", operator:"between", value1:"'"+start+"'", value2:"'"+end+"'" });            	          	            	
            }else if(start){
            	para.push({ field:"issued_date", value: start });
            }else if(end){
            	para.push({ field:"issued_date <=", value: end });
            }else{
            	
            }          

            this.dataSource.filter(para);
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		cancel				: function(e){
			this.dataSource.cancelChanges();
			window.history.back();
		},
	});
	banhji.connectServiceRevenue = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "customers"),	
		pageLoad 				: function(){
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		cancel				: function(e){
			this.dataSource.cancelChanges();
			window.history.back();
		},
	});
	banhji.saleDetail = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "customers"),	
		pageLoad 				: function(){
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		cancel				: function(e){
			this.dataSource.cancelChanges();
			window.history.back();
		},
	});
	banhji.otherRevenues = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "customers"),	
		pageLoad 				: function(){
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		cancel				: function(e){
			this.dataSource.cancelChanges();
			window.history.back();
		},
	});
	banhji.accountReceivableList = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "customers"),	
		pageLoad 				: function(){
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		cancel				: function(e){
			this.dataSource.cancelChanges();
			window.history.back();
		},
	});
	banhji.customerAgingSumList = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "customers"),	
		pageLoad 				: function(){
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		cancel				: function(e){
			this.dataSource.cancelChanges();
			window.history.back();
		},
	});
	banhji.customerDepositReport = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "customers"),	
		pageLoad 				: function(){
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		cancel				: function(e){
			this.dataSource.cancelChanges();
			window.history.back();
		},
	});
	banhji.customerAgingDetail = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "customers"),	
		pageLoad 				: function(){
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		cancel				: function(e){
			this.dataSource.cancelChanges();
			window.history.back();
		},
	});
	banhji.cashReceiptSummary = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "customers"),	
		pageLoad 				: function(){
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		cancel				: function(e){
			this.dataSource.cancelChanges();
			window.history.back();
		},
	});
	banhji.cashReceiptSourceSummary = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "customers"),	
		pageLoad 				: function(){
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		cancel				: function(e){
			this.dataSource.cancelChanges();
			window.history.back();
		},
	});
	banhji.cashReceiptDetail = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "customers"),	
		pageLoad 				: function(){
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		cancel				: function(e){
			this.dataSource.cancelChanges();
			window.history.back();
		},
	});
	banhji.cashReceiptSourceDetail = kendo.observable({
		lang 					: langVM,
		institute 				: banhji.institute,
		dataSource 				: dataStore(apiUrl + "customers"),	
		pageLoad 				: function(){
		},
		printGrid			: function() {
			var gridElement = $('#grid'),
		        printableContent = '',
		        win = window.open('', '', 'width=900, height=700'),
		        doc = win.document.open();
		    var htmlStart =
		            '<!DOCTYPE html>' +
		            '<html>' +
		            '<head>' +
		            '<meta charset="utf-8" />' +
		            '<title></title>' +
		            '<link href="http://kendo.cdn.telerik.com/' + kendo.version + '/styles/kendo.common.min.css" rel="stylesheet" />'+
		            '<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.css">' +
		            '<link href="https://fonts.googleapis.com/css?family=Content:400,700" rel="stylesheet" type="text/css">' +
		            '<link href="<?php echo base_url(); ?>assets/responsive.css" rel="stylesheet" >' +
		            '<link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">' +
		            '<style>' +
		            '*{  } html { font: 11pt sans-serif; }' +
		            '.k-grid { border-top-width: 0; }' +
		            '.k-grid, .k-grid-content { height: auto !important; }' +
		            '.k-grid-content { overflow: visible !important; }' +
		            'div.k-grid table { table-layout: auto; width: 100% !important; }' +
		            '.k-grid .k-grid-header th { border-top: 1px solid; }' +
		            '.k-grid-toolbar, .k-grid-pager > .k-link { display: none; }' +
		            '</style><style type="text/css" media="print"> @page { size: landscape; margin:0mm; } .saleSummaryCustomer .total-customer, .saleSummaryCustomer .total-sale { background-color: #DDEBF7!important; -webkit-print-color-adjust:exact; }.saleSummaryCustomer .table.table-borderless.table-condensed  tr th { background-color: #1E4E78!important;-webkit-print-color-adjust:exact;}.saleSummaryCustomer .table.table-borderless.table-condensed  tr th span{ color: #fff!important; }.saleSummaryCustomer .table.table-borderless.table-condensed tr:nth-child(2n+1) td {  background-color: #fff!important; -webkit-print-color-adjust:exact;} .saleSummaryCustomer .table.table-borderless.table-condensed tr td { background-color: #F2F2F2!important;-webkit-print-color-adjust:exact; } </style>' +
		            '</head>' +
		            '<body><div id="example" class="k-content saleSummaryCustomer" style="padding: 30px;">';
		    var htmlEnd =
		            '</div></body>' +
		            '</html>';
		    
		    printableContent = $('#invFormContent').html();
		    doc.write(htmlStart + printableContent + htmlEnd);
		    doc.close();
		    setTimeout(function(){
		    	win.print();
		    	win.close();
		    },2000);
		},
		cancel				: function(e){
			this.dataSource.cancelChanges();
			window.history.back();
		},
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
		printBill: new kendo.Layout("#printBill", {model: banhji.printBill}),
		InvoicePrint: new kendo.Layout("#InvoicePrint", {model: banhji.InvoicePrint}),	

		Receipt: new kendo.Layout("#Receipt", {model: banhji.Receipt}),
		Reports: new kendo.Layout("#Reports", {model: banhji.Reports}),
		Reconcile: new kendo.Layout("#Reconcile", {model: banhji.reconcileVM}),
		Reorder: new kendo.Layout("#Reorder", {model: banhji.Reorder}),
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
		//Report
		customerList : new kendo.Layout("#customerList", {model: banhji.customerList}),
		customerNoConnection : new kendo.Layout("#customerNoConnection", {model: banhji.customerNoConnection}),
		disconnectList : new kendo.Layout("#disconnectList", {model: banhji.disconnectList}),
		newCustomerList : new kendo.Layout("#newCustomerList", {model: banhji.newCustomerList}),
		miniUsageList : new kendo.Layout("#miniUsageList", {model: banhji.miniUsageList}),
		saleSummary : new kendo.Layout("#saleSummary", {model: banhji.saleSummary}),
		connectServiceRevenue : new kendo.Layout("#connectServiceRevenue", {model: banhji.connectServiceRevenue}),
		saleDetail : new kendo.Layout("#saleDetail", {model: banhji.saleDetail}),
		otherRevenues : new kendo.Layout("#otherRevenues", {model: banhji.otherRevenues}),
		accountReceivableList : new kendo.Layout("#accountReceivableList", {model: banhji.accountReceivableList}),
		customerAgingSumList : new kendo.Layout("#customerAgingSumList", {model: banhji.customerAgingSumList}),
		customerDepositReport : new kendo.Layout("#customerDepositReport", {model: banhji.customerDepositReport}),
		customerAgingDetail : new kendo.Layout("#customerAgingDetail", {model: banhji.customerAgingDetail}),
		cashReceiptSummary : new kendo.Layout("#cashReceiptSummary", {model: banhji.cashReceiptSummary}),
		cashReceiptSourceSummary : new kendo.Layout("#cashReceiptSourceSummary", {model: banhji.cashReceiptSourceSummary}),
		cashReceiptDetail : new kendo.Layout("#cashReceiptDetail", {model: banhji.cashReceiptDetail}),
		cashReceiptSourceDetail : new kendo.Layout("#cashReceiptSourceDetail", {model: banhji.cashReceiptSourceDetail}),
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
	banhji.router.route("/print_bill", function(){
		banhji.view.layout.showIn("#content", banhji.view.printBill);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		
		var vm = banhji.printBill;
		banhji.userManagement.addMultiTask("Print Bill","print_bill",null);
		if(banhji.pageLoaded["print_bill"]==undefined){
			banhji.pageLoaded["print_bill"] = true;
		}
		vm.pageLoad();
	});
	banhji.router.route("/invoice_print(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.InvoicePrint);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.InvoicePrint;
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
			    //link.title = 'invPrintCSS';
			    link.href = href;
			    head.appendChild(link);
			}
			//var Href1 = '<?php echo base_url(); ?>assets/water/winvoice-res.css';
			var Href2 = '<?php echo base_url(); ?>assets/water/winvoice-print.css';
			
			//loadStyle(Href1);
			loadStyle(Href2);

			if(banhji.pageLoaded["invoice_print"]==undefined){
				banhji.pageLoaded["invoice_print"] = true;							

			}
			vm.pageLoad(id);
		}							
	});
	banhji.router.route("/receipt", function(){
		banhji.view.layout.showIn("#content", banhji.view.Receipt);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		
		var vm = banhji.Receipt;
		banhji.userManagement.addMultiTask("Receipt","receipt",null);
		if(banhji.pageLoaded["receipt"]==undefined){
			banhji.pageLoaded["receipt"] = true;
			vm.paymentTermDS.read();
		}
		vm.pageLoad();
	});
	banhji.router.route("/reconcile", function(){
		if(banhji.Receipt.currencyDS.data().length <= 0) {
			banhji.Receipt.currencyDS.read()
			.then(function(e){
				$.each(banhji.Receipt.currencyDS.data(), function(i, v){
					banhji.reconcileVM.currencyDS.push(v);
				});
			});
		}		
		banhji.view.layout.showIn("#content", banhji.view.Reconcile);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		var vm = banhji.Reconcile;
		banhji.userManagement.addMultiTask("Reconcile","reconcile",null);
		if(banhji.pageLoaded["reconcile"]==undefined){
			banhji.pageLoaded["reconcile"] = true;
		}
		vm.pageLoad();
	});
	banhji.router.route("/reports", function(){
		banhji.view.layout.showIn("#content", banhji.view.Reports);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		var vm = banhji.Reports;
		banhji.userManagement.addMultiTask("Reports","reports",null);
		if(banhji.pageLoaded["reports"]==undefined){
			banhji.pageLoaded["reports"] = true;
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
	banhji.router.route("/reorder", function(id){
		banhji.view.layout.showIn("#content", banhji.view.Reorder);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		var vm = banhji.Reorder;
		banhji.userManagement.addMultiTask("Reorder","reports",null);
		if(banhji.pageLoaded["reorder"]==undefined){
			banhji.pageLoaded["reorder"] = true;

			var grid = $("#grid").kendoGrid({
                dataSource: vm.dataSource,
                autoBind: false,
                scrollable: false,
                columns: [
                    { field:"worder", title: vm.lang.lang.order1 },				    	
			    	{ field:"meter_number", title:vm.lang.lang.number },
			    	{ field:"contact_name", title:vm.lang.lang.customer }
                ]
            }).data("kendoGrid");

            grid.table.kendoSortable({
                filter: ">tbody >tr",
                hint: $.noop,
                cursor: "move",
                placeholder: function(element) {
                    return element.clone().addClass("k-state-hover").css("opacity", 0.65);
                },
                container: "#grid tbody",
                change: function(e) {
                    var skip = grid.dataSource.skip(),
                        oldIndex = e.oldIndex + skip,
                        newIndex = e.newIndex + skip,
                        data = grid.dataSource.data(),
                        dataItem = grid.dataSource.getByUid(e.item.data("uid"));
					
                    grid.dataSource.remove(dataItem);
                    grid.dataSource.insert(newIndex, dataItem);
                }
            });
		}
		vm.pageLoad();
	});	
	
	//////Report Router/////
	banhji.router.route("/customer_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.customerList);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.customerList;
			banhji.userManagement.addMultiTask("Customer List","customer_list",null);
			if(banhji.pageLoaded["customer_list"]==undefined){
				banhji.pageLoaded["customer_list"] = true;
				
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/customer_no_connection", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.customerNoConnection);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.customerNoConnection;
			banhji.userManagement.addMultiTask("Customer No Connection","customer_no_connection",null);
			if(banhji.pageLoaded["customer_no_connection"]==undefined){
				banhji.pageLoaded["customer_no_connection"] = true;
				
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/disconnect_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.disconnectList);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.disconnectList;
			banhji.userManagement.addMultiTask("Disconnect List","disconnect_list",null);
			if(banhji.pageLoaded["disconnect_list"]==undefined){
				banhji.pageLoaded["disconnect_list"] = true;
				
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/new_customer_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.newCustomerList);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.newCustomerList;
			banhji.userManagement.addMultiTask("New Customer List","new_customer_list",null);
			if(banhji.pageLoaded["new_customer_list"]==undefined){
				banhji.pageLoaded["new_customer_list"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/mini_usage_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.miniUsageList);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.miniUsageList;
			banhji.userManagement.addMultiTask("Minimum Water Usage List","mini_usage_list",null);
			if(banhji.pageLoaded["mini_usage_list"]==undefined){
				banhji.pageLoaded["mini_usage_list"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/sale_summary", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleSummary);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.saleSummary;
			banhji.userManagement.addMultiTask("Sale Summary","sale_summary",null);
			if(banhji.pageLoaded["sale_summary"]==undefined){
				banhji.pageLoaded["sale_summary"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/connect_service_revenue", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.connectServiceRevenue);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.connectServiceRevenue;
			banhji.userManagement.addMultiTask("Connect Service Revenue","connect_service_revenue",null);
			if(banhji.pageLoaded["connect_service_revenue"]==undefined){
				banhji.pageLoaded["connect_service_revenue"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/sale_detail", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleDetail);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.saleDetail;
			banhji.userManagement.addMultiTask("Sale Detail","sale_detail",null);
			if(banhji.pageLoaded["sale_detail"]==undefined){
				banhji.pageLoaded["sale_detail"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/other_revenues", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.otherRevenues);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.otherRevenues;
			banhji.userManagement.addMultiTask("Other Revenues","other_revenues",null);
			if(banhji.pageLoaded["other_revenues"]==undefined){
				banhji.pageLoaded["other_revenues"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/account_receivable_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.accountReceivableList);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.accountReceivableList;
			banhji.userManagement.addMultiTask("Other Revenues","account_receivable_list",null);
			if(banhji.pageLoaded["account_receivable_list"]==undefined){
				banhji.pageLoaded["account_receivable_list"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/customer_aging_sum_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.customerAgingSumList);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.customerAgingSumList;
			banhji.userManagement.addMultiTask("Customer Aging Sum List","customer_aging_sum_list",null);
			if(banhji.pageLoaded["customer_aging_sum_list"]==undefined){
				banhji.pageLoaded["customer_aging_sum_list"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/customer_deposit_report", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.customerDepositReport);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.customerDepositReport;
			banhji.userManagement.addMultiTask("Customer Deposit Report","customer_deposit_report",null);
			if(banhji.pageLoaded["customer_deposit_report"]==undefined){
				banhji.pageLoaded["customer_deposit_report"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/customer_aging_detail", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.customerAgingDetail);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.customerAgingDetail;
			banhji.userManagement.addMultiTask("Customer Aging Detail","customer_aging_detail",null);
			if(banhji.pageLoaded["customer_aging_detail"]==undefined){
				banhji.pageLoaded["customer_aging_detail"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/cash_receipt_summary", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.cashReceiptSummary);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.cashReceiptSummary;
			banhji.userManagement.addMultiTask("Cash Receipt Summary","cash_receipt_summary",null);
			if(banhji.pageLoaded["cash_receipt_summary"]==undefined){
				banhji.pageLoaded["cash_receipt_summary"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/cash_receipt_source_summary", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.cashReceiptSourceSummary);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.cashReceiptSourceSummary;
			banhji.userManagement.addMultiTask("Cash Receipt Source Summary","cash_receipt_source_summary",null);
			if(banhji.pageLoaded["cash_receipt_source_summary"]==undefined){
				banhji.pageLoaded["cash_receipt_source_summary"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/cash_receipt_detail", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.cashReceiptDetail);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.cashReceiptDetail;
			banhji.userManagement.addMultiTask("Cash Receipt Detail","cash_receipt_detail",null);
			if(banhji.pageLoaded["cash_receipt_detail"]==undefined){
				banhji.pageLoaded["cash_receipt_detail"] = true;
			}
			vm.pageLoad();
		}
	});
	banhji.router.route("/cash_receipt_source_detail", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.cashReceiptSourceDetail);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);

			var vm = banhji.cashReceiptSourceDetail;
			banhji.userManagement.addMultiTask("Cash Receipt Source Detail","cash_receipt_source_detail",null);
			if(banhji.pageLoaded["cash_receipt_source_detail"]==undefined){
				banhji.pageLoaded["cash_receipt_source_detail"] = true;
			}
			vm.pageLoad();
		}
	});
	
	$(function() {	
		banhji.router.start();
		banhji.source.loadData();
		//console.log($(location).attr('hash').substr(2));
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
		var Href1 = '<?php echo base_url(); ?>assets/water/winvoice-res.css';
		var Href2 = '<?php echo base_url(); ?>assets/water/winvoice-print.css';
		if($(location).attr('hash').substr(2) == "invoice_print"){
			loadStyle(Href1);
			loadStyle(Href2);
		}
	});
</script>