<div id="wrapperApplication" class="wrapper"></div>
<!--load before somthing not yet done -->
<div id="holdpageloadhide" style="display:block;text-align: center;position: fixed;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
	<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
</div>
<!-- template section starts -->
<script type="text/x-kendo-template" id="layout">
	<div id="content" class="container"></div>
</script>
<script type="text/x-kendo-template" id="blank-tmpl">
</script>
<script id="Receipt" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="row">
							<div class="col-xs-12 col-sm-4">
								<table width="100%" cellpadding="10">
									<tr>
								        <td>
								        	<h2 style="width: 100%" data-bind="text: lang.lang.wreceipt">Receipt</h2>
								        	<p>
								        		<span data-bind="text: lang.lang.in_here"></span>
								        	</p>
								        	<p style="width: 100%; float: left; margin-top: 8px;">
									        	<span style="position: relative; height: 35px; line-height: 35px;  float: left; display: block; ">
													<a data-bind="text: lang.lang.reconcile_transfer" style="color: #203864; line-height: 17px; background: #fff; width: 100%; padding: 10px 13px; font-size: 18px; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; float: left;" href="#/reconcile">
														Reconcile & Transfer
													</a>
												</span>
											</p>
								        </td>
								 	</tr>
								</table>
								<div class="row">
									<div class="col-xs-12 col-sm-12">
										<div class="innerAll padding-bottom-none-phone" style="padding: 0 !important; margin: 8px 0 15px 0;">
											<a href="javascript:void(0)" class="widget-stats widget-stats-gray widget-stats-4" style="background: #fff; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; "> 
												<span class="txt" style="color: #203864;"><span data-bind="text: lang.lang.customer">Customer</span></span>
												<span class="count" style="color: #203864;" data-bind="text: numCustomer">0</span>
												<span class="glyphicons user userss"><i></i></span>
											</a>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12">
										<div class="innerAll padding-bottom-none-phone" style="background: #fff; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1; margin: 0 0 15px 0">
											<a href="#/wPayment_summary" class="widget-stats widget-stats-primary widget-stats-4" style="background: #fff; padding-left: 15px !important;">
												<span class="txt" style="color: #203864;"><span data-bind="text: lang.lang.today_payment">Today Payment</span></span>
												<span class="count"><span style="font-size: 35px; color: #203864;" data-bind="text: paymentReceiptToday">0៛</span></span>
												<span class="glyphicons coins addcolors"><i></i></span>
											</a>
										</div>
									</div>
								</div>
								<div class="cover-block" style="padding-left: 15px; padding-right: 15px;">
									<h2 data-bind="text: lang.lang.reports" style="width: 100%;">Report</h2>
									<p data-bind="text: lang.lang.summary_and_detail_cash">
										Summary and detail cash receipt reports grouped by sources/ methods of receipts
									</p>
									<ul >
										<li><a href="#/cash_receipt_detail"><span data-bind="text: lang.lang.cash_receipt_by_detail">Cash Receipt By Detail</span></a></li>  
						  				<li><a href="#/cash_receipt_source_summary"><span data-bind="text: lang.lang.cash_receipt_by_sources_summary">Cash Receipt By Sources Summary</span></a></li>
						  				<li><a href="#/cash_receipt_source_detail"><span data-bind="text: lang.lang.cash_receipt_by_sources_detail">Cash Receipt By Sources Detail</span></a></li> 
									</ul>
								</div>
							</div>
							<div class="col-xs-12 col-sm-8" style="padding-right: 0">
								<!--Session-->
								<div class="row-fluid" data-bind="invisible: haveSession" style="width:100%;background: #fff; float: left; padding: 15px; margin-left: -15px;">
									<h2 style="padding:0 15px 0 0;" data-bind="text: lang.lang.start_session">Start Session</h2><br><br>
									<table class="table table-bordered table-primary table-striped table-vertical-center">
								        <thead>
								            <tr>
								                <th class="center" style="width: 50px;"><span data-bind="text: lang.lang.no_">No.</span></th>
								                <th><span data-bind="text: lang.lang.currency">Currency</span></th>
								                <th><span data-bind="text: lang.lang.amount">Amount</span></th>
								            </tr> 
								        </thead>
								        <tbody data-role="listview" 
							        		data-template="cashier-session-template" 
							        		data-auto-bind="false"
							        		data-bind="source: cashierItemDS"></tbody>
								    </table>
								    <span class="btn btn-icon btn-primary glyphicons ok_2" style="width: 135px;float: left; margin-bottom: 0px;"><i></i><span data-bind="text: lang.lang.add_session, click: addSession">Save</span></span>
								</div>
								<!--End Session-->
								<div id="loadING" style="display:none;text-align: center;position: absolute;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
									<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
								</div>
								<div class="row" data-bind="visible: haveSession" style="background: #fff; float: left; width: 100%; padding: 15px 0 0;">
									<div class="col-sm-12" style="padding-right: 0;/">
										<!-- Upper Part -->
										<div class="row" >
											<div class="col-sm-12" style="display: none;">
												<div class="box-generic-noborder" >
												    <div class="tab-content" style="padding-top: 12px;">
												    	<div class="col-sm-3" style="padding-left: 0;">
															<div class="control-group">
																<label ><span data-bind="text: lang.lang.license">License</span></label>
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
														<div class="col-sm-3" style="padding-left: 0;">
															<div class="control-group">								
																<label ><span data-bind="text: lang.lang.location">Bloc</span></label>
																<input 
																	data-role="dropdownlist" 
																	style="width: 100%;" 
																	data-option-label="Location ..." 
																	data-auto-bind="false" 
																	data-value-primitive="true" 
																	data-text-field="name" 
																	data-value-field="id" 
																	data-bind="
																		value: locationSelect,
									                  					source: locationDS,
									                  					events: {change: blocChange},
									                  					enabled: slocation">
									                  		</div>
														</div>
														<div class="col-sm-3" style="padding-left: 0;">
															<div class="control-group">								
																<label ><span data-bind="text: lang.lang.month_of">Month Of</span></label>
													            <input type="text" 
												                	style="width: 100%;" 
												                	data-role="datepicker"
												                	data-format="MM-yyyy"
												                	data-start="year" 
													  				data-depth="year" 
												                	placeholder="Moth of ..." 
														           	data-bind="value: monthSelect,
														           				enabled: haveMonth,
														           				events: {change: monthChange}" />
															</div>
														</div>
														<div class="col-sm-1" style="padding-left: 0;">
															<div class="control-group">
																<label ><span data-bind="text: lang.lang.action">Action</span></label>	
																<div class="row" style="margin: 0;">
																	<button type="button" data-role="button" data-bind="click: searchINV" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="icon-search"></i></button>
																</div>
									                  		</div>
														</div>
														<div class="col-sm-2" data-bind="visible: downloadView" style="padding-left: 0;">
															<div class="control-group">
																<label ><span data-bind="text: lang.lang.download">Download</span></label>	
																<div class="row" style="margin: 0;">
																	<button type="button" data-role="button" data-bind="click: ExportExcel" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="download_alt"></i> <span data-bind="text: lang.lang.download"></span></button>
																</div>
									                  		</div>
														</div>
														<div class="col-sm-2" data-bind="visible: balanceView" style="padding-left: 0;">
															<div class="control-group">
																<label ><span data-bind="text: lang.lang.balance">Download</span></label>	
																<div class="row" style="margin: 0;">
																	<button type="button" data-role="button" data-bind="click: serachBalance" class="k-button" role="button" aria-disabled="false" tabindex="0"><i class="download_alt"></i> <span data-bind="text: lang.lang.balance"></span></button>
																</div>
									                  		</div>
														</div>
												    </div>
												</div>
											</div>
										</div>
										<div class="row" >
											<div class="col-xs-12 col-sm-6">
												<div class="widget widget-heading-simple widget-body-primary widget-employees">
													<div class="widget-body padding-none" style="background: none; width: 100%; float: left; border: none; padding: 0;">
														<div class="row-fluid row-merge">
															<div class="listWrapper" style="min-height: 0; margin-bottom: 15px; padding: 0;">
																<div style="margin-bottom: 10px;">
																	<input id="ddlPaymentMethod" name="ddlPaymentMethod"
																			data-role="dropdownlist"
												              				data-value-primitive="true"
																			data-text-field="name" 
												              				data-value-field="id"
												              				data-bind="
												              					value: searchSelect,
												              					source: searchSelectDS,
												              					events: { change: changeSearchMethod}"
												              				required data-required-msg="required" 
												              				style="width: 100%" />
																</div>
																<div class="innerAll" style="padding: 15px 15px 0;overflow: hidden;">
																	<div class="widget-search separator bottom" data-bind="visible: haveSearchInv">
																		<button class="btn btn-default pull-right" data-bind="click: search"><i class="icon-search"></i></button>
																		<div class="overflow-hidden">
																			<input style="line-height: 26px;" type="text" placeholder="Invoice Number..." data-bind="
																				value: searchText,
																				events: {change: search}
																			">
																		</div>
																	</div>
																	<div style="margin-bottom: 15px;" data-bind="visible: haveSearchCus">
																		<input data-role="combobox"
															                   	data-placeholder="Customer Name"
															                   	data-value-primitive="true"
															                   	data-text-field="name"
															                   	data-value-field="id"
															                   	data-filter="contains"
	                   															data-min-length="3"
															                   	data-bind="
															                   		value: selectedCustomer,
															                        source: customerDS,
															                        events: {
															                            change: search
															                        }"
															                   style="width: 100%;"
															            />
															        </div>
															        <div style="margin-bottom: 15px;" data-bind="visible: haveSearchMet">
																		<input data-role="combobox"
															                   	data-placeholder="Meter Number"
															                   	data-value-primitive="true"
															                   	data-text-field="number"
															                   	data-value-field="id"
															                   	data-filter="contains"
	                   															data-min-length="3"
															                   	data-bind="
															                   		value: selectedMeter,
															                        source: searchMeterDS,
															                        events: {
															                            change: search
															                        }"
															                   style="width: 100%;"
															            />
															        </div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="strong" style="margin-bottom: 15px; width: 100%; padding: 10px; float: left;" align="center"
													data-bind="style: { backgroundColor: amtDueColor}">
													<div align="left"><span data-bind="text: lang.lang.amount_received"></span></div>
													<h2 data-bind="text: total_received" align="right"></h2>
												</div>
											</div>
											<div class="col-xs-12 col-sm-6">
												<div class="box-generic-noborder" >
												    <div class="tab-content">
												    	<!-- Options Tab content -->
												        <div class="tab-pane active" id="tab1-1">
												            <table style="margin-bottom: 0;" class="table table-borderless table-condensed cart_total">
												            	<tr>
																	<td><span data-bind="text: lang.lang.date"></span></td>
																	<td class="right">
																		<input id="issuedDate" name="issuedDate" 
																			data-role="datepicker"
																			data-format="dd-MM-yyyy"
																			data-parse-formats="yyyy-MM-dd HH:mm:ss"
																			data-bind="value: obj.issued_date, 
																						events:{ change : issuedDateChanges }" 
																			required data-required-msg="required"
																			style="width:100%;" />
																	</td>
																</tr>
																<tr>
													            	<td>
													            		<span data-bind="text: lang.lang.payment_term"></span>
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
													            	<td><span data-bind="text: lang.lang.cash_account"></span></td>
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
																	<td><span data-bind="text: lang.lang.segment"></span></td>
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
										    </div>
										</div>
										<table class="table table-bordered table-primary table-striped table-vertical-center" style="margin-top: 15px;">
									        <thead>
									            <tr>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.date"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.name"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.number"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.meter"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.amount"></th>
									            	<th style="vertical-align: top;" data-bind="visible: chhDiscount, text: lang.lang.discount"></th>
									            	<th style="vertical-align: top;" data-bind="text: lang.lang.receive"></th>
									            </tr>
									        </thead>
									        <tbody data-role="listview" 
								        		data-template="cashReceipt-list-template" 
								        		data-auto-bind="false"
								        		data-bind="source: dataSource"></tbody>
									    </table>
							            <div class="row">
											<div class="col-xs-12 col-sm-5"> 
												<div class="btn-group">
													<div class="leadcontainer">
													</div>
													<a style="margin-bottom: 15px" class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-list"></i> </a>
													<ul class="dropdown-menu" style="padding: 5px; border-radius:0;">
														<li>
															<input type="checkbox" id="chhDiscount" class="k-checkbox" data-bind="checked: chhDiscount">
						  									<label class="k-checkbox-label" for="chhDiscount"><span data-bind="text: lang.lang.discount"></span></label>
						  								</li>
													</ul>
												</div>
												<br>
											</div>
											<div class="col-xs-12 col-sm-7">
												<table class="table table-condensed table-striped table-white">
													<tbody>
														<tr>
															<td class="right"><span data-bind="text: lang.lang.total_received"></span>:</td>
															<td class="right strong"><span data-bind="text: total_received"></span></td>
															<td class="right"><span data-bind="text: lang.lang.subtotal"></span>:</td>
															<td class="right strong" width="40%"><span data-format="n2" data-bind="text: obj.sub_total"></span></td>
														</tr>
														<tr>
															<td class="right"><span data-bind="text: lang.lang.remaining"></span>:</td>
															<td class="right strong"><span data-format="n2" data-bind="text: obj.remaining"></span></td>
															<td class="right"><span data-bind="text: lang.lang.total_discount"></span>:</td>
															<td class="right strong">
																<span data-format="n2" data-bind="text: obj.discount"></span>
						                   					</td>
														</tr>
														<tr data-bind="visible: haveFine">
															<td></td>
															<td></td>
															<td class="right">
																<span data-bind="text: lang.lang.fine"></span>
															</td>
															<td class="right strong">
																<span data-format="n2" data-bind="text: amountFine"></span>
															</td>
														</tr>
														<tr>
															<td></td>
															<td></td>
															<td class="right"><h4 data-bind="text: lang.lang.total"></h4></td>
															<td class="right strong"><h4 data-bind="text: total"></h4></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="row" style="min-height: 160px;overflow: hidden;">
											<div class="col-xs-12 col-sm-12 col-md-6" >
												<h5 data-bind="text: lang.lang.note_recieve"></h5><br>
												<table class="table table-bordered table-primary table-striped table-vertical-center">
											        <thead>
											            <tr>
											                <th style="vertical-align: top;"><span data-bind="text: lang.lang.no_">No.</span></th>
											                <th style="vertical-align: top;"><span data-bind="text: lang.lang.currency">Currency</span></th>
											                <th style="vertical-align: top;"><span data-bind="text: lang.lang.cash_receipt">Cash Receipt</span></th>
											            </tr> 
											        </thead>
											        <tbody data-role="listview" 
										        		data-template="cash-currency-template" 
										        		data-auto-bind="false"
										        		data-bind="source: receipCurrencyDS"></tbody>
											    </table>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-6" data-bind="visible: btnActive">
											    <div class="row-fluid" data-bind="visible: haveChangeMoney">
											    	<h5 data-bind="text: lang.lang.change_currency"></h5><br>
											    	<table class="table table-bordered table-primary table-striped table-vertical-center">
												        <thead>
												            <tr>
												                <th class="center" style="width: 50px;"><span data-bind="text: lang.lang.no_">No.</span></th>
												                <th><span data-bind="text: lang.lang.currency">Currency</span></th>
												                <th><span data-bind="text: lang.lang.cash_receipt">Cash Receipt</span></th>
												            </tr> 
												        </thead>
												        <tbody data-role="listview" 
											        		data-template="change-currency-receipt-template" 
											        		data-auto-bind="false"
											        		data-bind="source: receipChangeDS"></tbody>
												    </table>
											    </div>
											</div>
										</div>
										<div class="box-generic bg-action-button">
											<div id="ntf1" data-role="notification"></div>
											<div class="row">
												<div class="col-sm-12" align="right">
													<span class="btn-btn" data-bind="click: cancel" ><span data-bind="text: lang.lang.cancel"></span></span>
													<span id="saveNew" class="btn-btn" data-bind="visible: btnActive, click: save" ><span data-bind="text: lang.lang.save"></span></span>
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
<script id="cashier-session-template" type="text/x-kendo-template">
	<tr>
		<td>
			#:banhji.Receipt.cashierItemDS.indexOf(data)+1#	
		</td>
		<td>
			<p> #: currency# </p>
		</td>
		<td>
			<input style="text-align: right;" id="numeric" class="k-formatted-value k-input" type="number" value="17" min="0" data-bind="value: amount" step="1" />
		</td>
	</tr>
