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
			  	<input type="text" class="span2 search-query" placeholder="Search" id="search-placeholder" 
			  			data-bind="value: searchText" 
			  			style="background-color: #555555; color: #ffffff; border-color: #333333; height: 22px;">
			  	<button type="submit" class="btn btn-inverse" data-bind="click: search"><i class="icon-search"></i></button>
			</form>
			<ul class="topnav" id="secondary-menu">
			</ul> 
			<ul class="topnav pull-right">
				<li role="presentation" class="dropdown">
			  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> <i class="icon-th-list"></i></a>
		  			<ul class="dropdown-menu ul-multiTaskList" data-template="multiTaskList-row-template" data-bind="source: multiTaskList">  				  				
		  			</ul>
			  	</li>
				<li role="presentation" class="dropdown">
			  		<a style="color: #fff;" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">[<span data-bind="text: getUsername"></span>]</a>
		  			<ul class="dropdown-menu">  				  				
		  				<li><a href="#" data-bind="click: lang.changeToKh">ភាសាខ្មែរ</a></li>
    					<li><a href="#" data-bind="click: lang.changeToEn">English</a></li>
						<li class="divider"></li>
					<!-- 	<li><a href="<?php echo base_url(); ?>admin">Setting</a></li> -->
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
						<!-- <li style="text-align:center;">
							<a href="<?php echo base_url(); ?>app">
								<img title="App Center" src="<?php echo base_url(); ?>assets/app_center/app_center.jpg" alt="App Center">
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><h5 data-bind="text: lang.lang.app_center" style="margin-top: 5px; display: inline-block;" style="margin-top: 5px; display: inline-block;"></h5></span>
							</a>
						</li>	 -->										
					</ul>
				</div>
			</div>
			<div class="row" style="margin-top: 5px;">
				<div class="span12" style="width: 100%; padding: 0 5px;">
					<div class="home-chart" style="width: 95%; padding: 0 15px;">
						
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
			<br>
			<br>
		</div>		
		
		<div class="span6" style="margin-bottom: 15px;">
			<div class="row">
				<div class="span12" style="background: #fff;">
					<!-- Add New Board -->
					<div class="board-add" style="padding: 15px 0;">
						<div class="span4" style="padding-right: 0;">
							<h2 style="color: #6399D5; font-size: 20px;" data-bind="text: lang.lang.welcome"></h2>
							<p style="font-size: 12px;">
								<span data-bind="text: lang.lang.to_get_you_started_with_banhji"></span> <a target="_blank" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/guide/welcome_guide.pdf">[Welcome Guide]</a>.
							</p>
						</div>
						<div class="span8" style="padding-right: 0; padding-left: 0;">
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
						</div>
					</div><!--End Add New Board -->

				</div>
				
				<div class="board-chart">
					<div class="span12">
						<h4 data-bind="text: companyName"></h4>
						<h2 style="color: #113051; margin-bottom: 11px; display: inline-block; width: 100%;" data-bind="text: lang.lang.financial_snapshot"></h2>
						<span style="color: #000000;"><span data-bind="text: lang.lang.as_of"></span>:&nbsp;<span id="today-date" data-bind="text: today"></span></span><br/>
					</div>
				</div>

				<div class="board-chart">
					<div class="span12">
						<div class="span6">
							<p><span data-bind="text: lang.lang.performance"></span></p>
							<a href="#/statement_profit_loss">
								<table class="performance">
									<tr>
										<td><span data-bind="text: lang.lang.income"></span></td>
										<td></td>
										<td align="right"><span data-bind="text: obj.income"></span></td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.expense"></span></td>
										<td></td>
										<td align="right"><span data-bind="text: obj.expense"></span></td>
									</tr>
									<tr>
										<td><b><span data-bind="text: lang.lang.net_income"></span></b></td>
										<td></td>
										<td align="right"><b data-bind="text: obj.net_income"></b></td>
									</tr>
								</table>
							</a>     
						</div>
						<div class="span6">
							<p><span data-bind="text: lang.lang.position"></span></p>
							<a href="#/statement_financial_position">
								<table class="position" style="width: 100%;">
									<tr>
										<td><span data-bind="text: lang.lang.asset"></span></td>
										<td></td>
										<td align="right"><span data-bind="text: obj.asset"></span></td>
									</tr>
									<tr>
										<td><span data-bind="text: lang.lang.liabilities"></span></td>
										<td></td>
										<td align="right"><span data-bind="text: obj.liability"></span></td>
									</tr>
									<tr>
										<td><b><span data-bind="text: lang.lang.equity"></span></b></td>
										<td></td>
										<td align="right"><b data-bind="text: obj.equity"></b></td>
									</tr>
								</table>
							</a>
						</div>
					</div>
					
					<div class="span12">
						<div class="span6">
							<a href="#/customer_balance_summary">
								<div class="widget-body alert-info welcome-nopadding" >
									<p><span data-bind="text: lang.lang.receivable"></span></p>
							
									<div align="center" class="text-large strong" data-bind="text: obj.ar"></div>
								
									<table width="100%" >
										<tr align="center">
											<td>										
												<span data-bind="text: obj.ar_open"></span>
												<br>
												<span><span data-bind="text: lang.lang.open"></span></span>
											</td>
											<td>
												<span data-bind="text: obj.ar_customer"></span>
												<br>
												<span><span data-bind="text: lang.lang.customers"></span></span>
											</td>
											<td>
												<span data-bind="text: obj.ar_overdue"></span>
												<br>
												<span><span data-bind="text: lang.lang.overdue"></span></span>
											</td>
										</tr>
									</table>
								</div>
							</a>
						</div>
						<div class="span6">
							
							<a href="#/suppliers_balance_summary">
								<div class="widget-body  alert-info welcome-nopadding" style="width: 100%;">
									<p><span data-bind="text: lang.lang.payables"></span></p>
							
									<div align="center" class="text-large strong" data-bind="text: obj.ap"></div>
								
									<table width="100%">
										<tr align="center">
											<td>										
												<span data-bind="text: obj.ap_open"></span>
												<br>
												<span><span data-bind="text: lang.lang.open"></span></span>
											</td>
											<td>
												<span data-bind="text: obj.ap_vendor"></span>
												<br>
												<span><span data-bind="text: lang.lang.suppliers"></span></span>
											</td>
											<td>
												<span data-bind="text: obj.ap_overdue"></span>
												<br>
												<span><span data-bind="text: lang.lang.overdue"></span></span>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</a>
					</div>					
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
<script id="customTable" type="text/x-kendo-template">
	<div id="example">
		<div>
			<input type="number" class="k-textbox" data-bind="value: id" />
			<input type="button" class="k-button" data-bind="click: searchTxn" value="Transaction" />
		</div>

		<br>

		<h2>Transaction</h2>
		
		</table>
        <div data-role="grid"
             data-editable="true"
             data-auto-bind="false"
             data-toolbar="['create', 'save', 'cancel']"
             data-columns="[
                 { 'field': 'type' },
                 { 'field': 'number' },
                 { 'field': 'sub_total' },
                 { 'field': 'discount' },
                 { 'field': 'tax' },
                 { 'field': 'amount' },
                 { 'field': 'deposit' },
                 { 'field': 'remaining' },
                 { 'field': 'issued_date' },
                 { 'field': 'due_date' },
                 { 'field': 'status' },
                 { 'field': 'deleted' }
             ]"
             data-bind="source: txnDS"></div>

        <h2>Item Line</h2>

        <div data-role="grid"
             data-editable="true"
             data-auto-bind="false"
             data-toolbar="['create', 'save', 'cancel']"
             data-columns="[
                 { 'field': 'quantity' },
                 { 'field': 'conversion_ratio' },
                 { 'field': 'cost' },
                 { 'field': 'price' },
                 { 'field': 'amount' },
                 { 'field': 'rate' },
                 { 'field': 'locale' },
                 { 'field': 'movement' },
                 { 'field': 'deleted' }
             ]"
             data-bind="source: itemLineDS"></div>

        <h2>Account Line</h2>

        <div data-role="grid"
             data-editable="true"
             data-auto-bind="false"
             data-toolbar="['create', 'save', 'cancel']"
             data-columns="[
                 { 'field': 'account_id' },
                 { 'field': 'description' },
                 { 'field': 'amount' },
                 { 'field': 'rate' },
                 { 'field': 'locale' },
                 { 'field': 'movement' },
                 { 'field': 'deleted' }
             ]"
             data-bind="source: accountLineDS"></div>

        <h2>Journal Line</h2>

        <div data-role="grid"
             data-editable="true"
             data-auto-bind="false"
             data-toolbar="['create', 'save', 'cancel']"
             data-columns="[
                 { 'field': 'account_id' },
                 { 'field': 'description' },
                 { 'field': 'dr' },
                 { 'field': 'cr' },
                 { 'field': 'rate' },
                 { 'field': 'locale' },
                 { 'field': 'deleted' }
             ]"
             data-bind="source: journalLineDS"></div>

    </div>
