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
                        <div class="card-body"  >
                        	<div class="row home" id="reports" style="margin-top: 25px;">
	                        	<div class="col-md-4">
									<div class="saleOverview">
										<h2 data-bind="">Cash In</h2>
										<p data-format="n0" data-bind="">100000.000</p>
									</div>
									<div class="report" >
										<div class="col-md-12">
											<h3 style="border-bottom: none; padding-bottom: 0;"><a href="#/cash_movement" data-bind="text: lang.lang.cash_movement" ></a></h3>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="saleOverview">
										<h2 data-bind="">Cash Out</h2>
										<p data-format="n0" data-bind="">100000.000</p>
									</div>
									<div class="report" >
										<div class="col-md-12">
											<h3 style="border-bottom: none; padding-bottom: 0;"><a href="#/cash_movement" data-bind="text: lang.lang.cash_movement" ></a></h3>
										</div>
									</div>									                        
								</div>
								<div class="col-md-4">
									<div class="saleOverview">
										<h2 data-bind="">Cash Balance</h2>
										<p data-format="n0" data-bind="">100000.000</p>
									</div>
									<div class="report" >
										<div class="col-md-12">
											<h3 style="border-bottom: none; padding-bottom: 0;"><a href="#/cash_movement" data-bind="text: lang.lang.cash_movement" ></a></h3>
										</div>
									</div>									                        
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
								           placeholder="From ..." >

								    <input data-role="datepicker" 
								    	   class="edate marginRight marginBottom float-left"
								    	   data-format="dd-MM-yyyy"
								           data-bind="value: edate,
								                      min: sdate"
								           placeholder="To ..." >

								  	<button class="btnSearch float-left" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
								</div>
								<div class="col-md-4">
						            <div class="btn-group float-right">
						                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						                	Add New Transaction
						                </button>
						                <div class="dropdown-menu">
						                    <a class="dropdown-item" href="cashs#/cash_transaction"><span data-bind="">Cash​ Transaction</span></a>
						                    <a class="dropdown-item" href="cashs#/cash_advance"><span data-bind="">Cash Advance</span></a>
						                    <a class="dropdown-item" href="cashs#/Expense"><span data-bind="">Expense</span></a>
						                </div>
						            </div>
						        </div>
						       
							</div>						

							<div class="row">
							 	<div class="col-md-12 marginTop table-responsive">
							 		<table class="table color-table dark-table" style="width: 100%; height: auto; ">
			                            <thead>
			                                <tr>
												<th data-bind="text: lang.lang.type"></th>
												<th data-bind="text: lang.lang.date"></th>
												<th data-bind="text: lang.lang.reference_no"></th>
												<th data-bind="text: lang.lang.description"></th>
												<th data-bind="text: lang.lang.name"></th>
												<th data-bind="text: lang.lang.debit"></th>
												<th data-bind="text: lang.lang.credit"></th>
												<th data-bind="text: lang.lang.balance"></th>
											</tr>
			                            </thead>
			                            <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="generalLedger-template"
								                data-bind="source: dataSource" >
								        </tbody>
								        <tfoot data-template="generalLedger-footer-template" data-bind="source: this"></tfoot>
					            	</table>
					            	<div id="pager" 
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
        </div>
    </div>
</script>

<script id="generalLedger-template" type="text/x-kendo-tmpl">
	<tr>
		<td colspan="7" style="font-weight: bold;">#: name #</td>
    	<td class="textAlignRight" style="color: black;">
    		#=kendo.toString(balance_forward, "n2")#
    	</td>
	</tr>
	#var balance = balance_forward;#
	#var totalDr = 0;#
	#var totalCr = 0;#
	#for(var i=0; i < line.length; i++){#
	#balance += line[i].amount;#
	#totalDr += line[i].dr;#
	#totalCr += line[i].cr;#
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
		<td style="color: black;">
			#=line[i].memo#
		</td>
		<td style="color: black;">
			#=line[i].contact#
		</td>
		<td class="textAlignRight" style="color: black;">
			#=kendo.toString(line[i].dr, "n2")#
		</td>
		<td class="textAlignRight" style="color: black;">
			#=kendo.toString(line[i].cr, "n2")#
		</td>
		<td class="textAlignRight" style="color: black;">
			#=kendo.toString(balance, "n2")#
		</td>
    </tr>
    #}#
    #if(line.length>0){#
    <tr>
    	<td colspan="5" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total" style="text-transform: capitalize;"></span><span>#: name #</span></td>
    	<td class="textAlignRight" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalDr, "n2")#
    	</td>
    	<td class="textAlignRight" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalCr, "n2")#
    	</td>
    	<td class="textAlignRight" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(balance, "n2")#
    	</td>
    </tr>
    #}#
    <tr>
    	<td colspan="8">&nbsp;</td>
    </tr>
</script>
<script id="generalLedger-footer-template" type="text/x-kendo-template">
    <tr>
    	<td colspan="5">
            TOTAL
        </td>
        <td class="textAlignRight">
           <h3 data-format="n2" data-bind="text: totalDr()"></h3>
        </td>
        <td class="textAlignRight">
            <h3 data-format="n2" data-bind="text: totalCr()"></h3>
        </td>
        <td></td>
    </tr>
</script>


