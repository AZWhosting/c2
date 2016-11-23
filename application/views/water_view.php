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
    <div class="row-fluid">
		<!-- Left Side -->
		<div class="span4">
			<!-- Logo of the page -->
			<table width="100%" cellpadding="10">
				<tr>
			        <td valign="top">
			        	<img src="<?php echo base_url();?>/assets/water_bill.png" width="300" height="100">
			        	<div class="supplier-icon" style="margin-top: 15px;">
					       	<div class="span4">
						       	<a href="#/customer" class="center">
						       		<img title="Add Customer" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/customers.ico" />
						       	</a>
						       </div>
						   <!--  <div class="span4">
						       	<a href="#/item" class="center">
						       		<img title="Add Inventory" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/inventories.ico" />
						       	</a>
						    </div>
						    <div class="span4">
						       	<a href="#/item_service" class="center">
						       		<img title="Add Service" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/services.ico" />
						       	</a>
						    </div> -->
						</div>
			        </td>
			 	</tr>
			</table>

			<table class="table table-borderless table-condensed table-vertical-center ">
				<tr>
					<td class="center ">
						<a href="#/reading">
							<img title="Add Reading" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/function_logo/ir_reader.png" width="110" height="200" />
							Reading
						</a>						
					</td>
					<!--td class="center ">
						<a href="#/wIR_reader">
							<img title="Add IR Reader" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/function_logo/ir_reader.png" width="110" height="200" />
							IR Reader
						</a>
					</td-->
					<td class="center ">
						<a href="#/wInvoice">
							<img title="Add Create Invoice" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/function_logo/create_invoice.png" width="110" height="200" />
							W. Invoice
						</a>
					</td>
					<td class="center ">
						<a href="#/wReading_book">
							<img title="Add Reading Book" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/function_logo/reading_book.png" width="110" height="200" />
							R. Book
						</a>						
					</td>
										
				</tr>
				<tr>
										
					<td class="center ">						
						<a href="#/wPrint_center">
							<img title="Add Print Invoice" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/function_logo/print_invoice.png" width="110" height="200" />
							Print
						</a>						
					</td>
					<td class="center ">						
						<a href="#/currency_rate">
							<img title="Receive Water Bill Payment" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/function_logo/receive_payment.png" width="110" height="200" />
							Receipt
						</a>						
					</td>
					<td class="center ">
					</td>									
				</tr>							
			</table>                

		</div>

		<!-- Right Side -->
		<div class="span8">

			<div class="board-chart" style="margin-bottom: 15px;">
				<div class="span12">
					<h4>PCG & Partners</h4>
					<h2 style="color: #113051; margin-bottom: 11px; display: inline-block; width: 100%;" >Financial Snapshot</h2>
					<span style="color: #000000;">As of: Tue Oct 18 2016 15:18:08 GMT+0700 (ICT)</span><br/>
				</div>
			</div>

			<!-- Summary -->
			<div class="row-fluid">
	
				<!-- Column -->
				<div class="span4" >
				
					<!-- Widget -->
					<div class="widget widget-3 customer-border">
					
						<!-- Widget heading -->
						<div class="widget-head">
							<h4 class="heading"><span class="glyphicons coins"><i></i></span>Sale</h4>
						</div>
						<!-- // Widget heading END -->
						
						<div class="widget-body alert alert-primary">
							
							<div align="center" class="text-large strong">0</div>
							<table width="100%">
								<tr align="center">
									<td width="50%">										
										<span >0</span>
										<br>
										<span>Customer</span>
									</td>
									<td width="50%">
										<span >0</span>
										<br>
										<span>Meter</span>
									</td>									
								</tr>
							</table>
						</div>
						<!-- // Widget footer END -->
						
					</div>
					<!-- // Widget END -->
					
				</div>
				<!-- // Column END -->
				
				<!-- Column -->
				<div class="span4" >
				
					<!-- Widget -->
					<div class="widget widget-3 customer-border">
					
						<!-- Widget heading -->
						<div class="widget-head">
							<h4 class="heading"><span class="glyphicons cart_in"><i></i></span>Active Customer</h4>
						</div>
						<!-- // Widget heading END -->
						
						<div class="widget-body alert-info">
							
							<div align="center" class="text-large strong">0</div>
							<table width="100%">
								<tr align="center">
									<td width="33%">										
										<span>0</span>
										<br>
										<span>Active</span>
									</td>
									<td width="33%">
										<span>0</span>
										<br>
										<span>Inactive</span>
									</td>
									<td width="33%">
										<span>0</span>
										<br>
										<span>Voice</span>
									</td>
								</tr>
							</table>
						</div>
						<!-- // Widget footer END -->
						
					</div>
					<!-- // Widget END -->
					
				</div>
				<!-- // Column END -->
				
				<!-- Column -->
				<div class="span4" style="padding-right: 0;">
				
					<!-- Widget -->
					<div class="widget widget-3 customer-border">
					
						<!-- Widget heading -->
						<div class="widget-head">
							<h4 class="heading"><span class="glyphicons cart_in"><i></i></span>Active Customer</h4>
						</div>
						<!-- // Widget heading END -->
						
						<div class="widget-body alert-info" style="background-color: LightGray;">
							
							<div align="center" class="text-large strong">0</div>
							<table width="100%">
								<tr align="center">
									<td width="33%">										
										<span>0</span>
										<br>
										<span>Active</span>
									</td>
									<td width="33%">
										<span>0</span>
										<br>
										<span>Inactive</span>
									</td>
									<td width="33%">
										<span>0</span>
										<br>
										<span>Voice</span>
									</td>
								</tr>
							</table>
						</div>
						<!-- // Widget footer END -->
						
					</div>
					<!-- // Widget END -->
					
				</div>
				<!-- // Column END -->
			</div>

			

			<!-- Top 5 -->
			<div class="row-fluid">
				<div class="span4">								
					<table class="table table-bordered table-primary table-striped table-vertical-center">
				        <thead>
				            <tr>
				                <th class="center" colspan="2">Top 5 Customers</th>				                			                
				            </tr>
				        </thead>
				        <!--tbody data-role="listview"
				        	 data-auto-bind="false"				        	                 
			                 data-template="customerDashBoard-top-customer-template"
			                 data-bind="source: topCustomerDS"></tbody-->			        
				    </table>			
				</div>
				<div class="span4">					
					<table class="table table-bordered table-primary table-striped table-vertical-center">
				        <thead>				           
				            <tr>
				                <th class="center" colspan="2">Top 5 A/R Balance</th>				                			                
				            </tr>					        
				        </thead>
				        <!--tbody data-role="listview"
				        	 data-auto-bind="false"				        	                  
			                 data-template="customerDashBoard-top-ar-template"
			                 data-bind="source: topARDS"></tbody-->			        
				    </table>
				</div>
				<div class="span4">					
					<table class="table table-bordered table-primary table-striped table-vertical-center">
				        <thead>				           
				            <tr>
				                <th class="center" colspan="2">Top 5 Products</th>				                			                
				            </tr>					        
				        </thead>
				        <!--tbody data-role="listview"
				        	 data-auto-bind="false"                
			                 data-template="customerDashBoard-top-product-template"
			                 data-bind="source: topProductDS"></tbody-->			        
				    </table>
				</div>		
			</div>

			<!-- Graph -->
		    <div class="innerLR innerT">			
				<div id="esale-graph" style="height: 150px;"></div>
			</div>
		</div>

		<!-- <div class="row-fluid">		
	        <div>
	        	<input data-role="dropdownlist"                   
	                   data-value-primitive="true"
	                   data-text-field="text"
	                   data-value-field="value"
	                   data-bind="value: sorter,
	                              source: sortList,                              
	                              events: { change: sorterChanges }" />

	        	<input data-role="datepicker"
	        		   data-format="dd-MM-yyyy"
	                   data-bind="value: sdate,
	                              events: { change: dateChanges }" >

	            <input data-role="datepicker"
	            	   data-format="dd-MM-yyyy"
	                   data-bind="value: edate,
	                              events: { change: dateChanges }" >
	            
	            <button type="button" data-role="button" data-icon="search" data-bind="click: search"></button>
	        </div>
        	
            <div data-role="grid" 
					data-bind="source: saleByLocationDS"
				    data-auto-bind="false"	        
				    data-row-template="esale-by-location-row-template"						                           
				    data-columns='[
				    	{ title: "No.", width: 45 },				       	
				        { title: "Location" },	                     
				        { title: "អតិថិជនកំពុងប្រើប្រាស់" },
				        { title: "អតិថិជនឈប់ប្រើប្រាស់" },
				        { title: "Deposit" },
				        { title: "បរិមាណលក់ភ្លើង" },	            
				        { title: "Amount" },
				        { title: "ជំពាក់" },
				        { title: "Balance" }				                           	                    
				    ]'></div>

    	</div> -->


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
	            <li class="active"><a href="#tab1-1" class="glyphicons notes_2" data-toggle="tab"><i></i><span class="strong"><span>License</span></span></a>
	            </li>  
	             <li><a href="#tab1-3" class="glyphicons pushpin" data-toggle="tab"><i></i><span class="strong"><span>Bloc</span></span></a>
	            </li>  
	            <li><a href="#tab1-2" class="glyphicons old_man" data-toggle="tab"><i></i><span class="strong"><span>Customer Types</span></span></a>
	            </li>  
	            <li><a href="#tab1-4" class="glyphicons list" data-toggle="tab"><i></i><span class="strong"><span>Plans</span></span></a>
	            </li>                       
	        </ul>
	    </div>
	    <!-- // Tabs Heading END -->

	    <div class="widget-body span9">
	        <div class="tab-content">
	        	
	            <!-- License -->
	            <div class="tab-pane active" id="tab1-1">
	            	<a class="btn-icon btn-primary glyphicons circle_plus" style="width: 130px" href="#/add_license"><i></i>Add License</a>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center" width="100"><span>Number</span></th>
	            				<th class="center"><span>License</span></th>
	            				<th class="center"><span>Abbr</span></th>
	            				<th class="center" width="160"><span>Representive</span></th>
	            				<th class="center"><span>Phone</span></th>
	            				<th class="center"><span>Address</span></th>
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
	            <div class="tab-pane" id="tab1-2">
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
	            <div class="tab-pane" id="tab1-3">
	            	<div style="clear: both;margin-bottom: 10px;">
		            	<input data-role="dropdownlist"
		            	   class="span3"
		            	   style="padding-right: 1px;height: 32px;" 
            			   data-option-label="(--- Select ---)"
            			   data-auto-bind="false"			                   
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: blockCompanyId,
		                              source: licenseDS"/>
		            	<input type="text" placeholder="Location" style="height: 32px;"  class="span3 k-textbox k-invalid" />
		            	<input type="text" placeholder="Abbr" style="height: 32px;" class="span3 k-textbox k-invalid" />
		            	<a class="btn btn-default glyphicons circle_plus cutype-icon" style="width: 80px;margin-left: 2px;" href="#/plan"><i></i>Add</a>
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
				                data-template="cusTypeSetting-template"
				                data-bind="source: dataSource"></tbody>
	            	</table>

	            </div>
	            <!-- // CUSTOMER TYPE END -->
	            <!-- // CUSTOMER TYPE END -->
	            <div class="tab-pane" id="tab1-4">
	            	<a class="btn-icon btn-primary glyphicons circle_plus" style="width: 110px;" href="#/plan"><i></i>Add Plan</a>
	            	<table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs">
	            		<thead>
	            			<tr>
	            				<th class="center"><span data-bind="text: lang.lang.name"></span></th>
	            				<th class="center"><span>Usage Type</span></th>
	            				<th class="center"><span>Valid From</span></th>
	            				<th class="center"><span>Valid To</span></th>
	            				<th class="center">Action</th>
	            			</tr>
	            		</thead>
	            		<tbody data-role="listview"	            				
				                data-template="planSetting-template"
				                data-bind="source: dataSource"></tbody>
	            	</table>

	            </div>
	            <!-- // CUSTOMER TYPE END -->

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
		<td>#= phone #</td>
		<td>#= address #</td>
		<td>#= expire_date #</td>
		<td>#= max_customer #</td>
		<td>
			#if(status==1){#
				<span class="btn-action glyphicons ok_2 btn-success"><i></i></span>
			#}else{#
				<span class="btn-action glyphicons remove_2 btn-danger"><i></i></span>
			#}#
		</td>
	</tr>
