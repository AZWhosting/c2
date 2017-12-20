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
	
	<a href="#/inventories"><h1>WELCOME</h1></a>
	
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


<script id="itemDashBoard" type="text/x-kendo-template">
	<div class="row-fluid">

		<!-- Left Side -->
		<div class="span4">

			<!-- Logo of the page -->
			<table width="100%" cellpadding="10">
				<tr>
			        <td valign="top">
			        	<h2 data-bind="text: lang.lang.products_services"></h2>
			        	<p>
			        		<span data-bind="text: lang.lang.P_S_inhere"></span>
			        	</p>

			        	<!-- <p style="width: 100%; float: left; margin-top: 8px; margin-bottom: 15px;">
				        	<span style="position: relative; height: 35px; line-height: 35px; padding-right: 15px; float: left; display: block; ">
								<a style="color: #203864; font-weight: 600; margin-top: 4px; line-height: 17px; background: #fff; padding: 8px 32px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;" href="#/inventories_recurring">
									<span class="badge fix badge-primary" style="color: #fff;  position: absolute; top: -13px; background: #203864; right: 5px; width: 25px; height: 25px; font-size: 15px; line-height: 25px;">0</span>
									Recurring
								</a>
							</span>

							<span style="position: relative; height: 35px; line-height: 35px; padding-right: 15px; float: left; display: block; ">
								<a href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/guide/banhJi_customer_guide.pdf" target="_blank" style="color: #203864; font-weight: 600; margin-top: 4px; line-height: 17px; background: #fff; padding: 8px 39px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
									This Module's Guide
								</a>
							</span>
						</p> -->


			        	<div class="cover-block" style="box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
				        	<div class="supplier-icon">
							    <div class="span4">
							       	<a href="#/item" class="center">
							       		<img title="Add Inventory" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/inventories.ico" />
							       	</a>
							    </div>
							    <div class="span4">
							       	<a href="#/non_inventory_part" class="center">
							       		<img title="Add Non Inventory Parts" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/non_inventory_parts.ico" />
							       	</a>
							    </div>
							    <div class="span4">
							       	<a href="#/item_service" class="center">
							       		<img title="Add Service" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/services.ico" />
							       	</a>
							    </div>
							  <!--   <div class="span4">
							       	<a href="#/txn_item" class="center">
							       		<img title="Add Txn Item"  src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/add_txn_item.ico" />
							       	</a>
							    </div>
							    <div class="span4">
							       	<a href="#/fixed_assets" class="center">
							       		<img title="Add Txn Item"  src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/add_fixed_assets.ico" />
							       	</a>
							    </div> -->
							</div>
						</div>
			        </td>
			 	</tr>
			</table>

			<div class="cover-block">
				<table class="table table-borderless table-condensed table-vertical-center costom-imag">
				<tr>
					<td class="center">
						<a href="#/grn">
							<img title="Add Received Note" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/function_logo/received_note.png" width="110" height="200" />
							<span data-bind="text: lang.lang.goods_received_note" style="margin-top: 7px; display: inline-block; text-transform: uppercase;"></span>
						</a>						
					</td>
					<td class="center">
						<a href="#/gdn">
							<img title="Add Delivery Address Note" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/function_logo/delivery_note.png" width="110" height="200" />
							<span data-bind="text: lang.lang.goods_delivery_note" style="margin-top: 7px; display: inline-block; text-transform: uppercase;"></span>
						</a>
					</td>
					<td class="center">
						<a href="#/item_adjustment">
							<img title="Add Adjustment" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/function_logo/adjustment.png" width="110" height="200" />
							<span data-bind="text: lang.lang.adjustment" style="margin-top: 7px; display: inline-block; text-transform: uppercase;"></span>
						</a>						
					</td>					
				</tr>
				<tr>
					<td class="center">
						<a href="#/internal_usage">
							<img title="Add Internal Usage" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/function_logo/internal_usage.png" width="110" height="200" />
							<span data-bind="text: lang.lang.internal_usage" style="margin-top: 7px; display: inline-block; text-transform: uppercase;"></span>
						</a>
					</td>
					<td class="center">
						<a href="#/item_assembly">
							<img title="Add Build Assembly" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/function_logo/build_assembly.png" width="110" height="200" />
							<span data-bind="text: lang.lang.build_assembly" style="margin-top: 7px; display: inline-block; text-transform: uppercase;"></span>
						</a>
					</td>
					<td class="center" style="vertical-align: top;">
						<a href="#/item_catalog">
							<img title="Add Catalog" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/function_logo/catalog.png" width="110" height="200" />
							<span data-bind="text: lang.lang.catalog" style="margin-top: 7px; display: inline-block; text-transform: uppercase;"></span>
						</a>
					</td>
				</tr>				
				</table>
			</div>
		</div>

		<!-- Right Side -->
		<div class="span8">

			<!-- Summary -->
			<div class="row-fluid">				

				<div class="span4">
				
					<!-- Widget -->
					<div class="widget widget-3 customer-border">
					
						<!-- Widget heading -->
						<div class="widget-head">
							<h4 class="heading"><span class="glyphicons coins"><i></i></span><span style="color: #203864; font-weight: 600; font-style: normal;">Inventory Value</span></h4>
						</div>
						<!-- // Widget heading END -->
						
						<a href="#/inventory_position_summary">
							<div class="widget-body alert alert-primary" style="min-height: 148px; background: white; color: #203864; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">							
								<div style="margin-top: 15%; font-size: 25px;" align="center" class=" strong" data-bind="text: obj.inventory_value"></div>
							</div>
						</a>
						<!-- // Widget footer END -->
						
					</div>
					<!-- // Widget END -->
					
				</div>

				<div class="span4">
				
					<!-- Widget -->
					<div class="widget widget-3 customer-border">
					
						<!-- Widget heading -->
						<div class="widget-head">
							<h4 class="heading"><span class="glyphicons cart_in"><i></i></span><span style="color: #203864; font-weight: 600; font-style: normal;" data-bind="text: lang.lang.gross_profit_margin"></span></h4>
						</div>
						<!-- // Widget heading END -->
						
						<a href="#/sale_summary_by_product">
							<div class="widget-body alert-info" style="min-height: 148px; background: white; color: #203864; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">							
								<div style="margin-top: 15%; font-size: 25px;" align="center" class=" strong" data-bind="text: obj.gross_profit_margin"></div>
							</div>
						</a>
						<!-- // Widget footer END -->
						
					</div>
					<!-- // Widget END -->
					
				</div>

				<div class="span4">
				
					<!-- Widget -->
					<div class="widget widget-3 customer-border">
					
						<!-- Widget heading -->
						<div class="widget-head">
							<h4 class="heading"><span class="glyphicons credit_card"><i></i></span><span style="color: #203864; font-weight: 600; font-style: normal;" data-bind="text: lang.lang.turnover_days"></span></h4>
						</div>
						<!-- // Widget heading END -->
						
						<a href="#/inventory_turn_over_list">
							<div class="widget-body alert-info3" style="min-height: 148px; background: white; color: #203864; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">							
								<div style="margin-top: 15%; font-size: 25px;" align="center" class="strong" align="center" class="text-large strong"  data-bind="text: obj.inventory_turnover_day"></div>
							</div>
						</a>
						<!-- // Widget footer END -->
						
					</div>
					<!-- // Widget END -->
					
				</div>				
				
			</div>

			<!-- Top 5 -->
			<div class="row-fluid">
				<div class="span4">									
					<table class="table table-bordered table-primary table-striped table-vertical-center" style="font-size: 12px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
				        <thead>
				            <tr>
				                <th style="background: #203864;" colspan="2" class="center"><span data-bind="text: lang.lang.top_5_purchased_products"></span></th>				                			                
				            </tr>
				        </thead>
				        <tbody data-role="listview"
				        	 data-auto-bind="false"				        	                 
			                 data-template="itemDashboard-top-purchase-product-template"
			                 data-bind="source: topPurchaseProductDS"></tbody>			        
				    </table>			
				</div>
				<div class="span4">					
					<table class="table table-bordered table-primary table-striped table-vertical-center" style="font-size: 12px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
				        <thead>
				            <tr>
				                <th style="background: #203864;" colspan="2" class="center"><span data-bind="text: lang.lang.top_5_suppliers"></span></th>		                
				            </tr>
				        </thead>
				        <tbody data-role="listview"
				        	 data-auto-bind="false"				        	                  
			                 data-template="itemDashboard-top-supplier-template"
			                 data-bind="source: topSupplierDS"></tbody>			        
				    </table>
				</div>
				<div class="span4">					
					<table class="table table-bordered table-primary table-striped table-vertical-center" style="font-size: 12px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
				        <thead>
				            <tr>
				                <th style="background: #203864;" colspan="2" class="center"><span data-bind="text: lang.lang.top_5_best_selling_products"></span></th>			                		                
				            </tr>
				        </thead>
				        <tbody data-role="listview"
				        	 data-auto-bind="false"                
			                 data-template="itemDashboard-top-sale-product-template"
			                 data-bind="source: topSaleProductDS"></tbody>			        
				    </table>
				</div>		
			</div>

			<!-- Graph -->
			<div class="home-chart" >
				<div data-role="chart"
	                 data-legend="{ position: 'top' }"
	                 data-series-defaults="{ type: 'column' }"
	                 data-tooltip='{
	                    visible: true,
	                    format: "{0}%",
	                    template: "#= series.name #: #= kendo.toString(value, &#39;c&#39;, banhji.locale) #"
	                 }'                 
	                 data-series="[
	                                { field: 'purchase', name: 'Monthly Purchase', categoryField:'month', color: '#203864', overlay: {gradient: 'none'} },
	                                { field: 'sale', name: 'Monthly Sale', categoryField:'month', color: '#A6C9E3' , overlay: {gradient: 'none'}}
	                            ]"
	                 data-auto-bind="false"	                             
	                 data-bind="source: graphDS"
	                 style="height: 250px;" ></div>            
            </div>
            <!-- End Graph -->

		</div>
	</div>	
</script>
<script id="itemDashboard-top-purchase-product-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<span>
				#if(name.length>15){#
					#=name.substring(0, 15)#...
				#}else{#
					#=name#
				#}#
			</span>
			<span class="pull-right">#=kendo.toString(quantity, "n0")#</span>
		</td>
	</tr>
</script>
<script id="itemDashboard-top-supplier-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<span>
				#if(name){#
					#if(name.length>15){#
						#=name.substring(0, 15)#...
					#}else{#
						#=name#
					#}#
				#}#
			</span>
			<span class="pull-right">#=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c2", banhji.locale)#</span>
		</td>
	</tr>
</script>
<script id="itemDashboard-top-sale-product-template" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<span>
				#if(name.length>15){#
					#=name.substring(0, 15)#...
				#}else{#
					#=name#
				#}#
			</span>
			<span class="pull-right">#:kendo.toString(quantity, "n0")#</span>
		</td>
	</tr>
