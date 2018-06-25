<link rel="stylesheet" href="<?php echo base_url()?>assets/micro/tab-page.css">
<div id="wrapperApplication" class="wrapper"></div>
<script type="text/x-kendo-template" id="layout">
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
*	Sale Section      	  *
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
						                <button style="font-size: 17px; " type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bind="text: lang.lang.new_transaction">
						                </button>
						                <div class="dropdown-menu">
						                    <a class="dropdown-item" href="purchases#/purchase"><span data-bind="text: lang.lang.make_purchase"></span></a>
						                    <a class="dropdown-item" href="purchases#/purchase_order"><span data-bind="text: lang.lang.make_purchase_order"></span></a>
						                    <a class="dropdown-item" href="purchases#/vendor_deposit"><span data-bind="text: lang.lang.make_vendor_deposit"></span></a>
						                    <a class="dropdown-item" href="purchases#/cash_payment"><span data-bind="text: lang.lang.make_cash_payment"></span></a>
						                </div>
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
<!-- End Section-->

<!-- Purchase Menu -->
<script id="tapMenu" type="text/x-kendo-template">
	<ul class="nav nav-tabs customtab" role="tablist" >
		 <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#/" data-bind="click: goTransactions"><span class="hidden-sm-up"><i class="ti-layout-accordion-list"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.purchase"></span></a> </li>
		<li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#/reports" data-bind="click: goReports"><span class="hidden-sm-up"><i class="ti-layout-grid2-thumb"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.reports"></span></a> </li>	   
	    <li class="nav-item hidden-sm-down"> <a class="nav-link" data-toggle="tab" href="#/purchase_center" data-bind="click: goPurchaseCenter"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.suppliers"></span></a> </li>
    </ul>
</script>
<!-- End -->

<!-- Menu -->
<script id="reports" type="text/x-kendo-template">
	<div class="row home" id="reports">
		<div class="col-12 col-md-4">
			<div class="saleOverview" data-bind="click: loadPurchase" style="margin-bottom: 15px;">
				<h2 data-bind="text: lang.lang.purchase"></h2>
				<p data-format="n" data-bind="text: obj.purchase"></p>
				<div class="row">
					<div class="col">
						<span data-bind="text: obj.vendor_count"></span>
						<span data-bind="text: lang.lang.supplier"></span>
					</div>
					<div class="col">
						<span data-bind="text: obj.product_count"></span>
						<span data-bind="text: lang.lang.product"></span>
					</div>
				</div>
				<div class="mask"></div>
			</div>

			<!-- Report -->
            <!-- <div class="report ">
				<div class="col-md-12">
					<h3 class="marginBottom"><a href="#/purchase_summary_product_services" data-bind="text: lang.lang.purchase_summary_by_product_services" ></a></h3>
					
				</div>
				<div class="col-md-12">
					<h3 style="border-bottom: none; padding-bottom: 0;"><a href="#/purchase_detail_product_services" data-bind="text: lang.lang.purchase_detail_by_product_services" ></a></h3>
					
				</div>						    					
			</div> -->

			<!-- Top 4 -->
			<!-- <div class="top5 home-footer">
                <table class="table color-table dark-table">
                    <thead>
                        <tr>
                            <th colspan="2" class="center">
                                <span data-bind="text: lang.lang.top_5_suppliers"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody data-role="listview"
                         data-auto-bind="false"
                         data-template="top-contact-template"
                         data-bind="source: obj.top_supplier"></tbody>
                </table>
            </div> -->
		</div>
		<!-- <div class="col-12 col-md-4"> -->
			<!-- <div class="saleOverview"  style="margin-bottom: 15px;">
				<h2 data-bind="text: lang.lang.purchase_order"></h2>
				<p data-format="n0" data-bind="text: obj.po"></p>
				<div class="col-md-12">
					<div class="col-md-6">
						<span data-format="n" data-bind="text: obj.po_avg"></span>
						<span data-bind="text: lang.lang.average"></span>
					</div>
					<div class="col-md-6">
						<span data-bind="text: obj.po_open"></span>
						<span data-bind="text: lang.lang.order_open"></span>
					</div>
				</div>
			</div> -->

			<!-- Report -->
			<!-- <div class="report" >
                <div class="col-md-12">
					<h3 class="marginBottom"><a href="#/suppliers_balance_summary" data-bind="text: lang.lang.suppliers_balance_summary" ></a></h3>
					
				</div>
				<div class="col-md-12">
					<h3 style="border-bottom: none; padding-bottom: 0;"><a href="#/payables_aging_summary" data-bind="text: lang.lang.payables_aging_summary"></a></h3>
					
				</div>
			</div> -->

			<!-- Top 4 -->
			<!-- <div class="top5 home-footer">
                <table class="table color-table dark-table">
                    <thead>
                        <tr>
                            <th class="center" colspan="2">
                                <span data-bind="text: lang.lang.top_5_ap_balance"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody data-role="listview"
                         data-auto-bind="false"
                         data-template="top-contact-template"
                         data-bind="source: obj.top_ap"></tbody>
                </table>
            </div> -->
		<!-- </div> -->
		<div class="col-12 col-md-4">
			<div class="saleOverview" data-bind="click: loadPayable" style="margin-bottom: 15px;">
				<h2 data-bind="text: lang.lang.payables"></h2>
				<p data-format="n" data-bind="text: obj.payable"></p>
				<div class="row">
					<div class="col">
						<span data-format="n0" data-bind="text: obj.payable_count"></span>
						<span data-bind="text: lang.lang.open"></span>
					</div>
					<div class="col">
						<span data-bind="text: obj.payable_overdue_count"></span>
						<span data-bind="text: lang.lang.overdue"></span>
					</div>
				</div>
			</div>

			<!-- Report -->
			<!-- <div class="report" >
				<div class="col-md-12">
					<h3 class="marginBottom"><a href="#/list_bills_paid" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></a></h3>
				</div>
				<div class="col-md-12">
					<h3 style="border-bottom: none; padding-bottom: 0;"><a href="#/bill_payment_list" data-bind="text: lang.lang.bill_payment_list"></a></h3>
					
				</div>
			</div> -->

			<!-- Top 4 -->
			<!-- <div class="top5 home-footer">
                <table class="table color-table dark-table">
                    <thead>
                        <tr>
                            <th colspan="2" class="center">
                                <span data-bind="text: lang.lang.top_5_payment"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody data-role="listview"
                         data-auto-bind="false"
                         data-template="top-product-template"
                         data-bind="source: obj.top_cash_payment"></tbody>
                </table>
            </div> -->
		</div>
		<!-- 333 -->
		<!-- <div class="col-12 col-md-4">
			<div class="saleOverview" style="margin-bottom: 15px;">
				<div class="col">
					<div class="draf" style="min-height: 95px;">
					</div>
				</div>
				<div class="col btn-group float-right">
	                <button style="width: 100%;" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bind="text: lang.lang.reports">
	                	
	                </button>
	                <div class="dropdown-menu">
	                    <a class="dropdown-item" href="#/purchase_summary_product_services" data-bind="text: lang.lang.purchase_summary_by_product_services"></a>
	                    <a class="dropdown-item" href="#/purchase_detail_product_services" data-bind="text: lang.lang.purchase_detail_by_product_services"></a>
	                    <a class="dropdown-item" href="#/suppliers_balance_summary" data-bind="text: lang.lang.suppliers_balance_summary"></a>
	                    <a class="dropdown-item" href="#/payables_aging_summary" data-bind="text: lang.lang.payables_aging_summary"></a>
	                    <a class="dropdown-item" href="#/list_bills_paid" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></a>
	                    <a class="dropdown-item" href="#/bill_payment_list" data-bind="text: lang.lang.bill_payment_list"></a>
	                </div>
	            </div>
			</div> -->

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
		<!-- </div> -->
		<div class="col-12 col-md-4">
			<div class="saleOverview" style="margin-bottom: 15px;">
				<div class="row">
					
					<div class="col-6 ">
						<div style="background: #009efb; text-align: center; margin-left: 10px; padding: 26px 0;">
							<i style="color: #fff; font-size: 35px;" class="ti-bar-chart"></i>
			                <button style="width: 100%; font-size: 17px;" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bind="text: lang.lang.reports">
			                	
			                </button>
			                <div class="dropdown-menu">
			                    <a class="dropdown-item" href="#/purchase_summary_product_services" data-bind="text: lang.lang.purchase_summary_by_product_services"></a>
			                    <a class="dropdown-item" href="#/purchase_detail_product_services" data-bind="text: lang.lang.purchase_detail_by_product_services"></a>
			                    <a class="dropdown-item" href="#/suppliers_balance_summary" data-bind="text: lang.lang.suppliers_balance_summary"></a>
			                    <a class="dropdown-item" href="#/payables_aging_summary" data-bind="text: lang.lang.payables_aging_summary"></a>
			                    <a class="dropdown-item" href="#/list_bills_paid" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></a>
			                    <a class="dropdown-item" href="#/bill_payment_list" data-bind="text: lang.lang.bill_payment_list"></a>
			                </div>
			            </div>
		            </div>

		            <div class="col-6" style="padding-right: 20px; padding-left: 0;">
						<div data-bind="click: loadDraft" style="background: #009efb; text-align: center; padding: 16px 10px; margin-right: 10px; width: 100%; min-height: 130px; ">
							<i style="color: #fff; font-size: 35px; text-align: center;" class="ti-pencil-alt"></i></br>
							<span style="color: #fff; font-size: 20px;" data-bind="text:lang.lang.draft"></span></br>
							<span style="color: #fff; font-size: 20px;" data-bind="text: obj.draft_count"></span>
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

	<div class="row">
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
		<div class="col-md-4"></div>
	</div>

    <div class="row">
        <div class="col-md-12 marginTop table-responsive grid" >
        	<div data-role="grid" class="table color-table dark-table"
	             data-pageable='true'
	             data-auto-bind="false"
	             data-filterable="true"
	             data-columns="[
	                { field: 'issued_date' , title : 'DATE', template:'#=kendo.toString(new Date(issued_date), banhji.dateFormat)#', filterable: false, attributes: { style: 'text-align: center;'} },
	                { field: 'name' , title : 'NAME', filterable: false },
	                { field: 'type' , title : 'TYPE', filterable: { multi: true, search: true} },
	                { field: 'number' , title: 'REFERENCE', filterable: false, attributes: { style: 'text-align: left;'}, template: '<a href=\'purchases\\#/#=type.toLowerCase()#/#=id#\'>#=number#</a>' },
	                { field: 'amount' , title: 'AMOUNT', filterable: false, format: '{0:n}' , attributes: { style: 'text-align: right; padding-right: 30px;'} },
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
	             data-bind="source: txnDS"></div>
        </div>
    </div>