</script>
<script id="cashReceipt-template" type="text/x-kendo-template">
	<tr data-uid="#: uid #">		
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.Receipt.dataSource.indexOf(data)+1#			
		</td>		
		<td>#=kendo.toString(new Date(due_date), "dd-MM-yyyy")#</td>
		<td>#=contact.name#</td>		
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
				   data-format="c"
                   data-decimals="3"
                   data-min="0"                   
                   data-bind="value: received,
                              events: { change: changes }"
                   style="width: 100%;">			
		</td>
    </tr> 
</script>
<script id="cashReceipt" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">					
				<div id="example" class="k-content">					
				    
			    	<span class="glyphicons no-js remove_2 pull-right" 
		    				onclick="javascript:window.history.back()"
							data-bind="click: cancel"><i></i></span>

			        <h2 data-bind="text: lang.lang.cash_receipt"></h2>			    		   

				    <br>				   				
						
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
				<!-- Upper Part -->								

				</div>							
			</div>
		</div>
	</div>
</script>
<script id="cashReceipt-list-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<i class="icon-trash" data-bind="events: { click: removeRow }"></i>
			#:banhji.Receipt.dataSource.indexOf(data)+1#			
		</td>
		<td>#=kendo.toString(new Date(invissued_date), "dd-MMMM-yyyy", "km-KH")#</td>
		<td>#=contact_name#</td>
		<td>#=invnumber#</td>
		<td>#=meter#</td>
		<td class="center">
			#=kendo.toString(amountshow, locale=="km-KH"?"c0":"c", locale)#		
		</td>
		<td class="center" data-bind="visible: chhDiscount">
			<input data-role="numerictextbox"
				   data-spinners="false"
				   data-format="c0"
				   data-culture="#:locale#"
                   data-min="0"                   
                   data-bind="value: discount,
                              events: { change: changes }"
                   style="width: 100%; text-align: right;">			
		</td>
		
		<td class="center">
			<input data-role="numerictextbox"
				   data-spinners="false"
				   data-format="c"
				   data-culture="#:locale#"
                   data-min="0"
                   data-decimals="3"               
                   data-bind="value: amount,
                              events: { change: changes }"
                   style="width: 100%; text-align: right;">			
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
		<td> #:banhji.Receipt.receipCurrencyDS.indexOf(data) +1#</td>
		<td>
			<input style="text-align: left;background: none;border:none;" id="numeric" class="k-formatted-value k-input" type="text" data-bind="value: currency, enabled: false"  />
		</td>
		<td>
			<input style="text-align: right;" id="numeric" class="k-formatted-value k-input" type="number" value="17" min="0" data-format="n0" data-bind="value: amount, events: {change: checkChange}" step="1" />
		</td>
	</tr>
</script>
<script id="change-currency-receipt-template" type="text/x-kendo-template">
	<tr>
		<td>
			#:banhji.Receipt.receipChangeDS.indexOf(data) +1#</td>
		<td>
			<input style="text-align: left;background: none;border: none;" id="numeric" class="k-formatted-value k-input" type="text" data-bind="value: currency, enabled: false"  />
		</td>
		<td>
			<input style="text-align: right;" id="numeric" class="k-formatted-value k-input" type="number" value="17" min="0" data-bind="value: amount, events: {change: checkChangeMoney}" step="1" />
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
		<div class="customer-background" style="margin-top: 15px;">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>						
					</div>
			        <h2 style="padding:0 15px 0 0;" data-bind="text: lang.lang.custom_forms"></h2>
				    <br>	
				    <div class="row" style="margin-left:0;">			   				
						<div class="span4">	
							<div class="span12" style="margin-bottom: 10px;">
								<input type="text" id="formName" name="Form Name" class="k-textbox" placeholder="Form Name" required validationMessage="" data-bind="value: obj.name" style="width: 100%;" />
							</div>
							<div class="span12">
								<h2 class="btn btn-block btn-primary" style="color: #fff!important;width: 100%;margin-bottom: 5px;" data-bind="text: lang.lang.form_style">Form Style</h2>
								<div class="row formstyle">
									<div id="formStyle"
										 data-role="listview"
										 data-auto-bind="false"
										 data-selectable="true"
						                 data-template="invoiceCustom-txn-form-template"
						                 data-bind="source: txnFormDS"
						                 style="overflow: auto;width: 100%;">
						            </div>
						        </div>
							</div>
							<div class="span12" style="margin-left:0; margin-top: 10px;">
								<h2 class="btn btn-block btn-primary" style="color: #fff!important;width: 100%;margin-bottom: 5px;" data-bind="text: lang.lang.form_color">Form Color</h2>
								<div class="colorPalatte span12">
									<div class="" style="margin-top: 15px;">
										<div data-selectable="true" data-bind="value: obj.color, events: { change : colorCC }" data-tile-size='{ width: 60, height: 35 }' data-role="colorpalette" data-columns="6" data-palette='[ "#ffffff", "#000000", "#eeece1", "#1f497d", "#4f81bd", "#c0504d", "#9bbb59", "#dbeef3", "#8064a2", "#f79646", "#f2f2f2", "#7f7f7f", "#ddd9c3", "#c6d9f0", "#dbe5f1", "#f2dcdb", "#ebf1dd", "#e5e0ec"]'></div>
                                	</div>
                                </div>
							</div>
							<div class="span12" style="margin-left:0; margin-top: 10px;padding-bottom: 30px;">
								<h2 class="btn btn-block btn-primary" style="color: #fff!important;width: 100%;margin-bottom: 5px;" data-bind="text: lang.lang.form_appearance">Form Appearance</h2>
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
					<div class="box-generic bg-action-button">
						<div id="ntf1" data-role="notification"></div>
						<div class="row">
							<div class="span12" align="right">
								<span id="saveClose" data-bind="click: save" class="btn btn-icon btn-success glyphicons power" style="width: 120px;"><i></i> <span data-bind="text: lang.lang.save_close"></span></span>		
							</div>
						</div>
					</div>
				</div>							
			</div>
		</div>
	</div>
</script>
<script id="invoiceForm1" type="text/x-kendo-template">
	<div class="container font-small winvoice-print" style="margin-bottom: 10px; width: 610px; ">
		<div class="span12 headerinv " style="border-bottom: 2px solid \#000;padding: 15px 0;">
            <img class="logoP" data-bind="attr: { src: objLicense.image_url }"  style="position: absolute;left: 0;top: 20px;max-width: 100px;height: auto;max-height: 50px;" />
			<div class="span12" align="center">
				<h4 data-bind="text: objLicense.name"></h4>					
				<h5 data-bind="text: objLicense.address"></h5>
				<h5 data-bind="text: objLicense.mobile"></h5>					
			</div>
		</div>		

		<div class="span12 cover-customer">
			
			<div class="span7">
				<span id="secondwnumber1" style="margin-left: -14px;"></span>
				<div class="span12">
					<p>អតិថិជន​ <span>001</span></p>
					<p>Customer Name</p>
					<p>No.124, St. 11</p>
					<p style="font-size: 10px;"><i>ថ្ងៃ​ចាប់​ផ្តើម​ទទួល​ប្រាក់ <?php echo date("d/m/Y"); ?></i></p>
				</div>
			</div>
			<div class="span4">
				<table >
					<tr>
						<td width="200"><p>លេខ​វិក្កយ​បត្រ</p></td>
						<td><p>WM00001</p></td>
					</tr>
					<tr>
						<td><p>ថ្ងៃ​ចេញ វិក្កយ​បត្រ</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
					<tr>
						<td><p>តំបន់</p></td>
						<td><p>A1-001</p></td>
					</tr>
					<tr>
						<td><p>គិត​ចាប់​ពី​ថ្ងៃ​ទី</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
					<tr>
						<td><p>ដល់​ថ្ងៃ​ទី</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
				</table>		
			</div>			
		</div>
		<table class="span12 table table-bordered footerTbl" style="padding:0;margin-top: 40px;border:1px solid #000; border-radius: 3px;border-collapse: inherit;margin-left: 0px;">
			<thead>
				<tr>
					<th width="180" class="darkbblue main-color">លេខ​កុងទ័រ<br>METER</th>
					<th width="150" class="darkbblue main-color">អំណានចាស់<br>PREVIOUS</th>
					<th width="120" class="darkbblue main-color">អំណានថ្មី<br>CURRENT</th>
					<th width="120" class="darkbblue main-color">បរិមាណ<br>CONSUMPTION</th>
					<th width="120" class="darkbblue main-color">តំលៃឯកត្តា<br>RATE</th>
					<th width="180" class="darkbblue main-color">តំលៃសរុប<br>AMOUNT</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="vertical-align: middle;"> <?php echo date("d/m/Y"); ?></td>
					<td colspan="4" style="text-align: right">
						ជំពាក់​សរុប​នៅ​ថ្ងៃ​ធ្វើ​វិក្កយបត្រ Balance as at billing date .រ
					</td>
					<td>
						0<br>
					</td>
				</tr>
				<tr>
					<td data-bind="text: meter_number"></td>
					<td align="center">1</td>
					<td align="center">2</td>
					<td align="center">1</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>រំលោះ</td>
					<td align="center"></td>
					<td align="center"></td>
					<td align="center">1,០០០</td>
					<td></td>
					<td></td>
				</tr>
				<tr><td colspan="6"  style="height: 80px;" ></td></tr>
				<tr>
					<td colspan="5" style="padding-right: 10px;background: #355176;color: #fff;text-align: right;" class="darkbblue main-color">បំណុល​សរុប TOTAL BALANCE</td>
					<td style="border: 1px solid;text-align: right"><strong>1,000</strong></td>
				</tr>
				<tr>
					<td rowspan="4" colspan="3"></td>
					<td colspan="2" class="greyy" style="background: \\#ccc;">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td style="text-align: right"><strong>1,000</strong></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;">ថ្ងៃផុតកំណត់ DUE DATE</td>
					<td> <?php echo date("d/m/Y"); ?></td>
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
					<td width="180">1,000</td>
				</tr>
				<tr>
					<td><p>វិក្កយបត្រ</p></td>
					<td><span><?php echo date("d/m/Y"); ?></span> - <span>WM00001</span></td>
					<td class="greyy" style="background: #ccc;border-bottom:1px solid #fff;">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td></td>
				</tr>
				<tr>
					<td><p>អតិថិជន</p></td>
					<td><span>001</span> <span>Customer Name</span><br>
					<span>012 111 222</span> <span>No. 123, St.11</span></td>
					<td class="greyy" style="background: #ccc;border-bottom:1px solid #fff;">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
				<tr>
					<td>លេខ​ទី​តាំង</td>
					<td>A1-01</td>
					<td rowspan="2" class="greyy" style="background: #ccc;">អ្នកទទួលប្រាក់ RECEIVER</td>
					<td rowspan="2"></td>
				</tr>
				<tr>
					<td>លេខ​កុនង​ទ័រ</td>
					<td>WM0001</td>
				</tr>
			</tbody>
		</table>
	</div>
