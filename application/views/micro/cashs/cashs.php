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
                        	<div id="indexMenu">
                        		<div class="hidden-sm-down" style="position: absolute; right: 20px; top: 20px;">
                        			<div class="btn-group float-right">
						                <button style="font-size: 17px; background: #0F2C72; border-color: #0F2C72;" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bind="text: lang.lang.new_transaction">
						                </button>
						                <div class="dropdown-menu " style="left: -34px !important; ">
						                    <a class="dropdown-item float-md-right" href="<?php echo base_url();?>micro/cashs#/account"><span data-bind="text: lang.lang.account"></span></a>
						                    <a class="dropdown-item float-md-right" href="<?php echo base_url();?>micro/cashs#/cash_transaction"><span data-bind="text: lang.lang.make_cash_transaction"></span></a>						                    
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


<!-- Menu -->
<script id="tapMenu" type="text/x-kendo-template">
	<ul class="nav nav-tabs customtab" role="tablist" >
		<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#/" data-bind="click: goTransactions"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="">Cash Transaction</span></a> </li>
		<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/reports" data-bind="click: goReports"><span class="hidden-sm-up"><i class="ti-layout-grid2-thumb"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.cash_report">Reports</span></a> </li>	    
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/cashs" data-bind="click: goMenuCashs"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="text: lang.lang.cash_center">Cash Center</span></a> </li>
    </ul>
</script>
<!-- End -->

<!-- Menu -->
<script id="reports" type="text/x-kendo-template">	
	<div class="row home" id="reports" >
    	<div class="col-md-4">
			<div class="saleOverview" data-bind="click: loadCashIn" style="margin-bottom: 15px; background: #0F2C72; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
				<h2 style="color: #fff;" data-bind="text: lang.lang.cash_in">Cash In</h2>
				<p style="margin-bottom: 0; color: #fff" data-format="n0" data-bind="text: obj.cash_in"></p>
			</div>
			<!-- <div class="report" >
				<div class="col-md-12">
					<h3 style="border-bottom: none; padding-bottom: 0;"><a href="#/cash_movement" data-bind="text: lang.lang.cash_movement" ></a></h3>
				</div>
			</div> -->
		</div>
		<div class="col-md-4">
			<div class="saleOverview" data-bind="click: loadCashOut" style="margin-bottom: 15px; background: #FCCB23; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
				<h2 data-bind="text: lang.lang.cash_out">Cash Out</h2>
				<p style="margin-bottom: 0;" data-format="n0" data-bind="text: obj.cash_out"></p>
			</div>
			<!-- <div class="report" >
				<div class="col-md-12">
					<h3 style="border-bottom: none; padding-bottom: 0;"><a href="#/cash_movement" data-bind="text: lang.lang.cash_movement" ></a></h3>
				</div>
			</div> -->									                        
		</div>
		<div class="col-md-4">
			<div class="saleOverview" data-bind="click: loadCashBalance" style="margin-bottom: 15px; background: #C8070E; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
				<h2 style="color: #fff;" data-bind="text: lang.lang.cash_balance">Cash Balance</h2>
				<p style="margin-bottom: 0; color: #fff" data-format="n0" data-bind="text: obj.cash_balance"></p>
			</div>
			<!-- <div class="report" >
				<div class="col-md-12">
					<h3 style="border-bottom: none; padding-bottom: 0;"><a href="#/cash_movement" data-bind="text: lang.lang.cash_movement" ></a></h3>
				</div>
			</div> -->
			<!-- <div class="saleOverview" style="margin-bottom: 15px;">
				<div class="col">
					<h2 data-bind="">Cash Balance</h2>
					<p data-format="n0" data-bind="">100000.000</p>
				</div>
				<div class="col btn-group float-right">
	                <button style="width: 100%;" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bind="text: lang.lang.reports">
	                </button>
	                <div class="dropdown-menu">
	                    <a class="dropdown-item" href="#/cash_movement" data-bind="text: lang.lang.cash_movement"></a>
	                    <a class="dropdown-item" href="#/collection_report" data-bind="text: lang.lang.cash_collection_report"></a>
	                    <a class="dropdown-item" href="#/bill_payment_list" data-bind="text: lang.lang.bill_payment_report"></a>
	                </div>
	            </div>
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
		           placeholder="From ..." >

		    <input data-role="datepicker" 
		    	   class="edate marginRight marginBottom float-left"
		    	   data-format="dd-MM-yyyy"
		           data-bind="value: edate,
		                      min: sdate"
		           placeholder="To ..." >

		  	<button style="background: #009efb; color: #fff;" class="btnSearch float-left" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
		</div>
		<!-- <div class="col-md-4">
            <div class="btn-group float-right">
            	<a style="font-size: 17px; padding: 5px 70px;" class="btn waves-effect waves-light btn-block btn-info btnAddCustomer" href="cashs#/cash_transaction"><span data-bind="text: lang.lang.cash_transactions">Cash​ Transaction</span></a>
                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                	Add New Transaction
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="cashs#/cash_transaction"><span data-bind="">Cash​ Transaction</span></a>
                    <a class="dropdown-item" href="cashs#/cash_advance"><span data-bind="">Cash Advance</span></a>
                    <a class="dropdown-item" href="cashs#/Expense"><span data-bind="">Expense</span></a>
                </div>
            </div>
        </div> -->
       
	</div>

	<div class="row">
	 	<div class="col-md-12 marginTop table-responsive grid">
	 		<div class="table color-table dark-table" 
	 			 data-role="grid"
	 			 data-pageable="true"
                 data-columns="[
                    { 
                    	field: 'issued_date', 
                    	title: langVM.lang.date,
                    	template: '#=kendo.toString(new Date(issued_date), banhji.dateFormat)#',
                    	attributes: {
					      	style: 'text-align: center;',
					      	class: 'hidden-sm-down'
					    },
					    headerAttributes: {
					    	class: 'hidden-sm-down'
					    }
                    },
                    { 
                    	field: 'number', 
                    	title: langVM.lang.number,
                    	attributes: {
					      	style: 'text-align: center;',
					      	class: 'hidden-sm-down'
					    },
					    headerAttributes: {
					    	class: 'hidden-sm-down'
					    }
                    },
                    { 
                    	field: 'type', 
                    	title: langVM.lang.type,
                    	attributes: {
                    		class: 'hidden-sm-down'
                    	},
                    	headerAttributes: {
                    		class: 'hidden-sm-down'
                    	}
                    },
                    { 
                    	field: 'contact', 
                    	title: langVM.lang.name,
                    	attributes: {
                    		class: 'width_33'
                    	},
                    	headerAttributes: {
                    		class: 'width_33'
                    	}
                    },
                    { 
                    	field: 'memo', 
                    	title: langVM.lang.description,
                    	attributes: {
                    		class: 'hidden-sm-down'
                    	},
                    	headerAttributes: {
                    		class: 'hidden-sm-down'
                    	}
                    },
                    { 
                    	field: 'account_name', 
                    	title: langVM.lang.account, 
                    	attributes: { 
                    		style: 'text-align: center;',
                    		class: 'width_33'
                    	},
                    	headerAttributes: {
                    		class: 'width_33'
                    	}
                    },			                                
                    { 
                    	field: 'amount', 
                    	title: langVM.lang.amount,
                    	format: '{0:n}',
                    	attributes: {
                    		style: 'text-align: right',
                    		class: 'width_33'
					    },
					    headerAttributes: {
					    	class: 'width_33'
					    }
                    }
                 ]"
                 data-auto-bind="false"
                 data-bind="source: dataSource"></div>
        </div>
    </div>
	            