</script>
<script id="purchaseDashBoard" type="text/x-kendo-template">
	<div class="row" id="checkOut">
		<style>
			.module-active {
				background: #009efb;
			}
			.module-active * {
				color: #fff;
			}
		</style>
		<div class="col-12 col-md-6" id="example">
			<div class="listWrapper">
				<div class="row">
            		<div class="col-md-6" style="min-height: 76px;">
            			<div class="row">
            				<div class="col">
            					<a class="cashmodule module-active" data-bind="click: cashClick" style="text-align: center;  width: 100%; float: left; border: 1px solid #d5d5d5; padding: 5px; cursor: pointer;">
            						<i style="font-size: 28px;" class="ti-wallet"></i><br/>
            						<span data-bind="text: lang.lang.cash"></span>
            					</a>
            				</div>
            				<div class="col">
            					<a class="creditmodule" data-bind="click: creditClick" style="text-align: center;  width: 100%; float: left; border: 1px solid #d5d5d5; padding: 5px; cursor: pointer;">
            						<i style="font-size: 28px;" class=" ti-receipt"></i><br/>
            						<span data-bind="text: lang.lang.micro_credit"></span>
            					</a>
            				</div>
            			</div>
            			<!-- <input type="radio" value="Cash_Purchase" class="k-radio"
        					name="payOption" id="payOption1"
        					data-bind="checked: obj.type,
        								events:{ change: typeChanges }">
        				<label class="k-radio-label" for="payOption1"><span data-bind="text: lang.lang.cash"></span></label>

        				<input type="radio" value="Credit_Purchase" class="k-radio"
		            		name="payOption" id="payOption2"
		            		data-bind="checked: obj.type,
		            					events:{ change: typeChanges }">
		            	<label class="k-radio-label" for="payOption2"><span data-bind="text: lang.lang.credit"></span></label> -->
		            	
		            	
		            	<!-- <p class="marginBottom" data-bind="text: lang.lang.account"></p>
		            	<input class="marginBottom" id="ddlAccount" name="ddlAccount"
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
              				style="width: 100%" /> -->
                	</div>

                	<div class="col-md-6" >
                		<div data-bind="invisible: isCash">
                    		<span class="marginBottom" data-bind="text: lang.lang.due_date" style="width: 25%; float:left;"></span>
		            		<input id="txtDueDate" name="txtDueDate" class="pull-right marginBottom"
									data-role="datepicker"
									data-format="dd-MM-yyyy"
									data-parse-formats="yyyy-MM-dd"
									data-bind="value: obj.due_date" style="width: 75%; float:left;"/>
						</div>
						<span class="marginBottom" data-bind="text: lang.lang.account" style="width: 25%; float:left;"></span>
		            	<input class="marginBottom" id="ddlAccount" name="ddlAccount"
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
              				style="width: 75%; float:left;" />

						<!-- <p class="marginBottom" data-bind="text: lang.lang.bill_date"></p>
	            		<input id="txtBillDate" name="txtBillDate" class="pull-right marginBottom"
	            				data-role="datepicker"
								data-format="dd-MM-yyyy"
								data-parse-formats="yyyy-MM-dd"
								data-bind="value: obj.bill_date" style="width: 100%;"/> -->
					</div>

				</div>
				<div class="row">
					<div class="col-12 col-md-12 col-lg-6">
						<div class="widget-search marginBottom">
							<div class="overflow-hidden" style="width: 100%;">
								<input type="search" placeholder="Barcode..." data-bind="value: barcode, events: {change: barcodeChange}" style="width: 100%;">
							</div>
							
						</div>
					</div>
					<div class="col-12 col-md-12 col-lg-6">
						<div class="widget-search marginBottom">
							<div class="overflow-hidden">
								<input type="search" placeholder="Number or Name..." data-bind="value: searchText">
							</div>
							<button style="background: #009efb; color: #fff;" type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="ti-search"></i></button>
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
			<div class="listWrapper marginBottom" style="height: auto; padding-top: 0; overflow: inherit;">
				<div class="row">
					<div class="box-generic" style="border: none;">
						<table class="table table-borderless table-condensed cart_total" style="margin-bottom:0;">
							<tr>
								<td style="width: 25%;"><span data-bind="text: lang.lang.no_"></span></td>
								<td>
									<input id="txtNumber" name="txtNumber" class="k-textbox"
											data-bind="value: obj.number,
														disabled: obj.is_recurring,
														events:{change:checkExistingNumber}"
											required data-required-msg="required"
											placeholder="eg. ABC00001" style="width: 90%;"/>
									<div class="coverQrcode" style="width: 7%;">
										<a  class="fa fa-qrcode" data-bind="click: generateNumber" title="Generate Number"><i></i></a>
									</div>
								</td>
							</tr>
							<tr>
								<td><span data-bind="text: lang.lang.date"></span></td>
								<td class="right">
									<input id="issuedDate" name="issuedDate" style="width: 100%;"
											data-role="datepicker"
											data-format="dd-MM-yyyy"
											data-parse-formats="yyyy-MM-dd HH:mm:ss"
											data-bind="value: obj.issued_date,
														events:{ change : setRate }"
											required data-required-msg="required"
											style="width: 210px;"/>
								</td>
							</tr>
							<tr>
								<td><span data-bind="text: lang.lang.suppliers"></span></td>
								<td>
									<input id="cbbContact" name="cbbContact" style="width: 100%;"
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
					                   required data-required-msg="required" />
								</td>
							</tr>
						</table>

					</div>
				</div>
				<div class="row">
					<div class="col-md-12 ">
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
								    	title:'NO.',
								    	width: '50px',
								    	attributes: { style: 'text-align: center;' },
								        template: function (dataItem) {
								        	var rowIndex = banhji.purchaseDashBoard.lineDS.indexOf(dataItem)+1;
								        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
								      	}
								    },
				                 	{ 
				                 		field: 'item', 
				                 		title: 'PRODUCTS/SERVICES', 
				                 		template: '#=item.name#', 
				                 		width: '170px',
				                 		editable: 'false', 
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
									    field: 'cost',
									    title: 'COST',
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
		                            	template: '#=tax_item.name#', 
		                            	width: '120px' 
		                            },
		                            { 
		                            	field: 'wht_account', 
		                            	title: 'WHT ACCOUNT', 
		                            	hidden: true, 
		                            	editor: whtAccountEditor, 
		                            	template: '#=wht_account.name#', width: '120px' 
		                            },
		                            { 
		                            	field: 'additional_cost', 
		                            	title:'ADD.COST', 
		                            	format: '{0:n}', 
		                            	hidden: true, 
		                            	editable: 'false', 
		                            	attributes: { style: 'text-align: right;' }, 
		                            	width: '120px' 
		                            },
		                            { 
		                            	field: 'additional_applied', 
		                            	title:'APPLY ADD.COST', 
		                            	hidden: true, 
		                            	editor: applyAdditionalCostEditor, 
		                            	width: '120px' 
		                            },
		                            { 
		                            	field: 'reference_no', 
		                            	title:'REFERENCE NO.', 
		                            	hidden: true, width: '120px' 
		                            }
		                         ]"
		                         data-auto-bind="false"
				                 data-bind="source: lineDS" >
				            </div>
						</div>

						<div class="row">
							<div class="col-12 col-md-12 col-lg-6">
								<table class="table color-table dark-table">
									<tbody>
										<tr>
											<td class="textAlignRight" style="width: 50%"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
											<td class="textAlignRight"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
										</tr>
										<tr>
											<td class="textAlignRight"><span data-bind="text: lang.lang.total_discount"></span></td>
											<td class="textAlignRight"><span data-format="n" data-bind="text: obj.discount"></span></td>
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
										<!-- <tr>
											<td class="textAlignRight"><span data-bind="text: lang.lang.total_tax"></span></td>
											<td class="textAlignRight"><span data-format="n" data-bind="text: obj.tax"></span></td>
										</tr> -->
										<!-- <tr>
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
										</tr> -->
									</tbody>
								</table>
							</div> 
							<div class="col-12 col-md-12 col-lg-6 checkOut-button">
								<!-- <div class="row">
									<div class="col" >
										<button  type="button" class="buttonoptionpurchase btn btn-info btn-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span style="font-size: 15px;" data-bind="text: lang.lang.save_option"></span></button>
										<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
				                            <a style="color: #333;" class="dropdown-item" data-bind="invisible: isEdit" id="saveDraft1"><span data-bind="text: lang.lang.save_draft"></span></a>
				                            <a style="color: #333;" class="dropdown-item" id="savePrint"><span data-bind="text: lang.lang.save_print"></span></a>
				                        </div>
									</div>
								</div>
								<div class="row">
									<div class="col" style="padding-right: 0;">
										<a class="buttoninvoicepurchase btn waves-effect waves-light btn-block btn-info" id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new"></span></a>
									</div>
									
									<div class="col" style="padding-left: 0;">
										<a class="buttoncancelpurchase btn waves-effect waves-light btn-block btn-info" data-bind="click: cancel"><span data-bind="text: lang.lang.cancel"></span></a>
									</div>
								</div> -->
								<table class="table color-table dark-table">
									<tbody>										
										<tr>
											<td class="textAlignRight" style="width: 50%"><h4 data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
											<td class="textAlignRight"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
										</tr>
										<tr>
											<td class="textAlignRight"><span data-bind="text: lang.lang.total_tax"></span></td>
											<td class="textAlignRight"><span data-format="n" data-bind="text: obj.tax"></span></td>
										</tr>
										<!-- <tr>
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
										</tr> -->
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
						</div>


						<div class="backgroundButtonFooter">
							<div id="ntf1" data-role="notification" style="display: none;"></div>
							<div class="row">
								<div class="col" align="right">
									<span  class="btn-btn" data-bind="click: addEmpty"><i></i> <span data-bind="text: lang.lang.cancel">Cancel </span></span>
									<span class="btn-btn" data-bind="click: openConfirm, visible: isEdit" style="display: none;"><span data-bind="text: lang.lang.delete">Delete</span></span>
									<span class="btn-btn" data-bind="click: saveNew2" id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new">Save and New</span></span>
			                        <span class="btn-btn" data-bind="click: savePrint2" id="savePrint"><span data-bind="text: lang.lang.save_print">Save and Print</span></span>
									<!-- <button type="button" class="btn btn-info btn-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                        		<span data-bind="text: lang.lang.save_option">Save Options</span>
			                        </button>
			                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
			                            <a class="dropdown-item" data-bind="click: saveNew2" id="saveNew" data-bind="invisible: isEdit"><span data-bind="text: lang.lang.save_new">Save and New</span></a>
			                            <a class="dropdown-item" data-bind="click: savePrint2" id="savePrint"><span data-bind="text: lang.lang.save_print">Save and Print</span></a>
			                        </div> -->
								  	<!-- <span class="btn-btn" id="saveClose"><span data-bind="text: lang.lang.save_close">Save Close </span></span> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			<div id="supercheoun-ntf" style="position: fixed;right: -800px;"><span class="message"></span> (<span class="second"></span> s)</div>
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
	        		<h1 style="font-size: 25px; text-align: center; line-height: 40px;margin-bottom: 0;">វិក្កយបត្រ</h1>
	            	<h2 style="font-size: 18px; text-transform: uppercase; text-align: center;">Invoice</h2>
	        	</div>
	            <div class="clear mid-header" style="padding-bottom: 10px;">
	            	<div class="cover-customer" style="width: 100%!important;">
	                	<h5 style="font-weight: bold;font-size: 14px;">ព័ត៌មានអតិថិជន​ CUSTOMER INFO:</h5>
	                    <div class="clear">
	                        <div class="left dotted-ruler" style="width: 100%;">
	                        	<p style="font-size: 12px; line-height: 20px;">ឈ្មោះ Name : <span>#= contact.name#</span><br>
			        			អាស័យ​ដ្ឋាន Address : <span>#= contact.address ? contact.address : ""#</span><br>
			        			លេខទូរស័ព្ទ Tel : <span>#= contact.phone ? contact.phone: ""#</span>
			        			</p>
	                        </div>
	                    </div>
	                </div>
	                <div class="cover-inv-number" style="width: 100%!important;margin-top: 10px;">
	                	<div class="clear">
	                    	<div class="left">
	                    		<p>លេខ No. : <strong>#= number#</strong></p>
	                        </div>
	                    </div>
	                    <div class="clear">
	                    	<div class="left">
	                    		<p>កាល​បរិច្ឆេទ Date: <strong>#= issued_date#</strong></p>
	                        </div>
	                    </div>
	                </div>
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
	                    <tfoot>
	                        <tr>
	                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">បញ្ចុះតម្លៃ Discount</td>
	                            <td class="rside" style="text-align: right;">#= kendo.toString(discount, "c", locale) #</td>
	                        </tr>
	                        <tr>
	                        	<td colspan="4" style="text-align:right;padding:5px;font-weight: bold;">សរុប Total</td>
	                            <td class="rside" style="text-align: right;">#= kendo.toString(amount, "c", locale)#</td>
	                        </tr>
	                    </tfoot>
	                </table>
	            </div>
	        </div>
	        <div class="foot">
	            <h6 style="font-size: 12px;">សម្គាល់៖ <span style="font-size:12px;">ច្បាប់​ដើម​សម្រាប់​អ្នក​ទិញ ច្បាប់​ចម្លង​សម្រាប់​អ្នក​លក់</span><br /><span style="font-size: 10px"><strong>Note:</strong> Original invoice for customer, copied invoice for seller</span></h6>
	        </div>
	    </div>
	</div>
