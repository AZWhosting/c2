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
*	Water Section      	  *
**************************** -->
<script id="Index" type="text/x-kendo-template">
	<div class="page-wrapper ">        
        <div class="container-fluid">

        	<div class="row page-titles">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
			                <!-- Nav tabs -->
			                <ul class="nav nav-tabs customtab" role="tablist">
			                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#reports" role="tab"><span class="hidden-sm-up"><i class="ti-layout-grid2-thumb"></i></span> <span class="hidden-xs-down">Reports</span></a> </li>
			                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#check_out" role="tab"><span class="hidden-sm-up"><i class="ti-layout-accordion-list"></i></span> <span class="hidden-xs-down">Check Out</span></a> </li>
			                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#sales_transaction" role="tab"><span class="hidden-sm-up"><i class="ti-layout-accordion-list"></i></span> <span class="hidden-xs-down">Sales Transaction</span></a> </li>
			                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customers" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Customers</span></a> </li>
			                </ul>
			                <!-- Tab panes -->
			                <div class="tab-content">
			                    <div class="tab-pane active" id="reports" role="tabpanel">
			                        <div class="p-20">
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

						                        <!-- Report -->
						                        <div class="row report">
						    						<div class="col-sm-12">
						    							<h3><a href="#/sale_summary_by_customer" data-bind="text: lang.lang.sale_summary_by_customer" ></a></h3>
						    							<p data-bind="text: lang.lang.summarizes_total_sales"></p>
						    						</div>
						    						<div class="col-sm-12">
						    							<h3><a href="#/sale_summary_by_product" data-bind="text: lang.lang.sale_summary_by_product_services" ></a></h3>
						    							<p data-bind="text: lang.lang.summarizes_total_sales_for_each_product"></p>
						    						</div>
						    						<div class="col-sm-12">
						    							<h3><a href="#/sale_detail_by_customer" data-bind="text: lang.lang.sale_detail_by_customer" ></a></h3>
						    							<p data-bind="text: lang.lang.lists_individual_sale"></p>
						    						</div>
						    						<div class="col-sm-12">
						    							<h3><a href="#/sale_detail_by_product" data-bind="text: lang.lang.sale_detail_by_product_services" ></a></h3>
						    							<p data-bind="text: lang.lang.lists_individual_sale_transactions"></p>
						    						</div>
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
						                                     data-bind="source: objInventory.top_supplier"></tbody>
						                            </table>
						                        </div>

						                        <!-- Report -->
						    					<div class="row report">
							                        <div class="col-sm-12">
						    							<h3><a href="#/customer_balance_summary" data-bind="text: lang.lang.customer_balance_summary" ></a></h3>
						    							<p data-bind="text: lang.lang.summarizes_total_sales"></p>
						    						</div>
						    						<div class="col-sm-12">
						    							<h3><a href="#/customer_balance_detail" data-bind="text: lang.lang.customer_balance_detail" ></a></h3>
						    							<p data-bind="text: lang.lang.lists_individual_unpaid_invoices_for_each_customer"></p>
						    						</div>
						    						<div class="col-sm-12">
														<h3><a href="#/receivable_aging_summary" data-bind="text: lang.lang.receivable_aging_summary"></a></h3>
														<p data-bind="text: lang.lang.lists_all_unpaid_invoices1"></p>	
													</div>
													<div class="col-sm-12">
														<h3><a href="#/receivable_aging_detail" data-bind="text: lang.lang.receivable_aging_detail"></a></h3>
														<p data-bind="text: lang.lang.lists_individual_unpaid_invoices_grouped_by_customer"></p>
													</div>
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

						                        <!-- Report -->
						    					<div class="row report">
						    						<div class="col-sm-12">
														<h3><a href="#/collect_invoice" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></a></h3>
														<p data-bind="text: lang.lang.lists_all_unpaid_invoices_grouped_by_due_today_and_overdue"></p>
													</div>
													<div class="col-sm-12">
														<h3><a href="#/collection_report" data-bind="text: lang.lang.collection_report"></a></h3>
														<p data-bind="text: lang.lang.lists_of_collected_invoices_for_the_select_period_of_time_group_by_method_of_payment"></p>
													</div>
												</div>
					    					</div>
					    				</div>
			                        </div>
			                    </div>
			                    <div class="tab-pane p-20" id="check_out" role="tabpanel">3</div>
			                    <div class="tab-pane  p-20" id="sales_transaction" role="tabpanel">
			                    	<div class="p-20">
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
			                    </div>
			                    <div class="tab-pane p-20" id="customers" role="tabpanel">
			                    	<div class="p-20">
			                        	<div class="row">

					    				</div>
					    			</div>
			                    </div>
			                </div>
			            </div>
			        </div>
	            </div>
	        </div>


            <!-- <div class="row page-titles home">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
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
                                                     { field: 'sale', name: langVM.lang.monthly_sale, categoryField:'month', color: '#203864', overlay:{ gradient: 'none'} },
                                                     { field: 'order', name: langVM.lang.monthly_order, categoryField:'month', color: '#9CB9D9', overlay:{ gradient: 'none'} }
                                                 ]"
                                     data-auto-bind="false"
                                     data-bind="source: graphDS"
                                     style="height: 274px;" ></div>
                                </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class=" col-lg-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card" >
                                <div class="card-body">
                                    <div class="saleOverview" >
                                        <h2 data-bind="text: lang.lang.sale"></h2>
                                        <p data-format="n0" data-bind="text: obj.sale"></p>
                                        <div class="col-md-12" style="padding: 0;">
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
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="saleOverview">
                                        <h2 data-bind="text: lang.lang.receivable"></h2>
                                        <p data-format="n0" data-bind="text: obj.ar"></p>
                                        <div class="col-md-12" style="padding: 0;">
                                            <div class="col-md-4">
                                                <span data-bind="text: obj.ar_open"></span>
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
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                               <div class="card-body" >
                                    <div class="saleOverview" >
                                        <h2 data-bind="text: lang.lang.purchase"></h2>
                                        <p data-format="n0" data-bind="text: objVendor.purchase"></p>
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <span data-bind="text: objVendor.purchase_supplier"></span>
                                                <span data-bind="text: lang.lang.supplier"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span data-bind="text: objVendor.purchase_product"></span>
                                                <span data-bind="text: lang.lang.product"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span data-bind="text: objVendor.purchase_ordered"></span>
                                                <span data-bind="text: lang.lang.order"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="saleOverview" >
                                        <h2 data-bind="text: lang.lang.payables"></h2>
                                        <p data-format="n0" data-bind="text: objVendor.ap"></p>
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <span data-bind="text: objVendor.ap_open"></span>
                                                <span data-bind="text: lang.lang.open"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span data-bind="text: objVendor.ap_supplier"></span>
                                                <span data-bind="text: lang.lang.supplier"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span  data-bind="text: objVendor.ap_overdue"></span>
                                                <span data-bind="text: lang.lang.overdue"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> -->
            
            <!-- <div class="row home-footer">
                

                <div class="col-lg-3">
                    <div class="card card-body">
                        <div class="top5" >
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
                </div>

                <div class="col-lg-3">
                    <div class="card card-body">
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
                                 data-bind="source: objInventory.top_supplier"></tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card card-body">
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

                <div class="col-lg-3">
                    <div class="card card-body">
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

            </div> -->

        </div>
    </div>

    <!-- <div class="content-wrapper" style="min-height: 799px;">
        <section class="content container-fluid">
       		<div class="row">
			    <div class="col-md-12">
			        <div class="nav-tabs-custom">
			            <ul class="nav nav-tabs">
			                <li class="active"><a href="#report" data-toggle="tab">Reports</a></li>
			                <li><a href="#tab_2" data-toggle="tab">Sale Transaction</a></li>
			                <li><a href="#tab_3" data-toggle="tab">Customers</a></li>
			            </ul>
			            <div class="tab-content">
			                <div class="tab-pane active" id="report">
			                	<div class="row">
			    					<div class="col-md-4">
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
								                                 { field: 'sale', name: langVM.lang.monthly_sale, categoryField:'month', color: '#203864', overlay:{ gradient: 'none'} },
								                                 { field: 'order', name: langVM.lang.monthly_order, categoryField:'month', color: '#9CB9D9', overlay:{ gradient: 'none'} }
								                             ]"
								                 data-auto-bind="false"
								                 data-bind="source: graphDS"
								                 style="height: 250px;" ></div>
								            </div>
			    					</div>
			    					<div class="col-md-4">
			    						<div class="saleOverview">
			    							<h2 data-bind="text: lang.lang.sale_overview"></h2>
			    							<p data-bind="text: obj.sale"></p>
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
			    					</div>
			    					<div class="col-md-4">
			    						<div class="saleOverview">
			    							<h2 data-bind="text: lang.lang.receivable_management"></h2>
			    							<p data-bind="text: obj.ar"></p>
			    							<div class="col-md-12">
			    								<div class="col-md-3">
			    									<span data-bind="text: obj.ar_open"></span>
			    									<span data-bind="text: lang.lang.open1"></span>
			    								</div>
			    								<div class="col-md-3">
			    									<span data-bind="text: obj.ar_customer"></span>
			    									<span data-bind="text: lang.lang.customer"></span>
			    								</div>
			    								<div class="col-md-3">
			    									<span data-bind="text: obj.ar_overdue"></span>
			    									<span data-bind="text: lang.lang.overdue"></span>
			    								</div>
			    								<div class="col-md-3">
			    									<span data-bind="text: obj.collection_day"></span>
			    									<span data-bind="text: lang.lang.collection_day"></span>
			    								</div>
			    							</div>
			    						</div>
			    					</div>
			    				</div>

			    				<div class="row">
			    					<div class="report">
			    						<div class="col-sm-4">
			    							<h3><a href="#/sale_summary_by_customer" data-bind="text: lang.lang.sale_summary_by_customer" ></a></h3>
			    							<p data-bind="text: lang.lang.summarizes_total_sales"></p>
			    						</div>
			    						<div class="col-sm-4">
			    							<h3><a href="#/sale_summary_by_product" data-bind="text: lang.lang.sale_summary_by_product_services" ></a></h3>
			    							<p data-bind="text: lang.lang.summarizes_total_sales_for_each_product"></p>
			    						</div>
			    						<div class="col-sm-4">
			    							<h3><a href="#/sale_detail_by_customer" data-bind="text: lang.lang.sale_detail_by_customer" ></a></h3>
			    							<p data-bind="text: lang.lang.lists_individual_sale"></p>
			    						</div>
			    					</div>
			    					<div class="report">
			    						<div class="col-sm-4">
			    							<h3><a href="#/sale_detail_by_product" data-bind="text: lang.lang.sale_detail_by_product_services" ></a></h3>
			    							<p data-bind="text: lang.lang.lists_individual_sale_transactions"></p>
			    						</div>
			    						<div class="col-sm-4">
			    							<h3><a href="#/customer_balance_summary" data-bind="text: lang.lang.customer_balance_summary" ></a></h3>
			    							<p data-bind="text: lang.lang.summarizes_total_sales"></p>
			    						</div>
			    						<div class="col-sm-4">
			    							<h3><a href="#/customer_balance_detail" data-bind="text: lang.lang.customer_balance_detail" ></a></h3>
			    							<p data-bind="text: lang.lang.lists_individual_unpaid_invoices_for_each_customer"></p>
			    						</div>
			    					</div>
			    					<div class="report">
			    						<div class="col-sm-4">
											<h3><a href="#/receivable_aging_summary" data-bind="text: lang.lang.receivable_aging_summary"></a></h3>
											<p data-bind="text: lang.lang.lists_all_unpaid_invoices1"></p>	
										</div>
										<div class="col-sm-4">
											<h3><a href="#/receivable_aging_detail" data-bind="text: lang.lang.receivable_aging_detail"></a></h3>
											<p data-bind="text: lang.lang.lists_individual_unpaid_invoices_grouped_by_customer"></p>
										</div>
										<div class="col-sm-4">
											<h3><a href="#/collect_invoice" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></a></h3>
											<p data-bind="text: lang.lang.lists_all_unpaid_invoices_grouped_by_due_today_and_overdue"></p>
										</div>
									</div>
									<div class="report">
										<div class="col-sm-4">
											<h3><a href="#/collection_report" data-bind="text: lang.lang.collection_report"></a></h3>
											<p data-bind="text: lang.lang.lists_of_collected_invoices_for_the_select_period_of_time_group_by_method_of_payment"></p>
										</div>
									</div>
			    				</div>
			                </div>
			                <div class="tab-pane" id="tab_2">
			                    The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages.
			                </div>
			                <div class="tab-pane" id="tab_3">
			                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
			                </div>
			            </div>
			        </div>
			    </div>

			</div>
        </section>
    </div> -->