</script>
<script id="invoiceForm2" type="text/x-kendo-template">
	<div class="container font-small winvoice-print" style="margin-bottom: 10px; width: 610px; ">
		<div class="span12 headerinv " style="visibility: hidden;border-bottom: 2px solid \#000;padding: 15px 0;">
            <img class="logoP" data-bind="attr: { src: objLicense.image_url }"  style="position: absolute;left: 0;top: 20px;max-width: 100px;height: auto;max-height: 50px;" />
			<div class="span12" align="center">
				<h4 data-bind="text: objLicense.name"></h4>					
				<h5 data-bind="text: objLicense.address"></h5>
				<h5 data-bind="text: objLicense.mobile"></h5>					
			</div>
		</div>		

		<div class="span12 cover-customer">
			
			<div class="span7">
				<span id="secondwnumber1" style="margin-left: -14px;"></span>
				<div class="span12">
					<p>អតិថិជន​ <span>001</span></p>
					<p>Customer Name</p>
					<p>No.124, St. 11</p>
					<p style="font-size: 10px;"><i>ថ្ងៃ​ចាប់​ផ្តើម​ទទួល​ប្រាក់ <?php echo date("d/m/Y"); ?></i></p>
				</div>
			</div>
			<div class="span4">
				<table >
					<tr>
						<td width="200" style="visibility: hidden;"><p>លេខ​វិក្កយ​បត្រ</p></td>
						<td><p>WM00001</p></td>
					</tr>
					<tr>
						<td style="visibility: hidden;"><p>ថ្ងៃ​ចេញ វិក្កយ​បត្រ</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
					<tr>
						<td style="visibility: hidden;"><p>តំបន់</p></td>
						<td><p>A1-001</p></td>
					</tr>
					<tr>
						<td style="visibility: hidden;"><p>គិត​ចាប់​ពី​ថ្ងៃ​ទី</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
					<tr>
						<td style="visibility: hidden;"><p>ដល់​ថ្ងៃ​ទី</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
				</table>		
			</div>			
		</div>
		<table class="span12 table footerTbl" style="border:none;padding:0;margin-top: 40px; border-radius: 3px;border-collapse: inherit;margin-left: 0px;">
			<thead style="visibility: hidden;">
				<tr>
					<th width="180" class="darkbblue main-color">លេខ​កុងទ័រ<br>METER</th>
					<th width="150" class="darkbblue main-color">អំណានចាស់<br>PREVIOUS</th>
					<th width="120" class="darkbblue main-color">អំណានថ្មី<br>CURRENT</th>
					<th width="120" class="darkbblue main-color">បរិមាណ<br>CONSUMPTION</th>
					<th width="120" class="darkbblue main-color">តំលៃឯកត្តា<br>RATE</th>
					<th width="180" class="darkbblue main-color">តំលៃសរុប<br>AMOUNT</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="vertical-align: middle;"> <?php echo date("d/m/Y"); ?></td>
					<td colspan="4" style="text-align: right">
						ជំពាក់​សរុប​នៅ​ថ្ងៃ​ធ្វើ​វិក្កយបត្រ Balance as at billing date .រ
					</td>
					<td>
						0<br>
					</td>
				</tr>
				<tr>
					<td data-bind="text: meter_number"></td>
					<td align="center">1</td>
					<td align="center">2</td>
					<td align="center">1</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>រំលោះ</td>
					<td align="center"></td>
					<td align="center"></td>
					<td align="center">1,០០០</td>
					<td></td>
					<td></td>
				</tr>
				<tr><td colspan="6"  style="height: 80px;" ></td></tr>
				<tr>
					<td colspan="5" style="visibility: hidden;padding-right: 10px;background: #355176;color: #fff;text-align: right;" class="darkbblue main-color">បំណុល​សរុប TOTAL BALANCE</td>
					<td style="border: none;text-align: right"><strong>1,000</strong></td>
				</tr>
				<tr>
					<td rowspan="4" colspan="3"></td>
					<td colspan="2" class="greyy" style="visibility: hidden;background: \\#ccc;">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td style="text-align: right"><strong>1,000</strong></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;visibility: hidden;">ថ្ងៃផុតកំណត់ DUE DATE</td>
					<td> <?php echo date("d/m/Y"); ?></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;visibility: hidden;">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;visibility: hidden;">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
			</tbody>
		</table>
		<div class="line" style="visibility: hidden;"></div>
		<table class="span12 table footerTbl" style="border:none;padding:0;border-collapse: inherit;margin-top: 15px; border-radius: 3px;margin-left: 0px;">
			<tbody>
				<tr>
					<td width="100"></td>
					<th width="390" style="border: none">
						<span style="margin-left: -15px;" id="footwnumber1"></span>
					</th>
					<td width="270" class="greyy" style="background: #ccc;border-bottom:1px solid #fff;visibility: hidden;">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td width="180">1,000</td>
				</tr>
				<tr>
					<td style="visibility: hidden;"><p>វិក្កយបត្រ</p></td>
					<td><span><?php echo date("d/m/Y"); ?></span> - <span>WM00001</span></td>
					<td class="greyy" style="visibility:hidden;background: #ccc;border-bottom:1px solid #fff;">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td></td>
				</tr>
				<tr>
					<td style="visibility: hidden;"><p>អតិថិជន</p></td>
					<td><span>001</span> <span>Customer Name</span><br>
					<span>012 111 222</span> <span>No. 123, St.11</span></td>
					<td class="greyy" style="visibility: hidden;background: #ccc;border-bottom:1px solid #fff;visibility: hidden;">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
				<tr>
					<td style="visibility: hidden;">លេខ​ទី​តាំង</td>
					<td>A1-01</td>
					<td rowspan="2" class="greyy" style="background: #ccc;visibility: hidden;">អ្នកទទួលប្រាក់ RECEIVER</td>
					<td rowspan="2"></td>
				</tr>
				<tr>
					<td style="visibility: hidden;">លេខ​កុនង​ទ័រ</td>
					<td>WM0001</td>
				</tr>
			</tbody>
		</table>
	</div>
</script>
<script id="invoiceForm3-bk-26" type="text/x-kendo-template">
    <div class="row-fluid">
    	<div class="col-md-8 col-md-offset-2" inv1" style="margin-top: 15px; padding-right: 15px; padding-left: 8px; ">
    		<div class="head" style="width: 100%; margin-bottom: 10px; float: left;">
	        	<!-- <div class="logo" style="width: 30%;">
	            	<img data-bind="attr: { src: objLicense.image_url, alt: company.name, title: company.name }" />
	            </div> -->
	            <div class="cover-name-company" style="width: 100%; margin-left: 15px;">
	            	<h2 style="text-align: center;">សហគ្រាសបន្ទាយមាស អេឡិទ្រីស៊ីធី    </h2>
	                <p style="font-size: 12px; color: #000; text-align: center;">ភូមិទូកមាស ឃុំទូកមាសខាងលិច ស្រុកបន្ទាយមាស ខេត្តកំពត </p>
	                
	            </div>
	        </div>
	        <h2 style="text-align: center; font-weight: 700; margin-bottom: 15px;">វិក្កយបត្រ INVOICE</h2>
	        
	        <div class="row " style="width: 100%; text-align: center; margin-left: 7%; margin-bottom: 10px;">
	    		<div class="">
		    		<table style="width: 100%;">
		    			<tr>
		    				<td style="width: 50% text-align: left;">លេខវិក្កយបត្រ INVOICE NO</td>
		    				<td style="padding: 5px;">
		    					<input type="text">
		    				</td>

		    			</tr>
		    			<tr>
		    				<td style="width: 50%; text-align: left;">ថ្ងៃចេញ INVOICE DATE</td>
		    				<td style="padding: 5px;">
		    					<input type="text">
		    				</td>
		    			</tr>
		    		</table>
		    	</div>
	    	</div>

	        <div class="row">
    			<div class="span6" style="padding-right: 0">
    				<p style="list-style: 20px; margin-bottom: 0;">
    					<b>យិន អ៊ិច</b><br>
    					ភូមិសាមគ្គី ឃុំអង្គរជ័យ
    				</p>
		    	</div>
		    	<div class="span6" style="padding: 0;">
		    		<img style="width: 180px; height: auto; float: right;" src="<?php echo base_url();?>/assets/barcode.png">
		    		<p style="margin-bottom: 0; float: right; margin-top: 5px; font-size: 12px; margin-left: 8px;">លេខកូដអតិថិជន ០០៤៣៣៦</p>
		    	</div>
    		</div>
    		
    		<div class="row" style="padding-left: 0;">
	    		<p style="width: 180px; float: left; margin: 25px 0 0 8px; font-size: 20px; ">ចំនួនដែលត្រូវបង់សរុប</p>
	    		<p style="padding: 5px 8px; background: #F1F1F1; border: 1px solid #000; width: 190px; float: right;font-size: 25px; color: #000;font-weight: 600; text-align: right; margin: 13px 0 10px 8px;">38,808,900</p>
	    		<p style="float: left; text-align: center; width: 100%;">
	    			សូមអញ្ជើញមកបង់ប្រាក់ អោយបានមុនថ្ងៃផុតកំនត់ទី
	    			<span style="font-weight: 600;">១៥ មេសា ២០១៦</span>
	    		</p>
	    	</div>

	        <div class="table-content" style="border: 2px solid #30859C; border-radius: 10px; padding: 10px; margin: 10px 8px; font-weight: 600; float: left; width: 100%;">    		
	    		<table>
	    			<thead>
	    				<tr>
	    					<th>អំនានមុន <br> PREVIOUS</th>
	    					<th>អំនានថ្មី <br> LASTES</th>
	    					<th>ប្រើប្រាស់ <br> UNIT</th>
	    					<th>តម្លៃឯកតា <br> RATE</th>
	    					<th>តម្លៃសរុប <br> AMOUNT</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				<tr>
	    					<td>1</td>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    				</tr>
	    				<tr>
	    					<td>2</td>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    				</tr>
	    				<tr>
	    					<td>3</td>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    				</tr>
	    				<tr>
	    					<td>4</td>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    					<td></td>
	    				</tr>
	    			</tbody>
	    			<tfoot>
	    				<tr>
	    					<td colspan="4" style="text-align: right;">
	    						<span >
	    							ថាមពលប្រើប្រាស់សរុបសម្រាប់រយះពេលនេះ
	    						</span>
	    					</td>
	    					<td colspan="1" style="font-weight: 700; text-align: right;">
	    						<span >
	    							100,000
	    						</span>
	    					</td>
	    				</tr>
	    				<tr>
	    					<td colspan="4" style="text-align: right;">
	    						<span >
	    							សមតុល្យសាច់ប្រាក់ជំពាក់គ្រាមុន
	    						</span>
	    					</td>
	    					<td colspan="1" style="font-weight: 700; text-align: right;">
	    						<span >
	    							0
	    						</span>
	    					</td>
	    				</tr>
	    				<tr>
	    					<td colspan="4" style="text-align: right;">
	    						<span >
	    							ប្រាក់ដែលត្រូវបង់សរុប
	    						</span>
	    					</td>
	    					<td colspan="1" style="font-weight: 700; text-align: right;">
	    						<span >
	    							100,000
	    						</span>
	    					</td>
	    				</tr>
	    			</tfoot>
	    		</table>
	    	</div>

	    	<div class="row" style="float: left; margin-left: 50px;">
	    		<p style="margin-bottom: 0;">បច្ចេកទេស <span style="font-weight: 700">០៣៣ ៦៦០១ ៣៣៣</span></p>
	    		<p>បង់ប្រាក់ និងវិក័យប័ត្រ <span style="font-weight: 700">០១១ ៦០០ ៧៣០</span></p>
	    	</div>
    	</div>
    </div>
