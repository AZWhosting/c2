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
*	Sale Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15 sale">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" >
                        	<div id="indexMenu"></div>
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
		<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#/" data-bind="click: goReports"><span class="hidden-sm-up"><i class="ti-layout-grid2-thumb"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.reports"></span></a> </li>	    
	    <li class="nav-item hidden-sm-down"> <a class="nav-link" data-toggle="tab" href="#/items" data-bind="click: goMenuItems"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.inventory_for_sale" ></span></a> </li>
    </ul>
</script>
<!-- End -->

<!-- Menu -->
<script id="reports" type="text/x-kendo-template">
	<div class="row " id="reports">
		<div class="col-md-4">
			<div class="saleOverview">
				<h2 data-bind="text: lang.lang.inventory_value"></h2>
				<p data-format="n" data-bind="text: obj.inventory_value"></p>
			</div>

			<!-- Report -->
            <div class="report ">
				<div class="col-md-12">
					<h3><a href="#/inventory_position_summary" data-bind="text: lang.lang.inventory_position_summary" ></a></h3>					
				</div>
				<div class="col-md-12">
					<h3 style="border-bottom: none; padding-bottom: 0;"><a href="#/inventory_position_detail" data-bind="text: lang.lang.inventory_position_detail" ></a></h3>					
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
                         data-bind="source: obj.top_customer"></tbody>
                </table>
            </div>					                        
		</div>
		<div class="col-md-4">
			<div class="saleOverview">
				<h2 data-bind="text: lang.lang.gross_profit_margin"></h2>
				<p data-format="n0" data-bind="text: obj.gross_profit_margin"></p>
			</div>

			<!-- Report -->
			<div class="report ">
				<div class="col-md-12">
					<h3 class="marginBottom"><a href="sales#/sale_detail_by_customer" data-bind="text: lang.lang.sale_detail_by_customer" ></a></h3>
					
				</div>
				<div class="col-md-12">
					<h3 style="border-bottom: none; padding-bottom: 0;"><a href="sales#/sale_detail_by_product" data-bind="text: lang.lang.sale_detail_by_product_services" ></a></h3>
					
				</div>						    					
			</div>

			<!-- Top 4 -->
			<div class="top5 home-footer">
                <table class="table color-table dark-table">
                    <thead>
                        <tr>
                            <th class="center" colspan="2">
                                <span data-bind="text: lang.lang.top_5_suppliers"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody data-role="listview"
                         data-auto-bind="false"
                         data-template="top-contact-template"
                         data-bind="source: obj.top_supplier"></tbody>
                </table>
            </div>					                        
		</div>
		<div class="col-md-4">
			<div class="saleOverview">
				<h2 data-bind="text: lang.lang.turnover_days"></h2>
				<p data-format="n" data-bind="text: obj.inventory_turnover_day"></p>
			</div>

			<!-- Report -->
			<div class="report" >
				<div class="col-md-12">
					<h3 class="marginBottom"><a href="purchases#/list_bills_paid" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></a></h3>
				</div>
				<div class="col-md-12">
					<h3 style="border-bottom: none; padding-bottom: 0;"><a href="purchases#/bill_payment_list" data-bind="text: lang.lang.bill_payment_list"></a></h3>
					
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
                         data-bind="source: obj.top_product"></tbody>
                </table>
            </div>					                        
		</div>
	</div>	
</script>
<script id="checkOut" type="text/x-kendo-template">	
	checkOut
</script>
<script id="transactions" type="text/x-kendo-template">	
	Transactions
</script>
<script id="items" type="text/x-kendo-template">
	<div class="row" id="customers">
		<div class="col-md-3">
			<div class="listWrapper">
				<a href="#/item" class="btn waves-effect waves-light btn-block btn-info btnAddCustomer"><!-- <i class="icon-user-follow marginRight"></i> --><span data-bind="">Add New Item</span></a>
				<div class="innerAll">
					<form autocomplete="off" class="form-inline">
						<div class="widget-search">
							<div class="overflow-hidden">
								<input type="search" placeholder="Number or Name..." data-bind="value: searchText">
							</div>
							<button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="ti-search"></i></button>
						</div>
						<div class="select2-container">
							<input data-role="dropdownlist" style="width: 100%;" 
				                   data-option-label="Select Category..."
					                   data-value-primitive="true"
					                   data-text-field="name"
					                   data-value-field="id"
					                   data-bind="value: category_id,
					                              source: categoryDS"/>
						</div>
					</form>
				</div>

				<span class="results"><span data-bind="text: itemDS.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>

				<div class="table table-condensed"
					 data-role="grid"
					 data-bind="source: itemDS"
					 data-row-template="itemCenter-item-list-tmpl"
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
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#customerInformation" role="tab" aria-selected="false"><span><i class="icon-info"></i></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="" role="tab" aria-selected="false" data-bind="click: pricing"><span><i class="ti-server"></i></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerAttachment" role="tab" aria-selected="false"><span><i class="icon-paper-clip"></i></span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border">
                           	<!--Tab Customer Information -->
                            <div class="tab-pane active" id="customerInformation" role="tabpanel">
                            	<div class="p-10">
                            		<div class="row">
                                    	<div class="col-sm-4">
                                    		<img class="main-image" data-bind="attr: { src: obj.image_url, alt: obj.name, title: obj.name }">
                                    	</div>
                                    	<div class="col-sm-8">
                                    		<div class="accounCetner-textedit" >
								            	<table width="100%">
													<tr>
														<td colspan="2">
															<span data-bind="text: lang.lang.weighted_avg_cost"></span>
														</td>
													</tr>
													<tr>
														<td style="text-align: right" colspan="2">
															<span data-format="n" data-bind="text: raw.cost"></span>
															<span data-bind="text: raw.currency_code"></span>
														</td>
													</tr>
													<tr>
														<td colspan="2">
															<span data-bind="text: lang.lang.price"></span>
														</td>
													</tr>
													<tr>
														<td style="text-align: right" colspan="2">
															<span data-format="n" data-bind="text: raw.price"></span>
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

												<a class="btn waves-effect waves-light btn-block btn-info btnViewEditCustomer" data-bind="click: goEdit"><i class="ti-pencil-alt marginRight"></i><span data-bind="text: lang.lang.view_edit_profile"></span></a>
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
	                        <div class="col-md-12">
								<div class="saleOverview" style="margin-bottom: 8px;">
		                            <p >
		                            	<span data-format="n" data-bind="text: raw.amount"></span>
										<span data-bind="text: raw.currency_code"></span>
		                            </p>
		                            <div class="col-md-12">
		                                <div class="col-md-4">
		                                    <span data-format="n0" data-bind="text: raw.quantity"></span>
		                                    <span data-bind="text: lang.lang.qoh"></span>
		                                </div>
		                                <div class="col-md-4">
		                                    <span data-format="n0" data-bind="text: raw.po"></span>
		                                    <span data-bind="text: lang.lang.on_po"></span>
		                                </div>
		                                <div class="col-md-4">
		                                    <span data-format="n0" data-bind="text: raw.so"></span>
		                                    <span data-bind="text: lang.lang.on_so"></span>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
	                    </div>
                    	<div class="row">
							<div class="col-md-6">
								<div class="blockOpenInvoice" data-bind="click: loadBalance" >
									<div class="coverIcon"><i class="icon-info"></i></div>
									<div class="txt">
										<span data-bind="text: raw.item_type"></span>
										<!-- <span  data-bind="text: lang.lang.open_invoice"></span> -->
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="blockOverDue" data-bind="click: loadOverInvoice" >
									<div class="coverIcon"><i class="ti-alarm-clock"></i></div>
									<div class="txt" >
										<span data-bind="text: raw.txn"></span>
										<span data-bind="text: lang.lang.transaction"></span>
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

					  	<button class="btnSearch" type="button" class="marginBottom" data-role="button" data-bind="click: searchTransaction"><i class="ti-search"></i></button>
					</div>
				</div>
				<!-- End -->

				<!-- Block Table -->
				<div class="row">
					<div class="col-md-12 table-responsive">
						<table class="table color-table dark-table">
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