</script>
<script id="cash-currency-template" type="text/x-kendo-template">
	<tr>
		<td data-bind="text: currency">
		</td>
		<td>
			<input data-role="numerictextbox"
               data-format="n"
               data-spinners="false"
               data-min="0"
               data-bind="value: amount,
                          events: { change: checkChange }"
               style="width: 90%; text-align: right;">
		</td>
	</tr>
</script>
<script id="change-currency-receipt-template" type="text/x-kendo-template">
	<tr>
		<td data-bind="text: currency">
		</td>
		<td>
			<input data-role="numerictextbox"
               data-format="n"
               data-spinners="false"
               data-min="0"
               data-bind="value: amount,
                          events: { change: checkChangeMoney }"
               style="width: 90%; text-align: right;">
		</td>
	</tr>
</script>
<script id="category-list-view-template" type="text/x-kendo-template">
	<div class="product" data-bind="click:searchItemByCategory" style="text-align: center;">
		<!-- <a class="view-details">
			<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg" />
			<h3>#:name.substring(0, 25)#...</h3>
		</a> -->
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
		<!-- <a class="view-details">		
			<div style="height:130px;">
				<img src="#= image_url? image_url: 'https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/no_image.jpg'#" />
			</div>
			<h3>#:name.substring(0, 25)#...</h3>
		</a> -->
		<div class="cover-img" >
			<a class="view-details">
				<img src=#:image_url# />
			</a>
		</div>
		<h3>#:name.substring(0, 20)#...</h3>			
	</div>
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

<script id="transactions-status-tmpl" type="text/x-kendo-tmpl">
	#if(status=="4") {#
		#=progress#
	#}#

	#if(type=="Credit_Purchase"){#
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
	#}else if(type=="Purchase_Order"){#
		#if(status=="0"){#
			Open
		#}else if(status=="1"){#
			Done
		#}#
	#}else if(type=="GRN"){#
		#if(status=="0"){#
			Open
		#}else if(status=="1"){#
			Received
		#}#
	#}#
</script>
<script id="transactions-action-tmpl" type="text/x-kendo-tmpl">
	#if(type=="Credit_Purchase"){#
		#if(status=="0" || status=="2") {#
			<a data-bind="click: payBill"><button class="k-button btn-info">Pay Bill</button></a>
		#}#
	#}#

	#if(status=="4") {#
		<a href="\#/#=type.toLowerCase()#/#=id#"><button>Use</button></a>
	#}#
</script>
<script id="supplierTransaction-temp-old" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=name#</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	# var total = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# total += kendo.parseFloat(line[i].amount);#
		<tr>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: right;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
			<td></td>
			<td></td>
		</tr>		
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;" data-bind="text: lang.lang.total"></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black; text-align: right;">
    		#=kendo.toString(total, "c2", banhji.locale)#
    	</td>
    	<td></td>
		<td></td>
    </tr>
    <tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
</script>
<script id="purchaseCenter" type="text/x-kendo-template">
	<div class="row" id="customers">
		<div class="col-md-3">
			<div class="listWrapper">
				<a style="padding: 5px 0; font-size: 18px;" href="#/vendor" class="btn waves-effect waves-light btn-block btn-info btnAddCustomer"><i class="icon-user-follow marginRight"></i><span data-bind="text: lang.lang.add_supplier"></span></a>
				<div class="innerAll">
					<form autocomplete="off" class="form-inline">
						<div class="widget-search">
							<div class="overflow-hidden">
								<input style="padding: 6px;" type="search" placeholder="Number or Name..." data-bind="value: searchText">
							</div>
							<button style="background: #009efb; color: #fff;" type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="ti-search"></i></button>
						</div>
						
					</form>
				</div>

				<span class="results"><span data-bind="text: contactDS.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>

				<div class="table table-condensed"
					 data-role="grid"
					 data-auto-bind="false"
					 data-bind="source: contactDS"
					 data-row-template="vendorCenter-vendor-list-tmpl"
					 data-columns="[{title: ''}]"
					 data-selectable=true
					 data-height="600"
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
                            <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerAttachment" role="tab" aria-selected="false"><span><i class="icon-paper-clip"></i></span></a> </li> -->
                        </ul>
                        <div class="tab-content tabcontent-border">
                        	<!--Tab Cutomer Transaction -->
                            <div class="tab-pane active show" id="cutomerTransaction" role="tabpanel">
                                <div class="p-10">
                                    <div class="row">
                                    	<div class="col-sm-6">
                                    		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goPO"><span data-bind="text: lang.lang.purchase_order"></span></a>
                                    	</div>
                                    	<div class="col-sm-6">
                                    		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goPurchase"><span data-bind="text: lang.lang.purchase"></span></a>
                                    	</div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-sm-6">
                                    		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goPaymentRefund"><span data-bind="text: lang.lang.payment_refund"></span></a>
                                    	</div>
                                    	<!-- <div class="col-sm-6">
                                    		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goPurchaseReturn"><span data-bind="text: lang.lang.purchase_return"></span></a>
                                    	</div> -->
                                    	<div class="col-sm-6">
                                    		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goDeposit"><span data-bind="text: lang.lang.deposit"></span></a>
                                    	</div>
                                    </div>
                                    <div class="row">                                    	
                                    	<div class="col-sm-6">
                                    		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goCashPayment"><span data-bind="text: lang.lang.cash_payment"></span></a>
                                    	</div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- End -->

                           	<!--Tab Customer Information -->
                            <div class="tab-pane" id="customerInformation" role="tabpanel">
                            	<div class="p-10">
                            		<div class="row">
                                    	<div class="col-sm-6">
                                    		<img class="main-image" data-bind="attr: { src: obj.image_url, alt: obj.name, title: obj.name }">
                                    	</div>
                                    	<div class="col-sm-6">
                                    		<div class="accounCetner-textedit">
								            	<table width="100%">
													<!-- <tr>
														<td width="40%"><span data-bind="text: lang.lang.supplier_type"></span></td>
														<td width="60%">
															<span data-bind="text: obj.contact_type"></span>
														</td>
													</tr>
													<tr>
														<td><span data-bind="text: lang.lang.number"></span></td>
														<td>
															<span data-bind="text: obj.abbr"></span>
															<span data-bind="text: obj.number"></span>
														</td>
													</tr> -->
													<tr>
														<td><span data-bind="text: lang.lang.name"></span></td>
														<td>
															<span data-bind="text: obj.name"></span>
														</td>
													</tr>
													<tr>
														<td><span data-bind="text: lang.lang.phone"></span></td>
														<td>
															<span data-bind="text: obj.phone"></span>
														</td>
													</tr>
													<!-- <tr>
														<td><span data-bind="text: lang.lang.currency"></span></td>
														<td>
															<span data-bind="text: currencyCode"></span>
														</td>
													</tr> -->
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
												 data-row-template="vendorCenter-note-tmpl"
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
								<div class="blockBalance" data-bind="click: loadBalance" style="height: 108px;">
									<div class="coverIcon"><i class="ti-server"></i></div>
									<div class="txt">
										<span  data-bind="text: lang.lang.balance"></span>
										<span data-bind="text: balance"></span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="blockDeposit" data-bind="click: loadPO" style="height: 108px;">
									<div class="coverIcon"><i class=" ti-briefcase"></i></div>
									<div class="txt">
										<span data-bind="text: lang.lang.po"></span>
										<span style="font-size: 25px;" data-bind="text: po" ></span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="blockOpenInvoice" data-bind="click: loadBalance" style="height: 108px;">
									<div class="coverIcon"><i class="icon-info"></i></div>
									<div class="txt">
										<span style="font-size: 25px;" data-bind="text: outInvoice"></span>
										<span  data-bind="text: lang.lang.open_invoice"></span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="blockOverDue" data-bind="click: loadOverInvoice" style="height: 108px;">
									<div class="coverIcon"><i class="ti-alarm-clock"></i></div>
									<div class="txt" >
										<span style="font-size: 25px;" data-bind="text: overInvoice"></span>
										<span data-bind="text: lang.lang.over_due"></span>
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
					                data-template="vendorCenter-transaction-tmpl"
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
<!-- End -->

