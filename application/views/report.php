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
		<div class="navbar main" id="main-menu">
			<ul class="topnav">
				<li><a href="#"><img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/banhji-logo.png" style="height: 40px;"></a></li>
			</ul>
			<form class="navbar-form pull-left">
				<div class="btn-group">
				  	<a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
				    	<i class="icon-th"></i>
				    	<span class="caret"></span>
				  	</a>
				  	<ul class="dropdown-menu">
				    	<li data-bind="click: searchContact"><a href="#"><i class="icon-user"></i> Contact</a></li>
				    	<li data-bind="click: searchTransaction"><a href="#"><i class="icon-random"></i> Transaction</a></li>
				    	<li data-bind="click: searchItem"><a href="#"><i class="icon-th-list"></i> Item</a></li>
				  	</ul>
				</div>
			  	<input type="text" class="span2 search-query" placeholder="Search Contact" id="search-placeholder"
			  			data-bind="value: searchText"
			  			style="background-color: #555555; color: #ffffff; border-color: #333333; height: 22px;">
			  	<button type="submit" class="btn btn-inverse" data-bind="click: search"><i class="icon-search"></i></button>
			</form>
			<ul class="topnav" id="secondary-menu">
			</ul>
			<ul class="topnav pull-right">
				<li role="presentation" class="dropdown">
			  		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">[<span data-bind="text: getUsername"></span>] <span class="caret"></span></a>
		  			<ul class="dropdown-menu">
		  				<li><a href="#" data-bind="click: lang.changeToKh">ភាសាខ្មែរ</a></li>
    					<li><a href="#" data-bind="click: lang.changeToEn">English</a></li>
						<li class="divider"></li>
						<li><a href="#/manage" data-bind="click: logout"><i class="icon-power-off"></i> Logout</a></li>
		  			</ul>
			  	</li>

			</ul>
		</div>
	</div>
</script>
<script type="text/x-kendo-template" id="index">
	<div class="row-fluid">
		<div class="span6">
			<div class="row">
				<div class="span12" style="padding-left: 0; margin-left: 0; margin-top: 0;">
					<ul id="module-image">
						<li style="text-align:center;">
							<a href="#/customer_report_center">
								<img title="Customers" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/customers.png" alt="Customer">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.customer"></span></span>
						</li>
						<li style="text-align:center;">
							<a href="#/employees">
								<img title="Employees" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/employee.png" alt="Employee">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.employee"></span></span>
						</li>
						<li style="text-align:center;">
							<a href="#/vendors">
								<img title="Supplier" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/supplier.png" alt="Vendor">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.vendor"></span></span>
						</li>
						<li style="text-align:center;">
							<a href="#/inventories">
								<img title="Inventories" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/inventory.png" alt="Inventory">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.inventory"></span></span>
						</li>
					</ul>
					<ul id="module-image">
						<li style="text-align:center;">
							<a href="#/cash">
								<img title="Cash" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/1.png" alt="Cash Management">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000">Cash MGT.</span>
						</li>
						<li style="text-align:center;">
							<a href="#/accounting">
								<img title="Accounting" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/accounting.png" alt="Customer">
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.accounting"></span></span>
							</a>
						</li>
						<li style="text-align:center;">
							<a href="#/reports">
								<img title="Reports" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/report.png" alt="Reports">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.report"></span></span>
						</li>
						<li style="text-align:center;">
							<a href="<?php echo base_url(); ?>admin">
								<img title="Setting" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/setting.png" alt="Admin">
								<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.settings"></span></span>
							</a>
						</li>
					</ul>
				</div>

				<div class="span12" style="padding-left: 0; margin-left: 0; margin-top: 30px;">
					<h4 style="margin-left: 35px; width: 450px;"><span data-bind="text: lang.lang.subcribed_industry_modules"></span></h4>
					<ul id="module-image">
						<li style="text-align:center;">
							<a href="#">
								<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/web_store.png" alt="Customer">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.web_store"></span></span>
						</li>
						<li style="text-align:center;">
							<a href="#">
								<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/services.png" alt="Service">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.service"></span></span>
						</li>
						<li style="text-align:center;">
							<a href="#">
								<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/attach_file.png" alt="Attachment">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.attachment"></span></span>
						</li>
						<li style="text-align:center;">
							<a href="#">
								<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/tax.png" alt="Inventory">
							</a>
							<span style="margin-top: 5px; font-size: 14px; font-weight: bold; color: #000000"><span data-bind="text: lang.lang.tax"></span></span>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Welcome -->
		<div class="span6">
			<div class="row">
				<div class="span12">

					<!-- Add New Board -->
					<div class="board-add">
						<div class="span6">
							<h2>Welcome on board!</h2>
							<p>
								To get you started with BanhJi, please have a look at this <a target="_blank" href="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/guide/welcome_guide.pdf">[Welcome Guide]</a>.
							</p>
						</div>
						<div class="span6">
							<div class="span12">
								<div class="span3">
									<a href="#/customer" class="center">
										<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/customers.ico" />
									</a>
								</div>
								<div class="span3">
									<a href="#/vendor" class="center">
										<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/suppliers.ico" />
									</a>
								</div>
								<div class="span3">
									<a href="#/item" class="center">
										<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/inventories.ico" />
									</a>
								</div>
								<div class="span3">
									<a href="#/item_service" class="center">
										<img src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/ICONs/services.ico" />
									</a>
								</div>
							</div>
						</div>
					</div><!--End Add New Board -->

					<!-- Financial Board -->
					<div class="board-financial">
						<div class="span12">
							<h4 data-bind="text: companyName"></h4>
							<h2 style="color: #113051;">Financial Snapshot</h2>
							<span style="color: #000000;">As of:&nbsp;<span id="today-date" data-bind="text: today"></span></span><br/>
						</div>
					</div><!--End Financial Board -->

					<!-- Chart Board -->
					<div class="board-chart">
						<div class="span12">
							<div class="span6">
								<p>Performance</p>
								<table class="performance">
									<tr>
										<td>Income</td>
										<td></td>
										<td>0</td>
									</tr>
									<tr>
										<td>Expense</td>
										<td></td>
										<td>0</td>
									</tr>
									<tr>
										<td><b>Net Income</b></td>
										<td></td>
										<td><b>0</b></td>
									</tr>
								</table>
							</div>
							<div class="span6">
								<p>Position</p>
								<table class="position">
									<tr>
										<td>Assets</td>
										<td></td>
										<td>0</td>
									</tr>
									<tr>
										<td>Liabilities</td>
										<td></td>
										<td>0</td>
									</tr>
									<tr>
										<td><b>Equity</b></td>
										<td></td>
										<td><b>0</b></td>
									</tr>
								</table>
							</div>
						</div>

						<div class="span12">
							<div class="span6">
								<a href="#/customer_balance">
									<div class="widget-body alert-info welcome-nopadding">
										<p>RECEIVABLES</p>

										<div align="center" class="text-large strong" data-bind="text: ar"></div>

										<table width="100%">
											<tr align="center">
												<td>
													<span data-bind="text: ar_open"></span>
													<br>
													<span>Open</span>
												</td>
												<td>
													<span data-bind="text: ar_customer"></span>
													<br>
													<span>Customer</span>
												</td>
												<td>
													<span data-bind="text: ar_overdue"></span>
													<br>
													<span>Overdue</span>
												</td>
											</tr>
										</table>
									</div>
								</a>
							</div>
							<div class="span6">


								<div class="widget-body  alert-info welcome-nopadding">
									<p>PAYABLES</p>

									<div align="center" class="text-large strong" data-bind="text: ap"></div>

									<table width="100%">
										<tr align="center">
											<td>
												<span data-bind="text: ap_open"></span>
												<br>
												<span>Open</span>
											</td>
											<td>
												<span data-bind="text: ap_vendor"></span>
												<br>
												<span>Supplier</span>
											</td>
											<td>
												<span data-bind="text: ap_overdue"></span>
												<br>
												<span>Overdue</span>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</div>

						<div class="span12">
							<div class="home-chart">
								<!-- Graph -->
								<div data-role="chart"
									 data-auto-bind="false"
					                 data-legend="{ position: 'top' }"
					                 data-series-defaults="{ type: 'column' }"
					                 data-tooltip='{
					                    visible: true,
					                    format: "{0}%",
					                    template: "#= series.name #: #= kendo.toString(value, &#39;c&#39;, banhji.locale) #"
					                 }'
					                 data-series="[
					                                 { field: 'cash_in', name: 'Cash In', categoryField:'month', color: '#236DA4' },
					                                 { field: 'cash_out', name: 'Cash Out', categoryField:'month', color: '#A6C9E3' }
					                             ]"
					                 data-bind="source: graphDS"
					                 style="height: 250px;" ></div>
					            <!-- End Graph -->
							</div>
						</div>
					</div><!--End Chart Board -->

				</div>
			</div>
		</div><!-- End Welcome -->
	</div>

	<div class="row-fluid">
		<div style="margin-top: 10px; margin-left: 0;" align="center">
			<p>© 2016 BanhJi PTE. Ltd. All rights reserved.</p>
		</div>
	</div>
</script>
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
							<span>#=sku#</span>
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

<!-- Report Customer -->

<script id="customerReportCenter" type="text/x-kendo-template">
	<div class="row-fluid customer-report-center">

		<div class="span7">
			<div class="row-fluid sale-report">
				<h2>SALE MANAGEMENT REPORTS</h2>
				<p>
					The following reports provide summary and detailed reports in
					different ways to help analyze your revenue performance.
				</p>
				<div class="row-fluid">
					<table class="table table-borderless table-condensed">
						<tr>
							<td width="50%">
								<h3><a href="#/sale_summary_customer">Sale Summary by Customer</a></h3>
							</td>
							<td width="50%">
								<h3><a href="#/customer_transaction_list">Customer Transaction List</a></h3>
							</td>
						</tr>
						<tr>
							<td width="50%">
								<p>
									Summarizes total sales for each customer within a period
									of time so you can see which ones generate the most revenue for you.
								</p>

							</td>
							<td width="50%">
								<p>
									List of all transactions related to and grouped by each customer, including invoice, cash sale
								</p>
							</td>

						</tr>
						<tr>
							<td width="50%">
								<h3><a href="#/sale_detail_customer">Sale Detail by Customer</a></h3>
							</td>
							<td width="50%">
								<h3><a href="#/deposit_detail_customer">Deposit Detail by Customer</a></h3>
							</td>
						</tr>
						<tr>
							<td width="50%">
								<p>
									Lists individual sale transactions by date for each customer with a period of time.
								</p>
							</td>
							<td width="50%">
								<p>
									Provides detailed information about customer deposit for specific order, prepayment, or credit.
								</p>
							</td>
						</tr>

						<tr>
							<td width="50%">
								<h3><a href="#/sale_summary_product">Sale Summary by Product/ Services</a></h3>
							</td>
							<td width="50%">
								<h3><a href="#/sale_detail_product">Sale Detail by Product/ Services</a></h3>
							</td>
						</tr>
						<tr>
							<td width="50%">
								<p>
									Summarizes total sales for each product/ service within a period of time. In addition, it also includes gross profit margin, quantity, amount, cost, and average prices.
								</p>
							</td>
							<td width="50%">
								<p>
									Lists individual sale transactions by date for each product/ service with a period of time.
								</p>
							</td>
						</tr>
						<tr>
							<td width="50%">
								<h3><a href="#/">Sale by Job/Engagement</a></h3>
							</td>
							<td width="50%">
							</td>
						</tr>


					</table>

				</div>
			</div>

			<div class="row-fluid recevable-report">
				<h2>RECEIVABLE MANAGEMENT REPORTS</h2>
				<p>
					The following reports provide summary and detailed reports.
				</p>
				<div class="row-fluid">
					<table class="table table-borderless table-condensed">
						<tr>
							<td >
								<h3><a href="#/customer_balance_summary">Customer Balance Summary</a></h3>
							</td>
							<td >
								<h3><a href="#/customer_balance_detail">Customer Balance Detail</a></h3>
							</td>
						</tr>
						<tr>
							<td>
								<p>
									Show each customer’s total outstanding balances.
								</p>

							</td>
							<td >
								<p>
									Lists individual unpaid invoices for each customer
								</p>
							</td>

						</tr>
						<tr>
							<td >
								<h3><a href="#/receivable_aging_summary">Receivable Aging Summary</a></h3>
							</td>
							<td >
								<h3><a href="#/receivable_aging_detail">Receivable Aging Detail</a></h3>
							</td>
						</tr>
						<tr>
							<td >
								<p>
									Lists all unpaid invoices for the current period, 30, 60, 90,
									and more than 90 days, grouped by individual customers.
								</p>
							</td>
							<td >
								<p>
									Lists individual unpaid invoices, grouped by customer. This includes due date,
									outstanding days (aging days), and amount.
								</p>
							</td>
						</tr>

						<tr>
							<td >
								<h3><a href="#/list_invoices_collect">List of invoices to be collected</a></h3>
							</td>
							<td >
								<h3><a href="#/collect_report">Collection Report</a></h3>
							</td>
						</tr>
						<tr>
							<td>
								<p>
									Lists all unpaid invoices, grouped by Due today and Overdue.
								</p>
							</td>
							<td >
								<p>
									Lists of collected invoices for the select period of time, group by method of payment.
								</p>
							</td>
						</tr>

						<tr>
							<td >
								<h3><a href="#/invoice_list">Invoice List</a></h3>
							</td>
							<td >
								<h3><a href="#/customer_list">Customer List</a></h3>
							</td>
						</tr>
						<tr>
							<td >
								<p>
									Shows a chronological list of all your invoices for a selected date range.
								</p>
							</td>
							<td >
								<p>
									List of all active customers
								</p>
							</td>
						</tr>

					</table>
				</div>
			</div>

			<div class="row-fluid recevable-report">
				<h2>OTHER REPORTS/ LISTS</h2>
				<div class="row-fluid">
					<table class="table table-borderless table-condensed">
						<tr>
							<td>
								<h3><a href="#/">Product/ Service List</a></h3>
							</td>
							<td >
								<h3><a href="#/">Payment Method & Term List</a></h3>
							</td>
						</tr>
						<tr>
							<td >
								<p>
									Lists the products and services you sell. The following information is
									included: name, description, cost, sales price, and quantity on hand.
								</p>

							</td>
							<td>
								<p>
									List the types of payments and the term that determine due date for payment from customers.
								</p>
							</td>

						</tr>
						<tr >
							<td></td>
							<td>
								<h3><a href="#/">Recurring Customer Template List</a></h3>
							</td>
						</tr>

					</table>
				</div>
			</div>
		</div>
		<div class="span5">
			<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
			<br>
			<br>
			<div class="report-chart">
				<div class="widget-body alert alert-primary sale-overview">
					<h2>SALE OVERVIEW</h2>
					<div align="center" class="text-large strong" data-bind="text: sale"></div>
					<table width="100%">
						<tr align="center">
							<td>
								<span data-bind="text: sale_customer"></span>
								<br>
								<span>Customer</span>
							</td>
							<td>
								<span data-bind="text: sale_product"></span>
								<br>
								<span>Product</span>
							</td>
							<td>
								<span data-bind="text: order"></span>
								<br>
								<span>Order</span>
							</td>
							<td >
								<span data-bind="text: sale_order"></span>
								<br>
								<span>Sale Order</span>
							</td>

						</tr>
					</table>
				</div>
				<!-- Graph -->
				<div class="home-chart">
					<div data-role="chart"
		                 data-legend="{ position: 'top' }"
		                 data-series-defaults="{ type: 'column' }"
		                 data-tooltip='{
		                    visible: true,
		                    format: "{0}%",
		                    template: "#= series.name #: #= kendo.toString(value, &#39;c&#39;, banhji.locale) #"
		                 }'
		                 data-series="[
		                                 { field: 'sale', name: 'Monthly Sale', categoryField:'month', color: '#236DA4' },
		                                 { field: 'order', name: 'Monthly Order', categoryField:'month', color: '#A6C9E3' }
		                             ]"
		                 data-bind="source: graphDS"
		                 style="height: 250px;" ></div>
	            <!-- End Graph -->
	            </div>
			</div>
			<div class="report-chart">
				<div class="widget-body receivable-overview" style="background-color: LightGray">
					<h2>RECEIVABLES MANAGEMENT</h2>
					<div align="center" class="text-large strong" data-bind="text: ar"></div>
					<table width="100%">
						<tr align="center">
							<td>
								<span data-bind="text: ar_open"></span>
								<br>
								<span>Open</span>
							</td>
							<td>
								<span data-bind="text: ar_customer"></span>
								<br>
								<span>Customer</span>
							</td>
							<td>
								<span data-bind="text: ar_overdue"></span>
								<br>
								<span>Overdue</span>
							</td>
							<td>
								<span data-bind="text: collection_day"></span> days
								<br>
								<span>Collection Days</span>
							</td>
						</tr>
					</table>
				</div>
				<!-- Graph -->
				<div class="home-chart">
					<div data-role="chart"
		                 data-legend="{ position: 'top' }"
		                 data-series-defaults="{ type: 'column' }"
		                 data-tooltip='{
		                    visible: true,
		                    format: "{0}%",
		                    template: "#= series.name #: #= kendo.toString(value, &#39;c&#39;, banhji.locale) #"
		                 }'
		                 data-series="[
		                                 { field: 'sale', name: 'Monthly Sale', categoryField:'month', color: '#236DA4' },
		                                 { field: 'order', name: 'Monthly Order', categoryField:'month', color: '#A6C9E3' }
		                             ]"
		                 data-bind="source: graphDS"
		                 style="height: 250px;" ></div>
	            <!-- End Graph -->
            </div>
			</div>
		</div>
	</div>