</script>
<script id="cusTypeSetting-template" type="text/x-kendo-tmpl">
	<tr>
		<td>sdfasdf</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</script>
<script id="custType-template" type="text/x-kendo-tmpl">                    
    <tr>
    	<td>
    		#:name#
   		</td>
   		<td align="center">
    		#:abbr#
   		</td>
   		<td align="center">
    		#if(is_company=="1"){#
    			Yes
    		#}else{#
    			No
    		#}#
   		</td>
   		<td align="center">   			   
		        <a class="btn-action glyphicons ok_2 btn-success" href="\\#"><i></i></a>
		        #if(is_system=="0"){#
			        <a class="btn-action glyphicons remove_2 btn-danger" href="\\#"><i></i></a>				        
		        #}#	   	
   		</td>   		
   	</tr>
</script>
<script id="customerSetting-edit-contact-type-template" type="text/x-kendo-tmpl">
    <div class="product-view k-widget">
        <dl>                
            <dd>
                <input type="text" class="k-textbox" data-bind="value:name" name="ProductName" required="required" validationMessage="required" />
                <span data-for="ProductName" class="k-invalid-msg"></span>
            </dd>               
        </dl>
        <dl>                
            <dd>
                <input type="text" class="k-textbox" data-bind="value:abbr" name="abbr" required="required" validationMessage="required" />
                <span data-for="abbr" class="k-invalid-msg"></span>
            </dd>               
        </dl>
        <dl>                
            <dd>
                <select data-bind="value: is_company" >
	                <option value="0"><span data-bind="text: lang.lang.not_a_company"></span></option>
	                <option value="1"><span data-bind="text: lang.lang.it_is_a_company"></span></option>			                
	            </select>
            </dd>              
        </dl>
        <div class="edit-buttons">
            <a class="k-button k-update-button" href="\\#"><span class="k-icon k-update"></span></a>
            <a class="k-button k-cancel-button" href="\\#"><span class="k-icon k-cancel"></span></a>
        </div>
    </div>
