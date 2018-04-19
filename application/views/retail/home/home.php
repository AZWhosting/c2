
<div id="wrapperApplication" class="wrapper"></div>
<!--load before somthing not yet done -->
<!-- <div id="holdpageloadhide" style="display:block;text-align: center;position: fixed;top: 0; left: 0;width: 100%; height: 100%;background: rgba(142, 159, 167, 0.8);z-index: 9999;">
	<i class="fa fa-circle-o-notch fa-spin" style="font-size: 50px;color: #fff;position: absolute; top: 45%;left: 45%"></i>
</div> -->
<!-- template section starts -->
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
	<div class="page-wrapper">        
        <div class="container-fluid">

            <div class="row page-titles">
                <div class="col-lg-7  col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex m-b-30 no-block">
                                <h5 class="card-title m-b-0 align-self-center">Daily Income</h5>
                                <div class="ml-auto">
                                    <select class="custom-select border-0">
                                        <option selected="">Today</option>
                                        <option value="1">Tomorrow</option>
                                    </select>
                                </div>
                            </div>
                            <div id="income" style="width:100%;"></div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class=" col-xl-4 col-lg-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">485</h3>
                                    <h6 class="card-subtitle">All Sales</h6>
                                    <div style="max-width:200px" class="m-b-40">
                                        <canvas id="salesChart"></canvas>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">185</h3>
                                    <h6 class="card-subtitle">All Orders</h6>
                                    <div style="max-width:200px" class="m-b-40">
                                        <canvas id="orderChart"></canvas>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">45</h3>
                                    <h6 class="card-subtitle">All Transactions</h6>
                                    <div style="max-width:200px" class="m-b-40">
                                        <canvas id="transactionChart"></canvas>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">655</h3>
                                    <h6 class="card-subtitle">All Costs</h6>
                                    <div style="max-width:200px" class="m-b-40">
                                        <canvas id="costChart"></canvas>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body p-b-0">
                            <h5 class="card-title">Weather Report</h5>
                            <h6 class="card-subtitle m-b-0">This is the Ahmedabads Weather report</h6>
                        </div>
                        <div class="card-body bg-light">
                            <div class="d-flex no-block align-items-center">
                                <span><h2 class="">Monday</h2><small>7th May 2017</small></span>
                                <div class="ml-auto">
                                    <canvas class="sleet" width="44" height="44"></canvas> <span class="display-6">32<sup>°F</sup></span> </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table no-border">
                                        <tbody>
                                            <tr>
                                                <td>Wind</td>
                                                <td class="font-medium">ESE 17 mph</td>
                                            </tr>
                                            <tr>
                                                <td>Humidity</td>
                                                <td class="font-medium">83%</td>
                                            </tr>
                                            <tr>
                                                <td>Pressure</td>
                                                <td class="font-medium">28.56 in</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table no-border">
                                        <tbody>
                                            <tr>
                                                <td>Cloud Cover</td>
                                                <td class="font-medium">78%</td>
                                            </tr>
                                            <tr>
                                                <td>Ceiling</td>
                                                <td class="font-medium">25760 ft</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Column -->
                                <div class="col-lg-2 col-md-4 col-4 text-center">
                                    <h5>Tue</h5>
                                    <div class="m-t-10 m-b-10">
                                        <canvas class="sleet" width="30" height="30"></canvas>
                                    </div>
                                    <h5>32<sup>°F</sup></h5>
                                </div>
                                <!-- Column -->
                                <div class="col-lg-2 col-md-4 col-4 text-center">
                                    <h5>Wed</h5>
                                    <div class="m-t-10 m-b-10">
                                        <canvas class="clear-day" width="30" height="30"></canvas>
                                    </div>
                                    <h5>34<sup>°F</sup></h5>
                                </div>
                                <!-- Column -->
                                <div class="col-lg-2 col-md-4 col-4 text-center">
                                    <h5>Thu</h5>
                                    <div class="m-t-10 m-b-10">
                                        <canvas class="partly-cloudy-day" width="30" height="30"></canvas>
                                    </div>
                                    <h5>31<sup>°F</sup></h5>
                                </div>
                                <!-- Column -->
                                <div class="col-lg-2 col-md-4 col-4 text-center">
                                    <h5>Fri</h5>
                                    <div class="m-t-10 m-b-10">
                                        <canvas class="cloudy" width="30" height="30"></canvas>
                                    </div>
                                    <h5>32<sup>°F</sup></h5>
                                </div>
                                <!-- Column -->
                                <div class="col-lg-2 col-md-4 col-4 text-center">
                                    <h5>Sat</h5>
                                    <div class="m-t-10 m-b-10">
                                        <canvas class="snow" width="30" height="30"></canvas>
                                    </div>
                                    <h5>12<sup>°F</sup></h5>
                                </div>
                                <!-- Column -->
                                <div class="col-lg-2 col-md-4 col-4 text-center">
                                    <h5>Sun</h5>
                                    <div class="m-t-10 m-b-10">
                                        <canvas class="wind" width="30" height="30"></canvas>
                                    </div>
                                    <h5>32<sup>°F</sup></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">User Activity</h5>
                            <h6 class="card-subtitle">This is the users daily activity</h6>
                            <div class="steamline m-t-40">
                                <div class="sl-item">
                                    <div class="sl-left bg-success"> <i class="ti-user"></i></div>
                                    <div class="sl-right">
                                        <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span></div>
                                        <div class="desc">you can write anything </div>
                                    </div>
                                </div>
                                <div class="sl-item">
                                    <div class="sl-left bg-info"><i class="fa fa-image"></i></div>
                                    <div class="sl-right">
                                        <div class="font-medium">Send documents to Clark</div>
                                        <div class="desc">Lorem Ipsum is simply </div>
                                    </div>
                                </div>
                                <div class="sl-item">
                                    <div class="sl-left"> <img class="img-circle" alt="user" src="<?php echo base_url()?>assets/retail/2.jpg"> </div>
                                    <div class="sl-right">
                                        <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes ago</span></div>
                                        <div class="desc">Contrary to popular belief</div>
                                    </div>
                                </div>
                                <div class="sl-item">
                                    <div class="sl-left"> <img class="img-circle" alt="user" src="<?php echo base_url()?>assets/retail/3.jpg"> </div>
                                    <div class="sl-right">
                                        <div><a href="javascript:void(0)">Tiger Sroff</a> <span class="sl-date">5 minutes ago</span></div>
                                        <div class="desc">Approve meeting with tiger
                                            <br><a href="javascript:void(0)" class="btn m-t-10 m-r-5 btn-rounded btn-outline-success">Apporve</a> <a href="javascript:void(0)" class="btn m-t-10 btn-rounded btn-outline-danger">Refuse</a> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body p-b-0">
                            <h5 class="card-title">Feeds</h5>
                        </div>
                        <ul class="feeds">
                            <li>
                                <div class="bg-info"><i class="fa fa-bell-o"></i></div> You have 4 pending tasks. <span class="text-muted">Just Now</span></li>
                            <li>
                                <div class="bg-success"><i class="ti-server"></i></div> Server #1 overloaded.<span class="text-muted">2 Hours ago</span></li>
                            <li>
                                <div class="bg-warning"><i class="ti-shopping-cart"></i></div> New order received.<span class="text-muted">31 May</span></li>
                            <li>
                                <div class="bg-danger"><i class="ti-user"></i></div> New user registered.<span class="text-muted">30 May</span></li>
                            <li>
                                <div class="bg-dark"><i class="fa fa-bell-o"></i></div> New Version just arrived. <span class="text-muted">27 May</span></li>
                            <li>
                                <div class="bg-info"><i class="fa fa-bell-o"></i></div> You have 4 pending tasks. <span class="text-muted">Just Now</span></li>
                            <li>
                                <div class="bg-danger"><i class="ti-user"></i></div> New user registered.<span class="text-muted">30 May</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <!-- Column -->
                <div class="col-lg-3">
                    <div class="card card-body">
                        <h5 class="card-title">Tax Deduction</h5>
                        <div class="row">
                            <div class="col-6 m-t-30">
                                <h1 class="text-info">$347</h1>
                                <p class="text-muted">APRIL 2017</p>
                                <b>(150 Sales)</b> </div>
                            <div class="col-6">
                                <div id="sparkline1dash" class="text-right"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3">
                    <div class="card card-body">
                        <h5 class="card-title">Shipment</h5>
                        <div class="row">
                            <div class="col-6 m-t-30">
                                <h1 class="text-success">$647</h1>
                                <p class="text-muted">APRIL 2017</p>
                                <b>(150 Sales)</b> </div>
                            <div class="col-6">
                                <div id="sparkline2dash" class="text-right m-t-30"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3">
                    <div class="card card-body">
                        <h5 class="card-title">Revenue generate</h5>
                        <div class="row">
                            <div class="col-6 m-t-30">
                                <h1 class="text-danger">$647</h1>
                                <p class="text-muted">APRIL 2017</p>
                                <b>(150 Sales)</b> </div>
                            <div class="col-6">
                                <div id="sparkline3dash" class="text-right"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-3">
                    <div class="card card-body">
                        <h5 class="card-title">Order received </h5>
                        <div class="row">
                            <div class="col-6 m-t-30">
                                <h1 class="text-inverse">$647</h1>
                                <p class="text-muted">APRIL 2017</p>
                                <b>(150 Sales)</b> </div>
                            <div class="col-6">
                                <div id="sparkline4dash" class="text-right"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>

            <div class="row">
                <!-- Column -->
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ORDER STATUS</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Invoice</th>
                                        <th>User</th>
                                        <th>Order date</th>
                                        <th>Amount</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Tracking Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="javascript:void(0)" class="link"> Order #53431</a></td>
                                        <td>Steve N. Horton</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 22, 2014</span></td>
                                        <td>$45.00</td>
                                        <td class="text-center">
                                            <div class="label label-table label-success">Paid</div>
                                        </td>
                                        <td class="text-center">-</td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0)" class="link"> Order #53432</a></td>
                                        <td>Charles S Boyle</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 24, 2014</span></td>
                                        <td>$245.30</td>
                                        <td class="text-center">
                                            <div class="label label-table label-info">Shipped</div>
                                        </td>
                                        <td class="text-center"><i class="fa fa-plane"></i> CGX0089734531</td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0)" class="link"> Order #53433</a></td>
                                        <td>Lucy Doe</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 24, 2014</span></td>
                                        <td>$38.00</td>
                                        <td class="text-center">
                                            <div class="label label-table label-info">Shipped</div>
                                        </td>
                                        <td class="text-center"><i class="fa fa-plane"></i> CGX0089934571</td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0)" class="link"> Order #53434</a></td>
                                        <td>Teresa L. Doe</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 15, 2014</span></td>
                                        <td>$77.99</td>
                                        <td class="text-center">
                                            <div class="label label-table label-info">Shipped</div>
                                        </td>
                                        <td class="text-center"><i class="fa fa-plane"></i> CGX0089734574</td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0)" class="link"> Order #53435</a></td>
                                        <td>Teresa L. Doe</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 12, 2014</span></td>
                                        <td>$18.00</td>
                                        <td class="text-center">
                                            <div class="label label-table label-success">Paid</div>
                                        </td>
                                        <td class="text-center">-</td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0)" class="link">Order #53437</a></td>
                                        <td>Charles S Boyle</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 17, 2014</span></td>
                                        <td>$658.00</td>
                                        <td class="text-center">
                                            <div class="label label-table label-danger">Refunded</div>
                                        </td>
                                        <td class="text-center">-</td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0)" class="link">Order #536584</a></td>
                                        <td>Scott S. Calabrese</td>
                                        <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 19, 2014</span></td>
                                        <td>$45.58</td>
                                        <td class="text-center">
                                            <div class="label label-table label-warning">Unpaid</div>
                                        </td>
                                        <td class="text-center">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Column -->
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
<script id="saleSummaryByCustomer" type="text/x-kendo-template">
	<div id="slide-form">
		<div class="customer-background ">
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
							        								        	<!-- PRINT/EXPORT  -->
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
				</div>
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
</script>                                                                                                                                                              