</script>
<script id="saleSummaryCustomer" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<div>
						<input id="sorter" name="sorter"
				    	   data-role="dropdownlist"
				           data-value-primitive="true"
				           data-text-field="text"
				           data-value-field="value"
				           data-bind="value: sorter,
				                      source: sortList,
				                      events: {change: dateChange}" />

				        <input id="sdate" name="sdate"
				        	   data-role="datepicker"
					           data-bind="value: startDate, events: {change: dateMax}"
					           placeholder="From ..." />

				       	<input id="edate" name="edate"
				       		   data-role="datepicker"
					           data-bind="value: endDate, events: {change: dateMin}"
					           placeholder="To ..." />

					  	 <button type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
					</div>

					<div class="block-title">
						<h4 data-bind="text: companyName"></h4>
						<h2>Sale Summary by Customer</h2>
						<p>From 1 June 2016 to 30 June 2016</p>
					</div>

					<div class="row-fluid">
						<div class="span5">
							<div class="total-customer">
								<p>Total Customer</p>
								<span data-bind="text: count"></span>
							</div>

						</div>
						<div class="span7">
							<div class="total-sale">
								<p>Total Sale</p>
								<span data-bind="text: total"></span>
							</div>
						</div>
					</div>
					<table class="table table-borderless table-condensed ">
						<thead>
							<tr>
								<th><span>Customer</span></th>
								<th><span>Total Sale</span></th>
							</tr>
						</thead>
	            		<tbody data-role="listview"
	            				data-auto-bind="false"
				                data-template="sale-summary-tmpl"
				                data-bind="source: summarySale" >
				        </tbody>
	            	</table>

				</div>
			</div>
		</div>
	</div>	
</script>
<script id="sale-summary-tmpl" type="text/x-kendo-template">
	<tr>
		<td>#=customer#</td>
		<td>#=kendo.toString(amount, 'c2')#</td>
	</tr>
</script>
<script id="customerTransactionList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<div>
						<input id="sorter" name="sorter"
				    	   data-role="dropdownlist"
				           data-value-primitive="true"
				           data-text-field="text"
				           data-value-field="value"
				           data-bind="value: sorter,
				                      source: sortList,
				                      events: {change: dateChange}" />

				        <input id="sdate" name="sdate"
				        	   data-role="datepicker"
					           data-bind="value: startDate, events: {change: dateMax}"
					           placeholder="From ..." />

				       	<input id="edate" name="edate"
				       		   data-role="datepicker"
					           data-bind="value: endDate, events: {change: dateMin}"
					           placeholder="To ..." />

					  	 <button type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
					</div>

					<div class="block-title">
						<h3>ABC Co., Ltd</h3>
						<h2>Customer Transaction List</h2>
						<p>From 1 June 2016 to 30 June 2016</p>
					</div>

					<div class="row-fluid">
						<div class="span5">
							<div class="total-customer">
								<div class="span4">
									<p>Total Customer</p>
									<span data-bind="text: count"></span>
								</div>
								<div class="span4">
									<p>Cash Sale</p>
									<span>500</span>
								</div>
								<div class="span4">
									<p>Cash Receipt</p>
									<span>1,200</span>
								</div>
							</div>
						</div>
						<div class="span7">
							<div class="total-sale">
								<div class="span6">
									<p>Total Sale</p>
									<span data-bind="text: total"></span>
								</div>
								<div class="span6">
									<p>Customer Balance</p>
									<span>2,200.00</span>
								</div>
							</div>
						</div>
					</div>

					<table class="table table-borderless table-condensed ">
						<thead>
							<tr>
								<th>Type</th>
								<th>Date</th>
								<th>No</th>
								<th>Sale Rep</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody data-role="listview"
									 data-bind="source: transactions"
									 data-template="customertransactionlist-temp"
						></tbody>
						<tfoot>
							<tr>
								<th colspan="4">Total</th>
								<th colspan="3">(600.00)</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="customertransactionlist-temp" type="text/x-kendo-template" >
	# kendo.culture(banhji.customerSale.locale); #
	<tr style="font-weight: bold">
		<td>#=group#</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	# if (items.length) {#
		#for(var i= 0; i <items.length; i++) {#
			<tr>
				<td>&nbsp;&nbsp;#=items[i].type#</td>
				<td>#=items[i].date#</td>
				<td>#=items[i].number#</td>
				<td>#=items[i].memo#</td>
				<td style="text-align: right;">#=kendo.toString(items[i].amount, 'c2')#</td>
			</tr>

		#}#
	#}#
	<tr style="font-weight: bold; color: red">
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td style="text-align: right;">#=kendo.toString(amount, 'c2')#</td>
	</tr>
</script>
<script id="saleDetailCustomer" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<div>
						<input id="sorter" name="sorter"
				    	   data-role="dropdownlist"
				           data-value-primitive="true"
				           data-text-field="text"
				           data-value-field="value"
				           data-bind="value: sorter,
				                      source: sortList,
				                      events: {change: dateChange}" />

				        <input id="sdate" name="sdate"
				        	   data-role="datepicker"
					           data-bind="value: startDate, events: {change: dateMax}"
					           placeholder="From ..." />

				       	<input id="edate" name="edate"
				       		   data-role="datepicker"
					           data-bind="value: endDate, events: {change: dateMin}"
					           placeholder="To ..." />

					  	 <button type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
					</div>

					<div class="block-title">
						<h3>ABC Co., Ltd</h3>
						<h2>Sale Detail by Customer</h2>
						<p>From 1 June 2016 to 30 June 2016</p>
					</div>

					<div class="row-fluid">
						<div class="span5">
							<div class="total-customer">
								<p>Total Customers</p>
								<span data-bind="text: count"></span>
							</div>

						</div>
						<div class="span7">
							<div class="total-sale">
								<p>Total Sale</p>
								<span data-bind="text: total"></sapn>
							</div>
						</div>
					</div>

					<table class="table table-borderless table-condensed ">
						<thead>
							<tr>
								<th>Type</th>
								<th>Date</th>
								<th>No</th>
								<th>Memo</th>
								<th>Item/service</th>
								<th>Qty</th>
								<th>Price</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody data-role="listview" data-bind="source: detailSale" data-auto-bind="false" data-template="saleDetailCustomerReportItem">
						</tbody>
						<tfoot>
							<tr>
								<th colspan="4">Total</th>
								<th colspan="4"><span data-bind="text: total"></span></th>
							</tr>
						</tfoot>
					</table>

				</div>
			</div>
		</div>
	</div>
	<br>
	<hr>
	<br>
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<div class="box-search">
						<div class="hidden-print">
					    	<input id="sorter" name="sorter"
					    	   data-role="dropdownlist"
					           data-value-primitive="true"
					           data-text-field="text"
					           data-value-field="value"
					           data-bind="value: sorter,
					                      source: sortList" />

					        <input id="sdate" name="sdate"
					           data-bind="value: sdate"
					           placeholder="From ..." />

					       	<input id="edate" name="edate"
					           data-bind="value: edate"
					           placeholder="To ..." />

					  		<button id="search" type="button" data-role="button">Segment</button>
					    </div>
					</div>

					<div class="block-title">
						<h3>ABC Co., Ltd</h3>
						<h2>Sale Detail by Customer by Segment</h2>
						<p>From 1 June 2016 to 30 June 2016</p>
					</div>

					<div class="row-fluid">
						<div class="span5">
							<div class="total-customer">
								<p>Total Customers</p>
								<span></span>
							</div>

						</div>
						<div class="span7">
							<div class="total-sale">
								<p>Total Sale</p>
								<span></sapn>
							</div>
						</div>
					</div>

					<table class="table table-borderless table-condensed ">
						<tr>
							<th>Type</th>
							<th>Date</th>
							<th>Reference</th>
							<th>Customer</th>
							<th>Memo</th>
							<th>Item/service</th>
							<th>Qty</th>
							<th>Price</th>
							<th>Amount</th>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th colspan="5">Total</th>
							<th colspan="4">-</th>
						</tr>
					</table>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleDetailCustomerReportItem" type="text/x-kendo-template">
	# kendo.culture(banhji.customerSale.locale); #
	<tr style="font-weight: bold">
		<td>#=group#</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	# if (items.length) {#
		#for(var i= 0; i <items.length; i++) {#
			<tr>
				<td>&nbsp;&nbsp;#=items[i].type#</td>
				<td>#=items[i].date#</td>
				<td>#=items[i].number#</td>
				<td>#=items[i].memo#</td>
				<td></td>
				<td></td>
				<td></td>
				<td>#=kendo.toString(items[i].amount, 'c2')#</td>
			</tr>
				#if(items[i].lines.length >0) {#
					#for(var x = 0; x < items[i].lines.length; x++) {#
						<tr style="font-weight: italic">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>#=items[i].lines[x].name#</td>
							<td>#=items[i].lines[x].quantity#</td>
							<td>#=kendo.toString(items[i].lines[x].price, 'c2')#</td>
							<td stye="text-align: left;">#=kendo.toString(items[i].lines[x].amount, 'c2')#</td>
						</tr>
					#}#
				#}#
		#}#
	#}#
	<tr style="font-weight: bold; color: red">
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>#=kendo.toString(amount, 'c2')#</td>
	</tr>