<!-- Report -->
<script id="inventoryPositionSummary" type="text/x-kendo-template">
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
												<div class="col-md-3">
													<span data-bind="text: lang.lang.category">Category</span>
													<input
														data-role="dropdownlist"
														data-option-label="Category ..."
														data-auto-bind="false"
														data-value-primitive="true"
														data-text-field="name"
														data-value-field="id"
														data-bind="
															value: categorySelect,
															source: categoryDS,
															events: {change: catagoryChange}" style="width: 100%">
												</div>
												<div class="col-md-3">
													<span>Group</span>
														<input
															data-role="dropdownlist"
															data-option-label="Group ..."
															data-auto-bind="false"
															data-value-primitive="false"
															data-text-field="name"
															data-value-field="id"
															data-bind="
																value: groupSelect,
																enabled: haveGroup,
																source: itemGroupDS" style="width: 100%">
												</div>
												<div class="col-md-5">
													<span data-bind="text: lang.lang.item"></span>
													<select data-role="multiselect"
														   data-value-primitive="true"
														   data-header-template="item-header-tmpl"
														   data-item-template="item-list-tmpl"
														   data-value-field="id"
														   data-text-field="name"
														   data-bind="value: obj.itemIds,
														   			source: itemDS"
														   data-placeholder="Select Item.."
														   style="width: 100%" /></select>
												</div>
													
											  	<button style="margin-top: 18px;" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>														
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
					            	<h3 style="font-size: 15px; color: #203864 !important; margin-bottom: 10px;" data-bind="html: institute.name"></h3>
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.inventory_position_summary"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-2">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.product_items"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
											</div>
					            		</div>
					            		<div class="col-md-10" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total_inventory_value"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: total"></span>
											</div>
					            		</div>
					            	</div>
					            </div>

					            <!-- Table -->
					            <div class="reportTable home-footer table-responsive" style="width: 97%; margin: 0 auto;">
					            	<table class="table color-table dark-table" style="width: 100%; height: auto; ">
		                                <thead>
		                                    <tr>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.item_name"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.on_po"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.on_so"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.qoh"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.uom"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.average_cost"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.inventory_value"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="inventoryPositionSummary-template"
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
<script id="inventoryPositionSummary-template" type="text/x-kendo-tmpl">
	<tr>
	    <td>#=name#</td>
	    <td align="right">#=kendo.toString(on_po, "n2")#</td>
	    <td align="right">#=kendo.toString(on_so, "n2")#</td>
	    <td align="right">#=kendo.toString(quantity, "n2")#</td>
	    <td align="right">#=measurement#</td>
	    <td align="right">#=kendo.toString(cost, "c2", banhji.locale)#</td>
	    <td align="right">#=kendo.toString(amount, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="inventoryPositionDetail" type="text/x-kendo-template">
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
												<div class="col-md-3">
													<span data-bind="text: lang.lang.category">Category</span>
													<input
														data-role="dropdownlist"
														data-option-label="Category ..."
														data-auto-bind="false"
														data-value-primitive="true"
														data-text-field="name"
														data-value-field="id"
														data-bind="
															value: categorySelect,
															source: categoryDS,
															events: {change: catagoryChange}" style="width: 100%">
												</div>
												<div class="col-md-3">
													<span>Group</span>
														<input
															data-role="dropdownlist"
															data-option-label="Group ..."
															data-auto-bind="false"
															data-value-primitive="false"
															data-text-field="name"
															data-value-field="id"
															data-bind="
																value: groupSelect,
																enabled: haveGroup,
																source: itemGroupDS" style="width: 100%">
												</div>
												<div class="col-md-5">
													<span data-bind="text: lang.lang.item"></span>
													<select data-role="multiselect"
														   data-value-primitive="true"
														   data-header-template="item-header-tmpl"
														   data-item-template="item-list-tmpl"
														   data-value-field="id"
														   data-text-field="name"
														   data-bind="value: obj.itemIds,
														   			source: itemDS"
														   data-placeholder="Select Item.."
														   style="width: 100%" /></select>
												</div>
													
											  	<button style="margin-top: 18px;" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>														
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
					            	<h3 style="font-size: 15px; color: #203864 !important; margin-bottom: 10px;" data-bind="html: institute.name"></h3>
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.inventory_position_detail"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-2">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.product_items"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: dataSource.total"></span>
											</div>
					            		</div>
					            		<div class="col-md-10" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.total"></p>
												<span style="font-size: 20px; font-weight: 700;" data-bind="text: total"></span>
											</div>
					            		</div>
					            	</div>
					            </div>

					            <!-- Table -->
					            <div class="reportTable home-footer table-responsive" style="width: 97%; margin: 0 auto;">
					            	<table class="table color-table dark-table" style="width: 100%; height: auto; ">
		                                <thead>
		                                    <tr>
		                                    	<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.txn_type"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.date"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.ref"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.qty"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.cost"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.price"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.on_hand"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.avg_cost"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.inventory_value"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="inventoryPositionDetail-template"
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
<script id="inventoryPositionDetail-template" type="text/x-kendo-tmpl">
	<tr>
		<td colspan="7" style="font-weight: bold;">#: name #</td>
    	<td class="texttAlignRight" style="font-weight: bold; !important; color: black;">
    		#=kendo.toString(quantity_forward, "n2")#
    	</td>
    	<td class="textAlignRight" style="color: black;">
    		#=kendo.toString(balance_forward, "c2", banhji.locale)#
    	</td>
	</tr>
	# for(var i = 0; i < line.length; i++){ #
		<tr>
			<td style="color: black;">
				&nbsp;&nbsp; #=line[i].type#
			</td>
			<td style="color: black;">
				#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#
			</td>
			<td style="color: black;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].number#</a>
			</td>
			<td class="textAlignRight" style="color: black;">
				#=kendo.toString(line[i].quantity * line[i].movement, "n2")# #=measurement#
			</td>
			<td class="textAlignRight" style="color: black;">
				<span >#=kendo.toString(line[i].cost, "c2", banhji.locale)#</span>
			</td>
			<td class="textAlignRight" style="color: black;">
				<span >#=kendo.toString(line[i].price, "c2", banhji.locale)#</span>
			</td>
			<td class="textAlignRight" style="color: black;">
				#=kendo.toString(line[i].on_hand, "n2")#
			</td>
			<td class="textAlignRight" style="color: black;">
				<span >#=kendo.toString(line[i].cost_avg, "c2", banhji.locale)#</span>
			</td>
			<td class="textAlignRight" style="color: black;">
				#=kendo.toString(line[i].amount, "c2", banhji.locale)#
			</td>
	    </tr>
    #}#
    <tr>
    	<td colspan="9">&nbsp;</td>
    </tr>