</script>
<script id="planSetting-template" type="text/x-kendo-tmpl">
	<tr>
		<td>sdfasdf</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</script>


<script id="plan" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden;">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>						
					</div>
			        <h2 style="padding:0 15px;">Add Plan</h2>
			        <div class="span12 row-fluid" style="overflow: hidden;padding:20px 0;">
			        	<input type="text" id="" name="Name" class="k-textbox k-invalid" placeholder="Name" required="" validationmessage="" style="width: 100%;margin-bottom: 20px;" data-bind="value: current.name" aria-invalid="true">

			        	<select data-role="dropdownlist"
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="
		                   	source: selectType,
		                   	value: current.type"
		                   style="width: 100%;" ></select>		
		                <div class="row" style="margin-top: 20px;">	
		                	<div class="span6">
		                		<input type="text" 
			                	style="width: 100%" 
			                	placeholder="Valide From" 
			                	data-role="datepicker"
			                	data-format="dd-MM-yyyy"
					           	data-bind="value: current.validFrom,
					           			  	max: current.validTo" />
			                </div>
			                <div class="span6">
		                 		<input type="text" 
			                	style="width: 100%" 
			                	placeholder="Valide To" 
			                	data-role="datepicker"
			                	data-format="dd-MM-yyyy"
					           	data-bind="value: current.validTo,
					           			  	min: current.validFrom" />
			                </div>
			            </div>
		                <table class="table table-bordered table-condensed table-striped table-primary table-vertical-center checkboxs" style="margin-top: 20px;">
		                	<thead>
		                		<tr>
		                			<th>Name</th>
		                			<th width="180">Type</th>
		                			<th width="160">Rate</th>
		                			<th width="160">Tier From</th>
		                			<th width="160">Tier To</th>
		                			<th width="70">Taxed</th>
		                			<th width="60" style="text-align: center"><p class="addItem glyphicons circle_plus" data-bind="click: addItem"><i></i></p></th>
		                		</tr>
		                	</thead>
		                	<tbody data-bind="source: items.dataSource" data-auto-bind="false" data-role="listview" data-template="tariff-list-item">
		                	</tbody>
		                </table>
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
<script id="tariff-list-item" type="text/x-kendo-tmpl">
	<tr>
		<td><input class="k-textbox k-invalid" style="width: 98%" type="text" data-bind="value: name" /></td>
		<td>
			<select data-role="dropdownlist"
           		data-value-primitive="true"
           		data-text-field="value"
           		data-value-field="id"
           		data-bind="
		           	source: items.types,
		           	value: type"
           		style="width: 100%;" ></select>
		</td>
		<td><input style="width: 98%" data-role="numerictextbox" type="text" data-bind="value: rate" /></td>
		<td><input data-role="numerictextbox" style="width: 98%" type="text" data-bind="value: tierFrom" /></td>
		<td><input data-role="numerictextbox" style="width: 98%" type="text" data-bind="value: tierTo" /></td>
		<td><input style="width: 98%" type="checkbox" data-bind="checked: taxed" /></td>
		<td style="text-align:center"><p class="addItem glyphicons circle_remove" data-bind="click: removeItem"><i></i></p></td>
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
			        <h2 style="padding:0 15px;">Add License</h2>
			        <div class="span12 row-fluid" style="overflow: hidden;padding:20px 0;">
			        	<div class="span4">
				        	<label>License Number</label>
				        	<input type="text" 
				        			class="k-textbox k-invalid" 
				        			data-bind="value : obj.number"
				        			style="width: 100%;margin-bottom: 15px;" />
				        	
				        	
				        	<label>Max Customer</label>
			        		<input type="text" 
			        			class="k-textbox k-invalid" 
			        			data-bind="value : obj.max_customer"
			        			style="width: 100%;margin-bottom: 15px;" />
			        		<label>Currency</label>
			        		<select data-role="dropdownlist"
			                   data-value-primitive="true"
			                   data-text-field="name"
			                   data-value-field="id"
			                   data-bind="
			                   	source: selectCurrency,
			                   	value: obj.currency"
			                   style="width: 100%;margin-bottom: 15px;" ></select>
					        <label>Tel</label>
			        		<input type="text" 
			        			class="k-textbox k-invalid" 
			        			data-bind="value : obj.mobile"
			        			style="width: 100%;margin-bottom: 15px;" />
			        		<label>Status</label>
			        		<select data-role="dropdownlist"
			                   data-value-primitive="true"
			                   data-text-field="name"
			                   data-value-field="id"
			                   data-bind="
			                   	source: selectType,
			                   	value: obj.status"
			                   style="width: 100%;margin-bottom: 15px;" ></select>

				        </div>
				        <div class="span4">
				        	<label>License Name</label>
				        	<input type="text" 
				        			class="k-textbox k-invalid" 
				        			data-bind="value : obj.name"
				        			style="width: 100%;margin-bottom: 15px;" />
				        	<label>Expire Date</label>
			        		<div style="margin-bottom: 15px;">
			        			<input type="text" 
			                	style="width: 100%;" 
			                	data-role="datepicker"
			                	data-format="dd-MM-yyyy"
					           	data-bind="value: obj.expire_date,
					           			  	min: toDay" />
					        </div>
				        	
			                <label>Abbr</label>
			        		<input type="text" 
			        			class="k-textbox k-invalid" 
			        			data-bind="value : obj.abbr"
			        			style="width: 100%;margin-bottom: 15px;" />
			        		<label>Phone</label>
			        		<input type="text" 
			        			class="k-textbox k-invalid" 
			        			data-bind="value : obj.phone"
			        			style="width: 100%;margin-bottom: 15px;" />
			        		
				        </div>
				        <div class="span4">
				        	<label>Description</label>
				        	<input type="text" 
				        			class="k-textbox k-invalid" 
				        			data-bind="value : obj.description"
				        			style="width: 100%;margin-bottom: 15px;" />
				        	<label>Address</label>
			        		<input type="text" 
			        			class="k-textbox k-invalid" 
			        			data-bind="value : obj.address"
			        			style="width: 100%;margin-bottom: 15px;" />
				        	<label>Representative</label>
			        		<input type="text" 
			        			class="k-textbox k-invalid" 
			        			data-bind="value : obj.representative"
			        			style="width: 100%;margin-bottom: 15px;" />
			        		
					       	<label>Email</label>
			        		<input type="text" 
			        			class="k-textbox k-invalid" 
			        			data-bind="value : obj.email"
			        			style="width: 100%;margin-bottom: 15px;" />
				        </div>
				        <div class="span12" style="padding: 0">
				        	<label>Term and Condition</label>
				        	<div class="controls">
								<textarea data-role="editor"
				                      data-tools="['bold',
				                                   'italic',
				                                   'underline',
				                                   'strikethrough',
				                                   'justifyLeft',
				                                   'justifyCenter',
				                                   'justifyRight',
				                                   'justifyFull']"
				                      data-bind="value: obj.term_of_condition"
				                      style="height: 200px;"></textarea>
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
							<div class="widget widget-4 widget-tabs-icons-only margin-bottom-none"-->

							    <!-- Widget Heading -->
							    <div class="widget-head">

							        <!-- Tabs -->
							        <ul class="pull-right">
							        	<li style="font-size: large; color: black; font-weight: bold;">							            	
							            	<span data-bind="text: obj.name"></span>
							            </li>
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
							            <div id="tab1-4" class="tab-pane active box-generic" data-bind="visible: meter_visible">
							            	<table class="table table-borderless table-condensed cart_total cash-table">
								            	<tr>
								            		<td width="50%">
								            			<a class="btn btn-block btn-inverse" data-bind="click: goMeter">METER</a>
								            		</td>
								            		<td width="50%">
								            			<span class="btn btn-block btn-primary" data-bind="click: goDeposit"><span><span data-bind="text: lang.lang.c_deposit"></span></span>								            			
								            		</td>
								            	</tr>
							            	</table>
							            </div>
							            <!-- // Transactions Tab content END -->							           					            

							            <!-- INFO Tab content -->
							            <!--div id="tab2-4" class="tab-pane box-generic">
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
							            </div-->
							            <!-- // INFO Tab content END -->

							            <!-- NOTE Tab content -->
							            <!--div id="tab3-4" class="tab-pane">

										    <div-->
												<!--input type="text" class="k-textbox" 
														data-bind="value: note, events:{change:saveNoteEnter}" 
														placeholder="Add memo ..." 
														style="width: 366px;" /-->
												<!--span class="btn btn-primary" data-bind="click: saveNote"><span data-bind="text: lang.lang.add"></span></span>
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
											
							            </div-->
							            <!-- // NOTE Tab content END -->

							            <!-- Attach Tab content -->
								        <!--div id="tab4-4" class="tab-pane">							            	
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

								        </div-->
								        <!-- // Attach Tab content END -->							            								            

							        </div>
							    </div>
							</div>
						</div>

						<!--div class="span6" style="margin-bottom: 10px;">
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
				                data-template="waterCenter-transaction-tmpl"
				                data-bind="source: transactionDS" >
				        </tbody>
	            	</table>

	            	<div id="pager" class="k-pager-wrap"
				    	 data-auto-bind="false"
			             data-role="pager" data-bind="source: transactionDS"></div-->	            	
				</div>
			</div>			
		</div>
	</div>		
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
			        	<input type="text" id="" name="Licence" class="k-textbox k-invalid" placeholder="Licence" required="" validationmessage="" style="width: 100%;margin-bottom: 20px;" data-bind="value: obj.licence" aria-invalid="true">
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

