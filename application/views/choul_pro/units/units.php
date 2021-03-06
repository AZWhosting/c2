<link rel="stylesheet" href="<?php echo base_url()?>assets/micro/tab-page.css">
<div id="wrapperApplication" class="wrapper"></div>
<script type="text/x-kendo-template" id="layout">
	<!-- <div id="menu" class="menu"></div> -->
	<div id="content"></div>
</script>
<script type="text/x-kendo-template" id="blank-tmpl">
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
*	Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15 sale">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" >
                        	<div id="indexMenu">
                        		<div class="hidden-sm-down" style="position: absolute; right: 20px; top: 20px;">
                        			<div class="btn-group float-right">
						                
						            </div>
                        		</div>
                        	</div>
			                <div class="tab-content">	
				                <div class="tab-pane active" role="tabpanel">
				                	<div id="indexContent"></div>
				                </div>
				            </div>
			            </div>
			        </div>
	            </div>
	        </div>
        </div>
    </div>
</script>


<!-- Menu -->
<script id="tapMenu" type="text/x-kendo-template">
	<ul class="nav nav-tabs customtab" role="tablist" >
		<li class="nav-item"> 
			<a class="nav-link active" data-toggle="tab" href="#/" data-bind="click: goCheckOut"><span class="hidden-sm-up"><i class="ti-layout-accordion-list"></i></span> 
				<span class="hidden-xs-down" data-bind="text: lang.lang.check_out"></span>
			</a> 
		</li>
		<li class="nav-item"> 
			<a class="nav-link" data-toggle="tab" href="#/reports" data-bind="click: goReports"><span class="hidden-sm-up"><i class="ti-layout-grid2-thumb"></i></span> 
				<span class="hidden-xs-down" data-bind="text: lang.lang.reports"></span>
			</a> 
		</li>
	    <li class="nav-item hidden-sm-down"> 
	    	<a class="nav-link" data-toggle="tab" href="#/unitCenter" data-bind="click: goMenuUnitCenter"><span class="hidden-sm-up"><i class="ti-user"></i></span> 
	    		<span style="text-transform: capitalize" class="hidden-xs-down" data-bind="text: lang.lang.center"></span>
	    	</a> 
	    </li>
    </ul>
</script>
<!-- End -->

<!-- Menu -->
<script id="reports" type="text/x-kendo-template">
	<div class="row home" id="reports">
		<!-- 111 -->
		<div class="col-12 col-md-4">
			<div class="saleOverview" data-bind="click: loadSale" style="margin-bottom: 15px;">
				<h2 ><span data-bind="text: lang.lang.sale"></span> (<span data-bind="text: fiscalDate"></span>)</h2>
				<p data-format="n" data-bind="text: obj.sale"></p>
				<div class="row">
					<div class="col">
						<span data-bind="text: obj.customer_count"></span>
						<span data-bind="text: lang.lang.customer"></span>
					</div>
					<div class="col">
						<span data-bind="text: obj.product_count"></span>
						<span data-bind="text: lang.lang.product"></span>
					</div>
				</div>
			</div>

			<!-- Report -->
            <!-- <div class="report ">
				<div class="col-md-12">
					<h3 class="marginBottom"><a href="#/sale_detail_by_customer" data-bind="text: lang.lang.sale_detail_by_customer" ></a></h3>
					
				</div>
				<div class="col-md-12">
					<h3 style="border-bottom: none; padding-bottom: 0;"><a href="#/sale_detail_by_product" data-bind="text: lang.lang.sale_detail_by_product_services" ></a></h3>
					
				</div>
			</div> -->

			<!-- Top 4 -->
			<!-- <div class="top5 home-footer">
                <table class="table color-table dark-table">
                    <thead>
                        <tr>
                            <th colspan="2" class="center">
                                <span data-bind="text: lang.lang.top_5_customers"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody data-role="listview"
                         data-auto-bind="false"
                         data-template="top-contact-template"
                         data-bind="source: obj.top_customer"></tbody>
                </table>
            </div> -->					                        
		</div>


		<!-- 222 -->
		<div class="col-12 col-md-4">
			<div class="saleOverview" data-bind="click: loadReceiveable" style="margin-bottom: 15px;">
				<h2 data-bind="text: lang.lang.receivable"></h2>
				<p data-format="n0" data-bind="text: obj.receivable"></p>
				<div class="row">
					<div class="col">
						<span data-format="n0" data-bind="text: obj.receivable_count"></span>
						<span data-bind="text: lang.lang.open"></span>
					</div>
					<div class="col">
						<span data-bind="text: obj.receivable_overdue_count"></span>
						<span data-bind="text: lang.lang.overdue"></span>
					</div>
				</div>
			</div>

			<!-- Report -->
			<!-- <div class="report" >
				<div class="col-md-12">
					<h3 class="marginBottom"><a href="#/customer_balance_detail" data-bind="text: lang.lang.customer_balance_detail" ></a></h3>
					
				</div>
				<div class="col-md-12">
					<h3 style="border-bottom: none; padding-bottom: 0;"><a href="#/receivable_aging_summary" data-bind="text: lang.lang.receivable_aging_summary"></a></h3>
						
				</div>
			</div> -->

			<!-- Top 4 -->
			<!-- <div class="top5 home-footer">
                <table class="table color-table dark-table">
                    <thead>
                        <tr>
                            <th class="center" colspan="2">
                                <span data-bind="text: lang.lang.top_5_ar_balance"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody data-role="listview"
                         data-auto-bind="false"
                         data-template="top-contact-template"
                         data-bind="source: obj.top_ar"></tbody>
                </table>
            </div> -->					                        
		</div>

		<!-- 333 -->
		<div class="col-12 col-md-4">
			<!-- <div class="saleOverview" style="margin-bottom: 15px;">
				<div class="row">
					
					<div class="col btn-group float-right">
		                <button style="width: 100%; background-image: url('https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/report.jpg'); background-size: cover; margin-left: 10px;" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bind="text: lang.lang.reports">
		                	
		                </button>
		                <div class="dropdown-menu">
		                    <a class="dropdown-item" href="#/sale_detail_by_customer" data-bind="text: lang.lang.sale_detail_by_customer"></a>
		                    <a class="dropdown-item" href="#/sale_detail_by_product" data-bind="text: lang.lang.sale_detail_by_product_services"></a>
		                    <a class="dropdown-item" href="#/customer_balance_detail" data-bind="text: lang.lang.customer_balance_detail"></a>
		                    <a class="dropdown-item" href="#/receivable_aging_summary" data-bind="text: lang.lang.receivable_aging_summary"></a>
		                    <a class="dropdown-item" href="#/collect_invoice" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></a>
		                    <a class="dropdown-item" href="#/collection_report" data-bind="text: lang.lang.collection_report"></a>
		                </div>
		            </div>

		            <div class="col" style="padding-right: 20px; padding-left: 0;">
						<div style="background: #009efb; text-align: center; padding: 40px 10px; margin-right: 10px; width: 100%; min-height: 130px; ">
							<span style="color: #fff; font-size: 25px;" data-bind="text:lang.lang.draft"></span>
							<span style="color: #fff; font-size: 20px;" data-bind="">10</span>
						</div>
					</div>
		        </div>
			</div> -->

			<div class="saleOverview" style="margin-bottom: 15px;">
				<div class="row">
					
					<div class="col-6 ">
						<div style="background: #009efb; text-align: center; margin-left: 10px; padding: 26px 0;">
							<i style="color: #fff; font-size: 35px;" class="ti-bar-chart"></i>
			                <button style="width: 100%; font-size: 17px;" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bind="text: lang.lang.reports">
			                	
			                </button>
			                 <div class="dropdown-menu">
			                    <a class="dropdown-item" href="#/sale_detail_by_customer" data-bind="text: lang.lang.sale_detail_by_customer"></a>
			                    <a class="dropdown-item" href="#/sale_detail_by_product" data-bind="text: lang.lang.sale_detail_by_product_services"></a>
			                    <a class="dropdown-item" href="#/customer_balance_detail" data-bind="text: lang.lang.customer_balance_detail"></a>
			                    <a class="dropdown-item" href="#/receivable_aging_summary" data-bind="text: lang.lang.receivable_aging_summary"></a>
			                    <a class="dropdown-item" href="#/collect_invoice" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></a>
			                    <a class="dropdown-item" href="#/collection_report" data-bind="text: lang.lang.collection_report"></a>
			                </div>
			            </div>
		            </div>

		            <div class="col-6" style="padding-right: 20px; padding-left: 0;">
						<div data-bind="click: loadDraft" style="background: #009efb; text-align: center; padding: 16px 10px; margin-right: 10px; width: 100%; min-height: 130px; ">
							<i style="color: #fff; font-size: 35px; text-align: center;" class="ti-pencil-alt"></i></br>
							<span style="color: #fff; font-size: 20px;" data-bind="text:lang.lang.draft"></span></br>
							<span style="color: #fff; font-size: 20px;" data-format="n0" data-bind="text: obj.draft_count"></span>
						</div>
					</div>
		        </div>
			</div>

			<!-- <div class="top5 home-footer">
                <table class="table color-table dark-table">
                    <thead>
                        <tr>
                            <th colspan="2" class="center">
                                <span data-bind="text: lang.lang.top_5_Receipt"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody data-role="listview"
                         data-auto-bind="false"
                         data-template="top-product-template"
                         data-bind="source: obj.top_cash_receipt"></tbody>
                </table>
            </div> -->
		</div>

	</div>

	<div class="row ">
    	<div class="col-md-8">
			<input data-role="dropdownlist"  
				   class="sorter marginRight marginBottom float-left"
		           data-value-primitive="true"
		           data-text-field="text"
		           data-value-field="value"
		           data-bind="value: sorter,
		                      source: sortList,
		                      events: { change: sorterChanges }" />

			<input data-role="datepicker"
				   class="sdate marginRight marginBottom float-left"
				   data-format="dd-MM-yyyy"
		           data-bind="value: sdate,
		           			  max: edate"
		           placeholder="From ..." />

		    <input data-role="datepicker" 
		    	   class="edate marginRight marginBottom float-left"
		    	   data-format="dd-MM-yyyy"
		           data-bind="value: edate,
		                      min: sdate"
		           placeholder="To ..." />

		  	<button style="background: #009efb; color: #fff;" class="btnSearch float-left" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
		</div>
	</div>

	<div  class="row ">
        <div class="col-md-12 marginTop table-responsive grid" >
        	<div data-role="grid" class="table color-table dark-table"
	             data-pageable="true"
	             data-filterable="true"
	             data-columns="[
	             	{ field: 'issued_date', title : 'DATE', template:'#=kendo.toString(new Date(issued_date), banhji.dateFormat)#', filterable: false, attributes: { style: 'text-align: center;'}},
	             	{ field: 'name', title : 'NAME', filterable: false },
	             	{ field: 'type', title : 'TYPE', filterable: { multi: true, search: true} },				                 
	                { field: 'number', title: 'REFERENCE', 
	                	template: '<a href=\'sales\\#/#=type.toLowerCase()#/#=id#\'>#=number#</a>', filterable: false, attributes: { style: 'text-align: left;'} },
	                { field: 'amount', title: 'AMOUNT', format: '{0:n}', filterable: false, attributes: { style: 'text-align: right; padding-right: 30px;'} },
	                { 
	                	title: 'STATUS', 
	                	template: kendo.template($('#transactions-status-tmpl').html()),
	                	attributes: { style: 'text-align: center;'}              	
	                },
	                { 
	                	title: 'ACTIONS',
	                	template: kendo.template($('#transactions-action-tmpl').html()),
	                	attributes: { style: 'text-align: center;'}
	                }
	             ]"
	             data-auto-bind="false"
	             data-bind="source: txnDS"></div>
        </div>
    </div>
</script>
<script id="checkOut" type="text/x-kendo-template">	
	<div class="row" id="checkOut" style="position: relative;">
		<div id="havepay" style="width: 100%; height: 100%;display: none;position: absolute;background: rgba(255,255,255,.9);z-index: 9;">
	        <div class="col-12 col-md-9" style="margin: 0 auto;float: none;margin-top: 20px;">
				<div class="listWrapper" style="border: 10px solid #ccc;">
					<div class="btn-close" style="z-index: 9999;" data-bind="click: closePay"><i class="ti-close"></i></div>
					<div class="row">
						<div class="col">
							<p style="font-size:18px;margin-top: 15px;" data-bind="text: lang.lang.summary"></p>
						    <table class="table color-table dark-table marginBottom">
								<tbody>
									<tr>
										<td class="textAlignRight" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
										<td class="textAlignRight" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
									</tr>
									<tr>
										<td class="textAlignRight"><span data-bind="text: lang.lang.discount">Discount</span></td>
										<td class="textAlignRight ">
											<span data-format="n" data-bind="text: obj.discount"></span>
										</td>
									</tr>               
									<tr>
										<td class="textAlignRight"><span data-bind="text: lang.lang.total_tax"></span></td>
										<td class="textAlignRight "><span data-format="n" data-bind="text: obj.tax"></span></td>
									</tr>
									<tr>
										<td class="textAlignRight"><h4 data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
										<td class="textAlignRight"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
									</tr>
								</tbody>
							</table>				
						</div>
						<div class="col">
							<div class="row" data-bind="visible: haveMakeChoice">
								<div class="col">
	            					<a class="cashmodule module-active" data-bind="click: cashClick" style="margin-top: 59px;text-align: center;  width: 100%; float: left; border: 1px solid #d5d5d5; padding: 52px 0; cursor: pointer;">
	            						<i style="font-size: 28px;" class="ti-wallet"></i><br>
	            						<span data-bind="text: lang.lang.cash_receipt">សាច់ប្រាក់</span>
	            					</a>
	            				</div>
	            				<div class="col">
	            					<a class="creditmodule" data-bind="click: clickInvoice" style="margin-top: 59px;text-align: center;  width: 100%; float: left; border: 1px solid #d5d5d5; padding: 52px 0; cursor: pointer;">
	            						<i style="font-size: 28px;" class=" ti-receipt"></i><br>
	            						<span data-bind="text: lang.lang.micro_credit">Credit</span>
	            					</a>
	            				</div>
	            			</div>
	            			<div class="row" style="margin-top: 59px;" data-bind="visible: haveInvoice">
	            				<input 
									data-role="dropdownlist"
									data-template="contact-list-tmpl" 
									data-auto-bind="false" 
									data-value-primitive="false" 
									data-filter="startswith" 
									data-text-field="name" 
									data-value-field="id"
									data-option-label="Select Customer..."
									data-bind="
										value: obj.contact,
		                              	source: contactDS"
		                            style="width: 100%; float: left;margin-right: 2%; margin-bottom: 5px;" 
		                            aria-invalid="true" 
		                            class="k-invalid marginBottom"
		                        />
		                        <!-- <div class="table-responsive">
									<table class="table color-table dark-table">
								        <tbody data-role="listview" 
							        		data-template="customer-select-list-tmpl" 
							        		data-auto-bind="false"
							        		data-bind="source: customerAR">
							        	</tbody>
								    </table>
				                </div> -->
				                <button 
				                	style="font-size: 17px; background: darkgreen; width: 48%; float: left;padding: 15px 0;border-radius: 5px;" 
				                	type="button" 
				                	class="btn btn-info " 
				                	data-toggle="dropdown" 
				                	aria-haspopup="true" 
				                	aria-expanded="false" 
				                	data-bind="text: lang.lang.invoice, click: saveInvoice">
				                </button>
				                <button 
				                	style="font-size: 17px; background: darkgreen; width: 48%; float: right;padding: 15px 0;border-radius: 5px;background: #2b2f3a;" 
				                	type="button" 
				                	class="btn btn-info " 
				                	data-toggle="dropdown" 
				                	aria-haspopup="true" 
				                	aria-expanded="false" 
				                	data-bind="text: lang.lang.cancel, click: makeChoice">
				                </button>
	            			</div>
	            			<div class="row" data-bind="visible: haveCash">
	            				<p style="width: 100%;text-align: center;font-size: 18px;margin-top: 15px;" data-bind="text: lang.lang.amount_to_pay"></p>
							    <div 
							    	class="row" 
							    	style="background: none;" 
							    	data-role="listview" 
					        		data-template="cash-currency-template" 
					        		data-auto-bind="false"
					        		data-bind="source: receipCurrencyDS">
					        	</div>
					        	<div data-bind="visible: haveChangeMoney">
									<p data-bind="text: lang.lang.amount_change" style="width: 100%;text-align: center;font-size: 18px;margin-top: 20px;margin-bottom: 8px;"></p>
							        <div 
							        	class="row"
							        	style="background: none;"
							        	data-role="listview" 
						        		data-template="change-currency-receipt-template" 
						        		data-auto-bind="false"
						        		data-bind="source: receipChangeDS">
						        	</div>
								</div>
	            				<button 
				                	style="margin-left: 10px; font-size: 17px; background: darkgreen; width: 44%; float: left;padding: 15px 0;border-radius: 5px;margin-top: 15px;" 
				                	type="button" 
				                	class="btn btn-info " 
				                	data-toggle="dropdown" 
				                	aria-haspopup="true" 
				                	aria-expanded="false" 
				                	data-bind="text: lang.lang.cash_receipt, click: saveCashSale">
				                </button>
				                <button 
				                	style="margin-left: 32px; font-size: 17px; background: darkgreen; width: 43%; float: right;padding: 15px 0;border-radius: 5px;margin-top: 15px;background: #2b2f3a;" 
				                	type="button" 
				                	class="btn btn-info " 
				                	data-toggle="dropdown" 
				                	aria-haspopup="true" 
				                	aria-expanded="false" 
				                	data-bind="text: lang.lang.cancel, click: makeChoice">
				                </button>
	            			</div>
						</div>
					</div>
				</div>
			</div>
	    </div>
	    <div data-bind="visible: haveParkSale" style="width: 100%; height: 100%;display: none;position: absolute;background: rgba(255,255,255,.9);z-index: 9;">
	        <div class="col-12 col-md-9" style="margin: 0 auto;float: none;margin-top: 20px;">
				<div class="listWrapper" style="border: 10px solid #ccc;">
					<div class="btn-close" style="z-index: 9999;" data-bind="click: parkSaleClose"><i class="ti-close"></i></div>
					<div class="row" style="margin-top: 30px;">
						<div class="col-md-12 marginTop table-responsive grid" >
				        	<div data-role="grid" class="table color-table dark-table"
					             data-pageable="true"
					             data-filterable="true"
					             data-columns="[
					             	{ 
					             		field: 'issued_date', 
					             		title : 'DATE', 
					             		template:'#=kendo.toString(new Date(issued_date), banhji.dateFormat)#', 
					             		filterable: false, 
					             		attributes: { style: 'text-align: center;'}
					             	},
					             	{ 
					             		field: 'name', 
					             		title : 'NAME', 
					             		filterable: false 
					             	},
					             	{ 
					             		field: 'type', 
					             		title : 'TYPE', 
					             		filterable: { multi: true, search: true} 
					             	},				                 
					                { 
					                	field: 'number', 
					                	title: 'REFERENCE', 
					                	template: '<a href=\'sales\\#/#=type.toLowerCase()#/#=id#\'>#=number#</a>', 
					                	filterable: false, 
					                	attributes: { style: 'text-align: left;'} 
					                },
					                { 
					                	field: 'amount', 
					                	title: 'AMOUNT', 
					                	format: '{0:n}', 
					                	filterable: false, 
					                	attributes: { style: 'text-align: right; padding-right: 30px;'} 
					                },
					                { 
					                	title: 'STATUS', 
					                	template: kendo.template($('#transactions-status-tmpl').html()),
					                	attributes: { style: 'text-align: center;'}              	
					                },
					                { 
					                	title: 'ACTIONS',
					                	template: kendo.template($('#transactions-action-tmpl').html()),
					                	attributes: { style: 'text-align: center;'}
					                }
					             ]"
					             data-auto-bind="false"
					             data-bind="source: parkSaleDS">
					        </div>
				        </div>
					</div>
				</div>
			</div>
	    </div>
		<div class="col-12 col-md-6">
			<div class="listWrapper">
				<div class="row">
					<div class="col-12 col-md-12 col-lg-6">
						<div class="widget-search marginBottom">
							<div class="overflow-hidden" style="width: 100%;">
								<input type="search" placeholder="Barcode..." data-bind="value: barcode, events: {change: barcodeChange}" style="width: 100%;" />
							</div>
							
						</div>
					</div>
					<div class="col-12 col-md-12 col-lg-6">
						<div class="widget-search marginBottom">
							<div class="overflow-hidden">
								<input type="search" placeholder="Number or Name..." data-bind="value: searchText" />
							</div>
							<button style="background: #009efb; color: #fff;" type="button" class="btn btn-default pull-right " data-bind="click: search"><i class="ti-search"></i></button>
						</div>
					</div>
				</div>
				<div class="row hidden-sm-down">
					<div class="col-md-12" style="position: relative;overflow: hidden;">
						<div id="loading" class="preloader" style="display: none;position: absolute;background: rgba(255,255,255,.6);">
					        <div class="loader">
					            <div class="loader__figure"></div>
					        </div>
					    </div>
						<div data-bind="invisible: haveItems" class="demo-section k-content wide span12">
							<p style="color: #fff; margin-bottom: 5px; float: left; width: 100%;" >Category</p>
							<div class="demo-section k-content wide">
								<div 
									id="productListView"
									data-role="listview"
									data-template="category-list-view-template"
									data-auto-bind="true"
									data-bind="source: categoryDS">
								</div>
								<div id="pager" class="k-pager-wrap"
							    	 data-role="pager"
							    	 data-auto-bind="true"
						             data-bind="source: categoryDS">
						        </div>
							</div>
						</div>
						<div data-bind="visible: haveItems" class="demo-section k-content wide span12">
							<p style="color: #fff; margin-bottom: 5px; float: left; width: 100%;" >
								<span style="float: left; width: 50%;">Items</span>
								<span class="textAlignRight" data-bind="click: backCategory" style="float: right; width: 50%; cursor: pointer;">
									<i class=" ti-control-backward"></i>
									back
								</span>
							</p>
							<div class="demo-section k-content wide">
								<div 
									id="productListView"
									data-role="listview"
									data-template="item-list-view-template"
									data-auto-bind="true"
									data-bind="source: itemsDS">
								</div>
								<div id="pager" class="k-pager-wrap"
							    	 data-role="pager"
							    	 data-auto-bind="true"
						             data-bind="source: itemsDS">
						        </div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="listWrapper marginBottom" style="height: auto;">
				<div class="row " style="margin-bottom: 10px;">
					<div class="col hidden-sm-down">
						<div style="margin-top: 10px;">Cashier Name: <span data-bind="text: displayUserName"></span></div>
						<div style="padding: 5px 0;text-align: left;">
							<!-- <div id="date-part"></div> -->
							Time: <span id='time-part'></span>
						</div>
						<!-- <input 
							data-role="dropdownlist"
							data-template="contact-list-tmpl" 
							data-auto-bind="false" 
							data-value-primitive="true" 
							data-filter="startswith" 
							data-text-field="name" 
							data-value-field="id"
							data-option-label="Select Customer..."
							data-bind="
								value: customerSelected,
                              	source: contactDS,
                              	events: {change: addCustomer}"
                            style="width: 100%; float: left;margin-right: 2%; margin-bottom: 5px;" 
                            aria-invalid="true" 
                            class="k-invalid marginBottom"
                        />
                        <div class="table-responsive">
							<table class="table color-table dark-table">
						        <tbody data-role="listview" 
					        		data-template="customer-select-list-tmpl" 
					        		data-auto-bind="false"
					        		data-bind="source: customerAR">
					        	</tbody>
						    </table>
		                </div> -->
                    </div>
					<div class="col checkOut-button">
						<a style="padding: 9px 15px; box-shadow: 2px 0px 12px 0px rgba(68,68,68,1); border-radius: 5px;" class="custom btn waves-effect waves-light btn-block btn-info" data-bind="click: parkSaleShow">
							<span style="font-size: 15px; width: 50%; float: left; line-height: 45px;" data-bind="text: lang.lang.microparksale"></span>
							<span style="font-size: 30px; width: 50%; float: right;" data-bind="text: numberParkSale">100</span>
						</a>
	                </div>
				</div>
				<div class="row">
					<div class="col-md-12 table-responsive">
						<div id="posProductList" class="box-generic-noborder table-responsive marginBottom" style="min-height: 140px!important; height: 230px; padding-bottom: 0;">
							<!-- Item List -->
						    <div data-role="grid" class="costom-grid table color-table dark-table"
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
								        	var rowIndex = banhji.checkOut.lineDS.indexOf(dataItem)+1;
								        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
								      	}
								    },
				                 	{ 
				                 		field: 'item', 
				                 		title: 'PRODUCTS/SERVICES', 
				                 		editor: false, 
				                 		template: '#=item.name#', width: '170px' 
				                 	},
		                            {
									    field: 'quantity',
									    title: 'QTY',
									    format: '{0:n}',
									    editor: numberTextboxEditor,
									    width: '120px',
									    attributes: { style: 'text-align: right;' }
									},
		                            {
		                            	field: 'item_price',
		                            	title: 'UOM',
		                            	editor: measurementEditor,
		                            	template: '#=item_price?item_price.measurement:banhji.emptyString#',
		                            	width: '80px'
		                            },
		                            {
									    field: 'price',
									    title: 'PRICE',
									    format: '{0:n}',
									    editor: numberTextboxEditor,
									    width: '120px',
									    hidden: true,
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
		                            { 
		                            	field: 'amount', 
		                            	title:'AMOUNT', 
		                            	format: '{0:n}', 
		                            	editable: 'false', 
		                            	attributes: { style: 'text-align: right;' }, width: '120px' },
		                            { 
		                            	field: 'tax_item', 
		                            	title:'TAX', 
		                            	hidden: true,
		                            	editor: taxForSaleEditor, 
		                            	template: '#=tax_item.name#', width: '90px' 
		                            }
		                         ]"
		                         data-auto-bind="false"
				                 data-bind="source: lineDS" >
				            </div>
						</div>
						<div class="row">
							<div class="col-12 col-md-12 col-lg-6">
								<table class="table color-table dark-table marginBottom">
									<tbody>
										<tr>
											<td class="textAlignRight" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
											<td class="textAlignRight" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
										</tr>
										<tr>
											<td class="textAlignRight"><span data-bind="text: lang.lang.discount">Discount</span></td>
											<td class="textAlignRight ">
												<span data-format="n" data-bind="text: obj.discount"></span>
											</td>
										</tr>               
										<tr>
											<td class="textAlignRight"><span data-bind="text: lang.lang.total_tax"></span></td>
											<td class="textAlignRight "><span data-format="n" data-bind="text: obj.tax"></span></td>
										</tr>
										<tr>
											<td class="textAlignRight"><h4 data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
											<td class="textAlignRight"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
										</tr>
									</tbody>
								</table>
							</div> 
							<div class="col-12 col-md-12 col-lg-6 checkOut-button">
								<div class="row">
									<div class="col" >
										<a style="padding: 25px 15px; box-shadow: 2px 0px 12px 0px rgba(68,68,68,1); border-radius: 5px 5px 0 0; margin-bottom: 1px; " class="buttonpay btn waves-effect waves-light btn-block btn-info" data-bind="click: payClick"><span style="font-size: 15px;" data-bind="text: lang.lang.pay">Pay</span></a>
									</div>
								</div>
								<div class="row">
									<!-- <div class="col-4" style="padding-right: 0;">
										<a style="white-space: pre-wrap; border-radius: 0 0 0 5px; " class="buttoninvoiceSale btn waves-effect waves-light btn-block btn-info" data-bind="click: saveInvoice" data-bind="click: saveInvoice"><span style="font-size: 13px" data-bind="text: lang.lang.microinvoice"></span></a>
									</div> -->
									<div class="col-6" style="padding-right: 0;">
										<a style="border-radius: 0 0 0 5px; margin: 0 2px 0 0; width: 99%; " class="buttonparksale btn waves-effect waves-light btn-block btn-info" data-bind="click: parkSale"><span data-bind="text: lang.lang.microparksale">Parksale</span></a>
									</div>
									<div class="col-6" style="padding-left: 0;">
										<a style="border-radius: 0 0 5px 0; " class="buttoncancelsale btn waves-effect waves-light btn-block btn-info" data-bind="click: addEmpty"><span data-bind="text: lang.lang.cancel">Cancel</span></a>
									</div>
								</div>
							</div>
							<div id="supercheoun-ntf" style="position: fixed;right: -800px;"><span class="message"></span> (<span class="second"></span> s)</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<!-- Invoice Form -->