</script>
<script id="invoiceForm3" type="text/x-kendo-template">
    <div class="row-fluid">
    	<div class="col-md-8 col-md-offset-2" inv1" style="margin-top: 15px; padding-right: 15px; padding-left: 8px; ">
    		<div class="head" style="width: 100%; margin-bottom: 10px; float: left;">
	        	<!-- <div class="logo" style="width: 30%;">
	            	<img data-bind="attr: { src: objLicense.image_url, alt: company.name, title: company.name }" />
	            </div> -->

	            <div class="cover-name-company" style="width: 100%; margin-left: 15px;">
	            	<h2 style="text-align: center; line-height: 47px; margin-bottom: 5px; width: 100%">សហគ្រាសបន្ទាយមាស អេឡិទ្រីស៊ីធី    </h2>
	                <!-- <p style="font-size: 12px; color: #000; text-align: center;">ភូមិទូកមាស ឃុំទូកមាសខាងលិច ស្រុកបន្ទាយមាស ខេត្តកំពត </p> -->
	                <p style="width: 100%; float: left; text-align: center; margin-bottom: 0;">Tel: 012345678</p>
	            </div>
	        </div>
	        <h2 style="text-align: center; font-weight: 700; margin-bottom: 15px; width: 100%;">វិក្កយបត្រ INVOICE</h2>
	        
	        <!-- <div class="row " style="width: 100%; text-align: center; margin-left: 7%; margin-bottom: 10px;">
	    		<div class="">
		    		<table style="width: 100%;">
		    			<tr>
		    				<td style="width: 50% text-align: left;">លេខវិក្កយបត្រ INVOICE NO</td>
		    				<td style="padding: 5px;">
		    					<input type="text">
		    				</td>

		    			</tr>
		    			<tr>
		    				<td style="width: 50%; text-align: left;">ថ្ងៃចេញ INVOICE DATE</td>
		    				<td style="padding: 5px;">
		    					<input type="text">
		    				</td>
		    			</tr>
		    		</table>
		    	</div>
	    	</div> -->
	    	<div class="row">
    			<div class="span6" style="padding-left: 0">
    				<table style="width: 100%; float: left;">
    					<tr >
    						<td>ល.អ :</td>
    						<td>KWS_A-19894</td>
    					</tr>
    					<tr>
    						<td>ឈ្មោះ :</td>
    						<td>តេង ពេញ</td>
    					</tr>
    					<tr>
    						<td>ប្លុក :</td>
    						<td>A1-ភូមិស៊ីធរ</td>
    					</tr>
    				</table>
    			</div>
    			<div class="span6" style="padding-right: 0">
    				<table style="width: 100%; float: right; text-align: right; line-height: 22px;">
    					<tr >
    						<td>កូដកុងទ័រ :</td>
    						<td>A-1-9894</td>
    					</tr>
    					<tr>
    						<td>ថ្ងៃចេញវិ.ក :</td>
    						<td>30-កញ្ញា-2017</td>
    					</tr>
    					<tr>
    						<td>ពីថ្ងៃទី :</td>
    						<td>30-សីហា-2017</td>
    					</tr>
    					<tr>
    						<td>ដល់ថ្ងៃទី :</td>
    						<td>29-កញ្ញា-2017</td>
    					</tr>
    				</table>
    			</div>
	    	</div>
	        <div class="row">
    			<!-- <div class="span12" style="padding-right: 0">
    				<div class="span6" style="padding-right: 0">
	    				<p style="list-style: 20px; margin-bottom: 0;">
	    					<b>យិន អ៊ិច</b><br>
	    					ភូមិសាមគ្គី ឃុំអង្គរជ័យ
	    				</p>
	    			</div>
	    			<div class="span6" style="padding-right: 0">
	    				<p style="margin-bottom: 0; float: right; margin-top: 5px; font-size: 12px; margin-left: 8px;">
	    					លេខកូដអតិថិជន </b><br>
	    					<span style="font-size: 15px;">០០៤៣៣៦</span>
	    				</p>
	    			</div>
		    	</div>
		    	<div class="span12" style="padding-right: 0">
		    		<table style="width: 100%;">
		    			<tr>
		    				<td style="width: 50% text-align: left;">លេខកុងទ័រ METER NO</td>
		    				<td style="padding: 5px;">
		    					<input type="text">
		    				</td>

		    			</tr>
		    		</table>
		    	</div> -->
		    	<div class="span12" style="padding: 0;">
		    		<img style="width: 100%; height: auto; float: left; margin: 8px 0;" src="<?php echo base_url();?>/assets/barcode.png">
		    		
		    	</div>
    		</div>
    		
    		<div class="row" style="padding-left: 0;">
	    		<p style="width: 180px; float: left; margin: 25px 0 0 8px; font-size: 20px; ">ចំនួនដែលត្រូវបង់សរុប</p>
	    		<p style="padding: 5px 8px; background: #F1F1F1; border: 1px solid #000; width: 190px; float: right;font-size: 25px; color: #000;font-weight: 600; text-align: right; margin: 13px 0 10px 8px;">38,808,900</p>
	    		<p style="float: left; text-align: center; width: 100%;">
	    			សូមអញ្ជើញមកបង់ប្រាក់ អោយបានមុនថ្ងៃផុតកំនត់ទី
	    			<span style="font-weight: 600;">១៥ មេសា ២០១៦</span>
	    		</p>
	    	</div>

	        <div class="table-content" style="font-weight: 600; float: left; width: 100%;">    		
	    		<table>
	    			<thead>
	    				<tr>
	    					<th style="background: #333; border: 1px solid #ccc; ">អំនានមុន <br> PREVIOUS</th>
	    					<th style="background: #333; border: 1px solid #ccc; ">អំនានថ្មី <br> LASTES</th>
	    					<th style="background: #333; border: 1px solid #ccc; ">ប្រើប្រាស់ <br> UNIT</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				<tr>
	    					<td style="border: 1px solid #ccc; ">1</td>
	    					<td style="border: 1px solid #ccc; "></td>
	    					<td style="border: 1px solid #ccc; "></td>
	    				</tr>
	    			</tbody>
	    			<tfoot>
	    				<tr style="border: 1px solid #ccc; ">
	    					<td colspan="2" style="text-align: right; border: 1px solid #ccc;">
	    						<span style="color: #333; font-size: 15px;">
	    							ថ្លៃថែទាំកុងទ័រ
	    						</span>
	    					</td>
	    					<td colspan="1" style="font-weight: 700; text-align: right; border: 1px solid #ccc;">
	    						<span style="color: #333; font-size: 15px;"">
	    							100,000
	    						</span>
	    					</td>
	    				</tr>
	    				<tr>
	    					<td colspan="2" style="text-align: right; border: 1px solid #ccc;">
	    						<span style="color: #333; font-size: 15px;"">
	    							សមតុល្យសាច់ប្រាក់ជំពាក់គ្រាមុន
	    						</span>
	    					</td>
	    					<td colspan="1" style="font-weight: 700; text-align: right; border: 1px solid #ccc;">
	    						<span style="color: #333; font-size: 15px;"">
	    							0
	    						</span>
	    					</td>
	    				</tr>
	    				<tr>
	    					<td colspan="2" style="text-align: right; border: 1px solid #ccc;">
	    						<span style="color: #333; font-size: 15px;"">
	    							ប្រាក់ដែលត្រូវបង់សរុប
	    						</span>
	    					</td>
	    					<td colspan="1" style="font-weight: 700; text-align: right; border: 1px solid #ccc;">
	    						<span style="color: #333; font-size: 15px;"">
	    							100,000
	    						</span>
	    					</td>
	    				</tr>
	    			</tfoot>
	    		</table>
	    	</div>

	    	<div class="row" style="float: left; margin-left: 50px;">
	    		<p style="margin-bottom: 0;">បច្ចេកទេស <span style="font-weight: 700">០៣៣ ៦៦០១ ៣៣៣</span></p>
	    		<p>បង់ប្រាក់ និងវិក័យប័ត្រ <span style="font-weight: 700">០១១ ៦០០ ៧៣០</span></p>
	    	</div>
    	</div>
    </div>
</script>
<script id="invoiceForm4" type="text/x-kendo-template">
	<div class="container font-small winvoice-print" style="margin-bottom: 10px; width: 610px; ">
		<div class="span12 headerinv " style="border-bottom: 2px solid \#000;padding: 15px 0;">
            <img class="logoP" data-bind="attr: { src: objLicense.image_url }"  style="position: absolute;left: 0;top: 20px;max-width: 100px;height: auto;max-height: 50px;" />
			<div class="span12" align="center">
				<h4 data-bind="text: objLicense.name"></h4>					
				<h5 data-bind="text: objLicense.address"></h5>
				<h5 data-bind="text: objLicense.mobile"></h5>					
			</div>
		</div>		

		<div class="span12 cover-customer">
			
			<div class="span7">
				<span id="secondwnumber1" style="margin-left: -14px;"></span>
				<div class="span12">
					<p>អតិថិជន​ <span>001</span></p>
					<p>Customer Name</p>
					<p>No.124, St. 11</p>
					<p style="font-size: 10px;"><i>ថ្ងៃ​ចាប់​ផ្តើម​ទទួល​ប្រាក់ <?php echo date("d/m/Y"); ?></i></p>
				</div>
			</div>
			<div class="span4">
				<table >
					<tr>
						<td width="200"><p>លេខ​វិក្កយ​បត្រ</p></td>
						<td><p>WM00001</p></td>
					</tr>
					<tr>
						<td><p>ថ្ងៃ​ចេញ វិក្កយ​បត្រ</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
					<tr>
						<td><p>តំបន់</p></td>
						<td><p>A1-001</p></td>
					</tr>
					<tr>
						<td><p>លេខប្រអប់</p></td>
						<td><p>P77,001</p></td>
					</tr>
					<tr>
						<td><p>គិត​ចាប់​ពី​ថ្ងៃ​ទី</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
					<tr>
						<td><p>ដល់​ថ្ងៃ​ទី</p></td>
						<td><p><?php echo date("d/m/Y"); ?></p></td>
					</tr>
				</table>		
			</div>			
		</div>
		<table class="span12 table table-bordered footerTbl" style="padding:0;margin-top: 40px;border:1px solid #000; border-radius: 3px;border-collapse: inherit;margin-left: 0px;">
			<thead>
				<tr>
					<th width="180" class="darkbblue main-color">លេខ​កុងទ័រ<br>METER</th>
					<th width="150" class="darkbblue main-color">អំណានចាស់<br>PREVIOUS</th>
					<th width="120" class="darkbblue main-color">អំណានថ្មី<br>CURRENT</th>
					<th width="120" class="darkbblue main-color">បរិមាណ<br>CONSUMPTION</th>
					<th width="120" class="darkbblue main-color">តំលៃឯកត្តា<br>RATE</th>
					<th width="180" class="darkbblue main-color">តំលៃសរុប<br>AMOUNT</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="vertical-align: middle;"> <?php echo date("d/m/Y"); ?></td>
					<td colspan="4" style="text-align: right">
						ជំពាក់​សរុប​នៅ​ថ្ងៃ​ធ្វើ​វិក្កយបត្រ Balance as at billing date .រ
					</td>
					<td>
						0<br>
					</td>
				</tr>
				<tr>
					<td data-bind="text: meter_number"></td>
					<td align="center">1</td>
					<td align="center">2</td>
					<td align="center">1</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>រំលោះ</td>
					<td align="center"></td>
					<td align="center"></td>
					<td align="center">1,០០០</td>
					<td></td>
					<td></td>
				</tr>
				<tr><td colspan="6"  style="height: 80px;" ></td></tr>
				<tr>
					<td colspan="5" style="padding-right: 10px;background: #355176;color: #fff;text-align: right;" class="darkbblue main-color">បំណុល​សរុប TOTAL BALANCE</td>
					<td style="border: 1px solid;text-align: right"><strong>1,000</strong></td>
				</tr>
				<tr>
					<td rowspan="4" colspan="3"></td>
					<td colspan="2" class="greyy" style="background: \\#ccc;">ប្រាក់​ត្រូវ​បង់ TOTAL DUE</td>
					<td style="text-align: right"><strong>1,000</strong></td>
				</tr>
				<tr>
					<td colspan="2" class="greyy" style="background: \\#ccc;">ថ្ងៃផុតកំណត់ DUE DATE</td>
					<td> <?php echo date("d/m/Y"); ?></td>
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
					<td width="180">1,000</td>
				</tr>
				<tr>
					<td><p>វិក្កយបត្រ</p></td>
					<td><span><?php echo date("d/m/Y"); ?></span> - <span>WM00001</span></td>
					<td class="greyy" style="background: #ccc;border-bottom:1px solid #fff;">ថ្ងៃបង់ប្រាក់ PAY DATE</td>
					<td></td>
				</tr>
				<tr>
					<td><p>អតិថិជន</p></td>
					<td><span>001</span> <span>Customer Name</span><br>
					<span>012 111 222</span> <span>No. 123, St.11</span></td>
					<td class="greyy" style="background: #ccc;border-bottom:1px solid #fff;">ប្រាក់បានបង់ PAY AMOUNT</td>
					<td></td>
				</tr>
				<tr>
					<td>លេខ​ទី​តាំង</td>
					<td>A1-01</td>
					<td rowspan="2" class="greyy" style="background: #ccc;">អ្នកទទួលប្រាក់ RECEIVER</td>
					<td rowspan="2"></td>
				</tr>
				<tr>
					<td>លេខ​កុនង​ទ័រ</td>
					<td>WM0001</td>
				</tr>
			</tbody>
		</table>
	</div>
