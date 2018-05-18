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
                        <div class="card-body">
			                <!-- Nav tabs -->
			                <ul class="nav nav-tabs customtab" role="tablist">
			                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#reports" role="tab"><span class="hidden-sm-up"><i class="ti-layout-grid2-thumb"></i></span> <span class="hidden-xs-down">Reports</span></a> </li>
			                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#check_out" role="tab"><span class="hidden-sm-up"><i class="ti-layout-accordion-list"></i></span> <span class="hidden-xs-down">Check Out</span></a> </li>
			                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#purchases_transaction" role="tab"><span class="hidden-sm-up"><i class="ti-layout-accordion-list"></i></span> <span class="hidden-xs-down">Purchases Transactions</span></a> </li>
			                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customers" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Purchases</span></a> </li>
			                </ul>
			                <!-- Tab panes -->
			                <div class="tab-content">
			                	<!-- Tab Report -->
			                    <div class="tab-pane active" id="reports" role="tabpanel">
		                        	<div class="row ">
				    					<div class="col-md-4">
				    						<div class="saleOverview">
				    							<h2 data-bind="text: lang.lang.purchase"></h2>
				    							<p data-format="n" data-bind="text: objTop.purchase"></p>
				    							<div class="col-md-12">
				    								<div class="col-md-4">
				    									<span data-bind="text: objTop.purchase_supplier"></span>
				    									<span data-bind="text: lang.lang.supplier"></span>
				    								</div>
				    								<div class="col-md-4">
				    									<span data-bind="text: objTop.purchase_product"></span>
				    									<span data-bind="text: lang.lang.product"></span>
				    								</div>
				    								<div class="col-md-4">
				    									<span data-bind="text: objTop.purchase_ordered"></span>
				    									<span data-bind="text: lang.lang.order"></span>
				    								</div>
				    							</div>
				    						</div>

				    						<!-- Report -->
					                        <div class="report ">
					    						<div class="col-md-12">
					    							<h3><a href="#/expenses_purchase_summary_supplier" data-bind="text: lang.lang.expenses_purchase_summary_by_supplier" ></a></h3>
					    							<p data-bind="text: lang.lang.summarizes_total_expenses_purchase_for_each"></p>
					    						</div>
					    						<div class="col-md-12">
					    							<h3><a href="#/expenses_purchase_detail_supplier" data-bind="text: lang.lang.expeneses_purchase_detail_by_suppplier" ></a></h3>
					    							<p data-bind="text: lang.lang.lists_individual_expenses_purchase_transactions_by"></p>
					    						</div>
					    						<div class="col-md-12">
					    							<h3><a href="#/purchase_summary_product_services" data-bind="text: lang.lang.purchase_summary_by_product_services" ></a></h3>
					    							<p data-bind="text: lang.lang.summarizes_total_expenses_purchase_for_each"></p>
					    						</div>
					    						<div class="col-md-12">
					    							<h3><a href="#/purchase_detail_product_services" data-bind="text: lang.lang.purchase_detail_by_product_services" ></a></h3>
					    							<p data-bind="text: lang.lang.lists_individual_sale_transactions_by_date_for_each_product"></p>
					    						</div>						    					
					    					</div>

				    						<!-- Top 4 -->
				    						<div class="top5 home-footer">
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
					                                     data-bind="source: objTop.top_supplier"></tbody>
					                            </table>
					                        </div>
				    					</div>
				    					<div class="col-md-4">
				    						<div class="saleOverview">
				    							<h2 data-bind="text: lang.lang.purchase_order"></h2>
				    							<p data-format="n0" data-bind="text: objTop.po"></p>
				    							<div class="col-md-12">
				    								<div class="col-md-6">
				    									<span data-format="n0" data-bind="text: objTop.po_avg"></span>
				    									<span data-bind="text: lang.lang.average"></span>
				    								</div>
				    								<div class="col-md-6">
				    									<span data-bind="text: objTop.po_open"></span>
				    									<span data-bind="text: lang.lang.order_open"></span>
				    								</div>
				    							</div>
				    						</div>

				    						<!-- Report -->
					    					<div class="report">
						                        <div class="col-md-12">
					    							<h3><a href="#/suppliers_balance_summary" data-bind="text: lang.lang.suppliers_balance_summary" ></a></h3>
					    							<p data-bind="text: lang.lang.show_each_supplier_total_outstanding_balances"></p>
					    						</div>
					    						<div class="col-md-12">
					    							<h3><a href="#/suppliers_balance_detail" data-bind="text: lang.lang.suppliers_balance_detail" ></a></h3>
					    							<p data-bind="text: lang.lang.lists_individual_unpaid_bill_for_each_supplier"></p>
					    						</div>
					    						<div class="col-md-12">
													<h3><a href="#/payables_aging_summary" data-bind="text: lang.lang.payables_aging_summary"></a></h3>
													<p data-bind="text: lang.lang.lists_all_unpaid_bills_for_the_current_period_30_60_90_and_more"></p>	
												</div>
												<div class="col-md-12">
													<h3><a href="#/payables_aging_detail" data-bind="text: lang.lang.payables_aging_detail"></a></h3>
													<p data-bind="text: lang.lang.lists_individual_unpaid_bills_grouped_by_suppliers_this_includes"></p>
												</div>
											</div>

				    						<!-- Top 4 -->
				    						<div class="top5 home-footer">
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
							                             data-bind="source: objTop.top_ap"></tbody>
							                    </table>
					                        </div>
				    					</div>
				    					<div class="col-md-4">
				    						<div class="saleOverview">
				    							<h2 data-bind="text: lang.lang.payables"></h2>
				    							<p data-format="n" data-bind="text: objTop.ap"></p>
				    							<div class="col-md-12">
				    								<div class="col-md-4">
				    									<span data-format="n0" data-bind="text: objTop.ap_open"></span>
				    									<span data-bind="text: lang.lang.open"></span>
				    								</div>
				    								<div class="col-md-4">
				    									<span data-bind="text: objTop.ap_supplier"></span>
				    									<span data-bind="text: lang.lang.supplier"></span>
				    								</div>
				    								<div class="col-md-4">
				    									<span data-bind="text: objTop.ap_overdue"></span>
				    									<span data-bind="text: lang.lang.overdue"></span>
				    								</div>
				    							</div>
				    						</div>

				    						<!-- Report -->
					    					<div class="report" >
					    						<div class="col-md-12">
													<h3><a href="#/list_bills_paid" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></a></h3>
												</div>
												<div class="col-md-12">
													<h3><a href="#/bill_payment_list" data-bind="text: lang.lang.bill_payment_list"></a></h3>
													<p data-bind="text: lang.lang.lists_of_paid_bills_for_the_select_period_of_time_group_by_method_of_payments"></p>
												</div>
											</div>

				    						<!-- Top 4 -->
				    						<div class="top5 home-footer">
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
					                                     data-bind="source: objTop.top_cash_payment"></tbody>
					                            </table>
					                        </div>
				    					</div>
				    				</div>
			                    </div>
			                    <!-- End Tab Report -->

			                    <!-- Tab Check Out -->
			                    <div class="tab-pane" id="check_out" role="tabpanel">3</div>
			                    <!-- End Tab Check Out -->

			                    <!-- Tab Sales Transaction -->
			                    <div class="tab-pane" id="purchases_transaction" role="tabpanel">
		                        	<div class="row">
				    					<div class="col-md-7 align-self-center text-right">
						                    <div class="btn-group">
						                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						                        	Add New
						                        </button>
						                        <div class="dropdown-menu">
						                            <a class="dropdown-item" href="javascript:void(0)"><span data-bind="text: lang.lang.create_quotation"></span></a>
						                            <a class="dropdown-item" href="javascript:void(0)"><span data-bind="text: lang.lang.create_invoice"></span></a>
						                            <a class="dropdown-item" href="javascript:void(0)"><span data-bind="text: lang.lang.create_cash_sale"></span></a>
						                            <a class="dropdown-item" href="javascript:void(0)"><span data-bind="text: lang.lang.create_cash_receipt"></span></a>
						                        </div>
						                    </div>
						                </div>
				    				</div>
			                    </div>
			                    <!-- End Tab Sale Transaction -->

			                    <!-- Tab Customer -->
			                    <div class="tab-pane" id="customers" role="tabpanel">
		                        	<div class="row">
		                        		<div class="col-md-3">
		                        			<div class="listWrapper">
		                        				<a href="#/customer" class="btn waves-effect waves-light btn-block btn-info btnAddCustomer"><i class="icon-user-follow marginRight"></i><span data-bind="">Add New Purchase</span></a>
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
												                   data-option-label="Select Type..."
												                   data-value-primitive="true"
												                   data-text-field="name"
												                   data-value-field="id"
												                   data-bind="value: contact_type_id,
												                              source: contactTypeDS"/>
														</div>
													</form>
												</div>

												<span class="results"><span data-bind="text: contactDS.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>

												<div class="table table-condensed"
													 data-role="grid"
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
						                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerAttachment" role="tab" aria-selected="false"><span><i class="icon-paper-clip"></i></span></a> </li>
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
						                                            		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goGRN"><span data-bind="text: lang.lang.goods_received_note"></span></a>
						                                            	</div>
						                                            	<div class="col-sm-6">
						                                            		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goPurchaseReturn"><span data-bind="text: lang.lang.purchase_return"></span></a>
						                                            	</div>
						                                            </div>
						                                            <div class="row">
						                                            	<div class="col-sm-6">
						                                            		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goDeposit"><span data-bind="text: lang.lang.deposit"></span></a>
						                                            	</div>
						                                            	<div class="col-sm-6">
						                                            		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goCashPayment"><span data-bind="text: lang.lang.cash_payment"></span></a>
						                                            	</div>
						                                            </div>
						                                            <div class="row">
						                                            	<div class="col-sm-6">
						                                            		<a class="btn waves-effect waves-light btn-block btn-info" data-bind="click: goPaymentRefund"><span data-bind="text: lang.lang.payment_refund"></span></a>
						                                            	</div>
						                                            </div>
						                                        </div>
						                                    </div>
						                                    <!-- End -->

						                                   	<!--Tab Customer Information -->
						                                    <div class="tab-pane" id="customerInformation" role="tabpanel">
						                                    	<div class="p-10">
						                                    		<div class="row">
						                                            	<div class="col-sm-4">
						                                            		<img class="main-image" data-bind="attr: { src: obj.image_url, alt: obj.name, title: obj.name }">
						                                            	</div>
						                                            	<div class="col-sm-8">
						                                            		<div class="accounCetner-textedit">
																            	<table width="100%">
																					<tr>
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
																					</tr>
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
																					<tr>
																						<td><span data-bind="text: lang.lang.currency"></span></td>
																						<td>
																							<span data-bind="text: currencyCode"></span>
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
																<div class="blockBalance" data-bind="click: loadBalance" >
																	<div class="coverIcon"><i class="ti-server"></i></div>
																	<div class="txt">
																		<span  data-bind="text: lang.lang.balance"></span>
																		<span data-bind="text: balance"></span>
																	</div>
																</div>
															</div>
															<div class="col-md-6">
																<div class="blockDeposit" data-bind="click: loadPO">
																	<div class="coverIcon"><i class=" ti-briefcase"></i></div>
																	<div class="txt">
																		<span data-bind="text: lang.lang.po"></span>
																		<span data-bind="text: po" ></span>
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
			                    </div>
			                    <!-- End Tab Customer -->
			                </div>
			            </div>
			        </div>
	            </div>
	        </div>
        </div>
    </div>