</script>
<script id="itemCenter" type="text/x-kendo-template"> 
	<div class="widget widget-heading-simple widget-body-gray widget-employees">
		<div class="widget-body padding-none">			
			<div class="row-fluid row-merge">
				<div class="span3 listWrapper" >
					<div class="innerAll">							
						<form autocomplete="off" class="form-inline">
							<div class="widget-search separator bottom">
								<button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
								<div class="overflow-hidden">
									<input type="search" placeholder="Number or Name ..." data-bind="value: searchText">
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
							            <li class="glyphicons sampler"><span data-target="#tab3-4" data-bind="click: variant"><i></i></span>
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
							<div class="row-fluid">
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
							</div>							
							
							<div class="row-fluid">
								<div class="span6">
									<div class="widget-stats widget-stats-info widget-stats-5" style="background: #0077c5">
										<span class="glyphicons adjust_alt"><i></i></span>
										<span class="txt" style="width: 70%; margin-top: -16px;"><span data-bind="text: raw.item_type" style=" font-size: 22px;"></span></span>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="span6">
									<div class="widget-stats widget-stats-default widget-stats-5" style="background: #21abf6">
										<span class="glyphicons random"><i></i></span>
										<span class="txt"><span data-bind="text: raw.txn"></span><span data-bind="text: lang.lang.transaction"></span></span>
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
<!-- FUNCTIONS -->
<script id="grn" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
			<div id="example" class="k-content">					
			    
		    	<span class="glyphicons no-js remove_2 pull-right" 
    				onclick="javascript:window.history.back()"
					data-bind="click: cancel"><i></i></span>

		        <h2 data-bind="text: lang.lang.goods_received_note"></h2>			    		   

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
									<td >
										<input id="issuedDate" name="issuedDate" 
												data-role="datepicker"
												data-format="dd-MM-yyyy"
												data-parse-formats="yyyy-MM-dd HH:mm:ss"
												data-bind="value: obj.issued_date, 
															events:{ change : setRate }" 
												required data-required-msg="required"
												style="width: 225px;" />
									</td>
								</tr>								
								<tr>
									<td><span data-bind="text: lang.lang.supplier"></span></td>
									<td>
										<input id="cbbContact" name="cbbContact"
												   data-role="dropdownlist"
												   data-header-template="vendor-header-tmpl"
								                   data-template="contact-list-tmpl"
								                   data-auto-bind="false"
								                   data-value-primitive="false"
								                   data-filter="startswith"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.contact,
								                              source: contactDS,
								                              events: {change: contactChanges}"
								                   data-option-label="Select Supplier..."
								                   required data-required-msg="required" style="width: 225px;" />
									</td>
								</tr>																															
							</table>

							<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
								data-bind="style: { backgroundColor: amtDueColor}">
								<div align="left"><span data-bind="text: lang.lang.total_quantity"></span></div>
								<h2 data-bind="text: total" align="right"></h2>
							</div>							

						</div>						
					</div>					   

					<div class="span8">

						<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-4" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons pen"><a href="#tab2-4" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab3-4" data-toggle="tab"><i></i></a>
							            </li>						            
							            <li class="span1 glyphicons history"><a href="#tab4-4" data-toggle="tab"><i></i></a>
							            </li>						            								            
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab1-4">						            
							            <table class="table table-borderless table-condensed cart_total">											
								            <tr>
								            	<td><span data-bind="text: lang.lang.expected_date"></span></td>
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
												<td>
								            		<span data-bind="text: lang.lang.reference"></span>
								            	</td>
								            	<td>
													<input data-role="combobox"
															data-template="reference-list-tmpl"
															data-value-primitive="true"
															data-auto-bind="false"
															data-text-field="number" 
								              				data-value-field="id"
								              				data-bind="value: obj.reference_id,
								              							enabled: enableRef,
								              							source: referenceDS,
								              							events:{change: referenceChanges}" 
								              				style="width: 100%" />
												</td>
											</tr>
							            </table>
							        </div>
							        <!-- // Options Tab content END -->

							        <!-- Memo Tab content -->
							        <div class="tab-pane" id="tab2-4">
							        	<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
										<br>						
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
							        </div>
							        <!-- // Memo Tab content END -->

							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab3-4">
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

							        </div>
							        <!-- // Attach Tab content END -->						        

							        <!-- Recuring Tab content -->
							        <div class="tab-pane" id="tab4-4">							            	
							            
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

							    </div>
							</div>

				    </div>
				</div>

				<div data-role="window"
	                 data-title="Location"
	                 data-width="650"
	                 data-actions="{}"
	                 data-position="{top: '150px', left: '30%'}"
	                 data-height="355"
	                 data-bind="visible: windowVisible">
	            	
	            	<table class="table table-borderless table-condensed cart_total">
	        			<tr>
							<td>Warehouse</td>
							<td>
								<input data-role="dropdownlist"
										data-value-primitive="true"
										data-auto-bind="false"
										data-filter="startswith"
										data-text-field="name" 
			              				data-value-field="id"
			              				data-bind="value: obj.warehouse_id,
			              							source: warehouseDS" 
			              				style="width: 100%" />
							</td>
						</tr>
						<tr>
							<td>Location</td>
							<td>
								<input data-role="dropdownlist"
										data-value-primitive="true"
										data-auto-bind="false"
										data-filter="startswith"
										data-text-field="name" 
			              				data-value-field="id"
			              				data-bind="value: obj.location_id,
			              							source: locationDS" 
			              				style="width: 100%" />
							</td>
						</tr>
						<tr>
							<td>Zone</td>
			            	<td>
								<input data-role="dropdownlist"
										data-value-primitive="true"
										data-auto-bind="false"
										data-filter="startswith"
										data-text-field="name" 
			              				data-value-field="id"
			              				data-bind="value: obj.zone_id,
			              							source: zoneDS" 
			              				style="width: 100%" />
							</td>
						</tr>
						<tr>
							<td>Section</td>
			            	<td>
								<input data-role="dropdownlist"
										data-value-primitive="true"
										data-auto-bind="false"
										data-filter="startswith"
										data-text-field="name" 
			              				data-value-field="id"
			              				data-bind="value: obj.section_id,
			              							source: sectionDS" 
			              				style="width: 100%" />
							</td>
						</tr>
						<tr>
							<td>Rack</td>
			            	<td>
								<input data-role="dropdownlist"
										data-value-primitive="true"
										data-auto-bind="false"
										data-filter="startswith"
										data-text-field="name" 
			              				data-value-field="id"
			              				data-bind="value: obj.rack_id,
			              							source: rackDS" 
			              				style="width: 100%" />
							</td>
						</tr>
						<tr>
							<td>Level</td>
			            	<td>
								<input data-role="dropdownlist"
										data-value-primitive="true"
										data-auto-bind="false"
										data-filter="startswith"
										data-text-field="name" 
			              				data-value-field="id"
			              				data-bind="value: obj.level_id,
			              							source: levelDS" 
			              				style="width: 100%" />
							</td>
						</tr>
						<tr>
							<td>Position</td>
			            	<td>
								<input data-role="dropdownlist"
										data-value-primitive="true"
										data-auto-bind="false"
										data-filter="startswith"
										data-text-field="name" 
			              				data-value-field="id"
			              				data-bind="value: obj.position_id,
			              							source: positionDS" 
			              				style="width: 100%" />
							</td>
						</tr>
		            </table>

		            <input type="button" value="Close" data-bind="click: closeWindow" />
	            </div>

	            <input type="button" value="Open" data-bind="click: openWindow" />

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
						        	var rowIndex = banhji.grn.lineDS.indexOf(dataItem)+1;
						        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
						      	}
						    },
		                 	{ 
		                 		field: 'item', 
		                 		title: 'PRODUCTS/SERVICES', 
		                 		editor: inventoryForSaleEditor, 
		                 		template: '#=item.name#', 
		                 		width: '250px' 
		                 	},
                            { field: 'description', title:'DESCRIPTION', width: '250px' },                            
                            {
							    field: 'quantity',
							    title: 'QTY',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '150px',
							    attributes: { style: 'text-align: right;' }
							},
                            { 
                            	field: 'measurement', 
                            	title: 'UOM', 
                            	editor: measurementEditor, 
                            	template: '#=measurement.measurement#', 
                            	width: '150px' 
                            },
                            { 
		                 		field: 'bin_location_id', 
		                 		title: 'BIN LOCATION', 
		                 		editor: inventoryForSaleEditor, 
		                 		template: '#=bin_locations.number#', 
		                 		width: '250px' 
		                 	}
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
									<td class="right" style="width: 60%;"><span data-bind="text: lang.lang.total" style="font-size: 15px; font-weight: 700;"></span></td>
									<td class="right"><h4 data-format="n0" data-bind="text: obj.amount" style="font-size: 15px; font-weight: 700;"></h4></td>
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
					    <button style="font-size:14px; border:none; background:red; color:#fff; padding:5px 25px;" data-bind="click:closeConfirm"><span data-bind="text: lang.lang.no_"></span></button>
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
<script id="gdn" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">
				    
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>
					</div>

			        <h2 data-bind="text: lang.lang.goods_delivery_note"></h2>

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
									<div align="left"><span data-bind="text: lang.lang.total_quantity"></span></div>
									<h2 data-bind="text: total" align="right"></h2>
								</div>

							</div>						
						</div>					   

						<div class="span8">

							<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab1-4" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons pen"><a href="#tab2-4" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab3-4" data-toggle="tab"><i></i></a>
							            </li>						            
							            <li class="span1 glyphicons history"><a href="#tab4-4" data-toggle="tab"><i></i> <span data-bind="text: lang.lang.recurring"></span></a>
							            </li>						            								            
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab1-4">						            
							            <table class="table table-borderless table-condensed cart_total">											
								            <tr>
								            	<td><span data-bind="text: lang.lang.expected_date"></span></td>
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
												<td>
								            		<span data-bind="text: lang.lang.reference"></span>	            						  
								            	</td>
								            	<td>
													<input data-role="combobox"
															data-template="reference-list-tmpl"
								              				data-value-primitive="true"
										                    data-auto-bind="false"
															data-text-field="number" 
								              				data-value-field="id"						              				 
								              				data-bind="value: obj.reference_id,
								              							enabled: enableRef,
								              							source: referenceDS,						              							
								              							events:{change: referenceChanges}" 
								              				style="width: 100%" />
												</td>
											</tr>
											<tr>
												<td valign="top">
													<span data-bind="text: lang.lang.billing_address"></span>
												</td>
												<td>
													<textarea cols="0" rows="2" class="k-textbox"
															data-bind="value: obj.bill_to" 
															placeholder="Billing to ..." style="width:100%"></textarea>
												</td>
											</tr>	
							            </table>						            
							        </div>
							        <!-- // Options Tab content END -->

							        <!-- Memo Tab content -->
							        <div class="tab-pane" id="tab2-4">
							        	<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
										<br>						
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
							        </div>
							        <!-- // Memo Tab content END -->

							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab3-4">
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
							        <div class="tab-pane" id="tab4-4">
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

							    </div>
							</div>

					    </div>
					</div>

					<!-- Item List -->
					<table class="table table-bordered table-primary table-striped table-vertical-center">
				        <thead>
				            <tr>
				                <th class="center" style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></th>
				                <th><span data-bind="text: lang.lang.items"></span></th>
				                <th><span data-bind="text: lang.lang.description"></span></th>
				                <th style="width: 20%;"><span data-bind="text: lang.lang.quantity"></span></th>
				            </tr> 
				        </thead>
				        <tbody data-role="listview" 
				        		data-template="gdn-template" 
				        		data-auto-bind="false"
				        		data-bind="source: lineDS"></tbody>
				    </table>			    
									
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
						  				<li><a href='#/fixed_assets'><span data-bind="text: lang.lang.add_fixed_assets"></span></a></li>
						  				<li><a href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a></li>
						  				<li><a href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a></li>  	
						  			</ul>
							  	</li>				
							</ul>
							<!--End Add New Item -->

						</div>
						<!-- Column END -->

						<!-- Column -->
						<div class="span4" align="center">
							<img data-bind="visible: isEdit, attr: { src: statusSrc }" width="150px;" height="150px;" />	
						</div>
						<!-- Column END -->
						
						<!-- Column -->
						<div class="span4">
							<table class="table table-condensed table-striped table-white">
								<tbody>																								
									<tr>
										<td class="right" style="width: 60%;"><h4 span data-bind="text: lang.lang.total" style="font-weight: 700;" ></h4></td>
										<td class="right strong"><h4 data-format="n0" data-bind="text: obj.amount" style="font-weight: 700;"></h4></td>
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
<script id="itemAdjustment" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden;">
			<div class="container-960">
				<div id="example" class="k-content">

					<span class="glyphicons no-js remove_2 pull-right" 
		    				onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>

			        <h2 data-bind="text: lang.lang.item_adjustment"></h2>

			        <!-- Upper Part -->
					<div class="row">
						<div class="span4" style="padding-left: 15px;">
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
										<td>
											<span data-bind="text: lang.lang.employee"></span>
										</td>
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
								                              source: contactDS,
								                              events: {change: employeeChanges}"
								                   data-option-label="Select Employee..."
								                   style="width: 210px;" />
										</td>
									</tr>
								</table>
							</div>						
						</div>

						<div class="span8" style="padding-left:0;">							
							<div class=" box-generic-noborder" style="min-height: 235px;">
							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons cogwheels active"><a href="#tab-1" data-toggle="tab"><i></i> </a>
							            </li>						            
							            <li class="span1 glyphicons pen"><a href="#tab-2" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab-3" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons history"><a href="#tab-4" data-toggle="tab"><i></i></a>
							            </li>
							            <!-- <li class="span1 glyphicons show_liness"><a href="#tab4-5" data-toggle="tab"><i></i></a></li> -->		            								            
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab-1">						            
							            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">								            										
								            <tr>
								            	<td><span data-bind="text: lang.lang.adjustment_account"></span></td>
								            	<td>
								            		<input id="cbbAccount" name="cbbAccount"
								            			   data-role="combobox"
														   data-header-template="account-header-tmpl"
														   data-template="account-list-tmpl"							                   
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"									                   
										                   data-bind="value: obj.account_id,
										                              source: accountDS"
										                   placeholder="Select Account..."
										                   required data-required-msg="required" style="width: 100%;" />
								            	</td>
								            </tr>
								            <tr>
												<td><span data-bind="text: lang.lang.segments"></span></td>
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
							        <!-- // Options Tab content END -->

							        <!-- Memo Tab content -->
							        <div class="tab-pane" id="tab-2">
							        	<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
										<br>						
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
							        </div>
							        <!-- // Memo Tab content END -->
							        
							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab-3">
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

							        </div>
							        <!-- // Attach Tab content END -->

							        <!-- Recuring Tab content -->
							        <div class="tab-pane" id="tab-4">

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

							            <span id="saveRecurring" class="btn btn-icon btn-default glyphicons history" style="float: right; margin-top: -12px;"><i></i> <span data-bind="text: lang.lang.save_recurring"></span></span>									     

							        </div>
							        <!-- // Recuring Tab content END -->

							        <div class="tab-pane saleSummaryCustomer" id="tab6-6">
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
						        	var rowIndex = banhji.itemAdjustment.lineDS.indexOf(dataItem)+1;
						        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
						      	}
						    },
		                 	{ 
		                 		field: 'item', 
		                 		title: 'PRODUCTS/SERVICES', 
		                 		editor: itemEditor, 
		                 		template: '#=item.name#', 
		                 		width: '170px' 
		                 	},
                            { field: 'description', title:'DESCRIPTION', width: '250px' },
                            { field: 'measurement', title: 'UOM', editor: measurementEditor, template: '#=measurement.measurement#', width: '80px' },
                            {
							    field: 'cost',
							    title: 'COST',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
							{ 
								field: 'on_hand', 
								title:'ON HAND', 
								format: '{0:n}', 
								editable: 'false', 
								attributes: { style: 'text-align: right;' }, 
								width: '120px' 
							},                            
                            {
							    field: 'quantity_adjusted',
							    title: 'COUNT',
							    format: '{0:n}',
							    editor: numberTextboxEditor,
							    width: '120px',
							    attributes: { style: 'text-align: right;' }
							},
                            { 
                            	field: 'quantity', 
                            	title:'DIFFERENT', 
                            	format: '{0:n}', 
                            	editable: 'false', 
                            	attributes: { style: 'text-align: right;' }, 
                            	width: '120px' 
                            }
                         ]"
                         data-auto-bind="false"
		                 data-bind="source: lineDS" ></div>

		            <button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>

					<!-- Form actions -->
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>	
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
<script id="internalUsage" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
				    
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>						
					</div>

			        <h2 data-bind="text: lang.lang.internal_usage"></h2>			    		   

				    <br>				   				
					
					<!-- Upper Part -->
					<div class="row-fluid">
						<div class="span4">
							<div class="box-generic well" style="height: 150px;">				
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
													style="width:100%;" />
										</td>
									</tr>
								</table>

								<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
									data-bind="style: { backgroundColor: amtDueColor}">
									<div align="left"><span data-bind="text: lang.lang.total_usage"></span></div>
									<h2 data-bind="text: total" align="right"></h2>
								</div>

							</div>
						</div>					   

						<div class="span8">
							<div class="box-generic-noborder" style="min-height: 234px !important">

							    <!-- Tabs Heading -->
							    <div class="tabsbar tabsbar-2">
							        <ul class="row-fluid row-merge">
							        	<li class="span1 glyphicons circle_info active"><a href="#tab-1" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons adress_book"><a href="#tab-2" data-toggle="tab"><i></i> </a>
							            </li>
							            <li class="span1 glyphicons paperclip"><a href="#tab-3" data-toggle="tab"><i></i></a>
							            </li>
							            <li class="span1 glyphicons history"><a href="#tab-4" data-toggle="tab"><i></i></a>
							            </li>
							            <!-- <li class="span1 glyphicons show_liness"><a href="#tab3-4" data-toggle="tab"><i></i></a></li>	 -->				            								            
							        </ul>
							    </div>
							    <!-- // Tabs Heading END -->

							    <div class="tab-content">

							    	<!-- Options Tab content -->
							        <div class="tab-pane active" id="tab-1">						            
							           	<table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">											
											<tr>
												<td><span data-bind="text: lang.lang.segments"></span></td>
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
										                   data-option-label="Select job..." 
										                   style="width: 100%" />										
												</td>
											</tr>											
							            </table>	            
							        </div>
							        <!-- // Options Tab content END -->

							        <!-- Address Tab content -->
							        <div class="tab-pane" id="tab-2">
							        	<span data-bind="text: lang.lang.from"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>								
										
										<span data-bind="text: lang.lang.to"></span>
										<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea>	
												
							        </div>
							        <!-- // Address Tab content END -->

							        <!-- Attach Tab content -->
							        <div class="tab-pane" id="tab-3">
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

							        </div>
							        <!-- // Attach Tab content END -->

							        <!-- Recuring Tab content -->
							        <div class="tab-pane" id="tab-4">

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

							            <span id="saveRecurring" class="btn btn-icon btn-default glyphicons history" style="float: right; margin-top: -12px;"><i></i> <span data-bind="text: lang.lang.save_recurring"></span></span>									     

							        </div>
							        <!-- // Recuring Tab content END -->							        					        								        

							        <div class="tab-pane saleSummaryCustomer" id="tab3-4">
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

					<!-- Middle Part -->
					<div class="row-fluid">
						<div class="box-generic-noborder">

						    <!-- Tabs Heading -->
						    <div class="tabsbar tabsbar-2">
						        <ul class="row-fluid row-merge">
						        	<li class="span3 active" style="width: 135px;"><a href="#tab-FROM" data-toggle="tab">FROM</a>
						            </li>
						            <li class="span3 " style="width: 135px !important;"><a href="#tab-TO" data-toggle="tab">TO</a>
						            </li>
						        </ul>
						    </div>
						    <!-- // Tabs Heading END -->

						    <div class="tab-content">

						    	<!-- FROM -->
						        <div class="tab-pane active" id="tab-FROM">
						        	
						        	<!-- From Item Line -->
									<div id="grid" data-role="grid" class="costom-grid"
								    	 data-column-menu="true"
								    	 data-reorderable="true"
								    	 data-scrollable="false"
								    	 data-resizable="true"
								    	 data-editable="true"
						                 data-columns="[
										    { 
										    	title:'NO.',
										    	width: '50px', 
										    	attributes: { style: 'text-align: center;' }, 
										        template: function (dataItem) {
										        	var rowIndex = banhji.internalUsage.lineDS.indexOf(dataItem)+1;
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
											    field: 'cost',
											    title: 'COST',
											    format: '{0:n}',
											    editable: 'false',
											    editor: numberTextboxEditor,
											    width: '120px',
											    attributes: { style: 'text-align: right;' }
											},
											{ field: 'amount', title:'AMOUNT', format: '{0:n}', editable: 'false', attributes: { style: 'text-align: right;' }, width: '120px' }
				                         ]"
				                         data-auto-bind="false"
						                 data-bind="source: lineDS" ></div>
						           
									<button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>

									<br><br>
						        	
						        	<!-- From Account Line -->
									<div data-role="grid" class="costom-grid"
								    	 data-column-menu="true"
								    	 data-reorderable="true"
								    	 data-scrollable="false"
								    	 data-resizable="true"
								    	 data-editable="true"
						                 data-columns="[
										    { 
										    	title:'NO.',
										    	width: '50px', 
										    	attributes: { style: 'text-align: center;' }, 
										        template: function (dataItem) {
										        	var rowIndex = banhji.internalUsage.accountLineDS.indexOf(dataItem)+1;
										        	return '<i class=icon-trash data-bind=click:removeRowAccount></i>' + ' ' + rowIndex;
										      	}
										    },
						                 	{ field: 'account', title: 'ACCOUNT', editor: accountEditor, template: '#=account.name#', width: '300px' },
				                            { field: 'description', title:'DESCRIPTION', width: '300px' },                            
				                            {
											    field: 'amount',
											    title: 'AMOUNT',
											    format: '{0:n}',
											    editor: numberTextboxEditor,
											    width: '150px',
											    attributes: { style: 'text-align: right;' }
											}
				                         ]"
				                         data-auto-bind="false"
						                 data-bind="source: accountLineDS" ></div>
								   
									<button class="btn btn-inverse" data-bind="click: addRowAccount"><i class="icon-plus icon-white"></i></button>

						        </div>
						        <!-- // Item Line & Account Line END -->

						        <!-- TO -->
						        <div class="tab-pane" id="tab-TO">
						        	
									<div class="row-fluid">
										
										<!-- To Item Line -->
										<div id="grid" data-role="grid" class="costom-grid"
									    	 data-column-menu="true"
									    	 data-reorderable="true"
									    	 data-scrollable="false"
									    	 data-resizable="true"
									    	 data-editable="true"
							                 data-columns="[
											    { 
											    	title:'NO.',
											    	width: '50px', 
											    	attributes: { style: 'text-align: center;' }, 
											        template: function (dataItem) {
											        	var rowIndex = banhji.internalUsage.toItemLineDS.indexOf(dataItem)+1;
											        	return '<i class=icon-trash data-bind=click:removeRowTo></i>' + ' ' + rowIndex;
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
												    field: 'cost',
												    title: 'COST',
												    format: '{0:n}',
												    editor: numberTextboxEditor,
												    width: '120px',
												    attributes: { style: 'text-align: right;' }
												},
												{ field: 'amount', title:'AMOUNT', format: '{0:n}', editable: 'false', attributes: { style: 'text-align: right;' }, width: '120px' }
					                         ]"
					                         data-auto-bind="false"
							                 data-bind="source: toItemLineDS" ></div>

									    <button class="btn btn-inverse" data-bind="click: addRowTo"><i class="icon-plus icon-white"></i></button>

										<br><br>
									   
										<!-- To Account Line -->
										<div data-role="grid" class="costom-grid"
									    	 data-column-menu="true"
									    	 data-reorderable="true"
									    	 data-scrollable="false"
									    	 data-resizable="true"
									    	 data-editable="true"
							                 data-columns="[
											    { 
											    	title:'NO.',
											    	width: '50px', 
											    	attributes: { style: 'text-align: center;' }, 
											        template: function (dataItem) {
											        	var rowIndex = banhji.internalUsage.toAccountLineDS.indexOf(dataItem)+1;
											        	return '<i class=icon-trash data-bind=click:removeRowAccountTo></i>' + ' ' + rowIndex;
											      	}
											    },
							                 	{ field: 'account', title: 'ACCOUNT', editor: toAccountEditor, template: '#=account.name#', width: '300px' },
					                            { field: 'description', title:'DESCRIPTION', width: '300px' },                            
					                            {
												    field: 'amount',
												    title: 'AMOUNT',
												    format: '{0:n}',
												    editor: numberTextboxEditor,
												    width: '150px',
												    attributes: { style: 'text-align: right;' }
												}
					                         ]"
					                         data-auto-bind="false"
							                 data-bind="source: toAccountLineDS" ></div>

									    <button class="btn btn-inverse" data-bind="click: addRowAccountTo"><i class="icon-plus icon-white"></i></button>

									</div>

						        </div>
						        
						    </div>
						</div>


						<!-- Bottom part -->
			            <div class="row-fluid">
				
							<!-- Column -->
							<div class="span6 hidden-print">

								<!-- Add New Item -->
								<ul class="topnav addNew">
									<li role="presentation" class="dropdown ">
								  		<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
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
						  		<a href="#/account" class="btn" style="background: #203864; color: #fff; width: 137px;">
						  			<span data-bind="text: lang.lang.add_account"></span>
						  		</a>				
								
							</div>
							<!-- Column END -->
							
							<!-- Column -->
							<div class="span6">
								<table class="table table-borderless table-condensed cart_total">
									<tbody>
										<tr>
											<td class="right"><span >Total From:</span></td>
											<td class="right strong"><span data-bind="text: totalFrom"></span></td>
											<td class="right"><span >Total To:</span></td>
											<td class="right strong"><span data-bind="text: totalTo"></span></td>
										</tr>
										<tr>
											<td class="right"><span>Different:</span></td>
											<td class="right strong"><span data-bind="text: different"></span></td>
											<td class="right"></td>
											<td class="right strong"></td>
										</tr>
									</tbody>
								</table>
							</div>
							<!-- // Column END -->
							
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
<script id="internalUsage-from-item-line-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.internalUsage.lineDS.indexOf(data)+1#
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

			<input id="ddlMesurement"
				   data-role="dropdownlist"
				   data-header-template="item-measurement-header-tmpl"
				   data-value-primitive="true"                  
                   data-text-field="measurement"
                   data-value-field="measurement_id"
                   data-bind="value: measurement_id,
                   			  source: item_prices,
                   			  events:{ change: measurementChanges }"
                   data-option-label="UM" style="width: 57%;" />
		</td>
		<td class="right">
			<span data-format="n" data-bind="text: cost"></span>
		</td>
    </tr>
