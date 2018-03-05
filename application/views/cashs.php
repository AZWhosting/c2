<!-- Summary -->
			<div class="row-fluid ">
	
				<!-- Column -->
				<div class="span4">
				
					<!-- Widget -->
					<div class="widget widget-3 customer-border">
					
						<!-- Widget heading -->
						<div class="widget-head">
							<h4 class="heading">Cash Balance</h4>
						</div>
						<!-- // Widget heading END -->
						
						<div class="widget-body alert alert-primary">	
							<div align="center" class="text-large strong" style="font-size: 22pt;" data-bind="text: balance"></div>
							<table width="100%">
								<tr align="center">
									<td>										
										<span data-bind="text: cashACNumber"></span>
										<br>
										<span>Accounts</span>
									</td>									
								</tr>
							</table>
						</div>
						<!-- // Widget footer END -->
						
					</div>
					<!-- // Widget END -->
					
				</div>
				<!-- // Column END -->
				
				<!-- Column -->
				<div class="span4">
				
					<!-- Widget -->
					<div class="widget widget-3 customer-border">
					
						<!-- Widget heading -->
						<div class="widget-head">
							<h4 class="heading">Advance</h4>
						</div>
						<!-- // Widget heading END -->
						
						<div class="widget-body alert-info">
							
							<div align="center" class="text-large strong" style="font-size: 22pt;" data-bind="text: totalAdvance"></div>
							<table width="100%">
								<tr align="center">
									<td>										
										<span data-bind="text: open"></span>
										<br>
										<span>Open</span>
									</td>
									<td>
										<span data-bind="text: overDue"></span>
										<br>
										<span>Overdue</span>
									</td>									
								</tr>
							</table>
						</div>
						<!-- // Widget footer END -->
						
					</div>
					<!-- // Widget END -->
					
				</div>
				<!-- // Column END -->
				
				<!-- Column -->
				<div class="span4">
				
					<!-- Widget -->
					<div class="widget widget-3 customer-border">
					
						<!-- Widget heading -->
						<div class="widget-head">
							<h4 class="heading">Cash Position</h4>
						</div>
						<!-- // Widget heading END -->
						
						<div class="widget-body alert-info3" style="background-color: LightGray">
							
							<div align="center" class="text-large strong" style="font-size: 22pt;" data-bind="text: ar"></div>
							<table width="100%">
								<tr align="center">
									<td>										
										<span data-bind="text: ar_open"></span>
										<br>
										<span>To be Received</span>
									</td>
									<td>
										<span data-bind="text: ar_customer"></span>
										<br>
										<span>To be Paid</span>
									</td>
								</tr>
							</table>
						</div>
						<!-- // Widget footer END -->
						
					</div>
					<!-- // Widget END -->
					
				</div>
				<!-- // Column END -->
				
			</div>

			<!-- Top 5 -->
			<div class="row-fluid">
				<div class="span4">				
					<table class="table table-bordered table-primary table-striped table-vertical-center text-table">
				        <thead>
				            <tr>
				                <th colspan="2" style="text-align: center;">Top 5 Cash Balance</th>			                
				            </tr>
				        </thead>
				        <tbody data-role="listview"
				        	 data-auto-bind="false"				        	                 
			                 data-template="cashDashBoard-top-customer-template"
			                 data-bind="source: topCashDS"></tbody>			        
				    </table>			
				</div>
				<div class="span4">
					<table class="table table-bordered table-primary table-striped table-vertical-center text-table">
				        <thead>
				            <tr>
				                <th colspan="2" style="text-align: center;">Top 5 Cash Advance</th>		                
				            </tr>
				        </thead>
				        <tbody data-role="listview"
				        	 data-auto-bind="false"				        	                  
			                 data-template="cashDashBoard-top-ar-template"
			                 data-bind="source: topAdvaDS"></tbody>			        
				    </table>
				</div>
				<div class="span4">
					<table class="table table-bordered table-primary table-striped table-vertical-center text-table">
				        <thead>
				            <tr>
				                <th colspan="2" style="text-align: center;">Top 5 Expense Account</span></th>			                		                
				            </tr>
				        </thead>
				        <tbody data-role="listview"
				        	 data-auto-bind="true"                
			                 data-template="cashDashBoard-top-product-template"
			                 data-bind="source: topExpsDS"></tbody>			        
				    </table>
				</div>		
			</div>

			<!-- Graph -->
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