</script>


<!--Function -->
<script id="item" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div id="example" class="container-fluid">
        	<div class="row marginTop15">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">

			        		<h2 data-bind="text: lang.lang.inventory_for_sale"></h2>

			        		<!-- Top Part -->
					    	<div class="row">
					    		<div class="col-md-6">
					    			<div class="well" style="padding-bottom: 5px;">
										<div class="row">
											<div class="col-md-6">
												<!-- Group -->
												<div class="control-group">
													<label for="fullname"><span data-bind="text: lang.lang.category"></span> <span style="color:red">*</span></label>
										            <input class="marginBottom" id="ddlCategory" id="ddlCategory"
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
									                   required data-required-msg="required"
										              		style="width: 100%;" />
												</div>
											</div>

											<div class="col-md-6">
												<!-- Group -->
												<div class="control-group marginBottom">
													<label for="fullname"><span data-bind="text: lang.lang.group"></span> <span style="color:red">*</span></label>
										            <input class="marginBottom" id="ddlItemGroup"
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
											<div class="col-md-6">
												<label for="txtAbbr"><span data-bind="text: lang.lang.number"></span> <span style="color:red">*</span></label>
						              			<br>
						              			<input id="txtAbbr" name="txtAbbr" class="k-textbox marginBottom"
							              				data-bind="value: obj.abbr,
							              						   disabled: obj.is_pattern"
							              				placeholder="eg. AB" required data-required-msg="required"
							              				style="width: 20%;" />
							              		-
							              		<input id="txtNumber" name="txtNumber"
							              			   class="k-textbox marginBottom"
									                   data-bind="value: obj.number,
									                   			  disabled: obj.is_pattern,
									                   			  events:{change:checkExistingNumber}"
									                   placeholder="eg. 001" required data-required-msg="required"
									                   style="width: 74%" />
											</div>
											<div class="col-md-6">
												<label for="txtName"><span data-bind="text: lang.lang.name"></span> <span style="color:red">*</span></label>
							              		<input id="txtName" name="txtName" class="k-textbox marginBottom" data-bind="value: obj.name, disabled: obj.is_pattern"
									              		placeholder="Item name..." required data-required-msg="required"
									              		style="width: 100%;" />
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<!-- Group -->
												<div class="control-group">
													<label for="fullname"><span data-bind="text: lang.lang.currency"></span> <span style="color:red">*</span></label>
										            <input class="marginBottom" id="ddlCurrency" name="ddlCurrency"
								              				data-role="dropdownlist"
								              				data-option-label="(--- Select ---)"
								              				data-template="currency-list-tmpl"
								              				data-value-primitive="true"
										            		data-text-field="code"
							           						data-value-field="locale"
										            		data-bind="source: currencyDS,
										            				   disabled: isLock,
										            				   value: obj.locale"
										            		required data-required-msg="required"
										              		style="width: 100%;" />
												</div>
												<!-- // Group END -->
											</div>

											<div class="col-md-6">
												<!-- Group -->
												<div class="control-group">
													<label for="fullname"><span data-bind="text: lang.lang.uom"></span> <span style="color:red">*</span></label>
										            <input class="marginBottom" id="ddlMeasurement" name="ddlMeasurement"
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
								</div>
								<div class="col-md-6" style="margin-bottom: 15px;">
									<div class="row">
										<div class="col-md-6">
												<!-- Group -->
											<div class="control-group">
												<label for="fullname"><span data-bind="text: lang.lang.average_cost"></span> <span style="color:red">*</span></label>
									            <input class="marginBottom" id="txtCost" name="txtCost"
									            	   type="number" class="k-textbox"
									            	   min="0"
									                   data-bind="value: obj.cost"
									                   placeholder="Add Cost..."
									                   style="width: 100%" />
											</div>
											<!-- // Group END -->
										</div>

										<div class="col-md-6">
											<!-- Group -->
											<div class="control-group">
												<label for="fullname"><span data-bind="text: lang.lang.average_price"></span> <span style="color:red">*</span></label>
									            <input class="marginBottom" id="txtPrice" name="txtPrice"
								            	   type="number" class="k-textbox"
								            	   min="0"
								                   data-bind="value: obj.price"
								                   placeholder="Add Price..."
								                   style="width: 100%" />
											</div>
											<!-- // Group END -->
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<!-- Group -->
											<div class="control-group">
												<label for="txtPurchaseDescription"><span data-bind="text: lang.lang.purchase_description"></span></label>
									            <textarea class="marginBottom" id="txtPurchaseDescription"
									            	class="k-textbox"
													data-bind="value: obj.purchase_description"
													placeholder="Add Purchase Description..."
													style="resize:none; width: 100%;height:94px;"></textarea>
											</div>
											<!-- // Group END -->
										</div>
										<div class="col-md-6">
											<!-- Group -->
											<div class="control-group">
												<label for="txtSaleDescription"><span data-bind="text: lang.lang.sale_description"></span></label>
									            <textarea class="marginBottom" id="txtSaleDescription"
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


							<div class="row" style="margin-bottom: 15px;">
								<div class="p-10 tab-content tabcontent-border" style="width: 98%;margin: 0 auto; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
									<div class="col-md-6">
	                        			<div class="row">
	                        				<div class="col-md-8">
	                                			<!-- Group -->
												<div class="control-group">
													<label for="fullname" class="marginBottom"><span data-bind="">Barcode</span> </label>
										            <input id="txtBarcode" name="txtBarcode" class="k-textbox marginBottom"
							              				data-bind="value: obj.barcode"
							              				placeholder="e.g. 123456" style="width: 100%" />
										        </div>
										    </div>
										    <div class="col-md-4">
										    	<input type="checkbox" data-bind="checked: obj.favorite" />	<span data-bind="text: lang.lang.favorite"></span>
										    </div>
										</div>

										<!-- Group -->
										<div class="control-group">
											<label for="txtSerialNumber"><span data-bind="text: lang.lang.model"></span></label>
					              			<input data-role="dropdownlist"  class="marginBottom"
					              			   data-option-label="(--- Select ---)"
					              			   data-header-template="item-brand-header-tmpl"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.brand_id,
							                              source: brandDS"
							                   style="width: 100%;" />
										</div>

										<div class="control-group">
											<label for="ddlStatus"><span data-bind="text: lang.lang.status">Status</span> <span style="color:red">*</span></label>
								            <input id="ddlStatus" name="ddlStatus" class="marginBottom"
					              				data-role="dropdownlist"
							            		data-text-field="name"
				           						data-value-field="id"
				           						data-value-primitive="true"
							            		data-bind="source: statusList, value: obj.status"
							            		data-option-label="(--- Select ---)"
							            		required data-required-msg="required" style="width: 100%;" />
										</div>


										<div class="control-group">
											<label for="multiselect">Tag</label>
								            <select id="multiselect" name="multiselect" style="width: 100%;"
								            		data-role="multiselect"
								                    data-bind="value: obj.tags,
								                    			source: tagList,
								                    			events:{filtering:tagChanges}"
							            		></select>
										</div>

	                        		</div>
	                        		<div class="col-md-6">
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
								<!-- <div class="col-md-12 fontIcon17" style="margin-bottom: 15px;">
									<ul class="nav nav-tabs" role="tablist">
	                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#customerInfo" role="tab"><span class="hidden-xs-up marginRight"><i class="ti-id-badge"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.info"></span></a> </li>
	                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerAccount" role="tab"><span class="hidden-xs-up marginRight"><i class="fa fa-dollar"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.account"></span></a> </li>
	                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#vendorPayment" role="tab"><span class="hidden-xs-up marginRight"><i class="icon-people"></i></span> <span class="hidden-xs-down" data-bind="">Variants</span></a> </li>
	                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerContact" role="tab"><span class="hidden-xs-up marginRight"><i class="icon-people"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.supplier_customer_codes"></span></a> </li>
	                                </ul>
	                                <div class="tab-content tabcontent-border" style="box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
	                                    <div class="tab-pane active" id="customerInfo" role="tabpanel">
	                                        <div class="p-10">
	                                        	<div class="row">
	                                        		<div class="col-md-6">
	                                        			<div class="row">
	                                        				<div class="col-md-8">
			                                        			
																<div class="control-group">
																	<label for="fullname" class="marginBottom"><span data-bind="">Barcode</span> </label>
														            <input id="txtBarcode" name="txtBarcode" class="k-textbox marginBottom"
											              				data-bind="value: obj.barcode"
											              				placeholder="e.g. 123456" style="width: 100%" />
														        </div>
														    </div>
														    <div class="col-md-4">
														    	<input type="checkbox" data-bind="checked: obj.favorite" />	<span data-bind="text: lang.lang.favorite"></span>
														    </div>
														</div>

														
														<div class="control-group">
															<label for="txtSerialNumber"><span data-bind="text: lang.lang.model"></span></label>
									              			<input data-role="dropdownlist"  class="marginBottom"
									              			   data-option-label="(--- Select ---)"
									              			   data-header-template="item-brand-header-tmpl"
											                   data-value-primitive="true"
											                   data-text-field="name"
											                   data-value-field="id"
											                   data-bind="value: obj.brand_id,
											                              source: brandDS"
											                   style="width: 100%;" />
														</div>

														<div class="control-group">
															<label for="ddlStatus"><span data-bind="text: lang.lang.status">Status</span> <span style="color:red">*</span></label>
												            <input id="ddlStatus" name="ddlStatus" class="marginBottom"
									              				data-role="dropdownlist"
											            		data-text-field="name"
								           						data-value-field="id"
								           						data-value-primitive="true"
											            		data-bind="source: statusList, value: obj.status"
											            		data-option-label="(--- Select ---)"
											            		required data-required-msg="required" style="width: 100%;" />
														</div>


														<div class="control-group">
															<label for="multiselect">Tag</label>
												            <select id="multiselect" name="multiselect" style="width: 100%;"
												            		data-role="multiselect"
												                    data-bind="value: obj.tags,
												                    			source: tagList,
												                    			events:{filtering:tagChanges}"
											            		></select>
														</div>

	                                        		</div>
	                                        		<div class="col-md-6">
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
	                                    <div class="tab-pane" id="customerAccount" role="tabpanel">
	                                    	<div class="p-10">
	                                    		<div class="row">
	                                        		<div class="col-md-4">
	                                        			<label class="marginBottom" for="ddlIncome"><span data-bind="text: lang.lang.income_account"></span> <span style="color:red">*</span></label>
	                                        			<input class="marginBottom"​​id="ddlIncome" name="ddlIncome"
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
	                                        		<div class="col-md-4">
	                                        			<label class="marginBottom" for="ddlCogs"><span data-bind="text: lang.lang.cost_of_good_sold_account"></span> <span style="color:red">*</span></label>
														<input class="marginBottom"​​​​​​​ id="ddlCogs" name="ddlCogs"
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
	                                        		<div class="col-md-4">
	                                        			<label class="marginBottom" for="ddlInventory"><span data-bind="text: lang.lang.inventory_account"></span> <span style="color:red">*</span></label>
														<input class="marginBottom" id="ddlInventory" name="ddlInventory"
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
	                                    </div>
	                                    <div class="tab-pane" id="vendorPayment" role="tabpanel">
	                                    	<div class="p-10">
	                                    		<div class="row">
	                                    			<div class="col-md-12 table-responsive">
	                                    				<div data-bind="invisible: variantDisplay">
												        	<div data-role="grid" class="costom-grid table color-table dark-table"
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

												            <button class="btn waves-effect waves-light btn-block btn-info btnPlus marginRight" data-bind="click: addVariant"><i class="icon-plus icon-white"></i></button>
											            </div>
											            <div data-bind="visible: variantDisplay">
											            	<div data-role="listview"
												        		data-auto-bind="false"
												        		data-template="item-attribute-value-tmpl"
												        		data-bind="source: obj.variant">
														    </div>
											            </div>
	                                    			</div>
	                                        	</div>

	                                    	</div>
	                                    </div>

	                                    <div class="tab-pane" id="customerContact" role="tabpanel">
	                                    	<div class="p-10">
	                                    		<div class="row">
	                                    			<div class="col-md-6 table-responsive">
									        			<span style="margin-bottom: 15px; width: 165px;" class="btn waves-effect waves-light btn-block btn-info " data-bind="click: addEmptyItemVendor"><i class="icon-plus icon-white marginRight"></i> <span data-bind="text: lang.lang.new_vendor_item"></span></span>

											        	<table class="table color-table dark-table">
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
									        		<div class="col-md-6 table-responsive">
									        			<span style="margin-bottom: 15px; width: 185px;" class="btn waves-effect waves-light btn-block btn-info " data-bind="click: addEmptyItemCustomer"><i class="icon-plus icon-white marginRight"></i> <span data-bind="text: lang.lang.new_customer_item"></span></span>

											        	<table class="table color-table dark-table">
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
	                                    </div>

	                                </div>
	                            </div> -->
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
<script id="item-vendor-row-tmpl" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<input id="cbbVendor" name="cbbVendor"
			   data-role="combobox"
			   data-header-template="vendor-header-tmpl"
			   data-template="contact-list-tmpl"
               data-value-primitive="true"
               data-text-field="name"
               data-value-field="id"
               data-bind="value: contact_id,
                          source: vendorDS"
               data-placeholder="Vendor ..."
               style="width: 100%" />
		</td>
		<td>
			<input type="text" class="k-textbox" data-bind="value: code" placeholder="item code ..." style="width: 100%;" />
		</td>
		<td align="center">
			<span class="glyphicons no-js delete" data-bind="click: deleteItemVendor"><i></i></span>
		</td>
	</tr>