</script>
<script id="saleSummaryProduct" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<div>
						<input id="sorter" name="sorter"
				    	   data-role="dropdownlist"
				           data-value-primitive="true"
				           data-text-field="text"
				           data-value-field="value"
				           data-bind="value: sorter,
				                      source: sortList,
				                      events: {change: dateChange}" />

				        <input id="sdate" name="sdate"
				        	   data-role="datepicker"
					           data-bind="value: startDate, events: {change: dateMax}"
					           placeholder="From ..." />

				       	<input id="edate" name="edate"
				       		   data-role="datepicker"
					           data-bind="value: endDate, events: {change: dateMin}"
					           placeholder="To ..." />

					  	 <button type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
					</div>

					<div class="block-title">
						<h3>ABC Co., Ltd</h3>
						<h2>Sale Summary by Product/Services</h2>
						<p>From 1 June 2016 to 30 June 2016</p>
					</div>

					<div class="row-fluid">
						<div class="span5">
							<div class="total-customer">
								<div class="span6">
									<p>Total Product/services</p>
									<span data-bind="text: count"></span>
								</div>
								<div class="span6">
									<p>AVG Sale</p>
									<span data-bind="text: total_avg"></span>
								</div>
							</div>
						</div>
						<div class="span7">
							<div class="total-customer">
								<div class="span6">
									<p>Total Sale</p>
									<span data-bind="text: total_sale"></span>
								</div>
								<div class="span6">
									<p>Gross Profit Margin</p>
									<span data-bind="text: gpm"></span>
								</div>
							</div>
						</div>
					</div>

					<table class="table table-borderless table-condensed ">
						<thead>
							<tr>
								<th>ITEM</th>
								<th>QTY</th>
								<th>AMOUNT</th>
								<th>AVG PRICE</th>
								<th>COST</th>
								<th>GROSS PROFIT MARGIN</th>								
							</tr>
						</thead>
						<tbody data-role="listview"
									 data-bind="source: summaryProduct"
									 data-template="saleSummary-product-temp"
						></tbody>
						<tfoot>
							<tr>
								<th colspan="4">Total</th>
								<th colspan="4"><span data-bind="text: total"></span></th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<br>
	<hr>
	<br>
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<div class="box-search">
						<div class="hidden-print">
					    	<input id="sorter" name="sorter"
					    	   data-role="dropdownlist"
					           data-value-primitive="true"
					           data-text-field="text"
					           data-value-field="value"
					           data-bind="value: sorter,
					                      source: sortList" />

					        <input id="sdate" name="sdate"
					           data-bind="value: sdate"
					           placeholder="From ..." />

					       	<input id="edate" name="edate"
					           data-bind="value: edate"
					           placeholder="To ..." />

					  		<button id="search" type="button" data-role="button">Segment</button>
					    </div>
					</div>

					<div class="block-title">
						<h3>ABC Co., Ltd</h3>
						<h2>Sale Summary by Product/Services by Segment</h2>
						<p>From 1 June 2016 to 30 June 2016</p>
					</div>

					<div class="row-fluid">
						<div class="span5">
							<div class="total-customer">
								<div class="span6">
									<p>Total Product/services</p>
									<span>2</span>
								</div>
								<div class="span6">
									<p>AVG Sale</p>
									<span>600</span>
								</div>
							</div>
						</div>
						<div class="span7">
							<div class="total-customer">
								<div class="span6">
									<p>Total Sale</p>
									<span>1,200.00</span>
								</div>
								<div class="span6">
									<p>Gross Profit Margin</p>
									<span>50%</span>
								</div>
							</div>
						</div>
					</div>

					<table class="table table-borderless table-condensed ">
						<tr>
							<th></th>
							<th>Qty</th>
							<th>Amount</th>
							<th>Sale %</th>
							<th>AVG Price</th>
							<th>Cost</th>
							<th>Gross Profit Margin</th>
						</tr>
						<tr>
							<td>PHNOM PENH BRANCH</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td style="padding-left:30px !important;">Window</td>
							<td>200</td>
							<td>700</td>
							<td>67%</td>
							<td>3.50</td>
							<td>2</td>
							<td>75%</td>
						</tr>
						<tr>
							<td style="padding-left:30px !important;">Cement</td>
							<td >100</td>
							<td>500</td>
							<td>33%</td>
							<td>5.00</td>
							<td>4.00</td>
							<td>25%</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th>Total</th>
							<th>300.00</th>
							<th colspan="2">1,200.00</th>
							<th colspan="2">4.25</th>
							<th>50%</th>
						</tr>
					</table>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleSummary-product-temp" type="text/x-kendo-template">
	# kendo.culture(banhji.customerSale.locale); #
	<tr style="font-weight: bold">
		<td>#=group#</td>
		<td>#=qty#</td>
		<td>#=kendo.toString(amount, 'c2')#</td>
		<td>#=avg_price#</td>
		<td>#=cost#</td>
		<td>#=gross_profit_margin#</td>
	</tr>

</script>
<script id="depositDetailCustomer" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<div>
						<input id="sorter" name="sorter"
				    	   data-role="dropdownlist"
				           data-value-primitive="true"
				           data-text-field="text"
				           data-value-field="value"
				           data-bind="value: sorter,
				                      source: sortList,
				                      events: {change: dateChange}" />

				        <input id="sdate" name="sdate"
				        	   data-role="datepicker"
					           data-bind="value: startDate, events: {change: dateMax}"
					           placeholder="From ..." />

				       	<input id="edate" name="edate"
				       		   data-role="datepicker"
					           data-bind="value: endDate, events: {change: dateMin}"
					           placeholder="To ..." />

					  	 <button type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
					</div>

					<div class="block-title">
						<h3>ABC Co., Ltd</h3>
						<h2>Deposit Detail By Customer</h2>
						<p>From 1 June 2016 to 30 June 2016</p>
					</div>

					<div class="row-fluid">
						<div class="span5">
							<div class="total-customer">
								<p>Number of Customer Deposit</p>
								<span data-bind="text: count"></span>
							</div>
						</div>
						<div class="span7">
							<div class="total-customer">
								<p>Customer Deposit Balance</p>
								<span data-bind="text: total"></span>
							</div>
						</div>
					</div>

					<table class="table table-borderless table-condensed ">
						<thead>
							<tr>
								<th>Type</th>
								<th>Date</th>
								<th>No</th>
								<th>Memo</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody data-role="listview"
									 data-bind="source: depositDetail"
									 data-template="cusotmerDeposit-temp"
						></tbody>
						<tfoot>
							<tr>
								<th colspan="4">Total</th>
								<th colspan="3">(600.00)</th>
							</tr>
						</tfoot>
					</table>


				</div>
			</div>
		</div>
	</div>
</script>
<script id="cusotmerDeposit-temp" type="text/x-kendo-template" >
	# kendo.culture(banhji.customerSale.locale); #
	<tr style="font-weight: bold">
		<td>#=group#</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	# if (items.length) {#
		#for(var i= 0; i <items.length; i++) {#
			<tr>
				<td>&nbsp;&nbsp;#=items[i].type#</td>
				<td>#=items[i].date#</td>
				<td>#=items[i].number#</td>
				<td>#=items[i].memo#</td>
				<td style="text-align: right;">#=kendo.toString(items[i].amount, 'c2')#</td>
			</tr>

		#}#
	#}#
	<tr style="font-weight: bold; color: red">
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td style="text-align: right;">#=kendo.toString(amount, 'c2')#</td>
	</tr>
</script>
<script id="saleDetailProduct" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<div>
						<input id="sorter" name="sorter"
				    	   data-role="dropdownlist"
				           data-value-primitive="true"
				           data-text-field="text"
				           data-value-field="value"
				           data-bind="value: sorter,
				                      source: sortList,
				                      events: {change: dateChange}" />

				        <input id="sdate" name="sdate"
				        	   data-role="datepicker"
					           data-bind="value: startDate, events: {change: dateMax}"
					           placeholder="From ..." />

				       	<input id="edate" name="edate"
				       		   data-role="datepicker"
					           data-bind="value: endDate, events: {change: dateMin}"
					           placeholder="To ..." />

					  	 <button type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
					</div>

					<div class="block-title">
						<h3>ABC Co., Ltd</h3>
						<h2>Sale Detail by Product/Service</h2>
						<p>From 1 June 2016 to 30 June 2016</p>
					</div>

					<div class="row-fluid">
						<div class="span5">
							<div class="total-customer">
								<div class="span6">
									<p>Total Product/services</p>
									<span data-bind="text: count"></span>
								</div>
								<div class="span6">
									<p>Total Sale</p>
									<span data-bind="text: total"></span>
								</div>
							</div>
						</div>
						<div class="span7">
							<div class="total-customer">
								<div class="span6">
									<p>Number of Product Sale</p>
									<span>-</span>
								</div>
								<div class="span6">
									<p>Qty on Hand</p>
									<span>-</span>
								</div>
							</div>
						</div>
					</div>

					<table class="table table-borderless table-condensed ">
						<thead>
							<tr>
								<th>Type</th>
								<th>Date</th>
								<th>No</th>
								<th>Memo</th>
								<th>QTY</th>
								<th>PRICE</th>
								<th>AMOUNT</th>
							</tr>
						</thead>
						<tbody data-role="listview"
									 data-bind="source: productSale"
									 data-template="productSale-temp"
						></tbody>
						<tfoot>
							<tr>
								<th colspan="4">Total</th>
								<th colspan="3">(600.00)</th>
							</tr>
						</tfoot>
					</table>


				</div>
			</div>
		</div>
	</div>
</script>
<script id="productSale-temp" type="text/x-kendo-template" >
	# kendo.culture(banhji.customerSale.locale); #
	<tr style="font-weight: bold">
		<td>#=group#</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	# if (items.length) {#
		#for(var i= 0; i <items.length; i++) {#
			<tr>
				<td>&nbsp;&nbsp;#=items[i].type#</td>
				<td>#=items[i].date#</td>
				<td>#=items[i].number#</td>
				<td>#=items[i].memo#</td>
				<td>#=items[i].qty#</td>
				<td>#=items[i].price#</td>
				<td>#=items[i].amount#</td>
			</tr>

		#}#
	#}#
	<tr style="font-weight: bold; color: red">
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		
	</tr>
</script>
<script id="customerBalanceSummary" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<div>
						<input id="sorter" name="sorter"
				    	   data-role="dropdownlist"
				           data-value-primitive="true"
				           data-text-field="text"
				           data-value-field="value"
				           data-bind="value: sorter,
				                      source: sortList,
				                      events: {change: dateChange}" />

				        <input id="sdate" name="sdate"
				        	   data-role="datepicker"
					           data-bind="value: startDate, events: {change: dateMax}"
					           placeholder="From ..." />

				       	<input id="edate" name="edate"
				       		   data-role="datepicker"
					           data-bind="value: endDate, events: {change: dateMin}"
					           placeholder="To ..." />

					  	 <button type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
					</div>

					<div class="block-title">
						<h3>ABC Co., Ltd</h3>
						<h2>Customer Balance Summary</h2>
						<p>From 1 June 2016 to 30 June 2016</p>
					</div>

					<div class="row-fluid">
						<div class="span5">
							<div class="total-customer">
								<div class="span6">
									<p>Total Customer</p>
									<span data-bind="text: count"></span>
								</div>
								<div class="span6">
									<p>Number Customer</p>
									<span>1,200</span>
								</div>
							</div>
						</div>
						<div class="span7">
							<div class="total-customer">
								<div class="span6">
									<p>Total Customer Balance</p>
									<span data-bind="text: total"></span>
								</div>
								<div class="span6">
									<p>Open Invoice</p>
									<span>-</span>
								</div>
							</div>
						</div>
					</div>

					<table class="table table-borderless table-condensed ">
						<thead>
							<tr>
								<th><span>CUSTOMER NAME</span></th>
								<th><span>ACCOUNT RECEIVABLE BALANCE</span></th>
							</tr>
						</thead>
	            		<tbody data-role="listview"
	            				data-auto-bind="false"
				                data-template="balance-summary-tmpl"
				                data-bind="source: summaryBalance" >
				        </tbody>
	            	</table>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="balance-summary-tmpl" type="text/x-kendo-template">
	<tr>
		<td>#=customer#</td>
		<td>#=kendo.toString(amount, 'c2')#</td>
	</tr>
</script>
<script id="customerBalanceDetail" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<div>
						<input id="sorter" name="sorter"
				    	   data-role="dropdownlist"
				           data-value-primitive="true"
				           data-text-field="text"
				           data-value-field="value"
				           data-bind="value: sorter,
				                      source: sortList,
				                      events: {change: dateChange}" />

				        <input id="sdate" name="sdate"
				        	   data-role="datepicker"
					           data-bind="value: startDate, events: {change: dateMax}"
					           placeholder="From ..." />

				       	<input id="edate" name="edate"
				       		   data-role="datepicker"
					           data-bind="value: endDate, events: {change: dateMin}"
					           placeholder="To ..." />

					  	 <button type="button" data-role="button" data-bind="click: searchTransaction"><i class="icon-search"></i></button>
					</div>

					<div class="block-title">
						<h3>ABC Co., Ltd</h3>
						<h2>Customer Balance Detail</h2>
						<p>From 1 June 2016 to 30 June 2016</p>
					</div>

					<div class="row-fluid">
						<div class="span5">
							<div class="total-customer">
								<div class="span6">
									<p>Total Customer</p>
									<span>2</span>
								</div>
								<div class="span6">
									<p>Cash Receipt</p>
									<span>-</span>
								</div>
							</div>
						</div>
						<div class="span7">
							<div class="total-customer">
								<div class="span6">
									<p>Total Customer Balance</p>
									<span>-</span>
								</div>
								<div class="span6">
									<p>Opean Invoice</p>
									<span>-</span>
								</div>
							</div>
						</div>
					</div>

					<table class="table table-borderless table-condensed ">
						<thead>
							<tr>
								<th>Type</th>
								<th>Date</th>
								<th>No</th>
								<th>Memo</th>
								<th>QTY</th>
								<th>PRICE</th>
								<th>AMOUNT</th>
							</tr>
						</thead>
						<tbody data-role="listview"
									 data-bind="source: saleDetail"
									 data-template="saleDetail-temp"
						></tbody>
						<tfoot>
							<tr>
								<th colspan="4">Total</th>
								<th colspan="3">(600.00)</th>
							</tr>
						</tfoot>
					</table>


				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleDetail-temp" type="text/x-kendo-template" >
	# kendo.culture(banhji.customerSale.locale); #
	<tr style="font-weight: bold">
		<td>#=group#</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	# if (items.length) {#
		#for(var i= 0; i <items.length; i++) {#
			<tr>
				<td>&nbsp;&nbsp;#=items[i].type#</td>
				<td>#=items[i].date#</td>
				<td>#=items[i].number#</td>
				<td>#=items[i].memo#</td>
				<td>#=items[i].qty#</td>
				<td>#=items[i].price#</td>
				<td>#=items[i].amount#</td>
			</tr>

		#}#
	#}#
	<tr style="font-weight: bold; color: red">
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		
	</tr>