<!-- Function -->
<script id="cashTransaction" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">

				        <h2 data-bind="text: lang.lang.c_transaction"></h2>

						<!-- Upper Part -->
						<div class="row">
							<div class="col-md-4">
								<div class="box-generic">
									<table class="table table-borderless table-condensed cart_total" style="margin-bottom: 0;">
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
											<td><span data-bind="text: lang.lang.currency"></span></td>
											<td>
												<input id="ddlCurrency" name="ddlCurrency"
						              				data-role="dropdownlist"
						              				data-template="currency-list-tmpl"
						              				data-value-primitive="true"
								            		data-text-field="code"
					           						data-value-field="locale"
								            		data-bind="source: currencyDS,
								            					value: obj.locale,
								            					events:{change:setRate}"
								            		data-option-label="(--- Select ---)"
								                   required data-required-msg="required" style="width: 100%;"/>
											</td>
										</tr>
									</table>
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
		                                            		<div class="col-md-12">		                                            			
			                                            		<textarea id="memo2" cols="0" rows="4" class="k-textbox"
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
							<div class="col-md-12">
								<h4 data-bind="text: fromToTop" stye="width: 100%; float: left;"></h4>
							</div>
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-1">
										<p class="marginBottom" data-bind="text: lang.lang.account"></p>
									</div>
									<div class="col-md-5">
										<input id="cbbAccount" name="cbbAccount" class="marginBottom"
											   data-role="combobox"
							                   data-header-template="account-header-tmpl"
							                   data-template="account-list-tmpl"
							                   data-value-primitive="true"
							                   data-text-field="name"
							                   data-value-field="id"
							                   data-bind="value: obj.account_id,
							                              source: accountDS"
							                   data-placeholder="Add Account.."
							                   required data-required-msg="required" style="width: 100%" />
									</div>
									<div class="col-md-1">
										<p class="marginBottom" data-bind="text: lang.lang.segments"></p>
									</div>
									<div class="col-md-5">
										<select data-role="multiselect" class="marginBottom"
											   data-value-primitive="true"
											   data-header-template="segment-header-tmpl"
											   data-item-template="segment-list-tmpl"
											   data-value-field="id"
											   data-text-field="code"
											   data-bind="value: obj.segments,
											   			source: segmentItemDS,
											   			events:{ change: transactionSegmentChanges }"
											   data-placeholder="Add Segment.."
											   style="width: 100%" /></select>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<h4 data-bind="text: fromToBottom" stye="width: 100%; float: left;"></h4>
							</div>

							<div class="col-md-12 table-responsive">
								<table class="table color-table dark-table">
							        <thead>
							            <tr>
							                <th ><span data-bind="text: lang.lang.no_"></span></th>
							                <th ><span data-bind="text: lang.lang.account"></span></th>
							                <th ><span data-bind="text: lang.lang.method"></span></th>
							                <th data-bind="text: lang.lang.description"></th>
							                <th data-bind="visible: showRef" ><span data-bind="text: lang.lang.reference"></span></th>
							                <th data-bind="visible: showName" ><span data-bind="text: lang.lang.name"></span></th>
							                <th data-bind="visible: showSegment" ><span data-bind="text: lang.lang.segment"></span></th>
							                <th ><span data-bind="text: lang.lang.amount"></span></th>
							            </tr>
							        </thead>
							        <tbody data-role="listview"
							        		data-template="cashTransaction-template"
							        		data-auto-bind="false"
							        		data-bind="source: lineDS"></tbody>
							    </table>
							</div>
						</div>	

						<div class="row">
							<div class="col-md-6 marginBottom">
								<button class="btn waves-effect waves-light btn-block btn-info btnPlus marginRight" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>
								<div class="btn-group marginRight" style="float: left">
									<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-list"></i> </a>
									<ul class="dropdown-menu" style="padding: 5px; border-radius:0;">
										<li>
											<input type="checkbox" data-bind="checked: showRef" /> <span data-bind="text: lang.lang.reference"></span>
										</li>
										<li>
											<input type="checkbox" data-bind="checked: showName" /> <span data-bind="text: lang.lang.name"></span>
										</li>
										<li>
											<input type="checkbox" data-bind="checked: showSegment" /> <span data-bind="text: lang.lang.segment"></span>
										</li>
									</ul>
								</div>								
							</div>
							<div class="col-md-6">
								<table class="table color-table dark-table">
									<tbody>
										<tr>
											<td class="textAlignRight"><span data-bind="text: lang.lang.total"></span>:</td>
											<td class="textAlignRight"><span data-bind="text: total"></span></td>
										</tr>
									</tbody>
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
</script>
<script id="cashTransaction-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td class="center">
			<i class="icon-trash" data-bind="events: { click: remove }"></i>
			#:banhji.cashTransaction.lineDS.indexOf(data)+1#
		</td>
		<td>
			<input id="cbbAccounts" name="cbbAccounts"
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
			<input id="ddlPaymentMethod" name="ddlPaymentMethod"
				   data-role="dropdownlist"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: payment_method_id,
                              source: paymentMethodDS"
                   data-option-label="Select method.."
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
		<td data-bind="visible: showName">
			<input data-role="combobox" id="showName"
                   data-value-primitive="true"
                   data-template="contact-list-tmpl"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: contact_id,
                              source: contactDS"
                   data-placeholder="Add Name.."
                   style="width: 100%" />
		</td>
		<td data-bind="visible: showSegment">
			<select data-role="multiselect" id="showSegment"
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
<script id="cashAdvance" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">

				        <h2 data-bind="text: lang.lang.cash_advance"></h2>

						<!-- Upper Part -->
						<div class="row">
							<div class="col-md-4">
								<div class="box-generic">
									<table class="table table-borderless table-condensed cart_total" >
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
											<td><span data-bind="text: lang.lang.employee"></span></td>
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
									                   data-bind="value: obj.contact,
									                              source: contactDS,
									                              events: {change: contactChanges}"
									                   data-option-label="Select Employee..."
									                   required data-required-msg="required" style="width: 100%;"/>
											</td>
										</tr>
									</table>
									<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
										data-bind="style: { backgroundColor: amtDueColor}">
										<div align="left"><span data-bind="text: lang.lang.total_amount"></span></div>
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
                                            		<div class="col-md-6">
                                            			<p class="marginBottom" data-bind="text: lang.lang.expected_date"></p>
                                            			<input class="marginBottom" id="txtExpectedDate" name="txtExpectedDate"
																data-role="datepicker"
																data-format="dd-MM-yyyy"
																data-parse-formats="yyyy-MM-dd"
																data-bind="value: obj.due_date"
																required data-required-msg="required"
																style="width: 100%;"		/>

	                                            		<p class="marginBottom" data-bind="text: lang.lang.cash_account"></p>
														<input id="cbbAccount" name="cbbAccount" class="marginBottom"
															   data-role="combobox"
											                   data-value-primitive="true"
											                   data-header-template="account-header-tmpl"
											                   data-template="account-list-tmpl"
											                   data-text-field="name"
											                   data-value-field="id"
											                   data-bind="value: obj.account_id,
											                              source: cashAccountDS"
											                   data-placeholder="Select Account.."
											                   required data-required-msg="required" style="width: 100%" />
														
	                                            	</div>

	                                            	<div class="col-md-6">
	                                            		<p class="marginBottom" data-bind="text: lang.lang.method"></p>
	                                            		<input id="ddlPaymentMethod" name="ddlPaymentMethod" class="marginBottom"
															   data-role="dropdownlist"
											                   data-value-primitive="true"
											                   data-text-field="name"
											                   data-header-template="cash-payment-method-header-tmpl"
											                   data-value-field="id"
											                   data-bind="value: obj.payment_method_id,
											                              source: paymentMethodDS"
											                   data-option-label="(--- Select ---)"
											                   required data-required-msg="required" style="width: 100%;" />
											              				
											              				 
														<p class="marginBottom" data-bind="text: lang.lang.segment"></p>
														<select data-role="multiselect" class="marginBottom"
															   data-value-primitive="true"
															   data-header-template="segment-header-tmpl"
															   data-item-template="segment-list-tmpl"
															   data-value-field="id"
															   data-text-field="code"
															   data-bind="value: obj.segments,
															   			source: segmentItemDS,
															   			events:{ change: transactionSegmentChanges }"
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
							                <th ><span data-bind="text: lang.lang.account"></span></th>
							                <th data-bind="text: lang.lang.description"></th>
							                <th data-bind="visible: showRef" ><span data-bind="text: lang.lang.reference"></span></th>
							                <th data-bind="visible: showSegment" ><span data-bind="text: lang.lang.segment"></span></th>
							                <th ><span data-bind="text: lang.lang.amount"></span></th>
							            </tr>
							        </thead>
							        <tbody data-role="listview"
							        		data-template="cashAdvance-template"
							        		data-auto-bind="false"
							        		data-bind="source: lineDS"></tbody>
							    </table>
							</div>
						</div>	

						<div class="row">
							<div class="col-md-6 marginBottom">								
								<div class="btn-group marginRight" style="float: left">
									<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-list"></i> </a>
									<ul class="dropdown-menu" style="padding: 5px; border-radius:0;">
										<li>
											<input type="checkbox" data-bind="checked: showRef" /> <span data-bind="text: lang.lang.reference"></span>
										</li>
										<li>
											<input type="checkbox" data-bind="checked: showSegment" /> <span data-bind="text: lang.lang.segment"></span>
										</li>
									</ul>
								</div>								
							</div>
							<div class="col-md-6">
								<table class="table color-table dark-table">
									<tbody>
										<tr>
											<td class="textAlignRight"><span data-bind="text: lang.lang.total"></span>:</td>
											<td class="textAlignRight"><span data-bind="text: total"></span></td>
										</tr>
									</tbody>
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
</script>
<script id="cashAdvance-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td>
			<input id="cbbAccounts" name="cbbAccounts"
				   data-role="combobox"
                   data-value-primitive="true"
                   data-header-template="account-header-tmpl"
                   data-template="account-list-tmpl"
                   data-text-field="name"
                   data-value-field="id"
                   data-filter="contains"
                   data-min-length="3"
                   data-bind="value: account_id,
                              source: advAccountDS"
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
<script id="expense" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">

				        <h2 data-bind="text: lang.lang.c_expense"></h2>

						<!-- Upper Part -->
						<div class="row">
							<div class="col-md-4">
								<div class="box-generic">
									<table class="table table-borderless table-condensed cart_total" >
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
											<td><span data-bind="text: lang.lang.currency"></span></td>
											<td>
												<input id="cbbCurrency" name="cbbCurrency"
													   data-role="combobox"
									                   data-value-primitive="true"
									                   data-template="currency-list-tmpl"
									                   data-text-field="code"
									                   data-value-field="locale"
									                   data-bind="value: obj.locale,
									                              source: currencyDS,
									                              events:{ change: setRate }"
									                   data-placeholder="Type Name.."
									                   required data-required-msg="required" style="width: 100%;"/>
											</td>
										</tr>
										<tr>
											<td><span data-bind="text: lang.lang.employee"></span></td>
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
									                   data-bind="value: obj.contact,
									                              source: contactDS,
									                              events: {change: contactChanges}"
									                   data-option-label="Select Employee..."
									                   required data-required-msg="required" style="width: 100%;"/>
											</td>
										</tr>
									</table>
									<div class="strong" style="background: #eee;  border: 1px solid #ddd; width: 100%; padding: 10px;" align="center"
										data-bind="style: { backgroundColor: amtDueColor}">
										<div align="left"><span data-bind="text: lang.lang.c_amount_paid"></span></div>
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
                                            		<div class="col-md-4">
                                            			<input type="radio" value="Direct_Expense" class="k-radio"
								            					name="payOption" id="payOption1"
								            					data-bind="checked: obj.type,
								            								events:{ change: typeChanges }">
								            			<label class="k-radio-label" for="payOption1"><span data-bind="text: lang.lang.c_direct_expense"></span></label>
														
	                                            	</div>

	                                            	<div class="col-md-4">
	                                            		<input type="radio" value="Reimbursement" class="k-radio"
											            		name="payOption" id="payOption2"
											            		data-bind="checked: obj.type,
											            					events:{ change: typeChanges }">
											            <label class="k-radio-label" for="payOption2"><span data-bind="text: lang.lang.c_reimbursement"></span></label>
										            	
	                                            	</div>
	                                            	<div class="col-md-4">
	                                            		<input type="radio" value="Advance_Settlement" class="k-radio"
											            		name="payOption" id="payOption3"
											            		data-bind="checked: obj.type,
											            					events:{ change: typeChanges }">
											            <label class="k-radio-label" for="payOption3"><span data-bind="text: lang.lang.c_advance_settlement"></span></label>									
	                                            	</div>
                                        		</div>
                                        		
                                        		<div class="row">
                                            		<div class="col-md-6">
                                            			<p class="marginBottom" data-bind="text: lang.lang.cash_account"></p>
                                            			<input class="marginBottom" id="cbbAccount" name="cbbAccount"
															   data-role="combobox"
											                   data-header-template="account-header-tmpl"
											                   data-template="account-list-tmpl"
											                   data-value-primitive="true"
											                   data-text-field="name"
											                   data-value-field="id"
											                   data-bind="value: obj.account_id,
											                              source: cashAccountDS"
											                   data-placeholder="Select Account.."
											                   required data-required-msg="required"
																style="width: 100%;"		/>

	                                            		<p class="marginBottom" data-bind="text: lang.lang.segment"></p>
														<select class="marginBottom" data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="segment-header-tmpl"
															   data-item-template="segment-list-tmpl"
															   data-value-field="id"
															   data-text-field="code"
															   data-bind="value: obj.segments,
															   			source: segmentItemDS,
															   			events:{ change: transactionSegmentChanges }"
															   data-placeholder="Add Segment.."
															   style="width: 100%" /></select>	
														
	                                            	</div>

	                                            	<div class="col-md-6">
	                                            		<p class="marginBottom" data-bind="text: lang.lang.job"></p>
														<input class="marginBottom" id="ddlJob" name="ddlJob"
															   data-role="dropdownlist"
															   data-header-template="job-header-tmpl"
															   data-template="job-list-tmpl"
											                   data-value-primitive="true"
											                   data-text-field="name"
											                   data-value-field="id"
											                   data-bind="value: obj.job_id,
											                   			source: jobDS"
											                   data-option-label="Select job..."
											                   style="width: 100%" />			

	                                            		<div data-bind="visible: showCashAdvance">
		                                            		<p class="marginBottom" data-bind="text: lang.lang.cash_advance"></p>
															<input class="marginBottom" id="ddlReference" name="ddlReference"
										        					data-role="dropdownlist"
										        				   data-template="reference-list-tmpl"
												                   data-value-primitive="true"
												                   data-auto-bind="false"
												                   data-index="1"
												                   data-text-field="number"
												                   data-value-field="id"
												                   data-bind="value: obj.reference_id,
												                              source: referenceDS,
												                              events: { change: referenceChanges }"
												                   required data-required-msg="required" style="width: 100%" />
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
							                <th ><span data-bind="text: lang.lang.account"></span></th>
							                <th data-bind="text: lang.lang.description"></th>
							                <th ><span data-bind="text: lang.lang.supplier"></span></th>
							                <th ><span data-bind="text: lang.lang.inv_"></span></th>
							                <th ><span data-bind="text: lang.lang.date"></span></th>
							                <th data-bind="visible: showJob" >JOB</th>
							                <th data-bind="visible: showSegment"><span data-bind="text: lang.lang.segment"></span></th>
							                <th ><span data-bind="text: lang.lang.amount"></span></th>
							                <th ><span data-bind="text: lang.lang.tax"></span></th>
							            </tr>
							        </thead>
							        <tbody data-role="listview"
							        		data-template="expense-template"
							        		data-auto-bind="false"
							        		data-bind="source: lineDS"></tbody>
							    </table>
							</div>
						</div>	

						
						<!-- Bottom part -->
			            <div class="row">

							<!-- Column -->
							<div class="col-md-4 hidden-print">

								<button class="btn waves-effect waves-light btn-block btn-info btnPlus marginRight" data-bind="click: addRow"><i class="icon-plus icon-white"></i></button>
								<br/>
								<br/>
								<div class="well marginTop">
									<textarea cols="0" rows="2" class="k-textbox" style="width:100%" data-bind="value: obj.memo" placeholder="memo ..."></textarea>
								</div>
							</div>
							<!-- Column END -->

							<div class="col-md-4 table-responsive">
								<table class="table color-table dark-table" data-bind="visible: showCashAdvance">
									<tbody>
										<tr>
											<td class="textAlignRight" style="padding-left: 15px;"><span data-bind="text: lang.lang.total_cash_advanced" style="font-size: 15px; font-weight: 700;"></span></td>
											<td class="textAlignRight"><span data-format="n" data-bind="text: obj.deposit" style="font-size: 15px; font-weight: 700;"></span></td>
										</tr>
										<tr>
											<td class="textAlignRight"><span data-bind="text: lang.lang.amount_received"></span></td>
											<td class="textAlignRight ">
												<input data-role="numerictextbox"
														data-format="n"
														data-min="0"
														data-spinners="false"
														data-bind="value: obj.received,
																	events:{change: changes}"
														style="width: 100%; text-align: right;" />
											</td>
										</tr>
										<tr>
											<td class="textAlignRight"><span data-bind="text: lang.lang.remaining" style="font-weight: 700;"></span></td>
											<td class="textAlignRight "><span data-format="n" data-bind="text: obj.remaining" style="font-weight: 700;"></span></td>
										</tr>
									</tbody>
								</table>
							</div>

							<!-- Column -->
							<div class="col-md-4 table-responsive">
								<table class="table color-table dark-table">
									<tbody>
										<tr>
											<td class="textAlignRight" style="padding-left: 15px;"><span data-bind="text: lang.lang.subtotal" style="font-size: 15px; font-weight: 700;"></span></td>
											<td class="textAlignRight"><span data-format="n" data-bind="text: obj.sub_total" style="font-size: 15px; font-weight: 700;"></span></td>
										</tr>
										<tr>
											<td class="textAlignRight"><span data-bind="text: lang.lang.total_tax"></span></td>
											<td class="textAlignRight"><span data-format="n" data-bind="text: obj.tax"></span></td>
										</tr>
										<tr>
											<td class="textAlignRight"><h4  data-bind="text: lang.lang.total" style="font-weight: 700;"></h4></td>
											<td class="textAlignRight "><h4 data-bind="text: total" style="font-weight: 700;"></h4></td>
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
</script>
<script id="expense-template" type="text/x-kendo-tmpl">
	<tr data-uid="#: uid #">
		<td class="center">
			<i class="icon-trash" data-bind="events: { click: remove }"></i>
			#:banhji.expense.lineDS.indexOf(data)+1#
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
		<td>
			<input id="ddlVendor" name="ddlVendor"
				   data-role="combobox"
                   data-header-template="vendor-header-tmpl"
                   data-template="contact-list-tmpl"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: contact_id,
                              source: supplierDS,
                               events:{change: checkExistingInvoice}"
                   data-placeholder="Add Supplier.." style="width: 100%" />
		</td>
		<td>
			<input id="txtReferenceNo" name="txtReferenceNo"
					type="text" class="k-textbox"
					data-bind="value: reference_no,
                               events:{change: checkExistingInvoice}"
					style="width: 100%; margin-bottom: 0;" />
		</td>
		<td>
			<input id="issuedDate" name="issuedDate"
					data-role="datepicker"
					data-format="dd-MM-yyyy"
					data-parse-formats="yyyy-MM-dd"
					data-bind="value: reference_date"
					style="width:100%;" />
		</td>
		<td data-bind="visible: showJob">
			<input id="ddlJob" name="ddlJob"
				   data-role="combobox"
				   data-header-template="job-header-tmpl"
                   data-value-primitive="true"
                   data-text-field="name"
                   data-value-field="id"
                   data-bind="value: job_id,
                              source: jobDS"
                   data-placeholder="Add Job.."
                   style="width: 80px;" />
		</td>
		<td data-bind="visible: showSegment">
			<select id="cbbSegment" name="cbbSegment"
				   data-role="multiselect"
				   data-item-template="segment-list-tmpl"
				   data-value-primitive="true"
				   data-value-field="id"
				   data-text-field="code"
				   data-bind="value: segments,
				   			source: segmentItemDS,
				   			events:{ change: segmentChanges }"
				   data-placeholder="Add Segments.."
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
		<td>
			<input id="ccbTaxItem"
					data-role="combobox"
					data-header-template="tax-header-tmpl"
                   	data-text-field="name"
                   	data-value-field="id"
                   	data-bind="value: tax_item_id,
                   			  source: taxItemDS,
                   			  events:{ change: changes }"
                   	data-placeholder="Add Tax.." style="width: 100%" />
		</td>
    </tr>