</script>
<!-- End Section-->






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
<!-- End -->


<!-- Quote -->
<script id="purchaseOrder" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
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
			                                            			1
			                                            		</div>

				                                            	<div class="col-md-6">
				                                            		2
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
			                            <a class="dropdown-item" href='#/item'><span data-bind="text: lang.lang.add_inventory_for_sale"></span></a>
			                            <a class="dropdown-item" href='#/non_inventory_part'><span data-bind="text: lang.lang.add_noninventory_for_sale"></span></a>
			                            <a class="dropdown-item" href='#/item_service'><span data-bind="text: lang.lang.add_services"></span></a>
			                            <a class="dropdown-item" href='#/txn_item'><span data-bind="text: lang.lang.add_transaction_item"></span></a>
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
</script>
<!-- End -->

<!-- Customer Deposit -->
<script id="vendorDeposit" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
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

				                                            		<p class="marginBottom width100" data-bind="text: lang.lang.billing_address"></p>
																	<textarea cols="0" rows="2" class="k-textbox marginBottom " data-bind="value: obj.bill_to" placeholder="Billing to ..."></textarea>
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
									<a href="#/account" class="btn waves-effect waves-light btn-block btn-info btnAddAccount"><i class="icon-user-follow marginRight"></i>Add Account</a>
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



<!-- Template Report-->
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
				<a href="\#/#=type.toLowerCase()#/#=id#">#=number#</a>
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
        	#}else if(type=="GRN"){#<script id="vendorCenter-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>
    	<td>#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
    	<td>#=type#</td>
        <td>
			#if(type=="Vendor_Deposit" && amount<0){#
				<a data-bind="click: goReference">#=number#</a>
			#}else{#
				<a href="\#/#=type.toLowerCase()#/#=id#">#=number#</a>
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
				<a href="\#/#=type.toLowerCase()#/#=id#"><i></i> Use</a>
    		#}#
		</td>
    </tr>
</script>

<!-- End -->