</script>
<script id="receivableAgingSummary" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<div class="box-search">
						<div class="hidden-print">
					    	<input id="sorter" name="sorter"
					    	   data-role="dropdownlist"
					           data-value-primitive="true"
					           data-text-field="text"
					           data-value-field="value"
					           data-bind="value: sorter,
					                      source: sortList" />

					        <input id="sdate" name="sdate"
					           data-bind="value: sdate"
					           placeholder="From ..." />

					       	<input id="edate" name="edate"
					           data-bind="value: edate"
					           placeholder="To ..." />
					  		<button id="search" type="button" data-role="button">Segment</button>
					    </div>
					</div>

					<div class="block-title">
						<h3>ABC Co., Ltd</h3>
						<h2>Receivable Aging Summary</h2>
						<p>From 1 June 2016 to 30 June 2016</p>
					</div>

					<div class="row-fluid">
						<div class="span5">
							<div class="total-customer">
								<div class="span6">
									<p>Total Customer</p>
									<span>#</span>
								</div>
								<div class="span6">
									<p>Customer Balance</p>
									<span>-</span>
								</div>
							</div>
						</div>
						<div class="span7">
							<div class="total-customer">
								<div class="span6">
									<p>NUmber of Customer</p>
									<span>-</span>
								</div>
								<div class="span6">
									<p>Average Aging</p>
									<span>-</span>
								</div>
							</div>
						</div>
					</div>

					<table class="table table-borderless table-condensed ">
						<tr>
							<th></th>
							<th>Current</th>
							<th>1-30</th>
							<th>31-60</th>
							<th>61-90</th>
							<th>Over 90</th>
							<th>Total</th>
						</tr>
						<tr>
							<td>Sovan Tevy</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Invoice</td>
							<td>7/1/16</td>
							<td>IV-0001</td>
							<td>anmsjssd</td>
							<td>Account Receivable</td>
							<td>1,000.00</td>
						</tr>
						<tr>
							<td></td>
							<td>Cash Sale</td>
							<td></td>
							<td>SR-0003</td>
							<td>anmsjssd</td>
							<td>Cash on hand</td>
							<td>500.00</td>
						</tr>
						<tr>
							<td>Toni</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Invoice</td>
							<td>7/1/16</td>
							<td>IV-0015</td>
							<td>asg</td>
							<td>Account Receivable</td>
							<td>1,200.00</td>
						</tr>
						<tr>
							<td></td>
							<td>Cash Receipt</td>
							<td></td>
							<td>CR-0122</td>
							<td>ss</td>
							<td>Cash on hand</td>
							<td>(1,200.00)</td>
						</tr>
						<tr>
							<td></td>
							<td>Deposit</td>
							<td></td>
							<td>DS-0123</td>
							<td>aa</td>
							<td>Cash on hand</td>
							<td>(2,100.00)</td>
						</tr>
						<tr>
							<td></td>
							<td>Sub-total</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>(2,100.00)</td>
						</tr>

						<tr>
							<th >Total</th>
							<th >1,200.00</th>
							<th >1,200.00</th>
							<th >1,200.00</th>
							<th >1,200.00</th>
							<th >1,200.00</th>
							<th >1,200.00</th>
						</tr>
					</table>


				</div>
			</div>
		</div>
	</div>
</script>
<script id="receivableAegingDetail" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<div class="box-search">
						<div class="hidden-print">
					    	<input id="sorter" name="sorter"
					    	   data-role="dropdownlist"
					           data-value-primitive="true"
					           data-text-field="text"
					           data-value-field="value"
					           data-bind="value: sorter,
					                      source: sortList" />

					        <input id="sdate" name="sdate"
					           data-bind="value: sdate"
					           placeholder="From ..." />

					       	<input id="edate" name="edate"
					           data-bind="value: edate"
					           placeholder="To ..." />
					  		<button id="search" type="button" data-role="button">Segment</button>
					    </div>
					</div>

					<div class="block-title">
						<h3>ABC Co., Ltd</h3>
						<h2>Receivable Aging Detail</h2>
						<p>From 1 June 2016 to 30 June 2016</p>
					</div>

					<div class="row-fluid">
						<div class="span5">
							<div class="total-customer">
								<div class="span6">
									<p>Total Sale</p>
									<span>#</span>
								</div>
								<div class="span6">
									<p>Cash Receipt</p>
									<span>-</span>
								</div>
							</div>
						</div>
						<div class="span7">
							<div class="total-customer">
								<div class="span6">
									<p>Number of Customer</p>
									<span>-</span>
								</div>
								<div class="span6">
									<p>Average Aging</p>
									<span>-</span>
								</div>
							</div>
						</div>
					</div>

					<table class="table table-borderless table-condensed ">
						<tr>
							<th></th>
							<th>Type</th>
							<th>Date</th>
							<th>Num</th>
							<th>Due Date</th>
							<th>Aging</th>
							<th>Segment</th>
							<th>Balance</th>
						</tr>
						<tr>
							<td>Sovan Tevy</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Invoice</td>
							<td>7/1/16</td>
							<td>IV-0001</td>
							<td>anmsjssd</td>
							<td>Account Receivable</td>
							<td>1,000.00</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Cash Sale</td>
							<td></td>
							<td>SR-0003</td>
							<td>anmsjssd</td>
							<td>Cash on hand</td>
							<td>500.00</td>
							<td></td>
						</tr>
						<tr>
							<td>Toni</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Invoice</td>
							<td>7/1/16</td>
							<td>IV-0015</td>
							<td>asg</td>
							<td></td>
							<td>Account Receivable</td>
							<td>1,200.00</td>
						</tr>
						<tr>
							<td></td>
							<td>Cash Receipt</td>
							<td></td>
							<td>CR-0122</td>
							<td>ss</td>
							<td>Cash on hand</td>
							<td>(1,200.00)</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Deposit</td>
							<td></td>
							<td>DS-0123</td>
							<td>aa</td>
							<td></td>
							<td>Cash on hand</td>
							<td>(2,100.00)</td>
						</tr>
						<tr>
							<td></td>
							<td>Sub-total</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>(2,100.00)</td>
						</tr>

						<tr>
							<th colspan="4">Total</th>
							<th colspan="4">(600.00)</th>
						</tr>
					</table>


				</div>
			</div>
		</div>
	</div>
</script>

<script id="listInvoicesCollect" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<div class="box-search">
						<div class="hidden-print">
					    	<input id="sorter" name="sorter"
					    	   data-role="dropdownlist"
					           data-value-primitive="true"
					           data-text-field="text"
					           data-value-field="value"
					           data-bind="value: sorter,
					                      source: sortList" />

					        <input id="sdate" name="sdate"
					           data-bind="value: sdate"
					           placeholder="From ..." />

					       	<input id="edate" name="edate"
					           data-bind="value: edate"
					           placeholder="To ..." />
					  		<button id="search" type="button" data-role="button">Segment</button>
					    </div>
					</div>

					<div class="block-title">
						<h3>ABC Co., Ltd</h3>
						<h2>List Invoices Collect</h2>
						<p>From 1 June 2016 to 30 June 2016</p>
					</div>

					<div class="row-fluid">
						<div class="span5">
							<div class="total-customer">
								<div class="span6">
									<p>Total Sale</p>
									<span>#</span>
								</div>
								<div class="span6">
									<p>Customer Balance</p>
									<span>-</span>
								</div>
							</div>
						</div>
						<div class="span7">
							<div class="total-customer">
								<div class="span6">
									<p>Number of Customer Balance</p>
									<span>-</span>
								</div>
								<div class="span6">
									<p>Average Aging</p>
									<span>-</span>
								</div>
							</div>
						</div>
					</div>

					<table class="table table-borderless table-condensed ">
						<tr>
							<th>Type</th>
							<th>Date</th>
							<th>Num</th>
							<th>Name</th>
							<th>Due Date</th>
							<th>Status</th>
							<th>Segment</th>
							<th>Balance</th>

						</tr>
						<tr>
							<td>Sovan Tevy</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Invoice</td>
							<td>7/1/16</td>
							<td>IV-0001</td>
							<td>anmsjssd</td>
							<td>Account Receivable</td>
							<td>1,000.00</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Cash Sale</td>
							<td></td>
							<td>SR-0003</td>
							<td>anmsjssd</td>
							<td>Cash on hand</td>
							<td>500.00</td>
							<td></td>
						</tr>
						<tr>
							<td>Toni</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Invoice</td>
							<td>7/1/16</td>
							<td>IV-0015</td>
							<td>asg</td>
							<td>Account Receivable</td>
							<td>1,200.00</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Cash Receipt</td>
							<td></td>
							<td>CR-0122</td>
							<td>ss</td>
							<td>Cash on hand</td>
							<td>(1,200.00)</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Deposit</td>
							<td></td>
							<td>DS-0123</td>
							<td>aa</td>
							<td>Cash on hand</td>
							<td>(2,100.00)</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Sub-total</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>(2,100.00)</td>
							<td></td>
						</tr>

						<tr>
							<th colspan="4">Total</th>
							<th colspan="4">(600.00)</th>
						</tr>
					</table>


				</div>
			</div>
		</div>
	</div>
</script>
<script id="collectReport" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<div class="box-search">
						<div class="hidden-print">
					    	<input id="sorter" name="sorter"
					    	   data-role="dropdownlist"
					           data-value-primitive="true"
					           data-text-field="text"
					           data-value-field="value"
					           data-bind="value: sorter,
					                      source: sortList" />

					        <input id="sdate" name="sdate"
					           data-bind="value: sdate"
					           placeholder="From ..." />

					       	<input id="edate" name="edate"
					           data-bind="value: edate"
					           placeholder="To ..." />
					  		<button id="search" type="button" data-role="button">Segment</button>
					    </div>
					</div>

					<div class="block-title">
						<h3>ABC Co., Ltd</h3>
						<h2>Collect Report</h2>
						<p>From 1 June 2016 to 30 June 2016</p>
					</div>

					<div class="row-fluid">
						<div class="span5">
							<div class="total-customer">
								<div class="span6">
									<p>Total Sale</p>
									<span>#</span>
								</div>
								<div class="span6">
									<p>Customer Balance</p>
									<span>-</span>
								</div>
							</div>
						</div>
						<div class="span7">
							<div class="total-customer">
								<div class="span6">
									<p>NUmber of Customer</p>
									<span>-</span>
								</div>
								<div class="span6">
									<p>Number</p>
									<span>-</span>
								</div>
							</div>
						</div>
					</div>

					<table class="table table-borderless table-condensed ">
						<tr>
							<th>Type</th>
							<th>Date</th>
							<th>Num</th>
							<th>Name</th>
							<th>Invoice date</th>
							<th>Status</th>
							<th>Aging</th>
							<th>Balance</th>
						</tr>
						<tr>
							<td>Sovan Tevy</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>Total</td>
						<tr>
							<td></td>
							<td>Invoice</td>
							<td>7/1/16</td>
							<td>IV-0001</td>
							<td>anmsjssd</td>
							<td>Account Receivable</td>
							<td>1,000.00</td>
							<td>Total</td>
						</tr>
						<tr>
							<td></td>
							<td>Cash Sale</td>
							<td></td>
							<td>SR-0003</td>
							<td>anmsjssd</td>
							<td>Cash on hand</td>
							<td>500.00</td>
							<td>Total</td>
						</tr>
						<tr>
							<td>Toni</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>Total</td>
						</tr>
						<tr>
							<td></td>
							<td>Invoice</td>
							<td>7/1/16</td>
							<td>IV-0015</td>
							<td>asg</td>
							<td>Account Receivable</td>
							<td>1,200.00</td>
							<td>Total</td>
						</tr>
						<tr>
							<td></td>
							<td>Cash Receipt</td>
							<td></td>
							<td>CR-0122</td>
							<td>ss</td>
							<td>Cash on hand</td>
							<td>(1,200.00)</td>
							<td>Total</td>
						</tr>
						<tr>
							<td></td>
							<td>Deposit</td>
							<td></td>
							<td>DS-0123</td>
							<td>aa</td>
							<td>Cash on hand</td>
							<td>(2,100.00)</td>
							<td>Total</td>
						</tr>
						<tr>
							<td></td>
							<td>Sub-total</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>(2,100.00)</td>
							<td>Total</td>
						</tr>

						<tr>
							<th >Total</th>
							<th >1,200.00</th>
							<th >1,200.00</th>
							<th >1,200.00</th>
							<th >1,200.00</th>
							<th >1,200.00</th>
							<th >1,200.00</th>
							<th>Total</th>
						</tr>
					</table>

				</div>
			</div>
		</div>
	</div>
</script>
<script id="invoiceList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<div class="box-search">
						<div class="hidden-print">
					    	<input id="sorter" name="sorter"
					    	   data-role="dropdownlist"
					           data-value-primitive="true"
					           data-text-field="text"
					           data-value-field="value"
					           data-bind="value: sorter,
					                      source: sortList" />

					        <input id="sdate" name="sdate"
					           data-bind="value: sdate"
					           placeholder="From ..." />

					       	<input id="edate" name="edate"
					           data-bind="value: edate"
					           placeholder="To ..." />
					  		<button id="search" type="button" data-role="button">Segment</button>
					    </div>
					</div>

					<div class="block-title">
						<h3>ABC Co., Ltd</h3>
						<h2>Invoice List</h2>
						<p>From 1 June 2016 to 30 June 2016</p>
					</div>

					<div class="row-fluid">
						<div class="span5">
							<div class="total-customer">
								<div class="span6">
									<p>Total Sale</p>
									<span>#</span>
								</div>
								<div class="span6">
									<p>Customer Balance</p>
									<span>-</span>
								</div>
							</div>
						</div>
						<div class="span7">
							<div class="total-customer">
								<div class="span6">
									<p>Number of Customer</p>
									<span>-</span>
								</div>
								<div class="span6">
									<p>Number</p>
									<span>-</span>
								</div>
							</div>
						</div>
					</div>

					<table class="table table-borderless table-condensed ">
						<tr>
							<th>Type</th>
							<th>Date</th>
							<th>Num</th>
							<th>Name</th>
							<th>Dus date</th>
							<th>Status</th>
							<th>Segment</th>
							<th>Balance</th>
						</tr>
						<tr>
							<td>Sovan Tevy</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Invoice</td>
							<td>7/1/16</td>
							<td>IV-0001</td>
							<td>anmsjssd</td>
							<td>Account Receivable</td>
							<td>1,000.00</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Cash Sale</td>
							<td></td>
							<td>SR-0003</td>
							<td>anmsjssd</td>
							<td>Cash on hand</td>
							<td>500.00</td>
							<td></td>
						</tr>
						<tr>
							<td>Toni</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Invoice</td>
							<td>7/1/16</td>
							<td>IV-0015</td>
							<td>asg</td>
							<td></td>
							<td>Account Receivable</td>
							<td>1,200.00</td>
						</tr>
						<tr>
							<td></td>
							<td>Cash Receipt</td>
							<td></td>
							<td>CR-0122</td>
							<td>ss</td>
							<td>Cash on hand</td>
							<td>(1,200.00)</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>Deposit</td>
							<td></td>
							<td>DS-0123</td>
							<td>aa</td>
							<td></td>
							<td>Cash on hand</td>
							<td>(2,100.00)</td>
						</tr>
						<tr>
							<td></td>
							<td>Sub-total</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>(2,100.00)</td>
						</tr>

						<tr>
							<th colspan="4">Total</th>
							<th colspan="4">(600.00)</th>
						</tr>
					</table>


				</div>
			</div>
		</div>
	</div>