</script>
<script id="transactions" type="text/x-kendo-template">	
	<div class="row" id="example">
		<div class="col-12 col-md-4" id="checkOut">
			<div class="listWrapper">
				<div id="cashTransactionsMenu"></div>				
			</div>
        </div>
        <div class="col-12 col-md-8" id="checkOut">
        	<div class="listWrapper">
				<div id="cashTransactionContent"></div>
			</div>
        </div>
	</div>
</script>
<style >
	
</style>
<script id="cashTransactionsMenu" type="text/x-kendo-template">
	<div class="row marginBottom">
		<div class="col">
			<a href="#/cash_receipt" id="m1" class="l-m-active" data-bind="click: goMenuCashReceipt" style="text-align: center;  width: 100%; float: left; border: 1px solid #d5d5d5; padding: 5px; cursor: pointer;">
				<i style="font-size: 28px; margin-bottom: 10px;" class="fas fa-qrcode"></i><br/>
				<span data-bind="text: lang.lang.cash_receipt"></span>
			</a>
		</div>
		<div class="col">
			<a href="#/cash_payment" id="m2" data-bind="click: goMenuCashPayment" style=" text-align: center;  width: 100%; float: left; border: 1px solid #d5d5d5; padding: 5px; cursor: pointer;">
				<i style="font-size: 28px; margin-bottom: 10px;" class="fas fa-money-check-alt"></i><br/>
				<span data-bind="text: lang.lang.cash_payment"></span>
			</a>
		</div>
	</div>

	<div class="row marginBottom">
		<div class="col">
			<a href="#/cash_withdrawal" id="m3" data-bind="click: goMenuCashWithdrawal" style="text-align: center;  width: 100%; float: left; border: 1px solid #d5d5d5; padding: 5px; cursor: pointer;">
				<i style="font-size: 28px; margin-bottom: 10px;" class="fas fa-sign-out-alt"></i><br/>
				<span data-bind="text: lang.lang.cash_withdrawal"></span>
			</a>
		</div>
		<div class="col">
			<a href="#/cash_deposit" id="m4" data-bind="click: goMenuCashDeposit" style="text-align: center;  width: 100%; float: left; border: 1px solid #d5d5d5; padding: 5px; cursor: pointer;">
				<i style="font-size: 28px; margin-bottom: 10px;" class="fas fa-sign-in-alt"></i><br/>
				<span data-bind="text: lang.lang.cash_deposit"></span>
			</a>
		</div>
	</div>

	<div class="row marginBottom">
		<div class="col">
			<a href="#/cash_transfer" id="m5" data-bind="click: goMenuCashTransfer" style="text-align: center;  width: 100%; float: left; border: 1px solid #d5d5d5; padding: 5px; cursor: pointer;">
				<i style="font-size: 28px; margin-bottom: 10px;" class="fas fa-exchange-alt"></i><br/>
				<span data-bind="text: lang.lang.cash_transfer"></span>
			</a>
		</div>
		<div class="col">
			<a href="#/payment_refund" id="m6" data-bind="click: goMenuPaymentRefund" style="text-align: center;  width: 100%; float: left; border: 1px solid #d5d5d5; padding: 5px; cursor: pointer;">
				<i style="font-size: 28px; margin-bottom: 10px;" class="fas fa-cart-plus"></i><br/>
				<span data-bind="text: lang.lang.payment_refund"></span>
			</a>
		</div>
	</div>

	<div class="row marginBottom">
		<div class="col">
			<a href="#/cash_refund" id="m7" data-bind="click: goMenuCashRefund" style="text-align: center;  width: 100%; float: left; border: 1px solid #d5d5d5; padding: 5px; cursor: pointer;">
				<i style="font-size: 28px; margin-bottom: 10px;" class="fas fa-cart-arrow-down"></i><br/>
				<span data-bind="text: lang.lang.cash_refund"></span>
			</a>
		</div>
		<div class="col">
			<a href="#/customer_deposit" id="m8" data-bind="click: goMenuCustomerDeposit" style="text-align: center;  width: 100%; float: left; border: 1px solid #d5d5d5; padding: 5px; cursor: pointer;">
				<i style="font-size: 28px; margin-bottom: 10px;" class="fas fa-tag"></i><br/>
				<span data-bind="text: lang.lang.customer_deposit"></span>
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<a href="#/vendor_deposit" id="m9" data-bind="click: goMenuVendorDeposit" style="text-align: center;  width: 100%; float: left; border: 1px solid #d5d5d5; padding: 5px; cursor: pointer;">
				<i style="font-size: 28px; margin-bottom: 10px;" class="fas fa-tags"></i><br/>
				<span data-bind="text: lang.lang.vendor_deposit"></span>
			</a>
		</div>
		<div class="col">
			<a href="#/cash_expense" id="m10" data-bind="click: goMenuCashTransactionExpense" style="text-align: center;  width: 100%; float: left; border: 1px solid #d5d5d5; padding: 5px; cursor: pointer;">
				<i style="font-size: 28px; margin-bottom: 10px;" class="fas fa-receipt"></i><br/>
				<span data-bind="text: lang.lang.c_expense"></span>
			</a>
		</div>
	</div>