</script>
<script id="journal" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">

				        <h2 data-bind="text: lang.lang.journal_entry"></h2>

						<!-- Upper Part -->
						<div class="row">
							<div class="col-md-4">
								<div class="box-generic">
									<table class="table table-borderless table-condensed cart_total" >
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
											<td><span data-bind="text: lang.lang.currency"></span></td>
											<td>
												<input id="cbbCurrency" name="cbbCurrency"
												   data-role="combobox"
								                   data-value-primitive="true"
								                   data-template="currency-list-tmpl"
								                   data-text-field="code"
								                   data-value-field="locale"
								                   data-bind="value: obj.locale,
								                   			source: currencyDS,
								                   			events: {change : setRate}"
								                   placeholder="Select currency..."
								                   required data-required-msg="required" style="width: 100%;"/>
											</td>
										</tr>
									</table>

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
                                            		<div class="col-md-12">
                                            			<textarea id="memo2" cols="0" rows="4" class="k-textbox"
							        		data-bind="value: obj.memo2" style="width:100%;"
							        		placeholder="Please enter transaction purpose here ..."></textarea>
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
									        	var rowIndex = banhji.journal.lineDS.indexOf(dataItem)+1;
									        	return '<i class=icon-trash data-bind=click:removeRow></i>' + ' ' + rowIndex;
									      	}
									    },
					                 	{ field: 'account', title: 'ACCOUNT', editor: accountEditor, template: '#=account.name#', width: '170px' },
			                            { field: 'description', title:'DESCRIPTION', width: '250px' },
			                            { field: 'reference_no', title:'REFERENCE NO.', width: '150px' },
			                            {
										    field: 'dr',
										    title: 'DR',
										    format: '{0:n}',
										    editor: numberTextboxEditor,
										    width: '150px',
										    attributes: { style: 'text-align: right;' }
										},
										{
										    field: 'cr',
										    title: 'CR',
										    format: '{0:n}',
										    editor: numberTextboxEditor,
										    width: '150px',
										    attributes: { style: 'text-align: right;' }
										},
			                            { field: 'contact', title:'NAME', editor: contactEditor, template:'#=contact.name#', hidden: true, width: '200px' },
			                            { field: 'job', title:'JOB', editor: jobEditor, template:'#=job.name#', hidden: true, width: '200px' },
			                            {
					                 		field: 'segments',
					                 		title: 'SEGMENT',
					                 		editable: function(){
					                 			return false;
					                 		},
					                 		template: '<button type=button data-bind=click:openWindow>Add/Edit</button>',
					                 		hidden: true,
					                 		width: '90px'
					                 	}
			                         ]"
			                         data-auto-bind="false"
					                 data-bind="source: lineDS" ></div>  
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
</script>
<script id="journal-add-segment-template" type="text/x-kendo-template">
	<i class="icon-plus icon-white" data-bind="click: openWindow"></i>
	#for(var i=0; i < segments.length; i++){#
		#=segments[i].code# #=segments[i].name#,
	#}#