<script id="printBill" type="text/x-kendo-template">
	<div class="row" id="checkOut">
		<div class="col-md-6" style="margin: 0 auto;">
			<div class="listWrapper marginBottom" style="height: auto;">
				<div class="row">
					<div class="col-md-12">
					    <div id="invoiceContent" style="margin-bottom: 15px;"></div>
					    <a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: printGrid"><span data-bind="text: lang.lang.print">Invoice</span></a>
						<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: cancel"><span data-bind="text: lang.lang.cancel">Pay</span></a>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</script>
<script id="invoiceForm" type="text/x-kendo-tmpl">
	<style>
		.inv1 td {
			padding: 5px;
		}
		* {
			-webkit-print-color-adjust:exact; 
			font-size: 14px;
			padding: 0;
			margin: 0;
		}
	</style>
  	<div style="margin: 0 auto;">
		<div class="inv1" style="width: 500px;margin: 0 auto;">
	        <div class="content">
	        	<div style="overflow: hidden;padding:10px 0;">
	        		<div style="text-align: center; margin: 0 auto; width:100% ;">
	        			<img style="text-align: center; width: 150px; margin-bottom: 10px;" src="#= banhji.institute.logo.url#" />
	            	</div>
	            	<p style="text-align: center; margin-bottom: 5px;">#= banhji.institute.name #</p>
	            	<p style="text-align: center; margin-bottom: 5px;">Tel: #= banhji.institute.telephone#</p>
	            	<p style="text-align: center; margin-bottom: 5px;"><span style="font-size: 15px; font-weight: 700;">បង្កាន់ដៃបង់ប្រាក់</span>/<span style="font-size: 16px; font-weight: 700;">Receipt</span></p>
	        	</div>
	            <div class="clear mid-header" style="padding-bottom: 10px;">
	                <table style="width: 100%; ">
	                	<tr>
	                		<td style="width: 35%; padding: 0;">
	                			<span style="font-size: 13px;">វិក្កយបត្រ</span>
	                			/
	                			<span style="font-size: 14px;">Invoice No</span>
	                		</td>
	                		<td style="padding: 0;">:</td>
	                		<td style="text-align: right; padding: 0;"><b>#= number#</b></td>
	                	</tr>
	                	<tr>
	                		<td style="padding: 0;">
	                			<span style="font-size: 13px;">កាល​បរិច្ឆេទ</span>
	                			/
	                			<span style="font-size: 14px;">Date Time</span>
	                		</td>
	                		<td style="padding: 0;">:</td>
	                		<td style="text-align: right; padding: 0; ">#= issued_date#</td>
	                	</tr>
	                </table>
	            </div>
	        	<div class="clear">
	            	<table cellpadding="0" cellspacing="0" border="1" class="span12" style="width: 100%; margin-bottom: 20px;">
	                	<thead style="">
	                        <tr class="main-color" style="height: 45px;background: \#203864!important;">
	                            <th style="text-align: center;width: 8%;color: \#fff!important;background: \#203864!important;">ល.រ<br />N<sup>0</sup></th>
	                            <th style="text-align: center;color: \#fff!important;background: \#203864!important;">បរិយាយ​មុខ​ទំនិញ<br />Description</th>
	                            <th style="text-align: center;color: \#fff!important;background: \#203864!important;">បរិមាណ<br />Quantity</th>
	                            <th style="text-align: center;color: \#fff!important;background: \#203864!important;">ថ្លៃឯកតា​<br />Unit Price</th>
	                            <th style="text-align: center;width: 20%;color: \#fff!important;background: \#203864!important;">ថ្លៃ​ទំនិញ<br />Amount</th>
	                        </tr>
	                    </thead>
	                    <tbody style="margin-top: 2px" id="formListView">
	                    	#$.each(banhji.printBill.line, function(i,v){#
	                    		#if(v.amount){#
									<tr>
										<td style="text-align: center;"><i>#: i+1#</i>&nbsp;</td>
										<td class="lside">#= v.description ? v.description : v.item.name #</td>
										<td style="text-align: center;">#= v.quantity#</td>
										<td class="rside" style="text-align: right;" width="70">#if(v.price > 0){# #= kendo.toString(v.price, "c", v.locale) # #}#</td>
										<td class="rside" style="text-align: right;">#= kendo.toString(v.amount, "c", v.locale) #</td>
									</tr>
								#}#
	                    	#})#
	                    </tbody>
	                    <tfoot style="border: none;">
	                    	<tr style="border: none;">
	                        	<td colspan="4" style="text-align: right; padding: 5px; font-weight: bold;">សរុប/Sub Total:</td>
	                            <td class="rside" style="text-align: right;">#= kendo.toString(amount, "c", locale)#</td>
	                        </tr>
	                        <tr>
	                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ/Discount:</td>
	                            <td class="rside" style="text-align: right;">#= kendo.toString(discount, "c", locale) #</td>
	                        </tr>
	                        <tr>
	                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">ប្រាក់ត្រូវបង់ជា/Grand Total:</td>
	                            <td class="rside" style="text-align: right;">#= kendo.toString(amount, "c", locale)#</td>
	                        </tr>
	                    </tfoot>
	                </table>
	                <!-- <table  style="width: 100%; ">
	                	<tr>
	                		<td style="padding: 0;">Receive ($):</td>
	                		<td style="text-align: right;padding: 0 5px;">0$</td>
	                		<td></td>
	                		<td style="padding: 0;">Change ($):</td>
	                		<td style="text-align: right;padding: 0 5px;">0.50 $</td>
	                	</tr>
	                	<tr>
	                		<td style="padding: 0;">Receive (៛):</td>
	                		<td style="text-align: right; padding: 0 5px;">10,000៛</td>
	                		<td></td>
	                		<td style="padding: 0;">Change (៛):</td>
	                		<td style="text-align: right;padding: 0 5px;">2,000 ៛</td>
	                	</tr>
	                </table>
	                <p style="text-align: center; margin-top: 10px; margin-bottom: 5px;">
	                	<i>អត្រាប្តូរប្រាក់/Exchange rate (1$): 4,000៛</i>
	                </p> -->
	                <p style="text-align: center; font-size: 12px; margin-top: 8px; margin-bottom: 5px;">
	                	សូមអរគុណ សូមអញ្ជើញមកម្តងទៀត ! <i>Thanks, Please come again!</i>
	                </p>
	                <div style="text-align: center; height: 30px; width: 90%; margin: 0 auto;">
	                	<span id="footwnumber#= id#"></span>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</script>
<script id="cash-currency-template" type="text/x-kendo-template">
	<div class="col">
		<div style="text-align: center;font-size:20px; line-height: 35px;" data-bind="text: amount_rate"></div>
		<div style="text-align: center;">
			<input 
				type="number"
				data-role="numerictextbox"
	           data-format="n"
	           data-spinners="false"
	           data-min="0"
	           data-bind="value: amount,
	                      events: { change: checkChange }"
	           style="width: 90%; text-align: center; font-size: 20px;" />
		</div>
	</div>
</script>
<script id="change-currency-receipt-template" type="text/x-kendo-template">
	<div class="col">
		<div style="text-align: center;font-size:20px; line-height: 35px;" data-bind="text: currency"></div>
		<div style="text-align: center;">
			#if(banhji.checkOut.receipChangeDS.indexOf(data) > 0){#
				<input data-role="numerictextbox"
		           data-format="n"
		           data-spinners="false"
		           data-min="0"
		           data-bind="value: amount,
		                      events: { change: checkChangeMoney }"
		           style="width: 90%; text-align: center; font-size: 20px;" />
		    #}else{#
		    	<input data-role="numerictextbox"
		           data-format="n"
		           type="number"
		           data-spinners="false"
		           data-min="0"
		           disabled
		           data-bind="value: amount"
		           style="width: 90%; text-align: center; font-size: 20px;" />
		    #}#
		</div>
	</div>
</script>
<script id="category-list-view-template" type="text/x-kendo-template">
	<div class="product" data-bind="click:searchItemByCategory" style="text-align: center;">
		
		<div class="cover-img" >
			<a class="view-details">
				<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg" />
			</a>
		</div>
		<h3>#:name.substring(0, 20)#...</h3>
		
	</div>
</script>
<script id="item-list-view-template" type="text/x-kendo-template">
	<div class="product" data-bind="click:addRow" style="text-align: center;">
		<!-- <a class="view-details"> -->		
			<!-- <div style="border-bottom: 1px solid \#0eac00;min-height: 130px;max-height: 130px;background: url(#= image_url? image_url: 'https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg'#) center;">
			</div> -->
			<!-- <img src=#:image_url# />
			<h3>#:name.substring(0, 20)#...</h3>
		</a> -->
		<div class="cover-img" >
			<a class="view-details">
				<img src=#:image_url# />
			</a>
		</div>
		<h3>#:name.substring(0, 20)#...</h3>		
	</div>
</script>
<script id="parksale-list-tmpl" type="text/x-kendo-template">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: rmParkSale }"></i>
			#:banhji.checkOut.parkSaleDS.indexOf(data)+1#      
		</td>
		<td>#= number#</td>
	</tr>
</script>

<script id="customer-select-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: rmCustomer }"></i>
			#:banhji.checkOut.customerAR.indexOf(data)+1#      
		</td>
		<td>#= name#</td>
	</tr>
</script>
<!--  -->
<script id="transactions" type="text/x-kendo-template">	
	<div class="row">		
        <div class="col-md-12">
        	<div class="card-body">
    		    <div class="row ">
	            	<div class="col-md-8">
						<input data-role="dropdownlist"  
							   class="sorter marginRight marginBottom float-left"
					           data-value-primitive="true"
					           data-text-field="text"
					           data-value-field="value"
					           data-bind="value: sorter,
					                      source: sortList,
					                      events: { change: sorterChanges }" />

						<input data-role="datepicker"
							   class="sdate marginRight marginBottom float-left"
							   data-format="dd-MM-yyyy"
					           data-bind="value: sdate,
					           			  max: edate"
					           placeholder="From ..." />

					    <input data-role="datepicker" 
					    	   class="edate marginRight marginBottom float-left"
					    	   data-format="dd-MM-yyyy"
					           data-bind="value: edate,
					                      min: sdate"
					           placeholder="To ..." />

					  	<button class="btnSearch float-left" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
					</div>
					<div class="col-md-4">
			            <div class="btn-group float-right">
			                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                	Add New Transaction
			                </button>
			                <div class="dropdown-menu">
			                    <a class="dropdown-item" href="#/quote"><span data-bind="text: lang.lang.create_quotation"></span></a>
			                    <a class="dropdown-item" href="#/invoice"><span data-bind="text: lang.lang.create_invoice"></span></a>
			                    <a class="dropdown-item" href="#/cash_sale"><span data-bind="text: lang.lang.create_cash_sale"></span></a>
			                    <a class="dropdown-item" href="#/cash_receipt"><span data-bind="text: lang.lang.create_cash_receipt"></span></a>
			                </div>
			            </div>
			        </div>
				</div>

	            <!-- <div id="invFormContent" class="marginTop" style="page-break-after: always;">	            	
		            <div class="reportTable home-footer table-responsive" style="width: 97%; margin: 0 auto;">
		            	<table class="table color-table dark-table" style="width: 100%; height: auto; ">
                            <thead>
                                <tr>
									<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.type"></th>
									<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.date"></th>
									<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.reference"></th>
									<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.amount"></th>
									<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.status"></th>
									<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.action"></th>
								</tr>
                            </thead>
                            <tbody  data-role="listview"
		            				data-auto-bind="false"
					                data-template="customerTransactionList-template"
					                data-bind="source: dataSource" >
					        </tbody>
		            	</table>
		            </div>
		        </div> -->

		        <div  class="row ">
		            <div class="col-md-12 marginTop table-responsive grid" >
		            	<div data-role="grid" class="table color-table dark-table"
				             data-pageable='true'
				             data-auto-bind="false"
				             data-filterable="true"
				             data-columns="[
				             	{ field: 'issued_date', title : 'DATE', template:'#=kendo.toString(new Date(issued_date), banhji.dateFormat)#', filterable: { multi: true, search: true}},
				             	{ field: 'name', title : 'NAME', filterable: { multi: true, search: true} },
				             	{ field: 'type', title : 'TYPE', filterable: { multi: true, search: true} },				                 
				                { field: 'number', title: 'REFERENCE', template: '<a href=\'purchases\\#/#=type.toLowerCase()#/#=id#\'>#=number#</a>', filterable: { multi: true, search: true} },
				                { field: 'amount', title: 'AMOUNT', format: '{0:n}', attributes: { style: 'text-align: right;'}, filterable: { multi: true, search: true} },
				                { 
				                	title: 'STATUS', 
				                	template: kendo.template($('#transactions-status-tmpl').html()) 
				                },
				                { 
				                	title: 'ACTIONS',
				                	template: kendo.template($('#transactions-action-tmpl').html())
				                }
				             ]"
				             data-bind="source: dataSource"></div>
		            </div>
		        </div>

            </div>
        </div>
	</div>
</script>
<script id="transactions-status-tmpl" type="text/x-kendo-tmpl">
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
</script>
<script id="transactions-action-tmpl" type="text/x-kendo-tmpl">
	#if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice"){#
		#if(status=="0" || status=="2") {#
			<button class="k-button btn-info" data-bind="click: payInvoice"><i></i> <span data-bind="text: lang.lang.receive_payment"></span></button>
		#}#
	#}#

	#if(status=="4") {#
		<a href="\#/#=type.toLowerCase()#/#=id#"><button class="k-button btn-info">Use</button></a>
	#}#
</script>
<script id="customerTransactionList-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=name#</td>
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
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
			<td></td>
			<td></td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span>Total #: name #</td>
    	<td></td>
    	<td></td>
    	<td style="font-weight: bold; border-top: 1px solid black !important; color: black; text-align: right; ">
    		#=kendo.toString(amount, "c", banhji.locale)#
    	</td>
    	<td></td>
		<td></td>
    </tr>
    <tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
</script>
<script id="customers" type="text/x-kendo-template">
	<div class="row" id="customers">
		<div class="col-md-3">
			<div class="listWrapper">
				<a href="#/customer" style="padding: 5px 0; font-size: 18px;" class="btn waves-effect waves-light btn-block btn-info btnAddCustomer"><i class="icon-user-follow marginRight"></i><span data-bind="text: lang.lang.new_customer"></span></a>
				<div class="innerAll">
					<form autocomplete="off" class="form-inline">
						<div class="widget-search">
							<div class="overflow-hidden">
								<input type="search" placeholder="Number or Name..." data-bind="value: searchText" style="padding: 6px;">
							</div>
							<button style="background: #009efb; color: #fff;" type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="ti-search"></i></button>
						</div>
						
					</form>
				</div>

				<span class="results"><span data-bind="text: contactDS.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>

				<div class="table table-condensed"
					 data-role="grid"
					 data-bind="source: contactDS"
					 data-row-template="customerCenter-customer-list-tmpl"
					 data-columns="[{title: ''}]"
					 data-selectable="true"
					 data-scrollable="{virtual: true}"></div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="detailsWrapper">
				<div class="row">
					<div class="col-md-6 marginBottom">
						<input class="customerName" type="text" name="" data-bind="value: obj.name" disabled="disabled" style="background: #fff;" />
						<ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#cutomerTransaction" role="tab" aria-selected="true"><span><i class="ti-text"></i></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerInformation" role="tab" aria-selected="false"><span><i class="icon-info"></i></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerMemo" role="tab" aria-selected="false"><span><i class="ti-pencil-alt"></i></span></a> </li>
                           <!--  <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerAttachment" role="tab" aria-selected="false"><span><i class="icon-paper-clip"></i></span></a> </li> -->
                        </ul>
                        <div class="tab-content tabcontent-border">
                        	<!--Tab Cutomer Transaction -->
                            <div class="tab-pane active show" id="cutomerTransaction" role="tabpanel">
                                <div class="p-10">
                                    <div class="row">
                                    	<div class="col-sm-6">
                                    		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goSaleOrder"><span data-bind="text: lang.lang.sale_order"></span></a>
                                    	</div>
                                    	<div class="col-sm-6">
                                    		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goDeposit"><span data-bind="text: lang.lang.c_deposit"></span></a>
                                    	</div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-sm-6">
                                    		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goCashSale"><span data-bind="text: lang.lang.cash_sale"></span></a>
                                    	</div>
                                    	<div class="col-sm-6">
                                    		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goInvoice"><span data-bind="text: lang.lang.invoice"></span></a>
                                    	</div>
                                    </div>
                                    <div class="row">
                                    	
                                    	<div class="col-sm-6">
                                    		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goCashReceipt"><span data-bind="text: lang.lang.cash_receipt"></span></a>
                                    	</div>
                                    	<div class="col-sm-6">
                                    		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goCashRefound"><span data-bind="text: lang.lang.cash_refund"></span></a>
                                    	</div>
                                    </div>
                                </div>
                            </div>
                            <!-- End -->

                           	<!--Tab Customer Information -->
                            <div class="tab-pane" id="customerInformation" role="tabpanel">
                            	<div class="p-10">
                            		<div class="row">
                                    	<div class="col-md-6">
                                    		<img class="main-image" data-bind="attr: { src: obj.image_url, alt: obj.name, title: obj.name }">
                                    	</div>
                                    	<div class="col-md-6">
                                    		<div class="accounCetner-textedit">
								            	<table width="100%">
													<tr>
														<td width="40%"><span data-bind="text: lang.lang.name"></span></td>
														<td width="60%">
															<span data-bind="text: obj.name"></span>
														</td>
													</tr>
													<tr>
														<td><span data-bind="text: lang.lang.phone"></span></td>
														<td>
															<span data-bind="text: obj.phone"></span>
														</td>
													</tr>
												</table>

												<a class="btn waves-effect waves-light btn-block btn-info btnViewEditCustomer" data-bind="click: goEdit"><i class="ti-pencil-alt marginRight"></i><span data-bind="text: lang.lang.view_edit_profile_micro"></span></a>
											</div>
                                    	</div>
                                    </div>
                                </div>
                            </div>
                            <!-- End -->

                            <!--Tab Customer Memo -->
                            <div class="tab-pane" id="customerMemo" role="tabpanel">
                            	 <div class="p-10">
                                    <div class="row">
                                    	<div class="col-md-9">
                                    		<input type="text" class="k-textbox marginBottom"
												data-bind="value: note"
												placeholder="Add memo ..."/>
                                    	</div>
                                    	<div class="col-md-3">
                                    		<a class="btn waves-effect waves-light btn-block btn-info btnAddMemo" data-bind="click: saveNote"><i class="mdi mdi-message-plus marginRight"></i><span data-bind="text: lang.lang.add"></span></a>
                                    	</div>
                                    	<div class="col-md-12">
                                        	<div class="table table-condensed blockShowMemo"
												 data-role="grid"
												 data-auto-bind="false"
												 data-bind="source: noteDS"
												 data-row-template="customerCenter-note-tmpl"
												 data-columns="[{title: ''}]"
												 data-height="150"
												 data-scrollable="{virtual: true}" >
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
                            <!-- End -->


                            <!--Tab Customer Attachment -->
                            <div class="tab-pane" id="customerAttachment" role="tabpanel">
                            	<div class="p-10">
                            		<div class="row">
                                    	<div class="col-md-12 ">
                                    		<p><span data-bind="text: lang.lang.file_type"></span> [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>
								            <input id="files" name="files"
							                   type="file"
							                   data-role="upload"
							                   data-show-file-list="false"
							                   data-bind="events: {
					                   				select: onSelect
							                   }">
							                <div class="table-responsive">
								                <table class="table color-table dark-table">
											        <thead>
											            <tr>
											                <th data-bind="text: lang.lang.file_name"></th>
											                <th data-bind="text: lang.lang.description"></th>
											                <th data-bind="text: lang.lang.date"></th>
											                <th data-bind="text: lang.lang.action"></th>
											            </tr>
											        </thead>
											        <tbody data-role="listview"
											        		data-template="attachment-list-tmpl"
											        		data-auto-bind="false"
											        		data-bind="source: attachmentDS"></tbody>
											    </table>
											</div>
										    <div id="pager" class="k-pager-wrap"
										    	 data-role="pager"
										    	 data-auto-bind="false"
									             data-bind="source: attachmentDS"></div>

										    <a hre="" class="btn waves-effect waves-light btn-block btn-info btnAddAttachment col-md-3" data-bind="click: uploadFile" ><i class="ti-check marginRight"></i><span data-bind="text: lang.lang.save"></span></a>
							            </div>
							        </div>
                            	</div>  
                            </div>
                            <!-- End -->
                        </div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<div class="blockBalance" data-bind="click: loadBalance" >
									<div class="coverIcon"><i class="ti-server"></i></div>
									<div class="txt">
										<span  data-bind="text: lang.lang.balance"></span>
										<span data-bind="text: balance"></span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="blockDeposit" data-bind="click: loadDeposit">
									<div class="coverIcon"><i class=" ti-briefcase"></i></div>
									<div class="txt" style="width: 70%;">
										<span data-bind="text: lang.lang.deposit"></span>
										<span style="font-size: 15px;" data-bind="text: deposit" ></span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="blockOpenInvoice" data-bind="click: loadBalance" >
									<div class="coverIcon"><i class="icon-info"></i></div>
									<div class="txt">
										<span style="font-size: 25px;" data-bind="text: outInvoice"></span>
										<span data-bind="text: lang.lang.open_invoice"></span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="blockOverDue" data-bind="click: loadOverInvoice" >
									<div class="coverIcon"><i class="ti-alarm-clock"></i></div>
									<div class="txt" >
										<span style="font-size: 25px;" data-bind="text: overInvoice"></span>
										<span  data-bind="text: lang.lang.over_due"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Block Search -->
				<div class="row">
					<div class="col-md-12">
						<input data-role="dropdownlist"
							   class="sorter marginRight marginBottom"
					           data-value-primitive="true"
					           data-text-field="text"
					           data-value-field="value"
					           data-bind="value: sorter,
					                      source: sortList,
					                      events: { change: sorterChanges }" />

						<input data-role="datepicker"
							   class="sdate marginRight marginBottom"
							   data-format="dd-MM-yyyy"
					           data-bind="value: sdate,
					           			  max: edate"
					           placeholder="From ..." >

					    <input data-role="datepicker"
					    	   class="edate marginRight marginBottom"
					    	   data-format="dd-MM-yyyy"
					           data-bind="value: edate,
					                      min: sdate"
					           placeholder="To ..." >

					  	<button style="background: #009efb; color: #fff;" class="btnSearch" type="button" class="marginBottom" data-role="button" data-bind="click: searchTransaction"><i class="ti-search"></i></button>
					</div>
				</div>
				<!-- End -->

				<!-- Block Table -->
				<div class="row">
					<div class="col-md-12 table-responsive">
						<table class="table color-table dark-table">
					        <thead>
					            <tr>
					                <th data-bind="text: lang.lang.date"></th>
									<th data-bind="text: lang.lang.type"></th>
									<th data-bind="text: lang.lang.reference_no"></th>
									<th data-bind="text: lang.lang.amount"></th>
									<th data-bind="text: lang.lang.status"></th>
									<th data-bind="text: lang.lang.action"></th>
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
				<!-- End -->
			</div>
		</div>
	</div>