<!-- Vendor -->
<script id="vendor" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div id="example">
	        	<div class="row marginTop15">
	                <div class="col-md-12">
	                	<div class="card">
	                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
	                		<div class="card-body">
						        <h2  data-bind="text: lang.lang.supplier"></h2>

							    <!-- Top Part -->
						    	<div class="row">
						    		<div class="col-md-6">
						    			<div class="well" style="padding-bottom: 5px; min-height: 162px;">
											<div class="row">
												<div class="col-md-6">
													<!-- Group -->
													<div class="control-group">
														<!-- <label for="fullname"><span data-bind="text: lang.lang.supplier_type"></span> <span style="color:red">*</span></label>
											            <input class="marginBottom" id="ddlContactType" name="ddlContactType"
															   data-role="dropdownlist"
															   data-header-template="vendor-type-header-tmpl"
											                   data-value-primitive="true"
											                   data-text-field="name"
											                   data-value-field="id"
											                   data-bind="value: obj.contact_type_id,
											                   			  disabled: obj.is_pattern,
											                              source: contactTypeDS,
											                              events:{change: typeChanges}"
											                   data-option-label="(--- Select ---)"
											                   required data-required-msg="required"
											              		style="width: 100%;" /> -->

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
											                   style="width: 72%" />
													</div>
													<!-- // Group END -->
												</div>
											</div>

											<!-- <div class="row">
												<div class="col-md-12">
													<label for="fullname"><span data-bind="text: lang.lang.full_name"></span> <span style="color:red">*</span></label>
										            <input id="fullname" name="fullname" class="k-textbox marginBottom"
										            		data-bind="value: obj.name,
										            					disabled: obj.is_pattern,
										            					attr: { placeholder: phFullname }"
										              		required data-required-msg="required"
										              		style="width: 100%;" />
												</div>
											</div> -->

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
											
											<div id="map" class="col-md-12" style="height: 157px;"></div>
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

								<div class="row">
									<div class="col-md-6">
						    			<div class="well" >
											<div class="row">
												<div class="col-md-4">
                                        			<label class="marginBottom" for="ddlPaymentMethod"><span data-bind="text: lang.lang.payment_method"></span></label>
                                        		</div>
                                        		<div class="col-md-8">	
                                        			<input class="marginBottom" id="ddlPaymentMethod" name="ddlPaymentMethod"
															data-role="dropdownlist"
															data-header-template="vendor-payment-method-header-tmpl"
											            	data-value-primitive="true"
											                data-text-field="name"
											                data-value-field="id"
															data-bind="value: obj.payment_method_id, source: paymentMethodDS"
															data-option-label="(--- Select ---)" style="width: 100%;" />
                                        		</div>
											</div>
											<div class="row">
                                        		<div class="col-md-4">
                                        			<label class="marginBottom" ><span data-bind="text: lang.lang.bank_name"></span></label>
												</div>
                                        		<div class="col-md-8">	
													<input class="marginBottom k-textbox" data-bind="value: obj.bank_name" placeholder="bank name ..." style="width: 100%;" />
                                        		</div>
                                        		<div class="col-md-4">
                                        			<label class="marginBottom" ><span data-bind="text: lang.lang.account_number"></span></label>
												</div>
                                        		<div class="col-md-8">
													<input class="marginBottom k-textbox" data-bind="value: obj.bank_account_number" placeholder="account number ..." style="width: 100%;" />
                                        		</div>
                                        	</div>

                                        	<div class="row">
                                        		<div class="col-md-4">
                                        			<label class="marginBottom" ><span data-bind="text: lang.lang.account_name"></span></label>
												</div>
                                        		<div class="col-md-8">	
													<input class="marginBottom k-textbox" data-bind="value: obj.bank_account_name" placeholder="account name ..." style="width: 100%;" />
                                        		</div>                                        		
                                        	</div>

                                        	
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


								<!-- <div class="row">
									<div class="col-md-12 fontIcon17" style="margin-bottom: 15px;">
										<ul class="nav nav-tabs" role="tablist">
		                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#customerInfo" role="tab"><span class="hidden-xs-up marginRight"><i class="ti-id-badge"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.info"></span></a> </li>
		                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerAccount" role="tab"><span class="hidden-xs-up marginRight"><i class="fa fa-dollar"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.account"></span></a> </li>
		                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#vendorPayment" role="tab"><span class="hidden-xs-up marginRight"><i class="icon-people"></i></span> <span class="hidden-xs-down">Payment</span></a> </li>
		                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerContact" role="tab"><span class="hidden-xs-up marginRight"><i class="icon-people"></i></span> <span class="hidden-xs-down">Contact</span></a> </li>
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
		                                    <div class="tab-pane" id="customerAccount" role="tabpanel">
		                                    	<div class="p-10">
		                                    		<div class="row">
		                                        		<div class="col-md-3">
		                                        			<label class="marginBottom" for="ddlAP"><span data-bind="text: lang.lang.account_payable"></span> <span style="color:red">*</span></label>
		                                        			<input class="marginBottom" id="ddlAP" name="ddlAP"
															   data-role="dropdownlist"
															   data-header-template="account-header-tmpl"
															   data-template="account-list-tmpl"
															   data-option-label="(--- Select ---)"
											                   data-value-primitive="true"
											                   data-text-field="name"
											                   data-value-field="id"
											                   data-bind="value: obj.account_id,
											                              source: apDS"
											                   required data-required-msg="required" style="width: 100%;" />
		                                        		</div>
		                                        		<div class="col-md-3">
		                                        			<label class="marginBottom" for="ddlTradeDiscountAccount"><span data-bind="text: lang.lang.trade_discount"></span> <span style="color:red">*</span></label>
															<input class="marginBottom" id="ddlTradeDiscountAccount" name="ddlTradeDiscountAccount"
															   data-role="dropdownlist"
															   data-header-template="account-header-tmpl"
															   data-template="account-list-tmpl"
															   data-option-label="(--- Select ---)"
											                   data-value-primitive="true"
											                   data-text-field="name"
											                   data-value-field="id"
											                   data-bind="value: obj.trade_discount_id,
											                              source: tradeDiscountDS"
											                   required data-required-msg="required" style="width: 100%;" />
		                                        		</div>
		                                        		<div class="col-md-3">
		                                        			<label class="marginBottom" for="ddlSettlementDiscountAccount"><span data-bind="text: lang.lang.settlement_discount"></span> <span style="color:red">*</span></label>
															<input class="marginBottom" id="ddlSettlementDiscountAccount" name="ddlSettlementDiscountAccount"
																   data-role="dropdownlist"
																   data-header-template="account-header-tmpl"
																   data-template="account-list-tmpl"
																   data-option-label="(--- Select ---)"
												                   data-value-primitive="true"
												                   data-text-field="name"
												                   data-value-field="id"
												                   data-bind="value: obj.settlement_discount_id,
												                              source: settlementDiscountDS"
												                   required data-required-msg="required" style="width: 100%;" />
		                                        		</div>
		                                        		<div class="col-md-3">
		                                        			<label class="marginBottom" for="ddlPrePaymentAccount"><span data-bind="text: lang.lang.prepayment_account"></span> <span style="color:red">*</span></label>
															<input class="marginBottom" id="ddlPrePaymentAccount" name="ddlPrePaymentAccount"
															   data-role="dropdownlist"
															   data-option-label="(--- Select ---)"
															   data-header-template="account-header-tmpl"
															   data-template="account-list-tmpl"
											                   data-value-primitive="true"
											                   data-text-field="name"
											                   data-value-field="id"
											                   data-bind="value: obj.deposit_account_id,
											                              source: prepaidAccountDS"
											                   required data-required-msg="required" style="width: 100%;" />
		                                        		</div>
		                                        	</div>
		                                        	<div class="row">
		                                        		<div class="col-md-3">
		                                        			<label class="marginBottom" for="currency"><span data-bind="text: lang.lang.currency"></span> <span style="color:red">*</span></label>
												            <input id="currency" name="currency" class="marginBottom"
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
		                                        		<div class="col-md-3">
		                                        			<label class="marginBottom" for="ddlTax"><span data-bind="text: lang.lang.tax"></span></label>
															<input class="marginBottom" id="ddlTax" name="ddlTax"
															   data-role="dropdownlist"
															   data-header-template="tax-header-tmpl"
															   data-option-label="(--- Select ---)"
											                   data-value-primitive="true"
											                   data-text-field="name"
											                   data-value-field="id"
											                   data-bind="value: obj.tax_item_id,
											                              source: taxItemDS"
																style="width: 100%;" />
		                                        		</div>
		                                        		<div class="col-md-3">
		                                        			<label class="marginBottom" for="txtCreditLimit"><span data-bind="text: lang.lang.credit_limit"></span></label>
															<input class="marginBottom" data-role="numerictextbox"
												                   data-format="n"
												                   data-min="0"
												                   data-bind="value: obj.credit_limit"
																		style="width: 100%;" />
		                                        		</div>
		                                        		
		                                        	</div>
		                                    	</div>
		                                    </div>
		                                    <div class="tab-pane" id="vendorPayment" role="tabpanel">
		                                    	<div class="p-10">
		                                    		<div class="row">
		                                        		<div class="col-md-2">
		                                        			<label class="marginBottom" for="ddlPaymentMethod"><span data-bind="text: lang.lang.payment_method"></span></label>
		                                        		</div>
		                                        		<div class="col-md-4">	
		                                        			<input class="marginBottom" id="ddlPaymentMethod" name="ddlPaymentMethod"
																	data-role="dropdownlist"
																	data-header-template="vendor-payment-method-header-tmpl"
													            	data-value-primitive="true"
													                data-text-field="name"
													                data-value-field="id"
																	data-bind="value: obj.payment_method_id, source: paymentMethodDS"
																	data-option-label="(--- Select ---)" style="width: 100%;" />
		                                        		</div>
		                                        		<div class="col-md-2">
		                                        			<label class="marginBottom" for="ddlPaymentTerm"><span data-bind="text: lang.lang.payment_term"></span></label>
														</div>
		                                        		<div class="col-md-4">	
															<input class="marginBottom" id="ddlPaymentTerm" name="ddlPaymentTerm"
																	data-role="dropdownlist"
																	data-header-template="vendor-payment-term-header-tmpl"
													            	data-value-primitive="true"
													                data-text-field="name"
													                data-value-field="id"
																	data-bind="value: obj.payment_term_id, source: paymentTermDS"
																	data-option-label="(--- Select ---)"  style="width: 100%;" />
		                                        		</div>
		                                        	</div>

		                                        	<div class="row">
		                                        		<div class="col-md-2">
		                                        			<label class="marginBottom" ><span data-bind="text: lang.lang.bank_name"></span></label>
														</div>
		                                        		<div class="col-md-4">	
															<input class="marginBottom k-textbox" data-bind="value: obj.bank_name" placeholder="bank name ..." style="width: 100%;" />
		                                        		</div>
		                                        		<div class="col-md-2">
		                                        			<label class="marginBottom" ><span data-bind="text: lang.lang.account_number"></span></label>
														</div>
		                                        		<div class="col-md-4">
															<input class="marginBottom k-textbox" data-bind="value: obj.bank_account_number" placeholder="account number ..." style="width: 100%;" />
		                                        		</div>
		                                        	</div>

		                                        	<div class="row">
		                                        		<div class="col-md-2">
		                                        			<label class="marginBottom" ><span data-bind="text: lang.lang.account_name"></span></label>
														</div>
		                                        		<div class="col-md-4">	
															<input class="marginBottom k-textbox" data-bind="value: obj.bank_account_name" placeholder="account name ..." style="width: 100%;" />
		                                        		</div>
		                                        		<div class="col-md-2">
		                                        			<label class="marginBottom" ><span data-bind="text: lang.lang.bank_address"></span></label>
														</div>
		                                        		<div class="col-md-4">
															<input class="marginBottom k-textbox" data-bind="value: obj.bank_address" placeholder="bank address ..." style="width: 100%;" />
		                                        		</div>
		                                        	</div>

		                                        	<div class="row">
		                                        		<div class="col-md-2">
		                                        			<label class="marginBottom" ><span data-bind="text: lang.lang.name_on_check"></span></label>
														</div>
		                                        		<div class="col-md-4">	
															<input class="marginBottom k-textbox" data-bind="value: obj.name_on_cheque" placeholder="name on check ..." style="width: 100%;" />
		                                        		</div>
		                                        	</div>

		                                    	</div>
		                                    </div>

		                                    <div class="tab-pane" id="customerContact" role="tabpanel">
		                                    	<div class="p-10">
		                                    		<div class="row">
		                                    			<span style="margin-bottom: 15px; margin-left: 10px; padding: 5px 15px; width: 188px;" class="btn waves-effect waves-light btn-block btn-info" data-bind="click: addEmptyContactPerson"><i class="icon-user-follow marginRight"></i><span data-bind="text: lang.lang.new_contact_person"></span></span>
		                                    			<div class="col-md-12 table-responsive">
			                                    			<table class="table color-table dark-table">
														        <thead>
														            <tr>
														                <th data-bind="text: lang.lang.name"></th>
														                <th data-bind="text: lang.lang.department"></th>
														                <th data-bind="text: lang.lang.phone"></th>
														                <th data-bind="text: lang.lang.email"></th>
														                <th width="20px"></th>
														            </tr>
														        </thead>
														        <tbody data-role="listview"
														        		data-auto-bind="false"
														        		data-template="vendor-contact-person-row-tmpl"
														        		data-bind="source: contactPersonDS">
														        </tbody>
														    </table>
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
<!-- End -->