</script>
<script id="itemService" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div id="example" class="container-fluid">
        	<div class="row marginTop15">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">

			        		<h2 data-bind="text: lang.lang.service_items"></h2>

			        		<!-- Top Part -->
					    	<div class="row">
					    		<div class="col-md-6">
					    			<div class="well" style="padding-bottom: 5px;">
										<div class="row">
											<div class="col-md-6">
												<!-- Group -->
												<div class="control-group">
													<label for="fullname"><span data-bind="text: lang.lang.category"></span> <span style="color:red">*</span></label>
										            <input class="marginBottom" id="ddlCategory" id="ddlCategory"
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
									                   required data-required-msg="required"
										              		style="width: 100%;" />
												</div>
											</div>

											<div class="col-md-6">
												<!-- Group -->
												<div class="control-group marginBottom">
													<label for="fullname"><span data-bind="text: lang.lang.group"></span> <span style="color:red">*</span></label>
										            <input class="marginBottom" id="ddlItemGroup"
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
											<div class="col-md-6">
												<label for="txtAbbr"><span data-bind="text: lang.lang.number"></span> <span style="color:red">*</span></label>
						              			<br>
						              			<input id="txtAbbr" name="txtAbbr" class="k-textbox marginBottom"
							              				data-bind="value: obj.abbr,
							              						   disabled: obj.is_pattern"
							              				placeholder="eg. AB" required data-required-msg="required"
							              				style="width: 20%;" />
							              		-
							              		<input id="txtNumber" name="txtNumber"
							              			   class="k-textbox marginBottom"
									                   data-bind="value: obj.number,
									                   			  disabled: obj.is_pattern,
									                   			  events:{change:checkExistingNumber}"
									                   placeholder="eg. 001" required data-required-msg="required"
									                   style="width: 74%" />
											</div>
											<div class="col-md-6">
												<label for="txtName"><span data-bind="text: lang.lang.name"></span> <span style="color:red">*</span></label>
							              		<input id="txtName" name="txtName" class="k-textbox marginBottom" data-bind="value: obj.name, disabled: obj.is_pattern"
									              		placeholder="Item name..." required data-required-msg="required"
									              		style="width: 100%;" />
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<!-- Group -->
												<div class="control-group">
										            <label for="ddlStatus"><span data-bind="text: lang.lang.status"></span> <span style="color:red">*</span></label>
										            <input class="marginBottom" id="ddlStatus" name="ddlStatus"
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
													<input type="checkbox" id="chbFavorite" class="k-checkbox" data-bind="checked: obj.favorite">
	  												<label class="k-checkbox-label marginBottom" for="chbFavorite"><span data-bind="text: lang.lang.favorite"></span></label>
												</div>
												<!-- // Group END -->
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6" style="margin-bottom: 15px;">
									<div class="row">
										<div class="col-md-6">
												<!-- Group -->
											<div class="control-group">
									            <label for="ddlMeasurement">Base <span data-bind="text: lang.lang.uom"></span> <span style="color:red">*</span></label>
												<input class="marginBottom" id="ddlMeasurement" name="ddlMeasurement"
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

										<div class="col-md-6">
											<!-- Group -->
											<div class="control-group">
								               	<label for="txtCost"><span data-bind="text: lang.lang.cost"></span></label>
									            <input class="marginBottom" id="txtCost" name="txtCost"
									               data-role="numerictextbox"
									               data-spinners="false"
								                   data-format="n"
								                   data-min="0"
								                   data-bind="value: obj.cost"
								                   style="width: 100%" />
											</div>
											<!-- // Group END -->
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<!-- Group -->
											<div class="control-group">
												<label for="ddlCurrency"><span data-bind="text: lang.lang.currency"></span> <span style="color:red">*</span></label>
									            <input class="marginBottom" id="ddlCurrency" name="ddlCurrency"
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
										<div class="col-md-6">
											<!-- Group -->
											<div class="control-group">
												<label for="txtPrice"><span data-bind="text: lang.lang.price"></span></label>
									            <input class="marginBottom" id="txtPrice" name="txtPrice"
									               data-role="numerictextbox"
									               data-spinners="false"
								                   data-format="n"
								                   data-min="0"
								                   data-bind="value: obj.price"
								                   style="width: 100%">
											</div>
											<!-- // Group END -->
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<!-- Group -->
											<div class="control-group">
								            	<label for="txtPurchaseDescription"><span data-bind="text: lang.lang.purchase_description"></span></label>
									            <textarea id="txtPurchaseDescription" class="k-textbox marginBottom"
													data-bind="value: obj.purchase_description" style="resize:none; width: 100%;height:60px;"></textarea>
											</div>
											<!-- // Group END -->
										</div>
										<div class="col-md-6">
											<!-- Group -->
											<div class="control-group">
								                <label for="txtSaleDescription"><span data-bind="text: lang.lang.sale_description"></span></label>
							            		<textarea id="txtSaleDescription" class="k-textbox marginBottom"
											data-bind="value: obj.sale_description" style="resize:none; width: 100%;height:60px;"></textarea>
											</div>
											<!-- // Group END -->
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12 fontIcon17" style="margin-bottom: 15px;">
									<ul class="nav nav-tabs" role="tablist">
	                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#customerInfo" role="tab"><span class="hidden-xs-up marginRight"><i class="ti-id-badge"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.accounting"></span></a> </li>
	                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerInvoiceNote" role="tab"><span class="hidden-xs-up marginRight"><i class="ti-write"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.supplier_customer_codes"></span></a> </li>
	                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerImage" role="tab"><span class="hidden-xs-up marginRight"><i class="fa fa-picture-o"></i></span> <span class="hidden-xs-down">Image</span></a> </li>
	                                </ul>
	                                <div class="tab-content tabcontent-border" style="box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
	                                    <div class="tab-pane active" id="customerInfo" role="tabpanel">
	                                        <div class="p-10">
	                                        	<div class="row">
	                                        		<div class="col-md-6">
	                                        			<label for="ddlIncome" class="marginBottom"><span data-bind="text: lang.lang.income_account"></span><span style="color:red">*</span></label>
	                                        		
	                                        			<input id="ddlIncome" name="ddlIncome" class="marginBottom"
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
	                                        		<div class="col-md-6">
	                                        			<label for="ddlCogs" class="marginBottom"><span data-bind="text: lang.lang.cost_of_good_sold_account"></span><span data-bind="text: lang.lang.only_for_subcontact"></span><span style="color:red">*</span></label>
	                                        		
	                                        			<input id="ddlCogs" name="ddlCogs" class="marginBottom"
														   data-role="dropdownlist"
														   data-header-template="account-header-tmpl"
														   data-template="account-list-tmpl"
										                   data-value-primitive="true"
										                   data-text-field="name"
										                   data-value-field="id"
										                   data-bind="value: obj.expense_account_id,
										                              source: cogsAccountDS"
										                   data-option-label="Select Account..." style="width: 100%;" />
	                                        		</div>
	                                        	</div>

	                                        </div>
	                                    </div>
	                                    <div class="tab-pane" id="customerInvoiceNote" role="tabpanel">
	                                    	<div class="p-10">
	                                    		<div class="row">
	                                    			<div class="col-md-6">
	                                    				<span style="margin-bottom: 15px; margin-left: 10px; padding: 5px 15px; width: 188px;" class="btn waves-effect waves-light btn-block btn-info" data-bind="click: addEmptyItemVendor"><i class="icon-user-follow marginRight"></i><span data-bind="text: lang.lang.new_vendor_item"></span></span>
		                                    			<div class="col-md-12 table-responsive">
			                                    			<table class="table color-table dark-table">
														        <thead>
														            <tr>
														                <th><span data-bind="text: lang.lang.name"></span></th>
														                <th data-bind="text: lang.lang.code"></th>
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
	                                    			</div>
	                                    			<div class="col-md-6">
	                                    				<span style="margin-bottom: 15px; margin-left: 10px; padding: 5px 15px; width: 188px;" class="btn waves-effect waves-light btn-block btn-info" data-bind="click: addEmptyItemCustomer"><i class="icon-user-follow marginRight"></i><span data-bind="text: lang.lang.new_customer_item"></span></span>
		                                    			<div class="col-md-12 table-responsive">
			                                    			<table class="table color-table dark-table">
														        <thead>
														            <tr>
														                <th><span data-bind="text: lang.lang.name"></span></th>
														                <th data-bind="text: lang.lang.code"></th>
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
<script id="itemService-vendor-row-tmpl" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<input id="cbbVendor" name="cbbVendor"
			   data-role="combobox"
			   data-header-template="vendor-header-tmpl"
			   data-template="contact-list-tmpl"
               data-value-primitive="true"
               data-text-field="name"
               data-value-field="id"
               data-bind="value: contact_id,
                          source: vendorList"
               data-placeholder="Vendor ..."
               style="width: 100%" />
		</td>
		<td>
			<input type="text" class="k-textbox" data-bind="value: code" placeholder="item code ..." style="width: 100%;" />
		</td>
		<td align="center">
			<span class="glyphicons no-js delete" data-bind="click: deleteItemVendor"><i></i></span>
		</td>
	</tr>