</script>
<script id="dawineSorngha" type="text/x-kendo-template">
	<div class="page-wrapper">
        <div class="container-fluid">
        	<!-- <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Sales</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        	Add New
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row page-titles">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
			                <!-- Nav tabs -->
			                <ul class="nav nav-tabs customtab" role="tablist">
			                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#reports" role="tab"><span class="hidden-sm-up"><i class="ti-layout-grid2-thumb"></i></span> <span class="hidden-xs-down">Reports</span></a> </li>
			                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#check_out" role="tab"><span class="hidden-sm-up"><i class="ti-layout-accordion-list"></i></span> <span class="hidden-xs-down">Check Out</span></a> </li>
			                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#sales_transaction" role="tab"><span class="hidden-sm-up"><i class="ti-layout-accordion-list"></i></span> <span class="hidden-xs-down">Sales Transaction</span></a> </li>
			                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#customers" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Customers</span></a> </li>
			                </ul>
			                <!-- Tab panes -->
			                <div class="tab-content">
			                    <div class="tab-pane active" id="reports" role="tabpanel">
			                        <div class="p-10">
			                        	<div class="row">
					    					<div class="col-md-4">
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
										                                 { field: 'sale', name: langVM.lang.monthly_sale, categoryField:'month', color: '#203864', overlay:{ gradient: 'none'} },
										                                 { field: 'order', name: langVM.lang.monthly_order, categoryField:'month', color: '#9CB9D9', overlay:{ gradient: 'none'} }
										                             ]"
										                 data-auto-bind="false"
										                 data-bind="source: graphDS"
										                 style="height: 250px;" ></div>
										            </div>
					    					</div>
					    					<div class="col-md-4">
					    						<div class="saleOverview">
					    							<h2 data-bind="text: lang.lang.sale"></h2>
					    							<p data-bind="text: obj.sale"></p>
					    							<!-- <div class="col-md-12">
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
					    							</div> -->
					    						</div>
					    					</div>
					    					<!-- <div class="col-md-4">
					    						<div class="saleOverview">
					    							<h2 data-bind="text: lang.lang.receivable_management"></h2>
					    							<p data-bind="text: obj.ar"></p>
					    							<div class="col-md-12">
					    								<div class="col-md-3">
					    									<span data-bind="text: obj.ar_open"></span>
					    									<span data-bind="text: lang.lang.open1"></span>
					    								</div>
					    								<div class="col-md-3">
					    									<span data-bind="text: obj.ar_customer"></span>
					    									<span data-bind="text: lang.lang.customer"></span>
					    								</div>
					    								<div class="col-md-3">
					    									<span data-bind="text: obj.ar_overdue"></span>
					    									<span data-bind="text: lang.lang.overdue"></span>
					    								</div>
					    								<div class="col-md-3">
					    									<span data-bind="text: obj.collection_day"></span>
					    									<span data-bind="text: lang.lang.collection_day"></span>
					    								</div>
					    							</div>
					    						</div>
					    					</div> -->
					    				</div>

					    				<!-- <div class="row">
					    					<div class="report">
					    						<div class="col-sm-4">
					    							<h3><a href="#/sale_summary_by_customer" data-bind="text: lang.lang.sale_summary_by_customer" ></a></h3>
					    							<p data-bind="text: lang.lang.summarizes_total_sales"></p>
					    						</div>
					    						<div class="col-sm-4">
					    							<h3><a href="#/sale_summary_by_product" data-bind="text: lang.lang.sale_summary_by_product_services" ></a></h3>
					    							<p data-bind="text: lang.lang.summarizes_total_sales_for_each_product"></p>
					    						</div>
					    						<div class="col-sm-4">
					    							<h3><a href="#/sale_detail_by_customer" data-bind="text: lang.lang.sale_detail_by_customer" ></a></h3>
					    							<p data-bind="text: lang.lang.lists_individual_sale"></p>
					    						</div>
					    					</div>
					    					<div class="report">
					    						<div class="col-sm-4">
					    							<h3><a href="#/sale_detail_by_product" data-bind="text: lang.lang.sale_detail_by_product_services" ></a></h3>
					    							<p data-bind="text: lang.lang.lists_individual_sale_transactions"></p>
					    						</div>
					    						<div class="col-sm-4">
					    							<h3><a href="#/customer_balance_summary" data-bind="text: lang.lang.customer_balance_summary" ></a></h3>
					    							<p data-bind="text: lang.lang.summarizes_total_sales"></p>
					    						</div>
					    						<div class="col-sm-4">
					    							<h3><a href="#/customer_balance_detail" data-bind="text: lang.lang.customer_balance_detail" ></a></h3>
					    							<p data-bind="text: lang.lang.lists_individual_unpaid_invoices_for_each_customer"></p>
					    						</div>
					    					</div>
					    					<div class="report">
					    						<div class="col-sm-4">
													<h3><a href="#/receivable_aging_summary" data-bind="text: lang.lang.receivable_aging_summary"></a></h3>
													<p data-bind="text: lang.lang.lists_all_unpaid_invoices1"></p>	
												</div>
												<div class="col-sm-4">
													<h3><a href="#/receivable_aging_detail" data-bind="text: lang.lang.receivable_aging_detail"></a></h3>
													<p data-bind="text: lang.lang.lists_individual_unpaid_invoices_grouped_by_customer"></p>
												</div>
												<div class="col-sm-4">
													<h3><a href="#/collect_invoice" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></a></h3>
													<p data-bind="text: lang.lang.lists_all_unpaid_invoices_grouped_by_due_today_and_overdue"></p>
												</div>
											</div>
											<div class="report">
												<div class="col-sm-4">
													<h3><a href="#/collection_report" data-bind="text: lang.lang.collection_report"></a></h3>
													<p data-bind="text: lang.lang.lists_of_collected_invoices_for_the_select_period_of_time_group_by_method_of_payment"></p>
												</div>
											</div>
					    				</div> -->
			                        </div>

			                        <!-- <div class="p-10">
			                        	<div class="row home-footer">
			                        		
							                <div class="col-lg-3">
							                    <div class="card card-body">
							                    	<div class="saleOverview">
						    							<h2 data-bind="text: lang.lang.sale_overview"></h2>
						    							<p data-bind="text: obj.sale"></p>
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
							                        <div class="top5" >
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
							                </div>
							                
			                        	</div>
			                        </div> -->
			                    </div>
			                    <div class="tab-pane p-20" id="check_out" role="tabpanel">3</div>
			                    <div class="tab-pane  p-20" id="sales_transaction" role="tabpanel">
			                    	<div class="p-10">
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
			                    </div>
			                    <div class="tab-pane p-20" id="customers" role="tabpanel">
			                    	<div class="p-10">
			                        	<div class="row">
					    					<div class="col-md-3">
					    						<div class="listWrapper" >
													<div class="innerAll">
														<form autocomplete="off" class="form-inline">
															<div class="widget-search">																
																<div class="overflow-hidden">
																	<input type="search" placeholder="Number or Name..." data-bind="value: searchText">
																</div>
																<button type="button" class="btn btn-default pull-right" data-bind="click: search"><i class="ti-search"></i></button>
															</div>
															<div class="select2-container" style="width: 100%;  margin-bottom: 10px;">
																<input data-role="dropdownlist"
													                   data-option-label="Select Type..."
													                   data-value-primitive="true"
													                   data-text-field="name"
													                   data-value-field="id"
													                   data-bind="value: contact_type_id,
													                              source: contactTypeDS"
													                   style="width: 100%;" />
															</div>
														</form>
													</div>

													<span class="results"><span data-bind="text: contactDS.total"></span> <span data-bind="text: lang.lang.found_search"></span></span>

													<div class="table table-condensed" style="height: 580px;"
														 data-role="grid"
														 data-bind="source: contactDS"
														 data-row-template="customerCenter-customer-list-tmpl"
														 data-columns="[{title: ''}]"
														 data-selectable=true
														 data-height="600"
														 data-scrollable="{virtual: true}"></div>
												</div>
					    					</div>
					    					<div class="col-md-9">
					    						<div class="row">
					    							<div class="col-md-5">
					    								<div class="row">
					    									<div class="col-md-6">
					    										<div class="widget-stats widget-stats-primary widget-stats-5" data-bind="click: loadBalance" style="cursor: pointer; background: #0077c5">
																	<span class="glyphicons coins"><i></i></span>
																	<span class="txt" style="padding-right: 18px;"><span data-bind="text: lang.lang.balance">Balance</span><span data-bind="text: balance" style="font-size:medium;">0</span></span>
																	<div class="clearfix"></div>
																</div>
					    									</div>
					    									<div class="col-md-6">
					    										<div class="widget-stats widget-stats-info widget-stats-5" data-bind="click: loadBalance" style="cursor: pointer; background: #21abf6;">
																	<span class="glyphicons circle_exclamation_mark"><i></i></span>
																	<span class="txt"><span data-bind="text: outInvoice">0</span> <span data-bind="text: lang.lang.open_invoice">Open Invoice</span></span>
																	<div class="clearfix"></div>
																</div>
					    									</div>
					    								</div>
					    							</div>
					    							<div class="col-md-7">
					    								<div class="widget-stats widget-stats-inverse widget-stats-5" data-bind="click: loadDeposit" style="cursor: pointer; ">
															<span class="glyphicons briefcase"><i></i></span>
															<span class="txt"><span data-bind="text: lang.lang.deposit">DEPOSIT</span><span data-bind="text: deposit" style="font-size:medium;">0</span></span>
															<div class="clearfix"></div>
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
        </div>
    </div>
    <!-- <div class="content-wrapper" style="min-height: 799px;">
        <section class="content container-fluid">
       		<div class="row">
			    <div class="col-md-12">
			        <div class="nav-tabs-custom">
			            <ul class="nav nav-tabs">
			                <li class="active"><a href="#report" data-toggle="tab">Reports</a></li>
			                <li><a href="#tab_2" data-toggle="tab">Sale Transaction</a></li>
			                <li><a href="#tab_3" data-toggle="tab">Customers</a></li>
			            </ul>
			            <div class="tab-content">
			                <div class="tab-pane active" id="report">
			                	<div class="row">
			    					<div class="col-md-4">
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
								                                 { field: 'sale', name: langVM.lang.monthly_sale, categoryField:'month', color: '#203864', overlay:{ gradient: 'none'} },
								                                 { field: 'order', name: langVM.lang.monthly_order, categoryField:'month', color: '#9CB9D9', overlay:{ gradient: 'none'} }
								                             ]"
								                 data-auto-bind="false"
								                 data-bind="source: graphDS"
								                 style="height: 250px;" ></div>
								            </div>
			    					</div>
			    					<div class="col-md-4">
			    						<div class="saleOverview">
			    							<h2 data-bind="text: lang.lang.sale_overview"></h2>
			    							<p data-bind="text: obj.sale"></p>
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
			    					</div>
			    					<div class="col-md-4">
			    						<div class="saleOverview">
			    							<h2 data-bind="text: lang.lang.receivable_management"></h2>
			    							<p data-bind="text: obj.ar"></p>
			    							<div class="col-md-12">
			    								<div class="col-md-3">
			    									<span data-bind="text: obj.ar_open"></span>
			    									<span data-bind="text: lang.lang.open1"></span>
			    								</div>
			    								<div class="col-md-3">
			    									<span data-bind="text: obj.ar_customer"></span>
			    									<span data-bind="text: lang.lang.customer"></span>
			    								</div>
			    								<div class="col-md-3">
			    									<span data-bind="text: obj.ar_overdue"></span>
			    									<span data-bind="text: lang.lang.overdue"></span>
			    								</div>
			    								<div class="col-md-3">
			    									<span data-bind="text: obj.collection_day"></span>
			    									<span data-bind="text: lang.lang.collection_day"></span>
			    								</div>
			    							</div>
			    						</div>
			    					</div>
			    				</div>

			    				<div class="row">
			    					<div class="report">
			    						<div class="col-sm-4">
			    							<h3><a href="#/sale_summary_by_customer" data-bind="text: lang.lang.sale_summary_by_customer" ></a></h3>
			    							<p data-bind="text: lang.lang.summarizes_total_sales"></p>
			    						</div>
			    						<div class="col-sm-4">
			    							<h3><a href="#/sale_summary_by_product" data-bind="text: lang.lang.sale_summary_by_product_services" ></a></h3>
			    							<p data-bind="text: lang.lang.summarizes_total_sales_for_each_product"></p>
			    						</div>
			    						<div class="col-sm-4">
			    							<h3><a href="#/sale_detail_by_customer" data-bind="text: lang.lang.sale_detail_by_customer" ></a></h3>
			    							<p data-bind="text: lang.lang.lists_individual_sale"></p>
			    						</div>
			    					</div>
			    					<div class="report">
			    						<div class="col-sm-4">
			    							<h3><a href="#/sale_detail_by_product" data-bind="text: lang.lang.sale_detail_by_product_services" ></a></h3>
			    							<p data-bind="text: lang.lang.lists_individual_sale_transactions"></p>
			    						</div>
			    						<div class="col-sm-4">
			    							<h3><a href="#/customer_balance_summary" data-bind="text: lang.lang.customer_balance_summary" ></a></h3>
			    							<p data-bind="text: lang.lang.summarizes_total_sales"></p>
			    						</div>
			    						<div class="col-sm-4">
			    							<h3><a href="#/customer_balance_detail" data-bind="text: lang.lang.customer_balance_detail" ></a></h3>
			    							<p data-bind="text: lang.lang.lists_individual_unpaid_invoices_for_each_customer"></p>
			    						</div>
			    					</div>
			    					<div class="report">
			    						<div class="col-sm-4">
											<h3><a href="#/receivable_aging_summary" data-bind="text: lang.lang.receivable_aging_summary"></a></h3>
											<p data-bind="text: lang.lang.lists_all_unpaid_invoices1"></p>	
										</div>
										<div class="col-sm-4">
											<h3><a href="#/receivable_aging_detail" data-bind="text: lang.lang.receivable_aging_detail"></a></h3>
											<p data-bind="text: lang.lang.lists_individual_unpaid_invoices_grouped_by_customer"></p>
										</div>
										<div class="col-sm-4">
											<h3><a href="#/collect_invoice" data-bind="text: lang.lang.list_of_invoices_to_be_collected"></a></h3>
											<p data-bind="text: lang.lang.lists_all_unpaid_invoices_grouped_by_due_today_and_overdue"></p>
										</div>
									</div>
									<div class="report">
										<div class="col-sm-4">
											<h3><a href="#/collection_report" data-bind="text: lang.lang.collection_report"></a></h3>
											<p data-bind="text: lang.lang.lists_of_collected_invoices_for_the_select_period_of_time_group_by_method_of_payment"></p>
										</div>
									</div>
			    				</div>
			                </div>
			                <div class="tab-pane" id="tab_2">
			                    The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages.
			                </div>
			                <div class="tab-pane" id="tab_3">
			                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
			                </div>
			            </div>
			        </div>
			    </div>

			</div>
        </section>
    </div> -->