</script>
<script id="invoiceForm3-bk" type="text/x-kendo-template">
    <div class="row-fluid">
    	<div class="span7 inv1" style="width: 54%; padding-right: 15px; padding-left: 8px; ">
    		<div class="head" style="width: 100%">
	        	<div class="logo" style="width: 30%;">
	            	<img data-bind="attr: { src: objLicense.image_url, alt: company.name, title: company.name }" />
	            </div>
	            <div class="cover-name-company" style="width: 65%; margin-left: 15px;">
	            	<h2 style="text-align: left;">សហគ្រាសបន្ទាយមាស អេឡិទ្រីស៊ីធី    </h2>
	                <p style="font-size: 12px; color: #000;">ភូមិទូកមាស ឃុំទូកមាសខាងលិច ស្រុកបន្ទាយមាស ខេត្តកំពត </p>
	                
	            </div>
	        </div>
	        <div class="row textunder">
	        	<div clas="span6" style="width: 47%;float: left; display: inherit; line-height: 30px;">
	        		<p>បច្ចេកទេស</p>
	        		<a href="#" class="glyphicons no-js iphone" style="font-weight: 600; color: #31849b;">
	        			<i></i> 
	        			<span style="margin-left: 17px;">០៣៣ ៦៦០១ ៣៣៣</span>
	        		</a>
	        		<p>២៤ម៉ោង</p>
	        	</div>
	        	<div clas="span6" style="width: 50%;float: left; display: inherit; border-left: 1px solid #000; padding-left: 15px; line-height: 30px;">
	        		<p>បង់ប្រាក់ និង វិក្កយបត្រ </p>
	        		<a href="#" class="glyphicons no-js iphone" style="font-weight: 600; color: #31849b;">
	        			<i></i>
	        			<span style="margin-left: 17px;">០៩៩ ៨៤១ ១៣៣</span>
	        		</a>
	        		<p>ច័ន្ទ ដល់ សៅរ៍ ៧:០០-៦:០០</p>
	        	</div>
	        </div>
    	</div>
    	<div class="span5 " style="padding-left: 0; padding-right: 8px; width: 46%">
    		<div class="headertable-invoice">
	    		<table style="">
	    			<tr>
	    				<td>លេខវិក្កយបត្រ INVOICE NO</td>
	    				<td>
	    					<input type="text">
	    				</td>

	    			</tr>
	    			<tr>
	    				<td>ថ្ងៃចេញ INVOICE DATE</td>
	    				<td>
	    					<input type="text">
	    				</td>
	    			</tr>
	    			<tr>
	    				<td>តំបន់ AREA</td>
	    				<td>
	    					<input type="text">
	    				</td>
	    			</tr>
	    			<tr>
	    				<td>លេខប្រអប់ BOX NO</td>
	    				<td>
	    					<input type="text">
	    				</td>
	    			</tr>
	    		</table>
	    	</div>
    	</div>
    </div>

    <div class="row-fluid">
    	<div class="span5">
    	</div>
    	<div class="span7">
    		<div class="row">
    			<div class="span5" style="padding-right: 0">
    				<p style="list-style: 20px; margin-bottom: 0;">
    					<b>យិន អ៊ិច</b><br>
    					ភូមិសាមគ្គី ឃុំអង្គរជ័យ
    				</p>
		    	</div>
		    	<div class="span6" style="padding-left: 0; margin-left: 15px;">
		    		<img style="width: 180px; height: auto; " src="<?php echo base_url();?>/assets/barcode.png">
		    		<p style="margin-bottom: 0; margin-top: 5px; font-size: 12px; margin-left: 8px;">លេខកូដអតិថិជន ០០៤៣៣៦</p>
		    	</div>
    		</div>
    	</div>
    </div>

    <div class="row-fluid">
    	<div class="span4" style="padding-left: 15px; padding-left: 8px;">
    		<p >ប្រវត្តិប្រើប្រាស់របស់អ្នកក្នុងឆ្នាំនេះ</p>
    		<img style="width: 175px; height: auto;" src="<?php echo base_url();?>/assets/chart.png">
    	</div>
    	<div class="span8" style="padding-left: 0;">
    		<img style="width: 58px; height: auto; float: left;" src="<?php echo base_url();?>/assets/icon-water.png">
    		<p style="width: 140px; float: left; margin: 25px 0 0 8px; font-size: 20px; ">ប្រាក់ត្រូវបង់សរុប</p>
    		<p style="padding: 5px 8px; background: #F1F1F1; border: 1px solid #000; width: 190px; float: left;font-size: 25px; color: #000;font-weight: 600; text-align: right; margin: 13px 0 10px 8px;">38,808,900</p>
    		<p style="margin-left: 30px; float: left; margin-bottom: 0;">សូមអញ្ជើញមកបង់ប្រាក់ អោយបានមុនថ្ងៃផុតកំនត់ទី</p><br>
    		<p style="margin-left: 40%; float: left; font-weight: 600;">១៥ មេសា ២០១៦</p>

    	</div>
    </div>

    <div class="row-fluid">
    	<div class="table-content" style="border: 2px solid #30859C; border-radius: 10px; padding: 10px; margin: 10px 8px; font-weight: 600; float: left; width: 97.5%;">
    		<p style="color: #30859C;">ការប្រើប្រាស់របស់អ្នកក្នុងរយះពេលពី​ (Electricity charges) <span style="color: #000;">01-05-2013</span> ដល់ <span style="color: #000;">31-05-2013</span></p>
    		<table>
    			<thead>
    				<tr>
    					<th>លេខកុងទ័រ <br> METER NO.</th>
    					<th>អំនានមុន <br> PREVIOUS</th>
    					<th>អំនានថ្មី <br> LASTES</th>
    					<th>មេគុណ <br> MULTIPLIER</th>
    					<th>ប្រើប្រាស់ <br> UNIT</th>
    					<th>តម្លៃឯកតា <br> RATE</th>
    					<th>តម្លៃសរុប <br> AMOUNT</th>
    				</tr>
    			</thead>
    			<tbody>
    				<tr>
    					<td>1</td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    				</tr>
    				<tr>
    					<td>2</td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    				</tr>
    				<tr>
    					<td>3</td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    				</tr>
    				<tr>
    					<td>4</td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    					<td></td>
    				</tr>
    			</tbody>
    			<tfoot>
    				<tr>
    					<td colspan="2" rowspan="5"></td>
    					<td colspan="4">
    						ប្រាក់ត្រូវបង់សរុប ខែនេះ
    						<span style="font-size: 10px;">
    							Total charge for this period
    						</span>
    					</td>
    					<td colspan="2" ></td>
    				</tr>
    				<tr>
    					<td colspan="4">
    						ប្រាក់ត្រូវបង់សរុប
    						<span style="font-size: 10px;">
    							Total amount due
    						</span>
    					</td>
    					<td colspan="2"></td>
    				</tr>
    				<tr>
    					<td colspan="2" rowspan="3" style="vertical-align: middle;">
    						<div style="margin: 0 auto; width: 92px; height: 92px; border: 1px solid #A8B8CB; border-radius: 50%;">
							</div>
    					</td>
    					<td colspan="2">ថ្ងៃដែលបានបង់ប្រាក់ PAY DATE</td>
    					<td ></td>
    				</tr>
    				<tr>
    					<td colspan="2">ប្រាក់ដែលបានបង់ AMOUNT PAID</td>
    					<td ></td>
    				</tr>
    				<tr>
    					<td colspan="2">ហត្ថលេខា និងឈ្មោះរបស់បេឡាករ</td>
    					<td ></td>
    				</tr>
    			</tfoot>
    		</table>    		
    	</div>    	
    </div>

    <div class="row-fluid" style="float: left; border-bottom: 2px dotted #B9CDE4;">
		<a href="#" style="float: left; margin-left: 15px; " class="glyphicons no-js share"><i></i></a>
		<div class="span11" style="padding-left: 0;">    			
    		<p style="float: left; margin: 0; font-size: 11px; width: 100%;">
				ក្នុងករណីដែលលោក លោកស្រីមិនបានមកបង់ប្រាក់ទាន់ពេលកំនត់ ក្រុមហ៊ិននឹងផ្អាក់ការប្រើប្រាស់របស់លោកអ្នក
			</p>
			<p style="float: left; font-size: 11px; padding-bottom: 8px;">
				ការភ្ជាប់ចរន្តជួនវិញ លុះត្រាតែអតិថិជនបានទូទាត់បំណុលសរុបក្នុងវិក្កយបត្រនេះដោយបូកបន្ថែមការប្រាក់១% និងសេវាភ្ជាប់ចរន្តរួចហើយ។
			</p>
		</div>
	</div>
	<div class="row-fluid">
		<div class="invoice-footer" style="float: left; width: 100%; text-align: center;">
			<p style="text-align: center; margin-top: 10px; font-weight: 600; ">បង្កាន់ដៃបង់ប្រាក់ PAYMENT SLIP</p>
		</div>		
		<div class="span1" style="width: 108px;float: left;padding-right: 0;text-align: center;">
			<div style="float: left; width: 92px; height: 92px; margin:0 0 5px 0; border: 1px solid #A8B8CB; border-radius: 50%;">
			</div>
			<p style="font-size: 10px; float: left;">ហត្ថលេខា និងត្រា របស់បេឡាករ </p>
			<p style="display: inline-block; text-align: center; margin-top: 40px; border-bottom: 1px solid #000; width: 75px;"></p>
		</div>
		<div class="row-fluid" style="width: 489px;float: left;clear: initial; margin-left: 15px;">
			<div class="span4">
				<p style="text-align: center; font-size: 12px; margin-bottom: 5px;">លេខវិក្កយបត្រ INVOICE NO</p>
				<p style="padding: 8px; background: #fff; margin-bottom: 0; border: 1px solid #A8B8CB; width: 155px; float: left;font-size: 15px; color: #000;font-weight: 600; text-align: center; ">INV1305-00001</p> 
			</div>
			<div class="span4">
				<p style="text-align: center; font-size: 12px; margin-bottom: 5px;">ប្រាក់ត្រូវបង់ AMOUNT DUE</p>
				<p style="padding: 8px; background: #fff; margin-bottom: 0; margin-left: -9px; border: 1px solid #A8B8CB; width: 155px; float: left;font-size: 15px; color: #000;font-weight: 600; text-align: center; ">38,808,900</p> 
			</div>
			<div class="span4">
				<p style="text-align: center; font-size: 12px; margin-bottom: 5px;">ថ្ងៃបង់ប្រាក់ PAY DATE</p>
				<p style="padding: 8px; background: #fff; margin-bottom: 0; border: 1px solid #A8B8CB; width: 155px; float: left;font-size: 15px; color: #000;font-weight: 600; text-align: center; ">38,808,900</p> 
			</div>
		</div>
		<div class="row-fluid" style="width: 489px;float: left;clear: initial; margin-left: 15px;">
			<div class="span8">
				<p style="float: left; margin-top: 5px; clear: both;"><b>យិន អ៊ិច</b> <br/> ភូមិសាមគ្គី ឃុំអង្គរជ័យ</p>
				<div style=" float: left;">
		    		<img style="width: 257px; height: auto; " src="<?php echo base_url();?>/assets/barcode.png">
		    		<p style="margin-bottom: 0; margin-top: 5px; font-size: 12px; margin-left: 8px;">លេខកូដអតិថិជន ០០៤៣៣៦</p>
		    	</div>
		    </div>
		    <div class="span4" style="padding: 0;">
		    	<p style="text-align: center; font-size: 12px; margin-bottom: 0px; margin-top: 8px;">ប្រាក់បានបង់ AMOUNT DUE</p>
		    	<p style="padding: 8px; height: 40px; background: #fff; margin-bottom: 0; border: 5px solid #000; width: 155px; float: left;font-size: 15px; color: #000;font-weight: 600; text-align: center; "></p>
		    	<p style="font-size: 11px; font-weight: 600; margin-top: 10px; float: left;">សហគ្រាសបន្ទាយមាស អេឡិទ្រីស៊ីធី</p>
		    </div>
		</div>
	</div>
</script>

<script id="invoiceCustom-txn-form-template" type="text/x-kendo-template">
	<a class="span4 #= type #" data-id="#= id #" data-bind="click: selectedForm" style="padding: 0; width: 32%;">
    	<img src="<?php echo base_url(); ?>assets/invoice/img/#= image_url #.jpg" alt="#: name # image" />
    </a>
</script>
<script id="invoiceForm-lineDS-template" type="text/x-kendo-template">
	<tr>
		<td><i>#:banhji.invoiceForm.lineDS.indexOf(data)+1#</i>&nbsp;</td>
		<td class="lside">#= description#</td>
		<td>#= quantity#</td>
		<td class="rside" width="70">#= kendo.toString(price, locale=="km-KH"?"c0":"c", locale) #</td>
		<td class="rside">#= kendo.toString(amount, locale=="km-KH"?"c0":"c", locale) #</td>
	</tr>