</script>
<script id="itemService-customer-row-tmpl" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<input id="cbbCustomer" name="cbbCustomer"
			   data-role="combobox"
			   data-header-template="contact-header-tmpl"
			   data-template="contact-list-tmpl"
               data-value-primitive="true"
               data-text-field="name"
               data-value-field="id"
               data-bind="value: contact_id,
                          source: customerList"
               data-placeholder="Customer ..."
               style="width: 100%" />
		</td>
		<td>
			<input type="text" class="k-textbox" data-bind="value: code" placeholder="item code ..." style="width: 100%;" />
		</td>
		<td align="center">
			<span class="glyphicons no-js delete" data-bind="click: deleteItemCustomer"><i></i></span>
		</td>
	</tr>
</script>


<script id="vendor-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor">+ Add New Supplier</a>
    </strong>
</script>
<script id="item-customer-row-tmpl" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<input id="cbbCustomer" name="cbbCustomer"
			   data-role="combobox"
			   data-header-template="contact-header-tmpl"
			   data-template="contact-list-tmpl"
               data-value-primitive="true"
               data-text-field="name"
               data-value-field="id"
               data-bind="value: contact_id,
                          source: customerDS"
               data-placeholder="Customer ..."
               style="width: 100%" />
		</td>
		<td>
			<input type="text" class="k-textbox" data-bind="value: code" placeholder="item code ..." style="width: 100%;" />
		</td>
		<td align="center">
			<span class="glyphicons no-js delete" data-bind="click: deleteItemCustomer"><i></i></span>
		</td>
	</tr>
