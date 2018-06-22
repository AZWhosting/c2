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
	    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#/cashs" data-bind="click: goMenuCashs"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down" data-bind="">Cash Center</span></a> </li>
    </ul>
</script>
<!-- End -->

<!-- Menu -->
<script id="reports" type="text/x-kendo-template">
	
	<div class="row home" id="reports" >
    	<div class="col-md-4">
			<div class="saleOverview" data-bind="click: loadCashIn" style="margin-bottom: 15px;">
				<h2 data-bind="text: lang.lang.cash_in">Cash In</h2>
				<p style="margin-bottom: 0;" data-format="n0" data-bind="text: obj.cash_in"></p>
			</div>
			<!-- <div class="report" >
				<div class="col-md-12">
					<h3 style="border-bottom: none; padding-bottom: 0;"><a href="#/cash_movement" data-bind="text: lang.lang.cash_movement" ></a></h3>
				</div>
			</div> -->
		</div>
		<div class="col-md-4">
			<div class="saleOverview" data-bind="click: loadCashOut" style="margin-bottom: 15px;">
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
			<div class="saleOverview" data-bind="click: loadCashBalance" style="margin-bottom: 15px;">
				<h2 data-bind="text: lang.lang.cash_balance">Cash Balance</h2>
				<p style="margin-bottom: 0;" data-format="n0" data-bind="text: obj.cash_balance"></p>
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

		  	<button class="btnSearch float-left" type="button" data-role="button" data-bind="click: search"><i class="ti-search"></i></button>
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
                    	title:'DATE',
                    	width: 100,
                    	template: '#=kendo.toString(new Date(issued_date), banhji.dateFormat)#' 
                    },
                    { 
                    	field: 'number', 
                    	title:'NUMBER',
                    	attributes: {
					      	style: 'text-align: center;'
					    }, 
                    	width: 120
                    },
                    { field: 'type', title:'TYPE', width: 125 },
                    { field: 'contact', title:'NAME' },
                    { field: 'memo', title:'DESCRIPTION' },
                    { field: 'account_name', title:'ACCOUNT' },			                                
                    { 
                    	field: 'amount', 
                    	title:'AMOUNT',
                    	format: '{0:n}',
                    	attributes: {
					      	style: 'text-align: right;'
					    },
					    headerAttributes: {
					      	'class': 'table-header-cell',
					      	style: 'text-align: right; font-size: 14px'
					    },
					    width: 200
                    }
                 ]"
                 data-auto-bind="false"
                 data-bind="source: dataSource"
                 style="width: 100%;"></div>
        </div>
    </div>
	            
</script>
<script id="transactions" type="text/x-kendo-template">	
	<div class="row">
		<div class="col-md-7">
            <div class="btn-group">
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
        <div class="col-md-12">
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
									<input id="ddlAccount" name="ddlAccount"
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
						<h2 style="font-size: 20px; font-weight: 600; margin-top: 0px; color: #203864 !important;" data-bind="text: lang.lang.general_ledger"></h2>
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
									<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.name"></th>
									<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.debit"></th>
									<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.credit"></th>
									<th style="background-color: #343a40 !important; -webkit-print-color-adjust: exact; color: #fff !important; text-align: center; text-transform: uppercase; vertical-align: top; font-weight: 400; padding: 10px;" data-bind="text: lang.lang.balance"></th>
								</tr>
                            </thead>
                            <tbody  data-role="listview"
		            				data-auto-bind="false"
					                data-template="generalLedger-template"
					                data-bind="source: dataSource" >
					        </tbody>
					        <tfoot data-template="generalLedger-footer-template" data-bind="source: this"></tfoot>
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
<script id="cashs" type="text/x-kendo-template">
	<div class="row" id="customers">
		<div class="col-md-3">
			<div class="listWrapper">
				<div class="innerAll">
					<form autocomplete="off" class="form-inline">
						<div class="widget-search">
							<div class="overflow-hidden">
								<input style="padding: 6px;" type="search" placeholder="Account ..." data-bind="value: searchText">
							</div>
							<button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="ti-search"></i></button>
							
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
						<a class="btn waves-effect waves-light btn-block btn-info btnViewEditCustomer" data-bind="click: goEdit"><i class="ti-pencil-alt marginRight"></i><span data-bind="text: lang.lang.edit"></span></a>
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
								<div class="saleOverview" style="margin-bottom: 8px;">
		                            <p data-bind="click: loadTransaction">
		                            	<span data-format="n" data-bind="text: lang.lang.balance_as_of_today"></span>
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
		                    </div>
	                    </div>
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
									<th data-bind="text: lang.lang.description"></th>
									<th data-bind="text: lang.lang.dr"></th>
									<th data-bind="text: lang.lang.cr"></th>
									<th></th>
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
					#if(banhji.accountingCenter.checkIsSub(sub_of_id)){#
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
<!-- End -->