</script>
<!-- End -->



<!-- Report -->
<script id="cashMovement" type="text/x-kendo-template">	
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
												<p data-bind="text: lang.lang.account" style=""></p>
												<input id="ddlAccount" name="ddlAccount" class="marginBottom"
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
													   style="width: 50%; float: left; margin-right: 8px; " /></select>
													
											  	<button type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
												
												<p data-bind="text: lang.lang.segment"></p>
												<select data-role="multiselect" 
													   data-value-primitive="true"
													   data-header-template="segment-header-tmpl"
													   data-item-template="segment-list-tmpl"
													   data-value-field="id"
													   data-text-field="code"
													   data-bind="value: obj.segments,
													   			source: segmentItemDS,
													   			events:{ change: segmentChanges }"
													   data-placeholder="Select Segments.."
													   style="width: 50%;" /></select>	
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
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="">Cash Movement</h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Table -->
					            <div class="reportTable home-footer table-responsive" style="width: 97%; margin: 0 auto;">
					            	<table class="table color-table dark-table" style="width: 100%; height: auto; ">
			                            <thead>
			                                <tr>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.type"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.date"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.reference_no"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.description"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" >In</th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" >Out</th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.balance"></th>
											</tr>
			                            </thead>
			                            <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="cashMovement-template"
								                data-bind="source: dataSource" >
								        </tbody>
								        <tfoot>
								       		<tr style="font-weight: bold; font-size: large;">
								       			<td colspan="5">TOTAL</td>
								       			<td align="right" data-bind="text: totalAmount"></td>
								       			<td align="right" data-bind="text: totalBalance"></td>
								       		</tr>
								       	</tfoot>
					            	</table>
					            </div>
					        </div>
					    </div>
					</div>
            	</div>
            </div>
        </div>
	</div>