</script>

<script id="Reconcile" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden; margin-top: 15px;">
			<div class="container-960">					
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>	
					</div>
			        <h2 style="margin-bottom: 10px;" data-bind="text: lang.lang.reconcile">Reconcile</h2>
			        <br>
			        <div class="row-fluid">
			        	<div class="row" style="padding: 0px;margin: 0;">
		        			<div class="span4" style="padding-left: 0;">
			        			<table class="table table-bordered table-primary table-striped table-vertical-center" >
			        				<thead>
			        					<tr>
			        						<th colspan="2" style="background: #fefefe;color: #000;border: 1px solid #ccc;" >
			        							ប្រាក់ដើមគ្រា
			        						</th>
			        					</tr>
			        				</thead>
			        				<tbody 
			        					data-role="listview" 
			        					data-bind="source: startAR" 
			        					data-template="reconcile-start-list">
			        				</tbody>
			        			</table>
			        		</div>
			        		<div class="span4" style="">
			        			<table class="table table-bordered table-primary table-striped table-vertical-center" >
			        				<thead>
			        					<tr>
			        						<th colspan="2" style="background: #fefefe;color: #000;border: 1px solid #ccc;" >
			        							ប្រាក់ទទួលមិនទាន់អាប់
			        						</th>
			        					</tr>
			        				</thead>
			        				<tbody 
			        					data-role="listview" 
			        					data-bind="source: receiveNoChangeAR" 
			        					data-template="reconcile-receivenochange-list">
			        				</tbody>
			        			</table>
			        		</div>
			        		<div class="span4" style="padding-left: 0;">
			        			<table class="table table-bordered table-primary table-striped table-vertical-center" >
			        				<thead>
			        					<tr>
			        						<th colspan="2" style="background: #fefefe;color: #000;border: 1px solid #ccc;" >
			        							ប្រាក់អាប់
			        						</th>
			        					</tr>
			        				</thead>
			        				<tbody 
			        					data-role="listview" 
			        					data-bind="source: changeAR" 
			        					data-template="reconcile-change-list">
			        				</tbody>
			        			</table>
			        		</div>
		        		</div>
						<div class="row" style="padding: 0;margin: 0;">
							<table class="table table-bordered table-primary table-striped table-vertical-center" style="margin-top: 15px;">
						        <thead>
						            <tr>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.no_"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.currency"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.note"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.unit"></th>
						            	<th style="vertical-align: top;" data-bind="text: lang.lang.amount"></th>
						            </tr>
						        </thead>
						        <tbody data-role="listview" 
					        		data-template="reconcile-list-template" 
					        		data-auto-bind="false"
					        		data-bind="source: noteDS"></tbody>
						    </table>
						    <button class="btn btn-inverse" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>
						</div>
		        		
			        </div>
			        <div class="box-generic bg-action-button" style="margin-top: 15px;">
						<div id="ntf1" data-role="notification"></div>
				        <div class="row">
							<div class="span12" align="right">
								<span class="btn-btn" data-bind="click: sync" ><i></i> <span data-bind="text: lang.lang.record">Record</span></span>
								<span class="btn-btn" data-bind="click: cancel" ><i></i> <span data-bind="text: lang.lang.cancel"></span></span>
							</div>
						</div>
					</div>
				</div>						
			</div>
		</div>
	</div>				  	
</script>
<script id="reconcile-list-template" type="text/x-kendo-template">
    <tr>
		<td style="border-left: 0; border-bottom: 0;">
			<i style="cursor: pointer;" class="icon-trash" data-bind="events: {click: removeRow}" ></i>
			#:banhji.Reconcile.noteDS.indexOf(data)+1#
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			<input type="text" 
				data-role="combobox" 
				data-bind="source: currencyAR, value: currency" 
				data-text-field="code" 
				data-value-field="code">
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			<input type="number" class="k-textbox" data-role="numerictextbox" data-format="n0" data-min="0" data-spinners="false" data-bind="value: note, events: {change: onChange}" style="padding-right: 10px;display: inline-block; text-align: right; height: 28px; border: none; width: 168px !important;">
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			<input type="number" class="k-textbox" data-role="numerictextbox" data-format="n0" data-min="0" data-spinners="false" data-bind="value: unit, events: {change: onChange}" style="padding-right: 10px;text-align: right; display: inline-block; height: 28px; border: none; width: 168px !important;">
		</td>
		<td style="border-left: 0; border-bottom: 0;">
			<input type="number" data-role="numerictextbox" data-format="n" data-min="0" data-spinners="false" data-bind="value:total" disabled="disabled" style="padding-right: 10px;text-align: right; display: inline-block; border: none; width: 168px !important;">
		</td>
	</tr>
</script>
<script id="reconcile-start-list" type="text/x-kendo-template">
	<tr>
		<td width="100">#=currency#</td>
		<td style="text-align: right;">#=amount#</td>
	</tr>
</script>
<script id="reconcile-receivenochange-list" type="text/x-kendo-template">
	<tr>
		<td width="100">#= currency#</td>
		<td style="text-align: right;">#=amount#</td>
	</tr>
</script>
<script id="reconcile-change-list" type="text/x-kendo-template">
	<tr>
		<td width="100">#= currency#</td>
		<td style="text-align: right;">#=amount#</td>
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
<!--  Backup  -->
<script id="Backup" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2 data-bind="text: lang.lang.backup">Backup</h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>
						<!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
							
								<!-- Tabs Heading -->
								<div class="widget-head" style="background: #203864 !important; color: #fff;">
									<ul style="padding-left: 0px;">
										<li class="active" style="width: 210px;">
											<a style="text-transform: capitalize;" href="#Download" data-toggle="tab">
												<span style="line-height: 23px;">
													<span  data-bind="text: lang.lang.download_db">Download Database</span>
												</span>
											</a>
										</li>
										<li style="width: 210px;">
											<a style="text-transform: capitalize;" href="#Upload" data-toggle="tab">
												<span style="line-height: 23px;">
													<span data-bind="text: lang.lang.upload_db">Upload Database</span>
												</span>
											</a>
										</li>
									</ul>
								</div>
								<div class="widget-body">
									<div class="tab-content">
										<div id="Download" style="border: 1px solid #ccc; overflow: hidden;" class="tab-pane active widget-body-regular">
										  	<form action="<?php echo base_url(); ?>utibill_backup" method="post">
										  		<input type="hidden" id="uinstitute" name="institute" data-bind="value: institute_id">
										  		<input type="hidden" id="uid" name="uid" data-bind="value: user_id">
											  	<button>
													<span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 200px!important;position: relative;margin: 0;">
														<i></i> 
														<span data-bind="text: lang.lang.download_db">Download Database</span>
													</span>
												</button>
											</form>
										</div>

										<div id="Upload" style="border: 1px solid #ccc; overflow: hidden;" class="tab-pane widget-body-regular">
										  	<form action="<?php echo base_url(); ?>import" method="post" accept-charset="utf-8" enctype="multipart/form-data">
										  		<div class="fileupload fileupload-new margin-none" data-provides="fileupload" >
													<input type="file" name="userfile" size="20" />
												</div>
										  		<input type="hidden" id="uinstitute" name="institute" data-bind="value: institute_id">
										  		<input type="hidden" id="uid" name="uid" data-bind="value: user_id">
											  	<button>
													<span id="saveClose" class="btn btn-icon btn-success glyphicons upload" style="width: 200px!important;position: relative;margin: 0px;">
														<i></i> 
														<span data-bind="text: lang.lang.upload_db">Upload Database</span>
													</span>
												</button>
											</form>
										</div>
									</div>
								</div>
								<div id="ntf1" data-role="notification"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<!--  Offline  -->