</script>



<script id="saleReport" type="text/x-kendo-template">
	<div class="row ">
		<div class="col-md-4">
			<div class="saleOverview">
				<h2 data-bind="text: lang.lang.sale"></h2>
				<p data-format="n" data-bind="text: obj.sale"></p>
				<div class="col-md-12">
					<div class="col-md-4">
						<span data-bind="text: obj.sale_customer"></span>
						<span data-bind="text: lang.lang.customer"></span>
					</div>
					<div class="col-md-4">
						<span data-bind="text: obj.sale_product"></span>
						<span data-bind="text: lang.lang.product"></span>
					</div>
					<div class="col-md-4">
						<span data-bind="text: obj.sale_ordered"></span>
						<span data-bind="text: lang.lang.order"></span>
					</div>
				</div>
			</div>

			<!-- Report -->
            <div class="report ">
				<div class="col-md-12">
					<h3><a href="#/sale_summary_by_customer" data-bind="text: lang.lang.sale_summary_by_customer" ></a></h3>
					<p data-bind="text: lang.lang.summarizes_total_sales"></p>
				</div>
				<div class="col-md-12">
					<h3><a href="#/sale_summary_by_product" data-bind="text: lang.lang.sale_summary_by_product_services" ></a></h3>
					<p data-bind="text: lang.lang.summarizes_total_sales_for_each_product"></p>
				</div>
				<div class="col-md-12">
					<h3><a href="#/sale_detail_by_customer" data-bind="text: lang.lang.sale_detail_by_customer" ></a></h3>
					<p data-bind="text: lang.lang.lists_individual_sale"></p>
				</div>
				<div class="col-md-12">
					<h3><a href="#/sale_detail_by_product" data-bind="text: lang.lang.sale_detail_by_product_services" ></a></h3>
					<p data-bind="text: lang.lang.lists_individual_sale_transactions"></p>
				</div>						    					
			</div>

			<!-- Top 4 -->
			<div class="top5 home-footer">
                <table class="table color-table dark-table">
                    <thead>
                        <tr>
                            <th colspan="2" class="center">
                                <span data-bind="text: lang.lang.top_5_customers"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody data-role="listview"
                         data-auto-bind="false"
                         data-template="top-contact-template"
                         data-bind="source: objInventory.top_customer"></tbody>
                </table>
            </div>					                        
		</div>
		<div class="col-md-4">
			<div class="saleOverview">
				<h2 data-bind="text: lang.lang.sale_order"></h2>
				<p data-format="n" data-bind="text: obj.so"></p>
				<div class="col-md-12">
					<div class="col-md-6">
						<span data-format="n0" data-bind="text: obj.so_avg"></span>
						<span data-bind="text: lang.lang.average"></span>
					</div>
					<div class="col-md-6">
						<span data-bind="text: obj.so_open"></span>
						<span data-bind="text: lang.lang.order_open"></span>
					</div>
				</div>
			</div>

			<!-- Report -->
			<div class="report" style="min-height: 385px; ">
                <div class="col-md-12">
					<h3><a href="#/customer_balance_summary" data-bind="text: lang.lang.customer_balance_summary" ></a></h3>
					<p data-bind="text: lang.lang.summarizes_total_sales"></p>
				</div>
				<div class="col-md-12">
					<h3><a href="#/customer_balance_detail" data-bind="text: lang.lang.customer_balance_detail" ></a></h3>
					<p data-bind="text: lang.lang.lists_individual_unpaid_invoices_for_each_customer"></p>
				</div>
				<div class="col-md-12">
					<h3><a href="#/receivable_aging_summary" data-bind="text: lang.lang.receivable_aging_summary"></a></h3>
					<p data-bind="text: lang.lang.lists_all_unpaid_invoices1"></p>	
				</div>
				<div class="col-md-12">
					<h3><a href="#/receivable_aging_detail" data-bind="text: lang.lang.receivable_aging_detail"></a></h3>
					<p data-bind="text: lang.lang.lists_individual_unpaid_invoices_grouped_by_customer"></p>
				</div>
			</div>

			<!-- Top 4 -->
			<div class="top5 home-footer">
                <table class="table color-table dark-table">
                    <thead>
                        <tr>
                            <th class="center" colspan="2">
                                <span data-bind="text: lang.lang.top_5_Receipt"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody data-role="listview"
                         data-auto-bind="false"
                         data-template="top-contact-template"
                         data-bind="source: obj.top_cash_receipt"></tbody>
                </table>
            </div>					                        
		</div>
		<div class="col-md-4">
			<div class="saleOverview">
				<h2 data-bind="text: lang.lang.receivable"></h2>
				<p data-format="n" data-bind="text: obj.ar"></p>
				<div class="col-md-12">
					<div class="col-md-4">
						<span data-format="n0" data-bind="text: obj.ar_open"></span>
						<span data-bind="text: lang.lang.open"></span>
					</div>
					<div class="col-md-4">
						<span data-bind="text: obj.ar_customer"></span>
						<span data-bind="text: lang.lang.customers"></span>
					</div>
					<div class="col-md-4">
						<span data-bind="text: obj.ar_overdue"></span>
						<span data-bind="text: lang.lang.overdue"></span>
					</div>
				</div>
			</div>

			<!-- Report -->
			<div class="report" style="min-height: 385px; ">
				<div class="col-md-12">
					<h3><a href="#/collect_invoice" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></a></h3>
					<p data-bind="text: lang.lang.lists_all_unpaid_invoices_grouped_by_due_today_and_overdue"></p>
				</div>
				<div class="col-md-12">
					<h3><a href="#/collection_report" data-bind="text: lang.lang.collection_report"></a></h3>
					<p data-bind="text: lang.lang.lists_of_collected_invoices_for_the_select_period_of_time_group_by_method_of_payment"></p>
				</div>
			</div>

			<!-- Top 4 -->
			<div class="top5 home-footer">
                <table class="table color-table dark-table">
                    <thead>
                        <tr>
                            <th colspan="2" class="center">
                                <span data-bind="text: lang.lang.top_5_best_selling_products"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody data-role="listview"
                         data-auto-bind="false"
                         data-template="top-product-template"
                         data-bind="source: objInventory.top_product"></tbody>
                </table>
            </div>					                        
		</div>
	</div>
</script>

<!-- Unit Center -->
<script id="unitCenter" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div id="example">
	        	<div class="row marginTop15">
	                <div class="col-md-12">
	                	<div class="card">
	                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
	                		<div class="card-body">
						        <h2  data-bind="text: lang.lang.customers"></h2>

							    <!-- Top Part -->
						    	<div class="row">
						    		<div class="col-md-6">
						    			<div class="well" style="padding-bottom: 5px; min-height: 162px;">
											<div class="row">
												<div class="col-md-6">
													<!-- Group -->
													<div class="control-group">
														<label for="fullname"><span data-bind="text: lang.lang.full_name"></span> <span style="color:red">*</span></label>
											            <input id="fullname" name="fullname" class="k-textbox marginBottom"
											            		data-bind="value: obj.name,
											            					disabled: obj.is_pattern,
											            					attr: { placeholder: phFullname }"
											              		required data-required-msg="required"
											              		style="width: 100%;" />
													</div>
												</div>

												<div class="col-md-6">
													<!-- Group -->
													<div class="control-group marginBottom">
														<label for="txtAbbr"><span data-bind="text: lang.lang.number"></span> <span style="color:red">*</span></label>
								              			<br>
								              			<input id="txtAbbr" name="txtAbbr" class="k-textbox"
									              				data-bind="value: obj.abbr,
									              						   disabled: obj.is_pattern"
									              				placeholder="eg. AB" required data-required-msg="required"
									              				style="width: 20%;" />
									              		-
									              		<input id="txtNumber" name="txtNumber"
									              			   class="k-textbox"
											                   data-bind="value: obj.number,
											                   			  disabled: obj.is_pattern,
											                   			  events:{change:checkExistingNumber}"
											                   placeholder="eg. 001" required data-required-msg="required"
											                   style="width: 74%" />
													</div>
													<!-- // Group END -->
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<!-- Group -->
													<div class="control-group">
														<label for="customerStatus"><span data-bind="text: lang.lang.status"></span> <span style="color:red">*</span></label>
											            <input id="customerStatus" name="customerStatus" class="marginBottom"
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

												<div class="col-md-6">
													<!-- Group -->
													<div class="control-group">
														<label for="registeredDate"><span data-bind="text: lang.lang.register_date"></span> <span style="color:red">*</span></label>
											            <input id="registeredDate" name="registeredDate" class="marginBottom"
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
									</div>
									<div class="col-md-6" style="margin-bottom: 15px;">
										<!-- <div class="row">
											
											<div id="map" class="col-md-12" style="height: 95px;"></div>
										</div>

										<div class="separator line bottom"></div>

										<div class="row">
											<div class="col-md-6">
												
												<div class="control-group">
									    			<label for="latitute"><span data-bind="text: lang.lang.latitute"></span> </label>
													<div class="input-prepend">
														<span class="add-on glyphicons direction"><i></i></span>
														<input type="text" class="input-large col-md-12" data-bind="value: obj.latitute, events:{change: loadMap}" placeholder="012345.67897">
													</div>
												</div>
											
											</div>

											<div class="col-md-6">
												
												<div class="control-group">
									    			<label for="longtitute"><span data-bind="text: lang.lang.longtitute"></span> </label>
									    			<div class="input-prepend">
														<span class="add-on glyphicons google_maps"><i></i></span>
														<input type="text" class="input-large col-md-12" data-bind="value: obj.longtitute, events:{change: loadMap}" placeholder="012345.67897">
													</div>
												</div>
												
											</div>
										</div> -->

										<div class="well" style="padding-bottom: 5px; margin-bottom: 0;">
											<div class="row">
												<div class="col-md-6">
													<!-- Group -->
													<div class="control-group">
														<p class="marginBottom" data-bind="text: lang.lang.vat_no"></p>
											            <input class="k-textbox marginBottom" data-bind="value: obj.vat_no"
														placeholder="e.g. 01234567897" style="width: 100%;" />
													</div>
												</div>

												<div class="col-md-6">
													<!-- Group -->
													<div class="control-group marginBottom">
														<p class="marginBottom" data-bind="text: lang.lang.phone"></p>
								              			<input class="k-textbox " data-bind="value: obj.phone" placeholder="e.g. 012 333 444" style="width: 100%;" />
													</div>
													<!-- // Group END -->
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<p class="marginBottom" data-bind="text: lang.lang.email"></p>
											        <input class="k-textbox marginBottom" data-bind="value: obj.email" placeholder="e.g. me@email.com" style="width: 100%;" />
												</div>
												<div class="col-md-6">
													<p class="marginBottom" data-bind="text: lang.lang.bill_to"></p>
											        <textarea rows="2" class="k-textbox marginBottom" data-bind="value: obj.memo" placeholder="memo ..." style="width: 100%;" ></textarea>
												</div>
											</div>

											<!-- <div class="row">
												<div class="col-md-6">
													<p class="marginBottom" data-bind="text: lang.lang.bill_to"></p>
											        <textarea rows="2" class="k-textbox marginBottom" data-bind="value: obj.memo" placeholder="memo ..." style="width: 100%;" ></textarea>
												</div>
											</div> -->

											
										</div>

									</div>
								</div>

								<!-- <div class="row">
									<div class="col-md-12 fontIcon17" style="margin-bottom: 15px;">
										<ul class="nav nav-tabs" role="tablist">
		                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#customerInfo" role="tab"><span class="hidden-xs-up marginRight"><i class="ti-id-badge"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.info"></span></a> </li>
		                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerInvoiceNote" role="tab"><span class="hidden-xs-up marginRight"><i class="ti-write"></i></span> <span class="hidden-xs-down">Invoice Note</span></a> </li>
		                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerImage" role="tab"><span class="hidden-xs-up marginRight"><i class="fa fa-picture-o"></i></span> <span class="hidden-xs-down">Image</span></a> </li>
		                                </ul>
		                                <div class="tab-content tabcontent-border" style="box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
		                                    <div class="tab-pane active" id="customerInfo" role="tabpanel">
		                                        <div class="p-10">
		                                        	<div class="row">
		                                        		<div class="col-md-2">
		                                        			<p class="marginBottom" data-bind="text: lang.lang.vat_no"></p>
		                                        		</div>
		                                        		<div class="col-md-4">
		                                        			<input class="k-textbox marginBottom" data-bind="value: obj.vat_no"
														placeholder="e.g. 01234567897" style="width: 100%;" />
		                                        		</div>
		                                        		<div class="col-md-2">
		                                        			<p class="marginBottom" data-bind="text: lang.lang.phone"></p>
		                                        		</div>
		                                        		<div class="col-md-4">
		                                        			<input class="k-textbox marginBottom" data-bind="value: obj.phone" placeholder="e.g. 012 333 444" style="width: 100%;" />
		                                        		</div>
		                                        	</div>

		                                        	<div class="row">
		                                        		<div class="col-md-2">
		                                        			<p class="marginBottom" data-bind="text: lang.lang.country"></p>
		                                        		</div>
		                                        		<div class="col-md-4">
		                                        			<input class="marginBottom" data-role="dropdownlist"
									              			   data-option-label="(--- Select ---)"
											                   data-value-primitive="true"
											                   data-text-field="name"
											                   data-value-field="id"
											                   data-bind="value: obj.country_id,
											                   source: countryDS" style="width: 100%;" />
		                                        		</div>
		                                        		<div class="col-md-2">
		                                        			<p class="marginBottom" data-bind="text: lang.lang.email"></p>
		                                        		</div>
		                                        		<div class="col-md-4">
		                                        			<input class="k-textbox marginBottom" data-bind="value: obj.email" placeholder="e.g. me@email.com" style="width: 100%;" />
		                                        		</div>
		                                        	</div>

		                                        	<div class="row">
		                                        		<div class="col-md-2">
		                                        			<p class="marginBottom" data-bind="text: lang.lang.city"></p>
		                                        		</div>
		                                        		<div class="col-md-4">
		                                        			<input class="k-textbox marginBottom" data-bind="value: obj.city" placeholder="city name ..." style="width: 100%;" />
		                                        		</div>
		                                        		<div class="col-md-2">
		                                        			<p class="marginBottom" data-bind="text: lang.lang.post_code"></p>
		                                        		</div>
		                                        		<div class="col-md-4">
		                                        			<input class="k-textbox marginBottom" data-bind="value: obj.post_code" placeholder="e.g. 12345" style="width: 100%;" />
		                                        		</div>
		                                        	</div>

		                                        	<div class="row">
		                                        		<div class="col-md-2">
		                                        			<p class="marginBottom" data-bind="text: lang.lang.address"></p>
		                                        		</div>
		                                        		<div class="col-md-4">
		                                        			<textarea class="k-textbox marginBottom" data-bind="value: obj.address" placeholder="where you live ..." style="width: 100%;" /></textarea>
		                                        		</div>
		                                        		<div class="col-md-2">
		                                        			<p class="marginBottom" data-bind="text: lang.lang.memo"></p>
		                                        		</div>
		                                        		<div class="col-md-4">
		                                        			<textarea rows="2" class="k-textbox marginBottom" data-bind="value: obj.memo" placeholder="memo ..." style="width: 100%;" ></textarea>
		                                        		</div>
		                                        	</div>

		                                        	<div class="row">
		                                        		<div class="col-md-2">
		                                        			<p class="marginBottom" data-bind="text: lang.lang.bill_to"></p>
		                                        		</div>
		                                        		<div class="col-md-4">
		                                        			<textarea class="k-textbox marginBottom" data-bind="value: obj.bill_to" placeholder="billed to ..." style="width: 100%;" /></textarea>
		                                        		</div>
		                                        		<div class="col-md-2">
		                                        			<p class="marginBottom" data-bind="text: lang.lang.delivered_to"></p>
		                                        		</div>
		                                        		<div class="col-md-4">
		                                        			<textarea rows="2" class="k-textbox marginBottom" data-bind="value: obj.ship_to" placeholder="delivered to ..." style="width: 100%;" ></textarea>
		                                        		</div>
		                                        	</div>

		                                        </div>
		                                    </div>
		                                    <div class="tab-pane" id="customerInvoiceNote" role="tabpanel">
		                                    	<div class="p-10">
		                                    		<div class="row">
		                                    			<div class="col-md-12">
		                                    				<textarea data-role="editor"
										                      data-tools="['bold',
										                                   'italic',
										                                   'underline',
										                                   'strikethrough',
										                                   'justifyLeft',
										                                   'justifyCenter',
										                                   'justifyRight',
										                                   'justifyFull']"
										                      data-bind="value: obj.invoice_note"></textarea>
		                                    			</div>
		                                    		</div>
		                                    	</div>
		                                    </div>
		                                    <div class="tab-pane" id="customerImage" role="tabpanel">
		                                    	<div class="p-10">
		                                    		<div class="row">
		                                    			<div class="col-md-12">
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
		                                    </div>
		                                </div>
		                            </div>
								</div> -->

								<div class="row">
									<div class="col-md-6">
						    			<div class="well" >
                            				<textarea data-role="editor"
						                      data-tools="['bold',
						                                   'italic',
						                                   'underline',
						                                   'strikethrough',
						                                   'justifyLeft',
						                                   'justifyCenter',
						                                   'justifyRight',
						                                   'justifyFull']"
						                      data-bind="value: obj.invoice_note" style="height: 186px;"></textarea>                                       	
										</div>
									</div>
									<div class="col-md-6">
						    			<div class="well" >
											<div class="row">
												<div class="col-md-12" style="text-align: center;">
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
									</div>
								</div>								

								<!-- Form actions -->
								<div class="backgroundButtonFooter">
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
										<div class="col-md-4" ></div>

										<div class="col-md-8" align="right">
											<span id="saveCancel" class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
											<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
											<!-- <button type="button" class="btn btn-info btn-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                        		<span data-bind="text: lang.lang.save_option"></span>
					                        </button>
					                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
					                            <a class="dropdown-item" id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></a>
					                            <a class="dropdown-item" id="savePrint"><span data-bind="text: lang.lang.save_print"></span></a>
					                        </div> -->
					                        <span class="btn-btn" id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></span>
										  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
										</div>
									</div>
								</div>
								<!-- // Form actions END -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<!-- End -->