</script>
<script id="underConstruction" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">
			    	<span style="padding: 10px 20px; background: #203864; color: #fff; cursor: pointer;" class="button pull-left" 
	    				onclick="javascript:window.history.back()">Go Back</span>
					
			        <div style="text-align: center;">
			        	<h1 style="font-size: 25px; text-transform: capitalize;">Under Construction</h1>
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
                        <div class="clear"></div>
                        <div class="relativeWrap" data-toggle="source-code">
                            <div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
                                <div class="widget-head" style="background: #203864 !important; color: #fff;">
                                    <ul style="padding-left: 0px;">
                                        <li class="active" style="width: 210px;"><a style="text-transform: capitalize;" href="#tabDownload" data-toggle="tab"><span style="line-height: 23px;"><span>Upload your file</span></b></span></a></li>
                                    </ul>
                                </div>
                                <div class="widget-body">
                                    <div class="tab-content">
                                        <!-- Tab content -->
                                        <div id="tabReading" style="border: 1px solid #ccc; padding: 15px" class="tab-pane active widget-body-regular">
                                            <h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.please_upload_reading_book">Please upload reading book</h4>
                                            <div class="row clear" style="overflow: hidden; ">
                                               
                                            </div>
                                            <div style="margin-top: 20px;" class="fileupload fileupload-new margin-none" data-provides="fileupload">
                                                <input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onSelected}" id="myFile"  class="margin-none" />
                                            </div>
                                            
                                            <br>

                                            <span data-bind="click: calculate" class="btn btn-icon btn-primary glyphicons ok_2" style="margin-top: 3px;width: 160px!important;"><i></i><span  >Start</span></span>
                                        </div>
                                        <!-- // Tab content END -->
                                    </div>
                                </div>
                                <div id="contentBarcode"></div>
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
<script id="barcode-template" type="text/x-kendo-tmpl">
	<table>
		<tbody style="border:none!important">
			<tr style="border:none!important">
				<td>#= code#</td>
				<td colspan="2" width="425" style="border: none!important;">
					<span style="margin-left: 0px;border:none!important" id="codenumber#:number#"></span>
				</td>
			</tr>
		</tbody>
	</table>