</script>

<script id="cashReceipt" type="text/x-kendo-template">
	<div class="row" id="example">
		<div class="col-md-12">
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

<script id="cashPayment" type="text/x-kendo-template">
	<div class="row" id="example">
		<div class="col-md-12">
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

<script id="cashWithdrawal" type="text/x-kendo-template">
	<div class="row" id="example">
		<div class="col-md-12">
			<h1>Coming Soon Cash Withdrawal</h1>
		</div>
	</div>
</script>
<script id="cashDeposit" type="text/x-kendo-template">	
	<div class="row" id="example">
		<div class="col-md-12">
			<h1>Coming Soon Cash Deposit</h1>
		</div>
	</div>
</script>
<script id="cashTransfer" type="text/x-kendo-template">	
	<div class="row" id="example">
		<div class="col-md-12">
			<h1>Coming Soon Cash Transfer</h1>
		</div>
	</div>
</script>


<script id="paymentRefund" type="text/x-kendo-template">
	<div class="row" id="example">
		<div class="col-md-12">
			<h2 data-bind="text: lang.lang.payment_refund">Payment Refund</h2>

			<div class="row">
				<div class="col-md-5">
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
				<div class="col-md-7">
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


<script id="cashRefund" type="text/x-kendo-template">
	<div class="row" id="example">
		<div class="col-md-12">
			<h2 data-bind="text: lang.lang.cash_refund"></h2>				    

			<!-- Upper Part -->
			<div class="row">
				<div class="col-md-5">
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

				<div class="col-md-7">
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


<script id="customerDeposit" type="text/x-kendo-template">
	<div class="row" id="example">
		<div class="col-md-12">
			<h1>Coming Soon Customer Deposit</h1>
		</div>
	</div>
</script>
<script id="vendorDeposit" type="text/x-kendo-template">
	<div class="row" id="example">
		<div class="col-md-12">
			<h1>Coming Soon Vendor Deposit</h1>
		</div>
	</div>
</script>
<script id="cashTransactionExpense" type="text/x-kendo-template">
	<div class="row" id="example">
		<div class="col-md-12">
			<h1>Coming Soon Expense</h1>
		</div>
	</div>
</script>


<script id="generalLedger-template" type="text/x-kendo-tmpl">
	<tr>
		<td colspan="7" style="font-weight: bold;">#: name #</td>
    	<td class="right strong" style="color: black;">
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
		<td class="right" style="color: black;">
			#=kendo.toString(line[i].dr, "n2")#
		</td>
		<td class="right" style="color: black;">
			#=kendo.toString(line[i].cr, "n2")#
		</td>
		<td class="right" style="color: black;">
			#=kendo.toString(balance, "n2")#
		</td>
    </tr>
    #}#
    #if(line.length>0){#
    <tr>
    	<td colspan="5" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total" style="text-transform: capitalize;"></span><span>#: name #</span></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalDr, "n2")#
    	</td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalCr, "n2")#
    	</td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
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
        <td align="right">
           <h3 data-format="n2" data-bind="text: totalDr()"></h3>
        </td>
        <td align="right">
            <h3 data-format="n2" data-bind="text: totalCr()"></h3>
        </td>
        <td></td>
    </tr>