</script>
<script id="cashMovement-template" type="text/x-kendo-tmpl">
	<tr>
		<td colspan="6" style="font-weight: bold;">#: name #</td>
    	<td class="right" style="color: black;">
    		#=kendo.toString(balance_forward, "c2", banhji.locale)#
    	</td>
	</tr>
	#var balance = balance_forward;#
	#for(var i=0; i<line.length; i++){#
	#balance += line[i].amount;#
	<tr>
		<td style="color: black;">
			&nbsp;&nbsp; #=line[i].type#
		</td>
		<td style="color: black;">
			#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#
		</td>
		<td style="color: black;">
			#if(line[i].type=="Cash_Purchase" || line[i].type=="Credit_Purchase"){#
				<a href="\#/purchase/#=line[i].id#"><i></i> #=line[i].number#</a>
			#}else if(line[i].type=="Deposit" || line[i].type=="Witdraw" || line[i].type=="Transfer"){#
				<a href="\#/cash_transaction/#=line[i].id#"><i></i> #=line[i].number#</a>
			#}else{#
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].number#</a>
			#}#
		</td>
		<td style="color: black;">
			#=line[i].memo#
		</td>
		<td class="right" style="color: black;">
			#if(line[i].amount > 0){#
				#=kendo.toString(line[i].amount, "c2", banhji.locale)#
			#}else{#
				#=0#
			#}#
		</td>
		<td class="right" style="color: black;">
			#if(line[i].amount < 0){#
				#=kendo.toString(Math.abs(line[i].amount), "c2", banhji.locale)#
			#}else{#
				#=0#
			#}#
		</td>
		<td style="color: black; text-align: right;">
			#=kendo.toString(balance, "c2", banhji.locale)#
		</td>
    </tr>
    #}#
    <tr>
    	<td colspan="6" style="font-weight: bold; color: black;">Total #: name #</td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(balance, "c2", banhji.locale)#
    	</td>
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
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.collection_report"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-3">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="">Number Of Receipt</p>
												<span style="font-size: 20px; font-weight: 700;" data-format="n0" data-bind="text: total_txn"></span>
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
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.receipt_number"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.check_no"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.receipt_amount"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.invoice_date"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.invoice_number"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.invoice_amount"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="collectionReport-template"
								                data-bind="source: dataSource" >
								        </tbody>
					            	</table>
					            	 <div id="pager" class="k-pager-wrap"
				            		 data-role="pager"
							    	 data-auto-bind="false"
						             data-bind="source: transactionDS"></div>
							    </div>
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
			<td>#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td><a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a></td>
			<td>#=line[i].check_no#</td>
			<td style="text-align: center;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
			<td>#=kendo.toString(new Date(line[i].reference_issued_date), "dd-MM-yyyy")#</td>
			<td><a href="\#/#=line[i].reference_type.toLowerCase()#/#=line[i].reference_id#">#=line[i].reference_number#</a></td>
			<td style="text-align: right;">#=kendo.toString(line[i].reference_amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="3" style="font-weight: bold; color: black;" data-bind="text: lang.lang.total">Total</td>
    	<td style="text-align: center; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalReceived, "c2", banhji.locale)#
    	</td>
    	<td colspan="3"></td>
    </tr>
	<tr>
    	<td colspan="7">&nbsp;</td>
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

											  	<button class="btnSearch" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
						    				</div>
				                        </div>
				                    </div>
				                    <div class="tab-pane" id="filter" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">						    					
												<p data-bind="text: lang.lang.suppliers" style=""></p>
												<select data-role="multiselect"
												   data-value-primitive="true"
												   data-header-template="supplier-header-tmpl"
												   data-item-template="contact-list-tmpl"
												   data-value-field="id"
												   data-text-field="name"
												   data-bind="value: obj.contactIds,
												   			source: contactDS"
												   data-placeholder="Select Suppler.."
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
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.bill_payment_list"></h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-3">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="text: lang.lang.no_bill"></p>
												<span style="font-size: 20px; font-weight: 700;" data-format="n0" data-bind="text: total_txn"></span>
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
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.payment_date"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.payment_number"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.payment_amount"></th>
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
			<td>#=kendo.toString(new Date(line[i].reference_issued_date), "dd-MM-yyyy")#</td>
			<td>#=line[i].reference_number#</a></td>
			<td style="text-align: right;">#=kendo.toString(line[i].reference_amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="2" style="font-weight: bold; color: black;" data-bind="text: lang.lang.total">Total</td>
    	<td style="text-align: center; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalReceived, "c2", banhji.locale)#
    	</td>
    	<td colspan="3"></td>
    </tr>
	<tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