<!-- Purchase Order -->
<script id="purchaseOrder" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div id="example">
	        	<div class="row marginTop15">
	                <div class="col-md-12">
	                	<div class="card">
	                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
	                		<div class="card-body">
	                			 <h2 data-bind="text: lang.lang.c_purchase_order"></h2>

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
														<input id="issuedDate" name="issuedDate" style="width: 100%;"
																data-role="datepicker"
																data-format="dd-MM-yyyy"
																data-parse-formats="yyyy-MM-dd HH:mm:ss"
																data-bind="value: obj.issued_date,
																			events:{ change : setRate }"
																required data-required-msg="required"
																style="width: 210px;"/>
													</td>
												</tr>
												<tr>
													<td><span data-bind="text: lang.lang.suppliers"></span></td>
													<td>
														<input id="cbbContact" name="cbbContact" style="width: 100%;"
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
										                   required data-required-msg="required" />
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
				                                            			<!-- <p class="marginBottom" data-bind="text: lang.lang.balance"><span data-bind="text: balance"></span></p> -->
				                                            			<p class="marginBottom" data-bind="text: lang.lang.expected_date"></p>
				                                            			<input id="txtDueDate" name="txtDueDate" class="marginBottom"
																			data-role="datepicker"
																			data-format="dd-MM-yyyy"
																			data-parse-formats="yyyy-MM-dd"
																			data-bind="value: obj.due_date"
																			required data-required-msg="required"
																			style="width:100%;" />

					                                            		<p class="marginBottom width100" data-bind="text: lang.lang.billing_address"></p>
																		<textarea cols="0" rows="2" class="k-textbox marginBottom " data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>
					                                            	</div>

					                                            	<div class="col-md-6">
					                                            		
															            <input class="marginBottom" type="checkbox" data-bind="checked: obj.reuse" /> 
															            <p class="marginBottom">Re-use this purchase order?</p>				 
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
										        	var rowIndex = banhji.purchaseOrder.lineDS.indexOf(dataItem)+1;
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
											    field: 'cost',
											    title: 'COST',
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
				                         	{ field: 'required_date', title:'DELIVERY DATE', format: '{0: dd-MM-yyyy}', hidden: true, editor: dateEditor, width: '120px' },
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
											<textarea cols="0" rows="2" class="k-textbox " data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
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
													<td class="textAlignRight " width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
												</tr>
												<tr>
													<td class="textAlignRight"><span data-bind="text: lang.lang.total_discount"></span></td>
													<td class="textAlignRight ">
														<span data-format="n" data-bind="text: obj.discount"></span>
				                   					</td>
												</tr>
												<tr>
													<td class="textAlignRight"><span data-bind="text: lang.lang.total_tax" ></span></td>
													<td class="textAlignRight "><span data-format="n" data-bind="text: obj.tax"></span></td>
												</tr>
												<tr>
													<td class="textAlignRight"><h4 data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
													<td class="textAlignRight "><h4 data-bind="text: total" style=" font-weight: 700;"></h4></td>
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

<!-- Purchase -->
<script id="purchase" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid" id="example">
        	<div class="row marginTop15">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">
					        <h2  data-bind="text: lang.lang.purchase"></h2>

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
													<input id="issuedDate" name="issuedDate" style="width: 100%;"
															data-role="datepicker"
															data-format="dd-MM-yyyy"
															data-parse-formats="yyyy-MM-dd HH:mm:ss"
															data-bind="value: obj.issued_date,
																		events:{ change : setRate }"
															required data-required-msg="required"
															style="width: 210px;"/>
												</td>
											</tr>
											<tr>
												<td><span data-bind="text: lang.lang.suppliers"></span></td>
												<td>
													<input id="cbbContact" name="cbbContact" style="width: 100%;"
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
									                   required data-required-msg="required" />
												</td>
											</tr>
										</table>

										<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
											data-bind="style: { backgroundColor: amtDueColor}">
											<div align="left"><span data-bind="text: lang.lang.amount_purchased"></span></div>
											<h2 data-bind="text: amount_due" align="right"></h2>
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
			                                            			<input type="radio" value="Cash_Purchase" class="k-radio"
										            					name="payOption" id="payOption1"
										            					data-bind="checked: obj.type,
										            								events:{ change: typeChanges }">
										            				<label class="k-radio-label" for="payOption1"><span data-bind="text: lang.lang.cash"></span></label>

										            				<input type="radio" value="Credit_Purchase" class="k-radio"
													            		name="payOption" id="payOption2"
													            		data-bind="checked: obj.type,
													            					events:{ change: typeChanges }">
													            	<label class="k-radio-label" for="payOption2"><span data-bind="text: lang.lang.credit"></span></label>
													            	
													            	<p class="marginBottom" data-bind="text: lang.lang.bill_no"></p>
													            	<input class="k-textbox pull-right marginBottom" data-bind="value: obj.reference_no" style="width: 100%;" />
													            	<p class="marginBottom" data-bind="text: lang.lang.account"></p>
													            	<input class="marginBottom" id="ddlAccount" name="ddlAccount"
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
				                                            	</div>

				                                            	<div class="col-md-6" >
				                                            		<div data-bind="invisible: isCash">
					                                            		<span class="marginBottom" data-bind="text: lang.lang.due_date" style="width: 25%; float:left;"></span>
													            		<input id="txtDueDate" name="txtDueDate" class="pull-right marginBottom"
																				data-role="datepicker"
																				data-format="dd-MM-yyyy"
																				data-parse-formats="yyyy-MM-dd"
																				data-bind="value: obj.due_date" style="width: 75%; float:left;"/>
																	</div>

																	<p class="marginBottom" data-bind="text: lang.lang.bill_date"></p>
												            		<input id="txtBillDate" name="txtBillDate" class="pull-right marginBottom"
												            				data-role="datepicker"
																			data-format="dd-MM-yyyy"
																			data-parse-formats="yyyy-MM-dd"
																			data-bind="value: obj.bill_date" />

																	
																	
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
										    	title:'NO.',
										    	width: '50px',
										    	attributes: { style: 'text-align: center;' },
										        template: function (dataItem) {
										        	var rowIndex = banhji.purchase.lineDS.indexOf(dataItem)+1;
										        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
										      	}
										    },
						                 	{ field: 'item', title: 'PRODUCTS/SERVICES', editor: itemPurchaseEditor, template: '#=item.name#', width: '170px' },
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
											    field: 'cost',
											    title: 'COST',
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
				                            { field: 'tax_item', title:'TAX', editor: taxForSaleEditor, template: '#=tax_item.name#', width: '120px' },
				                            { field: 'wht_account', title: 'WHT ACCOUNT', hidden: true, editor: whtAccountEditor, template: '#=wht_account.name#', width: '120px' },
				                            { field: 'additional_cost', title:'ADD.COST', format: '{0:n}', hidden: true, editable: 'false', attributes: { style: 'text-align: right;' }, width: '120px' },
				                            { field: 'additional_applied', title:'APPLY ADD.COST', hidden: true, editor: customBoolEditor, width: '120px' },
				                            { field: 'reference_no', title:'REFERENCE NO.', hidden: true, width: '120px' }
				                         ]"
				                         data-auto-bind="false"
						                 data-bind="source: lineDS"></div>
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
								</div>
								<!-- Column END -->
                        	</div>

                        	<div class="row">
								<div class="col-md-12 table-responsive marginTop15" >
									<!-- Item List -->
									<div data-role="grid" class="costom-grid table color-table dark-table"
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
										        	var rowIndex = banhji.purchase.accountLineDS.indexOf(dataItem)+1;
										        	return '<i class=icon-trash data-bind=click:removeRowAccount></i>' + ' ' + rowIndex;
										      	}
										    },
						                 	{ field: 'account', title: 'ACCOUNT', editor: accountEditor, template: '#=account.name#' },
				                            { field: 'description', title:'DESCRIPTION' },
				                            {
											    field: 'amount',
											    title: 'AMOUNT',
											    format: '{0:n}',
											    editor: numberTextboxEditor,
											    width: '150px',
											    attributes: { style: 'text-align: right;' }
											},
											{ field: 'tax_item', title:'TAX', editor: taxForSaleEditor, template: '#=tax_item.name#', width: '150px' },
				                            { field: 'wht_account', title: 'WHT ACCOUNT', hidden: true, editor: whtAccountEditor, template: '#=wht_account.name#', width: '150px' }
				                         ]"
				                         data-auto-bind="false"
						                 data-bind="source: accountLineDS" ></div>
								</div>
							</div>

							<!-- Bottom part -->
				            <div class="row marginBottom">
								<!-- Column -->
								<div class="col-md-6">
									<button class="btn waves-effect waves-light btn-block btn-info btnPlus marginRight" data-bind="click: addRowAccount"><i class="ti-plus"></i></button>
									<a href="<?php echo base_url()?>rrd#/account" class="btn waves-effect waves-light btn-block btn-info btnAddAccount"><i class="icon-user-follow marginRight"></i>Add Account</a>
								</div>
								<!-- Column END -->
							</div>

							<!-- Bottom part -->
				            <div class="row">
								<!-- Column -->
								<div class="col-md-4">
									<!--End Add New Item -->
									<div class="well ">
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="purchase-additional-cost-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #" data-bind="click: windowEdit">
		<td class="center">
			#:banhji.purchase.additionalCostDS.indexOf(data)+1#
		</td>
		<td data-bind="text: type"></td>
		<td data-bind="text: memo"></td>
		<td data-bind="text: reference_no"></td>
		<td style="text-align: right;" data-format="n" data-bind="text: sub_total"></td>
		<td style="text-align: right;" data-format="n" data-bind="text: tax"></td>
    </tr>