</script>

<!-- #############################################
##################################################
#	MENU VIEW 					 			 	#
##################################################
############################################## -->
<script id="accountingMenu" type="text/x-kendo-template">
	<ul class="topnav">
		<li><a href='#/accounting' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/accounting_center' style="color: #fff;">CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li>  	
  				<li><a href='#/account'><span data-bind="text: lang.lang.add_account"></span></a></li>
  				<li><a href='#/segment'><span data-bind="text: lang.lang.add_segment"></span></a></li>  				
  				<li><a href='#/fixed_assets'><span data-bind="text: lang.lang.add_fixed_assets"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li><a href='#/journal'><span data-bind="text: lang.lang.make_journal"></span></a></li>
  				<li><a href='#/cash_transaction'><span data-bind="text: lang.lang.make_cash_transaction"></span></a></li>
  				<li><a href='#/cash_advance'><span data-bind="text: lang.lang.make_cash_advance"></span></a></li>
  				<li><a href='#/expense'><span data-bind="text: lang.lang.make_expense"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li><a href='#/txn_item_list'><span >Transaction Item List</span></a></li>
  				<li><a href='#/fixed_asset_item_list'><span >Fixed Asset Item List</span></a></li> 		
  				<li><a href='#/currency_rate'><span data-bind="text: lang.lang.set_exchange_rate"></span></a></li>
  				<li><a href='#/accounting_recurring'><span data-bind="text: lang.lang.accounting_recurring_list"></span></a></li>
  				<li><a href='#/chart_of_account'><span data-bind="text: lang.lang.chart_of_account"></span></a></li>
  				 				
  				<li><a href='#/imports'><span ></span>Imports</a></li> 			  				 		
  			</ul>
	  	</li>	  	  	
	  	<li><a href='#/accounting_report_center' style="color: #fff;">REPORTS</a></li>	  	
	  	<li><a href='#/accounting_setting' class='glyphicons settings'><i></i></a></li>	  				
	</ul>