<!-- Sale Order -->
<script id="saleOrder" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div id="example">
	        	<div class="row marginTop15">
	                <div class="col-md-12">
	                	<div class="card">
	                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
	                		<div class="card-body">
	                			<h2 data-bind="text: lang.lang.sale_order"></h2>

	                			<div class="row">
									<div class="col-md-4">
										<div class="box-generic">
											<table class="table table-borderless table-condensed cart_total">
												<tr>
													<td style="width: 25%;"><span data-bind="text: lang.lang.no_"></span></td>
													<td>
														<input id="txtNumber" name="txtNumber" class="k-textbox"
																data-bind="value: obj.number,
																			disabled: obj.is_recurring,
																			events:{change:checkExistingNumber}"
																required data-required-msg="required"
																placeholder="eg. ABC00001"/>
														<div class="coverQrcode">
															<a class="fa fa-qrcode" data-bind="click: generateNumber" title="Generate Number"><i></i></a>
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
																required data-required-msg="required"/>
													</td>
												</tr>
												<tr>
													<td><span data-bind="text: lang.lang.customers"></span></td>
													<td>
														<input id="cbbContact" name="cbbContact" style="width: 100%;"
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
											                   required data-required-msg="required"/>
													</td>
												</tr>
											</table>

											<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
												data-bind="style: {backgroundColor: amtDueColor}">
												<div align="left"><span data-bind="text: lang.lang.amount_ordered"></span></div>
												<h2 data-bind="text: total" align="right"></h2>
											</div>

										</div>
									</div>
									<div class="col-md-8">
										<div class="box-generic-noborder">
											<ul class="nav nav-tabs" role="tablist">
			                                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#functionSetting" role="tab" aria-selected="true"><span><i class="ti-settings"></i></span></a> </li>
			                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#functionPaperclip" role="tab" aria-selected="false"><span><i class="icon-paper-clip"></i></span></a></li>
			                                </ul>
			                                <div class="tab-content tabcontent-border">
			                                	<!--Tab Setting -->
			                                    <div class="tab-pane active show" id="functionSetting" role="tabpanel">
			                                        <div class="p-10">
			                                            <div class="row">
			                                            	<div class="col-md-12 ">
			                                            		<div class="row">
				                                            		<div class="col-md-6">
				                                            			<p class="marginBottom" data-bind="text: lang.lang.expected_date"></p>
													            		<input id="txtDueDate" name="txtDueDate" class="marginBottom"
																				data-role="datepicker"
																				data-format="dd-MM-yyyy"
																				data-parse-formats="yyyy-MM-dd"
																				data-bind="value: obj.due_date"
																				required data-required-msg="required"
																				/>

					                                            		
					                                            	</div>

					                                            	<div class="col-md-6">
					                                            		<p class="marginBottom width100" data-bind="text: lang.lang.billing_address"></p>
																		<textarea cols="0" rows="2" class="k-textbox marginBottom " data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>
					                                            		<!-- <p class="marginBottom" data-bind="text: lang.lang.sale_rep"></p>
																		<input id="cbbContact" name="cbbContact" class="marginBottom"
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
															                   style="width: 100%;" /> -->

																		<!-- <p class="marginBottom width100" data-bind="text: lang.lang.delivery_address"></p>
																		<textarea cols="0" rows="2" class="k-textbox marginBottom " data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea> -->
					                                            	</div>
			                                            		</div>
			                                            		
			                                            	</div>
			                                        	</div>
			                                        </div>
			                                    </div>
			                                    <!-- End -->

			                                    <!--Tab Paperclip -->
			                                    <div class="tab-pane" id="functionPaperclip" role="tabpanel">
			                                    	<div class="p-10">
			                                    		<div class="row">
			                                    			<div class="col-md-12">
			                                            		<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>
													            <input id="files" name="files"
												                   type="file"
												                   data-role="upload"
												                   data-show-file-list="false"
												                   data-bind="events: {
										                   				select: onSelect
												                   }">
												               	<div class="table-responsive marginTop">
														            <table class="table color-table dark-table">
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
			                                            	</div>
			                                    		</div>
			                                    	</div>  
			                                    </div>
			                                    <!-- End -->
			                                </div>
										</div>
									</div>						
								</div>

								<div class="row">
									<div class="col-md-12 table-responsive">
										<!-- Item List -->
										<div data-role="grid" class="costom-grid table color-table dark-table"
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
										        	var rowIndex = banhji.saleOrder.lineDS.indexOf(dataItem)+1;
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
				                            {
				                            	field: 'item_price',
				                            	title: 'UOM',
				                            	editor: measurementEditor,
				                            	template: '#=item_price?item_price.measurement:banhji.emptyString#',
				                            	width: '80px'
				                            },
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
						            </div>					            
								</div>

								<!-- Bottom part -->
					            <div class="row">
									<!-- Column -->
									<div class="col-md-4">
										<button class="btn waves-effect waves-light btn-block btn-info btnPlus marginRight" data-bind="click: addRow"><i class="ti-plus"></i></button>
										<button class="btn waves-effect waves-light btn-block btn-info btnBarcode marginRight" data-bind="click: openBarcodeWindow" ><i class="fa fa-barcode marginRight"></i>Barcode</button>
										
										<!-- Add New Item -->
										<button type="button" class="btn btn-info dropdown-toggle btnBackgroundBlack" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                        	<span data-bind="text: lang.lang.add_new_item"></span>
				                        </button>
				                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
				                            <a class="dropdown-item" href='items#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a>
				                            <a class="dropdown-item" href='items#/item_service'><span data-bind="text: lang.lang.add_services"></span></a>
				                        </div>

										<!--End Add New Item -->
										<div class="well marginTop15">
											<textarea cols="0" rows="2" class="k-textbox" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
											<!-- <br>
											<textarea cols="0" rows="2" class="k-textbox" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea> -->
										</div>

									</div>
									<!-- Column END -->

									<!-- Column -->
									<div class="col-md-4" align="center">
										<div data-bind="visible: isEdit" style="margin-top: 10%;">
											<h2 data-bind="text: statusObj.text" style="text-transform: uppercase;"></h2>
											<p data-bind="text: statusObj.date"></p>
											<a data-bind="text: statusObj.number,
														attr: { href: statusObj.url }"></a>
										</div>
									</div>
									<!-- Column END -->

									<!-- Column -->
									<div class="col-md-4 table-responsive">
										<table class="table color-table dark-table">
											<tbody>
												<tr>
													<td class="textAlignRight" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
													<td class="textAlignRight" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
												</tr>
												<tr>
													<td class="textAlignRight"><span data-bind="text: lang.lang.total_discount"></span></td>
													<td class="textAlignRight ">
														<span data-format="n" data-bind="text: obj.discount"></span>
				                   					</td>
												</tr>
												<tr>
													<td class="textAlignRight"><span data-bind="text: lang.lang.total_tax"></span></td>
													<td class="textAlignRight "><span data-format="n" data-bind="text: obj.tax"></span></td>
												</tr>
												<tr>
													<td class="textAlignRight"><h4 span data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
													<td class="textAlignRight"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
												</tr>
											</tbody>
										</table>
									</div>
									<!-- // Column END -->

								</div>

								<!-- Form actions -->
								<div class="backgroundButtonFooter">
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
										<div class="col-md-4" >
											<input data-role="dropdownlist"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.transaction_template_id,
								                              source: txnTemplateDS"
								                   data-option-label="Select Template..." />

										</div>
										<div class="col-md-8" align="right">
											<span id="saveCancel" class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
											<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
											<button type="button" class="btn btn-info btn-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                        		<span data-bind="text: lang.lang.save_option"></span>
					                        </button>
					                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
					                            <a class="dropdown-item" id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></a>
					                            <a class="dropdown-item" id="savePrint"><span data-bind="text: lang.lang.save_print"></span></a>
					                        </div>
										  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
										  	<span class="btn-btn" id="saveDraft1" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_draft"></span></span>
										</div>
									</div>
								</div>
								<!-- // Form actions END -->

								<!-- Window Barcode -->
								<div data-role="window"
					                 data-title="Barcode"
					                 data-width="600"
					                 data-height="400"
					                 data-iframe="true"
					                 data-modal="true"
					                 data-visible="false"
					                 data-position="{top:'30%',left:'30%'}"
					                 data-actions="{}"
					                 data-resizable="false"
					                 data-bind="visible: barcodeVisible"
					                 style="text-align:center;">
					                <div class="table-responsive">
						                <table class="table color-table dark-table cart_total">
							        		<tr>
							        			<td>
							        				<input type="text" class="k-textbox"
							        						data-bind="value: barcode,
							        									events: {change: searchByBarcode}"
							        						placeholder="Scan barcode ..." style="width: 100%;" />
							        			</td>
							        			<td>
							        				<input id="ddlCategory" id="ddlCategory"
													   data-role="dropdownlist"
													   data-option-label="Select Category..."
													   data-header-template="item-category-header-tmpl"
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: category_id,
									                              source: categoryDS,
									                              events: {change: search}"
									                   style="width: 100%;" />
							        			</td>
							        			<td>
							        				<input id="ddlItemGroup" id="ddlItemGroup"
													   data-role="dropdownlist"
													   data-header-template="item-group-header-tmpl"
													   data-option-label="Select Group..."
													   data-cascade-from="ddlCategory"
													   data-cascade-from-field="category_id"
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: item_group_id,
									                              source: itemGroupDS,
									                              events: {change: search}"
									                   style="width: 100%;" />
							        			</td>
							        		</tr>
							        	</table>
							        </div>

							        <div class="table-responsive">
						        		<div data-role="grid" class="table color-table dark-table"
						                 data-auto-bind="false"
						                 data-columns='[
			                                { field: "number", title: "NUMBER", template:"#=abbr##=number#" },
			                                { field: "name", title: "NAME" },
			                                { field: "category", title: "CATEGORY" },
			                                { title: "", template:"<button class=k-button data-bind=click:addSearchItem style=min-width:30px><i class=icon-plus></i></button>", width:"50px" }
			                             ]'
						                 data-bind="source: itemDS"
						                 style="height: 212px;"></div>
						            </div>

						            <div id="pager" class="k-pager-wrap"
							             data-role="pager"
							             data-auto-bind="false"
										 data-bind="source: itemDS"></div>

									<div class="backgroundButtonFooter">
										<div class="row">
											<div >
												<span class="btn-btn" data-bind="click: closeBarcodeWindow"><i></i> <span data-bind="text: lang.lang.close"></span></span>
											</div>
										</div>
									</div>
					            </div>
					            <!-- // End Window Barcode -->

				            </div>
	                	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>


<!-- Quote -->
<script id="quote" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div id="example">
	        	<div class="row marginTop15">
	                <div class="col-md-12">
	                	<div class="card">
	                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
	                		<div class="card-body">
	                			<h2 data-bind="text: lang.lang.quote"></h2>

	                			<div class="row">
									<div class="col-md-4">
										<div class="box-generic">
											<table class="table table-borderless table-condensed cart_total">
												<tr>
													<td style="width: 25%;"><span data-bind="text: lang.lang.no_"></span></td>
													<td>
														<input id="txtNumber" name="txtNumber" class="k-textbox"
																data-bind="value: obj.number,
																			disabled: obj.is_recurring,
																			events:{change:checkExistingNumber}"
																required data-required-msg="required"
																placeholder="eg. ABC00001"/>
														<div class="coverQrcode">
															<a class="fa fa-qrcode" data-bind="click: generateNumber" title="Generate Number"><i></i></a>
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
																required data-required-msg="required"/>
													</td>
												</tr>
												<tr>
													<td><span data-bind="text: lang.lang.customers"></span></td>
													<td>
														<input id="cbbContact" name="cbbContact" style="width: 100%;"
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
											                   required data-required-msg="required"/>
													</td>
												</tr>
											</table>

											<div class="strong" data-bind="style: { backgroundColor: amtDueColor}">
												<div align="left" data-bind="text: lang.lang.amount_quoted"></div>
												<h2 data-bind="text: total" align="right"></h2>
											</div>

										</div>
									</div>
									<div class="col-md-8">
										<div class="box-generic-noborder">
											<ul class="nav nav-tabs" role="tablist">
			                                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#functionSetting" role="tab" aria-selected="true"><span><i class="ti-settings"></i></span></a> </li>
			                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#functionPaperclip" role="tab" aria-selected="false"><span><i class="icon-paper-clip"></i></span></a></li>
			                                </ul>
			                                <div class="tab-content tabcontent-border">
			                                	<!--Tab Setting -->
			                                    <div class="tab-pane active show" id="functionSetting" role="tabpanel">
			                                        <div class="p-10">
			                                            <div class="row">
			                                            	<div class="col-md-12 ">
			                                            		<div class="row">
				                                            		<div class="col-md-6">
				                                            			<p class="marginBottom" data-bind="text: lang.lang.validity_date"></p>
				                                            			<input id="txtDueDate" name="txtDueDate" class="marginBottom"
																						data-role="datepicker"
																						data-format="dd-MM-yyyy"
																						data-parse-formats="yyyy-MM-dd"
																						data-bind="value: obj.due_date"
																						required data-required-msg="required"
																						/>

					                                            		<p class="marginBottom width100" data-bind="text: lang.lang.billing_address"></p>
																		<textarea cols="0" rows="2" class="k-textbox marginBottom " data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>
					                                            	</div>

					                                            	<div class="col-md-6">
					                                            		<p class="marginBottom" data-bind="text: lang.lang.term"></p>
					                                            		<input data-role="dropdownlist" class="marginBottom"
															              				data-value-primitive="true"
																						data-text-field="name"
															              				data-value-field="id"
															              				data-header-template='customer-term-header-tmpl'
															              				data-bind="value: obj.payment_term_id,
															              							source: paymentTermDS,
															              							events:{ change: setTerm }"
															              				data-option-label="Select Term..."
															              				 />
															              				 
																		<p class="marginBottom width100" data-bind="text: lang.lang.delivery_address"></p>
																		<textarea cols="0" rows="2" class="k-textbox marginBottom " data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea>
					                                            	</div>
			                                            		</div>
			                                            		
			                                            	</div>
			                                        	</div>
			                                        </div>
			                                    </div>
			                                    <!-- End -->

			                                    <!--Tab Paperclip -->
			                                    <div class="tab-pane" id="functionPaperclip" role="tabpanel">
			                                    	<div class="p-10">
			                                    		<div class="row">
			                                    			<div class="col-md-12">
			                                            		<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>
													            <input id="files" name="files"
												                   type="file"
												                   data-role="upload"
												                   data-show-file-list="false"
												                   data-bind="events: {
										                   				select: onSelect
												                   }">
												               	<div class="table-responsive marginTop">
														            <table class="table color-table dark-table">
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
			                                            	</div>
			                                    		</div>
			                                    	</div>  
			                                    </div>
			                                    <!-- End -->
			                                </div>
										</div>
									</div>						
								</div>

								<div class="row">
									<div class="col-md-12 table-responsive">
										<!-- Item List -->
										<div data-role="grid" class="costom-grid table color-table dark-table"
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
										        	var rowIndex = banhji.quote.lineDS.indexOf(dataItem)+1;
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
				                            {
				                            	field: 'item_price',
				                            	title: 'UOM',
				                            	editor: measurementEditor,
				                            	template: '#=item_price?item_price.measurement:banhji.emptyString#',
				                            	width: '80px'
				                            },
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
						            </div>					            
								</div>

								<!-- Bottom part -->
					            <div class="row">
									<!-- Column -->
									<div class="col-md-4">
										<button class="btn waves-effect waves-light btn-block btn-info btnPlus marginRight" data-bind="click: addRow"><i class="ti-plus"></i></button>
										<button class="btn waves-effect waves-light btn-block btn-info btnBarcode marginRight" data-bind="click: openBarcodeWindow" ><i class="fa fa-barcode marginRight"></i>Barcode</button>
										
										<!-- Add New Item -->
										<button type="button" class="btn btn-info dropdown-toggle btnBackgroundBlack" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                        	<span data-bind="text: lang.lang.add_new_item"></span>
				                        </button>
				                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
				                            <a class="dropdown-item" href='items#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a>
				                            <a class="dropdown-item" href='items#/item_service'><span data-bind="text: lang.lang.add_services"></span></a>
				                        </div>

										<!--End Add New Item -->
										<div class="well marginTop15">
											<textarea cols="0" rows="2" class="k-textbox marginBottom" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
											<br>
											<textarea cols="0" rows="2" class="k-textbox" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
										</div>

									</div>
									<!-- Column END -->

									<!-- Column -->
									<div class="col-md-4" align="center">
										<div data-bind="visible: isEdit" style="margin-top: 10%;">
											<h2 data-bind="text: statusObj.text" style="text-transform: uppercase;"></h2>
											<p data-bind="text: statusObj.date"></p>
											<a data-bind="text: statusObj.number,
														attr: { href: statusObj.url }"></a>
										</div>
									</div>
									<!-- Column END -->

									<!-- Column -->
									<div class="col-md-4 table-responsive">
										<table class="table color-table dark-table">
											<tbody>
												<tr>
													<td class="textAlignRight" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
													<td class="textAlignRight" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
												</tr>
												<tr>
													<td class="textAlignRight"><span data-bind="text: lang.lang.total_discount"></span></td>
													<td class="textAlignRight ">
														<span data-format="n" data-bind="text: obj.discount"></span>
				                   					</td>
												</tr>
												<tr>
													<td class="textAlignRight"><span data-bind="text: lang.lang.total_tax"></span></td>
													<td class="textAlignRight "><span data-format="n" data-bind="text: obj.tax"></span></td>
												</tr>
												<tr>
													<td class="textAlignRight"><h4 span data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
													<td class="textAlignRight"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
												</tr>
											</tbody>
										</table>
									</div>
									<!-- // Column END -->

								</div>

								<!-- Form actions -->
								<div class="backgroundButtonFooter">
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
										<div class="col-md-4" >
											<input data-role="dropdownlist"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.transaction_template_id,
								                              source: txnTemplateDS"
								                   data-option-label="Select Template..." />

										</div>
										<div class="col-md-8" align="right">
											<span id="saveCancel" class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
											<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
											<button type="button" class="btn btn-info btn-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                        		<span data-bind="text: lang.lang.save_option"></span>
					                        </button>
					                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
					                            <a class="dropdown-item" id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></a>
					                            <a class="dropdown-item" id="savePrint"><span data-bind="text: lang.lang.save_print"></span></a>
					                        </div>
										  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
										  	<span class="btn-btn" id="saveDraft1" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_draft"></span></span>
										</div>
									</div>
								</div>
								<!-- // Form actions END -->

								<!-- Window Barcode -->
								<div data-role="window"
					                 data-title="Barcode"
					                 data-width="600"
					                 data-height="400"
					                 data-iframe="true"
					                 data-modal="true"
					                 data-visible="false"
					                 data-position="{top:'30%',left:'30%'}"
					                 data-actions="{}"
					                 data-resizable="false"
					                 data-bind="visible: barcodeVisible"
					                 style="text-align:center;">
					                <div class="table-responsive">
						                <table class="table color-table dark-table cart_total">
							        		<tr>
							        			<td>
							        				<input type="text" class="k-textbox"
							        						data-bind="value: barcode,
							        									events: {change: searchByBarcode}"
							        						placeholder="Scan barcode ..." style="width: 100%;" />
							        			</td>
							        			<td>
							        				<input id="ddlCategory" id="ddlCategory"
													   data-role="dropdownlist"
													   data-option-label="Select Category..."
													   data-header-template="item-category-header-tmpl"
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: category_id,
									                              source: categoryDS,
									                              events: {change: search}"
									                   style="width: 100%;" />
							        			</td>
							        			<td>
							        				<input id="ddlItemGroup" id="ddlItemGroup"
													   data-role="dropdownlist"
													   data-header-template="item-group-header-tmpl"
													   data-option-label="Select Group..."
													   data-cascade-from="ddlCategory"
													   data-cascade-from-field="category_id"
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: item_group_id,
									                              source: itemGroupDS,
									                              events: {change: search}"
									                   style="width: 100%;" />
							        			</td>
							        		</tr>
							        	</table>
							        </div>

							        <div class="table-responsive">
						        		<div data-role="grid" class="table color-table dark-table"
						                 data-auto-bind="false"
						                 data-columns='[
			                                { field: "number", title: "NUMBER", template:"#=abbr##=number#" },
			                                { field: "name", title: "NAME" },
			                                { field: "category", title: "CATEGORY" },
			                                { title: "", template:"<button class=k-button data-bind=click:addSearchItem style=min-width:30px><i class=icon-plus></i></button>", width:"50px" }
			                             ]'
						                 data-bind="source: itemDS"
						                 style="height: 212px;"></div>
						            </div>

						            <div id="pager" class="k-pager-wrap"
							             data-role="pager"
							             data-auto-bind="false"
										 data-bind="source: itemDS"></div>

									<div class="backgroundButtonFooter">
										<div class="row">
											<div >
												<span class="btn-btn" data-bind="click: closeBarcodeWindow"><i></i> <span data-bind="text: lang.lang.close"></span></span>
											</div>
										</div>
									</div>
					            </div>
					            <!-- // End Window Barcode -->

				            </div>
	                	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<!-- End -->

<!-- Customer Deposit -->
<script id="customerDeposit" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div id="example">
	        	<div class="row marginTop15">
	                <div class="col-md-12">
	                	<div class="card">
	                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
	                		<div class="card-body">
	                			<h2 data-bind="text: lang.lang.customer_deposit"></h2>

	                			<div class="row">
									<div class="col-md-4">
										<div class="box-generic">
											<table class="table table-borderless table-condensed cart_total">
												<tr>
													<td style="width: 25%;"><span data-bind="text: lang.lang.no_"></span></td>
													<td>
														<input id="txtNumber" name="txtNumber" class="k-textbox"
																data-bind="value: obj.number,
																			disabled: obj.is_recurring,
																			events:{change:checkExistingNumber}"
																required data-required-msg="required"
																placeholder="eg. ABC00001"/>
														<div class="coverQrcode">
															<a class="fa fa-qrcode" data-bind="click: generateNumber" title="Generate Number"><i></i></a>
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
																required data-required-msg="required"/>
													</td>
												</tr>
												<tr>
													<td><span data-bind="text: lang.lang.customers"></span></td>
													<td>
														<input id="cbbContact" name="cbbContact" style="width: 100%;"
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
											                   required data-required-msg="required"/>
													</td>
												</tr>
											</table>

											<div class="strong" data-bind="style: { backgroundColor: amtDueColor}">
												<div align="left" data-bind="text: lang.lang.amount_quoted"></div>
												<h2 data-bind="text: total" align="right"></h2>
											</div>

										</div>
									</div>
									<div class="col-md-8">
										<div class="box-generic-noborder">
											<ul class="nav nav-tabs" role="tablist">
			                                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#functionSetting" role="tab" aria-selected="true"><span><i class="ti-settings"></i></span></a> </li>
			                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#functionPaperclip" role="tab" aria-selected="false"><span><i class="icon-paper-clip"></i></span></a> </li>
			                                </ul>
			                                <div class="tab-content tabcontent-border">
			                                	<!--Tab Setting -->
			                                    <div class="tab-pane active show" id="functionSetting" role="tabpanel">
			                                        <div class="p-10">
			                                            <div class="row">
			                                            	<div class="col-md-12 ">
			                                            		<div class="row">
				                                            		<div class="col-md-6">
				                                            			<p class="marginBottom" data-bind="text: lang.lang.deposit_to"></p>
				                                            			<input id="cbbAccount" name="cbbAccount" class="marginBottom"
																			   data-role="combobox"
															                   data-value-primitive="true"
															                   data-header-template="account-header-tmpl"
															                   data-template="account-list-tmpl"
															                   data-text-field="name"
															                   data-value-field="id"
															                   data-bind="value: obj.account_id,
															                   			  source: depositAccountDS"
															                   data-placeholder="Add Account.."
															                   required data-required-msg="required" />

					                                            		
					                                            	</div>

					                                            	<div class="col-md-6">
					                                            		<p class="marginBottom" data-bind="text: lang.lang.reference"></p>
					                                            		<input data-role="combobox" class="marginBottom"
																			data-template="reference-list-tmpl"
												              				data-value-primitive="true"
																            data-auto-bind="false"
																            data-filter="startswith"
																			data-text-field="number"
												              				data-value-field="id"
												              				data-bind="value: obj.reference_id,
												              							enabled: enableRef,
												              							source: referenceDS,
												              							events:{change: referenceChanges}"
															              				 />
															              				 
																		
					                                            	</div>			                                            			
			                                            		</div>
			                                            		
			                                            	</div>
			                                        	</div>
			                                        </div>
			                                    </div>
			                                    <!-- End -->

			                                    <!--Tab Paperclip -->
			                                    <div class="tab-pane" id="functionPaperclip" role="tabpanel">
			                                    	<div class="p-10">
			                                    		<div class="row">
			                                    			<div class="col-md-12">
			                                            		<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>
													            <input id="files" name="files"
												                   type="file"
												                   data-role="upload"
												                   data-show-file-list="false"
												                   data-bind="events: {
										                   				select: onSelect
												                   }">
												               	<div class="table-responsive marginTop">
														            <table class="table color-table dark-table">
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
			                                            	</div>
			                                    		</div>
			                                    	</div>  
			                                    </div>
			                                    <!-- End -->
			                                </div>
										</div>
									</div>						
								</div>

								<div class="row">
									<div class="col-md-12 table-responsive">
										<!-- Item List -->
								    	<table class="table color-table dark-table">
									        <thead>
									            <tr>
									                <th data-bind="text: lang.lang.no_"></th>
									                <th data-bind="text: lang.lang.account"></th>
									                <th data-bind="text: lang.lang.description"></th>
									                <th data-bind="text: lang.lang.reference"></th>
									                <th data-bind="text: lang.lang.amount"></th>
									            </tr>
									        </thead>
									        <tbody data-role="listview"
									        		data-template="customerDeposit-template"
									        		data-auto-bind="false"
									        		data-bind="source: lineDS"></tbody>
									    </table>
						            </div>					            
								</div>

								<!-- Bottom part -->
					            <div class="row">
									<!-- Column -->
									<div class="col-md-6">
										<button class="btn waves-effect waves-light btn-block btn-info btnPlus marginRight" data-bind="click: addRow"><i class="ti-plus"></i></button>
										<a href="<?php echo base_url()?>rrd#/account" class="btn waves-effect waves-light btn-block btn-info btnAddAccount"><i class="icon-user-follow marginRight"></i>Add Account</a>
									</div>
									<!-- Column END -->

									<!-- Column -->
									<div class="col-md-6 table-responsive customerDeposit">
										<table class="table color-table dark-table ">
											<tbody>
												<tr>
													<td class="textAlignRight" style="width: 60%"><span data-bind="text: lang.lang.total" style="font-size: 15px; font-weight: 700;"></span>:</td>
													<td class="textAlignRight "><span data-bind="text: total" style="font-size: 15px; font-weight: 700;"></span></td>
												</tr>
											</tbody>
										</table>
									</div>
									<!-- // Column END -->

								</div>

								<!-- Form actions -->
								<div class="backgroundButtonFooter">
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
										<div class="col-md-4" >
											<input data-role="dropdownlist"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.transaction_template_id,
								                              source: txnTemplateDS"
								                   data-option-label="Select Template..." />

										</div>
										<div class="col-md-8" align="right">
											<span id="saveCancel" class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
											<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
											<button type="button" class="btn btn-info btn-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                        		<span data-bind="text: lang.lang.save_option"></span>
					                        </button>
					                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
					                            <a class="dropdown-item" id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></a>
					                            <a class="dropdown-item" id="savePrint"><span data-bind="text: lang.lang.save_print"></span></a>
					                        </div>
										  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
										  	<!-- <span class="btn-btn" id="saveDraft1" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_draft"></span></span> -->
										</div>
									</div>
								</div>
								<!-- // Form actions END -->
								
				            </div>
	                	</div>					
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerDeposit-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td class="center">
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.customerDeposit.lineDS.indexOf(data)+1#
		</td>
		<td>
			<input id="cbbAccounts" name="cbbAccounts"
				   data-role="combobox"
                   data-header-template="account-header-tmpl"
                   data-template="account-list-tmpl"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: account_id,
                              source: accountDS"
                   data-placeholder="Add Account.."
                   required data-required-msg="required" style="width: 100%" />
		</td>
		<td>
			<input name="description"
					type="text" class="k-textbox"
					data-bind="value: description"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>
			<input type="text" class="k-textbox"
					data-bind="value: reference_no"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>
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
<!-- End -->