</script>
<script id="generalLedgerBySegment" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background ">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
		    		<span class="glyphicons no-js remove_2 pull-right"
							onclick="javascript: window.history.back()"><i></i></span>
					<br>
					<br>

					<!-- Search Taps -->
					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i>Date</a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i>Filters</a></li>
									</ul>
								</div>
								<!-- // Tabs Heading END -->
								<div class="widget-body">
									<div class="tab-content">
										<!-- Date -->
										<div class="tab-pane active" id="tab-1">
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

										  	<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
									    </div>
									    <!-- Filter -->
								        <div class="tab-pane" id="tab-2">
											<table class="table table-condensed">
												<tr>
									            	<td style="padding: 8px 0 0 0 !important; ">
														<span data-bind="text: lang.lang.segment"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.segments,
															   			source: segmentDS"
															   data-placeholder="Select Segments.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="loadImport" style="display:none;text-align: center;top:30px;position: absolute;width: 82%; height: 99.5%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
						<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 35%;left: 45%"></i>
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2>GENERAL LEDGER WITH SEGMENT</h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid journal_block">
							<div class="span4" style="width: 50%;">
								<p>No. of Account</p>
								<span data-format="n" data-bind="text: dataSource.total"></span>
							</div>
							<div class="span4" style="width: 50%;">
								<p>Total Balance</p>
								<span data-bind="text: totalBalance"></span>
							</div>
						</div>

						<table class="table table-borderless table-condensed">
							<thead>
								<tr>
									<th><span data-bind="text: lang.lang.type"></span></th>
									<th style="width: 10%;"><span data-bind="text: lang.lang.date"></span></th>
									<th style="width: 15%;"><span data-bind="text: lang.lang.transaction_number"></span></th>
									<th><span data-bind="text: lang.lang.description"></span></th>
									<th><span data-bind="text: lang.lang.name"></span></th>
									<th><span data-bind="text: lang.lang.segments"></span></th>
									<th class="right"><span data-bind="text: lang.lang.amount"></span></th>
									<th class="right"><span data-bind="text: lang.lang.balance"></span></th>
								</tr>
							</thead>
							<tbody data-role="listview"
					        		data-auto-bind="false"
					        		data-template="generalLedgerBySegment-template"
					        		data-bind="source: dataSource">
					        </tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="generalLedgerBySegment-template" type="text/x-kendo-tmpl">
	<tr>
		<td colspan="7" style="font-weight: bold;">#: name #</td>
    	<td class="right strong" style="color: black;">
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
			<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#"><i></i> #=line[i].number#</a>
		</td>
		<td style="color: black;">
			#=line[i].memo#
		</td>
		<td style="color: black;">
			#=line[i].name#
		</td>
		<td style="color: black;">
			#for(var j=0; j<line[i].segments.length; j++){#
				#if(j>0){#
					:
				#}#
				#=line[i].segments[j].code# #=line[i].segments[j].name#
			#}#
		</td>
		<td class="right" style="color: black;">
			#=kendo.toString(line[i].amount, "c2", banhji.locale)#
		</td>
		<td class="right" style="color: black;">
			#=kendo.toString(balance, "c2", banhji.locale)#
		</td>
    </tr>
    #}#
    <tr>
    	<td colspan="7" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total" style="text-transform: capitalize;"></span><span>#: name #</span></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(balance, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="8">&nbsp;</td>
    </tr>