</script>
<script id="employeeMenu" type="text/x-kendo-template">
	<ul class="topnav">
		<li><a href='#/employees' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/employee_center' style="color: #fff;">CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/employee'>New Employee</a></li>  				  				
  				<li><a href='#/cash_advance'>Cash Advance</a></li>
  				<li><a href='#/expense'>Expense</a></li>  				 				 				  				 				
  			</ul>
	  	</li>	  	  	
	  	<li><a href='#/employee_report_center' style="color: #fff;">REPORTS</a></li>	  	
	  	<li><a href='#/employees_setting' class='glyphicons settings'><i></i></a></li>	  	
	</ul>
</script>
<script id="vendorMenu" type="text/x-kendo-template">
	<ul class="topnav">
		<li><a href='#/vendors' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/vendor_center' style="color: #fff;">CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/vendor'><span data-bind="text: lang.lang.add_supplier"></span></a></li>
  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory"></span></a></li>
  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>
  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
  				<li><a href='#/fixed_assets'><span data-bind="text: lang.lang.add_fixed_assets"></span></a></li>
  				<li><a href="#/txn_item"><span data-bind="text: lang.lang.add_transaction_item"></span></a></li>
  				<li> <span class="li-line"></span></li>			  				
  				<li  style="padding-top: 10px;"><a href='#/purchase_order'><span data-bind="text: lang.lang.make_purchase_order"></span></a></li>
  				<li><a href='#/vendor_deposit'><span data-bind="text: lang.lang.make_vendor_deposit"></span></a></li>
  				<li><a href='#/grn'><span data-bind="text: lang.lang.make_goods_received_note"></span></a></li> 
  				<li><a href='#/purchase'><span data-bind="text: lang.lang.make_purchase"></span></a></li>  		
  				<li><a href='#/purchase_return'><span data-bind="text: lang.lang.make_purchase_return"></span></a></li>  		
  				<li><a href='#/cash_payment'><span data-bind="text: lang.lang.make_cash_payment"></span></a></li>
  				<li><a href='#/payment_refund'><span >Make Payment Refund</span></a></li>
  				<li> <span class="li-line"></span></li> 		
  				<li><a href='#/vendor_recurring'><span data-bind="text: lang.lang.supplier_recurring_list"></span></a></li>  			 				  				 				
  				<li><a href='#/imports'><span ></span>Imports</a></li>
  			</ul>
	  	</li>	  	  	
	  	<li><a href='#/vendor_report_center' style="color: #fff;">REPORTS</a></li>	  	
	  	<li><a href='#/vendor_setting' class='glyphicons settings'><i></i></a></li>	  	
	</ul>