<!-- Invoice -->
<script id="invoice" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div id="example">
	        	<div class="row marginTop15">
	                <div class="col-md-12">
	                	<div class="card">
	                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
	                		<div class="card-body">
	                			<h2 data-bind="text: lang.lang.invoice"></h2>

	                			<div class="row">
									<div class="col-md-4">
										<div class="box-generic">
											<table class="table table-borderless table-condensed cart_total">
												<tr>
													<td style="width: 25%;"><span data-bind="text: lang.lang.no_"></span></td>
													<td>
														<input id="txtNumber" name="txtNumber" class="k-textbox"
																data-bind="value: obj.number,
																	disabled: obj.is_recurring,
																	events:{change:checkExistingNumber}"
																required data-required-msg="required"
																placeholder="eg. ABC00001"/>
														<div class="coverQrcode">
															<a class="fa fa-qrcode" data-bind="click: generateNumber" title="Generate Number"><i></i></a>
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
																required data-required-msg="required"/>
													</td>
												</tr>
												<tr>
													<td><span data-bind="text: lang.lang.type"></span></td>
													<td>
														<input id="cbbType" name="cbbType" style="width: 100%" 
															   data-role="dropdownlist"
											                   data-value-primitive="true"
											                   data-text-field="type"
											                   data-value-field="type"
											                   data-bind="value: obj.type,
											                              source: typeList,
											                              events:{ change: typeChanges }"
											                   required data-required-msg="required" />
													</td>
												</tr>
												<tr>
													<td><span data-bind="text: lang.lang.customers"></span></td>
													<td>
														<input id="cbbContact" name="cbbContact" style="width: 100%" 
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
										                   required data-required-msg="required"/>
													</td>
												</tr>
											</table>

											<div class="strong" data-bind="style: { backgroundColor: amtDueColor}">
												<div align="left" data-bind="text: lang.lang.amount_due"></div>
												<h2 data-bind="text: total" align="right"></h2>
											</div>

										</div>
									</div>
									<div class="col-md-8">
										<div class="box-generic-noborder">
											<ul class="nav nav-tabs" role="tablist">
			                                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#functionSetting" role="tab" aria-selected="true"><span><i class="ti-settings"></i></span></a> </li>
			                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#functionLink" role="tab" aria-selected="false"><span><i class="ti-link"></i></span></a></li>
			                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#functionPaperclip" role="tab" aria-selected="false"><span><i class="icon-paper-clip"></i></span></a></li>
			                                    
			                                </ul>
			                                <div class="tab-content tabcontent-border">
			                                	<!--Tab Setting -->
			                                    <div class="tab-pane active show" id="functionSetting" role="tabpanel">
			                                        <div class="p-10">
			                                            <div class="row">
			                                            	<div class="col-md-12 ">
			                                            		<div class="row">
				                                            		<div class="col-md-6">
				                                            			<p class="marginBottom" data-bind="text: lang.lang.term"></p>
				                                            			<input class="marginBottom" data-role="dropdownlist"
													              				data-value-primitive="true"
																				data-text-field="name"
													              				data-value-field="id"
													              				data-header-template='customer-term-header-tmpl'
													              				data-bind="value: obj.payment_term_id,
													              							source: paymentTermDS,
													              							events:{ change: setTerm }"
													              				data-option-label="Select Term..."
																						/>
																		<p class="marginBottom" data-bind="text: lang.lang.payment_method"></p>
				                                            			<input class="marginBottom" data-role="dropdownlist"
													              				data-value-primitive="true"
													              				data-header-template="customer-payment-method-header-tmpl"
																				data-text-field="name"
													              				data-value-field="id"
													              				data-bind="value: obj.payment_method_id,
													              							source: paymentMethodDS"
													              				data-option-label="Select method..."
																						/>

					                                            		
					                                            	</div>

					                                            	<div class="col-md-6">
					                                            		<p class="marginBottom" data-bind="text: lang.lang.due_date"></p>
					                                            		<input class="marginBottom" id="txtDueDate" name="txtDueDate"
																				data-role="datepicker"
																				data-format="dd-MM-yyyy"
																				data-parse-formats="yyyy-MM-dd"
																				data-bind="value: obj.due_date"
																				required data-required-msg="required"
															              				 />
															            <p class="marginBottom width100" data-bind="text: lang.lang.billing_address"></p>
																		<textarea cols="0" rows="2" class="k-textbox marginBottom " data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>

															            <!-- <p class="marginBottom" data-bind="text: lang.lang.trade_discount"></p>
					                                            		<input class="marginBottom" id="ddlDiscountAccount" name="ddlDiscountAccount"
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
															              				 /> -->
															              				 
																		<!-- <p class="marginBottom width100" data-bind="text: lang.lang.delivery_address"></p>
																		<textarea cols="0" rows="2" class="k-textbox marginBottom " data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea> -->
					                                            	</div>
			                                            		</div>
			                                            		
			                                            	</div>
			                                        	</div>
			                                        </div>
			                                    </div>
			                                    <!-- End -->

			                                    <!--Tab -->
			                                    <div class="tab-pane " id="functionLink" role="tabpanel">
			                                        <div class="p-10">
			                                            <div class="row">
			                                            	<div class="col-md-12 ">
			                                            		<p class="marginBottom" data-bind="text: lang.lang.reference"></p>
		                                            			<input class="marginBottom" data-role="dropdownlist"
										            			   data-item-template="reference-list-tmpl"
												                   data-auto-bind="false"
												                   data-value-primitive="true"
												                   data-filter="startswith"
												                   data-text-field="number"
												                   data-value-field="id"
												                   data-bind="value: reference_id,
												                              source: referenceDS,
												                              events: { change: referenceChanges }"
												                   data-option-label="Add Reference..."
												                   style="width: 100%;"
																/>

			                                            		<div class="table-responsive marginTop">
														            <table class="table color-table dark-table">
																        <tbody data-template="invoice-reference-template"
												        		data-bind="source: obj.references"></tbody>
																    </table>
																</div>
			                                            	</div>
			                                        	</div>
			                                        </div>
			                                    </div>
			                                    <!-- End -->

			                                    <!--Tab Paperclip -->
			                                    <div class="tab-pane" id="functionPaperclip" role="tabpanel">
			                                    	<div class="p-10">
			                                    		<div class="row">
			                                    			<div class="col-md-12">
			                                            		<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>
													            <input id="files" name="files"
												                   type="file"
												                   data-role="upload"
												                   data-show-file-list="false"
												                   data-bind="events: {
										                   				select: onSelect
												                   }">
												               	<div class="table-responsive marginTop">
														            <table class="table color-table dark-table">
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
			                                            	</div>
			                                    		</div>
			                                    	</div>  
			                                    </div>
			                                    <!-- End -->

			                                    
			                                </div>
										</div>
									</div>						
								</div>

								<div class="row">
									<div class="col-md-12 table-responsive">
										<!-- Item List -->
										<div data-role="grid" class="costom-grid table color-table dark-table"
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
				                            {
				                            	field: 'item_price',
				                            	title: 'UOM',
				                            	editor: measurementEditor,
				                            	template: '#=item_price?item_price.measurement:banhji.emptyString#',
				                            	width: '80px'
				                            },
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
						            </div>					            
								</div>

								<!-- Bottom part -->
					            <div class="row">
									<!-- Column -->
									<div class="col-md-4">
										<button class="btn waves-effect waves-light btn-block btn-info btnPlus marginRight" data-bind="click: addRow"><i class="ti-plus"></i></button>
										<button class="btn waves-effect waves-light btn-block btn-info btnBarcode marginRight" data-bind="click: openBarcodeWindow" ><i class="fa fa-barcode marginRight"></i>Barcode</button>
										
										<!-- Add New Item -->
										<button type="button" class="btn btn-info dropdown-toggle btnBackgroundBlack" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                        	<span data-bind="text: lang.lang.add_new_item"></span>
				                        </button>
				                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
				                            <a class="dropdown-item" href='items#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a>
				                            <a class="dropdown-item" href='items#/item_service'><span data-bind="text: lang.lang.add_services"></span></a>
				                        </div>

										<!--End Add New Item -->
										<div class="well marginTop15">
											<textarea cols="0" rows="2" class="k-textbox" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
											<!-- <br>
											<textarea cols="0" rows="2" class="k-textbox" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea> -->
										</div>

									</div>
									<!-- Column END -->

									<!-- Column -->
									<div class="col-md-4" align="center">
										<div data-bind="visible: isEdit" style="margin-top: 10%;">
											<h2 data-bind="text: statusObj.text" style="text-transform: uppercase;"></h2>
											<p data-bind="text: statusObj.date"></p>
											<a data-bind="text: statusObj.number,
														attr: { href: statusObj.url }"></a>
										</div>
									</div>
									<!-- Column END -->

									<!-- Column -->
									<div class="col-md-4 table-responsive">
										<table class="table color-table dark-table">
											<tbody>
												<tr>
													<td class="textAlignRight" style="width: 60%"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
													<td class="textAlignRight"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
												</tr>
												<tr>
													<td class="textAlignRight"><span data-bind="text: lang.lang.total_discount"></span></td>
													<td class="textAlignRight"><span data-format="n" data-bind="text: obj.discount"></span></td>
												</tr>
												<tr>
													<td class="textAlignRight"><span data-bind="text: lang.lang.total_tax"></span></td>
													<td class="textAlignRight"><span data-format="n" data-bind="text: obj.tax"></span></td>
												</tr>
												<tr>
													<td class="textAlignRight"><h4 data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
													<td class="textAlignRight"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
												</tr>
												<tr>
													<td class="textAlignRight">
														<span data-bind="text: lang.lang.deposit"></span>
														<span data-format="n" data-bind="text: total_deposit"></span>
													</td>
													<td class="textAlignRight">
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
													<td class="textAlignRight">
														<span data-bind="text: lang.lang.remaining" style="font-size: 15px; font-weight: 700;"></span>
													</td>
													<td class="textAlignRight">
														<span data-format="n" data-bind="text: obj.remaining" style="font-size: 15px; font-weight: 700;"></span>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<!-- // Column END -->

								</div>

								<!-- Form actions -->
								<div class="backgroundButtonFooter">
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
										<div class="col-md-4" >
											<input data-role="dropdownlist"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.transaction_template_id,
								                              source: txnTemplateDS"
								                   data-option-label="Select Template..." />

										</div>
										<div class="col-md-8" align="right">
											<span id="saveCancel" class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
											<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
											<button type="button" class="btn btn-info btn-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                        		<span data-bind="text: lang.lang.save_option"></span>
					                        </button>
					                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
					                            <a class="dropdown-item" id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></a>
					                            <a class="dropdown-item" id="savePrint"><span data-bind="text: lang.lang.save_print"></span></a>
					                        </div>
										  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
										  	<span class="btn-btn" id="saveDraft1" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_draft"></span></span>
										</div>
									</div>
								</div>
								<!-- // Form actions END -->

								<!-- Window Barcode -->
								<div data-role="window"
					                 data-title="Barcode"
					                 data-width="600"
					                 data-height="400"
					                 data-iframe="true"
					                 data-modal="true"
					                 data-visible="false"
					                 data-position="{top:'30%',left:'30%'}"
					                 data-actions="{}"
					                 data-resizable="false"
					                 data-bind="visible: barcodeVisible"
					                 style="text-align:center;">
					                <div class="table-responsive">
						                <table class="table color-table dark-table cart_total">
							        		<tr>
							        			<td>
							        				<input type="text" class="k-textbox"
							        						data-bind="value: barcode,
							        									events: {change: searchByBarcode}"
							        						placeholder="Scan barcode ..." style="width: 100%;" />
							        			</td>
							        			<td>
							        				<input id="ddlCategory" id="ddlCategory"
													   data-role="dropdownlist"
													   data-option-label="Select Category..."
													   data-header-template="item-category-header-tmpl"
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: category_id,
									                              source: categoryDS,
									                              events: {change: search}"
									                   style="width: 100%;" />
							        			</td>
							        			<td>
							        				<input id="ddlItemGroup" id="ddlItemGroup"
													   data-role="dropdownlist"
													   data-header-template="item-group-header-tmpl"
													   data-option-label="Select Group..."
													   data-cascade-from="ddlCategory"
													   data-cascade-from-field="category_id"
									                   data-value-primitive="true"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: item_group_id,
									                              source: itemGroupDS,
									                              events: {change: search}"
									                   style="width: 100%;" />
							        			</td>
							        		</tr>
							        	</table>
							        </div>

							        <div class="table-responsive">
						        		<div data-role="grid" class="table color-table dark-table"
						                 data-auto-bind="false"
						                 data-columns='[
			                                { field: "number", title: "NUMBER", template:"#=abbr##=number#" },
			                                { field: "name", title: "NAME" },
			                                { field: "category", title: "CATEGORY" },
			                                { title: "", template:"<button class=k-button data-bind=click:addSearchItem style=min-width:30px><i class=icon-plus></i></button>", width:"50px" }
			                             ]'
						                 data-bind="source: itemDS"
						                 style="height: 212px;"></div>
						            </div>

						            <div id="pager" class="k-pager-wrap"
							             data-role="pager"
							             data-auto-bind="false"
										 data-bind="source: itemDS"></div>

									<div class="backgroundButtonFooter">
										<div class="row">
											<div >
												<span class="btn-btn" data-bind="click: closeBarcodeWindow"><i></i> <span data-bind="text: lang.lang.close"></span></span>
											</div>
										</div>
									</div>
					            </div>
					            <!-- // End Window Barcode -->

				            </div>
	                	</div>
					</div>
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
		<td class="textAlignRight">
			#if(type=="GDN"){#
				#=kendo.toString(kendo.parseFloat(amount), "n2")#
			#}else{#
				#=kendo.toString(kendo.parseFloat(amount), "c2", locale)#
			#}#
		</td>
    </tr>
</script>
<!-- End -->

<!-- Cash Sales -->
<script id="cashSale" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div id="example">
	        	<div class="row marginTop15">
	                <div class="col-md-12">
	                	<div class="card">
	                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
	                		<div class="card-body">

					        <h2 data-bind="text: lang.lang.cash_sale"></h2>

							<!-- Upper Part -->
							<div class="row">
								<div class="col-md-4">
									<div class="box-generic">
										<table class="table table-borderless table-condensed cart_total">
											<tr>
												<td style="width: 25%;"><span data-bind="text: lang.lang.no_"></span></td>
												<td>
													<input id="txtNumber" name="txtNumber" class="k-textbox"
															data-bind="value: obj.number,
																disabled: obj.is_recurring,
																events:{change:checkExistingNumber}"
															required data-required-msg="required"
															placeholder="eg. ABC00001"/>
													<div class="coverQrcode">
														<a class="fa fa-qrcode" data-bind="click: generateNumber" title="Generate Number"><i></i></a>
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
															required data-required-msg="required"/>
												</td>
											</tr>
											<tr>
												<td><span data-bind="text: lang.lang.type"></span></td>
												<td>
													<input id="cbbType" name="cbbType" style="width: 100%" 
														   data-role="dropdownlist"
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="type"
										                   data-bind="value: obj.type,
										                              source: typeList,
										                              events:{ change: typeChanges }"
										                   required data-required-msg="required" />
												</td>
											</tr>
											<tr>
												<td><span data-bind="text: lang.lang.customers"></span></td>
												<td>
													<input id="cbbContact" name="cbbContact" style="width: 100%" 
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
									                   required data-required-msg="required"/>
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
								<div class="col-md-8">
									<div class="box-generic-noborder">
										<ul class="nav nav-tabs" role="tablist">
		                                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#functionSetting" role="tab" aria-selected="true"><span><i class="ti-settings"></i></span></a> </li>
		                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#functionLink" role="tab" aria-selected="false"><span><i class="ti-link"></i></span></a></li>
		                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#functionPaperclip" role="tab" aria-selected="false"><span><i class="icon-paper-clip"></i></span></a></li>
		                                </ul>
		                                <div class="tab-content tabcontent-border">
		                                	<!--Tab Setting -->
		                                    <div class="tab-pane active show" id="functionSetting" role="tabpanel">
		                                        <div class="p-10">
		                                            <div class="row">
		                                            	<div class="col-md-12 ">
		                                            		<div class="row">
			                                            		<div class="col-md-6">
			                                            			<p class="marginBottom" data-bind="text: lang.lang.payment_method"></p>
			                                            			<input class="marginBottom" data-role="dropdownlist"
												              				data-value-primitive="true"
												              				data-header-template="customer-payment-method-header-tmpl"
																			data-text-field="name"
												              				data-value-field="id"
												              				data-bind="value: obj.payment_method_id,
												              							source: paymentMethodDS"
												              				data-option-label="Select method..."
																					/>
																	<p class="marginBottom" data-bind="text: lang.lang.trade_discount"></p>
			                                            			<input class="marginBottom" id="ddlDiscountAccount" name="ddlDiscountAccount"
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
																					/>

				                                            		<p class="marginBottom width100" data-bind="text: lang.lang.billing_address"></p>
																	<textarea cols="0" rows="2" class="k-textbox marginBottom " data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>
				                                            	</div>

				                                            	<div class="col-md-6">
				                                            		<p class="marginBottom" data-bind="text: lang.lang.cash_account"></p>
				                                            		<input class="marginBottom" id="ddlCash" name="ddlCash"
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
														              				 />

														            <p class="marginBottom" data-bind="text: lang.lang.check_no"></p>
				                                            		<input class="marginBottom" class="k-textbox" placeholder="type check number ..." data-bind="value: obj.check_no" style="width: 100%;" />
														              				 
																	<!-- <p class="marginBottom width100" data-bind="text: lang.lang.delivery_address"></p>
																	<textarea cols="0" rows="2" class="k-textbox marginBottom " data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea> -->
				                                            	</div>
		                                            		</div>
		                                            		
		                                            	</div>
		                                        	</div>
		                                        </div>
		                                    </div>
		                                    <!-- End -->

		                                    <!--Tab -->
			                                    <div class="tab-pane " id="functionLink" role="tabpanel">
			                                        <div class="p-10">
			                                            <div class="row">
			                                            	<div class="col-md-12 ">
			                                            		<p class="marginBottom" data-bind="text: lang.lang.reference"></p>
		                                            			<input class="marginBottom" data-role="dropdownlist"
										            			   data-item-template="reference-list-tmpl"
												                   data-auto-bind="false"
												                   data-value-primitive="true"
												                   data-filter="startswith"
												                   data-text-field="number"
												                   data-value-field="id"
												                   data-bind="value: reference_id,
												                              source: referenceDS,
												                              events: { change: referenceChanges }"
												                   data-option-label="Add Reference..."
												                   style="width: 100%;"
																/>

			                                            		<div class="table-responsive marginTop">
														            <table class="table color-table dark-table">
																        <tbody data-template="invoice-reference-template"
												        		data-bind="source: obj.references"></tbody>
																    </table>
																</div>
			                                            	</div>
			                                        	</div>
			                                        </div>
			                                    </div>
			                                    <!-- End -->

		                                    <!--Tab Paperclip -->
		                                    <div class="tab-pane" id="functionPaperclip" role="tabpanel">
		                                    	<div class="p-10">
		                                    		<div class="row">
		                                    			<div class="col-md-12">
		                                            		<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>
												            <input id="files" name="files"
											                   type="file"
											                   data-role="upload"
											                   data-show-file-list="false"
											                   data-bind="events: {
									                   				select: onSelect
											                   }">
											               	<div class="table-responsive marginTop">
													            <table class="table color-table dark-table">
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
		                                            	</div>
		                                    		</div>
		                                    	</div>  
		                                    </div>
		                                    <!-- End -->
		                                </div>
									</div>
								</div>						
							</div>

							<div class="row">
								<div class="col-md-12 table-responsive">
									<!-- Item List -->
									<div data-role="grid" class="costom-grid table color-table dark-table"
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
				                            {
				                            	field: 'item_price',
				                            	title: 'UOM',
				                            	editor: measurementEditor,
				                            	template: '#=item_price?item_price.measurement:banhji.emptyString#',
				                            	width: '80px'
				                            },
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
				                            { field: 'tax_item', title:'TAX', editor: taxForSaleEditor, template: '#=tax_item.name#', width: '90px' },
				                         	{ field: 'reference_no', title:'REFERENCE NO.', hidden: true, width: '120px' }
				                         ]"
				                         data-auto-bind="false"
						                 data-bind="source: lineDS" ></div>
					            </div>					            
							</div>

							<!-- Bottom part -->
				            <div class="row">
								<!-- Column -->
								<div class="col-md-4">
									<button class="btn waves-effect waves-light btn-block btn-info btnPlus marginRight" data-bind="click: addRow"><i class="ti-plus"></i></button>
									<button class="btn waves-effect waves-light btn-block btn-info btnBarcode marginRight" data-bind="click: openBarcodeWindow" ><i class="fa fa-barcode marginRight"></i>Barcode</button>
									
									<!-- Add New Item -->
									<button type="button" class="btn btn-info dropdown-toggle btnBackgroundBlack" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                        	<span data-bind="text: lang.lang.add_new_item"></span>
			                        </button>
			                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
			                            <a class="dropdown-item" href='items#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a>
			                            <a class="dropdown-item" href='items#/item_service'><span data-bind="text: lang.lang.add_services"></span></a>
			                        </div>

									<!--End Add New Item -->
									<div class="well marginTop15">
										<textarea cols="0" rows="2" class="k-textbox" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
										<!-- <br>
										<textarea cols="0" rows="2" class="k-textbox" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea> -->
									</div>

								</div>
								<!-- Column END -->

								<!-- Column -->
								<div class="col-md-4" align="center">
									<div data-bind="visible: isEdit" style="margin-top: 10%;">
										<h2 data-bind="text: statusObj.text" style="text-transform: uppercase;"></h2>
										<p data-bind="text: statusObj.date"></p>
										<a data-bind="text: statusObj.number,
													attr: { href: statusObj.url }"></a>
									</div>
								</div>
								<!-- Column END -->

								<!-- Column -->
								<div class="col-md-4 table-responsive">
									<table class="table color-table dark-table">
										<tbody>
											<tr>
												<td class="textAlignRight" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
												<td class="textAlignRight" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
											</tr>
											<tr>
												<td class="textAlignRight"><span data-bind="text: lang.lang.total_discount"></span></td>
												<td class="textAlignRight"><span data-format="n" data-bind="text: obj.discount"></span></td>
											</tr>
											<tr>
												<td class="textAlignRight"><span data-bind="text: lang.lang.total_tax"></span></td>
												<td class="textAlignRight"><span data-format="n" data-bind="text: obj.tax"></span></td>
											</tr>
											<tr>
												<td class="textAlignRight" ><h4 data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
												<td class="textAlignRight" ><h4 data-bind="text: total" style=" font-weight: 700;"></h4></td>
											</tr>
											<tr>
												<td class="textAlignRight">
													<span data-bind="text: lang.lang.deposit"></span>
													<span data-format="n" data-bind="text: total_deposit"></span>
												</td>
												<td class="textAlignRight">
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
												<td class="textAlignRight">
													<span data-bind="text: lang.lang.remaining" style="font-size: 15px; font-weight: 700;"></span>
												</td>
												<td class="textAlignRight">
													<span data-format="n" data-bind="text: obj.remaining" style="font-size: 15px; font-weight: 700;"></span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<!-- // Column END -->

							</div>

							<!-- Form actions -->
							<div class="backgroundButtonFooter">
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
									<div class="col-md-4" >
										<input data-role="dropdownlist"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.transaction_template_id,
							                              source: txnTemplateDS"
							                   data-option-label="Select Template..." />

									</div>
									<div class="col-md-8" align="right">
										<span id="saveCancel" class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
										<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
										<button type="button" class="btn btn-info btn-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                        		<span data-bind="text: lang.lang.save_option"></span>
				                        </button>
				                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
				                            <a class="dropdown-item" id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></a>
				                            <a class="dropdown-item" id="savePrint"><span data-bind="text: lang.lang.save_print"></span></a>
				                        </div>
									  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
									  	<span class="btn-btn" id="saveDraft1" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_draft"></span></span>
									</div>
								</div>
							</div>
							<!-- // Form actions END -->

							<!-- Window Barcode -->
							<div data-role="window"
				                 data-title="Barcode"
				                 data-width="600"
				                 data-height="400"
				                 data-iframe="true"
				                 data-modal="true"
				                 data-visible="false"
				                 data-position="{top:'30%',left:'30%'}"
				                 data-actions="{}"
				                 data-resizable="false"
				                 data-bind="visible: barcodeVisible"
				                 style="text-align:center;">
				                <div class="table-responsive">
					                <table class="table color-table dark-table cart_total">
						        		<tr>
						        			<td>
						        				<input type="text" class="k-textbox"
						        						data-bind="value: barcode,
						        									events: {change: searchByBarcode}"
						        						placeholder="Scan barcode ..." style="width: 100%;" />
						        			</td>
						        			<td>
						        				<input id="ddlCategory" id="ddlCategory"
												   data-role="dropdownlist"
												   data-option-label="Select Category..."
												   data-header-template="item-category-header-tmpl"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: category_id,
								                              source: categoryDS,
								                              events: {change: search}"
								                   style="width: 100%;" />
						        			</td>
						        			<td>
						        				<input id="ddlItemGroup" id="ddlItemGroup"
												   data-role="dropdownlist"
												   data-header-template="item-group-header-tmpl"
												   data-option-label="Select Group..."
												   data-cascade-from="ddlCategory"
												   data-cascade-from-field="category_id"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: item_group_id,
								                              source: itemGroupDS,
								                              events: {change: search}"
								                   style="width: 100%;" />
						        			</td>
						        		</tr>
						        	</table>
						        </div>

						        <div class="table-responsive">
					        		<div data-role="grid" class="table color-table dark-table"
					                 data-auto-bind="false"
					                 data-columns='[
		                                { field: "number", title: "NUMBER", template:"#=abbr##=number#" },
		                                { field: "name", title: "NAME" },
		                                { field: "category", title: "CATEGORY" },
		                                { title: "", template:"<button class=k-button data-bind=click:addSearchItem style=min-width:30px><i class=icon-plus></i></button>", width:"50px" }
		                             ]'
					                 data-bind="source: itemDS"
					                 style="height: 212px;"></div>
					            </div>

					            <div id="pager" class="k-pager-wrap"
						             data-role="pager"
						             data-auto-bind="false"
									 data-bind="source: itemDS"></div>

								<div class="backgroundButtonFooter">
									<div class="row">
										<div >
											<span class="btn-btn" data-bind="click: closeBarcodeWindow"><i></i> <span data-bind="text: lang.lang.close"></span></span>
										</div>
									</div>
								</div>
				            </div>
				            <!-- // End Window Barcode -->
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<!-- End -->