<script id="waterAddMeter" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden;">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>						
					</div>
			        <h2 style="padding:0 15px;">Add Meter</h2>
			        <div class="span12 row-fluid" style="overflow: hidden;padding:40px 0;">
			        	<div class="span4">
			        		User Name: <span data-bind="text: contact.name"></span>
			        	</div>
			        	<div class="span8">
			        		<label>Item</label>
				        	<input type="text" 
				        			class="k-textbox k-invalid" 
				        			placeholder="Item" 
				        			data-bind="value : obj.item"
				        			style="width: 100%;margin-bottom: 20px;" />
			        		<label>Status</label>
				        	<input type="text" 
				        			class="k-textbox k-invalid" 
				        			placeholder="Status" 
				        			data-bind="value : obj.status"
				        			style="width: 100%;margin-bottom: 20px;" />
				        	<label>Location</label>
				        	<input type="text" 
				        			class="k-textbox k-invalid" 
				        			placeholder="Location" 
				        			data-bind="value : obj.location"
				        			style="width: 100%;margin-bottom: 20px;" />
				        	<label>Plan</label>
				        	<input type="text" 
				        			class="k-textbox k-invalid" 
				        			placeholder="Plan" 
				        			data-bind="value : obj.plan"
				        			style="width: 100%;margin-bottom: 20px;" />
				        	<label>Map</label>
				        	<input type="text" 
				        			class="k-textbox k-invalid" 
				        			data-bind="value : obj.map"
				        			placeholder="Map" 
				        			style="width: 100%;margin-bottom: 20px;" />
				        	<label>Memo</label>
				        	<textarea class="k-textbox k-invalid" placeholder="Memo" data-bind="value : obj.memo" style="width: 100%;margin-bottom: 20px;"></textarea> 
				        	<label>Type</label>
				        	<select
				        		data-role="dropdownlist"
				        		data-auto-bind="false"
				        		data-value-primitive="true"
			                    data-text-field="name"
			                    data-value-field="id"
			                    style="width: 100%;margin-bottom: 20px;"
				        		data-bind="
				        			value: obj.type,
				        			source: types
				        		"></select>
				        	<label>Starting No.</label>
				        	<input type="text" 
				        			class="k-textbox k-invalid" 
				        			placeholder="Starting No." 
				        			data-bind="value : obj.starting_no"
				        			style="width: 100%;margin-bottom: 20px;" />
				        	<label>Number Digit</label>
				        	<input type="text" 
				        			class="k-textbox k-invalid"
				        			placeholder="Number Digit"
				        			data-bind="value : obj.number_digit" 
				        			style="width: 100%;margin-bottom: 20px;" />
				        	
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
								<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 80px;margin:0;"><i></i> <span data-bind="text: lang.lang.save_new"></span></span>
								<span id="saveClose" class="btn btn-icon btn-success glyphicons power" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save-close"></span></span>		
							</div>
						</div>
					</div>
					<!-- // Form actions END -->		
				</div>						
			</div>
		</div>
	</div>