</script>
<script id="cashAdvanceReport" type="text/x-kendo-template">
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
												<p data-bind="text: lang.lang.account" style=""></p>
												<input id="ddlAccount" name="ddlAccount" class="marginBottom"
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
											   style="width: 50%; float: left; margin-right: 8px;" />

											   <p>EMPLOYEES</p>
												<select data-role="multiselect"
													   data-value-primitive="true"
													   data-header-template="employee-header-tmpl"
													   data-item-template="contact-list-tmpl"
													   data-value-field="id"
													   data-text-field="name"
													   data-bind="value: obj.employees,
													   			source: contactDS"
													   data-placeholder="Select Employee.."
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
									<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="">Advance Monitoring Report</h2>
									<p style="font-size: 15px; margin-bottom: 0;" data-bind="text: displayDate"></p>
					            </div>

					            <!-- Block -->
					            <div class="reportBlock" style="width: 97%; margin: 0 auto;">
					            	<div class="row">
					            		<div class="col-md-3">
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="">Number of Employee</p>
												<span style="font-size: 20px; font-weight: 700;" data-format="n0" data-bind="text: dataSource.total()"></span>
											</div>
					            		</div>
					            		<div class="col-md-9" >
					            			<div class="total-sale" style="width: 100%; padding: 10px; background-color: #DDEBF7 !important; -webkit-print-color-adjust: exact; text-align: center; margin-bottom: 15px; display: inline-block; box-shadow: 0 2px 0 #d4d7dc, -1px -1px 0 #eceef1, 1px 0 0 #eceef1;">
												<p style="font-size: 14px;" data-bind="">Total Amount</p>
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
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="">Advance Number</th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.status"></th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="">Advance Amount</th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="">Advance Settlements</th>
												<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.balance"></th>
											</tr>
		                                </thead>
		                                <tbody  data-role="listview"
					            				data-auto-bind="false"
								                data-template="cashAdvanceReport-template"
								                data-bind="source: dataSource" >
								        </tbody>
					            	</table>
					            </div>
					        </div>
			            </div>
                	</div>					
				</span>
			</div>
		</div>
	</div>