<!-- Cash Receipt -->
<script id="cashReceipt" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div id="example">
	        	<div class="row marginTop15">
	                <div class="col-md-12">
	                	<div class="card">
	                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
	                		<div class="card-body">

						        <h2 data-bind="text: lang.lang.cash_receipt"></h2>

								<!-- Upper Part -->
								<div class="row">
									<div class="col-md-4">
										<div style="padding: 11px 20px; background: #203864; color: #333; margin-bottom: 10px;">
											<form autocomplete="off" class="form-inline">
												<div class="widget-search separator bottom">
													<button type="button" class="btn btn-default pull-right" data-bind="click: search, disabled: isEdit" style="padding: 5px 9px; width: 18%;"><i class="ti-search"></i></button>
													<div class="overflow-hidden" style="margin-bottom: 10px;">
														<input type="search" placeholder="Invoice Number..." data-bind="value: searchText, disabled: isEdit">
													</div>
												</div>
												<div class="select2-container" style="width: 100%;">
													<input id="cbbContact" name="cbbContact"
													   data-role="dropdownlist"
													   data-header-template="contact-header-tmpl"
									                   data-template="contact-list-tmpl"
									                   data-value-primitive="false"
									                   data-filter="startswith"
									                   data-text-field="name"
									                   data-value-field="id"
									                   data-bind="value: contact_id,
									                   			  disabled: isEdit,
									                              source: contactDS,
									                              events: {change: contactChanges}"
									                   data-option-label="Select Customer..."
									                   style="width: 100%; height: 29px;" />

												</div>
											</form>
										</div>

										<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px; margin-bottom: 10px;" align="center"
											data-bind="style: { backgroundColor: amtDueColor}">
											<div align="left"><span data-bind="text: lang.lang.amount_received"></span></div>
											<h2 data-bind="text: total_received" align="right"></h2>
										</div>
									</div>

									<div class="col-md-8">
										<div class="box-generic-noborder">
											<ul class="nav nav-tabs" role="tablist">
			                                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#functionSetting" role="tab" aria-selected="true"><span><i class="ti-settings"></i></span></a> </li>
			                                </ul>
			                                <div class="tab-content tabcontent-border">
			                                	<!--Tab Setting -->
			                                    <div class="tab-pane active show" id="functionSetting" role="tabpanel">
			                                        <div class="p-10">
			                                            <div class="row">
			                                            	<div class="col-md-12 ">
			                                            		<div class="row">
				                                            		<div class="col-md-6">
				                                            			<p class="marginBottom" data-bind="text: lang.lang.date"></p>
				                                            			<input class="marginBottom" id="issuedDate" name="issuedDate"
																				data-role="datepicker"
																				data-format="dd-MM-yyyy"
																				data-parse-formats="yyyy-MM-dd HH:mm:ss"
																				data-bind="value: obj.issued_date,
																							events:{ change : issuedDateChanges }"
																				required data-required-msg="required"
																						/>

																		<p class="marginBottom" data-bind="text: lang.lang.cash_account"></p>
				                                            			<input class="marginBottom" id="ddlCashAccount" name="ddlCashAccount"
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
																						/>

					                                            		
					                                            	</div>

					                                            	<div class="col-md-6">
					                                            		<p class="marginBottom" data-bind="text: lang.lang.payment_term"></p>
					                                            		<input class="marginBottom" id="ddlPaymentMethod" name="ddlPaymentMethod"
																				data-role="dropdownlist"
																				data-header-template="customer-payment-method-header-tmpl"
													              				data-value-primitive="true"
																				data-text-field="name"
													              				data-value-field="id"
													              				data-bind="value: obj.payment_method_id,
													              							source: paymentMethodDS"
													              				data-option-label="Select Method..."
													              				required data-required-msg="required"
															              				 />

															            <!-- <p class="marginBottom" data-bind="text: lang.lang.segment"></p>
					                                            		<input class="marginBottom" data-role="multiselect"
																			   data-value-primitive="true"
																			   data-header-template="segment-header-tmpl"
																			   data-item-template="segment-list-tmpl"
																			   data-value-field="id"
																			   data-text-field="code"
																			   data-bind="value: obj.segments,
																			   			source: segmentItemDS,
																			   			events:{ change: segmentChanges }"
																			   data-placeholder="Add Segment.."
															              				 /> -->
															              				 
																		
					                                            	</div>
			                                            		</div>
			                                            		
			                                            	</div>
			                                        	</div>
			                                        </div>
			                                    </div>
			                                    <!-- End -->
			                                </div>
										</div>								

								    </div>
								</div>

								
								<div class="row">
									<div class="col-md-12 table-responsive">
										<!-- Item List -->
										<div data-role="grid" class="costom-grid table color-table dark-table"
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
						            </div>					            
								</div>

								<!-- Bottom part -->
					            <div class="row">
									<!-- Column -->
									<div class="col-md-4">								

										<!--End Add New Item -->
										<div class="well marginTop15">
											<textarea cols="0" rows="2" class="k-textbox" data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
											<!-- <br>
											<textarea cols="0" rows="2" class="k-textbox" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea> -->
										</div>

									</div>
									<!-- Column END -->

									<!-- Column -->
									<div class="col-md-4">
									</div>
									<!-- Column END -->

									<!-- Column -->
									<div class="col-md-4 table-responsive">
										<table class="table color-table dark-table">
											<tbody>
												<tr>
													<td class="textAlignRight" style="width: 60%"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
													<td class="textAlignRight"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
												</tr>
												<tr>
													<td class="textAlignRight"><span data-bind="text: lang.lang.total_discount"></span></td>
													<td class="textAlignRight"><span data-format="n" data-bind="text: obj.discount"></span></td>
												</tr>
												<tr>
													<td class="textAlignRight"><span data-bind="text: lang.lang.total_tax"></span></td>
													<td class="textAlignRight"><span data-format="n" data-bind="text: obj.tax"></span></td>
												</tr>
												<tr>
													<td class="textAlignRight"><h4 data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
													<td class="textAlignRight"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
												</tr>
												<tr>
													<td class="textAlignRight">
														<span data-bind="text: lang.lang.deposit"></span>
														<span data-format="n" data-bind="text: total_deposit"></span>
													</td>
													<td class="textAlignRight">
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
													<td class="textAlignRight">
														<span data-bind="text: lang.lang.remaining" style="font-size: 15px; font-weight: 700;"></span>
													</td>
													<td class="textAlignRight">
														<span data-format="n" data-bind="text: obj.remaining" style="font-size: 15px; font-weight: 700;"></span>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<!-- // Column END -->

								</div>


								<!-- Form actions -->
								<div class="backgroundButtonFooter">
									<div id="ntf1" data-role="notification"></div>

									<div class="row">
										<div class="col-md-4" style="padding-left: 15px;">
											<input data-role="dropdownlist"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.transaction_template_id,
								                              source: txnTemplateDS"
								                   data-option-label="Select Template..." />

										</div>
										<div class="col-md-8" align="right">
											<span id="saveCancel" class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
											<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit"><span data-bind="text: lang.lang.delete"></span></span>
											<button type="button" class="btn btn-info btn-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                        		<span data-bind="text: lang.lang.save_option"></span>
					                        </button>
					                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
					                            <a class="dropdown-item" id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></a>
					                            <a class="dropdown-item" id="savePrint"><span data-bind="text: lang.lang.save_print"></span></a>
					                        </div>
										  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
										</div>
									</div>
								</div>
								<!-- // Form actions END -->

							</div>
						</div>
					</div>
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
<!-- End -->


<!-- Cash Refund -->
<script id="cashRefund" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div id="example">
	        	<div class="row marginTop15">
	                <div class="col-md-12">
	                	<div class="card">
	                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
	                		<div class="card-body">

			        			<h2 data-bind="text: lang.lang.cash_refund"></h2>				    

								<!-- Upper Part -->
								<div class="row">
									<div class="col-md-4">
										<div class="box-generic well" style="height: 190px;">
											<table class="table table-borderless table-condensed cart_total">
												<tr>
													<td style="width: 25%;"><span data-bind="text: lang.lang.no_"></span></td>
													<td>
														<input id="txtNumber" name="txtNumber" class="k-textbox"
																data-bind="value: obj.number,
																			disabled: obj.is_recurring,
																			events:{change:checkExistingNumber}"
																required data-required-msg="required"
																placeholder="eg. ABC00001"/>
														<div class="coverQrcode">
															<a class="fa fa-qrcode" data-bind="click: generateNumber" title="Generate Number"><i></i></a>
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
																required data-required-msg="required"/>
													</td>
												</tr>
												<tr>
													<td><span data-bind="text: lang.lang.customers"></span></td>
													<td>
														<input id="cbbContact" name="cbbContact" style="width: 100%;"
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
											                   required data-required-msg="required"/>
													</td>
												</tr>
											</table>

											<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
												data-bind="style: { backgroundColor: amtDueColor}">
												<div align="left">AMOUNT REFUND</div>
												<h2 data-bind="text: total" align="right"></h2>
											</div>

										</div>
									</div>

									<div class="col-md-8">
										<div class="box-generic-noborder">
											<ul class="nav nav-tabs" role="tablist">
			                                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#functionSetting" role="tab" aria-selected="true"><span><i class="ti-settings"></i></span></a> </li>
			                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#functionPaperclip" role="tab" aria-selected="false"><span><i class="icon-paper-clip"></i></span></a></li>
			                                </ul>
			                                <div class="tab-content tabcontent-border">
			                                	<!--Tab Setting -->
			                                    <div class="tab-pane active show" id="functionSetting" role="tabpanel">
			                                        <div class="p-10">
			                                            <div class="row">
			                                            	<div class="col-md-12 ">
			                                            		<div class="row">
				                                            		<div class="col-md-6">
				                                            			<p class="marginBottom" data-bind="text: lang.lang.cash_account"></p>
													            		<input id="ddlCash" name="ddlCash" class="marginBottom"
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

					                                            		<p class="marginBottom width100" data-bind="text: lang.lang.billing_address"></p>
																		<textarea cols="0" rows="2" class="k-textbox marginBottom " data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>
					                                            	</div>

					                                            	<div class="col-md-6">
					                                            		<p class="marginBottom" data-bind="text: lang.lang.segments"></p>
																		<select data-role="multiselect" class="marginBottom"
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

																		<!-- <p class="marginBottom width100" data-bind="text: lang.lang.delivery_address"></p>
																		<textarea cols="0" rows="2" class="k-textbox marginBottom " data-bind="value: obj.ship_to" placeholder="Shipping to ..."></textarea> -->
					                                            	</div>
			                                            		</div>
			                                            		
			                                            	</div>
			                                        	</div>
			                                        </div>
			                                    </div>
			                                    <!-- End -->

			                                    <!--Tab Paperclip -->
			                                    <div class="tab-pane" id="functionPaperclip" role="tabpanel">
			                                    	<div class="p-10">
			                                    		<div class="row">
			                                    			<div class="col-md-12">
			                                            		<p><span data-bind="text: lang.lang.file_type"></span>: [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>
													            <input id="files" name="files"
												                   type="file"
												                   data-role="upload"
												                   data-show-file-list="false"
												                   data-bind="events: {
										                   				select: onSelect
												                   }">
												               	<div class="table-responsive marginTop">
														            <table class="table color-table dark-table">
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
			                                            	</div>
			                                    		</div>
			                                    	</div>  
			                                    </div>
			                                    <!-- End -->
			                                </div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12 table-responsive">
										<!-- Item List -->
										<div data-role="grid" class="costom-grid table color-table dark-table"
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
											        	var rowIndex = banhji.cashRefund.lineDS.indexOf(dataItem)+1;
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
					                            {
					                            	field: 'measurement',
					                            	title: 'UOM',
					                            	editor: measurementEditor,
					                            	template: '#=measurement?measurement.measurement:banhji.emptyString#',
					                            	width: '80px'
					                            },
					                            {
												    field: 'price',
												    title: 'PRICE',
												    format: '{0:n}',
												    editor: numberTextboxEditor,
												    width: '120px',
												    attributes: { style: 'text-align: right;' }
												},
					                            { field: 'amount', title:'AMOUNT', format: '{0:n}', editable: 'false', attributes: { style: 'text-align: right;' }, width: '120px' },
					                            { field: 'tax_item', title:'TAX', editor: taxForSaleEditor, template: '#=tax_item.name#', width: '90px' }
					                         ]"
					                         data-auto-bind="false"
							                 data-bind="source: lineDS" ></div>
							        </div>
							    </div>

							    <!-- Item Add Row part -->
					            <div class="row">
									<div class="col-md-12">
										<button class="btn waves-effect waves-light btn-block btn-info btnPlus marginRight" data-bind="click: addRow"><i class="ti-plus"></i></button>
										
										<!-- Add New Item -->
										<button type="button" class="btn btn-info dropdown-toggle btnBackgroundBlack" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                        	<span data-bind="text: lang.lang.add_new_item"></span>
				                        </button>
				                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
				                            <a class="dropdown-item" href='items#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a>
				                            <a class="dropdown-item" href='items#/item_service'><span data-bind="text: lang.lang.add_services"></span></a>
				                        </div>										
									</div>
								</div>

								<div class="row">
									<div class="col-md-12 table-responsive marginTop15">
									    <!-- Return Lines -->
									    <table class="table color-table dark-table">
									        <thead>
									            <tr>
									            	<th class="center" style="width: 50px;"><span data-bind="text: lang.lang.no_"></span></th>
									            	<th>DEPOSIT</th>
									                <th style="width: 20%;">REFERENCE No.</th>
									                <th style="width: 20%;"><span data-bind="text: lang.lang.amount"></span></th>
									            </tr>
									        </thead>
									        <tbody data-role="listview"
									        		data-template="cashRefund-return-template"
									        		data-auto-bind="false"
									        		data-bind="source: returnDS"></tbody>
									    </table>
									</div>
								</div>

					            <!-- Bottom part -->
					            <div class="row">

									<!-- Column -->
									<div class="col-md-4" >
										<button class="btn waves-effect waves-light btn-block btn-info btnPlus marginRight" data-bind="click: addRowReturn"><i class="ti-plus"></i></button>
										<br>
										<br>
										<div class="well marginTop15">
											<textarea cols="0" rows="2" class="k-textbox " data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
											<!-- <br>
											<textarea cols="0" rows="2" class="k-textbox" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea> -->
										</div>
									</div>
									<!-- Column END -->

									<div class="col-md-4"></div>
									<!-- Column -->
									<div class="col-md-4">
										<table class="table color-table dark-table">
											<tbody>
												<tr>
													<td class="textAlignRight" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
													<td class="textAlignRight " width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
												</tr>
												<tr>
													<td class="textAlignRight"><span data-bind="text: lang.lang.total_tax"></span></td>
													<td class="textAlignRight "><span data-format="n" data-bind="text: obj.tax"></span></td>
												</tr>
												<tr>
													<td class="textAlignRight">
														<span data-bind="text: lang.lang.deposit"></span>
														<span data-format="n" data-bind="text: total_deposit"></span>
													</td>
													<td class="textAlignRight">
														<span data-format="n" data-bind="text: obj.deposit"></span>
													</td>
												</tr>
												<tr>
													<td class="textAlignRight"><h4 data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
													<td class="textAlignRight "><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
												</tr>
											</tbody>
										</table>
									</div>
									<!-- // Column END -->

								</div>
								<!-- END Bottom part -->

								<div class="backgroundButtonFooter">
									<div id="ntf1" data-role="notification" style="display: none;"></div>

									<!-- Delete Confirmation -->
									
						            <!-- // Delete Confirmation -->

									<div class="row">
										<div class="col-md-4">
											<input data-role="dropdownlist"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.transaction_template_id,
							                              source: txnTemplateDS"
							                   data-option-label="Select Template..." />

										</div>
										<div class="col-md-8" align="right">
											<span id="saveCancel" class="btn-btn" onclick="javascript:window.history.back()" data-bind="click: cancel"><i></i> <span data-bind="text: lang.lang.cancel">Cancel </span></span>
											<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit" style="display: none;"><span data-bind="text: lang.lang.delete">Delete</span></span>
											<button type="button" class="btn btn-info btn-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				                        		<span data-bind="text: lang.lang.save_option">Save Options</span>
					                        </button>
					                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
					                            <a class="dropdown-item" id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new">Save and New</span></a>
					                            <a class="dropdown-item" id="savePrint"><span data-bind="text: lang.lang.save_print">Save and Print</span></a>
					                        </div>
										  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close">Save Close </span></span>
										  	<!-- <span class="btn-btn" id="saveDraft1" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_draft"></span></span> -->
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
<script id="cashRefund-return-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td class="center">
			<i class="icon-trash" data-bind="events: { click: removeRowReturn }"></i>
			#:banhji.cashRefund.returnDS.indexOf(data)+1#
		</td>
		<td>
			<input data-role="combobox"
			   data-template="reference-list-tmpl"
			   data-value-primitive="true"
               data-auto-bind="false"
               data-text-field="number"
               data-value-field="id"
               data-bind="value: reference_id,
               			  source: referenceDS,
               			  events:{change: referenceChanges}"
               placeholder="Select Deposit..."
               required data-required-msg="required" style="width: 100%" />
		</td>
		<td>
			<input class="k-textbox"
				data-bind="value: reference_no"
				style="width: 100%;" />
		</td>
		<td>
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
<!-- End -->

<!--Tab Customer -->
<script id="customerCenter-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>
    	<td style="text-align: center;">#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
    	<td>#=type#</td>
        <!-- Reference -->
        <td style="text-align: center;">
        	#if(type=="Customer_Deposit" && amount<0){#
				<a data-bind="click: goReference">#=number#</a>
			#}else{#
				<a href="\#/#=type.toLowerCase()#/#=id#"><i></i> #=number#</a>
			#}#
        </td>
        <!-- Amount -->
    	<td style="text-align: right;">
    		#if(type=="GDN"){#
    			#=kendo.toString(amount, "n0")#
    		#}else if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice" || type=="Commercial_Cash_Sale" || type=="Vat_Cash_Sale" || type=="Cash_Sale"){#
    			#=kendo.toString(amount-deposit, locale=="km-KH"?"c0":"c", locale)#
    		#}else{#
    			#=kendo.toString(amount, locale=="km-KH"?"c0":"c", locale)#
    		#}#
    	</td>
    	<!-- Status -->
    	<td style="text-align: center;">
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
    	<td style="text-align: center;">
			#if(type=="Commercial_Invoice" || type=="Vat_Invoice" || type=="Invoice"){#
				#if(status=="0" || status=="2") {#
        			<a href="" data-bind="click: payInvoice"><i></i> <span data-bind="text: lang.lang.receive_payment"></span></a>
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
			<div class="media-body">
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
					<span >#=creator#</span> :
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
								<div class="span6">
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
								<div class="span6">
									<!-- Group -->
									<div class="control-group">
										<label for="fullnameOther">Name In Other Language</label>
							            <input id="fullnameOther" name="fullnameOther" class="k-textbox"
							            		data-bind="value: obj.name_other,
							            					disabled: obj.is_pattern"
							              		placeholder="Name in other language" style="width: 100%;" />
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
						            <li class="span2 glyphicons picture">
						            	<a href="#tab5" data-toggle="tab"><i></i> <span>Image</span></a>
						            </li>
						        </ul>
						    </div>
						    <!-- // Tabs Heading END -->

						    <div class="tab-content">

						    	<!-- //GENERAL INFO -->
						        <div class="tab-pane active" id="tab1">
					            	<table class="table table-borderless table-condensed cart_total">
							            <tr>
							                <td>Gender</td>
							              	<td>
					            				<input data-role="dropdownlist"
								            		data-bind="source: genders, value: obj.gender"
								            		style="width: 100%;" />
							              	</td>
							            	<td>Date Of Birth</td>
							              	<td>
							              		<input data-role="datepicker"
					            					data-bind="value: obj.dob"
					            					data-format="dd-MM-yyyy"
					            					data-parse-formats="yyyy-MM-dd"
					            					placeholder="dd-MM-yyyy" style="width: 100%;" />
							              	</td>
							            </tr>
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
				                      data-bind="value: obj.invoice_note"></textarea>
					        	</div>
						        <!-- //INVOICE NOTE END -->

						        <!-- //IMAGE -->
						        <div class="tab-pane" id="tab5">
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
						        <!-- //IMAGE END -->

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
							<div class="span4"></div>
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
						  			</ul>
							  	</span>
							  	<span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close"></span></span>
							  	<span class="btn-btn" id="saveDraft"><span data-bind="text: lang.lang.save_draft"></span></span>
							</div>
						</div>
					</div>
					<!-- // Form actions END -->
				</div>
			</div>
		</div>
	</div>
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
		<td style="text-align: center;">
			#if(id){#
				<a href="#=url#" target="_blank" class="btn-action glyphicons download btn-default"><i></i></a>
			#}#
			<span class="btn-action glyphicons btn-danger" data-bind="click: removeFile"><i class="ti-close"></i></span>
		</td>
	</tr>
</script>

<!-- End -->