</script>

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
				                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#print_export" role="tab"><i class="mdi mdi-printer"></i><span class="marginLeft hidden-xs-down" data-bind="text: lang.lang.print_export">Print/Export</span></a> </li>
				                </ul>
				                <!-- Tab panes -->
				                <div class="tab-content tabcontent-border">
				                    <div class="tab-pane active" id="date" role="tabpanel">
				                        <div class="p-20">
				                        	<div class="row ">
						    					1
						    				</div>
				                        </div>
				                    </div>
				                    <div class="tab-pane p-20" id="filter" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">
						    					2
						    				</div>
						    			</div>
				                    </div>
				                    <div class="tab-pane  p-20" id="print_export" role="tabpanel">
				                    	<div class="p-20">
				                        	<div class="row">
						    					3
						    				</div>
						    			</div>
				                    </div>
				                    
				                </div>
				            </div>

				            <!-- Title -->
				            <div class="reportTitle">
				            	<h3 data-bind="html: company.name"></h3>
								<h2 data-bind="text: lang.lang.sale_summary_by_customer"></h2>
								<p data-bind="text: displayDate"></p>
				            </div>

				            <!-- Block -->
				            <div class="reportBlock">
				            </div>

				            <!-- Table -->
				            <div class="reportTable">
				            </div>
			            </div>
                		<!-- <div id="example" class="k-content saleSummaryCustomer">
					    	<span class="pull-right glyphicons no-js remove_2"
								onclick="javascript:window.history.back()"><i></i></span>
							<br>
							<br>

							<div class="row-fluid">
							    
								<div class="relativeWrap" data-toggle="source-code">
									<div class="widget widget-tabs widget-tabs-gray report-tab">

										
										<div class="widget-head">
											<ul>
												<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
												<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
												<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
											</ul>
										</div>
										
										<div class="widget-body">
											<div class="tab-content">

										        
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

										    	
										        <div class="tab-pane" id="tab-2">
													<table class="table table-condensed">
														<tr>
											            	<td style="padding: 8px 0 0 0 !important; ">
																<span data-bind="text: lang.lang.customers"></span>
																<select data-role="multiselect"
																	   data-value-primitive="true"
																	   data-header-template="contact-header-tmpl"
																	   data-item-template="contact-list-tmpl"
																	   data-value-field="id"
																	   data-text-field="name"
																	   data-bind="value: obj.contactIds,
																	   			source: contactDS"
																	   data-placeholder="Select Customer.."
																	   style="width: 100%" /></select>
															</td>
															<td style="padding-top: 31px !important; float: left;">
												  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
															</td>
														</tr>
													</table>
									        	</div>
									        								        	
										        <div class="tab-pane" id="tab-3">
										        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
										        	
										        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
										        		<i class="fa fa-file-excel-o"></i>
										        		Export to Excel
										        	</span>
									        	</div>
										    </div>
										</div>
									</div>
								</div>
							</div>

							<div id="invFormContent">
								<div class="block-title">
									<h3 data-bind="html: company.name"></h3>
									<h2 data-bind="text: lang.lang.sale_summary_by_customer"></h2>
									<p data-bind="text: displayDate"></p>
								</div>
								<div class="row-fluid">
									<div class="span3">
										<div class="total-customer">
											<p data-bind="text: lang.lang.number_of_customer"></p>
											<span data-bind="text: dataSource.total"></span>
										</div>
									</div>
									<div class="span9">
										<div class="total-sale">
											<p data-bind="text: lang.lang.total_sale"></p>
											<span data-bind="text: totalAmount"></sapn>
										</div>
									</div>
								</div>
								<table class="table table-borderless table-condensed ">
									<thead>
										<tr>
											<th data-bind="text:lang.lang.customer"></th>
											<th style="text-align: center;" data-bind="text: lang.lang.number_of_invoice"></th>
											<th style="text-align: center;" data-bind="text: lang.lang.number_of_cash_sale"></th>
											<th style="text-align: right;" data-bind="text: lang.lang.total_sale"></th>
										</tr>
									</thead>
				            		<tbody  data-role="listview"
				            				data-auto-bind="false"
							                data-template="saleSummaryByCustomer-template"
							                data-bind="source: dataSource" >
							        </tbody>
				            	</table>
				            	<div id="pager" class="k-pager-wrap"
					            		 data-role="pager"
								    	 data-auto-bind="false"
							             data-bind="source: dataSource"></div>
				            </div>
						</div> -->	
                	</div>
					
				</span>
			</div>
		</div>
	</div>