<script id="Offline" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;left: 0;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2>Offline</h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
								<div class="widget-head" style="background: #203864 !important; color: #fff;">
									<ul style="padding-left: 0px;">
										<li class="active" style="width: 210px;">
											<a style="text-transform: capitalize;" href="#Download" data-toggle="tab">
												<span style="line-height: 23px;">
													<span  data-bind="text: lang.lang.download">Download</span>
												</span>
											</a>
										</li>
										<li style="width: 210px;">
											<a style="text-transform: capitalize;" href="#Upload" data-toggle="tab">
												<span style="line-height: 23px;">
													<span data-bind="text: lang.lang.upload">Upload Database</span>
												</span>
											</a>
										</li>
									</ul>
								</div>
								<div class="widget-body">
									<div class="tab-content">
										<div id="Download" style="border: 1px solid #ccc; overflow: hidden;" class="tab-pane widget-body-regular active">
											<div class="row-fluid" style="overflow: hidden;">
												<div style="background: #fff; padding: 15px; width: 100%; color: #333; float: left; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1">
													<div class="col-xs-12 col-sm-5 ">
														<div class="innerAll" style="background: #eee;height :290px;">
															<div class="control-group">								
																<label ><span data-bind="text: lang.lang.license">License</span> <span style="color:red">*</span></label>
																<input 
																	data-role="dropdownlist" 
																	style="width: 100%; margin-bottom: 10px;" 
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
									                  		<div class="control-group">								
																<label ><span data-bind="text: lang.lang.location">Location</span> <span style="color:red">*</span></label>
																<input 
																	data-role="dropdownlist" 
																	style="width: 100%; margin-bottom: 10px;" 
																	data-option-label="Location ..." 
																	data-auto-bind="false" 
																	data-value-primitive="true" 
																	data-text-field="name" 
																	data-value-field="id" 
																	data-bind="
																		value: locationSelect,
									                  					source: locationDS,
									                  					enabled: haveLicense,
									                  					events: {change: onLocationChange}">
									                  		</div>
									                  		<div class="control-group">								
																<label ><span data-bind="text: lang.lang.sub_location">Sub Location</span></label>
																<input 
																	data-role="dropdownlist" 
																	style="width: 100%; margin-bottom: 10px;" 
																	data-option-label="Sub Location ..." 
																	data-auto-bind="false" 
																	data-value-primitive="true" 
																	data-text-field="name" 
																	data-value-field="id" 
																	data-bind="
																		value: subLocationSelect,
									                  					source: subLocationDS,
									                  					enabled: haveLocation,
									                  					events: {change: onSubLocationChange}">
									                  		</div>
									                  		<div class="control-group">								
																<label ><span data-bind="text: lang.lang.box">Box</span></label>
																<input 
																	data-role="dropdownlist" 
																	style="width: 100%;" 
																	data-option-label="Box ..." 
																	data-auto-bind="false" 
																	data-value-primitive="true" 
																	data-text-field="name" 
																	data-value-field="id" 
																	data-bind="
																		value: boxSelect,
									                  					source: boxDS,
									                  					enabled: haveSubLocation">
									                  		</div><br>
														</div>
													</div>
													<div class="col-xs-12 col-sm-7">
														<div class="tab-pane">
												        	<div class="row" >
											        			<div class="col-xs-12 col-sm-6">
																	<div class="control-group" style="margin-bottom: 10px;">
																		<label ><span data-bind="text: lang.lang.month_of" >Month Of</span> <span style="color:red">*</span></label>
															            <input type="text" 
														                	style="width: 100%;" 
														                	data-role="datepicker"
														                	data-format="MM-yyyy"
														                	data-parse-formats="yyyy-MM-dd HH:mm:ss"
														                	data-start="year" 
															  				data-depth="year" 
														                	placeholder="Moth of ..." 
																           	data-bind="value: monthOfSR" />
																	</div>
																</div>
														        <div class="col-xs-12 col-sm-6">
																	<div class="control-group" style="margin-bottom: 10px;">
																		<label ><span data-bind="text: lang.lang.to_date">To Date</span> <span style="color:red">*</span></label>
															            <input type="text" 
														                	style="width: 100%;" 
														                	data-role="datepicker"
														                	placeholder="To Date ..." 
														                	data-parse-formats="yyyy-MM-dd"
																           	data-bind="value: toDateSR" />
																	</div>
														        </div>
												        	</div>
												        	<div class="row">
											        			<div class="col-xs-12 col-sm-6">
																	<div class="control-group" style="margin-bottom: 10px;">
																		<label ><span data-bind="text: lang.lang.issue_date" >Issue Date</span> <span style="color:red">*</span></label>
															            <input type="text" 
														                	style="width: 100%;" 
														                	data-role="datepicker"
														                	data-parse-formats="yyyy-MM-dd HH:mm:ss"
														                	placeholder="Issue Date ..." 
																           	data-bind="value: IssueDate" />
																	</div>
																</div>
																<div class="col-xs-12 col-sm-6">
																	<div class="control-group" style="margin-bottom: 10px;">
																		<label ><span data-bind="text: lang.lang.billing_date" >Bill Date</span> <span style="color:red">*</span></label>
															            <input type="text" 
														                	style="width: 100%;" 
														                	data-role="datepicker"
														                	data-parse-formats="yyyy-MM-dd"
														                	placeholder="Bill Date ..." 
																           	data-bind="value: BillingDate" />
																	</div>
																</div>
												        	</div>
											        		<div class="row">
										        				<div class="col-xs-12 col-sm-6">
																	<div class="control-group">
																		<label ><span data-bind="text: lang.lang.due_date" >Due Date</span> <span style="color:red">*</span></label>
															            <input type="text" 
														                	style="width: 100%;" 
														                	data-role="datepicker"
														                	data-parse-formats="yyyy-MM-dd"
														                	placeholder="Due Date ..." 
																           	data-bind="value: DueDate" />
																	</div>
																</div>
																<div class="col-xs-12 col-sm-6">
												        			<span id="saveNew" style="width: 100% !important; text-align: center; margin-top: 22px; float: left;" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="click: getOfflineDB"><i></i> <span data-bind="text: lang.lang.download">Add</span></span>
												        		</div>
												        	</div>
												        	<div class="row" style="border-top: 1px solid #ccc;padding-top: 15px;margin-top: 15px;background: #eee;">
											        			<div class="col-xs-12 col-sm-6">
											        				<label ><span data-bind="text: lang.lang.reader" >Reader</span> <span style="color:red">*</span></label>
											        				<input 
																		data-role="dropdownlist" 
																		style="width: 100%; margin-bottom: 10px;" 
																		data-option-label="Reader ..." 
																		data-auto-bind="false" 
																		data-value-primitive="true" 
																		data-text-field="name" 
																		data-value-field="id" 
																		data-bind="
																			value: readerSelect,
										                  					source: readerDS">
											        			</div>
											        			<div class="col-xs-12 col-sm-6">
											        				<label ><span data-bind="text: lang.lang.tablet" >Tablet</span> <span style="color:red">*</span></label>
											        				<input 
																		data-role="dropdownlist" 
																		style="width: 100%; margin-bottom: 10px;" 
																		data-option-label="Tablet ..." 
																		data-auto-bind="false" 
																		data-value-primitive="true" 
																		data-text-field="name" 
																		data-value-field="id"
																		data-bind="
																			value: tabletSelect,
										                  					source: tabletDS,
										                  					events: {change: tabletChange}">
											        			</div>
											        		</div>
											        	</div>
													</div>
												</div>
											</div>
										</div>
										<div id="Upload" style="border: 1px solid #ccc; overflow: hidden;" class="tab-pane widget-body-regular">
											<div class="span12" style="border: 1px solid #ccc;padding-bottom: 10px;min-height: 131px;">
												<h2 style="position: relative;clear:both;width: 100%;" data-bind="text: lang.lang.upload"></h2>
												<div style="clear: both;float:left; width: 95%;margin-bottom: 10px;position: relative;">
													<input type="file" 
														data-role="upload"
														data-bind="events: {select: txnSelected}" 
														name="userfile" 
														style="height: 40px;" size="20" />
												</div>
											  	<button data-bind="click: saveTXNoffline">
													<span class="btn btn-icon btn-success glyphicons upload" style="width: 200px!important;position: relative;margin: 0px;">
														<i></i> 
														<span data-bind="text: lang.lang.upload">Upload Database</span>
													</span>
												</button>
											</div>
										</div>
									</div>
								</div>
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
<!-- Report -->
<script id="cashReceiptSummary" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="margin-top: 15px;">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
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
							<h2>Cash Receipt Summary</h2>
						</div>
					</div>
					<div data-role="grid" data-bind="source: dataSource" data-pageable="true"></div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashReceiptSourceSummary" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="margin-top: 15px;">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2" data-bind="click: cancel"><i></i></span>
					<br>
					<br>
					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text:lang.lang.date">Date</span></a></li>									
										<li><a class="glyphicons print" href="#tab-2" data-toggle="tab" data-bind="click: printGrid"><i></i><span data-bind="text:lang.lang.print_export">Print/Export</span></a></li>
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
							<h2 data-bind="text:lang.lang.cash_receipt_by_sources_detail">Cash Receipt by Source Summary</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashReceiptDetail" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>

					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export" style="text-transform: capitalize;"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
								        	<div class="row">
												<div class="col-xs-12 col-sm-2">											
													<input data-role="dropdownlist"
														   class="sorter"                  
												           data-value-primitive="true"
												           data-text-field="text"
												           data-value-field="value"
												           data-bind="value: sorter,
												                      source: sortList,                              
												                      events: { change: sorterChanges }" style="width: 100%" />
												</div>
												<div class="col-xs-12 col-sm-2">                    
													<input data-role="datepicker"
														   class="sdate"
														   data-format="dd-MM-yyyy"
												           data-bind="value: sdate,
												           			  max: edate"
												           placeholder="From ..." style="width: 100%" >
												</div>
												<div class="col-xs-12 col-sm-2">
												    <input data-role="datepicker"
												    	   class="edate"
												    	   data-format="dd-MM-yyyy"
												           data-bind="value: edate,
												                      min: sdate"
												           placeholder="To ..." style="width: 100%" >
												</div>
												<div class="col-xs-12 col-sm-1">
												  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>
							        		</div>
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<div class="row">
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.license">Licenses</span>
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
																events: {change: licenseChange}" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.location">Locations</span>
														<input 
															data-role="dropdownlist" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="false" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveBloc,
																source: blocDS" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-1">											
										  			<button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>														
											</div>		
							        	</div>
							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
											<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
												<i class="fa fa-file-excel-o"></i>
												Export to Excel
											</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.cash_receipt_detail">Cash Receipt Detail</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="total-sale">									
										<p data-bind="text: lang.lang.no_of_cashReceipt">Number of Cash Receipt</p>
										<span data-format="n0" data-bind="text: cashReceipt"></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.total_amount">Total Amount</p>
										<span data-bind="text: total"></span>
									</div>
								</div>
							</div>

							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.receipt_date">Receipt Date</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.receipt_number">Receipt Number</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.receipt_amount">Receipt Amount</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.invoice_date">Invoice Date</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.invoice_number">Invoice Number</span></th>
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.invoice_amount">Invoice Amount</span></th>									
									</tr>
								</thead>
								<tbody data-role="listview"
											 data-auto-bind="false"
											 data-bind="source: dataSource"
											 data-template="cashReceiptDetail-template"
								></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashReceiptDetail-template" type="text/x-kendo-template">
	<tr>
		<td colspan="6" style="font-weight: bold; color: black;">#: name #</td>
	</tr>
	# var totalReceived = 0;#	
	# var totalInvoice = 0;#
	#for(var i=0; i<line.length; i++){#
		#totalReceived += line[i].amount;#
		#totalInvoice += line[i].reference_amount;#
		<tr>
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td><a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a></td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>		
			<td>#=kendo.toString(new Date(line[i].reference_issued_date), "dd-MM-yyyy")#</td>
			<td><a href="\#/#=line[i].reference_type.toLowerCase()#/#=line[i].reference_id#">#=line[i].reference_number#</a></td>
			<td style="text-align: right;">#=kendo.toString(line[i].reference_amount, "c2", banhji.locale)#</td>				
		</tr>
	#}#
	<tr>
    	<td colspan="2" style="font-weight: bold; color: black;" data-bind="text: lang.lang.total">Total</td>
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalReceived, "c2", banhji.locale)#
    	</td>
    	<td></td>
    	<td></td>
    	<td></td>
    </tr>
	<tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
</script>
<script id="cashReceiptSourceDetail" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export" style="text-transform: capitalize;"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
											<div class="row">									        	
												<div class="col-xs-12 col-sm-2">
													<input data-role="dropdownlist"
														   class="sorter"                  
												           data-value-primitive="true"
												           data-text-field="text"
												           data-value-field="value"
												           data-bind="value: sorter,
												                      source: sortList,                              
												                      events: { change: sorterChanges }" style="width: 100%">
												</div>								        	
												<div class="col-xs-12 col-sm-2">                     
													<input data-role="datepicker"
														   class="sdate"
														   data-format="dd-MM-yyyy"
												           data-bind="value: sdate,
												           			  max: edate"
												           placeholder="From ..."  style="width: 100%">
												</div>								        	
												<div class="col-xs-12 col-sm-2">          
												    <input data-role="datepicker"
												    	   class="edate"
												    	   data-format="dd-MM-yyyy"
												           data-bind="value: edate,
												                      min: sdate"
												           placeholder="To ..."  style="width: 100%">
												</div>								        	
												<div class="col-xs-12 col-sm-1">
												  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>
											</div>
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<div class="row">
												<div class="col-xs-12 col-sm-3" >
													<span data-bind="text: lang.lang.license">Licenses</span>
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
																events: {change: licenseChange}" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.location">Locations</span>
														<input 
															data-role="dropdownlist" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="false" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveBloc,
																source: blocDS" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-1">											
										  			<button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>														
											</div>		
							        	</div>

							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
											<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
												<i class="fa fa-file-excel-o"></i>
												Export to Excel
											</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					

						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.cash_receipt_by_sources_detail">Cash Receipt by Source Detail</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="total-sale">
										<p data-bind="text: lang.lang.number_of_customer">Number of Customers</p>
										<span data-bind="text: dataSource.total"></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.total">Total</p>
										<span data-bind="text: total"></sapn>
									</div>
								</div>
							</div>

							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>									
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
										<th style="text-align: left; vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>									
										<th style="text-align: left; vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
										<th style="vertical-align: top; text-align: right"><span data-bind="text: lang.lang.amount">Amount</span></th>
									</tr>
								</thead>
								<tbody data-role="listview"
										data-template="cashReceiptSourceDetail-template"
										data-auto-bind="false" 
										data-bind="source: dataSource">
								</tbody>
							</table>
						</div>
					</span>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashReceiptSourceDetail-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=payment#</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">#=line[i].name#</td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].date), "dd-MM-yyyy")#</td>
			<td style="text-align: left;">#=line[i].number#</td>		
			<td style="text-align: right;">#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;">Total</td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="4">&nbsp;</td>
    </tr>
</script>
<script id="cashReceiptbyuser" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div id="waterreport" class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<div class="hidden-print pull-right" style="margin-bottom: 15px;">
				    		<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
						</div>
						<div class="clear"></div>
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">
							
								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date">Date</span></a></li>	
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter">Filter</span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export" style="text-transform: capitalize;"></span></a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->								
								<div class="widget-body">
									<div class="tab-content">
								        <!-- //Date -->
								        <div class="tab-pane active" id="tab-1">
											<div class="row">									        	
												<div class="col-xs-12 col-sm-2">
													<input data-role="dropdownlist"
														   class="sorter"                  
												           data-value-primitive="true"
												           data-text-field="text"
												           data-value-field="value"
												           data-bind="value: sorter,
												                      source: sortList,                              
												                      events: { change: sorterChanges }" style="width: 100%">
												</div>								        	
												<div class="col-xs-12 col-sm-2">                     
													<input data-role="datepicker"
														   class="sdate"
														   data-format="dd-MM-yyyy"
												           data-bind="value: sdate,
												           			  max: edate"
												           placeholder="From ..."  style="width: 100%">
												</div>								        	
												<div class="col-xs-12 col-sm-2">          
												    <input data-role="datepicker"
												    	   class="edate"
												    	   data-format="dd-MM-yyyy"
												           data-bind="value: edate,
												                      min: sdate"
												           placeholder="To ..."  style="width: 100%">
												</div>								        	
												<div class="col-xs-12 col-sm-1">
												  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>
											</div>
							        	</div>

								    	<!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<div class="row">
												<div class="col-xs-12 col-sm-3" >
													<span data-bind="text: lang.lang.license">Licenses</span>
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
																events: {change: licenseChange}" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-3">
													<span data-bind="text: lang.lang.location">Locations</span>
														<input 
															data-role="dropdownlist" 
															data-option-label="Location ..." 
															data-auto-bind="false" 
															data-value-primitive="false" 
															data-text-field="name" 
															data-value-field="id" 
															data-bind="
																value: blocSelect,
																enabled: haveBloc,
																source: blocDS" style="width: 100%">
												</div>
												<div class="col-xs-12 col-sm-1">											
										  			<button style="margin-top: 20px;" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
												</div>														
											</div>		
							        	</div>

							        	<!-- PRINT/EXPORT  -->
								        <div class="tab-pane report" id="tab-3">								        	
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" ><i></i> Print</span>
											<span id="excel" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" >
												<i class="fa fa-file-excel-o"></i>
												Export to Excel
											</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->						
					

						<div id="invFormContent">
							<div class="block-title">
								<h3 data-bind="text: company.name"></h3>
								<h2 data-bind="text: lang.lang.cash_receipt_by_employee">Cash Receipt by Empoloyee</h2>
								<p data-bind="text: displayDate"></p>
							</div>

							<div class="row">
								<div class="col-xs-12 col-sm-3">
									<div class="total-sale">
										<p data-bind="text: lang.lang.number_of_employee">Number of Customers</p>
										<span data-bind="text: dataSource.total"></span>
									</div>
								</div>
								<div class="col-xs-12 col-sm-9">
									<div class="total-sale">
										<p data-bind="text: lang.lang.total">Total</p>
										<span data-bind="text: total"></sapn>
									</div>
								</div>
							</div>

							<table style="margin-bottom: 0;" class="table table-bordered table-condensed table-striped table-primary table-vertical-center">
								<thead>
									<tr>									
										<th style="vertical-align: top;"><span data-bind="text: lang.lang.name">Name</span></th>
										<th style="text-align: left; vertical-align: top;"><span data-bind="text: lang.lang.date">Date</span></th>									
										<th style="text-align: left; vertical-align: top;"><span data-bind="text: lang.lang.reference">Reference</span></th>
										<th style="vertical-align: top; text-align: right"><span data-bind="text: lang.lang.amount">Amount</span></th>
									</tr>
								</thead>
								<tbody data-role="listview"
										data-template="cashReceiptbyuser-template"
										data-auto-bind="false" 
										data-bind="source: dataSource">
								</tbody>
							</table>
						</div>
					</span>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="cashReceiptbyuser-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=payment#</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>	
	# var amount = 0;#
	#for(var i= 0; i <line.length; i++) {#
		# amount += line[i].amount;#
		<tr>
			<td style="padding-left: 20px !important;">#=line[i].name#</td>
			<td style="text-align: left;">#=kendo.toString(new Date(line[i].date), "dd-MM-yyyy")#</td>
			<td style="text-align: left;">#=line[i].number#</td>		
			<td style="text-align: right;">#=kendo.toString(line[i].amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;">Total</td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, banhji.locale=="km-KH"?"c0":"c", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="4">&nbsp;</td>
    </tr>