</script>

<!-- Vendor Deposit -->
<script id="vendorDeposit" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid" id="example">
        	<div class="row marginTop15">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">
                			<h2 data-bind="text: lang.lang.vendor_deposit"></h2>

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
											<div align="left"><span data-bind="text: lang.lang.amount_deposited"></span></div>
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
		                                            		<div class="row">
		                                            			<div class="col-md-12">
		                                            			<textarea id="memo2" cols="0" rows="4" class="k-textbox marginBottom"
														        		data-bind="value: obj.memo2" style="width:100%;"
														        		placeholder="Please enter transaction purpose here ..."></textarea>
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
								        		data-template="vendorDeposit-template"
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
</script>
<script id="vendorDeposit-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td class="center">
			<i class="icon-trash" data-bind="events: { click: remove }"></i>
			#:banhji.vendorDeposit.lineDS.indexOf(data)+1#
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
<!-- End -->

<!-- Payment Refund -->
<script id="paymentRefund" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid" id="example">
        	<div class="row marginTop15">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">
                			<h2 data-bind="text: lang.lang.payment_refund">Payment Refund</h2>

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
									                   required data-required-msg="required" style="width: 100%"/>
												</td>
											</tr>
										</table>

										<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
											data-bind="style: { backgroundColor: amtDueColor}">
											<div align="left">AMOUNT RECEIVED</div>
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
			                                            			<p class="marginBottom" data-bind="text: lang.lang.cash_account"></p>
			                                            			<input class="marginBottom" id="ddlCash" name="ddlCash"
											            				data-role="dropdownlist"
											            				data-header-template="account-header-tmpl"
											            				data-template="account-list-tmpl"
											              				data-value-primitive="true"
																		data-text-field="name"
											              				data-value-field="id"
											              				data-bind="value: obj.account_id,
											              							source: accountDS"
											              				data-option-label="Select Account..."
											              				required data-required-msg="required" style="width: 100%"/>
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
				                                            	</div>			                                            			
		                                            		</div>
		                                            		<div class="row">
		                                            			<div class="col-md-12">
		                                            			<textarea id="memo2" cols="0" rows="4" class="k-textbox marginBottom"
														        		data-bind="value: obj.memo2" style="width:100%;"
														        		placeholder="Please enter transaction purpose here ..."></textarea>
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
								                <th data-bind="text: lang.lang.items"></th>
								                <th data-bind="text: lang.lang.description"></th>
								                <th data-bind="text: lang.lang.quantity"></th>
								                <th data-bind="text: lang.lang.cost"></th>
								                <th data-bind="visible: showDiscount"><span data-bind="text: lang.lang.discount"></span></th>
								                <th data-bind="text: lang.lang.amount"></th>
								                <th data-bind="text: lang.lang.tax"></th>
								            </tr>
								        </thead>
								        <tbody data-role="listview"
								        		data-template="paymentRefund-template"
								        		data-auto-bind="false"
								        		data-bind="source: lineDS"></tbody>
								    </table>
					            </div>					            
							</div>

							<div class="row">
								<!-- Column -->
								<div class="col-md-4">
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
								<!-- Column END -->

							</div>

							<!-- Return Lines -->
							<div class="row">
								<div class="col-md-12 table-responsive marginTop15">
								    <table class="table color-table dark-table" >
								        <thead>
								            <tr>
								            	<th data-bind="text: lang.lang.no_"></th>
								            	<th >DEPOSIT</th>
								                <th >REFERENCE No.</th>
								                <th data-bind="text: lang.lang.amount"></th>
								            </tr>
								        </thead>
								        <tbody data-role="listview"
								        		data-template="paymentRefund-return-template"
								        		data-auto-bind="false"
								        		data-bind="source: returnDS"></tbody>
								    </table>
								</div>
							</div>

							<div class="row">
								<!-- Column -->
								<div class="col-md-4">
									<button class="btn waves-effect waves-light btn-block btn-info btnPlus marginRight" data-bind="click: addRowReturn"><i class="ti-plus"></i></button><br/><br/>
									
									<!--End Add New Item -->
									<div class="well marginTop15">
										<textarea cols="0" rows="2" class="k-textbox " data-bind="value: obj.memo2" placeholder="memo for internal ..."></textarea>
										<!-- <br>
										<textarea cols="0" rows="2" class="k-textbox" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
									 --></div>

								</div>
								<!-- Column END -->

								<!-- Column -->
								<div class="col-md-4" align="center">
								</div>
								<!-- Column END -->

								<!-- Column -->
								<div class="col-md-4 table-responsive">
									<table class="table color-table dark-table">
										<tbody>
											<tr>
												<td class="textAlignRight" style="width: 60%"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
												<td class="textAlignRight" width="40%"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
											</tr>
											<tr>
												<td class="textAlignRight"><span data-bind="text: lang.lang.total_tax"></span></td>
												<td class="textAlignRight"><span data-format="n" data-bind="text: obj.tax"></span></td>
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
												<td class="textAlignRight"><h4 span data-bind="text: lang.lang.total" style="font-size: 15px; font-weight: 700;"></h4></td>
												<td class="textAlignRight"><h4 data-bind="text: total" style="font-size: 15px; font-weight: 700;"></h4></td>
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
</script>
<script id="paymentRefund-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.paymentRefund.lineDS.indexOf(data)+1#
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
			<input id="txtCost-#:uid#" name="txtCost-#:uid#"
				   type="number" class="k-textbox"
				   min="0"
			       data-bind="value: cost, events: {change : changes}"
			       required data-required-msg="required"
			       placeholder="Cost..."
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
				   data-header-template="tax-header-tmpl"
				   data-role="combobox"
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
<script id="item-measurement-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item_setting">+ Add New Measurement</a>
    </strong>
</script>
<script id="paymentRefund-return-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td class="center">
			<i class="icon-trash" data-bind="events: { click: removeRowReturn }"></i>
			#:banhji.paymentRefund.returnDS.indexOf(data)+1#
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

<!-- Purchase Return -->
<script id="purchaseReturn" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">
                			<h2 data-bind="text: lang.lang.c_purchase_return"></h2>

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
									                   required data-required-msg="required" style="width: 100%"/>
												</td>
											</tr>
										</table>

										<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
											data-bind="style: { backgroundColor: amtDueColor}">
											<div align="left"><span data-bind="text: lang.lang.amount_received"></span></div>
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

																	   <p class="marginBottom width100" data-bind="text: lang.lang.billing_address"></p>
																		<textarea cols="0" rows="2" class="k-textbox marginBottom " data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>
				                                            	</div>

				                                            	<div class="col-md-6">
				                                            		<p class="marginBottom" data-bind="text: lang.lang.job"></p>
				                                            		<input id="ddlJob" name="ddlJob" class="marginBottom"
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
																		   style="width: 100%" /></input>

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
									<table class="table color-table dark-table">
								        <thead>
								            <tr>
								                <th ><span data-bind="text: lang.lang.no_"></span></th>
								                <th ><span data-bind="text: lang.lang.items"></span></th>
								                <th ><span data-bind="text: lang.lang.description"></span></th>
								                <th ><span data-bind="text: lang.lang.quantity"></span></th>
								                <th ><span data-bind="text: lang.lang.cost"></span></th>
								                <th ><span data-bind="text: lang.lang.amount"></span></th>
								                <th ><span data-bind="text: lang.lang.tax"></span></th>
								            </tr>
								        </thead>
								        <tbody data-role="listview"
								        		data-template="purchaseReturn-template"
								        		data-auto-bind="false"
								        		data-bind="source: lineDS"></tbody>
								    </table>
								</div>
							</div>

							<!-- Item Add Row part -->
				            <div class="row">
								<div class="col-md-6">
									<button class="btn waves-effect waves-light btn-block btn-info btnPlus marginRight" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>

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
									<table class="table color-table dark-table">
								        <thead>
								            <tr>
								                <th ><span data-bind="text: lang.lang.no_"></span></th>
								                <th ><span data-bind="text: lang.lang.account"></span></th>
								                <th ><span data-bind="text: lang.lang.description"></span></th>
								                <th data-bind="visible: showRef" ><span data-bind="text: lang.lang.ref"></span></th>
								                <th data-bind="visible: showSegment" ><span data-bind="text: lang.lang.segment"></span></th>
								                <th ><span data-bind="text: lang.lang.amount"></span></th>
								            </tr>
								        </thead>
								        <tbody data-role="listview"
								        		data-template="purchaseReturn-account-line-template"
								        		data-auto-bind="false"
								        		data-bind="source: accountLineDS"></tbody>
								    </table>
								</div>
							</div>

							<!-- Item Add Row part -->
							<div class="row">
								<div class="col-md-12">
									<button class="btn waves-effect waves-light btn-block btn-info btnPlus marginRight" data-bind="click: addRowAccount"><i class="icon-plus icon-white"></i></button>
									<div class="btn-group marginRight" style="float: left">
										<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-list"></i> </a>
										<ul class="dropdown-menu" style="padding: 5px; border-radius:0;">
											<li>
												<input type="checkbox" id="chbReference" class="k-checkbox" data-bind="checked: showRef" />
												<label class="k-checkbox-label" for="chbReference"><span data-bind="text: lang.lang.reference"></span></label>
											</li>
											<li>
												<input type="checkbox" id="chbSegment" class="k-checkbox" data-bind="checked: showSegment" />
												<label class="k-checkbox-label" for="chbSegment"><span data-bind="text: lang.lang.segment"></span></label>
											</li>
										</ul>
									</div>
									<a href="<?php echo base_url()?>rrd#/account" class="btn waves-effect waves-light btn-block btn-info btnAddAccount"><i class="icon-user-follow marginRight"></i>Add Account</a>
								</div>
							</div>

							<div class="row">
								<div class="col-md-7 table-responsive marginTop15">
									<table class="table color-table dark-table">
								        <thead>
								            <tr>
								                <th></th>
								            	<th><span data-bind="text: lang.lang.type_of_return"></span></th>
								                <th>Reference No.</th>
								                <th class="textAlignRight"><span data-bind="text: lang.lang.amount"></span></th>
								            </tr>
								        </thead>
								        <tbody data-role="listview"
								        		data-template="purchaseReturn-return-line-template"
								        		data-auto-bind="false"
								        		data-bind="source: returnDS"></tbody>
								    </table>
								    <a data-bind="click: openOffsetInvoiceWindow" class="btn waves-effect waves-light btn-block btn-info btnAddAccount marginRight" style="width: 200px; color: #fff;"><i class="icon-plus icon-white marginRight"></i>Charge Against Invoice</a>
								    <a data-bind="click: openDepositWindow" class="btn waves-effect waves-light btn-block btn-info btnAddAccount " style="width: 150px; color: #fff;"><i class="icon-plus icon-white marginRight"></i>Add To Deposit</a>


								    <!-- Return Window -->
								    <div data-role="window" class="table-responsive"
						                 data-title="Return Option"
						                 data-width="600"
						                 data-actions="{}"
						                 data-position="{top: '150px', left: '30%'}"
						                 data-height="300"
						                 data-bind="visible: windowVisible">

										<table class="table color-table dark-table">
											<tr data-bind="visible: isOffsetInvoice">
												<td>Offset Invoice</td>
												<td>
													<input data-role="combobox"
													   data-template="reference-list-tmpl"
													   data-value-primitive="true"
									                   data-auto-bind="false"
									                   data-text-field="number"
									                   data-value-field="id"
									                   data-bind="value: returnObj.reference_id,
									                   			  source: referenceDS,
									                   			  events:{change: referenceChanges}"
									                   placeholder="Select Invoice..."
									                   style="width: 100%" />
												</td>
											</tr>
											<tr data-bind="invisible: isOffsetInvoice">
												<td style="width: 15%"><span data-bind="text: lang.lang.deposit_to"></span></td>
												<td style="width: 40%">
													<input id="cbbAccount" name="cbbAccount"
														   data-role="combobox"
										                   data-value-primitive="true"
										                   data-header-template="account-header-tmpl"
										                   data-template="account-list-tmpl"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: returnObj.account_id,
										                   			  source: depositAccountDS"
										                   data-placeholder="Add Account.."
										                   required data-required-msg="required" style="width: 100%" />
												</td>
											</tr>
											<tr>
												<td>Amount</td>
												<td>
													<input data-role="numerictextbox"
														data-spinners="false"
														data-format="n"
														data-min="0"
														data-bind="value: returnObj.amount,
																	events:{change: returnChanges}"
														style="width: 100%;" />
												</td>
											</tr>
										</table>

										<br>

										<div align="center">
											<span class="btn btn-icon btn-primary glyphicons ok_2" data-bind="click: closeWindow" style="width: 80px;"><i></i> <span data-bind="text: lang.lang.save"></span></span>
											<span class="btn btn-icon btn-danger glyphicons remove_2" data-bind="click: cancelWindow" style="width: 80px;"><i></i> Discard</span>
										</div>
									</div>
								</div>
								<div class="col-md-5 table-responsive">
									<table class="table color-table dark-table">
								        <tr>
											<td class="textAlignRight" style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
											<td class="textAlignRight" ><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
										</tr>
										<tr>
											<td class="textAlignRight"><span data-bind="text: lang.lang.total_tax"></span></td>
											<td class="textAlignRight"><span data-format="n" data-bind="text: obj.tax"></span></td>
										</tr>
										<tr>
											<td class="textAlignRight"><h4 span data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
											<td class="textAlignRight"><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
										</tr>
										<tr>
											<td class="textAlignRight">
												Offset Amount:
											</td>
											<td class="textAlignRight">
												<span data-format="n" data-bind="text: obj.deposit"></span>
											</td>
										</tr>
										<tr>
											<td class="textAlignRight">
												<span data-bind="text: lang.lang.remaining" style="font-size: 15px; font-weight: 700;"></span>
											</td>
											<td class="textAlignRight">
												<span id="remaining" name="remaining" data-format="n" data-bind="text: obj.remaining" style="font-size: 15px; font-weight: 700;"></span>
											</td>
										</tr>
								    </table>
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
</script>
<script id="purchaseReturn-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.purchaseReturn.lineDS.indexOf(data)+1#
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
                   data-option-label="UM"
                   style="width: 57%;" />
		</td>
		<td>
			<input id="txtCost-#:uid#" name="txtCost-#:uid#"
				   type="number" class="k-textbox"
				   min="0"
			       data-bind="value: cost, events: {change : changes}"
			       required data-required-msg="required"
			       placeholder="Cost..."
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
<script id="purchaseReturn-account-line-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td class="center">
			<i class="icon-trash" data-bind="events: { click: removeRowAccount }"></i>
			#:banhji.purchaseReturn.accountLineDS.indexOf(data)+1#
		</td>
		<td>
			<input id="cbbAccounts" name="cbbAccounts-#:uid#"
				   data-role="combobox"
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
			<input name="description"
					type="text" class="k-textbox"
					data-bind="value: description"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td data-bind="visible: showRef">
			<input type="text" class="k-textbox"
					data-bind="value: reference_no"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td data-bind="visible: showSegment">
			<select data-role="multiselect" id="ddlSegment"
				   data-value-primitive="true"
				   data-item-template="segment-list-tmpl"
				   data-value-field="id"
				   data-text-field="code"
				   data-bind="value: segments,
				   			source: segmentItemDS,
				   			events:{ change: segmentChanges }"
				   data-placeholder="Add Segment.."
				   style="width: 100%" /></select>
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
<script id="purchaseReturn-return-line-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #" data-bind="click: selectedRow">
		<td class="center">
			<i class="icon-trash" data-bind="events: { click: removeRowReturn }"></i>
		</td>
		<td>#=type#</td>
		<td><span data-bind="text: reference_no"></span></td>
		<td class="right"><span data-format="n2" data-bind="text: amount"></span></td>
    </tr>