</script>

<script id="Reading" type="text/x-kendo-template">
	<div  class="row-fluid saleSummaryCustomer">
		<span class="glyphicons no-js remove_2 pull-right" 
	    				onclick="javascript:window.history.back()"
						data-bind="click: cancel"><i></i></span>	
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
							
							<h4 class="separator bottom" style="margin-top: 10px;">Please upload reading file</h4>
							<a data-bind="click: exportEXCEL">
								<span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 200px!important;position: absolute;top: 85px;right: 10px;">
									<i></i> 
									<span >Download Reading file</span>
								</span>
							</a>
							<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
							  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onSelected}" id="myFile"  class="margin-none" />
							</div>
							<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 160px!important;"><i></i>
							<span data-bind="click: importReading">Start Reading</span></span>
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
*	Menu Section         	  *
**************************** -->

<script id="waterMenu" type="text/x-kendo-template">
	<!-- <ul class="topnav">
	  	<li><a href='#/' class='glyphicons home'><i></i></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><span data-bind="text: lang.lang.customer"></span> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>  				
  				<li><a href='#/wCustomer_center'><span >Customer Center</span></a></li>
  				<li><a href='#/wNew_customer'><span data-bind="text: lang.lang.new_customer"></span></a></li>
  				<li><a href='#/wCustomer_order'><span data-bind="text: lang.lang.reorder_customer"></span></a></li>  				
  			</ul>
	  	</li>	  	
	  	<li role="presentation" class=""><a href="#/water_center">Center</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><span data-bind="text: lang.lang.reading"></span> <span class='caret'></span></a>
  			<ul class='dropdown-menu'> 
  				<li><a href='#/wReading'><span data-bind="text: lang.lang.take_reading"></span></a></li>
  				<li><a href='#/wIR_reader'><span data-bind="text: lang.lang.ir_reader"></span></a></li>  				
  				<li><a href='#/wReading_book'><span data-bind="text: lang.lang.reading_book"></span></a></li>
  				<li><a href='#/wReading_center'><span data-bind="text: lang.lang.edit_reading"></span></a></li>  				 
  			</ul>
	  	</li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><span data-bind="text: lang.lang.invoice"></span> <span class='caret'></span></a>
  			<ul class='dropdown-menu'> 
  				<li><a href='#/wInvoice'><span data-bind="text: lang.lang.invoice"></span></a></li>
  				<li><a href='#/wPrint_center'><span data-bind="text: lang.lang.print"></span></a></li>  				  								 
  			</ul>
	  	</li>	  	
	  	<li><a href='#/cashier'><span data-bind="text: lang.lang.cashier"></span></a></li>	  	
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><span data-bind="text: lang.lang.inventory"></span> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>  				
  				<li><a href='#/wInventory_item'><span data-bind="text: lang.lang.inventory_center"></span></a></li>
  				<li><a href='#/item'><span data-bind="text: lang.lang.new_item"></span></a></li>
  				<li><a href='#/item_catalog'><span data-bind="text: lang.lang.new_catalog"></span></a></li>
  				<li><a href='#/item_assembly'><span data-bind="text: lang.lang.new_assembly"></span></a></li>  				 				 				
  			</ul>
	  	</li>
	  	<li><a href='#/wReport_center'><span data-bind="text: lang.lang.report"></span></a></li>	  	
	  	<li><a href='#/setting' class='glyphicons settings'><i></i></a></li>
	</ul> -->
	<ul class="topnav pull-left">
	  	<li><a href='#/' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/center'><span data-bind="text: lang.lang.center"></span></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/customer'><span >New Customer</span></a></li> 
  				<li ><a href='#/reorder'><span >Reorder</span></a></li>  				
  				<li><span class="li-line"></span></li>
  				<li><a href='#/reading'><span >Meter Reading</span></a></li> 
  				<li><a href='#/reading_book'><span >Reading Book</span></a></li>
  				<li><a href='#/edit_reading'><span >Edit Reading</span></a></li>
  				<li><span class="li-line"></span></li>
  				<li><a href='#/calculate_invoice'><span >Calculate Invoice</span></a></li> 
  				<li><a href='#/print_invoice'><span >Print Invoice</span></a></li>
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
	banhji.item = kendo.observable({
		dataSource 	: dataStore(apiUrl + "tariffs"),
		types 		: [
			{id: 'excemption', value: "Excemption"},
			{id: 'tariff', value: "Tariff"},
			{id: 'deposit', value: "Deposit"},
			{id: 'service', value: "Service"},
			{id: 'maintenance', value: "Maintenance"},
			{id: 'installation', value: "Installation"}
		],
		addNew 		: function() {
			banhji.item.dataSource.add({
				name 		: null,
				type 		: {name: 'excemption', value: "Excemption"},
				rate 		: null,
				tierFrom 	: null,
				tierTo 		: null,
				taxed 		: false
			});
			this.setCurrent(this.dataSource.at(this.dataSource.data().length -1));
		},
		current 	: null,
		setCurrent 	: function(current) {
			banhji.item.set('current', current);
		},
		remove 		: function(e) {
			banhji.item.dataSource.remove(e.data);
		},
		edit 		: function(e) {
			banhji.item.setCurrent(e.data);
		},
		cancel 		: function() {
			banhji.item.dataSource.cancelChanges();
		},
		save 		: function() {
			var dfd = $.Deferred();
			banhji.item.dataSource.sync();
			banhji.item.dataSource.bind('requestEnd', function(e){
				if(e.response.results) {
					dfd.resolve(e.response.results);
				}
			});
			banhji.item.dataSource.bind('error', function(e){
				dfd.reject(e.status);
			});
			return dfd.promise();
		}
	});
	//Setting
	banhji.plan = kendo.observable({
		dataSource 	: dataStore(apiUrl + "plans"),
		items 		: banhji.item,
		current 	: null,
		selectType  : [{id: "water", name: "Water"},{id: "electricity", name: "Electricity"}],
		pageLoad    : function(){
			this.addNew();
		},
		setCurrent 	: function(current) {
			this.set('current', current);
		},
		addNew 	  	: function() {
			this.dataSource.add({
				name 		: null,
				type 		: {id: "water", name: "Water"},
				validFrom 	: null,
				validTo 	: null
			});
			this.setCurrent(this.dataSource.at(this.dataSource.data().length -1));
		},
		remove 		: function(e) {
			this.dataSource.remove(e.data);
		},
		addItem 	: function() {
			this.items.addNew();
		},
		removeItem 	: function(e) {
			this.items.remove(e);
		},
		save 		: function() {
			var dfd = $.Deferred();
			banhji.item.dataSource.sync();
			banhji.item.dataSource.bind('requestEnd', function(e){
				if(e.response.results) {
					dfd.resolve(e.response.results);
				}
			});
			banhji.item.dataSource.bind('error', function(e){
				dfd.reject(e.status);
			});
			return dfd.promise();
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();
			this.items.cancel();		
			window.history.back();
		}
	});
	banhji.addLicense = kendo.observable({
		dataSource 	: dataStore(apiUrl + "branches"),
		toDay 		: new Date(),
		obj 		: null,
		isEdit      : false,
		pageLoad    : function(){
			this.addNew();
		},
		selectType 	: [{id: "active", name: "Active"},{id: "inactive", name: "Inactive"},{id: "void", name: "Void"}],
		selectCurrency : [{id: "KHR", name: "KHR"},{id: "USD", name: "USD"},{id: "THB", name: "THB"},{id: "VND", name: "VND"}],
		addNew 	  	: function() {
			this.set("obj", null);		
			this.set("isEdit", false);		
			this.dataSource.insert(0,{	
				number 			: null,
				name 			: null,
				description 	: null,
				max_customer 	: null,
				expire_date 	: null,
				address 		: null,
				currency 		: "KHR",
				abbr 			: null,
				representative 	: null,
				mobile 			: null,
				phone 			: null,
				email 			: null,
				status 			: "active",
				term_of_condition 			: null
			});
			var obj = this.dataSource.at(0);
			console.log(this.dataSource.data());			
			this.set("obj", obj);	
		},
		save 		: function() {
			var dfd = $.Deferred();
			this.dataSource.sync();
			this.dataSource.bind('requestEnd', function(e){
				if(e.response.results) {
					dfd.resolve(e.response.results);
				}
			});
			this.dataSource.bind('error', function(e){
				dfd.reject(e.status);
			});
			return dfd.promise();
		},
		cancel 				: function(){
			this.dataSource.cancelChanges();	
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
        licenseDS 			: dataStore(apiUrl + "branches"),
		contactTypeDS 		: banhji.source.customerTypeDS,
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
		pageLoad 			: function(){

		},
		cancel 				: function(){
			//this.dataSource.cancelChanges();		
			window.history.back();
		}
	});
    banhji.waterCenter = kendo.observable({
		lang 				: langVM,
		transactionDS  		: dataStore(apiUrl + 'transactions'),
		filterKey 			: 1,
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
			filter:{ field:"use_water", value:1 },
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
			this.contactDS.filter({field:"use_water", value: this.get("filterKey")});
			if(this.meter_visible == true){
				this.set('meter_visible',false);
			}
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
		meter_visible 		: false,
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
	banhji.meter = kendo.observable({
		lang 				: langVM,
		dataSource  		: dataStore(apiUrl + "meters"),
		itemDS 				: null,
		obj 				: null,
		isEdit 				: false,
		contact 			: null,
		pageLoad 			: function(id){
			this.addEmpty(this.contact.id);
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
				contact_id		: id,
				item 			: null,
				status 			: null,
				location 		: null,
				plan 			: null,
				map 			: null,
				memo 			: null,
				type 			: {id: "w", name: "Water"},
				starting_no 	: null,
				number_digit 	: null		
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
	banhji.reading = kendo.observable({
		lang 				: langVM,
		dataSource  		: dataStore(apiUrl + "meters"),
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
		onSelected 			: function(){
			$('li.k-file').remove();
		},
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
			            { value: "number" },
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
			    fileName: "reading.xlsx"
			});
		},
		importReading 		: function(){

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
		plan: new kendo.Layout("#plan", {model: banhji.plan}),
		reading: new kendo.Layout("#Reading", {model: banhji.reading}),
		customerDeposit: new kendo.Layout("#customerDeposit", {model: banhji.customerDeposit}),
		addLicense: new kendo.Layout("#addLicense", {model: banhji.addLicense}),
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
	banhji.router.route("/meter", function(){		
		banhji.view.layout.showIn("#content", banhji.view.meter);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		
		var vm = banhji.meter;

		banhji.userManagement.addMultiTask("Add Meter","meter",null);

		if(banhji.pageLoaded["meter"]==undefined){
			banhji.pageLoaded["meter"] = true;
		}

		vm.pageLoad();
	});
	
	banhji.router.route("/plan", function(){		
		banhji.view.layout.showIn("#content", banhji.view.plan);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		
		var vm = banhji.plan;

		banhji.userManagement.addMultiTask("Add Plan","plan",null);

		if(banhji.pageLoaded["plan"]==undefined){
			banhji.pageLoaded["plan"] = true;
		}
		console.log("plan");
		vm.pageLoad();
	});
	banhji.router.route("/add_license", function(){		
		banhji.view.layout.showIn("#content", banhji.view.addLicense);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		banhji.view.menu.showIn('#secondary-menu', banhji.view.waterMenu);
		
		var vm = banhji.addLicense;

		banhji.userManagement.addMultiTask("Add Licence","Licence",null);

		if(banhji.pageLoaded["add_license"]==undefined){
			banhji.pageLoaded["add_license"] = true;
		}
		console.log("add_license");
		vm.pageLoad();
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
	$(function() {	
		banhji.router.start();
		banhji.source.loadData();
		console.log($(location).attr('hash').substr(2));

		function createCookie(name,value,days) {
		    if (days) {
		        var date = new Date();
		        date.setTime(date.getTime()+(days*24*60*60*1000));
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
		var Href1 = '<?php echo base_url(); ?>assets/water/water.css';
		loadStyle(Href1);
	});
</script>