</script>
<script id="internalUsage-from-account-line-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">		
		<td class="center">
			<i class="icon-trash" data-bind="events: { click: removeRowAccount }"></i>
			#:banhji.internalUsage.accountLineDS.indexOf(data)+1#			
		</td>			
		<td>
			<input id="cbbAccounts" name="cbbAccounts-#:uid#"
				   data-role="combobox"
                   data-header-template="account-header-tmpl"                 
                   data-template="account-list-tmpl"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-filter="contains"
                   data-min-length="3"
                   data-bind="value: account_id,
                              source: accountDS"
                   data-placeholder="Add Account.."                                     
                   required data-required-msg="required" style="width: 100%" />	
		</td>
		<td>
			<input type="text" class="k-textbox" 
					data-bind="value: description"					
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td class="right">
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
<script id="internalUsage-to-item-line-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: removeItemTo }"></i>
			#:banhji.internalUsage.toItemLineDS.indexOf(data)+1#
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
                   			  events:{ change: toItemChanges }"
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

			<input id="ddlMesurement"
				   data-role="dropdownlist"
				   data-header-template="item-measurement-header-tmpl"
				   data-value-primitive="true"                  
                   data-text-field="measurement"
                   data-value-field="measurement_id"
                   data-bind="value: measurement_id,
                   			  source: item_prices,
                   			  events:{ change: measurementChanges }"
                   data-option-label="UM" style="width: 57%;" />
			
		</td>
		<td class="right">
			<input id="txtCost-#:uid#" name="txtCost-#:uid#"
			   type="number" class="k-textbox"
			   min="0"
		       data-bind="value: cost, events: {change : changes}"
		       required data-required-msg="required"
		       placeholder="Cost..." 
		       style="text-align: right; width: 100%;" />
		</td>
		<td class="right">
			<span data-format="n" data-bind="text: amount"></span>
		</td>	
    </tr>
</script>
<script id="internalUsage-to-account-line-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: removeAccountTo }"></i>
			#:banhji.internalUsage.toAccountLineDS.indexOf(data)+1#
		</td>
		<td>
			<input id="cbbAccounts" name="cbbAccounts-#:uid#"
				   data-role="combobox"
                   data-header-template="account-header-tmpl"                 
                   data-template="account-list-tmpl"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-filter="contains"
                   data-min-length="3"
                   data-bind="value: account_id,
                              source: toAccountDS"
                   data-placeholder="Add Account.."                                     
                   required data-required-msg="required" style="width: 100%" />	
		</td>
		<td>
			<input type="text" class="k-textbox" 
					data-bind="value: description"					
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td class="right">
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
<script id="errorTemplate" type="text/x-kendo-template">
    <div class="wrong-pass">
        <img style="float: left; cursor: pointer;" src="http://demos.telerik.com/kendo-ui/content/web/notification/error-icon.png" />        
        <h3>#= message #</h3>
    </div>
</script>
<script id="successTemplate" type="text/x-kendo-template">
    <div class="upload-success">
        <img src="http://demos.telerik.com/kendo-ui/content/web/notification/success-icon.png" />
        <h3>#= message #</h3>
    </div>
</script>

<!--  List Templates -->
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
            dataSource: banhji.source.itemList
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