</script>

<script id="customerList" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">

					<div class="hidden-print">
						<span class="pull-right glyphicons no-js remove_2"
							onclick="javascript:window.history.back()"><i></i></span>

						<input data-role="dropdownlist"
						   data-option-label="Select Type..."
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: contact_type_id,
		                              source: contactTypeDS" />

		                <input data-role="dropdownlist"
						   data-option-label="Select Status..."
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: status,
		                              source: statusList" />

						<button id="search" type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button> |
						<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>
					</div>

					<h3 align="center" data-bind="text: lang.lang.customer_list"></h3>

					<br>

					<div data-role="grid"
						 data-groupable="true"
						 data-sortable="true"
						 data-pageable="true"
		                 data-columns="[
                             { field: 'number', title:'Number' },
                             { field: 'surname', title:'Surname' },
                             { field: 'name', title:'Name' },
                             { field: 'contact_type_id', title:'Type', template:'#=contact_type#' },
                             { field: 'phone', title:'Phone' },
                             { field: 'status', title:'Status', template:'#=status==1?&quot;Active&quot;:&quot;Inactive&quot;#' }
                                                       ]"
		                 data-bind="source: dataSource"></div>

				</div> <!-- //End div example-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>
</script>

<script id="customerBalance" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content">

					<div class="box-generic hidden-print">

						<span class="pull-right glyphicons no-js remove_2"
							onclick="javascript:window.history.back()"><i></i></span>

						Type:
						<input data-role="dropdownlist"
						   data-option-label="Select Type..."
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: contact_type_id,
		                              source: contactTypeDS" />

		                Status:
		                <input data-role="dropdownlist"
						   data-option-label="Select Status..."
		                   data-value-primitive="true"
		                   data-text-field="name"
		                   data-value-field="id"
		                   data-bind="value: status,
		                              source: statusList" />

		                As of Date:
		                <input data-role="datepicker"
		                   data-format="dd-MM-yyyy"
		                   data-parse-formats="yyyy-MM-dd"
		                   data-bind="value: date"
		                   placeholder="Pick A Date..." />

						<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button> |
						<button type="button" data-role="button" onclick="javascript:window.print()"><i class="icon-print"></i></button>
					</div>

					<br>

					<h3 align="center">Customer Balance</h3>

					<br>

					<div class="row-fluid row-merge">
						<div class="col-md-6">
							<div class="innerAll padding-bottom-none-phone">
								<a href="" class="widget-stats widget-stats-gray widget-stats-4">
									<span class="txt">Total Customer </span>
									<span class="count" data-format="n0" data-bind="text: dataSource.total()"></span>
									<span class="glyphicons user"><i></i></span>
									<div class="clearfix"></div>
									<i class="icon-play-circle"></i>
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="innerAll padding-bottom-none-phone">
								<a href="" class="widget-stats widget-stats-primary widget-stats-4">
									<span class="txt">Total Balance As Of <span data-format="dd-MM-yyyy" data-bind="text: date"></span> </span>
									<span class="count" data-bind="text: total"></span>
									<span class="glyphicons coins"><i></i></span>
									<div class="clearfix"></div>
									<i class="icon-play-circle"></i>
								</a>
							</div>
						</div>
					</div>

					<br>

					<div data-role="grid"
						 data-auto-bind="false"
						 data-groupable="true"
						 data-sortable="true"
						 data-pageable="true"
		                 data-columns="[
                            { field: 'number', title:'Number' },
                            { field: 'fullname', title:'Name' },
                            { field: 'contact_type_id', title:'Type', template:'#=contact_type#' },
                            { field: 'balance', title:'Balance',
                            	template:'#=kendo.toString(balance, &quot;c0&quot;, banhji.locale)#',
                            	attributes:{style:'text-align:right;'}
                            }
                         ]"
		                 data-bind="source: dataSource"></div>

				</div> <!-- //End div example-->
			</div><!-- //End div row-fluid-->
		</div>
	</div>
</script>


 
<!-- ***************************
*	Report Section       *
**************************** -->
<script id="reportDashboard" type="text/x-kendo-template" >
	<div class="row-fluid">
		<div class="span12 report-module">
			<h2>No. of Reports/lists by Module</h2>
			<ul>
				<li>
					<a href="#/customer_report_center">
						<img title="Report Customers" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/customers.png" alt="Customer">
					</a>
					<div class="span12">17</div>
				</li>
				<li>
					<a href="#/employee_report_center">
						<img title="Report Employee" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/employee.png" alt="Employee">
					</a>
					<div class="span12">6</div>
				</li>
				<li>
					<a href="#/vendor_report_center">
						<img title="Report Supplier" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/supplier.png" alt="Vendor">
					</a>
					<div class="span12">16</div>
				</li>
				<li>
					<a href="#/item_report_center">
						<img title="Report Inventory" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/inventory.png" alt="Inventory">
					</a>
					<div class="span12">12</div>
				</li>
				<li>
					<a href="#/services_report_center">
						<img title="Report Services" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/services.png" alt="Service">
					</a>
					<div class="span12"></div>
				</li>
				<li>
					<a href="#/cash_report_center">
						<img title="Report Cash" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/1.png" alt="Cash Management">
					</a>
					<div class="span12">6</div>
				</li>
				<li>
					<a href="#/accounting_report_center">
						<img title="Report Accounting" src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/accounting.png" alt="Customer">
					</a>
					<div class="span12">16</div>
				</li>
			</ul>
		</div>

		<div class="span12 capital-management">
			<h2>How efficient is your working capital management? </h2>
			<div class="span6">
				<div class="span6 capital-box">
					<p class="first-text">Receivable Collection Days</p>
					<span>30</span>
					<p class="month">12 months Average</p>
				</div>
				<div class="span6 capital-box">
					<p class="first-text">Payable Payment Days</p>
					<span>20</span>
					<p class="month">12 months Average</p>
				</div>
				<div class="span6 capital-box">
					<p class="first-text">Inventory Turnover Days</p>
					<span>40</span>
					<p class="month">12 months Average</p>
				</div>
				<div class="span6 capital-box">
					<p class="first-text">Cash Conversion Cycle</p>
					<span>50</span>
					<p class="month">12 months Average</p>
				</div>
			</div>
			<div class="span6 ">
				<div class="capital-chart">
					Chart
				</div>
			</div>
		</div>

		<div class="span12 ">
			<div class="row-fluid cash-payments">
				<h2>
					What is your ability to meet your present obligations (settling debts or possibly meet other
					unforeseen demand for cash payments)?
				</h2>
				<div class="span6">
					<div class="span6 capital-box">
						<p class="first-text">Current Ratio</p>
						<span>3</span>
						<p class="month">12 months Average</p>
					</div>
					<div class="span6 capital-box">
						<p class="first-text">Quick Ratio</p>
						<span>1.5</span>
						<p class="month">12 months Average</p>
					</div>
					<div class="span6 capital-box">
						<p class="first-text">Cash Ratio</p>
						<span>0.3</span>
						<p class="month">12 months Average</p>
					</div>
					<div class="span6 capital-box">
						<p class="first-text">Debt Service Coverage Ratio</p>
						<span>5</span>
						<p class="month">12 months Average</p>
					</div>
				</div>

				<div class="span6 ">
					<div class="capital-chart">
						Chart
					</div>
				</div>
			</div>

			<div class="row-fluid">
				<div class="span6 financial-block">
					<h2>How safe is your long term financial position?</h2>
					<div class="span6 financial-box">
						<p class="first-text">Debt/ Equity Ratio</p>
						<span>3</span>
						<p class="month">12 months Average</p>
					</div>
					<div class="span6 financial-box">
						<p class="first-text">Debt/ Asset Ratio</p>
						<span>1.5</span>
						<p class="month">1.5 months Average</p>
					</div>
				</div>
				<div class="span6 business-block">
					<h2>How safe is your long term financial position?</h2>
					<div class="span4 business-box">
						<p class="first-text">Earning before interest & tax</p>
						<span>10%</span>
						<p class="month">12 months Average</p>
					</div>
					<div class="span4 business-box">
						<p class="first-text">Return on Asset</p>
						<span>2</span>
						<p class="month">12 months Average</p>
					</div>
					<div class="span4 business-box">
						<p class="first-text">Return on Capital Employed</p>
						<span>20%</span>
						<p class="month">12 months Average</p>
					</div>
				</div>
			</div>
		</div>

		<div class="span12 revenue">
			<h2>Revenue Performance</h2>
			<div class="span3">
				<div class="revenue-box">
					<p class="first-text">Gross Margin</p>
					<span>13%</span>
					<p class="month">12 months Average</p>
				</div>
				<div class="revenue-box">
					<p class="first-text">Average Sale Growth Rate</p>
					<span>10%</span>
					<p class="month">12 months Average</p>
				</div>
			</div>
			<div class="span9">
				<div class="capital-chart">
					Chart
				</div>
			</div>
		</div>



	</div>
</script>



<!-- ***************************
*	Menu Section         	  *
**************************** -->
<script id="accountingMenu" type="text/x-kendo-template">
	<ul class="topnav">
		<li><a href='#/accounting' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/accounting_center'>CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/account'>New Account</a></li>
  				<li><a href='#/journal'>Journal</a></li>
  				<li><a href='#/sale_tax'>Tax</a></li>
  			</ul>
	  	</li>
	  	<li><a href='#/accounting_report_center'>REPORTS</a></li>
	  	<li><a href='#/accounting_setting' class='glyphicons settings'><i></i></a></li>
	</ul>
</script>
<script id="employeeMenu" type="text/x-kendo-template">
	<ul class="topnav">
		<li><a href='#/employees' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/employee_center'>CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/employee'>New Employee</a></li>
  				<li><a href='#/cash_advance'>Cash Advance</a></li>
  				<li><a href='#/expense'>Expense</a></li>
  			</ul>
	  	</li>
	  	<li><a href='#/employee_report_center'>REPORTS</a></li>
	  	<li><a href='#/employees_setting' class='glyphicons settings'><i></i></a></li>
	</ul>
</script>
<script id="vendorMenu" type="text/x-kendo-template">
	<ul class="topnav">
		<li><a href='#/vendors' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/vendor_center'>CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/vendor'>New Supplier</a></li>
  				<li><a href='#/purchase_order'>Purchase Order</a></li>
  				<li><a href='#/vendor_deposit'>Deposit</a></li>
  				<li><a href='#/grn'>Goods Received Note</a></li>
  				<li><a href='#/purchase'>Purchase</a></li>
  				<li><a href='#/purchase_return'>Purchase Return</a></li>
  				<li><a href='#/cash_payment'>Pay Bill</a></li>
  			</ul>
	  	</li>
	  	<li><a href='#/vendor_report_center'>REPORTS</a></li>
	  	<li><a href='#/vendor_setting' class='glyphicons settings'><i></i></a></li>
	</ul>
</script>
<script id="customerMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<li><a href='#/customers' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/customer_center'>CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/customer'><span data-bind="text: lang.new_customer"></span></a></li>
  				<li><a href='#/quote'>Quote</a></li>
  				<li><a href='#/sale_order'>Sale Order</a></li>
  				<li><a href='#/gdn'>Goods Delivery Note</a></li>
  				<li><a href='#/customer_deposit'>Deposit</a></li>
  				<li><a href='#/cash_sale'>Cash Sale</a></li>
  				<li><a href='#/invoice'><span data-bind="text: lang.invoice"></span></a></li>
  				<li><a href='#/statement'>Statement</a></li>
  				<li><a href='#/cash_receipt'>Receive Payment</a></li>
  				<!-- <li><a href="#/customerInvoiceSent">Invoice Sent To</a></li> -->
  				<li><a href='#/job'>Job</a></li>
  				<li><a href='#/recurring'>Recurring List</a></li>
  			</ul>
	  	</li>
	  	<li><a href='#/customer_report_center'>REPORTS</a></li>
	  	<li><a href='#/customer_setting' class='glyphicons settings'><i></i></a></li>
	</ul>
</script>
<script id="cashMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<li><a href='#/cash' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/cash_center'>CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/quote'>Quote</a></li>
  				<li><a href='#/sale_order'>Sale Order</a></li>
  				<li><a href='#/gdn'>Goods Delivery Note</a></li>
  				<li><a href='#/customer_deposit'>Deposit</a></li>
  				<li><a href='#/cash_sale'>Cash Sale</a></li>
  				<li><a href='#/invoice'><span data-bind="text: lang.invoice"></span></a></li>
  				<li><a href='#/statement'>Statement</a></li>
  				<li><a href='#/cash_receipt'>Receive Payment</a></li>
  				<li><a href="#/customerInvoiceSent">Invoice Sent To</a></li>
  				<li><a href='#/customer'><span data-bind="text: lang.new_customer"></span></a></li>
  			</ul>
	  	</li>
	  	<li><a href='#/cash_report_center'>REPORTS</a></li>
	  	<li><a href='#/cash_setting' class='glyphicons settings'><i></i></a></li>
	</ul>