</script>
<script id="cashCenter" type="text/x-kendo-template">
	<div class="row" id="customers">
		<div class="col-md-3">
			<div class="listWrapper">
				<div class="innerAll">
					<form autocomplete="off" class="form-inline">
						<div class="widget-search">
							<div class="overflow-hidden">
								<input style="padding: 6px;" type="search" placeholder="Account ..." data-bind="value: searchText">
							</div>
							<button style="background: #009efb; color: #fff;" type="button" class="btn btn-default pull-right " data-bind="click: search"><i class="ti-search"></i></button>
							
							<!-- <div class="col-md-2">
								<ul class="topnav" style="padding: 0 !important; background: #e8e8e8; height: 34px;">
								  	<li role='presentation' class='dropdown' style="list-style: none; padding: 0 0 0 3px;">
								  		<a class='dropdown-toggle glyphicons cogwheel' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i></i> </a>
							  			<ul class='dropdown-menu' style="width: 190px !important; border-radius: 0; left: -159px !important; top: 34px !important; margin-left: 4px;">
							  				<li><a><span data-bind="click: showActive">Show Active Account</span></a></li>
							  				<li><a><span data-bind="click: showInactive">Show Inactive Account</span></a></li>

							  			</ul>
								  	</li>
								</ul>
							</div> -->
						</div>
						<!-- <div class="select2-container">
							<input data-role="dropdownlist"
				                   data-option-label="Account Type..."
				                   data-template="account-type-list-tmpl"
				                   data-value-primitive="true"
				                   data-text-field="name"
				                   data-value-field="id"
				                   data-bind="value: account_type_id,
				                              source: accountTypeDS"
				                   style="width: 100%" />
						</div> -->
					</form>
				</div>

				<span class="results"><span data-bind="text: dataSource.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>

				<div class="table table-condensed"
					 data-role="grid"
					 data-auto-bind="false"
					 data-bind="source: dataSource"
					 data-row-template="accountingCenter-list-tmpl"
					 data-columns="[{title: ''}]"
					 data-selectable="true"
					 data-height="600"
					 data-scrollable="{virtual: true}"></div>
		</div>
		</div>
		<div class="col-md-9">
			<div class="detailsWrapper">
				<div class="row">
					<div class="col-md-6 marginBottom">
						<input class="customerName" type="text" name="" data-bind="value: obj.name" disabled="disabled" style="background: #fff;" />
						<a style="margin-bottom: 15px;" class="btn waves-effect waves-light btn-block btn-info btnViewEditCustomer" data-bind="click: goEdit"><i style="color: #fff;" class="ti-pencil-alt marginRight"></i><span style="color: #fff;" data-bind="text: lang.lang.edit"></span></a>
						<div class="saleOverview" style="margin-bottom: 8px; padding: 15px 0; background: #0F2C72; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
                            <p data-bind="click: loadTransaction">
                            	<span data-format="n" data-bind="text: lang.lang.balance_as_of_today"></span><br/>
								<span data-bind="text: balance"></span>
                            </p>
                            <!-- <div class="col-md-12">
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
                            </div> -->
                        </div>
						<!-- <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#customerInformation" role="tab" aria-selected="false"><span><i class="icon-info"></i></span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customerAttachment" role="tab" aria-selected="false"><span><i class="icon-paper-clip"></i></span></a> </li>
                        </ul>
                        <div class="tab-content tabcontent-border">
                           
                            <div class="tab-pane active" id="customerInformation" role="tabpanel">
                            	<div class="p-10">
                            		<div class="row">
                            			<div class="col-md-12">
	                                    	<div class="accounCetner-textedit">
												<table width="100%">
													<tr>
														<td width="40%"><span data-bind="text: lang.lang.account_number"></span>:</td>
														<td width="60%">
															<span data-bind="text: obj.number"></span>
														</td>
													</tr>
													<tr>
														<td><span data-bind="text: lang.lang.account_title"></span>:</td>
														<td>
															<span data-bind="text: obj.name"></span>
														</td>
													</tr>
													<tr>
														<td><span data-bind="text: lang.lang.sub_account"></span>:</td>
														<td>
															<span data-bind="text: subName"></span>
														</td>
													</tr>
													<tr>
														<td><span data-bind="text: lang.lang.account_type"></span>:</td>
														<td>
															<span data-bind="text: typeName"></span>
														</td>
													</tr>
													<tr>
														<td><span data-bind="text: lang.lang.description"></span>:</td>
														<td>
															<span data-bind="text: obj.description"></span>
														</td>
													</tr>
													<tr>
														<td><span data-bind="text: lang.lang.taxable"></span>:</td>
														<td>
															<input type="checkbox" id="chbTaxable" class="k-checkbox" data-bind="checked: obj.is_taxable">
					          								<label class="k-checkbox-label" for="chbTaxable"></label>
														</td>
													</tr>
												</table>

												<a class="btn waves-effect waves-light btn-block btn-info btnViewEditCustomer" data-bind="click: goEdit"><i class="ti-pencil-alt marginRight"></i><span data-bind="text: lang.lang.edit"></span></a>
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
                           
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
                        </div> -->
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<!-- <div class="blockBalance" data-bind="click: loadBalance" style="background: #FFCA00; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important; height: 95px; ">
									<div class="coverIcon"><i class="ti-server"></i></div>
									<div class="txt">
										<span style="color: #333;" data-bind="text: lang.lang.cash_in"></span>
										<span data-bind="text: obj.cash_in"></span>
									</div>
								</div> -->
								<div class="saleOverview" data-bind="click: loadCashIn" style="margin-bottom: 8px; padding: 15px 0; background: #FFCA00; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
		                            <p >
		                            	<span data-format="n" data-bind="text: lang.lang.cash_in"></span><br/>
										<span data-bind="text: obj.cash_in"></span>
		                            </p>
		                            <!-- <div class="col-md-12">
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
		                            </div> -->
		                        </div>
							</div>
							<!-- <div class="col-md-6">
								<div class="blockDeposit" data-bind="click: loadDeposit" style="background: #424242; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
									<div class="coverIcon"><i class=" ti-briefcase"></i></div>
									<div class="txt" style="width: 70%;">
										<span data-bind="text: lang.lang.deposit"></span>
										<span style="font-size: 15px;" data-bind="text: deposit" ></span>
									</div>
								</div>
							</div> -->
						</div>
						<div class="row">
							<!-- <div class="col-md-6">
								<div class="blockOpenInvoice" data-bind="click: loadBalance" style="background: #FAD5BB; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
									<div class="coverIcon"><i class="icon-info"></i></div>
									<div class="txt">
										<span style="font-size: 25px; color: #333;" data-bind="text: outInvoice"></span>
										<span style="color: #333;" data-bind="text: lang.lang.open_invoice"></span>
									</div>
								</div>
							</div> -->
							<div class="col-md-12">
								<!-- <div class="blockOverDue" data-bind="click: loadOverInvoice" style="background: #CE1C00; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important; height: 95px; ">
									<div class="coverIcon"><i class="ti-alarm-clock"></i></div>
									<div class="txt" >
										<span style="font-size: 25px;" data-bind="text: lang.lang.cash_out"></span>
										<span data-bind="text: obj.cash_out"></span>
									</div>
								</div> -->
								<div class="saleOverview" data-bind="click: loadCashOut" style="margin-bottom: 8px; padding: 15px 0; background: #CE1C00; box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
		                            <p >
		                            	<span data-format="n" data-bind="text: lang.lang.cash_out"></span><br/>
										<span data-bind="text: obj.cash_out"></span>
		                            </p>
		                            <!-- <div class="col-md-12">
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
		                            </div> -->
		                        </div>
							</div>
						</div>



                    	<!-- <p><span data-bind="text: lang.lang.file_type"></span> [PDF, JPG, JPEG, TIFF, PNG, GIF]</p>
			            <input id="files" name="files" 
		                   type="file"
		                   data-role="upload"
		                   data-show-file-list="false"
		                   data-bind="events: {
                   				select: onSelect
		                   }">
		                <div class="table-responsive">
			                <table class="table color-table dark-table" style="border-bottom: 3px solid #1F4774;">
						        <thead>
						            <tr>
						                <th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; " data-bind="text: lang.lang.file_name"></th>
						                <th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; " data-bind="text: lang.lang.description"></th>
						                <th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; " data-bind="text: lang.lang.date"></th>
						                <th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; " data-bind="text: lang.lang.action"></th>
						            </tr>
						        </thead>
						        <tbody data-role="listview"
						        		data-template="attachment-list-tmpl"
						        		data-auto-bind="false"
						        		data-bind="source: attachmentDS"></tbody>
						    </table>
						</div>
					    <div id="pager" class="k-pager-wrap" style="margin-bottom: 15px;"
					    	 data-role="pager"
					    	 data-auto-bind="false"
				             data-bind="source: attachmentDS"></div>

					    <a href="" style="margin-bottom: 15px;" class="btn waves-effect waves-light btn-block btn-info btnAddAttachment col-md-3" data-bind="click: uploadFile" ><i class="ti-check marginRight"></i><span data-bind="text: lang.lang.save"></span></a> -->
						<!-- <div class="saleOverview" style="margin-bottom: 8px;">
                            <p data-bind="click: loadTransaction">
                            	<span data-format="n" data-bind="text: lang.lang.balance_as_of_today"></span><br/>
								<span data-bind="text: balance"></span>
                            </p> -->
                            <!-- <div class="col-md-12">
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
                            </div> -->
                       <!--  </div> -->
		                   
	                    
                    	<!-- <div class="row">
							<div class="col-md-6">
								<div class="blockOpenInvoice" >
									<div class="coverIcon"><i class="icon-info"></i></div>
									<div class="txt">
										<span data-bind="text: nature"></span>
										<span data-bind="text: lang.lang.nature_balance"></span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="blockOverDue" >
									<div class="coverIcon"><i class="ti-alarm-clock"></i></div>
									<div class="txt" >
										<span data-bind="text: totalTxn"></span>
										<span data-bind="text: lang.lang.transaction"></span>
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

					  	<button style="background: #009efb; color: #fff;" class="btnSearch" type="button" class="marginBottom" data-role="button" data-bind="click: searchTransaction"><i class="ti-search"></i></button>
					</div>
				</div>
				<!-- End -->

				<!-- Block Table -->
				<div class="row">
					<div class="col-md-12 table-responsive">
						<table class="table color-table dark-table" style="border-bottom: 3px solid #1F4774;">
					        <thead>
					            <tr>
					                <th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; " data-bind="text: lang.lang.date"></th>
									<th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; " data-bind="text: lang.lang.type"></th>
									<th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; " data-bind="text: lang.lang.reference_no"></th>
									<th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; " data-bind="text: lang.lang.description"></th>
									<th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; " data-bind="text: lang.lang.dr"></th>
									<th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; " data-bind="text: lang.lang.cr"></th>
									<th style="border-top: 2px solid #1F4774; border-bottom: 3px solid #1F4774; background-color: #fff !important; color: #333 !important; "></th>
					            </tr>
					        </thead>
					        <tbody data-role="listview"
		            				data-auto-bind="false"
					                data-template="accountingCenter-transaction-tmpl"
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