<!-- #############################################
##################################################
#	MENU VIEW 					 			 	#
##################################################
############################################## -->
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
    banhji.accessPage = new kendo.data.DataSource({
	    transport: {
	        read  : {
	          	url: baseUrl + 'api/users/access_role',
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
	    page:1,
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
	kendo.culture(banhji.locale);
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

	// SOURCE #############################################################################################
	banhji.source = kendo.observable({
		lang 						: langVM,
		countryDS					: dataStore(apiUrl + "countries"),
		//Contact
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
			filter:{ field:"assignee_id", operator:"by_user_id", value:banhji.userData.id },
			sort:{ field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		employeeUserDS				: dataStore(apiUrl + "contacts"),
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
		testDS						: dataStore(apiUrl + "item_locations/test"),
		employee 					: [],
		pageLoad 					: function(){
			this.setEmployeeByUser();
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
		setEmployeeByUser 			: function(){
			var self = this;

			this.employeeUserDS.query({
				filter: { field:"user_id", value:banhji.source.user_id }
			}).then(function(){
				var view = self.employeeUserDS.view();

				if(view.length>0){
					self.set("employee", view[0]);
				}
			});
		},
		checkAccessModule 			: function(moduleName){
			banhji.accessMod.query({
				filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
			}).then(function(e){
				var allowed = false;
				if(banhji.accessMod.data().length > 0) {
					for(var i = 0; i < banhji.accessMod.data().length; i++) {
						if(moduleName.toLowerCase() == banhji.accessMod.data()[i].name.toLowerCase()) {
							allowed = true;
							break;
						}
					}
				}
				return allowed;
			});
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
	banhji.searchAdvanced = kendo.observable({
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


	banhji.itemDashBoard = kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "inventory_modules/dashboard"),
		topSupplierDS 		: dataStore(apiUrl + "vendor_modules/top_supplier"),
		topSaleProductDS 	: dataStore(apiUrl + "inventory_modules/top_sale_product"),
		topPurchaseProductDS: dataStore(apiUrl + "inventory_modules/top_purchase_product"),
		graphDS 	 		: dataStore(apiUrl + "inventory_modules/monthly_item_purchase_sale"),
		obj 				: {},
		pageLoad 			: function(){
			this.loadData();
		},
		setObj 		: function(){
			this.set("obj", {
				inventory_value 		: 0,
				gross_profit_margin 	: 0,
				inventory_turnover_day	: 0
			});
		},
		loadData 			: function(){
			var self = this, obj = this.get("obj");

			this.graphDS.read();

			this.dataSource.query({
				filter: []
			}).then(function(){
				var view = self.dataSource.view();
				
				obj.set("inventory_value", kendo.toString(view[0].inventory_value, "c2", banhji.locale));
				obj.set("gross_profit_margin", kendo.toString(view[0].gross_profit_margin, "p"));
				obj.set("inventory_turnover_day", kendo.toString(view[0].inventory_turnover_day, "n0"));				
			});

			this.topPurchaseProductDS.query({
				filter: []
			});

			this.topSupplierDS.query({
				filter: []
			});

			this.topSaleProductDS.query({
				filter: []
			});
		}
	});
	banhji.itemCenter = kendo.observable({
		lang 				: langVM,
		itemDS				: new kendo.data.DataSource({
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
		  		{ field:"item_type_id <>", value: 3 },
		  		{ field:"item_type_id <>", value: 5 }
		  	],
			sort:[
				{ field:"item_type_id", dir:"asc" },
				{ field:"id", dir:"asc" }
			],
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		dataSource 			: dataStore(apiUrl + "inventory_modules/center"),
		transactionDS		: dataStore(apiUrl + "items/movement"),
		attachmentDS 		: dataStore(apiUrl + "attachments"),
		categoryDS 			: new kendo.data.DataSource({
		  	data: banhji.source.categoryList,
		  	filter:[
		  		{ field:"item_type_id", operator:"neq", value: 3 },
		  		{ field:"item_type_id", operator:"neq", value: 5 }
		  	]
		}),
		sortList			: banhji.source.sortList,
		sorter 				: "all",
		sdate 				: "",
		edate 				: "",
		obj 				: null,
		raw 				: null,
		searchText 			: "",
		pageLoad 			: function(id){
			if(id){
				this.loadObj(id);
			}

			//Refresh
			if(this.itemDS.total()>0){
				this.itemDS.fetch();
				this.transactionDS.fetch();
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
	            		type 			: "Item",
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
	    onRemove 			: function(e){
	        // Array with information about the uploaded files
	        var self = this, files = e.files;
	        $.each(this.attachmentDS.data(), function(index, value){
	        	if(value.name==files[0].name){
	        		self.attachmentDS.remove(value);

	        		return false;
	        	}
	        });
	    },
	    removeFile 			: function(e){
	    	var data = e.data;

	    	if (confirm("Are you sure, you want to delete it?")) {
	    		this.attachmentDS.remove(data);
	    	}	    	
	    },
	    uploadFile 			: function(){
	    	var self = this;

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
            	if(e.type=="destroy"){
	            	if(saved==false){
	            		saved = true;
	            	
	            		var response = e.response.results;
	            		$.each(response, function(index, value){            			
		            		var paramz = {
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
							bucket.deleteObjects(paramz, function(err, data) {
							  	//console.log(err, data);
							});
						});
	            	}
            	}
            });

            //Clear upload files
            $(".k-upload-files").remove();
	    },
	    //Obj
		loadObj 			: function(id){
			var self = this;

			this.itemDS.query({
				filter: { field:"id", value:id},
				page:1,
				pageSize:100
			}).then(function(){
				var view = self.itemDS.view();

				if(view.length>0){
					self.set("obj", view[0]);
					self.loadData();
				}
			});
		},
		loadData 			: function(){
			var self = this, obj = this.get("obj");

			if(obj!==null){
				this.searchTransaction();

				this.dataSource.query({
					filter: { field:"id", value: obj.id }
				}).then(function(){
					var view = self.dataSource.view();

					self.set("raw", view[0]);
				});

				this.attachmentDS.query({
					filter:{ field:"item_id", value: obj.id },
					page: 1,
					pageSize:10
				});
			}
		},
		selectedRow			: function(e){
			var self = this, data = e.data;

			this.set("obj", data);
			this.loadData();
		},
		sorterChanges 		: function(){
			var value = this.get("sorter");

			switch(value){
			case "today":
				var today = new Date();
				
				this.set("sdate", today);
				this.set("edate", today);
			  					
			  	break;
			case "week":
			  	var thisWeek = new Date;
				var first = thisWeek.getDate() - thisWeek.getDay(); 
				var last = first + 6;

				var firstDayOfWeek = new Date(thisWeek.setDate(first));
				var lastDayOfWeek = new Date(thisWeek.setDate(last));				

				this.set("sdate", firstDayOfWeek);
				this.set("edate", lastDayOfWeek);
				
			  	break;
			case "month":
				var thisMonth = new Date;				  	
				var firstDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth(), 1);
				var lastDayOfMonth = new Date(thisMonth.getFullYear(), thisMonth.getMonth() + 1, 0);

				this.set("sdate", firstDayOfMonth);
				this.set("edate", lastDayOfMonth);

			  	break;
			case "year":
				var thisYear = new Date();
			  	var firstDayOfYear = new Date(thisYear.getFullYear(), 0, 1);
				var lastDayOfYear = new Date(thisYear.getFullYear(), 11, 31);

				this.set("sdate", firstDayOfYear);
				this.set("edate", lastDayOfYear);

			  	break;
			default:
				this.set("sdate", "");
				this.set("edate", "");					  
			}
		},
		search 				: function(){
			var self = this,
			para = [],
			searchText = this.get("searchText"),			
			category_id = this.get("category_id");

        	if(searchText){
      			var textParts = searchText.replace(/([a-z]+)/i, "$1 ").split(/[^0-9a-z]+/ig);

      			para.push(
      				// { field: "abbr", operator: "or_like", value: textParts[0] },
      				// { field: "number", value: textParts[1] },
      				{ field: "number", operator: "startswith", value: searchText },
					{ field: "name", operator: "or_like", value: searchText }
      			);
      		}

			if(category_id){
				para.push({ field:"category_id", value:category_id });
			}

			// para.push({ field:"item_type_id", value:1 });
			// para.push({ field:"is_catalog", value: 0 });
			// para.push({ field:"is_assembly", value: 0 });          

            this.itemDS.filter(para);

            this.set("searchText", "");
            this.set("category_id", 0);      			
		},
		searchTransaction	: function(){
			var self = this, para = [],
				obj = this.get("obj"),
				start = this.get("sdate"),
        		end = this.get("edate");

        	if(obj!==null){
        		para.push({ field:"item_id", value: obj.id });

	            //Dates
	        	if(start && end){
	        		start = new Date(start);
	        		end = new Date(end);
	        		end.setDate(end.getDate()+1);

	            	para.push({ field:"issued_date >=", operator: "where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
	            	para.push({ field:"issued_date <=", operator: "where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
	            }else if(start){
	            	start = new Date(start);
	            	para.push({ field:"issued_date", operator: "where_related_transaction", value: kendo.toString(start, "yyyy-MM-dd") });
	            }else if(end){
	            	end = new Date(end);
	            	end.setDate(end.getDate()+1);
	            	para.push({ field:"issued_date <=", operator: "where_related_transaction", value: kendo.toString(end, "yyyy-MM-dd") });
	            }else{}

	            this.transactionDS.query({
	            	filter: para,
	            	page: 1,
	            	pageSize: 10
	            });
	        }          
		},
		edit				: function(){
			var obj = this.get("obj");

			if(obj!==null){
				if(obj.item_type_id=="1"){
					if(obj.is_catalog=="1"){
						banhji.router.navigate('/item_catalog/'+obj.id);
					}else if(obj.is_assembly=="1"){
						banhji.router.navigate('/item_assembly/'+obj.id);
					}else if(obj.nature=="variant"){
						banhji.router.navigate('/item/'+obj.sub_of_id);
					}else{
						banhji.router.navigate('/item/'+obj.id);
					}
				}else if(obj.item_type_id=="2"){
					banhji.router.navigate('/non_inventory_part/'+obj.id);
				}else if(obj.item_type_id=="3"){
					banhji.router.navigate('/fixed_assets/'+obj.id);
				}else if(obj.item_type_id=="4"){
					banhji.router.navigate('/item_service/'+obj.id);
				}else if(obj.item_type_id=="5"){
					banhji.router.navigate('/txn_item/'+obj.id);
				}else{

				}
			}
		},
		pricing				: function(){
			var obj = this.get("obj");

			if(obj!==null){
				if(obj.is_catalog=="1"){
					banhji.router.navigate('/item_catalog/'+obj.id);
				}else if(obj.is_assembly=="1"){
					banhji.router.navigate('/item_assembly/'+obj.id);
				}else{
					banhji.router.navigate('/item_prices/'+obj.id);
				}
			}
		},
		variant				: function(){
			var obj = this.get("obj");

			if(obj!==null){
				if(obj.variant.length>0){
					banhji.router.navigate('/item_variant/'+obj.sub_of_id);
				}
			}
		}
	});
	// FUNCTIONS
	banhji.grn =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "transactions"),
		lineDS  			: dataStore(apiUrl + "item_lines"),
		txnDS 				: dataStore(apiUrl + "transactions"),
		recurringDS 		: dataStore(apiUrl + "transactions"),
		recurringLineDS 	: dataStore(apiUrl + "item_lines"),
		referenceDS			: dataStore(apiUrl + "transactions"),
		referenceLineDS		: dataStore(apiUrl + "item_lines"),
		itemPriceDS			: dataStore(apiUrl + "item_prices"),
		attachmentDS	 	: dataStore(apiUrl + "attachments"),
		warehouseDS  		: dataStore(apiUrl + "warehouses"),
		warehouseFromDS  	: dataStore(apiUrl + "warehouses"),
		locationDS  		: dataStore(apiUrl + "locations"),
		locationFromDS  	: dataStore(apiUrl + "locations"),
		zoneDS  			: dataStore(apiUrl + "zones"),
		sectionDS  			: dataStore(apiUrl + "sections"),
		rackDS  			: dataStore(apiUrl + "racks"),
		levelDS  			: dataStore(apiUrl + "levels"),
		positionDS  		: dataStore(apiUrl + "positions"),
		binLocationDS  		: dataStore(apiUrl + "bin_locations"),
		txnTemplateDS 		: new kendo.data.DataSource({
		  	data: banhji.source.txnTemplateList,
		  	filter:{ field: "type", value: "GRN" }
		}),
		contactDS  			: banhji.source.supplierDS,
		statusObj 			: banhji.source.statusObj,
		amtDueColor 		: banhji.source.amtDueColor,
	    confirmMessage 		: banhji.source.confirmMessage,
		frequencyList 		: banhji.source.frequencyList,
		monthOptionList 	: banhji.source.monthOptionList,
		monthList 			: banhji.source.monthList,
		weekDayList 		: banhji.source.weekDayList,
		dayList 			: banhji.source.dayList,
		showMonthOption 	: false,
		showMonth 			: false,
		showWeek 			: false,
		showDay 			: false,
		obj 				: null,
		isEdit 				: false,
		saveDraft 			: false,
		saveClose 			: false,
		savePrint 			: false,
		saveRecurring 		: false,
		showConfirm   		: false,
		notDuplicateNumber	: true,
		recurring 			: "",
		recurring_validate 	: false,
		enableRef 	 		: false,
		total 				: 0,
		windowVisible 		: false,
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
		setContact 			: function(contact){
			var obj = this.get("obj");

		    obj.set("contact", contact);
		    this.contactChanges();
	    },
		contactChanges 		: function(){
			var self = this, obj = this.get("obj");

	    	if(obj.contact){	    				    			    	
		    	var contact = obj.contact;
		    	
		    	obj.set("contact_id", contact.id);
		    	obj.set("locale", contact.locale);
		    	obj.set("bill_to", contact.bill_to);
		    	obj.set("ship_to", contact.ship_to);

		    	this.setRate();
		    	this.loadReference();
	    	}
	    	
		    this.changes();
	    },
		//Currency Rate
		setRate 			: function(){
			var obj = this.get("obj"), 
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));
			
			obj.set("rate", rate);

			//Item Lines
			$.each(this.lineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});
		},
		//Item
		addItem 			: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			row.set("item_id", item.id);			
			row.set("description", item.sale_description);
			row.set("rate", rate);
			row.set("locale", item.locale);

			//Get first price
			this.itemPriceDS.query({
	        	filter:[
	        		{ field:"item_id", value:item.id },
	        		{ field:"assembly_id", value:0 }
	        	],
	        	page: 1,
	        	pageSize: 1
	        }).then(function(){
	        	var view = self.itemPriceDS.view();

	        	if(view.length>0){
	        		var measurement = { 
	        			measurement_id 	: view[0].measurement_id,
	        			conversion_ratio: view[0].conversion_ratio, 
	        			measurement 	: view[0].measurement 
	        		};
	        		row.set("measurement", measurement);
	        	}
	        });
		},
		addItemCatalog 		: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item;

			this.lineDS.remove(row);

        	$.each(item.catalogs, function(index, value){
				var catalogItem = banhji.source.itemDS.get(value);

				if(catalogItem){
					var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date));

					self.lineDS.add({
						transaction_id 		: obj.id,
						tax_item_id 		: 0,
						item_id 			: catalogItem.id,
						measurement_id 		: 0,
						description 		: catalogItem.sale_description,
						quantity 	 		: 1,
						conversion_ratio 	: 1,
						cost 				: 0,
						price 				: 0,
						amount 				: 0,
						discount 			: 0,
						rate				: rate,
						locale				: catalogItem.locale,
						movement 			: 0,

						item 				: catalogItem,
						measurement 		: { measurement_id:"", measurement:"" }
					});
				}
			});
		},
		changes				: function(){
			var self = this, 
				obj = this.get("obj"),
				total = 0;

			$.each(this.lineDS.data(), function(index, value) {
				total += value.quantity;
	        });
	        
			obj.set("amount", total);

			this.set("total", kendo.toString(total, "n", obj.locale));
		},
		lineDSChanges 		: function(arg){
			var self = banhji.grn;

			if(arg.field){
				if(arg.field=="item"){
					var dataRow = arg.items[0],
						item = dataRow.item;

					if(item.is_catalog=="1"){
						self.addItemCatalog(dataRow.uid);
					}else{
						self.addItem(dataRow.uid);
					}

					self.addExtraRow(dataRow.uid);
				}else if(arg.field=="quantity"){
					self.changes();					
				}else if(arg.field=="measurement"){
					var dataRow = arg.items[0];
					
					dataRow.set("measurement_id", dataRow.measurement.measurement_id);
			        dataRow.set("conversion_ratio", dataRow.measurement.conversion_ratio);			    
				}
			}
		},
		//Number      	
		checkExistingNumber 	: function(){
			var self = this, para = [], 
			obj = this.get("obj");
			
			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}
				
				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();
					
					if(view.length>0){
				 		self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber 			: function(){
			var self = this, obj = this.get("obj"),
			issueDate = new Date(obj.issued_date),
			startDate = new Date(obj.issued_date),
			endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.txnDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				],
				sort: { field:"number", dir:"desc" },
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.txnDS.view(),				
				number = 0, str = "";

				if(view.length>0){
					str = view[0].number;
					str = str.substring(str.length-4, str.length);
					number = kendo.parseInt(str);
				}
				
				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");
				
				obj.set("number", str);
			});
		},
		setStatus 			: function(){
			var self = this,
				obj = this.get("obj"), 
				statusObj = this.get("statusObj");

			statusObj.set("text", "");
	        statusObj.set("date", "");
	        statusObj.set("number", "");
	        statusObj.set("url", "");

			switch(obj.status) {
				case 0:
			        statusObj.set("text", "open");
			        break;
				case 1:
			    	statusObj.set("text", "Received");

			    	this.txnDS.query({
			    		filter:{ field:"reference_id", value: obj.id },
			    		sort: { field:"issued_date", dir:"desc" },
			    		page:1,
			    		pageSize:1
			    	}).then(function(){
			    		var view = self.txnDS.view();

			    		if(view.length>0){
			    			statusObj.set("date", kendo.toString(new Date(view[0].issued_date), "dd-MM-yyyy h:mm:ss tt"));
			    			statusObj.set("number", view[0].number);
		    				
		    				var url = "#/" + view[0].type.toLowerCase() + "/" + view[0].id;
		    				statusObj.set("url", url);
			    		}
			    	});
			        break;
			    case 4:
			        statusObj.set("text", "draft");
			        break;
			    default:
			        //Default here
			}
		},
		//Window
		openWindow 			: function(){
			this.set("windowVisible", true);
		},
		closeWindow 		: function(){
			this.set("windowVisible", false);
		},
		//Obj
		loadObj 			: function(id){
			var self = this, para = [];

			para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

				this.dataSource.query({    			
					filter: para,
					page: 1,
					pageSize: 100
				}).then(function(e){
					var view = self.dataSource.view();
					
					self.set("obj", view[0]);
					self.set("total", kendo.toString(view[0].amount, "n0"));
					self.setStatus();
					
					self.lineDS.query({
						filter: [
							{ field: "transaction_id", value: id },
							{ field: "assembly_id", value: 0 }
						],
					});
					self.attachmentDS.filter({ field: "transaction_id", value: id });
					self.referenceDS.filter({ field: "id", value: view[0].reference_id });
				});
			}
		},
		addEmpty 		 	: function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.attachmentDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);

			this.dataSource.insert(0, {
				transaction_template_id : 5,
				contact_id 			: "",
				reference_id 		: "",
				recurring_id 		: "",
				user_id 			: this.get("user_id"),
			   	type				: "GRN",//Required
			   	number 				: "",
			   	sub_total 			: 0,
			   	amount				: 0,
			   	discount 			: 0,
			   	tax 				: 0,
			   	rate				: 1,
			   	locale 				: banhji.locale,
			   	issued_date 		: new Date(),
			   	due_date 			: new Date(),
			   	bill_to 			: "",
			   	ship_to 			: "",
			   	memo 				: "",
			   	memo2 				: "",
			   	status 				: 0,
			   	segments 			: [],
			   	//Recurring
			   	recurring_name 		: "",
			   	start_date 			: new Date(),
			   	frequency 			: "Daily",
			   	month_option 		: "Day",
			   	interval 			: 1,
			   	day 				: 1,
			   	week 				: 0,
			   	month 				: 0,
			   	is_recurring 		: 0,

			   	contact 			: { id:0, name:"" },
			   	locationFrom 		: {
			   		warehouse_id 	: 0,
			   		location_id 	: 0,
			   		zone_id 		: 0,
			   		section_id 		: 0,
			   		rack_id 		: 0,
			   		level_id 		: 0,
			   		position_id 	: 0,
			   		bin_location 	: ""
			   	},
			   	locationTo 			: {
			   		warehouse_id 	: 0,
			   		location_id 	: 0,
			   		zone_id 		: 0,
			   		section_id 		: 0,
			   		rack_id 		: 0,
			   		level_id 		: 0,
			   		position_id 	: 0,
			   		bin_location 	: ""
			   	}
	    	});
			
			var obj = this.dataSource.at(0);
			this.set("obj", obj);
			this.setRate();
			this.generateNumber();

			//Default rows
			for (var i = 0; i < banhji.source.defaultLines; i++) {
				this.addRow();
			}
		},
		addRow 				: function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id 		: obj.id,
				tax_item_id 		: "",
				item_id 			: "",
				measurement_id 		: 0,
				description 		: "",
				quantity 	 		: 1,
				conversion_ratio 	: 1,
				cost 				: 0,
				amount 				: 0,
				rate				: obj.rate,
				locale				: obj.locale,
				movement 			: 0,

				item 				: { id:"", name:"" },
				measurement 		: { measurement_id:"", measurement:"" },
				bin_locations 		: { id:0, number:""}
			});
		},
		removeRow 			: function(e){
			var d = e.data;
			if(this.lineDS.total()>1){
				this.lineDS.remove(d);
		        this.changes();
	        }		        
		},
		addExtraRow 		: function(uid){
			var row = this.lineDS.getByUid(uid),
				index = this.lineDS.indexOf(row);

			if(index==this.lineDS.total()-1){
				this.addRow();
			}
		},
		removeEmptyRow 		: function(){
			var raw = this.lineDS.data();
		    var item, i;
		    for(i=raw.length-1; i>=0; i--){
		    	item = raw[i];

		    	if (item.item_id==0) {
			       	this.lineDS.remove(item);
			    }
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

	    	obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));
	    	obj.set("due_date", kendo.toString(new Date(obj.due_date), "yyyy-MM-dd"));

	        this.removeEmptyRow();

	        //Save Draft
	        if(this.get("saveDraft")){
	        	obj.set("status", 4); //In progress
	        	obj.set("progress", "Draft");
	        	obj.set("is_journal", 0);//No Journal
	        }

	        //Recurring
	    	if(this.get("saveRecurring")){
	    		this.set("saveRecurring", false);
	    		
	    		obj.set("number", "");
	    		obj.set("is_recurring", 1);
	    	}

	        //Edit Mode
	    	if(obj.isNew()==false){
	    		//Use draft
	    		if(obj.status==4){
	    			obj.set("status", 0);//Open
	    			obj.set("progress", "");
	    			obj.set("is_journal", 1);//Add Journal
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
				}	

				self.lineDS.sync();			
				self.uploadFile();
				
				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveDraft") || self.get("saveClose")){
					//Save Draft or Save Close
					self.set("saveDraft", false);
					self.set("saveClose", false);
					self.cancel();
				}else if(self.get("savePrint")){
					//Save Print
					self.set("savePrint", false);
					self.clear();
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		clear 				: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.attachmentDS.cancelChanges();
			
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.attachmentDS.data([]);

			banhji.userManagement.removeMultiTask("grn");
		},
		cancel 				: function(){
			this.clear();
			window.history.back();
		},
	    delete 				: function(){
			var self = this, obj = this.get("obj");
			this.set("showConfirm",false);			
			
	        this.txnDS.query({
	        	filter:[
	        		{ field:"reference_id", value:obj.id },
	        	],
	        	page:1,
	        	pageSize:1
	        }).then(function(){
	        	var view = self.txnDS.view();

	        	if(view.length>0){
	        		alert("Sorry, you can not delete it.");
	        	}else{
	        		obj.set("deleted", 1);
			        self.dataSource.sync();
			        self.dataSource.bind("requestEnd", function(e){
			        	if(e.type==="update"){
			        		window.history.back();
			        	}
			        });
	        	}
	        });		    	    	
		},
		openConfirm 		: function(){
			this.set("showConfirm", true);
		},
		closeConfirm 		: function(){
			this.set("showConfirm", false);
		},
		validating 			: function(){
			var result = true, nonItem = true;

			//Check select non item
			$.each(this.lineDS.data(), function(index, value){
				if(value.item_id>0){
					nonItem = false;
				}
			});
			
			if(nonItem){
				$("#ntf1").data("kendoNotification").error("Please select at least one item!");

				result = false;
			}

			return result;
		},
		//Reference					
		loadReference 		: function(){
			var obj = this.get("obj");

			if(obj.contact_id>0){
				this.set("enableRef", true);

				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "status", value: 0 },
					{ field: "type", value: "Purchase_Order" },
					{ field: "due_date >=", value: kendo.toString(obj.issued_date, "yyyy-MM-dd") }
				]);
			}else{
				this.set("enableRef", false);
				obj.set("reference_id", "");
			}
		},
		referenceChanges 	: function(){
			var self = this, obj = this.get("obj");

			if(obj.reference_id>0){
			 	this.referenceLineDS.query({
			 		filter: { field:"transaction_id", value: obj.reference_id },
			 		page: 1,
			 		pageSize: 100
			 	}).then(function(){
			 		var view = self.referenceLineDS.view();					

			 		self.lineDS.data([]);
			 		$.each(view, function(index, value){
			 			self.lineDS.add({					
							transaction_id 		: 0,
							item_id 			: value.item_id,
							tax_item_id 		: value.tax_item_id,
							measurement_id 		: value.measurement_id,							
							description 		: value.description,				
							quantity 	 		: value.quantity,
							conversion_ratio 	: value.conversion_ratio,
							cost 				: value.cost,												
							amount 				: value.amount,
							discount 			: value.discount,
							rate				: value.rate,
							locale				: value.locale,
							movement 			: 0,

							item 				: { id:"", name:"" },
							measurement 		: { measurement_id:"", measurement:"" }
						});
			 		});

			 		self.changes();
			 	});
		 	}
		},
		//Recurring
		loadRecurring 		: function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");
				
				obj.set("contact", view[0].contact);
				obj.set("contact_id", view[0].contact.id);
				obj.set("recurring_id", id);
				obj.set("job_id", view[0].job_id);
				obj.set("locale", view[0].locale);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
				obj.set("bill_to", view[0].bill_to);
				obj.set("ship_to", view[0].ship_to);

				// self.setContact(view[0].contact);
			});

			this.recurringLineDS.query({
				filter:[
					{ field: "transaction_id", value: id },
					{ field: "assembly_id", value: 0 }
				]
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);

				$.each(view, function(index, value){
					self.lineDS.add({
						transaction_id 		: 0,
						tax_item_id 		: value.tax_item_id,
						item_id 			: value.item_id,
						measurement_id 		: value.measurement_id,
						description 		: value.description,
						quantity 	 		: value.quantity,
						cost 				: value.cost,
						amount 				: value.amount,
						rate				: value.rate,
						locale				: value.locale,
						movement 			: 0,

						item 				: value.item,
						measurement 		: value.measurement
					});
				});

				self.changes();
			});
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
	banhji.gdn =  kendo.observable({
		lang 				: langVM,
		dataSource 			: dataStore(apiUrl + "transactions"),
		lineDS  			: dataStore(apiUrl + "item_lines"),
		assemblyLineDS  	: dataStore(apiUrl + "item_lines"),
		txnDS 	 			: dataStore(apiUrl + "transactions"),
		recurringDS 		: dataStore(apiUrl + "transactions"),
		recurringLineDS 	: dataStore(apiUrl + "item_lines"),
		referenceDS			: dataStore(apiUrl + "transactions"),
		referenceLineDS		: dataStore(apiUrl + "item_lines"),
		assemblyDS			: dataStore(apiUrl + "item_prices"),
		attachmentDS	 	: dataStore(apiUrl + "attachments"),
		txnTemplateDS 		: new kendo.data.DataSource({
		  	data: banhji.source.txnTemplateList,
		  	filter:{ field: "type", value: "GDN" }
		}),
		itemDS				: new kendo.data.DataSource({
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
			filter:{ field:"item_type_id <>", value:3 },
			sort:[
				{ field:"item_type_id", dir:"asc" },
				{ field:"number", dir:"asc" }
			],
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		contactDS			: banhji.source.customerDS,
		amtDueColor 		: banhji.source.amtDueColor,
	    confirmMessage 		: banhji.source.confirmMessage,
		frequencyList 		: banhji.source.frequencyList,
		monthOptionList 	: banhji.source.monthOptionList,
		monthList 			: banhji.source.monthList,
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
		notDuplicateNumber  : true,
		statusSrc 			: "",
		recurring 			: "",
		recurring_validate 	: false,
		enableRef 	 		: false,
		total 				: 0,
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
	    onRemove 			: function(e){
	        // Array with information about the uploaded files
	        var self = this, files = e.files;
	        $.each(this.attachmentDS.data(), function(index, value){
	        	if(value.name==files[0].name){
	        		self.attachmentDS.remove(value);

	        		return false;
	        	}
	        });
	    },
	    removeFile 			: function(e){
	    	var data = e.data;

	    	if (confirm("Are you sure, you want to delete it?")) {
	    		this.attachmentDS.remove(data);
	    	}
	    },
	    uploadFile 			: function(){
	    	var self = this;

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
            	if(e.type=="destroy"){
	            	if(saved==false){
	            		saved = true;
	            	
	            		var response = e.response.results;
	            		$.each(response, function(index, value){
		            		var paramz = {
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
							bucket.deleteObjects(paramz, function(err, data) {
							  	//console.log(err, data);
							});
						});
	            	}
            	}
            });

            //Clear upload files
            $(".k-upload-files").remove();
	    },
		//Contact
		setContact 			: function(contact){
			var obj = this.get("obj");

		    obj.set("contact", contact);
		    this.contactChanges();
	    },
		contactChanges 		: function(){
			var self = this, obj = this.get("obj");

	    	if(obj.contact){
		    	var contact = obj.contact;

		    	obj.set("contact_id", contact.id);
		    	obj.set("locale", contact.locale);
		    	obj.set("bill_to", contact.bill_to);
		    	obj.set("ship_to", contact.ship_to);

		    	this.setRate();
		    	this.loadReference();
	    	}

		    this.changes();
	    },
	    //Currency Rate
		setRate 			: function(){
			var obj = this.get("obj"), 
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

			obj.set("rate", rate);

			$.each(this.lineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});
		},
		//Item
		itemChanges 		: function(e){
			e.preventDefault();

			var self = this, data = e.data,
				obj = this.get("obj");
			
			if(data.item_id>0){
				var item = this.itemDS.get(data.item_id), assemblyId = 0;
				if(item.is_assembly=="1"){
					$.each(this.lineDS.data(), function(index, value){
						if(value.item_id==data.item_id){
							assemblyId++;
						}
					});
				}

				if(assemblyId<2){//No duplicate assembly item
			        if(item.is_catalog=="1"){
			        	this.lineDS.remove(data);

			        	$.each(item.catalogs, function(ind, val){
							var catalogItem = self.itemDS.get(val);

							if(catalogItem){
								var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date)),
									itemPrices = banhji.source.getPriceList(catalogItem.id);

								self.lineDS.add({
									transaction_id 		: obj.id,
									tax_item_id 		: 0,
									item_id 			: catalogItem.id,
									measurement_id 		: itemPrices.length>0 ? itemPrices[0].measurement_id : catalogItem.measurement_id,
									description 		: catalogItem.sale_description,
									quantity 	 		: 1,
									conversion_ratio 	: itemPrices.length>0 ? itemPrices[0].conversion_ratio : 1,
									price 				: itemPrices.length>0 ? itemPrices[0].price * rate : catalogItem.price * rate,
									amount 				: 0,
									discount 			: 0,
									rate				: rate,
									locale				: catalogItem.locale,
									movement 			: 0,

									item_prices 		: itemPrices
								});
							}
						});

						this.changes();
			        }else if(item.is_assembly=="1"){
			        	var rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			        	data.set("measurement_id", item.measurement_id);
			    		data.set("description", item.sale_description);
			    		data.set("quantity", 1);
			    		data.set("conversion_ratio", 1);
				        data.set("price", item.price*rate);
				        data.set("rate", rate);
				        data.set("locale", item.locale);
				        // data.set("movement", -1);

				        this.changes();

				        this.assemblyDS.query({
				        	filter:{ field:"assembly_id", value:data.item_id }
				        }).then(function(){
				        	var view = self.assemblyDS.view();

				        	$.each(view, function(index, value){
				        		rate = obj.rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));

								self.assemblyLineDS.add({
									transaction_id 		: obj.id,
									item_id 			: value.item_id,
									assembly_id 		: value.assembly_id,
									measurement_id 		: value.measurement_id,
									description 		: "",
									quantity 	 		: value.quantity,
									conversion_ratio 	: value.conversion_ratio,
									price 				: value.price*rate,
									amount 				: value.price*rate,
									rate				: rate,
									locale				: value.locale,
									movement 			: 0
								});
					        });
				        });
			        }else{
						var rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date)),
							itemPrices = banhji.source.getPriceList(data.item_id);

						data.set("item_prices", itemPrices);
			    		data.set("measurement_id", itemPrices.length>0 ? itemPrices[0].measurement_id : item.measurement_id);
			    		data.set("description", item.sale_description);
			    		data.set("quantity", 1);
			    		data.set("conversion_ratio", itemPrices.length>0 ? itemPrices[0].conversion_ratio : 1);
				        data.set("price", itemPrices.length>0 ? itemPrices[0].price * rate : item.price * rate);
				        data.set("rate", rate);	
				        data.set("locale", item.locale);

				        this.changes();
			    	}
		    	}else{
	        		data.set("item_id", "");
	        	}
	        }
		},
		measurementChanges 	: function(e){
			var data = e.data, obj = this.get("obj");

			if(data.measurement_id>0){
				$.each(data.item_prices, function(index, value){
					if(value.measurement_id==data.measurement_id){

				        data.set("price", value.price * data.rate);
				        data.set("conversion_ratio", value.conversion_ratio);

						return false;
					}
				});

		        this.changes();
	        }
		},
		//Number
		checkExistingNumber 	: function(){
			var self = this, para = [], 
			obj = this.get("obj");
			
			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}
				
				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();
					
					if(view.length>0){
				 		self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber 			: function(){
			var self = this, obj = this.get("obj"),
			issueDate = new Date(obj.issued_date),
			startDate = new Date(obj.issued_date),
			endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.txnDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				],
				sort: { field:"number", dir:"desc" },
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.txnDS.view(),
				number = 0, str = "";

				if(view.length>0){
					str = view[0].number;
					str = str.substring(str.length-4, str.length);
					number = kendo.parseInt(str);
				}

				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");
				
				obj.set("number", str);
			});
		},
		//Obj
		loadObj 			: function(id){
			var self = this, para = [];

			para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

				this.dataSource.query({
					filter: para,
					page: 1,
					pageSize: 100
				}).then(function(e){
					var view = self.dataSource.view();

					self.set("obj", view[0]);
					
					self.set("statusSrc", banhji.source.deliveredSrc);

					self.loadLines(id);
					self.assemblyLineDS.filter([
						{ field: "transaction_id", value: id },
						{ field: "assembly_id >", value: 0 }
					]);
					self.attachmentDS.filter({ field: "transaction_id", value: id });
					self.referenceDS.filter({ field: "id", value: view[0].reference_id });
				});
			}
		},
		loadLines 			: function(id){
			var self = this;

			self.lineDS.query({
				filter: [
					{ field: "transaction_id", value: id },
					{ field: "assembly_id", value: 0 }
				],
			}).then(function(){
				var view = self.lineDS.view();

				$.each(view, function(index, value){
					value.set("item_prices", banhji.source.getPriceList(value.item_id));
				});
			});
		},
		changes				: function(){
			var self = this, obj = this.get("obj"), total = 0, itemIds = [];

			$.each(this.lineDS.data(), function(index, value) {
				total += value.quantity;

				if(value.item_id>0){
					itemIds.push(value.item_id);
				}
	        });

	        this.set("total", kendo.toString(total, "n0"));
	        obj.set("amount", total);

	        //Remove Assembly Item List
			var raw = this.assemblyLineDS.data();
		    var item, i;
		    for(i=raw.length-1; i>=0; i--){
		    	item = raw[i];
		    	
		    	if (jQuery.inArray(kendo.parseInt(item.assembly_id), itemIds)==-1) {
			       	this.assemblyLineDS.remove(item);
			    }
		    }
		},
		addEmpty 		 	: function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.assemblyLineDS.data([]);
			this.attachmentDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);

			//Set Date
			var duedate = new Date();
			duedate.setDate(duedate.getDate() + 7);

			this.dataSource.insert(0, {
				contact_id 			: "",
				transaction_template_id : 4,
				reference_id 		: "",
				recurring_id 		: "",
				job_id 				: 0,
				user_id 			: this.get("user_id"),
				employee_id 		: "",
			   	type				: "GDN",//Required
			   	number 				: "",
			   	amount				: 0,
			   	rate				: 1,
			   	locale 				: banhji.locale,
			   	issued_date 		: new Date(),
			   	due_date 			: duedate,//Delivery Date
			   	bill_to 			: "",
			   	ship_to 			: "",
			   	memo 				: "",
			   	memo2 				: "",
			   	status 				: 0,
			   	//Recurring
			   	recurring_name 		: "",
			   	start_date 			: new Date(),
			   	frequency 			: "Daily",
			   	month_option 		: "Day",
			   	interval 			: 1,
			   	day 				: 1,
			   	week 				: 0,
			   	month 				: 0,
			   	is_recurring 		: 0,

			   	contact 			: { id:0, name:"" }
	    	});
			
			var obj = this.dataSource.at(0);
			this.set("obj", obj);

			this.setRate();
			this.addRow();
			this.generateNumber();
		},
		addRow 				: function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id 		: obj.id,
				tax_item_id 		: "",
				item_id 			: "",
				assembly_id 		: 0,
				measurement_id 		: 0,
				description 		: "",
				quantity 	 		: 1,
				conversion_ratio 	: 0,
				price 				: 0,
				amount 				: 0,
				rate				: obj.rate,
				locale				: obj.locale,
				movement 			: 0,

				item_prices 		: []
			});
		},
		removeRow 			: function(e){
			var data = e.data;
			if(this.lineDS.total()>1){
				//Remove Assembly Item List
				if(data.item_id>0){
					var raw = this.assemblyLineDS.data();
				    
				    var item, i;
				    for(i=raw.length-1; i>=0; i--){
				      	item = raw[i];
				      	if (item.assembly_id==data.item_id){
				       	 	this.assemblyLineDS.remove(item);
				      	}

				    }
				}

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
	    	obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

	    	//Recurring
	    	if(this.get("saveRecurring")){
	    		this.set("saveRecurring", false);
	    		
	    		obj.set("number", "");
	    		obj.set("is_recurring", 1);
	    	}

	    	//Reference
	    	if(obj.reference_id>0){
	    		var ref = this.referenceDS.get(obj.reference_id);
				ref.set("status", 1);
				this.referenceDS.sync();
			}else{
				obj.set("reference_id", 0);
			}
	    	
			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Assembly Item line
					$.each(self.assemblyLineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
					});

					//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
			    		value.set("transaction_id", data[0].id);
		            });
				}

				self.lineDS.sync();
				self.assemblyLineDS.sync();
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
			this.lineDS.cancelChanges();
			this.assemblyLineDS.cancelChanges();
			this.attachmentDS.cancelChanges();
			
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.assemblyLineDS.data([]);
			this.attachmentDS.data([]);

			banhji.userManagement.removeMultiTask("gdn");
		},
		delete 				: function(){
			var self = this, obj = this.get("obj");
			this.set("showConfirm",false);
			
	        this.txnDS.query({
	        	filter:[
	        		{ field:"reference_id", value:obj.id },
	        	],
	        	page:1,
	        	pageSize:1
	        }).then(function(){
	        	var view = self.txnDS.view();

	        	if(view.length>0){
	        		alert("Sorry, you can not delete it.");
	        	}else{
	        		obj.set("deleted", 1);

			        self.dataSource.sync();
			        self.dataSource.bind("requestEnd", function(e){
			        	if(e.type==="update"){
			        		window.history.back();
			        	}
			        });
	        	}
	        });
		},
		openConfirm 		: function(){
			this.set("showConfirm", true);
		},
		closeConfirm 		: function(){
			this.set("showConfirm", false);
		},
		validating 			: function(){
			var result = true, nonItem = true;

			//Check select non item
			$.each(this.lineDS.data(), function(index, value){
				if(value.item_id>0){
					nonItem = false;
				}
			});
			
			if(nonItem){
				$("#ntf1").data("kendoNotification").error("Please select at least one item!");

				result = false;
			}

			return result;
		},
		//Reference
		loadReference 		: function(){
			var obj = this.get("obj");

			if(obj.contact_id>0){
				this.set("enableRef", true);

				this.referenceDS.filter([
					{ field: "contact_id", value: obj.contact_id },
					{ field: "status", value: 0 },
					{ field: "type", operator:"where_in", value:["Quote", "Sale_Order", "Commercial_Invoice", "Vat_Invoice", "Invoice"] },
					{ field: "due_date >=", value: kendo.toString(obj.issued_date, "yyyy-MM-dd") }
				]);
			}else{
				this.set("enableRef", false);
				obj.set("reference_id", "");
			}
		},
		referenceChanges 	: function(){
			var self = this, obj = this.get("obj");
			
			if(obj.reference_id>0){
				var data = this.referenceDS.get(obj.reference_id);
				
				obj.set("employee_id", data.employee_id);
				obj.set("reference_no", data.number);
				obj.set("segments", data.segments);
				obj.set("deposit", data.deposit);

			 	this.referenceLineDS.query({
			 		filter: { field:"transaction_id", value: obj.reference_id },
			 		page: 1,
			 		pageSize: 100
			 	}).then(function(){
			 		var view = self.referenceLineDS.view();

			 		self.lineDS.data([]);
			 		$.each(view, function(index, value){
			 			self.lineDS.add({
							transaction_id 		: obj.id,
							tax_item_id 		: value.tax_item_id,
							item_id 			: value.item_id,
							measurement_id 		: value.measurement_id,
							description 		: value.description,
							quantity 	 		: value.quantity,
							conversion_ratio 	: value.conversion_ratio,
							price 				: value.price,
							amount 				: value.amount,
							discount 			: value.discount,
							rate				: value.rate,
							locale				: value.locale,
							movement 			: 0,

							item_prices			: banhji.source.getPriceList(value.item_id)
						});
			 		});

			 		self.changes();
			 	});
			}else{
				obj.set("deposit", 0);
			}
		},
		//Recurring
		loadRecurring 		: function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");
				
				obj.set("contact", view[0].contact);
				obj.set("contact_id", view[0].contact.id);
				obj.set("recurring_id", id);
				obj.set("locale", view[0].locale);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
				obj.set("bill_to", view[0].bill_to);
				obj.set("ship_to", view[0].ship_to);

				// self.setContact(view[0].contact);
			});

			this.recurringLineDS.query({
				filter: { field:"transaction_id", value:id },
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);

				$.each(view, function(index, value){
					self.lineDS.add({
						transaction_id 		: 0,
						tax_item_id 		: value.tax_item_id,
						item_id 			: value.item_id,
						measurement_id 		: value.measurement_id,
						description 		: value.description,
						quantity 	 		: value.quantity,
						price 				: value.price,
						amount 				: value.amount,
						discount 			: value.discount,
						rate				: value.rate,
						locale				: value.locale,
						movement 			: 0,

						item_prices 		: banhji.source.getPriceList(value.item_id)
					});
				});

				self.changes();
			});
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
	banhji.itemAdjustment = kendo.observable({
    	lang 					: langVM,
    	dataSource  			: dataStore(apiUrl + "transactions"),
    	txnDS  					: dataStore(apiUrl + "transactions"),
    	recurringDS 			: dataStore(apiUrl + "transactions"),
    	lineDS 					: dataStore(apiUrl + "item_lines"),
		recurringLineDS 		: dataStore(apiUrl + "item_lines"),
    	journalLineDS			: dataStore(apiUrl + "journal_lines"),
    	attachmentDS	 		: dataStore(apiUrl + "attachments"),
		wacDS					: dataStore(apiUrl + "items/weighted_average_costing"),
		contactDS  				: banhji.source.employeeDS,
		accountDS  				: banhji.source.accountList,
		jobDS 					: banhji.source.jobList,
		segmentItemDS 			: new kendo.data.DataSource({
		  	data: banhji.source.segmentItemList,
		  	sort: [
			  	{ field: "segment_id", dir: "asc" },
			  	{ field: "code", dir: "asc" }
			]
		}),
		txnTemplateDS 			: new kendo.data.DataSource({
		  	data: banhji.source.txnTemplateList,
		  	filter:{ field: "type", value: "Item_Adjustment" }
		}),
		confirmMessage 			: banhji.source.confirmMessage,
		frequencyList 			: banhji.source.frequencyList,
		monthOptionList 		: banhji.source.monthOptionList,
		monthList 				: banhji.source.monthList,
		weekDayList 			: banhji.source.weekDayList,
		dayList 				: banhji.source.dayList,
		showMonthOption 		: false,
		showMonth 				: false,
		showWeek 				: false,
		showDay 				: false,
		obj 					: null,
		isEdit 					: false,
		saveClose 				: false,
		savePrint 				: false,
		saveRecurring 			: false,
		recurring_validate 		: false,
		recurring 				: "",
		user_id					: banhji.source.user_id,
		pageLoad 				: function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		//Upload
		onSelect 				: function(e){
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
	    removeFile 				: function(e){
	    	var data = e.data;

	    	if (confirm(banhji.source.confirmMessage)) {
	    		this.attachmentDS.remove(data);
	    	}
	    },
	    uploadFile 				: function(){
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
	    //Employee
	    employeeChanges 			: function(){
			var obj = this.get("obj");

	    	if(obj.employee){
		    	var employee = obj.employee;
		    	
		    	obj.set("employee_id", employee.id);
	    	}else{
	    		obj.set("employee_id", 0);
	    	}
	    },
	    //Currency Rate
		setRate 				: function(){
			var obj = this.get("obj"), 
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));
			
			obj.set("rate", rate);
		},
        //Segment
        segmentChanges 			: function(e) {
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
		//Number
		checkExistingNumber 	: function(){
			var self = this, para = [], 
			obj = this.get("obj");
			
			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}
				
				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();
					
					if(view.length>0){
				 		self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber 			: function(){
			var self = this, obj = this.get("obj"),
			issueDate = new Date(obj.issued_date),
			startDate = new Date(obj.issued_date),
			endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.txnDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				],
				sort: { field:"number", dir:"desc" },
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.txnDS.view(),				
				number = 0, str = "";

				if(view.length>0){
					str = view[0].number;
					str = str.substring(str.length-4, str.length);
					number = kendo.parseInt(str);
				}
				
				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");
				
				obj.set("number", str);
			});
		},
		//Obj
		loadObj 				: function(id){
			var self = this, para = [];

    		para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

	    		this.dataSource.query({
					filter: para,
					page:1,
					pageSize:100
				}).then(function(e){
					var view = self.dataSource.view();

			    	self.set("obj", view[0]);
			    	self.lineDS.filter({ field:"transaction_id", value: id });

			    	// self.journalLineDS.filter({ field:"transaction_id", value: id });

					//   	var filter = {
					//   		filters: [
					//   			{field: "transaction_id", value: id}
					//   		]
					//   	};
					//   	self.lineDS.transport.options.read.data={"filter":filter};
					// self.lineDS.read();
				});
			}
    	},
    	lineDSChanges 			: function(arg){
			var self = banhji.itemAdjustment;
			
			if(arg.field){
				if(arg.field=="item"){
					var dataItem = arg.items[0], 
						obj = self.get("obj")
						rate = banhji.source.getRate(dataItem.item.locale, new Date(obj.issued_date));

					dataItem.set("item_id", dataItem.item.id);
					dataItem.set("measurement_id", dataItem.item.measurement_id);
					dataItem.set("description", dataItem.item.name);
					dataItem.set("rate", rate);
					dataItem.set("locale", dataItem.item.locale);
					dataItem.set("measurement", dataItem.item.measurement);

					//Get cost
					self.wacDS.query({
						filter:[
							{ field:"item_id", value: dataItem.item.id },
							{ field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(obj.issued_date),"yyyy-MM-dd  HH:mm:ss") }
						]
					}).then(function(){
			        	var wac = self.wacDS.view();

			        	dataItem.set("cost", wac[0].cost * rate);
			        	dataItem.set("on_hand", wac[0].quantity);
					});
				}else if(arg.field=="quantity_adjusted"){
					$.each(banhji.itemAdjustment.lineDS.data(), function(index, value){
						var diff = 0;
		            	if(value.quantity_adjusted>value.on_hand){
		            		diff = value.on_hand - value.quantity_adjusted;
		            		value.set("movement", 1);
		            	}else{
			            	diff = value.quantity_adjusted - value.on_hand;
			            	value.set("movement", -1);
				    	}

				        value.set("quantity", Math.abs(diff));
					});
				}
			}
		},
        addEmpty 		 		: function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.journalLineDS.data([]);
			this.attachmentDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			
			this.dataSource.insert(0, {
				transaction_template_id : "",
				employee_id 			: "",
				job_id 					: "",
				account_id 	 			: "",
			   	type					: "Item_Adjustment",
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
			this.addRow();
			this.generateNumber();
			this.setRate();
		},
		addRow 					: function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id 		: 0,
				item_id 			: "",
				measurement_id 		: 0,
				description 		: "",
				on_hand 			: 0,
				quantity_adjusted 	: 0,				
				quantity 	 		: 0,
				conversion_ratio 	: 1,
				cost 				: 0,
				rate				: 1,
				locale				: banhji.locale,
				movement 			: 1,

				item 				: { id:"", name:"" },
				measurement 		: { measurement_id:"", measurement:"" }
			});
		},
		removeRow 				: function(e){
			var d = e.data;
			this.lineDS.remove(d);
		},
	    objSync 				: function(){
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
		save 					: function(){
			var self = this, obj = this.get("obj");
			obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

		    //Recurring
	    	if(this.get("saveRecurring")){
	    		this.set("saveRecurring", false);
	    		
	    		obj.set("number", "");
	    		obj.set("is_recurring", 1);
	    	}else{
	    		//Remove Empty Row
	    		var raw = this.lineDS.data();			
			    var item, i;
			    for(i=raw.length-1; i>=0; i--){
			    	item = raw[i];
			    	
			    	if (item.quantity_adjusted==="") {
				       	this.lineDS.remove(item);
				    }
			    }
	    	}

			// Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
					//Item Line
					$.each(self.lineDS.data(), function(index, value){
	      				value.set("transaction_id", data[0].id);
	      			});

	      			//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
			    		value.set("transaction_id", data[0].id);
		            });

		            //Journal
					if(data[0].is_recurring==0){
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
					if(result[0].transaction_template_id>0){
						banhji.router.navigate("/invoice_form/"+result[0].id);
					}
				}else{
					//Save New
					self.addEmpty();
				}
			});
		},
		cancel 					: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.journalLineDS.cancelChanges();
			
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.journalLineDS.data([]);

			banhji.userManagement.removeMultiTask("item_adjustment");
		},
		//Journal
	    addJournal 				: function(transaction_id){
	    	var self = this,
		    	obj = this.get("obj"),
		    	raw = "", entries = {}, gainLoss = 0;
			
			//Item Lines
			$.each(this.lineDS.data(), function(index, value){
				var accountID = value.item.inventory_account_id,
					itemRate = banhji.source.getRate(value.item.locale, new Date(obj.issued_date)),
					itemCost = (value.quantity*value.conversion_ratio) * value.movement * (kendo.parseFloat(value.cost)/itemRate);

				gainLoss += itemCost;

				if(itemCost>0){//Add + Positive Inventory On Dr
					raw = "dr"+accountID;
					
					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id 		: transaction_id,
							account_id 			: accountID,
							contact_id 			: obj.contact_id,
							description 		: obj.memo,
							reference_no 		: "",
							segments 	 		: obj.segments,
							dr 	 				: Math.abs(itemCost),
							cr 					: 0,
							rate				: itemRate,
							locale				: value.item.locale
						};
					}else{
						entries[raw].dr += Math.abs(itemCost);
					}
				}else{
					//Add - Negative Inventory On Cr
					raw = "cr"+accountID;
					
					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id 		: transaction_id,
							account_id 			: accountID,
							contact_id 			: obj.contact_id,
							description 		: obj.memo,
							reference_no 		: "",
							segments 	 		: obj.segments,
							dr 	 				: 0,
							cr 					: Math.abs(itemCost),
							rate				: itemRate,
							locale				: value.item.locale
						};
					}else{
						entries[raw].cr += Math.abs(itemCost);
					}
				}
			});//End Foreach Loop

			//Add Gain Or Loss Account
			var objAccountID = kendo.parseInt(obj.account_id),
				dr = 0, cr = 0;

			if(objAccountID>0){				
				if(gainLoss>0){
					raw = "cr"+objAccountID;
					cr = Math.abs(gainLoss);
				}else{
					raw = "dr"+objAccountID;
					dr = Math.abs(gainLoss);
				}

				if(entries[raw]===undefined){
					entries[raw] = {
						transaction_id 		: transaction_id,
						account_id 			: objAccountID,
						contact_id 			: obj.contact_id,
						description 		: obj.memo,
						reference_no 		: "",
						segments 	 		: obj.segments,
						dr 	 				: dr,
						cr 					: cr,
						rate				: obj.rate,
						locale				: obj.locale
					};
				}else{
					entries[raw].dr += dr;
					entries[raw].cr += cr;
				}
			}

			//Add to journal entry
			if(!jQuery.isEmptyObject(entries)){
				$.each(entries, function(index, value){
					self.journalLineDS.add(value);
				});
			}

			this.journalLineDS.sync();
		},
		//Recurring
		loadRecurring 		: function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");
				
				obj.set("recurring_id", id);
				obj.set("account_id", view[0].account_id);
				obj.set("employee_id", view[0].employee_id);//Employee
				obj.set("job_id", view[0].job_id);
				obj.set("segments", view[0].segments);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
			});

			this.recurringLineDS.query({
				filter:[
					{ field:"transaction_id", value:id },
					{ operator:"item" }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);

				var ids = [];
				$.each(view, function(index, value){
					ids.push(value.item_id);

					self.lineDS.add({
						transaction_id 		: 0,
						item_id 			: value.item_id,
						measurement_id 		: value.item.measurement_id,
						description 		: value.description,
						on_hand 			: 0,
						quantity_adjusted 	: 0,
						quantity 	 		: 0,
						conversion_ratio 	: 1,
						cost 				: kendo.parseFloat(value.item.cost),
						rate				: 1,
						locale				: value.item.locale,
						movement 			: 1,

						item 				: value.item
					});
				});

				self.onHandDS.query({
					filter:{ field:"item_id", operator:"where_in", value:ids }
				}).then(function(){
					$.each(self.lineDS.data(), function(index, value){
						var item = self.onHandDS.get(value.item_id);
						if(item){
							value.set("on_hand", item.on_hand);
						}
					});
				});
			});
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
		}
	});
	banhji.internalUsage = kendo.observable({
    	lang 					: langVM,
    	dataSource  			: dataStore(apiUrl + "transactions"),
    	lineDS  				: dataStore(apiUrl + "item_lines"),
    	txnDS  					: dataStore(apiUrl + "transactions"),
    	accountLineDS  			: dataStore(apiUrl + "account_lines"),
    	toItemLineDS  			: dataStore(apiUrl + "item_lines"),
    	toAccountLineDS  		: dataStore(apiUrl + "account_lines"),
    	recurringDS 			: dataStore(apiUrl + "transactions"),
		recurringLineDS 		: dataStore(apiUrl + "item_lines"),
		recurringAccountLineDS 	: dataStore(apiUrl + "account_lines"),
    	journalLineDS			: dataStore(apiUrl + "journal_lines"),
    	attachmentDS	 		: dataStore(apiUrl + "attachments"),
    	itemPriceDS  			: dataStore(apiUrl + "item_prices"),
    	wacDS					: dataStore(apiUrl + "items/weighted_average_costing"),
		txnTemplateDS 			: new kendo.data.DataSource({
		  	data: banhji.source.txnTemplateList,
		  	filter:{
			    logic: "or",
			    filters: [
			      	{ field: "type", value: "Internal_Usage" },
			      	{ field: "type", value: "Transfer_In" },
			      	{ field: "type", value: "Transfer_Out" },
			      	{ field: "type", value: "Usage_Disposal" }
			    ]
			}
		}),
		jobDS 					: new kendo.data.DataSource({
		  	data: banhji.source.jobList,
		  	sort: { field: "name", dir: "asc" }
		}),
		segmentItemDS 			: new kendo.data.DataSource({
		  	data: banhji.source.segmentItemList,
		  	sort: [
			  	{ field: "segment_id", dir: "asc" },
			  	{ field: "code", dir: "asc" }
			]
		}),
		amtDueColor 			: banhji.source.amtDueColor,
	    confirmMessage 			: banhji.source.confirmMessage,
		frequencyList 			: banhji.source.frequencyList,
		monthOptionList 		: banhji.source.monthOptionList,
		monthList 				: banhji.source.monthList,
		weekDayList 			: banhji.source.weekDayList,
		dayList 				: banhji.source.dayList,
		showMonthOption 		: false,
		showMonth 				: false,
		showWeek 				: false,
		showDay 				: false,
		obj 					: null,
		isEdit 					: false,
		saveDraft 				: false,
		saveClose 				: false,
		savePrint 				: false,
		saveRecurring 			: false,
		showConfirm 			: false,
		notDuplicateNumber 		: true,
		total 					: 0,
		totalFrom 				: 0,
		totalTo 				: 0,
		different 				: 0,
		user_id					: banhji.source.user_id,
		pageLoad 				: function(id){
			if(id){
				this.set("isEdit", true);
				this.loadObj(id);
			}else{
				if(this.get("isEdit") || this.dataSource.total()==0){
					this.addEmpty();
				}
			}
		},
		//Upload
		onSelect 				: function(e){
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
	    removeFile 				: function(e){
	    	var data = e.data;

	    	if (confirm(banhji.source.confirmMessage)) {
	    		this.attachmentDS.remove(data);
	    	}
	    },
	    uploadFile 				: function(){
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
	    //Currency Rate
		setRate 				: function(){
			var obj = this.get("obj"), 
			rate = banhji.source.getRate(obj.locale, new Date(obj.issued_date));

			obj.set("rate", rate);

			//Item Lines
			$.each(this.lineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});

			//Account Line
			$.each(this.accountLineDS.data(), function(index, value){
				value.set("rate", rate);
				value.set("locale", obj.locale);
			});

			//Item Lines To
			$.each(this.toItemLineDS.data(), function(index, value){
				var itemRate = rate / banhji.source.getRate(value.locale, new Date(obj.issued_date));
				value.set("rate", itemRate);
			});

			//Account Line To
			$.each(this.toAccountLineDS.data(), function(index, value){
				value.set("rate", rate);
				value.set("locale", obj.locale);
			});
		},
        //Segment        
        segmentChanges 			: function(e) {
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
		//From Item
		addItem 				: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			row.set("item_id", item.id);
			row.set("description", item.sale_description);
			// row.set("cost", item.cost * rate);
			row.set("rate", rate);
			row.set("locale", item.locale);
			// row.set("measurement", item.measurement);

			//Get cost
			this.wacDS.query({
				filter:[
					{ field:"item_id", value: item.id },
					{ field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(obj.issued_date),"yyyy-MM-dd  HH:mm:ss") }
				]
			}).then(function(){
	        	var wac = self.wacDS.view();
	        	row.set("cost", wac[0].cost * rate);
			});

			//Get first price
			this.itemPriceDS.query({
	        	filter:[
	        		{ field:"item_id", value:item.id },
	        		{ field:"assembly_id", value:0 }
	        	],
	        	page: 1,
	        	pageSize: 1
	        }).then(function(){
	        	var view = self.itemPriceDS.view();

	        	if(view.length>0){
	        		var measurement = { 
	        			measurement_id 	: view[0].measurement_id,
	        			price 			: kendo.parseFloat(view[0].price),
	        			conversion_ratio: view[0].conversion_ratio, 
	        			measurement 	: view[0].measurement 
	        		};
	        		row.set("measurement", measurement);
	        	}
	        });

			self.changes();
		},
		addItemCatalog 			: function(uid){
			var self = this,
				row = this.lineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item;

			this.lineDS.remove(row);

        	$.each(item.catalogs, function(index, value){
				var catalogItem = banhji.source.itemDS.get(value);

				if(catalogItem){
					var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date));

					self.lineDS.add({
						transaction_id 		: obj.id,
						tax_item_id 		: 0,
						item_id 			: catalogItem.id,
						measurement_id 		: 0,
						description 		: catalogItem.sale_description,
						quantity 	 		: 1,
						conversion_ratio 	: 1,
						cost 				: 0,
						price 				: 0,
						amount 				: 0,
						discount 			: 0,
						rate				: rate,
						locale				: catalogItem.locale,
						movement 			: -1,

						item 				: catalogItem,
						measurement 		: { measurement_id:"", measurement:"" }
					});
				}
			});
		},
		addRow 					: function(){
			var obj = this.get("obj");

			this.lineDS.add({
				transaction_id 		: obj.id,
				item_id 			: "",
				measurement_id 		: 0,
				description 		: "",
				quantity 	 		: 1,
				conversion_ratio 	: 1,
				cost 				: 0,
				price 				: 0,
				amount 				: 0,
				rate				: obj.rate,
				locale				: obj.locale,
				movement 			: -1,

				item 				: { id:"", name:"" },
				measurement 		: { measurement_id:"", measurement:"" }
			});
		},
		addExtraRow 			: function(uid){
			var row = this.lineDS.getByUid(uid),
				index = this.lineDS.indexOf(row);

			if(index==this.lineDS.total()-1){
				this.addRow();
			}
		},
		removeRow 				: function(e){
			var data = e.data;
			if(this.lineDS.total()>1){
				this.lineDS.remove(data);
		        this.changes();
	        }        
		},
		removeEmptyRow 			: function(){
			var row, i;

			//Item
			var item = this.lineDS.data();
		    for(i=item.length-1; i>=0; i--){
		    	row = item[i];

		    	if (row.item_id==0) {
			       	this.lineDS.remove(row);
			    }
		    }

		    //Account
		    var account = this.accountLineDS.data();
		    for(i=account.length-1; i>=0; i--){
		    	row = account[i];

		    	if (row.account_id==0) {
			       	this.accountLineDS.remove(row);
			    }
		    }

		    //Item To
			var itemTo = this.toItemLineDS.data();
		    for(i=itemTo.length-1; i>=0; i--){
		    	row = itemTo[i];

		    	if (row.item_id==0) {
			       	this.toItemLineDS.remove(row);
			    }
		    }

		    //Account To
		    var accountTo = this.toAccountLineDS.data();
		    for(i=accountTo.length-1; i>=0; i--){
		    	row = accountTo[i];

		    	if (row.account_id==0) {
			       	this.toAccountLineDS.remove(row);
			    }
		    }
	    },
	    itemLineDSChanges 		: function(arg){
			var self = banhji.internalUsage;

			if(arg.field){
				if(arg.field=="item"){
					var dataRow = arg.items[0],
						item = dataRow.item;

					if(item.is_catalog=="1"){
						self.addItemCatalog(dataRow.uid);
					}else{
						self.addItem(dataRow.uid);
					}

					self.addExtraRow(dataRow.uid);
				}else if(arg.field=="quantity"){
					self.changes();					
				}else if(arg.field=="measurement"){
					var dataRow = arg.items[0];
					
					dataRow.set("measurement_id", dataRow.measurement.measurement_id);
			        dataRow.set("conversion_ratio", dataRow.measurement.conversion_ratio);
				}
			}
		},
		//From Account
		addRowAccount			: function(){
			var obj = this.get("obj");
					
			this.accountLineDS.add({
				transaction_id 		: obj.id,
				account_id 			: "",
				description 		: "",
				amount 				: 0,
				rate				: obj.rate,
				locale				: obj.locale,
				movement 			: -1, //From Account

				account 			: { id:"", name:"" }
			});
		},
		addExtraRowAccount 		: function(uid){
			var row = this.accountLineDS.getByUid(uid),
				index = this.accountLineDS.indexOf(row);

			if(index==this.accountLineDS.total()-1){
				this.addRowAccount();
			}
		},
		removeRowAccount		: function(e){
			var d = e.data;
			
			this.accountLineDS.remove(d);
	        this.changes();
		},
		accountLineDSChanges 	: function(arg){
			var self = banhji.internalUsage;

			if(arg.field){
				if(arg.field=="account"){
					var dataRow = arg.items[0],
						account = dataRow.account;

					dataRow.set("account_id", account.id);

					self.addExtraRowAccount(dataRow.uid);
				}else if(arg.field=="amount"){
					self.changes();
				}
			}
		},
		//To Item
		addRowTo 				: function(){
			var obj = this.get("obj");
			
			this.toItemLineDS.add({
				transaction_id 		: obj.id,
				item_id 			: "",
				measurement_id 		: 0,
				description 		: "",
				quantity 	 		: 1,
				conversion_ratio 	: 1,
				cost 				: 0,
				price 				: 0,
				amount 				: 0,
				rate				: obj.rate,
				locale				: obj.locale,
				movement 			: 1,

				item 				: { id:"", name:"" },
				measurement 		: { measurement_id:"", measurement:"" }
			});

			this.changes();
		},
		addExtraRowTo 			: function(uid){
			var row = this.toItemLineDS.getByUid(uid),
				index = this.toItemLineDS.indexOf(row);

			if(index==this.toItemLineDS.total()-1){
				this.addRowTo();
			}
		},
		removeRowTo 			: function(e){
			var data = e.data;

			this.toItemLineDS.remove(data);
	        this.changes();
		},
		addItemTo 				: function(uid){
			var self = this,
				row = this.toItemLineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item,
				rate = obj.rate / banhji.source.getRate(item.locale, new Date(obj.issued_date));

			row.set("item_id", item.id);
			row.set("description", item.sale_description);
			// row.set("cost", item.cost * rate);
			row.set("rate", rate);
			row.set("locale", item.locale);
			// row.set("measurement", item.measurement);

			//Get cost
			this.wacDS.query({
				filter:[
					{ field:"item_id", value: item.id },
					{ field:"issued_date <=", operator:"where_related_transaction", value: kendo.toString(new Date(obj.issued_date),"yyyy-MM-dd  HH:mm:ss") }
				]
			}).then(function(){
	        	var wac = self.wacDS.view();
	        	row.set("cost", wac[0].cost * rate);
			});

			//Get first price
			this.itemPriceDS.query({
	        	filter:[
	        		{ field:"item_id", value:item.id },
	        		{ field:"assembly_id", value:0 }
	        	],
	        	page: 1,
	        	pageSize: 1
	        }).then(function(){
	        	var view = self.itemPriceDS.view();

	        	if(view.length>0){
	        		var measurement = { 
	        			measurement_id 	: view[0].measurement_id,
	        			price 			: view[0].price * rate,
	        			conversion_ratio: view[0].conversion_ratio, 
	        			measurement 	: view[0].measurement 
	        		};
	        		row.set("measurement", measurement);
	        	}
	        });

			self.changes();
		},
		addItemCatalogTo 		: function(uid){
			var self = this,
				row = this.toItemLineDS.getByUid(uid),
				obj = this.get("obj"),
				item = row.item;

			this.toItemLineDS.remove(row);

        	$.each(item.catalogs, function(index, value){
				var catalogItem = banhji.source.itemDS.get(value);

				if(catalogItem){
					var rate = obj.rate / banhji.source.getRate(catalogItem.locale, new Date(obj.issued_date));

					self.lineDS.add({
						transaction_id 		: obj.id,
						tax_item_id 		: 0,
						item_id 			: catalogItem.id,
						measurement_id 		: 0,
						description 		: catalogItem.sale_description,
						quantity 	 		: 1,
						conversion_ratio 	: 1,
						cost 				: 0,
						price 				: 0,
						amount 				: 0,
						discount 			: 0,
						rate				: rate,
						locale				: catalogItem.locale,
						movement 			: 1,

						item 				: catalogItem,
						measurement 		: catalogItem.measurement
					});
				}
			});
		},
		toItemLineDSChanges 	: function(arg){
			var self = banhji.internalUsage;

			if(arg.field){
				if(arg.field=="item"){
					var dataRow = arg.items[0],
						item = dataRow.item;

					if(item.is_catalog=="1"){
						self.addItemCatalogTo(dataRow.uid);
					}else{
						self.addItemTo(dataRow.uid);
					}

					self.addExtraRowTo(dataRow.uid);
				}else if(arg.field=="quantity" || arg.field=="cost"){
					self.changes();					
				}else if(arg.field=="measurement"){
					var dataRow = arg.items[0];
					
					dataRow.set("measurement_id", dataRow.measurement.measurement_id);
			        dataRow.set("conversion_ratio", dataRow.measurement.conversion_ratio);
				}
			}
		},
		//To Account
		addRowAccountTo 			: function(){
			var obj = this.get("obj");
			this.toAccountLineDS.add({
				transaction_id 		: obj.id,
				account_id 			: "",
				description 		: "",
				amount 				: 0,
				rate				: obj.rate,
				locale				: obj.locale,
				movement 			: 1, //To Account

				account 			: { id:"", name:"" }
			});

			this.changes();
		},
		addExtraRowAccountTo 		: function(uid){
			var row = this.toAccountLineDS.getByUid(uid),
				index = this.toAccountLineDS.indexOf(row);

			if(index==this.toAccountLineDS.total()-1){
				this.addRowAccountTo();
			}
		},
		removeRowAccountTo 		: function(e){
			var data = e.data;

			this.toAccountLineDS.remove(data);
	        this.changes();
		},
		toAccountLineDSChanges 	: function(arg){
			var self = banhji.internalUsage;

			if(arg.field){
				if(arg.field=="account"){
					var dataRow = arg.items[0],
						account = dataRow.account;

					dataRow.set("account_id", account.id);

					self.addExtraRowAccountTo(dataRow.uid);
				}else if(arg.field=="amount"){
					self.changes();
				}
			}
		},
		//Number      	
		checkExistingNumber 	: function(){
			var self = this, para = [], 
			obj = this.get("obj");

			if(obj.number!==""){

				if(obj.isNew()==false){
					para.push({ field:"id", operator:"where_not_in", value: [obj.id] });
				}

				para.push({ field:"number", value: obj.number });
				para.push({ field:"type", value: obj.type });

				this.txnDS.query({
					filter: para,
					page: 1,
					pageSize: 1
				}).then(function(e){
					var view = self.txnDS.view();
					
					if(view.length>0){
				 		self.set("notDuplicateNumber", false);
					}else{
						self.set("notDuplicateNumber", true);
					}
				});
			}
		},
		generateNumber 			: function(){
			var self = this, obj = this.get("obj"),
			issueDate = new Date(obj.issued_date),
			startDate = new Date(obj.issued_date),
			endDate = new Date(obj.issued_date);

			this.set("notDuplicateNumber", true);

			startDate.setDate(1);
			startDate.setMonth(0);//Set to January
			endDate.setDate(31);
			endDate.setMonth(11);//Set to November

			this.txnDS.query({
				filter:[
					{ field:"type", value:obj.type },
					{ field:"issued_date >=", value:kendo.toString(startDate, "yyyy-MM-dd") },
					{ field:"issued_date <=", value:kendo.toString(endDate, "yyyy-MM-dd") }
				],
				sort: { field:"number", dir:"desc" },
				page:1,
				pageSize:1
			}).then(function(){
				var view = self.txnDS.view(),
				number = 0, str = "";

				if(view.length>0){
					str = view[0].number;
					str = str.substring(str.length-4, str.length);
					number = kendo.parseInt(str);
				}
				
				number++;
				str = banhji.source.getPrefixAbbr(obj.type) + kendo.toString(issueDate, "yy") + kendo.toString(issueDate, "MM") + kendo.toString(number, "00000");

				obj.set("number", str);
			});
		},
		//Obj
		loadObj 				: function(id){
			var self = this, para = [];

    		para.push({ field:"id", value: id });

			if(this.get("recurring")=="use"){
				this.set("recurring","");
				this.addEmpty();
				this.loadRecurring(id);
			}else{
				if(this.get("recurring")=="edit"){
					this.set("recurring","");
					para.push({ field:"is_recurring", value: 1 });
				}

	    		this.dataSource.query({
					filter: para,
					page:1,
					pageSize:100
				}).then(function(e){
					var view = self.dataSource.view();

			    	self.set("obj", view[0]);
			    	self.set("totalFrom", kendo.toString(view[0].amount, "c2", view[0].locale));
			    	self.set("totalTo", kendo.toString(view[0].amount, "c2", view[0].locale));
			    	self.set("different", 0);

			    	self.journalLineDS.filter({ field:"transaction_id", value: id });

			    	//From
			    	self.lineDS.query({
						filter: [
							{ field: "transaction_id", value: id },
							{ field: "movement", value: -1 }
						],
					});
			    	self.accountLineDS.filter([
			    		{ field:"transaction_id", value: id },
			    		{ field:"movement", value: -1 }
			    	]);

			    	//To
			    	self.toItemLineDS.query({
			    		filter:[
				    		{ field:"transaction_id", value: id },
				    		{ field:"movement", value: 1 }
				    	]
			    	});
			    	self.toAccountLineDS.filter([
			    		{ field:"transaction_id", value: id },
			    		{ field:"movement", value: 1 }
			    	]);
				});
			}
    	},
		changes 				: function() {
			var obj = this.get("obj"), sumFrom = 0, sumTo = 0;

			//From
			$.each(this.lineDS.data(), function(index, value){
				var fromItemAmount = value.quantity * value.cost;
				value.set("amount", fromItemAmount);
				sumFrom += fromItemAmount;
			});
			$.each(this.accountLineDS.data(), function(index, value){
				sumFrom += value.amount;
			});

			//To
			$.each(this.toItemLineDS.data(), function(index, value){
				var toItemAmount = value.quantity * value.cost;
				value.set("amount", toItemAmount);
				sumTo += toItemAmount;
			});
			$.each(this.toAccountLineDS.data(), function(index, value){
				sumTo += value.amount;
			});

			obj.set("amount", sumFrom);

			this.set("total", kendo.toString(sumFrom, "c2", obj.locale));
			this.set("totalFrom", sumFrom);
			this.set("totalTo", sumTo);
			this.set("different", Math.abs(sumFrom - sumTo));
        },
		addEmpty 		 		: function(){
			this.dataSource.data([]);
			this.lineDS.data([]);
			this.accountLineDS.data([]);
			this.toItemLineDS.data([]);
			this.toAccountLineDS.data([]);
			this.journalLineDS.data([]);
			this.attachmentDS.data([]);

			this.set("isEdit", false);
			this.set("obj", null);
			this.set("total", 0);
			this.set("totalFrom", 0);
			this.set("totalTo", 0);
			this.set("different", 0);

			this.dataSource.insert(0, {
				transaction_template_id : 0,
				recurring_id 		: "",
				item_id 			: "",
				job_id 				: 0,
				user_id 			: this.get("user_id"),
			   	type				: "Internal_Usage",//Required
			   	number 				: "",
			   	amount				: 0,
			   	rate				: 1,
			   	locale 				: banhji.locale,
			   	issued_date 		: new Date(),
			   	bill_to 			: "",
			   	ship_to 			: "",
			   	memo 				: "",
			   	memo2 				: "",
			   	status 				: 0,
			   	segments 			: [],
			   	is_journal 			: 1,
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

			var obj = this.dataSource.at(0);
			this.set("obj", obj);
			this.setRate();
			this.generateNumber();

			//Default rows
			for (var i = 0; i < banhji.source.defaultLines; i++) {
				this.addRow();
				this.addRowAccount();
				this.addRowTo();
				this.addRowAccountTo();
			}
		},	
	    objSync 				: function(){
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
		save 					: function(){
			var self = this, obj = this.get("obj");
			obj.set("issued_date", kendo.toString(new Date(obj.issued_date), "s"));

			this.removeEmptyRow();

	        //Save Draft
	        if(this.get("saveDraft")){
	        	obj.set("status", 4); //In progress
	        	obj.set("progress", "Draft");
	        	obj.set("is_journal", 0);//No Journal
	        }

			//Recurring
	    	if(this.get("saveRecurring")){
	    		this.set("saveRecurring", false);
	    		
	    		obj.set("number", "");
	    		obj.set("is_recurring", 1);
	    	}

			//Edit Mode
	    	if(obj.isNew()==false){
	    		//Use draft
	    		if(obj.status==4){
	    			obj.set("status", 0);//Open
	    			obj.set("progress", "");
	    			obj.set("is_journal", 1);//Add Journal
	    		}
	    	}

			//Save Obj
			this.objSync()
			.then(function(data){ //Success
				if(self.get("isEdit")==false){
	      			//Item Line
					$.each(self.lineDS.data(), function(index, value){
						value.set("transaction_id", data[0].id);
	      			});

	      			//Account Line
					$.each(self.accountLineDS.data(), function(index, value){
	      				value.set("transaction_id", data[0].id);
	      			});

	      			//To Item Line
					$.each(self.toItemLineDS.data(), function(index, value){
	      				value.set("transaction_id", data[0].id);
	      			});

	      			//To Account Line
					$.each(self.toAccountLineDS.data(), function(index, value){
	      				value.set("transaction_id", data[0].id);
	      			});

	      			//Attachment
					$.each(self.attachmentDS.data(), function(index, value){
			    		value.set("transaction_id", data[0].id);
		            });
				}

				//Journal
				if(data[0].is_recurring==0 && data[0].is_journal==1){
		            self.addJournal(data[0].id);
	        	}

      			self.lineDS.sync();
      			self.accountLineDS.sync();
      			self.toItemLineDS.sync();
      			self.toAccountLineDS.sync();

      			self.uploadFile();

				return data;
			}, function(reason) { //Error
				$("#ntf1").data("kendoNotification").error(reason);
			}).then(function(result){
				$("#ntf1").data("kendoNotification").success(banhji.source.successMessage);

				if(self.get("saveDraft") || self.get("saveClose")){
					//Save Draft or Save Close
					self.set("saveDraft", false);
					self.set("saveClose", false);
					self.cancel();
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
		clear 					: function(){
			this.dataSource.cancelChanges();
			this.lineDS.cancelChanges();
			this.accountLineDS.cancelChanges();
			this.toItemLineDS.cancelChanges();
			this.toAccountLineDS.cancelChanges();
			this.journalLineDS.cancelChanges();
			this.attachmentDS.cancelChanges();

			this.dataSource.data([]);
			this.lineDS.data([]);
			this.accountLineDS.data([]);
			this.toItemLineDS.data([]);
			this.toAccountLineDS.data([]);
			this.journalLineDS.data([]);
			this.attachmentDS.data([]);

			banhji.userManagement.removeMultiTask("internal_usage");
		},
		cancel 					: function(){
			this.clear();
			window.history.back();
		},
		validating 				: function(){
			var result = true, obj = this.get("obj");

			if(this.get("totalFrom")!==this.get("totalTo")){
				$("#ntf1").data("kendoNotification").error("Total From must equal to Total To");

				result = false;
			}

			return result;
		},
		//Journal
	    addJournal 				: function(transaction_id){
	    	var self = this,
		    	obj = this.get("obj"),
		    	raw = "",
		    	entries = {};

		    //Edit Mode
		    if(obj.isNew()==false){
		    	//Delete previous journal
			    $.each(this.journalLineDS.data(), function(index, value){
					value.set("deleted", 1);
				});
			}

		    //To on Dr
			$.each(this.toItemLineDS.data(), function(index, value){
				var item = value.item,
					itemRate = banhji.source.getRate(item.locale, new Date(obj.issued_date));

				//Inventory on Dr
				var inventoryID = kendo.parseInt(item.inventory_account_id);
				if(inventoryID>0){
					raw = "dr"+inventoryID;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id 		: transaction_id,
							account_id 			: inventoryID,
							contact_id 			: 0,
							description 		: value.description,
							reference_no 		: "",
							segments 	 		: obj.segments,
							dr 	 				: value.amount,
							cr 					: 0,
							rate				: itemRate,
							locale				: item.locale
						};
					}else{
						entries[raw].dr += value.amount;
					}
				}
			});
			$.each(this.toAccountLineDS.data(), function(index, value){
				raw = "dr"+value.account_id;

				//Account on Dr
				if(entries[raw]===undefined){
					entries[raw] = {
						transaction_id 		: transaction_id,
						account_id 			: value.account_id,
						contact_id 			: 0,
						description 		: value.description,
						reference_no 		: "",
						segments 	 		: value.segments,
						dr 	 				: value.amount,
						cr 					: 0,
						rate				: obj.rate,
						locale				: obj.locale
					};
				}else{
					entries[raw].dr += value.amount;
				}
			});


	    	//From on Cr
			$.each(this.lineDS.data(), function(index, value){
				var item = value.item,
					itemRate = banhji.source.getRate(item.locale, new Date(obj.issued_date));

				//Inventory on Cr
				var inventoryID = kendo.parseInt(item.inventory_account_id);
				if(inventoryID>0){
					raw = "cr"+inventoryID;

					if(entries[raw]===undefined){
						entries[raw] = {
							transaction_id 		: transaction_id,
							account_id 			: inventoryID,
							contact_id 			: 0,
							description 		: value.description,
							reference_no 		: "",
							segments 	 		: obj.segments,
							dr 	 				: 0,
							cr 					: value.amount,
							rate				: itemRate,
							locale				: item.locale
						};
					}else{
						entries[raw].cr += value.amount;
					}
				}
			});
			$.each(this.accountLineDS.data(), function(index, value){
				raw = "cr"+value.account_id;

				//Account on Cr
				if(entries[raw]===undefined){
					entries[raw] = {
						transaction_id 		: transaction_id,
						account_id 			: value.account_id,
						contact_id 			: 0,
						description 		: value.description,
						reference_no 		: "",
						segments 	 		: value.segments,
						dr 	 				: 0,
						cr 					: value.amount,
						rate				: obj.rate,
						locale				: obj.locale
					};
				}else{
					entries[raw].cr += value.amount;
				}
			});

			//Add to journal entry
			if(!jQuery.isEmptyObject(entries)){
				$.each(entries, function(index, value){
					self.journalLineDS.add(value);
				});
			}

			this.journalLineDS.sync();
		},
		//Recurring
		loadRecurring 			: function(id){
			var self = this;

			this.recurringDS.query({
				filter:[
					{ field:"id", value:id },
					{ field:"is_recurring", value:1 }
				],
				page: 1,
				pageSize: 100
			}).then(function(){
				var view = self.recurringDS.view(),
				obj = self.get("obj");
				
				obj.set("recurring_id", id);
				obj.set("employee_id", view[0].employee_id);//Employee
				obj.set("job_id", view[0].job_id);
				obj.set("segments", view[0].segments);
				obj.set("memo", view[0].memo);
				obj.set("memo2", view[0].memo2);
			});

			//Item Line
			this.recurringLineDS.query({
				filter: { field:"transaction_id", value:id }
			}).then(function(){
				var view = self.recurringLineDS.view();
				self.lineDS.data([]);
				self.toItemLineDS.data([]);

				$.each(view, function(index, value){
					if(value.movement==-1){//FROM
						self.lineDS.add({
							transaction_id 		: 0,
							tax_item_id 		: value.tax_item_id,
							item_id 			: value.item_id,
							measurement_id 		: value.measurement_id,
							description 		: value.description,
							quantity 	 		: value.quantity,
							cost 				: value.cost,
							price 				: value.price,
							amount 				: value.amount,
							rate				: value.rate,
							locale				: value.locale,
							movement 			: value.movement,

							item 				: value.item,
							measurement 		: value.measurement
						});
					}else{//TO
						self.toItemLineDS.add({
							transaction_id 		: 0,
							tax_item_id 		: value.tax_item_id,
							item_id 			: value.item_id,
							measurement_id 		: value.measurement_id,
							description 		: value.description,
							quantity 	 		: value.quantity,
							cost 				: value.cost,
							price 				: value.price,
							amount 				: value.amount,
							rate				: value.rate,
							locale				: value.locale,
							movement 			: value.movement,

							item 				: value.item,
							measurement 		: value.measurement
						});
					}
				});

				self.changes();
			});

			//Account Line
			this.recurringAccountLineDS.query({
				filter: { field:"transaction_id", value:id }
			}).then(function(){
				var view = self.recurringAccountLineDS.view();
				self.accountLineDS.data([]);
				self.toAccountLineDS.data([]);

				$.each(view, function(index, value){
					if(value.movement==-1){//FROM
						self.accountLineDS.add({
							transaction_id 		: 0,
							account_id 			: value.account_id,
							description 		: value.description,
							amount 	 			: value.amount,
							rate				: value.rate,
							locale				: value.locale,
							movement 			: value.movement,

							account 			: value.account
						});
					}else{//TO
						self.toAccountLineDS.add({
							transaction_id 		: 0,
							account_id 			: value.account_id,
							description 		: value.description,
							amount 	 			: value.amount,
							rate				: value.rate,
							locale				: value.locale,
							movement 			: value.movement,

							account 			: value.account
						});
					}
				});

				self.changes();
			});
		},
		frequencyChanges 		: function(){
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
		monthOptionChanges 		: function(){
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
		validateRecurring  		: function(){
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

		itemDashBoard: new kendo.Layout("#itemDashBoard", {model: banhji.itemDashBoard}),
		itemCenter: new kendo.Layout("#itemCenter", {model: banhji.itemCenter}),
		
		grn: new kendo.Layout("#grn", {model: banhji.grn}),
		gdn: new kendo.Layout("#gdn", {model: banhji.gdn}),
		itemAdjustment: new kendo.Layout("#itemAdjustment", {model: banhji.itemAdjustment}),
		internalUsage: new kendo.Layout("#internalUsage", {model: banhji.internalUsage}),
		
		
		//Menu
		inventoryMenu: new kendo.View("#inventoryMenu", {model: langVM})
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

	/* Index Page */
	banhji.router.route('/', function(){
		var blank = new kendo.View('#blank-tmpl');
		var admin = JSON.parse(localStorage.getItem('userData/user')) != null ? JSON.parse(localStorage.getItem('userData/user')).role : 0;
        if(admin != 1) {
        	window.location.replace("<?php echo base_url(); ?>admin");
        } else {
        	banhji.view.layout.showIn('#content', banhji.view.index);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			$('#main-top-navigation').append('<li><a href="\#">Home</a></li>');
			$('#current-section').text("");
			$("#secondary-menu").html("");
			banhji.index.getLogo();
			banhji.index.pageLoad();
			banhji.pageLoaded["index"] = true;
        }
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

	
	/*************************************************
	*   ROUTERS  						 		 *
	*************************************************/
	banhji.router.route("/inventories", function(){
		banhji.accessMod.query({
			filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		}).then(function(e){
			var allowed = false;
			if(banhji.accessMod.data().length > 0) {
				for(var i = 0; i < banhji.accessMod.data().length; i++) {
					if("products/services" == banhji.accessMod.data()[i].name.toLowerCase()) {
						allowed = true;
						break;
					}
				}
			} 
			if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.itemDashBoard);
				banhji.view.layout.showIn('#menu', banhji.view.menu);
				banhji.view.menu.showIn('#secondary-menu', banhji.view.inventoryMenu);
				
				var vm = banhji.itemDashBoard;
				banhji.userManagement.addMultiTask("Products/Services Dashboard","inventories",null);

				if(banhji.pageLoaded["inventories"]==undefined){
					banhji.pageLoaded["inventories"] = true;

					vm.setObj();
				}
				vm.pageLoad();
			} else {
				window.location.replace(baseUrl + "admin");
			}
		});
	});	
	banhji.router.route("/item_center(/:id)", function(id){
		banhji.accessMod.query({
			filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		}).then(function(e){
			var allowed = false;
			if(banhji.accessMod.data().length > 0) {
				for(var i = 0; i < banhji.accessMod.data().length; i++) {
					if("products/services" == banhji.accessMod.data()[i].name.toLowerCase()) {
						allowed = true;
						break;
					}
				}
			} 
			if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.itemCenter);
				banhji.view.layout.showIn('#menu', banhji.view.menu);
				//banhji.view.menu.showIn('#secondary-menu', banhji.view.inventoryMenu);
				
				var vm = banhji.itemCenter;

				banhji.userManagement.addMultiTask("Inventory Center","item_center",null);

				if(banhji.pageLoaded["item_center"]==undefined){
					banhji.pageLoaded["item_center"] = true;
				}

				vm.pageLoad(id);
			} else {
				window.location.replace(baseUrl + "admin");
			}
		});
	});
	// FUNCTIONS
	banhji.router.route("/gdn(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.gdn);
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.gdn;
			banhji.userManagement.addMultiTask("GDN","gdn",vm);

			if(banhji.pageLoaded["gdn"]==undefined){
				banhji.pageLoaded["gdn"] = true;

				var validator = $("#example").kendoValidator({
			        	rules: {
					        customRule1: function(input) {
					          	if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
					          		vm.set("recurring_validate", false);
					            	return $.trim(input.val()) !== "";
					          	}
					          	return true;
					        },
					        customRule2: function(input){
					          	if (input.is("[name=txtNumber]")) {	
						            return vm.get("notDuplicateNumber");
						        }
						        return true;
					        }
					    },
					    messages: {
					        customRule1: banhji.source.requiredMessage,
					        customRule2: banhji.source.duplicateNumber
					    }
			        }).data("kendoValidator");

		        $("#saveNew").click(function(e){
					e.preventDefault();

					if(validator.validate() && vm.validating()){
		            	vm.save();
			        }else{
			        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
			        }
				});

				$("#saveClose").click(function(e){
					e.preventDefault();

					if(validator.validate() && vm.validating()){
						vm.set("saveClose", true);
		            	vm.save();
			        }else{
			        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
			        }
				});

				$("#savePrint").click(function(e){
					e.preventDefault();
					
					if(validator.validate() && vm.validating()){
						vm.set("savePrint", true);
		            	vm.save();
			        }else{
			        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
			        }
				});

				$("#saveRecurring").click(function(e){
					e.preventDefault();

					vm.set("recurring_validate", true);

					if(validator.validate() && vm.validating()){
		            	vm.set("saveRecurring", true);
		            	vm.save();
			        }else{
			        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
			        }
				});
			}

			vm.pageLoad(id);
		}		
	});
	banhji.router.route("/grn(/:id)", function(id){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.grn);
			kendo.fx($("#slide-form")).slideIn("down").play();

			var vm = banhji.grn;
			banhji.userManagement.addMultiTask("Goods Receive Note","grn",vm);

			if(banhji.pageLoaded["grn"]==undefined){
				banhji.pageLoaded["grn"] = true;

				vm.lineDS.bind("change", vm.lineDSChanges);

				var validator = $("#example").kendoValidator({
		        	rules: {
				        customRule1: function(input) {
				          	if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
				          		vm.set("recurring_validate", false);
				            	return $.trim(input.val()) !== "";
				          	}
				          	return true;
				        },
				        customRule2: function(input){
				          	if (input.is("[name=txtNumber]")) {	
					            return vm.get("notDuplicateNumber");
					        }
					        return true;
				        }
				    },
				    messages: {
				        customRule1: banhji.source.requiredMessage,
				        customRule2: banhji.source.duplicateNumber
				    }
		        }).data("kendoValidator");

				$("#saveDraft1").click(function(e){
					e.preventDefault();

					if(validator.validate() && vm.validating()){
						vm.set("saveDraft", true);
		            	vm.save();
			        }else{
			        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
			        }
				});

		        $("#saveNew").click(function(e){
					e.preventDefault();

					if(validator.validate() && vm.validating()){
		            	vm.save();
			        }else{
			        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
			        }
				});

				$("#saveClose").click(function(e){
					e.preventDefault();

					if(validator.validate() && vm.validating()){
						vm.set("saveClose", true);
		            	vm.save();
			        }else{
			        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
			        }
				});

				$("#savePrint").click(function(e){
					e.preventDefault();
					
					if(validator.validate() && vm.validating()){
						vm.set("savePrint", true);
		            	vm.save();
			        }else{
			        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
			        }
				});

				$("#saveRecurring").click(function(e){
					e.preventDefault();

					vm.set("recurring_validate", true);

					if(validator.validate() && vm.validating()){
		            	vm.set("saveRecurring", true);
		            	vm.save();
			        }else{
			        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
			        }
				});
			}

			vm.pageLoad(id);
		}
	});
	banhji.router.route("/item_adjustment(/:id)", function(id){
		banhji.accessMod.query({
			filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		}).then(function(e){
			var allowed = false;
			if(banhji.accessMod.data().length > 0) {
				for(var i = 0; i < banhji.accessMod.data().length; i++) {
					if("products/services" == banhji.accessMod.data()[i].name.toLowerCase()) {
						allowed = true;
						break;
					}
				}
			} 
			if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.itemAdjustment);
				banhji.view.layout.showIn('#menu', banhji.view.menu);
				banhji.view.menu.showIn('#secondary-menu', banhji.view.inventoryMenu);

				var vm = banhji.itemAdjustment;
				banhji.userManagement.addMultiTask("Inventory Adjustment","item_adjustment",vm);

				if(banhji.pageLoaded["item_adjustment"]==undefined){
					banhji.pageLoaded["item_adjustment"] = true;

					vm.lineDS.bind("change", vm.lineDSChanges);
					
					var validator = $("#example").kendoValidator({
			        	rules: {
					        customRule1: function(input) {
					          	if (input.is("[name=txtRecurringName]") && vm.recurring_validate) {
					          		vm.set("recurring_validate", false);
					            	return $.trim(input.val()) !== "";
					          	}
					          	return true;
					        }
					    },
					    messages: {
					        customRule1: banhji.source.requiredMessage
					    }
			        }).data("kendoValidator");

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

						vm.set("recurring_validate", true);

						if(validator.validate()){
			            	vm.set("saveRecurring", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});
				}

				vm.pageLoad(id);
			} else {
				window.location.replace(baseUrl + "admin");
			}
		});
	});
	banhji.router.route("/internal_usage(/:id)", function(id){
		banhji.accessMod.query({
			filter: {field: 'username', value: JSON.parse(localStorage.getItem('userData/user')).username}
		}).then(function(e){
			var allowed = false;
			if(banhji.accessMod.data().length > 0) {
				for(var i = 0; i < banhji.accessMod.data().length; i++) {
					if("products/services" == banhji.accessMod.data()[i].name.toLowerCase()) {
						allowed = true;
						break;
					}
				}
			} 
			if(allowed) {
				banhji.view.layout.showIn("#content", banhji.view.internalUsage);
				banhji.view.layout.showIn('#menu', banhji.view.menu);
				banhji.view.menu.showIn('#secondary-menu', banhji.view.inventoryMenu);

				var vm = banhji.internalUsage;

				banhji.userManagement.addMultiTask("Internal Usage","internal_usage",null);
				
				if(banhji.pageLoaded["internal_usage"]==undefined){
					banhji.pageLoaded["internal_usage"] = true;

					vm.lineDS.bind("change", vm.itemLineDSChanges);
					vm.accountLineDS.bind("change", vm.accountLineDSChanges);
					vm.toItemLineDS.bind("change", vm.toItemLineDSChanges);
					vm.toAccountLineDS.bind("change", vm.toAccountLineDSChanges);
					
					var validator = $("#example").kendoValidator({
			        	rules: {
					        customRule1: function(input){
					          	if (input.is("[name=txtNumber]")) {	
						            return vm.get("notDuplicateNumber");
						        }
						        return true;
					        }
					    },
					    messages: {
					        customRule1: banhji.source.duplicateNumber
					    }
			        }).data("kendoValidator");

					$("#saveDraft1").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveDraft", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

			        $("#saveNew").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveClose").click(function(e){
						e.preventDefault();

						if(validator.validate() && vm.validating()){
							vm.set("saveClose", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#savePrint").click(function(e){
						e.preventDefault();
						
						if(validator.validate() && vm.validating()){
							vm.set("savePrint", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});

					$("#saveRecurring").click(function(e){
						e.preventDefault();

						vm.set("recurring_validate", true);

						if(validator.validate() && vm.validating()){
			            	vm.set("saveRecurring", true);
			            	vm.save();
				        }else{
				        	$("#ntf1").data("kendoNotification").error(banhji.source.errorMessage);
				        }
					});
				}

				vm.pageLoad(id);
			} else {
				window.location.replace(baseUrl + "admin");
			}
		});	
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