</script>
<script id="waterMenu" type="text/x-kendo-template">
	<ul class="topnav">
	  	<li><a href='#/water' class='glyphicons home'><i></i></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><span data-bind="text: lang.lang.customer"></span> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/wCustomer_center'><span data-bind="text: lang.lang.customer_center"></span></a></li>
  				<li><a href='#/wNew_customer'><span data-bind="text: lang.lang.new_customer"></span></a></li>
  				<li><a href='#/wCustomer_order'><span data-bind="text: lang.lang.reorder_customer"></span></a></li>
  			</ul>
	  	</li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><span data-bind="text: lang.lang.reading"></span> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/wReading'><span data-bind="text: lang.lang.take_reading"></span></a></li>
  				<li><a href='#/wIR_reader'><span data-bind="text: lang.lang.ir_reader"></span></a></li>
  				<li><a href='#/wReading_book'><span data-bind="text: lang.lang.reading_book"></span></a></li>
  				<li><a href='#/wReading_center'><span data-bind="text: lang.lang.edit_reading"></span></a></li>
  			</ul>
	  	</li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><span data-bind="text: lang.lang.invoice"></span> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/wInvoice'><span data-bind="text: lang.lang.invoice"></span></a></li>
  				<li><a href='#/wPrint_center'><span data-bind="text: lang.lang.print"></span></a></li>
  			</ul>
	  	</li>
	  	<li><a href='#/cashier'><span data-bind="text: lang.lang.cashier"></span></a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><span data-bind="text: lang.lang.inventory"></span> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/wInventory_item'><span data-bind="text: lang.lang.inventory_center"></span></a></li>
  				<li><a href='#/item'><span data-bind="text: lang.lang.new_item"></span></a></li>
  				<li><a href='#/item_catalog'><span data-bind="text: lang.lang.new_catalog"></span></a></li>
  				<li><a href='#/item_assembly'><span data-bind="text: lang.lang.new_assembly"></span></a></li>
  			</ul>
	  	</li>
	  	<li><a href='#/wReport_center'><span data-bind="text: lang.lang.report"></span></a></li>
	  	<li><a href='#/wSettings' class='glyphicons settings'><i></i></a></li>
	</ul>
</script>
<script id="inventoryMenu" type="text/x-kendo-template">
	<ul class="topnav">
		<li><a href='#/inventories' class='glyphicons show_big_thumbnails'><i></i></a></li>
	  	<li><a href='#/item_center'>CENTER</a></li>
	  	<li role='presentation' class='dropdown'>
	  		<a class='dropdown-toggle glyphicons text_bigger' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'><i></i> <span class='caret'></span></a>
  			<ul class='dropdown-menu'>
  				<li><a href='#/item'><span data-bind="text: lang.lang.new_item"></span></a></li>
  				<li><a href='#/item_catalog'><span data-bind="text: lang.lang.new_catalog"></span></a></li>
  				<li><a href='#/item_assembly'><span data-bind="text: lang.lang.new_assembly"></span></a></li>
  				<li><a href='#/item_adjustment'>Item Adjustment</a></li>
  			</ul>
	  	</li>
	  	<li><a href='#/item_report_center'><span data-bind="text: lang.lang.report"></span></a></li>
	  	<li><a href='#/item_setting' class='glyphicons settings'><i></i></a></li>
	</ul>
</script>