</script>
<script id="customerMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<li><a href='#/customers' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/customer_center'><span data-bind="text: lang.lang.center" style="color: #fff;"></span></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/customer'><span data-bind="text: lang.lang.add_customer"></span></a></li> 
  				<li ><a href='#/job'><span data-bind="text: lang.lang.add_job"></span></a></li>
  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory"></span></a></li>
  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>
  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
  				<li ><a href="#/txn_item"><span data-bind="text: lang.lang.add_transaction_item"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li style="padding-top: 10px;"><a href='#/quote'><span data-bind="text: lang.lang.create_quotation"></span></a></li>  				
  				<li><a href='#/sale_order'><span data-bind="text: lang.lang.create_sale_order"></span></a></li>
  				<li><a href='#/gdn'><span data-bind="text: lang.lang.create_goods_delivery_note"></span></a></li>
  				<li><a href='#/customer_deposit'><span data-bind="text: lang.lang.create_customer_deposit"></span></a></li>
  				<li><a href='#/cash_sale'><span data-bind="text: lang.lang.create_cash_sale"></span></a></li>  
  				<li><a href='#/invoice'><span data-bind="text: lang.lang.create_invoice"></span></span></a></li>
  				<li><a href='#/cash_receipt'><span data-bind="text: lang.lang.create_cash_receipt"></span></span></a></li>
  				<li><a href='#/sale_return'><span data-bind="text: lang.lang.create_sale_return"></span></a></li>
  				<li><a href='#/statement'><span data-bind="text: lang.lang.create_statement"></span></a></li> 
  				<li><a href='#/cash_refund'><span >Create Cash Refund</span></a></li> 
  				<li> <span class="li-line"></span></li> 				
  				<li><a href='#/customer_recurring'><span data-bind="text: lang.lang.customer_recurring_list"></span></a></li>  				 				  				 				
  				<li><a href='#/imports'><span ></span>Imports</a></li>
  			</ul>
	  	</li>	  	  	
	  	<li><a href="#/customer_report_center" style="color: #fff;">Reports</a></li>	  	
	  	<li><a href='#/customer_setting' class='glyphicons settings'><i></i></a></li>
	</ul>
</script>
<script id="cashMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<li><a href='#/cashs' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/cash_center' style="color: #fff;">CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>  				  				
  				<li><a href='#/quote'>Add Quote</a></li>  				
  				<li><a href='#/sale_order'>Add Sale Order</a></li>
  				<li><a href='#/gdn'>Add Goods Delivery Note</a></li>
  				<li><a href='#/customer_deposit'>Deposit</a></li>
  				<li><a href='#/cash_sale'>Cash Sale</a></li>  				
  				<li><a href='#/invoice'><span data-bind="text: lang.invoice"></span></a></li>
  				<li><a href='#/statement'>Statement</a></li>
  				<li><a href='#/cash_receipt'>Receive Payment</a></li>
  				<li><a href="#/customerInvoiceSent">Invoice Sent To</a></li>
  				<li><a href='#/customer'>Add <span data-bind="text: lang.new_customer"></span></a></li>
  				<li><a href='#/imports'><span ></span>Imports</a></li>				  				 				
  			</ul>
	  	</li>	  	  	
	  	<li><a href='#/cash_report_center' style="color: #fff;">REPORTS</a></li>	  	
	  	<li><a href='#/cash_setting' class='glyphicons settings'><i></i></a></li>	  		  	
	</ul>
</script>
<script id="inventoryMenu" type="text/x-kendo-template">
	<ul class="topnav">
		<li><a href='#/inventories' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/item_center' style="color: #fff;">CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a></li>
  				<li><a href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a></li>
  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
  				<!-- <li ><a href="#/txn_item"><span data-bind="text: lang.lang.add_transaction_item"></span></a></li> -->
  				<li><a href='#/item_assembly'><span data-bind="text: lang.lang.build_assembly"></span></a></li>  
  				<li><a href='#/item_catalog'><span data-bind="text: lang.lang.add_new_catalog"></span></a></li>
  				<li> <span class="li-line"></span></li> 
  				<li><a href='#/grn'><span data-bind="text: lang.lang.add_received_note"></span></a></li>
  				<li><a href='#/gdn'><span data-bind="text: lang.lang.add_delivery_note"></span></a></li>
  				<li><a href='#/item_adjustment'><span data-bind="text: lang.lang.create_item_adjustment"></span></a></li>
  				<li><a href='#/internal_usage'><span data-bind="text: lang.lang.create_internal_usage"></span></a></li>
  				<li><span class="li-line"></span></li> 	
  				<li><a href='#/item_recurring'>Inventory Recurring List</a></li>
  				<li><a href='#/imports'><span ></span>Imports</a></li>
  			</ul>
	  	</li>	  	  	
	  	<li><a href='#/item_report_center' style="color: #fff;">REPORTS</a></li>
	  	<li><a href='#/item_setting' class='glyphicons settings'><i></i></a></li>
	</ul>	