</script>
<script id="importView" type="text/x-kendo-template">
	<div class="container">
		<div class="row-fluid">
			<div class="background">
				<div class="row-fluid">
					<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>
					<div id="example" class="k-content">
						<h2 data-bind="text: lang.lang.imports" style="margin-bottom: 25px;">Imports</h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>

						<!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
							
								<!-- Tabs Heading -->
								<div class="widget-head" style="background: #203864 !important; color: #fff;">
									<ul>
										<li class="active"><a class="glyphicons user" href="#tabContact" data-toggle="tab"><i></i><span style="line-height: 55px;" data-bind="text: lang.lang.customer">Customer</span></a></li>
										<li><a class="glyphicons vcard" href="#tabProperty" data-toggle="tab"><i></i><span style="line-height: 55px;" data-bind="text: lang.lang.property">Property</span></a></li>
										<li><a class="glyphicons pushpin" href="#tabLocation" data-toggle="tab"><i></i><span style="line-height: 55px;" data-bind="text: lang.lang.location">Location</span></a></li>
										<li><a class="glyphicons list" href="#tabInventery" data-toggle="tab"><i></i><span style="line-height: 55px;" data-bind="text: lang.lang.meter">Meter</span></a></li>									
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">
										<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 70%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
											<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
										</div>
										<!-- Tab content -->
										<div id="tabContact" class="tab-pane active widget-body-regular">
											<div class="row-fluid">
												<h4 class="separator bottom" data-bind="text: lang.lang.please_upload_contacts_file">Please upload contacts file</h4>
												<a href="<?php echo base_url(); ?>assets/water/wcontact_import_form_excel.xlsx" download>
													<span id="saveClose" class="btn btn-icon btn-success glyphicons download" >
														<i></i> 
														<span data-bind="text: lang.lang.download_file_example">Download file example</span>
													</span>
												</a>
												<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
												  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: contact.onSelected}" id="myFile"  class="margin-none" />
												</div>
												<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 120px!important; margin-bottom: 0;"><i></i>
													<span data-bind="click: contact.save, text: lang.lang.imports">Import Contact</span>
												</span>
											</div>
										</div>
										<!-- // Tab content END -->
									
										<!-- Tab content -->
										<div id="tabInventery"  class="tab-pane widget-body-regular">
											<div class="row-fluid">
												<h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.please_upload_meter_file">Please upload Meter file</h4>
												<a href="<?php echo base_url(); ?>assets/water/meter_import.xlsx" download>
													<span id="saveClose" class="btn btn-icon btn-success glyphicons download" >
														<i></i> 
														<span data-bind="text: lang.lang.download_file_example">Download file Example</span>
													</span>
												</a>
												<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
												  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: item.onSelected}" id="myFile"  class="margin-none" />
												</div>
												<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 120px!important; margin-bottom: 0;"><i></i>
													<span data-bind="click: item.save, text: lang.lang.imports">Import Meter</span>
												</span>
											</div>
										</div>

										<!-- Tab content -->
										<div id="tabLocation" class="tab-pane widget-body-regular">
											<div class="row">
												<div class="col-xs-12 col-sm-4">
													<h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.location">Please upload Meter file</h4>
													<a href="<?php echo base_url(); ?>assets/water/location_import.xlsx" download>
														<span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 200px!important;">
															<i></i> 
															<span data-bind="text: lang.lang.download_file_example">Download file Example</span>
														</span>
													</a>
													<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
													  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onLocationSelected}" id="myFile"  class="margin-none" />
													</div>
													<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 120px!important;"><i></i>
														<span data-bind="click: locationSave, text: lang.lang.imports">Import Meter</span>
													</span>
												</div>
												<div class="col-xs-12 col-sm-4">
													<h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.sub_location">Please upload Meter file</h4>
													<a href="<?php echo base_url(); ?>assets/water/sub_location_import.xlsx" download>
														<span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 200px!important;">
															<i></i> 
															<span data-bind="text: lang.lang.download_file_example">Download file Example</span>
														</span>
													</a>
													<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
													  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onSubLocationSelected}" id="myFile"  class="margin-none" />
													</div>
													<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 120px!important;"><i></i>
														<span data-bind="click: subLocationSave, text: lang.lang.imports">Import Meter</span>
													</span>
												</div>
												<div class="col-xs-12 col-sm-4">
													<h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.box">Please upload Meter file</h4>
													<a href="<?php echo base_url(); ?>assets/water/box_import.xlsx" download>
														<span id="saveClose" class="btn btn-icon btn-success glyphicons download" style="width: 200px!important;">
															<i></i> 
															<span data-bind="text: lang.lang.download_file_example">Download file Example</span>
														</span>
													</a>
													<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
													  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onBoxSelected}" id="myFile"  class="margin-none" />
													</div>
													<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 120px!important;"><i></i>
														<span data-bind="click: boxSave, text: lang.lang.imports">Import Meter</span>
													</span>
												</div>
											</div>
										</div>

										<!-- // Tab content END -->
										<div id="tabProperty" class="tab-pane widget-body-regular">
											<div class="row-fluid">
												<h4 class="separator bottom" style="margin-top: 10px;" data-bind="text: lang.lang.please_upload_inventory_file">Please upload Property file</h4>
												<a href="<?php echo base_url(); ?>assets/water/property_import.xlsx" download>
													<span id="saveClose" class="btn btn-icon btn-success glyphicons download">
														<i></i> 
														<span data-bind="text: lang.lang.download_file_example">Download file Example</span>
													</span>
												</a>
												<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
												  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: property.onSelected}" id="myFile"  class="margin-none" />
												</div>
												<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 120px!important;"><i></i>
													<span data-bind="click: property.save, text: lang.lang.imports">Import Meter</span>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div id="ntf1" data-role="notification"></div>
								<!-- // Tabs END -->
							</div>
						</div>


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
						<h2 data-bind="text: lang.lang.imports" style="margin-bottom: 25px;">Imports</h2>
						<div class="hidden-print pull-right">
				    		<span class="glyphicons no-js remove_2" 
								data-bind="click: cancel"><i></i></span>
						</div>
						<div class="clear"></div>

						<!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
							
								<!-- Tabs Heading -->
								<div class="widget-head" style="background: #203864 !important; color: #fff;">
									<ul>
										<li class="active"><a class="glyphicons user" href="#tabContact" data-toggle="tab"><i></i><span style="line-height: 55px;" data-bind="text: lang.lang.customer">Customer</span></a></li>				
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">
										<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 70%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
											<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
										</div>
										<!-- Tab content -->
										<div id="tabContact" class="tab-pane active widget-body-regular">
											<div class="row-fluid">
												<h4 class="separator bottom" data-bind="text: lang.lang.please_upload_contacts_file">Please upload contacts file</h4>
												<a href="<?php echo base_url(); ?>assets/water/wcontact_import_form_excel.xlsx" download>
													<span id="saveClose" class="btn btn-icon btn-success glyphicons download" >
														<i></i> 
														<span data-bind="text: lang.lang.download_file_example">Download file example</span>
													</span>
												</a>
												<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
												  	<input type="file"  data-role="upload" data-show-file-list="true" data-bind="events: {select: onSelected}" id="myFile"  class="margin-none" />
												</div>
												<span id="saveNew" class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 120px!important; margin-bottom: 0;"><i></i>
													<span data-bind="click: save, text: lang.lang.imports">Import Contact</span>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div id="ntf1" data-role="notification"></div>
								<!-- // Tabs END -->
							</div>
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
<script id="customer-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="<?php echo base_url();?>rrd\#/customer">+ Add New Customer</a></li>
    </strong>
</script>
<script id="waterMenu" type="text/x-kendo-template">
	<ul class="topnav pull-left">
	  	<!-- <li><a href='#/' style="padding-left: 11px; padding-right: 15px;"><img src="<?php echo base_url();?>assets/water/utibill(v2).png" style="width: 37px;"></a></li> -->
	  	<li><a href='#/center'><span data-bind="text: lang.lang.center"></span></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i class="text-t"></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/customer'><span >Add New Customer</span></a></li>
  				<li><a href='#/property'><span >Add New Property</span></a></li> 
  				<li ><a href='#/reorder'><span >Reading Route Management</span></a></li>
  				<li ><a href='#/head_meter'><span >Head Meter Reading</span></a></li>
  				<li><span class="li-line"></span></li>
  				<li><a href='#/reading'><span >1. Meter Reading</span></a></li> 
  				<li><a href='#/run_bill'><span >2. Run Bill</span></a></li> 
  				<li><a href='#/print_bill'><span >3. Print Bill</span></a></li>
  				<li><a href='#/receipt'><span >4. Cash Receipt</span></a></li>
  				<li><span class="li-line"></span></li>
  				<!-- <li><a href='#/imports'><span >Import</span></a></li>
  				<li><span class="li-line"></span></li>
  				<li><a href='#/backup'><span >Back Up</span></a></li> -->
  				<li><a href='#/offline'><span >Offline</span></a></li>
  			</ul>
	  	</li>
	  	<li><a href="#/reports" style="color: #fff">REPORTS</a></li>
	  	<li style="width: 47px"><a style="width: 47px;" href='#/setting' class='glyphicons settings'><i class="text-t"></i></a></li>
	</ul>
</script>

<!-- ***************************
* widget templates
**************************** -->
<script id="contact-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer">+ Add New Customer</a></li>
    </strong>
</script>
<script id="contact-list-tmpl" type="text/x-kendo-tmpl">
	<span>#=abbr##=number#</span>	
	<span>#=name#</span>	
</script>

<script id="cashReAuto" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background" style="overflow: hidden;">
			<div class="container-960">
				<div id="loadImport" style="display:none;text-align: center;position: absolute;width: 100%; height: 100%;margin-top: -15px;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
					<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
				</div>			
				<div id="example" class="k-content">
			    	<div class="hidden-print pull-right">
			    		<span class="glyphicons no-js remove_2" 
							data-bind="click: cancel"><i></i></span>	
					</div>
			        <h2 style="padding:0 15px;">Import</h2>
					<br />
					<div class="relativeWrap" data-toggle="source-code">
						<div class="widget widget-tabs widget-tabs-double-2 widget-tabs-gray">
							<div class="widget-head">
								<ul style="padding-left: 1px;">
									<li class="active"><a class="glyphicons group" href="#tabMeter" data-toggle="tab"><i></i><span style="line-height: 55px;">Meter</span></a></li>
									<li><a class="glyphicons group" href="#tabContact" data-toggle="tab"><i></i><span style="line-height: 55px;">Customer Number</span></a></li>
								</ul>
							</div>
							<div class="widget-body">
								<div class="tab-content">
									<div id="tabMeter" style="border: 1px solid #ccc" class="tab-pane active widget-body-regular">
										<h4 class="separator bottom" style="margin-top: 10px;">Recieve By Meter ID</h4>
										<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
										  	<input type="file"  
										  		data-role="upload" 
										  		data-show-file-list="true" 
										  		data-bind="events: {select: onSelected}" 
										  		id="myFile"  class="margin-none" />
										</div>
										<span class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 160px!important;"><i></i>
										<span data-bind="click: save">Start Import</span></span>
									</div>
									<div id="tabContact" style="border: 1px solid #ccc" class="tab-pane widget-body-regular">
										<h4 class="separator bottom" style="margin-top: 10px;">Recieve By Customer Number</h4>
										<div class="fileupload fileupload-new margin-none" data-provides="fileupload">
										  	<input type="file"
										  		data-role="upload"
										  		data-show-file-list="true"
										  		data-bind="events: {select: onCusSelected}" 
										  		id="myFile"  class="margin-none" />
										</div>
										<span class="btn btn-icon btn-primary glyphicons ok_2" data-bind="invisible: isEdit" style="width: 160px!important;"><i></i>
										<span data-bind="click: saveCus">Start Import</span></span>
									</div>
								</div>
							</div>
							<div id="ntf1" data-role="notification"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>