</script>
<script id="saleSummaryByCustomer-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: center;">#=invoice_count#</td>
		<td style="text-align: center;">#=cash_sale_count#</td>
		<td style="text-align: right;">#=kendo.toString(amount, "c2", banhji.locale)#</td>
	</tr>
</script>
<script id="saleDetailByCustomer" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
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
														<span data-bind="text: lang.lang.customers"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="contact-header-tmpl"
															   data-item-template="contact-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.contactIds,
															   			source: contactDS"
															   data-placeholder="Select Customer.."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
								        <div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.sale_detail_by_customer"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span3">
								<div class="total-customer">
									<p data-bind="text: lang.lang.number_of_customer"></p>
									<span data-bind="text: dataSource.total"></span>
								</div>

							</div>
							<div class="span9">
								<div class="total-sale">
									<p data-bind="text: lang.lang.amount"></p>
									<span data-bind="text: totalAmount"></sapn>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text: lang.lang.type"><span></span></th>
									<th data-bind="text: lang.lang.date"><span></span></th>
									<th data-bind="text: lang.lang.reference"><span></span></th>
									<th data-bind="text: lang.lang.memo"><span></span></th>
									<th data-bind="text: lang.lang.amount"><span></span></th>
								</tr>
							</thead>
							<tbody data-role="listview"
									data-template="saleDetailByCustomer-template"
									data-auto-bind="false"
									data-bind="source: dataSource">
							</tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