</script>
<script id="taxMenu" type="text/x-kendo-template">
	<ul class="topnav">
		<li><a href='#/tax' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/journal'>Journal</a></li>
  				<li><a href='#/tax'>Tax</a></li>
  				<li><a href='#/imports'><span ></span>Imports</a></li>
  			</ul>
	  	</li>
	  	<li><a href='#/tax_report_center' style="color: #fff;">REPORTS</a></li>
	  	<li><a href='#/' class='glyphicons settings'><i></i></a></li>
	</ul>
</script>
<script id="saleMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<li><a href='#/sales' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/sale_center'><span data-bind="text: lang.lang.center" style="color: #fff;"></span></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/customer'><span data-bind="text: lang.lang.add_customer"></span></a></li> 
  				<li ><a href='#/job'><span data-bind="text: lang.lang.add_job"></span></a></li>	
  				<li><a href='#/item_catalog'><span data-bind="text: lang.lang.add_new_catalog"></span></a></li>
  				<li><a href='#/item_assembly'><span data-bind="text: lang.lang.build_assembly"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li ><a href='#/sale'>Mobile Sale</a></li>
  				<li ><a href='#/quote'><span data-bind="text: lang.lang.create_quotation"></span></a></li>
  				<li><a href='#/sale_order'><span data-bind="text: lang.lang.create_sale_order"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li><a href='#/sale_recurring'>Recurring</a></li>
  				<li><a href='#/imports'><span ></span>Imports</a></li>
  			</ul>
	  	</li>
	  	<li><a href="#/sale_report_center" style="color: #fff;">Reports</a></li>
	</ul>