<!-- Function -->
<script id="cashTransaction" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15">
                <div class="col-md-12">
                	<div id="example">
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
										                   data-value-field="id"
										                   data-bind="value: obj.type,
										                              source: types,
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
                	<div id="example">
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
										                   data-value-field="id"
										                   data-bind="value: obj.type,
										                              source: types,
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
	</div>
</script>
<script id="journal-add-segment-template" type="text/x-kendo-template">
	<i class="icon-plus icon-white" data-bind="click: openWindow"></i>
	#for(var i=0; i < segments.length; i++){#
		#=segments[i].code# #=segments[i].name#,
	#}#
</script>
<script id="currencyRate" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div class="row marginTop15">
                <div class="col-md-12">
                	<div class="card">
                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
                		<div class="card-body">

							<h2 data-bind="text: lang.lang.exchange_rate" style="margin-bottom: 15px;"></h2>
							<!-- Collapsible Widget -->
							<div class="widget" style="border: 0; margin-bottom: 0;">
							    <div class="widget-body">

							    	<div class="row-">
								    	<div class="col-md-6 alert alert-primary" style="background: #343a40; color: #fff;"><span data-bind="text: lang.lang.company_currency"></span> <span data-bind="text: baseCode"></span> </div>
								    	<div class="col-md-6 alert alert-primary" style="background: #343a40; color: #fff;"><span data-bind="text: lang.lang.reporting_currency"></span> <span data-bind="text: reportCode"></span> </div>
							    	</div>

									<br>

									<button style="background: #009efb; color: #fff;" class="btn btn-inverse hidden-print marginBottom" data-bind="click: openWindow"><i class="icon-plus icon-white"></i> <span data-bind="text: lang.lang.add_new_rate"></span></button>

									<!-- Item List -->
									<div class="table-responsive">
										<table class="table color-table dark-table">
									        <thead>
									            <tr>
									                <th style="width: 15%; vertical-align: top;"><span data-bind="text: lang.lang.date"></span></th>
									                <th style="width: 10%; vertical-align: top;"><span data-bind="text: lang.lang.code"></span></th>
									                <th style="width: 25%; vertical-align: top;"><span data-bind="text: lang.lang.country"></span></th>
									                <th style="width: 10%; vertical-align: top;"><span data-bind="text: lang.lang.rate"></span></th>
									                <th style="width: 15%; vertical-align: top;"><span data-bind="text: lang.lang.source"></span></th>
									                <th style="width: 15%; vertical-align: top;"><span data-bind="text: lang.lang.method"></span></th>
									                <th style="width: 10%; vertical-align: top;"></th>
									            </tr>
									        </thead>
									        <tbody data-role="listview"
									        		data-template="currencyRate-template"
									        		data-bind="source: dataSource"></tbody>
									    </table>

							            <div data-role="pager"
								            data-bind="source: dataSource"></div>
								    </div>

								    <!-- Window -->
								    <div data-role="window"
							                 data-title="Exchange Rate"
							                 data-width="350"
							                 data-height="250"
							                 data-actions="{}"
							                 data-position="{top: '30%', left: '37%'}"
							                 data-bind="visible: windowVisible">

								    	<table class="table table-borderless table-condensed cart_total" >
											<tr>
												<td>
											    	<input data-role="dropdownlist"
										                   data-option-label="Select Currency"
										                   data-value-primitive="true"
										                   data-text-field="code"
										                   data-value-field="id"
										                   data-template="currency-list-tmpl"
										                   data-bind="value: obj.currency_id,
										                              source: currencyAllDS"
										                   style="width: 100%" />
									            </td>
							            	</tr>
							            	<tr>
												<td>
									                <input id="date" name="date"
									            		data-role="datepicker"
							        					data-bind="value: obj.date" CASH ADVANCE
							        					data-format="dd-MM-yyyy"
							        					data-parse-formats="yyyy-MM-dd"
							        					placeholder="dd-MM-yyyy"
							        					required data-required-msg="required"
							        					style="width: 100%" />
							        			</td>
							            	</tr>
							            	<tr>
												<td>
							        				<input type="number" class="k-textbox"
							        				   min="0"
									                   data-bind="value: obj.rate"
									                   placeholder="Rate(per 1 unit of base currency) ..."
									                   style="width: 100%" />
									            </td>
							            	</tr>
						                </table>

						                <p>
						                	<span data-bind="text: lang.lang.note_the_exchange_rate_here"></span>
						                </p>

							            <div align="center">
											<span class="btn btn-success btn-icon glyphicons ok_2" data-bind="click: save"><i></i><span data-bind="text: lang.lang.save"></span></span>
											<span class="btn btn-danger btn-icon glyphicons remove_2" data-bind="click: closeWindow"><i></i><span data-bind="text: lang.lang.close"></span></span>
										</div>

									</div>


								</div> <!-- End Widget-Body List -->
							</div>
							<!-- // Collapsible Widget END -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="currencyRate-template" type="text/x-kendo-tmpl">
	<tr>
		<td>#=kendo.toString(new Date(date), "dd-MM-yyyy")#</td>
		<td>#=banhji.currencyRate.getCode(currency_id)#</td>
		<td>#=banhji.currencyRate.getCountry(currency_id)#</td>
		<td align="right">#=rate#</td>
		<td>#=source#</td>
		<td>#=method#</td>
		<td style="text-align: center;">
			<span class="k-button btn-info" data-bind="click: edit" style="cursor: pointer;"><i class="icon-edit"></i> <span data-bind="text: lang.lang.edit"></span></span>
		</td>
    </tr>