</script>
<!-- End -->

<!-- Cash Payment -->
<script id="cashPayment" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid" id="example">
        	<div class="row marginTop15">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">

					        <h2 data-bind="text: lang.lang.cash_payment"></h2>

							<!-- Upper Part -->
							<div class="row">
								<div class="col-md-4">
									<div style="padding: 11px 20px; background: #203864; color: #333; margin-bottom: 10px;">
										<form autocomplete="off" class="form-inline">
											<div class="widget-search separator bottom">
												<button type="button" class="btn btn-default pull-right" data-bind="click: search, disabled: isEdit" style="padding: 5px 9px; width: 18%;"><i class="ti-search"></i></button>
												<div class="overflow-hidden" style="margin-bottom: 10px;">
													<input type="search" placeholder="Bill Number..." data-bind="value: searchText, disabled: isEdit">
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
								                   data-option-label="Select Supplier..."
								                   style="width: 100%; height: 29px;" />

											</div>
										</form>
									</div>

									<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
										data-bind="style: { backgroundColor: amtDueColor}">
										<div align="left"><span data-bind="text: lang.lang.c_amount_paid"></span></div>
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
				                                            		<p class="marginBottom" data-bind="text: lang.lang.payment_method"></p>
				                                            		<input class="marginBottom" id="ddlPaymentMethod" name="ddlPaymentMethod"
																			data-role="dropdownlist"
																			data-header-template="vendor-payment-method-header-tmpl"
												              				data-value-primitive="true"
																			data-text-field="name"
												              				data-value-field="id"
												              				data-bind="value: obj.payment_method_id,
												              							source: paymentMethodDS"
												              				data-option-label="Select Method..."
												              				required data-required-msg="required"
														              				 />

														            <p class="marginBottom" data-bind="text: lang.lang.segment"></p>
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
								<div class="col-md-12 table-responsive marginTop15">
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
										        	var rowIndex = banhji.cashPayment.dataSource.indexOf(dataItem)+1;
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
											    title: 'PAY',
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
										<textarea cols="0" rows="2" class="k-textbox" data-bind="value: obj.memo" placeholder="memo for external ..."></textarea>
									 --></div>

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
												<td class="textAlignRight " style="width: 60%;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
												<td class="textAlignRight " ><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
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
													<input 	data-role="numerictextbox"
										                   	data-format="n"
										                   	data-spinners="false"
										                   	data-min="0"
										                   	data-bind="value: obj.deposit, events: { change: changes }"
										                   	style="width: 90%; text-align: right;">
												</td>
											</tr>
											<tr>
												<td class="textAlignRight ">
													<span data-bind="text: lang.lang.remaining" style="font-size: 15px; font-weight: 700;"></span>
												</td>
												<td class="textAlignRight ">
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
</script>
<script id="cashPayment-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.cashPayment.dataSource.indexOf(data)+1#
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

<!-- Report -->
<script id="expensesSummarySupplier" type="text/x-kendo-template">
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
												<p data-bind="text: lang.lang.supplier" style=""></p>
												<select data-role="multiselect"
													   data-value-primitive="true"
													   data-header-template="supplier-header-tmpl"
													   data-item-template="contact-list-tmpl"
													   data-value-field="id"
													   data-text-field="name"
													   data-bind="value: obj.contactIds,
													   			source: contactDS"
													   data-placeholder="Select Supplier.."
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
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.expenses_purchase_summary_by_supplier"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-3">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_suppliers"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
											</div>
					            		</div>
					            		<div class="col-md-9" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_expenses_purchase"></p>
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
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.supplier"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.credit_purchase"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.cash_purchase"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.total_expense_purchase"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="expensesSummarySupplier-temp"
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
<script id="expensesSummarySupplier-temp" type="text/x-kendo-template" >
	<tr>
		<td>#=name#</td>
		<td style="text-align: center;">#=credit_purchase#</td>
		<td style="text-align: center;">#=cash_purchase#</td>
		<td style="text-align: right;">#=kendo.toString(amount, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="expensesDetailSupplier" type="text/x-kendo-template">
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
												<p data-bind="text: lang.lang.supplier" style=""></p>
												<select data-role="multiselect"
													   data-value-primitive="true"
													   data-header-template="supplier-header-tmpl"
													   data-item-template="contact-list-tmpl"
													   data-value-field="id"
													   data-text-field="name"
													   data-bind="value: obj.contactIds,
													   			source: contactDS"
													   data-placeholder="Select Supplier.."
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
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.expeneses_purchase_detail_by_suppplier"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-3">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_supplier"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
											</div>
					            		</div>
					            		<div class="col-md-9" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_expense_purchase"></p>
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
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.reference"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.amount"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="expensesDetailSupplier-temp"
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
<script id="expensesDetailSupplier-temp" type="text/x-kendo-template">
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
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
			</td>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;" data-bind="text: lang.lang.total"></td>
    	<td></td>
    	<td></td>
    	<td style="font-weight: bold; border-top: 1px solid black !important; color: black; text-align: right">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="4">&nbsp;</td>
    </tr>