<!-- Report -->
<script id="saleSummaryByCustomer" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row page-titles">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">
                			<div class="reportHeader">
				                <!-- Nav tabs -->
				                <ul class="nav nav-tabs" role="tablist">
				                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#date" role="tab"><i class=" ti-calendar"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.date">Date</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#filter" role="tab"><i class="ti-filter"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.filter">filter</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#print_export" role="tab"><i class="ti-printer"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.print_export">Print/Export</span></a> </li>
				                </ul>
				                <!-- Tab panes -->
				                <div class="tab-content tabcontent-border">
				                    <div class="tab-pane active" id="date" role="tabpanel">
				                        <div class="p-20">
				                        	<div class="row ">
						    					<input data-role="dropdownlist"  
													   class="sorter marginRight marginBottom"
											           data-value-primitive="true"
											           data-text-field="text"
											           data-value-field="value"
											           data-bind="value: sorter,
											                      source: sortList,
											                      events: { change: sorterChanges }" />

												<input data-role="datepicker"
													   class="sdate marginRight marginBottom"
													   data-format="dd-MM-yyyy"
											           data-bind="value: sdate,
											           			  max: edate"
											           placeholder="From ..." >

											    <input data-role="datepicker" 
											    	   class="edate marginRight marginBottom"
											    	   data-format="dd-MM-yyyy"
											           data-bind="value: edate,
											                      min: sdate"
											           placeholder="To ..." >

											  	<button class="btnSearch" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
						    				</div>
				                        </div>
				                    </div>
				                    <div class="tab-pane" id="filter" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">						    					
												<p data-bind="text: lang.lang.customers" style=""></p>
												<select data-role="multiselect"
													   data-value-primitive="true"
													   data-item-template="contact-list-tmpl"
													   data-value-field="id"
													   data-text-field="name"
													   data-bind="value: obj.contactIds,
													   			source: contactDS"
													   data-placeholder="Select Customer.."
													   style="width: 50%; float: left; margin-right: 8px; " /></select>
													
											  	<button type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
														
						    				</div>
						    			</div>
				                    </div>
				                    <div class="tab-pane" id="print_export" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">
						    					<button class="col-md-1 btnPrint " type="button" data-role="button" data-bind="click: printGrid"><i class="ti-printer"></i><span class="marginLeft">Print</span></button>
						    					<button class="col-md-2 btnExport" type="button" data-role="button" data-bind="click: ExportExcel"><i class="ti-export"></i><span class="marginLeft">Export to Excel</span></button>
						    				</div>
						    			</div>
				                    </div>
				                    
				                </div>
				            </div>
				            <div id="invFormContent" style="page-break-after: always;">
				            	<!-- Style For Print -->
				            	<style type="text/css">
				            		* {
										-webkit-print-color-adjust: true;
									}
									.home-footer .table tbody td {
									    background-color: #fff !important;
									    -webkit-print-color-adjust: exact;
									}
									.home-footer .table tbody tr:nth-child(odd) td {
									    background-color: #f4f5f8 !important;
									    -webkit-print-color-adjust: exact;
									}
				            	</style>

					            <!-- Title -->
					            <div class="reportTitle" style="text-align: center; width: 97%; margin: 15px auto;">
					            	<h3 style="font-size: 15px; color: #203864 !important; margin-bottom: 10px;" data-bind="html: company.name"></h3>
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.sale_summary_by_customer"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-3">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.number_of_customer"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
											</div>
					            		</div>
					            		<div class="col-md-9" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_sale"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: totalAmount"></span>
											</div>
					            		</div>
					            	</div>
					            </div>

					            <!-- Table -->
					            <div class="reportTable home-footer table-responsive" style="width: 97%; margin: 0 auto;">
					            	<table class="table color-table dark-table" style="width: 100%; height: auto; ">
		                                <thead>
		                                    <tr>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.customer"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.number_of_invoice"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.number_of_cash_sale"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.total_sale"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="saleSummaryByCustomer-template"
								                data-bind="source: dataSource" >
								        </tbody>
					            	</table>
					            </div>
					        </div>

					        <!-- Pagination -->
			            	<div 	id="pager" 
			            			class="k-pager-wrap" 
				            		data-role="pager"
							    	data-auto-bind="false"
						            data-bind="source: dataSource"
						            style="width: 97%; margin: 0 auto;" >
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
		<td >#=name#</td>
		<td style="text-align: center; ">#=invoice_count#</td>
		<td style="text-align: center; ">#=cash_sale_count#</td>
		<td style="text-align: right;  ">#=kendo.toString(amount, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="saleSummaryByProduct" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row page-titles">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">
                			<div class="reportHeader">
				                <!-- Nav tabs -->
				                <ul class="nav nav-tabs" role="tablist">
				                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#date" role="tab"><i class=" ti-calendar"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.date">Date</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#filter" role="tab"><i class="ti-filter"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.filter">filter</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#print_export" role="tab"><i class="ti-printer"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.print_export">Print/Export</span></a> </li>
				                </ul>
				                <!-- Tab panes -->
				                <div class="tab-content tabcontent-border">
				                    <div class="tab-pane active" id="date" role="tabpanel">
				                        <div class="p-20">
				                        	<div class="row ">
						    					<input data-role="dropdownlist"  
													   class="sorter marginRight marginBottom"
											           data-value-primitive="true"
											           data-text-field="text"
											           data-value-field="value"
											           data-bind="value: sorter,
											                      source: sortList,
											                      events: { change: sorterChanges }" />

												<input data-role="datepicker"
													   class="sdate marginRight marginBottom"
													   data-format="dd-MM-yyyy"
											           data-bind="value: sdate,
											           			  max: edate"
											           placeholder="From ..." >

											    <input data-role="datepicker" 
											    	   class="edate marginRight marginBottom"
											    	   data-format="dd-MM-yyyy"
											           data-bind="value: edate,
											                      min: sdate"
											           placeholder="To ..." >

											  	<button class="btnSearch" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
						    				</div>
				                        </div>
				                    </div>
				                    <div class="tab-pane" id="filter" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">						    					
												<p data-bind="text: lang.lang.item" style=""></p>
												<select data-role="multiselect"
														   data-value-primitive="true"
														   data-item-template="item-list-tmpl"
														   data-value-field="id"
														   data-text-field="name"
														   data-bind="value: obj.itemIds,
														   			source: itemDS"
														   data-placeholder="Select Item..."
														   style="width: 50%; float: left; margin-right: 8px;" /></select>
													
											  	<button type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
														
						    				</div>
						    			</div>
				                    </div>
				                    <div class="tab-pane" id="print_export" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">
						    					<button class="col-md-1 btnPrint " type="button" data-role="button" data-bind="click: printGrid"><i class="ti-printer"></i><span class="marginLeft">Print</span></button>
						    					<button class="col-md-2 btnExport" type="button" data-role="button" data-bind="click: ExportExcel"><i class="ti-export"></i><span class="marginLeft">Export to Excel</span></button>
						    				</div>
						    			</div>
				                    </div>
				                    
				                </div>
				            </div>
				            <div id="invFormContent" style="page-break-after: always;">
				            	<!-- Style For Print -->
				            	<style type="text/css">
				            		* {
										-webkit-print-color-adjust: true;
									}
									.home-footer .table tbody td {
									    background-color: #fff !important;
									    -webkit-print-color-adjust: exact;
									}
									.home-footer .table tbody tr:nth-child(odd) td {
									    background-color: #f4f5f8 !important;
									    -webkit-print-color-adjust: exact;
									}
				            	</style>

					            <!-- Title -->
					            <div class="reportTitle" style="text-align: center; width: 97%; margin: 15px auto;">
					            	<h3 style="font-size: 15px; color: #203864 !important; margin-bottom: 10px;" data-bind="html: company.name"></h3>
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.sale_summary_by_product_services"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-5">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1 !important; -webkit-print-color-adjust: exact;">
												<div class="row">
													<div class="col-md-6">
														<p style="font-size: 14px;" data-bind="text: lang.lang.total_product_services"></p>
														<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
													</div>
													<div class="col-md-6">
														<p style="font-size: 14px;" data-bind="text: lang.lang.avg_sale_per_invoice"></p>
														<span style="font-size: 20px; font-weight: 700;" data-bind="text: avg_sale"></span>
													</div>
												</div>
											</div>
					            		</div>
					            		<div class="col-md-7" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1 !important; -webkit-print-color-adjust: exact;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_sale"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: total_sale"></span>
											</div>
					            		</div>
					            	</div>
					            </div>

					            <!-- Table -->
					            <div class="reportTable home-footer table-responsive" style="width: 97%; margin: 0 auto;">
					            	<table class="table color-table dark-table" style="width: 100%; height: auto; ">
		                                <thead>
		                                    <tr>												
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.item"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.qty"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.amount"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.avg_price"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.avg_cost"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.gross_profit_margin"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="saleSummaryByProduct-template"
								                data-bind="source: dataSource" >
								        </tbody>
					            	</table>
					            </div>
					        </div>

					        <!-- Pagination -->
			            	<div 	id="pager" 
			            			class="k-pager-wrap" 
				            		data-role="pager"
							    	data-auto-bind="false"
						            data-bind="source: dataSource"
						            style="width: 97%; margin: 0 auto;" >
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
		<td style="text-align: right; ">#=kendo.toString(quantity, "n")# #=measurement#</td>
		<td style="text-align: right; ">#=kendo.toString(amount, "c2", banhji.locale)#</td>
		<td style="text-align: right; ">#=kendo.toString(avg_price, "c3", banhji.locale)#</td>
		<td style="text-align: right; ">#=kendo.toString(avg_cost, "c3", banhji.locale)#</td>
		<td style="text-align: right; ">#=kendo.toString(gpm, "p")#</td>
	</tr>
</script>
<script id="saleDetailByCustomer" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row page-titles">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">
                			<div class="reportHeader">
				                <!-- Nav tabs -->
				                <ul class="nav nav-tabs" role="tablist">
				                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#date" role="tab"><i class=" ti-calendar"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.date">Date</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#filter" role="tab"><i class="ti-filter"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.filter">filter</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#print_export" role="tab"><i class="ti-printer"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.print_export">Print/Export</span></a> </li>
				                </ul>
				                <!-- Tab panes -->
				                <div class="tab-content tabcontent-border">
				                    <div class="tab-pane active" id="date" role="tabpanel">
				                        <div class="p-20">
				                        	<div class="row ">
						    					<input data-role="dropdownlist"  
													   class="sorter marginRight marginBottom"
											           data-value-primitive="true"
											           data-text-field="text"
											           data-value-field="value"
											           data-bind="value: sorter,
											                      source: sortList,
											                      events: { change: sorterChanges }" />

												<input data-role="datepicker"
													   class="sdate marginRight marginBottom"
													   data-format="dd-MM-yyyy"
											           data-bind="value: sdate,
											           			  max: edate"
											           placeholder="From ..." >

											    <input data-role="datepicker" 
											    	   class="edate marginRight marginBottom"
											    	   data-format="dd-MM-yyyy"
											           data-bind="value: edate,
											                      min: sdate"
											           placeholder="To ..." >

											  	<button class="btnSearch k-button btn-info" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
						    				</div>
				                        </div>
				                    </div>
				                    <div class="tab-pane" id="filter" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">						    					
												<p data-bind="text: lang.lang.customers" style=""></p>
												<select data-role="multiselect"
													   data-value-primitive="true"
													   data-item-template="contact-list-tmpl"
													   data-value-field="id"
													   data-text-field="name"
													   data-bind="value: obj.contactIds,
													   			source: contactDS"
													   data-placeholder="Select Customer.."
														   style="width: 50%; float: left; margin-right: 8px;" /></select>
													
											  	<button class="k-button btn-info" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
														
						    				</div>
						    			</div>
				                    </div>
				                    <div class="tab-pane" id="print_export" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">
						    					<button class="col-md-1 btnPrint k-button btn-info" type="button" data-role="button" data-bind="click: printGrid"><i class="ti-printer"></i><span class="marginLeft" data-bind="text: lang.lang.print">Print</span></button>
						    					<!-- <button class="col-md-2 btnExport k-button btn-info" type="button" data-role="button" data-bind="click: ExportExcel"><i class="ti-export"></i><span class="marginLeft">Export to Excel</span></button> -->
						    				</div>
						    			</div>
				                    </div>
				                    
				                </div>
				            </div>
				            <div id="invFormContent" style="page-break-after: always;">
				            	<!-- Style For Print -->
				            	<style type="text/css">
				            		* {
										-webkit-print-color-adjust: true;
									}
									.home-footer .table tbody td {
									    background-color: #fff !important;
									    -webkit-print-color-adjust: exact;
									}
									.home-footer .table tbody tr:nth-child(odd) td {
									    background-color: #f4f5f8 !important;
									    -webkit-print-color-adjust: exact;
									}
				            	</style>

					            <!-- Title -->
					            <div class="reportTitle" style="text-align: center; width: 97%; margin: 15px auto;">
					            	<h3 style="font-size: 15px; color: #203864 !important; margin-bottom: 10px;" data-bind="html: company.name"></h3>
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.sale_detail_by_customer"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-3">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.number_of_customer"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
											</div>
					            		</div>
					            		<div class="col-md-9" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.amount"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: totalAmount"></span>
											</div>
					            		</div>
					            	</div>
					            </div>

					            <!-- Table -->
					            <div class="reportTable home-footer table-responsive" style="width: 97%; margin: 0 auto;">
					            	<table class="table color-table dark-table" style="width: 100%; height: auto; ">
		                                <thead>
		                                    <tr>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.type"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.date"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.reference"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.memo"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.amount"></th>												
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="saleDetailByCustomer-template"
								                data-bind="source: dataSource" >
								        </tbody>
					            	</table>
					            </div>
					        </div>

					        <!-- Pagination -->
			            	<div 	id="pager" 
			            			class="k-pager-wrap" 
				            		data-role="pager"
							    	data-auto-bind="false"
						            data-bind="source: dataSource"
						            style="width: 97%; margin: 0 auto;" >
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
		<td class="hidden-sm-down"></td>
		<td class="hidden-sm-down"></td>
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
			<td class="hidden-sm-down" style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td class="hidden-sm-down" style="text-align: right;">#=line[i].memo#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;"> <span data-bind="text: lang.lang.total"></span> #=name#</td>
    	<td></td>
    	<td class="hidden-sm-down"></td>
    	<td class="hidden-sm-down"></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="saleDetailByProduct" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row page-titles">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">
                			<div class="reportHeader">
				                <!-- Nav tabs -->
				                <ul class="nav nav-tabs" role="tablist">
				                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#date" role="tab"><i class=" ti-calendar"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.date">Date</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#filter" role="tab"><i class="ti-filter"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.filter">filter</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#print_export" role="tab"><i class="ti-printer"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.print_export">Print/Export</span></a> </li>
				                </ul>
				                <!-- Tab panes -->
				                <div class="tab-content tabcontent-border">
				                    <div class="tab-pane active" id="date" role="tabpanel">
				                        <div class="p-20">
				                        	<div class="row ">
						    					<input data-role="dropdownlist"  
													   class="sorter marginRight marginBottom"
											           data-value-primitive="true"
											           data-text-field="text"
											           data-value-field="value"
											           data-bind="value: sorter,
											                      source: sortList,
											                      events: { change: sorterChanges }" />

												<input data-role="datepicker"
													   class="sdate marginRight marginBottom"
													   data-format="dd-MM-yyyy"
											           data-bind="value: sdate,
											           			  max: edate"
											           placeholder="From ..." >

											    <input data-role="datepicker" 
											    	   class="edate marginRight marginBottom"
											    	   data-format="dd-MM-yyyy"
											           data-bind="value: edate,
											                      min: sdate"
											           placeholder="To ..." >

											  	<button class="btnSearch k-button btn-info" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
						    				</div>
				                        </div>
				                    </div>
				                    <div class="tab-pane" id="filter" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">						    					
												<p data-bind="text: lang.lang.item" style=""></p>
												<select data-role="multiselect"
													   data-value-primitive="true"
													   data-item-template="item-list-tmpl"
													   data-value-field="id"
													   data-text-field="name"
													   data-bind="value: obj.itemIds,
													   			source: itemDS"
													   data-placeholder="Select Item..."
													   style="width: 50%; float: left; margin-right: 8px;" /></select>
													
											  	<button class="k-button btn-info" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
														
						    				</div>
						    			</div>
				                    </div>
				                    <div class="tab-pane" id="print_export" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">
						    					<button class="col-md-1 btnPrint k-button btn-info" type="button" data-role="button" data-bind="click: printGrid"><i class="ti-printer"></i><span class="marginLeft" data-bind="text: lang.lang.print">Print</span></button>
						    					<!-- <button class="col-md-2 btnExport k-button btn-info" type="button" data-role="button" data-bind="click: ExportExcel"><i class="ti-export"></i><span class="marginLeft">Export to Excel</span></button> -->
						    				</div>
						    			</div>
				                    </div>
				                    
				                </div>
				            </div>
				            <div id="invFormContent" style="page-break-after: always;">
				            	<!-- Style For Print -->
				            	<style type="text/css">
				            		* {
										-webkit-print-color-adjust: true;
									}
									.home-footer .table tbody td {
									    background-color: #fff !important;
									    -webkit-print-color-adjust: exact;
									}
									.home-footer .table tbody tr:nth-child(odd) td {
									    background-color: #f4f5f8 !important;
									    -webkit-print-color-adjust: exact;
									}
				            	</style>

					            <!-- Title -->
					            <div class="reportTitle" style="text-align: center; width: 97%; margin: 15px auto;">
					            	<h3 style="font-size: 15px; color: #203864 !important; margin-bottom: 10px;" data-bind="html: company.name"></h3>
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.sale_detail_by_product_services"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-5">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1 !important; -webkit-print-color-adjust: exact;">
												<div class="row">
													<div class="col-md-5">
														<p style="font-size: 14px;" data-bind="text: lang.lang.total_product_services"></p>
														<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
													</div>
													<div class="col-md-7">
														<p style="font-size: 14px;" data-bind="text: lang.lang.avg_sale_per_invoice"></p>
														<span style="font-size: 20px; font-weight: 700;" data-bind="text: product_sale"></span>
													</div>
												</div>
											</div>
					            		</div>
					            		<div class="col-md-7" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1 !important; -webkit-print-color-adjust: exact;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_sale"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: total_sale"></span>
											</div>
					            		</div>
					            	</div>
					            </div>

					            <!-- Table -->
					            <div class="reportTable home-footer table-responsive" style="width: 97%; margin: 0 auto;">
					            	<table class="table color-table dark-table" style="width: 100%; height: auto; ">
		                                <thead>
		                                    <tr>
		                                    	<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text:lang.lang.customer"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.invoice_date"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.reference"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.item_name"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.qty"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.uom"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.price"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.amount"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="saleDetailByProduct-template"
								                data-bind="source: dataSource" >
								        </tbody>
					            	</table>
					            </div>
					        </div>

					        <!-- Pagination -->
			            	<div 	id="pager" 
			            			class="k-pager-wrap" 
				            		data-role="pager"
							    	data-auto-bind="false"
						            data-bind="source: dataSource"
						            style="width: 97%; margin: 0 auto;" >
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
			<td class="hidden-sm-down" style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td class="hidden-sm-down">#=line[i].item_name#</td>
			<td class="hidden-sm-down" style="text-align: right;">#=kendo.toString(line[i].quantity, "c2")#</td>
			<td class="hidden-sm-down" style="text-align: center; ">#=line[i].measurement#</td>
			<td class="hidden-sm-down" style="text-align: right;">#=kendo.toString(parseFloat(line[i].price), "c2", banhji.locale)#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>

	#}#
	<tr>
    	<td colspan="2" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span>#: name #</td>
    	<td class="hidden-sm-down"></td>
    	<td class="hidden-sm-down"></td>
    	<td class="hidden-sm-down" class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black; text-align: right;">
    		#=kendo.toString(totalQty, "n")#
    	</td>
    	<td class="hidden-sm-down" colspan="2" style="font-weight: bold; border-top: 1px solid black !important; color: black;"></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black; text-align: right;">
    		#=kendo.toString(totalAmount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="8">&nbsp;</td>
    </tr>
</script>
<script id="customerBalanceSummary" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row page-titles">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">
                			<div class="reportHeader">
				                <!-- Nav tabs -->
				                <ul class="nav nav-tabs" role="tablist">
				                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#date" role="tab"><i class=" ti-calendar"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.date">Date</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#print_export" role="tab"><i class="ti-printer"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.print_export">Print/Export</span></a> </li>
				                </ul>
				                <!-- Tab panes -->
				                <div class="tab-content tabcontent-border">
				                    <div class="tab-pane active" id="date" role="tabpanel">
				                        <div class="p-20">
				                        	<div class="row ">
						    					<p data-bind="text: lang.lang.as_of"></p>
												<input data-role="datepicker" class="marginRight"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd"
													data-bind="value: as_of" />
													
											  	<button type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
						    				</div>
				                        </div>
				                    </div>
				                    <div class="tab-pane" id="print_export" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">
						    					<button class="col-md-1 btnPrint " type="button" data-role="button" data-bind="click: printGrid"><i class="ti-printer"></i><span class="marginLeft">Print</span></button>
						    					<button class="col-md-2 btnExport" type="button" data-role="button" data-bind="click: ExportExcel"><i class="ti-export"></i><span class="marginLeft">Export to Excel</span></button>
						    				</div>
						    			</div>
				                    </div>
				                    
				                </div>
				            </div>
				            <div id="invFormContent" style="page-break-after: always;">
				            	<!-- Style For Print -->
				            	<style type="text/css">
				            		* {
										-webkit-print-color-adjust: true;
									}
									.home-footer .table tbody td {
									    background-color: #fff !important;
									    -webkit-print-color-adjust: exact;
									}
									.home-footer .table tbody tr:nth-child(odd) td {
									    background-color: #f4f5f8 !important;
									    -webkit-print-color-adjust: exact;
									}
				            	</style>

					            <!-- Title -->
					            <div class="reportTitle" style="text-align: center; width: 97%; margin: 15px auto;">
					            	<h3 style="font-size: 15px; color: #203864 !important; margin-bottom: 10px;" data-bind="html: company.name"></h3>
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.customer_balance_summary"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-5">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1 !important; -webkit-print-color-adjust: exact;">
												<div class="row">
													<div class="col-md-5">
														<p style="font-size: 14px;" data-bind="text: lang.lang.open_invoice"></p>
														<span style="font-size: 20px; font-weight: 700;" data-bind="text: total_txn"></span>
													</div>
													<div class="col-md-7">
														<p style="font-size: 14px;" data-bind="text: lang.lang.number_of_customer"></p>
														<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
													</div>
												</div>
											</div>
					            		</div>
					            		<div class="col-md-7" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1 !important; -webkit-print-color-adjust: exact;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_customer_balance"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: total_balance"></span>
											</div>
					            		</div>
					            	</div>
					            </div>

					            <!-- Table -->
					            <div class="reportTable home-footer table-responsive" style="width: 97%; margin: 0 auto;">
					            	<table class="table color-table dark-table" style="width: 100%; height: auto; ">
		                                <thead>
		                                    <tr>
		                                    	<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.customer_name"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.no_transaction"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.account_receivable_balance"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="customerBalanceSummary-template"
								                data-bind="source: dataSource" >
								        </tbody>
					            	</table>
					            </div>
					        </div>

					        <!-- Pagination -->
			            	<div 	id="pager" 
			            			class="k-pager-wrap" 
				            		data-role="pager"
							    	data-auto-bind="false"
						            data-bind="source: dataSource"
						            style="width: 97%; margin: 0 auto;" >
						    </div>
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
		<td style="text-align: center;" >#=txn_count#</td>
		<td style="text-align: right;" >#=kendo.toString(amount, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="customerBalanceDetail" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row page-titles">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">
                			<div class="reportHeader">
				                <!-- Nav tabs -->
				                <ul class="nav nav-tabs" role="tablist">
				                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#date" role="tab"><i class=" ti-calendar"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.date">Date</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#filter" role="tab"><i class="ti-filter"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.filter">filter</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#print_export" role="tab"><i class="ti-printer"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.print_export">Print/Export</span></a> </li>
				                </ul>
				                <!-- Tab panes -->
				                <div class="tab-content tabcontent-border">
				                    <div class="tab-pane active" id="date" role="tabpanel">
				                        <div class="p-20">
				                        	<div class="row ">
						    					<p data-bind="text: lang.lang.as_of"></p>
												<input data-role="datepicker" class="marginRight"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd"
													data-bind="value: as_of" />
													
											  	<button class="k-button btn-info" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
						    				</div>
				                        </div>
				                    </div>
				                    <div class="tab-pane" id="filter" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">						    					
												<p data-bind="text: lang.lang.customers" style=""></p>
												<select data-role="multiselect"
													   data-value-primitive="true"
													   data-item-template="contact-list-tmpl"
													   data-value-field="id"
													   data-text-field="name"
													   data-bind="value: obj.contactIds,
													   			source: contactDS"
													   data-placeholder="Select Customer.."
														   style="width: 50%; float: left; margin-right: 8px;" /></select>
													
											  	<button class="k-button btn-info" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>														
						    				</div>
						    			</div>
				                    </div>
				                    <div class="tab-pane" id="print_export" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">
						    					<button class="col-md-1 btnPrint k-button btn-info" type="button" data-role="button" data-bind="click: printGrid"><i class="ti-printer"></i><span class="marginLeft" data-bind="text: lang.lang.print">Print</span></button>
						    					<!-- <button class="col-md-2 btnExport k-button btn-info" type="button" data-role="button" data-bind="click: ExportExcel"><i class="ti-export"></i><span class="marginLeft">Export to Excel</span></button> -->
						    				</div>
						    			</div>
				                    </div>
				                    
				                </div>
				            </div>
				            <div id="invFormContent" style="page-break-after: always;">
				            	<!-- Style For Print -->
				            	<style type="text/css">
				            		* {
										-webkit-print-color-adjust: true;
									}
									.home-footer .table tbody td {
									    background-color: #fff !important;
									    -webkit-print-color-adjust: exact;
									}
									.home-footer .table tbody tr:nth-child(odd) td {
									    background-color: #f4f5f8 !important;
									    -webkit-print-color-adjust: exact;
									}
				            	</style>

					            <!-- Title -->
					            <div class="reportTitle" style="text-align: center; width: 97%; margin: 15px auto;">
					            	<h3 style="font-size: 15px; color: #203864 !important; margin-bottom: 10px;" data-bind="html: company.name"></h3>
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.customer_balance_detail"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-5">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1 !important; -webkit-print-color-adjust: exact;">
												<div class="row">
													<div class="col-md-5">
														<p style="font-size: 14px;" data-bind="text: lang.lang.open_invoice"></p>
														<span style="font-size: 20px; font-weight: 700;" data-bind="text: total_txn"></span>
													</div>
													<div class="col-md-7">
														<p style="font-size: 14px;" data-bind="text: lang.lang.number_of_customer"></p>
														<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
													</div>
												</div>
											</div>
					            		</div>
					            		<div class="col-md-7" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1 !important; -webkit-print-color-adjust: exact;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_customer_balance"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: total_balance"></span>
											</div>
					            		</div>
					            	</div>
					            </div>

					            <!-- Table -->
					            <div class="reportTable home-footer table-responsive" style="width: 97%; margin: 0 auto;">
					            	<table class="table color-table dark-table" style="width: 100%; height: auto; ">
		                                <thead>
		                                    <tr>		                                    	
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.type"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.invoice_date"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.reference"></th>		
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.receivable_balance"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="customerBalanceDetail-template"
								                data-bind="source: dataSource" >
								        </tbody>
					            	</table>
					            </div>
					        </div>

					        <!-- Pagination -->
			            	<div 	id="pager" 
			            			class="k-pager-wrap" 
				            		data-role="pager"
							    	data-auto-bind="false"
						            data-bind="source: dataSource"
						            style="width: 97%; margin: 0 auto;" >
						    </div>
			            </div>
                	</div>					
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customerBalanceDetail-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td colspan="4">#=name#</td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i < line.length; i++) {#
		# amount += kendo.parseFloat(line[i].amount);#
		<tr>
			<td style="padding-left: 20px !important;">#=line[i].type#</td>
			<td style="text-align: left; ">#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td class="hidden-sm-down" style="text-align: left; "><a href='sales\#/#= line[i].type.toLowerCase()#/#= line[i].id#'> #=line[i].number#</a></td>			
			<td style="text-align: right; ">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;" data-bind="text: lang.lang.total"></td>
    	<td></td>
    	<td class="hidden-sm-down"></td>
    	<td style="font-weight: bold; border-top: 1px solid black !important; color: black; text-align: right;">
    		#=kendo.toString(amount, "c", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="4">&nbsp;</td>
    </tr>