</script>
<!-- End -->



<script id="account" type="text/x-kendo-template">
	<div class="page-wrapper ">
        <div class="container-fluid">
        	<div id="example">
	        	<div class="row marginTop15">
	                <div class="col-md-12">
	                	<div class="card">
	                		<div class="btn-close" onclick="javascript:window.history.back()"><i class="ti-close"></i></div>
	                		<div class="card-body">

							    <h2 data-bind="text: lang.lang.cash_account"></h2>
							    <div class="row">
							    	<div class="col-md-6">
										<!-- Group -->
										<div class="control-group">
											<label for="txtName"><span data-bind="text: lang.lang.account_name"></span><span style="color:red">*</span></label>
											<input id="txtName" name="txtName"
													class="k-textbox"
													data-bind="value: obj.name"
													required data-required-msg="required" style="width: 100%;">
										</div>
										<!-- // Group END -->
									</div>
							    	<div class="col-md-6" style="padding: 0 5px 0 15px;width: 46%;">
										<!-- Group -->
										<div class="control-group">
											<label for="txtNumber"><span data-bind="text: lang.lang.account_code"></span><span style="color:red">*</span></label>
											<input id="txtNumber" name="txtNumber"
													class="k-textbox"
													data-bind="value: obj.number,
																events:{change: checkExistingNumber}"
													required data-required-msg="required" style="width: 100%;">
										</div>
										<!-- // Group END -->
									</div>
									<div class="col-md-1" style="padding-left: 0;width: 25px;float: left;">
										<a class="glyphicons no-js qrcode" data-bind="click: generateNumber" title="Generate Number" style="float: left; margin: 26px 0 0 0 ;"><i></i></a>
									</div>
							    </div>

							    <div class="row">
							    	<div class="col-md-6">
										<!-- Group -->
										<div class="control-group">
											<label for="ddlSubOf"><span data-bind="text: lang.lang.sub_account"></span></label>
											<input id="ddlSubOf" name="ddlSubOf"
												   data-role="dropdownlist"
												   data-template="account-list-tmpl"
								                   data-value-primitive="true"
								                   data-auto-bind="false"
								                   data-cascade-from="ddlType"
												   data-cascade-from-field="account_type_id"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.sub_of_id,
								                              source: subAccountDS"
								                   data-option-label="Select Sub Account..."
								                   style="width: 100%;" />
										</div>
										<!-- // Group END -->
									</div>
							    	<div class="col-md-6">
										<!-- Group -->
										<div class="control-group">
											<label for="txtNonLocalName"><span data-bind="text: lang.lang.non_local_name"></span></label>
											<input id="txtNonLocalName" name="txtNonLocalName"
													class="k-textbox"
													data-bind="value: obj.name_2"
													style="width: 100%;">
										</div>
										<!-- // Group END -->
									</div>
							    </div>

							    <br>

							    <div class="row">
									<div class="col-md-3">
										<!-- Group -->
										<div class="control-group">
											<label for="ddlStatus"><span data-bind="text: lang.lang.status"></span><span style="color:red">*</span></label>
											<input id="ddlStatus" name="ddlStatus"
												   data-role="dropdownlist"
								                   data-value-primitive="true"
								                   data-text-field="name"
								                   data-value-field="id"
								                   data-bind="value: obj.status,
								                   			  disabled: obj.is_system,
								                              source: statusList"
								                   data-option-label="Select Status..."
								                   required data-required-msg="required" style="width: 100%;" />
										</div>
										<!-- // Group END -->
									</div>
									<div class="col-md-3">
										<!-- Group -->
										<div class="control-group">
											<label><input type="checkbox" data-bind="checked: obj.is_taxable" /> <span data-bind="text: lang.lang.taxable"></span></label>
										</div>
										<!-- // Group END -->
									</div>
							    	<div class="col-md-6">
										<!-- Group -->
										<div class="control-group">
											<label for="txtDescription"><span data-bind="text: lang.lang.description"></span></label>
											<input id="txtDescription" name="txtDescription"
													class="k-textbox"
													data-bind="value: obj.description"
													style="height: 50px; width: 100%;">
										</div>
										<!-- // Group END -->
									</div>
							    </div>


							    <div class="row" data-bind="visible: showBank">
							    	<div class="well" style="margin-left: 15px; width: 92%; float: left; margin-top: 15px;">
								    	<div class="col-md-6">
											<!-- Group -->
											<div class="control-group">
												<label for="txtBankName"><span data-bind="text: lang.lang.bank_name"></span></label>
												<input id="txtBankName" name="txtBankName"
														class="k-textbox"
														data-bind="value: obj.bank_name"
														style="width: 100%;">
											</div>
											<!-- // Group END -->
										</div>
								    	<div class="col-md-6">
											<!-- Group -->
											<div class="control-group">
												<label for="txtBankAccountNumber"><span data-bind="text: lang.lang.bank_account_no"></span></label>
												<input id="txtBankAccountNumber" name="txtBankAccountNumber"
														class="k-textbox"
														data-bind="value: obj.bank_account_number"
														style="width: 100%;" />
											</div>
											<!-- // Group END -->
										</div>
									</div>
							    </div>

							    
							    <!-- Form actions -->
								<div class="backgroundButtonFooter" style="margin-top:10px;">
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
<!-- End -->