</script>
<script id="cashAdvanceReport-template" type="text/x-kendo-template">
	<tr>
		<td colspan="6" style="font-weight: bold; color: black;">#: name #</td>
	</tr>
	# var totalAmount = 0;#
	# var totalSettled = 0;#
	#for(var i = 0; i < line.length; i++){#
		#totalAmount += line[i].amount;#
		<tr>
			<td style="vertical-align: top;">#=kendo.toString(new Date(line[i].issued_date), "dd-MM-yyyy")#</td>
			<td style="vertical-align: top;"><a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a></td>
			<td style="vertical-align: top;">
				#if(line[i].status==1){#
					Settled
				#}else if(line[i].status==2){#
					Partialy Settled
				#}else{#
					Open
				#}#
			</td>
			<td style="text-align: right; vertical-align: top;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
			<td style="text-align: right;">
				<lu>
				# var amountlSettled = 0;#
				#for(var j = 0; j < line[i].references.length; j++){#
					#var ref = line[i].references[j];#
					#amountlSettled += ref.amount;#
					<a href="\#/#=ref.type.toLowerCase()#/#=ref.id#">
					<li>
						#=kendo.toString(new Date(ref.issued_date), "dd-MM-yyyy")#
						#=ref.number#
						#=kendo.toString(ref.amount, "c2", banhji.locale)#
					</li>
					</a>
				#}#
				#totalSettled += amountlSettled;#
				</lu>
			</td>
			<td style="text-align: right; vertical-align: top;">#=kendo.toString(line[i].amount - amountlSettled, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td colspan="3" style="font-weight: bold; color: black;" data-bind="text: lang.lang.total">Total</td>
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalAmount, "c2", banhji.locale)#
    	</td>
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalSettled, "c2", banhji.locale)#
    	</td>
    	<td style="text-align: right; font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalAmount - totalSettled, "c2", banhji.locale)#
    	</td>
    </tr>
	<tr>
    	<td colspan="6">&nbsp;</td>
    </tr>