</script>
<script id="saleDetailByCustomer-template" type="text/x-kendo-template">
	<tr style="font-weight: bold">
		<td>#=name#</td>
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
			<td style="text-align: right;">#=line[i].memo#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>
	#}#
	<tr>
    	<td style="font-weight: bold; color: black;"> <span data-bind="text: lang.lang.total"></span> #=name#</td>
    	<td></td>
    	<td></td>
    	<td></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(amount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="5">&nbsp;</td>
    </tr>
</script>
<script id="saleSummaryByProduct" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
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
														<span data-bind="text: lang.lang.item"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="item-header-tmpl"
															   data-item-template="item-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.itemIds,
															   			source: itemDS"
															   data-placeholder="Select Item..."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.sale_summary_by_product_services"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.total_product_services"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.avg_sale_per_invoice"></p>
										<span data-bind="text: avg_sale"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_sale"></p>
									<span data-bind="text: total_sale"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th style="text-transform: uppercase;" data-bind="text: lang.lang.item"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.qty"></th>
									<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.amount"></th>
									<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.avg_price"></th>
									<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.avg_cost"></th>
									<th style="text-align: right; text-transform: uppercase;" data-bind="text: lang.lang.gross_profit_margin"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-template="saleSummaryByProduct-template"
										 data-auto-bind="false"
										 data-bind="source: dataSource"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="saleSummaryByProduct-template" type="text/x-kendo-template">
	<tr>
		<td>#=name#</td>
		<td style="text-align: right;">#=kendo.toString(quantity, "n")# #=measurement#</td>
		<td style="text-align: right;">#=kendo.toString(amount, "c2", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(avg_price, "c3", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(avg_cost, "c3", banhji.locale)#</td>
		<td style="text-align: right;">#=kendo.toString(gpm, "p")#</td>
	</tr>
</script>
<script id="saleDetailByProduct" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background">
			<div class="container-960">
				<div id="example" class="k-content saleSummaryCustomer">
			    	<span class="pull-right glyphicons no-js remove_2"
						onclick="javascript:window.history.back()"><i></i></span>
					<br>
					<br>

					<div class="row-fluid">
					    <!-- Tabs -->
						<div class="relativeWrap" data-toggle="source-code">
							<div class="widget widget-tabs widget-tabs-gray report-tab">

								<!-- Tabs Heading -->
								<div class="widget-head">
									<ul>
										<li class="active"><a class="glyphicons calendar" href="#tab-1" data-toggle="tab"><i></i><span data-bind="text: lang.lang.date"></span></a></li>
										<li><a class="glyphicons filter" href="#tab-2" data-toggle="tab"><i></i><span data-bind="text: lang.lang.filter"></span></a></li>
										<li><a class="glyphicons print" href="#tab-3" data-toggle="tab"><i></i><span data-bind="text: lang.lang.print_export"></span></a></li>
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
													<td style="padding: 8px 0 0 0 !important;">
														<span data-bind="text: lang.lang.item"></span>
														<select data-role="multiselect"
															   data-value-primitive="true"
															   data-header-template="item-header-tmpl"
															   data-item-template="item-list-tmpl"
															   data-value-field="id"
															   data-text-field="name"
															   data-bind="value: obj.itemIds,
															   			source: itemDS"
															   data-placeholder="Select Item..."
															   style="width: 100%" /></select>
													</td>
													<td style="padding-top: 31px !important; float: left;">
										  				<button type="button" data-role="button" data-bind="click: search"><i class="icon-search"></i></button>
													</td>
												</tr>
											</table>
							        	</div>
							        	<div class="tab-pane" id="tab-3">
								        	<span id="savePrint" class="btn btn-icon btn-default glyphicons print print1" data-bind="click: printGrid" style="width: 80px;"><i></i> Print</span>
								        	<!-- <span id="" class="btn btn-icon btn-default pdf" data-bind="click: cancel" style="width: 80px;">
								        		<i class="fa fa-file-pdf-o"></i>
								        		Print as PDF
								        	</span> -->
								        	<span id="" class="btn btn-icon btn-default execl" data-bind="click: ExportExcel" style="width: 80px;">
								        		<i class="fa fa-file-excel-o"></i>
								        		Export to Excel
								        	</span>
							        	</div>
								    </div>
								</div>
							</div>
						</div>
						<!-- // Tabs END -->
					</div>

					<div id="invFormContent">
						<div class="block-title">
							<h3 data-bind="html: company.name"></h3>
							<h2 data-bind="text: lang.lang.sale_detail_by_product_services"></h2>
							<p data-bind="text: displayDate"></p>
						</div>

						<div class="row-fluid">
							<div class="span5">
								<div class="total-customer">
									<div class="span6">
										<p data-bind="text: lang.lang.total_product_services"></p>
										<span data-bind="text: dataSource.total"></span>
									</div>
									<div class="span6">
										<p data-bind="text: lang.lang.avg_sale_per_invoice"></p>
										<span data-bind="text: product_sale"></span>
									</div>
								</div>
							</div>
							<div class="span7">
								<div class="total-customer">
									<p data-bind="text: lang.lang.total_sale"></p>
									<span data-bind="text: total_sale"></span>
								</div>
							</div>
						</div>

						<table class="table table-borderless table-condensed ">
							<thead>
								<tr>
									<th data-bind="text:lang.lang.customer"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.invoice_date"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.reference"></th>
									<th style="text-align: left;" data-bind="text: lang.lang.item_name"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.qty"></th>
									<th data-bind="text: lang.lang.uom"></th>
									<th style="text-align: right;" data-bind="text: lang.lang.price"></th>
									<th data-bind="text: lang.lang.amount"></th>
								</tr>
							</thead>
							<tbody data-role="listview"
										 data-template="saleDetailByProduct-template"
										 data-auto-bind="false"
										 data-bind="source: dataSource"
							></tbody>
						</table>
						<div id="pager" class="k-pager-wrap"
			            		 data-role="pager"
						    	 data-auto-bind="false"
					             data-bind="source: dataSource"></div>
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
			<td style="text-align: left;">
				<a href="\#/#=line[i].type.toLowerCase()#/#=line[i].id#">#=line[i].number#</a>
			</td>
			<td>#=line[i].item_name#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].quantity, "c2")#</td>
			<td>#=line[i].measurement#</td>
			<td style="text-align: right;">#=kendo.toString(parseFloat(line[i].price), "c2", banhji.locale)#</td>
			<td style="text-align: right;">#=kendo.toString(line[i].amount, "c2", banhji.locale)#</td>
		</tr>

	#}#
	<tr>
    	<td colspan="4" style="font-weight: bold; color: black;"><span data-bind="text: lang.lang.total"></span>Total #: name #</td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalQty, "n")#
    	</td>
    	<td colspan="2" style="font-weight: bold; border-top: 1px solid black !important; color: black;"></td>
    	<td class="right" style="font-weight: bold; border-top: 1px solid black !important; color: black;">
    		#=kendo.toString(totalAmount, "c2", banhji.locale)#
    	</td>
    </tr>
    <tr>
    	<td colspan="7">&nbsp;</td>
    </tr>
</script>
<!-- End -->

<!-- Template -->
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
<script id="contact-header-tmpl" type="text/x-kendo-tmpl">
    <strong>
    	<a href="\#/customer">+ Add New Customer</a></li>
    </strong>
</script>
<!-- End -->                                             