<script src="https://s3-ap-southeast-1.amazonaws.com/app-data-20160518/components/js/libs/localforage.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.4.0/jszip.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
	localforage.config({
		driver: localforage.LOCALSTORAGE,
		name: 'userData'
	});
	var banhji = banhji || {};
	var baseUrl = "<?php echo base_url(); ?>";
	var apiUrl = baseUrl + 'api/';
	banhji.token = null;
	banhji.pageLoaded = {};
	// Initializing AWS Cognito service
	var userPool = new AWSCognito.CognitoIdentityServiceProvider.CognitoUserPool(poolData);
	// Initializing AWS S3 Service
	var bucket = new AWS.S3({params: {Bucket: 'banhji'}});
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
								limit: options.take,
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
				take: 100
			});
		return o;
	};
	banhji.userManagement = kendo.observable({
		lang : langVM,
		searchText : "",
		searchType : "contacts",
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
							limit: options.take,
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
							limit: options.take,
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
							limit: options.take,
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
							limit: options.take,
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
							limit: options.take,
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
							limit: options.take,
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
							limit: options.take,
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
							limit: options.take,
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
								//
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
							limit: options.take,
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
							limit: options.take,
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
							limit: options.take,
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
								limit: options.take,
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
							limit: data.take,
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
							limit: data.take,
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
	banhji.index = kendo.observable({
		lang 				: langVM,
		dataSource			: dataStore(apiUrl+"contact_reports/home"),
		graphDS  			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "contact_reports/home_graph",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				}
			},
			schema 	: {
				model: {
					id: 'id'
				},
				data: 'results',
				total: 'count'
			},
			sort: {
                field: "month",
                dir: "asc"
            },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			pageSize: 100
		}),
		companyLogo 		: '',
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
							limit: options.take,
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
		companyName 		: null,
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
		today 				: new Date(),
		ar 					: 0,
		ar_open 			: 0,
		ar_customer 		: 0,
		ar_overdue 			: 0,
		ap 					: 0,
		ap_open 			: 0,
		ap_vendor 			: 0,
		ap_overdue 			: 0,
		pageLoad 			: function(){
			var self = this;

			this.graphDS.fetch();

			this.dataSource.query({
				filter: [],
				page: 1,
				take: 5
			}).then(function(){
				var view = self.dataSource.view();

				self.set("ar", kendo.toString(view[0].ar, banhji.locale=="km-KH"?"c0":"c", banhji.locale));
				self.set("ar_open", kendo.toString(view[0].ar_open, "n0"));
				self.set("ar_customer", kendo.toString(view[0].ar_customer, "n0"));
				self.set("ar_overdue", kendo.toString(view[0].ar_overdue, "n0"));

				self.set("ap", kendo.toString(view[0].ap, banhji.locale=="km-KH"?"c0":"c", banhji.locale));
				self.set("ap_open", kendo.toString(view[0].ap_open, "n0"));
				self.set("ap_vendor", kendo.toString(view[0].ap_vendor, "n0"));
				self.set("ap_overdue", kendo.toString(view[0].ap_overdue, "n0"));
			});
		}
	});
	banhji.searchAdvanced =  kendo.observable({
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
						{ field:"sku", operator:"like", value: searchText },
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
			banhji.router.navigate('/item/'+e.data.id);
		},
		selectedAccount 		: function(e){
			e.preventDefault();

			var data = e.data;
			banhji.router.navigate('/accounting_center/'+e.data.id);
		}
    });


	//DAWINE -----------------------------------------------------------------------------------------
	banhji.source =  kendo.observable({
		lang 					: langVM,
		countryDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "countries",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			page:1,
			pageSize: 100
		}),
		//Contact
		contactDS				: new kendo.data.DataSource({
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
							limit: options.take,
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
			// group: { field: "contact_type" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		customerDS				: new kendo.data.DataSource({
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
							limit: options.take,
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
			filter: { field:"parent_id", operator:"where_related", model:"contact_type", value:1 },
			// group: { field: "contact_type" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		supplierDS				: new kendo.data.DataSource({
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
							limit: options.take,
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
			filter: { field:"parent_id", operator:"where_related", model:"contact_type", value:2 },
			// group: { field: "contact_type" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		employeeDS				: new kendo.data.DataSource({
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
							limit: options.take,
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
			filter: { field:"parent_id", operator:"where_related", model:"contact_type", value:3 },
			// group: { field: "contact_type" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		saleRepDS				: new kendo.data.DataSource({
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
							limit: options.take,
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
			filter: { field:"contact_type_id", value:10 },
			// group: { field: "contact_type" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Contact Type
		contactTypeDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "contacts/type",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + "contacts/type",
					type: "POST",
					headers: banhji.header,
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + "contacts/type",
					type: "PUT",
					headers: banhji.header,
					dataType: 'json'
				},
				destroy 	: {
					url: apiUrl + "contacts/type",
					type: "DELETE",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			page:1,
			pageSize: 100
		}),
		customerTypeDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "contacts/type",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + "contacts/type",
					type: "POST",
					headers: banhji.header,
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + "contacts/type",
					type: "PUT",
					headers: banhji.header,
					dataType: 'json'
				},
				destroy 	: {
					url: apiUrl + "contacts/type",
					type: "DELETE",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			filter: { field:"parent_id", value: 1 },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		supplierTypeDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "contacts/type",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				create 	: {
					url: apiUrl + "contacts/type",
					type: "POST",
					headers: banhji.header,
					dataType: 'json'
				},
				update 	: {
					url: apiUrl + "contacts/type",
					type: "PUT",
					headers: banhji.header,
					dataType: 'json'
				},
				destroy 	: {
					url: apiUrl + "contacts/type",
					type: "DELETE",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			filter: { field:"parent_id", value: 2 },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Job
		jobDS					: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "jobs",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			page:1,
			pageSize: 100
		}),
		//Currency
		currencyDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "currencies",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			group: { field: "group"},
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Item
		itemDS					: new kendo.data.DataSource({
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
							limit: options.take,
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
			group: { field: "item_type"},
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Tax Item
		taxItemDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "tax_items",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			group: { field: "category"},
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Accounting
		accountDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			//group:{ field: "account_type_name" },
			sort:{ field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 1000
		}),
		subAccountDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			filter:{ field: "sub_of_id", value:0 },
			sort:{ field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 1000
		}),
		accountTypeDS			: new kendo.data.DataSource({
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
							limit: options.take,
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
			filter:{ field:"number <>", value:"" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 1000
		}),
		cashAccountDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			filter: [
				{ field:"account_type_id", value: 10 },
				{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Item Income / Item Revenue / Customer Revenue / Service Revenue Account
		incomeAccountDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			filter: [
					{ field:"account_type_id", operator:"where_in", value: [35,39] },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Expense
		expenseAccountDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			filter: [
					{ field:"account_type_id", operator:"where_in", value: [36,37,38,40,41,42,43] },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		ARAccountDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			filter: [
					{ field:"account_type_id", value: 12 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		APAccountDS				: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			filter: [
					{ field:"account_type_id", operator:"where_in", value: [23,24] },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		tradeDiscountDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			filter: [
					{ field:"id", value: 72 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		settlementDiscountDS		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			filter: [
					{ field:"id", value:99 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		supplierTradeDiscountDS		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			filter: [
					{ field:"account_type_id", value: 36 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		supplierSettlementDiscountDS		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			filter: [
					{ field:"id", value:109 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		prepaidAccountDS		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			filter: [
					{ field:"account_type_id", operator:"where_in", value: [14,21] },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		depositAccountDS		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			filter: [
					{ field:"account_type_id", operator:"where_in", value: [25,30] },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		cogsAccountDS		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			filter: [
					{ field:"account_type_id", value: 36 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		inventoryAccountDS		: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "accounts",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			filter: [
					{ field:"account_type_id", value: 13 },
					{ field:"status", value: 1 }
			],
			sort: { field:"number", dir:"asc" },
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			page:1,
			pageSize: 100
		}),
		//Payment Term, Method, Segment
		paymentTermDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "payment_terms",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			page:1,
			pageSize: 100
		}),
		paymentMethodDS			: new kendo.data.DataSource({
			transport: {
				read 	: {
					url: apiUrl + "payment_methods",
					type: "GET",
					headers: banhji.header,
					dataType: 'json'
				},
				parameterMap: function(options, operation) {
					if(operation === 'read') {
						return {
							page: options.page,
							limit: options.take,
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
			page:1,
			pageSize: 100
		}),
		segmentItemDS			: new kendo.data.DataSource({
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
							limit: options.take,
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
			group: { field: "segment[0].name"},
			batch: true,
			serverFiltering: true,
			serverSorting: true,
			serverPaging: true,
			pageSize: 100
		}),
		//Recurring
		frequencyList 			: [
			{ id: 'Daily', name: 'Day' },
			{ id: 'Weekly', name: 'Week' },
			{ id: 'Monthly', name: 'Month' },
			{ id: 'Annually', name: 'Annual' }
		],
		monthOptionList 		: [
			{ id: 'Day', name: 'Day' },
			{ id: '1st', name: '1st' },
			{ id: '2nd', name: '2nd' },
			{ id: '3rd', name: '3rd' },
			{ id: '4th', name: '4th' }
		],
		monthList 				: [
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
		weekDayList 			: [
			{ id: 0, name: 'Sunday' },
			{ id: 1, name: 'Monday' },
			{ id: 2, name: 'Tuesday' },
			{ id: 3, name: 'Wednesday' },
			{ id: 4, name: 'Thurday' },
			{ id: 5, name: 'Friday' },
			{ id: 6, name: 'Saturday' }
		],
		dayList 				: [
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
		sortList				: [
	 		{ text:"All", value: "all" },
	 		{ text:"Today", value: "today" },
	 		{ text:"This Week", value: "week" },
	 		{ text:"This Month", value: "month" },
	 		{ text:"This Year", value: "year" }
		],
		statusList 				: [
			{ "id": 1, "name": "Active" },
			{ "id": 0, "name": "Inactive" },
			{ "id": 2, "name": "Void" }
        ],
		genderList				: ["M", "F"],
		user_id					: banhji.userData.id,
		cash_account_id 		: 10,
		ap_account_id 			: [23,24],
		getFiscalDate 			: function(){
			today = new Date(),
			year = new Date(),
			year.setFullYear(year.getFullYear()-1),
			fiscalDate = new Date(year.getFullYear() +"-"+ banhji.institute.fiscal_date);

			return fiscalDate;
		}
	});

	/*********************
	*  Accounting Section  *
	**********************/
	banhji.customerList = kendo.observable({
		lang 					: langVM,
		dataSource 				: dataStore(apiUrl + "contacts/customer"),
		contactTypeDS			: banhji.source.customerTypeDS,
		statusList 				: banhji.source.statusList,
		contact_type_id 		: null,
		status 					: null,		
		pageLoad 				: function(){

		},
		search 					: function(){
			var para = [],
			status = this.get("status"),
			contact_type_id = this.get("contact_type_id");

			if(status!==null){
				para.push({ field:"status", value: status });
			}

			if(contact_type_id){
				para.push({ field:"contact_type_id", value: contact_type_id });
			}

			this.dataSource.filter(para);
			this.set("status", null);
			this.set("contact_type_id", null);
		}
	});
	banhji.customerSale = kendo.observable({
		lang 				: langVM,
		locale 				: banhji.locale,
		summarySale 		: dataStore(apiUrl + "sales/summary_customer"),
		detailSale 			: dataStore(apiUrl + "sales/detail_customer"),
		transactions 		: dataStore(apiUrl + "sales/transaction_customer"),
		depositDetail 		: dataStore(apiUrl + "sales/deposit_detail"),
		summaryProduct 		: dataStore(apiUrl + "sales/summary_list"),
		productSale 		: dataStore(apiUrl + "sales/detail_list"),
		summaryBalance 	    : dataStore(apiUrl + "sales/summary_balance"),
		saleDetail  		: dataStore(apiUrl + "sales/detail_balance"),
		count 				: 0,
		companyName 		: null,
		startDate 			: new Date(),
		endDate				: new Date(),
		sorter				: '',
		sortList			: banhji.source.sortList,
		dateMax 			: function(e) {
			$('#edate').css('width', '160px');
			var edate = $('#edate').kendoDatePicker().data("kendoDatePicker");
			edate.min(e.sender.value());
		},
		dateMin 			: function(e) {
			$('#sdate').css('width', '160px');
			var sdate = $('#sdate').kendoDatePicker().data("kendoDatePicker");
			sdate.max(e.sender.value());
		},
		dateChange 			: function(){
			// var strDate = "";

			// 	if(this.startDate && this.endDate){
			// 		strDate = "From " + kendo.toString(this.startDate, "dd-MM-yyyy") + " To " + kendo.toString(this.endDate, "dd-MM-yyyy");
			// 	}else if(this.startDate){
			// 		strDate = "On " + kendo.toString(this.startDate,"dd-MM-yyyy");
			// 	}else if(this.endDate){
			// 		strDate = "As Of " + kendo.toString(this.endDate,"dd-MM-yyyy");
			// 	}else{
			// 		strDate = "";
			// 	}

			var today = new Date(),
			day = today.getDate();
        	sdate = "",
        	edate = "",
        	value = this.get('sorter');

			switch(value){
			case "today":
				sdate = today;

			  	break;
			case "week":
				var first = new Date(today.getTime() - 60*60*24* day*1000),
				last = new Date(today.getTime() + 60*60*24* day*1000);

				sdate = first;
				edate = last;

			  	break;
			case "month":
				var sdate = new Date(today.getFullYear(), today.getMonth(), 1),
				edate = new Date(today.getFullYear(), today.getMonth() + 1, 0);

			  	break;
			case "year":
			  	var sdate = new Date(today.getFullYear(), 0, 1),
			  	edate = new Date(today.getFullYear(), 11, 31);

			  	break;
			default:

			}

			this.set("startDate", sdate);
			this.set("endDate", edate);
			// start.value(sdate);
			// end.value(edate);

			// start.max(end.value());
   //      	end.min(start.value());

   //      	dateChanges();
   //          });

   //          start.max(end.value());
   //          end.min(start.value());
		}

	});


    /*************************
	*	Reports Module Section   *
	**************************/
    banhji.reportDashboard = kendo.observable({
    	lang 				: langVM,
    	pageLoad 			: function(id){

		}
    });


	/* views and layout */
	banhji.view = {
		layout 		: new kendo.Layout('#layout', {model: banhji.Layout}),
		blank		: new kendo.View('<div></div>'),
		index  		: new kendo.Layout("#index", {model: banhji.index}),
		menu 		: new kendo.Layout('#menu-tmpl', {model: banhji.userManagement}),
		searchAdvanced: new kendo.Layout("#searchAdvanced", {model: banhji.searchAdvanced}),


		saleSummaryCustomer: new kendo.Layout("#saleSummaryCustomer", {model: banhji.customerSale}),
		saleSummaryCustomerBySegment: new kendo.Layout("#saleSummaryCustomerBySegment", {model: banhji.customerSale}),
		saleDetailCustomer: new kendo.Layout("#saleDetailCustomer", {model: banhji.customerSale}),
		saleSummaryProduct: new kendo.Layout("#saleSummaryProduct", {model: banhji.customerSale}),
		customerTransactionList: new kendo.Layout("#customerTransactionList", {model: banhji.customerSale}),
		depositDetailCustomer: new kendo.Layout("#depositDetailCustomer", {model: banhji.customerSale}),
		saleDetailProduct : new kendo.Layout("#saleDetailProduct", {model: banhji.customerSale}),
		customerBalanceSummary : new kendo.Layout("#customerBalanceSummary", {model: banhji.customerSale}),
		customerBalanceDetail : new kendo.Layout("#customerBalanceDetail", {model: banhji.customerSale}),
		receivableAgingSummary : new kendo.Layout("#receivableAgingSummary", {model: banhji.receivableAgingSummary}),
		receivableAgingDetail : new kendo.Layout("#receivableAgingDetail", {model: banhji.receivableAgingDetail}),
		listInvoicesCollect : new kendo.Layout("#listInvoicesCollect", {model: banhji.listInvoicesCollect}),
		collectReport : new kendo.Layout("#collectReport", {model: banhji.collectReport}),
		invoiceList : new kendo.Layout("#invoiceList", {model: banhji.invoiceList}),
		customerList : new kendo.Layout("#customerList", {model: banhji.customerList}),


		//Report
		reportDashboard: new kendo.Layout("#reportDashboard", {model: banhji.reportDashboard}),
		customerReportCenter: new kendo.Layout("#customerReportCenter", {model: banhji.customerReportCenter}),

		//Menu
		accountingMenu: new kendo.View("#accountingMenu", {model: langVM}),
		employeeMenu: new kendo.View("#employeeMenu", {model: langVM}),
		vendorMenu: new kendo.View("#vendorMenu", {model: langVM}),
		customerMenu: new kendo.View("#customerMenu", {model: langVM}),
		cashMenu: new kendo.View("#cashMenu", {model: langVM}),
		waterMenu: new kendo.View("#waterMenu", {model: langVM}),
		inventoryMenu: new kendo.View("#inventoryMenu", {model: langVM})
	};
	/* views and layout */
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
	/* Login page */
	banhji.router.route('/', function(){
		var blank = new kendo.View('#blank-tmpl');
		banhji.view.layout.showIn('#content', banhji.view.index);
		banhji.view.layout.showIn('#menu', banhji.view.menu);
		$('#main-top-navigation').append('<li><a href="\#">Home</a></li>');
		$('#current-section').text("");
		$("#secondary-menu").html("");
		banhji.index.getLogo();
		banhji.index.pageLoad();
	});
	banhji.router.route("/search_advanced", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			var vm = banhji.searchAdvanced;

			banhji.view.layout.showIn("#content", banhji.view.searchAdvanced);

			if(banhji.pageLoaded["search_advanced"]==undefined){
				banhji.pageLoaded["search_advanced"] = true;

		        vm.contactTypeDS.read();
			}

			vm.pageLoad();
		}
	});


	/*************************
	*   Customer Section   *
	**************************/

	banhji.router.route("/sale_summary_customer", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');			
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleSummaryCustomer);
			banhji.customerSale.summarySale.read();			
			banhji.customerSale.summarySale.bind('requestEnd', function(e){
				if(e.response) {
					banhji.customerSale.set('count', e.response.count);
					kendo.culture(banhji.locale);					
					banhji.customerSale.set('total', kendo.toString(e.response.total, 'c2'));
				}
			});
		}

	});

	banhji.router.route("/sale_detail_customer", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleDetailCustomer);
			banhji.customerSale.detailSale.read();
			banhji.customerSale.detailSale.bind('requestEnd', function(e){
				if(e.response) {
					banhji.customerSale.set('count', e.response.count);
					kendo.culture(banhji.locale);
					banhji.customerSale.set('total', kendo.toString(e.response.total, 'c2'));
				}
			});
		}
	});
	banhji.router.route("/sale_summary_product", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');			
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleSummaryProduct);
			banhji.customerSale.summaryProduct.read();			
			banhji.customerSale.summaryProduct.bind('requestEnd', function(e){
				if(e.response) {
					banhji.customerSale.set('count', e.response.count);
					kendo.culture(banhji.locale);					
					banhji.customerSale.set('total_avg', kendo.toString(e.response.total_avg, 'c2'));
					banhji.customerSale.set('total_sale', kendo.toString(e.response.total_sale, 'c2'));
					banhji.customerSale.set('gpm', e.response.gpm);
				}
			});
		}

	});
	banhji.router.route("/customer_transaction_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.customerTransactionList);
			banhji.customerSale.transactions.read();
			banhji.customerSale.transactions.bind('requestEnd', function(e){
				if(e.response) {
					banhji.customerSale.set('count', e.response.count);
					kendo.culture(banhji.locale);
					banhji.customerSale.set('total', kendo.toString(e.response.total, 'c2'));
					banhji.customerSale.set('cashSale', kendo.toString(e.response.cashSale, 'c2'));
				}
			});
		}

	});
	banhji.router.route("/deposit_detail_customer", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.depositDetailCustomer);
			banhji.customerSale.depositDetail.read();
			banhji.customerSale.depositDetail.bind('requestEnd', function(e){
				if(e.response) {
					banhji.customerSale.set('count', e.response.count);
					kendo.culture(banhji.locale);
					banhji.customerSale.set('total', kendo.toString(e.response.total, 'c2'));
					banhji.customerSale.set('cashSale', kendo.toString(e.response.cashSale, 'c2'));
				}
			});
		}
	});
	banhji.router.route("/sale_detail_product", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.saleDetailProduct);
			banhji.customerSale.productSale.read();
			banhji.customerSale.productSale.bind('requestEnd', function(e){
				if(e.response) {
					banhji.customerSale.set('count', e.response.count);
					kendo.culture(banhji.locale);
					banhji.customerSale.set('total', kendo.toString(e.response.total, 'c2'));					
				}
			});
		}
	});
	banhji.router.route("/customer_balance_summary", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');			
		}else{
			banhji.view.layout.showIn("#content", banhji.view.customerBalanceSummary);
			banhji.customerSale.summaryBalance.read();			
			banhji.customerSale.summaryBalance.bind('requestEnd', function(e){
				if(e.response) {
					banhji.customerSale.set('count', e.response.count);
					kendo.culture(banhji.locale);					
					banhji.customerSale.set('total', kendo.toString(e.response.total, 'c2'));
				}
			});
		}

	});
	banhji.router.route("/customer_balance_detail", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.customerBalanceDetail);
			banhji.customerSale.productSale.read();
			banhji.customerSale.productSale.bind('requestEnd', function(e){
				if(e.response) {
					banhji.customerSale.set('count', e.response.count);
					kendo.culture(banhji.locale);
					banhji.customerSale.set('total', kendo.toString(e.response.total, 'c2'));					
				}
			});
		}
	});
	banhji.router.route("/receivable_aging_summary", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.receivableAgingSummary);

			//var vm = banhji.saleSummaryCustomer;

			if(banhji.pageLoaded["receivableAgingSummary"]==undefined){
				banhji.pageLoaded["receivableAgingSummary"] = true;

				function startChange() {
                    var startDate = start.value(),
                    endDate = end.value();

                    if (startDate) {
                        startDate = new Date(startDate);
                        startDate.setDate(startDate.getDate());
                        end.min(startDate);
                    } else if (endDate) {
                        start.max(new Date(endDate));
                    } else {
                        endDate = new Date();
                        start.max(endDate);
                        end.min(endDate);
                    }

                    dateChanges();
                }

                function endChange() {
                    var endDate = end.value(),
                    startDate = start.value();

                    if (endDate) {
                        endDate = new Date(endDate);
                        endDate.setDate(endDate.getDate());
                        start.max(endDate);
                    } else if (startDate) {
                        end.min(new Date(startDate));
                    } else {
                        endDate = new Date();
                        start.max(endDate);
                        end.min(endDate);
                    }

                    dateChanges();
                }

                function dateChanges(){
                	var strDate = "";

					if(start.value() && end.value()){
						strDate = "From " + kendo.toString(new Date(start.value()), "dd-MM-yyyy") + " To " + kendo.toString(new Date(end.value()), "dd-MM-yyyy");
					}else if(start.value()){
						strDate = "On " + kendo.toString(new Date(start.value()),"dd-MM-yyyy");
					}else if(end.value()){
						strDate = "As Of " + kendo.toString(new Date(end.value()),"dd-MM-yyyy");
					}else{
						strDate = "";
					}

					$("#strDate").text(strDate);
                }

                var start = $("#sdate").kendoDatePicker({
                	format: "dd-MM-yyyy",
                    change: startChange
                }).data("kendoDatePicker");

                var end = $("#edate").kendoDatePicker({
                	format: "dd-MM-yyyy",
                    change: endChange
                }).data("kendoDatePicker");

                var sorter = $("#sorter").change(function(){
                	var today = new Date(),
                	sdate = "",
                	edate = "",
                	value = $("#sorter").val();

					switch(value){
					case "today":
						sdate = today;

					  	break;
					case "week":
						var first = today.getDate() - today.getDay(),
						last = first + 6;

						var sdate = new Date(today.setDate(first)),
						edate = new Date(today.setDate(last));

					  	break;
					case "month":
						var sdate = new Date(today.getFullYear(), today.getMonth(), 1),
						edate = new Date(today.getFullYear(), today.getMonth() + 1, 0);

					  	break;
					case "year":
					  	var sdate = new Date(today.getFullYear(), 0, 1),
					  	edate = new Date(today.getFullYear(), 11, 31);

					  	break;
					default:

					}

					start.value(sdate);
					end.value(edate);

					start.max(end.value());
                	end.min(start.value());

                	dateChanges();
                });

                start.max(end.value());
                end.min(start.value());





			}

			vm.pageLoad();
		}
	});
	banhji.router.route("/receivable_aging_detail", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.customerBalanceDetail);

			//var vm = banhji.saleSummaryCustomer;

			if(banhji.pageLoaded["customerBalanceDetail"]==undefined){
				banhji.pageLoaded["customerBalanceDetail "] = true;

				function startChange() {
                    var startDate = start.value(),
                    endDate = end.value();

                    if (startDate) {
                        startDate = new Date(startDate);
                        startDate.setDate(startDate.getDate());
                        end.min(startDate);
                    } else if (endDate) {
                        start.max(new Date(endDate));
                    } else {
                        endDate = new Date();
                        start.max(endDate);
                        end.min(endDate);
                    }

                    dateChanges();
                }

                function endChange() {
                    var endDate = end.value(),
                    startDate = start.value();

                    if (endDate) {
                        endDate = new Date(endDate);
                        endDate.setDate(endDate.getDate());
                        start.max(endDate);
                    } else if (startDate) {
                        end.min(new Date(startDate));
                    } else {
                        endDate = new Date();
                        start.max(endDate);
                        end.min(endDate);
                    }

                    dateChanges();
                }

                function dateChanges(){
                	var strDate = "";

					if(start.value() && end.value()){
						strDate = "From " + kendo.toString(new Date(start.value()), "dd-MM-yyyy") + " To " + kendo.toString(new Date(end.value()), "dd-MM-yyyy");
					}else if(start.value()){
						strDate = "On " + kendo.toString(new Date(start.value()),"dd-MM-yyyy");
					}else if(end.value()){
						strDate = "As Of " + kendo.toString(new Date(end.value()),"dd-MM-yyyy");
					}else{
						strDate = "";
					}

					$("#strDate").text(strDate);
                }

                var start = $("#sdate").kendoDatePicker({
                	format: "dd-MM-yyyy",
                    change: startChange
                }).data("kendoDatePicker");

                var end = $("#edate").kendoDatePicker({
                	format: "dd-MM-yyyy",
                    change: endChange
                }).data("kendoDatePicker");

                var sorter = $("#sorter").change(function(){
                	var today = new Date(),
                	sdate = "",
                	edate = "",
                	value = $("#sorter").val();

					switch(value){
					case "today":
						sdate = today;

					  	break;
					case "week":
						var first = today.getDate() - today.getDay(),
						last = first + 6;

						var sdate = new Date(today.setDate(first)),
						edate = new Date(today.setDate(last));

					  	break;
					case "month":
						var sdate = new Date(today.getFullYear(), today.getMonth(), 1),
						edate = new Date(today.getFullYear(), today.getMonth() + 1, 0);

					  	break;
					case "year":
					  	var sdate = new Date(today.getFullYear(), 0, 1),
					  	edate = new Date(today.getFullYear(), 11, 31);

					  	break;
					default:

					}

					start.value(sdate);
					end.value(edate);

					start.max(end.value());
                	end.min(start.value());

                	dateChanges();
                });

                start.max(end.value());
                end.min(start.value());





			}

			vm.pageLoad();
		}
	});
	banhji.router.route("/list_invoices_collect", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.listInvoicesCollect);

			//var vm = banhji.saleSummaryCustomer;

			if(banhji.pageLoaded["listInvoicesCollect"]==undefined){
				banhji.pageLoaded["listInvoicesCollect"] = true;

				function startChange() {
                    var startDate = start.value(),
                    endDate = end.value();

                    if (startDate) {
                        startDate = new Date(startDate);
                        startDate.setDate(startDate.getDate());
                        end.min(startDate);
                    } else if (endDate) {
                        start.max(new Date(endDate));
                    } else {
                        endDate = new Date();
                        start.max(endDate);
                        end.min(endDate);
                    }

                    dateChanges();
                }

                function endChange() {
                    var endDate = end.value(),
                    startDate = start.value();

                    if (endDate) {
                        endDate = new Date(endDate);
                        endDate.setDate(endDate.getDate());
                        start.max(endDate);
                    } else if (startDate) {
                        end.min(new Date(startDate));
                    } else {
                        endDate = new Date();
                        start.max(endDate);
                        end.min(endDate);
                    }

                    dateChanges();
                }

                function dateChanges(){
                	var strDate = "";

					if(start.value() && end.value()){
						strDate = "From " + kendo.toString(new Date(start.value()), "dd-MM-yyyy") + " To " + kendo.toString(new Date(end.value()), "dd-MM-yyyy");
					}else if(start.value()){
						strDate = "On " + kendo.toString(new Date(start.value()),"dd-MM-yyyy");
					}else if(end.value()){
						strDate = "As Of " + kendo.toString(new Date(end.value()),"dd-MM-yyyy");
					}else{
						strDate = "";
					}

					$("#strDate").text(strDate);
                }

                var start = $("#sdate").kendoDatePicker({
                	format: "dd-MM-yyyy",
                    change: startChange
                }).data("kendoDatePicker");

                var end = $("#edate").kendoDatePicker({
                	format: "dd-MM-yyyy",
                    change: endChange
                }).data("kendoDatePicker");

                var sorter = $("#sorter").change(function(){
                	var today = new Date(),
                	sdate = "",
                	edate = "",
                	value = $("#sorter").val();

					switch(value){
					case "today":
						sdate = today;

					  	break;
					case "week":
						var first = today.getDate() - today.getDay(),
						last = first + 6;

						var sdate = new Date(today.setDate(first)),
						edate = new Date(today.setDate(last));

					  	break;
					case "month":
						var sdate = new Date(today.getFullYear(), today.getMonth(), 1),
						edate = new Date(today.getFullYear(), today.getMonth() + 1, 0);

					  	break;
					case "year":
					  	var sdate = new Date(today.getFullYear(), 0, 1),
					  	edate = new Date(today.getFullYear(), 11, 31);

					  	break;
					default:

					}

					start.value(sdate);
					end.value(edate);

					start.max(end.value());
                	end.min(start.value());

                	dateChanges();
                });

                start.max(end.value());
                end.min(start.value());





			}

			vm.pageLoad();
		}
	});
	banhji.router.route("/collect_report", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.collectReport);

			//var vm = banhji.saleSummaryCustomer;

			if(banhji.pageLoaded["collectReport"]==undefined){
				banhji.pageLoaded["collectReport"] = true;

				function startChange() {
                    var startDate = start.value(),
                    endDate = end.value();

                    if (startDate) {
                        startDate = new Date(startDate);
                        startDate.setDate(startDate.getDate());
                        end.min(startDate);
                    } else if (endDate) {
                        start.max(new Date(endDate));
                    } else {
                        endDate = new Date();
                        start.max(endDate);
                        end.min(endDate);
                    }

                    dateChanges();
                }

                function endChange() {
                    var endDate = end.value(),
                    startDate = start.value();

                    if (endDate) {
                        endDate = new Date(endDate);
                        endDate.setDate(endDate.getDate());
                        start.max(endDate);
                    } else if (startDate) {
                        end.min(new Date(startDate));
                    } else {
                        endDate = new Date();
                        start.max(endDate);
                        end.min(endDate);
                    }

                    dateChanges();
                }

                function dateChanges(){
                	var strDate = "";

					if(start.value() && end.value()){
						strDate = "From " + kendo.toString(new Date(start.value()), "dd-MM-yyyy") + " To " + kendo.toString(new Date(end.value()), "dd-MM-yyyy");
					}else if(start.value()){
						strDate = "On " + kendo.toString(new Date(start.value()),"dd-MM-yyyy");
					}else if(end.value()){
						strDate = "As Of " + kendo.toString(new Date(end.value()),"dd-MM-yyyy");
					}else{
						strDate = "";
					}

					$("#strDate").text(strDate);
                }

                var start = $("#sdate").kendoDatePicker({
                	format: "dd-MM-yyyy",
                    change: startChange
                }).data("kendoDatePicker");

                var end = $("#edate").kendoDatePicker({
                	format: "dd-MM-yyyy",
                    change: endChange
                }).data("kendoDatePicker");

                var sorter = $("#sorter").change(function(){
                	var today = new Date(),
                	sdate = "",
                	edate = "",
                	value = $("#sorter").val();

					switch(value){
					case "today":
						sdate = today;

					  	break;
					case "week":
						var first = today.getDate() - today.getDay(),
						last = first + 6;

						var sdate = new Date(today.setDate(first)),
						edate = new Date(today.setDate(last));

					  	break;
					case "month":
						var sdate = new Date(today.getFullYear(), today.getMonth(), 1),
						edate = new Date(today.getFullYear(), today.getMonth() + 1, 0);

					  	break;
					case "year":
					  	var sdate = new Date(today.getFullYear(), 0, 1),
					  	edate = new Date(today.getFullYear(), 11, 31);

					  	break;
					default:

					}

					start.value(sdate);
					end.value(edate);

					start.max(end.value());
                	end.min(start.value());

                	dateChanges();
                });

                start.max(end.value());
                end.min(start.value());





			}

			vm.pageLoad();
		}
	});
	banhji.router.route("/invoice_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.invoiceList);

			//var vm = banhji.saleSummaryCustomer;

			if(banhji.pageLoaded["invoiceList"]==undefined){
				banhji.pageLoaded["invoiceList "] = true;

				function startChange() {
                    var startDate = start.value(),
                    endDate = end.value();

                    if (startDate) {
                        startDate = new Date(startDate);
                        startDate.setDate(startDate.getDate());
                        end.min(startDate);
                    } else if (endDate) {
                        start.max(new Date(endDate));
                    } else {
                        endDate = new Date();
                        start.max(endDate);
                        end.min(endDate);
                    }

                    dateChanges();
                }

                function endChange() {
                    var endDate = end.value(),
                    startDate = start.value();

                    if (endDate) {
                        endDate = new Date(endDate);
                        endDate.setDate(endDate.getDate());
                        start.max(endDate);
                    } else if (startDate) {
                        end.min(new Date(startDate));
                    } else {
                        endDate = new Date();
                        start.max(endDate);
                        end.min(endDate);
                    }

                    dateChanges();
                }

                function dateChanges(){
                	var strDate = "";

					if(start.value() && end.value()){
						strDate = "From " + kendo.toString(new Date(start.value()), "dd-MM-yyyy") + " To " + kendo.toString(new Date(end.value()), "dd-MM-yyyy");
					}else if(start.value()){
						strDate = "On " + kendo.toString(new Date(start.value()),"dd-MM-yyyy");
					}else if(end.value()){
						strDate = "As Of " + kendo.toString(new Date(end.value()),"dd-MM-yyyy");
					}else{
						strDate = "";
					}

					$("#strDate").text(strDate);
                }

                var start = $("#sdate").kendoDatePicker({
                	format: "dd-MM-yyyy",
                    change: startChange
                }).data("kendoDatePicker");

                var end = $("#edate").kendoDatePicker({
                	format: "dd-MM-yyyy",
                    change: endChange
                }).data("kendoDatePicker");

                var sorter = $("#sorter").change(function(){
                	var today = new Date(),
                	sdate = "",
                	edate = "",
                	value = $("#sorter").val();

					switch(value){
					case "today":
						sdate = today;

					  	break;
					case "week":
						var first = today.getDate() - today.getDay(),
						last = first + 6;

						var sdate = new Date(today.setDate(first)),
						edate = new Date(today.setDate(last));

					  	break;
					case "month":
						var sdate = new Date(today.getFullYear(), today.getMonth(), 1),
						edate = new Date(today.getFullYear(), today.getMonth() + 1, 0);

					  	break;
					case "year":
					  	var sdate = new Date(today.getFullYear(), 0, 1),
					  	edate = new Date(today.getFullYear(), 11, 31);

					  	break;
					default:

					}

					start.value(sdate);
					end.value(edate);

					start.max(end.value());
                	end.min(start.value());

                	dateChanges();
                });

                start.max(end.value());
                end.min(start.value());





			}

			vm.pageLoad();
		}
	});
	banhji.router.route("/customer_list", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.customerList);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.customerMenu);

			var vm = banhji.customerList;			
			
			if(banhji.pageLoaded["customer_list"]==undefined){
				banhji.pageLoaded["customer_list"] = true;				
				
			}			
		}		
	});

	/*************************
	*   Reports Section   *
	**************************/
	banhji.router.route("/customer_report_center", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.customerReportCenter);
			banhji.view.layout.showIn('#menu', banhji.view.menu);
			banhji.view.menu.showIn('#secondary-menu', banhji.view.customerMenu);

			var vm = banhji.customerReportCenter;			
			banhji.userManagement.addMultiTask("Customer Report Center","customer_report_center",null);
			if(banhji.pageLoaded["customer_report_center"]==undefined){
				banhji.pageLoaded["customer_report_center"] = true;				
								
			}

			vm.pageLoad();			
		}		
	});
	banhji.router.route("/reports", function(){
		if(!banhji.userManagement.getLogin()){
			banhji.router.navigate('/manage');
		}else{
			banhji.view.layout.showIn("#content", banhji.view.reportDashboard);

			var vm = banhji.reportDashboard;

			if(banhji.pageLoaded["reports"]==undefined){
				banhji.pageLoaded["reports"] = true;

			}

			vm.pageLoad();
		}
	});

	$(function() {
		banhji.router.start();
	});
		// signout when browser closed
  //       window.addEventListener("beforeunload", function (e) {
  //         // var confirmationMessage = "\o/";

  //         // (e || window.event).returnValue = confirmationMessage; //Gecko + IE
  //         // return confirmationMessage;                            //Webkit, Safari, Chrome
  //         var userData = {
  //             Username : userPool.getCurrentUser().username,
  //             Pool : userPool
  //         };
  //         var cognitoUser = new AWSCognito.CognitoIdentityServiceProvider.CognitoUser(userData);
  //         if(cognitoUser != null) {
  //             cognitoUser.signOut();
  //             // window.location.replace("<?php echo base_url(); ?>login");
  //         } else {
  //             console.log('No user');
  //         }
  //       });
		// if(userPool.getCurrentUser() == null){
		// 	window.location.replace(baseUrl + "login");
		// } else {
		// 	var cognitoUser = userPool.getCurrentUser();
	 //        if(cognitoUser !== null) {
	 //            banhji.aws.getImage();
	 //            cognitoUser.getSession(function(err, result){
	 //              if(result) {
	 //                AWS.config.credentials = new AWS.CognitoIdentityCredentials({
	 //                  IdentityPoolId: 'us-east-1:35445541-da4c-4dbb-b83f-d1d0301a26a9',
	 //                  Logins: {
	 //                    'cognito-idp.us-east-1.amazonaws.com/us-east-1_56S0nUDS4' : result.getIdToken().getJwtToken()
	 //                  }
	 //                });
	 //              }
	 //            });
	 //
	 </script>