</script>
<!-- End -->



<script id="account-type-list-tmpl" type="text/x-kendo-tmpl">
	<span>
		#=number#
	</span>
	-
	<span>#=name#</span>
</script>
<script id="accountingCenter-list-tmpl" type="text/x-kendo-tmpl">
	<tr data-bind="click: selectedRow">
		<td>
			<div class="media-body">
				#if(sub_of_id==0){#
					<span >#=number#</span>
					-
					<span >#=name#</span>
				#}else{#
					#if(banhji.cashCenter.checkIsSub(sub_of_id)){#
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span>#=number#</span>
						-
						<span >#=name#</span>
					#}else{#
						&nbsp;&nbsp;
						<span>#=number#</span>
						-
						<span >#=name#</span>
					#}#
				#}#
			</div>
		</td>
	</tr>
</script>
<script id="accountingCenter-transaction-tmpl" type="text/x-kendo-tmpl">
    <tr>
    	<td>#=kendo.toString(new Date(issued_date), "dd-MM-yyyy")#</td>
    	<td>
        	#if(dr==0 && cr==0){#
        		#=type#
        	#}else{#
	        	<a href="\#/#=type.toLowerCase()#/#=transaction_id#"><i></i> #=type#</a>
			#}#
        </td>
        <td>
        	#if(dr==0 && cr==0){#
        		#=number#
        	#}else{#
	        	<a href="\#/#=type.toLowerCase()#/#=transaction_id#"><i></i> #=number#</a>
			#}#
        </td>
        <td>#=description#</td>
    	<td class="right">
    		#=kendo.toString(dr, locale=="km-KH"?"c0":"c", locale)#
    	</td>
    	<td class="right">
    		#=kendo.toString(cr, locale=="km-KH"?"c0":"c", locale)#
    	</td>
    	<td align="center">
			#if(type==="Commercial_Invoice" || type==="Vat_Invoice" || type==="Invoice"){#
				<a href="\#/invoice/#=id#"><i></i> Pay</a>
        	#}#
		</td>
    </tr>
</script>
<script id="supplier-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor">+ Add New Supplier</a></li>
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
<script id="vendor-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/vendor">+ Add New Supplier</a>
    </strong>
</script>
<script id="tax-header-tmpl" type="text/x-kendo-tmpl">
	<strong>
    	<a href="\#/tax">+ Add New Tax</a>
    </strong>
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
<!-- End -->                                                                                                                                                                                                                                                                                                                                                       