</script>
<script id="item-attribute-value-tmpl" type="text/x-kendo-tmpl">
	#=name#,
</script>
<script id="itemCatalog" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">

	        				<h2 data-bind="text: lang.lang.catalog"></h2>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
	</div>		       
</script>
<script id="itemAssembly" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">

				        	<h2 data-bind="text: lang.lang.build_assembly"></h2>
				        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="itemAssembly-row-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.itemAssembly.lineDS.indexOf(data)+1#
		</td>
		<td>
			<input id="ccbItem" name="ccbItem-#:uid#"
				   data-role="dropdownlist"
				   data-template="item-list-tmpl"
				   data-filter="startswith"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: item_id,
                   			  source: itemDS,
                   			  events:{change: itemChanges}"
                   data-option-label="Add Item..."
                   required data-required-msg="required" style="width: 100%" />
		</td>
		<td>
			<input id="txtQuantity-#:uid#" name="txtQuantity-#:uid#"
					data-role="numerictextbox"
					data-spinners="false"
					data-format="n0" data-min="0"
					data-bind="value: quantity,
                   				events:{change: onChanges}"
					required data-required-msg="required" style="width: 48%;" />

			<input data-role="dropdownlist"
				   data-option-label="UM"
                   data-auto-bind="false"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="source: measurementDS,
                   			value: measurement_id"
                   style="width: 50%;" />
		</td>
		<td class="right">
			<span data-format="n" data-bind="text: price"></span>
		</td>
		<td class="right">
			<span data-format="n" data-bind="text: amount"></span>
		</td>
	</tr>