</script>
<script id="riceMillMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<li><a href='#/rice_mill' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a style="color: #fff;" class='dropdown-toggle glyphicons ' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'>CENTER<span class='caret'></span></a>
	  		<ul class='dropdown-menu' style="padding-bottom: 0;">
	  			<div class="middle-help" style="background: #f4f4f4; padding: 20px 20px 20px; text-align: left; display: inline-block; width: 100%;">
	  				<div class="more-help" style="border-bottom: 1px solid #ddd; margin-bottom: 10px; width: 100%; float: left; padding-bottom: 10px;">
	  					<a href='#/customer_center'>
	  						<div class="help-img" style="margin-right: 20px; float: left;">
	  							<img style="width: 51px; height: 51px;" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/customers.jpg">
	  						</div>
	  						<div class="help-desc" style="float: left;">
	  							<p style="margin-top: 15px;" data-bind="text: lang.lang.customer_center">Customer Center</p>
	  						</div>
	  					</a>
  					</div>
  					<div class="more-help" style="border-bottom: 1px solid #ddd; margin-bottom: 10px; width: 100%; float: left; padding-bottom: 10px;">
	  					<a href='#/vendor_center'>
	  						<div class="help-img" style="margin-right: 20px; float: left;">
	  							<img style="width: 51px; height: 51px;" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/supplier.jpg">
	  						</div>
	  						<div class="help-desc" style="float: left;">
	  							<p style="margin-top: 15px;" data-bind="text: lang.lang.supplier_center">Supplier Center</p>
	  						</div>
	  					</a>
  					</div>
  					<div class="more-help" style="width: 100%; float: left;">
	  					<a href='#/item_center'>
	  						<div class="help-img" style="margin-right: 20px; float: left;">
	  							<img style="width: 51px; height: 51px;" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/inventory.jpg">
	  						</div>
	  						<div class="help-desc" style="float: left;">
	  							<p style="margin-top: 15px;" data-bind="text: lang.lang.inventory_center">Inventory Center</p>
	  						</div>
	  					</a>
  					</div>  					
	  			</div>
  			</ul>
	  	</li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/customer'><span data-bind="text: lang.lang.add_customer"></span></a></li> 
  				<li ><a href='#/job'><span data-bind="text: lang.lang.add_job"></span></a></li>	
  				<li><a href='#/vendor'><span data-bind="text: lang.lang.add_supplier"></span></a></li>
  				<li><a href='#/item'><span data-bind="text: lang.lang.add_inventory"></span></a></li>
  				<li><a href='#/internal_usage'><span data-bind="text: lang.lang.internal_usage"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li><a href='#/gdn'><span data-bind="text: lang.lang.create_goods_delivery_note"></span></a></li>
  				<li><a href='#/cash_sale'><span data-bind="text: lang.lang.create_cash_sale"></span></a></li>
  				<li><a href='#/invoice'><span data-bind="text: lang.lang.create_invoice"></span></a></li>
  				<li><a href='#/cash_receipt'><span data-bind="text: lang.lang.create_cash_receipt"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li><a href='#/grn'><span data-bind="text: lang.lang.make_goods_received_note"></span></a></li>
  				<li><a href='#/vendor_deposit'><span data-bind="text: lang.lang.make_vendor_deposit"></span></a></li>
  				<li><a href='#/purchase'><span data-bind="text: lang.lang.make_purchase"></span></a></li>
  				<li><a href='#/cash_payment'><span data-bind="text: lang.lang.make_cash_payment"></span></a></li>
  				<li> <span class="li-line"></span></li>
  				<li><a href='#/journal'><span data-bind="text: lang.lang.make_journal"></span></a></li>
  				<li><a href='#/cash_transaction'><span data-bind="text: lang.lang.make_cash_transaction"></span></a></li>
  				<li><a href='#/cash_advance'><span data-bind="text: lang.lang.make_cash_advance"></span></a></li>
  				<li><a href='#/expense'><span data-bind="text: lang.lang.make_expense"></span></a></li>  				
  				<li><a href='#/'><span data-bind="text: lang.lang.recurring_list">Recurring List</a></li>
  			</ul>
	  	</li>
	  	<li><a href="#/rice_mill_report_center" style="color: #fff;" data-bind="text: lang.lang.reports">Reports</a></li>
	</ul>
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
		customerDS 					: new kendo.data.DataSource({
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
			filter:[
				{ field:"parent_id", operator:"where_related_contact_type", value:1 },//Customer
				{ field:"status", value:1 }
			],
			sort:[
				{ field:"contact_type_id", dir:"asc" },
				{ field:"number", dir:"asc" }
			],
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page: 1,
			pageSize: 100
		}),
		supplierDS 					: new kendo.data.DataSource({
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
			filter:[
				{ field:"parent_id", operator:"where_related_contact_type", value:2 },//Supplier
				{ field:"status", value:1 }
			],
			sort:[
				{ field:"contact_type_id", dir:"asc" },
				{ field:"number", dir:"asc" }
			],
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page: 1,
			pageSize: 100
		}),
		employeeDS 					: new kendo.data.DataSource({
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
			filter:[
				{ field:"parent_id", operator:"where_related_contact_type", value:3 },//Employee
				{ field:"status", value:1 }
			],
			sort:[
				{ field:"contact_type_id", dir:"asc" },
				{ field:"number", dir:"asc" }
			],
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page: 1,
			pageSize: 100
		}),
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
		taxTypeDS					: dataStore(apiUrl + "tax_types"),
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
		segmentDS					: dataStore(apiUrl + "segments"),
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
	    statusObj 					: { text:"", date:"", number:"", url:"" },
	    defaultLines 				: 2,
		genderList					: ["M", "F"],
		typeList 					: ['Invoice','Commercial_Invoice','Vat_Invoice','Electricity_Invoice','Water_Invoice','Cash_Sale','Commercial_Cash_Sale','Vat_Cash_Sale','Receipt_Allocation','Sale_Order','Quote','GDN','Sale_Return','Purchase_Order','GRN','Cash_Purchase','Credit_Purchase','Purchase_Return','Payment_Allocation','Deposit','Electricty_Deposit','Water_Deposit','Customer_Deposit','Vendor_Deposit','Withdraw','Transfer','Journal','Item_Adjustment','Cash_Advance','Reimbursement','Direct_Expense','Advance_Settlement','Additional_Cost','Cash_Payment','Cash_Receipt','Credit_Note','Debit_Note','Offset_Bill','Offset_Invoice','Cash_Transfer','Internal_Usage'],
		user_id						: banhji.userData.id,
		amtDueColor 				: "#eee",
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
		duplicateMeasurementMessage	: "Sorry, you can not use the same measurement.",
		duplicateSelectedItemMessage: "You already selected this item.",
		pageLoad 					: function(){
			this.loadAccounts();
			this.accountTypeDS.read();
			this.taxTypeDS.read();
			this.loadTaxes();
			this.loadJobs();
			this.loadSegmentItems();
			this.loadCurrencies();
			this.loadRates();
			this.loadPrefixes();
			this.loadTxnTemplates();

			this.loadCategories();
			this.loadItemGroups();
			this.loadItems();
			this.itemTypeDS.read();
			this.loadItemPrices();
			this.loadMeasurements();

			this.loadContactTypes();
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
		loadCurrencies 				: function(){
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
		checkWHT 					: function(tax_type_id){
			var result = false,
				types = this.taxTypeDS.get(tax_type_id);

			if(types.sub_of_id==12){
				result = true;
			}

			return result;
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
				filter: { field:"status", value:1 },
				sort: [
				  	{ field: "account_type_id", dir: "asc" },
				  	{ field: "number", dir: "asc" }
				]
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
		},
		getCurrencyCode 			: function(locale){
			var code = "";

			$.each(this.currencyDS.data(), function(index, value){
				if(value.locale==locale){
					code = value.code;

					return false;
				}
			});

			return code;
		},
		getPriceList 				: function(id){
			var priceList = [],
				item = this.itemDS.get(id),
				measurement = this.measurementDS.get(item.measurement_id);

			$.each(this.itemPriceList, function(index, value){				
				if(value.item_id==id){
					priceList.push(value);
				}
			});

			return priceList;
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
    banhji.customTable =  kendo.observable({
    	lang 			: langVM,
    	id 				: 6,
    	txnDS 			: dataStore(apiUrl+"transactions"),
    	itemLineDS 		: dataStore(apiUrl+"item_lines"),
    	accountLineDS 	: dataStore(apiUrl+"account_lines"),
    	journalLineDS 	: dataStore(apiUrl+"journal_lines"),
    	pageLoad 		: function(){
		},
		searchTxn 		: function(){
			var id = this.get("id");

			this.txnDS.filter({ field:"id", value: id });
			this.itemLineDS.filter({ field:"transaction_id", value: id });
			this.accountLineDS.filter({ field:"transaction_id", value: id });
			this.journalLineDS.filter({ field:"transaction_id", value: id });
		}
    });





	/*************************************************
	*   CUSTOMER MVVM		  						 *
	*************************************************/
	
	banhji.Choeun =  kendo.observable({
		lang            : langVM,
        dataSource      : [],
        onSelected      : function(e) {
            var files = e.files,
                self = this;
            this.dataSource.splice(0, this.dataSource.length);
            var reader = new FileReader();
            reader.onload = function() {
                var data = reader.result;
                var result = {};
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });
                workbook.SheetNames.forEach(function(sheetName) {
                    var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    if (roa.length > 0) {
                        result[sheetName] = roa;
                        for (var i = 0; i < roa.length; i++) {
                            self.dataSource.push(roa[i]);
                        }

                    }
                });
               
            }
            reader.readAsBinaryString(files[0].rawFile);
        },
        attendanDS      : [],
        calculate       : function() {
            var self = this;
            var TempForm = $("#barcode-template").html();
            var listView = $("#contentBarcode").kendoListView({
                dataSource: this.dataSource,
                template: kendo.template(TempForm)
            });
            this.barcod("do");
        },
        barcod: function(re) {
            var view = this.dataSource;
            for (var i = 0; i < view.length; i++) {
                var d = view[i];
                if (re == "reset") {
                    $("#codenumber" + d.number).css("height", "0px").data("kendoBarcode").resize();
                } else {
                    $("#codenumber" + d.number).kendoBarcode({
                        renderAs: "svg",
                        value: d.code,
                        type: "code128",
                        width: 450,
                        height: 80,
                    });
                }
            }
        },
        cancel          : function() {
            banhji.router.navigate("/");
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
		customTable: new kendo.Layout("#customTable", {model: banhji.customTable}),
		underConstruction: new kendo.Layout("#underConstruction"),
		//Accounting
		Choeun: new kendo.Layout("#Choeun", {model: banhji.Choeun}),
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
    	banhji.view.layout.showIn('#content', banhji.view.Choeun);
		// banhji.view.layout.showIn('#menu', banhji.view.Choeun);

	});


	$(function() {
		banhji.router.start();
		banhji.source.pageLoad();
		console.log($(location).attr('hash').substr(1));

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