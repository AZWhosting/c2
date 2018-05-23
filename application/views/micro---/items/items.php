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
		<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#/" data-bind="click: goReports"><span class="hidden-sm-up"><i class="ti-layout-grid2-thumb"></i></span> <span class="hidden-xs-down" data-bind="">Reports</span></a> </li>
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/transactions" data-bind="click: goTransactions"><span class="hidden-sm-up"><i class="ti-layout-accordion-list"></i></span> <span class="hidden-xs-down">Item Transactions</span></a> </li>
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/items" data-bind="click: goMenuItems"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="">Items</span></a> </li>
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
           <!--  <div class="report ">
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
			</div> -->

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
			<!-- <div class="report" style="min-height: 385px; ">
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
			</div> -->

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
			<!-- <div class="report" style="min-height: 385px; ">
				<div class="col-md-12">
					<h3><a href="#/collect_invoice" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></a></h3>
					<p data-bind="text: lang.lang.lists_all_unpaid_invoices_grouped_by_due_today_and_overdue"></p>
				</div>
				<div class="col-md-12">
					<h3><a href="#/collection_report" data-bind="text: lang.lang.collection_report"></a></h3>
					<p data-bind="text: lang.lang.lists_of_collected_invoices_for_the_select_period_of_time_group_by_method_of_payment"></p>
				</div>
			</div> -->

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
				<a href="#/item" class="btn waves-effect waves-light btn-block btn-info btnAddCustomer"><i class="icon-user-follow marginRight"></i><span data-bind="">Add New Item</span></a>
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
					<div class="col-md-6">dsgdfsgds
						<!-- <div class="row">
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
									<div class="txt">
										<span data-bind="text: lang.lang.deposit"></span>
										<span data-bind="text: deposit" ></span>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="blockOpenInvoice" data-bind="click: loadBalance" >
									<div class="coverIcon"><i class="icon-info"></i></div>
									<div class="txt">
										<span  data-bind="text: outInvoice"></span>
										<span  data-bind="text: lang.lang.open_invoice"></span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="blockOverDue" data-bind="click: loadOverInvoice" >
									<div class="coverIcon"><i class="ti-alarm-clock"></i></div>
									<div class="txt" >
										<span data-bind="text: overInvoice"></span>
										<span data-bind="text: lang.lang.over_due"></span>
									</div>
								</div>
							</div>
						</div> -->
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




<!-- -->
<script id="item" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
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


							<div class="row">
								<div class="col-md-12 fontIcon17" style="margin-bottom: 15px;">
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
									              			<input data-role="dropdownlist"
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
															<label for="ddlStatus"><span data-bind="text: lang.lang.status"></span> <span style="color:red">*</span></label>
												            <input id="ddlStatus" name="ddlStatus"
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

	                                    	</div>
	                                    </div>

	                                    <div class="tab-pane" id="customerContact" role="tabpanel">
	                                    	<div class="p-10">
	                                    		<div class="row">
	                                    			
	                                    		</div>
	                                    	</div>
	                                    </div>
	                                    
	                                    <div class="tab-pane" id="customerImage" role="tabpanel">
	                                    	<div class="p-10">
	                                    		<div class="row">
	                                    			
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
<script id="item-measurement-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/item_setting">+ Add New Measurement</a>
    </strong>
</script>
<!-- End -->


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