</script>
<script id="itemPrice" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">
			        		<h2 data-bind="text: lang.lang.item_prices"></h2>

			        		<div class="titleCenter" style="text-align: center;">
			        			<span data-bind="text: obj.number"></span>
								-
								<span data-bind="text: obj.name"></span>
			        		</div>

			        		<div class="row">
								<div class="col-md-3" >
									<a href="" class="widget-stats widget-stats-gray widget-stats-1" style="background: #f4f4f4; padding: 8px; text-align: center; float: left; width: 100%;">
										<span class="glyphicons cart_in"><i></i><span class="txt"><span data-bind="text: lang.lang.weighted_avg_cost"></span></span></span>
										<div class="clearfix"></div>
										<span class="count"><span data-format="n" data-bind="text: obj.cost" style="font-size: xx-large;"></span></span>
									</a>
								</div>
								<div class="col-md-3">
									<a href="" class="widget-stats widget-stats-1" style="text-align: center; float: left; width: 100%;">
										<span class="glyphicons cart_out"><i></i><span class="txt"><span data-bind="text: lang.lang.avg_price"></span></span></span>
										<div class="clearfix"></div>
										<span class="count"><span data-format="n" data-bind="text: obj.price" style="font-size: xx-large;"></span></span>
									</a>
								</div>
								<div class="col-md-2">
									<a href="" class="widget-stats widget-stats-gray widget-stats-2" style="background: #f4f4f4; padding: 8px; text-align: center; float: left; width: 100%;">
										<span class="count"><span data-format="n0" data-bind="text: on_hand" style="font-size: 30px; font-weight: 700; text-align: center; position: relative; display: block;"></span></span>
										<span class="txt"><span data-bind="text: lang.lang.qty_on_hand"></span></span>
									</a>
								</div>
								<div class="col-md-2">
									<a href="" class="widget-stats widget-stats-2" style="text-align: center; float: left; width: 100%;">
										<span class="count"><span data-format="n0" data-bind="text: on_po" style="font-size: 30px; font-weight: 700; text-align: center; position: relative; display: block;"></span></span>
										<span class="txt"><span data-bind="text: lang.lang.on_po"></span></span>
									</a>
								</div>
								<div class="col-md-2">
									<a href="" class="widget-stats widget-stats-gray widget-stats-2" style="background: #f4f4f4; padding: 8px; float: left; width: 100%; text-align: center;">
										<span class="count"><span data-format="n0" data-bind="text: on_so" style="font-size: 30px; font-weight: 700; text-align: center; position: relative; display: block;"></span></span>
										<span class="txt"><span data-bind="text: lang.lang.on_so"></span></span>
									</a>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 marginBottom marginTop">
									<button class="btn waves-effect waves-light btn-block btn-info btnPlus marginRight" data-bind="click: openWindow"><i class="ti-plus"></i></button>
									<span data-bind="text: lang.lang.set_new_price"></span>
								</div>
							</div>

							<!-- Item Price Type Window -->
						    <div data-role="window"
					                 data-title="Item Price"
					                 data-width="810"
					                 data-height="290"
					                 data-actions="{}"
					                 data-position="{top: '30%', left: '18%'}"
					                 data-bind="visible: windowVisible">

								<div class="top-itemprice">
									<table>
			            				<tr>
			            					<td>
						            			<input type="radio" value="ltBase" class="k-radio"
						            					name="payOption" id="payOption1"
						            					data-bind="checked: type,
						            								events:{ change: typeChanges }">
						            			<label class="k-radio-label" for="payOption1">Formula A (< Base)</label>
						            		</td>
						            		<td>
									            <input type="radio" value="gtBase" class="k-radio"
									            		name="payOption" id="payOption2"
									            		data-bind="checked: type,
									            					events:{ change: typeChanges }">
									            <label class="k-radio-label" for="payOption2">Formula B (> Base)</label>
							            	</td>
						            </table>

						            <table width="100%">
			            				<tr data-bind="visible: isltBase">
						            		<td><span style="float: left;">1</span></td>
						            		<td>
						            			<span style="float: left; "> Base UOM </span>
						            		</td>
						            		<td><span style="float: left; margin-top: 7px; font-size: 25px; font-weight: 600;">=</span></td>
						            		<td>
						            			<div class="control-group" style="padding: 5px; float: left;">
						            				<label for="txtQuantity"><span data-bind="text: lang.lang.quantity"></span> <span style="color:red">*</span></label>
										            <input id="txtQuantity" name="txtQuantity"
										            	data-role="numerictextbox"
														data-format="n" data-min="1"
														data-spinners="false"
										            	data-bind="value: priceList.quantity,
										            				disabled: isBase,
										            				events:{change:changes}"
						            					required data-required-msg="required" style="width: 100%;">
												</div>
						            		</td>
						            		<td>
						            			<div class="control-group" style="padding: 5px; float: left;">
						            				<label for="ddlMesurement"><span >UOM</span> <span style="color:red">*</span></label>
													<input id="ddlMesurement" name="ddlMesurement"
															data-role="dropdownlist"
															data-value-primitive="true"
										                    data-text-field="name"
										                    data-value-field="id"
										                    data-bind="value: priceList.measurement_id,
										                   			  	source: measurementDS,
										                   			  	events:{change: measurementChanges}"
										                    data-option-label="UM"
										                    required data-required-msg="required" style="width: 100%;" />
												</div>
						            		</td>
						            		<td style="border: 1px solid #D5DBDB;">
						            			<p>
						            				Example:
						            					1 day (Base UOM) = 24 hours
						            			</p>
						            		</td>
						            	</tr>
						            	<tr data-bind="invisible: isltBase">
							            	<td><span style="float: left;">1</span></td>
							            	<td>
							            		<div class="control-group" style="padding: 5px; float: left;">
							            			<label for="ddlMesurement"><span >UOM</span> <span style="color:red">*</span></label>
													<input id="ddlMesurement" name="ddlMesurement"
															data-role="dropdownlist"
															data-value-primitive="true"
										                    data-text-field="name"
										                    data-value-field="id"
										                    data-bind="value: priceList.measurement_id,
										                   			  	source: measurementDS,
										                   			  	events:{change: measurementChanges}"
										                    data-option-label="UM"
										                    required data-required-msg="required" style="width: 100%;" />
												</div>
							            	</td>
							            	<td><span style="float: left; margin-top: 7px; font-size: 25px; font-weight: 600;">=</span></td>
							            	<td>
						            			<div class="control-group" style="padding: 5px; float: left;">
													<label for="txtQuantity"><span data-bind="text: lang.lang.quantity"></span> <span style="color:red">*</span></label>
										            <input id="txtQuantity" name="txtQuantity"
										            	data-role="numerictextbox"
														data-format="n" data-min="0"
														data-spinners="false"
										            	data-bind="value: priceList.quantity,
										            				disabled: isBase,
										            				events:{change:changes}"
						            					required data-required-msg="required" style="width: 100%;">
												</div>
						            		</td>
						            		<td><span >Base UOM</span></td>
						            		<td style="border: 1px solid #D5DBDB;">
						            			Example:
						            				1 week = 7 days (Base UOM)
						            		</td>
							            </tr>
							            <tr><td colspan="6"></td></tr>
							            <tr style="background-color: #D5DBDB;">
							            	<td colspan="6">
							            		<div class="control-group" style="padding: 5px; float: left;">
													<label for="txtPrice"><span >Price</span> <span style="color:red">*</span></label>
													<input id="txtPrice" name="txtPrice"
														   type="number" class="k-textbox" min="0"
										                   data-bind="value: priceList.price"
										                   required data-required-msg="required" style="width:100%;" />
												</div>
							            	</td>
							            </tr>
						            </table>
								</div>

								<br>
								<div style="text-align: center;">
									<span class="btn btn-success btn-icon glyphicons ok_2" data-bind="click: save"><i></i>Save</span>
									<span class="btn btn-danger btn-icon glyphicons remove_2" data-bind="click: closeWindow"><i></i><span data-bind="text: lang.lang.close"></span></span>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12 table-responsive marginTop">
									<table class="table color-table dark-table">
								        <thead>
								            <tr>
								                <th data-bind="text: lang.lang.conversion_ratio" ></th>
								                <th data-bind="text: lang.lang.uom" ></th>
								                <th data-bind="text: lang.lang.price" ></th>
								                <th style="text-align: center;"></th>
								            </tr>
								        </thead>
								        <tbody data-template="itemPrice-template"
								        	data-auto-bind="false"
								        	data-bind="source: dataSource"></tbody>
								    </table>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12 table-responsive">
									<table class="table color-table dark-table">
								        <thead>
								            <tr>
								                <th data-bind="text: lang.lang.date"></th>
								            	<th data-bind="text: lang.lang.type"></th>
								                <th data-bind="text: lang.lang.reference"></th>
								                <th data-bind="text: lang.lang.quantity"></th>
								                <th data-bind="text: lang.lang.cost"></th>
								                <th data-bind="text: lang.lang.price"></th>
								            </tr>
								        </thead>
								        <tbody data-template="itemPrice-movement-tmpl"
								        	data-auto-bind="false"
								        	data-pageable="true"
								        	data-bind="source: recordDS"></tbody>
								    </table>	
								    <div id="pager" class="k-pager-wrap"
							             data-role="pager"
							             data-auto-bind="false"
							             data-bind="source: recordDS"></div>

							        <div id="ntf1" data-role="notification"></div>							    
								</div>
							</div>
			        	</div>
					</div>
			    </div>
			</div>
		</div>
	</div>