</script>
<script id="receivableAgingSummary" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row page-titles">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">
                			<div class="reportHeader">
				                <!-- Nav tabs -->
				                <ul class="nav nav-tabs" role="tablist">
				                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#date" role="tab"><i class=" ti-calendar"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.date">Date</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#filter" role="tab"><i class="ti-filter"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.filter">filter</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#print_export" role="tab"><i class="ti-printer"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.print_export">Print/Export</span></a> </li>
				                </ul>
				                <!-- Tab panes -->
				                <div class="tab-content tabcontent-border">
				                    <div class="tab-pane active" id="date" role="tabpanel">
				                        <div class="p-20">
				                        	<div class="row ">
						    					<p data-bind="text: lang.lang.as_of"></p>
												<input data-role="datepicker" class="marginRight"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd"
													data-bind="value: as_of" />
													
											  	<button class="k-button btn-info" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
						    				</div>
				                        </div>
				                    </div>
				                    <div class="tab-pane" id="filter" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">						    					
												<p data-bind="text: lang.lang.customers" style=""></p>
												<select data-role="multiselect"
													   data-value-primitive="true"
													   data-item-template="contact-list-tmpl"
													   data-value-field="id"
													   data-text-field="name"
													   data-bind="value: obj.contactIds,
													   			source: contactDS"
													   data-placeholder="Select Customer.."
														   style="width: 50%; float: left; margin-right: 8px;" /></select>
													
											  	<button class="k-button btn-info" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>														
						    				</div>
						    			</div>
				                    </div>
				                    <div class="tab-pane" id="print_export" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">
						    					<button class="col-md-1 btnPrint k-button btn-info" type="button" data-role="button" data-bind="click: printGrid"><i class="ti-printer"></i><span class="marginLeft" data-bind="text: lang.lang.print">Print</span></button>
						    					<!-- <button class="col-md-2 btnExport k-button btn-info" type="button" data-role="button" data-bind="click: ExportExcel"><i class="ti-export"></i><span class="marginLeft">Export to Excel</span></button> -->
						    				</div>
						    			</div>
				                    </div>
				                    
				                </div>
				            </div>
				            <div id="invFormContent" style="page-break-after: always;">
				            	<!-- Style For Print -->
				            	<style type="text/css">
				            		* {
										-webkit-print-color-adjust: true;
									}
									.home-footer .table tbody td {
									    background-color: #fff !important;
									    -webkit-print-color-adjust: exact;
									}
									.home-footer .table tbody tr:nth-child(odd) td {
									    background-color: #f4f5f8 !important;
									    -webkit-print-color-adjust: exact;
									}
				            	</style>

					            <!-- Title -->
					            <div class="reportTitle" style="text-align: center; width: 97%; margin: 15px auto;">
					            	<h3 style="font-size: 15px; color: #203864 !important; margin-bottom: 10px;" data-bind="html: company.name"></h3>
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.receivable_aging_summary"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-3">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.number_of_customer"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
											</div>
					            		</div>
					            		<div class="col-md-9" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_customer_balance"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: totalBalance"></span>
											</div>
					            		</div>
					            	</div>
					            </div>

					            <!-- Table -->
					            <div class="reportTable home-footer table-responsive" style="width: 97%; margin: 0 auto;">
					            	<table class="table color-table dark-table" style="width: 100%; height: auto; ">
		                                <thead>
		                                    <tr>		                                    	
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.name"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.current"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" >1-30</th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" >31-60</th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" >61-90</th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.over">90</th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.total"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="receivableAgingSummary-template"
								                data-bind="source: dataSource" >
								        </tbody>
					            	</table>
					            </div>
					        </div>

					        <!-- Pagination -->
			            	<div 	id="pager" 
			            			class="k-pager-wrap" 
				            		data-role="pager"
							    	data-auto-bind="false"
						            data-bind="source: dataSource"
						            style="width: 97%; margin: 0 auto;" >
						    </div>
			            </div>
                	</div>
					
				</div>
			</div>
		</div>
	</div>
</script>
<script id="receivableAgingSummary-template" type="text/x-kendo-template" >
	<tr>
		<td>#=name#</td>
		<td class="hidden-sm-down" style="text-align: right;">#=kendo.toString(current, "c2", banhji.locale)#</td>
		<td class="hidden-sm-down" style="text-align: right;">#=kendo.toString(in30, "c2", banhji.locale)#</td>
		<td class="hidden-sm-down" style="text-align: right;">#=kendo.toString(in60, "c2", banhji.locale)#</td>
		<td class="hidden-sm-down" style="text-align: right;">#=kendo.toString(in90, "c2", banhji.locale)#</td>
		<td class="hidden-sm-down" style="text-align: right;">#=kendo.toString(over90, "c2", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(total, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="receivableAgingDetail" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row page-titles">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">
                			<div class="reportHeader">
				                <!-- Nav tabs -->
				                <ul class="nav nav-tabs" role="tablist">
				                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#date" role="tab"><i class=" ti-calendar"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.date">Date</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#filter" role="tab"><i class="ti-filter"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.filter">filter</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#print_export" role="tab"><i class="ti-printer"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.print_export">Print/Export</span></a> </li>
				                </ul>
				                <!-- Tab panes -->
				                <div class="tab-content tabcontent-border">
				                    <div class="tab-pane active" id="date" role="tabpanel">
				                        <div class="p-20">
				                        	<div class="row ">
						    					<p data-bind="text: lang.lang.as_of"></p>
												<input data-role="datepicker" class="marginRight"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd"
													data-bind="value: as_of" />
													
											  	<button type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
						    				</div>
				                        </div>
				                    </div>
				                    <div class="tab-pane" id="filter" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">						    					
												<p data-bind="text: lang.lang.customers" style=""></p>
												<select data-role="multiselect"
													   data-value-primitive="true"
													   data-item-template="contact-list-tmpl"
													   data-value-field="id"
													   data-text-field="name"
													   data-bind="value: obj.customers,
															   			source: contactDS"
													   data-placeholder="Select Customer.."
														   style="width: 50%; float: left; margin-right: 8px;" /></select>
													
											  	<button type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>														
						    				</div>
						    			</div>
				                    </div>
				                    <div class="tab-pane" id="print_export" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">
						    					<button class="col-md-1 btnPrint " type="button" data-role="button" data-bind="click: printGrid"><i class="ti-printer"></i><span class="marginLeft">Print</span></button>
						    					<button class="col-md-2 btnExport" type="button" data-role="button" data-bind="click: ExportExcel"><i class="ti-export"></i><span class="marginLeft">Export to Excel</span></button>
						    				</div>
						    			</div>
				                    </div>
				                    
				                </div>
				            </div>
				            <div id="invFormContent" style="page-break-after: always;">
				            	<!-- Style For Print -->
				            	<style type="text/css">
				            		* {
										-webkit-print-color-adjust: true;
									}
									.home-footer .table tbody td {
									    background-color: #fff !important;
									    -webkit-print-color-adjust: exact;
									}
									.home-footer .table tbody tr:nth-child(odd) td {
									    background-color: #f4f5f8 !important;
									    -webkit-print-color-adjust: exact;
									}
				            	</style>

					            <!-- Title -->
					            <div class="reportTitle" style="text-align: center; width: 97%; margin: 15px auto;">
					            	<h3 style="font-size: 15px; color: #203864 !important; margin-bottom: 10px;" data-bind="html: company.name"></h3>
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.receivable_aging_detail"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-3">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.number_of_customer"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
											</div>
					            		</div>
					            		<div class="col-md-9" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_customer_balance"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: totalBalance"></span>
											</div>
					            		</div>
					            	</div>
					            </div>

					            <!-- Table -->
					            <div class="reportTable home-footer table-responsive" style="width: 97%; margin: 0 auto;">
					            	<table class="table color-table dark-table" style="width: 100%; height: auto; ">
		                                <thead>
		                                    <tr>		                                    	
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.type"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.invoice_date"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.due_date"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.reference"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.status"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.amount"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.balance"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="receivableAgingDetail-template"
								                data-bind="source: dataSource" >
								        </tbody>
					            	</table>
					            </div>
					        </div>

					        <!-- Pagination -->
			            	<div 	id="pager" 
			            			class="k-pager-wrap" 
				            		data-role="pager"
							    	data-auto-bind="false"
						            data-bind="source: dataSource"
						            style="width: 97%; margin: 0 auto;" >
						    </div>
			            </div>
                	</div>					
				</span>
			</div>
		</div>
	</div>
</script>
<script id="receivableAgingDetail-template" type="text/x-kendo-tmpl">
	<tr>
		<td colspan="7" style="font-weight: bold; color: black;">#: name #</td>
	</tr>
	#var totalBalance = 0;#
	#for(var i = 0; i < line.length; i++){#
	#totalBalance += line[i].amount;#
	<tr>
		<td style="padding-left: 20px !important;">#=line[i].type#</td>
		<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
		<td>#=kendo.toString(new Date(line[i].due_date), "dd-MM-yyyy")#</td>
		<td>#=line[i].number#</td>
		<td style="text-align: right;">
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
			#=kendo.toString(line[i].amount, "c2", banhji.locale)#
		</td>
		<td style="text-align: right;">
			#=kendo.toString(totalBalance, "c2", banhji.locale)#
		</td>
	</tr>
    #}#
    <tr>
    	<td colspan="6" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span></td>
    	<td style="font-weight: bold; border-top: 1px solid black !important; color: black; text-align: right;">
    		#=kendo.toString(totalBalance, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="7">&nbsp;</td>
    </tr>
</script>
<script id="collectInvoice" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row page-titles">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">
                			<div class="reportHeader">
				                <!-- Nav tabs -->
				                <ul class="nav nav-tabs" role="tablist">
				                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#date" role="tab"><i class=" ti-calendar"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.date">Date</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#filter" role="tab"><i class="ti-filter"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.filter">filter</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#print_export" role="tab"><i class="ti-printer"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.print_export">Print/Export</span></a> </li>
				                </ul>
				                <!-- Tab panes -->
				                <div class="tab-content tabcontent-border">
				                    <div class="tab-pane active" id="date" role="tabpanel">
				                        <div class="p-20">
				                        	<div class="row ">
						    					<p data-bind="text: lang.lang.as_of"></p>
												<input data-role="datepicker" class="marginRight"
													data-format="dd-MM-yyyy"
													data-parse-formats="yyyy-MM-dd"
													data-bind="value: as_of" />
													
											  	<button class="k-button btn-info" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
						    				</div>
				                        </div>
				                    </div>
				                    <div class="tab-pane" id="filter" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">						    					
												<p data-bind="text: lang.lang.customers" style=""></p>
												<select data-role="multiselect"
													   data-value-primitive="true"
													   data-item-template="contact-list-tmpl"
													   data-value-field="id"
													   data-text-field="name"
													   data-bind="value: obj.customers,
															   			source: contactDS"
													   data-placeholder="Select Customer.."
														   style="width: 50%; float: left; margin-right: 8px;" /></select>
													
											  	<button class="k-button btn-info" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>														
						    				</div>
						    			</div>
				                    </div>
				                    <div class="tab-pane" id="print_export" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">
						    					<button class="col-md-1 btnPrint k-button btn-info" type="button" data-role="button" data-bind="click: printGrid"><i class="ti-printer"></i><span class="marginLeft" data-bind="text: lang.lang.print">Print</span></button>
						    					<!-- <button class="col-md-2 btnExport k-button btn-info" type="button" data-role="button" data-bind="click: ExportExcel"><i class="ti-export"></i><span class="marginLeft">Export to Excel</span></button> -->
						    				</div>
						    			</div>
				                    </div>
				                    
				                </div>
				            </div>
				            <div id="invFormContent" style="page-break-after: always;">
				            	<!-- Style For Print -->
				            	<style type="text/css">
				            		* {
										-webkit-print-color-adjust: true;
									}
									.home-footer .table tbody td {
									    background-color: #fff !important;
									    -webkit-print-color-adjust: exact;
									}
									.home-footer .table tbody tr:nth-child(odd) td {
									    background-color: #f4f5f8 !important;
									    -webkit-print-color-adjust: exact;
									}
				            	</style>

					            <!-- Title -->
					            <div class="reportTitle" style="text-align: center; width: 97%; margin: 15px auto;">
					            	<h3 style="font-size: 15px; color: #203864 !important; margin-bottom: 10px;" data-bind="html: company.name"></h3>
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-3">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.number_of_invoice"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: total_txn"></span>
											</div>
					            		</div>
					            		<div class="col-md-9" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_amount"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: totalAmount"></span>
											</div>
					            		</div>
					            	</div>
					            </div>

					            <!-- Table -->
					            <div class="reportTable home-footer table-responsive" style="width: 97%; margin: 0 auto;">
					            	<table class="table color-table dark-table" style="width: 100%; height: auto; ">
		                                <thead>
		                                    <tr>
		                                    	<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.date"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.type"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.number"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.status"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.amount"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="collectInvoice-template"
								                data-bind="source: dataSource" >
								        </tbody>
					            	</table>
					            </div>
					        </div>

					        <!-- Pagination -->
			            	<div 	id="pager" 
			            			class="k-pager-wrap" 
				            		data-role="pager"
							    	data-auto-bind="false"
						            data-bind="source: dataSource"
						            style="width: 97%; margin: 0 auto;" >
						    </div>
			            </div>
                	</div>					
				</span>
			</div>
		</div>
	</div>
</script>
<script id="collectInvoice-template" type="text/x-kendo-template">
	<tr>
		<td colspan="5" style="font-weight: bold; color: black;">#: name #</td>
	</tr>
	# var totalAmount = 0;#
	#for(var i=0; i<line.length; i++){#
		#totalAmount += line[i].amount;#
		<tr>
			<td>&nbsp;&nbsp; #=kendo.toString(new Date(line[i].issued_date),"dd-MM-yyyy")#</td>
			<td>#=line[i].type#</td>
			<td class="hidden-sm-down">#=line[i].number#</td>
			<td class="hidden-sm-down" style="text-align: center;">
				# var date = new Date(), dueDates = new Date(line[i].due_date).getTime(), toDay = new Date(date).getTime(); #
				#if(dueDates < toDay) {#
					<span data-bind="text: lang.lang.over_due"></span> #:Math.floor((toDay - dueDates)/(1000*60*60*24))# <span data-bind="text: lang.lang.days"></span>
				#} else {#
					#:Math.floor((dueDates - toDay)/(1000*60*60*24))# <span data-bind="text: lang.lang.days_to_pay"></span>
				#}#
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="2" style="font-weight: bold; color: black;" data-bind="text: lang.lang.total">Total</td>
    	<td class="hidden-sm-down"></td>
    	<td class="hidden-sm-down"></td>
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalAmount, "c2", banhji.locale)#
    	</td>
    </tr>
	<tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="collectionReport" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row page-titles">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">
                			<div class="reportHeader">
				                <!-- Nav tabs -->
				                <ul class="nav nav-tabs" role="tablist">
				                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#date" role="tab"><i class=" ti-calendar"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.date">Date</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#filter" role="tab"><i class="ti-filter"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.filter">filter</span></a> </li>
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#print_export" role="tab"><i class="ti-printer"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.print_export">Print/Export</span></a> </li>
				                </ul>
				                <!-- Tab panes -->
				                <div class="tab-content tabcontent-border">
				                    <div class="tab-pane active" id="date" role="tabpanel">
				                        <div class="p-20">
				                        	<div class="row ">
						    					<input data-role="dropdownlist"  
													   class="sorter marginRight marginBottom"
											           data-value-primitive="true"
											           data-text-field="text"
											           data-value-field="value"
											           data-bind="value: sorter,
											                      source: sortList,
											                      events: { change: sorterChanges }" />

												<input data-role="datepicker"
													   class="sdate marginRight marginBottom"
													   data-format="dd-MM-yyyy"
											           data-bind="value: sdate,
											           			  max: edate"
											           placeholder="From ..." >

											    <input data-role="datepicker" 
											    	   class="edate marginRight marginBottom"
											    	   data-format="dd-MM-yyyy"
											           data-bind="value: edate,
											                      min: sdate"
											           placeholder="To ..." >

											  	<button class="btnSearch k-button btn-info" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
						    				</div>
				                        </div>
				                    </div>
				                    <div class="tab-pane" id="filter" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">						    					
												<p data-bind="text: lang.lang.customers" style=""></p>
												<select data-role="multiselect"
													   data-value-primitive="true"
													   data-item-template="contact-list-tmpl"
													   data-value-field="id"
													   data-text-field="name"
													   data-bind="value: obj.contactIds,
													   			source: contactDS"
													   data-placeholder="Select Customer.."
													   style="width: 50%; float: left; margin-right: 8px; " /></select>
													
											  	<button class="k-button btn-info" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
														
						    				</div>
						    			</div>
				                    </div>
				                    <div class="tab-pane" id="print_export" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">
						    					<button class="col-md-1 btnPrint k-button btn-info" type="button" data-role="button" data-bind="click: printGrid"><i class="ti-printer"></i><span class="marginLeft" data-bind="text: lang.lang.print">Print</span></button>
						    					<!-- <button class="col-md-2 btnExport k-button btn-info" type="button" data-role="button" data-bind="click: ExportExcel"><i class="ti-export"></i><span class="marginLeft">Export to Excel</span></button> -->
						    				</div>
						    			</div>
				                    </div>
				                    
				                </div>
				            </div>
				            <div id="invFormContent" style="page-break-after: always;">
				            	<!-- Style For Print -->
				            	<style type="text/css">
				            		* {
										-webkit-print-color-adjust: true;
									}
									.home-footer .table tbody td {
									    background-color: #fff !important;
									    -webkit-print-color-adjust: exact;
									}
									.home-footer .table tbody tr:nth-child(odd) td {
									    background-color: #f4f5f8 !important;
									    -webkit-print-color-adjust: exact;
									}
				            	</style>

					            <!-- Title -->
					            <div class="reportTitle" style="text-align: center; width: 97%; margin: 15px auto;">
					            	<h3 style="font-size: 15px; color: #203864 !important; margin-bottom: 10px;" data-bind="html: company.name"></h3>
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.collection_report"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-3">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.number_of_receipt"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: total_txn"></span>
											</div>
					            		</div>
					            		<div class="col-md-9" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_amount"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: totalAmount"></span>
											</div>
					            		</div>
					            	</div>
					            </div>

					            <!-- Table -->
					            <div class="reportTable home-footer table-responsive" style="width: 97%; margin: 0 auto;">
					            	<table class="table color-table dark-table" style="width: 100%; height: auto; ">
		                                <thead>
		                                    <tr>
		                                    	<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.receipt_date"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.receipt_number"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.check_no"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.receipt_amount"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.invoice_date"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.invoice_number"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.invoice_amount"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="collectionReport-template"
								                data-bind="source: dataSource" >
								        </tbody>
					            	</table>
					            </div>
					        </div>

					        <!-- Pagination -->
			            	<div 	id="pager" 
			            			class="k-pager-wrap" 
				            		data-role="pager"
							    	data-auto-bind="false"
						            data-bind="source: dataSource"
						            style="width: 97%; margin: 0 auto;" >
						    </div>
			            </div>
                	</div>					
				</div>
			</div>
		</div>
	</div>
</script>
<script id="collectionReport-template" type="text/x-kendo-template">
	<tr>
		<td colspan="7" style="font-weight: bold; color: black;">#: name #</td>
	</tr>
	# var totalReceived = 0;#
	#for(var i=0; i<line.length; i++){#
		#totalReceived += line[i].amount;#
		<tr>
			<td >#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td class="hidden-sm-down">#=line[i].number#</td>
			<td class="hidden-sm-down">#=line[i].check_no#</td>
			<td style="text-align: center;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
			<td class="hidden-sm-down">#=kendo.toString(new Date(line[i].reference_issued_date), "dd-MM-yyyy")#</td>
			<td>#=line[i].reference_number#</td>
			<td class="hidden-sm-down" style="text-align: right;">#=kendo.toString(line[i].reference_amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;" data-bind="text: lang.lang.total">Total</td>
    	<td class="hidden-sm-down"></td>
    	<td class="hidden-sm-down"></td>
    	<td style="text-align: center; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalReceived, "c2", banhji.locale)#
    	</td>
    	<td class="hidden-sm-down" colspan="3"></td>
    </tr>
	<tr>
    	<td colspan="7">&nbsp;</td>
    </tr>
</script>
<!-- End -->

<!-- Template Report-->
<script id="contact-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer">+ Add New Customer</a></li>
    </strong>
</script>
<script id="contact-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=name#</span>
</script>
<script id="customer-term-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer_setting">+ Add New Term</a>
    </strong>
</script>
<script id="segment-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="/c2/rrd\#/segment">+ Add New Segment</a>
    </strong>
</script>
<script id="segment-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=code#</span> <span>#=name#</span>
</script>
<script id="job-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="/c2/rrd\#/job">+ Add New Job</a>
    </strong>
</script>
<script id="job-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=number# #=name#
	</span>
</script>
<script id="employee-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="<?php echo base_url(); ?>admin\#employeelist">+ Add New Employee</a>
    </strong>
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
<script id="account-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="/c2/rrd\#/account">+ Add New Account</a>
    </strong>
</script>
<script id="account-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=name#</span>
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
<script id="top-product-template" type="text/x-kendo-tmpl">
    <tr>
        <td>
            <span>
                #if(name.length>15){#
                    #=name.substring(0, 15)#...
                #}else{#
                    #=name#
                #}#
            </span>
            <span class="pull-right">#:kendo.toString(kendo.parseInt(total), banhji.locale=="km-KH"?"c0":"c2", banhji.locale)#</span>
        </td>
    </tr>
</script>
<script id="top-contact-template" type="text/x-kendo-tmpl">
    <tr data-uid="#: uid #">
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
            <span class="pull-right">#=kendo.toString(kendo.parseFloat(total), banhji.locale=="km-KH"?"c0":"c2", banhji.locale)#</span>
        </td>
    </tr>
</script>
<script id="contact-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=abbr##=number#</span>
	<span>#=name#</span>
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
<script id="customer-payment-method-header-tmpl" type="text/x-kendo-tmpl">
	<strong>
    	<a href="\#/customer_setting">+ Add New Payment Method</a>
    </strong>
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
<script id="currency-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=code# - #=country#
	</span>
</script>
<!-- End -->