</script>
<script id="purchaseSummaryProductServices" type="text/x-kendo-template">
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
													   data-header-template="item-header-tmpl"
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
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.purchase_summary_by_product_services"></h2>
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
														<p style="font-size: 14px;" data-bind="text: lang.lang.avg_purchase"></p>
														<span style="font-size: 20px; font-weight: 700;" data-bind="text: avg_sale"></span>
													</div>
												</div>
											</div>
					            		</div>
					            		<div class="col-md-7" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1 !important; -webkit-print-color-adjust: exact;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_purchase"></p>
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
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.qty"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.amount"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="purchaseSummaryProductServices-temp"
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
<script id="purchaseSummaryProductServices-temp" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td class="hidden-sm-down" style="text-align: right;">#=kendo.toString(quantity, "n")# #=measurement#</td>
		<td style="text-align: right;">#=kendo.toString(amount, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="purchaseDetailProductServices" type="text/x-kendo-template">
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
													   data-header-template="item-header-tmpl"
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
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.purchase_detail_by_product_services"></h2>
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
														<p style="font-size: 14px;" data-bind="text: lang.lang.avg_purchase"></p>
														<span style="font-size: 20px; font-weight: 700;" data-bind="text: product_sale"></span>
													</div>
												</div>
											</div>
					            		</div>
					            		<div class="col-md-7" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1 !important; -webkit-print-color-adjust: exact;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_purchase"></p>
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
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.type"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.supplier"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.purchase_date"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.reference"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.qty"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.amount"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="purchaseDetailProductServices-temp"
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
<script id="purchaseDetailProductServices-temp" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td colspan="5">#=name#</td>
	</tr>
	#var totalAmount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		#totalAmount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important; color: black;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].type#</a>
			<td class="hidden-sm-down" style="text-align: right;">#=line[i].supplier#</td>
			<td style="text-align: center;">#=kendo.toString(new Date(line[i].issued_date),"dd-MM-yyyy")#</td>
			<td class="hidden-sm-down" style="text-align: right;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td class="hidden-sm-down" style="text-align: right;">#=kendo.toString(line[i].quantity, "n")# #=line[i].measurement#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>

	#}#
	<tr>
    	<td colspan="2" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span> #: name #</td>
    	<td class="hidden-sm-down"></td>
    	<td class="hidden-sm-down"></td>
    	<td class="hidden-sm-down"></td>
    	<td style="font-weight: bold; border-top: 1px solid black !important; color: black; text-align: right">
    		#=kendo.toString(totalAmount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="suppliersBalanceSummary" type="text/x-kendo-template">
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
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.suppliers_balance_summary"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-5">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1 !important; -webkit-print-color-adjust: exact;">
												<div class="row">
													<div class="col-md-6">
														<p style="font-size: 14px;" data-bind="text: lang.lang.open_bill"></p>
														<span style="font-size: 20px; font-weight: 700;" data-bind="text: total_txn"></span>
													</div>
													<div class="col-md-6">
														<p style="font-size: 14px;" data-bind="text: lang.lang.number_of_supplier"></p>
														<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
													</div>
												</div>
											</div>
					            		</div>
					            		<div class="col-md-7" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1 !important; -webkit-print-color-adjust: exact;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_supplier_balance"></p>
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
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.supplier_name"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.no_bill"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.balance"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="suppliersBalanceSummary-temp"
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
<script id="suppliersBalanceSummary-temp" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: center;">#=txn_count#</td>
		<td align="right">#=kendo.toString(amount, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="suppliersBalanceDetail" type="text/x-kendo-template">
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
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.supplier_balance_detail"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-5">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1 !important; -webkit-print-color-adjust: exact;">
												<div class="row">
													<div class="col-md-6">
														<p style="font-size: 14px;" data-bind="text: lang.lang.open_bill"></p>
														<span style="font-size: 20px; font-weight: 700;" data-bind="text: total_txn"></span>
													</div>
													<div class="col-md-6">
														<p style="font-size: 14px;" data-bind="text: lang.lang.number_of_supplier"></p>
														<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
													</div>
												</div>
											</div>
					            		</div>
					            		<div class="col-md-7" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1 !important; -webkit-print-color-adjust: exact;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_supplier_balance"></p>
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
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.bill_date"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.reference"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.balance"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="suppliersBalanceDetail-temp"
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
<script id="suppliersBalanceDetail-temp" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td colspan="4">#=name#</td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += kendo.parseFloat(line[i].amount);#
		<tr>
			<td style="padding-left: 20px !important;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].type#</a>
			</td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>			
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;" data-bind="text: lang.lang.total"></td>
    	<td></td>
    	<td></td>
    	<td style="font-weight: bold; border-top: 1px solid black !important; color: black; text-align: right;">
    		#=kendo.toString(amount, "c", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="4">&nbsp;</td>
    </tr>
</script>
<script id="payablesAgingSummary" type="text/x-kendo-template">
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
												<p data-bind="text: lang.lang.supplier" style=""></p>
												<select data-role="multiselect"
													   data-value-primitive="true"
													   data-header-template="supplier-header-tmpl"
													   data-item-template="contact-list-tmpl"
													   data-value-field="id"
													   data-text-field="name"
													   data-bind="value: obj.contactIds,
													   			source: contactDS"
													   data-placeholder="Select Supplier.."
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
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.payables_aging_summary"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-3">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.number_of_supplier"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
											</div>
					            		</div>
					            		<div class="col-md-9" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_supplier_balance"></p>
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
								                data-template="payablesAgingSummary-temp"
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
<script id="payablesAgingSummary-temp" type="text/x-kendo-template" >
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
<script id="payablesAgingDetail" type="text/x-kendo-template">
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
												<p data-bind="text: lang.lang.supplier" style=""></p>
												<select data-role="multiselect"
													   data-value-primitive="true"
													   data-header-template="supplier-header-tmpl"
													   data-item-template="contact-list-tmpl"
													   data-value-field="id"
													   data-text-field="name"
													   data-bind="value: obj.contactIds,
													   			source: contactDS"
													   data-placeholder="Select Supplier.."
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
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.payables_aging_detail"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-3">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.number_of_supplier"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
											</div>
					            		</div>
					            		<div class="col-md-9" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_supplier_balance"></p>
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
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.bill_date"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.due_date"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.ref"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.status"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.amount"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.balance"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="payablesAgingDetail-temp"
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
<script id="payablesAgingDetail-temp" type="text/x-kendo-tmpl">
	<tr>
		<td colspan="7" style="font-weight: bold; color: black;">#: name #</td>
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
    	<td colspan="6" style="font-weight: bold; color: black;">Total</td>
    	<td style="font-weight: bold; border-top: 1px solid black !important; color: black; text-align: right;">
    		#=kendo.toString(totalBalance, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="7">&nbsp;</td>
    </tr>
</script>
<script id="listBillsPaid" type="text/x-kendo-template">
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
												<p data-bind="text: lang.lang.supplier" style=""></p>
												<select data-role="multiselect"
													   data-value-primitive="true"
													   data-header-template="supplier-header-tmpl"
													   data-item-template="contact-list-tmpl"
													   data-value-field="id"
													   data-text-field="name"
													   data-bind="value: obj.contactIds,
													   			source: contactDS"
													   data-placeholder="Select Supplier.."
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
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.list_of_bills_to_be_paid"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-3">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.number_of_supplier"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
											</div>
					            		</div>
					            		<div class="col-md-9" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_balance"></p>
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
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.name"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.reference"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.status"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.amount"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="listBillsPaid-temp"
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
<script id="listBillsPaid-temp" type="text/x-kendo-template">
	<tr>
		<td>
			<a href="\#/#=type.toLowerCase()#/#=id#">#=type#</a>
		</td>
		<td>#=kendo.toString(new Date(issued_date),"dd-MM-yyyy")#</td>
		<td class="hidden-sm-down">#=name#</td>
		<td class="hidden-sm-down">
			<a href="\#/#=type.toLowerCase()#/#=id#">#=number#</a>
		</td>
		<td class="hidden-sm-down" style="text-align: center;">
			# var date = new Date(), dueDates = new Date(due_date).getTime(), toDay = new Date(date).getTime(); #
			#if(dueDates < toDay) {#
				Over Due #:Math.floor((toDay - dueDates)/(1000*60*60*24))# days
			#} else {#
				#:Math.floor((dueDates - toDay)/(1000*60*60*24))# days to pay
			#}#
		</td>
		<td style="text-align: right;">#=kendo.toString(amount, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="billPaymentList" type="text/x-kendo-template">
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
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.bill_payment_list"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-3">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.no_bill"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: total_txn"></span>
											</div>
					            		</div>
					            		<div class="col-md-9" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_balance"></p>
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
		                                    	<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.bill_date"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.bill_number"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.bill_amount"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.payment_date"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.payment_number"></th>
												<th class="hidden-sm-down" style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.payment_amount"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="billPaymentList-temp"
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
<script id="billPaymentList-temp" type="text/x-kendo-template">
	<tr>
		<td colspan="6" style="font-weight: bold; color: black;">#: name #</td>
	</tr>
	# var totalReceived = 0;#
	#for(var i=0; i<line.length; i++){#
		#totalReceived += line[i].amount;#
		<tr>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td>#=line[i].number#</td>
			<td style="text-align: center;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
			<td class="hidden-sm-down">#=kendo.toString(new Date(line[i].reference_issued_date), "dd-MM-yyyy")#</td>
			<td class="hidden-sm-down">#=line[i].reference_number#</a></td>
			<td class="hidden-sm-down" style="text-align: right;">#=kendo.toString(line[i].reference_amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="2" style="font-weight: bold; color: black;" data-bind="text: lang.lang.total">Total</td>
    	<td style="text-align: center; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalReceived, "c2", banhji.locale)#
    	</td>
    	<td class="hidden-sm-down" colspan="3"></td>
    </tr>
	<tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
</script>





<!-- Template -->
<script id="supplier-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor">+ Add New Supplier</a></li>
    </strong>
</script>
<script id="item-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item">+ Add New Item</a> &nbsp;&nbsp;
    	<a href="/c2/rrd\#/item_service">+ Add New Service</a>
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

<script id="contact-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer">+ Add New Customer</a></li>
    </strong>
</script>
<script id="contact-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=abbr##=number#</span>
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
	<span>
		#=number#
	</span>
	-
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
            <span class="pull-right">#:kendo.toString(kendo.parseInt(total), "n0")#</span>
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


<script id="vendorCenter-vendor-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td>
			<div class="">
				<span>#=abbr##=number#</span>
				<span>#=name#</span>
			</div>
		</td>
	</tr>
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
<script id="vendorCenter-note-tmpl" type="text/x-kendo-template">
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
<script id="vendorCenter-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>
    	<td>#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
    	<td>#=type#</td>
        <td>
			#if(type=="Vendor_Deposit" && amount<0){#
				<a data-bind="click: goReference">#=number#</a>
			#}else{#
				<a >#=number#</a>
			#}#
        </td>
    	<td class="right">
    		#if(type=="GRN"){#
    			#=kendo.toString(amount, "n0")#
    		#}else if(type=="Cash_Purchase" || type=="Credit_Purchase"){#
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

        	#if(type=="Credit_Purchase"){#
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
        	#}else if(type=="Purchase_Order"){#
        		#if(status=="0"){#
        			Open
        		#}else if(status=="1"){#
        			Done
        		#}#
        	#}else if(type=="GRN"){#
        		#if(status=="0"){#
        			Open
        		#}else if(status=="1"){#
        			Received
        		#}#
        	#}#
		</td>
    	<!-- Actions -->
    	<td align="center">
    		#if(type=="Credit_Purchase"){#
    			#if(status=="0" || status=="2") {#
        			<a data-bind="click: payBill"><i></i> Pay Bill</a>
        		#}#
        	#}#

        	#if(status=="4") {#
				<a ><i></i> Use</a>
    		#}#
		</td>
    </tr>
</script>
<script id="tax-header-tmpl" type="text/x-kendo-tmpl">
	<strong>
    	<a href="/c2/rrd\#/tax">+ Add New Tax</a>
    </strong>
</script>
<script id="vendor-contact-person-row-tmpl" type="text/x-kendo-tmpl">
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
<!-- End -->  