</script>
<script id="itemPrice-template" type="text/x-kendo-template">
    <tr>
    	<td class="right">#=conversion_ratio#</td>
    	<td class="left">#=measurement#</td>
    	<td class="right">#=kendo.toString(price, "n")#</td>
    	<td style="text-align: center;">
    		<span style="cursor: pointer;" data-bind="click: edit"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit"></span></span>
    		<span style="cursor: pointer;" data-bind="click: delete"><i class="icon-remove"></i> <span data-bind="text: lang.lang.delete"></span></span>
    	</td>
    </tr>
</script>
<script id="itemPrice-movement-tmpl" type="text/x-kendo-tmpl">
    <tr>
    	<td>#=kendo.toString(new Date(transaction_issued_date), "dd-MM-yyyy")#</td>
    	<td>#=transaction_type#</td>
        <td>
			<a href="\#/#=transaction_type.toLowerCase()#/#=id#">#=transaction_number#</a>
        </td>
    	<td align="center">
    		#=kendo.toString(quantity*movement, "n0")#
    		#=measurement#
    	</td>
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

<script id="itemCenter-item-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td>
			<div class="media-body">
				<span >
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
<script id="contact-person-row-tmpl" type="text/x-kendo-tmpl">
	<tr>
		<td>
			<input id="name" name="name"
					type="text" class="k-textbox"
					data-bind="value: name"
					placeholder="eg: Mr. John"
					required="required" validationMessage="required" style="width: 100%;" />
            <span data-for="name" class="k-invalid-msg"></span>
		</td>
		<td>
			<input type="text" class="k-textbox" data-bind="value: department" placeholder="eg: Accounting" style="width: 100%;" />
		</td>
		<td>
			<input type="text" class="k-textbox" data-bind="value: phone" placeholder="eg: 012 333 444" style="width: 100%;" />
		</td>
		<td>
			<input type="text" class="k-textbox" data-bind="value: email" placeholder="eg: john@email.com" style="width: 100%;" />
		</td>
		<td style="text-align: center;">
			<span class="glyphicons btn-danger delete" data-bind="click: deleteContactPerson"><i class="ti-close"></i></span>
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
		<td style="text-align: center;">
			#if(id){#
				<a href="#=url#" target="_blank" class="btn-action glyphicons download btn-default"><i></i></a>
			#}#
			<span class="btn-action glyphicons btn-danger" data-bind="click: removeFile"><i class="ti-close"></i></span>
		</td>
	</tr>
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
<!-- End -->


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


<!-- Template-->
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